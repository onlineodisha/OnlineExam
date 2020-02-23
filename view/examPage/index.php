

	<div class="container">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-3">
			</div>
			<!-- User Details Section Start -->
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
						<div class="row">
							<div class="col-md-5">
								<label>Subject Name :</label>
							</div>
							<div class="col-md-5">
								<span>Test Practice</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<label>Remaining Time :</label>
							</div>
							<div class="col-md-5">
								<span class="bg-primary text-white p-1 rounded">00:53:13</span>
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
				<button type="button" class="btn btn-info float-right"><span class="glyphicon glyphicon-download-alt"></span> DOWNLOAD QUESTION</button>
			</div>
		</div>
	</div>

	<div class="container">
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
	</div>
<div class="d-none" id="questionDetails">	
	<!-- Question Section Start -->
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12">
						<h3>Question <span id="qNo"></span>:</h3><hr>
					</div>
					<div class="col-md-12" id="qDetail">
						<!-- <p><?php echo $this->examQuestions[0]['q_title']; ?></p>
						<ol type="a">
						  <li><?php echo $this->examQuestions[0]['q_option1']; ?></li>
						  <li><?php echo $this->examQuestions[0]['q_option2']; ?></li>
						  <li><?php echo $this->examQuestions[0]['q_option3']; ?></li>
						  <li><?php echo $this->examQuestions[0]['q_option4']; ?></li>
						</ol> -->
						<!-- <strong>Code:</strong>
						<ol type="1" id="Qoption">
							<li><input type="checkbox" name="option">(1)  (a),(b) and (d) </li>
							<li><input type="checkbox" name="option">(2)  (b),(c) and (e) </li>
							<li><input type="checkbox" name="option">(3)  (a),(c) and (f) </li>
							<li><input type="checkbox" name="option">(4)  (d),(e) and (f) </li>
						</ol> -->
						<hr>
						<div class="btn-group mr-2" role="group" aria-label="First group" id="Qbuttons">
						    <button type="button" class="btn btn-success">SAVE & NEXT</button>
						    <button type="button" class="btn btn-warning">SAVE & MARK FOR VIEW</button>
						    <button type="button" class="btn btn-light">CLEAR RESPONSE</button>
						    <button type="button" class="btn btn-primary">MARK FOR REVIEW & NEXT</button>
					  	</div>
					</div>
					<div class="col-md-12 mt-2">
						<div class="btn-group mr-2" role="group" aria-label="First group">
							<button type="button" class="btn btn-light"><span class="glyphicon glyphicon-backward"></span> BACK</button>
							<button type="button" class="btn btn-light">NEXT <span class="glyphicon glyphicon-forward"></span></button>
						</div>
						<button type="button" class="btn btn-success pull-right">SUBMIT</button>
					</div>				
				</div>
			</div>
			<div class="col-md-5 mt-4">
				<div class="row">
					<div class="col-md-6">
						<span class="bg-secondary rounded p-2 text-white">1</span><span> Not Visited</span>
					</div>
					<div class="col-md-6">
						<span class="bg-danger rounded p-2 text-white">2</span><span> Not Answere</span>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-6">
						<span class="bg-secondary rounded p-2 text-white">0</span><span> Answere</span>
					</div>
					<div class="col-md-6">
						<span class="bg-secondary rounded p-2 text-white">0</span><span> Marked for Review</span>
					</div>
				</div>
				<div class="row mt-4 mb-5">
					<div class="col-md-12 m">
						<span class="bg-secondary rounded p-2 text-white">0</span><span> Answere & Marked for Review (will be considered for evaluation</span>
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

<script src="<?php echo URL;?>public/module_js/examPage.js"></script>
