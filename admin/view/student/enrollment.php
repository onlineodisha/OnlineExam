<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
    <div>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="addStudentBtn" value="Add Student" onclick="addStudent()"></input>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="backButton" value="Back" onclick="backButton()"></input>
    </div>
        <div class=" top_tiles" style="margin: 10px 0;">
          <div class="col-md-12 col-sm-12 tile" id="studentEnrollmentListing" >
           
        </div>
            <div class="col-md-12 col-sm-12 tile d-none" id="studentEnrollmentForm" >
                <div class="x_panel" >
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
                        <input type="radio" checked="" value="Male" id="male" name="gender" style="margin-left: 10px; margin-top: 10px;"> Male    
                      </label>
                       <label>
                        <input type="radio" value="Female" id="female" name="gender"> Female
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
                          <input type="button" class="btn btn-primary" value="Reset"></input>
                          <input hidden="hidden" id="sId" name="sId"></input>
                          <input type="button" class="btn btn-success" id="submitBtn"
                          onclick="submitStdDetails()" value="Submit"></input>
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
 
  $(document).ready(function(){
    $('#backButton').addClass('d-none');
   studentListing(); 

  });
/******Add Student & Back  Button******/
function addStudent()
{
      $('#studentEnrollmentForm').removeClass('d-none');
      $('#studentEnrollmentListing').addClass('d-none');
      $('#backButton').removeClass('d-none');
      $('#addStudentBtn').addClass('d-none');
}

function backButton()
{
      $('#studentEnrollmentForm').addClass('d-none');
      $('#studentEnrollmentListing').removeClass('d-none');
      $('#backButton').addClass('d-none');
      $('#addStudentBtn').removeClass('d-none');
}
/**************Student Enrollment ****************/
function submitStdDetails()
{		
		var studentFrmData	=	$('#frmStudentEnrollment').serialize();
    var submitBtnValue  = $('#submitBtn').val();
    var sid             = $('#sId').val();

    if(submitBtnValue == 'Submit')
    {
        var xhr = new XMLHttpRequest();
        method = 'post',
        url = ''+serverUrl+'student/createStudentEnrollment?'+studentFrmData;

        xhr.onreadystatechange = function () 
        {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
            {
                var returnedData= JSON.parse(xhr.responseText);
      
                studentListing();
                
              }
        };     
        xhr.open(method, url, studentFrmData);
        xhr.send();
    }
    else
    {
        var xhr = new XMLHttpRequest();
        method = 'post',
        url = ''+serverUrl+'student/editStudentEnrollment?id='+sid+'&'+studentFrmData;
        xhr.onreadystatechange = function () 
        {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
            {
                var returnedData= JSON.parse(xhr.responseText);
        
                studentListing();
                
            }
        };    
        xhr.open(method, url, studentFrmData);
        xhr.send();
    }
		
}

/******Edit Student Details*******/
function editStudentDtls(id)
{
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'student/getStudentDetailByID?&id='+id;
   
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
          var returnedData= JSON.parse(xhr.responseText);
          if(returnedData != '')
          {
            $('#studentEnrollmentForm').removeClass('d-none');
            $('#studentEnrollmentListing').addClass('d-none');
            $('#backButton').removeClass('d-none');
            $('#addStudentBtn').addClass('d-none');
            $('#name').val(returnedData[0]['name']);
            $('#username').val(returnedData[0]['username']);
            $('#fName').val(returnedData[0]['father_name']);
            $('#address').val(returnedData[0]['address']);
            $('#gender').val(returnedData[0]['gender']);
            $('#mobileNo').val(returnedData[0]['mobile_no']);
            $('#email').val(returnedData[0]['email']);
            $('#idNo').val(returnedData[0]['id_proof_no']);
            $('#highestDegree').val(returnedData[0]['highest_degree']);
            $('#sId').val(returnedData[0]['id']);
             $('#submitBtn').val('Update');
          }   
      }
    };  
    xhr.open(method, url, true);
    xhr.send();

}
/*****************Delete Student Details******************/
function deleteStudentDtls(id)
{
  if (confirm("Are you sure you want to Delete")) 
  {
            var xhr = new XMLHttpRequest(),
            method = 'GET',
            overrideMimeType = 'application/json',
            url = ''+serverUrl+'student/deleteStudentDtls?id='+id;
            xhr.onreadystatechange = function() 
            {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
                {
                  studentListing();
                  var msg1 = '';
                  msg1  += '<div class="alert alert-danger text-center" role="alert">';
                  msg1 += 'Student Details Deleted Successfully';
                  msg1 += '</div>';
                  $('#errorMsg').html(msg1);
                  window.setTimeout(function () { 
                  $(".alert-danger").alert('close'); }, 2000);
                }
            },
             xhr.open(method, url, true);
             xhr.send();   
    }
}
/*****************Delete Student Details******************/
/********Student Listing********/
function studentListing()
{
    var studentData = '';
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'student/showAllStudentDetails?';

    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {

            var data= JSON.parse(xhr.responseText);

            if(data != '')
            { 
                studentData = '<table class="table-bordered table" id="studentListingTable"><tr>';
                studentData += '<th>S.N.</th>';
                studentData += '<th>Name</th>';
                studentData += '<th>UserName</th>';
                studentData += '<th>Password</th>';
                studentData += '<th>Mobile No</th>';
                studentData += '<th>Email</th>';
                studentData += '<th>ID Proof No</th>';
                studentData += '<th>Qualification</th>';
                studentData += '<th>Status</th>';
                studentData += '<th>Action</th></tr>';

              for(var i =0; i< data.length; i++)
              {     
                  studentData += '<tr>';
                  studentData += '<td>'+(i+1)+'</td>';
                  studentData += '<td>'+data[i]['name']+'</td>';
                  studentData += '<td>'+data[i]['username']+'</td>';
                  studentData += '<td>'+data[i]['password']+'</td>';
                  studentData += '<td>'+data[i]['mobile_no']+'</td>';
                  studentData += '<td>'+data[i]['email']+'</td>';
                  studentData += '<td>'+data[i]['id_proof_no']+'</td>';
                  studentData += '<td>'+data[i]['highest_degree']+'</td>';
                  if(data[i]['is_active'] == 1)
                  {
              
                      studentData += '<td>'+'<button type="button" class="" id="stdActDeactBtn" onclick="studentActDeact('+data[i]['id']+','+data[i]['is_active']+')" data-toggle="tooltip" title="Deactive" ><i class="fa fa-check-circle text-primary" ></i>&nbsp;&nbsp;</button>'+'</td>';
                  }
                  else
                  {
              
                      studentData += '<td>'+'<button type="button" class="" id="stdActDeactBtn" onclick="studentActDeact('+data[i]['id']+','+data[i]['is_active']+')" data-toggle="tooltip" title="Active"><i class="fa fa-ban"></i>&nbsp;&nbsp;</button>'+'</td>';
                  }
                    studentData += '<td><button type="button" class="" id="editStudentBtn"  onclick="editStudentDtls('+data[i]['id']+')"><i class="fa fa-edit btn-edit"></i>&nbsp;&nbsp;</button><button type="button" class="" id="DeleteStudentBtn"  onclick="deleteStudentDtls('+data[i]['id']+')"><i class="fa fa-trash text-danger" style="color:red"></i>&nbsp;&nbsp;</button></td>';
                    studentData += '</tr>';
                   
              }
                  studentData += '</table>'; 
                  $('#studentEnrollmentListing').html(studentData);
                  $('#studentEnrollmentForm').addClass('d-none');
                  $('#studentEnrollmentListing').removeClass('d-none');       
                  $('#backButton').addClass('d-none'); 
            }    
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();
}
</script>


