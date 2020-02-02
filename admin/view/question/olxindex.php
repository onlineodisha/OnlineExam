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
		      <div class="" id="setDiv"></div>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Subject:-</label>
		      <select name="selectSubject" id="selectSubject" class="form-control" onclick="getSubjectDetails()">
		      </select>
		    </div>
		  </div>

		  <div class="form-row">
		  	<input type="hidden" name="noOfQuestion" id="noOfQuestion" value="">
		  	<div class="form-group col-md-4"></div>
		  	<div class="form-group col-md-4 text-center text-success" id="totalQNo"></div>
		  	<div class="form-group col-md-4"></div>
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
        var setOptions    =   '<select name="setSelect" id="setSelect" class="form-control">';
        setOptions        +=  '<option value="">Select a Set</option>';

        $.getJSON(serverUrl+'public/json/setTypes.json', function(result){
            $.each(result, function(setCode, setName){
                sets    +=  '<option value="'+setName+'">'+setName+'</option>';
            });
            $('#setSelect').html(sets);
        });
        setOptions    +=  '</select>';
        $('#setDiv').html(setOptions);
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
		            	var noOfQuestion 	=	parseInt(returnedData[0]['no_of_question']);
		            	var totalQNo = 'Total Question '+noOfQuestion;
		            	$('#totalQNo').text(totalQNo);
		            	$('#noOfQuestion').val(noOfQuestion);
		            	var questions = '';
		            	questions += '<div class="questionDetailsDiv">'
		            	for(var i = 0; i < noOfQuestion; i++)
		            	{
		            		var j = i+1
		            		questions += '<div class="form-group col-md-12">';
		            		questions += '<label><span class="text-danger">*</span>Question No '+j+'</label>';
		            		questions += '<input name="QTitle[]" id="QTitle_'+j+'" value="" class="form-control">';
		            		questions += '<span id="QTitleError_'+j+'" class="text-danger error"></span>';
		            		questions += '</div>'
		            		questions += '<div class="form-group col-md-12">';
		            		questions += '<label><span class="text-danger">*</span>Options</label>';
		            		questions += '<textarea rows="4" cols="100" name="Qoptions[]" id="Qoptions_'+j+'" class="form-control"></textarea>';
		            		questions += '<span id="QoptionsError_'+j+'" class="text-danger error"></span>';
		            		questions += '</div>';
		            		questions += '<div class="form-group col-md-12">';
		            		questions += '<label><span class="text-danger">*</span>Answere</label>';
		            		questions += '<input name="Qanswere[]" id="Qanswere_'+j+'" class="form-control">';
		            		questions += '<span id="QanswereError_'+j+'" class="text-danger error"></span>';
		            		questions += '</div>';
		            		questions += '<input type="hidden" name="qNo[]" id="qNo_'+j+'" value="'+j+'">'
		            	}
		            	questions += '<div class="form-group col-md-12 text-center">';
		            	questions += '<input type="button" value="Submit" id="submitBtnVal" class="btn btn-primary" onclick="submitBtn()">';
		            	questions += '</div>';
		            	questions += '</div>'
		            	$('#questionFrom').append(questions);
		            }  
		        }
		    }; 
		    xhr.open(method, url, true);
		    xhr.send();
		}
		
	}
	function submitBtn()
	{
		var QNumbers 		=  $("input[name='QTitle[]']").map(function(){return $(this).val();}).get();
		var Qoptions 		=  $("input[name='Qoptions[]']").map(function(){return $(this).val();}).get();
		var Qanswere 		=  $("input[name='Qanswere[]']").map(function(){return $(this).val();}).get();
		var NoOfQuestion 	=  $('#noOfQuestion').val();
		var validationError	=  [];			
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
		}

		if(validationError.length == 0)
		{
			var submitBtnVal = $('#submitBtnVal').val();
			var formData  = $('#questionFrom').serialize();	

			if(submitBtnVal == 'Submit')
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
		}
	}
</script>