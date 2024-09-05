<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Menu</h1>
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
                    Update Menu..
                   <a style="float: right" class="btn btn-info btn-xs" href="<?=base_url()?>main_controller/list_menu">
                        <i class="fa fa-list"></i> LIST
                    </a>
                </div>
                <div class="panel-body">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                    <form class="col-md-6" action="<?=base_url()?>main_controller/update_menu/<?=$menu_data->id?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label>Title</label><span style="color:red">*</span>
                            <input class="form-control" name="title" required="" value="<?=$menu_data->title?>">
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>Url</label>
                            <input class="form-control" name="url" value="<?=$menu_data->url?>">
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>Select Parent Menu</label>
                            <select class="form-control" name="parent" required="">
                                <option value="0">-- Select --</option>
                                <?php foreach($parent_menu as $row) 
                                {
                                    $select='';
                                    if ($row->id==$menu_data->parent) {
                                        $select="selected";
                                    }
                                    echo "<option value='".$row->id."' ".$select.">";
                                    echo $row->title;
                                    echo "</option>";
                                }  ?>
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

  
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
