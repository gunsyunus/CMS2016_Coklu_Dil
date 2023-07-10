<?php

class Photo extends Eloquent {

	protected $table = 'pages_gallery';
    protected $primaryKey = 'id_gallery';
    public static $rules = ['name'=>'required']; 
    public $timestamps = false;
  
}
