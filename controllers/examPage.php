<?php
	
	class ExamPage extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index()
	{
		$setNo 	=	isset($_COOKIE['setNo'])?$_COOKIE['setNo']:'';
		$stuId	=	isset($_SESSION['id'])?$_SESSION['id']:'';
		$this->view->setNo = $setNo;
		$this->allTempExamData = $this->model->allTempExamData($setNo);
		$this->view->examType = $this->model->getExamTypeBySetNo($setNo);
		if(is_array($this->view->examType) && count($this->view->examType) != '')
		{
			$this->view->examTime = $this->model->getExamTime($this->view->examType[0]['exam_type']);

		}
		$exam_Name = $this->view->examType[0]['exam_type'];
		$this->view->subjectList = $this->model->getSubjectListBySetNo($setNo);
		$param =	"WHERE set_no = '".$setNo."'";
		$validationCheck = $this->model->getExamDataByParam($param);
		if(empty($validationCheck))
		{
			for($i=0; $i<count($this->allTempExamData); $i++)
			{
				$data = array('stu_id'=> $stuId, 
							  'exam_name'=>  $exam_Name,
							  'set_no'=> $setNo,
							  'subject'=> $this->allTempExamData[$i]['subject'],
							  'q_no'=> $this->allTempExamData[$i]['q_no'],
							  'temp_qtitle' => $this->allTempExamData[$i]['q_title'],
							  'temp_opt1' => $this->allTempExamData[$i]['q_option1'],
							  'temp_opt2' => $this->allTempExamData[$i]['q_option2'],
							  'temp_opt3' => $this->allTempExamData[$i]['q_option3'],
							  'temp_opt4' => $this->allTempExamData[$i]['q_option4'],
							  'correct_option'=> $this->allTempExamData[$i]['correct_option'],
							  'exam_date'=> Date('Y-m-d')

				);
				$insertTempExamData = $this->model->insertAllTempExamData($data);
			}
		}
		//$this->view->totalNoOfQuestion = $this->model->getTotalQuestion($setNo);
		/*echo "<pre>"; print_r($this->view->subjectList); */
		//echo "<pre>";print_r($_COOKIE);die;
		//$this->view->examQuestions = $this->getQuestionsByExamTypre();
		//echo "<pre>";print_r($this->view->examQuestions);die;
		//$this->view->totalNoOfQuestion	=	$this->totalNoOfQuestio0-n();
		$this->view->render('examPage/index',true);
	}

	function getQuestionsByExamTypre()
	{
		$setName 	= isset($_REQUEST['setName'])?$_REQUEST['setName']:'';
		$ID 	 	= isset($_REQUEST['ID'])?$_REQUEST['ID']:'';
		$returnData = '';
		if($ID != 'undefined' && $ID != '')
		{
			$param 		=	"WHERE id NOT IN(".$ID.") AND exam_type = 'Banking' AND set_no = '".$setName."' LIMIT 1";
			$returnData = $this->model->examQuestionsByExamType($param);
		}
		elseif($setName != '')
		{	
			$param 		=	"WHERE exam_type = 'Banking' AND set_no = '".$setName."' LIMIT 1";
			$returnData = $this->model->examQuestionsByExamType($param);
		}
		echo json_encode($returnData);	
	}
	function totalNoOfQuestion()
	{
		return $this->model->totalNoOfQuestion();
	}

	function getExamDataBySubject()
	{
		$subjectName = isset($_REQUEST['subjectName'])?$_REQUEST['subjectName']:'';
		$param = '';
		if($subjectName != '')
		{
			$param = "WHERE subject= '".$subjectName."' AND status = 1 ORDER BY id ASC LIMIT 1";
		}
		$examDataBySubjectName = $this->model->getExamDataByParam($param);
		echo json_encode($examDataBySubjectName);
	}
	function getExamDataById()
	{
		$ID 	= isset($_REQUEST['ID'])?$_REQUEST['ID']:'';
		$param 	= '';
		if($ID != '')
		{
			$param = "WHERE id = ".$ID."";
			$examDataBySubjectName = $this->model->getExamDataByParam($param);

			if($examDataBySubjectName[0]['selected_btn'] == 'notVisited' || $examDataBySubjectName[0]['selected_btn'] == 'ClearResponse')
			{
				$updateTableDate 	=	array('selected_btn' => 'NotAnswere');
			}
			else 
			{

			}
			$updateExamData = $this->model->updateExamTemp($updateTableDate,$ID);
			$examData = $this->model->getExamDataByParam($param);
			echo json_encode($examData);
		}
		
		/*if($ID != '')
		{
			$updateTableDate 	=	array('selected_btn' => 'NotAnswere');
			$updateExamData = $this->model->updateExamTemp($updateTableDate,$ID);
			$param = "WHERE id = ".$ID."";
			$examDataBySubjectName = $this->model->getExamDataByParam($param);
			echo json_encode($examDataBySubjectName);
		}*/
	}
	function getAllquestion()
	{
		$setNo 		= 	isset($_REQUEST['setNo'])?$_REQUEST['setNo']:'';
		$subject 	=	isset($_REQUEST['subject'])?$_REQUEST['subject']:''; 
		$getAllquestion = $this->model->getTotalQuestion($setNo,$subject);
		echo json_encode($getAllquestion);
	}
	//update question and answere in exam temp table
	function updateQA()
	{
		$ID 		= 	isset($_REQUEST['ID'])?$_REQUEST['ID']:'';
		$btnVal		=	isset($_REQUEST['btnVal'])?$_REQUEST['btnVal']:'';
		$radioVal	=	isset($_REQUEST['option'])?$_REQUEST['option']:'';
		$subject  	=	isset($_REQUEST['subject'])?$_REQUEST['subject']:'';
		$nextQuestionID = '';
		$setNo ='';

		if($ID != '')
		{
			$QAdata = '';
			$param = "WHERE id = ".$ID."";
			$examDataByid = $this->model->getExamDataByParam($param);
			$setNo = $examDataByid[0]['set_no'];
			if($radioVal != 'undefined') // With Selected Option
			{
				if ($btnVal == 'ClearResponse') // For Clear Response
				{
					$QAdata = array(
						'selected_option' 	=> 	NULL,
						'selected_btn' 		=>	$btnVal
						//'status'			=>	0	
					  );
					$updateNextQData = $this->model->updateExamTemp($QAdata,$ID);
				}
				else if($btnVal == 'Save')
				{
					$QAdata = array(
							'selected_option' 	=> 	$radioVal,
							'selected_btn' 		=>	$btnVal,
							'status'			=>	0,	
						  );
					$updateExamData = $this->model->updateExamTemp($QAdata,$ID);
					//For Getting Next Qno Details
					if($examDataByid[0]['id'] != '')
					{
						$nextQuestionID = $examDataByid[0]['id'] + 1;
						$param = "WHERE id = ".$nextQuestionID."";
						$nextQData = $this->model->getExamDataByParam($param);
						if($nextQData[0]['selected_btn'] == 'notVisited' || $nextQData[0]['selected_btn'] == 'NotAnswere' )
						{
							$nextQData = array(
									'selected_btn' 		=>	'NotAnswere'
							);
						}
						else if($nextQData[0]['selected_btn'] == 'Save')
						{
							$nextQData = array(
									'selected_btn' 		=>	'Save'
									);
						}
						else if($nextQData[0]['selected_btn'] == 'MarkForView')
						{
							
							$nextQData = array(
									'selected_btn' 		=>	'MarkForView'
							);
						}
						else if($nextQData[0]['selected_btn'] == 'MarkForReview')
						{
							$nextQData = array(
									'selected_btn' 		=>	'MarkForReview'
							);
						}
						else
						{

						}
						$updateNextQData = $this->model->updateExamTemp($nextQData,$nextQuestionID);
					}
				} // Save End
				else if($btnVal == 'MarkForView') // Save and Mark for View 
				{
					$QAdata = array(
							'selected_option' 	=> 	$radioVal,
							'selected_btn' 		=>	$btnVal,
							'status'			=>	0,	
						  );
					$updateExamData = $this->model->updateExamTemp($QAdata,$ID);
					$nextQuestionID = $examDataByid[0]['id'] + 1;
					$param = "WHERE id = ".$nextQuestionID."";
					$nextQData = $this->model->getExamDataByParam($param);
					if($nextQData[0]['selected_btn'] == 'notVisited' || $nextQData[0]['selected_btn'] == 'NotAnswere' )
						{
							$nextQData = array(
									'selected_btn' 		=>	'NotAnswere'
							);
						}
						else if($nextQData[0]['selected_btn'] == 'Save')
						{
							$nextQData = array(
									'selected_btn' 		=>	'Save'
									);
						}
						else if($nextQData[0]['selected_btn'] == 'MarkForView')
						{
							
							$nextQData = array(
									'selected_btn' 		=>	'MarkForView'
							);
						}
						else if($nextQData[0]['selected_btn'] == 'MarkForReview')
						{
							$nextQData = array(
									'selected_btn' 		=>	'MarkForReview'
							);
						}
						else
						{

						}
						$updateNextQData = $this->model->updateExamTemp($nextQData,$nextQuestionID);
				}
				

			}
			else // Without Select any Option
			{
				if($btnVal == 'Save')
				{
					$QAdata = array(
									'selected_btn' 		=> 'NotAnswere'	
								  );
					$updateExamData = $this->model->updateExamTemp($QAdata,$ID);
					$param = "WHERE id = ".$ID."";
					$examDataByid = $this->model->getExamDataByParam($param);
					if($examDataByid[0]['id'] != '')
					{
						$nextQuestionID = $examDataByid[0]['id'] + 1;
						$param = "WHERE id = ".$nextQuestionID."";
						$nextQData = $this->model->getExamDataByParam($param);
						if($nextQData[0]['selected_btn'] == 'notVisited' || $nextQData[0]['selected_btn'] == 'NotAnswere' )
						{
							$nextQData = array(
									'selected_btn' 		=>	'NotAnswere',
							);
						}
						else if($nextQData[0]['selected_btn'] == 'Save')
						{
							$nextQData = array(
									'selected_btn' 		=>	'Save'
									);
						}
						/*else if($nextQData[0]['selected_btn'] == 'MarkForView')
						{
							$nextQData = array(
									'selected_btn' 		=>	'Save',
							$nextQData = array(
									'selected_btn' 		=>	'MarkForView',
							);
						}*/
						else if($nextQData[0]['selected_btn'] == 'MarkForReview')
						{
							$nextQData = array(
									'selected_btn' 		=>	'NotAnswere'
							);
						}
						else
						{

						}
						$updateNextQData = $this->model->updateExamTemp($nextQData,$nextQuestionID);
					}
				}// For Save End
				else if($btnVal == 'ClearResponse')
				{
					$QAdata = array(
						'selected_option' 	=> 	NULL,
						'selected_btn' 		=>	'NotAnswere'
						//'status'			=>	0	
					  );
					$updateNextQData = $this->model->updateExamTemp($QAdata,$ID);
				}
				else if($btnVal == 'MarkForReview')
				{
					$QAdata = array(
						'selected_option' 	=> 	NULL,
						'selected_btn' 		=>	'MarkForReview'
						//'status'			=>	0	
					  );
					$updateNextQData = $this->model->updateExamTemp($QAdata,$ID);
					$nextQuestionID = $examDataByid[0]['id'] + 1;
					$param = "WHERE id = ".$nextQuestionID."";
					$nextQData = $this->model->getExamDataByParam($param);
					if($nextQData[0]['selected_btn'] == 'notVisited' || $nextQData[0]['selected_btn'] == 'NotAnswere' )
						{
							$nextQData = array(
									'selected_btn' 		=>	'NotAnswere'
							);
						}
						else if($nextQData[0]['selected_btn'] == 'Save')
						{
							$nextQData = array(
									'selected_btn' 		=>	'Save'
									);
						}
						else if($nextQData[0]['selected_btn'] == 'MarkForView')
						{
							
							$nextQData = array(
									'selected_btn' 		=>	'MarkForView'
							);
						}
						else if($nextQData[0]['selected_btn'] == 'MarkForReview')
						{
							$nextQData = array(
									'selected_btn' 		=>	'MarkForReview'
							);
						}
						else
						{

						}
						$updateNextQData = $this->model->updateExamTemp($nextQData,$nextQuestionID);
				}
			}
		}
		
		if($subject != '' && $setNo)
		{	

			$getAllQues = $this->model->getTotalQuestion($setNo,$subject);
			$totalQNo 	= count($getAllQues)-1;
			$lQId = $getAllQues[$totalQNo]['id'];
			/*echo $lQId; die;*/
			//echo "$nextQuestionID != '' && $nextQuestionID <= $totalQNo";
			if($nextQuestionID != '' && $nextQuestionID <= $lQId)
			{ 
				$param = "WHERE subject= '".$subject."' AND id= ".$nextQuestionID." ";
			}							
			else
			{
				$param = "WHERE subject= '".$subject."' AND id= ".$ID." ";
			}
			//$param = "WHERE subject= '".$subject."' AND 'status = 1 ORDER BY id ASC LIMIT 1'";
			//$param = "WHERE subject= '".$subject."' ORDER BY id ASC LIMIT 1";
			$examDataBySubjectName = $this->model->getExamDataByParam($param);
			//echo "<pre>"; print_r($examDataBySubjectName);
			echo json_encode($examDataBySubjectName);	
		}
	}
	function getAllTempExamCountData()
	{
		$setNo 		= 	isset($_REQUEST['setNo'])?$_REQUEST['setNo']:'';
		$subject 	=	isset($_REQUEST['subject'])?$_REQUEST['subject']:'';
		if($setNo != '' && $subject != '')
		{
			$param = "WHERE set_no = '".$setNo."' AND subject = '".$subject."' GROUP BY selected_btn";
			$examDataBySubjectName = $this->model->getTempExamCoundDataByParam($param);
			echo json_encode($examDataBySubjectName);			
		}
	}
}