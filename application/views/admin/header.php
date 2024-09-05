<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RS INSTITUTE</title>
  <link href="<?=base_url();?>images/logo/rslogofavicon.png" rel="icon">
  
    <!-- Bootstrap Core CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?=base_url()?>themes/admin_panel/vendor/jquery/jquery.min.js"></script>
   
    <link href="<?=base_url()?>themes/admin_panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>themes/admin_panel/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>themes/admin_panel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url()?>themes/admin_panel/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>themes/admin_panel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
<link href="<?=base_url()?>themes/admin_panel/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>themes/admin_panel/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

   

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>admin">
                <img src="<?=base_url();?>images/logo/rslogo.png" height="40px" style="margin-top:-10px;" alt=""></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                

                <!-- <li>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#logo_model" onclick="load_logo_data()" class="btn btn-info">Logo</a>
                </li> -->

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url();?>profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?=base_url();?>change-password"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url()?>admin/log_out"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar " role="navigation" style="width:;">
                <div class="sidebar-nav navbar-collapse ">
                    <ul class="nav" id="side-menu">
                       
                        <li class="sidebar-search">
                            Welcome - <strong><?=$user?></strong>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/admin/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
            <?php
            $fun= $role->fun;
            $str=explode(",",$fun);
            foreach ($menu as $row) 
            {
                foreach ($str as $f) 
                {
                    if ($row->id==$f) 
                    { ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-sitemap fa-fw"></i> 
                                    <?=$row->title?>
                                    <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                    <?php foreach ($sub_menu as $s_menu) 
                            {
                            if ($s_menu->parent==$row->id) 
                            {  if($s_menu->title=='New Enrollment'){?>
                                <li>
                                    <a target="_blank" href="<?=base_url()?><?=$s_menu->url?>"><?=$s_menu->title?></a>
                                </li>          
                    <?php   }else{?>
                                 <li>
                                    <a href="<?=base_url()?><?=$s_menu->url?>"><?=$s_menu->title?></a>
                                </li>    
                   <?php  } }  } ?>         
                            </ul>
                        </li>
            <?php  
                    }
                }
            } 
            ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <script type="text/javascript">
            function load_logo_data()
            {
                $('#logo_data').html('<h3>Loading....</h3>');
                $('#logo_data').load('<?=base_url()?>index.php/admin/logo_image');
            }
        </script>

        <!-- Modal -->
  <div class="modal fade" id="logo_model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add/Edit Website Logo</h4>
        </div>
        <div class="modal-body" id="logo_data">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  