
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Copy Questions And Add blank Answers</h1>
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
  <!-- <a class="btn btn-warning btn-xs add-btn"  href="javascript:void(0);" onclick="show_hide_form()"><i class="fa fa-plus"></i> Add</a> -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            Copy Questions And Add blank Answers
           
        </div>
        <div class="panel-body">
        <!-- ######################### Copy test Questions ######################## -->
        <div id="add_form" class="col-lg-12 col-md-12" style="border: 1px solid #ddd;margin-bottom: 10px;">
          <div class="col-md-12">
            <span style="float: left;font-size: 20px;font-family: serif;">Copy Test Qusetions </span>
          </div>
          <div class="col-md-12">
            <span class="error-msg" id="add_msg_form"></span>
          </div>
          <div class="col-lg-9 col-md-9">
          <h5>Copy From</h5>
          <!-- test -->
          <div class="col-lg-3 col-md-3">
            <label for="test_date_from">Test</label>
            <select class="form-control input-sm" name="test_date_from" id="test_date_from" title="Select Test" onchange="get_question_papers(0)" >
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
            <label for="question_paper_from">Question Papers</label>
            <select class="form-control input-sm" name="question_paper_from" id="question_paper_from" title="Select Question Paper" >
              <option value="">-- Select --</option>
              
            </select>
            <span id="error_msg_class"></span>
          </div>
          <!-- test -->

          <!-- class -->
          <div class="col-lg-4 col-md-4">
            <label>Class</label>
            <br>
            <label >9</label>
            <input type="checkbox" id="class9" value="9">

            <label >10</label>
            <input type="checkbox" id="class10" value="10">

            <label >11</label>
            <input type="checkbox" id="class11" value="11">

            <label >12</label>
            <input type="checkbox" id="class12" value="12">

            <label >13</label>
            <input type="checkbox" id="class13" value="13">
          </div>
          <!-- class -->                       
          <br>
        </div>

        <div class="col-lg-9 col-md-9">
          <h5>Copy To</h5>
          <!-- test -->
          <div class="col-lg-3 col-md-3">
            <label for="test_date_to">Test</label>
            <select class="form-control input-sm" name="test_date_to" id="test_date_to" title="Select Test" onchange="get_question_papers('_to')" >
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
            <label for="test_date_to">Question Papers</label>
            <select class="form-control input-sm" name="question_paper_to" id="question_paper_to" title="Select Question Paper" >
              <option value="">-- Select --</option>
              
            </select>
            <span id="error_msg_class"></span>
          </div>
          <!-- test -->




          <!-- action -->
          <div class="col-lg-4 col-md-4" style="float: right;padding-top: 20px">

            <input type="button" class="btn btn-success " onclick="copy_test()"  value="Copy Test" style="float: left;">
            <input type="reset" onclick="clear_form()" class="btn btn-danger" value="Cancel" style="float: right;">
          </div>
          <!-- action -->                        
          <br>
        </div>

        <div class="col-lg-3 col-md-3">
         
        </div>
        </div>

        <!-- ######################### Copy test Questions ######################## -->



        <!-- #########################add blank students answers######################## -->
        <div id="add_form" class="col-lg-12 col-md-12" style="border: 1px solid #ddd;margin-bottom: 10px;">
          <div class="col-md-12">
            <span style="float: left;font-size: 20px;font-family: serif;">Add Blank Students Answers</span>
          </div>
          <div class="col-md-12">
            <span class="error-msg" id="add_msg_form"></span>
          </div>
          <div class="col-lg-12 col-md-12">
         
          <!-- test -->
          <div class="col-lg-3 col-md-3">
            <label for="test">Test</label>
            <select class="form-control input-sm" name="test" id="test" title="Select Test">
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

          <!-- class -->
          <div class="col-lg-4 col-md-4">
            <label>Class</label>
            <br>
            <label >9</label>
            <input type="checkbox" id="Class9" value="9">

            <label >10</label>
            <input type="checkbox" id="Class10" value="10">

            <label >11</label>
            <input type="checkbox" id="Class11" value="11">

            <label >12</label>
            <input type="checkbox" id="Class12" value="12">

            <label >13</label>
            <input type="checkbox" id="Class13" value="13">
          </div>
          <!-- class -->   
          <!-- action -->
          <div class="col-lg-5 col-md-5" style="float: right;padding-top: 20px">

            <input type="button" class="btn btn-success" onclick="return confirm('Are you sure?')?Add_blank_answers():'';"  value="Add Blank Students Answer" style="float: left;">
            <input type="reset" onclick="clear_form()" class="btn btn-danger" value="Cancel" style="float: right;">
          </div>
          <!-- action -->                     
          <br>
        </div>


        <div class="col-lg-3 col-md-3">
         
        </div>
        </div>
        <!-- #########################add blank students answers######################## -->

        <div id="dataTables-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
          <div class="row" id="view_data">
           

           

          
          </div>
       
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




function clear_form() {
  $('#title').val(''); $('#add_form').hide();
}



function get_question_papers(id){
    if (id=="0") {
       var test_date = $('#test_date_from').val();
       $('#question_paper_from').load('<?=base_url()?>ResultReportMaster/get_question_papers/'+test_date+'/'+id);
    }
    else {
        var test_date = $('#test_date'+id).val();
       $('#question_paper'+id).load('<?=base_url()?>ResultReportMaster/get_question_papers/'+test_date+'/'+id);
    }
}



function copy_test(){
  var test_date_from           = $('#test_date_from').val();
  var question_paper_from        = $('#question_paper_from').val();  
  var test_date_to            = $('#test_date_to').val();
  var question_paper_to        = $('#question_paper_to').val();
  var class9                = 'NA';
  var class10               = 'NA';
  var class11               = 'NA';
  var class12               = 'NA';
  var class13               = 'NA';
  if ($("#class9").is(":checked"))  
  {
    var class9  = 9;
  }

   if ($("#class10").is(":checked"))  
  {
    var class10  = 10;
  }

   if ($("#class11").is(":checked"))  
  {
    var class11  = 11;
  }

   if ($("#class12").is(":checked"))  
  {
    var class12  = 12;
  }

   if ($("#class13").is(":checked"))  
  {
    var class13  = 12;
  }
  
  var msg                   = 'Select Topic / Difficulty Lavel!';

 
   if (test_date_from.length==0)            { $('#test_date_from').focus();            return; }
   if (question_paper_from.length==0)       { $('#question_paper_from').focus();       return; }
   if (test_date_to.length==0)              { $('#test_date_to').focus();              return; }
   if (question_paper_to.length==0)         { $('#question_paper_to').focus();         return; }
     
  var SendData = {test_date_from:test_date_from,question_paper_from:question_paper_from,test_date_to:test_date_to,question_paper_to:question_paper_to,class9:class9,class10:class10,class11:class11,class12:class12,class13:class13};
  // console.log(SendData);
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/copy_test_question', data:SendData,
        success:function(data){
          // alert(data); return;
          $('#view_data').html(data);
         
        }
      });
}



function Add_blank_answers() {
  var test           = $('#test').val();
  var class9                = 'NA';
  var class10               = 'NA';
  var class11               = 'NA';
  var class12               = 'NA';
  var class13               = 'NA';
  if ($("#Class9").is(":checked"))  
  {
    var class9  = 9;
  }

   if ($("#Class10").is(":checked"))  
  {
    var class10  = 10;
  }

   if ($("#Class11").is(":checked"))  
  {
    var class11  = 11;
  }

   if ($("#Class12").is(":checked"))  
  {
    var class12  = 12;
  }

   if ($("#Class13").is(":checked"))  
  {
    var class13  = 12;
  }
  
  

 
   if (test.length==0)            { $('#test').focus();            return; }
   if (class9=='NA' && class10=='NA' && class11=='NA' && class12=='NA' && class13=='NA') {
      return;
   }
     
  var SendData = {test_date:test,class9:class9,class10:class10,class11:class11,class12:class12,class13:class13};
  // console.log(SendData);
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/insert_blank_students_answers', data:SendData,
        success:function(data){
          // alert(data); return;
          $('#view_data').html(data);
         
        }
      });
}

</script> 

<script type="text/javascript">
  pass();
  function pass()
    {
        var password = prompt("Please enter your Password:");
        if (password!='1234') 
        {
            $('.panel-default').html('you are not authorized to access this page');
        }
           
    }
</script>
