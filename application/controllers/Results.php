<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Results extends CI_Controller 
{


	 public function __construct()
	 {
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('html');
		$this->load->model('model');
    $this->load->model('admin_model');
    $this->load->model('main_model');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
    $this->load->library('session');
		$this->load->library("pagination");
	 }
 
	public function result()
	{

		if($this->input->server('REQUEST_METHOD')=='POST')
	   	{
			$post_data=$this->input->post();
			$reg_no=$post_data['search'];
			// $test=$this->admin_model->get_data_by_status('test')->row();
			$data['result']=$result=$this->model->get_results($reg_no,$test->id);
			// echo $result->stu_class;
			$t = array('test_id' => $test->id,
			          'class' => $result->stu_class );
      $test_marks=$this->admin_model->get_data_multi_column('test_marks',$t)->row();
      $window_date=$this->admin_model->get_data_multi_column('admission_window_date',array('id'=>1))->row();
		

      $test=$this->admin_model->get_data_multi_column('test',array('id'=>$result->test_id))->row();
      // echo $test->id;
    

      $windows1=$test->windows1;

      $windows2=explode(",",$test->windows2);
      $windows2_1=$windows2[0];
      $windows2_2=$windows2[1];

      $windows3=explode(",",$test->windows3);
      $windows3_1=$windows3[0];
      $windows3_2=$windows3[1];

      $windows4=$test->windows4;
			// echo "<pre>";
			// print_r($test_marks);
			// die();

			if (!$data['result'] or $test->status!=1) 
			{
				echo "<div class='col-md-12 text-center' style='color:red;height:100vh;'>";
				echo 'Record Not Found!';
				echo "<div>";
			}
			else
			{
				// echo "<pre>";
				// print_r($data['result']);

// result
?>
<style type="text/css">
   .watermark {
 /* width: 100%;
  height: 100%;*/
  display: block;
  position: relative;

}

.watermark::after {
  content: "";
 background:url(http://jeeexpert.com/images/logo/1539682677.jpg)  no-repeat;
 background-size:100%; 
 transform: rotate(25deg);
 margin:30% 2px 3px 4px;
  opacity: 0.2;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
</style>
<div class="col-md-12 col-lg-12 watermark">
<div class="col-lg-7 ">

    <table width="100%" class="parsnal"  >
    	<tr>
           <th>Reg. No.</th>
           <td><?=$result->stu_reg_number?></td>
       </tr>
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
           <td>
           	<?php echo  date("d-m-Y", strtotime($test->test_date)); ?>
           </td>
       </tr>

        <!-- <tr>
           <th>Test Time</th>
           <td> -->
           	<?php //echo  date("d-m-Y", strtotime($test->test_date));
           	// $time=  explode("-",$test->test_time);
                           //       echo date('h:i A',strtotime($time[0]))." - ";
                             //     echo date('h:i A',strtotime($time[1])); ?>
         <!--  </td>
       </tr>  -->

       <tr>
           <th>Present Class </th>
           <td><?=$result->present_class?></td>
       </tr> 

       <tr>
           <th>Class To Going</th>
           <td><?=$result->stu_class?></td>
       </tr> 


       <tr>
           <th>Performance</th>
           <?php 
            // $totalmarks = $test->total_marks_mat+$test_marks->total;
            // $marks=$result->marks_mat+$result->marks_sat;
            // $pr= round($marks*100/$totalmarks);
            $pr= $result->waiver_offered;
            ?>
        <td title="<?=$pr?>%">
            <?php 
           // echo $pr."%";
           if ($pr >= 90) { 
                echo "Very Excellent";
            }
            elseif ($pr >= 80) {
                echo "Excellent";
            } 
            elseif ($pr >= 70) {
                echo "Extremely Good";
            }
            elseif ($pr >= 60) {
                echo "Very Good";
            }
            elseif ($pr >= 50) {
                echo "Good";
            }
            elseif ($pr >= 40) {
                echo "Very Satisfactory";
            }
            else {
                echo "Satisfactory";
            }
              ?></td>
       </tr> 
    </table>
</div>
<div class="row" >
    <div class="col-lg-12">
      <br>
      <br>
      <br>
        <h2>Performance Report</h2>
        <div class="col-lg-12">
           <b>1.) MAT</b> <table width="100%" class="table table-striped table-bordered">
                <tr>
                    <th>Marks</th>
                    <th>Out Of</th>
                    <!-- <th> % Score</th> -->
                    <th>Percentage</th>
                    <!-- <th>Remarks</th> -->
                </tr>
                <tr>
                    <td>
                       <?=$result->marks_mat?> 
                    </td>
                    <td>
                       <?=$test_marks->MAT?>
                    </td>
                    <td>
                        <?php echo round($result->marks_mat*100/$test_marks->MAT); ?> %
                    </td>
                    <!-- <td>
                       
                    </td> -->
                    <!--  <td>
                      
                    </td> -->
                </tr>
            </table>
        </div>

        <div class="col-lg-12">
           <b>2.) SCIENCE</b> <table width="100%" class="table table-striped table-bordered">
                <tr>
                    <th>Physics </th>
                    <th>Chemistry </th>
                    <th>Mathematics </th>
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
                        <?=$test_marks->total?>
                    </td>
                    <td>
                        <?php   
                            echo  $p = round($total*100/$test_marks->total)." %";
                         ?> 
                    </td>

                </tr>
            </table>
        </div>
        <div>
             <p><b>Waiver Offered - </b>   <?=$result->waiver_offered?> %  (On Tuition Fee)
             <?=str_repeat("&nbsp;",13)?>  &   <?=str_repeat("&nbsp;",13)?>
             <b>Valid Upto - </b>   <?php echo  date("d-m-Y", strtotime($result->valid_upto)); ?></p>
             <br>
             <div class="col-md-12 text-center">
               <h4>Admission Window Date</h4>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 1</b></p>
                 <p>Till <?php echo  date("d M Y", strtotime($windows1)); ?> </p>
                 <p><?php echo $result->waiver_offered; ?>% (On Tuition Fee)</p>
               </div>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 2</b></p>
                 <p> <?php echo  date("d M Y", strtotime($windows2_1)); ?> - <?php echo  date("d M Y", strtotime($windows2_2)); ?>
                 </p>
                 <p><?php echo round($result->waiver_offered*3/4); ?>% (On Tuition Fee)</p>
               </div>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 3</b></p>
                 <p><?php echo  date("d M Y", strtotime($windows3_1)); ?> - <?php echo  date("d M Y", strtotime($windows3_2)); ?></p>
                 <p><?php echo round($result->waiver_offered/2); ?>% (On Tuition Fee)</p>
               </div>
               <div class="col-md-3" style="float: left;">
                 <p><b>Window - 4</b></p>
                 <p>After <?php echo  date("d M Y", strtotime($windows4)); ?> </p>
                 <p>No waiver</p>
                 <p><br></p>
                 <p><br></p>
               </div>
             </div>

            <p><b>Program Offered - </b>   <?=$result->program_offered?> </p>
            <br>
            <p><b>Disclaimer : </b>   <?=$result->disclaimer?></p>
            <p><b>Note : </b>   At the time of admission come with the Result.</p>
        </div>
    </div>
    <button onclick="printDiv('res')" class="btn btn-info" style="margin-left: 15px;margin-bottom:  10px" ><i class="fa fa-print"></i> Print</button>
  
 
</div>
</div>
<script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>

<?php
// result







				
			}
			die();
		}
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		// $data['meta_title'] = $data['program']->meta_title;
		// $data['meta_description'] = $data['program']->meta_description;
		// $data['meta_keywords'] = $data['program']->meta_keywords;
		

		$this->load->view('school/header',$data);
		$this->load->view('school/results');
		$this->load->view('school/footer');



	}





  public function result_report()
  {

    $data['menus'] = $this->model->get_categories();
    $data['f_news'] = $this->model->list_flash_news();
    $data['slides'] = $this->model->get_slides();
    $data['contact']=$this->model->get_contact();
    $data['about_us']=$this->model->get_about_us();
    $data['programs']=$this->model->get_programs();
    $data['social_media']=$this->model->get_social_media();
    // $data['meta_title'] = $data['program']->meta_title;
    // $data['meta_description'] = $data['program']->meta_description;
    // $data['meta_keywords'] = $data['program']->meta_keywords;
    

    $this->load->view('school/header',$data);
    $this->load->view('school/results_report');
    $this->load->view('school/footer');
  }




  public function get_results($reg_no)
  {
      // $post_data=$this->input->post();
      // $reg_no=$post_data['search'];

      $stu_detail=$this->main_model->get('admission', array('registration_no' => $reg_no,'deleted'=>0 ))[0];
      $result=$this->main_model->get('results', array('stu_reg_number' => $reg_no ))[0];


      if (!$stu_detail) {

        echo "Student Details Not Found"; die();
      }

      if (!$result) {
        echo "<div class='col-md-12 text-center' style='color:red;height:100vh;'>";
        echo 'Record Not Found!';
        echo "<div>"; die();
      }
      
      $student_id = $stu_detail->id;
      $test_date  = $stu_detail->admission_test_date;

      $data['test'] = $test=$this->main_model->get('test', array('test_date' => $test_date ))[0];
      $test_marks=$this->main_model->get('test_marks', array('test_id' => $test->id,'class'=>$stu_detail->program_code ))[0];
      // print_r($test);
      if ($test->status==0) 
      {
         // echo "string";
        echo "<div class='col-md-12 text-center' style='color:red;height:100vh;'>";
        echo 'Record Not Found!';
        echo "<div>";
        die();
      }

      if (!$stu_detail) {
        echo "Student Details Not Found"; die();
      }

      $student_ans=$this->main_model->get('students_ans', array('student_id' => $student_id ,'test_date'=>$test_date));
      if (!$student_ans) {
        echo "Student Answers Details Not Found"; die();
      }
      $studentAns=$student_ans[0];
     
      $paper_data= array();
      $totalMarks = 0;
      $correct_question = 0;
      $incorrect_question = 0;
      $notAnswered_question = 0;
      $total_question = 0;


      $S_paper_data= array();
      $S_report_3= array();
      $S_totalMarks = 0;
      $S_correct_question = 0;
      $S_incorrect_question = 0;
      $S_notAnswered_question = 0;
      $S_total_question = 0;
      $actual_marks_A = 0; $total_marks_A = 0;
      $actual_marks_B = 0; $total_marks_B = 0;
      $actual_marks_C = 0; $total_marks_C = 0;
      $actual_marks_D = 0; $total_marks_D = 0;
      $actual_marks_E = 0; $total_marks_E = 0;
      $actual_marks_F = 0; $total_marks_F = 0;
      $actual_marks_G = 0; $total_marks_G = 0;
      $actual_marks_H = 0; $total_marks_H = 0;
      foreach ($student_ans as $stu_ans) 
      {
          $question = $this->main_model->get('question_master', array('id' => $stu_ans->question_id ))[0];
          //echo "<pre>";
             // print_r($question);
              // echo "</pre>";
          if ($question->paper_category=='1') 
          {
              ++$total_question;
              $question_topic = $this->main_model->get('question_topics_master',array('id' => $question->topic_id ))[0]->title;
             
              $AllStudentsAns=$this->main_model->get('students_ans',array('question_paper' => $stu_ans->question_paper ,'test_date'=>$test_date,'paper_category'=>'1','question_id'=>$stu_ans->question_id));
              $ALLSTUDENTSCOUNT = count($AllStudentsAns);
              // echo "<pre>";
              // print_r($AllStudentsAns);
              // echo "</pre>";
              $AnsweredCorrectly=0;
              $AnsweredinCorrectly=0;
              $NotAnswered=0;
              foreach ($AllStudentsAns as $allstudents) {
                  if ($allstudents->question_id==$question->id) {
                    if ($allstudents->student_ans=='') {
                      ++$NotAnswered;
                    }
                    else if ($allstudents->student_ans==$question->correct_ans) {
                      ++$AnsweredCorrectly;
                    }
                    else if ($allstudents->student_ans!=$question->correct_ans) {
                      ++$AnsweredinCorrectly;
                    }
                    
                      
                  }
                 
              }
              // echo $AnsweredCorrectly_paper1.'<br>';

              
              if ($stu_ans->student_ans=='') {
                  $marks_awarded='';
                  ++$notAnswered_question;
              }
              else if ($question->correct_ans==$stu_ans->student_ans) {
                $marks_awarded='3';
                $totalMarks= $totalMarks+3;
                ++$correct_question;
              }
              else if ($question->correct_ans!=$stu_ans->student_ans) {
                $marks_awarded='-1';
                $totalMarks= $totalMarks-1;
                ++$incorrect_question;
              }

              $AnsweredCorrectly   = $AnsweredCorrectly*100/$ALLSTUDENTSCOUNT;
              $AnsweredinCorrectly = $AnsweredinCorrectly*100/$ALLSTUDENTSCOUNT;
              $NotAnswered         = $NotAnswered*100/$ALLSTUDENTSCOUNT;
              $paper['question_id']=$question->id;
              $paper['question']=$question->question_id;
              $paper['concept']=$question->concept;
              $paper['topic']=$question_topic;
              $paper['correct_ans']=$question->correct_ans;
              $paper['student_ans']=$stu_ans->student_ans;
              $paper['marks_awarded']=$marks_awarded;
              $paper['AnsweredCorrectly']= round($AnsweredCorrectly).' %';
              $paper['AnsweredinCorrectly']= round($AnsweredinCorrectly).' %';
              $paper['NotAnswered']= round($NotAnswered).' %';
              $paper['totalMarks']=$totalMarks;
              $paper_data[]=$paper;
        }

        else if ($question->paper_category=='2') {
              ++$S_total_question;
              $S_difficulty_level = $this->main_model->get('difficulty_level_master',array('id' => $question->difficultylavel_id ))[0];
              
              $S_question_topic = $this->main_model->get('question_topics_master',array('id' => $question->topic_id ))[0]->title;

              $S_AllStudentsAns=$this->main_model->get('students_ans', array('question_paper' => $stu_ans->question_paper ,'test_date'=>$test_date,'paper_category'=>'2','question_id'=>$stu_ans->question_id));
              $S_ALLSTUDENTSCOUNT = count($S_AllStudentsAns);

              $S_AnsweredCorrectly=0;
              $S_AnsweredinCorrectly=0;
              $S_NotAnswered=0;
              // all students
              foreach ($S_AllStudentsAns as $S_allstudents) {
                  if ($S_allstudents->question_id==$question->id) {
                    if ($S_allstudents->student_ans=='') {
                      ++$S_NotAnswered;
                    }
                    else if ($S_allstudents->student_ans==$question->correct_ans) {
                      ++$S_AnsweredCorrectly;
                    }
                    else if ($S_allstudents->student_ans!=$question->correct_ans) {
                      ++$S_AnsweredinCorrectly;
                    }
                    
                      
                  }
                 
              }

              // all students



              if ($stu_ans->student_ans=='') {
                  $S_marks_awarded='';
                  ++$S_notAnswered_question;
              }
              else if ($question->correct_ans==$stu_ans->student_ans) {
                $S_marks_awarded='3';
                $S_totalMarks= $S_totalMarks+3;
                ++$S_correct_question;
              }
              else if ($question->correct_ans!=$stu_ans->student_ans) {
                $S_marks_awarded='-1';
                $S_totalMarks= $S_totalMarks-1;
                ++$S_incorrect_question;
              }

               // report 2
              if ($S_difficulty_level->section=="A") {
                if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_A=$actual_marks_A+3;               
                }
                 $section_A='A';
                 $weightage_A= $S_difficulty_level->weightage;
                 $traits_analyzed_A=$S_question_topic;
                 $actual_marks_A=$actual_marks_A;
                 $total_marks_A=$total_marks_A+3;
              }
              else if ($S_difficulty_level->section=="B") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_B=$actual_marks_B+3;               
                }
                 $section_B='B';
                 $weightage_B= $S_difficulty_level->weightage;
                 $traits_analyzed_B=$S_question_topic;
                 $actual_marks_B=$actual_marks_B;
                 $total_marks_B=$total_marks_B+3;
              }
              else if ($S_difficulty_level->section=="C") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_C=$actual_marks_C+3;               
                }
                 $section_C='C';
                 $weightage_C= $S_difficulty_level->weightage;
                 $traits_analyzed_C=$S_question_topic;
                 $actual_marks_C=$actual_marks_C;
                 $total_marks_C=$total_marks_C+3;
              }
              else if ($S_difficulty_level->section=="D") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_D=$actual_marks_D+3;               
                }
                 $section_D='D';
                 $weightage_D= $S_difficulty_level->weightage;
                 $traits_analyzed_D=$S_question_topic;
                 $actual_marks_D=$actual_marks_D;
                 $total_marks_D=$total_marks_D+3;
              }
              else if ($S_difficulty_level->section=="E") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_E=$actual_marks_E+3;               
                }
                 $section_E='E';
                 $weightage_E= $S_difficulty_level->weightage;
                 $traits_analyzed_E=$S_question_topic;
                 $actual_marks_E=$actual_marks_E;
                 $total_marks_E=$total_marks_E+3;
              }
              else if ($S_difficulty_level->section=="F") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_F=$actual_marks_F+3;               
                }
                 $section_F='C';
                 $weightage_F= $S_difficulty_level->weightage;
                 $traits_analyzed_F=$S_question_topic;
                 $actual_marks_F=$actual_marks_F;
                 $total_marks_F=$total_marks_F+3;
              }
              else if ($S_difficulty_level->section=="G") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_G=$actual_marks_G+3;               
                }
                 $section_G='G';
                 $weightage_G= $S_difficulty_level->weightage;
                 $traits_analyzed_G=$S_question_topic;
                 $actual_marks_G=$actual_marks_G;
                 $total_marks_G=$total_marks_G+3;
              }
              else if ($S_difficulty_level->section=="H") {
                 if ($question->correct_ans==$stu_ans->student_ans) {
                    $actual_marks_H=$actual_marks_H+3;               
                }
                 $section_H='H';
                 $weightage_H= $S_difficulty_level->weightage;
                 $traits_analyzed_H=$S_question_topic;
                 $actual_marks_H=$actual_marks_H;
                 $total_marks_H=$total_marks_H+3;
              }
              else
              {

              }

             
              // report 2

              $S_AnsweredCorrectly   = $S_AnsweredCorrectly*100/$S_ALLSTUDENTSCOUNT;
              $S_AnsweredinCorrectly = $S_AnsweredinCorrectly*100/$S_ALLSTUDENTSCOUNT;
              $S_NotAnswered         = $S_NotAnswered*100/$S_ALLSTUDENTSCOUNT;

              $S_paper['question_id']=$question->id;
              $S_paper['question']=$question->question_id;
              $S_paper['topic']=$S_question_topic;
              $S_paper['concept']=$question->concept;
              $S_paper['difficulty_level']=$S_difficulty_level->difficulty_level;
              $S_paper['correct_ans']=$question->correct_ans;
              $S_paper['student_ans']=$stu_ans->student_ans;
              $S_paper['marks_awarded']=$S_marks_awarded;
              $S_paper['AnsweredCorrectly']= round($S_AnsweredCorrectly).' %';
              $S_paper['AnsweredinCorrectly']= round($S_AnsweredinCorrectly).' %';
              $S_paper['NotAnswered']= round($S_NotAnswered).' %';
              $S_paper['totalMarks']=$S_totalMarks;
              $S_paper_data[]=$S_paper;
              
        }
       
      }



// paper 1 data
        $data['stu_detail']= $stu_detail;
        $data['result']= $result;
        $data['test_marks']= $test_marks;
        $data['paper_data']= $paper_data;
        $data['totalMarks']= $totalMarks;
        $data['total_question']= $total_question;
        $data['correct_question']= $correct_question;
        $data['incorrect_question']= $incorrect_question;
        $data['notAnswered_question']= $notAnswered_question;
// paper 1 data

            if ($actual_marks_A==0 or $total_marks_A==0) {
                $scaled_A=0;
            }  
            else{
              $scaled_A=$actual_marks_A*100/$total_marks_A;
            }

            if ($actual_marks_B==0 or $total_marks_B==0) {
                $scaled_B=0;
            }  
            else{
              $scaled_B =$actual_marks_B*100/$total_marks_B;
            }

            if ($actual_marks_C==0 or $total_marks_C==0) {
                $scaled_C=0;
            }  
            else{
              $scaled_C=$actual_marks_C*100/$total_marks_C;
            }

            if ($actual_marks_D==0 or $total_marks_D==0) {
                $scaled_D=0;
            }  
            else{
              $scaled_D=$actual_marks_D*100/$total_marks_D;
            }

            if ($actual_marks_E==0 or $total_marks_E==0) {
                $scaled_E=0;
            }  
            else{
              $scaled_E=$actual_marks_E*100/$total_marks_E;
            }

            if ($actual_marks_F==0 or $total_marks_F==0) {
                $scaled_F=0;
            }  
            else{
              $scaled_F=$actual_marks_F*100/$total_marks_F;
            }

            if ($actual_marks_G==0 or $total_marks_G==0) {
                $scaled_G=0;
            }  
            else{
              $scaled_G=$actual_marks_G*100/$total_marks_G;
            }
            if ($actual_marks_H==0 or $total_marks_H==0) {
                $scaled_H=0;
            }  
            else{
              $scaled_H=$actual_marks_H*100/$total_marks_H;
            }

            
            
           
          // echo "<pre>";
          // echo "a-". $scaled_A."<br>";
          // echo  $scaled_B."<br>";
          // echo  $scaled_C."<br>";
          // echo  $scaled_D."<br>";
          // echo  $scaled_E."<br>";
          // echo  $scaled_F."<br>";
          // echo  $scaled_G."<br>";
          // echo  $scaled_H."<br>";
          // echo "</pre>";

        $SCIENTIFIC_APTITUDE= ($scaled_A*$weightage_A+$scaled_B*$weightage_B+$scaled_C*$weightage_C+$scaled_D*$weightage_D+$scaled_E*$weightage_E+$scaled_F*$weightage_F+$scaled_G*$weightage_G+$scaled_H*$weightage_H)/100;
         $SCIENTIFIC_APTITUDE=round($SCIENTIFIC_APTITUDE);
       
         // papre 2 data
        $data['S_paper_data']= $S_paper_data;
      
        $data['scientific_aptitude']= $SCIENTIFIC_APTITUDE;
        $data['S_totalMarks']= $S_totalMarks;
        $data['S_total_question']= $S_total_question;
        $data['S_correct_question']= $S_correct_question;
        $data['S_incorrect_question']= $S_incorrect_question;
        $data['S_notAnswered_question']= $S_notAnswered_question;
         // papre 2 data
      


        $this->load->view('school/get_result_report',$data);

  }



}
?>
