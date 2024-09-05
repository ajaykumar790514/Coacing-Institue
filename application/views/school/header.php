<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
   <title><?=$meta_title?></title>
  <meta  name="viewport" content="width=device-width, initial-scale=1.0">
  <meta  name="keywords" content="<?=$meta_keywords?>">
  <meta  name="description" content="<?=$meta_description?>">

  <!-- Favicons -->
  <link href="<?=base_url()?>assets/school/img/favicon.jpg" rel="icon">
<!--   <link href="<?=base_url()?>assets/school/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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

  <!-- Main Stylesheet File -->
  <link href="<?=base_url()?>assets/school/css/style.css" rel="stylesheet">
  <script src="<?=base_url()?>assets/school/lib/jquery/jquery.min.js"></script>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115892881-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115892881-2');
</script>

</head>
<?php
$bgcolor = "#0093dd";
$textcolor = "#00FFFF";
$logocolor ="#00dd93";
$linkonhover = "#0093dd";
$activelink ="#0093dd";
?>
<style type="text/css">
  a:hover
  {
    text-decoration: none;
    color:<?=$linkonhover?> !important;
  }
 a:active, a:focus
  {
     color:<?=$activelink?> !important;
  }
 nav a 
  {
    text-decoration: none;
  	color: black!important;
  }
  .dropdown-menu li a
  {
    font-weight: 500!important;
  }
  .contact-info a:hover ,a:active, a:focus
  {
    color: green!important;
    text-decoration: none;
  }
  .social-links a:hover ,a:active, a:focus
  {
     color: green!important;
    text-decoration: none;

  }
 
  body{
    color: black;
    /*font-size: 14px;*/
  }
  .h-color{
  color:#0030dd!important;
}

 .marquee a{
  color: white;
 }
 .marquee a:hover{
  color:white!important;
 }
 #header-sticky-wrapper{
  height: 84px!important;
 }
</style>
<body id="body">
<?php
$this_week=$this->model->get_time_table(1);
$next_week=$this->model->get_time_table(2);
?>
  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class=" d-lg-block" style="background-color:<?=$bgcolor?>;">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-home"></i><a href="<?=base_url()?>welcome">HOME</a> |
       <a href="<?=base_url()?>Gallery">GALLERY</a> |
       <a href="<?=base_url()?>welcome#contact">CONTACT</a> |
       <a href="<?=base_url()?>welcome/employment" target="_blank">CAREER</a> |
         <a class="" data-toggle="dropdown" style=" cursor: pointer;">TIME TABLE</a>
          <ul class="dropdown-menu">
            <li  class="dropdown">
              <?php if($this_week->status==1) {?>
              <a href="<?=base_url()?>uploads/<?=$this_week->file_url?>" target="_blank" style="font-size: 12px;font-weight: 500;color: black">THIS WEEK</a>
            <?php }
            if ($next_week->status==1) { ?>
                <a href="<?=base_url()?>uploads/<?=$next_week->file_url?>"
              target="_blank" style="font-size: 12px;font-weight: 500;color: black">NEXT WEEK</a>
            <?php } ?>
            </li>        
          </ul> |
       <a href="<?=base_url()?>welcome#team">NEWS UPDATES</a> 

          
       
        <!-- FR-ZENITH-1921-A01-RTS-02-ADVANCED-02.06.19.pdf -->
      </div>
      <div class="social-links float-right d-none d-lg-block">
        <?php foreach ($social_media->result() as $row) { ?>
        <a href="<?=$row->url?>" target="_blank" class="<?=$row->name?>"><i class="<?=$row->icon?>"></i></a>
      <?php } ?>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="<?=base_url()?>welcome" class="scrollto">
         <!-- <div class="w3-col l4 s12" style="color:<?=$logocolor?>;font-size:46px;margin-left:40px;font-weight:bold;font-family:bauhaus 93">JEE EXPERT</div> -->
         <?php $logo=$this->db->get('logos')->row();?>
            <img style="" src="<?=base_url()?>images/logo/<?=$logo->website_logo?>">
          </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="dropdown">
          <a class="" data-toggle="dropdown" style=" cursor: pointer;">Home</a>
           <ul class="dropdown-menu">
            <li  class="dropdown">
              <a href="<?=base_url()?>welcome#body" style="font-size: 14px;font-weight: 600;">Home</a>
            </li>
             <li class="dropdown">
              <a href="http://jeeexpert.com/Pages/Why-Us/4" style="cursor: pointer;">Why Us</a>
            </li>
            <?php 
            foreach($about_us->result() as $about){
            ?>

           <li  class="dropdown">
              <a href="<?=base_url()?>About/<?=$about->url?>/<?=$about->id?>" style="font-size: 14px;font-weight: 600;"><?=$about->title?></a>
            </li> 
         <?php } ?>
        
        </ul>
        </li>
          <?php foreach ($menus->result() as $menu) { ?>
           <li class="dropdown">
          <a class="" data-toggle="dropdown" style=" cursor: pointer;"><?=$menu->name?></a>
           <ul class="dropdown-menu">
           <?php $subcat = $this->model->get_categories($menu->id); 
            foreach($subcat->result() as $sc){
            ?>
            <li  class="dropdown">
              <a href="<?=base_url()?><?=$sc->url?>/<?=$sc->id?>" style="font-size: 14px;font-weight: 600;"><?=$sc->name?></a>
            </li>
         <?php } ?>
        </ul>
        </li>
        <?php } ?>
    
       


                <li class="dropdown" >
    <a   data-toggle="dropdown">Programs
    </a>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="http://jeeexpert.com/Pages/Goals-Milestones-for-Various-Courses-Chart/5">Goals &amp; Milestones for Various Program</a></li>

      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Foundation Programs </a>
        <ul class="dropdown-menu" style="margin:0px 0px 0px -100px">
        
          <li class="dropdown-submenu">
            <a class="test" href="#">For Students Presently in Class 8</a>
            <ul class="dropdown-menu">
              <li><a href="http://jeeexpert.com/Pages/BUNIYAD-CP-MEGA/6">BUNIYAD – CP - MEGA <br>
                              <small>(Four Year Classroom Program)</small></a></li>
              <li><a href="http://jeeexpert.com/Pages/BUNIYAD-CP-MICRO/7">BUNIYAD –CP - MICRO<br>
                              <small>(Two Year Classroom Program)</small></a></li>
              <li><a href="http://jeeexpert.com/Pages/BUNIYAD-SIP-MEGA/8">BUNIYAD – SIP - MEGA<br>
                              <small>(Four Year School Integrated Program)</small></a></li>
              
            </ul>
          </li>
          <li class="dropdown-submenu">
            <a class="test" href="#">For Students Presently in Class 9</a>
            <ul class="dropdown-menu">
              <li><a href="http://jeeexpert.com/Pages/STAMBH-CP-MEGA/9">STAMBH –CP - MEGA<br>
                              <small>(Three Year Classroom Program)</small></a></li>
              <li><a href="http://jeeexpert.com/Pages/STAMBH-CP-MICRO/10">STAMBH – CP - MICRO<br>
                              <small>(One Year Classroom Program)</small></a></li>
              <li><a href="http://jeeexpert.com/Pages/STAMBH-SIP-MEGA/15">STAMBH –SIP - MEGA<br>
                              <small>(Three Year School Integrated Program)</small></a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">Target Programs</a>
        <ul class="dropdown-menu" style="margin:0px 0px 0px -100px">
          <!-- <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li> -->
          <li class="dropdown-submenu">
            <a class="test" href="#">For Students Presently in Class 10</a>
            <ul class="dropdown-menu">
              <li><a href="http://jeeexpert.com/Pages/ZENITH/11">ZENITH<br>
                              <small>(Two Year Classroom Program)</small></a></li>
              <li><a href="http://jeeexpert.com/Pages/SPIRE/12">SPIRE<br>
                              <small>(Two Year School Integrated Program)</small></a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
            <a class="test" href="#">For Students Presently in Class 11</a>
            <ul class="dropdown-menu">
              <li><a href="http://jeeexpert.com/Pages/ASPIRE/13">ASPIRE<br>
                              <small>(One Year Classroom Program for IITJEE)</small></a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
            <a class="test" href="#">For Students of Class 12 Pass</a>
            <ul class="dropdown-menu">
              <li><a href="http://jeeexpert.com/Pages/DESIRE/14">DESIRE<br>
                              <small>(One Year Classroom Program for IITJEE)</small></a></li>
            </ul>
          </li>
        </ul>
      </li>

     
    </ul>
  </li>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>

         <li>
          <a class="" data-toggle="dropdown" style=" cursor: pointer;">Admission</a>
           <ul class="dropdown-menu" style="margin-left: ;">
            <li  class="dropdown">
               <a href="<?=base_url()?>Admission" target="" style="font-size: 14px;font-weight: 600;">Registration</a>
            </li>
            <li  class="dropdown">
               <a href="<?=base_url()?>Results" target="" style="font-size: 14px;font-weight: 600;">Results</a>
            </li>
            <li  class="dropdown">
               <a href="<?=base_url()?>Enrollment" target="" style="font-size: 14px;font-weight: 600;">Enrollment</a>
            </li>
        </ul>
        </li>

        <li><a href="<?=base_url()?>welcome#achievements">Key Achievements</a></li>


<li class="dropdown" >
  <a   data-toggle="dropdown" style="cursor: pointer;">Academic
  </a>
  <ul class="dropdown-menu">
   <!--  <li class="dropdown-submenu">
      <a class="test" tabindex="-1" href="#">Time Table</a>
      <ul class="dropdown-menu" style="margin:0px 0px 0px -100px; width: 50px;">
        <?php if($this_week->status==1) {?>
        <li>
          <a class="test" href="<?=base_url()?>uploads/<?=$this_week->file_url?>" target="_blank">THIS WEEK</a>
        </li>
        <?php }
        if ($next_week->status==1) { ?>
        <li>
          <a class="test" href="<?=base_url()?>uploads/<?=$next_week->file_url?>" target="_blank">NEXT WEEK</a>
        </li>
        <?php } ?>
      </ul>
    </li> -->
    <li><a tabindex="-1" href="<?=base_url()?>Batch-Results">Results</a></li>
    <li><a tabindex="-1" href="<?=base_url()?>HINTS-SOLUTIONS">Hints & Solutions</a></li>
    <li><a tabindex="-1" href="<?=base_url()?>PRACTICE-TEST">Practice Test</a></li>
    <li><a tabindex="-1" href="<?=base_url()?>STUDY-PACKAGE">Study Package</a></li>
  </ul>
</li>

<li>
<a class="" data-toggle="dropdown" style=" cursor: pointer;">Download</a>
<ul class="dropdown-menu" style="margin:0px 0px 0px -100px">
<li  class="dropdown">
<a href="<?=base_url()?>uploads/downloads/Prospectur.pdf" target="_blank" style="font-size: 14px;font-weight: 600;">E-Brochure</a>
</li>
<li  class="dropdown">
<a href="<?=base_url()?>Sample-Paper-For-Admission-Test" target="" style="font-size: 14px;font-weight: 600;">Sample Paper For Admission Test</a>
</li>
</ul>
</li>














        </ul>
      </nav><!-- #nav-menu-container -->
    </div>




  </header><!-- #header -->

  <!--flash news-->
    <marquee class="marquee" SCROLLAMOUNT=4 BEHAVIOR=SCROLL style="color:white; background-color: <?=$bgcolor?>; font-size: 18px; font-weight: 400; margin-top:; margin-bottom:;padding: 4px;"   onload="this.start();" >
    <?php $i=1;
       foreach ($f_news->result() as $f_n) 
      { 
        if ($f_n->link_url!='' && $f_n->link_title!='') 
        {
           echo $f_n->news.anchor($f_n->link_url , $f_n->link_title).".&nbsp;&nbsp;&nbsp;";
        }
        else
        {
          echo $f_n->news.".&nbsp;&nbsp;&nbsp;";
        }
    $i++; }
     ?>
    </marquee>
<!-- flash news --> 

  

  