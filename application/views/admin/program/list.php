<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">programs List</h1>
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

                                    <a class="btn btn-warning" style="float:right" href="<?=base_url()?>index.php/admin/add_program">Add <i class="fa fa-plus"></i></a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Updates here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Link Url</th>
                                        <th>Image</th>
                                        <!-- <th>Description</th> -->
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>View More</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($programs->result() as $row){ ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$row->title?></td>
                                        <td><?=$row->url?></td>
                                        <td><img style="width: 100px" src="<?=base_url()?>images/program/<?=$row->image?>"></td>
                                        <!-- <td><?=$product->description?></td> -->
                                        <td>
                                            <span id="active_status<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a href="<?=base_url()?>index.php/admin/edit_program/<?=$row->id?>" class="btn btn-warning" title="EDIT">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <!-- <a href="<?=base_url()?>index.php/admin/delete_product/<?=$product->id?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete?')">
                                                <i class="fa fa-trash"></i>
                                            </a> -->
                                                                                       
                                        </td>
                                        <td>
                                             <button class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="programs_page_detail(<?=$row->id?>)"><i class="fa fa-info"></i></button>
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
            function programs_page_detail(id)
            {
                $("#p_d").html('<h3 style="color:red">Loading....</h3>');
                $("#p_d").load('<?=base_url()?>index.php/admin/program_detail/'+id);
            }

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/active_inactive_program/'+id+'/'+status);
            }
        </script>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">programs Page Details..</h4>
        </div>
        <div class="modal-body" id="p_d">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
            <a href="<?=base_url()?>index.php/admin/edit_program/<?=$row->id?>" class="btn btn-warning" title="EDIT" style=''>
              <i class="fa fa-edit"></i>
            </a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>