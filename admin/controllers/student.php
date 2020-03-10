<?php
	
	class Student extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		
		$this->view->render('student/enrollment');
		}

	function setAssign()
	{
		$this->view->render('student/setAssign');
	}
	function createStudentEnrollment()
	{

		$name				=	isset($_REQUEST['name'])?$_REQUEST['name']:'';
		$fatherName			=	isset($_REQUEST['fName'])?$_REQUEST['fName']:'';
		$username			=	isset($_REQUEST['username'])?$_REQUEST['username']:'';
		$password			=	isset($_REQUEST['password'])?$_REQUEST['password']:'';
		$address			=	isset($_REQUEST['address'])?$_REQUEST['address']:'';
		$gender				=	isset($_REQUEST['gender'])?$_REQUEST['gender']:'';
		$dob				=	isset($_REQUEST['dob'])?$_REQUEST['dob']:'';
		$mobileNo			=	isset($_REQUEST['mobileNo'])?$_REQUEST['mobileNo']:'';
		$email				=	isset($_REQUEST['email'])?$_REQUEST['email']:'';
		$idProofNo			=	isset($_REQUEST['idNo'])?$_REQUEST['idNo']:'';
		$highestDegree		=	isset($_REQUEST['highestDegree'])?$_REQUEST['highestDegree']:'';
		$date				=	date('Y-m-d h:i:s');

		$studentEnrollmentData	=	array('name' => $name, 'username' => $username, 'password' => $password, 'father_name' => $fatherName, 'address' => $address, 'gender' => $gender, 'dob' => $dob, 'mobile_no' => $mobileNo, 'email' => $email, 'id_proof_no' => $idProofNo, 'highest_degree' => $highestDegree,'created_date' => $date);
		
		$insertStudentData	=	$this->model->insertStudentEnrollment($studentEnrollmentData);
	
		$allStudentData = $this->model->getAllStudentDetails();
		echo json_encode($allStudentData); 
	}

	function editStudentEnrollment()
	{
		$id					=	isset($_REQUEST['id'])?$_REQUEST['id']:'';
		$name				=	isset($_REQUEST['name'])?$_REQUEST['name']:'';
		$fatherName			=	isset($_REQUEST['fName'])?$_REQUEST['fName']:'';
		$username			=	isset($_REQUEST['username'])?$_REQUEST['username']:'';
		$password			=	isset($_REQUEST['password'])?$_REQUEST['password']:'';
		$address			=	isset($_REQUEST['address'])?$_REQUEST['address']:'';
		$gender				=	isset($_REQUEST['gender'])?$_REQUEST['gender']:'';
		$dob				=	isset($_REQUEST['dob'])?$_REQUEST['dob']:'';
		$mobileNo			=	isset($_REQUEST['mobileNo'])?$_REQUEST['mobileNo']:'';
		$email				=	isset($_REQUEST['email'])?$_REQUEST['email']:'';
		$idProofNo			=	isset($_REQUEST['idNo'])?$_REQUEST['idNo']:'';
		$highestDegree		=	isset($_REQUEST['highestDegree'])?$_REQUEST['highestDegree']:'';
		$date				=	date('Y-m-d');

		$studentEnrollmentData	=	array('name' => $name, 'username' => $username, 'password' => $password, 'father_name' => $fatherName, 'address' => $address, 'gender' => $gender, 'dob' => $dob, 'mobile_no' => $mobileNo, 'email' => $email, 'id_proof_no' => $idProofNo, 'highest_degree' => $highestDegree,'updated_date' => $date);
		
		$insertStudentData	=	$this->model->updateStudentEnrollment($studentEnrollmentData,$id);
		
		$allStudentData = $this->model->getAllStudentDetails();
		echo json_encode($allStudentData); 
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

	function deleteStudentDtls()
	{
		$id 	=	isset($_GET['id'])?$_GET['id']:'';
		$this->model->deleteStudentDetails($id);
	}

	function showAllExamType()
	{
		$showAllExamType	=	$this->model->showAllExamType();
		echo json_encode($showAllExamType);
	}

	function getAllSetName()
	{
		$allSetDetails = $this->model->getAllStudentDetails();
	}
	
	function assignSet()
	{
		$sId        =	isset($_REQUEST['studentId'])?$_REQUEST['studentId']:'';
		$sName      =	isset($_REQUEST['studentName'])?$_REQUEST['studentName']:'';
		$selectSet  =	isset($_REQUEST['selectSet'])?$_REQUEST['selectSet']:'';
		$examType   =	isset($_REQUEST['selectExamType'])?$_REQUEST['selectExamType']:'';
		$date =	date('Y-m-d');

		$assignSetData	=	array('student_name' => $sName, 'exam_type' => $examType, 'set_no' => $selectSet, 'date' => $date, 'student_id' => $sId );
		$setAssignData = $this->model->assignSetData($assignSetData);
	
		$allAssignSet = $this->model->getAllAssignSet();
		echo json_encode($allAssignSet); 
	}

	function allAssignSet()
	{
		$allAssignDetails	=	$this->model->getAllAssignSet();
        echo json_encode($allAssignDetails);
	}
}