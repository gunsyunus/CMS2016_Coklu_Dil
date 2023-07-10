<?php

class Panel_PhotoitemController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Page Gallery Item
	|--------------------------------------------------------------------------
	*/

	public function postAdd() {
		
        $images = Input::file('images');

        $title = substr(Str::slug(Input::get('name')),0,25);
 
        $type = Input::get('type');

        foreach($images as $upload) {

            $validator = Validator::make(array('upload'=>$upload),PhotoItem::$rules);
            $messages = $validator->messages();
            $alertMessage = $messages->first();
            if ($validator->fails()) {
                return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
            }

            $filename = $upload->getClientOriginalName();
            $extension = $upload->getClientOriginalExtension();
            $uploadname = $title.'-B'.rand(1,99999).'.'.$extension;
            $uploadnameSmall = $title.'-S'.rand(1,99999).'.'.$extension;
            $upload->move('media/gallery/',$uploadname);

            // Image::make('media/gallery/'.$uploadname)->resize(500,600)->save(); 
            // Disabled big image

			switch ($type) {
    			case 'square':
            		Image::make('media/gallery/'.$uploadname)->resize(175,175)->save('media/gallery/small/'.$uploadnameSmall); 
        		break;
    			case 'rectangle':
            		Image::make('media/gallery/'.$uploadname)->resize(200,125)->save('media/gallery/small/'.$uploadnameSmall); 
        		break;        
    			case 'vertical':
        		    Image::make('media/gallery/'.$uploadname)->resize(200,242)->save('media/gallery/small/'.$uploadnameSmall); 
		        break;       
	    		default:
        			Image::make('media/gallery/'.$uploadname)->resize(200,125)->save('media/gallery/small/'.$uploadnameSmall); 
			}

            $gallery = new PhotoItem;
            $gallery->gallery_id = Input::get('gallery_id');
            $gallery->image_small = 'media/gallery/small/'.$uploadnameSmall;
            $gallery->image_big = 'media/gallery/'.$uploadname;
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
        $gallery = PhotoItem::findOrFail($id);
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