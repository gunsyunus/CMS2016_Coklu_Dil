<?php

class Panel_BrandController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Brand
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $brands = Brand::orderBy('id_brand','DESC')->paginate(25);
		return View::make('panel.module.brand.index',compact('brands'));
	}

	public function getNew() {
        $languages = Language::orderBy('id_language','ASC')->get();
		return View::make('panel.module.brand.new',compact('languages'));
	}

	public function postAdd() {

    	$validator = Validator::make(Input::all(),Brand::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $brand = new Brand;
        $brand->bname = Input::get('bname');    
        $brand->save();

        $data['languageField'] = Input::get('languageField');        

        if ($brand->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = new BrandLanguage;
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->brand_id = $brand->id_brand;
                $language->language_id = $key;
                $language->save();
            };              

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Yeni marka eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
		$brands = Brand::findOrFail($id);
        $languages = BrandLanguage::with('language')->where('brand_id','=',$id)->orderBy('language_id','ASC')->get();
		return View::make('panel.module.brand.edit',compact('brands','languages'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Brand::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$brand = Brand::findOrFail($id);
        $brand->bname = Input::get('bname'); 
        $brand->save();

        $data['languageField'] = Input::get('languageField');

        if ($brand->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = BrandLanguage::where('brand_id','=',$brand->id_brand)->where('language_id','=',$key)
                            ->firstOrFail();
                $language->title = $value['title'];
                $language->keyword = $value['keyword'];
                $language->description = $value['description'];
                $language->save();
            };            

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Marka bilgileri güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $brand = Brand::findOrFail($id);
        $language = BrandLanguage::where('brand_id','=',$brand->id_brand)->delete();
        $brand->delete();

        if (!$brand->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Marka silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}