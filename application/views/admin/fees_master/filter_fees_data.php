<?php $i=0;
foreach ($fees as $row) {  $i++;
  ?>

  <tr>
    <td><?=$i?></td>
    <td class="V_data V_data<?=$row->id?>">
      <?=$row->academic_year?>
      <br>
      <br>
      <br>
      <label>Fees Plan</label>
      <?php
          foreach ($fee_plan as $f_plan) {
          if ($f_plan->id==$row->fee_plan_id) { 
           echo $f_plan->plan_title;
          }
          }
          ?>
    </td>
    <td class="update update<?=$row->id?>">
      <input type="text"  id="academic_year<?=$row->id?>" value="<?=$row->academic_year?>">
      <label for="gst_company<?=$row->id?>">Company</label>
      <select class="form-control input-sm" id="gst_company<?=$row->id?>" onchange="set_gst_rate('<?=$row->id?>')">
          <option value="">-- Select Company --</option>
          <?php
          foreach ($gst_details as $com) {
            $ss=''; if ($com->id==$row->gst_company) { $ss="selected"; }
           echo "<option value='".$com->id."' ".$ss.">";
           echo $com->company_name;
           echo "</option>";
          }
          ?>
      </select>

      <label for="fees_plan_id">Fees Plan</label>
      <select class="form-control input-sm"  id="fees_plan_id<?=$row->id?>">
          <option value="">-- Select Fees Plan --</option>
          <?php
          foreach ($fee_plan as $f_plan) {
            $sss=''; if ($f_plan->id==$row->fee_plan_id) { $sss="selected"; }
           echo "<option value='".$f_plan->id."' ".$sss.">";
           echo $f_plan->plan_title;
           echo "</option>";
          }
          ?>
      </select>

      <input type="text" id="gst_rate<?=$row->id?>" hidden="" value="<?=$row->gst_rate?>" >
    </td>
    <td style="width:50%;">
      <table class="table table-striped table-bordered V_data<?=$row->id?>">
        <tr >
          <th style="text-align: center;">Fee Head</th>
          <th style="text-align: center;">Base Amount</th>
          <th style="text-align: center;">GST</th>
          <th style="text-align: center;">Total Amount</th>
        </tr>
        <tr>
          <th>Admission Fee</th>
          <td style="text-align:right;"><?=$row->admission_fee?></td>
          <td style="text-align:right;">
            <?php
              $admission_fee_gst = $row->admission_fee*$row->gst_rate/100;
              echo (int)$admission_fee_gst;
            ?>
          </td>
          <td style="text-align: right;">
            <?php $admission_fee = $admission_fee_gst+$row->admission_fee;
                echo (int)$admission_fee ?>
          </td>
        </tr>
        <tr>
          <th>Infrastructure Fee</th>
          <td style="text-align:right;"><?=$row->infrastructure_fee?></td>
          <td style="text-align:right;">
            <?php
              $infrastructure_fee_gst = $row->infrastructure_fee*$row->gst_rate/100;
              echo (int)$infrastructure_fee_gst;
            ?>
          </td>
          <td style="text-align:right;">
            <?php $infrastructure_fee = $infrastructure_fee_gst+$row->infrastructure_fee;
                echo (int)$infrastructure_fee ?>
          </td>
        </tr>
        <tr>
          <th>Tuition Fee</th>
          <td style="text-align:right;"><?=$row->tuition_fee?></td>
          <td style="text-align:right;">
            <?php
              $tuition_fee_gst = $row->tuition_fee*$row->gst_rate/100;
              echo (int)$tuition_fee_gst;
            ?>
          </td>
          <td style="text-align:right;">
            <?php  $tuition_fee= $tuition_fee_gst+$row->tuition_fee;
                    echo (int)$tuition_fee; ?>
          </td>
        </tr>
        <tr>
          <th>Study Material Fee</th>
          <td style="text-align:right;"><?=$row->study_material_fee?></td>
          <td style="text-align:right;">
            <?php
              $study_material_fee_gst = $row->study_material_fee*$row->gst_rate/100;
              echo (int)$study_material_fee_gst;
            ?>
          </td>
          <td style="text-align:right;">
            <?php  $study_material_fee= $study_material_fee_gst+$row->study_material_fee;
                 echo (int)$study_material_fee; ?>
          </td>
        </tr>
        <tr>
          <th>Examination Fee</th>
          <td style="text-align:right;"><?=$row->examination_fee?></td>
          <td style="text-align:right;">
            <?php
              $examination_fee_gst = $row->examination_fee*$row->gst_rate/100;
              echo (int)$examination_fee_gst;
            ?>
          </td>
          <td style="text-align:right;">
            <?php $examination_fee= $examination_fee_gst+$row->examination_fee; 
                  echo (int)$examination_fee; ?>
          </td>
        <tr>
        <tr>
          <th colspan="" style="text-align:center;">
            Gross Amount:
          </th>
          <th colspan="2" style="text-align: center;">
            <?php $total = $row->admission_fee+$row->infrastructure_fee+$row->tuition_fee+$row->study_material_fee+$row->examination_fee;
            echo (int)$total; ?>
          </th>
          <th style="text-align:right;">
            <?php  $total_fee= $admission_fee+$infrastructure_fee+$tuition_fee+$study_material_fee+$examination_fee; echo (int)$total_fee;
                 ?>
          </th>
        </tr>
      </table>

      <table class="table table-striped table-bordered update update<?=$row->id?>">
        <tr >
          <th style="text-align: center;">Fee Head</th>
          <th style="text-align: center;">Amount</th>
        </tr>
        <tr>
          <th>Admission Fee</th>
          <td style="text-align:right;">
            <input type="number" id="admission_fee<?=$row->id?>" class="form-control input-sm " value="<?=$row->admission_fee?>">
          </td>
        </tr>
        <tr>
          <th>Infrastructure Fee</th>
          <td style="text-align:right;">
             <input type="number"  id="infrastructure_fee<?=$row->id?>" class="form-control input-sm" value="<?=$row->infrastructure_fee?>">
          </td>
        </tr>
        <tr>
          <th>Tuition Fee</th>
          <td style="text-align:right;">
            <input type="number"  id="tuition_fee<?=$row->id?>" class="form-control input-sm" value="<?=$row->tuition_fee?>">
          </td>
        </tr>
        <tr>
          <th>Study Material Fee</th>
          <td style="text-align:right;">
            <input type="number"  id="study_material_fee<?=$row->id?>" class="form-control input-sm" value="<?=$row->study_material_fee?>">
          </td>
        </tr>
        <tr>
          <th>Examination Fee</th>
          <td style="text-align:right;">
            <input type="number" id="examination_fee<?=$row->id?>" class="form-control input-sm" value="<?=$row->examination_fee?>">
          </td>
        <tr>
        
      </table>



    </td>
    <td class="V_data V_data<?=$row->id?>">
      <?=$row->payment_date?>
    </td>
    <td class="update update<?=$row->id?>">
      <input type="date" id="payment_date<?=$row->id?>" class="form-control input-sm" value="<?=$row->payment_date?>">
    </td>
    <td>
      <span id="active_status<?=$row->id?>" class="V_data V_data<?=$row->id?>">
      <?php if($row->status==1){?>

          <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
          <?php }else{ ?>
          <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
          <?php } ?>
      </span>
      <button  class="btn btn-success btn-xs update update<?=$row->id?>"  onclick="update('<?=$row->id?>')">Update</button>
    </td>
    <td>
       <a  class="btn btn-warning btn-xs V_data V_data<?=$row->id?>"  onclick="edit('<?=$row->id?>')">
          <i class="fa fa-edit"></i>
      </a>
      <button class="btn btn-danger btn-xs update update<?=$row->id?>"  onclick="update_hide('<?=$row->id?>')">Cancel</button>
    </td>
  </tr>

  <?php
}

?>

<script type="text/javascript">
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();

function edit(id){
  $('.update').hide(); 
  $('.V_data').show(); 
  $('#add_form').hide();

  $('.V_data'+id).hide();
  $('.update'+id).show();
}

function update_hide()
{
  $('#add_form').hide();
  $('.update').hide();  
  $('.V_data').show();  
    var filterClass = $('#filterClass').val();
    var filterProgram = $('#filterProgram').val();
    $('.message_box').html('');
    if(filterClass == ''){
    $('#message_box_filter').html('<span style="color:red;">Select Class !</span>'); $('#filterClass').focus();
    return false; }
     if(filterProgram== '' ){
    $('#message_box_filter').html('<span style="color:red;">Select Program !</span>'); $('#filterProgram').focus();
    return false; }
    $('#message_box_filter').html('');
    $('#tableDATA').html('Loading.....');
    $('#tableDATA').load('<?=base_url()?>fees_master/filter_fees_data/'+filterClass+'/'+filterProgram);
}


function update(id)
{
    var academic_year      = $('#academic_year'+id).val();
    var fees_plan_id       = $('#fees_plan_id'+id).val();
    var payment_date       = $('#payment_date'+id).val();
    var gst_company        = $('#gst_company'+id).val();
    var gst_rate           = $('#gst_rate'+id).val();
    var admission_fee      = $('#admission_fee'+id).val();
    var infrastructure_fee = $('#infrastructure_fee'+id).val();
    var tuition_fee        = $('#tuition_fee'+id).val();
    var study_material_fee = $('#study_material_fee'+id).val();
    var examination_fee    = $('#examination_fee'+id).val();

    if(academic_year == ''){
    $('.message_box').html('<span style="color:red;">Enter Academic Year!</span>'); $('#academic_year').focus();
    return false; }

    if(fees_plan_id == ''){
    $('.message_box').html('<span style="color:red;">Select Fees Plan!</span>'); $('#fees_plan_id').focus();
    return false; }

    if(payment_date == ''){
    $('.message_box').html('<span style="color:red;">Enter Payment Date!</span>'); $('#payment_date').focus();
    return false; }

    if(gst_company == '' || gst_rate == ''){
    $('.message_box').html('<span style="color:red;">Select Company Or Reselect Company!</span>'); $('#gst_company').focus();
    return false; }

    if(admission_fee == ''){
    $('.message_box').html('<span style="color:red;">Enter Admission Fee!</span>'); $('#admission_fee').focus();
    return false; }

    if(tuition_fee == ''){
    $('.message_box').html('<span style="color:red;">Enter Tuition Fee!</span>'); $('#tuition_fee').focus();
    return false; }

    if(study_material_fee == ''){
    $('.message_box').html('<span style="color:red;">Enter Study Material Fee!</span>'); $('#study_material_fee').focus();
    return false; }

    if(examination_fee == ''){
    $('.message_box').html('<span style="color:red;">Enter Examination Fee!</span>'); $('#examination_fee').focus();
    return false; }

  var SendData = {academic_year:academic_year,fee_plan_id:fees_plan_id,payment_date:payment_date,gst_company:gst_company,gst_rate:gst_rate,admission_fee:admission_fee,infrastructure_fee:infrastructure_fee,tuition_fee:tuition_fee,study_material_fee:study_material_fee,examination_fee:examination_fee};
  
      $.ajax({
        type: 'POST', url:'<?=base_url()?>fees_master/manage_fees/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0){
            alert('Update Successfil .');
              update_hide();
             }
          else if(data==2){ alert('Some System Error');  }
          else{ alert('This Fees Plan Is Already Exist.'); }

          
        }
      });
    

}
</script>