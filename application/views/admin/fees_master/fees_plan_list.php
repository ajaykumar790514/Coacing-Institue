<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Fees Plan List</h1>
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
                            Manage Fees Plan here
                            <span id="error_msg"></span>
                        </div>
                        <!-- /.panel-heading -->

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Program</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                <tr id="add_form">
                              <!-- <form id="add_function"> -->
                              <!-- <form action="<?=base_url()?>index.php/admin/add_function" method="post" id="add_function"> -->
                                <td></td>

                                <td>
                                  <select class="form-control input-sm" name="claSS" id="claSS" onchange="get_programs(this.value,0)">
                                    <option>-- Select Class --</option>
                                    <?php
                                    foreach ($classes as $class) {
                                     echo "<option value='".$class->class."'>";
                                     echo $class->class;
                                     echo "</option>";
                                    }
                                    ?>
                                  </select>
                                </td>

                                <td>
                                  <select class="form-control input-sm" name="program" id="program" >
                                    <option>-- Select Program --</option>
                                    
                                  </select>
                                </td>

                               

                                <td>
                                  <input type="text" class="form-control input-sm" style="width: 150px;" name="plan_title" id="plan_title" placeholder="Plan Title"  >
                                </td>
                               
                                <td>
                                  <input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
                                </td>
                                <td>
                                  <input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
                                </td>
                              <!-- </form> -->
                            </tr>

                                    <?php

                                     $i=1; foreach($fee_plan as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <!-- class -->
                                        <td class="V_data V_data<?=$row->id?>" >
                                            <?=$row->class?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                         <!--  <input type="number"  id="classInput<?=$row->id?>" value="<?=$row->class?>" > -->
                                           <select class="ClassInput form-control input-sm" name="claSS" id="classInput<?=$row->id?>" onchange="get_programs(this.value,'<?=$row->id?>')" >
                                            <option>-- Select Class --</option>
                                            <?php
                                            foreach ($classes as $class) {
                                             $s=""; if ($class->class==$row->class) { $s="selected";  }
                                             echo "<option ".$s." value='".$class->class."'>";
                                             echo $class->class;
                                             echo "</option>";
                                            }
                                            ?>
                                          </select>
                                        </td>
                                        <!-- class -->
                                        <!-- program -->
                                        <td class="V_data V_data<?=$row->id?>" >
                                            <?php
                                            foreach ($programs as $program) {
                                              if ($program->id==$row->program_id) {
                                                  echo $program->program;
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                         <select class="ClassInput form-control input-sm" name="programInput" id="programInput<?=$row->id?>"  >
                                            <option>-- Select Program --</option>
                                            <?php
                                            foreach ($programs as $program) {
                                              if ($program->class==$row->class) {
                                              $s=""; if ($program->id==$row->program_id) { $s="selected";  }
                                              echo "<option ".$s." value='".$program->id."'>";
                                                    echo $program->program;
                                                    echo "</option>";
                                              }
                                            }
                                            ?>
                                          </select> 
                                        </td>
                                        <!-- program -->

                                       
                                        <!-- plane title -->
                                        <td class="V_data V_data<?=$row->id?>" >
                                            <?=$row->plan_title?>
                                        </td>

                                        <td class="update update<?=$row->id?>" id="plan_title_input_td<?=$row->id?>">
                                          <input type="text" class="form-control" id="plan_titleInput<?=$row->id?>" value="<?=$row->plan_title?>" min="1" onkeypress="update_onEnter('<?=$row->id?>',event)">
                                        </td>
                                        <!-- plane title -->

                                        <td>
                                            <span id="active_status<?=$row->id?>" class="V_data V_data<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <button class="btn btn-success btn-xs update update<?=$row->id?>" onclick="update('<?=$row->id?>')">Update</button>
                                        </td>

                                        <td>
                                            <a  class="btn btn-warning btn-xs V_data V_data<?=$row->id?>"  id="edit_button<?=$row->id?>"  onclick="edit('<?=$row->id?>')">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-xs update update<?=$row->id?>" id="update_cancel<?=$row->id?>" onclick="update_hide('<?=$row->id?>')">Cancel</button>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
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
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/fee_plan_master/'+id+'/'+status);
            }

        </script>



  <script type="text/javascript">
  // onload hide
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();


    function clear_form() {
  $('#claSS').val(''); 
  $('#program').val(''); 
  $('#plan_title').val(''); 
  $('#add_form').hide();
  $('#error_msg').html('');
  }

  function show_hide_form(){
  $('#add_form').toggle();
  $('#error_msg').html('');
   $('#claSS').focus();
  $('.update').hide();
  $('.V_data').show();
}

function get_programs(CLASS,id)
{
    if (id==0) {
      $('#program').html('Loading.....');
    $('#program').load('<?=base_url()?>class_master/get_programs/'+CLASS);
    }
    else{
      $('#programInput'+id).html('Loading.....');
      $('#programInput'+id).load('<?=base_url()?>class_master/get_programs/'+CLASS);
    }
}



function form_submit(){
  var claSS =$('#claSS').val();
  var program =$('#program').val();
  var batch =$('#batch').val();
  var plan_title =$('#plan_title').val();
  if(claSS == ''){
  $('.message_box').html('<span style="color:red;">Select Class!</span>'); $('#claSS').focus();
  return false; }

  if(program == ''){
  $('.message_box').html('<span style="color:red;">Select Program!</span>'); $('#program').focus();
  return false; }

  if(plan_title == ''){
  $('.message_box').html('<span style="color:red;">Enter Plan Title!</span>'); $('#program').focus();
  return false; }
  var SendData = {class:claSS,program_id:program,plan_title:plan_title};
    if (claSS.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>fees_master/manage_fees_plan', data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>fees_master/reload_fees_plan');
          $('#error_msg').html(''); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">This Fees Plan Is Already Exist.</span>'); }
        }
      });
    }
}
$(document).keyup(function(event) {
    if ($("#plan_title").is(":focus") && event.key == "Enter") {
        form_submit();
    }
});

function update_onEnter(id,event) {
  var x = event.which || event.keyCode;
  // document.getElementById("demo").innerHTML = "The Unicode value is: " + x;
  if (x==13) {
    update(id);
  }
  // alert(id);
  // alert(x);
}


function edit(id){
  $('.update').hide(); 
  $('.V_data').show(); 
  $('#add_form').hide();

  $('.V_data'+id).hide();
  $('.update'+id).show();

  $('#classInput'+id).focus();
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>fees_master/reload_fees_plan');
  $('#error_msg').html('');
}

function update(id)
{

  var claSS =$('#classInput'+id).val();
  var program =$('#programInput'+id).val();
  var batch =$('#batchInput'+id).val();
  var plan_title =$('#plan_titleInput'+id).val();

   if(claSS == ''){
  $('.message_box').html('<span style="color:red;">Select Class!</span>'); $('#classInput'+id).focus();
  return false; }

  if(program == ''){
  $('.message_box').html('<span style="color:red;">Select Program!</span>'); $('#programInput'+id).focus();
  return false; }

  if(batch == ''){
  $('.message_box').html('<span style="color:red;">Select Batch!</span>'); $('#batchInput'+id).focus();
  return false; }

  if(plan_title == ''){
  $('.message_box').html('<span style="color:red;">Enter Plan Title!</span>'); $('#plan_titleInput'+id).focus();
  return false; }

  var SendData = {class:claSS,program_id:program,batch_id:batch,plan_title:plan_title};
  if (program.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>fees_master/manage_fees_plan/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>fees_master/reload_fees_plan');
                        $('#error_msg').html(''); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">This Fees Plan Is Already Exist.</span>'); }
        }
      });
    }

}

</script>