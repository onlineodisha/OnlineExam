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

	function updateExamTypeData($data,$id)
	{
		return $this->db->update('exam_type', $data,
			"`id` = $id");
	}

	function getAllStudentDetails()
	{
		return $this->db->select("SELECT * FROM student_details");
	}

	function getAllExamTypes()
	{
		return $this->db->select("SELECT * FROM exam_type WHERE exam_type_id != 0 ORDER BY exam_type_id ASC");
	}

	function getAllParentExamType()
	{

		return $this->db->select("SELECT * FROM exam_type WHERE exam_type_id = 0");
	}
	function getExamTypeByName($examName)
	{

		return $this->db->select("SELECT * FROM exam_type WHERE exam_name = '".$examName."' AND exam_type_id = 0 ");
	}

	function getExamTypeById($id)
	{
		return $this->db->select("SELECT * FROM exam_type WHERE id = ".$id);
	}

	function getStudentById($id)
	{
		return $this->db->select("SELECT * FROM student_details WHERE id = ".$id);
	}
	function addSubjectName($data)
	{
		return $this->db->insert('subject_details', $data);
	}
	function getAllSubjectDetails()
	{
		return $this->db->select("SELECT * FROM subject_details");
	}
	function getSubjectById($id)
	{
		return $this->db->select("SELECT * FROM subject_details WHERE id = ".$id);
	}

	public function updateSubjectDate($data,$id)
	{
		return $this->db->update('subject_details', $data,
			"`id` = $id");
	}

	public function deleteSubjectDetails($id)   
	{
		$this->db->delete('subject_details', "`id` = {$id}");
		
	}

	public function deleteExamTypeDetails($id)
	{
		$this->db->delete('exam_type', "`id` = {$id}");
	}
}