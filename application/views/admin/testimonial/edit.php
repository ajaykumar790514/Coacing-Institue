<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Testimonial</h1>
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
                                    <br />


            <div class="row well">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_testimonial/<?=$update->id?>" method="post" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label>Title</label><span style="color:red">*</span>
                                            <input class="form-control" name="title" required="" value="<?=$update->title?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="" value="<?=$update->name?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>  <span id="charNum1"></span>
                                            <textarea id="" rows="8" class="form-control" name="description" onchange="extract_keywords()"  onkeyup="countChar1(this)"><?=$update->description?></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>
	<script type="text/javascript">
function countChar1(val){
     var len = val.value.length;
     if (len >= 184) {
              val.value = val.value.substring(0, 184);
               $('#charNum1').text(' you have reached the limit');
     } else {
              $('#charNum1').text(184 - len +' characters left');
     }
};
</script>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input  type="file" class="form-control" name="userfile"><hr>
                                            <p class="help-block"><strong style="color: red"> * Current Image <i class="fa fa-arrow-down"></i></strong><br>
                                                <img style="width:200px" src="<?=base_url()?>images/testimonial/<?=$update->img?>">
                                            </p><hr>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Title</label> <span id="charNum"></span>
                                            <input class="form-control" name="meta_title" value="<?=$update->meta_title?>" onkeyup="countChar(this)">
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


                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea id="meta_description" rows="8" class="form-control" name="meta_description"><?=$update->meta_description?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" rows="8" class="form-control" name="meta_keywords"><?=$update->meta_keywords?></textarea>
                                            <p class="help-block"></p>
                                        </div>
                                        
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
 
 <div style="clear: both;"></div><script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
  var area1, area2;
 
  function toggleArea1() {
        if(!area1) {
                area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
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