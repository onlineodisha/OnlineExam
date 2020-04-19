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

	function getExamDataByParam($param='')
	{
		//echo "<pre>";print_r("SELECT * FROM `exam_temp` ".$param."");die;
		return $this->db->select("SELECT * FROM `exam_temp` ".$param."");
	}
	function getTempExamCoundDataByParam($param='')
	{
		return $this->db->select("SELECT COUNT(id) AS total, selected_btn FROM `exam_temp` ".$param."");
	}
	function getTotalQuestion($setNo,$subject)
	{
		
		return $this->db->select("SELECT * FROM exam_temp WHERE set_no = '".$setNo."' AND subject = '".$subject."' ORDER BY q_no ASC ");
	}

	function getExamTime($examType)
	{
	
		return $this->db->select("SELECT * FROM `exam_type` WHERE exam_name = '".$examType."' AND exam_type_id = 0");
	}
	function updateExamTemp($data,$id)
	{
		$this->db->update('exam_temp', $data,
			"`id` = $id");
	}
}