<?php

class Product extends Eloquent {

	protected $table = 'products';
    protected $primaryKey = 'id_product';
    public static $rules = ['languageField.1.name'=>'required','image1'=>'mimes:png,jpg,jpeg,gif','image2'=>'mimes:png,jpg,jpeg,gif'];
    
	public function productlanguage() {
		return $this->hasOne('ProductLanguage', 'product_id', 'id_product');
	}			
}
