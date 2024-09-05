<tr id="add_form">
    <td></td>
    <td>
      <!-- class -->
      <select class="form-control input-sm" name="claSS" id="claSS">
        <option value="">-- Select Class --</option>
        <?php
        foreach ($classes as $class) {
         echo "<option value='".$class->class."'>";
         echo $class->class;
         echo "</option>";
        }
        ?>
      </select>
      <span id="error_msg_class"></span>
    </td>
      <!-- class -->
      <!-- program -->
    <td>
      <input type="text" class="form-control input-sm" style="width: 150px;" name="program" id="program" placeholder="Program"  >
      <span id="error_msg"></span>
    </td>
      <!-- program -->
      <!-- fees -->
    <td>
      <input type="text" class="form-control input-sm" style="width: 150px;" name="fees" id="fees" placeholder="Fees" >
      <span id="error_msg_fees"></span>
    </td>
      <!-- fees -->
    <!-- action -->
    <td>
      <input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
    </td>
    <td>
      <input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
    </td>
    <!-- action -->

    <!-- </form> -->
</tr>

<?php $i=1; foreach($programs as $row){ ?>
<tr class="">
    <td><?=$i?></td>
    <!-- class -->
    <td class="V_data" id="class_td<?=$row->id?>">
        <?=$row->class?>
    </td>
    <td class="update" id="class_input_td<?=$row->id?>">
     <!--  <input type="number"  id="classInput<?=$row->id?>" value="<?=$row->class?>" > -->
       <select class="ClassInput form-control input-sm" name="claSS" id="classInput<?=$row->id?>" >
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
    <td class="V_data" id="Program_td<?=$row->id?>">
        <?=$row->program?>
    </td>
    <td class="update" id="program_input_td<?=$row->id?>">
      <input type="text" class="form-control" id="programInput<?=$row->id?>" value="<?=$row->program?>" >
      <span id="error_msg<?=$row->id?>"></span>
    </td>
    <!-- program -->
    <!-- fees -->
    <td class="V_data" id="Fees_td<?=$row->id?>">
        <?=$row->fees?>
    </td>
    <td class="update" id="fees_input_td<?=$row->id?>">
      <input type="number" class="form-control" id="feesInput<?=$row->id?>" value="<?=$row->fees?>" min="1" onkeypress="update_onEnter('<?=$row->id?>',event)">
    </td>
    <!-- fees -->
    <!-- action -->
    <td>
        <span id="active_status<?=$row->id?>" class="V_data">
        <?php if($row->status==1){?>

            <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
            <?php }else{ ?>
            <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
            <?php } ?>
        </span>
        <button class="btn btn-success btn-xs update" id="update_button<?=$row->id?>" onclick="update('<?=$row->id?>')">Update</button>
    </td>

    <td>
        <a  class="btn btn-warning btn-xs V_data"  id="edit_button<?=$row->id?>"  onclick="edit('<?=$row->id?>')">
            <i class="fa fa-edit"></i>
        </a>
        <button class="btn btn-danger btn-xs update" id="update_cancel<?=$row->id?>" onclick="update_hide('<?=$row->id?>')">Cancel</button>
    </td>
    <!-- action -->

</tr>
<?php $i++; } ?>




<script type="text/javascript">
    // onload hide
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();
</script>