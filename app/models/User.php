<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends RestResourceModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        
        protected $guarded = array('id', 'created_at', 'updated_at', 'deleted_at');
        
        protected static $validation = array(
            'email' => 'sometimes|required|email|unique:users,deleted_at,NULL',
            'password' => 'sometimes|required|min:8',
        );
}
