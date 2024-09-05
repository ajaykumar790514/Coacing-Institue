<tr id="add_form">
  <!-- <form id="add_function"> -->
  <!-- <form action="<?=base_url()?>index.php/admin/add_function" method="post" id="add_function"> -->
    <td></td>
    <td>
      <input type="number" class="form-control input-sm" style="width: 150px;" name="claSS" id="claSS" placeholder="Class" min="1" >
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

<?php $i=1; foreach($classes as $row){
    
 ?>
<tr class="">
    <td><?=$i?></td>
    <td class="V_data" id="class_td<?=$row->id?>">
        <?=$row->class?>
    </td>
    <td class="update" id="class_input_td<?=$row->id?>">
      <input type="number" class="ClassInput form-control" id="classInput<?=$row->id?>" value="<?=$row->class?>" min="1" onkeypress="update_onEnter('<?=$row->id?>',event)">
      <span id="error_msg<?=$row->id?>"></span>
    </td>
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