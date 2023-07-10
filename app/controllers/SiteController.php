<?php

class SiteController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| General Site Controller
	|--------------------------------------------------------------------------
	*/

	public function __construct() {
		
        $this->beforeFilter('csrf',array('on'=>'post'));

		$languageActive = Session::get('languageActive');        
		$languageCode = Session::get('languageCode');        
        
		$designs = DB::table('designs')->where('id_design','=','1')->first();	
		$designsLanguage = DB::table('designs')->where('language_id','=',$languageCode)->first();

		$settings = DB::table('settings')->where('id_setting','=','1')->first();
		$settingsLanguage = DB::table('settings')->where('language_id','=',$languageCode)->first();

		$menus = DB::table('menus')->where('language_id','=',$languageCode)->where('parent_id','=','0')->where('status','=','1')->orderBy('sort','asc')->get();
		$footers = DB::table('menus_footer')->where('language_id','=',$languageCode)->where('parent_id','=','0')->where('status','=','1')->orderBy('sort','asc')->get();
		$languages = DB::table('languages')->where('status','=','1')->orderBy('sort','asc')->get();

	   	return View::share(compact('designs','designsLanguage','settings','settingsLanguage','menus','footers','languageActive','languageCode','languages'));

	}

}
