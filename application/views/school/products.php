<style type="text/css">
  .produsts_box
  {
    -webkit-box-shadow: 0px 0px 7px 0px rgba(15,32,214,1);
-moz-box-shadow: 0px 0px 7px 0px rgba(15,32,214,1);
box-shadow: 0px 0px 7px 0px rgba(15,32,214,1);
  }
    .product-name
  {
    text-align: left;
     margin-left: 2%;
      height:40px;
      font-weight: 600;
  }
  .product-name:hover
  {
    color:#50d8af!important;
    transition: 1s; 
  }
</style>

    <!--==========================
      News details
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
	 <h2><?=$page_heading?></h2>
        </div>
        <div class="row contact-info">
         <div class="col-md-12 " style="margin-bottom: 50px;">
              <?php foreach ($products->result() as $product) { ?>
              <div class="col-md-3 " style='padding:8px ; float: left; '>
                <div style="" class="produsts_box" style="" >
                   <?php  $img = $this->model->single_product_image($product->id)->name; ?>
                    <a href="<?=base_url()?>product/<?=$product->url?>/<?=$product->id?>">
                    <img 
                    onerror="this.src='<?=base_url()?>images/product/noimg.jpg';"
                    src="<?=base_url()?>images/product/<?=$img?>" class="img-responsive" style="width:100%; height: 201px;  "  >
                      <p class="product-name"><?=$product->name?></p>
                    </a>
                    <!-- <?=$product->brand?> -->
                    <p style="text-align:left; height: 110px;overflow-y: hidden;text-overflow: ellipsis; padding: 10px; text-align: justify;text-justify: inter-word; ">
                      <?php echo strip_tags($product->description); ?>
                    </p>
                    <div style="text-align: right">
                    <a  href="<?=base_url()?>product/<?=$product->url?>/<?=$product->id?>">More....&nbsp;&nbsp;</a>
                    </div>
                    <br>
                </div>
              </div>
              <?php   } ?>
              
          </div><hr>
        </div>
      </div>
</section>


 


