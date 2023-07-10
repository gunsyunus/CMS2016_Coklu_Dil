<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users_a';
    protected $primaryKey = 'id_user';

	public static $rules = [
    	'login' => [ 
	       	'email' => 'required',
	       	'password' => 'required'
        ],
    	'crud' => [
        	'email'=>'required|email',
            'password'=>'required|min:8',
        	'name' => 'required'
        ],
        'update' => [
            'email'=>'required|email',
            'name' => 'required'
        ],        
    	'security' => [
        	'password'=>'required|min:8'
        ]
    ];

	protected $hidden = array('password','remember_token');

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}

}
