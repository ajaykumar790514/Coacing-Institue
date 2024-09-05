<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit head</h1>
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
                                    <form role="form" action="<?=base_url()?>index.php/admin/edit_head/<?=$head->id?>" method="post">
                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="head_name" value="<?=$head->head_name?>" >
                                            <p class="help-block"></p>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label>Select a Step</label>
                                            <select class="form-control" name="step_id">
                                                <option value="">--Select--</option>
                                                    <?php foreach($steps->result() as $step){ ?>
                                                        <option <?php if($step->id == $head->step_id){echo "selected";} ?> value="<?=$step->id?>"><?=$step->step_name?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Input Type </label>
                                            <select class="form-control" name="step_id" required="" name="input_type">
                                                    <option <?php if($head->input_type==1){echo "selected";} ?> value="1">Optional</option>
                                                    <option <?php if($head->input_type==2){echo "selected";} ?> value="2">Single Select</option>
                                                    <option <?php if($head->input_type==3){echo "selected";} ?> value="3">Multi Select</option>
                                            </select>
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

    <div style="clear: both;"></div><script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
  var area1, area2;
 
  function toggleArea1() {
        if(!area1) {
                area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
                //$("#ext").hide();
        } else {
                area1.removeInstance('myArea1');
                area1 = null;
        }
  }
 
  function addArea2() {
        area2 = new nicEditor({fullPanel : true}).panelInstance('myArea2');
  }
  function removeArea2() {
        //area2.removeInstance('myArea2');
        area1.removeInstance('markItUp');
        $("#ext").show();
  }

  function enableEditor()
  {
    area1 = new nicEditor({fullPanel : true}).panelInstance('markItUp',{hasPanel : true});
  }
 
  bkLib.onDomLoaded(function() { toggleArea1(); });
  //]]>
  </script>
