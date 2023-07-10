<?php

class Page extends Eloquent {

	protected $table = 'pages';
    protected $primaryKey = 'id_page';
    public static $rules = ['languageField.1.title'=>'required']; 
    public $timestamps = false;
    
	public function pagelanguage() {
		return $this->hasOne('PageLanguage', 'page_id', 'id_page');
	}	

}
