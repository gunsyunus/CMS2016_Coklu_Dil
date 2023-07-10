<?php

class Site_HomeController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Home
	|--------------------------------------------------------------------------
	*/

	public function index() {

		$languageCode = Session::get('languageCode'); 
		
		$designs = DB::table('designs')->where('id_design','=','1')->first();	

		$bannerSlider = DB::table('banners')
							->join('banners_language','banners.id_banner','=','banners_language.banner_id')
							->where('banners_language.language_id','=',$languageCode)
							->where('status','=','1')->where('type','=','home_slider')->orderBy('sort','asc')->get();

		if ($designs->home_section_1 == 1) {
			$bannerBox = DB::table('banners')
						     ->join('banners_language','banners.id_banner','=','banners_language.banner_id')
							 ->where('banners_language.language_id','=',$languageCode)
							 ->where('status','=','1')->where('type','=','home_box')->orderBy('sort','asc')->get();
		}
		if ($designs->home_section_2 == 1) {
			$tabLeftUpProducts = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->where('private_status_1','=','1')->orderBy('private_sort','asc')->get();			
			$tabRightUpProducts = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->where('private_status_2','=','1')->orderBy('private_sort','asc')->get();
		}			

		if ($designs->home_section_3 == 1) {
			$tabLeftDownProducts = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->where('private_status_3','=','1')->orderBy('private_sort','asc')->get();			
			$tabRightDownProducts = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->where('private_status_4','=','1')->orderBy('private_sort','asc')->get();
		}			

		if ($designs->home_section_4 == 1) {
			$bandProducts = DB::table('products')
					->leftJoin('products_language','products.id_product','=','products_language.product_id')			
					->leftJoin('brands','products.brand_id','=','brands.id_brand')
					->select('products.*','products_language.*','brands.bname as bname')
					->where('products_language.language_id','=',$languageCode)
					->where('status','=','1')
					->where('private_status_5','=','1')->orderBy('private_sort','asc')->get();			
		}		

		if ($designs->home_section_5 == 1) {
			$bannerSub = DB::table('banners')
						     ->join('banners_language','banners.id_banner','=','banners_language.banner_id')
							 ->where('banners_language.language_id','=',$languageCode)
							 ->where('status','=','1')->where('type','=','home_sub')->orderBy('sort','asc')->get();
		}		

		if ($designs->home_section_6 == 1) {
			$bannerBrand = DB::table('banners')->where('status','=','1')->where('type','=','home_brand')->orderBy('sort','asc')->get();
		}

		return View::make('site.home',compact('designs','bannerSlider','bannerBrand','bannerBox','bannerSub','bandProducts','tabLeftUpProducts','tabRightUpProducts','tabLeftDownProducts','tabRightDownProducts'));
	}

}
