<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link href="<?=base_url()?>assets/school/img/favicon.png" rel="icon"> -->
  <link href="<?=base_url()?>assets/school/img/favicon.jpg" rel="icon">
  
  <link href="<?=base_url()?>assets/school/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?=base_url()?>assets/school/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?=base_url()?>assets/school/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/school/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/school/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/school/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/school/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/school/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

</head>
<style type="text/css">
	.check-icon
	{
		height: 150px;
	}
  .pay-fee{
    font-family: serif;
    font-size: 18px;
    font-weight: 400;
    /*background: #2378d6;*/
    background: red;
    color: white;
  }
  .pay-fee a{
    color:black;
  }
</style>
<body>
<div class="jumbotron text-center" style="width: 100%;height: 100vh;">
	<img class="check-icon" src="<?=base_url()?>images/check-icon.png">
  <h1 class="display-3">Thank You For Registration</h1>
  <p class="lead"><strong>Your Registration No. - <?=$reg_no?></strong></p>
  <p class="pay-fee"><strong><a href="<?=base_url()?>Registration-Fee-Payment" target="_blank">Click Here</a> To Pay Registration Fee And Complete Your Registration Process. </strong></p>
  <hr>
  <p>
    Having trouble? <a href="<?=base_url()?>welcome#contact">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="<?=base_url()?>" role="button">Continue to homepage</a>
  </p>
</div>
</body>
</html>