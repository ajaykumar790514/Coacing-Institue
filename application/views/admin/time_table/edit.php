<?php

?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Time Table</h1>
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
                
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/admin/time_table" method="post" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            
                                            
                                            <select onchange="change_time_table_order(1,this.value)">
                                                <?php
                                                if ($time_table[0]->order==1) 
                                                {
                                                    echo'<option value="1">This week</option>';
                                                    echo'<option value="2">Next week</option>';
                                                }
                                                else
                                                 {
                                                    echo'<option value="2">Next week</option>';
                                                    echo'<option value="1">This week</option>';
                                                 }

                                                ?>
                                            </select>
                                            <a href="<?=base_url()?>uploads/<?=$time_table[0]->file_url;?>" target="_blank">Open Pdf</a> 
                                            <span id="active_status1">
                                            <?php if($time_table[0]->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(1,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(1,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <input class="form-control" name="file1" accept="application/pdf" type="file">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            
                                            
                                            <select onchange="change_time_table_order(2,this.value)">
                                               <?php
                                                if ($time_table[1]->order==1) 
                                                {
                                                    echo'<option value="1">This week</option>';
                                                    echo'<option value="2">Next week</option>';
                                                }
                                                else
                                                 {
                                                    echo'<option value="2">Next week</option>';
                                                    echo'<option value="1">This week</option>';
                                                 }

                                                ?>
                                            </select>
                                            <a href="<?=base_url()?>uploads/<?=$time_table[1]->file_url;?>" target="_blank">Open Pdf</a> 
                                            <span id="active_status2">
                                            <?php if($time_table[1]->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(2,0)">Activated </button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(2,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <input class="form-control" name="file2" accept="application/pdf" type="file">
                                            <p class="help-block"></p>
                                        </div>

                                       
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </form>
                                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

<script type="text/javascript">
    function change_time_table_order(id,value)
    {
        
        $.ajax({
          type: 'POST',
          url: '<?=base_url()?>admin/time_table_order/'+id+'/'+value,
        
          //or your custom data either as object {foo: "bar", ...} or foo=bar&...
          success: function(response) 
          {
            // window.reload();
            window.location.reload();
          },
        });

    }

     function activate_inactive(id,status)
    {
        $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
        $("#active_status"+id).load('<?=base_url()?>index.php/main_controller/ActiveInactive/time_table/'+id+'/'+status);
    }
</script>