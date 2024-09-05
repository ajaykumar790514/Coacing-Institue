<?php

//echo "<pre>";
//print_r($info_page);

 ?>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
@media(max-width: 500px)
{
  body{
    padding:5px;
  }
}
  .carousel {
    width: ;
}
}

/* Indicators list style */
.article-slide .carousel-indicators {
    bottom: 0;
    left: 0;
    margin-left: 5px;
    width: 100%;
}
/* Indicators list style */
.article-slide .carousel-indicators li {
    border: medium none;
    border-radius: 0;
    float: left;
    height: 54px;
    margin-bottom: 5px;
    margin-left: 0;
    margin-right: 5px !important;
    margin-top: 0;
    width: 100px;
}
/* Indicators images style */
.article-slide .carousel-indicators img {
    border: 2px solid #FFFFFF;
    float: left;
    height: 54px;
    left: 0;
    width: 100px;
}
/* Indicators active image style */
.article-slide .carousel-indicators .active img {
    border: 2px solid #428BCA;
    opacity: 0.7;
}
.indicator
{
 margin-bottom: -25%; margin-left:-175px; border: 1px solid #50d8af; padding:4px 2px 1px 4px; width: 100% 
}
@media(max-width: 600px)
{
  .indicator
{
 margin-bottom: -25%; margin-left:-175px; border: 1px solid #50d8af; padding:4px 2px 1px 4px; width: 100%; height:auto!important;
}
}
</style>

    <!--==========================
      News details
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2><?=$info_page->name?></h2>
        </div>
        <div class="row contact-info">
          <div class="col-md-12 " style="margin-bottom: 50px;text-align: left;">
            <!-- <strong><?=$info_page->meta_description?></strong><br><br> -->
            <p style="text-align: justify;text-justify: inter-word;">
               <?=$info_page->description?>
            </p>
          </div><hr>
         
        </div>
        
      </div>

 
</section>

 
 



