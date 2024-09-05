<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Study Package List</h1>
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

            <a style="float: right" class="btn btn-warning btn-xs" href="<?=base_url()?>index.php/result_master/study_package_add"><i class="fa fa-plus"></i> Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Study Package here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Batch</th>
                                        <th>Subject</th>
                                        <th>Chapter</th>
                                        <th>file</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($study_package as $row){
                                    $class=$row->class.'<sup>th</sup>';
                                    if ($row->class==13) {
                                        $class='12<sup>th</sup> Pass';
                                    } ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$class?></td>
                                        <td><?=$row->batch?></td>
                                        <td><?=$row->subject?></td>
                                        <td><?=$row->chapter_name?></td>
                                        
                                        <td>
                                            <a href="<?=base_url()?><?=$row->file?>" target="_blank">
                                                <i class="fa fa-eye"></i>
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
                                            <a href="<?=base_url()?>result_master/study_package_update/<?=$row->id?>" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?=base_url()?>result_master/study_package_delete/<?=$row->id?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure, you want to delete?')">
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
           

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>index.php/result_master/ActiveInactive/study_package/'+id+'/'+status);
            }
        </script>
