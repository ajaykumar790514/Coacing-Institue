<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Test</h1>
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
                 <a href="<?php echo base_url('index.php/test_master/list_test'); ?>" style="float:right;" class="btn btn-warning">
                            <i class="fa fa-list"></i> List </a>
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/test_master/add_test_date" enctype="multipart/form-data" method="post">
                                        

                                        <div class="form-group">
                                            <label>Test<span style="color:red;">*</span></label>
                                            <select id="test_id" name="test_id" class="form-control" required onchange="set_date(this.value);">
                                                <option value="">--- Select Test---</option>
                                                <?php foreach ($test->result() as $row) {?>
                                                 <option value="<?=$row->id?>" ><?=$row->test_name?> ( <?php echo date("d-m-Y", strtotime($row->test_date));?> ) </option>   
                                               <?php  } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Date<span style="color:red;">*</span> </label>
                                            <input type="date" id="test_date" class="form-control" name="" required >
                                            <p class="help-block"></p>
                                        </div>


                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" id="submitbtn" class="btn btn-default" >Submit</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                </div>
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->

    <div style="clear: both;"></div>

 <script type="text/javascript">

 
    function set_date(test_id)
    {
        $.ajax({
            url:"<?=base_url()?>test_master/get_test_date/"+test_id,
            success:function(data)
            {
                // alert(data);
                $("#test_date").val(data);
            }
        });
    }



 function check_test(){ 
           var test_date = $("#test_date").val();  
            $.ajax({ 

                     url:"<?php echo base_url(); ?>index.php/test_master/check_test",  
                     method:"POST",  
                     data:{test_date:test_date}, 
                    success:function(data)  
                     { 
                      // alert(data);
                       
                        if(data.trim()=='1')
                        {
                          $("#aa").html('<span style="color:red;"> Test Already Added. </span>');
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




function count_total(clas) 
    {
        // alert(clas);
        let phy = $("#phy"+clas).val();
        let che = $("#che"+clas).val();
        let math = $("#math"+clas).val();
        var total = Number(phy)+Number(che)+Number(math);
        // alert(total);
        $("#total"+clas).val(total);
    }    

</script>