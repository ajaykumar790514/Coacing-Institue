<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('total_stu')) {
    function total_stu() {
        // Get CodeIgniter instance
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->where('del_status', '0');
        $CI->db->where('is_active', 1);

        $query = $CI->db->get('stu_info');
        $total_rows = $query->num_rows();

        return $total_rows;
    }
}

if (!function_exists('total_rows')) {
    function total_rows($table) {
        // Get CodeIgniter instance
        $CI =& get_instance();
        $CI->load->database();
        $CI->db->where('status', 1);

        $query = $CI->db->get($table);
        $total_rows = $query->num_rows();

        return $total_rows;
    }
}

// send mail
if (!function_exists('sendMail'))
{
   function sendMail($message,$email,$subject)
    {
        
          $ch = curl_init();
          $fields = array( 'message'=>$message, 'email'=>$email,'subject'=>$subject);
          $postvars = '';
          foreach($fields as $key=>$value) {
            $postvars .= $key . "=" . $value . "&";
          }
          $url = "https://www.techfizone.com/techfiprojects/email_master/sheffieldsvapeoutlet/mailApi.php";
          curl_setopt($ch,CURLOPT_URL,$url);
          curl_setopt($ch,CURLOPT_POST, 1);                //0 for a get request
          curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
          curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
          curl_setopt($ch,CURLOPT_TIMEOUT, 20);
          $response = curl_exec($ch);
    
          curl_close ($ch);

        //use curl for mail sending
        
    }    
}


