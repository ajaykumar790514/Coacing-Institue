<?php
// print_r($paper1); die();
?>
<style type="text/css">
  @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>
<div class="col-md-12 col-lg-12" id="printableArea">
  <div class="col-lg-7 ">
      <table width="100%" class="parsnal"  >
      <tr>
           <th>Reg. No.</th>
           <td><?=$stu_detail->registration_no?></td>
       </tr>
       <tr>
           <th>Student Name</th>
           <td><?=$stu_detail->student_name?></td>
       </tr> 

       <tr>
           <th>Father's Name</th>
           <td><?=$stu_detail->father_name?></td>
       </tr> 

       <tr>
           <th>Mother's Name</th>
           <td><?=$stu_detail->mother_name?> </td>
       </tr> 

       <tr>
           <th>Test Date</th>
           <td>
            <!-- <?php echo  $test_date; ?> -->
            <?php echo  date("d-m-Y", strtotime($stu_detail->admission_test_date)); ?>
           </td>
       </tr>


       <tr>
           <th>Present Class </th>
           <td><?=$stu_detail->present_class?></td>
       </tr> 

       <tr>
           <th>Class To Going</th>
           <td><?=$stu_detail->program_code?></td>
       </tr> 
       <tr>
         <th>Scientific Aptitude</th>
         <td><?=$scientific_aptitude?> %</td>
       </tr>

       <tr>
         <th>Recommendations</th>
         <td>






         </td>
       </tr>
    </table>
  </div>
  <!-- <div class="col-lg-12 col-md-12"> -->
    <?php
     $test=$this->admin_model->get_data_multi_column('test',array('test_date'=>$stu_detail->admission_test_date))->row();
      // echo $test->id;
    

      $windows1=$test->windows1;

      $windows2=explode(",",$test->windows2);
      $windows2_1=$windows2[0];
      $windows2_2=$windows2[1];

      $windows3=explode(",",$test->windows3);
      $windows3_1=$windows3[0];
      $windows3_2=$windows3[1];

      $windows4=$test->windows4;
    ?>
        <div>
            <!--  <p><b>Waiver Offered - </b>   <?=$scientific_aptitude?> %  (On Tuition Fee)
             <?=str_repeat("&nbsp;",13)?>  &   <?=str_repeat("&nbsp;",13)?> -->
             <!-- <b>Valid Upto - </b>   <?php // echo  date("d-m-Y", strtotime($result->valid_upto)); ?></p> -->
             <br>
             <div class="col-md-12 text-center">
               <h4>Admission Window Date</h4>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 1</b></p>
                 <p>Till <?php echo  date("d M Y", strtotime($windows1)); ?> </p>
                 <p><?php echo $scientific_aptitude; ?>% (On Tuition Fee)</p>
               </div>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 2</b></p>
                 <p> <?php echo  date("d M Y", strtotime($windows2_1)); ?> - <?php echo  date("d M Y", strtotime($windows2_2)); ?>
                 </p>
                 <p><?php echo round($scientific_aptitude*3/4); ?>% (On Tuition Fee)</p>
               </div>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 3</b></p>
                 <p><?php echo  date("d M Y", strtotime($windows3_1)); ?> - <?php echo  date("d M Y", strtotime($windows3_2)); ?></p>
                 <p><?php echo round($scientific_aptitude/2); ?>% (On Tuition Fee)</p>
               </div>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 4</b></p>
                 <p>After <?php echo  date("d M Y", strtotime($windows4)); ?> </p>
                 <p>No waiver</p>
                 <p><br></p>
                
               </div>
             </div>

          
        </div>

    
      <br>
     
        <center><h4>Performance Report</h4></center>
       
           <table width="100%" class="table table-striped table-bordered">
                <tr>
                    <th>Marks</th>
                    <th>Out Of</th>
                    <!-- <th> % Score</th> -->
                    <th>Percentage</th>
                    <!-- <th>Remarks</th> -->
                </tr>
                <tr>
                    <td>
                       <?=$totalMarks?> 
                    </td>
                    <td>
                       <?php echo $out_of = $total_question*4; ?>
                    </td>
                    <td>
                        <?php echo round($totalMarks*100/$out_of); ?> %
                    </td>
                    <!-- <td>
                       
                    </td> -->
                    <!--  <td>
                      
                    </td> -->
                </tr>
            </table>





<!--  <h3>Dear Mr/Mrs - <?=$stu_detail->student_name?></h3>
      <div  class="col-md-5">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Total Marks</th>
            <td><?=$totalMarks?></td>
          </tr>
          <tr>
            <th>Total Question</th>
            <td><?=$total_question?></td>
          </tr>
          <tr>
            <th>Correct</th>
            <td><?=$correct_question?></td>
          </tr>
          <tr>
            <th>Incorrect</th>
            <td><?=$incorrect_question?></td>
          </tr>  
          <tr>
            <th>Not Answered</th>
            <td><?=$notAnswered_question?></td>
          </tr>
      </table>
      </div> -->
      <div class="row">
        <div class="col-md-12">
          <!-- <h3>Report - 1</h3> -->
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Q. No.</th>
                <th>Topic</th>
                <th>Correct Answer</th>
                <th>Your Responce</th>
                <th>Marks Awarded</th>
                <th>% Of students who answered correctly to this question</th>
                <th>% Of students who answered incorrectly to this question</th>
                <th>% Of students who did not answered  this answer</th>
              </tr>
            </thead>
            <tbody> 
            <?php
            foreach ($paper_data as $q_1) {
                ?>
              <tr>
                <td><?=$q_1['question']?></td>
                <td><?=$q_1['topic']?></td>
                <td><?=$q_1['correct_ans']?></td>
                <td><?=$q_1['student_ans']?></td>
                <td><?=$q_1['marks_awarded']?></td>
                <td><?=$q_1['AnsweredCorrectly']?></td>
                <td><?=$q_1['AnsweredinCorrectly']?></td>
                <td><?=$q_1['NotAnswered']?></td>
              </tr>
                <?php
            }
            ?> 
            </tbody>
          </table>
        </div>
      </div> 


      <!-- <div class="row">
        <div class="col-md-12">
          <h3>Report - 2</h3>
          <p>graph</p>
        </div>
      </div> 
        -->

      <div class="row">
        <div class="col-md-12">
          <!-- <h3>Report - 3</h3> -->
         <center>
           <h5><b>
           Recommendations
          </b></h5>
         </center> 
                   <?php
           if ($scientific_aptitude>=90) {
            $recommendations='Congratulations!!
                              You have performed brilliantly and Extraordinary.
                              You have capability to reach the pinnacle of success in
                              Science & Technology. Should try Higher Studies in
                              Science/Technology from Reputed universities or colleges in
                              the world. You can write JEE Advanced and with regular and
                              sincere studies in future you are most likely to get a top rank
                              in JEE.';
            }
            else if ($scientific_aptitude>=80) {
                $recommendations='Congratulations!!
                                  You have performed very well.
                                  You have capability to pursue any career in Science &
                                  Technology. However a little more hard work and planning
                                  can push you towards extraordinary performance. You ca
                                  write JEE Advanced and with regular and sincere studies
                                  future you are most likely to get a top rank in JEE.';
            }
            else if ($scientific_aptitude>=70) {
                $recommendations='Congratulations!!
                                  You performance in really appreciable.
                                  You have potential to excel in the Science and technology
                                  field. However you need to analyze your strength and
                                  weaknesses and take help from the experts to fix your
                                  problems. With a regular study plan and more written
                                  practice of numerical you can very easily secure a good rank
                                  in JEE Advance.';
            }
            else if ($scientific_aptitude>=60) {
                $recommendations='Congratulations!!
                                  You performance in really a very good performance.
                                  Studying science requires a routine in studies, love towards
                                  nature and its gift in form of various technologies and
                                  activities. We feel something lacking in your study schedule.
                                  With a clear aim in mind, you must start working on it. You
                                  have a full potential to qualify JEE Mains & advance with a
                                  decent rank. You also need to think for guidance in
                                  preparing for JEE.';
            }
            else if ($scientific_aptitude>=55) {
                $recommendations='Congratulations!
                                  You performance is really a good performance.
                                  You could have performed very well. We find lack of routine
                                  and sincerity in your self-study. Reading of books related to
                                  your subjects can help you at any stage. You must choose a
                                  good institution for helping you to learn science and
                                  mathematics. You may then appear in JEE Main/Advanced
                                  for getting a rank. Nothing is impossible with focus and
                                  dedication.';
            }
            else if ($scientific_aptitude>=45) {
                $recommendations='Congratulations!!
                                  You performance is an average performance.
                                  Its never too late to be punctual and sincere in studies and
                                  we believe that you have already planned for the same. We
                                  just recommend you to choose a good institution, follow their
                                  guidelines and have sufficient self-study. After that you can
                                  try for pursuing career in science in any good university in
                                  India';
            }
            else  {
                $scientific_aptitude='We are not happy to share the performance feedback with
                                  you. Something went wrong and you could not perform well.
                                  With such performance we do not Recommend for Science
                                  and technology career.';
            }
            echo $recommendations;
          ?>
         <!--  <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Section</th>
                <th>% Weigthage</th>
                <th>Traits Analyzed</th>
                <th>Actual Score by Candiadte</th>
                <th>Total Marks for this Category in paper</th>
                <th>Scaled on level of 100</th>
              </tr>
            </thead>
            <tbody> 
            <?php
            //foreach ($report_3 as $r_3) {
                ?>
              <tr>
                <td><?=$r_3['section']?></td>
                <td><?=$r_3['weightage']?></td>
                <td><?=$r_3['traits_analyzed']?></td>
                <td><?=$r_3['actual_marks']?></td>
                <td><?=$r_3['total_marks']?></td>
                <td><?=$r_3['scaled']?></td>
              </tr>
                <?php
            //}
            ?> 
            </tbody>
          </table> -->
        </div>
      </div> 
</div>
<div class="col-lg-12 col-md-12">
    <input type="button" class="btn btn-warning btn-xs" style="float: right" onclick="printDiv('printableArea')" value="print" />
    <br>
    <br>
    <br>
</div>


<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>