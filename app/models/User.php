<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	private $users = array(
		'deepak' => array('check@123', 'proctor'),
		'neeraj' => array('check@123', 'admin')
	);
	
	public function getAccess($username){
		foreach($this->users as $saved_user => $details){
			if($saved_user == $username){
				if(isset($this->users[$username][1]) && !empty($this->users[$username][1]))
				return json_encode(array('success' => $this->users[$username][1]));
			}
		}
		return json_encode(array('error' => 'Dashboard not found or user not found. Contact IT department'));
	}
	
	public function verify($username, $password){
		foreach($this->users as $saved_user => $details){
			if($saved_user == $username && $details[0] == $password){
				return json_encode(array("success" => "User found"));
			}
		}
		return json_encode(array("error" => "username or password do not match"));
	}
	
	public function createSession($username){
		Session::put('username', $username);
		Session::put('access_level', $this->users[$username][1]);
		if(Session::has('username') && Session::get('username') == $username && Session::has('access_level')){
			return json_encode(array('success' => 'Session created successfully'));
		} else {
			return json_encode(array('error' => 'Something went wrong while creating session'));
		}
	}
	
	public function logout(){
		Session::flush();
		if(Session::has('username')){
			return json_encode(array('error' => 'Something went wrong. Unable to logout'));
		} else {
			return json_encode(array('success' => 'Logged out successfully'));
		}
	}

}
