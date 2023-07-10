<?php

class Footer extends Eloquent {

	protected $table = 'menus_footer';
    protected $primaryKey = 'id_menu';
    public static $rules = ['name'=>'required']; 
    public $timestamps = false;
  
	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	}

}
