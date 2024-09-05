<?php  
/**
 * 
 */
class send_email 
{
	function send($message)
	{

		// $sender_email="jeeexpert4@gmail.com";
		// $user_password="jeeexpert@#1234";		
		$sender_email="ankitv4087@gmail.com";
		$user_password="verma4087";
		$username="JEE EXPERT";
		$subject='JEE EXPERT';

		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = $sender_email;
		$config['smtp_pass']    = $user_password;
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'text'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not      

		$this->email->initialize($config);

		$this->email->from($sender_email , $username);
		$this->email->to('ankitv4087@outlook.com');
		// $this->email->to('sndpsingh166@gmail.com'); 
		$this->email->subject($subject);
		$this->email->message($message);  
		$this->email->send();

	}
}

?>