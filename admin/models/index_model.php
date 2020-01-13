<?php
class Index_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	public function run()
	{
		$username=$_REQUEST['username'];
		$password=MD5($_REQUEST['password']);
		
		$res= $this->db->select("SELECT * FROM `admin` WHERE username = '".$username."' AND password = '".$password."' AND is_active = 1 ");
	    $count = count($res);
		if ($count > 0) 
		{
			Session::set('role', "user");
			Session::set('loggedIn', true);
			Session::set('id', $res[0]['id']);
			Session::set('username', $res[0]['username']);
			Session::set('password', $res[0]['password']);
			Session::set('email', $res[0]['email']);
			header('location: '.URL.'dashboard');
		} 
	   else 
	   {
		Session::set('loggedIn', false);
		header('location: '.URL.'admin');
		}
	}

}