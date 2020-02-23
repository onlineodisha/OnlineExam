<?php
	
	class ExamPage extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index()
	{
		//$this->view->examQuestions = $this->getQuestionsByExamTypre();
		//echo "<pre>";print_r($this->view->examQuestions);die;
		//$this->view->totalNoOfQuestion	=	$this->totalNoOfQuestion();
		$this->view->render('examPage/index',true);
	}

	function getQuestionsByExamTypre()
	{
		 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		$setName = isset($_REQUEST['setName'])?$_REQUEST['setName']:'';
		return $this->model->examQuestionsByExamType();
	}
	function totalNoOfQuestion()
	{
		return $this->model->totalNoOfQuestion();
	}
}