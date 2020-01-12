<?php
	
	class Index extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		
		$this->view->render('index/index',true);
		}

	 function run()
	{	
		$this->model->run();
		
	}
	 function logout()
	{
		Session::destroy();
		header('location: '.URL);
		exit;
	}

}