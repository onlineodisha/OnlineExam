<?php
	
	class Login extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		$this->view->render('login/index',true);
		}

	 function run()
	{	echo 43354;
		$this->model->run();
		
	}
	 function logout()
	{
		Session::destroy();
		header('location: '.URL);
		exit;
	}

}