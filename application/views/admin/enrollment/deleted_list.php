<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Enrollment List</h1>
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
            <br>
            <a style="float: right;margin-left:9px;" class="btn btn-warning btn-xs" href="<?=base_url()?>enrollment/trash"><i class="fa fa-trash"></i></a>
            <a style="float: right" class="btn btn-warning btn-xs" href="<?=base_url()?>main_controller/add_role"><i class="fa fa-plus"></i> Add</a>

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
                                        <th>Machine Id</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                        <td>
                                            <b style='color:blue;'>Program</b><br>
                                              <?=$stu_program?>
                                            <br>
                                            <b style='color:blue;'>Batch</b><br>
                                              <?=$stu_batch?>
                                      
                                             
                                        </td>
                                       
                                        <td><?=$row->enrollment_no?></td>
                                        <td><?=$row->name?></td>
                                        <td>
                                            <?php
                                            $check=$this->db->get_where('stu_fees',array('stu_id'=>$row->stu_id))->result();
                                            // echo count($check);
                                            if(count($check)==0) {
                                                if ($row->stu_program==0 or $row->stu_batch==0) {
                                                   echo' <a href="javascript:void(0)" onclick="alert_batch_not_assign()" class="btn btn-warning btn-xs" > Fees </a>';
                                                }
                                                else {
                                                ?>

                                            <a href="<?=base_url()?>enrollment/fees/<?=$row->stu_id?>" target="_blank" class="btn btn-warning btn-xs disabled" disabled > Fees </a>
                                        <?php
                                                }        
                                            } 
                                        else{
                                            ?>
                                             <a href="<?=base_url()?>enrollment/view_fees/<?=$row->stu_id?>" target="_blank" class="btn btn-primary btn-xs" > View Fees </a>
                                            <?php
                                        } ?>
                                        </td>
                                        <td>
                                            <?=$row->stu_mac_id?>
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                           <a href="<?=base_url()?>enrollment/restore_student/<?=$row->stu_id?>" class="btn btn-danger btn-xs" onclick="return (confirm('Are you sure, you want to restore? \nNow you Can See it In Enrollment list.')) "><i class="fa fa-undo"></i> Restore</a> 
                                        </td>
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

        <script type="text/javascript">
            function category_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/category_detail/'+id);
            }

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/manage_role/'+id+'/'+status);
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