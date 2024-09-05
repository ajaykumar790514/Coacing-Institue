<?php
// print_r($transaction_data);
// print_r($stu_data);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jee-Expert-Enrollment-Fee-<?=$stu_data->enrollment_no?>-<?=$transaction_data['transaction_id']?>-<?=$transaction_data['transaction_status']?></title>
	<meta charset="utf-8">
    <link href="<?=base_url()?>assets/school/img/favicon.jpg" rel="icon">
  	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
	body{
		font-family: serif;
	}
	.jee-logo{
		margin-left: auto;
		margin-right: auto;
		padding-bottom: 10px;
		text-align: right; 
	}
	.note-h{
		font-size: ;
		color: red;
		font-weight: 600;
	}
	
	#fees_deteils{
		padding:0px 50px 0px 50px;
		margin-right: auto;
		margin-left: auto;
		width: 700px;
	}
	@media print {
 	#print_receipt{
 		display: none;
 	}
 	.cont{
 		display: none;
 	}
 	
	
}
</style>
<div class="container cont">
	<div class="container">
		<div class="container">
			<div class="row" >
				<h3 align="center" style="color:red; ">*Please Do Not Refresh The Page</h3>
				<h3 align="center" style="color:green;">Please Print the reciept or note down your Transaction Id:<?=$transaction_data['transaction_id']?> for further communication.</h3>
			</div>
		</div>
	</div>
</div>
<div class="container" id="fees_deteils" >
	<h2 align="center" style="color:red; ">Transaction Failed</h2>
	<div class="row jee-logo">
		<img class="img-responsive" src="<?=base_url()?>images/Colour-logo.jpg">
	</div>

	<div class="row">
		<center>
			<div class="col-lg-12 col-md-12 col-sm-12" >
				<table class="table table-bordered table-striped table-hover">
				    <tbody>

				      <tr>
				        <th>Transaction Status</th>
				        <td><?=$transaction_data['transaction_status']?></td>
				      </tr>

				      <tr>
				        <th>Transaction ID</th>
				        <td><?=$transaction_data['transaction_id']?></td>
				      </tr>

				      <tr>
				        <th>Enrollment No.</th>
				        <td><?=$stu_data->enrollment_no?></td>
				        <input type="hidden" name="registration_no" value="<?=$stu_data->enrollment_no?>">
				      </tr>

				      <tr>
				        <th>Student Name</th>
				        <td><?=$stu_data->name?></td>
				      </tr>
				     
				      <tr>
				        <th>Amount</th>
				        <td><?=$transaction_data['transaction_amount']?></td>
				      </tr>
				      <tr>
				        <th>Payment Mode</th>
				        <td><?=$transaction_data['payment_mode']?></td>
				      </tr>

				    </tbody>
				</table>
				<button id="print_receipt" onclick="window.print();" class="btn btn-success btn-xs">Print</button>
			</div>
		</center>
	</div>
	
</div>
</body>
</html>
<script type="text/javascript">
	function printDiv(divName) {

     window.print();

     
}
</script>