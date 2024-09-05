<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Test</h1>
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


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Test
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="<?php echo base_url('index.php/test_master/add_test'); ?>" style="float:right;" class="btn btn-warning">
                            <i class="fa fa-plus"></i> Add </a>
                            <br><br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th style="width: 20%">Test Name</th>
                                        <th>Reg. Date</th>
                                        <th>Test Date</th>
                                        <th>Test Time</th>
                                        <th>Status</th>
                                        <th>Masks</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                               <?php $i=1; foreach($test->result() as $row){
                               
                                ?>
                                  <tr class="">
                                    <td><?=$i?></td>
                                    <td><?=$row->test_name?> <?=$row->session?></td>
                                    <td>
                                        <?php echo date("d-m-Y", strtotime($row->reg_date));?>
                                    </td>
                                    <td>
                                        <?php echo date("d-m-Y", strtotime($row->test_date));?>
                                    </td>
                                    <td><?php 
                                    if ($row->paper_1_time) 
                                    {
                                        $time=  explode("-",$row->paper_1_time);
                                        echo "I - ". date('h:i A',strtotime($time[0]))." - ";
                                        echo date('h:i A',strtotime($time[1]));
                                    }
                                 
                                    echo "<br>";
                                    if ($row->paper_2_time) 
                                    {
                                        $time2 = explode("-",$row->paper_2_time);
                                        echo "II- ". date('h:i A',strtotime($time2[0]))." - ";
                                        echo date('h:i A',strtotime($time2[1]));
                                    }
                                  
                                   // echo date("h:i:sa",$row->test_time)
                                    ?></td> 
                                    <!-- <td>
                                      <?=$row->total_marks_mat?>  
                                    </td>  --> 
                                    <td>
                                        <span id="active_status<?=$row->id?>">
                                        <?php if($row->status==1){?>
                                            <button class="btn btn-success" onclick="active_inactive(<?=$row->id?>,0)">Activated</button>
                                            <?php }else{ ?>
                                            <button class="btn btn-danger" onclick="active_inactive(<?=$row->id?>,1)">Not Activated</button>
                                            <?php } ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#Marks" class="btn btn-info btn-xs"  onclick="view_marks(<?=$row->id?>)"> View Marks</a>
                                    </td>
                                    
                                    <td><a class="btn btn-info btn-xs" href="<?=base_url()?>index.php/test_master/Update_test/<?=$row->id?>"><i class="fa fa-pencil"> Edit</i></a>&nbsp; <!-- <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-warning btn-xs" href="<?=base_url()?>index.php/test_master/delete_test/<?=$row->id?>"><i class="fa fa-trash"> Delete</i></a> --> </td>
                                  </tr>

                                    <?php
                  
                                     $i++; } ?>
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

        
        <!-- Modal -->
  <div class="modal fade" id="Marks" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Test Marks</h4>
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



  <script type="text/javascript">
            function view_marks(id)
            {

                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/test_master/view_marks/'+id);
            }

            function active_inactive(id,status)
            {
                // $.ajax({
                //     url: "<?=base_url()?>index.php/test_master/check_test_active/"+id,
                //     success: function(result)
                //     {
                //         if (result>'0') 
                //         {
                //             alert("Only one test can be active at one time. \nDeactive First, Activated Test."); 
                //         }
                //         else
                //         {
                           $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                            $("#active_status"+id).load('<?=base_url()?>index.php/test_master/active_inactive_test/'+id+'/'+status);
                            // location.reload();
                //         }                 
                //     }
                // });    
            }
        </script>
