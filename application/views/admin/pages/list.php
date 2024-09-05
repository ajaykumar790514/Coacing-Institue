<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pages List</h1>
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

            <a style="float: right" class="btn btn-warning" href="<?=base_url()?>index.php/admin/add_page">Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Pages here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Page Name</th>
                                        <th>Parent Page</th>
                                        <th>Description</th>
                                        <th>Tab</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($pages as $product){ ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$product->name?></td>
                                        <td><?=$product->parent_name?></td>
                                        <td><?=$product->description?></td>
                                        <td>
                                            <?php if($product->target_tab=='_blank')
                                                    {
                                                        echo "New Tab";
                                                    } 
                                                    else
                                                    {
                                                        echo "Current Tab";
                                                    }
                                            ?>
                                        </td>
                                        <td>
                                            <span id="active_status<?=$product->id?>">
                                            <?php if($product->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$product->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$product->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a href="<?=base_url()?>index.php/admin/edit_page/<?=$product->id?>" class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="<?=base_url()?>Pages/<?=$product->url?>/<?=$product->id?>" class="btn btn-primary" target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <!-- <a href="<?=base_url()?>index.php/admin/delete_product/<?=$product->id?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete?')">
                                                <i class="fa fa-trash"></i>
                                            </a> -->
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
           

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/ActiveInactive/pages/'+id+'/'+status);
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