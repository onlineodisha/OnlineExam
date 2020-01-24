<div class="right_col" role="main">
    <div class="row" style="display: inline-block;">
    <div>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="addExamTypeBtn" value="Add Exam Type" onclick="addButton()"></input>
      <input class="btn btn-primary" style="margin-left: 10px; padding: 5px;" type="button" id="backButton" value="Back" onclick="backButton()"></input>
    </div>
        <div class=" top_tiles" style="margin: 10px 0;">
          <div class="col-md-12 col-sm-12 tile" id="examTypeListing" >
            
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
                          <input type="text" class="form-control" list="browsers" name="examName" id="examName" placeholder="" onchange="getExamTime()"><label>(Exam Name : Railway, SSC , IBPS)</label>
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
                          <select name="subjectName" class="form-control" id="subjectName"></select>
                          <label id="labelname">(Select Subject Name:- Math / English / Reasoning / GK)</label>
                        </div>
                    </div>
                    <div class="form-group row d-none" id="addSubjectForm"> 
                        <label class="control-label col-md-3 col-sm-3 "><strong><span class="required">*</span> Enter Name :</strong> </label>
                        <div class="col-md-9 col-sm-9 " >
                            <input type="text" class="form-control" name="addSubjectName" id="addSubjectName" placeholder="" > 
                            <input class="btn btn-primary" type="button" id="addSubject" value="Add" style="margin-top: 5px;float: right;padding: 5px;">
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
                          <input type="hidden" id="eTID" name="eTID" value="">
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
    $('#addSubjectName').addClass('d-none');
    $('#addSubject').addClass('d-none');
    $('#labelname').removeClass('d-none');
    examTypeListing();

    var optionValue = '';
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/showAllSubjectName?';

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
                  optionValue  +=  '<option value='+returnedData[i]['subject_name']+'>'+returnedData[i]['subject_name']+'</option>';
              }
              $('#subjectName').html(optionValue);
            }    
        }
    }; 
    xhr.open(method, url, true);
    xhr.send();

    /**********Exam Name DropDownlist************/
    var optionVal = '';
    var xhr1 = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/getAllParentExamTypes?';

    xhr1.onreadystatechange = function () 
    {
        if (xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200)
        {
            var returnedData= JSON.parse(xhr1.responseText);
            
            if(returnedData != '')
            {
              optionVal = '<datalist id="browsers">';            
               for(var i = 0; i < returnedData.length; i++)
              {
                  optionVal  +=  '<option value='+returnedData[i]['exam_name']+'>';
              }
              optionVal += '</datalist>';
              $('#examName').html(optionVal);
            }    
        }
    }; 
    xhr1.open(method, url, true);
    xhr1.send();

  });
  /************************/
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


/**************Student Enrollment ****************/
function submitExamDetails()
{		

		var examTypeFrmData	=	$('#frmExamType').serialize();
    var submitBtnValue  = $('#submitBtn').val();
    var subjectName     = $('#subjectName').val();
    var examTime        = $('#examTime').val();
    var examName        = $('#examName').val();
    var noOfQuestion    = $('#noOfQuestion').val();
    var addMark         = $('#addMark').val();
    var minusMark       = $('#minusMark').val();
    var eTID            = $('#eTID').val();
    
    if(subjectName != '' && examName != '' && examTime != '' && noOfQuestion != '' && addMark != '' && minusMark != '')
    {
        if(submitBtnValue == 'Submit')
        {
            var xhr = new XMLHttpRequest();
            method = 'post',
            url = ''+serverUrl+'examSetup/createExamSetup?'+examTypeFrmData;
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
            xhr.send();
        }
        else
        {
            var xhr = new XMLHttpRequest();
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
            xhr.send();
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
function examTypeListing()
{
    var eData = '';
    var xhr = new XMLHttpRequest();
    method = 'post',
    url = ''+serverUrl+'examSetup/getAllExamType?';
    xhr.onreadystatechange = function () 
    {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)
      {
          var data= JSON.parse(xhr.responseText);
          if(data != '')
          {
              eData ='<table class="table-bordered table" id="examTypeListingTable"><tr>';
              eData += '<th>S.N.</th>';
              eData += '<th>Exam Name</th>';
              eData += '<th>Exam Time</th>';
              eData += '<th>Subject Name</th>';
              eData += '<th>No Of Question</th>';
              eData += '<th>Mark</th>';
              eData += '<th>Minus Mark</th>';
              eData += '<th>Action</th></tr>';

              for(var i =0; i< data.length; i++)
              {     
                eData += '<tr>';
                eData += '<td>'+(i+1)+'</td>';
                eData += '<td>'+data[i]['exam_name']+'</td>';
                eData += '<td>'+data[i]['exam_time']+'</td>';
                eData += '<td>'+data[i]['subject_name']+'</td>';
                eData += '<td>'+data[i]['no_of_question']+'</td>';
                eData += '<td>'+data[i]['mark_add']+'</td>';
                eData += '<td>'+data[i]['mark_minus']+'</td>';
                /*if(data[i]['is_active'] == 1)
                {
                //studentData += '<td>'+'Active'+'</td>';
                studentData += '<td>'+'<button type="button" class="" id="stdActDeactBtn" onclick="studentActDeact('+data[i]['id']+','+data[i]['is_active']+')" data-toggle="tooltip" title="Deactive" ><i class="fa fa-check-circle text-primary" ></i>&nbsp;&nbsp;</button>'+'</td>';
                }
                else
                {
                  //studentData += '<td>'+'Inactive'+'</td>';
                  studentData += '<td>'+'<button type="button" class="" id="stdActDeactBtn" onclick="studentActDeact('+data[i]['id']+','+data[i]['is_active']+')" data-toggle="tooltip" title="Active"><i class="fa fa-ban"></i>&nbsp;&nbsp;</button>'+'</td>';
                }*/
                eData += '<td><button type="button" class="" id="editExamType"  onclick="editExamType('+data[i]['id']+')"><i class="fa fa-edit btn-edit"></i>&nbsp;&nbsp;</button><button type="button" class="" id="deleteExamType"  onclick="deleteExamType('+data[i]['id']+')"><i class="fa fa-trash text-danger" style="color:red"></i>&nbsp;&nbsp;</button></td>';
                eData += '</tr>';
                
              }

              eData += '</table>';
              $('#examTypeListing').html(eData);
              $('#examTypeForm').addClass('d-none');
              $('#examTypeListing').removeClass('d-none');       
              $('#backButton').addClass('d-none');
              $('#addExamTypeBtn').removeClass('d-none');       
          }
      }
    };
    xhr.open(method, url, true);
    xhr.send();
}
</script>


