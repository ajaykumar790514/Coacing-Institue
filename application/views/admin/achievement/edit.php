<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Achievement</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success fade in">
                    <?php echo $this->session->flashdata('success');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-danger fade in">
                    <?php echo $this->session->flashdata('error');?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            <?php endif;?>
                                    

            <div class="row well">
            	
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>

                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_achievement/<?=$achievement->id?>" method="post" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label>Year</label><span style="color:red">*</span>
                                            <input class="form-control" type="number" name="year"   placeholder="YYYY"   required min="2014" max="<?php echo date("Y");?>" value="<?=$achievement->year?>" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Rank</label>
                                            <input class="form-control" name="title"  onchange="cr_url(this.value)" value="<?=$achievement->title?>" required>
                                            <p class="help-block"></p>
                                        </div>
 <script type="text/javascript">
        function cr_url(title) 
        {
        var t1 = title.replace(/[^a-zA-Z ]/g, "");
        var t2 = t1.replace(/\s\s+/g, ' ');
        var t3 = t2.trim();
        var t4 = t3.replace(/ /gi, "-");
       
       //alert(t4);
        $('#url').val(t4).text();
        }
</script>
                                         <div class="form-group">
                                            <label>Student Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="student_name" required="" value="<?=$achievement->student_name?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" name="contact" value="<?=$achievement->contact?>" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?=$achievement->email?>" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="address" value="<?=$achievement->address?>" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                             <label>State</label>
                                           <select class="form-control" name="state"  onchange="get_cities(this.value)">
                                               <option value="">---Select State---</option>
                                               <?php 
                                               foreach ($states->result() as $state) { ?>
                                                  <option value="<?=$state->id?>" 
                                                   <?php if($state->id==$achievement->state) { echo "selected"; }
                                                    ?>
                                                    ><?=$state->name?></option>
                                             <?php  }  ?>
                                           </select>
                                        </div>
<script type="text/javascript">
    function get_cities(state_id) 
    {
        
        $("#cities").html('<h3 style="color:red">loading....</h3>');
        $("#cities").load('<?=base_url()?>index.php/admin/get_cities/'+state_id);
    }
</script>
                                        <div class="form-group" id="cities">
                                            <label>City</label>
                                            <select class="form-control" name="city">
                                               <?php 
                                               foreach ($cities->result() as $city) { 
                                                if($city->id==$achievement->city) {
                                                    ?>
                                                  <option value="<?=$city->id?>" selected ><?=$city->name?></option>
                                             <?php  } } ?>
                                             </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label><span style="color:red">*</span>
                                            <input class="form-control" type="file" name="userfile" >
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description" value="<?=$achievement->description?>"></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Testimonial</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="testimonial" value="<?=$achievement->testimonial?>"></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Testimonial</label>
                                            <input type="file"  class="form-control" name="testimonial_file" ></textarea>
                                            <p class="help-block"></p>
                                        </div>


                                        <div class="form-group">
                                            <label>Type</label><span style="color:red">*</span>
                                           <select class="form-control" required name="type">
                                               <option value="">---Select Type---</option>
                                              <?php 
                                               foreach ($achievement_type->result() as $type) { ?>
                                                  <option value="<?=$type->id?>"
                                                     <?php if($type->id==$achievement->type) { echo "selected"; }
                                                    ?>
                                                    ><?=$type->title?></option>
                                             <?php  }  ?>
                                           </select>
                                            <p class="help-block"></p>
                                        </div>

<script type="text/javascript">
function countChar(val){
     var len = val.value.length;
     if (len >= 70) {
              val.value = val.value.substring(0, 70);
               $('#charNum').text(' you have reached the limit');
     } else {
              $('#charNum').text(70 - len +' characters left');
     }
};
</script>




                                        <!-- <div class="form-group">
                                            <label>Wallpost Url<span style="color:red">*</span></label>
                                            <input  id="url" required="" class="form-control"  name="url"  value="<?=$update->url?>" readonly>
                                            <p class="help-block"></p>
                                        </div> -->
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>

                                    
                                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
 <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
  var area1, area2;
 
  function toggleArea1() {
        if(!area1) {
                area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
                for(i=1;i<=100;i++)
    {
        area2 = new nicEditor({fullPanel : true}).panelInstance('text_ns'+i,{hasPanel : true});
    }
                //$("#ext").hide();
        } else {
                area1.removeInstance('myArea1');
                area1 = null;
        }
  }
 
  function addArea2() {
        area2 = new nicEditor({fullPanel : true}).panelInstance('myArea2');
  }
  function removeArea2() {
        //area2.removeInstance('myArea2');
        area1.removeInstance('markItUp');
        $("#ext").show();
  }

  function enableEditor()
  {
    area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
  }
 
  bkLib.onDomLoaded(function() { toggleArea1(); });
  //]]>
  </script>

 <script type="text/javascript">
    function extract_keywords()
    {
        var d1 = new nicEditors.findEditor('markItUp').getContent();
        var description = $(d1).text();
        if(description=="")
        {
            description = d1;
        }
        var description1 = description.replace(/[^a-zA-Z ]/g, "");
        
        var dataString = "paragraph="+description1;
        $.ajax({
        url: "<?=base_url()?>keyphrase_extraction/product_keywords.php",
        type: "GET",
        data:  dataString,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
        document.getElementById('meta_keywords').value = data;
        document.getElementById('meta_description').value = description;
    },
    error: function(){}             
    });
        
    }
</script>