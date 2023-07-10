<?php

class ProcessController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| General Process Controller => Cart, order ...
	|--------------------------------------------------------------------------
	*/
    
    public function __construct() {
        $this->beforeFilter('csrf',array('on'=>'post'));
    }
    
}
