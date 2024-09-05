<!DOCTYPE html>
<html>
<head>
<title>RS INSTITUTE</title>
  <link href="<?=base_url();?>images/logo/rslogofavicon.png" rel="icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--   <script src="<?=base_url()?>themes/admin_panel/vendor/jquery/jquery.min.js"></script>
  <link href="<?=base_url()?>themes/admin_panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?=base_url()?>themes/admin_panel/vendor/bootstrap/js/bootstrap.min.js"></script> -->

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
/* .img-responsive
{
 text-align: center;
} */
input.upper { text-transform: uppercase; }
@media print {
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        color: #333;
    }
    h1 {
        color: #555;
    }
    p {
        margin-bottom: 10px;
    }
    .father_name {
        height: 100px;
    }
    /* Add any other styles you want to apply to the printed content */
}


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
  	  $('#batch').html('<option value="" >.............</option>');
      $('#program').load('<?=base_url()?>enrollment/get_program/'+CLASS);
  }

   function load_city(state_id)
  {
    $('#city').html('<option value="" >Loading.....</option>');
    $('#city').load('<?=base_url()?>enrollment/get_city/'+state_id);
  }

 $(document).ready(function(){
    $('input').keyup(function(){
    $(this).val($(this).val().toUpperCase());
    });
});
</script>
<div id="baseDivId">
    <div class="container col-md-12" style="padding-left: 4%;padding-right: 4%;" >
            <!-- <div class="alert alert-success alert_header text-center" style="padding-top:0px;padding-bottom:0px;">
          <h1 class="logo">JEE EXPERT</h1>
          <h4 class="logo1">PRIVATE LIMITED</h4>
        </div> -->
        <?php
				$logo=$this->db->get('logos')->row();
				?>
			<center><img class="img-responsive"  src="<?=base_url()?>images/logo/<?=$logo->admission_form?>"></center>	
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
<form method="post" id="add_form" action="<?=base_url()?>enrollment/enrollment_edit_submit/<?=$student->stu_id;?>">          
<br><br>
<p style="color: red; font-size: 20px;" >Please fill all mandatory * fields</p>
</br>





<div class="form-group">  
  <div class="row">
    <h4 style="color:red;"></h4>
    <div class="col-md-12">
      

      <div class="form-group">
        <div class="form-row">
        <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>a) Enrollment No. : *</b></span>
              <input class="form-control" id="enrol" type="text" aria-describedby="namestudent" placeholder="Student Enrollment No." value="<?=$student->enrollment_no;?>"   name="enrol"  readonly required>
              <div id="errMessage_enrol" style="color: red;"></div>
            </div>
          </div>
          <!-- <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>a) Registration Number <small>(as mentioned on the Admit Card)</small>  :</b></span>
            <input class="form-control" id="date" type="text"  placeholder="Enter Registration No."   name="registration_no"  readonly>
            </div>
          </div> -->
          <!-- <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>b) Test Date :</b></span>
            <input class="form-control" id="test_date" type="date"     name="test_date"  readonly>
            </div>
          </div> -->
          <div class="col-md-6 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>b) Student Name : *</b></span>
              <input class="form-control" id="student_name" type="text" aria-describedby="namestudent" placeholder="Enter name student" value="<?=$student->name;?>"  name="student_name"  onkeyup="this.value = this.value.toUpperCase();" required>
            </div>
          </div>
          <br>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-4 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>c) Class : *</b></span>
              <input class="form-control" type="text"  placeholder="Class" readonly  name="stu_class" id="stu_class"  oninput="get_program(this.value)" value="<?=$student->stu_class;?>"  required>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>d) Program : *</b></span>
              <select class="form-control" id="program" readonly name="program" onchange="load_batch(this.value)"  required="">
                <option value="<?=$program->id;?>"><?=$program->program;?></option>
              </select>
            </div>
          </div>

          <div class="col-md-4 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>e) Batch : *</b></span>
              <select class="form-control" id="batch" readonly name="batch"  required="">
              <option value="<?=$batch->id;?>"><?=$batch->batch;?></option>
                
              </select>
              <div id="errMessage" style="color: red;"></div>
            </div>
          </div>
          <!-- <div class="col-md-8 col-sm-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>d) Scholarship Awarded % <small>(if applicable)</small>: </b></span>
              <input class="form-control" type="text"  placeholder="Scholarship Awarded"  name="waiver_offered" id="waiver_offered"   required>
            </div>
          </div> -->
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
         
          <div class="col-md-6 col-sm-6">
        <div class="input-group">
            <span class="input-group-addon" style="color:darkblue;"><b>f) Session year from : *</b></span>
            <select class="form-control" id="session_year_from" name="session_year_from" required>
                <option value="<?=$student->session_start;?>" selected><?=$student->session_start;?></option>
            </select>
            <div id="errMessageFrom" style="color: red;"></div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="input-group">
            <span class="input-group-addon" style="color:darkblue;"><b>g) Session year to : *</b></span>
            <select class="form-control" id="session_year_to" name="session_year_to" required>
                <option value="<?=$student->session_end;?>"><?=$student->session_end;?></option>
            </select>
            <div id="errMessageTo" style="color: red;"></div>
        </div>
    </div>

          <!-- <div class="col-md-4 col-sm-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>h) Enrollment No. : *</b></span>
              <input class="form-control" id="enrol" type="text" aria-describedby="namestudent" placeholder="Student Enrollment No."   name="enrol"  required>
              <div id="errMessage_enrol" style="color: red;"></div>
            </div>
          </div> -->
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
            <input class="form-control" id="date" type="date" value="<?=$student->dob;?>"  placeholder="Enter dob"   name="dob"  required>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>b) Email : *</b></span>
            <input class="form-control" id="email" value="<?=$student->email;?>" type="email" aria-describedby="date" placeholder="Enter Email"   name="email" required>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>c) Aadhar number of the student :</b></span>
            <input class="form-control" type="text" value="<?=$student->aadhaar;?>"  placeholder="Enter Aadhar Number"  name="adhar_number">
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>d) Contact No.(Mobile - 1) : *</b></span>
              <input class="form-control" id="mobile_no" type="text" aria-describedby="namestudent" placeholder="Student Mobile No." value="<?=$student->mobile_no;?>"    name="mobile_no" required>
              <div id="errMessage" style="color: red;"></div>
            </div>
          </div>
        </div>
      </div>

       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>e) Contact No.(Mobile - 2) : *</b></span>
              <input class="form-control" value="<?=$student->mobile_no2;?>"  id="mobile_no2" type="text"  placeholder="Student Mobile No."   name="mobile_no2" >
              <div id="errMessage" style="color: red;"></div>
            </div><br>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-row">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>f) State : *</b></span>
              <select class="form-control" id="state" name="state" onchange="load_city(this.value)"  required="">
                <option value="">-- Select State --</option>
                <?php foreach ($states as $state) {
                  $s=" " ; if ($state->id==$student->state) { $s="selected"; }
                  echo "<option value='".$state->id."' ".$s.">".$state->name."</option>";
                } ?>
              </select>
            </div>
          </div>

           <div class="col-md-">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>g) City : *</b></span>
              <select class="form-control" id="city" name="city" required="">
                <option value="">-- Select City --</option>
                <?php foreach ($cities as $city) {
                  $s=" " ; if ($city->id==$student->city) { $s="selected"; }
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

              <span class="input-group-addon" style="color:darkblue;"><b>h) Permanent Address : *</b></span>
              <textarea class="form-control" row="17" id="date" type="address" aria-describedby="date" placeholder="Enter Address" required name="address"><?=$student->address;?></textarea>
            </div>
          </div>
        
        </div>
      </div>

       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>i) Pincode : *</b></span>
              <input class="form-control"  type="number" value="<?=$student->pin;?>"  placeholder="Pincode."   name="pin" id="pin" required>
            </div>
          </div>
        </div>
      </div>


       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <div class="input-group">
              <span class="input-group-addon" style="color:darkblue;"><b>j) School / Last Attended / Presently Attending : *</b></span>
              <input class="form-control" id="school" type="text" value="<?=$student->school;?>"  placeholder="School Name"  name="school" required>
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
                                <th style="color:darkblue;width: 20%;text-align:left" class="text-center">  
                                  Particulars
                                </th>
                                <th style="color:darkblue;text-align:left" class="text-center" >
                                  Father
                                </th>
                                <th style="color:darkblue;text-align:left" class="text-center">
                                  Mother
                                </th>
                            </tr>
            </thead>
                        <tbody>
                            <tr class="table-info">
                                <td style="color:darkblue;">Name : *</td>
                                <td>
                                    <?php $serialized_string = $student->father;
                                        $data = unserialize($serialized_string);
                                        $serialized_stringm = $student->mother;
                                        $datam = unserialize($serialized_stringm);?>
                                  <input class="form-control father_name" type="text" name="father_name" placeholder="Enter Here" required onkeyup="this.value = this.value.toUpperCase();"  value="<?=$data['name'];?>">
                                </td>
                                <td>
                                  <input class="form-control mother_name" type="text" name="mother_name" placeholder="Enter Here" required onkeyup="this.value = this.value.toUpperCase();"  value="<?=$datam['name'];?>">
                                </td>
                            </tr>
              <tr>
                               <td style="color:darkblue;" >Qualification</td>
                               <td>
                                  <input class="form-control father_name" type="text" name="father_qualification"  value="<?=$data['qualification'];?>" placeholder="Enter Here">
                               </td>
                               <td>
                                  <input class="form-control mother_name" type="text" name="mother_qualification"  value="<?=$datam['qualification'];?>" placeholder="Enter Here">
                               </td>
                            </tr>
              <tr class="table-info" >
                               <td style="color:darkblue;">Occupation</td>
                               <td>
                                  <input class="form-control father_name" type="text" name="father_occupation"  value="<?=$data['occupation'];?>" placeholder="Enter Here"  >
                               </td>
                               <td>
                                  <input class="form-control mother_name" type="text" name="mother_occupation"  value="<?=$datam['occupation'];?>" placeholder="Enter Here"  >
                               </td>
                            </tr>
              <tr>
                               <td style="color:darkblue;" >Organization Name</td>
                               <td>
                                  <input class="form-control father_name" type="text" name="father_organization"  value="<?=$data['organization'];?>" placeholder="Enter Here" >
                               </td>
                               <td>
                                  <input class="form-control mother_name" type="text" name="mother_organization"  value="<?=$datam['organization'];?>" placeholder="Enter Here" >
                               </td>
                            </tr>
              <tr class="table-info">
                               <td style="color:darkblue;">Designation in Organization</td>
                               <td>
                                  <input class="form-control father_name"  type="text" name="father_designation_in_organization"  value="<?=$data['designation_in_organization'];?>" placeholder="Enter Here" >
                               </td>
                               <td>
                                  <input class="form-control mother_name" type="text" name="mother_designation_in_organization"  value="<?=$datam['designation_in_organization'];?>" placeholder="Enter Here" >
                               </td>
                            </tr>
              <tr>
                               <td style="color:darkblue;">Contact No. : </td>
                               <td>
                                  <input class="form-control father_name" type="text" name="father_contact_no"  value="<?=$data['contact_no'];?>" placeholder="Enter Here"   >
                               </td>
                               <td>
                                  <input class="form-control mother_name" type="text" name="mother_contact_no"  value="<?=$datam['contact_no'];?>" placeholder="Enter Here"  >
                               </td>
                            </tr>
                            <tr>
                               <td style="color:darkblue;">Email Id. : </td>
                               <td>
                                  <input class="form-control father_name" type="email" name="father_email" placeholder="Enter Here"  value="<?=$data['email'];?>"  >
                               </td>
                               <td>
                                  <input class="form-control mother_name" type="email" name="mother_email" placeholder="Enter Here"   value="<?=$datam['email'];?>">
                               </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>  
            </div>
            </div>
    </div>
  <div class="col-md-12">
    <div class="row">
    <br><br>
      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success "  id="submit"  >Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <!-- <button id="printButton" class="btn btn-info" > <i class="fas fa-print"></i> Print</button> -->
      </div>
    </div>  
  </div>
</form>         
</div> 
</div>    
</br>
</body>
</html>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    function printDiv(divId) {
        var content = document.getElementById(divId);
        if (content) {
            var clonedContent = content.cloneNode(true);

            // Remove placeholders from input fields
            var inputs = clonedContent.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].placeholder = '';
            }

           // Remove select boxes and their labels
           var selects = clonedContent.querySelectorAll('select');
            for (var i = selects.length - 1; i >= 0; i--) {
                selects[i].parentNode.removeChild(selects[i]);
                // Remove the associated label
                var label = selects[i].previousElementSibling;
                if (label && label.tagName.toLowerCase() === 'label') {
                    label.parentNode.removeChild(label);
                }
            }

            // Remove date inputs
            var dates = clonedContent.querySelectorAll('input[type="date"]');
            for (var i = dates.length - 1; i >= 0; i--) {
                dates[i].parentNode.removeChild(dates[i]);
            }

            // Remove buttons
            var buttons = clonedContent.getElementsByTagName('button');
            for (var i = buttons.length - 1; i >= 0; i--) {
                buttons[i].parentNode.removeChild(buttons[i]);
            }

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>' + clonedContent.innerHTML + '</body></html>');
            printWindow.document.close();
            printWindow.print();
        } else {
            console.error('Element with ID "' + divId + '" not found.');
        }
    }
    document.getElementById('printButton').addEventListener('click', function() {
        printDiv('baseDivId');
    });
});

</script>

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
  //       		if (<?//=$admin?>==1) {
  //       			window.open("<?=base_url()?>admin/registration_list","_self");
  //       		}
  //       		else {
  //       			window.open("<?=base_url()?>Thank-You/"+data,"_blank");
  //       		}
  //       	}
  //       }
  //     });
   });
});

</script>

<script>
    // Get the date input element
    var dateInput = document.getElementById('date');
    function showDatePicker() {
        var datePicker = document.createElement('input');
        datePicker.setAttribute('type', 'date');
        datePicker.setAttribute('id', 'datePicker');
        datePicker.setAttribute('class', 'form-control');
        datePicker.setAttribute('name', 'dob');
        dateInput.parentNode.replaceChild(datePicker, dateInput);
        datePicker.focus();
    }
    dateInput.addEventListener('focus', showDatePicker);
</script>

<script>
   var yearSelectFrom = document.getElementById('session_year_from');
var yearSelectTo = document.getElementById('session_year_to');

function populateYears(selectElement, startYear, endYear) {
    selectElement.innerHTML = '<option value="<?=$student->session_start;?>" selected><?=$student->session_start;?></option>';
    for (var i = startYear; i >= endYear; i--) {
        var option = document.createElement('option');
        option.text = i;
        option.value = i;
        selectElement.appendChild(option);
    }
}

populateYears(yearSelectFrom, new Date().getFullYear(), 1900);

yearSelectFrom.addEventListener('change', function() {
    var selectedYear = parseInt(yearSelectFrom.value);
    if (selectedYear < 1900 || selectedYear > 2050 || isNaN(selectedYear)) {
        document.getElementById('errMessageFrom').innerText = 'Please select a valid year between 1900 and 2030.';
    } else {
        document.getElementById('errMessageFrom').innerText = '';
        populateYears(yearSelectTo, selectedYear + 10, selectedYear);
        if (parseInt(yearSelectTo.value) < selectedYear) {
            document.getElementById('errMessageTo').innerText = 'Year To cannot be smaller than Year From.';
        } else {
            document.getElementById('errMessageTo').innerText = '';
        }
    }
});

yearSelectTo.addEventListener('change', function() {
    var selectedYear = parseInt(yearSelectTo.value);
    if (selectedYear < 1900 || selectedYear > 2050 || isNaN(selectedYear)) {
        document.getElementById('errMessageTo').innerText = 'Please select a valid year between 1900 and 2030.';
    } else {
        document.getElementById('errMessageTo').innerText = '';
        if (parseInt(yearSelectFrom.value) > selectedYear) {
            document.getElementById('errMessageTo').innerText = 'Year To cannot be smaller than Year From.';
        } else {
            document.getElementById('errMessageTo').innerText = '';
        }
    }
});

</script>

