<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
*/

Route::filter('changeLanguage', function()
{
	$languages = DB::table('languages')->where('status','=','1')->orderBy('sort','ASC')->lists('language_code','id_language'); 
	$segment = Request::segment(1);

	if (in_array($segment, $languages)) {	
		Lang::setLocale('en');
		$code = array_search($segment,$languages,true);
			if ($code=='') { $code='1';}
			Session::put('languageActive', $segment);
			Session::put('languageCode', $code);
	}
	else {
		Lang::setLocale('tr');	 
			Session::put('languageActive','');
			Session::put('languageCode','1');
	};
});

Route::filter('authCustomer', function()
{
	if (Auth::guest() or Auth::user()->role != 2) return Redirect::action('Site_CustomerController@index');
});

Route::filter('authAdministrator', function()
{
	if (Auth::guest() or Auth::user()->role != 1) return Redirect::guest('/');
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
