<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Question Paper List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

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
            <a style="float: right" class="btn btn-warning btn-xs"  href="javascript:void(0);" onclick="show_hide_form()"><i class="fa fa-plus"></i> Add</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Question Paper here
                            <span style="float: right;" id="error_msg_form"></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                          <div id="add_form" class="col-lg-12 col-md-12" style="border: 1px solid #ddd;margin-bottom: 10px;padding-top: 10px">
                              <div class="col-md-12">
                                  <span style="float: left;font-size: 20px;font-family: serif;">Add Qusetion Paper </span>
                              </div>
                                <div class="col-lg-1 col-md-1"></div>
                                <!-- title -->
                                <div class="col-lg-2 col-md-2">
                                  <input type="text" class="form-control input-sm" style="width: 150px;" name="paper_title" id="paper_title" placeholder="Question Paper Title"  >
                                  <span id="error_msg"></span>
                                </div>
                                <!-- title -->

                                <!-- paper category -->
                                <div class="col-lg-3 col-md-3">
                                  <select class="form-control input-sm" name="test_date" id="test_date" >
                                    <option value="">-- Select Test --</option>
                                   <?php
                                    foreach ($tests as $test) {
                                     echo "<option ".$s." value='".$test->test_date."'>";
                                     echo $test->test_date." ( ".$test->test_name." )";
                                     echo "</option>"; } ?>
                                  </select>
                                  <span id="error_msg_class"></span>
                                </div>
                              <!-- paper category -->

                              
                
                               <!-- action -->
                                <div class="col-lg-1 col-md-1">
                                  <input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
                                </div>
                                <div class="col-lg-1 col-md-1">
                                  <input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
                                </div>
                               <!-- action -->
                               <br>
                               <br>
                             
                            </div>
                            <div id="dataTables-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" style="border: 1px solid #ddd;margin-bottom: 10px;padding-top: 10px" >
          <div class="row" >
            <div class="col-sm-6">
               <div id="dataTables-list_filter" class="dataTables_filter">
                <div class="dataTables_length text-left" id="dataTables-list_length">
                  <label>Filter By Test : 
                    <select name="dataTables-list_length" aria-controls="dataTables-list" class="form-control input-sm table-filter" id="filter_question_paper"  onchange="table_reload()">
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

           

            <div class="col-sm-6">
              <div id="dataTables-list_filter" class="dataTables_filter">
                <label>Search:
                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-list">
                  </label>
              </div>
              </div>
            </div>
          </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Question Paper</th>
                                        <th style="width: 20%">Test</th>
                                        <th>Status</th>
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
           

            function activate_inactive(id,status)
            {
                $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/question_topics_master/'+id+'/'+status);
            }

        </script>



  <script type="text/javascript">
  // onload hide
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();


function clear_form() {
  $('#paper_title').val(''); $('#add_form').hide();
}

  function show_hide_form(){
  $('#add_form').toggle();
  $('#title').focus();
  $('.update').hide();
  $('.V_data').show();
}

function table_reload()
{
    var test_date = $('#filter_question_paper').val();
    $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_question_paper_table/'+test_date);
}

function form_submit(){
  var paper_title =$('#paper_title').val();
  var test_date =$('#test_date').val();
  var SendData = {paper_title:paper_title,test_date:test_date};

  if (paper_title.length==0 || test_date.length==0  ) { $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>');  return; }
  else { $('#error_msg_form').html(''); }
  
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_question_paper', data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { table_reload(); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">Question Paper Already Exist.</span>'); }
        }
      });

}

function edit(id){
  $('.update').hide(); 
  $('.V_data').show(); 
  $('#add_form').hide();

  $('.V_data'+id).hide();
  $('.update'+id).show(); 
}

function update(id)
{
  var test_date = $('#test_date'+id).val();
  var paper_title = $('#paper_title'+id).val();
  var SendData = {paper_title:paper_title,test_date:test_date};
   if (paper_title.length==0 || test_date.length==0  ) { $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>');  return; }
  else { $('#error_msg_form').html(''); }

      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_question_paper/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { table_reload(); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">Question Paper Already Exist.</span>'); }
        }
      });
}


</script> 
