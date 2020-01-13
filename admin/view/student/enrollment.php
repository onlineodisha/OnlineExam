<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
        <div class=" top_tiles" style="margin: 10px 0;">
            <div class="col-md-12 col-sm-12 tile">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Enrollment Form <small>(all fields are mandetory)</small></h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" id="frmStudentEnrollment">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Name : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="name" id="name"placeholder="Santosh Kumar">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Father Name : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="fName" id="fName" placeholder="Santosh Kumar">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> UserName :</strong> </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="username" id="username"placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group row">
                    	<label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Password : </strong></label>
                    	<div class="col-md-9 col-sm-9 ">
                      		<input type="password" name="password" id="password"class="form-control" value="passwordonetwo">
                    	</div>
                  	</div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Address : </strong>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <textarea class="form-control" rows="3" name="address" id="address"placeholder="Enter Your Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                     <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Gender : </strong></label>
                      <div class="radio">
                        <label>
                          <input type="radio" checked="" value="option1" id="male" name="gender"> Male    
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" value="option2" id="female" name="gender"> Female
                        </label>
                      </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Date of Birth : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="date" class="form-control" name="dob" id="dob"placeholder="">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Mobile No : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="mobileNo" id="mobileNo" placeholder="Enter your Mobile Number">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Email ID : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="email" id="email"placeholder="Enter your Mail ID">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> AADHAR / PAN No : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="idNo" id="idNo"placeholder="AADHAR / PAN Card No">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Highest Degree : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="highestDegree" id="highestDegree"placeholder="Enter Highest Qualification">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="button" class="btn btn-success" onclick="submitStdDetails()">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
      	</div>
   	</div>
</div>

<script>
	var serverUrl 	= 	"<?php echo URL; ?>";

/**************Student Enrollment ****************/
function submitStdDetails()
{		
		console.log(43535);
		var studentFrmData	=	$('#frmStudentEnrollment').serialize();

		/*var bannerAttachment 	= 	$('#bannerImage').prop('files')[0];
		var formdata  	= 	new FormData();
    	formdata.append("attachment", bannerAttachment);*/

		var xhr	=	new XMLHttpRequest();
		method = 'post',
		url = ''+serverUrl+'student/createStudentEnrollment?'+studentFrmData;
		xhr.onreadystatechange = function () {
				if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
						var returnedData= JSON.parse(xhr.responseText);
						console.log('Success');
						//document.getElementById("bannerCaption").value 	= "";

					}

				};
				
		xhr.open(method, url, studentFrmData);
		xhr.send();
		
	}
}
</script>


