<?php

class Panel_LanguageController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Dil
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $languages = Language::orderBy('sort','ASC')->paginate(25);
		return View::make('panel.module.language.index',compact('languages'));
	}

	public function getNew() {
		return View::make('panel.module.language.new'); 
	}

	public function postAdd() {

        $validator = Validator::make(Input::all(),Language::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $language = new Language;
        $language->name = Input::get('name');
        $language->status = (Input::get('status')=='1') ? '1' : '0';
        $language->language_code = Input::get('language_code');
        $language->country_code = Input::get('country_code');
        $language->sort = Input::get('sort');

        $title = substr(Str::slug(Input::get('name')),0,25);

        if (Input::hasFile('image')) {
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-L'.rand(1,999).'.'.$extension;
            $upload->move('media/other/',$uploadname);
            Image::make('media/other/'.$uploadname)->resize(20,14)->save();
            $language->image_flag = 'media/other/'.$uploadname;
        }

        $language->save();

            // After adding language default settings

            // Footer
                $menu = array(
                        array('name'=>'MENÜ - 1','sort'=>'1','status'=>'1','tree'=>'{"menu":[]}','language_id'=>$language->id_language),
                        array('name'=>'MENÜ - 2','sort'=>'2','status'=>'1','tree'=>'{"menu":[]}','language_id'=>$language->id_language),
                        array('name'=>'MENÜ - 3','sort'=>'3','status'=>'1','tree'=>'{"menu":[]}','language_id'=>$language->id_language),
                );

                Footer::insert($menu);

            // Footer

            // Design

                $design = Design::findOrFail('1')->replicate();
                $design->language_id = $language->id_language;
                $design->save();

            // Design

            // Setting

                $setting = Setting::findOrFail('1')->replicate();
                $setting->language_id = $language->id_language;
                $setting->save();            

            // Setting             

            // Other

                $banners = BannerLanguage::where('language_id','=','1')->get();
                foreach ($banners as $key => $banner) {
                    $bannerNew = BannerLanguage::findOrFail($banner->id)->replicate();
                    $bannerNew->language_id = $language->id_language;
                    $bannerNew->save();
                }                

                $brands = BrandLanguage::where('language_id','=','1')->get();
                foreach ($brands as $key => $brand) {
                    $brandNew = BrandLanguage::findOrFail($brand->id)->replicate();
                    $brandNew->language_id = $language->id_language;
                    $brandNew->save();
                }     

                $pages = PageLanguage::where('language_id','=','1')->get();
                foreach ($pages as $key => $page) {
                    $pageNew = PageLanguage::findOrFail($page->id)->replicate();
                    $pageNew->language_id = $language->id_language;
                    $pageNew->save();
                }         

                $categories = CategoryLanguage::where('language_id','=','1')->get();
                foreach ($categories as $key => $category) {
                    $categoryNew = CategoryLanguage::findOrFail($category->id)->replicate();
                    $categoryNew->language_id = $language->id_language;
                    $categoryNew->save();
                }      

                $sections = SectionLanguage::where('language_id','=','1')->get();
                foreach ($sections as $key => $section) {
                    $sectionNew = SectionLanguage::findOrFail($section->id)->replicate();
                    $sectionNew->language_id = $language->id_language;
                    $sectionNew->save();
                }                           

                $products = ProductLanguage::where('language_id','=','1')->get();
                foreach ($products as $key => $product) {
                    $productNew = ProductLanguage::findOrFail($product->id)->replicate();
                    $productNew->language_id = $language->id_language;
                    $productNew->save();
                }

            // Other                  

            // End

        if ($language->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Dil eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
        $languages = Language::where('id_language','=',$id)->firstOrFail();
		return View::make('panel.module.language.edit',compact('languages'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Language::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$language = Language::findOrFail($id);
        $language->name = Input::get('name');
        $language->status = (Input::get('status')=='1') ? '1' : '0';
        $language->language_code = Input::get('language_code');
        $language->country_code = Input::get('country_code');
        $language->sort = Input::get('sort');       

        $title = substr(Str::slug(Input::get('name')),0,25);

        if (Input::hasFile('image')) {
            File::delete($language->image);
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-L'.rand(1,999).'.'.$extension;
            $upload->move('media/other/',$uploadname);
            Image::make('media/other/'.$uploadname)->resize(20,14)->save();            
            $language->image_flag = 'media/other/'.$uploadname;
        }
        $language->save();

        if ($language->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Dil güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $language = Language::findOrFail($id);
        File::delete($language->image);
        $language->delete();

        if (!$language->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Dil silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}