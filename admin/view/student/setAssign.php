<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
    <div>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="assignSetBtn" value="Assign Set" onclick="addButton()"></input>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="backButton" value="Back" onclick="backButton()"></input>
    </div>
        <div class=" top_tiles" style="margin: 10px 0;">
          <div class="col-md-12 col-sm-12 tile" id="setAssignListing" >
            
        </div>
            <div class="col-md-12 col-sm-12 tile d-none" id="setAssignForm" >
                <div class="x_panel" >
                  <div class="x_title">
                    <h2>Set Assign Form <small>(All Fields are Mandatory)</small></h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left" id="frmSetAssign">
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span>Student ID: </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <!-- <input type="text" class="form-control" list="browsers" name="studentId" id="studentId" placeholder="" onchange="getStudentId()"> -->
                          <select name="studentId" class="form-control" id="studentId" onchange="getStudentDetailById()"></select><label>(ID : 11,20 )</label>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span>Student Name: </strong></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input type="text" class="form-control" name="studentName" id="studentName" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span>Exam Type: </strong> </label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="selectExamType" class="form-control" id="selectExamType" onchange="getSetNo()" ></select>
                          <label id="labelname">(Select Exam Type Name)</label>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span>Select Set: </strong> </label>
                        <div class="col-md-9 col-sm-9 ">
                          <select name="selectSet" class="form-control" id="selectSet" onchange="getSetName()"></select>
                          <label id="labelname">(Select SET)</label>
                        </div>
                    </div>
                    <div class="form-group row ">
                     <label class="control-label col-md-3 col-sm-3 "><strong><span class="required"></span></strong> </label>
                        <div class="col-md-9 col-sm-9 ">
                           <input type="text" class="form-control" name="setName[]" id="setName" placeholder="">
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <input type="button" class="btn btn-primary" value="Reset"></input>
                            <!--<input type="hidden" id="eTID" name="eTID" value="">-->
                            <input type="button" class="btn btn-success" id="BtnassignSet" onclick="setAssign()" value="Submit"></input>
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
    $('#labelname').removeClass('d-none');
    assignSetListing();

    var optionValue = '';
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
              optionValue = '<option value="">Choose..</option>';            
               for(var i = 0; i < returnedData.length; i++)
              {
                  optionValue  +=  '<option value='+returnedData[i]['id']+'>'+returnedData[i]['id']+'</option>';
              }
              $('#studentId').html(optionValue);
            }    
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();
    /**************Exam Type List**************/

    /**********SET List************/
    var optionVal = '';
    var xhr1 = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'question/getAllSetName?';
    xhr1.onreadystatechange = function () 
    {
        if (xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200)
        {
          var returnedData= JSON.parse(xhr1.responseText);
          if(returnedData != '')
          {
           optionVal = '<option value="">Select Set..</option>';
           for(var i = 0; i < returnedData.length; i++)
            {
              optionVal  +=  '<option value='+returnedData[i]['set_no']+'>'+returnedData[i]['set_no']+'</option>';
            }
           $('#selectSet').html(optionVal);
          }    
        }
    }; 
    xhr1.open(method, url, true);
    xhr1.send();

  });
  /************************/
  function allExamType()
  {
    var optValue = '';
    var xhr1 = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'question/showAllExamType?';
    xhr1.onreadystatechange = function () 
    {
      console.log(XMLHttpRequest.DONE);
      if (xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200)
      {
        var returnedData= JSON.parse(xhr1.responseText);
        
        if(returnedData != '')
        {
          optValue = '<option value="">Choose..</option>';            
           for(var i = 0; i < returnedData.length; i++)
          {
              optValue  +=  '<option value='+returnedData[i]['exam_type']+'>'+returnedData[i]['exam_type']+'</option>';
          }
          $('#selectExamType').html(optValue);
        }    
      }
    }; 
    xhr1.open(method, url, true);
    xhr1.send();
  }
  /*****************************/
  function getSetNo()
  {
    var examType = $('#selectExamType').val();
    var optValue = '';
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'question/showAllSetNoByEtype?eType='+examType;
    xhr.onreadystatechange = function () 
    {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
        var returnedData= JSON.parse(xhr.responseText);
        if(returnedData != '')
        {
          optValue = '<option value="">Choose..</option>';            
           for(var i = 0; i < returnedData.length; i++)
          {
              optValue  +=  '<option value='+returnedData[i]['set_no']+'>'+returnedData[i]['set_no']+'</option>';
          }
          $('#selectSet').html(optValue);
        }
      }
    };
    xhr.open(method, url, true);
    xhr.send(); 
  }
  /*************************/
  function getStudentDetailById()
  {
    var sId = $('#studentId').val();
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'student/getStudentDetailByID?id='+sId;
    xhr.onreadystatechange = function () 
    {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
        var returnedData= JSON.parse(xhr.responseText);
        if(returnedData != '')
        {
          $('#studentName').val(returnedData[0]['name']);
        }
      }
    };
    xhr.open(method, url, true);
    xhr.send(); 
  }
  /***********************/
  var setN = '';

  function getSetName()
  {
    var setName = $('#selectSet').val();
    //$('#setName').val(setName);
    setN = setName+','+setN;
    $('#setName').val(setN);
  }

  function getExamTime()
  {
    var examName = $('#examName').val();
    var xhr1 = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/getExamTimeByEname?examName='+examName;

    xhr1.onreadystatechange = function () 
    {
        if (xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200)
        {
            var returnedData= JSON.parse(xhr1.responseText);
            if(returnedData != '')
            {
              $('#examTime').val(returnedData[0]['exam_time']);
            }    
        }
    };
    xhr1.open(method, url, true);
    xhr1.send(); 

  }
/******Add Student & Back  Button******/
function addButton()
{
    $('#setAssignForm').removeClass('d-none');
    $('#setAssignListing').addClass('d-none');
    $('#backButton').removeClass('d-none');
    $('#assignSetBtn').addClass('d-none');
    allExamType();
}

function backButton()
{
    $('#setAssignForm').addClass('d-none');
    $('#setAssignListing').removeClass('d-none');
    $('#backButton').addClass('d-none');
    $('#assignSetBtn').removeClass('d-none');
}


/**************Set Assign ****************/
function setAssign()
{		
		var assignSetFrmData	=	$('#frmSetAssign').serialize();
    var submitBtnValue    = $('#BtnassignSet').val();
    var subjectId         = $('#studentId').val();
    var studentName       = $('#studentName').val();
    var selectSet         = $('#selectSet').val();
    var setName           = $('#setName').val();
    var eTID              = $('#eTID').val();
    
    if(subjectId != '' && studentName != '' && selectSet != '' && setName != '')
    {
      if(submitBtnValue == 'Submit')
      {
          var xhr = new XMLHttpRequest();
          method = 'post',
          url = ''+serverUrl+'student/assignSet?'+assignSetFrmData;
          xhr.onreadystatechange = function () 
          {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
            {
                var returnedData= JSON.parse(xhr.responseText);
                if(returnedData != '')
                {
                  assignSetListing()
                } 
            }
          };    
          xhr.open(method, url, assignSetFrmData);
          xhr.send();
        }
        else
        {
            /*var xhr = new XMLHttpRequest();
            method = 'post',
            url = ''+serverUrl+'examSetup/editExamSetup?id='+eTID+'&'+examTypeFrmData;
            xhr.onreadystatechange = function () 
            {
              if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
              {
                  var returnedData= JSON.parse(xhr.responseText);
                  if(returnedData != '')
                  {
                    examTypeListing()
                  } 
              }
            };    
            xhr.open(method, url, examTypeFrmData);
            xhr.send();*/
        }
    }
    else
    {

    }

}

/******Edit Student Details*******/
function editExamType(id)
{
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/getExamTypeByID?id='+id;
   
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
          var returnedData= JSON.parse(xhr.responseText);
          if(returnedData != '')
          {
            $('#examTypeForm').removeClass('d-none');
            $('#examTypeListing').addClass('d-none');
            $('#backButton').removeClass('d-none');
            $('#addExamTypeBtn').addClass('d-none');
            $('#examName').val(returnedData[0]['exam_name']);
            $('#examTime').val(returnedData[0]['exam_time']);
            $('#subjectName').val(returnedData[0]['subject_name']);
            $('#noOfQuestion').val(returnedData[0]['no_of_question']);
            $('#addMark').val(returnedData[0]['mark_add']);
            $('#minusMark').val(returnedData[0]['mark_minus']);
            $('#eTID').val(returnedData[0]['id']);
            $('#submitBtn').val('Update');
          }   
      }
    };  
    xhr.open(method, url, true);
    xhr.send();

}
/*************Delete Exam Type**************/
function deleteExamType(id)
{
  if (confirm("Are you sure you want to delete")) 
  {
            var xhr = new XMLHttpRequest(),
                method = 'GET',
                overrideMimeType = 'application/json',
                url = ''+serverUrl+'examSetup/deleteExamTypes?id='+id;
            xhr.onreadystatechange = function() 
            {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
                {
                    examTypeListing();
                    var msg1 = '';
                    msg1  += '<div class="alert alert-danger text-center" role="alert">';
                    msg1 += ' Exam Type Deleted Successfully';
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
/********Student Listing********/
function assignSetListing()
{
    var eData = '';
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'student/allAssignSet?';
    xhr.onreadystatechange = function () 
    {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
          var data= JSON.parse(xhr.responseText);
          if(data != '')
          {
              eData ='<table class="table-bordered table" id="examTypeListingTable"><tr>';
              eData += '<th>S.N.</th>';
              eData += '<th>SID</th>';
              eData += '<th>Student Name</th>';
              eData += '<th>Exam Type</th>';
              eData += '<th>Set No</th>';
              eData += '<th>Date</th>';
              eData += '<th>Action</th></tr>';

              for(var i =0; i< data.length; i++)
              {     
                eData += '<tr>';
                eData += '<td>'+(i+1)+'</td>';
                eData += '<td>'+data[i]['student_id']+'</td>';
                eData += '<td>'+data[i]['student_name']+'</td>';
                eData += '<td>'+data[i]['exam_type']+'</td>';
                eData += '<td>'+data[i]['set_no']+'</td>';
                eData += '<td>'+data[i]['date']+'</td>';
                eData += '<td><button type="button" class="" id="editExamType"  onclick="editAssignSet('+data[i]['id']+')"><i class="fa fa-edit btn-edit"></i>&nbsp;&nbsp;</button><button type="button" class="" id="deleteExamType"  onclick="deleteAssignSet('+data[i]['id']+')"><i class="fa fa-trash text-danger" style="color:red"></i>&nbsp;&nbsp;</button></td>';
                eData += '</tr>';
                
              }

              eData += '</table>';
              $('#setAssignListing').html(eData);
              $('#setAssignForm').addClass('d-none');
              $('#setAssignListing').removeClass('d-none');       
              $('#backButton').addClass('d-none');
              $('#assignSetBtn').removeClass('d-none');       
          }
      }
    };
    xhr.open(method, url, true);
    xhr.send();
}
</script>


