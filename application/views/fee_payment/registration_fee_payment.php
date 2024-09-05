<!DOCTYPE html>
<html>
<head>
	<title>Jee Expert Registration Fee</title>
	<meta charset="utf-8">
    <meta name="Description" CONTENT="Jee Expert Registration Fee. Registration-Fee-Payment ">
    <link href="<?=base_url()?>assets/school/img/favicon.jpg" rel="icon">
  	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
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
	
</style>
<div class="container">
	<div class="row jee-logo">
		<img class="img-responsive" src="<?=base_url()?>images/Colour-logo.jpg">
		<span class="note-h">Note :</span><span>Please pay fees first then download hall ticket</span>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<center>
				  <div class="form-inline">
				    <div class="form-group">
				      <label for="reg_no"></label>
				      <input type="text" class="form-control" id="reg_no" placeholder="Enter Registration No." name="reg_no">
				    </div>
				    
				    <button  id="get_fees" class="btn btn-primary">Pay Fee</button>
				    <button  id="download_hall_ticket" class="btn btn-success"><i class="fa fa-download"> </i> Downlaod Hall Ticket</button>
				  </div>
			</center>
		</div>
		
	</div>


	<div class="row">
		<center>
			<div class="col-lg-12 col-md-12 col-sm-12" id="fees_deteils"></div>
		</center>
	</div>
	
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#get_fees').click(function(){
			var reg_no = $('#reg_no').val();
			if(reg_no == ''){ $('#reg_no').focus();
			return false; }

			$('#fees_deteils').html('Loading...');
			$('#fees_deteils').load('<?=base_url()?>fee_payment/check_fee/'+reg_no);
		})

	})


	$(document).ready(function(){
		$('#download_hall_ticket').click(function(){
			var reg_no = $('#reg_no').val();
			if(reg_no == ''){ $('#reg_no').focus();
			return false; }
			$.ajax({
		      type: 'POST', 
		      url:'<?=base_url()?>fee_payment/hall_ticket/'+reg_no,
		      cache: false,
		      beforeSend: function() {
			        // $('#fees_deteils').html('Loading....');
			    },
		      success:function(data){
		      	if(data==1){
		      		window.open('<?=base_url()?>fee_payment/print_hall_ticket/'+reg_no,'_blank');
		      		// $('#fees_deteils').html('');
		      	}
		      	else{
		      		$('#fees_deteils').html(data);
		      	}
		        
		   	 }
			})
		})

	})

</script>

<!-- <a href="https://webcache.googleusercontent.com/search?q=cache:http://adelbertvegyszerek.com/Updates/13/0">click</a> -->