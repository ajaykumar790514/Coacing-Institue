<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Paper Category List</h1>
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
            <!-- <a style="float: right" class="btn btn-warning btn-xs"  href="javascript:void(0);" onclick="show_hide_form()"><i class="fa fa-plus"></i> Add</a> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Paper Category here
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div id="add_form" class="col-lg-12 col-md-12">
                                <div class="col-lg-5 col-md-5"></div>
                                <div class="col-lg-3 col-md-3">
                                  <input type="text" class="form-control input-sm" style="width: 150px;" name="category" id="category" placeholder="Category"  >
                                  <span id="error_msg"></span>
                                </div>
                               
                               <div class="col-lg-1 col-md-1">
                                  <input type="button" class="btn btn-success btn-xs" onclick="form_submit()"  value="Add">
                                </div>
                                <div class="col-lg-1 col-md-1">
                                  <input type="reset" onclick="clear_form()" class="btn btn-danger btn-xs" value="Cancel">
                                </div>
                                <br>
                                <br>
                            </div>
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Paper Category</th>
                                        <th>Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                   

                                    <?php $i=1; foreach($paper_category as $row){
                                        
                                     ?>
                                    <tr class="">
                                        <td><?=$i?></td>
                                        <td class="V_data V_data<?=$row->id?>">
                                            <?=$row->category?>
                                        </td>
                                        <td class="update update<?=$row->id?>" >
                                          <input type="ṭext" class="form-control" id="categoryInput<?=$row->id?>" value="<?=$row->category?>" min="1" onkeypress="update_onEnter('<?=$row->id?>',event)">
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
                $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/paper_category/'+id+'/'+status);
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
  $('#category').val(''); $('#add_form').hide();
  }

  function show_hide_form(){
  $('#add_form').toggle();
   $('#category').focus();
   $('#category').val('');
  $('#error_msg').html('');
  $('.update').hide();
  $('.V_data').show();
}

function form_submit(){
  var category =$('#category').val();
  var SendData = {category:category};
    if (category.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_paper_category', data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_paper_category_table'); }
          else if(data==2){ $('#error_msg').html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg').html('<span style="color:red">Category Already Exist.</span>'); }
        }
      });
    }
}
$(document).keyup(function(event) {
    if ($("#category").is(":focus") && event.key == "Enter") {
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

  $('.update'+id).show(); 
  $('.V_data'+id).hide(); 

  $('#categoryInput'+id).focus();
}

function update_hide()
{
  $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_paper_category_table');
}

function update(id)
{

  var category =$('#categoryInput'+id).val();
  var SendData = {category:category};
  if (category.length>0) {
      $.ajax({
        type: 'POST', url:'<?=base_url()?>ResultReportMaster/manage_paper_category/'+id, data:SendData,
        success:function(data){
          // alert(data); return;
          if (data==0) { $('#tableDATA').load('<?=base_url()?>ResultReportMaster/reload_paper_category_table'); }
          else if(data==2){ $('#error_msg'+id).html('<span style="color:red">Some System Error !</span>'); }
          else{ $('#error_msg'+id).html('<span style="color:red">Category Already Exist.</span>'); }
        }
      });
    }

}

</script>