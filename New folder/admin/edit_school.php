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
                                    <h2>Edit School<small>edit here..</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?=base_url()?>index.php/admin/edit_school/<?=$school->id?>" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="school_name" value="<?=$school->school_name?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact No. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="phone_no" value="<?=$school->phone_no?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea class="form-control col-md-7 col-xs-12" name="description"><?=$school->description?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="email" class="form-control col-md-7 col-xs-12" name="email" value="<?=$school->email?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PinCode
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" class="form-control col-md-7 col-xs-12" name="pincode" value="<?=$school->pincode?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" name="address"><?=$school->address?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="website" value="<?=$school->website?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Person
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact_person" value="<?=$school->contact_person?>">
                                            </div>
                                        </div>
                                        <!-- image preview -->
                                        <div class="form-group" >
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <img id="output_image" style="max-width:350px;" src="<?php echo base_url('uploads/school_image/'.$school->image.'') ; ?>">
                                            </div>
                                        </div>
                                        <!-- image preview -->
                                         <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" class="form-control col-xs-12 hidden" name="image" id="image" onchange="preview_image(event)" >
                                                 <label for="image"> <a class="btn btn-success col-xs-12"> Selcet Image</a> </label>
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Established On (Year)
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="established_on" value="<?=$school->established_on?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Curriculam
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" name="curriculam"><?=$school->curriculam?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facility
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea class="form-control col-md-7 col-xs-12" name="facility"><?=$school->facility?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Open Days
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea class="form-control col-md-7 col-xs-12" name="open_days"><?=$school->open_days?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Special Programs
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea class="form-control col-md-7 col-xs-12" name="special_programs"><?=$school->special_programs?></textarea>
                                            </div>
                                        </div>

                                        <hr>


                                        
                                        <table class="table table-bordered">

                                            <tr>
                                                <th>Classes<input class="form-control" type="" name="classes" value="<?=$school->classes?>"></th>

                                                <th>Board<input class="form-control" type="" name="board" value="<?=$school->board?>"></th>

                                                <th>Stream<input class="form-control" type="" name="stream" value="<?=$school->stream?>"></th>
                                            </tr>
                                        </table>

                                        <table class="table table-bordered">    
                                            <tr>
                                                <th>Type Of School</th>
                                                

                                                <?php $tos = explode(',',$school->type_of_school);
                                                      $act = explode(',',$school->activities);
                                                      $avl = explode(',',$school->available);
                                                      $fac = explode(',',$school->facilities);
                                                 ?>

                                                <td>Boys
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Boys" <?php if(in_array('Boys', $tos)){echo 'checked';} ?> >
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                

                                                <td>Girls 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Girls" <?php if(in_array('Girls', $tos)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                

                                                <td>Co-Ed 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Co-Ed" <?php if(in_array('Co-Ed', $tos)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                

                                                <td>Boarding 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="type_of_school[]" value="Boarding" <?php if(in_array('Boarding', $tos)){echo 'checked';} ?>>
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
                                                    <input type="checkbox" name="activities[]" value="Music" <?php if(in_array('Music', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Performing Arts 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Performing Arts" <?php if(in_array('Performing Arts', $act)){echo 'checked';} ?>>
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
                                                    <input type="checkbox" name="activities[]" value="Debating/Public Speaking ( Stage Performances )" <?php if(in_array('Debating/Public Speaking ( Stage Performances )', $act)){echo 'checked';} ?>>
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
                                                    <input type="checkbox" name="activities[]" value="Co-Curricular Act" <?php if(in_array('Co-Curricular Act', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Creative Arts 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Creative Arts" <?php if(in_array('Creative Arts', $act)){echo 'checked';} ?>>
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
                                                    <input type="checkbox" name="activities[]" value="Tradition/Culture" <?php if(in_array('Tradition/Culture', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Sports 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Sports" <?php if(in_array('Sports', $act)){echo 'checked';} ?>>
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
                                                    <input type="checkbox" name="activities[]" value="Languages" <?php if(in_array('Languages', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Religion & Faith 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Religion & Faith" <?php if(in_array('Religion & Faith', $act)){echo 'checked';} ?>>
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
                                                    <input type="checkbox" name="activities[]" value="Student Health & well-being" <?php if(in_array('Student Health & well-being', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Stream - (PCM) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (PCM)" <?php if(in_array('Stream - (PCM)', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr>
                                              
                                              <td>Stream - (PCB) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (PCB)" <?php if(in_array('Stream - (PCB)', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                              <td>Stream - (Commerce) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (Commerce)" <?php if(in_array('Stream - (Commerce)', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                                <td>Stream - (Arts) 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="activities[]" value="Stream - (Arts)" <?php if(in_array('Stream - (Arts)', $act)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                              </td>

                                            </tr>
                                            
                                        </table>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th rowspan="2">Available <br>Facilities :</th>
                                                
                                                <td>Badminton Court 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="available[]" value="Badminton Court" <?php if(in_array('Badminton Court', $avl)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Swimming Pool 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="available[]" value="Swimming Pool" <?php if(in_array('Swimming Pool', $avl)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Gymnasium 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="available[]" value="Gymnasium" <?php if(in_array('Gymnasium', $avl)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        
                                            <tr>
                                                
                                                
                                                <td>Ground 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Ground" <?php if(in_array('Ground', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td colspan="2">Dance Studio 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Dance Studio" <?php if(in_array('Dance Studio', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                            </tr>

                                            <tr>
                                                <td>Physics Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Physics Lab" <?php if(in_array('Physics Lab', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td>Chem. Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Chem. Lab" <?php if(in_array('Chem. Lab', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Biology Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Biology Lab" <?php if(in_array('Biology Lab', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Maths Lab 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Maths Lab" <?php if(in_array('Maths Lab', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Cricket Ground 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Cricket Ground" <?php if(in_array('Cricket Ground', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td>Football Ground 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Football Ground" <?php if(in_array('Football Ground', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Tennis Court 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Tennis Court" <?php if(in_array('Tennis Court', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Library 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Library" <?php if(in_array('Library', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Infirmary 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Infirmary" <?php if(in_array('Infirmary', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td>Art & Craft Room 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Art & Craft Room" <?php if(in_array('Art & Craft Room', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Music Room 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Music Room" <?php if(in_array('Music Room', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                <td>Canteen 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Canteen" <?php if(in_array('Canteen', $fac)){echo 'checked';}?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Conveyance 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Conveyance" <?php if(in_array('Conveyance', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>
                                                
                                                <td colspan="1">Smart Class 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Smart Class" <?php if(in_array('Smart Class', $fac)){echo 'checked';} ?>>
                                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                
                                                    </label>
                                                    </div>
                                                </td>

                                                <td colspan="2">Outdoor Multipurpose Sporting Club 
                                                    <div class="checkbox">
                                                    <label >
                                                    <input type="checkbox" name="facilities[]" value="Outdoor Multipurpose Sporting Club" <?php if(in_array('Outdoor Multipurpose Sporting Club', $fac)){echo 'checked';} ?>>
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
                                                    <td>Admission Fees: <input class="form-control" type="" name="admission_fees" value="<?=$school->admission_fees?>"></td>

                                                    <td>Average Quarterly Fees: <input class="form-control" type="" name="average_qurterly_fees" value="<?=$school->average_qurterly_fees?>"></td>
                                                </tr>

                                                <tr>

                                                    <td colspan="2"><strong>OR</strong> Describe Classes wise :
                                                
                                                        <textarea rows="6" class="form-control" name="class_wise_fees"><?=$school->class_wise_fees?></textarea>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td colspan="2"><strong>School Timings : </strong>
                                                
                                                        <textarea class="form-control" name="school_timings"><?=$school->school_timings?></textarea>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td colspan="2"><strong>School Visit Timings For Parents : </strong>
                                                
                                                        <textarea class="form-control" name="timings_parents"><?=$school->timings_parents?></textarea>
                                                    </td>
                                                </tr>
                                                
                                            </table>

                                        
    <script>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

</script>									
                                        
									
                                
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

        