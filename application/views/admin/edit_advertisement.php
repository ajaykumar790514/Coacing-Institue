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
                                    <h2>Edit News<small>edit here..</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?=base_url()?>index.php/admin/edit_advertisement/<?=$advertisement->id?>/<?=$advertisement->image?>" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Title<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="title" value="<?=$advertisement->title?>">                                    </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <textarea required class="form-control col-md-7 col-xs-12" name="description"><?=$advertisement->description?></textarea>
                                            </div>
                                        </div>

                                        
                                        <!-- image preview -->
                                        <div class="form-group" >
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <img id="output_image" style="max-width:350px;" src="<?=base_url('uploads/advertisement_image/'.$advertisement->image.'')?>">
                                            </div>
                                        </div>
                                        <!-- image preview -->
                                         <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" class="form-control col-xs-12 hidden" name="image" id="image"     onchange="preview_image(event)" >
                                                 <label for="image"> <a class="btn btn-success col-xs-12"> Selcet Image</a> </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Link Url<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="url" value="<?=$advertisement->url?>">
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control col-xs-12" name="status">
                                                    <?php 
                                                            if ($advertisement->status==1) 
                                                            {
                                                               echo'<option value="1">active</option>';
                                                               echo'<option value="0">disable</option>';
                                                             }
                                                            else
                                                            {
                                                            echo'<option value="0">disable</option>';
                                                             echo'<option value="1">active</option>'; 
                                                            }
                                                    ?>
                                                  
                                                </select>
                                            </div>
                                        </div>


 							
                                
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


                    


                    


                    
                </div>
                <!-- /page content -->
				
				
		  
		   
 <script src="<?=base_url()?>assets/admin/js/niceedit/niceedit.js"></script>

        