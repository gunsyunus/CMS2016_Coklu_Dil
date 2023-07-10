<?php

class Panel_ProfileController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Profile
	|--------------------------------------------------------------------------
	*/

    public function getIndex() {
        $id = Auth::user()->id_user;
        $users = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        return View::make('panel.module.profile.password',compact('users'));
    }    

    public function postSave() {

        $validator = Validator::make(Input::all(),User::$rules['security']);
        $messages = $validator->messages();
        $alertMessage = $messages->first();
        if ($validator->fails()) {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));     
        }
        
        $id = Auth::user()->id_user;
        $user = User::where('id_user','=',$id)->where('role','=',1)->firstOrFail();
        $user->password = Input::get('password');
        $user->save();

        if ($user->save()) {

            Event::fire('administrator.logs',' Şifre değiştirdi');

            return Redirect::back()->with(array('alertTitle'=>'BAŞARILI : ','alertClass'=>'success','alertMessage'=>'Profil güncellendi.'));       
        }
        else {
            return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Kayıt güncellerken hata oluştu !'));        
        }

    }   

}