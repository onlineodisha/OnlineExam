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

}