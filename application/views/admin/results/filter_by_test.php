 <?php $i=1; foreach($result->result() as $row){ 
                                        ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td><?=$active_test->test_name?></td>
                                        <!-- <td><?=$active_test->test_date?></td> -->
                                        <td><?=$row->registration_no?></td>
                                        <td><?=$row->student_name?></td>
                                        
                                      
                                        <td>
                                            <a data-toggle="modal" data-target="#mark_model" class="btn btn-warning" title="VIEW DETAILS"
                                            onclick="stu_marks(<?=$row->s_id?>)">
                                                View / Fill Marks
                                            </a>
                                        </td>

                                        <td>
                                            <span id="active_status<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success" onclick="activate_inactive(<?=$row->r_id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger" onclick="activate_inactive(<?=$row->r_id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                        </td>
                                       
                                        <td>
                                            <a href="<?=base_url()?>index.php/result_master/update_result/<?=$row->r_id?>" class="btn btn-warning" title="EDIT">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <!-- <a data-toggle="modal" data-target="#myModal" class="btn btn-warning" title="VIEW DETAILS"
                                            onclick="result_detail(<?=$row->r_id?>)">
                                                <i class="fa fa-info"></i>
                                            </a> -->
                                            <!-- <a href="<?=base_url()?>index.php/admin/delete/results/<?=$row->r_id?>" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete?')">
                                                <i class="fa fa-trash"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>