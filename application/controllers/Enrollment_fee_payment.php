<?php

/**
 * 
 */
class Enrollment_fee_payment extends CI_controller
{

	public $merchant_id;
    public $encryption_key;
    public $sub_merchant_id;
    public $reference_no;
    public $paymode;
    public $return_url;
	
	const DEFAULT_BASE_URL = 'https://eazypay.icicibank.com/EazyPG?';

	function __construct()
	{
		parent::__construct();
	    $this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');


		$this->merchant_id              =    '235833';
        $this->encryption_key           =    '1162881811105024';
        $this->sub_merchant_id          =    '1234';
        // $this->merchant_reference_no    =    '';
        $this->paymode                  =    '9';
        $this->return_url               =    'http://jeeexpert.com/transaction/payment_success';
	}

	public function index()
	{
		// $this->load->view('enrollment_fee_payment/fee_payment_test');
		// $this->load->view('enrollment_fee_payment/index2');
		$this->load->view('enrollment_fee_payment/index');
	}

	public function check_fee_test($enroll_no)
	{
		$this->load->view('enrollment_fee_payment/fee_payment_test');
	}


	public function check_fee($enroll_no)
	{
		date_default_timezone_set('Asia/Calcutta');
		// echo $time = date('d-M-Y ( h:i A )',time());
		$date = date('Y-m-d',time());
		// $date = '2019-11-04';

		// echo $enroll_no; 

		$stu_data=$this->get('stu_info',array('enrollment_no'=>$enroll_no))[0];

		// echo "<pre>"; print_r($stu_data); echo "</pre>"; 
		$this->db->order_by('fee_index','asc');
		$fees = $this->get('stu_fees',array('stu_id' => $stu_data->stu_id,'pay_status'=>0 ))[0];
		// echo "<pre>"; print_r($fees); echo "</pre>"; die();
		
		// die();
		if ($fees->pay_status==0) {
		
			$data['fees']=$fees;
			$data['stu_data']=$stu_data;
			if ($fees->fees_amount!='') {
				$this->load->view('enrollment_fee_payment/fee_payment1',$data);
			}
			else{
				echo  "<h3 style='padding:15px 0px 0px 0px;color:red;'>Fee Details not Avelable.</h3>";
			}	
		}	
		else if($stu_data->fee_pay_status==1){
			echo  "<h3 style='padding:15px 0px 0px 0px;color:green;'>Fee Paid.</h3>";
		}
		else
		{
			echo "Some error contact to jee expert";
		}
	}

	function pay_fee()
	{


		$post_data= $this->input->post();
		// $post_data['registration_no']="TEST1234";
		// $post_data['amount']=1100;
		// print_r($post_data);
		// die();
		$student = array('enrollment_no'=>$post_data['enrollment_no'],
						 'fees_id'=>$post_data['fees_id']);
	    $this->session->set_userdata($student);
		$amount=$post_data['amount'];
		// $amount='1000';
		$reference_no=uniqid();

		$Url= $this->getPaymentUrl($amount, $reference_no, $optionalField=null);

		redirect($Url); 

		// redirect($this->return_url); 

		die();

	}

	function test()
	{
		$post_data=$this->input->post();
		echo "<pre>";
		print_r($post_data);
		echo "</pre>";

			echo "Transaction Successful";
	}

	// function aes128Encrypt($str,$key){
	// $block = mcrypt_get_block_size('rijndael_128', 'ecb');
	// $pad = $block - (strlen($str) % $block);
	// $str .= str_repeat(chr($pad), $pad);
	// return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB));
	// }


	function hall_ticket($registration_no)
	{
		$stu_data=$this->get('admission',array('registration_no'=>$registration_no))[0];
	
		if ($stu_data->fee_pay_status==1) {
			// redirect(base_url().'stusents/HallTicket/'.$stu_data->id);
			echo 1;
		}
		else{
			$this->check_fee($registration_no);
		}	
	}

	function print_hall_ticket($registration_no)
	{
		$stu_data=$this->get('admission',array('registration_no'=>$registration_no))[0];
	
		if ($stu_data->fee_pay_status==1) {
			redirect(base_url().'HallTicket/'.$stu_data->id);
		}
		else{
		echo "Admission Test Fee Not Paid.";
		}	
	}







// Encrypt url


	public function getPaymentUrl($amount, $reference_no, $optionalField=null)
    {
        $mandatoryField   =    $this->getMandatoryField($amount, $reference_no);
        $optionalField    =    $this->getOptionalField($optionalField);
        $amount           =    $this->getAmount($amount);
        $reference_no     =    $this->getReferenceNo($reference_no);

        $paymentUrl = $this->generatePaymentUrl($mandatoryField, $optionalField, $amount, $reference_no);
        return $paymentUrl;
        // return redirect()->to($paymentUrl);
    }

    protected function generatePaymentUrl($mandatoryField, $optionalField, $amount, $reference_no)
    {
        $encryptedUrl = self::DEFAULT_BASE_URL."merchantid=".$this->merchant_id."&mandatory fields=".$mandatoryField."&optional fields=".$optionalField."&returnurl=".$this->getReturnUrl()."&Reference No=".$reference_no."&submerchantid=".$this->getSubMerchantId()."&transaction amount=".$amount."&paymode=".$this->getPaymode();

        return $encryptedUrl;
    }

    protected function getMandatoryField($amount, $reference_no)
    {
        return $this->getEncryptValue($reference_no.'|'.$this->sub_merchant_id.'|'.$amount);
    }

    // optional field must be seperated with | eg. (20|20|20|20)
    protected function getOptionalField($optionalField=null)
    {
        if (!is_null($optionalField)) {
            return $this->getEncryptValue($optionalField);
        }
        return null;
    }

    protected function getAmount($amount)
    {
        return $this->getEncryptValue($amount);
    }

    protected function getReturnUrl()
    {
        return $this->getEncryptValue($this->return_url);
    }

    protected function getReferenceNo($reference_no)
    {
        return $this->getEncryptValue($reference_no);
    }

    protected function getSubMerchantId()
    {
        return $this->getEncryptValue($this->sub_merchant_id);
    }

    protected function getPaymode()
    {
        return $this->getEncryptValue($this->paymode);
    }

    // use @ to avoid php warning php 

    protected function getEncryptValue($str)
    {
        $block = @mcrypt_get_block_size('rijndael_128', 'ecb');
        $pad = $block - (strlen($str) % $block);
        $str .= str_repeat(chr($pad), $pad);
        return base64_encode(@mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$this->encryption_key, $str, MCRYPT_MODE_ECB));
    }



// Encrypt url









	// main functions
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