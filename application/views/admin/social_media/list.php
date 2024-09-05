<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Products List</h1>
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

                                    <a style="float: right" class="btn btn-warning" href="<?=base_url()?>index.php/admin/add_social_media">Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage products here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Icon</th>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($social_media->result() as $row){ ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$row->name?></td>
                                        <td><?=$row->url?></td>
                                        <td>
                                            <i class="<?=$row->icon?>"></i></td>
                                        <td><?=$row->order?></td>
                                        <td>
                                            <?php
                                            $date=date_create($row->date);
                                            echo date_format($date,"Y/m/d G:ia"); ?></td>
                                        <td>
                                            <span id="active_status<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success" onclick="activate_inactive_social_m(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger" onclick="activate_inactive_social_m(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>
                                        
                                        <td>
                                            <a href="<?=base_url()?>index.php/admin/edit_social_media/<?=$row->id?>" class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?=base_url()?>index.php/admin/delete_social_media/<?=$row->id?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete?')">
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


            
            function activate_inactive_social_m(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/admin/activate_inactive_social_m/'+id+'/'+status);
            }
        </script>

