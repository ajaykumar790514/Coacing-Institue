<div style="height: 200px;width: 680px;padding-top: 10px; ">
<!-- <div style="padding:10px 20% 0px 20%; "> -->
	<form target="_blank" method="post" action="<?=base_url()?>enrollment_fee_payment/pay_fee">

	<table class="table table-bordered table-striped table-hover">
	    <tbody>
	      <tr>
	        <th>Student Name</th>
	        <td><?=$stu_data->name?></td>
	      </tr>

	      <tr>
	        <th>Enrollment No.</th>
	        <td><?=$stu_data->enrollment_no?></td>
	        <input type="hidden" name="enrollment_no" value="<?=$stu_data->enrollment_no?>">
	      </tr>

	      <tr>
	        <th>Payment Date</th>
	        <td><?=$fees->payment_date?>
	        	<?php
	        	if ($fees->payment_date=='At the Time of Admission') {
	        		echo $fees->payment_date;
	        	}
	        	else{
	        		echo date_format(date_create($fees->payment_date),'d-m-Y');
	        	}
	        	?>
	        </td>
	      </tr>

	      <tr>
	        <th>Payable Amount</th>
	        <td><?=$fees->total_fee?> ₹</td>
	        <input type="hidden" name="amount" value="<?=$fees->total_fee?>">
	      </tr>

	      <tr>
	        <!-- <th></th> -->
	        <td colspan="2" style="text-align: center;">
	        	<button type="submit" class="btn btn-primary btn-xs" id="pay_now1">Pay Now</button>
	        </td>
	      </tr> 
	    </tbody>
	</table>



	<a  data-toggle="collapse" data-target="#fees_details">View Fees Details</a>
	<div class="collapse"  id="fees_details">
	<table class="table table-striped table-bordered">
      <tr >
        <th style="text-align: center;">Fee Head</th>
        <th style="text-align: center;">Base Amount</th>
        <th style="text-align: center;">GST</th>
        <th style="text-align: center;">Total Amount</th>
      </tr>
      <?php
       $fees_amount=unserialize($fees->fees_amount);
       // echo "<pre>"; print_r($fees_amount); echo "</pre>";
        foreach ($fees_amount as $key=>$f_amount) { ?>
          <tr>
            <?php  if ($key=="total") { ?>
              <td><?=$key?></td>
              <td colspan="2" style='text-align: right;' >
              	<?php echo round($f_amount['total'],2); ?>
              </td>
              <td style='text-align: right;'><?php echo round($f_amount['total_fee'],2); ?></td>
            <?php }
             else { ?>
            <td><?=$key?></td>
            <?php
            foreach ($f_amount as $amount) {
              echo "<td style='text-align: right;'>".round($amount,2)."</td>";
            }
            ?>

          </tr>
          <?php
         }
        }
      ?>
      <!-- <tr>
           <td>Due</td>
           <td style='text-align: right;' colspan="3"><?=$row->due?></td>
         </tr> -->
       
    </table>
	</div>




	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pay_now').click(function(){
			var amount= '<?=$fees->total_fee?>';
			var enrollment_no = '<?=$stu_data->enrollment_no?>';
			var fees_id = '<?=$fees->id?>';
			$.ajax({
		      type: 'POST', 
		      target: "_blank",
		      url:'<?=base_url()?>enrollment_fee_payment/pay_fee', 
		      data:  {amount:amount,enrollment_no:enrollment_no,fees_id:fees_id},
		      cache: false,
		      beforeSend: function() {
			        // $('#get_fees')html('Loading....');
			    },
		      success:function(data){
		      	// $("#get_fees").click();
		        alert(data); return;


		        // if (data==0) {  $("#reset").click(); set_gst_rate();
		        // $('.message_box').html('<span style="color:green">Fees Details Added successful.</span>'); }
		        // else if(data==2){ $('.message_box').html('<span style="color:red">Some System Error !</span>'); }
		        // else{ $('.message_box').html('<span style="color:red">Fees Details Already Exist.</span>'); }
		      }
		    });
		 
		})
	})
</script>