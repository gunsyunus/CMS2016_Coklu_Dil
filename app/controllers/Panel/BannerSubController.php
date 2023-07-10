<?php

class Panel_BannerSubController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Banner
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $banners = Banner::with('bannerlanguage')->where('type','=','home_sub')->orderBy('sort','ASC')->paginate(25);
		return View::make('panel.module.bannerSub.index',compact('banners'));
	}

	public function getNew() {
        $languages = Language::orderBy('id_language','ASC')->get();        
		return View::make('panel.module.bannerSub.new',compact('languages')); 
	}

	public function postAdd() {

        $validator = Validator::make(Input::all(),Banner::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $banner = new Banner;
        $banner->status = (Input::get('status')=='1') ? '1' : '0';
        $banner->sort = Input::get('sort');
        $banner->type = 'home_sub';

        $data['languageField'] = Input::get('languageField');
        
        $title = substr(Str::slug($data['languageField']['1']['title']),0,25);

        if (Input::hasFile('image')) {
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-SB'.rand(1,99999).'.'.$extension;
            $upload->move('media/other/',$uploadname);
            Image::make('media/other/'.$uploadname)->resize(242,162)->save();
            $banner->image = 'media/other/'.$uploadname;
        }

        $banner->save();

        if ($banner->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = new BannerLanguage;
                $language->title = $value['title'];
                $language->url = $value['url'];
                $language->text = $value['text'];
                $language->banner_id = $banner->id_banner;
                $language->language_id = $key;
                $language->save();
            };

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Banner eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
        $banners = Banner::where('id_banner','=',$id)->where('type','=','home_sub')->firstOrFail();
        $languages = BannerLanguage::with('language')->where('banner_id','=',$id)->orderBy('language_id','ASC')->get();      
		return View::make('panel.module.bannerSub.edit',compact('banners','languages'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Banner::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$banner = Banner::findOrFail($id);
        $banner->status = (Input::get('status')=='1') ? '1' : '0';
        $banner->sort = Input::get('sort');

        $data['languageField'] = Input::get('languageField');

        $title = substr(Str::slug($data['languageField']['1']['title']),0,25);

        if (Input::hasFile('image')) {
            File::delete($banner->image);
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-SB'.rand(1,99999).'.'.$extension;
            $upload->move('media/other/',$uploadname);
            Image::make('media/other/'.$uploadname)->resize(242,162)->save();
            $banner->image = 'media/other/'.$uploadname;
        }
        $banner->save();

        if ($banner->save()) {

            foreach ($data['languageField'] as $key => $value) {
                $language = BannerLanguage::where('banner_id','=',$banner->id_banner)->where('language_id','=',$key)
                            ->firstOrFail();
                $language->title = $value['title'];
                $language->url = $value['url'];
                $language->text = $value['text'];
                $language->save();
            };

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Banner güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $banner = Banner::findOrFail($id);
        File::delete($banner->image);
        $language = BannerLanguage::where('banner_id','=',$banner->id_banner)->delete();        
        $banner->delete();

        if (!$banner->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Banner silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}