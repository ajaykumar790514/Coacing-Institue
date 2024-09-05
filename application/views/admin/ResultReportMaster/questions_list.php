<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Questions List</h1>
    </div>
  </div>
  <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success fade in">
          <?php echo $this->session->flashdata('success');?>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      </div>
  <?php elseif($this->session->flashdata('error')):?>
      <div class="alert alert-danger fade in">
          <?php echo $this->session->flashdata('error');?>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      </div>
  <?php endif;?>
  <br>
  <style type="text/css">
          .add-btn {float: right}
          .panel-heading { padding-bottom: 15px; }
          #add_form div{margin-top: 5px;margin-bottom: 5px; }
          .table-filter { width: 150px!important; }
          .table-filter-label { float: right;}
          .error-msg { float: left;font-size: 20px;font-family: serif;color: red }
  </style>
  <a class="btn btn-warning btn-xs add-btn"  href="javascript:void(0);" onclick="show_hide_form()"><i class="fa fa-plus"></i> Add</a>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            Manage Questions here
           
        </div>
        <div class="panel-body">
        
        <div id="add_form" class="col-lg-12 col-md-12" style="border: 1px solid #ddd;margin-bottom: 10px;">
          <div class="col-md-12">
            <span style="float: left;font-size: 20px;font-family: serif;">Add Qusetion </span>
          </div>
          <div class="col-md-12">
            <span class="error-msg" id="add_msg_form"></span>
          </div>
          <div class="col-lg-9 col-md-9">
           <!-- paper category -->
          <div class="col-lg-3 col-md-3">
            <label for="paper_category">Paper Category</label>
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
            <span id="error_msg_class"></span>
          </div>
          <!-- paper category -->

          <!-- test -->
          <div class="col-lg-3 col-md-3">
            <label for="test_date">Test</label>
            <select class="form-control input-sm" name="test_date" id="test_date" title="Select Test" onchange="get_question_papers(0)" >
              <option value="">-- Select --</option>
              <?php
              foreach ($tests as $test) {
               echo "<option value='".$test->test_date."'>";
               echo $test->test_date." ( ".$test->test_name." )";
               echo "</option>"; } ?>
            </select>
            <span id="error_msg_class"></span>
          </div>
          <!-- test -->

           <!-- test -->
          <div class="col-lg-3 col-md-3">
            <label for="test_date">Question Papers</label>
            <select class="form-control input-sm" name="question_paper" id="question_paper" title="Select Question Paper" >
              <option value="">-- Select --</option>
              
            </select>
            <span id="error_msg_class"></span>
          </div>
          <!-- test -->

          <!-- class -->
          <div class="col-lg-3 col-md-3">
            <label for="stuCLASS">Class</label>
            <select class="form-control input-sm" name="stuCLASS" id="stuCLASS" title="Select Class" >
              <option value="">-- Select --</option>
              <option value="9">9 <sup>th</sup></option>
              <option value="10">10 <sup>th</sup></option>
              <option value="11">11 <sup>th</sup></option>
              <option value="12">12 <sup>th</sup></option>
              <option value="13">13 <sup>th</sup></option>
            </select>
          </div>
          <!-- class -->

          <!-- Topics / Difficulty Lavel -->
          <!-- <div class="col-lg-3 col-md-3" id="topic_difficultylavel">
            <label for=""><small>Topics / Difficulty Lavel</small></label>
            <span id="topic_difficultylavel_msg" style="color: red"></span>
            <select class="form-control input-sm"  >
              <option value="">-- Select --</option>
             
            </select>
          </div> -->
          <!-- Topics / Difficulty Lavel -->

          <!-- question -->
          <div class="col-lg-3 col-md-3">
            <label for="question_id">Question Id / Index</label>
            <input type="number" class="form-control input-sm"  name="question_id" id="question_id" placeholder="Question Id / Question Index" title="Question Id / Question Index">
            <span id="error_msg"></span>
          </div>
          <!-- question -->

          <!--  Correct Answer -->
          <div class="col-lg-3 col-md-3">
            <label for="correct_ans">Correct Answer</label>
            <input type="text" class="form-control input-sm"  name="correct_ans" id="correct_ans" placeholder="Correct Answer" title="Correct Answer" oninput="$(this).val($(this).val().toUpperCase());"  >
            <span id="error_msg"></span>
          </div>
          <!--  Correct Answer -->

          <!--  Correct Answer -->
          <div class="col-lg-3 col-md-3">
            <label for="concept">Question Concept</label>
            <input type="text" class="form-control input-sm"  name="concept" id="concept" placeholder="Question Concept" title="Question Concept"  >
            <span id="error_msg"></span>
          </div>
          <!--  Correct Answer -->


          <!-- action -->
          <div class="col-lg-3 col-md-3" style="float: right;padding-top: 20px">

            <input type="button" class="btn btn-success " onclick="form_submit()"  value="Add" style="float: left;">
            <input type="reset" onclick="clear_form()" class="btn btn-danger" value="Cancel" style="float: right;">
          </div>
          <!-- action -->                        
          <br>
        </div>
        <div class="col-lg-3 col-md-3">
           <!-- Topics / Difficulty Lavel -->
          <div  id="topic_difficultylavel">
            <label for=""><small>Topics / Difficulty Lavel</small></label>
            <span id="topic_difficultylavel_msg" style="color: red"></span>
            <select class="form-control input-sm"  >
              <option value="">-- Select --</option>
             
            </select>
          </div>
          <!-- Topics / Difficulty Lavel -->
        </div>
        </div>
        <div id="dataTables-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          <div class="row">
            <div class="col-sm-3">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length" id="dataTables-list_length">
                  <label>Filter By Test : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" id="filter_question"  onchange="reload_question_table()">
                      <option value="">-- Filter Question --</option>
                        <?php foreach ($tests as $test) {
                          echo "<option value='".$test->test_date."'>";
                          echo $test->test_date." ( ".$test->test_name." )";
                          echo "</option>"; } ?>
                    </select> 
                  </label>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length" id="dataTables-list_length">
                  <label>Filter By Paper : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" >
                      <option value="">Currently Not Working</option>
                      <!-- <option value="">-- Filter Question --</option> -->
                       
                    </select> 
                  </label>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div id="dataTables-list_filter" class="dataTables_filter">
                <label>Search:
                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-list">
                </label>
              </div>
              </div>
            </div>
          </div>
        <table width="100%" class="table table-striped table-bordered table-hover" id="">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th style="width: 20%">Paper Category</th>
                    <th style="width: 10%">Test Date</th>
                    <th>Question Paper</th>
                    <th>Class</th>
                    <th>Question Id</th>
                    <th>Correct Answer</th>
                    <th>Concept</th>
                    <th>Topics</th>
                    <th>Difficulty Lavel</th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody id="tableDATA">
            
            </tbody>
        </table>
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

<script type="text/javascript">


// onload hide
// $('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();

function reload_question_table()
{
    var test_date = $('#filter_question').val();
    $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_questions_table/'+test_date);
}


function clear_form() {
  $('#title').val(''); $('#add_form').hide();
}

  function show_hide_form(){
  $('#add_form').toggle();
  $('#title').focus();
  $('.update').hide();
  $('.V_data').show();
}

function get_topic_difficultylavel(id){
    if (id=="0") {
       var paper_category = $('#paper_category').val();
       $('#topic_difficultylavel').load('<?=base_url()?>ResultReportMaster/get_topic_difficultylavel/'+paper_category+'/'+id);
    }
    else {
        var paper_category = $('#paper_category'+id).val();
       $('#topic_difficultylavel'+id).load('<?=base_url()?>ResultReportMaster/get_topic_difficultylavel/'+paper_category+'/'+id);
    }
}
function get_question_papers(id){
    if (id=="0") {
       var test_date = $('#test_date').val();
       $('#question_paper').load('<?=base_url()?>ResultReportMaster/get_question_papers/'+test_date+'/'+id);
    }
    else {
        var test_date = $('#test_date'+id).val();
       $('#question_paper'+id).load('<?=base_url()?>ResultReportMaster/get_question_papers/'+test_date+'/'+id);
    }
}

$(document).keyup(function(event) {
    if ($("#correct_ans").is(":focus") && event.key == "Enter") {
        form_submit();
    }
});

function form_submit(){
  var test_date                 = $('#test_date').val();
  var paper_category            = $('#paper_category').val();
  var question_paper            = $('#question_paper').val();
  var stuCLASS                  = $('#stuCLASS').val();
  var topic_id                  = $('#topic_id').val();
  var difficultylavel_id        = $('#difficultylavel_id').val();
  var question_id               = $('#question_id').val();
  var correct_ans               = $('#correct_ans').val();
  var concept                   = $('#concept').val();
  var msg                       = 'Select Topic / Difficulty Lavel!';

   if (paper_category.length==0)            { $('#paper_category').focus();              return; }
   if (test_date.length==0)                 { $('#test_date').focus();                   return; }
   if (question_paper.length==0)            { $('#question_paper').focus();              return; }
   if (stuCLASS.length==0)                  { $('#stuCLASS').focus();                    return; }
   if (topic_id.length==0)                  { $('#topic_difficultylavel_id').focus();    return; }
   if (difficultylavel_id.length==0)        { $('#topic_difficultylavel_id').focus();    return; }
   if (question_id.length==0)               { $('#question_id').focus();                 return; }
   if (correct_ans.length==0)               { $('#correct_ans').focus();                 return; }
   if (concept.length==0)                   { $('#concept').focus();                 return; }
     
  var SendData = {test_date:test_date,question_id:question_id,correct_ans:correct_ans,topic_id:topic_id,difficultylavel_id:difficultylavel_id,paper_category:paper_category,stuCLASS:stuCLASS,question_paper:question_paper,question_paper:question_paper,concept:concept };
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_questions', data:SendData,
        success:function(data){
          // alert(data); return;

          // $('#add_msg_form').html(data);
          if (data==0) { $('#add_msg_form').html('<span style="color:green">Question Added Successful.</span>'); reload_question_table(); }
          else if(data==2){ $('#add_msg_form').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#add_msg_form').html('<span style="color:red">Question Already Exist.</span>'); }
        }
      });
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table');
}
</script> 
