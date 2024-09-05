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
    height: 85px;
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
    height: 85px;
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
 margin-bottom: -35%; margin-left:-175px; border: 1px solid #50d8af; padding:4px 2px 1px 4px; width: 100% 
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
          <h2><?=$product_details->name?></h2>
        </div>
        <div class="row contact-info">
          <div class="col-md-8 " style="margin-bottom: 50px;text-align: left;">
            <strong><?=$product_details->brand?></strong><br><br>
            <p style="text-align: justify;text-justify: inter-word;">
               <?=$product_details->description?>
            </p>
          </div><hr>
          <div class="col-md-4">
            <?php
           $n_img= count($img->result()); 
            if($n_img>1) { ?>
<!-- ========= product silder ========== -->
<div class="carousel slide article-slide" id="article-photo-carousel" data-ride="carousel">
  <div style="height:;">
    <div class="carousel-inner cont-slider">
      <?php $n=0;
            foreach ($img->result() as $image)  { ?>
      <div <?php if($n==0){ echo 'class="item active"';} else{ echo'class="item"'; } ?>>
      <img alt="" title="" src="<?=base_url()?>images/product/<?=$image->name?>" class="" style="height:280px;width:100%">
      </div>
      <?php $n++; } ?>
    </div>
  </div>
  <!-- Indicators -->

  <ol class="carousel-indicators indicator" >
     <?php 
     $i=0; foreach ($img->result() as $image) { ?>
      <li <?php if($i==0){ echo 'class="active"';} else{  } ?> data-slide-to="<?=$i?>" data-target="#article-photo-carousel">
        <img alt="" src="<?=base_url()?>images/product/<?=$image->name?>">
      </li>
    <?php $i++; } ?>
  </ol>
</div>
<br><br>
<!-- ========= product silder ========== -->
<?php } else { 
     foreach ($img->result() as $image)  { }?>

<!-- ========= product image ========== -->

 <img 
     onerror="this.src='<?=base_url()?>images/product/noimg.jpg';"
      src="<?=base_url()?>images/product/<?=$image->name?>"
      class="img-responsive" style="height:300px; width:; " >         
<!-- ========= product image ========== -->         
<?php } ?>        
      

          </div>
        </div>
        <div class="row">
            <?php 
              foreach ($attributes->result() as $att) { ?>
                <div>
               <strong><?=$att->att_name?></strong>
                <!-- <p><?php echo strip_tags($att->description) ?></p> -->
                <p><?=$att->description?></p>
              </div>
            <?php  }
             ?>          
        </div>
      </div>

 
</section>

 
 



