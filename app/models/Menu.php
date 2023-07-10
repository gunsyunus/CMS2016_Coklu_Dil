<?php

class Menu extends Eloquent {

	protected $table = 'menus';
    protected $primaryKey = 'id_menu';
    public static $rules = ['name'=>'required','image'=>'mimes:png,jpg,jpeg,gif']; 
    public $timestamps = false;

	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	}        
  
}
