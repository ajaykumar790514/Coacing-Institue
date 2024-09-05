<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Role</h1>
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
                    Add Role..
                   <a style="float: right" class="btn btn-info btn-xs" href="<?=base_url()?>main_controller/list_role">
                        <i class="fa fa-list"></i> LIST
                    </a>
                </div>
                <div class="panel-body">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                    <form class="col-md-6" action="<?=base_url()?>main_controller/add_role" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label>Title</label><span style="color:red">*</span>
                            <input class="form-control" name="title" required="">
                            <p class="help-block"></p>
                        </div>
<style type="text/css">
    .checkmark 
    {
        background-color: red;
        cursor: pointer;
        width: 17px;
        height: 17px;
    }
    .pointer
    {
        cursor: pointer;
    }
</style>
                        <div class="form-group" >
                            <label><h4>Select  Menu</h4></label>
                            <table class="table">
                                <tbody>
                                                 
                            <?php
                            echo "<br>";
                            foreach ($parent_menu as $row) {
                            if($row->id==1 ){} 
                            else{ ?>
                                <tr>
                                    <td><label for="fun<?=$row->id?>" class="pointer"><?=$row->title?></label></td>      
                                    <td>
                                        <input type='checkbox' name='fun[]' id="fun<?=$row->id?>" value='<?=$row->id?>'  class="checkmark">
                                    </td>      
                                </tr>
                          <?php  } } ?>
                                 </tbody>
                            </table>
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