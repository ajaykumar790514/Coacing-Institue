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
                                    <h2>Change Password<small>change here..</small></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?=base_url()?>index.php/admin/change_password" method="POST" enctype="multipart/form-data" role="form" class="form-horizontal form-label-left">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Current password<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="current_pass" id="current_pass">  
                                            </div>
                                        </div>
                                        <!-- ////**** password match or not match message -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div id="aa"></div> 
                                            </div>
                                        </div>
                                        <!-- ////**** password match or not match message -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">New Password<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12" id="new_pass" >
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="new_pass"  readonly>                                    </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Confirm password<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12" id="conf_pass">
                                                <input type="text" required class="form-control col-md-7 col-xs-12" name="conf_pass" readonly>                                    </div>
                                        </div>
                                        <div id="match_message"></div>
                            <div class="clearfix"></div>
                             <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" id="submit_btn">
                                                
                                                <input type="submit" class="btn btn-success " value="Submit" disabled>
                                            </div>
                                        </div>
                                        
                                        

                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
 </section><!-- #contact -->
    
<script type="text/javascript">
$(document).ready(function(){ 
    $(document).on('change', '#current_pass', function(){  
           var pass = $("#current_pass").val();  
            $.ajax({ 

                     url:"<?php echo base_url(); ?>index.php/admin/check_password",  
                     method:"POST",  
                     data:{pass:pass}, 
                    
                     success:function(data)  
                     { 

                        if(data==='match')
                        {
                        $("#new_pass").html('<input type="password" required class="form-control col-md-7 col-xs-12" id="password" name="new_pass" onkeyup="check();" >');
                         $("#conf_pass").html('<input type="password" required class="form-control col-md-7 col-xs-12" id="conf_pass" name="conf_pass" onkeyup="check();" >');
                          $("#aa").html('<span style="color:green;">password match</span>');
                        }
                        else
                        {
                            $("#current_pass").val(''); 
                            $("#aa").html('<span style="color:red;">password not match</span>');
                        }
                        
                     }  
                });
                
    
      });    
           

 });  
</script> 
 <script type="text/javascript">
    var check = function() {
  if (document.getElementById('new_pass').value ==
    document.getElementById('conf_pass').value) {
    document.getElementById('match_message').style.color = 'green';
    document.getElementById('match_message').innerHTML = 'matching';
    document.getElementById('submit_btn').innerHTML = '<input type="submit" class="btn btn-success " value="Submit">';

    

  } else {
    document.getElementById('match_message').style.color = 'red';
    document.getElementById('match_message').innerHTML = 'not matching';
  }
}
  </script>
              
  </div>
                <!-- /page content -->
                
                
          
           
 <script src="<?=base_url()?>assets/admin/js/niceedit/niceedit.js"></script>

