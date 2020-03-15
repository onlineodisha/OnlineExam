	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-3">
			</div>
			<!-- User Details Section Start -->
			<?php ?>
			<div class="col-md-5">
				<div class="row">
					<div class="col-md-2">
						<img src="<?php echo URL;  ?>public/images/OnlineExam.jpg" class="img-fluid img-thumbnail" height="80" width="80">
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-5">
								<label>Candidate Name :</label>
							</div>
							<div class="col-md-5">
								<span>Niranja Behera</span>
							</div>
						</div>
						<?php for($i=0; $i<count($this->examType); $i++) {?>
						<div class="row">
							<div class="col-md-5">
								<label>Subject Name :</label>
							</div>
							<div class="col-md-5">
								<span><?php echo $this->examType[$i]['exam_type']?></span>
							</div>
						</div>
					<?php } ?>
						<div class="row">
							<div class="col-md-5">
								<label>Remaining Time :</label>
							</div>
							<div class="col-md-5">
								<span class="bg-primary text-white p-1 rounded" id="minute"><?php  echo $this->examTime[0]['exam_time']; ?></span>:
								<span class="bg-primary text-white p-1 rounded" id="second">0</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- User Details Section End -->
		</div>
	</div>
	<div class="container-fluid bg-warning">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-lg-12 p-2">
				<!-- <a href="<?php echo URL; ?>index/logout">Logout</a> -->
				<button type="button" class="btn btn-info float-right"><span class="glyphicon glyphicon-download-alt"></span> DOWNLOAD QUESTION</button>
			</div>
		</div>
	</div>

	<!-- <div class="container">
		<div class="row">
			<div class="col-md-4">
				<label>Select a Set:</label>
				<select class="form-control" id="sets">
					<option value="">Select Set</option>
					<option value="set-1">Set 1</option>
				</select>
				<button class="btn btn-primary mt-2" type="button" onclick="examStart()">Start</button>
			</div>
		</div>
	</div> -->
<div class="" id="questionDetails">
<div class="col-md-6">
	<?php for($i=0; $i<count($this->subjectList); $i++) { ?>
	<button type="button" class="btn btn-primary" name="" id="<?php echo $this->subjectList[$i]['subject']; ?>" onclick="getDataBySubject('<?php echo $this->subjectList[$i]['subject']; ?>')"><?php echo $this->subjectList[$i]['subject']; ?></button>
	
<?php } ?>
</div>	
	<!-- Question Section Start -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12">
						<div class="" id="questionInfo">
							<!-- <h3 id="qNO"></h3><hr>
							<input type="radio" name="option" value=""><label>(a),(b) and (d)</label>
							<input type="radio" name="option" value=""><label>(b),(c) and (e)</label>
							<input type="radio" name="option" value=""><label>(a),(c) and (f)</label>
							<input type="radio" name="option" value=""><label>(d),(e) and (f)</label> -->
						</div>
						<!-- <form name="questionAndAnswere" id="questionAndAnswere">
							<div class="" id="qInfo">
							</div>
							<div class="" id="qHiddenSection">
							</div> -->
							<!-- <h3>Question <span id="qNo"></span>:</h3><hr>
							<strong>Code:</strong>
								<input type="radio" name="option" value=""><label>(a),(b) and (d)</label>
								<input type="radio" name="option" value=""><label>(b),(c) and (e)</label>
								<input type="radio" name="option" value=""><label>(a),(c) and (f)</label>
								<input type="radio" name="option" value=""><label>(d),(e) and (f)</label>  -->
						<!-- </form> -->
						<hr>
						<input type="hidden" name="ID" id="ID" value="">
						<input type="hidden" name="subject" id="subject" value="">
						<div class="btn-group mr-2" role="group" aria-label="First group" id="Qbuttons">
						    <button type="button" class="btn btn-success" onclick="buttonOperation('Save')">SAVE & NEXT</button>
						    <button type="button" class="btn btn-warning" onclick="buttonOperation('MarkForView')">SAVE & MARK FOR VIEW</button>
						    <button type="button" class="btn btn-light" onclick="buttonOperation('ClearResponse')">CLEAR RESPONSE</button>
						    <button type="button" class="btn btn-primary" onclick="buttonOperation('MarkForReview')">MARK FOR REVIEW & NEXT</button>
					  	</div>
					  	<div class="btn-group mr-2" role="group" aria-label="First group">
							<button type="button" class="btn btn-light" onclick="buttonOperation('Back')"><span class="glyphicon glyphicon-backward"></span> BACK</button>
							<button type="button" class="btn btn-light" onclick="buttonOperation('Next')">NEXT <span class="glyphicon glyphicon-forward"></span></button>
						</div>
						<button type="button" class="btn btn-success pull-right">SUBMIT</button>
					</div>
				</div>
			</div>
			<div class="col-md-5 mt-4">
				<div class="row">
					<div class="col-md-6">
						<span class="bg-light rounded p-2 text-white" id="notVisited">0</span><span> Not Visited</span>
					</div>
					<div class="col-md-6">
						<span class="bg-danger rounded p-2 text-white" id="notAnswered">0</span><span> Not Answere</span>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-6">
						<span class="bg-success rounded p-2 text-white" id="answered">0</span><span> Answere</span>
					</div>
					<div class="col-md-6">
						<span class="bg-secondary rounded p-2 text-white" id="markForReview">0</span><span> Marked for Review</span>
					</div>
				</div>
				<div class="row mt-4 mb-5">
					<div class="col-md-12 m">
						<span class="bg-secondary rounded p-2 text-white" id="ansAndMarked">0</span><span> Answere & Marked for Review (will be considered for evaluation</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="totalQuestion">
						<!-- <?php for($i = 0; $i < $this->totalNoOfQuestion[0]['totalQuestion']; $i++) { ?>
							<span class="bg-secondary rounded p-3 text-white"><?php if($i < 9){ echo '0';} echo $i+1; ?></span>
						<?php } ?> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Question Section End -->

<!-- <script src="<?php echo URL;?>public/module_js/examPage.js"></script> -->
<script type="text/javascript">
var serverUrl 	= 	"<?php echo URL; ?>";
var defaultSubject = "<?php echo $this->subjectList[0]['subject']; ?>";
var demoTest	=	"";
var setNo 		=	"<?php echo $this->setNo; ?>";
$(document).ready(function(){
	var minute 	=	parseInt($('#minute').text());
	var second 	=	parseInt($('#second').text());
	countDown(minute,second,'minute','second');		
 if(defaultSubject != '')
 {
 	$('#'+defaultSubject).trigger('click');
 }
 updataeBtnInfo();
});
function getDataByid(id)
{
	$('#btnId'+id).removeClass('btn btn-light');
	$('#btnId'+id).addClass('btn btn-danger');
	var demoTest	=	[];
	var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examPage/getExamDataById?ID='+id;
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var returnedData= JSON.parse(xhr.responseText);
            if(returnedData != '')
            {
            	showQuestionDetails(returnedData);

            }	
              
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();	
}
function getDataBySubject(subjectName)
{
	//var sName 	=	"'"+subjectName+"'";
	//var sNo 	=	"'"+setNo+"'";
	getAllquestion(subjectName,setNo);
	var demoTest	=	[];
	var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examPage/getExamDataBySubject?subjectName='+subjectName;
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var returnedData= JSON.parse(xhr.responseText);
            if(returnedData != '')
            {
            	showQuestionDetails(returnedData);
            	$('#subject').val(subjectName);
            }	
              
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();	
}
function showQuestionDetails(returnedData)
{
	var questionDetails = '';
	for(var i = 0; i < returnedData.length; i++)            	
	{
		questionDetails += '<h3 id="qNO">Question:<span>'+returnedData[i]['q_no']+'</span></h3><hr>';
		questionDetails += '<p id="questionTitle">'+returnedData[i]['temp_qtitle']+'</p>';
		questionDetails += '<input type="radio" name="option" value="1"><label>&nbsp;'+returnedData[i]['temp_opt1']+'</label><br>';
		questionDetails += '<input type="radio" name="option" value="2"><label>&nbsp;'+returnedData[i]['temp_opt2']+'</label><br>';
		questionDetails += '<input type="radio" name="option" value="3"><label>&nbsp;'+returnedData[i]['temp_opt3']+'</label><br>';
		questionDetails += '<input type="radio" name="option" value="4"><label>&nbsp;'+returnedData[i]['temp_opt4']+'</label><br>';
		$('#ID').val(returnedData[i]['id']);
		$('#btnId'+returnedData[i]['id']).addClass('bg-danger');
	}
	$('#questionInfo').html(questionDetails);
}
function getAllquestion(subject,set)
{
	var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examPage/getAllquestion?subject='+subject+'&setNo='+set;
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var returnedData= JSON.parse(xhr.responseText);
            if(returnedData != '')
            {
            	var questionText = '';
            	for(var i = 0; i < returnedData.length; i++)            	
        		{
        			var j = i+1
        			questionText += '<span class="btn btn-light" style="margin-right: 4px;" onclick="getDataByid('+returnedData[i]['id']+')" id="btnId'+returnedData[i]['id']+'">'+j+'</span>';
        		}
        		$('#totalQuestion').html(questionText);		
            }  
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();		
}
function countDown(minute,secs,minuteElem,secondElem) {
	var minuteElement	=	parseInt($('#'+minuteElem).text(minute));
	var secondElement 	=	parseInt($('#'+secondElem).text(secs));
	if(secs < 1)
	{
		minute	=	minute-1;
		secs	=	60;	
		/*clearTimeout(timer);
		element.innerHTML	=	'<h2>Countdown Complete</h2>';
		element.innerHTML	+=	'<a href="#">Click here now</a>';*/
	}
	/*if(minute < 1)
	{
		if(hours != 0)
			hours 	= hours-1;
		minute  = 60;
	}*/
	secs--;
	
	var timer	=	setTimeout('countDown('+minute+',"'+secs+'","minute","second")',1000);
}
//udpate Q and A temporary when any action button clicked by the user
function buttonOperation(btnVal)
{
	var ID 			= 	$('#ID').val();
	var radioVal 	= 	$("input[name='option']:checked"). val();
	var subject 	= 	$('#subject').val();
	if(btnVal != '')
	{
		//
		var xhr = new XMLHttpRequest();
	    method = 'get',
	    url = ''+serverUrl+'examPage/updateQA?ID='+ID+'&option='+radioVal+'&btnVal='+btnVal+'&subject='+subject;
	    xhr.onreadystatechange = function () 
	    {
	        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
	        {
	            var returnedData= JSON.parse(xhr.responseText);
	            if(returnedData != '')
	            {
	            	showQuestionDetails(returnedData);
	            }  
	        }
	    }; 
	    xhr.open(method, url, true);
	    xhr.send();	
		//
	}
}
//This function is used to update button info such as:- Not Visited, Not Answere, Answere,....
function updataeBtnInfo()
{
	var xhr = new XMLHttpRequest();
    method = 'get',
    url = ''+serverUrl+'examPage/getAllTempExamCountData?setNo='+setNo;
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var returnedData= JSON.parse(xhr.responseText);
            if(returnedData != '')
            {
            	console.log(returnedData);
            	for(var i = 0; i < returnedData.length; i++)
            	{
	            	if(returnedData[i]['selected_btn'] == 'notVisited')	
	            		$('#notVisited').text(returnedData[i]['total'])
	            	if(returnedData[i]['selected_btn'] == 'ClearResponse')
	            		$('#notAnswered').text(returnedData[i]['total']);
	            	if(returnedData[i]['selected_btn'] == 'Save')
	            		$('#answered').text(returnedData[i]['total']);
	            	if(returnedData[i]['selected_btn'] == 'MarkForReview')
	            		$('#markForReview').text(returnedData[i]['total']);
	            	if(returnedData[i]['selected_btn'] == 'MarkForView')
	            		$('#ansAndMarked').text(returnedData[i]['total']);
	            }
            }  
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();	
}
</script>