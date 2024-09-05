
<?php $i=1; foreach($question_master as $row) {    
 ?>
<tr class="V_data V_data<?=$row->id?>">
  <td><?=$i?></td>
  <td>
    <?php foreach ($paper_category as $p_category) {
           $s=""; if ($p_category->id==$row->paper_category) { 
           echo $p_category->category;
          }
        }
    ?>
  </td>
  <td><?=$row->test_date?></td>
  <td>
    <?php foreach ($QuestionPapers as $Q_Papers) {
           $s=""; if ($Q_Papers->id==$row->question_paper) { 
           echo $Q_Papers->paper_title;
          }
        }
    ?>
  </td>
  <td><?=$row->class?> <sup>th</sup></td>
  <td><?=$row->question_id?></td>
  <td><?=$row->correct_ans?></td>
  <td><?=$row->concept?></td>

  <!-- Topics -->
  <td>
    <?php
        foreach ($QuestionTopics as $Q_Topics) {
          if ($Q_Topics->id==$row->topic_id) { 
             echo $Q_Topics->title;
              }
            }
        
    ?>
  </td>
 
  <!-- Topics -->

    <!-- Difficulty Lavel -->
  <td>
    <?php
          foreach ($difficulty_lavel as $D_Level) {
               if ($D_Level->id==$row->difficultylavel_id) { 
               echo $D_Level->section;
              }
            }
       
    ?>
  </td>
 
  <!-- Difficulty Lavel -->

  <!-- action -->
  <td>
    <a href="javascript:void(0)" class="btn btn-warning btn-xs" onclick="edit('<?=$row->id?>')">
      <i class="fa fa-edit"></i>
    </a>
  </td>
  <!-- action -->
</tr>

<tr class="update update<?=$row->id?>">
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <!-- <td><?=$row->class?> <sup>th</sup></td> -->
  
  <td colspan="4">

    <div class="col-lg-12 col-md-12" id="update_msg_form<?=$row->id?>"></div>

      <!-- class -->
      <?php $class = array(
                        '9' => '9 <sup>th</sup>',
                        '10' => '10 <sup>th</sup>',
                        '11' => '11 <sup>th</sup>',
                        '12' => '12 <sup>th</sup>',
                        '13' => '13 <sup>th</sup>',
           ); ?>
      <label for="stuCLASS<?=$row->id?>">Class</label>
        <select class="form-control input-sm" name="stuCLASS<?=$row->id?>" id="stuCLASS<?=$row->id?>" title="Select Class" >
          <option value="">-- Select --</option>
          <?php 
          foreach ($class as $key => $value) {
           $s=""; if ($key==$row->class) { $s="selected";  }
             echo "<option ".$s." value='".$key."'>";
             echo $value;
             echo "</option>"; 
            } 
            ?>
        </select>
      <!-- class -->
      <!-- question -->
      <label for="question_id<?=$row->id?>">Question Id / Question Index</label>
      <input type="number" class="form-control input-sm"  name="question_id<?=$row->id?>" id="question_id<?=$row->id?>" value="<?=$row->question_id?>" placeholder="Question Id / Question Index" title="Question Id / Question Index">
          <!-- question -->

       <!--  Correct Answer -->
    <label for="correct_ans<?=$row->id?>">Correct Answer</label>
    <input type="text" class="form-control input-sm"  name="correct_ans<?=$row->id?>" id="correct_ans<?=$row->id?>" value="<?=$row->correct_ans?>" placeholder="Correct Answer" title="Correct Answer" style="width: 220px;" oninput="$(this).val($(this).val().toUpperCase());" >
    <!--  Correct Answer -->
    <!--  Concept -->
    <label for="concept<?=$row->id?>">Concept</label>
    <input type="text" class="form-control input-sm"  name="concept<?=$row->id?>" id="concept<?=$row->id?>" value="<?=$row->concept?>" placeholder="Question Concept" title="Question Concept" style="width: 220px;"  >
    <!--  Concept -->

  </td>
 
  <td colspan="2">
    <label for="Q_TOPICS<?=$row->id?>">Question Topics</label>
    <select class="form-control input-sm" name="Q_TOPICS<?=$row->id?>" id="Q_TOPICS<?=$row->id?>" title="Select Question Topics" >
          <option value="">-- Select --</option>
      <?php
        foreach ($QuestionTopics as $Q_Topics) {
          if ($Q_Topics->paper_category==$row->paper_category) { 
            $selected="";
             if ($Q_Topics->id==$row->topic_id) { 
            $selected="selected";
              }
             echo "<option ".$selected." value='".$Q_Topics->id."'>";
             echo $Q_Topics->title;
             echo "</option>"; 
              }
            }    
    ?>
    </select>
    <?php if ($row->paper_category==2) { ?>
    <label for="Q_difficulty_lavel<?=$row->id?>">Difficulty Lavel</label>
    <select class="form-control input-sm" name="Q_difficulty_lavel<?=$row->id?>" id="Q_difficulty_lavel<?=$row->id?>" title="Select Question Topics" >
          <option value="">-- Select --</option>
    <?php

          foreach ($difficulty_lavel as $D_Level) {
            $selected=" ";
               if ($D_Level->id==$row->difficultylavel_id) { 
            $selected="selected";
              }
               echo "<option ".$selected." value='".$D_Level->id."'>";
               echo $D_Level->section;
               echo "</option>"; 
            }
       
    ?>
    </select>
    <?php } else{ ?>
        <input type="hidden" name="Q_difficulty_lavel<?=$row->id?>" id="Q_difficulty_lavel<?=$row->id?>" value="0">
   <?php } ?>

    </td>
 


  <td>
       <!-- action -->
    <div class="" style="padding-top: 20px;">
      <button class="btn btn-success btn-xs" onclick="update('<?=$row->id?>')">Update</button>
      <button class="btn btn-danger btn-xs" onclick="reload_question_table()">Cancel</button>
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




function edit(id){
  $('.update').hide(); 
  // $('.V_data').show(); 
  $('#add_form').hide();

  // $('.V_data'+id).hide();
  $('.update'+id).show(); 
}



function update(id)
{
 
  var stuCLASS        = $('#stuCLASS'+id).val();
  var question_id     = $('#question_id'+id).val();
  var correct_ans     = $('#correct_ans'+id).val();
  var concept         = $('#concept'+id).val();
  var q_TOPICS        = $('#Q_TOPICS'+id).val();
  var q_d_lavel       = $('#Q_difficulty_lavel'+id).val();

  
   if (stuCLASS.length==0)    { $('#stuCLASS'+id).focus();           return; }
   if (question_id.length==0) { $('#question_id'+id).focus();        return; }
   if (correct_ans.length==0) { $('#correct_ans'+id).focus();        return; }
   if (concept.length==0)     { $('#concept'+id).focus();            return; }
   if (q_TOPICS.length==0)    { $('#Q_TOPICS'+id).focus();           return; }
   if (q_d_lavel.length==0)   { $('#Q_difficulty_lavel'+id).focus(); return; }
      
  var SendData = {stuCLASS:stuCLASS,question_id:question_id,correct_ans:correct_ans,concept:concept,q_TOPICS:q_TOPICS,q_d_lavel:q_d_lavel};


      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_questions/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) {  $('#update_msg_form'+id).html('<span style="color:green">Question Updated Successful.</span>'); reload_question_table(); reload_question_table(); }
          else if(data==2){ $('#update_msg_form'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#update_msg_form'+id).html('<span style="color:red">Question Already Exist.</span>'); }
        }
      });
}
</script>