<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Category List</h1>
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

                                    <a style="float: right" class="btn btn-warning" href="<?=base_url()?>index.php/admin/add_category">Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage product Categories here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Category Name</th>
                                        <th>Parent</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>View More</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($categories as $product){ ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$product->name?></td>
                                        <td><?=$product->parent?></td>
                                        <td><img style="width: 100px" src="<?=base_url()?>images/category/<?=$product->img?>"?></td>
                                        <td>
                                            <span id="active_status<?=$product->id?>">
                                            <?php if($product->status==1){?>

                                                <button class="btn btn-success" onclick="activate_inactive(<?=$product->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger" onclick="activate_inactive(<?=$product->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>
                                        <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="category_detail(<?=$product->id?>)"><i class="fa fa-search-plus"></i></button></td>
                                        <td>
                                            <a href="<?=base_url()?>index.php/admin/edit_category/<?=$product->id?>" class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?=base_url()?>index.php/admin/delete_category/<?=$product->id?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete?')">
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
            function category_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/category_detail/'+id);
            }

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/active_inactive_category/'+id+'/'+status);
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