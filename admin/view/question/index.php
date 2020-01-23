<div class="right_col" role="main">
	<div class="bg-primary text-center text-white p-2 my-3"><h2 class="">Add Questions</h2></div>
    <div class="questionForm border p-3">
    	<form>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="examType">Exam Type:-</label>
		      <select id="selectExamType" class="form-control">
		        <option selected>Select Exam Type</option>
		        <option value="SSC">SSC</option>
		        <option value="Railway">Railway</option>
		        <option value="Others">Others</option>
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Time:-</label>
		      <input type="text" class="form-control" id="examTime" placeholder="Exam Time">
		    </div>
		  </div>

		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="subject">Select Subject:-</label>
		      <select id="selectSubject" class="form-control">
		        <option selected>Select a Subject</option>
		        <option value="SSC">Mathmatics</option>
		        <option value="Railway">English</option>
		        <option value="Others">General Knowledge</option>
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Time:-</label>
		      <input type="text" class="form-control" id="examTime" placeholder="Exam Time">
		    </div>
		  </div>

		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="setType">Select Set:-</label>
		      <select id="selectSetType" class="form-control">
		        <option selected>Select Exam Type</option>
		        <option value="1">1</option>
		        <option value="2">2</option>
		        <option value="3">3</option>
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="timing">Time:-</label>
		      <input type="text" class="form-control" id="examTime" placeholder="Exam Time">
		    </div>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign in</button>
		</form>
    </div>

</div>
<script type="text/javascript">
	var serverUrl 	= 	"<?php echo URL; ?>";
	$(document).ready(function(){
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
	            console.log(returnedData);	
	            if(returnedData != '')
	            {
						              
	            }  
	        }
	    }; 
	    xhr.open(method, url, true);
	    xhr.send();
	}
</script>