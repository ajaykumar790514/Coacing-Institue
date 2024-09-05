<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminModule..</title>

    <!-- Bootstrap core CSS -->

    <link href="<?=base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?=base_url()?>assets/admin/css/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">
    <!-- editor -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/editor/index.css" rel="stylesheet">
    <!-- select2 -->
    <link href="<?=base_url()?>assets/admin/css/select/select2.min.css" rel="stylesheet">
    <!-- switchery -->
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/switchery/switchery.min.css" />

    <script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?=base_url()?>index.php/admin/dashboard" class="site_title"><i class="fa fa-paw"></i> <span></span>DASHBOARD</a>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $user;?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
							    
								
								<li><a><i class="fa fa-edit"></i> Step Master <span class="fa fa-chevron-down"></a>
								<ul class="nav child_menu" style="display: none">
								<li><a href="<?=base_url()?>index.php/admin/add_step">Add Step</a></li>
								<li><a href="<?=base_url()?>index.php/admin/list_steps">List Steps</a></li>
								</ul>
								</li>
								
								<li><a><i class="fa fa-edit"></i> Head Master <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                                <li><a href="<?=base_url()?>index.php/admin/add_head">Add Head</a></li>
                                <li><a href="<?=base_url()?>index.php/admin/list_heads">List Heads</a></li>
                                </ul>
                                </li>
								
								<li><a><i class="fa fa-edit"></i> Head Value Master <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                                <li><a href="<?=base_url()?>index.php/admin/add_head_value">Add Head Value</a></li>
                                <li><a href="<?=base_url()?>index.php/admin/list_head_values">List Head Value</a></li>
                                </ul>
                                </li>
								
								<li><a><i class="fa fa-edit"></i> School Master <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                                <li><a href="<?=base_url()?>index.php/admin/add_school">Add School</a></li>
                                <li><a href="<?=base_url()?>index.php/admin/list_schools">List Schools</a></li>
                                </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i> News Master <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                                <li><a href="<?=base_url()?>index.php/admin/add_news">Add News</a></li>
                                <li><a href="<?=base_url()?>index.php/admin/list_news">List News</a></li>
                                </ul>
                                </li>

                                 <li><a><i class="fa fa-edit"></i> Enquiry <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                               <!--  <li><a href="<?=base_url()?>index.php/admin/add_news">Add News</a></li> -->
                                <li><a href="<?=base_url()?>index.php/admin/list_enquiry">List Enquiry</a></li>
                                </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i> Locations <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                               <!--  <li><a href="<?=base_url()?>index.php/admin/add_news">Add News</a></li> -->
                                <li><a href="<?=base_url()?>index.php/admin/list_locations">Locations</a></li>
                                </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i>Advertisement Master <span class="fa fa-chevron-down"></a>
                                <ul class="nav child_menu" style="display: none">
                                <li><a href="<?=base_url()?>index.php/admin/add_advertisement">Add Advertisement</a></li>
                                <li><a href="<?=base_url()?>index.php/admin/list_advertisement">List Advertisement</a></li>
                                </ul>
                                </li>
								
                               
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php echo $user; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?=base_url()?>index.php/admin/change_password">  Change Password</a>
                                    </li>
                                    
                                    <li><a href="<?=base_url()?>index.php/admin/log_out"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->