<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Enrollment extends Main_controller
{
	function new_enrollment($reg_number='0')
	{
		// echo $r_number;
		if($reg_number=='0') {
			// echo "string";
			$data['classes'] =$this->get('class_master',array('status' => 1 ));
			$data['programs'] =$this->get('program_master',array('status' => 1 ,'class'=>@$stu_result->stu_class ));
			$data['states'] = $this->get('states',array('country_id' => 101));
			$data['cities'] = $this->get('cities',array('state_id' => 38));
		  	$this->load->view('admin/enrollment/new_enrollment1',$data);

		} else {
			// echo "ss";
			$data['stu_result'] = $stu_result = $this->get('results',array('stu_reg_number' => $reg_number ))[0];
			$data['student'] = $student=$this->get('admission',array('registration_no' => $reg_number ))[0];

			
			// echo "<pre>"; print_r($student); echo "</pre>"; die();
			$data['classes'] =$this->get('class_master',array('status' => 1 ));
			$data['programs'] =$this->get('program_master',array('status' => 1 ,'class'=>$student->program_code ));
			// echo "<pre>"; print_r($data['programs']); echo "</pre>"; die();
			$data['states'] = $this->get('states',array('country_id' => 101));
			$data['cities'] = $this->get('cities',array('state_id' => 38));
		  	$this->load->view('admin/enrollment/new_enrollment',$data);
		}
		
	}

	function enrollment_submit()
	{
		if ($this->input->server('REQUEST_METHOD')=='POST') 
		{
			$post_data=$this->input->post();
			// echo "<pre>";
			// print_r($post_data);
			// echo "</pre>";
			$enrollment_no=$post_data['enrol'];
			$query = $this->db->get_where('stu_info', array('enrollment_no' => $enrollment_no));
			if ($query->num_rows() > 0) {
				$this->session->set_flashdata('erorr','Error: Enrollment number already exists.');
				redirect(base_url().'enrollment/new_enrollment');
			} else {
			

			$session_year_from=$post_data['session_year_from'];
			$session_year_to=$post_data['session_year_to'];
			$session = substr($session_year_from,2).substr($session_year_to,2);

			$father_details = 
				 array('name'                        => $post_data['father_name'],
					   'qualification'               => $post_data['father_qualification'],
					   'occupation'                  => $post_data['father_occupation'],
					   'organization'                => $post_data['father_organization'],
					   'designation_in_organization' => $post_data['father_designation_in_organization'],
					   'contact_no'                  => $post_data['father_contact_no'],
					   'email'                       => $post_data['father_email']
					    );

			$father = serialize($father_details);

			$mother_details = 
				 array('name'                        => $post_data['mother_name'],
					   'qualification'               => $post_data['mother_qualification'],
					   'occupation'                  => $post_data['mother_occupation'],
					   'organization'                => $post_data['mother_organization'],
					   'designation_in_organization' => $post_data['mother_designation_in_organization'],
					   'contact_no'                  => $post_data['mother_contact_no'],
					   'email'                       => $post_data['mother_email']
					    );

			$mother = serialize($mother_details);
			$enroll_by="";
			$user_id=$this->session->userdata('user_id');
		//	echo $user_id;die();
	   	  		$user=$this->get('admin',array('id'=>$user_id));
	   	  	//	print_r($user);
	               if ($user) 
	               {
	                 $enroll_by =  $user[0]->name;
	               }
	               else
	               {
	                $enroll_by =  $user_id;
	               }
	     
			$enrollment_data = 
							  array(
								   //'registration_no' => $post_data['registration_no'],
								    'enroll_by'       => $enroll_by,
								    //'test_date'       => $post_data['test_date'],
								    //'waiver_offered'  => $post_data['waiver_offered'],
									'session_start'   =>$post_data['session_year_from'],
									'session_end'   =>$post_data['session_year_to'],
								    'enrollment_no'   => $post_data['enrol'],
								    'mobile_no'       => $post_data['mobile_no'],
								    'mobile_no2'      => $post_data['mobile_no2'],
								    'pin'             => $post_data['pin'],
								    'state'           => $post_data['state'],
								    'city'            => $post_data['city'],
								    'school'          => $post_data['school'], 
								    'stu_class'       => $post_data['stu_class'], 
								    'stu_program'     => $post_data['program'], 
									'stu_batch'       => $post_data['batch'], 
									'session'		  => $session,
									'aadhaar'	      => $post_data['adhar_number'],
									'name'            => $post_data['student_name'], 
									'email'           => $post_data['email'], 
									'dob'             => $post_data['dob'], 
									'address'         => $post_data['address'], 
									'father'          => $father, 
									'mother'          => $mother
									);	

			// echo "<pre>";
			// print_r($enrollment_data);
			// echo "</pre>"; die();
			if($this->Insert('stu_info',$enrollment_data)){
				$this->session->set_flashdata('success','Enrollment Successful. Enrollment No - '.$post_data['enrol'].' .');
				redirect(base_url().'enrollment-list/list_enrollment');
			}
			else{
				$this->session->set_flashdata('erorr','Some error occured.');
				redirect(base_url().'enrollment/new_enrollment/'.$post_data['registration_no']);
			}
		}
	  }
	}


	function enrollment_edit_submit($id)
	{
		if ($this->input->server('REQUEST_METHOD')=='POST') 
		{
			$post_data=$this->input->post();
			
			$session_year_from=$post_data['session_year_from'];
			$session_year_to=$post_data['session_year_to'];
			$session = substr($session_year_from,2).substr($session_year_to,2);

			$father_details = 
				 array('name'                        => $post_data['father_name'],
					   'qualification'               => $post_data['father_qualification'],
					   'occupation'                  => $post_data['father_occupation'],
					   'organization'                => $post_data['father_organization'],
					   'designation_in_organization' => $post_data['father_designation_in_organization'],
					   'contact_no'                  => $post_data['father_contact_no'],
					   'email'                       => $post_data['father_email']
					    );

			$father = serialize($father_details);

			$mother_details = 
				 array('name'                        => $post_data['mother_name'],
					   'qualification'               => $post_data['mother_qualification'],
					   'occupation'                  => $post_data['mother_occupation'],
					   'organization'                => $post_data['mother_organization'],
					   'designation_in_organization' => $post_data['mother_designation_in_organization'],
					   'contact_no'                  => $post_data['mother_contact_no'],
					   'email'                       => $post_data['mother_email']
					    );

			$mother = serialize($mother_details);
			$enroll_by="";
			$user_id=$this->session->userdata('user_id');
	   	  		$user=$this->get('admin',array('id'=>$user_id));
	               if ($user) 
	               {
	                 $enroll_by =  $user->name;
	               }
	               else
	               {
	                $enroll_by =  $user_id;
	               }
	     
			$enrollment_data = 
							  array(
								    'enroll_by'       => $enroll_by,
									'session_start'   =>$post_data['session_year_from'],
									'session_end'   =>$post_data['session_year_to'],
								    'enrollment_no'   => $post_data['enrol'],
								    'mobile_no'       => $post_data['mobile_no'],
								    'mobile_no2'      => $post_data['mobile_no2'],
								    'pin'             => $post_data['pin'],
								    'state'           => $post_data['state'],
								    'city'            => $post_data['city'],
								    'school'          => $post_data['school'], 
								    'stu_class'       => $post_data['stu_class'], 
								    'stu_program'     => $post_data['program'], 
									'stu_batch'       => $post_data['batch'], 
									'session'		  => $session,
									'aadhaar'	      => $post_data['adhar_number'],
									'name'            => $post_data['student_name'], 
									'email'           => $post_data['email'], 
									'dob'             => $post_data['dob'], 
									'address'         => $post_data['address'], 
									'father'          => $father, 
									'mother'          => $mother
									);	
			if($this->Admin_model->update_stu($enrollment_data,$id)){
				$this->session->set_flashdata('success','Enrollment Updated. Enrollment No - '.$post_data['enrol'].' .');
				redirect(base_url().'enrollment-list/list_enrollment');
			}
			else{
				$this->session->set_flashdata('erorr','Some error occured.');
				redirect(base_url().'enrollment/edit_enrollment1/'.$post_data['registration_no']);
			}
		}
	}
	
public function edit_student($id)
{
 $data['student'] =$student= $this->db->get_where('stu_info',['stu_id'=>$id])->row();	
 $data['classes'] =$this->get('class_master',array('status' => 1 ));
$data['states'] = $this->get('states',array('country_id' => 101));
$data['cities'] = $this->get('cities',array('state_id' => 38));
$data['program'] = $this->db->get_where('program_master',array('id' =>$student->stu_program))->row();
$data['batch'] = $this->db->get_where('batch_master',array('id' =>$student->stu_batch))->row();
 $this->load->view('admin/enrollment/edit_enrollment1',$data);
}
	function get_batch($class,$program_id)
	{
		$data=   array('class' =>$class ,
					   'program_id'=>$program_id,
					   'status'=>1 );
		$batchs = $this->get('batch_master',$data);
			echo "<option value=''>-- Select Batch --</option>";
		foreach ($batchs as $batch) {
              echo "<option value='".$batch->id."'>".$batch->batch."</option>";
            }
	}

	function get_program($class)
	{
		$data=   array('class' =>$class,
					   'status'=>1);
		$programs = $this->get('program_master',$data);
			echo "<option value=''>-- Select Program --</option>";
		foreach ($programs as $program) {
              echo "<option value='".$program->id."'>".$program->program."</option>";
            }
	}

	function get_program_year()
	{
		$post_data=$this->input->post();

		$data=   array('id' =>$post_data['id']);

		$programs = $this->get('program_master',$data)[0];

		$program_year = (int)$programs->year;
		echo $program_year;
	}

	function generate_enrollment_no()
	{
		$post_data = $this->input->post();
		// echo "<pre>"; print_r($post_data); echo "</pre>";

		$session= substr($post_data['session_year_from'],2).substr($post_data['session_year_to'],2);

		$check_data['stu_class']=$post_data['ClaSS'];
		$check_data['stu_program']=$post_data['program'];
		$check_data['session']=$session;
		$check_data['program_type']=$post_data['program_type'];

		$check= $this->get('stu_info',$check_data);

		$check = count($check);

		$check = $check+1;
	   	  	$len= strlen($check);
		 	if ($len==1) 
		 	{
		 		 $index='000'.$check;
		 	}
		 	elseif ($len==2) 
		 	{
		 		 $index='00'.$check;
		 	}
		 	elseif($len==3)
		 	{
		 		 $index='0'.$check;
		 	}
		 	elseif($len==4) 
		 	{
		 		 $index=$check;
		 	}
		 	else
		 	{
		 		$index=$check;
		 	}

		
		$enrollment = $post_data['ClaSS'].'_'.$post_data['center_code'].'_'.$post_data['program_type'].'_'.$session.'_'.$index;

		$enrollment_no = trim($enrollment);
		$enrollment_no =str_replace(" ","",$enrollment_no);
		echo $enrollment_no =str_replace("_","",$enrollment_no);

	}

	function get_city($state_id)
	{
		$data=   array('state_id' =>$state_id);
		$cities = $this->get('cities',$data);
			echo "<option value=''>-- Select City --</option>";
		foreach ($cities as $city) {
              echo "<option value='".$city->id."'>".$city->name."</option>";
            }
	}

	function check_enrollment_no($enrollment_no)
	{
		 $data = $this->get('stu_info',array('enrollment_no'=>$enrollment_no));
		 if (!$data){
		 	echo 1;
		 }
		 else{
		 	echo 0;
		 }
	}

	function list_enrollment()
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['students'] = $this->get('stu_info', array('del_status' => 0));
		$data['class'] = $this->get('class_master', array('status' => 1));
		$data['cities'] = $this->get('cities');
		$data['states'] = $this->get('states');
		$data['programs'] = $this->get('program_master');
		$data['batch'] = $this->get('batch_master');
		$data['states'] = $this->get('states');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/enrollment/list',$data);
		$this->load->view('admin/footer');	
	}

	public function assign_batch()
	{
		$post_data=$this->input->post();
		$stu_id=$post_data['stu_id'];
		unset($post_data['stu_id']);
		$this->db->where('stu_id',$stu_id);
		if($this->db->Update('stu_info',$post_data))
		{
			echo 1;
		}
		else
		{
			echo "Some error occured !";
		}
		// print_r($post_data);
	}
	public function update_batch()
	{
		$post_data=$this->input->post();
		$stu_id=$post_data['stu_id'];
		unset($post_data['stu_id']);
		$this->db->where('stu_id',$stu_id);
		if($this->db->Update('stu_info',$post_data))
		{
			echo 1;
		}
		else
		{
			echo "Some error occured !";
		}
		// print_r($post_data);
	}
	
	function reload_enrollment_table()
	{
		$this->check_session();
		$data['students'] = $this->get('stu_info', array('del_status' => 0));
		$data['cities'] = $this->get('cities');
		$data['states'] = $this->get('states');
		$data['programs'] = $this->get('program_master');
		$data['batch'] = $this->get('batch_master');
		$data['states'] = $this->get('states');
		$this->load->view('admin/enrollment/reload_enrollment_table',$data);
	}

	function delete_student($id)
	{	
		$this->db->where('stu_id',$id);
		if($this->db->Update('stu_info',array('del_status' => 1 ))){
			$this->session->set_flashdata('success','deleted successfully!');
		}
		else{
			$this->session->set_flashdata('erorr','Some error occured.');
		}
		redirect(base_url().'enrollment/list_enrollment');
	}
	function restore_student($id)
	{	
		$this->db->where('stu_id',$id);
		if($this->db->Update('stu_info',array('del_status' => 0 ))){
			$this->session->set_flashdata('success','Restore successfully!');
		}
		else{
			$this->session->set_flashdata('erorr','Some error occured.');
		}
		redirect(base_url().'enrollment/list_enrollment');
	}

	function trash()
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['students'] = $this->get('stu_info', array('del_status' => 1));
		$data['cities'] = $this->get('cities');
		$data['states'] = $this->get('states');
		$data['programs'] = $this->get('program_master');
		$data['batch'] = $this->get('batch_master');
		$data['states'] = $this->get('states');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/enrollment/deleted_list',$data);
		$this->load->view('admin/footer');	
	}

	function update_mac_id($id,$machine_id)
	{
		
		$this->check_session();
		$post_data['stu_mac_id']=$machine_id;
		$this->db->where('stu_id',$id);
		if($this->db->Update('stu_info',$post_data))
		{
			echo "<span style='color:green;'>machine Id Updated.</span>";
		}
		else
		{
			echo "<span style='color:red;'>Some error occured !</span>";
		}
						
	}

	function fees($student_id)
	{
		$this->check_session();
		$check=$this->get('stu_fees',array('stu_id'=>$student_id));
		// echo count($check);die;
		if (count($check)==0) {
			$data['user']=$this->session->userdata('username');
			$r=$this->session->userdata('role_id');
			$data['role'] = $this->main_model->get_data_id('manage_role',$r);
			$data['menu'] = $this->main_model->get_menu();
			$data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['student'] = $student=$this->get('stu_info',array('stu_id'=>$student_id))[0];
			$data['program'] = $this->get('program_master',array('id'=>$student->stu_program))[0];
			$data['fees']=$this->get('fee_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));

			// print_r($data['fees']); die();
			$data['fee_plan']=$this->get('fee_plan_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));

			$student->stu_class;
			$student->stu_program;
			// print_r($student);
			// print_r($data['fee_plan']); die();

			date_default_timezone_set('Asia/Calcutta');
			// echo $time = date('d-M-Y ( h:i A )',time());
			
			$date = date('Y-m-d',time());  
			// $date = date('Y-m-d',strtotime('2020-02-24'));
			  // echo br(1);

			//echo $student->test_date; echo br(1);
			if(!empty($student->test_date)){
			$test=$this->get('test',array('test_date'=>$student->test_date))[0];
			// print_r($test);	echo br(1);
			// echo $test->windows1; echo br(1);
			$windows1= date( 'Y-m-d', strtotime($test->windows1));

			$windows2=explode(",",$test->windows2);
			$windows2_1=date( 'Y-m-d', strtotime($windows2[0]));
			$windows2_2=date( 'Y-m-d', strtotime($windows2[1]));

			$windows3=explode(",",$test->windows3);
			$windows3_1=date( 'Y-m-d', strtotime($windows3[0]));
			$windows3_2=date( 'Y-m-d', strtotime($windows3[1]));

			$windows4= date( 'Y-m-d', strtotime($test->windows4));

			if ($date<=$windows1) {
				$data['scholarship']=$student->waiver_offered;
			}
			else if ($date>=$windows2_1 and $date<=$windows2_2 ) {
				$data['scholarship']=round($student->waiver_offered*3/4);
			}
			else if ($date>=$windows3_1 and $date<=$windows3_2 ) {
				$data['scholarship']=round($student->waiver_offered/2);
			}
			else
			{
				$data['scholarship']='0';
			}
		}else{
			$data['scholarship']='0';
		}
			
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/enrollment/reception_assign_fees',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			echo '<script>alert("Fees Already Assigned.");</script>';
			echo "<script>setTimeout(function () { window.close();}, 100);</script>";
			 //redirect(base_url().'enrollment/list_enrollment');
		}
	}
	

	function reception_fees($student_id)
	{
		$this->check_session();
		$check=$this->get('stu_fees',array('stu_id'=>$student_id));
		// echo count($check);die;
		if (count($check)==0) {
			$data['user']=$this->session->userdata('username');
			$r=$this->session->userdata('role_id');
			$data['role'] = $this->main_model->get_data_id('manage_role',$r);
			$data['menu'] = $this->main_model->get_menu();
			$data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['student'] = $student=$this->get('stu_info',array('stu_id'=>$student_id))[0];
			$data['program'] = $this->get('program_master',array('id'=>$student->stu_program))[0];
			$data['fees']=$this->get('fee_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));

			// print_r($data['fees']); die();
			$data['fee_plan']=$this->get('fee_plan_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));

			$student->stu_class;
			$student->stu_program;
			// print_r($student);
			// print_r($data['fee_plan']); die();

			date_default_timezone_set('Asia/Calcutta');
			// echo $time = date('d-M-Y ( h:i A )',time());
			
			$date = date('Y-m-d',time());  
			// $date = date('Y-m-d',strtotime('2020-02-24'));
			  // echo br(1);

			//echo $student->test_date; echo br(1);
			if(!empty($student->test_date)){
			$test=$this->get('test',array('test_date'=>$student->test_date))[0];
			// print_r($test);	echo br(1);
			// echo $test->windows1; echo br(1);
			$windows1= date( 'Y-m-d', strtotime($test->windows1));

			$windows2=explode(",",$test->windows2);
			$windows2_1=date( 'Y-m-d', strtotime($windows2[0]));
			$windows2_2=date( 'Y-m-d', strtotime($windows2[1]));

			$windows3=explode(",",$test->windows3);
			$windows3_1=date( 'Y-m-d', strtotime($windows3[0]));
			$windows3_2=date( 'Y-m-d', strtotime($windows3[1]));

			$windows4= date( 'Y-m-d', strtotime($test->windows4));

			if ($date<=$windows1) {
				$data['scholarship']=$student->waiver_offered;
			}
			else if ($date>=$windows2_1 and $date<=$windows2_2 ) {
				$data['scholarship']=round($student->waiver_offered*3/4);
			}
			else if ($date>=$windows3_1 and $date<=$windows3_2 ) {
				$data['scholarship']=round($student->waiver_offered/2);
			}
			else
			{
				$data['scholarship']='0';
			}
		}else{
			$data['scholarship']='0';
		}
			
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/enrollment/assign_fees',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			echo '<script>alert("Fees Already Assigned.");</script>';
			echo "<script>setTimeout(function () { window.close();}, 100);</script>";
			 //redirect(base_url().'enrollment/list_enrollment');
		}
	}
	function fees_data()
	{
		$this->check_session();
		$get_data=$this->input->get();
		// print_r($get_data); die();
		 $stu_id = $get_data['stu_id'];
		  $discount_id = $get_data['discount'];
		 if(!empty($get_data['Scholarship'])){
		 $Scholarship = number_format($get_data['Scholarship']);
		 }else{
			$Scholarship=0;
		 }
		 if(!empty($get_data['additionalScholarship'])){
		 $additionalScholarship = number_format($get_data['additionalScholarship']);
		}else{
			$additionalScholarship=0;
		 }
		 if(!empty($get_data['additionalScholarshipReason'])){
		 $additionalScholarshipReason = $get_data['additionalScholarshipReason'];
		}else{
			$additionalScholarshipReason=0;
		 }
		 $fee_plan_id = $get_data['FEE_PLAN'];

		// $data['add_Scholarship']='0';
		// $data['add_Scholarship_reason']='';
		// if ($additionalScholarship>0) {
		// 	$Scholarship= $Scholarship+$additionalScholarship;
		// 	$data['add_Scholarship']=$additionalScholarship;
		// 	$data['add_Scholarship_reason']=$additionalScholarshipReason;
		// }
		
		$Scholarship;
		$data['student'] = $student=$this->get('stu_info',array('stu_id'=>$stu_id))[0];

		$this->db->order_by('fee_plan_id','desc');
		$this->db->order_by('academic_year','asc');
		$data['fees']=$this->get('fee_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program,'fee_plan_id'=>$fee_plan_id));
		$data['Scholarship']=$Scholarship;
		$this->db->where('id', $discount_id);
		$data['discount'] = $this->db->get('discount_master')->row();
		$this->load->view('admin/enrollment/fees_data',$data);
	}

	
	function reception_fees_data()
	{
		$this->check_session();
		$get_data=$this->input->get();
		// print_r($get_data); die();
		 $stu_id = $get_data['stu_id'];
		  $discount_id = $get_data['discount'];
		 if(!empty($get_data['Scholarship'])){
		 $Scholarship = number_format($get_data['Scholarship']);
		 }else{
			$Scholarship=0;
		 }
		 if(!empty($get_data['additionalScholarship'])){
		 $additionalScholarship = number_format($get_data['additionalScholarship']);
		}else{
			$additionalScholarship=0;
		 }
		 if(!empty($get_data['additionalScholarshipReason'])){
		 $additionalScholarshipReason = $get_data['additionalScholarshipReason'];
		}else{
			$additionalScholarshipReason=0;
		 }
		 $fee_plan_id = $get_data['FEE_PLAN'];
		$Scholarship;
		$data['student'] = $student=$this->get('stu_info',array('stu_id'=>$stu_id))[0];

		$this->db->order_by('fee_plan_id','desc');
		$this->db->order_by('academic_year','asc');
		$data['fees']=$this->get('fee_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program,'fee_plan_id'=>$fee_plan_id));
		$data['Scholarship']=$Scholarship;
		$this->db->where('id', $discount_id);
		$data['discount'] = $this->db->get('discount_master')->row();
		$this->load->view('admin/enrollment/reception_fees_data',$data);
	}
	function assign_fees($stu_id)
	{
		$post_data=$this->input->post();
		unset($post_data['discount']);
		$post_data['stu_id']=$stu_id;
		// $add_Scholarship=$post_data['add_Scholarship'];
		// $add_Scholarship_reason=$post_data['add_Scholarship_reason'];
		$discount=$this->input->post('discount');
		$discount_data = explode(',', $discount);
		$discount_title = $discount_data[0]; // Title
		$discount_type = $discount_data[1]; // Type
		$post_data['discount_amount']=$discount_title;
		$post_data['discount_type']=$discount_type;
		unset($post_data['add_Scholarship']);
		unset($post_data['add_Scholarship_reason']);
		$rs = $this->db->get_where('stu_fees',['stu_id'=>$stu_id])->row();
		if($rs)
		{
         echo 2;
		}else{
		if($this->Insert('stu_fees',$post_data))
		{
			// $update_data['add_Scholarship']=$add_Scholarship;
			// $update_data['add_Scholarship_reason']=$add_Scholarship_reason;
			// $this->Update_stu($update_data,$stu_id);
			//die();
			echo 1;
		}
		else
		{
			$this->Delete_data('stu_fees',array('stu_id'=>$stu_id));
			// $update_data['add_Scholarship']=0;
			// $update_data['add_Scholarship_reason']='';
			// $this->Update_stu($update_data,$stu_id);
			echo 0;
		}	}
	}


	function reception_assign_fees($stu_id)
	{
		$post_data=$this->input->post();
		unset($post_data['discount']);
		$post_data['stu_id']=$stu_id;
		$discount=$this->input->post('discount');
		$discount_data = explode(',', $discount);
		$discount_title = $discount_data[0]; // Title
		$discount_type = $discount_data[1]; // Type
		$post_data['discount_amount']=$discount_title;
		$post_data['discount_type']=$discount_type;
		unset($post_data['add_Scholarship']);
		unset($post_data['add_Scholarship_reason']);
		$rs = $this->db->get_where('stu_fees',['stu_id'=>$stu_id])->row();
		if($rs)
		{
         echo 2;
		}else{
		if($this->Insert('stu_fees',$post_data))
		{
			echo 1;
		}
		else
		{
			$this->Delete_data('stu_fees',array('stu_id'=>$stu_id));
			echo 0;
		}	}
	}
	function view_fees($student_id)
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['student'] = $student=$this->get('stu_info',array('stu_id'=>$student_id))[0];
		$data['program'] = $this->get('program_master',array('id'=>$student->stu_program))[0];
		$data['fees']=$this->get('fee_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));
		$data['fee_plan']=$this->get('fee_plan_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));
		$data['fees_details']=$this->get('stu_fees',array('stu_id'=>$student_id));
		$data['fees']  =$this->db->get_where('transaction_success',array('registration_no'=>$student->enrollment_no))->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/enrollment/fees_details',$data);
		$this->load->view('admin/footer');
	}
	function reception_view_fees($student_id)
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['student'] = $student=$this->get('stu_info',array('stu_id'=>$student_id))[0];
		$data['program'] = $this->get('program_master',array('id'=>$student->stu_program))[0];
		$data['fees']=$this->get('fee_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));
		$data['fee_plan']=$this->get('fee_plan_master',array('class'=>$student->stu_class,'program_id'=>$student->stu_program));
		$data['fees_details']=$this->get('stu_fees',array('stu_id'=>$student_id));
		$data['fees']  =$this->db->get_where('transaction_success',array('registration_no'=>$student->enrollment_no))->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/enrollment/reception_fees_details',$data);
		$this->load->view('admin/footer');
	}
   function print_receipt($invoice_no)
   {
	$data['fee']  =$fees=$this->db->get_where('transaction_success',array('invoice_no'=>$invoice_no))->row();
	$data['student']  =$student=$this->db->get_where('stu_info',array('enrollment_no'=>$fees->registration_no))->row();
	$data['fees_details']=$this->db->get_where('stu_fees',array('stu_id'=>$student->stu_id))->row();
	$data['batch']=$this->db->get_where('batch_master',array('id'=>$student->stu_batch))->row();
	$data['stu_program']=$this->db->get_where('program_master',array('id'=>$student->stu_program))->row();
	$this->load->view('admin/enrollment/print_receipt',$data);
   }
	function pay_fees($id)
	{
		$this->check_session();
		$post_data= $this->input->post();

		$amount=$post_data['amount'];
		$total=$post_data['total'];
		$duedate=$post_data['duedate'];
		$due = $total-$amount;
		
		if ($due==0) {
			$data['pay_status']=1;
		}
		else{
			$data['pay_status']=2;
		}

		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		// echo "<pre>";
		// print_r($post_data);
		// echo "</pre>"; die();
		// $post_data['pay_status']=1;
		date_default_timezone_set('Asia/Calcutta');
		$data['transaction_time'] = date('d-M-Y  H:i:s',time());
		$data['transaction_mode'] = $post_data['transaction_mode'];
		$data['transaction_id']   = $post_data['transaction_id'];
		$data['collected_by']     = $this->session->userdata('username');
		$data['due']		      = $due;
		$data['duedate']		      = $duedate;
	    


		$student_id=$this->get('stu_fees',array('id'=>$id))[0]->stu_id;
		$student=$this->get('stu_info',array('stu_id'=>$student_id))[0];
		$transaction_data['duedate']		      = $duedate;
		$transaction_data['due_amount']		      = $due;
		$transaction_data['transaction_id']     = $post_data['transaction_id'];
		$transaction_data['registration_no']	= $student->enrollment_no;
		$transaction_data['transaction_amount'] = $amount;
		$transaction_data['total_amount']		= $total;
		$transaction_data['date_time']			= $data['transaction_time'];
		$transaction_data['payment_mode']		= $post_data['transaction_mode'];

		// echo "<pre>";
		// print_r($transaction_data);
		// echo "</pre>"; 
		// echo "<pre>";
		// print_r($student);
		// echo "</pre>"; 
		// die();
		if($this->Update('stu_fees',$data,$id))
		{
			$this->db->insert('transaction_success', $transaction_data);
            $inserted_id = $this->db->insert_id();
			    $prefix = 'RS';
                $formatted_id = sprintf('%05d', $inserted_id);
                $uniqueCode = $prefix . $formatted_id;
                $update['invoice_no'] = $uniqueCode;
				$this->Update('transaction_success',$update,$inserted_id);
			echo $uniqueCode;
		}
		else
		{
			echo 1;
		}
	}

	function list_fee_installment($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				// echo "<pre>";
				// print_r($post_data);
				// echo "</pre>";
				// die();
				$data=$this->get('fee_installment',array('title'=>$post_data['title']));
				$data1=$this->get('fee_installment',array('installments'=>$post_data['installments']));
				if (count($data)==0 and count($data1)==0){
					if($this->Insert('fee_installment',$post_data)){
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
				$data=$this->get('fee_installment',array('title'=>$post_data['title'],'id!='=>$id));
				$data1=$this->get('fee_installment',array('installments'=>$post_data['installments'],'id!='=>$id));
				if (count($data)==0 and count($data1)==0){
					if($this->Update('fee_installment',$post_data,$id)){
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
		$data['fee_installment'] =$this->get('fee_installment');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/fee_installment/list',$data);
		$this->load->view('admin/footer');
	}

	function reload_fee_installment_table()
	{
		$this->check_session();
		$data['fee_installment'] =$this->get('fee_installment');
	    $this->load->view('admin/fee_installment/list_reload',$data);
	}

	function Update_stu($data,$id)
	{
		$this->db->where('stu_id',$id);
		$this->db->update('stu_info',$data);
	}

	    // Method to load programs based on selected class
		public function get_programs() {
			$class_id = $this->input->post('class_id'); 
			$programs = $this->main_model->get_programs_by_class($class_id);
			$options = '<option>select program</option>';
			foreach ($programs as $program) {
				$options .= '<option value="' . $program->id . '">' . $program->program . '</option>';
			}
			echo json_encode($options);
		}
		
	
		public function get_batches() {
			$program_id = $this->input->post('program_id');
			$class_id = $this->input->post('class_id');
			$batches = $this->main_model->get_batches_by_program($program_id,$class_id);
			$options = '<option>select batch</option>';
			foreach ($batches as $batche) {
				$options .= '<option value="' . $batche->id . '">' . $batche->batch . '</option>';
			}
			echo json_encode($options);
		}
		public function load_table_data() {
			$batch_id = $this->input->post('batch');
			$search = $this->input->post('search');
			$class = $this->input->post('class');
			$program = $this->input->post('program');
			$data['students'] =$table_data = $this->main_model->get_table_data($batch_id, $search, $class ,$program);
			$data['cities'] = $this->get('cities');
			$data['states'] = $this->get('states');
			$data['programs'] = $this->get('program_master');
			$data['batch'] = $this->get('batch_master');
			$data['states'] = $this->get('states');
			$this->load->view('admin/enrollment/reload_enrollment_table',$data);
			//echo json_encode($table_data);
		}
		public function get_enrollment()
		{
			$return['success'] =false;
			$classId = $this->input->post('class_id');
			$programId =$this->input->post('program_id');
			$enrollmentCode = $this->db->get_where('program_master',['class'=>$classId,'id'=>$programId])->row()->enrollment_code;
		    if($enrollmentCode){
				$query = $this->db->select('enrollment_no') ->from('stu_info')->where(['stu_class'=>$classId,'stu_program'=>$programId])->order_by('enrollment_no', 'DESC') ->limit(1) ->get();
                $result = $query->row();
				if($result){
					$lastEnrollmentCode = $result->enrollment_no;
					$letterPart = substr($lastEnrollmentCode, 0, 2);
					$numericPart = intval(substr($lastEnrollmentCode, 2));
					$numericPartPlus = $numericPart+1;
					 $ReturnCode = $letterPart.$numericPartPlus;
				}else{
					$ReturnCode =$enrollmentCode;
				}
			if ($ReturnCode) {
						$return['success'] =true;
						$return['code'] = $ReturnCode;
			} else {
				$return['success'] =false;
			}
		  }else{
			$return['success'] =false;
		  }
		  echo json_encode($return);
		}
		


}

