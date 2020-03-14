<?php
class ExamPage_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	function examQuestionsByExamType($param)
	{
		return $this->db->select("SELECT * FROM `question_table` ".$param."");
	}
	function totalNoOfQuestion()
	{
		return $this->db->select("SELECT COUNT(id) AS totalQuestion FROM `question_table` WHERE exam_type = 'Banking' AND set_no = 'set-1'");	
	}
	function getExamTypeBySetNo($setNo)
	{
		return $this->db->select("SELECT * FROM `question_table` WHERE set_no = '".$setNo."' GROUP BY exam_type");
	}

	function getSubjectListBySetNo($setNo)
	{
		return $this->db->select("SELECT * FROM `question_table` WHERE set_no = '".$setNo."' GROUP BY subject ORDER BY id ");
	}

	function allTempExamData($setNo)
	{
		return $this->db->select("SELECT * FROM `question_table` WHERE set_no = '".$setNo."'");
	}

	function insertAllTempExamData($data)
	{

		return $this->db->insert('exam_temp',$data);
	}

	function getExamDataByParam($param)
	{
		return $this->db->select("SELECT * FROM `exam_temp` ".$param."");
	}
}