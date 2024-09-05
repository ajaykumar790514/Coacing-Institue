<!DOCTYPE html>
<html lang="en">
<head>
  <title>JEE EXPERT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
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
      font-weight: 600;
      color: black!important;
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
       font-weight: 600;
      color: black!important;
}
 textarea {
    background-color: transparent;
    border: 1px solid!important;
    /*border-bottom: 1px solid!important;*/
    border-radius: 15px!important;
     font-weight: 600;
      color: black!important;
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
  </style>
<script type="text/javascript">
	$("#printableArea:input").attr('readonly','readonly');
</script>
</head>
<body>
<div id="printableArea" >
	<div class="container col-md-12" style="padding-left: 4%;padding-right: 4%;">
		        <!-- <div class="alert alert-success alert_header text-center" style="padding-top:0px;padding-bottom:0px;">
					<h1 class="logo">JEE EXPERT</h1>
					<h4 class="logo1">PRIVATE LIMITED</h4>
				</div> -->
				<img class="img-responsive" src="<?=base_url()?>images/Colour-logo.jpg">
			</div> 
    <div class="container container_inner">
        <div class="row">
            <div class="card-body" style="padding: 0px 0px !important;">
				
			</div>
			<div class="col-md-12 text-center" style="margin:0px;padding: 0px">
				<strong class="heading" ><u>REGISTRATION FORM FOR ADMISSION TEST</u></strong>
				<br>
				<br>
			</div>


					<!-- <div class="col-md-12 border_box">
						<h5 class="text-center"style="color:darkblue;">(For Official use only) </h5>
						<div class="form-group">
							<div class="form-row"  >
								<div class="col-md-12">
									<label for="registration_no" style="color:darkblue;">Registration No. Allocated:</label>
										<input class="form-control" id="registration_no" type="text" placeholder="Enter Your Registration_no_allocated" required="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-4">
									<label for="employee_name"style="color:darkblue;">Employee Name :</label>
									<input class="form-control" id="employee_name" type="text" placeholder="Enter Your employee_name" required="">
								</div>
								<div class="col-md-4">
									<label for="signature" style="color:darkblue;">Signature:</label>
									<input class="form-control" id="signature" type="text" placeholder="Enter Your signature" required=""> 
								</div>
								<div class="col-md-4">
									<label for="date" style="color:darkblue;"> Date:</label>
									<input class="form-control" id="date" type="date" placeholder="Enter Your date" required="">
								</div>
							</div>
						</div>
					</div> -->
						
<br><br>
<p style="color: red; font-size: 20px;" >Please fill all mandatory * fields</p>
</br>
<div class="form-group">	
	<div class="row">
		<h4 style="color:red;">1. Details about the Student</h4>
		<div class="col-md-9">
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>a) Name of the Student : *</b></span>
					    <input class="form-control" id="name_student" type="text" aria-describedby="namestudent" placeholder="Enter name student" required="" name="student_name" value="<?=$reg->student_name?>">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-12">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>d) Date of Birth : *</b></span>
					  <input class="form-control" id="date" type="date" aria-describedby="date" placeholder="Enter dob" required="" name="dob" value="<?=$reg->dob?>">
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
				    <select class="form-control" name="gender" required="">
						<option value="">---Select Gender---</option>
						<option value="Male" <?php if($reg->gender=='Male')
					  	{ echo 'selected'; } ?> >
							Male
						</option>
						<option value="Famale" <?php if($reg->gender=='Female')
					  	{ echo 'selected'; } ?> >
							Famale
						</option>    	
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
					  <input class="form-control" id="" type="text"  placeholder="Enter nationality"  name="nationality" value="<?=$reg->nationality?>">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-8">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>g) Last Annual Exam / Board Exam Aggregate Marks (%)</b></span>
					  <input class="form-control" id="last_annual_exam" type="text" aria-describedby="last_annual_exam" placeholder="Enter last annual exam" name="last_exam_marks" value="<?=$reg->last_exam_marks?>">
					  </div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>/ C.G.P.A</b></span>
					  <input class="form-control"  type="text" aria-describedby="c_g_p_a" placeholder="Enter C.G.P.A"  name="c_g_p_a" value="<?=$reg->c_g_p_a?>">
					  </div>
					</div>
				</div>
			</div>

		  	<div class="form-group">
				<div class="form-row">
					<div class="col-md-7">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>h) Aadhar number of the student :</b></span>
					  <input class="form-control" type="text"  placeholder="Enter Aadhar Number" required="" name="adhar_number" value="<?=$reg->adhar_number?>">
					  </div>
					</div>
					<!-- <div class="col-md-5">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>Upload Aadhar</b></span>
					  <input class="form-control" type="file"  placeholder="Enter Aadhar Number Of The Student"  name="adhar">
					  </div>
					</div> -->
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>i) School :</b></span>
					  <input class="form-control" id="" type="text" required placeholder="School" name="school" value="<?=$reg->school?>">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>j) Board :</b></span>
					  <input class="form-control" id="" type="text"  placeholder="Board" name="board" value="<?=$reg->board?>">
					  </div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-md-3">
			<div class="border_dec" >
				<img id="output_image" class="img-responsive">
			</div>
			<h5 style="color:red;">Student’s Photograph</h5>
			<input type="file" name="student_image" class="form-control" style="width: 85%;" onchange="preview_image(event)" required="">
		</div> -->
	</div>
		<script type="text/javascript">
			function preview_image(event) 
			{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('output_image');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
			}
			
		</script>
</div>

<div class="col-md-12">
	<div class="row">
	<h4 style="color:red;">2. Details about Scholarship Cum Admission Test
</h4>
		<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>a) Admission Test Date :</b></span>
					  <input class="form-control" id="" type="date"  placeholder="Admission Test Date" required="" name="admission_test_date" value="<?=$reg->admission_test_date?>">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>b) Centre Code :</b></span>
					  <input class="form-control" id="" type="text"  placeholder="Centre Code" name="center_code" value="<?=$reg->center_code?>">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>d) Present Class :</b></span>
					  <input class="form-control" id="" type="text"  placeholder="Present Class"  name="present_class" value="<?=$reg->present_class?>" >
					 
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>c) Program Code :</b></span>
					  <input class="form-control" id="" type="text"  placeholder="Program Code" name="program_code" value="<?=$reg->program_code?>">
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
					<textarea class="form-control" row="17" id="date" type="address" aria-describedby="date" placeholder="Enter Address" required="" name="address"><?=$reg->address?></textarea>
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
				  <input class="form-control" type="number"  placeholder="Enter PIN" required="" name="pin" value="<?=$reg->pin?>">
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
                                            <th style="color:darkblue;width: 20%" class="text-center">Particulars</th>
                                            <th style="color:darkblue;" class="text-center" >Father</th>
                                            <th style="color:darkblue;" class="text-center">Mother</th>
                                        </tr>
									</thead>
                                   <tbody>
                                        <tr class="table-info">
                                            <td style="color:darkblue;">Name</td>
                                            <td>
                                            	<input class="form-control" type="text" name="father_name" placeholder="Enter Here" required="" value="<?=$reg->father_name?>">
                                            </td>
                                            <td>
                                            	<input class="form-control" type="text" name="mother_name" placeholder="Enter Here" required="" value="<?=$reg->mother_name?>">
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
                                           		<input class="form-control" type="text" name="father_occupation" placeholder="Enter Here" required="" value="<?=$reg->father_occupation?>">
                                           </td>
                                           <td>
                                           		<input class="form-control" type="text" name="mother_occupation" placeholder="Enter Here" required="" value="<?=$reg->mother_occupation?>">
                                           </td>
                                        </tr>
										<tr>
                                           <td style="color:darkblue;" >Organization Name</td>
                                           <td>
                                           		<input class="form-control" type="text" name="father_organization" placeholder="Enter Here" value="<?=$reg->father_organization?>">
                                           </td>
                                           <td>
                                           		<input class="form-control" type="text" name="mother_organization" placeholder="Enter Here" value="<?=$reg->mother_organization?>">
                                           </td>
                                        </tr>
										<tr class="table-info">
                                           <td style="color:darkblue;">Designation in Organization</td>
                                           <td>
                                           		<input class="form-control" type="text" name="father_designation_in_organization" placeholder="Enter Here" value="<?=$reg->father_designation_in_organization?>">
                                           </td>
                                           <td>
                                           		<input class="form-control" type="text" name="mother_designation_in_organization" placeholder="Enter Here" value="<?=$reg->mother_designation_in_organization?>">
                                           </td>
                                        </tr>
										<tr>
                                           <td style="color:darkblue;">Contact No.</td>
                                           <td>
                                           		<input class="form-control" type="text" name="father_contact_no" placeholder="Enter Here" required="" value="<?=$reg->father_contact_no?>">
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
			
			
			 
			 <div class="form-group">	
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-12">
											<h4 style="color:red;">5. Declaration by Parent/Student/Guardian</h4>
											<p for="exampleInputName" style="color:darkblue;">(1) I have verified the details filled in the form and I understand if an error occurs in the registration due to wrong details it will not becorrected by<b> JEE EXPERT.</b></p>
											<p for="exampleInputName" style="color:darkblue;">(2) Test Date, Test Centre, Program Code etc. cannot be changed once registered.</p>
											<p for="exampleInputName" style="color:darkblue;">(3) Registration Fee will not be refunded in any case or transferred to any other Admission Test Date.</p>
											<p for="exampleInputName" style="color:darkblue;">(4) I authorize <b>JEE EXPERT</b> to contact and send communication / information by SMS, e-mail, post on the above mentionedcommunication details given by me.</p>
											<p for="exampleInputName" style="color:darkblue;">(5)I <b>JEE EXPERT</b> reserves the right to offer any study centre other than the one opted by the student, subject to availability / constraintsof seats.</p>
											<p for="exampleInputName" style="color:darkblue;">(6)The Registered Office of <b>JEE EXPERT</b> is at Kanpur. In case of dispute, students / parents are subject to the exclusive jurisdiction ofappropriate courts in Kanpur only.</p>
											
											
										</div>
									</div>
								</div>
							</div>
							
						</div>
			</div>
			<!-- <div class="col-md-12">
				<div class="row">
				   
			<div class="form-group">
				<div class="form-row">
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>Date : *</b></span>
					   <input class="form-control" id="" type="date"  placeholder="Enter date" required="" name="submitted_date">
					  </div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-4">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>Place : *</b></span>
					  <input class="form-control" id="place" type="text" name="place"  placeholder="Enter place" required="" name="submitted_place">
					  </div>
					</div>
				</div>
			</div>
			<div><br><br></div>	

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>Signature of Student : *</b></span>
					   <input class="form-control"  type="file"   name="signature_of_student" onchange="preview_image1(event)">
					  </div>
					</div>
					<div class="col-md-6 signature">
						<img id="output_image1">
					</div>
				</div>
				<br>
				<br><br>
				<br>
			</div>
			<script type="text/javascript">
			function preview_image1(event) 
			{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('output_image1');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
			}
		</script>

			<div class="form-group">
				<div class="form-row">
					<div class="col-md-6">
						<div class="input-group">
					    <span class="input-group-addon" style="color:darkblue;"><b>Signature of Father/Mother/Guardian : *</b></span>
					   <input class="form-control"  type="file"  name="signature_of_guardian" onchange="preview_image2(event) ">
					  </div>
					</div>
					<div class="col-md-6 signature">
						<img id="output_image2">
					</div>
					<script type="text/javascript">
			function preview_image2(event) 
			{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('output_image2');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
			}
		</script>
				</div>
			</div>
			
				
						    
                </div>	
			</div> -->

<div class="col-md-12">
	<div class="row">
	<br><br>
		<div class="col-md-12 text-center">
		<button onclick="printDiv('printableArea')" class="btn btn-info" > <i class="fas fa-print"></i> Print</button>
		</div>
		

	</div>	
</div>
						
	

		
	</div> 
</div>
</div>		
</br>
</body>
</html>

<script>
function myFunction() {
    window.print();
}

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

