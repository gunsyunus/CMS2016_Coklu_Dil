<?php

class Site_PageController extends SiteController {

	/*
	|--------------------------------------------------------------------------
	| Page
	|--------------------------------------------------------------------------
	*/
    
	public function index($sef_url) {

		$languageCode = Session::get('languageCode'); 

		$page = DB::table('pages')
				->join('pages_language','pages.id_page','=','pages_language.page_id')
				->where('pages_language.language_id','=',$languageCode)
				->where('sef_url','=',$sef_url)->first();
			if ($page->section_id!=0) {
				$section = DB::table('pages_section_language')->where('section_id','=',$page->section_id)->where('language_id','=',$languageCode)->first();		
				$pageList = DB::table('pages')
							->join('pages_language','pages.id_page','=','pages_language.page_id')
							->where('pages_language.language_id','=',$languageCode)
							->where('section_id','=',$page->section_id)->orderBy('sort','asc')->get();
			}
			if ($page->gallery_id!=0) {
				$galleries = DB::table('pages_gallery_photo')->where('gallery_id','=',$page->gallery_id)->orderBy('id_photo','asc')->get();
			}			
		return View::make('site.page',compact('page','section','pageList','galleries'));
	}


	public function contact() {
		return View::make('site.contact');
	}	

	public function formsend() {

		$rules = ['name'=>'required','phone'=>'required']; 
    	$validator = Validator::make(Input::all(),$rules);
    	$messages = $validator->messages();
    	$alertMessage = $messages->first();
    	if ($validator->fails()) {
        	return Redirect::back()->with(array('ERROR'=>'1'));    	
    	}
		
        $name = Input::get('name');
        $email = Input::get('email');
        $phone = Input::get('phone');
        $formmessage = Input::get('message');

		$settings = DB::table('settings')->where('id_setting','=','1')->first();
   		$sendInfo = Mail::send('emails.contact', array('name'=>$name,'email'=>$email,'phone'=>$phone,'formmessage'=>$formmessage,'title'=>$settings->title), function($message) use ($settings) {		
    		$message->from($settings->email_info,$settings->email_info_name);
    		$message->to($settings->email_admin)->subject('İletişim Formu - '.date('d.m.Y'));
		});		

        if (!$sendInfo) {
        	return Redirect::back()->with(array('CONFIRM'=>'1'));    	
		}
		else {
        	return Redirect::back()->with(array('ERROR'=>'1'));    	
		}	    

	}

}
