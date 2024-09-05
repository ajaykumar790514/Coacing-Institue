<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Flash News</h1>
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
                                    <form role="form" action="<?=base_url()?>index.php/admin/add_flash_news" enctype="multipart/form-data" method="post">
                                        

                                        <div class="form-group">
                                            <label>News <span>*</span> </label>
                                            <input type="text" rows="2" class="form-control" name="news" required="">
                                            <p class="help-block"></p>  
                                        </div>

                                        <div class="form-group">
                                            <label>Link Url</label>
                                            <input type="text" rows="2" class="form-control" name="link_url">
                                            <p class="help-block"></p>  
                                        </div>

                                        <div class="form-group">
                                            <label>Link Title  </label>
                                            <input type="text" rows="2" class="form-control" name="link_title" maxlength="20">
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

    <div style="clear: both;"></div>

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