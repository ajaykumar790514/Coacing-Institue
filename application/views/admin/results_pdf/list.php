<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Results Pdf List</h1>
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

            <a style="float: right" class="btn btn-warning btn-xs" href="<?=base_url()?>index.php/result_master/result_pdf_add"><i class="fa fa-plus"></i> Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Results Pdf here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Batch Name</th>
                                        <th style="width: 15%">Test Date</th>
                                        <th>Url</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($result_pdf as $row){ ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$row->class?></td>
                                        <td><?=$row->batch_name?></td>
                                        <td>
                                            <?php 
                                            if ($row->test_date!='') 
                                            {
                                               echo date('d-M-Y',strtotime($row->test_date));
                                            }
                                            
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?=base_url()?><?=$row->link?>" target="_blank">
                                                <?=$row->link?>
                                            </a>
                                        </td>
                                        <td><?=$row->pdf_order?></td>
                                        <td>
                                            <span id="active_status<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a href="<?=base_url()?>index.php/result_master/result_pdf_update/<?=$row->id?>" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?=base_url()?>index.php/result_master/result_pdf_delete/<?=$row->id?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure, you want to delete?')">
                                                <i class="fa fa-trash"></i>
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
            function product_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/product_detail/'+id);
            }

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/ActiveInactive/results_pdf/'+id+'/'+status);
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