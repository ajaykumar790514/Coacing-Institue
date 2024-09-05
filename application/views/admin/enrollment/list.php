<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Enrollment List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Class:</label>
                        <select name="class" id="class" class="form-control class" >
                            <option value="">--select--</option>
                            <?php foreach($class as $c):?>
                             <option value="<?=$c->class;?>"><?=$c->class;?></option>
                            <?php endforeach;?>    
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Program:</label>
                        <select name="program" id="program" class="form-control program" >
                            <option value="">--select--</option>  
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Select Batch:</label>
                        <select name="batch" id="batch" class="form-control batch" >
                            <option value="">--select--</option>   
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Search:</label>
                        <input type="text" class="form-control" name="search" id="search">
                    </div>
                </div>
            </div>

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
            <br>
            <!-- <a style="float: right;margin-left:9px;" class="btn btn-warning btn-xs" href="<?=base_url()?>enrollment/trash"><i class="fa fa-trash"></i></a> -->
            <a style="float: right" target="_blank" class="btn btn-warning btn-xs" href="<?=base_url()?>enrollment/new_enrollment"><i class="fa fa-plus"></i> Add</a>

            <div class="row">
                <div id="batch2"></div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Enrollment here
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Program & Batch</th>
                                        <!-- <th>Batch</th> -->
                                        <th>Enroll. No.</th>
                                        <th>Student Name</th>
                                        <th>Fees</th>
                                        <th>Mobile No</th>
                                        <!-- <th>Machine Id</th> -->
                                        <th>Status</th>
                                        <?php if($this->session->userdata('role_id')==1){?><th>Action</th><?php }?>
                                    </tr>
                                </thead>
                                <tbody id="table_data">
                                    <?php $n=1; foreach($students as $row){
                                        $stu_program="";
                                        $stu_batch="";
                                        foreach ($programs as $pro) {
                                            if ($row->stu_program==$pro->id) {
                                                $stu_program=$pro->program;
                                            }
                                        }

                                        foreach ($batch as $bat) {
                                            if ($row->stu_batch==$bat->id) {
                                                $stu_batch=$bat->batch;
                                            }
                                        }
                                       
                                     ?>

                                    <tr class="">
                                        <td><?=$n?></td>
                                        <td>
                                            <?=$row->stu_class?>
                                        <input type="hidden" id="stu_class<?=$row->stu_id?>" value="<?=$row->stu_class?>">        
                                        </td>
                                        <td class="exist-data_<?=$row->stu_id;?>">
                                            <b style='color:blue;'>Program</b><br>
                                              <?=$stu_program?>
                                            <br>
                                            <?php
                                            if ($row->stu_batch==0) {
                                                
                                                // Batch
                                                    echo'<label>Batch</label>';
                                                    echo "<select class='form-control input-sm' id='batch".$row->stu_id."'  >";
                                                    echo "<option value=''> --- Select Batch ---</option>";
                                                    foreach ($batch as $btch) {
                                                        if ($row->stu_program==$btch->program_id) {
                                                           echo "<option value='".$btch->id."'>";
                                                           echo $btch->batch;
                                                           echo "</option>";
                                                        }
                                                       echo "string";
                                                    }
                                                    echo "</select>";
                                                // Batch 
                                                echo'<br>
                                                  <button class="btn btn-primary btn-xs" onclick="assign_batch('.$row->stu_id.')">Assign Batch</button> ';
                                            }
                                            else{

                                               
                                              
                                              echo "<b style='color:blue;'>Batch</b><br>";
                                              echo $stu_batch;  
                                            }
                                            if($this->session->userdata('role_id')==1){?>  
                                            <a  href="#" onclick="updatebatch('<?=$row->stu_id;?>')" class="btn btn-danger btn-xs" ><i class="fa fa-edit"></i></a> 
                                             <?php }?>
                                        </td>
                                        <td class="update-data_<?=$row->stu_id;?>" style="display:none">
                                        <b style='color:blue;'>Program</b><br>
                                              <?=$stu_program?>
                                            <br>
                                         <?php
                                              echo'<label>Batch</label>';
                                               echo "<select class='form-control input-sm' id='updatebatch".$row->stu_id."'  >";
                                               echo "<option value=''> --- Select Batch ---</option>";
                                               foreach ($batch as $btch) {
                                                $selected = '';
                                                   if ($row->stu_program==$btch->program_id) {
                                                     if($btch->id==$row->stu_batch)
                                                     {
                                                        $selected = 'selected';
                                                     }
                                                      echo "<option value='".$btch->id."' ".$selected.">";
                                                      echo $btch->batch;
                                                      echo "</option>";
                                                   }
                                                  echo "string";
                                               }
                                               echo "</select>";
                                           // Batch 
                                           echo'<br>
                                             <button class="btn btn-primary btn-xs" onclick="update_batch('.$row->stu_id.')">Update Batch</button> ';
                                            ?>
                                        </td>
                                       
                                        <td><?=$row->enrollment_no?></td>
                                        <td><?=$row->name?>
                                        s\o  ( 
                                            <?php
                                        // Serialized string
                                        $serialized_string = $row->father;
                                        $data = unserialize($serialized_string);
                                        if (isset($data['name'])) {
                                            echo $data['name'];
                                        } else {
                                            echo "Name not found.";
                                        }
                                        ?>

                                        )</td>
                                        <td>
                                            <?php
                                            if($this->session->userdata('role_id')==1){
                                            $check=$this->db->get_where('stu_fees',array('stu_id'=>$row->stu_id))->result();
                                            // echo count($check);
                                            if(count($check)==0) {
                                                // if ($row->stu_program==0 or $row->stu_batch==0) {
                                                //    echo' <a href="javascript:void(0)" onclick="alert_batch_not_assign()" class="btn btn-warning btn-xs" > Fees </a>';
                                                // }
                                                // else {


                                                ?>

                                            <a href="<?=base_url()?>enrollment/fees/<?=$row->stu_id?>" target="_blank" class="btn btn-warning btn-xs" > Fees </a>
                                        <?php
                                                // }        
                                            } 
                                        else{
                                            ?>
                                             <a href="<?=base_url()?>enrollment/view_fees/<?=$row->stu_id?>" target="_blank" class="btn btn-primary btn-xs" > View Fees </a>
                                            <?php
                                        } }else{?>
                                            <?php $check=$this->db->get_where('stu_fees',array('stu_id'=>$row->stu_id))->result();
                                            if(count($check)==0) {?>

                                            <a href="<?=base_url()?>enrollment/reception_fees/<?=$row->stu_id?>" target="_blank" class="btn btn-warning btn-xs" > Fees </a>
                                        <?php        
                                            } 
                                        else{
                                            ?>
                                             <a href="<?=base_url()?>enrollment/reception_view_fees/<?=$row->stu_id?>" target="_blank" class="btn btn-primary btn-xs" > View Fees </a>
                                            <?php
                                        }
                                        }?>
                                        </td>
                                        <td>
                                            <?=$row->mobile_no?>  ,<br> <?=$row->mobile_no2?>
                                        </td>
                                        <!-- <td>
                                            <span id="update_msg<?=$row->stu_id?>"></span>
                                            <input type="text" class="form-control input-sm" id="machine_id<?=$row->stu_id?>" value="<?=$row->stu_mac_id?>" oninput="update_mac_id('<?=$row->stu_id?>')"  >
                                        </td> -->
                                        <td>
                                            <span id="active_status<?=$row->stu_id?>" class="V_data">
                                            <?php if($row->is_active==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->stu_id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->stu_id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>
                                      <?php if($this->session->userdata('role_id')==1){?>
                                        <td>
                                        <a target="_blank" href="<?=base_url()?>enrollment/edit_student/<?=$row->stu_id?>" class="btn btn-warning btn-xs" ><i class="fa fa-edit"></i></a> 
                                           <a href="<?=base_url()?>enrollment/delete_student/<?=$row->stu_id?>" class="btn btn-danger btn-xs" onclick="return (confirm('Are you sure, you want to delete? \nRestore student any time from trash.')) "><i class="fa fa-trash"></i></a> 
                                        </td>
                                        <?php }?>
                                    </tr>
                                    <?php $n++; } ?>
                                </tbody>
                            </table>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
        </div>
        <!-- /#page-wrapper -->
<script>
    function updatebatch(id)
    {
        $('.update-data_'+id).show();
        $('.exist-data_'+id).hide();
    }
    $(document).ready(function(){
        
        $('#class').change(function(){
            var class_id = $(this).val();
            $.ajax({
                url: '<?php echo base_url("Enrollment/get_programs"); ?>',
                type: 'post',
                data: {class_id: class_id},
                dataType: 'json',
                success: function(response){
                    $('#program').html(response);
                    loadTableData();
                }
            });
        });

        $('#program').change(function(){
            var program_id = $(this).val();
            var class_id = $('#class').val();
            $.ajax({
                url: '<?php echo base_url("Enrollment/get_batches"); ?>',
                type: 'post',
                data: {program_id: program_id,class_id:class_id},
                dataType: 'json',
                success: function(response){
                    $('#batch').html(response);
                    loadTableData();
                }
            });
        });

        $('#batch').change(function(){
            loadTableData();
        });

        $('#search').keyup(function(){
            loadTableData();
        });

        function loadTableData() {
            var batch = $('#batch').val();
            var classs = $('#class').val();
            var program = $('#program').val();
            var search = $('#search').val();
            $.ajax({
                url: '<?php echo base_url("Enrollment/load_table_data"); ?>',
                type: 'post',
                data: {batch: batch, search: search,program:program,class:classs},
                success: function(response){
                    $('#table_data').html(response);
                }
            });
        }
    });
</script>

        <script type="text/javascript">
            function category_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/category_detail/'+id);
            }

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactiveNew/stu_info/'+id+'/'+status);
            }

            function update_mac_id(id)
            {
                // alert(id);return;
                $("#update_msg"+id).show();
                var machine_id = $('#machine_id'+id).val();
                $("#update_msg"+id).html('Loading....');
                $("#update_msg"+id).load('<?=base_url()?>enrollment/update_mac_id/'+id+'/'+machine_id);
                $("#update_msg"+id).delay(1000).fadeOut(1500); 
            }

            function load_batch(id)
            {
                var CLASS = $('#stu_class'+id).val();
                var program_id = $('#program'+id).val();
                $('#batch'+id).html('<option value="" >Loading.....</option>');
                $('#batch'+id).load('<?=base_url()?>enrollment/get_batch/'+CLASS+'/'+program_id);
            }

            function assign_batch(id) {
                var batch = $('#batch'+id).val();
                if (batch.length==0) {  $('#batch'+id).focus(); return; }
                $.post("<?=base_url()?>enrollment/assign_batch", 
                { 
                    stu_id:id,
                    stu_batch:batch
                },
                function(response,status){ 
                    if (response==1) {
                        reload_table();
                    }
                    else{
                        alert(response);
                    }
                });
                // alert(program);
            }

            function update_batch(id) {
                var batch = $('#updatebatch'+id).val();
                if (batch.length==0) {  $('#updatebatch'+id).focus(); return; }
                $.post("<?=base_url()?>enrollment/update_batch", 
                { 
                    stu_id:id,
                    stu_batch:batch
                },
                function(response,status){ 
                    if (response==1) {
                        reload_table();
                    }
                    else{
                        alert(response);
                    }
                });
                // alert(program);
            }
            

            function reload_table()
            {
                $('#table_data').load('<?=base_url()?>enrollment/reload_enrollment_table');
            }

            function alert_batch_not_assign() {
                alert('Assign Batch First !');
            }
        </script>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Category Details..</h4>
        </div>
        <div class="modal-body" id="p_d">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  