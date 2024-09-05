<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Home Page</h1>
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
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_home_page" method="post" enctype="multipart/form-data">
                                        

                                        <div class="form-group">
                                            <label>Heading *</label>
                                            <input class="form-control" required="" name="heading" value="<?=$home->heading?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Title *</label>
                                            <input class="form-control" required="" name="title" value="<?=$home->title?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Description *</label>
                                            <textarea id="markItUp" required="" rows="8" class="form-control" name="description" onchange="extract_keywords()"><?=$home->description?></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <input class="form-control" name="meta_title" value="<?=$home->meta_title?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea rows="8" class="form-control" name="meta_description" id="meta_description"><?=$home->meta_description?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" rows="8" class="form-control" name="meta_keywords"><?=$home->meta_keywords?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>First Content Image</label>
                                            <input type="file" name="img1">
                                            <img width="200px" src="<?=base_url()?>images/content/<?=$home->img1?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>First Content Video Link</label>
                                            <textarea id="" rows="8" class="form-control" name="video1"><?=$home->video1?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>First Content Title</label>
                                             <input class="form-control" name="title1" value="<?=$home->title1?>">
                                            <p class="help-block"></p>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>First Content Description</label>
                                            <textarea id="" rows="8" class="form-control" name="content1"><?=$home->content1?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Second Content Image</label>
                                            <input type="file" name="img2">
                                            <img width="200px" src="<?=base_url()?>images/content/<?=$home->img2?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Second Content Video Link</label>
                                            <textarea id="" rows="8" class="form-control" name="video2"><?=$home->video2?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Second Content Title</label>
                                             <input class="form-control" name="title2" value="<?=$home->title2?>">
                                            <p class="help-block"></p>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Second Content Description</label>
                                            <textarea id="" rows="8" class="form-control" name="content2"><?=$home->content2?></textarea>
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