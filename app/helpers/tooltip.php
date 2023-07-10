<?php
	
class Tooltip {

	/*
	|--------------------------------------------------------------------------
	| Tooltip Helpers
	|--------------------------------------------------------------------------
	*/
	
	public static function standard($message) {
		$message = '<span class="tooltips" data-toggle="tooltip" data-placement="top" title="'.$message.'"><i class="fa fa-info-circle"></i></span>';
		return $message;
	}		
	
}