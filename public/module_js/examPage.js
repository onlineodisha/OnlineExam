var serverUrl 	= 	"<?php echo URL; ?>";
$(document).ready(function(){
		//getSetDetails();
	});

function examStart()
{
	$('#questionDetails').removeClass('d-none');

	var setName 	=	$('#sets option:selected').val();
	var xhr = new XMLHttpRequest();
    method = 'POST';
    url = ''+serverUrl+'examPage/getQuestionsByExamTypre?setName='+setName;
    
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var returnedData= JSON.parse(xhr.responseText);
            console.log(387839);
            if(returnedData != '')
            {

            }  
        }
    }; 
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}