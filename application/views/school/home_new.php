<style type="text/css">
  .img1
  {
    cursor: zoom-in;
	height:280px;
	width:216px;

  }
  .img1:hover
  {
 -webkit-box-shadow: 0px 0px 25px 0px rgba(68,15,214,1);
-moz-box-shadow: 0px 0px 25px 0px rgba(68,15,214,1);
box-shadow: 0px 0px 25px 0px rgba(68,15,214,1);


  }
  .gallery-img
  {
 -webkit-box-shadow: 0px 0px 56px -20px rgba(10,16,140,1);
-moz-box-shadow: 0px 0px 56px -20px rgba(10,16,140,1);
box-shadow: 0px 0px 56px -20px rgba(10,16,140,1);
padding:15px; 
  }

  a {
  color: black;
  transition: 0.5s;
  text-decoration: none;
}

a:hover, a:active, a:focus {
  color: #51d8af;
  outline: none;
  text-decoration: none;
}
.details a:hover
{
  color:white!important;
}
.f-box {
-webkit-box-shadow: 0px 0px 10px 0px rgba(27,126,212,1);
-moz-box-shadow: 0px 0px 10px 0px rgba(27,126,212,1);
box-shadow: 0px 0px 10px 0px rgba(27,126,212,1);
padding:5px;
}

</style>
 <!--==========================
      Image Gallery
    ============================-->
<!--  <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        
        <div class="owl-carousel testimonials-carousel" style="width: 100%;padding:0px">
           <?php foreach ($product_image->result() as $pro_img) { ?>
            <div class="testimonial-item" style="">
              <img 

			  src="<?=base_url()?>images/product/<?=$pro_img->name?>"  class="img-responsive img1" style="" onclick="full()" id="img" > 
              <br>
              <br>
          <h3><a href='<?=base_url()?>product/<?=$pro_img->url?>/<?=$pro_img->product_id?>'><p>
            <?php 
              $name = $this->model->product_details($pro_img->product_id)->name;
              echo $name ;
            ?>
          </p></a> </h3>
            </div>
          <?php } ?>
           

        </div>

      </div>
      <script type="text/javascript">
      $(function() {
      $('img').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('#enlargeImageModal').modal('show');
    });
});
</script>
 <div class="modal" id="enlargeImageModal" tabindex="-5" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true" style="">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <img src="" class="enlargeImageModalSource" style="width:100% ;">
        </div>
      </div>
    </div>
</div>
</section> -->
 <!--==========================
      Image Gallery
    ============================-->
  <main id="main">


  <!--==========================
      About Section
    ============================-->
  <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2><?=$homepage->title?></h2>
          <p class="paragraph" style="text-align: justify;text-justify: inter-word;"> 
          <?=$homepage->description?>
        </p>
        </div>
       <!--  <div class="row">
          <div class="col-lg-6 about-img">
            <br><br>
            <?php if ($homepage->video1 == null) { ?>
                    <img width="100%" height="350px" src="<?=base_url('images/content/'.$homepage->img1.'')?>" class="img-responsive" >
            <?php   }  else { ?>
               <iframe width="100%" height="350px" src="<?=$homepage->video1?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <?php } ?>
          </div>
          <div class="col-lg-6 content">
            <h2><?=$homepage->title1?></h2>
            <ul>
              <li style="text-align:justify"><i class="ion-android-checkmark-circle"></i>
                <?=$homepage->content1?>
              </li>
            </ul>
          </div>
          <br>
          <br>
          <div class="col-lg-6 about-img">
            <br><br>
            <?php if ($homepage->video2 == null) { ?>
                <img width="100%" height="350px" src="<?=base_url('images/content/'.$homepage->img2.'')?>" class="img-responsive" >
            <?php   }  else { ?>
               <iframe width="100%" height="350px" src="<?=$homepage->video2?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
           <?php } ?>
          </div>
          <div class="col-lg-6 content">
            <h2><?=$homepage->title2?></h2>
            <ul>
              <li style="text-align:justify"><i class="ion-android-checkmark-circle"></i> 
               <?=$homepage->content2?> 
              </li>
            </ul>
          </div>
        </div> -->
      </div>
  </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <!--<section id="services">
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
              <h4 class="title"><a href="<?=base_url('index.php/welcome/news_detail/'.$news->id)?>"><?=$news->title?></a></h4>
              <p class="description" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;" ><?=$news->description?></p>
            </div>
          </div>
        <?php } ?>
            <div class="col-lg-12 text-center">
             <a href="<?=base_url('index.php/welcome/all_news')?>" class="btn btn-lg" style="width:350px;background-color: #081e5b;color:white"> View all</a>
            </div>        
        </div>

        </div>

      
    </section>-->
	
	<!-- #services -->
   
   
    <!--==========================
      Testimonials Section
    ============================-->
<!--  <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Testimonials</h2> -->
          <!--<p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram 
		  noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>-->
        <!-- </div>
        <div class="owl-carousel testimonials-carousel">
            <?php foreach ($testimonials->result() as $testimonial) { ?>
            <div class="testimonial-item">
              <p>
                <img src="<?=base_url()?>assets/school/img/quote-sign-left.png" class="quote-sign-left" alt="">
                <?=$testimonial->description?>
                <img src="<?=base_url()?>assets/school/img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="<?=base_url()?>images/testimonial/<?=$testimonial->img?>" class="testimonial-img" alt="">
              <h3><?=$testimonial->name?></h3>
              <h4><?=$testimonial->title?></h4>
            </div>
          <?php } ?>
           

        </div>

      </div>
    </section> --><!-- #testimonials -->


<!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="wow fadeInUp" style="margin-top: -55px;">
      <div class="container">
      <div class="col-md-10 col-sm-12">
        <div class="section-header">
          <h2>Updates</h2>
        </div>
        <div class="row ">
          <?php foreach ($updates->result() as $update) {  ?>
          <div class="col-lg-12 col-md-12">
            <a href="<?=base_url()?>update/<?=$update->url?>/<?=$update->id?>">
            <div class="member">
              <div class="pic"><img 
                
                src="<?=base_url()?>images/updates/<?=$update->img?>" alt="" style="height:100;width:100%;" ></div>
             <!--  <div class="details">
                <h4><?=$update->title?></h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div> -->
            </div>
            </a>
          </div>
          <?php } ?>
          
        </div>
      </div>

        <div class="col-md-2 col-sm-12" id="enrollment">
           <div class="section-header">
          <h2>Enquiry</h2>
        </div>
          <div class="form f-box" >
          <div id="sendmessage"><!-- Your message has been sent. Thank you! --></div>
          <div id="errormessage"></div>
          <form  id="enqiry" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-12">
                <input type="text" name="name" class="form-control" required id="name" placeholder="Student Name" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-12">
                <input type="email" class="form-control" name="email" id="email"  placeholder="Email"  />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-12">
              <input type="text" class="form-control" name="mobile" maxlength="13" placeholder="Contact No." pattern="[789][0-9]{9}"  required  />
              <div class="validation"></div>
              </div>
              <div class="form-group col-md-12">
             <!--  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  /> -->
              <select class="form-control" name="subject" id="subject" style="height: 34px;">
                <option value="">--Present class--</option>
                <option value="Class IX">Class IX</option>
                <option value="Class X">Class X</option>
                <option value="class XI">Class XI</option>
                <option value="Class XII">Class XII</option>
                <option value="Class XII Pass">Class XII Pass</option>
              </select>
              <div class="validation"></div>
                 </div> 

               <div class="form-group col-md-12">
                <label>Regarding</label><br>
              <input type="radio"  name="regarding" value="Admission"  />Admission
              <input type="radio"  name="regarding" value="Other" />Other
              <div class="validation"></div>
              </div>  
            </div>
            
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5"  placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            
            <div class="text-center" id="enq_span"><input  class="btn btn-success" id="enq_btn" type="submit" value="Send Message" ></div>
          </form>
        <div id="msg123"></div>

        </div>

        <script>
  $(document).ready(function (e){
     
$("#enqiry").on('submit',(function(e){

$("#enq_btn").val('LOADING...');
$("#enq_btn").attr("disabled","true");
e.preventDefault();
$.ajax({
url: "<?=base_url()?>index.php/welcome/send_enquiry",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
  $("#enq_span").html('<input class="btn btn-success" id="enq_btn" type="submit" value="Send Message">');
  $("#msg123").html(data);
  $('#enqiry')[0].reset();

},
error: function(){}           
});
}));
});
  </script>

        </div>

      </div>
    </section><!-- #team -->






<section id="achievements" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Key Achievements</h2>
        </div>
        <div class="row">
          <?php $this->load->view('school/achievements_tabs');?>
          
        </div>

      </div>
    </section>

    <!--==========================
      Call To Action Section
    ============================-->
    <!-- <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section> -->
    <!-- #call-to-action -->

    <!--==========================
      Our Team Section
    ============================-->
   <!-- <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Updates</h2>
        </div>
        <div class="row">
          <?php foreach ($updates->result() as $update) {  ?>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?=base_url()?>assets/school/img/team-1.jpg" alt=""></div>
              <div class="details">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?=base_url()?>assets/school/img/team-2.jpg" alt=""></div>
              <div class="details">
                <h4>Sarah Jhinson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?=base_url()?>assets/school/img/team-3.jpg" alt=""></div>
              <div class="details">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="<?=base_url()?>assets/school/img/team-4.jpg" alt=""></div>
              <div class="details">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>--><!-- #team -->

