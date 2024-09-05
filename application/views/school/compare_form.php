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
      
     

        <form id="filter_form" method="post">

          <div id="home1">
            <h2 class="text-center" style="color: #50d8af">Please Pick A Location</h2>
            <div class="" style="">
              <!--------------------------------HEAD DATA--------------------------------->
              <?php $countries = $this->admin_model->load_countries();

                    $this->db->where('country_id',101);
                    $states = $this->db->get('states');

                     $this->db->where('state_id',38);
                    $cities = $this->db->get('cities');

$this->db->where('city',4861);
                    $location = $this->db->get('location');


               ?>
                    <div class="form-group" style="height: 75px">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select style="height: 50px"  class="form-control col-md-7 col-xs-12" id="country" name="country" required="" onchange="load_states()">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($countries->result() as $c){?>
                                                         <option value="<?=$c->id?>" <?php if($c->id == 101){echo 'selected';} ?>>
                                                          <?=$c->name?>
                                                            
                                                          </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div><br>

                                        <script type="text/javascript">
                                            function load_states()
                                            {
                                                var country = $("#country").val();
                                                $("#state_list").html('LOADING.....');
                                                $("#state_list").load('<?=base_url()?>index.php/admin/load_states/'+country);
                                            }
                                        </script>

                                        <script type="text/javascript">
                                            function load_cities()
                                            {
                                                var state = $("#state").val();
                                                $("#city_list").html('LOADING.....');
                                                $("#city_list").load('<?=base_url()?>index.php/admin/load_cities123/'+state);
                                            }

                                            function load_locations()
                                            {
                                                var city = $("#city").val();
                                                $("#location_list").html('LOADING.....');
                                                $("#location_list").load('<?=base_url()?>index.php/admin/load_locations/'+city);
                                            }
                                        </script>

                                        

                                        <div class="form-group" style="height: 75px">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="state_list">
                                                  <select style="height: 50px"  class="form-control col-md-7 col-xs-12" id="state" name="state" required="" onchange="load_cities()">
                                                    <?php foreach($states->result() as $state){ ?>
                                                      <option value="<?=$state->id?>" <?php if($state->id== 38){echo 'selected';} ?>>
                                                        <?=$state->name?>
                                                          
                                                        </option>
                                                    <?php } ?>
                                                  </select>
                                                </span>
                                            </div>
                                        </div><br>

                                        <div class="form-group" style="height: 75px">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="city_list">
                                                   <select style="height: 50px"  class="form-control col-md-7 col-xs-12" id="city" name="city" required="" onchange="load_locations()">
                                                   
                                                    <?php foreach($cities->result() as $city){ ?>
                                                      <option value="<?=$city->id?>" <?php if($city->id== 4861){echo 'selected';} ?>>

                                                        <?=$city->name?>
                                                          
                                                        </option>
                                                    <?php } ?>
                                                  </select>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group" style="height: 75px">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="location_list">
<select style="height: 50px"  class="form-control col-md-7 col-xs-12" id="" name="location" required="">
                                                    <?php foreach($location->result() as $loc){ ?>
                                                      <option value="<?=$loc->id?>" <?php if($loc->id== 1){echo 'selected';} ?>>
                                                        <?=$loc->location?>
                                                          
                                                        </option>
                                                    <?php } ?>
                                                  </select>
</span>
                                            </div>
                                        </div>
                <!--------------------------------HEAD DATA--------------------------------->
                
                <!------------NEXT BUTTON------------------->
                <div style="" class="text-center"><hr>
                

                      <a style="background-color: #0c2e8a;color:white" onclick="load_next(1)" href="javascript:void(0)" class="btn btn-lg">NEXT</a>

                    
                
                </div>
                <!------------NEXT BUTTON------------------->
            </div>
          </div>

        <?php $j=2; foreach($steps->result() as $step){ ?>
          
          <div id="home<?=$j?>">
            <h2 class="text-center" style="color: #50d8af"><?=$step->step_name?></h2>
             
          
              <div class="" style="">

                <!--------------------------------HEAD DATA--------------------------------->
                    <?php $heads = $this->model->heads_by_step($step->id); ?>
                    <?php foreach($heads->result() as $head){ ?>
                      <div class="col-sm-4">
                      <h3 style="color: #0c2e8a"><?=$head->head_name?></h3>
                      <?php $this->db->where('head_id',$head->id);
                        $values = $this->db->get('head_values');
                        
                      ?>
                      <?php if($head->input_type==1){ ?>
                        <select class="form-control" style="min-width: 200px;height:50px" name="single[]">
                            <option value="">--Select--</option>
                          <?php foreach($values->result() as $value){ ?>
                            <option value="<?=$value->id?>"><?=$value->value?></option>
                          <?php } ?>
                        </select>
                      <?php } elseif($head->input_type==2){?>
                        <?php foreach($values->result() as $value){ ?>
                          <div class="checkbox">
                              <label style="font-size: 1.5em">
                                <input type="checkbox" name="multiple[]" value="<?=$value->id?>">
                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                <?=$value->value?>
                              </label>
                          </div>
                          <?php } ?>
                      <?php } ?>
                    </div>
                    <?php } ?>
                <!--------------------------------HEAD DATA--------------------------------->
                
                <!------------NEXT BUTTON------------------->
                <div class="text-center col-md-12"  ><hr>
                <?php if($step->is_final_step==0){ ?>
                    

                      <?php if($j!=1){ ?>
                      <a style="background-color: #50d8af;color:white" onclick="load_prev(<?=$j?>)" href="javascript:void(0)" class="btn btn-lg " >PREVIOUS</a>&nbsp;
                     <?php } ?>

                      <a style="background-color: #0c2e8a;color:white" onclick="load_next(<?=$j?>)" href="javascript:void(0)" class="btn btn-lg ">NEXT</a>

                    
                <?php }elseif($step->is_final_step==1){ ?>
                    <a style="background-color: #50d8af;color:white" onclick="load_prev(<?=$j?>)" href="javascript:void(0)" class="btn btn-lg " >PREVIOUS</a>&nbsp;
                      <input type="submit" class="btn btn-lg btn-success" name="SUBMIT">
                <?php } ?>
                </div>
                <!------------NEXT BUTTON------------------->
              </div>

               
        <script type="text/javascript">
          $( document ).ready(function() {
            var x = '<?=$j?>';
              if(x!=1)
              {

                $("#home"+x).hide();
              }
          });

          
        </script>
          

          </div>
        <?php $j++; } ?>


        
      </form>

      <div id="msg" style="min-height: 500px">
      </div>

        
    <script type="text/javascript">
      function load_next(x)
          {
            var i = x+1;
            $("#home"+i).show();
            $("#home"+x).hide();
          }

          function load_prev(x)
          {
            var i = x-1;
            $("#home"+i).show();
            $("#home"+x).hide();
          }
    </script> 

    <script type="text/javascript">
          $( document ).ready(function() {
           
                $("#msg").hide();
              
          });

          
        </script> 

    <script>
        $(document).ready(function (e){
        $("#filter_form").on('submit',(function(e){
           var count = '<?=$j-1?>';
        for(var i =1;i<=count;i++)
        {
          $("#home"+i).hide();
        }
        $("#msg").html('<img src="<?=base_url()?>assets/school/img/preloader.gif">');
       
        e.preventDefault();
        $.ajax({
        url: "<?=base_url()?>index.php/welcome/schools_by_heads",
        type: "POST",
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
          $("#msg").show();
        $("#msg").html(data);
        //$("#enquiry_form")[0].reset();
        },
        error: function(){}             
        });
        }));
        });
    </script>
     
      
    </div>

    
  </div>
</div>
</section>


