<?php

class UserLog extends Eloquent {

	protected $table = 'users_log';
    protected $primaryKey = 'id_log';
    public $timestamps = false;

    public function getDates() { 
    	return array('process_at'); 
    }
	    
}
