<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<section id="services">
      <div class="container">
        <div class="section-header">
          <h2>News</h2>
          <p>Our latest news are given below</p>
        </div>

        <div class="row">
          <?php foreach ($news->result() as $news) { ?>
              <div class="col-lg-6">
                  <div class="box wow fadeInLeft">
                    <div class="col-lg-3">
                      <a href="<?=base_url('index.php/welcome/news_detail/'.$news->id)?>">
                        <img src="<?=base_url('uploads/news_image/'.$news->image.'')?>" width="100%">
                      </a>
                    </div>
                      <h4 class="title">
                        <a href="<?=base_url('index.php/welcome/news_detail/'.$news->id)?>">
                          <?=$news->title?>
                        </a>
                      </h4>
                      <p class="description"><?=$news->description?></p>
                  </div>
              </div>
        <?php } ?>
             
            <div class="col-lg-12" style="text-align:center;">
           <?=$this->pagination->create_links(); ?>
            </div>        
         
          </div>

        </div>

      </div>
    </section>