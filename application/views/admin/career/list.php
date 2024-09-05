<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Application List</h1>
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

                                   <!--  <a class="btn btn-warning" style="float:right" href="<?=base_url()?>index.php/admin/add_achievement">Add <i class="fa fa-plus"></i></a> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>D.O.B</th>
                                        <th>City</th>
                                        <th>Mobile</th>
                                        <th style="width:100px;">Application Date (added)</th>
                                        <th>More</th>
                                    </tr>
                                </thead>
                                <tbody id="search_data">
                                    <?php $i=1; foreach($career as $row){ ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$row->name?></td>
                                        <td><?=$row->father?></td>
                                        <td><?=$row->dob?></td>
                                        <td><?=$row->city?></td>
                                        <td><?=$row->mob?></td>
                                        <td>
                                        <?php 
                                            echo date("d-M-Y", strtotime($row->added));
                                        ?> 
                                        </td>
                                        <td>
                                          

                                <a href="<?=base_url()?>index.php/admin/full_details/<?=$row->id?>" class="btn btn-info" title="Full Details">
                                <i class="fa fa-file"></i>
                                </a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
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
            function achievement_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/registration_detail/'+id);
            }


            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/active_inactive_achievement/'+id+'/'+status);
            }
            function search_sutdent(reg_no) 
            {
                 // alert(reg_no);
                $("#search_data").html('<strong style="color:red">Loading....</strong>');
                $("#search_data").load('<?=base_url()?>index.php/admin/search_sutdent/'+reg_no);
            }

            function generate_result(id) 
            {
              $("#result").html('<h3 style="color:red">Loading....</h3>');
              $("#result").load('<?=base_url()?>index.php/result_master/generate_result/'+id);
            }

            function del(id) 
            {
              $('#delete').load('<?=base_url()?>index.php/result_master/delete_reg_res/'+id);
            }
                                     
        </script>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width: 90%">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details..</h4>
        </div>
        <div class="modal-body" id="p_d">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
           <!--  <a href="<?=base_url()?>index.php/admin/edit_achievement/<?=$row->id?>" class="btn btn-warning" title="EDIT">
                                                <i class="fa fa-edit"></i>
                                            </a> -->
          <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="generate_result" role="dialog">
    <div class="modal-dialog modal-md" style="">
    
      <!-- Modal content-->
      <div class="modal-content" id="result">
        
      </div>
      
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="delete_reg_res" role="dialog">
    <div class="modal-dialog modal-sm" style="">
    
      <!-- Modal content-->
      <div class="modal-content" id="delete">
        
      </div>
      
    </div>
  </div>


