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
<script type="text/javascript">
	 $("#myForm :input").attr('readonly');
</script>
<body >
 <div class="container">
 <center><h2 style="color:#0093DD;font-family: 'Bauhaus 93' ;font-size: 75px;font-weight: 500;">JEE EXPERT </h2>
 	<!-- <img src="http://jeeexpert.com/images/logo/1539682677.jpg" style="height: 100px; width: 550px;"> -->
  </center>
   <div class="row">
   <center><h3 style="color:#b6b6f5;" ><b>
   We are an Equal Opportunity Employer and is committed to exellence through diversity.
  </b> </h3> </center>
  <form id="myForm"   >
  <h2 style="color:;"> <b>
  Application For Employment   
  </b> </h2>
  <span style="float:right">
  <!-- <?php echo $p_info->photo?> -->
  <img src="<?=base_url()?><?=$p_info->photo?>" style="height: 200px;width:180px; margin-top: -60px" >
  </span>
  
  <br>
  <br>
   <hr>
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Personal Information </h2>
   <br> 
   <table class="table table-striped">
   
    <tr> 
     <th>
	  Name
      <input type="text" name="f_name" value="<?=$p_info->name?>" readonly />
   <!--  &nbsp&nbsp Last name
      <input type="text" name="l_name" value="" required /> -->	 
	 </th>
	 <th> 
	 Marital Status <br> 
      <input type="text" name="" value="<?=$p_info->marital?>" readonly>
	 </th> 
	 <th> 
	    Sex <br> 
       <input type="text" name="" value="<?=$p_info->sex?>" readonly>
	  </th>
	 </tr>
	 
	 <tr> 
     <th>
	 Father’s Name
      <input type="text" name="father" value="<?=$p_info->father?>" readonly />
    &nbsp&nbsp Mother’s Name
      <input type="text" name="mother" value="<?=$p_info->mother?>" readonly />	 
	 </th>
	 <th> 
	 Date of Birth <br> 
      <input type="date"   name="dob" value="<?=$p_info->dob?>" readonly />	
	 </th> 
	 <th> 
	    Correspondence Addres <br> 
       <textarea name="address" readonly><?=$p_info->address?></textarea>
	  </th>
	 </tr>
	 
	 <tr> 
     <th>
	 State
 	<input type="text" name="" value="<?=$p_info->state?>" readonly>
		
 
	City
	<input type="text" name="" value="<?=$p_info->city?>" readonly>
	 </th> 
	 <th> 
	 Pin Code<br> 
      <input type="number" name="pin" value="<?=$p_info->pin?>" readonly />	
	 </th> 
	 <th> 
	 Email Address <br> 
       <input type="email" name="email" value="<?=$p_info->email?>" readonly></textarea>
	 </th>
	 </tr> 
	 
	 <tr> 
     <th>
       Mobile 
    <input type="number"  name="mob" value="<?=$p_info->mob?>" readonly />
	&nbsp &nbsp
	  WhatsApp Number 
    <input type="number"  name="wpno" value="<?=$p_info->wpno?>" readonly />	
 	 </th> 
	 </tr> 
   </table> 
   
   <hr>
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Position Applying For </h2>
   
   <table class="table table-striped">
   
    <tr> 
     <th>  
	    Faculty
	   	<input type="text" name="" value="<?=$p_info->faculty?>"readonly>
	 </th>
	 <th><input type="text" name="" value="<?=$p_info->position?>" readonly>
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
	 <input type="hidden" name="hs_name" value="High School (HSC)" readonly/>
	 </th>
	 <th> 
	 <input type="text" name="hs_clg_name" value="<?=$education[0]->std?>" readonly/>
	 </th>	 
     <th>  
	   Select Board <br>
	  
	   <input type="text" name="" value="<?=$education[0]->s_board?>">
	    <br>
	
	    <br>
	   <textarea name="hs_other" placeholder="Other Borads Details (If Any)" readonly><?=$education[0]->s_name?></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="hs_per" value="<?=$education[0]->percentage?>" readonly />
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="hs_year" value="<?=$education[0]->year?>" readonly />
  	 </th>	 
	 </tr> 
	 
	 <tr> 
     <th>
	 Intermediate (SSC)
	 <input type="hidden" name="i_name" value="Intermediate (SSC) " readonly/>
	 </th>
	 <th> 
	 <input type="text" name="i_clg_name" value="<?=$education[1]->std?>" readonly/>
	 </th>	 
     <th>  
	   Select Board <br>
	   <input type="text" name="" value="<?=$education[1]->s_board?>" readonly><br> 
	    <br>
	   <textarea name="i_other" placeholder="Other Borads Details (If Any)" readonly><?=$education[1]->s_name?></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="i_per" value="<?=$education[1]->percentage?>" readonly/>
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="i_year"value="<?=$education[1]->year?>" readonly />
  	 </th>	 
	 </tr> 
	 
	 <tr>
     <th>
	 Graduation (UG) 
	 <input type="hidden" name="g_name" value="Graduation (UG) " readonly/>
	 </th>
	 <th> 
	 <input type="text" name="g_clg_name" value="<?=$education[2]->std?>" readonly/>
	 </th> 
     <th>  
	   Select Board <br>
	   
	  <input type="text" name="" value="<?=$education[2]->s_board?>" readonly>
	   	 <br> 
	    <br>
	   <textarea name="g_other" placeholder="Other Borads Details (If Any)" readonly><?=$education[2]->s_name?></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="g_per" value="<?=$education[2]->percentage?>" readonly/>
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="g_year" value="<?=$education[2]->year?>" readonly/>
  	 </th>	 
	 </tr>

	 <tr> 
     <th>
	Post-Graduation (PG) 
	 <input type="hidden" name="p_name" value="Post-Graduation (PG)" readonly/>
	 </th>
	 <th> 
	 <input type="text" name="p_clg_name" value="<?=$education[3]->std?>"  readonly/>
	 </th>	  
     <th>  
	   Select Board <br>
	  <input type="text" name="" value="<?=$education[3]->s_board?>" readonly> <br> 
	    <br>
	   <textarea name="p_other" placeholder="Other Borads Details (If Any)" readonly><?=$education[3]->s_name?></textarea>
		</th>
		<th>
		Percentage
      <input type="number" name="p_per"value="<?=$education[3]->percentage?>" readonly />
  	 </th>
	 <th>
		Year Of Passing
      <input type="number" name="p_year" value="<?=$education[3]->year?>" readonly/>
  	 </th>	 
	 </tr> 
	 </table> 
	 
   <hr> 
   <h2 style="color:white;background:#0093DD;border-bottom:2px solid black;padding:5px"> Employment History (In Descending Order)  </h2>
   <table class="table table-striped">
    <tr><th>Sn.</th><th>Employer Name  </th><th>JOB Title </th><th>Dated Employed</th><th>Working Location </th><th>Starting Gross Salary .</th><th>Ending Gross Salary .</th></tr>
   

   <tr>
	<th>1.</th>
	<th> <input type="text" name="emp_name1" value="<?=$emp[0]->emp_name?>" readonly/></th>
	 
	<th>  
 	   <input type="text" value="<?=$emp[0]->title?>" readonly> <br> 
	    <br>
	   <textarea name="t_other1" placeholder="Other Job Details (If Any)" readonly><?=$emp[0]->other?></textarea>
		</th>
		<th>
 		 from..<input type="date" name="fdate1" value="<?=$emp[0]->from_date?>" readonly/>
		 To....<input type="date" name="edate1" value="<?=$emp[0]->to_date?>" readonly />
		</th>
		<th>
 		<input type="text" name="loc1"  value="<?=$emp[0]->location?>" readonly/>
		</th>
		<th>
 		 <input type="text" name="s_sal1" placeholder="(In Lacs)" value="<?=$emp[0]->s_salary?>" readonly />
		 </th>
		 <th>
 <input type="text" name="e_sal1"  placeholder="(In Lacs)" value="<?=$emp[0]->e_salary?>" readonly />
		 </th>
		</tr>
		
	<tr><th>2.</th>
 	<th> <input type="text" name="emp_name2" value="<?=$emp[1]->emp_name?>" readonly  /></th>
	 
	<th>  
 	    <input type="text" value="<?=$emp[1]->title?>" readonly ><br> 
	    <br>
	   <textarea name="t_other2" placeholder="Other Job Details (If Any)" readonly><?=$emp[1]->other?></textarea>
		</th>
		<th>
 		 from..<input type="date" value="<?=$emp[1]->from_date?>" readonly />
		 To....<input type="date" value="<?=$emp[1]->to_date?>" readonly  />
		</th>
		<th>
 		<input type="text" name="loc2" value="<?=$emp[1]->location?>"  readonly />
		</th>
		<th>
 		 <input type="text" name="s_sal2" placeholder="(In Lacs)" value="<?=$emp[1]->s_salary?>" readonly  />
		 </th>
		 <th>
 <input type="text" name="e_sal2"  placeholder="(In Lacs)"  value="<?=$emp[1]->e_salary?>" readonly />
		 </th>
		</tr>
		
	<tr><th>3.</th>
 	<th> <input type="text" name="emp_name3" value="<?=$emp[2]->emp_name?>" readonly /></th>
	 
	<th>  
 	   <input type="text" value="<?=$emp[2]->title?>" readonly > <br> 
	    <br>
	   <textarea name="t_other3" placeholder="Other Job Details (If Any)" readonly><?=$emp[2]->other?></textarea>
		</th>
		<th>
 		 from..<input type="date" value="<?=$emp[2]->from_date?>" readonly  />
		 To....<input type="date" value="<?=$emp[2]->to_date?>" readonly   />
		</th>
		<th>
 		<input type="text" name="loc3" value="<?=$emp[2]->location?>" readonly   />
		</th>
		<th>
 		 <input type="text" name="s_sal3" placeholder="(In Lacs)" value="<?=$emp[2]->s_salary?>"  readonly />
		 </th>
		 <th>
 <input type="text" name="e_sal3"  placeholder="(In Lacs)" value="<?=$emp[2]->e_salary?>" readonly />
		 </th>
		</tr>
		
	<tr><th>4.</th>
 	<th> <input type="text" name="emp_name4" value="<?=$emp[3]->emp_name?>"  readonly/></th>
	 
	<th>  
 	  <input type="text" value="<?=$emp[3]->title?>" readonly > <br> 
	    <br>
	   <textarea name="t_other4" placeholder="Other Job Details (If Any)" readonly><?=$emp[3]->other?></textarea>
		</th>
		<th>
 		 from..<input type="date" value="<?=$emp[3]->from_date?>" readonly   />
		 To....<input type="date" value="<?=$emp[3]->to_date?>"  readonly />
		</th>
		<th>
 		<input type="text" name="loc4" value="<?=$emp[3]->location?>"  readonly  />
		</th>
		<th>
 		 <input type="text" name="s_sal4" placeholder="(In Lacs)" value="<?=$emp[3]->e_salary?>" readonly />
		 </th>
		 <th>
 <input type="text" name="e_sal4"  placeholder="(In Lacs)" value="<?=$emp[3]->e_salary?>" readonly  />
		 </th>
		</tr>
		
	<tr><th>5.</th>
 	<th> <input type="text" name="emp_name5" value="<?=$emp[4]->emp_name?>"  readonly  /></th>
	 
	<th>  
 	   <input type="text" value="<?=$emp[4]->title?>"readonly >  <br> 
	    <br>
	   <textarea name="t_other5" placeholder="Other Job Details (If Any)" readonly><?=$emp[4]->other?></textarea>
		</th>
		<th>
 		 from..<input type="date" value="<?=$emp[4]->from_date?>" readonly />
		 To....<input type="date"value="<?=$emp[4]->to_date?>" readonly   />
		</th>
		<th>
 		<input type="text" value="<?=$emp[4]->location?>" readonly   />
		</th>
		<th>
 		 <input type="text" name="s_sal5" placeholder="(In Lacs)"  value="<?=$emp[4]->e_salary?>" readonly  />
		 </th>
		 <th>
 <input type="text" name="e_sal5"  placeholder="(In Lacs)" value="<?=$emp[4]->e_salary?>" readonly  />
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
     	<?php 
                                            $d = date("d-M-Y", strtotime($p_info->added));
                                        ?>
      <input type="text" name="added" value="<?=$d?>" readonly /> 
     </th>
	 <th> 	 
	 Upload Signature  <br><br>
	  <img src="<?=base_url()?><?=$p_info->sign?>" style="height: 100px;width:200px; margin-top: 10px" >
     </th>
	 </tr>
   </table>
   <br>
  <center>

  <a href="<?=base_url()?>index.php/admin/career_list" class="btn btn-primary btn-lg">Back to list </a>
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