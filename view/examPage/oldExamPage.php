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
								<span class="bg-primary text-white p-1 rounded" id="hour">02</span>:
								<span class="bg-primary text-white p-1 rounded" id="minute">01</span>:
								<span class="bg-primary text-white p-1 rounded" id="second">30</span>
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
						<form name="questionAndAnswere" id="questionAndAnswere">
							<div class="" id="qInfo">
							</div>
							<div class="" id="qHiddenSection">
							</div>
							<!-- <h3>Question <span id="qNo"></span>:</h3><hr>
							<strong>Code:</strong>
								<input type="radio" name="option" value=""><label>(a),(b) and (d)</label>
								<input type="radio" name="option" value=""><label>(b),(c) and (e)</label>
								<input type="radio" name="option" value=""><label>(a),(c) and (f)</label>
								<input type="radio" name="option" value=""><label>(d),(e) and (f)</label>  -->
						</form>
						<hr>
						<div class="btn-group mr-2" role="group" aria-label="First group" id="Qbuttons">
						    <button type="button" class="btn btn-success" onclick="examStart()">SAVE & NEXT</button>
						    <button type="button" class="btn btn-warning" onclick="examStart()">SAVE & MARK FOR VIEW</button>
						    <button type="button" class="btn btn-light" onclick="examStart()">CLEAR RESPONSE</button>
						    <button type="button" class="btn btn-primary" onclick="examStart()">MARK FOR REVIEW & NEXT</button>
					  	</div>
					  	<div class="btn-group mr-2" role="group" aria-label="First group">
							<button type="button" class="btn btn-light" onclick="buttonOperation()"><span class="glyphicon glyphicon-backward"></span> BACK</button>
							<button type="button" class="btn btn-light" onclick="buttonOperation()">NEXT <span class="glyphicon glyphicon-forward"></span></button>
						</div>
						<button type="button" class="btn btn-success pull-right">SUBMIT</button>
					</div>
				</div>
			</div>
			<div class="col-md-5 mt-4">
				<div class="row">
					<div class="col-md-6">
						<span class="bg-secondary rounded p-2 text-white" id="notVisited">0</span><span> Not Visited</span>
					</div>
					<div class="col-md-6">
						<span class="bg-danger rounded p-2 text-white" id="notAnswered">0</span><span> Not Answere</span>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-6">
						<span class="bg-secondary rounded p-2 text-white" id="answered">0</span><span> Answere</span>
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
var defaultSubject = "<?php echo $this->subjectList; ?>";
$(document).ready(function(){
		
 if(defaultSubject != '')
 {

 }

});
function getDataBySubject(subjectName)
{
	

}
function examStart()
{
	//Timer Start
	/*var hour 	= 	parseInt($('#hour').text());
	var minute 	=	parseInt($('#minute').text());
	var second 	=	parseInt($('#second').text());
	countDown(hour,minute,second,'hour','minute','second');*/
	//Timer End
	$('#questionDetails').removeClass('d-none');
	var ID 			= 	$('#ID').val();
	var setName 	=	$('#sets option:selected').val();
	var xhr 		= 	new XMLHttpRequest();
    method 			= 	'POST';
    url 			= 	''+serverUrl+'examPage/getQuestionsByExamTypre?setName='+setName+'&ID='+ID;
    
    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var returnedData= JSON.parse(xhr.responseText);

            if(returnedData != '')
            {
            	var hiddenTxt = '';
            	var showTxt	  = '';	
            	hiddenTxt += '<div class="" id="question_No_'+returnedData[0]['id']+'">';
            	hiddenTxt += '<input type="hidden" name="qNo" id="qNo_'+returnedData[0]['id']+'" value="'+returnedData[0]['q_no']+'">';
            	hiddenTxt += '<input type="hidden" name="qTitle" value="'+returnedData[0]['q_title']+'">';
            	hiddenTxt += '<input type="hidden" name="ID" id="ID" value="'+returnedData[0]['id']+'">'
            	/*hiddenTxt += '<input type="" name="opt_1" value="'+returnedData[0]['q_option1']+'">';
            	hiddenTxt += '<input type="" name="opt_2" value="'+returnedData[0]['q_option2']+'">';
            	hiddenTxt += '<input type="" name="opt_3" value="'+returnedData[0]['q_option3']+'">';
            	hiddenTxt += '<input type="" name="opt_4" value="'+returnedData[0]['q_option4']+'">';*/
            	hiddenTxt += '</div>';
            	$('#questionAndAnswere').append(hiddenTxt);
            	showTxt += '<div class="" id="showTxt_'+returnedData[0]['id']+'">';
            	showTxt += '<p>Question No : '+returnedData[0]['q_no']+'</p>';
            	showTxt += '<strong>'+returnedData[0]['q_title']+'</strong><br>'
            	showTxt += '<input type="radio" name="option" value="'+returnedData[0]['q_option1']+'"><label> (1) '+returnedData[0]['q_option1']+'</label>';
            	showTxt += '<input type="radio" name="option" value="'+returnedData[0]['q_option2']+'"><label> (2) '+returnedData[0]['q_option2']+'</label><br>';
            	showTxt += '<input type="radio" name="option" value="'+returnedData[0]['q_option3']+'"><label> (3) '+returnedData[0]['q_option3']+'</label>';
            	showTxt += '<input type="radio" name="option" value="'+returnedData[0]['q_option4']+'"><label> (4) '+returnedData[0]['q_option4']+'</label>';
            	showTxt += '</div>';
            	$('#qInfo').append(showTxt);
            }  
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();
}
function countDown(hours,minute,secs,hourElem,minuteElem,secondElem) {
	var hourElement 	=	parseInt($('#'+hourElem).text(hours));	 
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
	if(minute < 1)
	{
		if(hours != 0)
			hours 	= hours-1;
		minute  = 60;
	}
	secs--;
	
	var timer	=	setTimeout('countDown('+hours+','+minute+',"'+secs+'","hour","minute","second")',1000);
}
</script>