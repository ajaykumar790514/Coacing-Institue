<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>RS INSTITUTE</title>
  <link href="<?=base_url();?>images/logo/rslogofavicon.png" rel="icon">
  
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
	/*border-color: white;	*/
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
.img-responsive
{
	height: 60px;
}
  </style>
<script type="text/javascript">
	 $(document).ready(function(){
    $('.Upper_Case').keyup(function(){
        $(this).val($(this).val().toUpperCase());
    });
});
</script>
</head>
<body>

	<div class="container col-md-12" style="padding-left: 4%;padding-right: 4%;padding-top: 4%;">
		        <!-- <div class="alert alert-success alert_header text-center" style="padding-top:0px;padding-bottom:0px;">
					<h1 class="logo">JEE EXPERT</h1>
					<h4 class="logo1">PRIVATE LIMITED</h4>
				</div> -->
				<?php
				$logo=$this->db->get('logos')->row();
				?>
				<img class="img-responsive"  src="<?=base_url()?>images/logo/<?=$logo->admission_form?>">
			</div> 
    <div class="container container_inner">
        <div class="row">
            <div class="card-body" style="padding: 8px 10px !important;">
				
			</div>
			<div class="col-md-12 text-center">
				<!-- <strong class="heading"><u>REGISTRATION FORM FOR ADMISSION TEST</u></strong> -->
				<small style="float: right;color: red">For Any Help Please Contact - +91  9919447742 / 43</small>
				
				<br>
				<br>
			</div>
<script>

</script>
<form method="post" id="add_form">					
<br><br>
<p style="color: red; font-size: 20px;" >&nbsp;</p>
</br>
<div class="form-group">	
	<div class="row">
		<h4 style="color:red;">1. Details about the Student</h4>
		<div class="col-md-9">

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>Registration No. : </b></span>
					    <input class="form-control" type="text"  value="<?=$reg->registration_no?>" readonly >
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>a) Name of the Student : *</b></span>
					    <input class="form-control" id="student_name" type="text" aria-describedby="namestudent" placeholder="Enter name student"  name="student_name" onkeyup="this.value = this.value.toUpperCase();" value="<?=$reg->student_name?>" required>
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>b) Mobile No. : *</b></span>
					    <input class="form-control" id="mobile_no" type="text" aria-describedby="namestudent"  placeholder="Student Mobile No."  name="mobile_no" value="<?=$reg->mobile_no?>">
					    <div id="errMessage" style="color: red;"></div>
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>d) Date of Birth : *</b></span>
					  <input class="form-control" id="date" type="date" aria-describedby="date" placeholder="Enter dob"   name="dob" value="<?=$reg->dob?>" required>
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
					<div class="input-group">
				    <span class="input-group-addon" style="color:darkblue;"><b>e) Gender : *</b></span>
				    <div class="col-md-6">
				    <select class="form-control" name="gender" required >
						<option value="">---Select Gender---</option>
						<?php
						$selected_male ='';
						$selected_male ='';
						if ($reg->gender=='Male') {
							$selected_male="selected";
						}
						else{
							$selected_female="selected";
						} ?>
						<option value="Male" <?=$selected_male?> >Male</option>
						<option value="Female" <?=$selected_female?> >Female</option>    	
				    </select>
				    </div>
					  </div>
					</div>
				</div>
			</div>
								
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>f) Nationality :</b></span>
					  <input class="form-control Upper_Case" id="" type="text"  placeholder="Enter nationality" value="<?=$reg->nationality?>" name="nationality">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-8">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>g) Last Annual Exam / Board Exam Aggregate Marks (%)</b></span>
					  <input class="form-control " id="last_annual_exam" type="text" aria-describedby="last_annual_exam" placeholder="Enter last annual exam" value="<?=$reg->last_exam_marks?>" name="last_exam_marks">
					  </div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>/ C.G.P.A</b></span>
					  <input class="form-control Upper_Case"  type="text" aria-describedby="c_g_p_a" placeholder="Enter C.G.P.A" value="<?=$reg->c_g_p_a?>"  name="c_g_p_a">
					  </div>
					</div>
				</div>
			</div>

		  	<div class="form-group">
				<div class="form-row">
					<div class="col-md-7">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>h) Aadhar number of the student :</b></span>
					  <input class="form-control" type="number" value="<?=$reg->adhar_number?>"  placeholder="Enter Aadhar Number"  name="adhar_number" >
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>i) School :</b></span>
					  <input class="form-control Upper_Case" id="" type="text"   placeholder="School" name="school" value="<?=$reg->school?>" >
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>j) Board :</b></span>
					  <input class="form-control Upper_Case" id="" type="text"    placeholder="Board" name="board" required value="<?=$reg->board?>">
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<div class="col-md-12">
<div class="row">
	<h4 style="color:red;">2. Details about Admission Test</h4>
		
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>a) Centre Code :</b></span>
					  <input class="form-control" id="" type="text"  placeholder="Centre Code" name="center_code" value="01" readonly value="<?=$reg->center_code?>">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>b) Present Class :</b></span>
					  <input class="form-control" value="<?=$reg->present_class?>" readonly >
					  </div>
					</div>
				</div>
			</div>
			

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>c) Program Code :</b></span>
					  <input class="form-control"  required readonly value="<?=$reg->program_code?>">
					  </div>
					</div>
				</div>
			</div>	
	</div>	
</div>	


<div class="col-md-12">
	<div class="row">
	<h4 style="color:red;">3. Communication Details</h4>
		<div class="col-md-12 ">
			<div class="form-group">
				<div class="form-row">
					<label  style="color:darkblue;">a)	 Correspondence Address :</label>
					<textarea class="form-control" row="17" id="date" type="address" aria-describedby="date" placeholder="Enter Address" name="address"><?=$reg->address?></textarea>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-1">
					<span class="" style="color:darkblue;"><b>b) Pin : </b></span>
				</div>
				<div class="col-md-5">
					<div class="input-group">
				  		<input class="form-control" type="number"  placeholder="Enter PIN"   name="pin" value="<?=$reg->pin?>">
				  	</div>
				</div>
			</div>
		</div>
	</div>	
</div>	
<div class="col-md-12">
	<div class="row">
	<h4 style="color:red;">4. Parent’s Details</h4>
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
                                	<input class="form-control Upper_Case" type="text" name="father_name" placeholder="Enter Here" required value="<?=$reg->father_name?>"  >
                                </td>
                                <td>
                                	<input class="form-control Upper_Case" type="text" name="mother_name" placeholder="Enter Here" required value="<?=$reg->mother_name?>" >
                                </td>
                            </tr>
							<tr>
                               <td style="color:darkblue;" >Qualification</td>
                               <td>
                               		<input class="form-control" type="text" name="father_qualification" placeholder="Enter Here" value="<?=$reg->father_qualification?>">
                               </td>
                               <td>
                               		<input class="form-control" type="text" name="mother_qualification" placeholder="Enter Here" value="<?=$reg->mother_qualification?>">
                               </td>
                            </tr>
							<tr class="table-info" >
                               <td style="color:darkblue;">Occupation</td>
                               <td>
                               		<input class="form-control Upper_Case" type="text" name="father_occupation" placeholder="Enter Here"  value="<?=$reg->father_occupation?>" >
                               </td>
                               <td>
                               		<input class="form-control Upper_Case" type="text" name="mother_occupation" placeholder="Enter Here"  value="<?=$reg->mother_occupation?>" >
                               </td>
                            </tr>
							<tr>
                               <td style="color:darkblue;" >Organization Name</td>
                               <td>
                               		<input class="form-control Upper_Case" type="text" name="father_organization" placeholder="Enter Here" value="<?=$reg->father_organization?>">
                               </td>
                               <td>
                               		<input class="form-control Upper_Case" type="text" name="mother_organization" placeholder="Enter Here" value="<?=$reg->mother_organization?>">
                               </td>
                            </tr>
							<tr class="table-info">
                               <td style="color:darkblue;">Designation in Organization</td>
                               <td>
                               		<input class="form-control Upper_Case" type="text" name="father_designation_in_organization" placeholder="Enter Here" value="<?=$reg->father_designation_in_organization?>">
                               </td>
                               <td>
                               		<input class="form-control Upper_Case" type="text" name="mother_designation_in_organization" placeholder="Enter Here" value="<?=$reg->mother_designation_in_organization?>">
                               </td>
                            </tr>
							<tr>
                               <td style="color:darkblue;">Contact No.</td>
                               <td>
                               		<input class="form-control" type="text" name="father_contact_no" placeholder="Enter Here" required value="<?=$reg->father_contact_no?>" >
                               </td>
                               <td>
                               		<input class="form-control" type="text" name="mother_contact_no" placeholder="Enter Here" value="<?=$reg->mother_contact_no?>">
                               </td>
                            </tr>
                            <tr>
                               <td style="color:darkblue;">Email Id.</td>
                               <td>
                               		<input class="form-control" type="email" name="father_email" placeholder="Enter Here" value="<?=$reg->father_email?>">
                               </td>
                               <td>
                               		<input class="form-control" type="email" name="mother_email" placeholder="Enter Here" value="<?=$reg->mother_email?>">
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
				<button type="submit" class="btn btn-success "  id="submit"  >Update</button>
				<button type="reset" class="btn btn-danger">Reset</button>
				<button onclick="myFunction()" class="btn btn-info" > <i class="fas fa-print"></i> Print</button>
			</div>
			<div id="msg"></div>
		</div>	
	</div>
</form>					
</div> 
</div>		
</br>
</body>
</html>

<script>
$(document).ready(function(){
 
  $('#add_form').on('submit', function(e){
    e.preventDefault();
  
      $.ajax({
        url:"<?=base_url()?>admin/update_reg/<?=$reg->id?>",
        method:"POST",
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function() {
       		$('#submit').prop('disabled','disabled');
       
    	},
        success:function(data)
        {
        		$('#msg').html(data);           
        }
      });
    
  });
});
function myFunction() {
    window.print();
}





</script>

