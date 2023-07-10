<?php

class Sef {

	/*
	|--------------------------------------------------------------------------
	| SEF
	|--------------------------------------------------------------------------
	*/

	public static function product($sef_url,$id) {
	
		return URL::to('u/'.$sef_url.'/'.$id);
	
	}

	public static function brand($sef_url,$id) {
	
		return URL::to('m/'.$sef_url.'/'.$id);
	
	}	

	public static function page($sef_url) {
	
		return URL::to('s/'.$sef_url);
	
	}		

	public static function productlang($sef_url,$id,$lang) {

		if ($lang!='') $lang = $lang.'/';
		return URL::to($lang.'u/'.$sef_url.'/'.$id);
	
	}	


	public static function brandlang($sef_url,$lang) {

		if ($lang!='') $lang = $lang.'/';
		return URL::to($lang.'m/'.$sef_url);
	
	}			

	public static function pagelang($sef_url,$lang) {

		if ($lang!='') $lang = $lang.'/';
		return URL::to($lang.'s/'.$sef_url);
	
	}		


}
