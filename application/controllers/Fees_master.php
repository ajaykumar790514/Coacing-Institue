<?php
/**
 * 
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Fees_master extends Main_controller
{
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	function manage_fees_plan($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				$data=$this->get('fee_plan_master',$post_data);
				if (count($data)==0){
					if($this->Insert('fee_plan_master',$post_data)){
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
				$post_data['id!=']=$id;
				$data = $this->db->get_where('fee_plan_master', $post_data)->result();
				unset($post_data['id!=']);
				if (count($data)==0){
					if($this->Update('fee_plan_master',$post_data,$id)){
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
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
	    $data['batchs'] = $this->main_model->get('batch_master');
		$data['fee_plan'] =$this->main_model->get('fee_plan_master');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/fees_master/fees_plan_list',$data);
		$this->load->view('admin/footer');
	}

	function reload_fees_plan()
	{
		$this->check_session();
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
	    $data['batchs'] = $this->main_model->get('batch_master');
		$data['fee_plan'] =$this->main_model->get('fee_plan_master');
		$this->load->view('admin/fees_master/fees_plan_table_reload',$data);
	}

	function manage_fees($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				$post_data['class']=$post_data['claSS0'];
				$post_data['program_id']=$post_data['programInput0'];	
				$post_data['fee_plan_id']=$post_data['fees_plan_id0'];	
				unset($post_data['claSS0']); unset($post_data['fees_plan_id0']); unset($post_data['programInput0']);
				
				$check_data= array('academic_year'=>$post_data['academic_year'],
								   'class'=>$post_data['class'],
								   'program_id'=>$post_data['program_id'],
								   'fee_plan_id'=>$post_data['fee_plan_id'],
								   'payment_date'=>$post_data['payment_date']
								  );
			
				$data=$this->get('fee_master',$check_data);
				// echo "<pre>";
				// print_r($post_data);
				// echo "</pre>";
					if (count($data)==0){
						if($this->Insert('fee_master',$post_data)){
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
				$check_data= array('academic_year'=>$post_data['academic_year'],
								   'fee_plan_id'=>$post_data['fee_plan_id'],
								   'payment_date'=>$post_data['payment_date'],
								   'id!='=>$id
								  );
	
				$data=$this->get('fee_master',$check_data);
				if (count($data)==0 ){
					if($this->Update('fee_master',$post_data,$id)){
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
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->db->order_by('class','asc');
	    $data['classes'] = $this->main_model->get('class_master');
	    $this->db->order_by('program','asc');
	    $data['programs'] = $this->main_model->get('program_master');
		$data['fee_plan'] =$this->main_model->get('fee_plan_master');
		$data['gst_details'] =$this->get('gst_details',array('status'=>1));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/fees_master/fees_master',$data);
		$this->load->view('admin/footer');
	}

	function filter_fees_data($class,$program_id)
	{
		$this->check_session();
		// echo $class.'-'.$program_id.'-'.$batch_id;die();
		$this->db->order_by('fee_plan_id','desc');
		$this->db->order_by('academic_year','asc');
		$this->db->order_by('payment_date','asc');
		$data['fees']=$this->get('fee_master',array('class'=>$class,'program_id'=>$program_id));
		$data['fee_plan']=$this->get('fee_plan_master',array('class'=>$class,'program_id'=>$program_id));
		$data['gst_details'] =$this->get('gst_details',array('status'=>1));
		$this->load->view('admin/fees_master/filter_fees_data',$data);
	}

	function get_fees_plan($class,$program_id){
		$data=   array('class' =>$class,'program_id' =>$program_id,'status'=>1);
		$fees_plan = $this->get('fee_plan_master',$data);
			echo "<option value=''>-- Select Fees Plan --</option>";
		foreach ($fees_plan as $f_plan) {
              echo "<option value='".$f_plan->id."'>".$f_plan->plan_title."</option>";
            }
	}

	function get_batch($class,$program_id)
	{
		$batchs=$this->get('batch_master',array('class' => $class,'program_id'=>$program_id,'status'=>1));
		echo "<option value=''>--Select Batch--</option>"; 
		foreach ($batchs as $batch) {
			echo "<option value='".$batch->id."'>";
            echo $batch->batch;
            echo "</option>";
		}
	}

	function get_programs($class)
	{
		$programs=$this->get('program_master',array('class' => $class,'status'=>1));
		echo "<option value=''>--Select Program--</option>"; 
		foreach ($programs as $program) {
			echo "<option value='".$program->id."'>";
            echo $program->program;
            echo "</option>";
		}
	}

	function get_gst_rate($comp_id)
	{
		$data=array('id'=>$comp_id);
		$gst_rate = $this->get('gst_details',$data)[0];
		 //print_r($gst_rate);
		if (($gst_rate->gst_rate)!=0) {
			echo $gst_rate->gst_rate;
		}
		else
		{
			echo 0;
		}

	}
	function add_fees(){
				die();

	}


	
}
?>