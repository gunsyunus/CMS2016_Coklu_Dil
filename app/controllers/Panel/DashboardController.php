<?php

class Panel_DashboardController extends PanelController {

	/*
	|--------------------------------------------------------------------------
	| Dashboard
	|--------------------------------------------------------------------------
	*/

	public function index() {

        $user = User::count();
        $page = Page::count();

		$statistics = (object) array('user'=>$user,
									'page'=>$page);

        $logs = UserLog::orderBy('id_log','DESC')->take(5)->get();        
        $pages = Page::with('pagelanguage')->orderBy('id_page','DESC')->take(5)->get();

		return View::make('panel.dashboard',compact('logs','pages','statistics'));
	}

}