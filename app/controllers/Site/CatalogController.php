<?php

class Site_CatalogController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Catalog => Product, Category, Brand, Search
	|--------------------------------------------------------------------------
	*/
    
	public function product($sef_url,$id) {

		$designs = DB::table('designs')->where('id_design','=','1')->first();	

		$languageCode = Session::get('languageCode');

		$product = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)	
   				    ->where('id_product','=',$id)
				    ->where('status','=','1')
				    ->first();

		if ($product->sef_url!=$sef_url) { return Redirect::action('Site_CatalogController@product', array('sef_url' => $product->sef_url,'id' => $product->id_product)); };

		$galleries = DB::table('products_gallery')->where('product_id','=',$product->id_product)->get();	

        $categories = Category::get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();

		$nextProduct = DB::table('products')
					   ->leftJoin('products_language','products.id_product','=','products_language.product_id')
					   ->select('products.*','products_language.*')			   
					   ->where('product_id','>',$product->product_id)
					   ->where('language_id','=',$languageCode)					   
					   ->where('status','=','1')
					   ->first();

		$prevProduct = DB::table('products')
					   ->leftJoin('products_language','products.id_product','=','products_language.product_id')
					   ->select('products.*','products_language.*')
					   ->where('product_id','<',$product->product_id)
					   ->where('language_id','=',$languageCode)	
					   ->where('status','=','1')
					   ->first();
					   
		if ($designs->similar_product_section == 1) {
		$similarProducts = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->take(5)
					->orderBy(DB::raw('RAND()'))
					->get();
		}

		return View::make('site.product',compact('product','similarProducts','galleries','nextProduct','prevProduct','categories'));
	}

	public function category($sef_url,$id) {

		$designs = DB::table('designs')->where('id_design','=','1')->first();	

		$languageActive = Session::get('languageActive');        
		$languageCode = Session::get('languageCode');		
		
		$category = DB::table('categories')
					->leftJoin('categories_language','categories.id_category','=','categories_language.category_id')	
					->where('categories_language.language_id','=',$languageCode)					
					->where('id_category','=',$id)->first();

		if ($category->sef_url!=$sef_url) { return Redirect::action('Site_CatalogController@category', array('sef_url' => $category->sef_url,'id' => $category->id_category)); };

		$bannerSlider = DB::table('banners')
						    ->join('banners_language','banners.id_banner','=','banners_language.banner_id')
							->where('banners_language.language_id','=',$languageCode)
							->where('status','=','1')->where('category_id','=',$id)->where('type','=','category')->orderBy('sort','asc')->get();

		$products = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->where('category_id','=',$id)
					->orderBy('category_sort','asc')
					->orderBy('id_product','desc')
					->get();

        $categories = $categories = Category::with(['categorylanguage' => function ($q) use ($languageCode) { $q->Accordion($languageCode); }])->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();

		return View::make('site.category',compact('products','category','categories','bannerSlider'));
	}

	public function search() {
		
		$designs = DB::table('designs')->where('id_design','=','1')->first();	
		$settings = DB::table('settings')->where('id_setting','=','1')->first();

        $searchText = Input::get('k');
        $type = $settings->search_type;

		$languageActive = Session::get('languageActive');        
		$languageCode = Session::get('languageCode');

        if ($settings->search_type=='1') {

       		if (empty($searchText)) {
       			$products = [];
       		}
       		else {
			$products = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)										
					->where('status','=','1')
					->where('products_language.name','LIKE','%'.$searchText.'%')
					->get();
			}

        	$categories = $categories = Category::with(['categorylanguage' => function ($q) use ($languageCode) { $q->Accordion($languageCode); }])->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
		}

		else {

       		if (empty($searchText)) {
       			$pages = [];
       		}
       		else {
			$pages = DB::table('pages')
					->leftJoin('pages_language','pages.id_page','=','pages_language.page_id')
					->where('pages_language.language_id','=',$languageCode)	
					->where('status','=','1')
             		->where(function($query) use ($searchText){
                 		$query->orWhere('pages_language.title','LIKE','%'.$searchText.'%');
                 		$query->orWhere('pages_language.description','LIKE','%'.$searchText.'%');
                 		$query->orWhere('pages_language.keyword','LIKE','%'.$searchText.'%');
             		})
					->get();
			}
		}

		return View::make('site.search',compact('products','categories','searchText','pages','type'));
	}	

	public function showcase() {
	
		$languageActive = Session::get('languageActive');        
		$languageCode = Session::get('languageCode');

		$products = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)					
					->where('status','=','1')
					->where('showcase_status','=','1')
					->orderBy('showcase_sort','asc')
					->get();

        $categories = $categories = Category::with(['categorylanguage' => function ($q) use ($languageCode) { $q->Accordion($languageCode); }])->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();

		return View::make('site.showcase',compact('products','categories'));
	}

}
