<?php

class Panel_ProductController extends PanelController {

    /*
    |--------------------------------------------------------------------------
    | Product
    |--------------------------------------------------------------------------
    */

    public function getIndex() {
        $products = Product::with('productlanguage')->orderBy('id_product','DESC')->paginate(25);
        return View::make('panel.module.product.index',compact('products'));
    }

    public function getSearch() {
        $searchText = Input::get('q');
        $products = Product::whereHas('productlanguage',function($q) use ($searchText) { $q->where('name','LIKE','%'.$searchText.'%'); })->orWhere('code','LIKE','%'.$searchText.'%')->orderBy('id_product','DESC')->paginate(25);
        return View::make('panel.module.product.index',compact('products','searchText'));
    }

    public function getNew() {             
        $brands = array('0'=>'Markasız')+Brand::orderBy('bname','ASC')->lists('bname','id_brand');      
        $categories = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        $languages = Language::orderBy('id_language','ASC')->get();
        return View::make('panel.module.product.new',compact('brands','categories','languages'));
    }

    public function getDetail() {
        $brands = array('0'=>'Marka Seçiniz')+Brand::orderBy('bname','ASC')->lists('bname','id_brand');      
        $categories = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        return View::make('panel.module.product.detail',compact('brands','categories'));
    }

    public function getDetailsearch() {
        $searchText = Input::get('q');
        if ($searchText==0) { return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Lütfen kategori seçiniz !')); }
        $category = Category::findOrFail($searchText);
        $categoryText = $category->name;
        $products = Product::where('category_id','=',$searchText)->orderBy('id_product','DESC')->paginate(25);
        return View::make('panel.module.product.index',compact('products','searchText','categoryText'));      
    }    

    public function postAdd() {

        $validator = Validator::make(Input::all(),Product::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $product = new product;
        $product->code = Input::get('code');
        $product->cargo_weight = Input::get('cargo_weight');
        $product->supply_company_name = Input::get('supply_company_name');
        $product->status = (Input::get('status')=='1') ? '1' : '0';
        $product->option_status = (Input::get('option_status')=='1') ? '1' : '0';
        $product->showcase_status = (Input::get('showcase_status')=='1') ? '1' : '0';
        $product->private_status_1 = (Input::get('private_status_1')=='1') ? '1' : '0';
        $product->private_status_2 = (Input::get('private_status_2')=='1') ? '1' : '0';
        $product->private_status_3 = (Input::get('private_status_3')=='1') ? '1' : '0';
        $product->private_status_4 = (Input::get('private_status_4')=='1') ? '1' : '0';
        $product->private_status_5 = (Input::get('private_status_5')=='1') ? '1' : '0';
        $product->outlet_status = (Input::get('outlet_status')=='1') ? '1' : '0';  
        $product->showcase_sort = Input::get('showcase_sort');
        $product->private_sort = Input::get('private_sort');
        $product->category_sort = Input::get('category_sort');
        $product->brand_sort = Input::get('brand_sort');
        $product->barcode_ean = Input::get('barcode_ean');
        $product->barcode_upc = Input::get('barcode_upc');
        $product->barcode_jan = Input::get('barcode_jan');
        $product->shelf_code = Input::get('shelf_code');
        $product->brand_id = Input::get('brand_id');
        $product->category_id = Input::get('category_id');

        $data['languageField'] = Input::get('languageField');
        
        $title = substr(Str::slug($data['languageField']['1']['name']),0,25);

        if (Input::hasFile('image1')) {
            $upload = Input::file('image1');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-B'.rand(1,99999).'.'.$extension;
            $uploadnameSmall = $title.'-S'.rand(1,99999).'.'.$extension;
            $upload->move('media/product/',$uploadname);
            Image::make('media/product/'.$uploadname)->resize(500,600)->save();
            Image::make('media/product/'.$uploadname)->resize(258,313)->save('media/product/small/'.$uploadnameSmall); 
            $product->image_small_1 = 'media/product/small/'.$uploadnameSmall;
            $product->image_big_1 = 'media/product/'.$uploadname;
        }   

        $product->save();

        if ($product->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = new ProductLanguage;
                $language->name = $value['name'];
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->content = $value['content'];
                $language->short_content = $value['short_content'];
                $language->promotion_text = $value['promotion_text'];
                $language->product_id = $product->id_product;
                $language->language_id = $key;
                $language->save();
            }; 

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Ürün eklendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));        
        }
        
    }

    public function getEdit($id) {
        $products = Product::findOrFail($id);
        $brands = array('0'=>'Markasız')+Brand::orderBy('bname','ASC')->lists('bname','id_brand');     
        $categories = Category::with('categorylanguage')->get(['id_category','sort','parent_id','lft','rgt','depth'])->toHierarchy();
        $categoryMain = Category::with('categorylanguage')->where('id_category','=',$products->category_id)->first();
        $languages = ProductLanguage::with('language')->where('product_id','=',$id)->orderBy('language_id','ASC')->get();
        return View::make('panel.module.product.edit',compact('products','brands','categories','categoryMain','languages'));
    }

    public function postSave($id) {

        $validator = Validator::make(Input::all(),Product::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $product = Product::findOrFail($id);
        $product->code = Input::get('code');
        $product->price = Input::get('price');
        $product->price_old = Input::get('price_old');
        $product->price_tier = Input::get('price_tier');
        $product->tax = Input::get('tax');
        $product->cargo_weight = Input::get('cargo_weight');
        $product->supply_company_name = Input::get('supply_company_name');
        $product->stock = Input::get('stock');
        $product->status = (Input::get('status')=='1') ? '1' : '0';
        $product->option_status = (Input::get('option_status')=='1') ? '1' : '0';
        $product->showcase_status = (Input::get('showcase_status')=='1') ? '1' : '0';
        $product->private_status_1 = (Input::get('private_status_1')=='1') ? '1' : '0';
        $product->private_status_2 = (Input::get('private_status_2')=='1') ? '1' : '0';
        $product->private_status_3 = (Input::get('private_status_3')=='1') ? '1' : '0';
        $product->private_status_4 = (Input::get('private_status_4')=='1') ? '1' : '0';
        $product->private_status_5 = (Input::get('private_status_5')=='1') ? '1' : '0';
        $product->outlet_status = (Input::get('outlet_status')=='1') ? '1' : '0';        
        $product->showcase_sort = Input::get('showcase_sort');
        $product->private_sort = Input::get('private_sort');
        $product->category_sort = Input::get('category_sort');
        $product->brand_sort = Input::get('brand_sort');
        $product->barcode_ean = Input::get('barcode_ean');
        $product->barcode_upc = Input::get('barcode_upc');
        $product->barcode_jan = Input::get('barcode_jan');
        $product->shelf_code = Input::get('shelf_code');
        $product->rate_id = Input::get('rate_id');       
        $product->brand_id = Input::get('brand_id');
        $product->category_id = Input::get('category_id');

        $data['languageField'] = Input::get('languageField');

        $title = substr(Str::slug($data['languageField']['1']['name']),0,25);

        if (Input::hasFile('image1')) {
            File::delete($product->image_small_1);
            File::delete($product->image_big_1);
            $upload = Input::file('image1');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-B'.rand(1,99999).'.'.$extension;
            $uploadnameSmall = $title.'-S'.rand(1,99999).'.'.$extension;
            $upload->move('media/product/',$uploadname);
            Image::make('media/product/'.$uploadname)->resize(500,600)->save();
            Image::make('media/product/'.$uploadname)->resize(258,313)->save('media/product/small/'.$uploadnameSmall); 
            $product->image_small_1 = 'media/product/small/'.$uploadnameSmall;
            $product->image_big_1 = 'media/product/'.$uploadname;
        }  

        $product->save();

        if ($product->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = ProductLanguage::where('product_id','=',$product->id_product)->where('language_id','=',$key)
                            ->firstOrFail();
                $language->name = $value['name'];
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->content = $value['content'];
                $language->short_content = $value['short_content'];
                $language->promotion_text = $value['promotion_text'];
                $language->save();
            };

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Ürün güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

    public function getDelete($id) {
        $product = Product::findOrFail($id);
        File::delete($product->image_small_1);
        File::delete($product->image_small_2);
        File::delete($product->image_big_1);
        File::delete($product->image_big_2);
        $language = ProductLanguage::where('product_id','=',$product->id_product)->delete();        
        $product->delete();

        if (!$product->delete()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Ürün silindi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));      
        }

    }       

    public function getCopy($id) {
        $product = Product::findOrFail($id)->replicate();
        $product->name = $product->name.' - Kopya';
        $product->save();

        if ($product->save()) {
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Ürün başarıyla kopyalandı.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Ürün kopyalarken hata oluştu !'));        
        }

    }

    public function getGallery($id) {
        $product = Product::findOrFail($id);       
        $galleries = Gallery::where('product_id','=',$product->id_product)->get();
        return View::make('panel.module.product.gallery',compact('product','galleries'));
    }      

}