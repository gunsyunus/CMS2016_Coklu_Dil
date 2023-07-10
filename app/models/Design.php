<?php

class Design extends Eloquent {

	protected $table = 'designs';
    protected $primaryKey = 'id_design';
    public static $rules = ['logo'=>'mimes:png,jpg,jpeg,gif','footer_logo'=>'mimes:png,jpg,jpeg,gif','favicon_logo'=>'mimes:png,jpg,jpeg,gif','advert_image'=>'mimes:png,jpg,jpeg,gif']; 
    public $timestamps = false;

    public function language() {
        return $this->belongsTo('Language', 'language_id', 'id_language');
    } 

}
