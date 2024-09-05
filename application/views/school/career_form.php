<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Jee Expert</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	
	<style type="text/css">
      </style>
  <script src="<?php echo base_url();?>assets/js/cities.js"></script>
<script>
$(function() {
     $('#fac').change(function(){
        if($('#fac').val() == 'Faculty ') {
        	$('#emp1').prop('disabled', false);
			$('#emp2').prop('disabled', false);
			$('#emp3').prop('disabled', false);
			$('#emp4').prop('disabled', false);
			$('#emp5').prop('disabled', false);
 			$('#emp1').show();
			$('#emp2').show();
			$('#emp3').show();
			$('#emp4').show();
			$('#emp5').show();

            $('#job').html(" Faculty <br> <select name='position'><option value='Physics'> Physics</option>     <option value='Chemistry'> Chemistry  </option>	     <option value='Mathematics'> Mathematics  </option>	     <option value='Biology'> Biology </option> </select>"); 
        } else if($('#fac').val() == 'Non Faculty'){
			$('#emp1').prop('disabled', true);
			$('#emp2').prop('disabled', true);
			$('#emp3').prop('disabled', true);
			$('#emp4').prop('disabled', true);
			$('#emp5').prop('disabled', true);
 			$('#emp1').hide();
			$('#emp2').hide();
			$('#emp3').hide();
			$('#emp4').hide();
			$('#emp5').hide();
            $('#job').html(" Non Faculty <br> <select name='position'><option value='Marketing Executive'> Marketing Executive</option><option value='Digital Marketing Executive'> Digital Marketing Executive </option><option value='Counselor/Receptionist'> Counselor/Receptionist </option>	     <option value='Web Developer'> Web Developer </option><option value='Graphic Designer'>  Graphic Designer </option><option value='Computer Operator'>  Computer Operator </option> <option value='Accountant'>  Accountant  </option><option value='Academic Operation'>  Academic Operation </option></select>"); 
        } 
    });
});
</script>

            <?php if($this->session->flashdata('msg')): ?>
                <div class="alert alert-success fade in">
                    <?php echo $this->session->flashdata('msg');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
				
		 <?php elseif($this->session->flashdata('success')): ?>
                <div class="alert alert-success fade in">
                    <?php echo $this->session->flashdata('success');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-danger fade in">
                    <?php echo $this->session->flashdata('error');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php endif;?>
                <br/>
</head>
<body>
 <div class="container">
 <center><h2 style="color:#0093DD;font-family: 'Bauhaus 93' ;font-size: 75px;font-weight: 500;">JEE EXPERT </h2>
 	<!-- <img src="http://jeeexpert.com/images/logo/1539682677.jpg" style="height: 100px; width: 550px;"> -->
  </center>
   <div class="row">
   <center><h3 style="color:#b6b6f5;" ><b>
   We are an Equal Opportunity Employer and is committed to exellence through diversity.
  </b> </h3> </center>
  <form  action="<?=base_url()?>index.php/welcome/register_career" 
  method="post" enctype="multipart/form-data" >
  <h2 style="color:;"> <b>
  Application For Employment   
  </b> </h2><span style="float:right">
  <label> Upload Photo </label>
   <input type="file" name="userfile" value="" required/>
  </span>
  
  <br>
  <br>
   <hr>
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Personal Information </h2>
   <br> 
   <table class="table table-striped">
   
    <tr> 
     <th>
	 First name
      <input type="text" name="f_name" value="" required />
    &nbsp&nbsp Last name
      <input type="text" name="l_name" value="" required />	 
	 </th>
	 <th> 
	 Marital Status <br> 
       <select name="marital">
	     <option value="single"> Single </option>
	     <option value="Married"> Married </option>
	   </select>
	 </th> 
	 <th> 
	    Sex <br> 
       <select name="sex">
	     <option value="Male"> Male </option>
	     <option value="Female"> Female </option>
	   </select>
	  </th>
	 </tr>
	 
	 <tr> 
     <th>
	 Father’s Name
      <input type="text" name="father" value="" required />
    &nbsp&nbsp Mother’s Name
      <input type="text" name="mother" value="" required />	 
	 </th>
	 <th> 
	 Date of Birth <br> 
      <input type="date"   name="dob" value="" required />	
	 </th> 
	 <th> 
	    Correspondence Addres <br> 
       <textarea name="address" required></textarea>
	  </th>
	 </tr>
	 
	 <tr> 
     <th>
	 State
 <select onchange="print_city('state', this.selectedIndex);" 	id="sts"
		    name ="state" required>
	</select> 
		
 <script language="javascript">print_state("sts");</script> 
    &nbsp &nbsp &nbsp &nbsp 
	City
<select id ="state" onchange="print_branch(this.value);"  name="city" required></select> 
	 </th> 
	 <th> 
	 Pin Code<br> 
      <input type="number" name="pin" value="" required />	
	 </th> 
	 <th> 
	 Email Address <br> 
       <input type="email" name="email" value="" required></textarea>
	 </th>
	 </tr> 
	 
	 <tr> 
     <th>
       Mobile 
    <input type="number"  name="mob" value="" required />
	&nbsp &nbsp
	  WhatsApp Number 
    <input type="number"  name="wpno" value="" required />	
 	 </th> 
	 </tr> 
   </table> 
   
   <hr>
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Position Applying For </h2>
   
   <table class="table table-striped">
   
    <tr> 
     <th>  
	   Select Type of Faculty
	   <select name='faculty' id="fac" required>
	   <option value="NA"> Select Type Of Job </option>
	   <option value="Faculty " > Faculty  </option>
	   <option value="Non Faculty" > Non Faculty </option>
	</select> 
	 </th>
	 <th><span id="job"> </span>	   
	 </th> 
	 <th> 	 
	  </th>
	 </tr> 
   </table>  
   
   <hr> 
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Eduaction </h2>
   <table class="table table-striped">
   <tr> 
     <th> Standard </th> <th> School/ College/ University Name  </th> <th>Board / Degree   </th> <th>Percentage Marks/ Grade/ C.G.P.A.   </th>
	 <th> Year of Passing  </th> 
	 </tr> 
	 <tr> 
     <th>
	 High School (HSC) 
	 <input type="hidden" name="hs_name" value="High School (HSC)" required/>
	 </th>
	 <th> 
	 <input type="text" name="hs_clg_name" value="" required/>
	 </th>	 
     <th>  
	   Select Board <br>
	   <select name="hs_board" required>
	   <option value="C.B.S.E." > C.B.S.E. </option>
	   <option value="I.C.S.E" > I.C.S.E </option>
	   <option value="State Board" > State Board </option> 
	   	</select> <br>
	
	    <br>
	   <textarea name="hs_other" placeholder="Other Borads Details (If Any)"></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="hs_per" value="" required />
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="hs_year" value="" required />
  	 </th>	 
	 </tr> 
	 
	 <tr> 
     <th>
	 Intermediate (SSC)
	 <input type="hidden" name="i_name" value="Intermediate (SSC) " required/>
	 </th>
	 <th> 
	 <input type="text" name="i_clg_name" value="" required/>
	 </th>	 
     <th>  
	   Select Board <br>
	   <select name="i_board" required>
	   <option value="C.B.S.E." > C.B.S.E. </option>
	   <option value="I.C.S.E" > I.C.S.E </option>
	   <option value="State Board" > State Board </option> 
	   	</select> <br> 
	    <br>
	   <textarea name="i_other" placeholder="Other Borads Details (If Any)"></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="i_per" value="" required />
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="i_year" value="" required />
  	 </th>	 
	 </tr> 
	 
	 <tr>
     <th>
	 Graduation (UG) 
	 <input type="hidden" name="g_name" value="Graduation (UG) " required/>
	 </th>
	 <th> 
	 <input type="text" name="g_clg_name" value="" required/>
	 </th> 
     <th>  
	   Select Board <br>
	   <select name="g_board" required>
	   <option value="C.B.S.E." > C.B.S.E. </option>
	   <option value="I.C.S.E" > I.C.S.E </option>
	   <option value="State Board" > State Board </option> 
	   	</select> <br> 
	    <br>
	   <textarea name="g_other" placeholder="Other Borads Details (If Any)"></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="g_per" value="" required />
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="g_year" value="" required />
  	 </th>	 
	 </tr>

	 <tr> 
     <th>
	Post-Graduation (PG) 
	 <input type="hidden" name="p_name" value="Post-Graduation (PG)" />
	 </th>
	 <th> 
	 <input type="text" name="p_clg_name" value=""  />
	 </th>	  
     <th>  
	   Select Board <br>
	   <select name="p_board"  >
	   <option value="C.B.S.E." > C.B.S.E. </option>
	   <option value="I.C.S.E" > I.C.S.E </option>
	   <option value="State Board" > State Board </option> 
	   	</select> <br> 
	    <br>
	   <textarea name="p_other" placeholder="Other Borads Details (If Any)"></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="p_per" value=""   />
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="p_year" value=""   />
  	 </th>	 
	 </tr> 
	 </table> 
	 
   <hr> 
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Employment History (In Descending Order)  </h2>
   <table class="table table-striped">
    <tr><th>Sn.</th><th>Employer Name  </th><th>JOB Title </th><th>Dated Employed</th><th>Working Location </th><th>Starting Gross Salary .</th><th>Ending Gross Salary .</th></tr>
   

   <tr>
	<th>1.</th>
	<th> <input type="text" name="emp_name1"  required /></th>
	 
	<th>  
 	   <select name="job_title1" id="emp1" >
	   <option value="Associate Faculty " > Associate Faculty  </option>
	   <option value="Senior Faculty " > Senior Faculty  </option>
 	   	</select> <br> 
	    <br>
	   <textarea name="t_other1" placeholder="Other Job Details (If Any)"></textarea>
		</th>
		<th>
 		 from..<input type="date" name="fdate1" required />
		 To....<input type="date" name="edate1" required />
		</th>
		<th>
 		<input type="text" name="loc1"  required />
		</th>
		<th>
 		 <input type="text" name="s_sal1" placeholder="(In Lacs)" required />
		 </th>
		 <th>
 <input type="text" name="e_sal1"  placeholder="(In Lacs)" required />
		 </th>
		</tr>
		
	<tr><th>2.</th>
 	<th> <input type="text" name="emp_name2" value=""  /></th>
	 
	<th>  
 	   <select name="job_title2" id="emp2" >
	   <option value="Associate Faculty " > Associate Faculty  </option>
	   <option value="Senior Faculty " > Senior Faculty  </option>
 	   	</select> <br> 
	    <br>
	   <textarea name="t_other2" placeholder="Other Job Details (If Any)"></textarea>
		</th>
		<th>
 		 from..<input type="date" name="fdate2"   />
		 To....<input type="date" name="edate2"   />
		</th>
		<th>
 		<input type="text" name="loc2"    />
		</th>
		<th>
 		 <input type="text" name="s_sal2" placeholder="(In Lacs)"   />
		 </th>
		 <th>
 <input type="text" name="e_sal2"  placeholder="(In Lacs)"   />
		 </th>
		</tr>
		
	<tr><th>3.</th>
 	<th> <input type="text" name="emp_name3" value=""  /></th>
	 
	<th>  
 	   <select name="job_title3" id="emp3" >
	   <option value="Associate Faculty " > Associate Faculty  </option>
	   <option value="Senior Faculty " > Senior Faculty  </option>
 	   	</select> <br> 
	    <br>
	   <textarea name="t_other3" placeholder="Other Job Details (If Any)"></textarea>
		</th>
		<th>
 		 from..<input type="date" name="fdate3"   />
		 To....<input type="date" name="edate3"   />
		</th>
		<th>
 		<input type="text" name="loc3"    />
		</th>
		<th>
 		 <input type="text" name="s_sal3" placeholder="(In Lacs)"   />
		 </th>
		 <th>
 <input type="text" name="e_sal3"  placeholder="(In Lacs)"   />
		 </th>
		</tr>
		
	<tr><th>4.</th>
 	<th> <input type="text" name="emp_name4" value=""  /></th>
	 
	<th>  
 	   <select name="job_title4" id="emp4" >
	   <option value="Associate Faculty " > Associate Faculty  </option>
	   <option value="Senior Faculty " > Senior Faculty  </option>
 	   	</select> <br> 
	    <br>
	   <textarea name="t_other4" placeholder="Other Job Details (If Any)"></textarea>
		</th>
		<th>
 		 from..<input type="date" name="fdate4"   />
		 To....<input type="date" name="edate4"   />
		</th>
		<th>
 		<input type="text" name="loc4"    />
		</th>
		<th>
 		 <input type="text" name="s_sal4" placeholder="(In Lacs)"   />
		 </th>
		 <th>
 <input type="text" name="e_sal4"  placeholder="(In Lacs)"   />
		 </th>
		</tr>
		
	<tr><th>5.</th>
 	<th> <input type="text" name="emp_name5" value=""  /></th>
	 
	<th>  
 	   <select name="job_title5" id="emp5" >
	   <option value="Associate Faculty " > Associate Faculty  </option>
	   <option value="Senior Faculty " > Senior Faculty  </option>
 	   	</select> <br> 
	    <br>
	   <textarea name="t_other5" placeholder="Other Job Details (If Any)"></textarea>
		</th>
		<th>
 		 from..<input type="date" name="fdate5"   />
		 To....<input type="date" name="edate5"   />
		</th>
		<th>
 		<input type="text" name="loc5"    />
		</th>
		<th>
 		 <input type="text" name="s_sal5" placeholder="(In Lacs)"   />
		 </th>
		 <th>
 <input type="text" name="e_sal5"  placeholder="(In Lacs)"   />
		 </th>
		</tr>
	
   </table>
   
   <hr> 
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Declaration</h2>
   <input type="checkbox" name="decl" value="1" required/>
    &nbsp&nbsp&nbsp
   I certify that my answers are true and complete to the best of my knowledge.
If this application leads to employment, I understand that false or misleading information in my application or interview may result in my release.
<br> 
<br> 
   <table class="table table-striped">
   <tr> 
     <th>Date: 
      <input type="" name="added" value="<?php echo date('d-m-Y');?>" disabled /> 
     </th>
	 <th> 	 
	 Upload Signature  <br><br>
	 <input type="file" name="sign" value="" required /> 
     </th>
	 </tr>
   </table>
   <br>
  <center>
  <input type="submit" class="btn btn-primary btn-lg" value="SUBMIT" required/> 
   </center>
</form>
   <br>
   <br>
   <br>
    </div>
   </div>
 </div>
</body>
</html>