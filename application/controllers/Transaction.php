<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Transaction extends Main_controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
function success()
{
	if($this->input->server('REQUEST_METHOD')=='POST')
   	{

		$post_data=$this->input->post();

		$reg_no = explode('-',$post_data['ReferenceNo']);
		$reg_no = end($reg_no);
		$reg_no = trim($reg_no);

		
		$Response_Code 			= $post_data['Response_Code'];
		$TransactionID			= $post_data['Unique_Ref_Number'];
		$Service_Tax_Amount		= $post_data['Service_Tax_Amount'];
		$Processing_Fee_Amount	= $post_data['Processing_Fee_Amount'];
		$Total_Amount			= $post_data['Total_Amount'];
		$Transaction_Amount		= $post_data['Transaction_Amount'];
		$Transaction_Date 		= $post_data['Transaction_Date'];
		$Interchange_Value		= $post_data['Interchange_Value'];
		$TDR 					= $post_data['TDR'];
		$Payment_Mode			= $post_data['Payment_Mode'];
		$SubMerchantId			= $post_data['SubMerchantId'];
		$ReferenceNo			= $post_data['ReferenceNo'];
		$ID 					= $post_data['ID'];
		$mendatory_fields 		= $post_data['mendatory_fields'];
		$optional_fields 		= $post_data['optional_fields'];
		


		$flag=0;
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d h:i:s");
		$bill = $reg_no."_".$date.".txt";

		if ($Response_Code=="E000") {
			$flag=1;
			$myfile = fopen("Transactions/Success/".$bill, "w");
			$txt = "Transaction status: Success,\nRegistration No: ".$reg_no.",\nTransaction Id: ".$TransactionID.",\nTransaction Amount: ".$Transaction_Amount.",\nTotal Amount: ".$Total_Amount.", \nPayment Mode: ".$Payment_Mode.",\nTransaction Date-Time: ".$Transaction_Date.",\nResponse_Code: ".$Response_Code;
			fwrite($myfile, $txt);
			fclose($myfile);
		}
		else{
			$flag=0;
			$myfile = fopen("Transactions/Failed/".$bill, "w");
			$txt = "Transaction status: Failed,\nRegistration No: ".$reg_no.",\nTransaction Id: ".$TransactionID.",\nTransaction Amount: ".$Transaction_Amount.",\nTotal Amount: ".$Total_Amount.", \nPayment Mode: ".$Payment_Mode.",\nTransaction Date-Time: ".$Transaction_Date.",\nResponse_Code: ".$Response_Code;
			fwrite($myfile, $txt);
			fclose($myfile);
		}

		$transaction_data['transaction_id'] = $TransactionID;
		$transaction_data['transaction_status'] = "Failed";
		$transaction_data['payment_mode'] = $Payment_Mode;
		$transaction_data['date_time'] = $Transaction_Date;
		$transaction_data['registration_no'] = $reg_no;
		$transaction_data['transaction_amount'] = $Transaction_Amount;
		$transaction_data['service_tax'] = $Service_Tax_Amount;
		$transaction_data['processing_fee'] = $Processing_Fee_Amount;
		$transaction_data['total_amount'] = $Total_Amount;
		$transaction_data['response_code'] = $Response_Code;

		// echo "<pre>";
		// print_r($transaction_data);
		// echo "</pre>";

		// die();

		if($flag==1){
			$transaction_data['transaction_status'] = "Success";
			$this->Insert('transaction_success',$transaction_data);
			
			$stu_data=$this->get('admission',array('registration_no'=>$reg_no))[0];
			$update_data= array('fee_pay_status'=>1,
								'transaction_id'=>$TransactionID,
								'registration_fee'=>$Transaction_Amount,
								'transaction_mode'=>$Payment_Mode,
								'collected_by'=>'Payment Getway');
			$this->Update('admission',$update_data,$stu_data->id);
		}

		// save all transactions
		$this->Insert('transactions_all',$transaction_data);
		// save all transactions

		if ($flag==1) {
			$data['transaction_data']=$transaction_data;
			$data['stu_data']=$this->get('admission',array('registration_no'=>$reg_no))[0];
			$this->load->view('fee_payment/transactionSuccessful',$data);
		}
		else{
			$data['transaction_data']=$transaction_data;
			$data['stu_data']=$this->get('admission',array('registration_no'=>$reg_no))[0];
			$this->load->view('fee_payment/transactionFailed',$data);
		}
	}
	else
	{
		echo '<a href="'.base_url().'" >';
		echo'<img src="'.base_url().'image/404-error-page.jpg" style="height:100%;width:100%;padding:0;margin:0;" title="Click Anywhere To Go Home Page.">';
		echo "</a>";
		
	}
}



function payment_success()
{
	if($this->input->server('REQUEST_METHOD')=='POST')
   	{
		$post_data=$this->input->post();

		// echo "<pre>";
		// print_r($post_data);
		// echo "</pre>";
		
		$Response_Code 			= $post_data['Response_Code'];
		$TransactionID			= $post_data['Unique_Ref_Number'];
		$Service_Tax_Amount		= $post_data['Service_Tax_Amount'];
		$Processing_Fee_Amount	= $post_data['Processing_Fee_Amount'];
		$Total_Amount			= $post_data['Total_Amount'];
		$Transaction_Amount		= $post_data['Transaction_Amount'];
		$Transaction_Date 		= $post_data['Transaction_Date'];
		$Interchange_Value		= $post_data['Interchange_Value'];
		$TDR 					= $post_data['TDR'];
		$Payment_Mode			= $post_data['Payment_Mode'];
		$SubMerchantId			= $post_data['SubMerchantId'];
		$ReferenceNo			= $post_data['ReferenceNo'];
		$ID 					= $post_data['ID'];
		$mendatory_fields 		= $post_data['mendatory_fields'];
		$optional_fields 		= $post_data['optional_fields'];
		$enrollment_no 			= $this->session->userdata('enrollment_no');
		$fees_id 			    = $this->session->userdata('fees_id');
		


		$flag=0;
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d h:i:s");
		$bill = $enrollment_no."_".$date.".txt";

		if ($Response_Code=="E000") {
			$flag=1;
			$myfile = fopen("Transactions/Success/".$bill, "w");
			$txt = "Transaction status: Success,\nEnrollment No: ".$enrollment_no.",\nTransaction Id: ".$TransactionID.",\nTransaction Amount: ".$Transaction_Amount.",\nTotal Amount: ".$Total_Amount.", \nPayment Mode: ".$Payment_Mode.",\nTransaction Date-Time: ".$Transaction_Date.",\nResponse_Code: ".$Response_Code;
			fwrite($myfile, $txt);
			fclose($myfile);
		}
		else{
			$flag=0;
			$myfile = fopen("Transactions/Failed/".$bill, "w");
			$txt = "Transaction status: Failed,\nEnrollment No: ".$enrollment_no.",\nTransaction Id: ".$TransactionID.",\nTransaction Amount: ".$Transaction_Amount.",\nTotal Amount: ".$Total_Amount.", \nPayment Mode: ".$Payment_Mode.",\nTransaction Date-Time: ".$Transaction_Date.",\nResponse_Code: ".$Response_Code;
			fwrite($myfile, $txt);
			fclose($myfile);
		}

		$transaction_data['transaction_id'] = $TransactionID;
		$transaction_data['transaction_status'] = "Failed";
		$transaction_data['payment_mode'] = $Payment_Mode;
		$transaction_data['date_time'] = $Transaction_Date;
		$transaction_data['registration_no'] = $enrollment_no;
		$transaction_data['transaction_amount'] = $Transaction_Amount;
		$transaction_data['service_tax'] = $Service_Tax_Amount;
		$transaction_data['processing_fee'] = $Processing_Fee_Amount;
		$transaction_data['total_amount'] = $Total_Amount;
		$transaction_data['response_code'] = $Response_Code;
		if($flag==1){
			$transaction_data['transaction_status'] = "Success";
			$this->Insert('transaction_success',$transaction_data);
			
			// $stu_data=$this->get('admission',array('registration_no'=>$reg_no))[0];
			$update_data= array('pay_status'=>1,
								'transaction_id'=>$TransactionID,
								'due'=>0,
								'transaction_time'=>$Transaction_Date,
								'transaction_mode'=>$Payment_Mode,
								'collected_by'=>'Payment Getway');
			$this->Update('stu_fees',$update_data,$fees_id);
		}

		// save all transactions
		$this->Insert('transactions_all',$transaction_data);
		// save all transactions

		if ($flag==1) {
			$data['transaction_data']=$transaction_data;
			$data['stu_data']=$this->get('stu_info',array('enrollment_no'=>$enrollment_no))[0];
			$this->load->view('enrollment_fee_payment/transactionSuccessful',$data);
		}
		else{
			$data['transaction_data']=$transaction_data;
			$data['stu_data']=$this->get('stu_info',array('enrollment_no'=>$enrollment_no))[0];
			$this->load->view('enrollment_fee_payment/transactionFailed',$data);
		}
	}
	else
	{
		echo '<a href="'.base_url().'" >';
		echo'<img src="'.base_url().'image/404-error-page.jpg" style="height:100%;width:100%;padding:0;margin:0;" title="Click Anywhere To Go Home Page.">';
		echo "</a>";
		
	}
}







	function get($tb,$data=0)
	{
		if ($data==0) 
		{
			if($query=$this->db->get($tb))
			{
				return $query->result();
			}
			return false;
		}
		else
		{
			if ($query=$this->db->get_where($tb,$data)) 
			{
				return $query->result();
			}
			return false;
		}
	}

	function Insert($tb,$data)
	{
		if ($this->db->insert($tb,$data)) {
			return true;
		}
		return false;
	}

	function Update($tb,$data,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update($tb,$data)){
			return true;
		}
		return false;
	}
}

?>