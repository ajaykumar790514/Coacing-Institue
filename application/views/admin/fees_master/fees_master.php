<style type="text/css">
  .table>thead>tr>th , .table>tbody>tr>td
  {
    text-align: center;
  }

</style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Fees List</h1>
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
            <a style="float: right" class="btn btn-warning btn-xs"  href="javascript:void(0);" onclick="show_hide_form()"><i class="fa fa-plus"></i> Add</a>
            <div class="row">


                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Fees here
                            <span id="error_msg"></span>
                        </div>
                        <div>
                          <br>
                        </div>
                        <div class="col-md-12">
                          <div class="col-md-12">
                            <span class="message_box0"></span>
                          </div>
                          <form method="post"  id="add_form">
                          <div class="col-md-6">
                            <div class="form-group col-md-6">
                                <label for="academic_year">Academic Year</label>
                                 <input type="text" name="academic_year" id="academic_year" class="form-control input-sm"  placeholder="2019-20" >
                            </div>

                            <div class="form-group col-md-6">
                              <label for="claSS">Class</label>
                              <select class="form-control input-sm" name="claSS0" id="claSS0" onchange="GetPrograms(this.value,0)">
                                  <option value="">-- Select Class --</option>
                                  <?php
                                  foreach ($classes as $class) {
                                   echo "<option value='".$class->class."'>";
                                   echo $class->class;
                                   echo "</option>";
                                  }
                                  ?>
                              </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="programInput0">Program</label>
                                <select class="form-control input-sm" name="programInput0" id="programInput0"
                                    onchange="get_fees_plan(this.value,0)">
                                    <option value="">-- Select Program --</option>
                                    
                                  </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="fees_plan_id0">Fees Plan</label>
                                <select class="form-control input-sm" name="fees_plan_id0" id="fees_plan_id0">
                                  <option value="">-- Select Fees Plan --</option>
                                    
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" name="payment_date" id="payment_date" class="form-control input-sm" value="<?=date('Y-m-d');?>" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="gst_company">Company</label>
                                <select class="form-control input-sm" id="gst_company" name="gst_company" onchange="set_gst_rate(0)">
                                    <option value="">-- Select Company --</option>
                                    <?php
                                    foreach ($gst_details as $com) {
                                      $ss=''; if ($com->id==1) { $ss="selected"; }
                                     echo "<option value='".$com->id."' ".$ss.">";
                                     echo $com->company_name;
                                     echo "</option>";
                                    }
                                    ?>
                                </select>
                                <label><small>Gst Rate</small></label>
                                <input type="text" class="form-control input-sm" id="gst_rate" name="gst_rate" readonly >
                            </div>

                            <div class="form-group col-md-12">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                                 <button type="reset"  id="reset"  class="btn btn-danger">Cancel</button>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <center><label>Fees</label></center>
                            <div class="form-group col-md-12">
                                <div class="col-md-6">
                                  <label for="admission_fee">Admission Fee</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="admission_fee" id="admission_fee" class="form-control input-sm ">
                                </div>
                            </div>
                             <div class="form-group col-md-12">
                                <div class="col-md-6">
                                  <label for="infrastructure_fee">Infrastructure Fee</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="infrastructure_fee" id="infrastructure_fee" class="form-control input-sm">
                                </div>
                            </div>

                             <div class="form-group col-md-12">
                                <div class="col-md-6">
                                  <label for="tuition_fee">Tuition Fee</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="tuition_fee" id="tuition_fee" class="form-control input-sm">
                                </div>
                            </div>

                             <div class="form-group col-md-12">
                                <div class="col-md-6">
                                  <label for="study_material_fee">Study Material Fee</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="study_material_fee" id="study_material_fee" class="form-control input-sm">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                              <div class="col-md-6">
                                  <label for="examination_fee">Examination Fee</label>
                              </div>
                              <div class="col-md-6">
                                  <input type="number" name="examination_fee" id="examination_fee" class="form-control input-sm">
                              </div>
                            </div>
                          </div>
                         </form> 
                        </div>

<script type="text/javascript">
function GetPrograms(CLASS,id)
{
    $('#programInput'+id).html('Loading.....');
    $('#programInput'+id).load('<?=base_url()?>fees_master/get_programs/'+CLASS);
    $('#fees_plan_id'+id).html('<option value="" >Loading....</option>');
}

function get_fees_plan(program,id)
{
      var claSS              = $('#claSS'+id).val();
     
      $('#fees_plan_id'+id).html('<option value="" >Loading....</option>');
      if(claSS == ''){
      $('.message_box'+id).html('<span style="color:red;">Select Class!</span>'); $('#claSS').focus();
      return false; }

      if(program == ''){
      $('.message_box'+id).html('<span style="color:red;">Select Program!</span>'); $('#program').focus();
      return false; }


      $('#fees_plan_id'+id).load('<?=base_url()?>fees_master/get_fees_plan/'+claSS+'/'+program);
   
}
</script>


                        <div id="filter_data" class="col-md-12" style="border: 1px solid #dedede">
                          <div class="col-md-12">
                            <span id="message_box_filter"></span>
                          </div>
                          <div class="form-group col-md-3">
                            <label for="filterClass">Class</label>
                            <select class="form-control input-sm" name="filterClass" id="filterClass" >
                                <option value="">-- Select Class --</option>
                                <?php
                                foreach ($classes as $class) {
                                 echo "<option value='".$class->class."'>";
                                 echo $class->class;
                                 echo "</option>";
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3">
                             <label for="filterProgram">Program</label>
                                <select class="form-control input-sm" name="filterProgram" id="filterProgram" >
                                    <option value="">-- Select Program --</option>
                                </select>
                          </div>
                          <div class="form-group col-md-3">
                            <label><br></label>
                            <input type="button" class="btn btn-primary form-control input-sm" id="filter" value="View Fees" >
                          </div>
<script type="text/javascript">







$(document).ready(function(){
  $('#filterClass').change(function(){
    var CLASS=$(this).val();
     $('#filterProgram').html('<option value="" >Loading.....</option>');
    $('#filterProgram').load('<?=base_url()?>class_master/get_programs/'+CLASS);
  });
  });


$(document).ready(function(){
  $('#filter').click(function(){
      var filterClass = $('#filterClass').val();
      var filterProgram = $('#filterProgram').val();
      $('.message_box').html('');
      // alert(filterClass);
      if(filterClass == ''){
      $('#message_box_filter').html('<span style="color:red;">Select Class !</span>'); $('#filterClass').focus();
      return false; }
       if(filterProgram== '' ){
      $('#message_box_filter').html('<span style="color:red;">Select Program !</span>'); $('#filterProgram').focus();
      return false; }
      $('#message_box_filter').html('');
      $('#tableDATA').html('Loading.....');
      $('#tableDATA').load('<?=base_url()?>fees_master/filter_fees_data/'+filterClass+'/'+filterProgram);


  });
});
</script>                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover dataTable" id="dataTables-list" data-page-length='100'>
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th >Academic Year</th>
                                        <th>Fees</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                
                                  
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
function activate_inactive(id,status)
{
    $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
    $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/fee_master/'+id+'/'+status);
}
</script>


<script type="text/javascript">






// onload 
// $('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();
// reset and hide add fess form
$(document).ready(function() {
 $('#reset').click(function(){
    $('#add_form').hide();
    $('#message_box').html('');
 });
});
// show hide add fees form
function show_hide_form(){
  $('#add_form').toggle();       $('#error_msg').html('');
  $('#academic_year').focus();   $('.update').hide();
  $('.V_data').show();
  set_gst_rate(0);
}
// add fees form submit
$(document).ready(function() {
 $('#add_form').submit(function(e){
 e.preventDefault();
 // alert('submit');
 var academic_year      = $('#academic_year').val();
 var claSS              = $('#claSS0').val();
 var program            = $('#programInput0').val();
 var fees_plan_id       = $('#fees_plan_id0').val();
 var payment_date       = $('#payment_date').val();
 var gst_company        = $('#gst_company').val();
 var gst_rate           = $('#gst_rate').val();
 var admission_fee      = $('#admission_fee').val();
 var infrastructure_fee = $('#infrastructure_fee').val();
 var tuition_fee        = $('#tuition_fee').val();
 var study_material_fee = $('#study_material_fee').val();
 var examination_fee    = $('#examination_fee').val();

if(academic_year == ''){
$('.message_box0').html('<span style="color:red;">Enter Academic Year!</span>'); $('#academic_year').focus();
return false; }

if(claSS == ''){
$('.message_box0').html('<span style="color:red;">Select Class!</span>'); $('#claSS').focus();
return false; }

if(program == ''){
$('.message_box0').html('<span style="color:red;">Select Program!</span>'); $('#program').focus();
return false; }

if(fees_plan_id == ''){
$('.message_box0').html('<span style="color:red;">Select Fees Plan!</span>'); $('#fees_plan_id').focus();
return false; }

if(payment_date == ''){
$('.message_box0').html('<span style="color:red;">Enter Payment Date!</span>'); $('#payment_date').focus();
return false; }

if(gst_company == '' || gst_rate == ''){
$('.message_box0').html('<span style="color:red;">Select Company Or Reselect Company!</span>'); $('#gst_company').focus();
return false; }

if(admission_fee == ''){
$('.message_box0').html('<span style="color:red;">Enter Admission Fee!</span>'); $('#admission_fee').focus();
return false; }

if(tuition_fee == ''){
$('.message_box0').html('<span style="color:red;">Enter Tuition Fee!</span>'); $('#tuition_fee').focus();
return false; }

if(study_material_fee == ''){
$('.message_box0').html('<span style="color:red;">Enter Study Material Fee!</span>'); $('#study_material_fee').focus();
return false; }

if(examination_fee == ''){
$('.message_box0').html('<span style="color:red;">Enter Examination Fee!</span>'); $('#examination_fee').focus();
return false; }

console.log(new FormData(this));

 $.ajax({
      type: 'POST', 
      url:'<?=base_url()?>fees_master/manage_fees', 
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success:function(data){
        // $('.message_box0').html(data); return;
        if (data==0) {  $("#reset").click(); set_gst_rate();
        $('.message_box0').html('<span style="color:green">Fees Details Added successful.</span>'); }
        else if(data==2){ $('.message_box0').html('<span style="color:red">Some System Error !</span>'); }
        else{ $('.message_box0').html('<span style="color:red">Fees Details Already Exist.</span>'); }
      }
    });
 });

 });
// load fees plan

// set gst rate
set_gst_rate(0);
function set_gst_rate(id)
{
  
  if (id==0) {
    var comp_id = $('#gst_company').val();
    if (comp_id != '') {
      $.ajax({
          type: 'POST', url:'<?=base_url()?>fees_master/get_gst_rate/'+comp_id, 
          success:function(data){
            $('#gst_rate').val(data);
              
          } }); }
      else{
         $('#gst_rate').val(''); 
      }
  }
  else{
    var comp_id = $('#gst_company'+id).val();
    
    if (comp_id != '') {
      $.ajax({
          type: 'POST', url:'<?=base_url()?>fees_master/get_gst_rate/'+comp_id, 
          success:function(data){
              $('#gst_rate'+id).val(data); 
          } }); }
      else{
        $('#gst_rate').val('0'); 
      }
  }
    
}



</script>


<script type="text/javascript">
  






</script>

