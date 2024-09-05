<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Downloads List</h1>
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
                            Manage Programs here
                            <span style="float: right;" id="error_msg_form"></span>
                        </div>

                        <div class="col-md-12">
                          <div class="col-md-12">
                            <span class="message_box"></span>
                          </div>
                          <form method="post" enctype="multipart/form-data" id="add_form">
                          <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label for="title">Title</label>
                                 <input type="text" name="title" id="title" class="form-control input-sm"  placeholder="Title" >
                            </div>

                            <div class="form-group col-md-4">
                                <label for="program">File</label>
                                <input type="file" name="files" id="files" class="form-control input-sm">
                            </div>

                           

                            <div class="form-group col-md-4">
                                <label><br></label><br>
                                 <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                                 <button type="reset"  id="reset"  class="btn btn-danger btn-xs">Cancel</button>
                            </div>
                          </div>

                        
                         </form> 
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                  

                                    <?php $i=1; foreach($downloads as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <!-- class -->
                                        <td class="V_data" id="class_td<?=$row->id?>">
                                            <?=$row->title?>
                                        </td>
                                        <td class="update" id="class_input_td<?=$row->id?>">
                                         <input type="number"  id="classInput<?=$row->id?>" value="<?=$row->class?>" >
                                          
                                        </td>
                                        <!-- class -->
                                        <!-- program -->
                                        <td class="V_data" id="Program_td<?=$row->id?>">
                                            <?=$row->file_url?>
                                        </td>
                                        <td class="update" id="program_input_td<?=$row->id?>">
                                          <input type="text" class="form-control" id="programInput<?=$row->id?>" value="<?=$row->program?>" >
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>
                                        <!-- program -->
                                       
                                        <!-- action -->
                                        <td>
                                            <span id="active_status<?=$row->id?>" class="V_data">
                                            <?php if($row->status==1){?>

                                                <button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$row->id?>,0)">Activated</button>
                                                <?php }else{ ?>
                                                <button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$row->id?>,1)">Not Activated</button>
                                                <?php } ?>
                                            </span>
                                            <button class="btn btn-success btn-xs update" id="update_button<?=$row->id?>" onclick="update('<?=$row->id?>')">Update</button>
                                        </td>

                                        <td>
                                            <a  class="btn btn-warning btn-xs V_data"  id="edit_button<?=$row->id?>"  onclick="edit('<?=$row->id?>')">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-xs update" id="update_cancel<?=$row->id?>" onclick="update_hide('<?=$row->id?>')">Cancel</button>
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
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/program_master/'+id+'/'+status);
            }

        </script>

        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Category Details..</h4>
        </div>
        <div class="modal-body" id="p_d">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script type="text/javascript">
// onload 
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();
// reset and hide add fess form
$(document).ready(function() {
 $('#reset').click(function(){
    $('#add_form').hide();
    $('#message_box').html('');
 });
});
// show hide add fees form
function show_hide_form(){
  $('#add_form').toggle();       $('#error_msg').html('');
  $('#title').focus();   $('.update').hide();
  $('.V_data').show();
}
// add fees form submit
$(document).ready(function() {
 $('#add_form').submit(function(e){
 e.preventDefault();
 // alert('submit');
var fd = new FormData(this);



// if(title == ''){
// $('.message_box').html('<span style="color:red;">Enter Academic Year!</span>'); $('#academic_year').focus();
// return false; }

// if(files == ''){
// $('.message_box').html('<span style="color:red;">Select Class!</span>'); $('#claSS').focus();
// return false; }



 $.ajax({
      type: 'POST', 
      url:'<?=base_url()?>downloads/manage_downloads', 
      data: fd ,
      contentType: false,
      cache: false,
      processData:false,
      success:function(data){
        alert(data); return;
        if (data==0) {  $("#reset").click(); set_gst_rate();
        $('.message_box').html('<span style="color:green">Fees Details Added successful.</span>'); }
        else if(data==2){ $('.message_box').html('<span style="color:red">Some System Error !</span>'); }
        else{ $('.message_box').html('<span style="color:red">Fees Details Already Exist.</span>'); }
      }
    });
 });

 });





$(document).keyup(function(event) {
    if ($("#fees").is(":focus") && event.key == "Enter") {
        form_submit();
    }
});

function update_onEnter(id,event) {
  var x = event.which || event.keyCode;
  // document.getElementById("demo").innerHTML = "The Unicode value is: " + x;
  if (x==13) {
    update(id);
  }
  // alert(id);
  // alert(x);
}


function edit(id){
  $('.update').hide(); 
  $('.V_data').show(); 
  $('#add_form').hide();

  $('#class_input_td'+id).show();
  $('#program_input_td'+id).show();
  $('#fees_input_td'+id).show();
  $('#update_button'+id).show();
  $('#update_cancel'+id).show();


  $('#class_td'+id).hide();
  $('#active_status'+id).hide();
  $('#Program_td'+id).hide();
  $('#Fees_td'+id).hide();
  $('#edit_button'+id).hide();
  $('#classInput'+id).focus();
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>class_master/reload_program_table');
}

function update(id)
{

  var claSS =$('#classInput'+id).val();
  var program =$('#programInput'+id).val();
  var fees =$('#feesInput'+id).val();
  var SendData = {class:claSS,program:program,fees:fees};
  if (claSS.length==0 || program.length==0 || fees.length==0 ) { $('#error_msg_form').html('<span style="color:red">All fields are mandatory</span>');  return; }
  else { $('#error_msg_form').html(''); }

  if (program.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>class_master/manage_programs/'+id, data:SendData,
        success:function(data){
         
          if (data==0) { $('#tableDATA').load('<?=base_url()?>class_master/reload_program_table'); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">This Program Is Already Exist.</span>'); }
        }
      });
    }

}

</script>