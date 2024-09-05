<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Achievement Type List</h1>
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
                            Manage achievement type here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="<?php echo base_url('index.php/admin/add_achievement_type'); ?>" style="float:right;" class="btn btn-warning">
                            <i class="fa fa-plus"></i> Add </a>
                            <br><br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <!-- <th>Description</th> -->
                                        <th>Status</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                               <?php $i=1; foreach($achiev_type->result() as $row){ ?>
                                  <tr class="">
                                    <td><?=$i?></td>
                                    <td><?=$row->title?></td>
                                    <!-- <td><?=$row->desc?></td> -->
                                    <td>
                                        <span id="active_status<?=$row->id?>">
                                        <?php if($row->status==1){?>
                                            <button class="btn btn-success" onclick="active_inactive_achiev_type(<?=$row->id?>,0)">Activated</button>
                                            <?php }else{ ?>
                                            <button class="btn btn-danger" onclick="active_inactive_achiev_type(<?=$row->id?>,1)">Deactivated</button>
                                            <?php } ?>
                                        </span>
                                    </td>
                                    
                                    <td><a class="btn btn-info btn-xs" href="<?=base_url()?>index.php/admin/edit_achievement_type/<?=$row->id?>"><i class="fa fa-pencil"> Edit</i></a>&nbsp; <!-- <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-warning btn-xs" href="<?=base_url()?>index.php/admin/delete_achievement_type/<?=$row->id?>"><i class="fa fa-trash"> Delete</i></a> --> </td>
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
            function product_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/product_detail/'+id);
            }

            function active_inactive_achiev_type(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/active_inactive_achievement_types/'+id+'/'+status);
            }
        </script>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Details..</h4>
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