<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
    <div>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="addSubjectBtn" value="Add Subject" onclick="addButton()"></input>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="backButton" value="Back" onclick="backButton()"></input>
    </div>
        <div class=" top_tiles" style="margin: 10px 0;">
          <div class="col-md-12 col-sm-12 tile" id="subjectListing" >
            <!-- <table class="table-bordered table" id="subjectListingTable" style="width: 500px;">
                <tr>
                  <th>S.N.</th>
                  <th>Subject Name</th>
                  <th>Action</th>
                </tr>
          </table> -->
        </div>
            <div class="col-md-12 col-sm-12 tile d-none" id="addSubjectForm" >
                <div class="x_panel" >
                    <div class="x_title">
                      <h2>Subject Setup Form <small>(All Fields are Mandatory)</small></h2>
                      <div class="clearfix"></div>
                    </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" id="frmAddSubject">
                        <div class="form-group row ">
                          <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Subject Name : </strong></label>
                          <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" name="subjectName" id="subjectName" placeholder=""><label>(Subject Name : English, Math , Reasoning)</label><br/>
                            <span id="nameAlertMsg" class="" style="color:red;"></span>
                          </div>

                        </div>
                        <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-9 col-sm-9  offset-md-3">
                                <input type="button" class="btn btn-primary" value="Reset"></input>
                                <input type="hidden" id="sID" name="sID" value="">
                                <input type="button" class="btn btn-success" id="submitBtn"
                                onclick="submitSubjectDetails()" value="Submit"></input>
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
    $('#addSubjectName').addClass('d-none');
    $('#addSubject').addClass('d-none');
    allSubjectList();
    

  });
/******Add Student & Back  Button******/
function addButton()
{
      $('#addSubjectForm').removeClass('d-none');
      $('#subjectListing').addClass('d-none');
      $('#backButton').removeClass('d-none');
      $('#addSubjectBtn').addClass('d-none');
}

function backButton()
{
      $('#addSubjectForm').addClass('d-none');
      $('#subjectListing').removeClass('d-none');
      $('#backButton').addClass('d-none');
      $('#addSubjectBtn').removeClass('d-none');
}
/*********Add New Subject**********/

function submitSubjectDetails()
{		

		var subjectFrmData	=	$('#frmAddSubject').serialize();
    var submitBtnValue  = $('#submitBtn').val();
    var subjectName     = $('#subjectName').val();
    var sId             = $('#sID').val();
		/*var bannerAttachment 	= 	$('#bannerImage').prop('files')[0];
		var formdata  	= 	new FormData();
    	formdata.append("attachment", bannerAttachment);*/
      if(subjectName != '')
      {
          if(submitBtnValue == 'Submit')
          {
            var xhr = new XMLHttpRequest();
            method = 'post',
            url = ''+serverUrl+'examSetup/addSubjectName?'+subjectFrmData;
            xhr.onreadystatechange = function () 
            {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
                {
                    var returnedData= JSON.parse(xhr.responseText);
                    if(returnedData != '')
                    {
                      allSubjectList();    
                    }
                }
            };   
            xhr.open(method, url, subjectFrmData);
            xhr.send();
        }
        else
        {
            var xhr = new XMLHttpRequest();
            method = 'post',
            url = ''+serverUrl+'examSetup/editSubjectName?sId='+sId+'&'+subjectFrmData;
            xhr.onreadystatechange = function () 
            {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
                {
                    var returnedData= JSON.parse(xhr.responseText);
                    if(returnedData != '')
                    {
                      allSubjectList();    
                    }
                }
            };   
            xhr.open(method, url, subjectFrmData);
            xhr.send();
        }  
    }
		else
    {
       if (subjectName == "")
            $("#nameAlertMsg").text("Please Enter Subject Name");
        else
            $("#nameAlertMsg").text("");
    }
}

/******Edit Student Details*******/
function editSubjectDtls(id)
{
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/getSubjectDetailByID?&id='+id;
   
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
          var returnedData= JSON.parse(xhr.responseText);
          if(returnedData != '')
          {
             $('#addSubjectForm').removeClass('d-none');
             $('#subjectListing').addClass('d-none');
             $('#backButton').removeClass('d-none');
             $('#addSubjectBtn').addClass('d-none');
             $('#subjectName').val(returnedData[0]['subject_name']);
             $('#sID').val(id); 
             $('#submitBtn').val('Update');
          }   
      }
    };  
    xhr.open(method, url, true);
    xhr.send();

}
/********Subject Listing********/
function allSubjectList()
{
    var subjectData = '';
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/showAllSubjectName?';

    xhr.onreadystatechange = function () 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
        {
            var data= JSON.parse(xhr.responseText);

            if(data != '')
            {
                subjectData = '<table class="table-bordered table" id="subjectListingTable" style="width: 500px;"><tr>';
                subjectData += '<th>S.N.</th>';
                subjectData += '<th>Subject Name</th>';
                subjectData += '<th>Action</th>';
                subjectData +=  '</tr>';      
          
                for(var i = 0; i < data.length; i++)
                {
                  subjectData += '<tr>';
                  subjectData += '<td>'+(i+1)+'</td>';
                  subjectData += '<td>'+data[i]['subject_name']+'</td>';
                  subjectData += '<td><button type="button" class="" id="editSubjectBtn"  onclick="editSubjectDtls('+data[i]['id']+')"><i class="fa fa-edit btn-edit"></i>&nbsp;&nbsp;</button><button type="button" class="" id="DeleteSubjectBtn"  onclick="deleteSubjectDtls('+data[i]['id']+')"><i class="fa fa-trash text-danger" style="color:red"></i>&nbsp;&nbsp;</button></td>';
                  subjectData += '</tr>';
                }
                subjectData += '</table>';
                $('#subjectListing').html(subjectData);
                $('#addSubjectForm').addClass('d-none');
                $('#subjectListing').removeClass('d-none');       
                $('#backButton').addClass('d-none');   
                $('#addSubjectBtn').removeClass('d-none');        
            }
        }    
    }; 
    xhr.open(method, url, true);
    xhr.send();   
}
/************Delete Subject***********/
function deleteSubjectDtls(id)
{
  if (confirm("Are you sure you want to delete")) 
  {
            var xhr = new XMLHttpRequest(),
                method = 'GET',
                overrideMimeType = 'application/json',
                url = ''+serverUrl+'examSetup/deleteSubjectDetails?id='+id;
            xhr.onreadystatechange = function() 
            {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
                {
                    allSubjectList();
                    var msg1 = '';
                    msg1  += '<div class="alert alert-danger text-center" role="alert">';
                    msg1 += ' Subject Deleted Successfully';
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
</script>


