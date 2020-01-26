<?php
	
	class Login extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		$this->view->render('login/index',true);
		}

}