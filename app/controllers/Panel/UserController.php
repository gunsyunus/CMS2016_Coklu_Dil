<?php

class Panel_UserController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| User
	|--------------------------------------------------------------------------
	*/

	public function getIndex() {
        $users = User::where('role','=',1)->orderBy('id_user','DESC')->paginate(25);
		return View::make('panel.module.user.index',compact('users'));
	}

	public function getNew() {
		return View::make('panel.module.user.new');
	}

	public function postAdd() {

    	$validator = Validator::make(Input::all(),User::$rules['crud']);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
        $user = new User;
        $user->name = Input::get('name');
        $user->surname = Input::get('surname');
        $user->email = Input::get('email');
        $user->password = Input::get('password');
        $user->role = 1;
        $user->save();

        if ($user->save()) {

            Event::fire('administrator.logs','Yeni yönetici ekledi ('.$user->email.')');

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Yönetici eklendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt eklerken hata oluştu !'));    	
		}
		
	}

	public function getEdit($id) {
        $users = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
		return View::make('panel.module.user.edit',compact('users'));
	}

    public function getPassword($id) {
        $users = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        return View::make('panel.module.user.password',compact('users'));
    }    

	public function postSave($id) {

    	$validator = Validator::make(Input::all(),User::$rules['update']);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$user = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        $user->name = Input::get('name');
        $user->surname = Input::get('surname');
        $user->email = Input::get('email');
        $user->save();

        if ($user->save()) {

            Event::fire('administrator.logs','Yönetici güncelledi ('.$user->email.')');

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Yönetici güncellendi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));    	
		}

	}	

    public function postPasswordsave($id) {

        $validator = Validator::make(Input::all(),User::$rules['security']);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $user = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        $user->password = Input::get('password');
        $user->save();

        if ($user->save()) {

            Event::fire('administrator.logs','Yönetici şifre güncelledi ('.$user->email.')');

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Yönetici şifresi güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

	public function getDelete($id) {
        $user = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        $user->delete();

        if (!$user->delete()) {

            Event::fire('administrator.logs','Yönetici sildi ('.$user->email.')');

        	return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Yönetici silindi.'));    	
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt silinirken hata oluştu !'));    	
		}     

	}		

    public function getLogs($id) {           
        $users = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        $logs = UserLog::where('user_id','=',$id)->orderBy('id_log','DESC')->paginate(100);
        return View::make('panel.module.user.log',compact('users','logs'));
    }    

}