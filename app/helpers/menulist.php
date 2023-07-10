<?php

class MenuList {

	/*
	|--------------------------------------------------------------------------
	| Menu - JSON Decode
	|--------------------------------------------------------------------------
	*/

	public static function dropdown($json) {
		
		$list = json_decode($json,true);
		return $list['menu'];
	
	}


}
