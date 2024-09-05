<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Product</h1>
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

                                    <a style="float: right" class="btn btn-info" href="<?=base_url()?>index.php/admin/list_products">LIST</a>
            <div class="row well">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/admin/add_product" method="post">
                                        <div class="form-group">
                                            <label>Product Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="" id="product_name">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input class="form-control" name="brand">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description"></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>
										
										<div class="form-group">
                                            <label>Order</label>
                                            <input type="text" class="form-control" name="order" >
                                            <p class="help-block"></p>
                                        </div>

                                      <!--   <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="price">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>MRP</label>
                                            <input class="form-control" name="mrp">
                                            <p class="help-block"></p>
                                        </div> -->

        <!---------------------------------------------CATEGORY LOADING DIV--------------------------------------------->
                                    <div style="border: 1px solid grey;background-color: white" class="well">
                                        <div class="form-group">
                                            <label>Category</label> <strong style="color: red">( LEVEL 1 )</strong><span style="color:red">*</span>
                                            <!-- <select class="form-control" id="cat_id" name="cat_id" required="" onchange="load_subcategories()">
                                                <option value="">--Please Select A Category--</option>
                                                <?php foreach($categories->result() as $cat){ ?>
                                                    <option value="<?=$cat->id?>"><?=$cat->name?></option>
                                                <?php } ?>
                                            </select> -->
                                            <br>
                                            <?php $i=1; foreach($categories->result() as $cat){ ?>
                                            <input type="checkbox" name="" id="cat_id<?=$i?>" value="<?=$cat->id?>" onclick="subcat_list()"> <?=$cat->name?> <a href="javascript:void(0)" onclick="add_category(<?=$cat->id?>,'<?=$cat->name?>')"><i class="fa fa-plus-circle"></i></a><br>
                                            <?php $i++;} ?>
                                            <p class="help-block"></p>
                                        </div>


                                        <script type="text/javascript">

                                            

                                            function subcat_list()
                                            {
                                                var count = '<?=$i-1?>';
                                                
                                                var j = 0; var users = [];
                                                for(i=1;i<=count;i++)
                                                {
                                                    if($("#cat_id"+i).prop("checked") == true)
                                                    {
                                                        users[j] = $("#cat_id"+i).val(); 
                                                        ++j;
                                                    }
                                                }
                                                if(j>0)
                                                {
                                                var dataString = 'cat_id='+users;       
                                                $("#subcat").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                                                        $.ajax({
                                                url: "<?=base_url()?>index.php/admin/load_subcategories_ns",
                                                type: "GET",
                                                data:  dataString,
                                                contentType: false,
                                                cache: false,
                                                processData:false,
                                                success: function(data){
                                                $("#subcat").html(data);
                                                //$("#review_form")[0].reset();
                                                },
                                                error: function(){}             
                                                });
                                                }
                                                
                                            }

                                            
                                
                                        </script>

                                        <script type="text/javascript">
                                            function load_subcategories(x)
                                            {
                                                $("#subcat").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                                                var cat_id = $("#cat_id"+x).val();
                                                if(cat_id!="")
                                                {
                                                    $("#subcat").load('<?=base_url()?>index.php/admin/load_subcategories');
                                                }
                                                else
                                                {
                                                    $("#subcat").html('');
                                                    $("#subcat1").html('');
                                                }
                                            }

                                            function load_subcategories1()
                                            {
                                                $("#subcat1").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                                                var subcat_id = $("#subcat_id").val();
                                                if(subcat_id!="")
                                                {
                                                $("#subcat1").load('<?=base_url()?>index.php/admin/load_subcategories1/'+subcat_id);
                                                }
                                                else
                                                {
                                                    $("#subcat1").html('');
                                                    $("#subcat2").html('');
                                                }
                                            }

                                            function load_subcategories2()
                                            {
                                                $("#subcat2").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                                                var subcat_id = $("#subcat_id1").val();
                                                if(subcat_id!="")
                                                {
                                                $("#subcat2").load('<?=base_url()?>index.php/admin/load_subcategories2/'+subcat_id);
                                                }
                                                else
                                                {
                                                    $("#subcat2").html('');
                                                }
                                            }

                                            

                                        </script>

                                        <div class="form-group">
                                            <span id="subcat">
                                                
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <span id="subcat1">
                                                
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <span id="subcat2">
                                                
                                            </span>
                                        </div>


                                    </div>

        <!---------------------------------------------CATEGORY LOADING DIV--------------------------------------------->

                                    <script type="text/javascript">
                                        function add_category(subcat_id,name)
                                        {

                                            if($("#"+subcat_id).length){
                                                alert("This element already exists.");
                                            }
                                            else
                                            {
                                                $("#cat_load").append('<div id="'+subcat_id+'" style="background-color:#b30000;color:white;padding:5px;border-radius:5px">'+name+'<a href="javascript:void(0)" onclick="remove_category('+subcat_id+')"><input type="hidden" name="category[]" value="'+subcat_id+'"><i style="float:right;color:white" class="fa fa-minus-circle"></i></a></div><br>');
                                            }
                                            
                                        }

                                        function remove_category(subcat_id)
                                        {
                                            $("#"+subcat_id).remove();
                                        }
                                    </script>

                                    <div class="form-group well" style="border: 1px solid green; background-color: white">
                                        <h4>Assigned Categories</h4><hr>
                                        <span id="cat_load">
                                            
                                        </span>
                                        
                                    </div>                                

                                        <div class="form-group">
                                            <label>Attributes Group</label><br>
                                            <select class="form-control" id="att_group" name="att_group" onchange="load_attributes()">
                                                <option value="">--Select an attribute group--</option>
                                            <?php foreach($attribute_groups->result() as $att){ ?>
                                                <option value="<?=$att->id?>"><?=$att->name?></option>
                                            <?php } ?>  
                                            </select>
                                        </div>

                                        <div id="ag" class="well" style="background-color: white;border:1px solid brown">
                                              
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Title</label><span style="color:red">*</span>
											<span id="charNum"></span>
                                            <input class="form-control" name="meta_title" required="" onkeyup="countChar(this)">
                                            <p class="help-block"></p>
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
                                            <textarea id="meta_description" class="form-control" name="meta_description" rows="8"></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" class="form-control" name="meta_keywords" rows="8"></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group">
                                            <label>Product Url<span style="color:red">*</span> 
                                            </label>
                                            <input  id="url" type="text" required="" class="form-control" onchange="change_url()" name="url"  readonly>
                                            <p class="help-block"></p>
                                        </div>

                                       
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" class="btn btn-default">Next</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

        <script type="text/javascript">
            function load_attributes()
            {
                var att_group = $("#att_group").val();
                $("#ag").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                $("#ag").load('<?=base_url()?>index.php/admin/load_attributes/'+att_group);
            }
        </script>

    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
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
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
 