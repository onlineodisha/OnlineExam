<?php
	
	class Student extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		
		$this->view->render('student/enrollment');
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

	function showAllStudentDetails()
	{
		
		$allStudentData = $this->model->getAllStudentDetails();
		echo json_encode($allStudentData); 
	}
}