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
<select class="form-control input-sm" name="program" id="program">
<option>-- Select Program --</option>

</select>
</td>

<td>
<input type="text" class="form-control input-sm" style="width: 150px;" name="batch" id="batch" placeholder="Batch Name"  >
<span id="error_msg"></span>
</td>

<td>
<input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
</td>
<td>
<input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
</td>
<!-- </form> -->
</tr>

<?php $i=1; foreach($batches as $row){
    
 ?>
<tr class="">
    <td><?=$i?></td>
    <!-- class -->
    <td class="V_data" id="class_td<?=$row->id?>">
        <?=$row->class?>
    </td>
    <td class="update" id="class_input_td<?=$row->id?>">
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
    <td class="V_data" id="Program_td<?=$row->id?>">
        <?php
        foreach ($programs as $program) {
          if ($program->id==$row->program_id) {
              echo $program->program;
            }
        }
        ?>
    </td>
    <td class="update" id="program_input_td<?=$row->id?>">
     

       <select class="ClassInput form-control input-sm" name="programInput" id="programInput<?=$row->id?>" >
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
    <!-- batch -->
    <td class="V_data" id="Batch_td<?=$row->id?>">
        <?=$row->batch?>
    </td>

    <td class="update" id="batch_input_td<?=$row->id?>">
      <input type="text" class="form-control" id="batchInput<?=$row->id?>" value="<?=$row->batch?>" min="1" onkeypress="update_onEnter('<?=$row->id?>',event)">
      <span id="error_msg<?=$row->id?>"></span>
    </td>
    <!-- batch -->

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
</tr>
<?php $i++; } ?>

<script type="text/javascript">
    // onload hide
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();
</script>