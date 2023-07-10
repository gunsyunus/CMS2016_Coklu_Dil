<?php

class PhotoItem extends Eloquent {

	protected $table = 'pages_gallery_photo';
    protected $primaryKey = 'id_photo';
    public static $rules = ['upload'=>'required|mimes:png,jpg,jpeg,gif'];
    public $timestamps = false;
  
}
