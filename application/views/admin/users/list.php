<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User List</h1>
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
            <a style="float: right" class="btn btn-warning btn-xs" href="<?=base_url()?>main_controller/add_user"><i class="fa fa-plus"></i> Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Users here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>UserType</th>
                                        <!-- <th>Image</th> -->
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($users as $row)
                                    {
                                        $user_type=$this->main_model->get_data_id('manage_role',$row->user_type);
                                           $usertype=$user_type->title;
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$row->name?></td>
                                        <td><?=$row->email?></td>
                                        <td><?=$row->username?></td>
                                        <td> 
                                            <?php if($row->id==2 and $usertype=="developer"){} 
                                            else { ?>
                                            <button class="btn btn-info btn-xs" onclick="view_pass('<?=$row->id?>')">View Password</button>
                                            <button class="btn btn-info btn-xs" onclick="change_pass('<?=$row->id?>')">Change Password</button>
                                            <?php } ?>
                                        </td>
                                        <td><?=$usertype?></td>
                                        <!-- <td><?=$row->image?></td> -->
                                        <td>
                                            <?php if($row->id==2 or $usertype=="developer"){} 
                                            else { ?>
                                            <span id="active_status<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($row->id==2 or $usertype=="developer"){} 
                                            else { ?>
                                            <a href="<?=base_url()?>main_controller/update_user/<?=$row->id?>" class="btn btn-warning btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?=base_url()?>main_controller/delete_user/<?=$row->id?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure, you want to delete?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <?php } ?>
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
        $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/admin/'+id+'/'+status);
    }
    function view_pass(id)
    {
        var password = prompt("Please enter your Password:");
        if (password!='') 
        {
            var SEND_DATA={id:id,password:password};
            $.ajax({
                type:'POST',
                url:'<?=base_url()?>main_controller/user_password',
                data:SEND_DATA,
                success:function(data)
                {
                    alert(data);
                }
            });  
        } 
    }

    function change_pass(id)
    {
        var txt;
        var password = prompt("Please enter your Password:");
        if (password!='') 
        {
            var user_password = prompt("Enter New Password:");
            if (user_password!='') 
            {
                var SEND_DATA={id:id,password:password,user_password:user_password};
                 $.ajax({
                 type: 'POST',
                 url:'<?=base_url()?>main_controller/change_user_password',
                 data:SEND_DATA,

                success:function(data)
                {
                    alert(data);
                }
            });
            }
        }
           
    }
</script>

 