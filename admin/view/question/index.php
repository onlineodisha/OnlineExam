<div class="right_col" role="main">
	<div class="bg-primary text-center text-white p-2 my-3"><h2 class="">Add Questions</h2></div>
    <div class="question border p-3">
    	<form id="questionFrom" name="questionFrom">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="examType">Exam Type:-</label>
		      <select id="selectExamType" class="form-control" onchange="examInfo()">
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Time:-</label>
		      <input type="text" class="form-control" id="examTime" placeholder="Exam Time" value="">
		    </div>
		  </div>

		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="timing">Subject:-</label>
		      <select id="selectSubject" class="form-control" onclick="getSubjectDetails()">
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="subject">Set Type:-</label>
		      <div class="" id="setDiv"></div>
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
        var setOptions    =   '<select id="setSelect" class="form-control">';
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
		            	var Qno 	=	parseInt(returnedData[0]['no_of_question']);
		            	var questions = '';
		            	for(var i = 0; i < Qno; i++)
		            	{
		            		var j = i+1
		            		questions += '<div class="form-group col-md-12">';
		            		questions += '<label>Question No '+j+'</label>';
		            		questions += '<input name="Qno_'+j+'" id="Qno_'+j+'" value="" class="form-control">';
		            		questions += '</div>'
		            		questions += '<div class="form-group col-md-12">';
		            		questions += '<label>Options</label>';
		            		questions += '<textarea rows="4" cols="100" name="Qoptions_'+j+'" id="Qoptions_'+j+'" class="form-control"></textarea>';
		            		questions += '</div>';
		            		questions += '<div class="form-group col-md-12">';
		            		questions += '<label>Answere</label>';
		            		questions += '<input name="Qanswere_'+j+'" id="Qanswere_'+j+'" class="form-control">';
		            		questions += '</div>';
		            	}
		            	questions += '<div class="form-group col-md-12 text-center">';
		            	questions += '<input type="button" value="Submit" class="btn btn-primary">';
		            	questions += '</div>';
		            	$('#questionFrom').append(questions);
		            }  
		        }
		    }; 
		    xhr.open(method, url, true);
		    xhr.send();
		}
		
	}
</script>