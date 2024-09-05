<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Classes List</h1>
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
                            Manage Menu here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                    <tr id="add_form">
                              <!-- <form id="add_function"> -->
                              <!-- <form action="<?=base_url()?>index.php/admin/add_function" method="post" id="add_function"> -->
                                <td></td>
                                <td>
                                  <input type="number" class="form-control input-sm" style="width: 150px;" name="claSS" id="claSS" placeholder="Class" min="1" >
                                  <span id="error_msg"></span>
                                </td>
                               
                                <td>
                                  <input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
                                </td>
                                <td>
                                  <input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
                                </td>
                              <!-- </form> -->
                            </tr>

                                    <?php $i=1; foreach($classes as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td class="V_data" id="class_td<?=$row->id?>">
                                            <?=$row->class?>
                                        </td>
                                        <td class="update" id="class_input_td<?=$row->id?>">
                                          <input type="number" class="ClassInput form-control" id="classInput<?=$row->id?>" value="<?=$row->class?>" min="1" onkeypress="update_onEnter('<?=$row->id?>',event)">
                                          <span id="error_msg<?=$row->id?>"></span>
                                        </td>
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
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/class_master/'+id+'/'+status);
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
  // onload hide
$('#add_form').hide();
$('.update').hide(); 
$('.V_data').show();


    function clear_form() {
  $('#claSS').val(''); $('#add_form').hide();
  }

  function show_hide_form(){
  $('#add_form').toggle();
   $('#claSS').focus();
  $('.update').hide();
  $('.V_data').show();
}

function form_submit(){
  var claSS =$('#claSS').val();
  var SendData = {class:claSS};
    if (claSS.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>class_master/manage_classes', data:SendData,
        success:function(data){
          // alert(data);
          if (data==0) { $('#tableDATA').load('<?=base_url()?>class_master/reload_class_table'); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">This Class Is Already Exist.</span>'); }
        }
      });
    }
}
$(document).keyup(function(event) {
    if ($("#claSS").is(":focus") && event.key == "Enter") {
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
  $('#update_button'+id).show();
  $('#update_cancel'+id).show();


  $('#class_td'+id).hide();
  $('#active_status'+id).hide();
  $('#active_status'+id).hide();
  $('#edit_button'+id).hide();
  $('#classInput'+id).focus();
  var vv = $('#classInput'+id).val();
  $('#classInput'+id).val('');
  $('#classInput'+id).val(vv);
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>class_master/reload_class_table');
}

function update(id)
{

  var claSS =$('#classInput'+id).val();
  var SendData = {class:claSS};
  if (claSS.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>class_master/manage_classes/'+id, data:SendData,
        success:function(data){
          // alert(data);
          if (data==0) { $('#tableDATA').load('<?=base_url()?>class_master/reload_class_table'); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">This Class Is Already Exist.</span>'); }
        }
      });
    }

}

</script>