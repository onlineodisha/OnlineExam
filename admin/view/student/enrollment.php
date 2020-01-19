<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
    <div>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="addStudentBtn" value="Add Student" onclick="addStudent()"></input>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="backButton" value="Back" onclick="backButton()"></input>
    </div>
        <div class=" top_tiles" style="margin: 10px 0;">
          <div class="col-md-12 col-sm-12 tile" id="studentEnrollmentListing" >
            <table class="table-bordered table" id="studentListingTable">
                <tr>
                  <th>S.N.</th>
                  <th>Name</th>
                  <th>UserName</th>
                  <th>Password</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                  <th>Qualification</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
          </table>
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
                          <input type="radio" checked="" value="Male" id="male" name="gender"> Male    
                        </label>
                      </div>
                      <div class="radio">
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
                          <button type="button" class="btn btn-primary">Cancel</button>
                          <button type="reset" class="btn btn-primary">Reset</button>
                          <button type="button" class="btn btn-success" id="submitBtn"
                          onclick="submitStdDetails()" value="submit">Submit</button>
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
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'student/showAllStudentDetails?';

    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {

            var returnedData= JSON.parse(xhr.responseText);

            if(returnedData != '')
            {
              studentListing(returnedData);
              
            }    
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();

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

		/*var bannerAttachment 	= 	$('#bannerImage').prop('files')[0];
		var formdata  	= 	new FormData();
    	formdata.append("attachment", bannerAttachment);*/
    if(submitBtnValue == 'submit')
    {
        var xhr = new XMLHttpRequest();
        method = 'post',
        url = ''+serverUrl+'student/createStudentEnrollment?'+studentFrmData;
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
                var returnedData= JSON.parse(xhr.responseText);
        
                //document.getElementById("bannerCaption").value  = "";
                studentListing(returnedData);
                
              }
            };
            
        xhr.open(method, url, studentFrmData);
        xhr.send();
    }
    else
    {

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
            document.getElementById("name").innerHTML = returnedData[0]['name'];
            $('#name').val(returnedData[0]['name']);
          }   
      }
    };  
    xhr.open(method, url, true);
    xhr.send();

}
/********Student Listing********/
function studentListing(data)
{
    var studentData = '';
    if(data != '')
    {

      for(var i =0; i< data.length; i++)

      {     
            studentData = '<tr>';
            studentData += '<td>'+(i+1)+'</td>';
            studentData += '<td>'+data[i]['name']+'</td>';
            studentData += '<td>'+data[i]['username']+'</td>';
            studentData += '<td>'+data[i]['password']+'</td>';
            studentData += '<td>'+data[i]['mobile_no']+'</td>';
            studentData += '<td>'+data[i]['email']+'</td>';
            studentData += '<td>'+data[i]['highest_degree']+'</td>';
            if(data[i]['is_active'] == 1)
            {
              //studentData += '<td>'+'Active'+'</td>';
              studentData += '<td>'+'<button type="button" class="" id="stdActDeactBtn" onclick="studentActDeact('+data[i]['id']+','+data[i]['is_active']+')" data-toggle="tooltip" title="Deactive" ><i class="fa fa-check-circle text-primary" ></i>&nbsp;&nbsp;</button>'+'</td>';
            }
            else
            {
              //studentData += '<td>'+'Inactive'+'</td>';
              studentData += '<td>'+'<button type="button" class="" id="stdActDeactBtn" onclick="studentActDeact('+data[i]['id']+','+data[i]['is_active']+')" data-toggle="tooltip" title="Active"><i class="fa fa-ban"></i>&nbsp;&nbsp;</button>'+'</td>';
            }
            studentData += '<td><button type="button" class="" id="editStudentBtn"  onclick="editStudentDtls('+data[i]['id']+')"><i class="fa fa-edit btn-edit"></i>&nbsp;&nbsp;</button><button type="button" class="" id="DeleteStudentBtn"  onclick="deleteStudentDtls('+data[i]['id']+')"><i class="fa fa-trash text-danger" style="color:red"></i>&nbsp;&nbsp;</button></td>';
            studentData += '</tr>';
            $('#studentListingTable').append(studentData);
      }
      $('#studentEnrollmentForm').addClass('d-none');
      $('#studentEnrollmentListing').removeClass('d-none');       
      $('#backButton').addClass('d-none');       
      
    }
}
</script>


