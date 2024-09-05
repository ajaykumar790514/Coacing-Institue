<?php
/**
 * Test Master
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Test_master extends Main_controller
{
	
	function __construct()
	{
		parent::__construct();
	    $this->load->helper('url');
		$this->load->model('admin_model');
		$this->load->model('model');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
	}
	

public function list_test()
{
	if($this->session->userdata('username'))
	   	{
	   		$data['user']=$this->session->userdata('username');
	   		$data['test']=$this->admin_model->get_data('test');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	      	$this->load->view('admin/header',$data);
		  	$this->load->view('admin/test/list',$data);
		  	$this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}

public function add_test()
{
	if($this->session->userdata('username'))
	   	{
	   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	    {
	   	  	$post_data = $this->input->post();
	   	  	// $post_data['status'] = 1;
	   	  	// $class=array();
	   	  	// $post_data['from1']=$post_data['form1'];
	   	  	// $post_data['fee3_13']=$post_data['fee3'];
	   	  	// unset($post_data['fee3']);
	   	  	// unset($post_data['form1']);
	   	  	$reg_fee_9=[];
	   	  	for ($i=1; $i <= 4 ; $i++) { 
	   	  		// echo $i;
	   	  		$fee9['class'] = 9;
	   	  		$fee9['test_date'] = $post_data['test_date'];
	   	  		$fee9['from_date'] = $post_data['from'.$i];
	   	  		$fee9['to_date'] = $post_data['to'.$i];
	   	  		$fee9['fee'] = $post_data['fee'.$i.'_9'];
	   	  		$reg_fee_9[]=$fee9;
	   	  	}

	   	  	$reg_fee_10=[];
	   	  	for ($j=1; $j <= 4 ; $j++) { 
	   	  		// echo $i;
	   	  		$fee10['class'] = 10;
	   	  		$fee10['test_date'] = $post_data['test_date'];
	   	  		$fee10['from_date'] = $post_data['from'.$j];
	   	  		$fee10['to_date'] = $post_data['to'.$j];
	   	  		$fee10['fee'] = $post_data['fee'.$j.'_10'];
	   	  		$reg_fee_10[]=$fee10;
	   	  	}

	   	  	$reg_fee_11=[];
	   	  	for ($k=1; $k <= 4 ; $k++) { 
	   	  		// echo $i;
	   	  		$fee11['class'] = 11;
	   	  		$fee11['test_date'] = $post_data['test_date'];
	   	  		$fee11['from_date'] = $post_data['from'.$k];
	   	  		$fee11['to_date'] = $post_data['to'.$k];
	   	  		$fee11['fee'] = $post_data['fee'.$k.'_11'];
	   	  		$reg_fee_11[]=$fee11;
	   	  	}

	   	  	$reg_fee_12=[];
	   	  	for ($l=1; $l <= 4 ; $l++) { 
	   	  		// echo $i;
	   	  		$fee12['class'] = 12;
	   	  		$fee12['test_date'] = $post_data['test_date'];
	   	  		$fee12['from_date'] = $post_data['from'.$l];
	   	  		$fee12['to_date'] = $post_data['to'.$l];
	   	  		$fee12['fee'] = $post_data['fee'.$l.'_12'];
	   	  		$reg_fee_12[]=$fee12;
	   	  	}

	   	  	$reg_fee_13=[];
	   	  	for ($m=1; $m <= 4 ; $m++) { 
	   	  		// echo $i;
	   	  		$fee13['class'] = 13;
	   	  		$fee13['test_date'] = $post_data['test_date'];
	   	  		$fee13['from_date'] = $post_data['from'.$m];
	   	  		$fee13['to_date'] = $post_data['to'.$m];
	   	  		$fee13['fee'] = $post_data['fee'.$m.'_13'];
	   	  		$reg_fee_13[]=$fee13;
	   	  	}

	   	  	
	   	  	
	   	 
	   	  	// Test Data
	   	  	$post_data['paper_1_time']=$post_data['test_time1']." - ".$post_data['test_time2'];
	   	  	$post_data['paper_2_time']=$post_data['time1']." - ".$post_data['time2'];
	   	  	$test_data['test_name']=$post_data['test_name'];
	   	  	$test_data['session']=$post_data['session'];
	   	  	$test_data['reg_date']=$post_data['reg_date'];
	   	  	$test_data['test_date']=$post_data['test_date'];
	   	  	$test_data['paper_1_time']=$post_data['paper_1_time'];
	   	  	$test_data['paper_2_time']=$post_data['paper_2_time'];

	   	  	$test_data['windows1']		= $post_data['window_date1'];
	   	  	$test_data['windows2']		= $post_data['window_date2_1'].",".$post_data['window_date2_2'];
	   	  	$test_data['windows3']		= $post_data['window_date3_1'].",".$post_data['window_date3_2'];
	   	  	$test_data['windows4']		= $post_data['window_date4'];

	   	  	// $test_data['total_marks_mat']=$post_data['total_marks_mat'];
	   	  	// Test Data
	   	  	// echo "<pre>"; print_r($test_data); die();

	   	  	if($test_id=$this->admin_model->add_data_get_id($table_name='test',$test_data))
		   	{
	   	  	// Class 9
	   	  	$class_9['test_id'] = $test_id;
	   	  	$class_9['class'] = '9';
	   	  	$class_9['physics'] = $post_data['phy9'];
	   	  	$class_9['chemistry'] = $post_data['che9'];
	   	  	$class_9['math'] = $post_data['math9'];
	   	  	$class_9['total'] = $post_data['total9'];
	   	  	$class_9['MAT'] = $post_data['mat9'];
	   	  	$this->admin_model->add_data($table_name='test_marks',$class_9);
	   	  	// Class 9

	   	  	// Class 10
	   	  	$class_10['test_id'] = $test_id;
	   	  	$class_10['class'] = '10';
	   	  	$class_10['physics'] = $post_data['phy10'];
	   	  	$class_10['chemistry'] = $post_data['che10'];
	   	  	$class_10['math'] = $post_data['math10'];
	   	  	$class_10['total'] = $post_data['total10'];
	   	  	$class_10['MAT'] = $post_data['mat10'];
	   	  	$this->admin_model->add_data($table_name='test_marks',$class_10);
	   	  	// Class 10

	   	  	// Class 11
	   	  	$class_11['test_id'] = $test_id;
	   	  	$class_11['class'] = '11';
	   	  	$class_11['physics'] = $post_data['phy11'];
	   	  	$class_11['chemistry'] = $post_data['che11'];
	   	  	$class_11['math'] = $post_data['math11'];
	   	  	$class_11['total'] = $post_data['total11'];
	   	  	$class_11['MAT'] = $post_data['mat11'];
	   	  	$this->admin_model->add_data($table_name='test_marks',$class_11);
	   	  	// Class 11

	   	  	// Class 12
	   	  	$class_12['test_id'] = $test_id;
	   	  	$class_12['class'] = '12';
	   	  	$class_12['physics'] = $post_data['phy12'];
	   	  	$class_12['chemistry'] = $post_data['che12'];
	   	  	$class_12['math'] = $post_data['math12'];
	   	  	$class_12['total'] = $post_data['total12'];
	   	  	$class_12['MAT'] = $post_data['mat12'];
	   	  	$this->admin_model->add_data($table_name='test_marks',$class_12);
	   	  	// Class 12

	   	  	// Class 13
	   	  	$class_13['test_id'] = $test_id;
	   	  	$class_13['class'] = '13';
	   	  	$class_13['physics'] = $post_data['phy13'];
	   	  	$class_13['chemistry'] = $post_data['che13'];
	   	  	$class_13['math'] = $post_data['math13'];
	   	  	$class_13['total'] = $post_data['total13'];
	   	  	$class_13['MAT'] = $post_data['mat13'];
	   	  	$this->admin_model->add_data($table_name='test_marks',$class_13);

	   	  
	   	  	// Class 13

	   	  	// fee
	   	  	foreach ($reg_fee_9 as $fee_9) {
				$this->admin_model->add_data('reg_fee_master',$fee_9);
			}
			foreach ($reg_fee_10 as $fee_10) {
				$this->admin_model->add_data('reg_fee_master',$fee_10);
			}
			foreach ($reg_fee_11 as $fee_11) {
				$this->admin_model->add_data('reg_fee_master',$fee_11);
			}
			foreach ($reg_fee_12 as $fee_12) {
				$this->admin_model->add_data('reg_fee_master',$fee_12);
			}
			foreach ($reg_fee_13 as $fee_13) {
				$this->admin_model->add_data('reg_fee_master',$fee_13);
			}
	   	  	// fee
	   	  	// Test Data
	   	  	
	   	  	// Test Data
	   	  	// echo "<pre>"; print_r($class_9);
	   	  	// echo "<pre>"; print_r($class_10);
	   	  	// echo "<pre>"; print_r($class_11);
	   	  	// echo "<pre>"; print_r($class_12);
	   	  	// echo "<pre>"; print_r($post_data);
	   	  	// echo "<pre>"; print_r($test_data); die();

	   	  		
		   	  		$this->session->set_flashdata('success','Added Successfully.');
		   	  		redirect('test_master/list_test');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect('test_master/list_test');
		   	  	}   	
	   	    }
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	      	$this->load->view('admin/header',$data);
		  	$this->load->view('admin/test/add',$data);
		  	$this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}

public function Update_test($id)
{
	if($this->session->userdata('username'))
	   	{
	   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();

	   	  	// Class 9
	   	  	$class_9['test_id'] = $id;
	   	  	$class_9['class'] = '9';
	   	  	$class_9['physics'] = $post_data['phy9'];
	   	  	$class_9['chemistry'] = $post_data['che9'];
	   	  	$class_9['math'] = $post_data['math9'];
	   	  	$class_9['total'] = $post_data['total9'];
	   	  	$class_9['MAT'] = $post_data['mat9'];
	   	  	// Class 9

	   	  	// Class 10
	   	  	$class_10['test_id'] = $id;
	   	  	$class_10['class'] = '10';
	   	  	$class_10['physics'] = $post_data['phy10'];
	   	  	$class_10['chemistry'] = $post_data['che10'];
	   	  	$class_10['math'] = $post_data['math10'];
	   	  	$class_10['total'] = $post_data['total10'];
	   	  	$class_10['MAT'] = $post_data['mat10'];
	   	  	// Class 10

	   	  	// Class 11
	   	  	$class_11['test_id'] = $id;
	   	  	$class_11['class'] = '11';
	   	  	$class_11['physics'] = $post_data['phy11'];
	   	  	$class_11['chemistry'] = $post_data['che11'];
	   	  	$class_11['math'] = $post_data['math11'];
	   	  	$class_11['total'] = $post_data['total11'];
	   	  	$class_11['MAT'] = $post_data['mat11'];
	   	  	// Class 11

	   	  	// Class 12
	   	  	$class_12['test_id'] = $id;
	   	  	$class_12['class'] = '12';
	   	  	$class_12['physics'] = $post_data['phy12'];
	   	  	$class_12['chemistry'] = $post_data['che12'];
	   	  	$class_12['math'] = $post_data['math12'];
	   	  	$class_12['total'] = $post_data['total12'];
	   	  	$class_12['MAT'] = $post_data['mat12'];
	   	  	// Class 12

	   	  	// Class 13
	   	  	$class_13['test_id'] = $id;
	   	  	$class_13['class'] = '13';
	   	  	$class_13['physics'] = $post_data['phy13'];
	   	  	$class_13['chemistry'] = $post_data['che13'];
	   	  	$class_13['math'] = $post_data['math13'];
	   	  	$class_13['total'] = $post_data['total13'];
	   	  	$class_13['MAT'] = $post_data['mat13'];
	   	  	// $this->admin_model->add_data($table_name='test_marks',$class_13);
	   	  	// Class 13

	   	  	// fee
	   	  	$reg_fee_9=[];
	   	  	for ($i=1; $i <= 4 ; $i++) { 
	   	  		// echo $i;
	   	  		$fee9['class'] = 9;
	   	  		$fee9['test_date'] = $post_data['test_date'];
	   	  		$fee9['from_date'] = $post_data['from'.$i];
	   	  		$fee9['to_date'] = $post_data['to'.$i];
	   	  		$fee9['fee'] = $post_data['fee'.$i.'_9'];
	   	  		$reg_fee_9[]=$fee9;
	   	  	}

	   	  	$reg_fee_10=[];
	   	  	for ($j=1; $j <= 4 ; $j++) { 
	   	  		// echo $i;
	   	  		$fee10['class'] = 10;
	   	  		$fee10['test_date'] = $post_data['test_date'];
	   	  		$fee10['from_date'] = $post_data['from'.$j];
	   	  		$fee10['to_date'] = $post_data['to'.$j];
	   	  		$fee10['fee'] = $post_data['fee'.$j.'_10'];
	   	  		$reg_fee_10[]=$fee10;
	   	  	}

	   	  	$reg_fee_11=[];
	   	  	for ($k=1; $k <= 4 ; $k++) { 
	   	  		// echo $i;
	   	  		$fee11['class'] = 11;
	   	  		$fee11['test_date'] = $post_data['test_date'];
	   	  		$fee11['from_date'] = $post_data['from'.$k];
	   	  		$fee11['to_date'] = $post_data['to'.$k];
	   	  		$fee11['fee'] = $post_data['fee'.$k.'_11'];
	   	  		$reg_fee_11[]=$fee11;
	   	  	}

	   	  	$reg_fee_12=[];
	   	  	for ($l=1; $l <= 4 ; $l++) { 
	   	  		// echo $i;
	   	  		$fee12['class'] = 12;
	   	  		$fee12['test_date'] = $post_data['test_date'];
	   	  		$fee12['from_date'] = $post_data['from'.$l];
	   	  		$fee12['to_date'] = $post_data['to'.$l];
	   	  		$fee12['fee'] = $post_data['fee'.$l.'_12'];
	   	  		$reg_fee_12[]=$fee12;
	   	  	}

	   	  	$reg_fee_13=[];
	   	  	for ($m=1; $m <= 4 ; $m++) { 
	   	  		// echo $i;
	   	  		$fee13['class'] = 13;
	   	  		$fee13['test_date'] = $post_data['test_date'];
	   	  		$fee13['from_date'] = $post_data['from'.$m];
	   	  		$fee13['to_date'] = $post_data['to'.$m];
	   	  		$fee13['fee'] = $post_data['fee'.$m.'_13'];
	   	  		$reg_fee_13[]=$fee13;
	   	  	}
	   	  	// fee
	   	  	// Test Data
	   	  	$post_data['paper_1_time']=$post_data['test_time1']." - ".$post_data['test_time2'];
	   	  	$post_data['paper_2_time']=$post_data['time1']." - ".$post_data['time2'];
	   	  	$test_data['test_name']=$post_data['test_name'];
	   	  	$test_data['session']=$post_data['session'];
	   	  	$test_data['reg_date']=$post_data['reg_date'];
	   	  	$test_data['test_date']=$post_data['test_date'];
	   	  	$test_data['paper_1_time']=$post_data['paper_1_time'];
	   	  	$test_data['paper_2_time']=$post_data['paper_2_time'];

	   	  	$test_data['windows1']		= $post_data['window_date1'];
	   	  	$test_data['windows2']		= $post_data['window_date2_1'].",".$post_data['window_date2_2'];
	   	  	$test_data['windows3']		= $post_data['window_date3_1'].",".$post_data['window_date3_2'];
	   	  	$test_data['windows4']		= $post_data['window_date4'];
	   	  	// $test_data['total_marks_mat']=$post_data['total_marks_mat'];
	   	  	// Test Data

	   	  	
	   	  	if($this->admin_model->update_data($table_name='test',$test_data,$id))
		   	  	{	
		   	  		$this->db->where('test_date',$post_data['test_date']);
					$this->db->delete('reg_fee_master');
					
		   	  		$this->update_test_marks($class_9,'9',$id);
		   	  		$this->update_test_marks($class_10,'10',$id);
		   	  		$this->update_test_marks($class_11,'11',$id);
		   	  		$this->update_test_marks($class_12,'12',$id);
		   	  		$this->update_test_marks($class_13,'13',$id);

		   	  		foreach ($reg_fee_9 as $fee_9) {
						$this->admin_model->add_data('reg_fee_master',$fee_9);
					}
					foreach ($reg_fee_10 as $fee_10) {
						$this->admin_model->add_data('reg_fee_master',$fee_10);
					}
					foreach ($reg_fee_11 as $fee_11) {
						$this->admin_model->add_data('reg_fee_master',$fee_11);
					}
					foreach ($reg_fee_12 as $fee_12) {
						$this->admin_model->add_data('reg_fee_master',$fee_12);
					}
					foreach ($reg_fee_13 as $fee_13) {
						$this->admin_model->add_data('reg_fee_master',$fee_13);
					}
		   	  		
		   	  		$this->session->set_flashdata('success','Updated Successfully.');
		   	  		redirect('test_master/list_test');
		   	  	}
	   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect(base_url()."test_master/Update_test/".$id);
		   	  	}
	   	  	 
	   	  }
	   	  $data['test'] = $test = $this->admin_model->get_data_by_id($table_name='test',$id);
	   	  $data['class_9']=$this->admin_model->get_data_multi_column('test_marks',
	   	  					array('class' => '9',
	   	  						  'test_id' => $id))->row();
	   	  $data['class_10']=$this->admin_model->get_data_multi_column('test_marks',
	   	  					array('class' => '10',
	   	  						  'test_id' => $id))->row();
	   	  $data['class_11']=$this->admin_model->get_data_multi_column('test_marks',
	   	  					array('class' => '11',
	   	  						  'test_id' => $id))->row();
	   	  $data['class_12']=$this->admin_model->get_data_multi_column('test_marks',
	   	  					array('class' => '12',
	   	  						  'test_id' => $id))->row();
	   	  $data['class_13']=$this->admin_model->get_data_multi_column('test_marks',
	   	  					array('class' => '13',
	   	  						  'test_id' => $id))->row();


	   	  $data['fees_9']=$this->admin_model->get_data_multi_column('reg_fee_master',
	   	  					array('class' => '9',
	   	  						  'test_date' => $test->test_date))->result();
	   	  $data['fees_10']=$this->admin_model->get_data_multi_column('reg_fee_master',
	   	  					array('class' => '10',
	   	  						  'test_date' => $test->test_date))->result();
	   	  $data['fees_11']=$this->admin_model->get_data_multi_column('reg_fee_master',
	   	  					array('class' => '11',
	   	  						  'test_date' => $test->test_date))->result();
	   	  $data['fees_12']=$this->admin_model->get_data_multi_column('reg_fee_master',
	   	  					array('class' => '12',
	   	  						  'test_date' => $test->test_date))->result();
	   	  $data['fees_13']=$this->admin_model->get_data_multi_column('reg_fee_master',
	   	  					array('class' => '13',
	   	  						  'test_date' => $test->test_date))->result();
	   	  
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	      	$this->load->view('admin/header',$data);
		  	$this->load->view('admin/test/edit',$data);
		  	$this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}


public function check_test()
{
	$date=$this->input->post('test_date');
	// $data['test_date']=$data;
	if($this->admin_model->check_availability('test','test_date',$date))
	{
		echo "1";
	}
	else
	{
		echo "0";
	}
}

public function check_test_active($id)
{
	if($this->session->userdata('username'))
	{

			$status=$this->admin_model->get_data_by_status('test');

			foreach ($status->result() as $row) 
			{
				if ($id==$row->id) 
				{
					echo "0";
				}
				else
				{
					$this->db->where_not_in('id',$id);
					$this->db->where('status',1);
				$status=$this->db->get('test');
				echo $status->num_rows();
				}
			}
	}
   	else
   	{
   		redirect('admin/index');
   	}

	// if($id=='')
	// {
	// 	$status=$this->admin_model->get_data_by_status('test');
	// 	// echo $status->num_rows();
	// 	echo "string";
	// }
	// else
	// {
	// 	$this->db->where_not_in('id',$id);
	// 	$status=$this->db->get('test');
	// 	echo $status->num_rows();
	// }
	
}

	public function active_inactive_test($id,$status)
	{
		if($this->session->userdata('username'))
		{
			// echo $id.$status;
			// die();
			$data = array('status'=>$status);
			$this->admin_model->update_data('test',$data,$id);
			// $this->db->where_not_in('id',$id);
			// $this->db->update('test',array('status' => '0' ));
			$active = $this->admin_model->get_data_by_id('test',$id)->status;
			if($active ==1)
			{ ?>
				<button class="btn btn-success" onclick="activate_inactive(<?=$id?>,0)">Activated</button>
			<?php 
			}
			else
			{ ?>
				<button class="btn btn-danger" onclick="activate_inactive(<?=$id?>,1)">Not Activated</button>
			<?php
			}
		}
		else
		{
			redirect('admin/index');
		}
	}


	function view_marks($test_id)
	{
		if($this->session->userdata('username'))
		{
			$data=array('test_id' => $test_id);
	        $test_marks= $this->admin_model->get_data_multi_column('test_marks',$data);

	        echo'<table class="table table-striped table-bordered table-hover" >';
	        echo'<thead>
		            <tr>
		                <th>Class</th>
		                <th>MAT</th>
		                <th>Physics</th>
		                <th>Chemistry</th>
		                <th>Maths</th>
		                <th>total</th>
		            </tr>
	             </thead> 
	             <tbody>';
	        foreach ($test_marks->result() as $row1) 
	        { 
	        echo '<tr>
		                <td>'.$row1->class.'</td>
		                <td>'.$row1->MAT.'</td>
		                <td>'.$row1->physics.'</td>
		                <td>'.$row1->chemistry.'</td>
		                <td>'.$row1->math.'</td>
		                <td>'.$row1->total.'</td>
	            	 </tr>';
	        }
	        echo '</tbody>
	        	  </table>';
	    }
		else
		{
			redirect('admin/index');
		}
	}

	public function update_test_marks($data,$class,$id)
	{
		if($this->session->userdata('username'))
		{
			$this->db->where('test_id',$id);
			$this->db->where('class',$class);
			$this->db->update('test_marks',$data);
		}
		else
		{
			redirect('admin/index');
		}	
	}


	function test_date()
	{
		if($this->session->userdata('username'))
		{
	   		$data['test_date']=$this->admin_model->get_data('test_date');
	   		$data['test']=$this->admin_model->get_data('test');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	   		$this->load->view('admin/header',$data);
	   		$this->load->view('admin/admission_test_date/list',$data);
		  	$this->load->view('admin/footer');
		}
		else
		{
			redirect('admin/index');
		}
	}


	function add_test_date()
	{
		if($this->session->userdata('username'))
		{	
			if($this->input->server('REQUEST_METHOD')=='POST')
		   	  {
		   	  	$post_data = $this->input->post();

		   	  	$test_data=$this->admin_model->get_data_multi_column('test_date',$post_data);
		   	  	$countTest=count($test_data->result());
		   	  	if ($countTest!='0') 
		   	  	{
		   	  		$this->session->set_flashdata('error','Test date Already added for this test');
			   	  	redirect('test_master/test_date');
		   	  	}
		   	  	else
		   	  	{
		   	  		if($this->admin_model->add_data($table_name='test_date',$post_data))
		   	  		{
			   	  		$this->session->set_flashdata('success','Added Successfully.');
			   	  		redirect('test_master/test_date');
			   	  	}
			   	  	else
			   	  	{
			   	  		$this->session->set_flashdata('erorr','Some error occured.');
			   	  		redirect('test_master/test_date');
			   	  	} 
		   	  	}
		   	  }

	   		$data['test']=$this->admin_model->get_data('test');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	   		$this->load->view('admin/header',$data);
	   		$this->load->view('admin/admission_test_date/add',$data);
		  	$this->load->view('admin/footer');
		}
		else
		{
			redirect('admin/index');
		}
	}

	function get_test_date($id)
	{
		echo $this->admin_model->get_data_by_id('test',$id)->test_date;
	}

		public function active_inactive($table_name,$id,$status)
		{
			if($this->session->userdata('username'))
			{
				$data = array('status'=>$status);
				$this->admin_model->update_data($table_name,$data,$id);
			
				$active = $this->admin_model->get_data_by_id($table_name,$id)->status;
				if($active =="1")
				{ ?>
					<button class="btn btn-success" onclick="activate_inactive(<?=$id?>,0)">Activated</button>
				<?php 
				}
				else
				{ ?>
					<button class="btn btn-danger" onclick="activate_inactive(<?=$id?>,1)">Not Activated</button>
				<?php
				}
			}
			else
			{
				redirect('admin/index');
			}
		}


}

?>