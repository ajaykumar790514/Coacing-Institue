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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>

<?php $countries = $this->admin_model->load_countries();

                    $this->db->where('country_id',101);
                    $states = $this->db->get('states');

                     $this->db->where('state_id',38);
                    $cities = $this->db->get('cities');

$this->db->where('city',4861);
                    $location = $this->db->get('location');


               ?>

<div id="step1">
<h2 class="text-center">ADD SCHOOL DETAILS</h2><hr>

<form id="school_form" action="" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
  <?php $countries = $this->admin_model->load_countries(); ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="school_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact No. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="phone_no">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="email" class="form-control col-md-7 col-xs-12" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select style="height: 50px" class="form-control col-md-7 col-xs-12" id="country" name="country" required="" onchange="load_states()">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($countries->result() as $c){?>
                                                         <option value="<?=$c->id?>" <?php if($c->id == 101){echo 'selected';} ?>><?=$c->name?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

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

                                        

                                        <div class="form-group">
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
                                        </div>

                                        <div class="form-group">
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

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PinCode
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" class="form-control col-md-7 col-xs-12" name="pincode">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea rows="4" class="form-control col-md-7 col-xs-12" name="address"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="website">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Person
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact_person">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Established On(Year)
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="established_on">
                                            </div>
                                        </div>

                                        <hr>
                                        
                                        <table class="table table-bordered">

                                            <tr>
                                                <th>Classes<input class="form-control" type="" name="classes"></th>

                                                <th>Board<input class="form-control" type="" name="board"></th>

                                                <th>Stream<input class="form-control" type="" name="stream"></th>
                                            </tr>
                                        </table>

                                        <table class="table table-bordered">    
                                            <tr>
                                                <th>Type Of School</th>
                                                

                                                <td>Boys
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Boys">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                

                                                <td>Girls 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Girls">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                

                                                <td>Co-Ed 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Co-Ed">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                

                                                <td>Boarding 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Boarding">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </table>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Programs : </th>
                                                
                                                <td>Music 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Music">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                                <td>Performing Arts 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Performing Arts">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                                <th></th>
                                                <td colspan="2">Debating/Public Speaking ( Stage Performances ) 
                                                    
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Debating/Public Speaking ( Stage Performances )">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                
                                                </td>
                                            </tr>

                                            <tr>
                                                <th></th>
                                                <td>Co-Curricular Act 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Co-Curricular Act">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Creative Arts 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Creative Arts">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                              <th></th>
                                              <td>Tradition/Culture 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Tradition/Culture">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Sports 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Sports">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                              <th></th>
                                              <td>Languages 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Languages">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Religion & Faith 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Religion & Faith">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                              <th></th>
                                              <td>Student Health & well-being 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Student Health & well-being">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Stream - (PCM) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (PCM)">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                              
                                              <td>Stream - (PCB) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (PCB)">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Stream - (Commerce) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (Commerce)">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                                <td>Stream - (Arts) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (Arts)">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                            </tr>
                                            
                                        </table>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th rowspan="2">Available <br>Facilities : </th>
                                                
                                                <td>Badminton Court 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="available[]" value="Badminton Court">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Swimming Pool 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="available[]" value="Swimming Pool">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Gymnasium 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="available[]" value="Gymnasium">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        
                                            <tr>
                                                
                                                
                                                <td>Ground 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Ground">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td colspan="2">Dance Studio 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Dance Studio">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Physics Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Physics Lab">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td>Chem. Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Chem. Lab">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Biology Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Biology Lab">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Maths Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Maths Lab">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Cricket Ground 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Cricket Ground">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td>Football Ground 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Football Ground">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Tennis Court 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Tennis Court">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Library 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Library">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Infirmary 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Infirmary">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td>Art & Craft Room 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Art & Craft Room">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Music Room 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Music Room">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Canteen 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Canteen">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Conveyance 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Conveyance">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td colspan="1">Smart Class 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Smart Class">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                                <td colspan="2">Outdoor Multipurpose Sporting Club 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Outdoor Multipurpose Sporting Club">
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                            </tr>


                                            
                                        </table>  

                                        <div>
                                            <strong>Fee Structure : </strong><br>
                                            <table class="table table-bordered">

                                                <tr>
                                                    <td>Admission Fees: <input class="form-control" type="" name="admission_fees"></td>

                                                    <td>Average Quarterly Fees: <input class="form-control" type="" name="average_qurterly_fees"></td>
                                                </tr>

                                                <tr>

                                                    <td colspan="2"><strong>OR</strong> Describe Classes wise :
                                                
                                                        <textarea rows="6" class="form-control" name="class_wise_fees"></textarea>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td colspan="2"><strong>School Timings : </strong>
                                                
                                                        <textarea class="form-control" name="school_timings"></textarea>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td colspan="2"><strong>School Visit Timings For Parents : </strong>
                                                
                                                        <textarea class="form-control" name="timings_parents"></textarea>
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                        </div>                                     
                  
                                
                            <div class="clearfix"></div>
                            
                    
                    
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                                <span id="msg">
                                                  <input type="submit" class="btn btn-success" value="Submit" />
                                                </span>
                                            </div>
                                        </div>
                    
                    

                                    </form>

</div>  

<div id="step2">
</div>                                  


<script type="text/javascript">
  function load_next(id)
  {
    $("#step1").hide('');

    
    $("#step2").load('<?=base_url()?>index.php/welcome/school_head_form/'+id);
  }
</script>                                    


                                    <script>
                                      $(document).ready(function (e){
                                      $("#school_form").on('submit',(function(e){
                                      $("#msg").html('<h2 class="text-center" style="color:red">LOADING......</h2>');
                                      
                                      e.preventDefault();
                                      $.ajax({
                                      url: "<?=base_url()?>index.php/welcome/add_school",
                                      type: "POST",
                                      data:  new FormData(this),
                                      contentType: false,
                                      cache: false,
                                      processData:false,
                                      success: function(data){
                                      $("#msg").html(data);
                                      
                                      },
                                      error: function(){}             
                                      });
                                      }));
                                      });
                                  </script>