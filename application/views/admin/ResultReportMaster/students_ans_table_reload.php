<?php $i=1; foreach($students_ans as $row) {
  ?>
<tr>
  <td><?=$i?></td>
  <!-- question Paper -->
  <td>
    <?php foreach ($QuestionPapers as $Q_Papers) {
           $s=""; if ($Q_Papers->id==$row->question_paper) { 
           echo $Q_Papers->paper_title;
          }
        }
    ?>
  </td>
  <!-- question Paper -->
  <!-- question id -->
  <td >
    <?php
      foreach ($question_master as $question) {
        if ($question->id==$row->question_id) {
           echo $question->question_id;
        }
      }
    ?>
  </td>
  <!-- question id -->
  <!-- correct ans -->
<!--   <td>
    <?=$row->correct_ans?>
  </td> -->
  <!-- correct ans -->
  <!-- student ans -->
  <td class="V_data V_data<?=$row->id?>">
    <input type="text" id="student_ans<?=$row->id?>" value="<?=$row->student_ans?>" oninput="$(this).val($(this).val().toUpperCase()); update('<?=$row->id?>');">
  </td>
  <!-- student ans -->
  <!-- action -->
 
  <!-- action -->

</tr>
<?php $i++; } ?>
<script type="text/javascript">


function update(id)
{
  var student_ans               = $('#student_ans'+id).val();
  // alert(student_ans); return;
  // if (student_ans.length==0)     { $('#student_ans'+id).focus();   return; }
  var SendData = {student_ans:student_ans};
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_students_answer/'+id, data:SendData,
        success:function(data){
          if (data==0) { // reload_table();
           }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
        }
      });
}
  
</script>