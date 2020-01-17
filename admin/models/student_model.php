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

	function getAllStudentDatails()
	{
		return $this->db->select("SELECT * FROM student_details");
	}

}