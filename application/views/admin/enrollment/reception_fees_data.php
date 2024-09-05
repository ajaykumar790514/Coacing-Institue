
<?php $i=0;
foreach ($fees as $row) {  $i++;

  $admission='';
  $infrastructure="";
  $tuition="";
  $study_material="";
  $examination="";
  $fees_amount="";
  $total="";
  ?>

  <tr>
    <td><?=$i?></td>
    <td >
      <?=$row->academic_year?>
      <input type="text"  id="academic_year<?=$i?>" value="<?=$row->academic_year?>" hidden>
      <input type="text"  id="gst_rate<?=$i?>" value="<?=$row->gst_rate?>" hidden>
      <input type="text"  id="gst_comp<?=$i?>" value="<?=$row->gst_company?>" hidden>
    </td>
  
    <td style="width:60%;">
      <table class="table table-striped table-bordered">
        <tr >
          <th style="text-align: center;">Fee Head</th>
          <th style="text-align: center;">Base Amount</th>
          <th style="text-align: center;">GST</th>
          <th style="text-align: center;">Total Amount</th>
        </tr>
        <tr>
          <th>Admission Fee</th>
          <td style="text-align:right;">
            <?=$row->admission_fee?>
            <!-- <input type="number" id="admission_fee<?=$i?>" class="form-control input-sm change" value="<?=$row->admission_fee?>">   -->
          </td>
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
          <?php
          $admission=array('admission_fee'=>$row->admission_fee,
                           'admission_fee_gst'=>$admission_fee_gst,
                           'admission_fee_total'=>$admission_fee);
          ?>
        </tr>
        <tr>
          <th>Infrastructure Fee</th>
          <td style="text-align:right;">
            <?=$row->infrastructure_fee?>
             <!-- <input type="number" id="infrastructure_fee<?=$i?>" class="form-control input-sm" value="<?=$row->infrastructure_fee?>">   -->
            </td>
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
          <?php
          $infrastructure=array('infrastructure_fee'=>$row->infrastructure_fee,
                           'infrastructure_fee_gst'=>$infrastructure_fee_gst,
                           'infrastructure_fee_total'=>$infrastructure_fee);
          ?>
        </tr>
        <tr title="Scholarship <?=$Scholarship?> %">
          <th>Tuition Fee</th>
          <td style="text-align:right;">
            <?php  
            $tuition_fee= $row->tuition_fee;
            if ($Scholarship!=0) {
               $tuition_fee= $row->tuition_fee*$Scholarship/100;
               $tuition_fee= $row->tuition_fee-$tuition_fee;
             } ?>
             <!-- <input type="number" id="tuition_fee<?=$i?>" class="form-control input-sm" value="<?=$tuition_fee?>">  -->
             <?=$tuition_fee?>
            </td>
          <td style="text-align:right;">
            <?php
              $tuition_fee_gst = $tuition_fee*$row->gst_rate/100;
              echo (int)$tuition_fee_gst;
            ?>
          </td>
          <td style="text-align:right;">
            <?php  $tuition_fee_total= $tuition_fee_gst+$tuition_fee;
                    echo (int)$tuition_fee_total; ?>
          </td>
          <?php
          $tuition=array('tuition_fee'=>$tuition_fee,
                           'tuition_fee_gst'=>$tuition_fee_gst,
                           'tuition_fee_total'=>$tuition_fee_total);
          ?>
        </tr>
        <tr>
          <th>Study Material Fee</th>
          <td style="text-align:right;">
            <?=$row->study_material_fee?>
            <!-- <input type="number" id="study_material_fee<?=$i?>" class="form-control input-sm" value="<?=$row->study_material_fee?>"> -->
            </td>
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
          <?php
          $study_material=array('study_material_fee'=>$row->study_material_fee,
                           'study_material_fee_gst'=>$study_material_fee_gst,
                           'study_material_fee_total'=>$study_material_fee);
          ?>
        </tr>
        <tr>
          <th>Examination Fee</th>
          <td style="text-align:right;">
            <?=$row->examination_fee?>
            <!-- <input type="number" id="examination_fee<?=$i?>" class="form-control input-sm" value="<?=$row->examination_fee?>"> -->
            </td>
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
          <?php
          $examination=array('examination_fee'=>$row->examination_fee,
                           'examination_fee_gst'=>$examination_fee_gst,
                           'examination_fee_total'=>$examination_fee);
          ?>
        </tr>
        <tr>
          <th colspan="" style="text-align:center;">
            Gross Amount:
          </th>
          <th colspan="1" style="text-align: center;">
            <?php $total = $row->admission_fee+$row->infrastructure_fee+$tuition_fee+$row->study_material_fee+$row->examination_fee;
            echo (int)$total; ?>
          </th>
          <th colspan="1" style="text-align: center;">
            <?php $total = $admission_fee_gst+$infrastructure_fee_gst+$tuition_fee_gst+$study_material_fee_gst+$examination_fee_gst;
            echo (int)$total; ?>
          </th>
          <th style="text-align:right;">
            <?php  $total_fee= $admission_fee+$infrastructure_fee+$tuition_fee_total+$study_material_fee+$examination_fee; 
             echo (int)$total_fee;
             if(!empty($discount)){
            if($discount->type==0)
            {
               $FinalTotal = $total_fee+$discount->title;
            }elseif($discount->type==1)
            {
              $per_amount = ($total_fee*$discount->title)/100;
              $FinalTotal= $total_fee-$per_amount;
            }
          }else{
            //$FinalTotal
          }
                 ?>
          </th>
        </tr>
        <?php if(!empty($discount)){?>
        <tr>
          <th colspan="" style="text-align:center;">
            Discount:
          </th>
          <th colspan="1" style="text-align: center;">
          </th>
          <th colspan="1" style="text-align: center;">
          <?php $total_fee= $admission_fee+$infrastructure_fee+$tuition_fee_total+$study_material_fee+$examination_fee; 
          
           if($discount->type==0)
            {
               echo $title = $discount->title."  OFF";
                $per_amount="".$discount->title;
                $FinalTotal = $total_fee-$discount->title;
            }elseif($discount->type==1)
            {
              echo $title =   $discount->title."% OFF";
               $per_amount = ($total_fee*$discount->title)/100;
               $FinalTotal= $total_fee-$per_amount;
            }?>
             <?php
          $total_per=array('per_amount'=>$per_amount,
                       'title'=>$title);
          ?>
          </th>
          <th style="text-align:right;">
           <?php  echo $per_amount;?>
          </th>
        </tr>
        <?php }else{
           $FinalTotal = $total_fee; 
           $total_per=array('per_amount'=>'',
           'title'=>'');}?>
        <tr>
          <th colspan="" style="text-align:center;">
            Final Amount:
          </th>
          <th colspan="1" style="text-align: center;">
          </th>
          <th colspan="1" style="text-align: center;">
          </th>
          <th style="text-align:right;">
            <?php  echo $FinalTotal;  ?>
            <?php
          $lasttotal=array('last_title'=>'',
                       'last_total'=>$FinalTotal);
          ?>
          </th>
          <?php
          $total=array('total'=>$total,
                       'total_fee'=>$total_fee);
          ?>
        </tr>
      </table>
      <?php
      $fees_amount = array();
      $fees_amount['admission']=$admission;
      $fees_amount['infrastructure']=$infrastructure;
      $fees_amount['tuition']=$tuition;
      $fees_amount['study_material']=$study_material;
      $fees_amount['examination']=$examination;
      $fees_amount['total']=$total;
      $fees_amount['discount']=$total_per;
      $fees_amount['FinalTotal']=$lasttotal;
      $fees_amount = serialize($fees_amount);


      ?>
       <textarea id="fees_amount<?=$i?>" hidden ><?=$fees_amount?></textarea>
       <input id="total_fee<?=$i?>" value="<?=$FinalTotal?>" hidden >
       <input id="due<?=$i?>" value="<?=$FinalTotal?>" hidden >
       <input id="discount<?=$i?>" value="<?=@$discount->title;?>,<?=@$discount->type;?>" hidden >
    </td>
    <td>
       <?php if ($i==1) {
        echo "<center><h3>At the Time of Admission </h3></center>";
        ?>
        <input type="text" id="payment_date<?=$i?>" class="form-control input-sm"  value="At the Time of Admission" style="display:none"  >
        <?php
      } else { ?>
      <input type="date" id="payment_date<?=$i?>" class="form-control input-sm" value="<?=$row->payment_date?>">
    <?php } ?>
    </td>
    <td>
      <input type="number" class="form-control input-sm" id="fee_index<?=$i?>" value="<?=$i?>" style="width: 70px;">
    </td>
    
    
  </tr>

  <?php
}

?>
<tr>
 <td colspan="5">
   <button  id="submit" class="btn btn-primary btn-xs disabled" style="float: right;">Submit</button>
<input type="number" id="rowss" value="<?=$i?>" hidden>
 </td> 
</tr>

<script type="text/javascript">
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();

$(document).ready(function(){
  $('#submit').click(function(){
    var ROWSs = $("#rowss").val();
    var Scholarship = $('#scholarship').val();
    var fee_plan = $('#fee_plan').val();
    var i; var n=0;
    for (i = 1; i <= ROWSs; i++) { 
      var academic_year = $('#academic_year'+i).val();
      var fees_amount = $('#fees_amount'+i).val();
      var payment_date = $('#payment_date'+i).val();
      var gst_rate = $('#gst_rate'+i).val();
      var gst_comp = $('#gst_comp'+i).val();
      var fee_index = $('#fee_index'+i).val();
      var total_fee = $('#total_fee'+i).val();
      var discount = $('#discount'+i).val();
      var due = $('#due'+i).val();

     var SendData = {academic_year:academic_year,fees_amount:fees_amount,payment_date:payment_date,gst_rate:gst_rate,gst_comp:gst_comp,scholarship:Scholarship,fee_plan:fee_plan,fee_index:fee_index,total_fee:total_fee,due:due,discount:discount};
  
      $.ajax({
        type: 'POST', url:'<?=base_url()?>enrollment/reception_assign_fees/<?=$student->stu_id?>', data:SendData,
        success:function(data){
          if (data==1) {  alert('Fees Assigned Successful.');
            // Using location.replace to replace current URL
window.location.replace("<?= base_url('enrollment/list_enrollment'); ?>");}else if(data==2){alert('Fees Already Assigned .');}
          else{ alert('Some System Error ! Try After Some Time.');return; }        
        }
      });
      n++;
    }
    // if (ROWSs==n) {
     
    // }
    
  });
});

 hide_show_submit_btn();
</script>