<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
    <div>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="addExamTypeBtn" value="Add Exam Type" onclick="addButton()"></input>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="backButton" value="Back" onclick="backButton()"></input>
    </div>
        <div class=" top_tiles" style="margin: 10px 0;">
          <div class="col-md-12 col-sm-12 tile" id="examTypeListing" >
            <table class="table-bordered table" id="examTypeListingTable">
                <tr>
                  <th>S.N.</th>
                  <th>Exam Name</th>
                  <th>Exam Time</th>
                  <th>Subject Name</th>
                  <th>No Of Question</th>
                  <th>Mark</th>
                  <th>Minus Mark</th>
                  <th>Action</th>
                </tr>
          </table>
        </div>
            <div class="col-md-12 col-sm-12 tile d-none" id="examTypeForm" >
                <div class="x_panel" >
                  <div class="x_title">
                    <h2>Exam Setup Form <small>(All Fields are Mandatory)</small></h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" id="frmExamType">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Exam Name : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="examName" id="examName"placeholder=""><label>(Exam Name : Railway, SSC , IBPS)</label>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Exam Time : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="examTime" id="examTime" placeholder=""><label>(Input Time Minute : 90 , 120)</label>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Subject Name :</strong> </label>
                        <div class="col-md-9 col-sm-9 ">
                         <!--  <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder=""> -->
                          <select id="subjectName" name="subjectName" class="form-control" required>
                            <option value="">Choose..</option>
                            <option onselect="addNewSubject()">Add New Subject</option>
                          </select>
                          <label>(Select Subject :- Math / English / Reasoning / GK)</label>
                        </div>
                    </div>
                    <div class="form-group row">
                    	<label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> No Of Question :</strong></label>
                    	<div class="col-md-9 col-sm-9 ">
                      		<input type="text" name="noOfQuestion" id="noOfQuestion"class="form-control" ><label>(No of Question Per Subject)</label>
                    	</div>
                  	</div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Mark for Correct Ans : </strong>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="addMark" id="addMark"placeholder=""><label>(Mark for Correct Answer . i.e 2 or 4)</label>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Mark for Wrong Ans : </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="minusMark" id="minusMark"placeholder=""><label>(Mark for Wrong Answer. I.e 0.5 / -1 )</label>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                          <input type="button" class="btn btn-primary" value="Reset"></input>
                          <input type="button" class="btn btn-success" id="submitBtn"
                          onclick="submitExamDetails()" value="Submit"></input>
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
function addButton()
{
      $('#examTypeForm').removeClass('d-none');
      $('#examTypeListing').addClass('d-none');
      $('#backButton').removeClass('d-none');
      $('#addExamTypeBtn').addClass('d-none');
}

function backButton()
{
      $('#examTypeForm').addClass('d-none');
      $('#examTypeListing').removeClass('d-none');
      $('#backButton').addClass('d-none');
      $('#addExamTypeBtn').removeClass('d-none');
}
/*********Add New Subject**********/
function addNewSubject()
{
  console.log(67566);
}
/**************Student Enrollment ****************/
function submitExamDetails()
{		

		var examTypeFrmData	=	$('#frmExamType').serialize();
    var submitBtnValue  = $('#submitBtn').val();
    
		/*var bannerAttachment 	= 	$('#bannerImage').prop('files')[0];
		var formdata  	= 	new FormData();
    	formdata.append("attachment", bannerAttachment);*/
    if(submitBtnValue == 'Submit')
    {
        var xhr = new XMLHttpRequest();
        method = 'post',
        url = ''+serverUrl+'examSetup/createExamSetup?'+examTypeFrmData;
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
                var returnedData= JSON.parse(xhr.responseText);
        
                //document.getElementById("bannerCaption").value  = "";
                //studentListing(returnedData);
                
              }
            };
            
        xhr.open(method, url, examTypeFrmData);
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
            $('#name').val(returnedData[0]['name']);
            $('#username').val(returnedData[0]['username']);
            $('#fName').val(returnedData[0]['father_name']);
            $('#address').val(returnedData[0]['address']);
            $('#gender').val(returnedData[0]['gender']);
            $('#mobileNo').val(returnedData[0]['mobile_no']);
            $('#email').val(returnedData[0]['email']);
            $('#idNo').val(returnedData[0]['id_proof_no']);
            $('#highestDegree').val(returnedData[0]['highest_degree']);
             $('#submitBtn').val('Update');
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
            studentData += '<td>'+data[i]['id_proof_no']+'</td>';
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


