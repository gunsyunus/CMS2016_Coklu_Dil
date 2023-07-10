<?php

class Panel_GalleryController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Product Gallery
	|--------------------------------------------------------------------------
	*/

	public function postAdd() {

		
        $images = Input::file('images');

        $title = substr(Str::slug(Input::get('name')),0,25);
 
        foreach($images as $upload) {

            $validator = Validator::make(array('upload'=>$upload),Gallery::$rules);
            $messages = $validator->messages();
            $alertMessage = $messages->first();
            if ($validator->fails()) {
                return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
            }

            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-B'.rand(1,99999).'.'.$extension;
            $uploadnameSmall = $title.'-S'.rand(1,99999).'.'.$extension;
            $upload->move('media/product/',$uploadname);
            Image::make('media/product/'.$uploadname)->resize(500,600)->save();
            Image::make('media/product/'.$uploadname)->resize(258,313)->save('media/product/small/'.$uploadnameSmall); 
            $gallery = new Gallery;
            $gallery->product_id = Input::get('product_id');
            $gallery->image_small = 'media/product/small/'.$uploadnameSmall;
            $gallery->image_big = 'media/product/'.$uploadname;
            $gallery->save();
        }   

        if ($gallery->save()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Resim başarıyla eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getDelete($id) {
        $gallery = Gallery::findOrFail($id);
        File::delete($gallery->image_small);
        File::delete($gallery->image_big);
        $gallery->delete();

        if (!$gallery->delete()) {
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Resim başarıyla silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

}