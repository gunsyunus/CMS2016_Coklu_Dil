<?php

class Setting extends Eloquent {

	protected $table = 'settings';
    protected $primaryKey = 'id_setting';

	public static $rules = [
    	'general' => [ 
	       	'email_admin'=>'email',
	       	'email_info'=>'email'
        ],
        'text' => [ 
            'languageField.1.title'=>'required'
        ],        
    	'file' => [
			'image'=>'mimes:png,jpg,jpeg,gif,pdf,rar'
        ]
    ];

    public $timestamps = false;

    public function language() {
        return $this->belongsTo('Language', 'language_id', 'id_language');
    }    

}
