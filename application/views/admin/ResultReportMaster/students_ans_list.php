<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Students Answer</h1>
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
          .table-filter {width: 150px!important; }
          .table-filter-label { float: right;}
          .error-msg { float: left;font-size: 20px;font-family: serif;color: red }
          .correct_ans_ladel{ font-size: 8px;margin-top: -1px }
  </style>
  <a class="btn btn-warning btn-xs add-btn"  href="javascript:void(0);" onclick="show_hide_form()"><i class="fa fa-plus"></i> Add</a>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            Manage Students Answer here
        </div>
        <div class="panel-body">
        
        <div id="add_form" class="col-lg-12 col-md-12" style="border: 1px solid #ddd;margin-bottom: 10px;">
          <div class="col-md-12">
            <span style="float: left;font-size: 20px;font-family: serif;">Add Student Answer </span>
          </div>
          <div class="col-md-12">
            <span class="error-msg" id="add_msg_form"></span>
          </div>
          <!-- test -->
          <div class="col-lg-3 col-md-3">
            <label for="test_date">Test</label>
            <select class="form-control input-sm" name="test_date" id="test_date" title="Select Test" onchange="get_question(0)" >
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

          <!-- paper  -->
          <div class="col-lg-2 col-md-2">
            <label for="paper_category">Paper Category</label>
            <select class="form-control input-sm" name="paper_category" id="paper_category" onchange="get_question('0')" >
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
          <!-- paper  -->

          <!-- Question Paper  -->
          <div class="col-lg-2 col-md-2">
            <label for="paper_category">Question Paper</label>
            <select class="form-control input-sm" name="question_paper" id="question_paper"   onchange="get_question('0')">
              <option value="">-- Select --</option>
              
            </select>
            <span id="error_msg_class"></span>
          </div>
          <!-- Question Paper  -->

          <!-- class -->
          <div class="col-lg-2 col-md-2" >
            <label for="">Class</label>
            <select class="form-control input-sm" id="stuCLASS" onchange="get_students(0)" >
              <option value="">-- Select --</option>
              <option value="9">9 <sup>th</sup></option>
              <option value="10">10 <sup>th</sup></option>
              <option value="11">11 <sup>th</sup></option>
              <option value="12">12 <sup>th</sup></option>
              <option value="13">13 <sup>th</sup></option>
            </select>
          </div>
          <!-- class -->

           <!--  Student  -->
          <div class="col-lg-3 col-md-3">
            <label for="student_id">Student </label>
            <select class="form-control input-sm" id="student_id">
              <option value="">-- Select --</option>
             
            </select>
            <span id="error_msg"></span>
          </div>
          <!--  Student  -->

          

          <!-- Topics / Difficulty Lavel -->
          <div class="col-lg-2 col-md-2" >
            <label for="">Question</label>
            <select class="form-control input-sm" id="question_id">
              <option value="">-- Select --</option>
             
            </select>
          </div>
          <!-- Topics / Difficulty Lavel -->

           <!--  Student Answer -->
          <div class="col-lg-3 col-md-3">
            <label for="student_ans">Student Answer</label>
            <input type="text" class="form-control input-sm"  name="student_ans" id="student_ans" placeholder="Student Answer" title="Student Answer" oninput="$(this).val($(this).val().toUpperCase());" >
            <span id="error_msg"></span>
          </div>
          <!--  Student Answer -->

          <!-- action -->
          <div class="col-lg-2 col-md-2" style="padding-top: 20px;">
            <input type="button" class="btn btn-success " onclick="form_submit()"  value="Add" style="float: left;">
            <input type="reset" onclick="clear_form()" class="btn btn-danger" value="Cancel" style="float: right;">
          </div>
          <!-- action -->                        
          <br>
        </div>


        <div id="" class=" form-inline " style="border: 1px solid #ddd;margin:10px 0px 10px 0px;">
          <h4 style="font-family: serif;"> &nbsp;&nbsp;&nbsp;Filter Student Questions</h4>
          <div class="row">
              <div class="col-md-12 col-sm-12">
                <span class="error-msg" id="add_msg_form_filter"></span>
              </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-sm-6">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length" id="dataTables-list_length">
                  <label>Test : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" id="test_date_filter" onchange="reload_table_get_students()">
                      <option value="">-- Select test --</option>
                        <?php foreach ($tests as $test) {
                          echo "<option value='".$test->test_date."'>";
                          echo $test->test_date." ( ".$test->test_name." )";
                          echo "</option>"; } ?>
                    </select> 
                  </label>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length" id="dataTables-list_length">
                  <label>Paper Category : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" id="paper_category_filter" onchange="reload_table()" >
                      <option value="">-- Select Paper Category --</option>
                        <?php
                        foreach ($paper_category as $p_category) {
                         echo "<option value='".$p_category->id."'>";
                         echo $p_category->category;
                         echo "</option>";
                        }
                        ?>
                    </select> 
                  </label>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length" id="dataTables-list_length">
                  <label>Class : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" id="stuCLASS_filter" onchange="reload_table_get_students()">
                      <option value="">-- Select Class --</option>
                      <option value="9">9   <sup>th</sup></option>
                      <option value="10">10 <sup>th</sup></option>
                      <option value="11">11 <sup>th</sup></option>
                      <option value="12">12 <sup>th</sup></option>
                      <option value="13">13 <sup>th</sup></option>
                    </select> 
                  </label>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length" id="dataTables-list_length">
                  <label> Student : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" id="student_id_filter" onchange="reload_table()">
                      <option value="">-- Select Student --</option>
                       
                    </select> 
                  </label>
                </div>
              </div>
            </div>



            </div>
          </div>
<script type="text/javascript">
function reload_table()
{
    var test_date = $('#test_date_filter').val();
    var paper_category = $('#paper_category_filter').val();
    var stuCLASS = $('#stuCLASS_filter').val();
    var student_id = $('#student_id_filter').val();
   //  var test_date = $('#test_date_filter').val();
   //  var test_date = $('#test_date_filter').val();
   if (test_date.length==0) { 
        $('#test_date_filter').focus(); 
        $('#add_msg_form_filter').html('Select Test'); 
        return; }
   if (paper_category.length==0) { 
        $('#paper_category_filter').focus(); 
        $('#add_msg_form_filter').html('Select Paper'); 
        return; }
   if (stuCLASS.length==0) { 
        $('#stuCLASS_filter').focus(); 
        $('#add_msg_form_filter').html('Select Class'); 
        return; }
   if (student_id.length==0) { 
        $('#student_id_filter').focus(); 
        $('#add_msg_form_filter').html('Select Student'); 
        return; }
    $('#add_msg_form_filter').html(''); 
   $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_students_answer_table/'+paper_category+'/'+stuCLASS+'/'+student_id+'/'+test_date);
}
function reload_table_get_students()
{
    get_students('_filter');
    reload_table();
}
</script>
        <table width="100%" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Question Paper</th>
                    <th>Question Id</th>
                    <!-- <th>Correct Answer</th> -->
                    <th style="width: 10%">Student Answer</th>
                    <!-- <th style="width: 10%;">Action</th> -->
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




function get_question(id){
  $('#add_msg_form').html('');
  // $('#stuCLASS').val('');
  $('#student_id').val('');
    if (id=="0") {
       var paper_category = $('#paper_category').val();
       var test_date      = $('#test_date').val();
       var question_paper = $('#question_paper').val();
       var stuCLASS       = $('#stuCLASS').val();
       // alert(stuCLASS); 
       if (test_date.length==0) { $('#test_date').focus(); $('#add_msg_form').html('Select Test'); return; }
       if (paper_category.length==0) 
          { 
            $('#paper_category').focus(); 
            $('#add_msg_form').html('Select Paper Category'); 
            return; 
          }
         
       if (question_paper.length==0) 
          { 
            $('#question_paper').focus(); 
            $('#add_msg_form').html('Select Paper'); 
             get_question_papers(id);
            return; 
          }
       if (stuCLASS.length==0) { $('#stuCLASS').focus(); $('#add_msg_form').html('Select Class'); return; }

       $('#question_id').load('<?=base_url()?>ResultReportMaster/get_question/'+paper_category+'/'+test_date+'/'+question_paper+'/'+stuCLASS);
    }
    else {
        var paper_category = $('#paper_category'+id).val();
        var test_date      = $('#test_date'+id).val();
        var question_paper = $('#question_paper'+id).val();
        var stuCLASS       = $('#stuCLASS'+id).val();
        if (test_date.length==0) { $('#test_date'+id).focus(); return; }
        if (paper_category.length==0) { $('#paper_category'+id).focus(); return; }
        if (question_paper.length==0) { $('#question_paper'+id).focus();  return; }
       if (stuCLASS.length==0) { $('#stuCLASS'+id).focus();  return; }
       $('#question_id'+id).load('<?=base_url()?>ResultReportMaster/get_question/'+paper_category+'/'+test_date+'/'+question_paper+'/'+stuCLASS);
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

function get_students(id)
{

  var idd=id;
    if (id==0) { idd=''; get_question(id); }
   var test_date      = $('#test_date'+idd).val();
   if (test_date.length==0) { $('#test_date'+idd).focus(); $('#add_msg_form'+idd).html('Select Test'); return; }
   var stuCLASS      = $('#stuCLASS'+idd).val();
   if (stuCLASS.length==0) { $('#stuCLASS'+idd).focus(); $('#add_msg_form'+idd).html('Select Test'); return; }
   $('#student_id'+idd).load('<?=base_url()?>ResultReportMaster/get_students/'+stuCLASS+'/'+test_date);
}

$(document).keyup(function(event) {
    if ($("#student_ans").is(":focus") && event.key == "Enter") {
        form_submit();
    }
});
  function form_submit(){
  var test_date         = $('#test_date').val();
  var paper_category    = $('#paper_category').val();
  var question_paper    = $('#question_paper').val();
  var stuCLASS          = $('#stuCLASS').val();
  var student_id        = $('#student_id').val();
  var question_id       = $('#question_id').val();
  // var correct_ans       = $('#correct_ans').val();
  var student_ans       = $('#student_ans').val();

   if (test_date.length==0)         { $('#test_date').focus();          return; }
   if (paper_category.length==0)    { $('#paper_category').focus();     return; }
   if (question_paper.length==0)    { $('#question_paper').focus();     return; }
   if (stuCLASS.length==0)          { $('#stuCLASS').focus();           return; }
   if (student_id.length==0)        { $('#student_id').focus();         return; }
   if (question_id.length==0)       { $('#question_id').focus();        return; }
   // if (correct_ans.length==0)       { $('#correct_ans').focus();        return; }
   // if (student_ans.length==0)       { $('#student_ans').focus();        return; }
  
  var SendData = {test_date:test_date,paper_category:paper_category,stuCLASS:stuCLASS,student_id:student_id,student_ans:student_ans,question_id:question_id,question_paper:question_paper };
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_students_answer', data:SendData,
        success:function(data){
          if (data==0) { $('#add_msg_form').html('<span style="color:green">Student Answer Upload successfully.</span>'); reload_table(); $('#question_id').focus();  }
          else if(data==2){ $('#add_msg_form').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#add_msg_form').html('<span style="color:red">Student Answer Already Exist.</span>'); }
        }
      });
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




function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table');
}
</script> 
