<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Question Topics List</h1>
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
                            Manage Question Topics here
                            <span style="float: right;" id="error_msg_form"></span>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                          <div id="add_form" class="col-lg-12 col-md-12">
                             
                                <div class="col-lg-1 col-md-1"></div>
                                <!-- title -->
                                <div class="col-lg-2 col-md-2">
                                  <input type="text" class="form-control input-sm" style="width: 150px;" name="title" id="title" placeholder="Question Topics"  >
                                  <span id="error_msg"></span>
                                </div>
                                <!-- title -->

                                <!-- paper category -->
                                <div class="col-lg-3 col-md-3">
                                  <select class="form-control input-sm" name="paper_category" id="paper_category" onchange="get_question_topics('0')" >
                                    <option value="">-- Select Paper Category --</option>
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

                                <!-- qusetion topics -->
                                <div class="col-lg-3 col-md-3">
                                  <select class="form-control input-sm" name="parent_id" id="parent_id" >
                                    <option value="">-- Select Parent Topic --</option>
                                    <?php
                                    // foreach ($question_topics as $q_topics) {
                                    //  echo "<option value='".$q_topics->id."'>";
                                    //  echo $q_topics->title;
                                    //  echo "</option>";
                                    //}
                                    ?>
                                  </select>
                                  <span id="error_msg_class"></span>
                                </div>
                                <!-- qusetion topics -->
                
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


                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Question Topics</th>
                                        <th style="width: 20%">Paper Category</th>
                                        <th>Parent</th>
                                        <!-- <th>Fees</th> -->
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                    

                                    <?php $i=1; foreach($QuestionTopics as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <!-- title -->
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->title?>
                                        </td>
                                        <td class="update update<?=$row->id?>">
                                          <input type="text" class="form-control" id="titleInput<?=$row->id?>" value="<?=$row->title?>"  >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>
                                        <!-- title -->

                                        <!-- papre category -->
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->paper_category) { 
                                               echo $p_category->category;
                                              }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>">
                                          <select class="ClassInput form-control input-sm" name="paper_category" id="paper_categoryInput<?=$row->id?>" onchange="get_question_topics('<?=$row->id?>')" >
                                            <option value="">-- Select Paper --</option>
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->parent_id) { $s="selected";  }
                                             echo "<option ".$s." value='".$p_category->id."'>";
                                             echo $p_category->category;
                                             echo "</option>";
                                            }
                                            ?>
                                          </select>
                                        </td>
                                        <!-- paper category -->

                                        <!-- qusetion topics -->
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?php
                                            foreach ($question_topics as $q_topics) {
                                             $s=""; if ($q_topics->id==$row->parent_id) { 
                                               echo $q_topics->title;
                                              }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>">
                                          <select class="ClassInput form-control input-sm" name="" id="parent_idInput<?=$row->id?>" >
                                            <option value="">-- Select Parent Topic --</option>
                                            <?php
                                            foreach ($question_topics as $q_topics) {
                                             $s=""; if ($q_topics->id==$row->parent_id) { $s="selected";  }
                                             echo "<option ".$s." value='".$q_topics->id."'>";
                                             echo $q_topics->title;
                                             echo "</option>";
                                            }
                                            ?>
                                          </select>
                                        </td>
                                        <!-- question topics -->

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
                                    <?php $i++; } ?>
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
  $('#title').val(''); $('#add_form').hide();
}

  function show_hide_form(){
  $('#add_form').toggle();
  $('#title').focus();
  $('.update').hide();
  $('.V_data').show();
}

function form_submit(){
  var title =$('#title').val();
  var parent_id =$('#parent_id').val();
  var paper_category =$('#paper_category').val();
  // alert(paper_category); return;
  var SendData = {title:title,parent_id:parent_id,paper_category:paper_category};

  if (title.length==0 )  { 
    // $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>'); 
    $('#title').focus();
    return; 
  }
  if (paper_category.length==0  )  { 
    // $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>'); 
    $('#paper_category').focus(); 
    return; 
  }
  else { $('#error_msg_form').html(''); }
  
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_question_topics', data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_question_topics_table'); clear_form(); show_hide_form(); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">Question Topics Already Exist.</span>'); }
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

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_question_topics_table');
}

function update(id)
{
  var title = $('#titleInput'+id).val();
  var parent_id = $('#parent_idInput'+id).val();
  var paper_category = $('#paper_categoryInput'+id).val();
  var SendData = {title:title,parent_id:parent_id,paper_category:paper_category};
   if (title.length==0 || parent_id.length==0 || paper_category.length==0  ) { $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>');  return; }
  else { $('#error_msg_form').html(''); }

      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_question_topics/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_question_topics_table'); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">Question Topics Already Exist.</span>'); }
        }
      });
}


  function get_question_topics(id){
    if (id=="0") {
       var paper_category = $('#paper_category').val();
       $('#parent_id').load('<?=base_url()?>ResultReportMaster/get_question_topics/'+paper_category);
    }
    else {
        var paper_category = $('#paper_categoryInput'+id).val();
       $('#parent_idInput'+id).load('<?=base_url()?>ResultReportMaster/get_question_topics/'+paper_category);
    }
  }
</script> 
