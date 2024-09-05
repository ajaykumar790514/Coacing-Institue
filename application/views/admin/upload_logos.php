<style type="text/css">
    .img-md{
        max-width: 430px;
    }
</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Logo</h1>
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


            <div class="row well">
                <h5 style="color:red;"><strong>* Please Fill All Mendatory Fields</strong></h5><br>
                <div class="col-lg-6">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Website Logo</label>
                                            <input type="file" name="website_logo">
                                            <img class="img-md" src="<?=base_url()?>images/logo/<?=$logos->website_logo?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Admission Form</label>
                                            <input type="file" name="admission_form">
                                            <img class="img-md" src="<?=base_url()?>images/logo/<?=$logos->admission_form?>">
                                            <p class="help-block"></p>
                                        </div>

                                        <div class="form-group">
                                            <label>Hall Ticket</label>
                                            <input type="file" name="hall_ticket">
                                            <img class="img-md" src="<?=base_url()?>images/logo/<?=$logos->hall_ticket?>">
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

    <div style="clear: both;"></div>