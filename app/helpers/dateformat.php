<?php
	
class Dateformat {

	/*
	|--------------------------------------------------------------------------
	| Time
	|--------------------------------------------------------------------------
	*/
	
	public static function birthday($value) {
		$date = explode('-',$value);
    	return $date[2].'.'.$date[1].'.'.$date[0];
	}		
	
}