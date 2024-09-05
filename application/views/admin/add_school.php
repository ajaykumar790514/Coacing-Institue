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

<!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <!-- <h3>Add City</h3> -->
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add School<small>add here..</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?=base_url()?>index.php/admin/add_school" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="school_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact No. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="phone_no">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea class="form-control col-md-7 col-xs-12" name="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" class="form-control col-md-7 col-xs-12" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control col-md-7 col-xs-12" id="country" name="country" required="" onchange="load_states()">
                                                    <option value="">--Select--</option>
                                                    <?php foreach($countries->result() as $c){?>
                                                         <option value="<?=$c->id?>"><?=$c->name?></option>
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
                                                <span id="state_list"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="city_list"></span>
                                            </div>
                                        </div>

                                        <div class="form-group" style="height: 75px">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <span id="location_list"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PinCode
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" class="form-control col-md-7 col-xs-12" name="pincode">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" name="address"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="website">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Person
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact_person">
                                            </div>
                                        </div>
                                        <!-- image preview -->
                                        <div class="form-group" >
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <img id="output_image" style="max-width:350px;">
                                            </div>
                                        </div>
                                        <!-- image preview -->
                                         <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" class="form-control col-xs-12 hidden" name="image" id="image" onchange="preview_image(event)" >
                                                 <label for="image"> <a class="btn btn-success col-xs-12"> Select Image</a> </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Established On(Year)
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="established_on">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Curriculam
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" name="curriculam"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facility
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" name="facility"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Open Days
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea class="form-control col-md-7 col-xs-12" name="open_days"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Special Programs
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea class="form-control col-md-7 col-xs-12" name="special_programs"></textarea>
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
                                                
                                                <input type="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </div>
										
										

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    



                    


                    


                    
                </div>
                <!-- /page content -->
				
				
		  
		   
 <script src="<?=base_url()?>assets/admin/js/niceedit/niceedit.js"></script>

        