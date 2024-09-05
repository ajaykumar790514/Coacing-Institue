<!DOCTYPE html>
<html>
<head>
  <title>Jee Expert Enrollment</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--   <script src="<?=base_url()?>themes/admin_panel/vendor/jquery/jquery.min.js"></script>
  <link href="<?=base_url()?>themes/admin_panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?=base_url()?>themes/admin_panel/vendor/bootstrap/js/bootstrap.min.js"></script> -->

  <link href="<?=base_url()?>assets/school/img/favicon.jpg" rel="icon">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115892881-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115892881-2');
</script>

  <style>
  .form-row{
    padding: 15px 0px 15px 0px; 
  }
  .heading{
  text-shadow: 1px 1px 1px #6055b3;
    font-size: 20px;
    color: #286090;
    letter-spacing: 0px;
  }
  .border_box{
        border: 4px black;
    width: 100%;
    height: auto;
    padding-top: 3px;
    padding-bottom: 20px;
    border-style: double;
    border-radius: 42px
  }
  .alert_header{
  color: #f2f0f7;
    background-color: #7c95af;
    border-color: #337ab7;
  }
  }
  .head_exp
  {
  
    letter-spacing: 10px;
  }
  .dec_line{
   float: left;
    letter-spacing: 0px;
    color: #0d0c40;
  }
  .dec_line{
  font-size: 20px;
    color: #286090;
    letter-spacing: 0px;
  }
  .logo
  {
    font-family:'bauhaus 93';
    font-size:100px;
    color:white;
    padding:0;
    word-spacing:3px;
    letter-spacing:3px;
    margin:0;
  }
  .logo1
  {
    font-family:arial;
    font-size:20px;
    color:white;
    word-spacing:5px;
    letter-spacing:15px;
  }
  .border_dec{
  border-style: solid;
    border-color: black;
    border-width: 2px;
    border-radius: 30px;
    height: 170px;
    width: 150px;
  margin-left: 15px;
  }
  .border_dec img{

      border-radius: 30px;
      height: 170px;
      width: 150px;
    /*margin-left: 15px;*/
  }

  .signature{
  border-style: solid;
    border-color: black;
    border-width: 2px;
    border-radius: 13px;
    height: 60px;
    width: 150px;
  /*margin-left: 30px;*/
  }
  
  .signature img{
  /*border-color: white;  */
    border-radius: 13px;
    height: 60px;
    width: 150px;
  margin-left: -16px;
  margin-top: -1px;
  /*outline: none!important;*/
  /*box-shadow: none!important;*/
  }


  .brond_bord{
  color: darkred;
    margin-top: 13px;

    border: solid;
    border-color: black;
    letter-spacing: 1px;
    width: 100%;
    height: auto;
  }


 input {
    background-color: transparent;
    border: 0px solid!important;
    border-bottom: 1px solid!important;
      border-radius: 0px;
    height: 20px;
    width: 160px;
    outline: none!important;
      box-shadow: none;
    /*color: #CCC;*/
}

td input {
    background-color: transparent;
    border: 0px solid!important;
    /*border-bottom: 1px solid!important;*/
      border-radius: 0px;
    /*height: 20px;*/
    width: 160px;
    outline: none!important;
      box-shadow: none;
    /*color: #CCC;*/
}
select{
   background-color: transparent;
    border: 0px solid!important;
    border-bottom: 1px solid!important;
      border-radius: 0px;
    height: 20px;
    width: 160px;
    outline: none!important;
      box-shadow: none;
}
 textarea {
    background-color: transparent;
    border: 1px solid!important;
    /*border-bottom: 1px solid!important;*/
    border-radius: 15px!important;
      /*height: 0px;
      width: 160px;*/
    /*outline: none!important;*/
    
}
textarea:focus, input:focus{
    outline: none!important;
}
.form-control:focus {
  border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.form-control {
  border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 0px;
}
.input-group-addon
{
   background-color: transparent;
    border: 0px solid!important;
     box-shadow: none;
     outline: none!important;
}
.upper { text-transform: uppercase; }
  </style>

</head>
<body>
<script type="text/javascript">
  function load_batch(program_id)
  {
    var CLASS = $('#stu_class').val();
    $('#batch').html('<option value="" >Loading.....</option>');
    $('#batch').load('<?=base_url()?>enrollment/get_batch/'+CLASS+'/'+program_id);
  }

  function check_enrol(enrollment_no)
  {
      if (enrollment_no.length>0) {
        $.ajax({
          url:'<?=base_url()?>enrollment/check_enrollment_no/'+enrollment_no,
          success:function(data){
            alert(data);
          }
        });
      }
  }

$(document).ready(function(){
    $('#enrol').keyup(function(){
        var enrollment_no = $(this).val();
         if (enrollment_no.length>0) {
        $.ajax({
          url:'<?=base_url()?>enrollment/check_enrollment_no/'+enrollment_no,
          success:function(data){
            if (data==0) { 
              $('#errMessage_enrol').html('Enrollment Number Already Exist.');
              $('#submit').prop('disabled','disabled');
             }
             else{
              $('#errMessage_enrol').html('');
              $('#submit').prop('disabled',false);
             }
          }
        });
      }
    });
});

  function get_program(CLASS)
  {
  	  $('#program').html('<option value="" >Loading.....</option>');
      $('#program').load('<?=base_url()?>enrollment/get_program/'+CLASS);
  }

   function load_city(state_id)
  {
    $('#city').html('<option value="" >Loading.....</option>');
    $('#city').load('<?=base_url()?>enrollment/get_city/'+state_id);
  }

//  $(document).ready(function(){
//     $('input').keyup(function(){
//         $(this).val($(this).val().toUpperCase());
//     });
// });
</script>
  <div class="container col-md-12" style="padding-left: 4%;padding-right: 4%;">
            <!-- <div class="alert alert-success alert_header text-center" style="padding-top:0px;padding-bottom:0px;">
          <h1 class="logo">JEE EXPERT</h1>
          <h4 class="logo1">PRIVATE LIMITED</h4>
        </div> -->
        <img class="img-responsive" src="<?=base_url()?>images/Colour-logo.jpg">
      </div> 
    <div class="container container_inner">
        <div class="row">
            <div class="card-body" style="padding: 8px 10px !important;">
        
      </div>
      <div class="col-md-12 text-center">
        <strong class="heading"><u>Enrollment</u></strong>
        <!-- <small style="float: right;color: red">For Any Help Please Contact - +91  9919447742 / 43</small> -->
      
        <br>
        <br>
      </div>
<style type="text/css">
  .table tr th 
  {
    text-align: right;
  }
</style>
<form method="post"  action="<?=base_url()?>enrollment/enrollment_submit">          
<br><br>
<p style="color: red; font-size: 20px;" >Please fill all mandatory * fields</p>
</br>

<span id="error_msg" style="color: red">
  
</span>
<div class="form-group">  
  <div class="row">
    <h4 style="color:red;"></h4>
     <div class="col-md-12">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>a) Registration Number <small>(as mentioned on the Admit Card)</small>  : *</b></span>
            <input class="form-control upper" id="date" type="text"  placeholder="Enter Registration No."   name="registration_no" value="<?=$student->registration_no?>" required readonly>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>b) Test Date: *</b></span>
            <input class="form-control" id="test_date" type="date"     name="test_date" value="<?=$student->admission_test_date?>" required readonly>
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>c) Student Name : *</b></span>
              <input class="form-control upper" id="student_name" type="text" aria-describedby="namestudent" placeholder="Enter name student"  name="student_name" value="<?=$student->student_name?>" onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
          </div>

          <div class="col-md-2 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>d) Class : *</b></span>
              <input class="form-control" type="text"  placeholder="Class"  name="stu_class" id="stu_class" value="<?=$student->program_code?>" oninput="get_program(this.value)"  required>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>e) Scholarship Awarded % <small>(if applicable)</small>: </b></span>
              <input class="form-control" type="text"  placeholder="Scholarship Awarded"  name="waiver_offered" id="waiver_offered" value="<?=$stu_result->waiver_offered?>"  required>
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4 col-sm-6">

          <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>f) Program : *</b></span>
              <select class="form-control" id="program" name="program" onchange="get_program_year(this.value)"  required="">
                <option value="">-- Select Program --</option>
                <?php  foreach ($programs as $pro) {
                 echo "<option value='".$pro->id."'>".$pro->program."</option>";
                } ?>
              </select>
              <input type="hidden" id="years" >
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>g) Session Year From : *</b></span>
              <input type="number" name="session_year_from" id="session_year_from" class="form-control"oninput="set_session_year_to(this.value)">
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>g) Session Year To : *</b></span>
              <input type="number" name="session_year_to" id="session_year_to" class="form-control" readonly="">
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="form-row">

          <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>g) Program Type : *</b></span>
              <select class="form-control" id="program_type" name="program_type"  required="">
                <option value="">-- Select Program Type --</option>
                <option value='CP'>Class Room Program</option>
                <option value='SP'>School Program</option>
                <option value='TS'>Test Series</option>
                <option value='SM'>Study Material</option>
              </select>
            </div>
          </div>

          <script type="text/javascript">

            $(document).ready(function(){
               $('#program_type').on('change', function(){
                  $('#enrol').val('');
                })
              })



            function generate_enrollment_no(program_type)
            {
              $('#enrol').val('');
              var program = $('#program').val();
              var program_year = $('#years').val();
              var program_type = $('#program_type').val();
              var session_year_from = $('#session_year_from').val();
              var session_year_to = $('#session_year_to').val();
              var ClaSS = '<?=$student->program_code?>';
              var center_code = '<?=$student->center_code?>';

              if (program.length!=0 && program_year.length!=0 && program_type.length!=0 && session_year_from.length!=0 && session_year_to.length!=0 ) {
                $('#errMessage_enrol').html('');

                $.post('<?=base_url()?>enrollment/generate_enrollment_no',
                  {
                    program:program,
                    program_year:program_year,
                    program_type:program_type,
                    session_year_from:session_year_from,
                    session_year_to:session_year_to,
                    ClaSS:ClaSS,
                    center_code:center_code
                  },
                function(response,status)
                {
                  $('#enrol').val(response);
                })
                 
              }
              else
              {
                $('#errMessage_enrol').html('Fill All Mandatory * Fields');
              }
              // var program_year ='';
              // if (program_type.length!=0) {
              //     var program_id = $('#program').val();
              //    if (program_id.length!=0) {  
              //       var program_year = $('#years').val();
              //       $('#enrol').val('<?=$student->program_code?>_<?=$student->center_code?>_'+program_type+'_'+program_year);
              //    }
              // }
             
               
            }

            function get_program_year(program_id)
            {
              $('#enrol').val('');
              if (program_id.length!=0) {
                $.post('<?=base_url()?>enrollment/get_program_year',{id:program_id},
                function(response,status)
                {
                  $('#years').val(response);
                  // $('#enrol').val(response);
                  $('#program_type').val('');
                })
              }
              else{
                  $('#years').val('');
              }
              
            }

            function set_session_year_to(year_from){
              $('#enrol').val('');
               var program_id = $('#program').val();
               var session_year_to='';
                 if (program_id.length==0) { 
                  $("#error_msg").html('Select Programs!'); return;
                }
                else
                {
                  $("#error_msg").html('');
                  var years = $('#years').val();
                  var session_year_to = parseInt(year_from)+parseInt(years);
                  $('#session_year_to').val(session_year_to);
                }
            }
          </script>

          <!-- <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>g) Batch : *</b></span>
              <select class="form-control" id="batch" name="batch"  required="">
                <option value="">-- Select Program --</option>
                
              </select>
              <div id="errMessage" style="color: red;"></div>
            </div>
          </div> -->

          <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>h) Enrollment No. : *</b></span>
              <input class="form-control upper" id="enrol" type="text" aria-describedby="namestudent" placeholder="Student Enrollment No."   name="enrol"  required readonly >
              <div id="errMessage_enrol" style="color: red;"></div>
            </div>
           
          </div>
           <div class="col-md-4 col-sm-6">
             <a class="btn btn-success btn-xs" onclick="generate_enrollment_no()" style="margin: 12px 0px 0px 0px;">Generate  Enrollment No.</a>
           </div>
        </div>
      </div>

    

   
     
    </div>
  </div>  
</div>


<div class="form-group">  
  <div class="row">
    <h4 style="color:red;">1. Details about the Student</h4>
    <div class="col-md-9">
     

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>a) Date of Birth : *</b></span>
            <input class="form-control" id="date" type="date" aria-describedby="date" placeholder="Enter dob"   name="dob" value="<?=$student->dob?>" required>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>b) Email : *</b></span>
            <input class="form-control" id="email" type="email" aria-describedby="date" placeholder="Enter Email"   name="email" required>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>c) Aadhar number of the student :</b></span>
            <input class="form-control upper" type="text"  placeholder="Enter Aadhar Number"  value="<?=$student->adhar_number?>"   name="adhar_number">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>d) Contact No.(Mobile - 1) *</b></span>
              <input class="form-control" id="mobile_no" type="text" aria-describedby="namestudent" value="<?=$student->mobile_no?>" placeholder="Student Mobile No."   name="mobile_no" required>
              <div id="errMessage" style="color: red;"></div>
            </div>
          </div>
        </div>
      </div>

       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>e) Contact No.(Mobile - 2) *</b></span>
              <input class="form-control" id="mobile_no2" type="text"  placeholder="Student Mobile No."   name="mobile_no2" >
              <div id="errMessage" style="color: red;"></div>
            </div><br>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>f) Stats<sub>*</sub> :</b></span>
              <select class="form-control" id="state" name="state" onchange="load_city(this.value)"  required="">
                <option value="">-- Select State --</option>
                <?php foreach ($states as $state) {
                  $s=" " ; if ($state->id==38) { $s="selected"; }
                  echo "<option value='".$state->id."' ".$s.">".$state->name."</option>";
                } ?>
              </select>
            </div>
          </div>

           <div class="col-md-">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>g) City<sub>*</sub> :</b></span>
              <select class="form-control" id="city" name="city" required="">
                <option value="">-- Select City --</option>
                <?php foreach ($cities as $city) {
                  $s=" " ;// if ($city->id==4861) { $s="selected"; }
                  echo "<option value='".$city->id."' ".$s.">".$city->name."</option>";
                } ?>
              </select>
            </div>
          </div>

        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">

              <span class="input-group-addon" style="color:darkblue;"><b>h) Permanent Address</b></span>
              <textarea class="form-control " row="17" id="date" type="address" aria-describedby="date" placeholder="Enter Address" required name="address"><?=$student->address?></textarea>
            </div>
          </div>
        
        </div>
      </div>

       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>i) Pin *</b></span>
              <input class="form-control"  type="number"  placeholder="Pin."   name="pin" id="pin" value="<?=$student->pin?>" required>
            </div>
          </div>
        </div>
      </div>


       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>j) School / Last Attended / Presently Attending</b></span>
              <input class="form-control upper" id="school" type="text" value="<?=$student->school?>"  placeholder="School Name"   name="school" required>
            </div>
          </div>
        </div>
      </div>


      

      

      <!-- <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
          <div class="input-group">
            <span class="input-group-addon" style="color:darkblue;"><b>e) Gender : *</b></span>
            <div class="col-md-6">
            <select class="form-control" name="gender" required >
            <option value="">---Select Gender---</option>
            <?php // $m="" ; $f="";
            // if ($student->gender=='Male') { $m="selected"; }
            // else { $f="selected"; } 
            ?>
            <option value="Male" <?=$m?> >Male</option>
            <option value="Female" <?=$f?> >Female</option>      
            </select>
            </div>
            </div>
          </div>
        </div>
      </div>
 -->

                
     

        

     
    </div>
  </div>  
</div>




 
<div class="col-md-12">
  <div class="row">
  <h4 style="color:red;">2. Parent’s Details</h4>
    <div class="col-md-12 ">
      <div class="form-group">
        <div class="form-row">
          <table class="table table-bordered  ">
                        <thead>
                            <tr>
                                <th style="color:darkblue;width: 20%" class="text-center">  
                                  Particulars
                                </th>
                                <th style="color:darkblue;" class="text-center" >
                                  Father
                                </th>
                                <th style="color:darkblue;" class="text-center">
                                  Mother
                                </th>
                            </tr>
            </thead>
                        <tbody>
                            <tr class="table-info">
                                <td style="color:darkblue;">Name</td>
                                <td>
                                  <input class="form-control upper" type="text" name="father_name" placeholder="Enter Here" required value="<?=$student->father_name?>" >
                                </td>
                                <td>
                                  <input class="form-control upper" type="text" name="mother_name" placeholder="Enter Here" required  value="<?=$student->mother_name?>" >
                                </td>
                            </tr>
              <tr>
                               <td style="color:darkblue;" >Qualification</td>
                               <td>
                                  <input class="form-control upper" type="text" name="father_qualification" placeholder="Enter Here" value="<?=$student->father_qualification?>">
                               </td>
                               <td>
                                  <input class="form-control upper" type="text" name="mother_qualification" placeholder="Enter Here" value="<?=$student->mother_qualification?>">
                               </td>
                            </tr>
              <tr class="table-info" >
                               <td style="color:darkblue;">Occupation</td>
                               <td>
                                  <input class="form-control upper" type="text" name="father_occupation" placeholder="Enter Here" value="<?=$student->father_occupation?>"  >
                               </td>
                               <td>
                                  <input class="form-control upper" type="text" name="mother_occupation" placeholder="Enter Here" value="<?=$student->mother_occupation?>" >
                               </td>
                            </tr>
              <tr>
                               <td style="color:darkblue;" >Organization Name</td>
                               <td>
                                  <input class="form-control upper" type="text" name="father_organization" placeholder="Enter Here" value="<?=$student->father_organization?>">
                               </td>
                               <td>
                                  <input class="form-control upper" type="text" name="mother_organization" placeholder="Enter Here" value="<?=$student->mother_organization?>">
                               </td>
                            </tr>
              <tr class="table-info">
                               <td style="color:darkblue;">Designation in Organization</td>
                               <td>
                                  <input class="form-control upper" type="text" name="father_designation_in_organization" placeholder="Enter Here" value="<?=$student->father_designation_in_organization?>">
                               </td>
                               <td>
                                  <input class="form-control upper" type="text" name="mother_designation_in_organization" placeholder="Enter Here" value="<?=$student->mother_designation_in_organization?>">
                               </td>
                            </tr>
              <tr>
                               <td style="color:darkblue;">Contact No.</td>
                               <td>
                                  <input class="form-control" type="text" name="father_contact_no" placeholder="Enter Here" required value="<?=$student->father_contact_no?>" >
                               </td>
                               <td>
                                  <input class="form-control" type="text" name="mother_contact_no" placeholder="Enter Here" value="<?=$student->mother_contact_no?>" >
                               </td>
                            </tr>
                            <tr>
                               <td style="color:darkblue;">Email Id.</td>
                               <td>
                                  <input class="form-control" type="email" name="father_email" placeholder="Enter Here" value="<?=$student->father_email?>">
                               </td>
                               <td>
                                  <input class="form-control" type="email" name="mother_email" placeholder="Enter Here" value="<?=$student->mother_email?>">
                               </td>
                            </tr>
                        </tbody>
                    </table>
        </div>
      </div>
    </div>
  </div>  
</div>

  <div class="col-md-12">
    <div class="row">
    <br><br>
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success "  id="submit"  >Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <button onclick="myFunction()" class="btn btn-info" > <i class="fas fa-print"></i> Print</button>
      </div>
    </div>  
  </div>
</form>         
</div> 
</div>    
</br>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
  $('#add_form').on('submit', function(e){
  	$('#submit').prop('disabled','disabled');
  //   e.preventDefault();
  //     $.ajax({
  //       url:"<?=base_url()?>enrollment/enrollment_submit", 
  //       method:"POST",
  //       data:new FormData(this),
  //       contentType: false,
  //       cache: false,
  //       processData:false,
  //       beforeSend: function() {
  //      		$('#submit').prop('disabled','disabled');
       
  //   	},
  //       success:function(data){
  //       	$('#submit').prop('disabled',false);
  //       	if (data==1) {
  //       		alert('You Are Already Registered For This Test.');
  //       	}
  //       	else {
  //       		$('#add_form')[0].reset();
  //       		if (<?=$admin?>==1) {
  //       			window.open("<?=base_url()?>admin/registration_list","_self");
  //       		}
  //       		else {
  //       			window.open("<?=base_url()?>Thank-You/"+data,"_blank");
  //       		}
  //       	}
  //       }
  //     });
  // });
});
</script>




