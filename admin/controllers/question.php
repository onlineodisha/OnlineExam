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
		$examType 		=	isset($_REQUEST['selectExamType']) ? $_REQUEST['selectExamType'] : '';
		$examTime 		=	isset($_REQUEST['examTime']) ? $_REQUEST['examTime'] : '';
		$selectSubject 	=	isset($_REQUEST['selectSubject']) ? $_REQUEST['selectSubject'] : '';
		$setSelect 		=	isset($_REQUEST['setSelect']) ? $_REQUEST['setSelect'] : '';
		$questionNo 	=	isset($_REQUEST['selectQNo']) ? $_REQUEST['selectQNo'] : '';

		$QTitle 		=	isset($_REQUEST['questionTitle']) ? $_REQUEST['questionTitle'] : '';
		$Qoptions1 		=	isset($_REQUEST['option1']) ? $_REQUEST['option1'] : '';
		$Qoptions2 		=	isset($_REQUEST['option2']) ? $_REQUEST['option2'] : '';
		$Qoptions3 		=	isset($_REQUEST['option3']) ? $_REQUEST['option3'] : '';
		$Qoptions4 		=	isset($_REQUEST['option4']) ? $_REQUEST['option4'] : '';
		$Qanswere 		=	isset($_REQUEST['correctOption']) ? $_REQUEST['correctOption'] : '';
		
		
			$questionData 	=	array('exam_type' 	=> 	$examType,
									'set_no' 		=>	$setSelect,
									'subject'		=>	$selectSubject,
									'q_no'			=>	$questionNo,
									'q_title' 		=>	$QTitle,
									'q_option1'		=>	$Qoptions1,
									'q_option2'		=>	$Qoptions2,
									'q_option3'		=>	$Qoptions3,
									'q_option4'		=>	$Qoptions4,
									'correct_option'=>	$Qanswere,
									'created_date'	=>	date('Y-m-d') 	
								);

			$insertQuestion = $this->model->addQuestionDetails($questionData);
				
	}

	function getQuestionData()
	{
		$examType 		=	isset($_REQUEST['examType']) ? $_REQUEST['examType'] : '';
		$setNo 			=	isset($_REQUEST['setNo']) ? $_REQUEST['setNo'] : '';
		$subjectName 	=	isset($_REQUEST['subjectName']) ? $_REQUEST['subjectName'] : '';
		$Qno 		=	isset($_REQUEST['Qno']) ? $_REQUEST['Qno'] : '';
		
		$param       = "WHERE exam_type = '".$examType."' AND set_no = '$setNo' AND subject = '$subjectName' AND q_no = '$Qno' ";

		$questionDetails	=	$this->model->getQuestionDetailsByParam($param);
		echo json_encode($questionDetails);
	}
}
	
