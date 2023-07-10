<?php

class Panel_PhotoController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Photo
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $photos = Photo::orderBy('id_gallery','DESC')->paginate(25);
		return View::make('panel.module.photo.index',compact('photos'));
	}

	public function getNew() {
		return View::make('panel.module.photo.new');
	}

	public function postAdd() {

    	$validator = Validator::make(Input::all(),Photo::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $photo = new Photo;
        $photo->name = Input::get('name');
        $photo->type = Input::get('type');     
        $photo->save();

        if ($photo->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa galerisi eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
		$photos = Photo::findOrFail($id);
		return View::make('panel.module.photo.edit',compact('photos'));
	}

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Photo::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$photo = Photo::findOrFail($id);
        $photo->name = Input::get('name');
        $photo->save();

        if ($photo->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa galerisi güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

	public function getDelete($id) {
        $photo = Photo::findOrFail($id);
        $photo->delete();

        if (!$photo->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Sayfa galerisi silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

    public function getItem($id) {
        $photoAlbum = Photo::findOrFail($id);       
        $galleries = PhotoItem::where('gallery_id','=',$photoAlbum->id_gallery)->get();
        return View::make('panel.module.photo.gallery',compact('photoAlbum','galleries'));
    }  

}