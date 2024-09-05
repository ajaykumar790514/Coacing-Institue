<?php 
      // print_r($test);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jee Expert Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">

  </style>
</head>
<body>


<style type="text/css">
  body * h3,h4{
    text-align:center;
  }

   body * {

    padding-left: 50px;
    padding-right: 50px;
  }
  .printS
  {
    display: none; 
  }
  @media print {
  body * {

    padding-left: 50px;
    padding-right: 50px;
  }
  .printS
  {
    display: block; 
  }
  #pp{
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }*/
  #printableArea {
    position: absolute;
    left: 0;
    top: 0;
    font-size: 8px!important
   /* padding-left: 10px;
    padding-right: 10px;*/
  }
}
#printableArea
{font-size: 12px!important}


</style>
<div class="container" id="printableArea" >
  <div class="row">
      <img src="<?=base_url()?>image/NEW-LOGO2.jpg" >
  </div>
  <!-- main result -->
  <div class="row">
     <h3>Your Performance</h3>
     <!-- <h3>JEE EXPERT SCIENTIFIC APTITUDE TEST (J-SAT 2019) </h3> -->
     <h3><?=$test->test_name?> <?=(@$test->session) ? '('.$test->session.')' : '' ?></h3>
     

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
             
             
  </div>
  <!-- main result -->
  <!-- Performance Report  -->
  <div class="row">
       <h3>Performance Report </h3>
       <table width="100%" class="table table-striped table-bordered">
        <tr>
          <th>Subject</th> 
          <th>Marks</th> 
          <th>Out Of</th>
          <th>Percentage</th>
        </tr>
        <tr>
          <td>PAPER-1 (MAT)</td>
          <td><?=$totalMarks?></td>
          <td><?php echo $out_of = $test_marks->MAT; ?></td>
          <td><?php echo round($totalMarks*100/$out_of); ?> %</td>
        </tr>
        <tr>
          <td>PAPER-2 (SAT)</td>
          <td><?=$S_totalMarks?></td>
          <td><?php echo $S_out_of = $test_marks->total; ?></td>
          <td><?php echo round($S_totalMarks*100/$S_out_of); ?> %</td>
        </tr>
       </table>
       <b>Waiver Offered - </b><?=$result->waiver_offered?> %  (On Tuition Fee)
  </div>
  <!-- Performance Report -->

  <!--Admission Window Date  -->
  <div class="row">
       <h3>Admission Window Date </h3>
       <table width="100%" class="text-center" >
        <tr>
          <th  class="text-center" >Window - 1</th> 
          <th  class="text-center" >Window - 2</th> 
         <!--  <th  class="text-center" >Window - 3</th>
          <th  class="text-center" >Window - 4</th> -->
        </tr>
        <tr>
          <td>
            Till <?php echo  date("d M Y", strtotime($windows1)); ?> <br>
            <?php echo $result->waiver_offered; ?>% (On Tuition Fee)
          </td>
          <td>
              <?php echo  date("d M Y", strtotime($windows2_1)); ?> - <?php echo  date("d M Y", strtotime($windows2_2)); ?><br>
                <?php echo round($result->waiver_offered*3/4); ?>% (On Tuition Fee)
          </td>
        <!--   <td>
             <?php // echo  date("d M Y", strtotime($windows3_1)); ?> - <?php // echo  date("d M Y", strtotime($windows3_2)); ?><br>
            <?php// echo round($result->waiver_offered/2); ?>% (On Tuition Fee)
          </td>
          <td>
              After <?php // echo  date("d M Y", strtotime($windows4)); ?><br>
                 No waiver
          </td> -->
        </tr>
       </table>
       <br>
      <p><b>Valid Upto - </b> <?=$result->valid_upto?>   </p>    

      <p><b>Program Offered –  </b>   <?php echo  $result->program_offered; ?></p>
  </div>
  <!-- Admission Window Date -->
  <!-- papre 1 -->
  <div class="row">
       <h3>Micro Level Performance Report </h3>
       <h4>Mental Ability (Paper -1) </h4>
       <table width="100%" class="table table-striped table-bordered">
        <tr>
          <th>Marks</th>
          <th>Out Of</th>
          <th>Percentage</th>
        </tr>
        <tr>
          <td><?=$totalMarks?></td>
          <td><?php echo $out_of = $test_marks->MAT; ?></td>
          <td><?php echo round($totalMarks*100/$out_of); ?> %</td>
        </tr>
       </table>
       <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Q. No.</th>

                <th>Correct Answer</th>
                <th>Your Responce</th>
                <th>Marks Awarded</th>
                <th>Subject</th>
                <th>Concept</th>
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
                <td><?=$q_1['correct_ans']?></td>
                <td><?=$q_1['student_ans']?></td>               
                <td><?=$q_1['marks_awarded']?></td>
                <td><?=$q_1['topic']?></td>
                <td><?=$q_1['concept']?></td>
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
  <!-- paper 1 -->
  <!-- papre 2 -->
  <div class="row">
    <div class="printS">
      <br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br>
    </div>
    
       <h3>Micro Level Performance Report </h3>
       <h4>Physics, Chemistry, Mathematics (Paper -2) </h4>
       <table width="100%" class="table table-striped table-bordered">
        <tr>
          <th>Marks</th>
          <th>Out Of</th>
          <th>Percentage</th>
        </tr>
        <tr>
          <td><?=$S_totalMarks?></td>
          <td><?php echo $S_out_of = $test_marks->total; ?></td>
          <td><?php echo round($S_totalMarks*100/$S_out_of); ?> %</td>
        </tr>
       </table>
       <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Q. No.</th>

                <th>Correct Answer</th>
                <th>Your Responce</th>
                <th>Marks Awarded</th>
                <th>Subject</th>
                <th>Concept</th>
                <th>Parameters Of Testing</th>
                <th>% Of students who answered correctly to this question</th>
                <th>% Of students who answered incorrectly to this question</th>
                <th>% Of students who did not answered  this answer</th>
              </tr>
            </thead>
            <tbody> 
            <?php
            foreach ($S_paper_data as $q_2) {
                ?>
              <tr>
                <td><?=$q_2['question']?></td>
                <td><?=$q_2['correct_ans']?></td>
                <td><?=$q_2['student_ans']?></td>               
                <td><?=$q_2['marks_awarded']?></td>
                <td><?=$q_2['topic']?></td>
                <td><?=$q_2['concept']?></td>
                <td><?=$q_2['difficulty_level']?></td>
                <td><?=$q_2['AnsweredCorrectly']?></td>
                <td><?=$q_2['AnsweredinCorrectly']?></td>
                <td><?=$q_2['NotAnswered']?></td>
              </tr>
                <?php
            }
            ?> 
            </tbody>

        </table>
  </div>
  <!-- paper 2 -->
  <!-- recommendations-->
  <div class="row text-center">
     <div class="printS">
      <br><br><br><br><br><br><br>
    </div>
       <h3>Recommendations</h3>

        <?php
        $recommendations_p = $result->waiver_offered;
        // echo $scientific_aptitude=34;
           if ($recommendations_p>=90) {
            $recommendations='Congratulations!!<br>
You have performed Brilliantly and Extraordinary.<br>
You have capability to reach the pinnacles of success in Science & Technology.<br>Should try Higher Studies in Science/Technology from Reputed universities or colleges in the world.<br> You can write JEE Advanced/NEET and with regular and sincere studies in future you are most likely to get a top rank in JEE.';
            }
            else if ($recommendations_p>=80) {
                $recommendations='Congratulations!!<br>
You have performed very well.<br>
You have capability to pursue any career in Science & Technology.<br> However a little more hard work and planning can push you towards extraordinary performances.<br> You can write JEE Advanced/NEET and with regular and sincere studies in future you are most likely to get a top rank in JEE.';
            }
            else if ($recommendations_p>=70) {
                $recommendations='Congratulations!!<br>
Your performance is really appreciable.<br>
You have potential to excel in the Science and technology field.<br> However you need to analyze your strength and weaknesses and take help from the experts to fix your problems.<br> With a regular study plan and more written practice of numerical you can very easily secure a good rank in JEE Advance/NEET.';
            }
            else if ($recommendations_p>=60) {
                $recommendations='Congratulations!!<br>
Your performance is really a very good performance.<br>
Studying science requires a routine in studies, love towards nature and its gift in form of various technologies and activities.<br> We feel something lacking in your study schedule. With a clear aim in mind, <br>you must start working on it. You have a full potential to qualify JEE Mains/Advance/NEET with a decent rank.<br> You also need to think for guidance in preparing for JEE. ';
            }
            else if ($recommendations_p>=50) {
                $recommendations='Congratulations!!<br>
Your performance is really a good performance.<br>
You could have performed very well. We find lack of routine and sincerity in your self-study.<br> Reading of books related to your subjects can help you at any stage. You must choose a good institution for helping you to learn science and mathematics.<br> You may then appear in JEE Main/Advanced/NEET for getting a rank. Nothing is impossible with focus and dedication. ';
            }
            else if ($recommendations_p>=25) {
                $recommendations='Congratulations!!<br>
Your performance is an average performance.<br>
It’s never too late to be punctual and sincere in studies and we believe that you have already planned for the same.<br> We just recommend you to choose a good institution, follow their guidelines and have sufficient self-study.<br> After that you can try for pursuing career in science in any good university in India.';
            }
            else  {
                $recommendations='We are not happy to share the performance feedback with you.<br> Something went wrong and you could not perform well.<br> With such performance we do not Recommend for Science and technology career. ';
            }
            echo $recommendations;
          ?>
  </div>
  <!-- recommendations -->
</div>

<div class="col-lg-12 col-md-12">
    <input type="button" class="btn btn-warning print" id="pp" style="float: right" onclick="printDiv('printableArea')" value="print" />
    <br>
    <br>
    <br>
</div>


<script type="text/javascript">
  function printDiv(divName) {
     // var printContents = document.getElementById(divName).innerHTML;
     // var originalContents = document.body.innerHTML;

     // document.body.innerHTML = printContents;

     window.print();

     // document.body.innerHTML = originalContents;
}
</script>

</body>
</html>