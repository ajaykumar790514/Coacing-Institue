<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Class_master extends Main_controller 
{

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	function manage_classes($id=0)
	{	
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();

				$data=$this->main_model->get('class_master',$post_data);
				if (count($data)==0){
					if($this->main_model->add_data('class_master',$post_data)){
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
				$data=$this->main_model->get('class_master',array('class'=>$post_data['class'],'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('class_master',$post_data,$id)){
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
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/class_master/class_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_class_table()
	{
		$this->check_session();
		$this->db->order_by('class','asc');
		$data['classes'] = $this->main_model->get('class_master');
	    $this->load->view('admin/class_master/class_table_reload',$data);
	}

	function manage_programs($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				$data1=$this->main_model->get('program_master',array('enrollment_code'=>$post_data['enrollment_code']));
				if(count($data1)==0){
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
			}else{
				echo 3;
			  }
			}
			else {
				$post_data=$this->input->post();
				$data1=$this->main_model->get('program_master',array('enrollment_code'=>$post_data['enrollment_code'],'id!='=>$id));
				if(count($data1)==0){
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
			  }else{
				echo 3;
			  }
			}
			die();
		}
		$data['user']=$this->session->userdata('username');
	    $r=$this->session->userdata('role_id');
	    $data['role']=$this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/class_master/program_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_program_table()
	{
		$this->check_session();
		$this->db->order_by('class','asc');
		$data['classes'] = $this->main_model->get('class_master');
		$this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
	    $this->load->view('admin/class_master/program_table_reload',$data);
	}

	function manage_batches($id=0) 
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();

				$data=$this->main_model->get('batch_master',$post_data);
				if (count($data)==0){
					if($this->main_model->add_data('batch_master',$post_data)){
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
				$data=$this->main_model->get('batch_master',array('class'=>$post_data['class'],'program_id'=>$post_data['program_id'],'batch'=>$post_data['batch'],'id!='=>$id));
				
				if (count($data)==0){
					if($this->main_model->update_data('batch_master',$post_data,$id)){
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
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
	    $this->db->order_by('class','asc');
	    $data['batches'] = $this->main_model->get('batch_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/class_master/batch_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_batch_table()
	{
		$this->check_session();
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
	    $this->db->order_by('class','asc');
	    $data['batches'] = $this->main_model->get('batch_master');
	    $this->load->view('admin/class_master/batch_table_reload',$data);
	}

	function get_programs($class)
	{
		$programs=$this->main_model->get('program_master',array('class' => $class,'status'=>1));
		echo "<option value=''>--Select Program--</option>";
		foreach ($programs as $program) {
			echo "<option value='".$program->id."'>";
            echo $program->program;
            echo "</option>";
		}
	}


}