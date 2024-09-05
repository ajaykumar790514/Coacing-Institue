<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Study Package</h1>
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
                    Update Study Package..
                   <a style="float: right" class="btn btn-info btn-xs" href="<?=base_url()?>result_master/study_package_list">
                        <i class="fa fa-list"></i> LIST
                    </a>
                </div>
                <div class="panel-body">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                    <form class="col-md-6" action="<?=base_url()?>result_master/study_package_update/<?=$study_package->id?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label>Class</label><span style="color:red">* <small>(for class 12th pass use 13)</small></span>
                            <input class="form-control" type="number" name="class" required="" value="<?=$study_package->class?>">
                            <p class="help-block"></p>
                        </div>

                         <div class="form-group">
                            <label>Batch</label><span style="color:red">*</span>
                            <input class="form-control" name="batch" required="" value="<?=$study_package->batch?>">
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>Subject</label><span style="color:red">*</span>
                            <input class="form-control" name="subject" required="" value="<?=$study_package->subject?>">
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>Chapter Name</label><span style="color:red">*</span>
                            <input class="form-control" name="chapter_name" required="" value="<?=$study_package->chapter_name?>">
                            <p class="help-block"></p>
                        </div>

                       <!--  <div class="form-group">
                            <label>Test Date</label><span style="color:red">*</span>
                            <input type="date" class="form-control" name="test_date" required="" value="<?=$answer_key->test_date?>">
                            <p class="help-block"></p>
                        </div> -->

                         <div class="form-group">
                            <label>Select Pdf</label><span style="color:red">*</span>
                            <input type="file" class="form-control" name="file" accept="application/pdf" >
                            <p class="help-block"></p>
                        </div>

                         <div class="form-group">
                            <label>Order</label><span style="color:red">*</span>
                            <input type="number" class="form-control" name="pdf_order" required="" value="<?=$study_package->pdf_order?>">
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