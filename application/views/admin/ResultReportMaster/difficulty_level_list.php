<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Difficulty Level List</h1>
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
              <style type="text/css">
          .add-btn {float: right}
          .panel-heading { padding-bottom: 15px; }
          #add_form div{margin-top: 5px;margin-bottom: 5px; }
          .table-filter {width: 150px!important; }
          .table-filter-label { float: right;}
          .error-msg { float: left;font-size: 20px;font-family: serif;color: red }
          .correct_ans_ladel{ font-size: 8px;margin-top: -1px }
  </style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Difficulty Level here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="add_form" class="col-lg-12 col-md-12" style="border: 1px solid #ddd;margin-bottom: 10px;">
                                <div class="col-lg-8 col-md-8">
                                    <div class="col-md-6">
                                      <select class="ClassInput form-control input-sm" name="paper_category" id="paper_category" >
                                          <option value="">-- Select Paper Category--</option>
                                          <?php
                                          foreach ($paper_category as $p_category) {
                                           echo "<option ".$s." value='".$p_category->id."'>";
                                           echo $p_category->category;
                                           echo "</option>";
                                          }
                                          ?>
                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control input-sm" style="width: 150px;" name="section" id="section" placeholder="Section ( A - Z ) " oninput="$(this).val($(this).val().toUpperCase());" maxlength="1"  >
                                    </div>
                                    <div class="col-md-12">
                                      <label>Difficulty Level</label>
                                        <input type="text" class="form-control input-sm"  name="difficulty_level" id="difficulty_level" placeholder="Difficulty Level"  >
                                    </div>
                                    <div class="col-md-12">
                                      <label>Parameters</label>
                                        <input type="text" class="form-control input-sm"  name="parameters" id="parameters" placeholder="Parameters"  >
                                    </div>
                                    <div class="col-md-6">
                                      <label>Weightage ( in % )</label>
                                       <input type="number" class="form-control input-sm" style="width: 150px;" name="weightage" id="weightage" placeholder="Weightage %"  >
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-lg-2 col-md-2">
                                          <label><br></label>
                                          <input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
                                        </div>
                                        <div class="col-lg-2 col-md-2">
                                          <label><br></label>
                                          
                                          <input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-">
                                   <div class=" col-lg-12 col-md-12">
                                        <textarea class="form-control input-sm" rows="5"  name="desc" id="desc" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                
                                <br>
                                <br>
                            </div>
                          
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Paper Category</th>
                                        <th>Section</th>
                                        <th>Difficulty_level</th>
                                        <th>Parameters</th>
                                        <th>Desc</th>
                                        <th>Weightage</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                   

                                    <?php $i=1; foreach($difficulty_lavel as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?php
                                            foreach ($paper_category as $p_category) {
                                             $s=""; if ($p_category->id==$row->paper_category) { 
                                               echo $p_category->category;
                                              }
                                            }
                                            ?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <select class="ClassInput form-control input-sm" name="paper_category<?=$row->id?>" id="paper_category<?=$row->id?>" >
                                            <option value="">-- Select Paper --</option>
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

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->section?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="section<?=$row->id?>" value="<?=$row->section?>"  placeholder="Section ( A - Z ) " oninput="$(this).val($(this).val().toUpperCase());" maxlength="1" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->difficulty_level?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="difficulty_level<?=$row->id?>" value="<?=$row->difficulty_level?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->parameters?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="parameters<?=$row->id?>" value="<?=$row->parameters?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->desc?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <textarea class="form-control" id="desc<?=$row->id?>"><?=$row->desc?></textarea>
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->weightage?> %
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="number" class="form-control" id="weightage<?=$row->id?>" value="<?=$row->weightage?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>

                                        <td>
                                            <span id="active_status<?=$row->id?>" class="V_data V_data<?=$row->id?>">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <button class="btn btn-success btn-xs update update<?=$row->id?>"  onclick="update('<?=$row->id?>')">Update</button>
                                        </td>

                                        <td>
                                            <a  class="btn btn-warning btn-xs V_data V_data<?=$row->id?>"    onclick="edit('<?=$row->id?>')">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-xs update update<?=$row->id?>" onclick="update_hide('<?=$row->id?>')">Cancel</button>
                                        </td>
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
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/difficulty_level_master/'+id+'/'+status);
            }

        </script>

        <!-- Modal -->
 


  <script type="text/javascript">
  // onload hide
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();


    function clear_form() {
  $('#category').val(''); $('#add_form').hide();
  }

  function show_hide_form(){
  $('#add_form').toggle();
  $('#paper_category').focus();
  $('#paper_category').val('');
  $('#error_msg').html('');
  $('.update').hide();
  $('.V_data').show();
}

function form_submit(){
  var paper_category =$('#paper_category').val();
  var section =$('#section').val();
  var difficulty_level =$('#difficulty_level').val();
  var parameters =$('#parameters').val();
  var weightage =$('#weightage').val();
  var desc =$('#desc').val();

   if (paper_category.length==0)        { $('#paper_category').focus();   return; }
   if (section.length==0)               { $('#section').focus();          return; }
   if (difficulty_level.length==0)      { $('#difficulty_level').focus(); return; }
   // if (parameters.length==0)            { $('#parameters').focus();       return; }
   if (weightage.length==0)             { $('#weightage').focus();       return; }
   if (desc.length==0)                  { $('#desc').focus();             return; }
  
  var SendData = {paper_category:paper_category,section:section,difficulty_level:difficulty_level,parameters:parameters,desc:desc,weightage:weightage };

      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_difficulty_level', data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table'); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">Category Already Exist.</span>'); }
        }
      });
}

function edit(id){
  $('.update').hide(); 
  $('.V_data').show(); 
  $('#add_form').hide();

  $('.update'+id).show(); 
  $('.V_data'+id).hide(); 

  $('#categoryInput'+id).focus();
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table');
}

function update(id)
{
  var paper_category =$('#paper_category'+id).val();
  var section =$('#section'+id).val();
  var difficulty_level =$('#difficulty_level'+id).val();
  var parameters =$('#parameters'+id).val();
  var weightage =$('#weightage'+id).val();
  var desc =$('#desc'+id).val();

   if (paper_category.length==0)        { $('#paper_category'+id).focus();   return; }
   if (section.length==0)               { $('#section'+id).focus();          return; }
   if (difficulty_level.length==0)      { $('#difficulty_level'+id).focus(); return; }
   // if (parameters.length==0)            { $('#parameters'+id).focus();       return; }
   if (weightage.length==0)             { $('#weightage'+id).focus();        return; }
   if (desc.length==0)                  { $('#desc'+id).focus();             return; }
  
  var SendData = {paper_category:paper_category,section:section,difficulty_level:difficulty_level,parameters:parameters,desc:desc,weightage:weightage };

      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_difficulty_level/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_difficulty_level_table'); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">Category Already Exist.</span>'); }
        }
      });
}



</script>