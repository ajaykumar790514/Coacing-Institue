<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminLogin</title>

    <!-- Bootstrap core CSS -->

    <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?=base_url()?>assets/admin/css/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assets_admin/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
				<?php
							  if(isset($msg))
							  {
							  ?>
                    <div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>
                            <?php
							  echo $msg;
							  ?></strong> 
							</div>
                   <?php
				   }
				   ?>
                    <form action="<?=base_url()?>index.php/admin/check_login" method="post">
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" name="username" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" name="password" />
                        </div>
                        <div>
                            <input type="submit" class="btn btn-default submit" value="Log in" />
                            <!--<a class="reset_pass" href="#">Lost your password?</a>-->
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            
        </div>
    </div>

</body>

</html>