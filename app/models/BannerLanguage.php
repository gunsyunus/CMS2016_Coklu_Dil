<?php

class BannerLanguage extends Eloquent {

	protected $table = 'banners_language';
    protected $primaryKey = 'id';
    public $timestamps = false;

	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	} 
  
}
