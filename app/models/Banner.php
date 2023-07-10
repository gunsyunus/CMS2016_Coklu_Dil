<?php

class Banner extends Eloquent {

	protected $table = 'banners';
    protected $primaryKey = 'id_banner';
    public static $rules = ['languageField.1.title'=>'required','image'=>'mimes:png,jpg,jpeg,gif']; 
    public $timestamps = false;

	public function categorylanguage() {
		return $this->hasOne('CategoryLanguage', 'category_id', 'category_id');
	}    
  
	public function bannerlanguage() {
		return $this->hasOne('BannerLanguage', 'banner_id', 'id_banner');
	}

}
