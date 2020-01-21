<?php
	
	class Question extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index()
	{
		$this->view->render('question/index');
	}
	function getExamData()
	{
		echo json_encode($this->model->getExamData());
	}
}