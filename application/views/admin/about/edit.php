<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit About Page</h1>
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
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_about_page/<?=$about->about_page_id?>" method="post" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label>Title</label><span style="color:red">*</span>
                                            <input class="form-control" name="title" required="" value="<?=$about->title?>" onchange="cr_url(this.value)">
                                            <p class="help-block"></p>
                                        </div>
<script type="text/javascript">
    function cr_url(title) 
    {
         var t1 =title.replace(/[^a-zA-Z ]/g, "");
        var t2 =t1.replace(/\s\s+/g, ' ');
        var t3 =  t2.trim();
       var t4 = t3.replace(/ /gi, "-");
       
       //alert(t4);
        $('#url').val(t4).text();
    }
</script>
                            

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description"><?=$about->description?></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input  type="file" class="form-control" name="userfile"><hr>
                                            <p class="help-block"><strong style="color: red"> * Current Image <i class="fa fa-arrow-down"></i></strong><br>
                                                <img style="width:200px" src="<?=base_url()?>images/about/<?=$about->image?>">
                                            </p><hr>
                                        </div>


                                         <div class="form-group">
                                            <label>Image Alt</label><span style="color:red">*</span>
                                            <input class="form-control" name="image_alt" required="" value="<?=$about->image_alt?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Image Title</label><span style="color:red">*</span>
                                            <input class="form-control" name="image_title" required="" value="<?=$about->image_title?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Title</label> <span style="color:red">*</span> <span id="charNum"></span>
                                            <input class="form-control" name="meta_title" value="<?=$about->meta_title?>"
											 onkeyup="countChar(this)" required="">
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
                                            <textarea id="meta_description" rows="8" class="form-control" name="meta_description"><?=$about->meta_description?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" rows="8" class="form-control" name="meta_keywords"><?=$about->meta_keywords?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                       

                                          <div class="form-group">
                                            <label>Url<span style="color:red">*</span> <br>
                                                <span id="url_span">
                                                    <?=base_url()?>index.php/welcome/about/<?=$about->url?>/<?=$about->id?>
                                                </span>
                                            </label>
                                            <input  id="url" required="" class="form-control" onchange="change_url()" name="url"  value="<?=$about->url?>" readonly>
                                            <p class="help-block"></p>
                                        </div>

                                        <script type="text/javascript">
                                            function change_url()
                                            {
                                                var url = $("#url").val();
                                                $("#url_span").html('loading..');
                                                $("#url_span").html('<?=base_url()?>index.php/welcome/about/'+url+'/<?=$about->id?>');
                                            }
                                        </script>
                                        
                                        
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