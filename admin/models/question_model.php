<?php
class Question_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

	function getExamDataByPama($param='')
	{
		return $this->db->select("SELECT * FROM exam_type ".$param."");
	}

	function addQuestionDetails($data)
	{
		return $this->db->insert('question_table',$data);
	}

	function getQuestionDetailsByParam($param)
	{
		
		return $this->db->select("SELECT * FROM `question_table` ".$param."");
	}
	
}