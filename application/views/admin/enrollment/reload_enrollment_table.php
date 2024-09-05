
<?php $n=1; foreach($students as $row){
    $stu_program="";
    $stu_batch="";
    foreach ($programs as $pro) {
        if ($row->stu_program==$pro->id) {
            $stu_program=$pro->program;
        }
    }

    foreach ($batch as $bat) {
        if ($row->stu_batch==$bat->id) {
            $stu_batch=$bat->batch;
        }
    }
   
 ?>

<tr class="">
    <td><?=$n?></td>
    <td>
        <?=$row->stu_class?>
    <input type="hidden" id="stu_class<?=$row->stu_id?>" value="<?=$row->stu_class?>">        
    </td>
    <td class="exist-data">
        <b style='color:blue;'>Program</b><br>
          <?=$stu_program?>
        <br>
        <?php
        if ($row->stu_batch==0) {
            
            // Batch
                echo'<label>Batch</label>';
                echo "<select class='form-control input-sm' id='batch".$row->stu_id."'  >";
                echo "<option value=''> --- Select Batch ---</option>";
                foreach ($batch as $btch) {
                    if ($row->stu_program==$btch->program_id) {
                       echo "<option value='".$btch->id."'>";
                       echo $btch->batch;
                       echo "</option>";
                    }
                   echo "string";
                }
                echo "</select>";
            // Batch 
            echo'<br>
              <button class="btn btn-primary btn-xs" onclick="assign_batch('.$row->stu_id.')">Assign Batch</button> ';
        }
        else{
          echo "<b style='color:blue;'>Batch</b><br>";
          echo $stu_batch;  
        }
        ?>  
         <a  href="#" onclick="updatebatch()" class="btn btn-danger btn-xs" ><i class="fa fa-edit"></i></a> 
    </td>
    <td class="update-data" style="display:none">
                                        <b style='color:blue;'>Program</b><br>
                                              <?=$stu_program?>
                                            <br>
                                         <?php
                                              echo'<label>Batch</label>';
                                               echo "<select class='form-control input-sm' id='updatebatch".$row->stu_id."'  >";
                                               echo "<option value=''> --- Select Batch ---</option>";
                                               foreach ($batch as $btch) {
                                                $selected = '';
                                                   if ($row->stu_program==$btch->program_id) {
                                                     if($btch->id==$row->stu_batch)
                                                     {
                                                        $selected = 'selected';
                                                     }
                                                      echo "<option value='".$btch->id."' ".$selected.">";
                                                      echo $btch->batch;
                                                      echo "</option>";
                                                   }
                                                  echo "string";
                                               }
                                               echo "</select>";
                                           // Batch 
                                           echo'<br>
                                             <button class="btn btn-primary btn-xs" onclick="update_batch('.$row->stu_id.')">Update Batch</button> ';
                                            ?>
                                        </td>
   
    <td><?=$row->enrollment_no?></td>
    <td><?=$row->name?>
    s\o (   
                                            <?php
                                        // Serialized string
                                        $serialized_string = $row->father;
                                        $data = unserialize($serialized_string);
                                        if (isset($data['name'])) {
                                            echo $data['name'];
                                        } else {
                                            echo "Name not found.";
                                        }
                                        ?>

                                        )</td>
    <td>
        <?php
        $check=$this->db->get_where('stu_fees',array('stu_id'=>$row->stu_id))->result();
        // echo count($check);
        if(count($check)==0) {
            if ($row->stu_program==0 or $row->stu_batch==0) {
               echo' <a href="javascript:void(0)" onclick="alert_batch_not_assign()" class="btn btn-warning btn-xs" > Fees </a>';
            }
            else {


            ?>

        <a href="<?=base_url()?>enrollment/fees/<?=$row->stu_id?>" target="_blank" class="btn btn-warning btn-xs" > Fees </a>
    <?php
            }        
        } 
    else{
        ?>
         <a href="<?=base_url()?>enrollment/view_fees/<?=$row->stu_id?>" target="_blank" class="btn btn-primary btn-xs" > View Fees </a>
        <?php
    } ?>
    </td>
    <td>
                                            <?=$row->mobile_no?>  ,<br> <?=$row->mobile_no2?>
                                        </td>
                                        <td>
                                            <span id="active_status<?=$row->stu_id?>" class="V_data">
                                            <?php if($row->is_active==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->stu_id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->stu_id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>
    <!-- <td>
        <span id="update_msg<?=$row->stu_id?>"></span>
        <input type="text" class="form-control input-sm" id="machine_id<?=$row->stu_id?>" value="<?=$row->stu_mac_id?>" oninput="update_mac_id('<?=$row->stu_id?>')"  >
    </td> -->
    <td>
        
    </td>
    <td>
    <a target="_blank" href="<?=base_url()?>enrollment/edit_student/<?=$row->stu_id?>" class="btn btn-warning btn-xs" ><i class="fa fa-edit"></i></a> 
        <a href="<?=base_url()?>enrollment/delete_student/<?=$row->stu_id?>" class="btn btn-danger btn-xs" onclick="return (confirm('Are you sure, you want to delete? \nRestore student any time from trash.')) "><i class="fa fa-trash"></i></a>   
    </td>
</tr>
<?php $n++; } ?>
                               