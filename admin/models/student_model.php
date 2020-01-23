<?php
class Student_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	function insertStudentEnrollment($data)
	{
		return $this->db->insert('student_details', $data);
	}

	function getAllStudentDetails()
	{
		return $this->db->select("SELECT * FROM student_details");
	}
	function getStudentById($id)
	{
		return $this->db->select("SELECT * FROM student_details WHERE id = ".$id);
	}

	

}