
<?php $i=1; foreach($question_master as $row) {    
 ?>
<tr class="">
  <td><?=$i?></td>
  <!-- Test -->
  <td class="V_data V_data<?=$row->id?>">
    <?=$row->test_date?>
  </td>
  <td class="update update<?=$row->id?>">
    <select class="form-control input-sm" name="test_date<?=$row->id?>" id="test_date<?=$row->id?>" title="Select Test" >
      <option value="">-- Select --</option>
      <?php
      foreach ($tests as $test) {
       $s=""; if ($test->test_date==$row->test_date) { $s="selected";  }
       echo "<option ".$s." value='".$test->test_date."'>";
       echo $test->test_date." ( ".$test->test_name." )";
       echo "</option>"; } ?>
    </select>
  </td>
  <!-- Test -->

  <!-- Question -->
  <td class="V_data V_data<?=$row->id?>">
    <?=$row->question_id?>
  </td>
  <td class="update update<?=$row->id?>">
    <input type="number" class="form-control input-sm"  name="question_id<?=$row->id?>" id="question_id<?=$row->id?>" placeholder="Question Id / Question Index" title="Question Id / Question Index">
  </td>
  <!-- Question -->

  <!-- Correct Answer -->
  <td class="V_data V_data<?=$row->id?>">
    <?=$row->correct_ans?>
  </td>
  <td class="update update<?=$row->id?>">
    <input type="text" class="form-control input-sm"  name="correct_ans<?=$row->id?>" id="correct_ans<?=$row->id?>" placeholder="Correct Answer" title="Correct Answer"  >
  </td>
  <!-- Correct Answer -->

  <!-- papre category -->
  <td class="V_data V_data<?=$row->id?>">
    <?php foreach ($paper_category as $p_category) {
           $s=""; if ($p_category->id==$row->paper_category) { 
           echo $p_category->category;
          }
        }
    ?>
  </td>
  <td class="update update<?=$row->id?>">
    <select class="ClassInput form-control input-sm" id="paper_category<?=$row->id?>" onchange="get_question_topics('<?=$row->id?>')" >
      <option value="">-- Select Paper Category --</option>
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
  <!-- paper category -->

  <!-- Topics / Difficulty Lavel -->
  <td class="V_data V_data<?=$row->id?>">
    <?php
      if ($row->paper_category=="1") {
        foreach ($QuestionTopics as $Q_Topics) {
          if ($Q_Topics->id==$row->topic_difficultylavel_id) { 
             echo $Q_Topics->title;
              }
            }
        }
        elseif ($row->paper_category=="2") {
          foreach ($DifficultyLevel as $D_Level) {
               if ($D_Level->id==$row->topic_difficultylavel_id) { 
               echo $D_Level->section;
              }
            }
        }
        else { }
    ?>
  </td>
  <td class="update update<?=$row->id?>">
    <?php if ($row->paper_category==1) { ?>
        <div class="col-lg-3 col-md-3" id="topic_difficultylavel<?=$row->id?>">
            <label for="">Topics / Difficulty Lavel</label>
            <span id="topic_difficultylavel_msg<?=$row->id?>" style="color: red"></span>
            <select class="form-control input-sm"  >
              <option value="">-- Select --</option>
             
            </select>
        </div>
    <?php } elseif ($row->paper_category==2) { ?>
        <div class="col-lg-3 col-md-3" id="topic_difficultylavel<?=$row->id?>">
            <label for="">Topics / Difficulty Lavel</label>
            <span id="topic_difficultylavel_msg<?=$row->id?>" style="color: red"></span>
            <select class="form-control input-sm"  >
              <option value="">-- Select --</option>
             
            </select>
        </div>
    <?php } else { } ?>
  </td>
  <!-- Topics / Difficulty Lavel -->
 
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

<tr class="update update<?=$row->id?>">
  <td>
    
  </td>
  <td colspan="2">
      <!-- test -->
        <label for="test_date">Test</label>
        <select class="form-control input-sm" name="test_date" id="test_date" title="Select Test" >
          <option value="">-- Select --</option>
          <?php
          foreach ($tests as $test) {
           $s=""; if ($test->test_date==$row->test_date) { $s="selected";  }
           echo "<option ".$s." value='".$test->test_date."'>";
           echo $test->test_date." ( ".$test->test_name." )";
           echo "</option>"; } ?>
        </select>
        <span id="error_msg_class"></span>
    
      <!-- test -->

      <!-- question -->
          
            <label for="question_id">Question Id / Question Index</label>
            <input type="number" class="form-control input-sm"  name="question_id" id="question_id" placeholder="Question Id / Question Index" title="Question Id / Question Index">
            <span id="error_msg"></span>
          
          <!-- question -->
  </td>
  
  <td colspan="2">
    <!--  Correct Answer -->
         
            <label for="correct_ans">Correct Answer</label>
            <input type="text" class="form-control input-sm"  name="correct_ans" id="correct_ans" placeholder="Correct Answer" title="Correct Answer"  >
            
        
          <!--  Correct Answer -->
          <!-- paper category -->
          
            <label for="paper_category">Paper Category </label>
            <select class="form-control input-sm" name="paper_category" id="paper_category" onchange="get_topic_difficultylavel('0')" >
              <option value="">-- Select --</option>
              <?php
              foreach ($paper_category as $p_category) {
               echo "<option value='".$p_category->id."'>";
               echo $p_category->category;
               echo "</option>";
              }
              ?>
            </select>
            
          <!-- paper category -->
  </td>
 
  <td colspan="3">
     <!-- Topics / Difficulty Lavel -->
          <div class="" id="topic_difficultylavel">
            <label for="">Topics / Difficulty Lavel</label>
            <span id="topic_difficultylavel_msg" style="color: red"></span>
            <select class="form-control input-sm"  >
              <option value="">-- Select --</option>
             
            </select>
          </div>
          <!-- Topics / Difficulty Lavel -->

          <!-- Topics / Difficulty Lavel -->
          <div class="" id="sub_topic">

          </div>
          <!-- Topics / Difficulty Lavel -->
 
      <!-- action -->
          <div class="" style="padding-top: 20px;">
            <input type="button" class="btn btn-success " onclick="form_submit()"  value="Add" style="float: left;">
            <input type="reset" onclick="clear_form()" class="btn btn-danger" value="Cancel" style="float: left;">
          </div>
          <!-- action --> 
  </td>

</tr>
<?php $i++; } ?>
<script type="text/javascript">
// onload hide
// $('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();
  // $('#id01').hide();


// // Get the modal
// var modal = document.getElementById('id01');

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }


function show_model()
{
  // var modal = document.getElementById('id01');
  //  modal.style.display = "block";
  $('#id01').show();
}


function edit(id){
  $('.update').hide(); 
  $('.V_data').show(); 
  $('#add_form').hide();

  $('.V_data'+id).hide();
  $('.update'+id).show(); 
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table');
}

function update(id)
{
  var section          = $('#sectionInput'+id).val();
  var difficulty_level = $('#difficulty_levelInput'+id).val();
  var parameters       = $('#parametersInput'+id).val();
  var desc             = $('#descInput'+id).val();
  var weightage        = $('#weightageInput'+id).val();
  var paper_category   = $('#paper_categoryInput'+id).val();
 
  // alert(paper_category); return;
  var SendData = {section:section,difficulty_level:difficulty_level,parameters:parameters,weightage:weightage,paper_category:paper_category,desc:desc};
 if (section.length==0 || difficulty_level.length==0 || parameters.length==0 || weightage.length==0 || desc.length==0 ) { $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>');  return; }
  else { $('#error_msg_form').html(''); }

      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_difficulty_level/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table'); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">Difficulty Level Already Exist.</span>'); }
        }
      });
}
</script>