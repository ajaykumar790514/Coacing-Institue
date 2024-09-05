<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
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
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_category/<?=$category->id?>" method="post" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label>Category Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="" value="<?=$category->name?>" onchange="cr_url(this.value)">
                                            <p class="help-block"></p>

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
</script>                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description" onchange="extract_keywords()"><?=$category->description?></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input  type="file" class="form-control" name="userfile"><hr>
                                            <p class="help-block"><strong style="color: red"> * Current Category Image <i class="fa fa-arrow-down"></i></strong><br>
                                                <img style="width:200px" src="<?=base_url()?>images/category/<?=$category->img?>">
                                            </p><hr>
                                        </div>

                                         <div class="form-group">
                                            <label>Image alt</label><span style="color:red">*</span>
                                            <input class="form-control" name="img_alt" required="" value="<?=$category->img_alt?>" >
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group">
                                            <label>Image Title</label><span style="color:red">*</span>
                                            <input class="form-control" name="img_title" required="" value="<?=$category->img_title?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <script type="text/javascript">
                                            function load_subcategories()
                                            {
                                                var cat_id = $("#cat_id").val();
                                                if(cat_id!="")
                                                {
                                                    $("#subcat").load('<?=base_url()?>index.php/admin/load_subcategories/'+cat_id);
                                                }
                                                else
                                                {
                                                    $("#subcat").html('');
                                                }
                                            }

                                            function load_subcategories1()
                                            {
                                                var subcat_id = $("#subcat_id").val();
                                                $("#subcat1").load('<?=base_url()?>index.php/admin/load_subcategories1/'+subcat_id);
                                            }
                                        </script>

                                        <div class="form-group">
                                            <span id="subcat">
                                                
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Title</label><span style="color:red">*</span>  <span id="charNum"></span>
                                            <input class="form-control" name="meta_title" required="" value="<?=$category->meta_title?>"
											 onkeyup="countChar(this)">
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
                                            <textarea id="meta_description" class="form-control" name="meta_description" rows="8"><?=$category->meta_description?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" class="form-control" name="meta_keywords" rows="8"><?=$category->meta_keywords?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group">
                                            <label>Category Url<span style="color:red">*</span> <br>
                                                <span id="url_span">
                                                    <?=base_url()?>index.php/welcome/products/<?=$category->url?>/<?=$category->id?>
                                                </span>
                                            </label>
                                            <input id="url" required="" class="form-control" onchange="change_url()" name="url" value="<?=$category->url?>" readonly>
                                            <p class="help-block"></p>
                                        </div>

                                        <script type="text/javascript">
                                            function change_url()
                                            {
                                                var url = $("#url").val();
                                                $("#url_span").html('loading..');
                                                $("#url_span").html('<?=base_url()?>index.php/welcome/Information/'+url+'/<?=$category->id?>');
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

    <script type="text/javascript">
 $(document).ready(function() {
         var o = {
                buttonList: ['save','bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','image','link','unlink','forecolor','bgcolor', 'xhtml'],
                iconsPath:('http://js.nicedit.com/nicEditIcons-latest.gif')
            };
        new nicEditor({fullPanel : true}).panelInstance('markItUp');

     });
 
 </script>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
 <script src="<?=base_url()?>themes/admin_panel/js/niceedit/niceedit.js"></script>

 <script type="text/javascript">
    function extract_keywords()
    {
        //var data1 = $("#markItUp1").val();
        //var data1 = new nicEditors.findEditor('markItUp').getContent();
        //var data2  = $(data1).text();

        //alert(data2); return false;
        //var paragraph = $("textarea#description").jqte();
        var description = $("#markItUp").val();
        var description1 = description.replace(/[^a-zA-Z ]/g, "");
         var dataString = "paragraph="+description1;
        //alert(dataString); return false;
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