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

	function updateStudentEnrollment($data,$id)
	{

		return $this->db->update('student_details', $data,
			"`id` = $id");
	}

	function deleteStudentDetails($id)
	{
		$this->db->delete('student_details', "`id` = {$id}");
	}

	function showAllExamType()
	{
		return $this->db->select("SELECT * FROM question_table GROUP BY exam_type");
	}
	
	function assignSetData($data)
	{
		echo "<pre>"; print_r($data);
		return $this->db->insert('set_assign', $data);
	}

	function getAllAssignSet()
	{
		return $this->db->select("SELECT * FROM set_assign");
	}

}