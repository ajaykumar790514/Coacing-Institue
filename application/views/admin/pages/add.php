<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Page</h1>
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

            <a style="float: right" class="btn btn-info" href="<?=base_url()?>index.php/admin/pages_list">LIST</a>
            <div class="row well">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-12">
                                    <form role="form" action="<?=base_url()?>index.php/admin/add_page" method="post">
                                        <div class="form-group col-lg-6">
                                            <label>Page Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="" onchange="cr_url(this.value)">
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group col-lg-6">
                                            <label>Parent Page</label>
                                            <select class="form-control" name="parent">
                                                <option value="">--Select a parent page--</option>
                                                <?php foreach($pages->result() as $page1){ ?>
                                                    <option value="<?=$page1->id?>"><?=$page1->name?></option>
                                                <?php } ?>
                                            </select>
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
                                        <div class="form-group col-lg-12">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description"></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>

                                       

                                        <div class="form-group col-lg-6">
                                            <label>Open In New Tab</label>
                                            <select class="form-control" name="target_tab">
                                                <option value="">No</option>
                                                <option value="_blank">Yes</option>
                                            </select>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Meta Title</label>
                                            <input class="form-control" name="meta_title" >
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Meta Description</label>
                                            <textarea id="meta_description" rows="8" class="form-control" name="meta_description"></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" rows="8" class="form-control" name="meta_keywords"></textarea>
                                            <p class="help-block"></p>
                                        </div>
                                        
                                         <div class="form-group col-lg-6">
                                            <label>Url<span style="color:red">*</span> 
                                            </label>
                                            <input  id="url" required="" class="form-control"  name="url" readonly>
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
                area2 = new nicEditor({fullPanel : true}).panelInstance('markItUp1',{hasPanel : true});
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