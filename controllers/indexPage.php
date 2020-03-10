<?php
	
	class IndexPage extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}
	

	function index()
	{
		$this->view->render('index/index',true);
	}

	function instructions()
	{
		$this->view->render('index/instructions',true);
	}

	function instructionsNext()
	{
		$userId = isset($_SESSION['id'])?$_SESSION['id']:'';
		if($userId != '')
		{
			$this->view->examSet = $this->model->getAllSetById($userId);
		}
		$this->view->render('index/instructionsNext',true);
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