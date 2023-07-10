<?php

class PageLanguage extends Eloquent {

	protected $table = 'pages_language';
    protected $primaryKey = 'id';
    public $timestamps = false;

	public function setTitleAttribute($value) {
		$this->attributes['title'] = $value;
		$this->attributes['sef_url'] = Str::slug($value);
	}    

	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	}
	
}
