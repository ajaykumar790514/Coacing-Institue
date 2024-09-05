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
    </table>
  </div>
  <!-- <div class="col-lg-12 col-md-12"> -->
    
      <br>
      <br>
      <br>
        <h2>Performance Report</h2>
       
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
     

<!-- </div> -->




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