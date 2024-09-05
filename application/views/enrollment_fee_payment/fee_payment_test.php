<div style="height: 200px;width: 680px;padding-top: 10px; ">
<!-- <div style="padding:10px 20% 0px 20%; "> -->
	<form target="_blank" method="post" action="<?=base_url()?>enrollment_fee_payment/pay_fee">
	<table class="table table-bordered table-striped table-hover">
	    <tbody>
	      <tr>
	        <th>Student Name</th>
	        <td>Ankit Verma</td>
	      </tr>

	      <tr>
	        <th>Registration No.</th>
	        <td>TESTSTUDENT123</td>
	        <input type="hidden" name="registration_no" value="TESTSTUDENT123">
	      </tr>

	    <!--   <tr>
	        <th>Test Date</th>
	        <td><?=$stu_data->admission_test_date?></td>
	      </tr> -->

	      <tr>
	        <th>Fee</th>
	        <td>1100</td>
	        <input type="hidden" name="amount" value="1">
	      </tr>

	      <tr>
	        <th></th>
	        <td><button type="submit" class="btn btn-primary btn-xs" id="pay_now1">Pay Now</button></td>
	      </tr> 
	    </tbody>
	</table>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pay_now').click(function(){
			var amount= '1';
			var registration_no = 'TESTSTUDENT123';
			$.ajax({
		      type: 'POST', 
		      target: "_blank",
		      url:'<?=base_url()?>enrollment_fee_payment/pay_fee', 
		      data:  {amount:amount,registration_no:registration_no},
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