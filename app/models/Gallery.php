<?php

class Gallery extends Eloquent {

	protected $table = 'products_gallery';
    protected $primaryKey = 'id_gallery';
    public static $rules = ['upload'=>'required|mimes:png,jpg,jpeg,gif'];
    public $timestamps = false;
  
}
