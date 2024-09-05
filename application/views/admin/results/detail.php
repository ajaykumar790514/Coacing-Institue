
<div class="col-lg-7">

    <table width="100%" class="parsnal"  >
       <tr>
           <th>Student Name</th>
           <td><?=$result->student_name?></td>
       </tr> 

       <tr>
           <th>Father's Name</th>
           <td><?=$result->father_name?></td>
       </tr> 

       <tr>
           <th>Mother's Name</th>
           <td><?=$result->mother_name?> </td>
       </tr> 

       <tr>
           <th>Test Date</th>
           <td><?=$test->test_date?></td>
       </tr> 

       <tr>
           <th>Present Class </th>
           <td><?=$result->present_class?></td>
       </tr> 

       <tr>
           <th>Class To Going</th>
           <td><?=$result->program_code?></td>
       </tr> 

       
    </table>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Performance Report</h2>
        <div class="col-lg-12">
           1.) MAT <table width="100%" class="table table-striped table-bordered">
                <tr>
                    <th>Marks</th>
                    <th>Out Of</th>
                    <th> % Score</th>
                    <th>Percentile</th>
                    <th>Remarks</th>
                </tr>
                <tr>
                    <td>
                       <?=$result->marks_mat?> 
                    </td>
                    <td>
                       <?=$test->total_marks_mat?>
                    </td>
                    <td>
                        <?php echo round($result->marks_mat*100/$test->total_marks_mat); ?> %
                    </td>
                    <td>
                       
                    </td>
                     <td>
                      
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-lg-12">
           2.) SAT <table width="100%" class="table table-striped table-bordered">
                <tr>
                    <th>Physics Marks</th>
                    <th>Chemistry Marks</th>
                    <th>Math Marks</th>
                    <th>Total</th>
                    <th>Out Of</th>
                    <th>Percentage</th>
                </tr>
                <tr>
                    <td>
                       <?=$result->marks_sat_physics?> 
                    </td>
                    <td>
                       <?=$result->marks_sat_chemistry?>
                    </td>
                    <td>
                        <?=$result->marks_sat_math?>
                    </td>
                    <td>
                       <?php echo $total= $result->marks_sat_physics
                                 +$result->marks_sat_chemistry
                                 +$result->marks_sat_math; ?>
                    </td>
                     <td>
                        <?=$test->total_marks_sat?>
                    </td>
                    <td>
                        <?php   
                            echo  $p = round($total*100/$test->total_marks_sat)." %";
                         ?> 
                    </td>

                </tr>
            </table>
        </div>
        <div>
            <p><b>Waiver Offered - </b>   <?=$result->waiver_offered?>
             <?=str_repeat("&nbsp;",13)?>  &   <?=str_repeat("&nbsp;",13)?>
             <b>Valid Upto - </b>   <?=$result->valid_upto?></p>
            <p><b>Program Offered - </b>   <?=$result->program_offered?></p>
            <br>
            <p><b>Disclaimer : </b>   <?=$result->disclaimer?></p>
        </div>
    </div>
    
</div>
