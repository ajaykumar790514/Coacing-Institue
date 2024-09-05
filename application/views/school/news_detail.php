

    <!--==========================
      News details
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <?php
            foreach ($news_detail->result() as $news_d) {
                # code...
            }
            ?>
        <div class="section-header">
          <h2>News</h2>
          
        </div>

        <div class="row contact-info">
            <!-- /////****** news details -->
          <div class="col-md-8 " style="margin-bottom: 50px">
            <h3 style="float: left;"><?=$news_d->title?></h3>
            <img width="100%" src="<?=base_url('uploads/news_image/'.$news_d->image.'')?>">
            <div class="contact-address">
             <p class="description"><?=$news_d->description?></p>
            </div>
          </div><hr>
          <!-- /////****** news details -->
          <!-- ////******* slide news box -->
          <div class="col-md-4">
            <h4 class="text-center">OUR LATEST NEWS</h4>
            <div class="contact-phone" style="border: 1px solid grey"> <!-- style=" height:350px; overflow:auto;" -->
             <marquee direction="up" behavior="alternate" style="height:350px;" scrollamount="5"
                    onMouseOver="stop()" onMouseOut="start()" >
                    <?php foreach ($all_news->result() as $all_news) { ?>
                
                      <table class="table">
                        <tr>
                          <td>
                            <a href="<?=base_url('index.php/welcome/news_detail/'.$all_news->id)?>">
                                  <img width="50px" src="<?=base_url('uploads/news_image/'.$all_news->image.'')?>">
                                </a>
                          </td>

                          <td>
                            <h4 class="title">
                                <a href="<?=base_url('index.php/welcome/news_detail/'.$all_news->id)?>"><?=$all_news->title?>
                                </a>
                            </h4>
                            <p class="description"><?=$all_news->description?></p>
                          </td>
                        </tr>
                      </table>

                        
                        
                   

                    <?php } ?>
                    
            </marquee>
            </div>
          </div>
          <!-- ////******* slide news box -->

         

        </div>
      </div>

     

    </section>


 



