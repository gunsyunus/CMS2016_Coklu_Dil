<?php

class BrandLanguage extends Eloquent {

	protected $table = 'brands_language';
    protected $primaryKey = 'id';
    public $timestamps = false;

	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	}
	
}
