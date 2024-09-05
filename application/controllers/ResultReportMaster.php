<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class ResultReportMaster extends Main_controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
	// paper_category
	function manage_paper_category($id=0)
	{	
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				// print_r($post_data);die();
				$data=$this->main_model->get('paper_category',$post_data);
				if (count($data)==0){
					if($this->main_model->add_data('paper_category',$post_data)){
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
				$data=$this->main_model->get('paper_category',array('category'=>$post_data['category'],'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('paper_category',$post_data,$id)){
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
		$this->db->order_by('category','asc');
	    $data['paper_category'] = $this->main_model->get('paper_category');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/paper_category_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_paper_category_table()
	{
		$this->check_session();
		$this->db->order_by('category','asc');
		$data['paper_category'] = $this->main_model->get('paper_category');
	    $this->load->view('admin/ResultReportMaster/paper_category_table_reload',$data);
	}
	// paper_category

	// question_topics
	function manage_question_topics($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			if($id==0){
				$post_data=$this->input->post();
				// print_r($post_data); die();
				$check=array('title'=>$post_data['title'],'paper_category'=>$post_data['paper_category'] );
				$data=$this->main_model->get('question_topics_master',$check);
				if (count($data)==0){
					if($this->main_model->add_data('question_topics_master',$post_data)){
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
				$data=$this->main_model->get('question_topics_master',array('title'=>$post_data['title'],'parent_id'=>$post_data['parent_id'],'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('question_topics_master',$post_data,$id)){
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
	    $data['paper_category'] = $this->main_model->get('paper_category');
	    $data['question_topics'] = $this->main_model->get('question_topics_master',array('parent_id' => 0));
	    $this->db->order_by('paper_category','asc');
	    $this->db->order_by('parent_id','asc');
	    $this->db->order_by('title','asc');
	    $data['QuestionTopics'] = $this->main_model->get('question_topics_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/question_topics_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_question_topics_table()
	{
		$this->check_session();
		$data['paper_category'] = $this->main_model->get('paper_category');
	    $data['question_topics'] = $this->main_model->get('question_topics_master',array('parent_id' => 0));
	    $this->db->order_by('parent_id','asc');
	    $this->db->order_by('title','asc');
	    $data['QuestionTopics'] = $this->main_model->get('question_topics_master');
	    $this->load->view('admin/ResultReportMaster/question_topics_table_reload',$data);
	}
	// question_topics

	// difficulty_level
	function manage_difficulty_level($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			if($id==0){
				$post_data=$this->input->post();
				$check = array('section' => $post_data['section'] );
				// print_r($post_data);die();
				$data=$this->main_model->get('difficulty_level_master',$check);
				if (count($data)==0){
					if($this->main_model->add_data('difficulty_level_master',$post_data)){
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
				$data=$this->main_model->get('difficulty_level_master',array('section' => $post_data['section'] ,'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('difficulty_level_master',$post_data,$id)){
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
	    $data['paper_category'] = $this->main_model->get('paper_category');
	    $this->db->order_by('section','asc');
	    $data['difficulty_lavel'] = $this->main_model->get('difficulty_level_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/difficulty_level_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_difficulty_level_table()
	{
		$this->check_session();
		$data['paper_category'] = $this->main_model->get('paper_category');
	    $this->db->order_by('section','asc');
	    $data['difficulty_lavel'] = $this->main_model->get('difficulty_level_master');
	    // print_r($data['difficulty_lavel']);die();
	    $this->load->view('admin/ResultReportMaster/difficulty_level_table_reload',$data);
	}


	function get_question_topics($paper_category)
	{
		$this->check_session();
		$question_topics=$this->main_model->get('question_topics_master',array('paper_category' => $paper_category,'parent_id'=>0));
		echo "<option value='0'>-- Select Parent Topic --</option>";
		foreach ($question_topics as $q_topics) {
			$deactive=""; if ($q_topics->status==0) { $deactive="( deactived )"; }
			echo "<option value='".$q_topics->id."'>";
            echo $q_topics->title.$deactive;
            echo "</option>";
		}
	}
	// difficulty_level

	// question_paper
	function manage_question_paper($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			if($id==0){
				$post_data=$this->input->post();
				$check = array('paper_title' => $post_data['paper_title'],'test_date' => $post_data['test_date'] );
				$data=$this->main_model->get('question_paper_master',$check);
				if (count($data)==0){
					if($this->main_model->add_data('question_paper_master',$post_data)){
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
				$data=$this->main_model->get('question_paper_master',array('paper_title'=>$post_data['paper_title'],'test_date'=>$post_data['test_date'],'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('question_paper_master',$post_data,$id)){
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
	    $this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	    $this->db->order_by('test_date','desc');
	    $this->db->order_by('paper_title','asc');
	    $data['QuestionPapers'] = $this->main_model->get('question_paper_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/question_paper_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_question_paper_table($test_date)
	{
		$this->check_session();
		$this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	    $this->db->order_by('test_date','desc');
	    $this->db->order_by('paper_title','asc');
	    $data['QuestionPapers'] = $this->main_model->get('question_paper_master', array('test_date' => $test_date ));
	    $this->load->view('admin/ResultReportMaster/question_paper_table_reload',$data);
	}
	// question_paper


	// questions
	function manage_questions($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			if($id==0){
				$post_data=$this->input->post();
				$post_data['class']=$post_data['stuCLASS']; unset($post_data['stuCLASS']);

				$check = array('test_date' => $post_data['test_date'],'question_id'=>$post_data['question_id'],'paper_category'=>$post_data['paper_category'],'class'=>$post_data['class'],'question_paper'=>$post_data['question_paper'] );

				$data=$this->main_model->get('question_master',$check);
				// echo "<pre>";
				// print_r($data); 
				// echo "</pre>";

				// echo "<pre>";

				// print_r($post_data); 
				// echo "</pre>";
				// die();
				if (count($data)==0){
					if($this->main_model->add_data('question_master',$post_data)){
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
				$post_data['class']=$post_data['stuCLASS']; unset($post_data['stuCLASS']);
				$post_data['topic_id']=$post_data['q_TOPICS']; unset($post_data['q_TOPICS']);
				$post_data['difficultylavel_id']=$post_data['q_d_lavel']; unset($post_data['q_d_lavel']);
				$q=$this->main_model->get('question_master',array('id'=>$id))[0];

				$data=$this->main_model->get('question_master',array('test_date' => $q->test_date ,'question_id'=>$post_data['question_id'],'paper_category'=>$q->paper_category,'question_paper'=>$q->question_paper,'class'=>$post_data['class'],'id!='=>$id));
				
				// echo "<pre>";
				// print_r($data); 
				// print_r($post_data); 
				// echo "</pre>";
				// die();
				if (count($data)==0){
					if($this->main_model->update_data('question_master',$post_data,$id)){
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
	    $data['paper_category'] = $this->main_model->get('paper_category');
	    $this->db->order_by('section','asc');
	    $data['difficulty_lavel'] = $this->main_model->get('difficulty_level_master');
	    $data['QuestionTopics'] = $this->main_model->get('question_topics_master');
	    $this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	    $this->db->order_by('test_date','desc');
	    $this->db->order_by('question_id','asc');
	    $this->db->order_by('paper_category','asc');
	    $data['question_master'] = $this->main_model->get('question_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/questions_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_questions_table($test_date)
	{
		$this->check_session();
		$data['paper_category'] = $this->main_model->get('paper_category');
	    $this->db->order_by('section','asc');
	    $data['difficulty_lavel'] = $this->main_model->get('difficulty_level_master');
	    $this->db->order_by('parent_id','asc');
		$this->db->order_by('title','asc');
		$this->db->order_by('status','asc');
	    $data['QuestionTopics'] = $this->main_model->get('question_topics_master',array('parent_id'=>0));
	    $data['QuestionTopicsAll'] = $this->main_model->get('question_topics_master',array('parent_id'=>0));
	    $this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	    $this->db->order_by('test_date','desc');
		$this->db->order_by('paper_title','asc');
		$data['QuestionPapers'] = $this->main_model->get('question_paper_master', array('test_date' => $test_date ));
	    $this->db->order_by('test_date','desc');
	    $this->db->order_by('paper_category','asc');
	    $this->db->order_by('class','asc');
	    $this->db->order_by('question_id','asc');
	    $data['question_master'] = $this->main_model->get('question_master', array('test_date' => $test_date ));
	    $this->load->view('admin/ResultReportMaster/questions_table_reload',$data);
	}

	function get_topic_difficultylavel($paper_category,$id)
	{	
		$idd=$id;
		if($id==0){ $idd=""; }
		if ($paper_category==1) 
		{
			$this->db->order_by('parent_id','asc');
			$this->db->order_by('title','asc');
			$this->db->order_by('status','asc');
			$question_topics=$this->main_model->get('question_topics_master',array('paper_category' => $paper_category,'parent_id'=>0));
			$question_topics_all=$this->main_model->get('question_topics_master',array('paper_category' => $paper_category,'parent_id'=>0));
			echo '<label for="topic_id'.$idd.'"> Topics </label>';
			echo '<span id="topic_msg'.$idd.'" style="color: red"></span>';
			echo '<select class="form-control input-sm" id="topic_id'.$idd.'"  >';
			echo "<option value=''>-- Select --</option>";
			foreach ($question_topics as $q_topics) {
				$deactive=""; $style=""; if ($q_topics->status==0) { $deactive=" ( Not Actived ) "; $style="style='color:red'"; }
				$parent='';
				foreach ($question_topics_all as $q_topics_all) {
					if ($q_topics_all->id==$q_topics->parent_id) {
						$parent=" [ ".$q_topics_all->title." ] ";
					}
				}
				echo "<option value='".$q_topics->id."' ".$style." >";
	            echo $q_topics->title. $parent .$deactive;
	            echo "</option>";
			}
			echo "</select>";
			echo'<input type="hidden" class="form-control input-sm" value="0" id="difficultylavel_id'.$idd.'">';
		}
		elseif($paper_category==2) {
			
			$this->db->order_by('parent_id','asc');
			$this->db->order_by('title','asc');
			$this->db->order_by('status','asc');
			$question_topics=$this->main_model->get('question_topics_master',array('paper_category' => $paper_category,'parent_id'=>0));
			$question_topics_all=$this->main_model->get('question_topics_master',array('paper_category' => $paper_category,'parent_id'=>0));
			echo '<label for="topic_id'.$idd.'"> Topics </label>';
			echo '<span id="topic_msg'.$idd.'" style="color: red"></span>';
			echo '<select class="form-control input-sm" id="topic_id'.$idd.'"  >';
			echo "<option value=''>-- Select --</option>";
			foreach ($question_topics as $q_topics) {
				$deactive=""; $style=""; if ($q_topics->status==0) { $deactive=" ( Not Actived ) "; $style="style='color:red'"; }
				$parent='';
				foreach ($question_topics_all as $q_topics_all) {
					if ($q_topics_all->id==$q_topics->parent_id) {
						$parent=" [ ".$q_topics_all->title." ] ";
					}
				}
				echo "<option value='".$q_topics->id."' ".$style." >";
	            echo $q_topics->title. $parent .$deactive;
	            echo "</option>";
			}
			echo "</select>";



			$difficulty_level=$this->main_model->get('difficulty_level_master',array('paper_category' => $paper_category));
			echo '<label for="difficultylavel_id'.$idd.'">Difficulty Level</label>';
			echo '<span id="difficultylavel_msg'.$idd.'" style="color: red"></span>';
			echo '<select class="form-control input-sm" id="difficultylavel_id'.$idd.'">';
			echo "<option value=''>-- Select --</option>";
			foreach ($difficulty_level as $d_level) {
				$deactive=""; $style=""; if ($d_level->status==0) { $deactive=" ( Not Actived )"; $style="style='color:red'"; }
				echo "<option value='".$d_level->id."' ".$style.">";
	            echo $d_level->section.$deactive;
	            echo "</option>";
			}
			echo "</select>";
		}
		
	}

	function get_question_papers($test_date)
	{	
		$this->check_session();
		$this->db->order_by('test_date','desc');
		$this->db->order_by('paper_title','asc');
		$QuestionPapers = $this->main_model->get('question_paper_master', array('test_date' => $test_date ));
		echo "<option value=''>-- Select --</option>";
		foreach ($QuestionPapers as $q_paper) {
		echo "<option value='".$q_paper->id."' >";
		echo $q_paper->paper_title;
		echo "</option>";
		}
	}
	
	// questions

	// Students Answer
	function manage_students_answer($id=0)
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			if($id==0){
				$post_data=$this->input->post();
				$post_data['class']=$post_data['stuCLASS']; unset($post_data['stuCLASS']);
				$check = array('test_date' => $post_data['test_date'],
							   'paper_category'=>$post_data['paper_category'],
							   'student_id'=>$post_data['student_id'],
							   'question_id'=>$post_data['question_id'] );

				$data=$this->main_model->get('students_ans',$check);
				
				if (count($data)==0){
					if($this->main_model->add_data('students_ans',$post_data)){
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
				
				if($this->main_model->update_data('students_ans',$post_data,$id)){
					echo 0;
				}
				else{
					echo 2;
				}
					
			}
			die();
		}
		$data['user']=$this->session->userdata('username');
	    $r=$this->session->userdata('role_id');
	    $data['role']=$this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
	    $data['paper_category'] = $this->main_model->get('paper_category');
	    $this->db->order_by('section','asc');
	    $data['difficulty_lavel'] = $this->main_model->get('difficulty_level_master');
	    $data['QuestionTopics'] = $this->main_model->get('question_topics_master');
	    $this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/students_ans_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_students_answer_table($paper_category,$stuCLASS,$student_id,$test_date)
	{
		// echo $paper_category.','.$stuCLASS.','.$student_id.','.$test_date;
		// die();
		$this->check_session();
		$data['paper_category'] = $this->main_model->get('paper_category');
	    $this->db->order_by('question_id','asc');
	    $data['question_master'] = $this->main_model->get('question_master', array('test_date' => $test_date,'paper_category' => $paper_category  ));
	    $this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	     $this->db->order_by('test_date','desc');
		$this->db->order_by('paper_title','asc');
		$data['QuestionPapers'] = $this->main_model->get('question_paper_master', array('test_date' => $test_date ));
	    $ans_filter = array(
	    				'paper_category'=>$paper_category,
	    				'class'=>$stuCLASS,
	    				'student_id'=>$student_id,
	    				'test_date' => $test_date);
	    $this->db->order_by('question_id','asc');
	    $data['students_ans'] = $this->main_model->get('students_ans',$ans_filter);
	    $data['allStudents'] = $this->main_model->get('admission', array('admission_test_date' => $test_date,'deleted'=>0));
	    $this->load->view('admin/ResultReportMaster/students_ans_table_reload',$data);
	}

	function get_question($paper_category,$test_date,$question_paper,$stuCLASS)
	{	
		$this->check_session();
		// echo "<option value=''>-- ".$paper_category." --</option>"; die();
	    $this->db->order_by('question_id','asc');
	    $question_master = $this->main_model->get('question_master', array('test_date' => $test_date,'paper_category' => $paper_category,'question_paper'=>$question_paper,'class'=>$stuCLASS  ));
		echo "<option value=''>-- Select --</option>";
		foreach ($question_master as $question) {
			
			echo "<option value='".$question->id."' >";
            echo $question->question_id;
            echo "</option>";
		}
	}

	function get_question_correct_asn($question_id)
	{	
		$this->check_session();
	    $question = $this->main_model->get('question_master', array('id' => $question_id))[0];
		echo $question->correct_ans;
	}

	function get_students($stuCLASS,$test_date)
	{	
		$this->check_session();
	    $students = $this->main_model->get('admission', array('program_code' => $stuCLASS,'admission_test_date' => $test_date,'deleted'=>0));
		echo "<option value=''>-- Select --</option>";
		foreach ($students as $stu) {
			echo "<option value='".$stu->id."' >";
            echo $stu->registration_no.' ( '.$stu->student_name.' )';
            echo "</option>";
		}
	}

	function delete_students_answer($id)
	{
		$this->check_session();
		if($this->main_model->dalete_data('students_ans',$id)){
			echo 0;
		}
		else{
			echo 2;
		}
	}
	

	// Students Answer


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
	    $this->load->view('admin/ResultReportMaster/batch_list',$data);
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
	    $this->load->view('admin/ResultReportMaster/batch_table_reload',$data);
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

	// copy test question
	function copy_test_question()
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			
				$post_data=$this->input->post();
				$data9  = array();
				$data10 = array();
				$data11 = array();
				$data12 = array();
				$data13 = array();
				// class 9
				if ($post_data['class9']!='NA') {
					$check = array('test_date' => $post_data['test_date_from'],'question_paper'=>$post_data['question_paper_from'],'class'=>9 );
					$data9=$this->main_model->get('question_master',$check);

					$this->main_model->daleteData('question_master',array('test_date' => $post_data['test_date_to'],'question_paper'=>$post_data['question_paper_to'],'class'=>9));
					
					foreach ($data9 as $row) {
						$questions9['test_date']=$post_data['test_date_to'];
						$questions9['paper_category']=$row->paper_category;
						$questions9['question_paper']=$post_data['question_paper_to'];
						$questions9['class']=9;
						$questions9['topic_id']=$row->topic_id;
						$questions9['difficultylavel_id']=$row->difficultylavel_id;
						$questions9['question_id']=$row->question_id;
						$questions9['correct_ans']=$row->correct_ans;
						$questions9['concept']=$row->concept;
						$question9[]=$questions9;
					}

					foreach ($question9 as $q9) {
						$this->main_model->add_data('question_master',$q9);
					}
				}
				reset($check);
				// class 9
				// class 10

				if ($post_data['class10']!='NA') {
					$check = array('test_date' => $post_data['test_date_from'],'question_paper'=>$post_data['question_paper_from'],'class'=>10 );
					$data10=$this->main_model->get('question_master',$check);

					$this->main_model->daleteData('question_master',array('test_date' => $post_data['test_date_to'],'question_paper'=>$post_data['question_paper_to'],'class'=>10));

					foreach ($data10 as $row) {
						$questions10['test_date']=$post_data['test_date_to'];
						$questions10['paper_category']=$row->paper_category;
						$questions10['question_paper']=$post_data['question_paper_to'];
						$questions10['class']=10;
						$questions10['topic_id']=$row->topic_id;
						$questions10['difficultylavel_id']=$row->difficultylavel_id;
						$questions10['question_id']=$row->question_id;
						$questions10['correct_ans']=$row->correct_ans;
						$questions10['concept']=$row->concept;
						$question10[]=$questions10;
					}

					foreach ($question10 as $q10) {
						$this->main_model->add_data('question_master',$q10);
					}
				}
				reset($check);
				// class 10
				// class 11

				if ($post_data['class11']!='NA') {
					$check = array('test_date' => $post_data['test_date_from'],'question_paper'=>$post_data['question_paper_from'],'class'=>11 );
					$data11=$this->main_model->get('question_master',$check);

					$this->main_model->daleteData('question_master',array('test_date' => $post_data['test_date_to'],'question_paper'=>$post_data['question_paper_to'],'class'=>11));

					foreach ($data11 as $row) {
						$questions11['test_date']=$post_data['test_date_to'];
						$questions11['paper_category']=$row->paper_category;
						$questions11['question_paper']=$post_data['question_paper_to'];
						$questions11['class']=11;
						$questions11['topic_id']=$row->topic_id;
						$questions11['difficultylavel_id']=$row->difficultylavel_id;
						$questions11['question_id']=$row->question_id;
						$questions11['correct_ans']=$row->correct_ans;
						$questions11['concept']=$row->concept;
						$question11[]=$questions11;
					}

					foreach ($question11 as $q11) {
						$this->main_model->add_data('question_master',$q11);
					}
				}
				reset($check);
				// class 11

				// class 12

				if ($post_data['class12']!='NA') {
					$check = array('test_date' => $post_data['test_date_from'],'question_paper'=>$post_data['question_paper_from'],'class'=>12 );
					$data12=$this->main_model->get('question_master',$check);

					$this->main_model->daleteData('question_master',array('test_date' => $post_data['test_date_to'],'question_paper'=>$post_data['question_paper_to'],'class'=>12));

					foreach ($data12 as $row) {
						$questions12['test_date']=$post_data['test_date_to'];
						$questions12['paper_category']=$row->paper_category;
						$questions12['question_paper']=$post_data['question_paper_to'];
						$questions12['class']=12;
						$questions12['topic_id']=$row->topic_id;
						$questions12['difficultylavel_id']=$row->difficultylavel_id;
						$questions12['question_id']=$row->question_id;
						$questions12['correct_ans']=$row->correct_ans;
						$questions12['concept']=$row->concept;
						$question12[]=$questions12;
					}

					foreach ($question12 as $q12) {
						$this->main_model->add_data('question_master',$q12);
					}
				}
				reset($check);
				// class 12
				// class 13

				if ($post_data['class13']!='NA') {
					$check = array('test_date' => $post_data['test_date_from'],'question_paper'=>$post_data['question_paper_from'],'class'=>13 );
					$data13=$this->main_model->get('question_master',$check);

					$this->main_model->daleteData('question_master',array('test_date' => $post_data['test_date_to'],'question_paper'=>$post_data['question_paper_to'],'class'=>13));

					foreach ($data13 as $row) {
						$questions13['test_date']=$post_data['test_date_to'];
						$questions13['paper_category']=$row->paper_category;
						$questions13['question_paper']=$post_data['question_paper_to'];
						$questions13['class']=13;
						$questions13['topic_id']=$row->topic_id;
						$questions13['difficultylavel_id']=$row->difficultylavel_id;
						$questions13['question_id']=$row->question_id;
						$questions13['correct_ans']=$row->correct_ans;
						$questions13['concept']=$row->concept;
						$question13[]=$questions13;
					}

					foreach ($question13 as $q13) {
						$this->main_model->add_data('question_master',$q13);
					}
				}
				reset($check);
				// class 13
			echo "Done";	
				
		
			die();
		}
		$data['user']=$this->session->userdata('username');
	    $r=$this->session->userdata('role_id');
	    $data['role']=$this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
	    $this->db->order_by('test_date','desc');
	    $this->db->limit(10);
	    $data['tests'] = $this->main_model->get('test');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/ResultReportMaster/copy_test_questions',$data);
	    $this->load->view('admin/footer');
	}

	public function insert_blank_students_answers()
	{
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {
			
				$post_data=$this->input->post();

				$this->main_model->get('admission',array('fee_pay_status' => 1,'program_code'=>9,'admission_test_date'=>$post_data['test_date'],'deleted'=>0 ));
			// class 9
			if ($post_data['class9']!='NA') {
					$check = array('test_date' => $post_data['test_date'],'class'=>9 );
					$data9=$this->main_model->get('question_master',$check);

					$students9=$this->main_model->get('admission',
									  array('fee_pay_status' => 1,
											'program_code'=>9,
											'admission_test_date'=>$post_data['test_date'],
											'deleted'=>0 ));
					// echo "<pre>"; print_r($students9); echo "</pre>";
					$this->main_model->daleteData('students_ans',array('test_date' => $post_data['test_date'],'class'=>9));
					foreach ($data9 as $row) {
						foreach ($students9 as $stu9) {
							$answers9['test_date']=$post_data['test_date'];
							$answers9['paper_category']=$row->paper_category;
							$answers9['question_paper']=$row->question_paper;
							$answers9['student_id']=$stu9->id;
							$answers9['class']=9;
							$answers9['question_id']=$row->id;
							$answer9[]=$answers9;
						}
					}

					foreach ($answer9 as $ans9) {
						$this->main_model->add_data('students_ans',$ans9);
					}
				}
				reset($check);
			// class 9
			// class 10

				if ($post_data['class10']!='NA') {
					$check = array('test_date' => $post_data['test_date'],'class'=>10 );
					$data10=$this->main_model->get('question_master',$check);

					$students10=$this->main_model->get('admission',
									  array('fee_pay_status' => 1,
											'program_code'=>10,
											'admission_test_date'=>$post_data['test_date'],
											'deleted'=>0 ));
					// echo "<pre>"; print_r($students9); echo "</pre>";
					$this->main_model->daleteData('students_ans',array('test_date' => $post_data['test_date'],'class'=>10));
					foreach ($data10 as $row) {
						foreach ($students10 as $stu10) {
							$answers10['test_date']=$post_data['test_date'];
							$answers10['paper_category']=$row->paper_category;
							$answers10['question_paper']=$row->question_paper;
							$answers10['student_id']=$stu10->id;
							$answers10['class']=10;
							$answers10['question_id']=$row->id;
							$answer10[]=$answers10;
						}
					}

					foreach ($answer10 as $ans10) {
						$this->main_model->add_data('students_ans',$ans10);
					}
				}
				reset($check);
			// class 10
			// class 11

				if ($post_data['class11']!='NA') {
					$check = array('test_date' => $post_data['test_date'],'class'=>11 );
					$data11=$this->main_model->get('question_master',$check);

					$students11=$this->main_model->get('admission',
									  array('fee_pay_status' => 1,
											'program_code'=>11,
											'admission_test_date'=>$post_data['test_date'],
											'deleted'=>0 ));
					// echo "<pre>"; print_r($students11); echo "</pre>";
					$this->main_model->daleteData('students_ans',array('test_date' => $post_data['test_date'],'class'=>11));
					foreach ($data11 as $row) {
						foreach ($students11 as $stu11) {
							$answers11['test_date']=$post_data['test_date'];
							$answers11['paper_category']=$row->paper_category;
							$answers11['question_paper']=$row->question_paper;
							$answers11['student_id']=$stu11->id;
							$answers11['class']=11;
							$answers11['question_id']=$row->id;
							$answer11[]=$answers11;
						}
					}

					foreach ($answer11 as $ans11) {
						$this->main_model->add_data('students_ans',$ans11);
					}
				}
				reset($check);
			// class 11
			// class 12

				if ($post_data['class12']!='NA') {
					$check = array('test_date' => $post_data['test_date'],'class'=>12 );
					$data12=$this->main_model->get('question_master',$check);

					$students12=$this->main_model->get('admission',
									  array('fee_pay_status' => 1,
											'program_code'=>12,
											'admission_test_date'=>$post_data['test_date'],
											'deleted'=>0 ));
					// echo "<pre>"; print_r($students12); echo "</pre>";
					$this->main_model->daleteData('students_ans',array('test_date' => $post_data['test_date'],'class'=>12));
					foreach ($data12 as $row) {
						foreach ($students12 as $stu12) {
							$answers12['test_date']=$post_data['test_date'];
							$answers12['paper_category']=$row->paper_category;
							$answers12['question_paper']=$row->question_paper;
							$answers12['student_id']=$stu12->id;
							$answers12['class']=12;
							$answers12['question_id']=$row->id;
							$answer12[]=$answers12;
						}
					}

					foreach ($answer12 as $ans12) {
						$this->main_model->add_data('students_ans',$ans12);
					}
				}
				reset($check);
			// class 12
			// class 13

				if ($post_data['class13']!='NA') {
					$check = array('test_date' => $post_data['test_date'],'class'=>13 );
					$data13=$this->main_model->get('question_master',$check);

					$students13=$this->main_model->get('admission',
									  array('fee_pay_status' => 1,
											'program_code'=>13,
											'admission_test_date'=>$post_data['test_date'],
											'deleted'=>0 ));
					// echo "<pre>"; print_r($students13); echo "</pre>";
					$this->main_model->daleteData('students_ans',array('test_date' => $post_data['test_date'],'class'=>13));
					foreach ($data13 as $row) {
						foreach ($students13 as $stu13) {
							$answers13['test_date']=$post_data['test_date'];
							$answers13['paper_category']=$row->paper_category;
							$answers13['question_paper']=$row->question_paper;
							$answers13['student_id']=$stu13->id;
							$answers13['class']=13;
							$answers13['question_id']=$row->id;
							$answer13[]=$answers13;
						}
					}

					foreach ($answer13 as $ans13) {
						$this->main_model->add_data('students_ans',$ans13);
					}
				}
				reset($check);
			// class 13
			
			echo "Done";	
				
		}
	}
	// copy test question


}