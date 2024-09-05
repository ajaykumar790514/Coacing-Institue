

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
          <p></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
            <address><?=$contact->address?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:<?=$contact->contact?>"><?=$contact->contact?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?=$contact->email?>"><?=$contact->email?></a></p>
            </div>
          </div>

        </div>
      </div>

      <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->

      <div class="container">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form  id="enqiry" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" required id="name" placeholder="Your Name" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email"  placeholder="Your Email"  />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
              <input type="text" class="form-control" name="mobile" maxlength="13" placeholder="Mobile" pattern="[789][0-9]{9}"  required  />
              <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  />
              <div class="validation"></div>
                 </div>   
            </div>
            
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5"  placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            
            <div class="text-center" id="enq_span"><input  class="btn btn-success" id="enq_btn" type="submit" value="Send Message"></div>
          </form>
        <div id="msg123"></div>

        </div>

      </div>
    </section><!-- #contact -->
    

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

},
error: function(){}           
});
}));
});
  </script>
  </main>

  