 <?php

/**
 * 
 */
class Fee_payment extends CI_controller
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

		// $this->merchant_id              =    '235833'; //enroll


		$this->merchant_id              =    '235838';  //reg
        $this->encryption_key           =    '1162881811105023'; //reg

        // $this->encryption_key           =    '1162881811105024'; //enroll
        $this->sub_merchant_id          =    '1234';
        // $this->merchant_reference_no    =    '';
        $this->paymode                  =    '9';
        $this->return_url               =    'http://jeeexpert.com/transaction/success';
	}

	public function registration_fee()
	{
		$this->load->view('fee_payment/registration_fee_payment');
	}

	public function check_fee($reg_no)
	{
		// echo "<h1 style='color:red;'>Pay fees after 30 minutes.</h1>";
		// date_default_timezone_set('Asia/Calcutta');
		// echo $date = date('Y-m-d',time());
		// $date = '2019-11-04';

		$reg_no;

		$stu_data=$this->get('admission',array('registration_no'=>$reg_no))[0];
		if ($stu_data->deleted==0) {
		
			$date = date('Y-m-d',strtotime($stu_data->submitted_date));
			// print_r($stu_data);
		
			if ($stu_data->fee_pay_status==0) {
				$check_fee1['test_date'] = $stu_data->admission_test_date;
				$check_fee1['class']	 = $stu_data->program_code;
				// $check_fee1['class']	 = 11;
				$check_fee1['status']	 = 1;
				$check_fee1['from_date<='] = $date;
				$check_fee1['to_date>=']	= $date;
				$fee=$this->get('reg_fee_master',$check_fee1)[0];
				$data['stu_data']=$stu_data;
				$data['fee']=$fee;
				if ($fee) {
					$this->load->view('fee_payment/fee_payment1',$data);
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
	    else
		{
			echo "Application Cancelled By Jee Expert.";
		}

	}

	function pay_fee()
	{

		// echo "<h1 style='color:red;'>Pay fees after 30 minutes.</h1>"; die();
		$post_data= $this->input->post();
		$student = array('registration_no'=>$post_data['registration_no']);
	    $this->session->set_userdata($student);
		$amount=$post_data['amount'];
		// $amount='1000';
		$reference_no=uniqid().'-'.$post_data['registration_no'];

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
		if ($stu_data->deleted==0) {
			if ($stu_data->fee_pay_status==1) {
				// redirect(base_url().'stusents/HallTicket/'.$stu_data->id);
				echo 1;
			}
			else{
				$this->check_fee($registration_no);
			}
		}
	    else
		{
			echo "Application Cancelled By Jee Expert.";
		}	
	}

	function print_hall_ticket($registration_no)
	{
		$stu_data=$this->get('admission',array('registration_no'=>$registration_no))[0];
		if ($stu_data->deleted==0) {
			if ($stu_data->fee_pay_status==1) {
				redirect(base_url().'HallTicket/'.$stu_data->id);
			}
			else{
			echo "Admission Test Fee Not Paid.";
			}	
		}
	    else
		{
			echo "Application Cancelled By Jee Expert.";
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