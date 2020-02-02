<div class="right_col" role="main">
	<div class="bg-primary text-center text-white p-2 my-3"><h2 class="">Add Questions</h2></div>
    <div class="question border p-3">
    	<form id="questionFrom" name="questionFrom">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="examType">Exam Type:-</label>
		      <select name="selectExamType" id="selectExamType" class="form-control" onchange="examInfo()">
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Time:-</label>
		      <input name="examTime" type="text" class="form-control" id="examTime" placeholder="Exam Time" value="">
		    </div>
		  </div>

		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="subject">Set Type:-</label>
		      <!-- <div class="" ></div> -->
		      <select name="setSelect" id="setSelect" class="form-control"> </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Subject:-</label>
		      <select name="selectSubject" id="selectSubject" class="form-control" onclick="getSubjectDetails()">
		      </select>
		    </div>
		  </div>
		  <div class="form-row">
		  	<div class="form-group col-md-6">
		      <label for="timing">Question No:-</label>
		      <select name="selectQNo" id="selectQNo" class="form-control" onclick="">
		      </select>
		    </div>
		  </div>
		  <div class="form-row" id="addNewQuestion">
		  	<div class="form-group col-md-12">
		      <label for="timing">Question Title:-</label>
		      <textarea class="form-control" type="text" id="questionTitle" name="questionTitle" > </textarea>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="timing">Option 1:-</label>
		      <textarea class="form-control" type="text" id="option1" name="option1" ></textarea>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="timing">Option 2:-</label>
		      <textarea class="form-control" type="text" id="option2" name="option2" ></textarea>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="timing">Option 3:-</label>
		      <textarea class="form-control" type="text" id="option3" name="option3" ></textarea>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="timing">Option 4:-</label>
		      <textarea class="form-control" type="text" id="option4" name="option4" ></textarea>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="timing">Correct Answer:-</label>
		      <select class="form-control" id="correctOption" name="correctOption" > 
		      <option value="">Choose Correct Option</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      </select>
		    </div>
		    <div class="form-group col-md-12">
		      <input class="btn-btn-primary" type="button" id="submitQuestion" onclick="submitBtn()" value="Add Question">
		      <input class="btn-btn-primary" type="button" id="cancelBtn" onclick="cancelBtn()" value="Cancel">
		    </div>
		  </div>

		</form>
    </div>

</div>
<script type="text/javascript">
	var serverUrl 	= 	"<?php echo URL; ?>";
	$(document).ready(function(){
		//CKEDITOR.replace('questionOption');
		getExamData();
	});
	function getExamData()
	{
		var xhr = new XMLHttpRequest();
	    method = 'post',
	    url = ''+serverUrl+'question/getExamData';
	    xhr.onreadystatechange = function () 
	    {
	        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
	        {
	            var returnedData= JSON.parse(xhr.responseText);
	            if(returnedData != '')
	            {
	            	var examName ='<option value="">Select Exam Type</option>';
					for(var i=0; i < returnedData.length; i++)              
					{
						examName += '<option value="'+returnedData[i]['exam_name']+'">'+returnedData[i]['exam_name']+'</option>';
					}
					$('#selectExamType').html(examName);
	            }  
	        }
	    }; 
	    xhr.open(method, url, true);
	    xhr.send();
	}
	function examInfo()
	{
		var examName = $('#selectExamType option:selected').val();
		var xhr = new XMLHttpRequest();
	    method = 'post',
	    url = ''+serverUrl+'question/getExamData?examName='+examName;
	    xhr.onreadystatechange = function () 
	    {
	        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
	        {
	            var returnedData= JSON.parse(xhr.responseText);
	            if(returnedData != '')
	            {
	            	var subjects = '<option>Select a Subject</option>';
	         		for(var i=0; i < returnedData.length; i++)
	         		{
	         			if(returnedData[i]['exam_type_id'] == 0)
	         			{
	         				$('#examTime').val(returnedData[i]['exam_time']);
	         			}else
	         			{
	         				subjects += '<option value="'+returnedData[i]['id']+'">'+returnedData[i]['subject_name']+'</option>';
	         			}
	         		}
	         		$('#selectSubject').html(subjects);
	         		getSets();
	            }  
	        }
	    }; 
	    xhr.open(method, url, true);
	    xhr.send();	
	}
	function getSets()
	{
		var sets  =   '';
        var setOptions    =   '';
       
        $('#setSelect').empty();
        $.getJSON(serverUrl+'public/json/setTypes.json', function(result){
            $.each(result, function(setCode, setName){

                setOptions    =  '<option value="'+setName+'">'+setName+'</option>';
                $('#setSelect').append(setOptions);
            });
            
        });
       
	}
	function getSubjectDetails()
	{
		var id 	=	$('#selectSubject option:selected').val();

		if(id != '')
		{
			var xhr = new XMLHttpRequest();
		    method = 'post',
		    url = ''+serverUrl+'question/getExamData?id='+id;
		    xhr.onreadystatechange = function () 
		    {
		        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
		        {
		            var returnedData= JSON.parse(xhr.responseText);
		            if(returnedData != '')
		            {
		            	$('.questionDetailsDiv').remove();
		            	$('#selectQNo').empty();
		            	var noOfQuestion = returnedData[0]['no_of_question'];
		            	
		            	var optionVal = '';
		            	optionVal = '<option value="">Select Question No...</option>';
		            	for(var i = 0; i < noOfQuestion; i++)
		            	{
		            		var j = i+1;

		            		optionVal += '<option value="'+j+'">'+j+'</option>';
		            		$('#selectQNo').html(optionVal);
		            	}
		            	
		            }  
		        }
		    }; 
		    xhr.open(method, url, true);
		    xhr.send();
		}

		 $('select').on('change', function() 
         {
                var selectQno   =   $('#selectQNo option:selected').val();
                var examType 	=   $('#selectExamType option:selected').val();
                var examTime 	=   $('#examTime').val();
                var setNo 	    =   $('#setSelect option:selected').val();
                var subjectName =   $('#selectSubject option:selected').val();

                var xhr1 = new XMLHttpRequest();
		    	method = 'post',
		   	 	url = ''+serverUrl+'question/getQuestionData?Qno='+selectQno+'&examType='+examType+'&setNo='+setNo+'&subjectName='+subjectName;
		    	xhr1.onreadystatechange = function () 
		    	{
		        	if (xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200)
		        	{
		            	var returnedData= JSON.parse(xhr1.responseText);
		            	if(returnedData != '')
		            	{
		            		$('#questionTitle').val(returnedData[0]['q_title']);
		            		$('#option1').val(returnedData[0]['q_option1']);
		            		$('#option2').val(returnedData[0]['q_option2']);
		            		$('#option3').val(returnedData[0]['q_option3']);
		            		$('#option4').val(returnedData[0]['q_option4']);
		            		$('#correctOption').val(returnedData[0]['correct_option']);
		            		$('#submitQuestion').val('Update');
		            	}
		            	else
		            	{
		            		$('#questionTitle').val('');
		            		$('#option1').val('');
		            		$('#option2').val('');
		            		$('#option3').val('');
		            		$('#option4').val('');
		            		$('#correctOption').val('');
		            		$('#submitQuestion').val('Add Question');
		            	}
		            }
		        };
		        xhr1.open(method, url, true);
		    	xhr1.send();
             });
		
	}
	function submitBtn()
	{
		
		/*var validationError	=  [];			
		for(var i = 1; i <= NoOfQuestion; i++)
		{
			var singleQTitle	=	$('#QTitle_'+i).val();
			var singleQoption	=	$('#Qoptions_'+i).val();
			var singleAns		=	$('#Qanswere_'+i).val();
			
			if(singleQTitle == '')
			{
				$('#QTitleError_'+i).text('Please enter the Question title');
				validationError.push({'QTitle':i});
			}else
				$('#QTitleError_'+i).text('');
			if(singleQoption == '')
			{
				$('#QoptionsError_'+i).text('Please enter the Questions Options');
				validationError.push({'Qoptions':i});
			}else
				$('#QoptionsError_'+i).text('');
			if(singleAns == '')
			{
				$('#QanswereError_'+i).text('Please enter the Questions Answere');
				validationError.push({'Qanswere':i});
			}else
				$('#QanswereError_'+i).text('');	
		}*/

		/*if(validationError.length == 0)
		{
		*/	var submitBtnVal = $('#submitQuestion').val();
			var formData  = $('#questionFrom').serialize();	

			if(submitBtnVal == 'Add Question')
			{
				var xhr = new XMLHttpRequest();
			    method = 'post',
			    url = ''+serverUrl+'question/addQuestion?'+formData;
			    xhr.onreadystatechange = function () 
			    {
			        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
			        {
			            /*var returnedData= JSON.parse(xhr.responseText);
			            if(returnedData != '')
			            {
			            	
					    }*/
			        }
			    }; 
			    xhr.open(method, url, true);
			    xhr.send();	
			}else
			{

			}
		/*}*/
	}
</script>