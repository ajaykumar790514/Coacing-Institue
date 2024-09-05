
                                    <?php $i=1; foreach($QuestionTopics as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <!-- title -->
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->title?>
                                        </td>
                                        <td class="update update<?=$row->id?>">
                                          <input type="text" class="form-control" id="titleInput<?=$row->id?>" value="<?=$row->title?>"  >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>
                                        <!-- title -->

                                        <!-- papre category -->
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->paper_category) { 
                                               echo $p_category->category;
                                              }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>">
                                          <select class="ClassInput form-control input-sm" name="paper_category" id="paper_categoryInput<?=$row->id?>" onchange="get_question_topics('<?=$row->id?>')" >
                                            <option value="">-- Select Class --</option>
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->parent_id) { $s="selected";  }
                                             echo "<option ".$s." value='".$p_category->id."'>";
                                             echo $p_category->category;
                                             echo "</option>";
                                            }
                                            ?>
                                          </select>
                                        </td>
                                        <!-- paper category -->

                                        <!-- qusetion topics -->
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?php
                                            foreach ($question_topics as $q_topics) {
                                             $s=""; if ($q_topics->id==$row->parent_id) { 
                                               echo $q_topics->title;
                                              }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>">
                                          <select class="ClassInput form-control input-sm" name="" id="parent_idInput<?=$row->id?>" >
                                            <option value="">-- Select Class --</option>
                                            <?php
                                            foreach ($question_topics as $q_topics) {
                                             $s=""; if ($q_topics->id==$row->parent_id) { $s="selected";  }
                                             echo "<option ".$s." value='".$q_topics->id."'>";
                                             echo $q_topics->title;
                                             echo "</option>";
                                            }
                                            ?>
                                          </select>
                                        </td>
                                        <!-- question topics -->

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
                                            <button class="btn btn-danger btn-xs update update<?=$row->id?>" onclick="update_hide('<?=$row->id?>')">Cancel</button>
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