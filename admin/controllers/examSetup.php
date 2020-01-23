<?php
	
	class ExamSetup extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		
		$this->view->render('examSetup/index');
		}

	function subject()
	{
		$this->view->render('examSetup/subject');
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

		$getExamTypeDetails = $this->model->getExamTypeByName($examName);
		
		if(isset($getExamTypeDetails[0]['exam_name']) == "$examName")
		{
			$examTypeData	=	array('exam_name' => $examName, 'exam_time' => $examTime, 'subject_name' => $subjectName, 'no_of_question' => $noOfQuestion, 'mark_add' => $addMark, 'mark_minus' => $minusMark, 'exam_type_id' => $getExamTypeDetails[0]['id'],'created_date' => $date);
			
			$insertExamTypeData	=	$this->model->addExamtype($examTypeData);
		}
		else
		{
			$examTypeData	=	array('exam_name' => $examName, 'exam_time' => $examTime, 'created_date' => $date);
			

			$insertExamTypeData	=	$this->model->addExamtype($examTypeData);

			$getExamTypeDetails = $this->model->getExamTypeByName($examName);

			$examTypeData1	=	array('exam_name' => $examName, 'exam_time' => $examTime, 'subject_name' => $subjectName, 'no_of_question' => $noOfQuestion, 'mark_add' => $addMark, 'mark_minus' => $minusMark, 'exam_type_id' => $getExamTypeDetails[0]['id'],'created_date' => $date);
			

			$insertExamTypeData	=	$this->model->addExamtype($examTypeData1);
		}
		
		
		
	
		$allExamTypesData = $this->model->getAllExamTypes();
		echo json_encode($allExamTypesData); 
	}

	function getAllExamType()
	{
		$allExamTypesData = $this->model->getAllExamTypes();
		echo json_encode($allExamTypesData); 
	}

	function getAllParentExamTypes()
	{
		$allExamTypesData = $this->model->getAllParentExamType();
		echo json_encode($allExamTypesData); 
	}

	function addSubjectName()
	{
		$subjectName 	   =	isset($_REQUEST['subjectName'])?$_REQUEST['subjectName']:'';
		$created_date      =    Date('Y-m-d');
		$subjectData 	   =   array('subject_name' => ucfirst($subjectName), 'created_date' => $created_date);
		$insertSubject	   =	$this->model->addSubjectName($subjectData); 
		$allsubjectDetails = $this->model->getAllSubjectDetails();
		echo json_encode($allsubjectDetails); 
	}

	function editSubjectName()
	{
		$subjectName 	   =	isset($_REQUEST['subjectName'])?$_REQUEST['subjectName']:'';
		$id 	  		   =	isset($_REQUEST['sId'])?$_REQUEST['sId']:'';
		
		if($id != '')
		{
			$subjectData 	   =   array('subject_name' => ucfirst($subjectName));
			$updateSubjectData = $this->model->updateSubjectDate($subjectData, $id);

		}
		
		$allsubjectDetails = $this->model->getAllSubjectDetails();
		echo json_encode($allsubjectDetails); 
	}
	function showAllSubjectName()
	{
		
		$allSubjectName = $this->model->getAllSubjectDetails();
		echo json_encode($allSubjectName); 
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
	function getSubjectDetailByID()
	{
		$id 	=	isset($_GET['id'])?$_GET['id']:'';

			if($id != '')
			{
			$subjectDetails	=	$this->model->getSubjectById($id);
            echo json_encode($subjectDetails);
			}
	}

	function deleteSubjectDetails()
	{
		$id 	=	isset($_GET['id'])?$_GET['id']:'';
		$this->model->deleteSubjectDetails($id);

	}

	
}