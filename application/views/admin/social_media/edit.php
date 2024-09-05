<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product</h1>
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
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_social_media/<?=$social_media->id?>" method="post">
                                        <div class="form-group">
                                            <label>Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="" value="<?=$social_media->name?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Url</label><span style="color:red">*</span>
                                            <input class="form-control" name="url" value="<?=$social_media->url?>" required >
                                            <p class="help-block"></p> 
                                        </div>

                                        <div class="form-group">
                                            <label>Icon</label><span style="color:red">*</span>
                                            <span style="float: right;margin-bottom: 2px;">
                                                <a href="https://fontawesome.com/icons?d=gallery" target="_blank" class="btn btn-primary" title="copy icon class"><i class="fa fa-search"></i></a>
                                            </span>
                                            <input class="form-control" name="icon" value="<?=$social_media->icon?>" required>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Order</label>
                                            <input class="form-control" name="order" value="<?=$social_media->order?>">
                                            <p class="help-block"></p>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
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