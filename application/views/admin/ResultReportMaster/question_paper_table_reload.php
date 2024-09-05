      <?php $i=1; foreach($QuestionPapers as $row){
          
       ?>
      <tr class="">
          <td><?=$i?></td>
          <!-- title -->
          <td class="V_data V_data<?=$row->id?>">
              <?=$row->paper_title?>
          </td>
          <td class="update update<?=$row->id?>">
            <input type="text" class="form-control" id="paper_title<?=$row->id?>" value="<?=$row->paper_title?>"  >
            <span id="error_msg<?=$row->id?>"></span>
          </td>
          <!-- title -->

          <!-- Test Date -->
          <td class="V_data V_data<?=$row->id?>">
              <?=$row->test_date?>
          </td>
          <td class="update update<?=$row->id?>">
            <select class="ClassInput form-control input-sm" name="test_date<?=$row->id?>" id="test_date<?=$row->id?>" >
              <option value="">-- Select --</option>
              <?php
              foreach ($tests as $test) {
               $s=""; if ($test->test_date==$row->test_date) { $s="selected";  }
               echo "<option ".$s." value='".$test->test_date."'>";
               echo $test->test_date." ( ".$test->test_name." )";
               echo "</option>"; } ?>
            </select>
          </td>
          <!-- Tast Date -->

          

         

          <!-- action -->
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
              <a href="javascript:void(0)" class="btn btn-warning btn-xs V_data V_data<?=$row->id?>" onclick="edit('<?=$row->id?>')">
                  <i class="fa fa-edit"></i>
              </a>
              <button class="btn btn-danger btn-xs update update<?=$row->id?>" onclick="reload_table()">Cancel</button>
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