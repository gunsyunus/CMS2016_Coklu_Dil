<?php

class Panel_BannerBrandController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Banner
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $banners = Banner::where('type','=','home_brand')->orderBy('sort','ASC')->paginate(25);
		return View::make('panel.module.bannerBrand.index',compact('banners'));
	}

	public function getNew() {
		return View::make('panel.module.bannerBrand.new'); 
	}

	public function postAdd() {

        $validator = Validator::make(Input::all(),Banner::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $banner = new Banner;
        $banner->title = Input::get('title');
        $banner->status = (Input::get('status')=='1') ? '1' : '0';
        $banner->url = Input::get('url');
        $banner->sort = Input::get('sort');
        $banner->type = 'home_brand';

        $title = substr(Str::slug(Input::get('title')),0,25);

        if (Input::hasFile('image')) {
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-B'.rand(1,99999).'.'.$extension;
            $upload->move('media/brand/',$uploadname);
            Image::make('media/brand/'.$uploadname)->resize(135,50)->save();
            $banner->image = 'media/brand/'.$uploadname;
        }

        $banner->save();

        if ($banner->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Banner eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
        $banners = Banner::where('id_banner','=',$id)->where('type','=','home_brand')->firstOrFail();
		return View::make('panel.module.bannerBrand.edit',compact('banners'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Banner::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$banner = Banner::findOrFail($id);
        $banner->title = Input::get('title');
        $banner->status = (Input::get('status')=='1') ? '1' : '0';
        $banner->url = Input::get('url');
        $banner->sort = Input::get('sort');

        $title = substr(Str::slug(Input::get('title')),0,25);

        if (Input::hasFile('image')) {
            File::delete($banner->image);
            $upload = Input::file('image');
            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-B'.rand(1,99999).'.'.$extension;
            $upload->move('media/brand/',$uploadname);
            Image::make('media/brand/'.$uploadname)->resize(135,50)->save();
            $banner->image = 'media/brand/'.$uploadname;
        }
        $banner->save();

        if ($banner->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Banner güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $banner = Banner::findOrFail($id);
        File::delete($banner->image);
        $banner->delete();

        if (!$banner->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Banner silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}