<!DOCTYPE html>
<html>
<head>
	 <title><?=$student->student_name?></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">

	.title
	{
		font-family:'Calibri';
		font-weight:bolder;
		font-size:20px;
		color:#17365D;
		padding:0;
		/*word-spacing:5px;
		letter-spacing:5px;*/
		margin:0px 0px 0px 0px;
	}
	.footer
	{
		font-family:'Calibri';
		/*font-weight:bolder;*/
		font-size:18px;
		color: white;
		background: black;
	}
	.hall_ticket
	{
		width:900px;

	}
	.hall_ticket img
	{
		height: 120px!important;
		width: 100%;
	}
	tbody tr td{
		font-size: 18px;
		font-weight: 400;
	}
	.photo
	{
		height: 210px;
		width: 150px;
		border: 1px black solid;
		margin: 7px 0px 7px 25px;
		border-radius: 15%;
		text-align: center;
		padding-top: 30%; 
	}
	.reg_number
	{
		height: 41px;
		/*margin: 20px 0px 22px 0px;*/
	}
	.exam_date
	{
		margin: 0px 0px 1px 0px;	
		font-family:'Calibri';
		font-size: 20px;	
	}
	.exam_center
	{
		margin: 6px 0px 5px 0px;		
	}
	.auth-signatute
	{
		/*height:80px;
		width:200px;*/
		/*border:1px black solid;*/
		margin: 500px 0px 0px 0px;
	}
	.candidate-signatute
	{
		height:124px;
		/*
		width:200px;*/
		/*border:1px black solid;*/
		/*margin: 124px 0px 124px 0px;*/
	}
	h4
	{
		font-size: 18px;
		font-weight: bold
	}
	.center th, .center td 
	{
		border:1px black solid;
		text-align: center;
		line-height: 30px;
	}
	th,td
	{
		border:1px black solid;
		line-height: 30px;
		padding: 0px 0px 0px 5px;
	}
	body
	{
		font-family:'Calibri';
		/*height:100%;
		width: 900px; */
		/*margin-left:9%;*/
	}
	.printBtn
	{
		float: right;
	}
	.logo
	{
		font-family:'bauhaus 93';
		font-weight:bolder;
		font-size:100px;
		color:#00B0F0;
		padding:0;
		word-spacing:5px;
		letter-spacing:5px;
		/*margin:0px 0px 0px 10px;*/
	}
	.address
	{
		line-height: 15px;
		font-size: 14px
	}
	.school_h
	{
		text-align: left;
	}
	.school
	{
		line-height: 15px;
		font-size: 14px;
		height: 185px;
	}
	@media print
	 {
	  .school
	  {
	   height: 185px;
	  }
	  .photo
		{

			margin: 7px 0px 7px 25px;	
		}
	body {
		padding: 0px 7px 0px 15px;
	}
	/*@page {
  size: A4;
  margin: 0;
}*/
	}
@media print {
	#printpagebutton{
		display: none;
	}
}
	/*@media print {
  body * {
    visibility: visible;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;

  }
}*/
td
{
	height: 31px;
}


</style>

</head>
<?php
	// echo "<pre>"; print_r($student); echo "</pre>";
	?>
<center>
<body id="printableArea" class="watermark" onload="printHallTicket('printableArea')">
<div class="row">

	<div class="container">
		<div class=" container hall_ticket">
			<div class="iimmgg">
				<!-- <div class="alert alert-success alert_header text-center" style="padding-top:0px;padding-bottom:0px;">
					<p class="logo">JEE EXPERT</p>
					<h4 class="logo1">PRIVATE LIMITED</h4>
				</div> --> 
				<?php
				$logo=$this->db->get('logos')->row();
				?>
				<img class="img-responsive" src="<?=base_url()?>images/logo/<?=$logo->hall_ticket?>">
			</div>
			<div class="col-md-12 text-center title">
				<?=$time->test_name?> <?=$time->session?>
				<!-- JEE EXPERT ADMISSION TEST- 2019-20 -->
					<br>HALL TICKET
			</div>
			<div class="hallTicket">
			<table class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<tbody>
					<tr>
						<td>
							Candidate's Name  :  <?=$student->student_name?>
						</td>
					</tr>
					<tr>
						<td>
							Date of Birth      :  <?php echo  date("d-m-Y", strtotime($student->dob)); ?>
						</td>
					</tr>
					<tr>
						<td>
							Gender             :	<?=$student->gender?>
						</td>
					</tr>
					<tr>
						<td>
							Father's Name      : 	<?=$student->father_name?>
						</td>	
					</tr>
					<tr>
						<td>
							Mother's Name      :	<?=$student->mother_name?>
						</td>	
					</tr>
					<tr >
						<td >
							<div style="height: 70px; max-height: 70px">
							Address  : <p class="address"><?=$student->address?>, <?=$student->pin?> </p>
							</div>
						</td>	
					</tr>
					<tr>
						<td>
							Mobile number   :
							<?php if ($student->mobile_no!=$student->father_contact_no) 
							{
								echo $student->mobile_no." &nbsp;,&nbsp; ".$student->father_contact_no;
							}
							else
							{
								if ($student->mobile_no) 
								{
									echo $student->mobile_no;
								}
								else
								{
									echo $student->father_contact_no;
								}
							} ?>	
						</td>	
					</tr>
					<tr>
						<td>
							Email address : 	
							<?php
									if ($student->father_email) 
								{
									echo $student->father_email;
								}
								else
								{
									echo $student->mother_email;
								}
							?>
							
						</td>	
					</tr>
					<tr>
						<td>
							Paper I : <?php
							 if ($time1) 
                                    {
                                        $time1=  explode("-",$time1);
                                        echo "Mental Ability (". date('h:i A',strtotime($time1[0]))." to ";
                                        echo date('h:i A',strtotime($time1[1])).")";
                                    } 
                                 else {}
                           ?>
						</td>	
					</tr>
					<tr>
						<td>
							 Paper II :
							 <?php if ($time2) 
                                    {
                                        $time2=  explode("-",$time2);
                                        echo "Science (". date('h:i A',strtotime($time2[0]))." to ";
                                        echo date('h:i A',strtotime($time2[1])).")";
                                    }
                                    else{} ?>

						</td>	
					</tr>	
					<tr>
						<td>
							Reporting Timing : 15 Minutes Before The First Examination
						</td>	
					</tr>
					<tr>
						<td>
							Registration date :	
							<?php
							 	$student->submitted_date."<br>";
								echo $date= date("d-M-Y", strtotime($student->submitted_date));
								 ?>
						</td>	
					</tr>
					<tr>
						<td>
							Registration Fee : <?=$registration_fee?>
							<?php
							// $test_date='06-01-2019';
							//  $date='20-12-2018';
							// echo $d=$test_date-$date;
							// if ($d>=4) 
							// {
							// 	echo '1';
							// }
							// elseif ($d>=2) 
							// {
							// 	echo '2';
							// }
							// else
							// {
							// 	echo '3';
							// }
							?>
						</td>	
					</tr>

					
						
				</tbody>
			</table>
			<table class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
				<tbody>
					<tr>
						<td>
							Present Class :	<?=$student->present_class?>
						</td>
					</tr>
					<tr>
						<td>
							Class Going To : <?=$student->program_code?>
						</td>
					</tr>
					<tr>
						<td>
							<p class="exam_date" >
								Date of Exam<br>
								<b><?php echo  date("d-M-Y", strtotime($student->admission_test_date)); ?></b>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p class="exam_center">
							<b>Centre of Examination</b><br>
							16/71-C, Near Income Tax Office,<br> Civil lines, Kanpur-208001
							</p>
						</td>
					</tr>
					<tr>
						<td>
							Centre Code	: <?=$student->center_code?>
						</td>
					</tr>
					<tr>
						<td>
							<div class="school">
							<p class="school_h">School Name  :</p> <p class=""><?=$student->school?></p>
							
							</div>
						</td>
					</tr>
					
				</tbody>
			</table>
			<table class="col-lg-3 col-md-3 col-sm-3 col-xs-3 center">
				<tr >
					<th>
						<h4  class="reg_number">Registration No : 
						<?=$student->registration_no?> </h4>

					</th>
				</tr>
				<tr>
					<th>
						<div class="photo">
							Candidate Photo
						</div>
					</th>
				</tr>
				<tr>
					<td>
						<div class="candidate-signatute">
							
						</div>
					</td>
				</tr>
				<tr>
					<td style="font-size: 14px">
						Signature of Candidate<br>
						(in the presence of invigilator )
					</td>
				</tr>
			</table>
			</div>
			<!-- <div class="col-md-12 col-lg-12 col-sm-12 text-center title">
				16/71-C, Near Income Tax Office, Civil lines, Kanpur.  Mob. No- 9919447742/43, 9369216022 <br> www.jeeexpert.com

			</div> -->
		
			
			<input class="printBtn" id="printpagebutton" type="button" onclick="printHallTicket('printableArea')" value="print" />
		</div>
	</div>
</div>
<style type="text/css">
	.content
	{
		text-align: left;
		font-family:'Times New Roman';
		font-size: 16px;
	}
	.important_instructions
	{
		font-family:'Times New Roman';
		/*font-weight:bolder;*/
		font-size:14px;
		color: black;
		/*background: black;*/
	}
</style>
<div class="row">
	<div class="container">
		<div class="container content">
		<h3 class="important_instructions"><strong>Important Instructions :</strong></h3>
		<p>
			<b>(a)</b>	Please keep this validated Hall Ticket safe and produce it at the time of taking admission / claiming scholarship. If this Hall Ticket is lost / stolen / damaged, you will not be able to claim any of the benefits attached with the test.
		</p>
		<p>
			<b>(b)</b>	Test Dates, Examination centre etc. cannot be changed after the registration.
		</p>
		<p>
			<b>(c)</b>	Students will not be allowed to enter the examination hall after 15 min of the starting of the exam and will not be allowed to leave the examination hall before the completion of the exam.
		</p>
		<p>
			<b>(d)</b>	During the examination you will be given an OMR (Optical Mark Recognition) sheet having bubbles to be darkened. Use a Ball Point Pen to darken the bubbles and other information during the examination on the OMR.
		</p>
		<p>
			<b>(e)</b>	This Hall ticket is Non refundable, Non Transferable, and Non Renewable and is to be presented in each test for verification.
		</p>
		<p>
			<b>(f)</b>	Calculator in any form / slide rule / long sheets etc. will not be permitted during the examination.
		</p>
		<p>
			<b>(g)</b>	Mobile Phones are not allowed inside the examination hall.
		</p>
		<p>
			<b>(h)</b>	Adoption of any unfair means will render the applicant liable for cancellation of his/ her candidature.
		</p>

		<br>
		<br>
		<p>
			<strong>
				Place:- Kanpur	
			</strong>
			<strong style="float: right;">
				Authorised Signature
			</strong>
		</p>
		</div>
		<br>
		<br>
		
		<div class="col-md-12 col-lg-12 col-sm-12 text-center ">
				<!-- <p class="footer">16/71-C, Near Income Tax Office, Civil lines, Kanpur.  Mob. No- 9919447742/43, 9369216022 www.jeeexpert.com</p> -->
				<img src="<?=base_url()?>image/Address.PNG">
				<br><br>
		</div>

	</div>
</div>
<script type="text/javascript">
	function printHallTicket(divName) 
	{
		

	     window.print();

	}

	 function printdivv( printpage )
        {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item( printpage ).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }

	
</script>


</body>
</center>
</html>


