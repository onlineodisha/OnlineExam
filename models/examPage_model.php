<?php
class ExamPage_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	function examQuestionsByExamType()
	{
		return $this->db->select("SELECT * FROM `question_table` WHERE exam_type = 'Banking' AND set_no = 'set-1' LIMIT 1");
	}
	function totalNoOfQuestion()
	{
		return $this->db->select("SELECT COUNT(id) AS totalQuestion FROM `question_table` WHERE exam_type = 'Banking' AND set_no = 'set-1'");	
	}

}