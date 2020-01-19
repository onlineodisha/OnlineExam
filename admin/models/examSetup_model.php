<?php
class ExamSetup_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	function addExamtype($data)
	{
		return $this->db->insert('exam_type', $data);
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