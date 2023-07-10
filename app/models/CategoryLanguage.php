<?php

class CategoryLanguage extends Eloquent {

	protected $table = 'categories_language';
    protected $primaryKey = 'id';
    public $timestamps = false;

	public function setNameAttribute($value) {
		$this->attributes['name'] = $value;
		$this->attributes['sef_url'] = Str::slug($value);
	}   

	public function language() {
		return $this->belongsTo('Language', 'language_id', 'id_language');
	}

    public function scopeAccordion($query,$activeCode) {
    	return $query->where('language_id',$activeCode);
   	}	
	
}
