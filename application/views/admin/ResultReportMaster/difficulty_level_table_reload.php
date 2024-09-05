                                    <?php $i=1; foreach($difficulty_lavel as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->paper_category) { 
                                               echo $p_category->category;
                                              }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <select class="ClassInput form-control input-sm" name="paper_category<?=$row->id?>" id="paper_category<?=$row->id?>" >
                                            <option value="">-- Select Paper --</option>
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->paper_category) { $s="selected";  }
                                             echo "<option ".$s." value='".$p_category->id."'>";
                                             echo $p_category->category;
                                             echo "</option>";
                                            }
                                            ?>
                                          </select>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->section?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="section<?=$row->id?>" value="<?=$row->section?>"  placeholder="Section ( A - Z ) " oninput="$(this).val($(this).val().toUpperCase());" maxlength="1" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->difficulty_level?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="difficulty_level<?=$row->id?>" value="<?=$row->difficulty_level?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->parameters?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="parameters<?=$row->id?>" value="<?=$row->parameters?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->desc?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <textarea class="form-control" id="desc<?=$row->id?>"><?=$row->desc?></textarea>
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->weightage?> %
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="number" class="form-control" id="weightage<?=$row->id?>" value="<?=$row->weightage?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td>
                                            <span id="active_status<?=$row->id?>" class="V_data V_data<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <button class="btn btn-success btn-xs update update<?=$row->id?>"  onclick="update('<?=$row->id?>')">Update</button>
                                        </td>

                                        <td>
                                            <a  class="btn btn-warning btn-xs V_data V_data<?=$row->id?>"    onclick="edit('<?=$row->id?>')">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-xs update update<?=$row->id?>" onclick="update_hide('<?=$row->id?>')">Cancel</button>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>

<script type="text/javascript">
    // onload hide
// $('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();
</script>