<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Downloads extends Main_controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	public function manage_downloads()
	{
				$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				$post_data['files']=$_FILES['files']["name"];
				print_r($post_data);
				die();
				$check = array('class' => $post_data['class'],'program' => $post_data['program'] );
				$data=$this->main_model->get('program_master',$check);
				if (count($data)==0){
					if($this->main_model->add_data('program_master',$post_data)){
						echo 0;
					}
					else{
						echo 2;
					}
				}
				else {
					echo  1;
				}
			}
			else {
				$post_data=$this->input->post();
				$data=$this->main_model->get('program_master',array('class'=>$post_data['class'],'program'=>$post_data['program'],'id!='=>$id));
				
				if (count($data)==0){
					if($this->main_model->update_data('program_master',$post_data,$id)){
						echo 0;
					}
					else{
						echo 2;
					}
				}
				else {
					echo  1;
				}	
			}
			die();
		}
		$data['user']=$this->session->userdata('username');
	    $r=$this->session->userdata('role_id');
	    $data['role']=$this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
	    $this->db->order_by('title','asc');
	    $data['downloads'] = $this->main_model->get('downloads');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/downloads/downloads_list',$data);
	    $this->load->view('admin/footer');
	}
}