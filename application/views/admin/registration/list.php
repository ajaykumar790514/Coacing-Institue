<style type="text/css">
  table{
    font-size: 12px;
  }
</style>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Registrations List</h1>
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
  <div class="row">
    <div class="col-md-12">
        <div class="form-group" style="float: left;">
               <label>Test Date</label>
                <select onchange="filter_test_date(this.value)" id="test_date" class="form-control">
                  <option value="1">--Select Test --</option>
                  <?php if ($test_date=='0') {
                      echo '<option value="0" selected> All Tests</option>';
                  }
                  else{
                      echo '<option value="0" > All Tests  </option>';
                  } ?>

                 
                  <?php foreach ($test as $row1) {
                    $select='';
                    if ($test_date==$row1->test_date) {
                        $select="selected";
                    }
                    echo'<option value="'.$row1->test_date.'" '.$select.'>';
                    echo $row1->test_date." ";
                    echo'</option>';
                  } ?>
                </select>
            </div> 
    </div>
  </div>


  <!-- <a style="float: left" class="btn btn-warning btn-xs" href="<?=base_url()?>admin/download_xlsx/<?=$test_date?>" target="_blank"> -->
  <a style="float: left" class="btn btn-warning btn-xs" href="#" onclick="Download_excel()" >
    <i class="fa fa-file"></i>
    <?php if ($test_date==0 or $test_date==1) {
      echo 'Download All Registrations Excel';
    }
    else{
      echo "Download ".$test_date." Excel";
    } 
     $username=$this->session->userdata('username');
     ?>
  </a>
  <a style="float: right" class="btn btn-warning btn-xs" href="<?=base_url()?>Admission_form/1" target="_blank">
    <i class="fa fa-plus"></i> New Registrations
  </a>

  <div class="row">
    <div class="col-lg-12">
       
      <div class="panel panel-default">
        <div class="panel-heading">
          Manage Registrations here....
        <!--   <div style="float: right;" >
            <div class="form-group" style="float: left;">
               <label></label>
                <input style="" class="" type="text" onkeyup="search_sutdent(this.value)" name="" placeholder="Reg. / Student / Father / Mother">
            </div>

                     
           
          </div> -->
          
        </div>
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-list1">
            <thead>
              <tr>
                  <th style="width: 5%">S.N.</th>
                  <th style="width: 10%">Registration No.</th>
                  <th style="width: 10%">Student Name</th>
                  <th style="width: 10%">Father's Name</th>
                  <!-- <th>Mother's Name</th> -->
                  <th style="width: 10%">Admission by</th>
                  <th style="width: 10%">Reg. Date</th>
                  <th style="width: 25%">Reg. Fee</th>
                  <th style="width: 10%">More</th>
              </tr>
            </thead>
            <tbody id="search_data">
              <?php $i=1; foreach($reg as $row){
              date_default_timezone_set('Asia/Calcutta');
              $date = date('Y-m-d',time()); ?>
                <tr class="">
                  <td><?=$i?></td>
                  <td><?=$row->registration_no?></td>
                  <td><?=$row->student_name?></td>
                  <td><?=$row->father_name?></td>
                  <!-- <td><?=$row->mother_name?></td> -->
                  <td><?php  
                      if ($row->reg_by_admin=='0') { echo 'Student'; }
                      else {
                           $user=$this->main_model->get_data_id('admin',$row->reg_by_admin);
                           if ($user) {
                             echo $user->name;
                           }
                           else
                           {
                            echo $row->reg_by_admin;
                           }
                        } 
                        ?>
                  </td>
                  <td><?php 
                        echo date("d-M-Y", strtotime($row->submitted_date));
                      ?>
                  </td>
                  <!-- fee -->
                  
                  <td id="fee_td<?=$row->id?>">
                    <?php if ($row->fee_pay_status==0) {
                        echo "PENDING";
                        $check_fee1['test_date'] = $row->admission_test_date;
                        $check_fee1['class']   = $row->program_code;
                        $check_fee1['status']  = 1;
                        $check_fee1['from_date<='] = $date;
                        $check_fee1['to_date>=']  = $date;
                        $fee=$this->db->get_where(' reg_fee_master',$check_fee1)->row();

                        ?>
                        <button class="btn btn-primary btn-xs" id="h_s_pay_button<?=$row->id?>" onclick="toggle_pay_form('<?=$row->id?>')">Collect</button>

                          <div class="form-group tr_form tr_form<?=$row->id?>">
                            <label for="transaction_mode<?=$row->id?>">Fee</label>
                            <input type="number" name="fee<?=$row->id?>" id="fee<?=$row->id?>" value="<?=$fee->fee?>" class="form-control input-sm" style="width: 70%;">
                          </div>

                          <div class="form-group tr_form tr_form<?=$row->id?>">
                            <label for="collected_by<?=$row->id?>">Collected by</label>
                            <input type="text" class="form-control input-sm" id="collected_by<?=$row->id?>" style="width: 70%;" value="<?=$username?>" placeholder="Collected by" readonly>
                            
                          </div>

                          <div class="form-group tr_form tr_form<?=$row->id?>">
                            <label for="transaction_mode<?=$row->id?>">Transaction Mode</label>
                            <select id="transaction_mode<?=$row->id?>" class="form-control input-sm" style="width: 70%;" >
                              <option value="">--- Select ---</option>
                              <option value="Cash">Cash</option>
                              <option value="Swipe Machine">Swipe Machine</option>
                            </select>
                          </div>

                         
                          <div class="form-group tr_form tr_form<?=$row->id?>">
                            <button class="btn btn-success btn-xs" onclick="submit_trn('<?=$row->id?>')"  > Submit </button>
                          </div>
                        <?php
                        
                    }
                    else if ($row->fee_pay_status==1) {
                        echo "<h3 align='center' style='color:green;' >Paid.</h3><br>";
                        echo"<small>";
                        echo "Collected by - ".$row->collected_by."<br>";
                        echo "Trans. Mode - ".$row->transaction_mode;
                        echo"</small>";

                    }

                    ?>
                  </td>
                  <!-- fee -->
                  <td style="text-align: center;">
                    <!--  ########## info ########### -->
                    <a   class="btn btn-info btn-xs" title="VIEW DETAILS" onclick="achievement_detail(<?=$row->id?>)"  >
                      <i class="fa fa-info"></i>
                    </a>
                    <br>
                    <!--  ########## Generate Hall Ticket ########### -->            
                    <a href="<?=base_url()?>stusents/HallTicket/<?=$row->id?>" class="btn btn-warning btn-xs" target="_blank" title="Hall Ticket">Hall Ticket</a>
                    <br>
                    <!--  ########## Generate Result / View Result ########### -->
                    <a href="<?=base_url()?>admin/generate_result/<?=$row->id?>" data-toggle="modal" data-target="#generate_result" class="btn btn-success btn-xs" onclick="generate_result(<?=$row->id?>)" title="Generate Result">
                        <?php
                          $reg=array('stu_reg_number' => $row->registration_no);
                          $result=$this->admin_model->get_data_multi_column('results',$reg);
                          $res=count($result->result());
                            if ($res>0){ echo 'View Result'; } 
                            else {  echo'Generate Result'; } ?>
                    </a><br>
                    <!--  ########## delete  Result / Reg ########### -->
                    <a href="javascript:void(0);"  data-toggle="modal" data-target="#delete_reg_res" class="btn btn-danger btn-xs" onclick="del(<?=$row->id?>)" title="Delete Result / Reg">
                      <i class="fa fa-trash"></i>
                    </a><br>
                  </td>
                </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
        $('#dataTables-list1').DataTable({
            retrieve: true,
    paging: false
        });
    });
    </script>



<script type="text/javascript">
$(".tr_form").hide();
function toggle_pay_form(id){
  // $(".tr_form").hide();
  $(".tr_form"+id).toggle();
  var pay_button = $('#h_s_pay_button'+id).html();
  if (pay_button=='Collect') { $('#h_s_pay_button'+id).html('Cancel'); }
  else if (pay_button=='Cancel') { $('#h_s_pay_button'+id).html('Collect'); }
}

function submit_trn(id)
{
    var fee    = $('#fee'+id).val();
    var transaction_mode  = $('#transaction_mode'+id).val();
    var collected_by  = $('#collected_by'+id).val();
    

    if(fee == ''){ $('#fee'+id).focus(); return false; }
    if(transaction_mode == ''){ $('#transaction_mode'+id).focus(); return false; }
    if(collected_by == ''){ $('#collected_by'+id).focus(); return false; }
    
    var SendData = {registration_fee:fee,transaction_mode:transaction_mode,collected_by:collected_by};

    $.ajax({
      type: 'POST', url:'<?=base_url()?>admin/collect_fee/'+id, data:SendData,
      success:function(data){
        // alert(data); return;
        if (data!=1) {
          alert('some error occurred.');
        }
        else
        {
          location.reload();
        }
       
        
      }
    });
}


function achievement_detail(id)
{
    window.open('<?=base_url()?>index.php/admin/registration_detail/'+id);
}


function activate_inactive(id,status)
{
    $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
    $("#active_status"+id).load('<?=base_url()?>index.php/admin/active_inactive_achievement/'+id+'/'+status);
}


function generate_result(id) 
{
  $("#result").html('<h3 style="color:red">Loading....</h3>');
  $("#result").load('<?=base_url()?>index.php/result_master/generate_result/'+id);
}

function del(id) 
{
  $('#delete').load('<?=base_url()?>index.php/result_master/delete_reg_res/'+id);
}

function filter_test_date(date) 
{
    window.open('<?=base_url()?>admin/registration_list/'+date,"_self");
}   

function Download_excel()
{
  // alert('currently link not working');
  // return;
    var test_date = $('#test_date').val();
    window.open('<?=base_url()?>admin/download_xlsx/'+test_date,"_blank");
    // window.open('<?=base_url()?>export/createxls/'+test_date,"_blank");
}                                  
</script>


  <div class="modal fade" id="generate_result" role="dialog">
    <div class="modal-dialog modal-md" style="">
    
      <!-- Modal content-->
      <div class="modal-content" id="result">
        
      </div>
      
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="delete_reg_res" role="dialog">
    <div class="modal-dialog modal-sm" style="">
    
      <!-- Modal content-->
      <div class="modal-content" id="delete">
        
      </div>
      
    </div>
  </div>


  

