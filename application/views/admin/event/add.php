<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Event</h1>
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
  <style type="text/css">
          .add-btn {float: right}
          .panel-heading { padding-bottom: 15px; }
  </style>
  <a class="btn btn-warning btn-xs add-btn float-right" href="/admin/list_event"><i class="fa fa-list"></i> List</a>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            Add Event
        </div>
        <div class="panel-body">
            <form role="form" action="<?=base_url()?>admin/add_event" method="post" enctype='multipart/form-data' class="col-md-6">
                <h5 style="color:red;">
                    <strong>* Please Fill All Mendatory Fields</strong>
                </h5><br>
                <div class="form-group">
                    <label>Event Name</label><span style="color:red">*</span>
                    <input class="form-control" name="name" required="">
                    <p class="help-block"></p>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea id="markItUp" rows="8" class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input  type="file" class="form-control" name="userfile"><hr>
                    <p class="help-block"></p>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </div>
            </form>

        </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
<!-- /.row -->
</div>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
 
 <div style="clear: both;"></div><script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { 
        new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
    });
</script>







