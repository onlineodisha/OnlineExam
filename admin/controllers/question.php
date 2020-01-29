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
		$examName	=	isset($_REQUEST['examName']) ? $_REQUEST['examName'] : '';
		$id 		=	isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
		if($id != '')
		{
			$param 	=	"WHERE id = ".$id."";
			echo json_encode($this->model->getExamDataByPama($param));
		}
		elseif($examName != '')
		{
			$param 	= 	"WHERE exam_name='".$examName."'";
			echo json_encode($this->model->getExamDataByPama($param));
		}else
		{
			$param 	= 	"WHERE exam_type_id = 0";
			echo json_encode($this->model->getExamDataByPama($param));
		}
	}
	function addQuestion()
	{
		echo "<pre>";print_r($_REQUEST);die;
	}
}