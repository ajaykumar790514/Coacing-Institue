
<script  type="text/javascript">
$(document).ready(function() {
    var validator = $("#user_form").validate({
        rules: {
            name:{
                required:true
                },
               
            email: {
                required: true,
                email: true,
                remote:"<?=base_url()?>index.php/main_controller/check_email"
                
            }
            
            },
            
            messages:{
                name:{
                    required:'required'
                },

                email:{
                    required:'required',
                    remote:'This email is Already Registered for Another Shop.'
                }
             
            
            },
});
});
</script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update User</h1>
        </div>
    </div>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update User..
                   <a style="float: right" class="btn btn-info btn-xs" href="<?=base_url()?>main_controller/list_users">
                        <i class="fa fa-list"></i> LIST
                    </a>
                </div>
                <div class="panel-body">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                    <form class="col-md-6" id="user_form" action="<?=base_url()?>main_controller/update_user/<?=$user_data->id?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" id="name" value="<?=$user_data->name?>" >
                            <p class="help-block" ></p>
                        </div>

                        <div class="form-group">
                            <label>Email</label><span style="color:red">*</span>
                            <input type="email" class="form-control" name="Email" id="email" value="<?=$user_data->email?>">
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>User Name</label><span style="color:red">*</span>
                            <input class="form-control" name="username" id="username" required="" value="<?=$user_data->username?>">
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>Select User Role</label><span style="color:red">*</span>
                            <select class="form-control" name="user_type" id="user_type" required="">
                                <option>-- Select --</option>
                                <?php foreach ($roles as $row){

                                    if($row->id==1){} 
                                    else{
                                        $select='';
                                        if ($row->id==$user_data->user_type) 
                                        {
                                           $select="selected";
                                        }

                                        echo "<option value='".$row->id."' ".$select.">";
                                        echo $row->title;
                                        echo "</option>";
                                        }
                                } ?>
                            </select>
                            <p class="help-block"></p>
                        </div>



                        

                       

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                            <button type="submit" class="btn btn-success btn-xs">Submit</button>
                            <button type="reset" class="btn btn-danger btn-xs">Reset </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /#page-wrapper -->

    <script type="text/javascript">
 $(document).ready(function() {
         var o = {
                buttonList: ['save','bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','image','link','unlink','forecolor','bgcolor', 'xhtml'],
                iconsPath:('http://js.nicedit.com/nicEditIcons-latest.gif')
            };
        new nicEditor({fullPanel : true}).panelInstance('markItUp');

     });
 
 </script>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
 <script src="<?=base_url()?>themes/admin_panel/js/niceedit/niceedit.js"></script>