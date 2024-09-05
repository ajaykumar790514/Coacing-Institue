<style type="text/css">
    .checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}


#compare .box {
  padding: 10px;
  margin-bottom: 40px;
  box-shadow: 10px 10px 15px rgba(73, 78, 92, 0.1);
  background: #fff;
  transition: 0.4s;
}

#compare .box:hover {
  box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
  transform: translateY(-10px);
  -webkit-transform: translateY(-10px);
  -moz-transform: translateY(-10px);
}

#compare .box .icon {
  float: left;
}

#compare .box .icon i {
  color: #444;
  font-size: 40px;
  transition: 0.5s;
  line-height: 0;
  margin-top: 20px;
}

#compare .box .icon i:before {
  background: #0c2e8a;
  background: linear-gradient(45deg, #50d8af 0%, #a3ebd5 100%);
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

#compare .box h4 {
  margin-left: 20px;
  font-weight: 700;
 /* margin-bottom: 15px;*/
  font-size: 18px;
}

#compare .box h4 a {
  color: #444;
}

#compare .box p {
  font-size: 14px;
  margin-left: 100px;
  margin-bottom: 0;
  line-height: 24px;
}

@media (max-width: 767px) {
  #compare .box .box {
    margin-bottom: 20px;
  }
  #compare .box .icon {
    float: none;
    text-align: center;
    /*padding-bottom: 15px;*/
  }
  #compare .box h4, #services .box p {
    margin-left: 0;
    text-align: center;
  }
}

</style>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<section id="compare" class="fadeInUp">
<div class="row" style="">
    <div class="jumbotron col-md-12 ">
      <!-- ******advertisement****** -->
      
       <!-- *******advertisement******* -->
       
      <!-- *******advertisement******* -->
       
       <!-- *****advertisement***** -->
    </div>
</div>  
</section>
<section id="compare1" class="fadeInUp">
<div class="container">
  <div class="row well">
    <div class=" col-md-12" >
      
     

        <form id="personal_info" method="post">

          <div id="home1">
            <h2 class="text-center" style="color: #50d8af">Information about you.</h2>
            <div class="" style="">
              <!--------------------------------HEAD DATA--------------------------------->   
                    <div class="form-group col-md-6" style="height: 75px">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name*
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input style="height: 50px"  class="form-control col-md-12 col-xs-12" id="name" name="name" placeholder="Enter Your Name" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6" style="height: 75px">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email*
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input style="height: 50px"  class="form-control col-md-12 col-xs-12" id="email" name="email" placeholder="Enter Your Email" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6" style="height: 75px">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select style="height: 50px"  class="form-control col-md-12 col-xs-12" id="country_id" name="country_id" required="" >
                                <option value="">--Select--</option>
                                <?php foreach($country->result() as $c){?>
                                     <option value="<?=$c->id?>" >
                                      <?=$c->name?>
                                      </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6" style="height: 75px">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MOBILE NO.
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input style="height: 50px"  class="form-control col-md-12 col-xs-12" id="mobile" name="mobile" placeholder="Enter Your Mobile" required>
                        </div>
                    </div>                   
  <!--------------------------------HEAD DATA--------------------------------->
                
                <!------------NEXT BUTTON------------------->
                <div style="" class="text-center"><hr>
                <p id="msg"></p>
                    <input type="submit" class="btn btn-lg" style="background-color: #0c2e8a;color:white" name="" value="NEXT">
                    
                </div>
                <!------------NEXT BUTTON------------------->
            </div>
          </div>        
      </form>
      </div>

    
    <script>
        $(document).ready(function (e){
        $("#personal_info").on('submit',(function(e){
          
       
        $("#msg").html('<img src="<?=base_url()?>assets/school/img/preloader.gif">');
       
        e.preventDefault();
        $.ajax({
        url: "<?=base_url()?>index.php/welcome/enquiry_step_1",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          $("#msg").show();
        $("#compare1").html(data);
        //$("#enquiry_form")[0].reset();
        },
        error: function(){}             
        });
        }));
        });
    </script>
     
      
    </div>

    
  </div>

</section>


