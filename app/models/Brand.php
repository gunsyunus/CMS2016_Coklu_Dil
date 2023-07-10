<?php

class Brand extends Eloquent {

	protected $table = 'brands';
    protected $primaryKey = 'id_brand';
    public static $rules = ['bname'=>'required']; 
    
	public function setBnameAttribute($value) {
		$this->attributes['bname'] = $value;
		$this->attributes['sef_url'] = Str::slug($value);
	}

	public function brandlanguage() {
		return $this->hasOne('BrandLanguage', 'brand_id', 'id_brand');
	}	

	    
}
