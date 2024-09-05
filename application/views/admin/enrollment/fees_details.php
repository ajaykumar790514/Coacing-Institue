<script type="text/javascript">
   


hide_show_submit_btn();

function hide_show_submit_btn()
{
    var rowCount = $('#dataTables-example tr').length;
    // alert(rowCount);    
    if (rowCount==1 || rowCount==0) { $('#submit').addClass('disabled'); }
    else { $('#submit').removeClass('disabled');}
    
}

</script>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                    <h3>Progrma - <?=$program->program?></h3>
                 <!--  <h2>Inline form</h2> -->
                    <h4 id="msg"></h4>
                  <div class="form-inline" >
                     <!-- <div class="form-group">
                      <label for="pwd">Scholarship  :</label>
                      <?//=$fees_details[0]->scholarship?> %
                    </div> -->

                    <div class="form-group">
                      <label for="pwd">Fees Plan  :</label>
                          <?php
                          foreach ($fee_plan as $f_plan) {
                           if ($fees_details[0]->fee_plan==$f_plan->id) {
                              echo $f_plan->plan_title;
                           }
                          
                          }
                          ?>
                      
                    </div>

                    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
                  </div>
                </div>
                <div class="col-md-6" id="fees_details">
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Fees here
                        </div>
                        <div class="panel-body">
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th >Academic Year</th>
                                        <th>Fees</th>
                                        <th>Payment Date</th>
                                        <th>Pay Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tableDATA">
                                  <?php $i=0;
                                  foreach ($fees_details as $row) { $i++;
                                    // $fees_amount=unserialize($row->fees_amount);
                                    // echo "<pre>";
                                    // print_r($fees_amount);
                                    // echo "</pre>";
                                   ?>
                                    <tr>
                                      <td><?=$i?></td>
                                      <td>
                                        <?=$row->academic_year?>
                                      </td>
                                      <td style="width:40%;">
                                        <table class="table table-striped table-bordered">
                                          <tr >
                                            <th style="text-align: center;">Fee Head</th>
                                            <th style="text-align: center;">Base Amount</th>
                                            <th style="text-align: center;">GST</th>
                                            <th style="text-align: center;">Total Amount</th>
                                          </tr>
                                          <?php
                                           $fees_amount=unserialize($row->fees_amount);
                                           // echo "<pre>"; print_r($fees_amount); echo "</pre>";
                                            foreach ($fees_amount as $key=>$f_amount) { ?>
                                              <tr>
                                                <?php  if ($key=="total") { ?>
                                                  <td><?=$key?></td>
                                                  <td colspan="2" style='text-align: right;' >
                                                    <?=$f_amount['total']?>
                                                  </td>
                                                  <td style='text-align: right;'><?=$f_amount['total_fee']?></td>
                                                <?php }
                                                 elseif ($key=="discount") { if(!empty($f_amount['per_amount'])){?>
                                                  <td><?=$key?></td>
                                                  <td colspan="2" style='text-align: right;' >
                                                    <?=$f_amount['title']?>
                                                  </td>
                                                  <td style='text-align: right;'><?=$f_amount['per_amount']?></td>
                                                 <?php }}elseif ($key=="FinalTotal"){?>
                                                  <td><?=$key?></td>
                                                  <td colspan="2" style='text-align: right;' >
                                                    <?=$f_amount['last_title']?>
                                                  </td>
                                                  <td style='text-align: right;'><?=$f_amount['last_total']?></td>
                                                  <?php }else{?>
                                                <td><?=$key?></td>
                                                <?php
                                                foreach ($f_amount as $amount) {
                                                  echo "<td style='text-align: right;'>".$amount."</td>";
                                                }
                                                ?>

                                              </tr>
                                              <?php
                                             }
                                            }
                                          ?>
                                          <tr>
                                               <td>Due</td>
                                               <td style='text-align: right;' colspan="3"><?=$row->due?></td>
                                             </tr>
                                           
                                        </table>
                                      </td>
                                      <td>
                                        <?=$row->payment_date?>
                                      </td>
                                      <td>
                                        <?php
                                        if ($row->pay_status==1) {
                                          echo"<h4>Done</h4><br>";
                                          echo "<b>".$row->transaction_mode."</b> - ".$row->transaction_id."<br>";
                                          echo 'Date - '.$row->transaction_time;
                                          ?>
                                          <?php echo "<br><br>"; foreach($fees as $fee):?>
                                          <a href="<?=base_url('enrollment/print_receipt/'.$fee->invoice_no);?>" target="_blank" class="btn btn-success btn-xs" id="print_btn<?=$row->stu_id?>" >Print Receipt <?=$fee->invoice_no;?></a><br><br>
                                          <?php endforeach;?>
                                      <?php  }
                                        else{ ?>

                                            <div class="form-group tr_form tr_form<?=$row->id?>">
                                            <label for="transaction_mode<?=$row->id?>">Transaction Mode</label>
                                            <select id="transaction_mode<?=$row->id?>" class="form-control input-sm" style="width: 70%;" onchange="set_transaction(this.value,'<?=$row->id?>')">
                                              <option value="">--- Select ---</option>
                                              <option value="Cash">Cash</option>
                                              <option value="Cheque">Cheque</option>
                                              <option value="Online">Online</option>
                                              <!-- <option value=""></option>
                                              <option value=""></option> -->
                                            </select>
                                          </div>

                                          <div class="form-group tr_form tr_form<?=$row->id?>">
                                            <label for="transaction_id<?=$row->id?>">Transaction Id</label>
                                            <input type="text" class="form-control input-sm" id="transaction_id<?=$row->id?>" style="width: 70%;" placeholder="Transaction Id, Cash Received By, Cheque No. ">
                                            <label>Amount</label>
                                            <input type="number" class="form-control input-sm" name="amount<?=$row->id?>" style="width: 70%;" id="amount<?=$row->id?>" value="<?=$row->due?>" min="1" max="<?=$row->due?>" >
                                            <input type="hidden"  id="total<?=$row->id?>" value="<?=$row->due?>">
                                            <span style="font-size: 8px;font-style: italic;">Transaction Id, Cash Received By, Cheque No. </span>
                                          </div>
                                          <div class="form-group tr_form tr_form<?=$row->id?>">
                                          <label>Amount Due Date</label>
                                            <input type="date" class="form-control input-sm mb-4" name="duedate<?=$row->id?>" style="width: 70%;margin-bottom:5px;" id="duedate<?=$row->id?>" value="<?=date('Y-m-d');?>" min="<?=date('Y-m-d');?>"  >
                                          </div>
                                          <div class="form-group tr_form tr_form<?=$row->id?>">
                                            <button class="btn btn-primary btn-xs" onclick="submit_trn('<?=$row->id?>')"  > Submit </button>
                                          </div>
                                          <button class="btn btn-danger btn-xs" id="h_s_pay_button<?=$row->id?>" onclick="toggle_pay_form('<?=$row->id?>')">Pay</button><br><br>
                                          <?php foreach($fees as $fee):?>
                                          <a href="<?=base_url('enrollment/print_receipt/'.$fee->invoice_no);?>" target="_blank" class="btn btn-success btn-xs" id="print_btn<?=$row->stu_id?>" >Print Receipt <?=$fee->invoice_no;?></a><br><br>
                                          <?php endforeach;?>
                                          

                                       <?php } 

                                        ?>
                                        
                                      </td>
                                    </tr>
                                    <?php
                                   
                                  }
                                  ?>
                                </tbody>
                            </table>
                            
                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $username=$this->session->userdata('username');
        ?>
        <!-- /#page-wrapper -->

<script type="text/javascript">
  $(".tr_form").hide();
  function toggle_pay_form(id){
    $(".tr_form"+id).toggle();
    var pay_button = $('#h_s_pay_button'+id).html();
    if (pay_button=='Pay') { $('#h_s_pay_button'+id).html('Cancel'); }
    else if (pay_button=='Cancel') { $('#h_s_pay_button'+id).html('Pay'); }
  }
    function category_detail(id)
    {
        $("#p_d").html('<h3 style="color:red">Loading....</h3>');
        $("#p_d").load('<?=base_url()?>index.php/admin/category_detail/'+id);
    }

    function activate_inactive(id,status)
    {
        $("#active_status"+id).html('<strong style="color:red">Loading....</strong>');
        $("#active_status"+id).load('<?=base_url()?>main_controller/ActiveInactive/manage_role/'+id+'/'+status);
    }

    function set_transaction(tr_mode,id)
    {
      if (tr_mode=='Cash') {
          $("#transaction_id"+id).val('<?=$username?>');
          $("#transaction_id"+id).attr('readonly',true);
      }
      else {
        $("#transaction_id"+id).val('');
        $("#transaction_id"+id).attr('readonly',false);
      }
    }

    function submit_trn(id)
    {
        var transaction_mode  = $('#transaction_mode'+id).val();
        var transaction_id    = $('#transaction_id'+id).val();
        var amount            = $('#amount'+id).val();
        var total            = $('#total'+id).val();
        var duedate            = $('#duedate'+id).val();

        if(transaction_mode == ''){
        $('#transaction_mode'+id).focus();
        return false; }

        if(transaction_id == ''){
        $('#transaction_id'+id).focus();
        return false; }

        if(amount.length==0 || amount>total || amount<1){
        $('#amount'+id).focus();
        return false; }

         if(amount.length==0){
       alert('some error occurred.');
        return false; }
        if(duedate == ''){
        $('#duedate'+id).focus();
        return false; }

        
        var SendData = {transaction_mode:transaction_mode,transaction_id:transaction_id,amount:amount,total:total,duedate:duedate};
  
        $.ajax({
          type: 'POST', url:'<?=base_url()?>enrollment/pay_fees/'+id, data:SendData,
          success:function(data){
            // alert(data); return;

            if (data==1) {
              alert('Fee does not submitted.');
            }
            else
            {
              location.reload();
            }
           
            
          }
        });
    }
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#get_fees_details').click(function(){
      var stu_id = '<?=$student->stu_id?>';
      var Scholarship = $('#scholarship').val();
      var FEE_PLAN = $('#fee_plan').val();

    if(FEE_PLAN == ''){
    $('#msg').html('<span style="color:red;">Select Fee Plan !</span>'); $('#fee_plan').focus();
    return false; }
    $('#msg').html('');

        $('#tableDATA').html('');
      $('#tableDATA').html('Loading.....');
      $('#tableDATA').load('<?=base_url()?>enrollment/fees_data/'+stu_id+'/'+Scholarship+'/'+FEE_PLAN);


    });
});

 
</script>