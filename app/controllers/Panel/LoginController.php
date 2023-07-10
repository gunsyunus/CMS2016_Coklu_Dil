<?php

class Panel_LoginController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	*/

	public function index() {
		return View::make('panel.login');
	}

	public function login() {
    	$validator = Validator::make(Input::all(),User::$rules['login']);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>$alertMessage));    	
    	}
		
		$email = Input::get('email');
        $password = Input::get('password');

		if (Auth::attempt(array('email'=>$email,'password'=>$password,'role'=>1))) {
	        Event::fire('administrator.logs','Giriş Yaptı');
    		return Redirect::to('Pv3/Dashboard');
		}
		else {
        	return Redirect::back()->with(array('alertTitle'=>'HATA : ','alertClass'=>'danger','alertMessage'=>'Giriş bilgileriniz hatalı !'));    	
		}
	}

	public function logout() {
		if(Auth::check()) Event::fire('administrator.logs','Çıkış Yaptı'); Auth::logout(); 
		return View::make('panel.login')->with('logout','success');
	}

}