<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Achievement Type</h1>
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
                 <a href="<?php echo base_url('index.php/admin/list_achievement_types'); ?>" style="float:right;" class="btn btn-warning">
                            <i class="fa fa-list"></i> List </a>
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/admin/add_achievement_type" enctype="multipart/form-data" method="post">
                                        

                                        <div class="form-group">
                                            <label>Title<span style="color:red;">*</span>
                                            <p id="aa"></p> </label>
                                            <input type="text" id="title" class="form-control" name="title" required onkeyup="check_achiev_type()">
                                            <p class="help-block"></p>
                                        </div>
<script type="text/javascript">
function check_achiev_type(){ 
           var title = $("#title").val();  
            $.ajax({ 

                     url:"<?php echo base_url(); ?>index.php/admin/check_achiev_type",  
                     method:"POST",  
                     data:{title:title}, 
                    success:function(data)  
                     { 
                       
                        if(data.trim()=='1')
                        {
                          $("#aa").html('<span style="color:red;">This Category is already added </span>');
                          $("#submitbtn").addClass("disabled");
                        }
                        else
                        {
                           $("#aa").html('<span style="color:;"></span>');
                            $("#submitbtn").removeClass("disabled");
                        }
                        
                     }  
                });
      };    
 
</script>
                                       <!--  <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control" name="desc">
                                            <p class="help-block"></p>
                                        </div> -->
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" id="submitbtn" class="btn btn-default disabled" >Submit</button>
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