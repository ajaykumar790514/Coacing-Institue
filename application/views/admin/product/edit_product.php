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
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_product/<?=$product->id?>" method="post">
                                        <div class="form-group">
                                            <label>Product Name</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="" value="<?=$product->name?>" id="product_name">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input class="form-control" name="brand" value="<?=$product->brand?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description"><?=$product->description?></textarea>
                                            <p class="help-block"></p>
                                            <a class="btn btn-success" href="javascript:void(0)" onclick="extract_keywords()">Extract Keywords</a><br><br><br>
                                        </div>
										
										<div class="form-group">
                                            <label>Order</label>
                                            <input class="form-control" name="order" value="<?=$product->order?>">
                                            <p class="help-block"></p>
                                        </div>

                                       <!--  <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="price" value="<?=$product->price?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>MRP</label>
                                            <input class="form-control" name="mrp" value="<?=$product->mrp?>">
                                            <p class="help-block"></p>
                                        </div> -->


                                        <!---------------------------------------------CATEGORY LOADING DIV--------------------------------------------->
                                    <div style="border: 1px solid grey;background-color: white" class="well">
                                        <div class="form-group">
                                            <label>Category</label> <strong style="color: red">( LEVEL 1 )</strong><span style="color:red">*</span>
                                            
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
                                            <?php $cats = $this->admin_model->get_product_category($product->id);
                                            //echo "<pre>";print_r($cats->result_array()); 
                                                foreach($cats->result() as $categ)
                                                { ?>
                                                    <div id="<?=$categ->id?>" style="background-color:#b30000;color:white;padding:5px;border-radius:5px"><?=$categ->name?><a href="javascript:void(0)" onclick="remove_category(<?=$categ->id?>)"><input type="hidden" name="category[]" value="<?=$categ->category_id?>"><i style="float:right;color:white" class="fa fa-minus-circle"></i></a></div><br>
                                                <?php }
                                             ?>
                                        </span>
                                        
                                    </div>



                                        <hr>

                                        <?php if(count($attributes->result_array())>0){ ?>
                                        <div id="ag" class="well" style="background-color: white;border:1px solid brown">
                                            <h5 class="text-center" style="color:red">To Change <strong>Attribute Group</strong> please, 
                                                <strong><a href="javascript:void(0)" onclick="delete_attributes()" class="btn btn-danger">DELETE ATTIBUTES</a></strong>
                                            </h5>



                                            <br>
                                              <h4 class="text-center">Attributes</h4><hr>

                                                <?php  $i=1; foreach($attributes->result() as $att){ 
                                                    $att_group_id = $att->group_id;
                                                    ?>
                                            <div class="form-group">
                                                <label><?=$att->name?><input type="hidden" name="attribute_id[]" value="<?=$att->attribute_id?>"></label><br>
                                                <textarea name="att_description[]" id="text_ns<?=$i?>" class="form-control"><?=$att->description?></textarea>
                                            </div>
                                                <?php $i++; } ?>

                                                <script type="text/javascript">
                                            function delete_attributes()
                                            {
                                                var x = confirm('Are You Sure, You want to continue?');
                                                if(x==true)
                                                {
                                                    $('#ag').html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                                                    $('#ag').load('<?=base_url()?>index.php/admin/delete_attributes/<?=$product->id?>');
                                                }
                                            }
                                        </script>
                                                
                                        </div>
                                    <?php }else{ ?>

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

                                        <script type="text/javascript">
            function load_attributes()
            {
                var att_group = $("#att_group").val();
                $("#ag").html('<h4 class="text-center" style="color:red">LOADING....</h4>');
                $("#ag").load('<?=base_url()?>index.php/admin/load_attributes/'+att_group);
            }
        </script>

                                    <?php } ?>

                                        

                                        <div class="form-group">
                                            <label>Meta Title</label><span style="color:red">*</span> <span id="charNum"></span> 
                                            <input class="form-control" name="meta_title" required="" 
											value="<?=$product->meta_title?>" onkeyup="countChar(this)">
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
                                            <textarea id="meta_description" class="form-control" name="meta_description" rows="8"><?=$product->meta_description?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea id="meta_keywords" class="form-control" name="meta_keywords" rows="8"><?=$product->meta_keywords?></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                         <div class="form-group">
                                            <label>Product Url<span style="color:red">*</span> <br>
                                                <span id="url_span">
                                                    <?=base_url()?>index.php/welcome/products/<?=$product->url?>/<?=$product->id?>
                                                </span>
                                            </label>
                                            <input  id="url" type="text" required="" class="form-control" onchange="change_url()" name="url" value=" <?=$product->url?>" readonly>
                                            <p class="help-block"></p>
                                        </div>

                                        <script type="text/javascript">
                                            function change_url()
                                            {
                                                var url = $("#url").val();
                                                $("#url_span").html('loading..');
                                                $("#url_span").html('<?=base_url()?>index.php/welcome/products/'+url+'/<?=$product->id?>');
                                            }
                                        </script>
                                        
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