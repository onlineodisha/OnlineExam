<?php
	
	class ExamSetup extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		
		$this->view->render('examSetup/index');
		}

	function createExamSetup()
	{
		$examName				=	isset($_REQUEST['examName'])?$_REQUEST['examName']:'';
		$examTime				=	isset($_REQUEST['examTime'])?$_REQUEST['examTime']:'';
		$subjectName			=	isset($_REQUEST['subjectName'])?$_REQUEST['subjectName']:'';
		$noOfQuestion			=	isset($_REQUEST['noOfQuestion'])?$_REQUEST['noOfQuestion']:'';
		$addMark				=	isset($_REQUEST['addMark'])?$_REQUEST['addMark']:'';
		$minusMark				=	isset($_REQUEST['minusMark'])?$_REQUEST['minusMark']:'';
		$date					=	date('Y-m-d h:i:s');

		$examTypeData	=	array('exam_name' => $examName, 'exam_time' => $examTime, 'subject_name' => $subjectName, 'no_of_question' => $noOfQuestion, 'mark_add' => $addMark, 'mark_minus' => $minusMark, 'created_date' => $date);
		
		$insertExamTypeData	=	$this->model->addExamtype($examTypeData);
	
		//$allStudentData = $this->model->getAllStudentDetails();
		//echo json_encode($allStudentData); 
	}

	function showAllStudentDetails()
	{
		
		$allStudentData = $this->model->getAllStudentDetails();
		echo json_encode($allStudentData); 
	}

	function getStudentDetailByID()
	{
		$id 	=	isset($_GET['id'])?$_GET['id']:'';

			if($id != '')
			{
			$studentDetails	=	$this->model->getStudentById($id);
            echo json_encode($studentDetails);
			}

	}
}