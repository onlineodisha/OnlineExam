<?php
class IndexPage_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	public function run()
	{
		
		$username=$_REQUEST['username'];
		//$email=$_POST['email'];
		//fe01ce2a7fbac8fafaed7c982a04e229(demo) old password
		/*$password=md5($_REQUEST['password']);*/
		$password = $_REQUEST['password'];
		$res= $this->db->select("SELECT * FROM `student_details` WHERE username = '".$username."' AND password = '".$password."' AND is_active = 1 ");
	    $count = count($res);
		if ($count > 0) 
		{
			Session::set('role', "user");
			Session::set('loggedIn', true);
			Session::set('id', $res[0]['id']);
			Session::set('username', $res[0]['username']);
			Session::set('password', $res[0]['password']);
			Session::set('email', $res[0]['email']);
			header('location: '.URL.'indexPage/instructions');
		} 
	   else 
	   {
		Session::set('loggedIn', false);
		header('location: '.URL);
		}
	}

	function getAllSetById($sId)
	{
		return $this->db->select("SELECT * FROM set_assign WHERE student_id = ".$sId." AND is_active = 1 ");
	}

}