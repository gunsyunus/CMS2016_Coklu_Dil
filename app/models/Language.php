<?php

class Language extends Eloquent {

	protected $table = 'languages';
    protected $primaryKey = 'id_language';
    public static $rules = ['name'=>'required','image'=>'mimes:png,jpg,jpeg,gif']; 
        
}
