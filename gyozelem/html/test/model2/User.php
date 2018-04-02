<?php
class User {
    public static $TABLE_NAME='users';
	public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $city;
    public $country;
    protected $rank;
    protected $status;
    protected $ip;
    protected $browser;
    protected $reg_hash;
    protected $rec_hash;
    protected $created;
    protected $updated;
	
    public function login($data) {
		$email = validateString($data['email'], 'EMAIL') ? $data['email'] : false;
		$password = validateString($data['password'], 'ALPHA_NUM') ? $data['password'] : false;
		return $email.'-'.$password;
    }

}