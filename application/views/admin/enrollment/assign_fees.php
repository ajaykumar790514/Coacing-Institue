<script type="text/javascript">
   


hide_show_submit_btn();

function hide_show_submit_btn()
{
    var rowCount = $('#dataTables-example tr').length;
    // alert(rowCount);    
    if (rowCount==1 || rowCount==0) { $('#submit').addClass('disabled'); }
    else { $('#submit').removeClass('disabled');}
    
}

</script>

<div id="page-wrapper">
            <div class="row">
               

                <div class="col-lg-12 col-md-12" style="border: 1px solid #dedede">
                  <br>
                    <div class="col-md-12">
                            <span id="message_box_filter"></span>
                          </div>
                          <!-- <div class="form-group col-md-2">
                            <label for="filterClass">Scholarship (%)</label>
                            <input type="number" id="scholarship" class="form-control input-sm" value="<?//=$scholarship?>"  min="0" max="100" >
                          </div> -->
                          <div class="form-group col-md-3">
                             <label for="filterProgram">Fees Plan</label>
                                <select class="form-control input-sm" id="fee_plan" name="fee_plan"  >
                                      <option value="">-- Select --</option>
                                      <?php
                                      foreach ($fee_plan as $f_plan) {
                                
                                       echo "<option value='".$f_plan->id."'>";
                                       echo $f_plan->plan_title;
                                       echo "</option>";
                                      }
                                      ?>
                                  </select> 
                          </div>

                          <!-- <div class="form-group col-md-3">
                             <label for="filterBatch">Additional Scholarship (%)</label>
                               <input type="number" id="additional_scholarship" class="form-control input-sm"   min="0" max="100" >
                          </div> -->

                          
                          <div class="form-group col-md-2">
                             <label for="filterBatch">Discount</label>
                             <select name="discount" id="discount" class="form-control input-sm">
                                <option value="">--select--</option>
                                <?php $discount = $this->db->get_where('discount_master',array('status'=>'1'))->result() ;
                                foreach($discount as $d):?>
                                 <option value="<?=$d->id;?>"><?=$d->title;?><?php if($d->type=='1'){echo " % OFF";}elseif($d->type=='0'){echo " OFF";};?></option>
                                <?php endforeach;?>
                             </select>   
                          </div>
                          <!-- <div class="form-group col-md-2">
                             <label for="filterBatch">Reason</label>
                               <textarea id="additional_scholarship_reason" class="form-control input-sm"></textarea>    
                          </div> -->
                          <div class="form-group col-md-2 ">
                            <label for=""><br></label>
                            <input type="button" class="btn btn-primary form-control input-sm" id="get_fees_details" value="Get Fees Details" >

                          </div>
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
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Fees List
                        </div>
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th >Academic Year</th>
                                        <th>Fees</th>
                                        <th>Payment Date</th>
                                        <th>Index</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                    
                                </tbody>
                            </table>
                            
                          
                            
                        </div>
                    </div>
                </div>
            </div>
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
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/manage_role/'+id+'/'+status);
            }
        </script>

<script type="text/javascript">
$(document).ready(function(){
    $('#get_fees_details').click(function(){
      var stu_id = '<?=$student->stu_id?>';
    //   var Scholarship = $('#scholarship').val();
      var discount = $('#discount').val();
      var FEE_PLAN = $('#fee_plan').val();
    //   var additionalScholarship = $('#additional_scholarship').val();
    //   var additionalScholarshipReason = $('#additional_scholarship_reason').val();
    if(FEE_PLAN == ''){
    $('#message_box_filter').html('<span style="color:red;">Select Fee Plan !</span>'); $('#fee_plan').focus();
    return false; }

    // if(additionalScholarshipReason!='' ){
    // $('#message_box_filter').html('<span style="color:red;">Enter Additional Scholarship and Reason !</span>'); 
    // return false; }

      var d= 'discount='+discount+'&stu_id='+stu_id+'&FEE_PLAN='+FEE_PLAN;

      $('#message_box_filter').html('');

      $('#tableDATA').html('');
      $('#tableDATA').html('Loading.....');
      $('#tableDATA').load('<?=base_url()?>enrollment/fees_data?'+d);
      // $('#tableDATA').load('<?=base_url()?>enrollment/fees_data/'+stu_id+'/'+Scholarship+'/'+FEE_PLAN);


    });
});

 
</script>