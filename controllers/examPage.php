<?php
	
	class ExamPage extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index()
	{
		$this->view->examQuestions = $this->getQuestionsByExamTypre();
		$this->view->totalNoOfQuestion	=	$this->totalNoOfQuestion();
		$this->view->render('examPage/index',true);
	}

	function getQuestionsByExamTypre()
	{
		return $this->model->examQuestionsByExamType();
	}
	function totalNoOfQuestion()
	{
		return $this->model->totalNoOfQuestion();
	}
}