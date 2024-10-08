<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Slider</h1>
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

            <a style="float: right" class="btn btn-info" href="<?=base_url()?>index.php/admin/list_slides">LIST</a>
            <div class="row well">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="<?=base_url()?>index.php/admin/add_slide" method="post" enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label>Slide Title</label><span style="color:red">*</span>
                                            <input class="form-control" name="name" required="">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea id="markItUp" rows="8" class="form-control" name="description"></textarea>
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Image</label><span style="color:red">*</span>
                                            <input required type="file" class="form-control" name="userfile">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" class="form-control" name="link">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>View Order</label><span style="color:red">*</span>
                                            <input required="" type="number" class="form-control" name="slide_order">
                                            <p class="help-block"></p>
                                        </div>
                                        
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </div>
                                    </form>
                                </div>
            </div>
            <!-- /.row -->
            
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