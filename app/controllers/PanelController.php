<?php

class PanelController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| General Panel Controller
	|--------------------------------------------------------------------------
	*/

    public function __construct() {
        $this->beforeFilter('csrf',array('on'=>'post'));
    }
	
}