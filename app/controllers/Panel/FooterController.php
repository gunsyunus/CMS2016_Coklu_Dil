<?php

class Panel_FooterController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Footer
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $menus = Footer::where('parent_id','=','0')->orderBy('language_id','ASC')->orderBy('sort','ASC')->get();
		return View::make('panel.module.menuFooter.index',compact('menus'));
	}

    public function getSub($id) {
        $parentMenu = Footer::findOrFail($id);
        $menus = Footer::where('parent_id','=',$id)->orderBy('sort','ASC')->paginate(25);
        return View::make('panel.module.menuFooter.sub',compact('menus','parentMenu'));
    }    

    public function postSubadd() {

        $validator = Validator::make(Input::all(),Footer::$rules);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $footer = new Footer;
        $footer->name = Input::get('name');
        $footer->url = Input::get('url');
        $footer->sort = Input::get('sort');
        $footer->parent_id = Input::get('parent_id');
        $footer->save();

       if ($footer->save()) {
            Event::fire('footer.tree',array($footer));
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü eklendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));        
        }
        
    }

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),Footer::$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$footer = Footer::findOrFail($id);
        $footer->name = Input::get('name');
        $footer->url = Input::get('url');
        $footer->sort = Input::get('sort');
        $footer->save();

        if ($footer->save()) {
            Event::fire('footer.tree',array($footer));
        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	


    public function getDelete($id) {
        $footer = Footer::findOrFail($id);
        $footer->delete();

        if (!$footer->delete()) {
            Event::fire('footer.tree',array($footer));
            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Menü silindi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));      
        }     

    }    

}