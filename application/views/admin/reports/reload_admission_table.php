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
                                        <td>
                                              <?=$stu_program?>
                                         </td>
                                         <td>
                                            <?php 
                                              echo $stu_batch;?>
                                        </td>
                                        <td><?=$row->enrollment_no?></td>
                                        <td><?=$row->name?>
                                        s\o  ( 
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
                                            <?=$row->mobile_no?>  
                                        </td>
                                        <td>
                                        <?=$row->mobile_no2?>
                                        </td>
                                        <td>
                                            <?php
                                            echo date('d F Y', strtotime($row->enrollment_date));?>
                                            </td>
                                    </tr>
                                    <?php $n++; } ?>