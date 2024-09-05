<?php

/**
 * Result Master
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Result_master extends Main_controller
{
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

// ********* Result *************
public function list_results($test_id=0)
{
	if($this->session->userdata('username'))
	   	{
	   		if ($test_id!=0) 
			{
				$data['result'] = $this->admin_model->get_data_multi_column('results',
												   array('test_id'=>$test_id));
				// echo "<pre>"; print_r($data['result']->result()); echo "</pre>"; die();
			}
			else
			{
				$data['result']=$this->admin_model->get_data('results');
				// echo "<pre>"; print_r($data['result'])->result(); echo "</pre>"; die();
			}
			$data['test_id']=$test_id;
	   	 	$data['all_test']=$this->admin_model->get_data('test');
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
			$data['role'] = $this->main_model->get_data_id('manage_role',$r);
			$data['menu'] = $this->main_model->get_menu();
			$data['sub_menu'] = $this->main_model->get_sub_menu();
	      	$this->load->view('admin/header',$data);
		  	$this->load->view('admin/results/list',$data);
		  	$this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}

public function update_admission_window_date()
{
	$post_data = $this->input->post();
	if($this->main_model->update_data('admission_window_date',$post_data,1))
	{
		echo'Updates Successfully.';
	}
	else
	{
		echo'Some error occured.';
	}
}

public function add_result1()
{
	if($this->session->userdata('username'))
	   	{

	   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	    {

	   	  	$post_data = $this->input->post();
	   	  	$data = array('stu_reg_number' => $post_data['stu_reg_number']);
				$query=$this->admin_model->get_data_multi_column('results',$data);
				if($query->num_rows()>0)
				{
					$this->session->set_flashdata('error','Result Already Exists.');
		   	  		redirect('result_master/add_result');
				}
				
			
			//  echo "<pre>";
			//  print_r($post_data);
			// die();
	   	  		if($this->admin_model->add_data($table_name='results',$post_data))
		   	  	{
		   	  		$this->session->set_flashdata('success','Added Successfully.');
		   	  		redirect('result_master/list_results');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect('result_master/list_results');
		   	  	}   	
	   	    }
	   	    $data['test']=$this->admin_model->get_data('test');
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	      	$this->load->view('admin/header',$data);
		  	$this->load->view('admin/results/add',$data);
		  	$this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}

public function check_reg()
{
	$reg = $this->input->post('reg_number');
	$data = array('stu_reg_number' => $reg);
    $query=$this->admin_model->get_data_multi_column('results',$data);
	if($query->num_rows()>0)
	{
		echo "0";
	}
	else
	{
		echo "1";
	}
}

public function update_result($id)
{
	if($this->session->userdata('username'))
   	{

   		if($this->input->server('REQUEST_METHOD')=='POST')
   	    {
   	  	$post_data = $this->input->post();
		// $pro=implode(',',$this->input->post('program_offered'));	
		// $post_data['program_offered']=$pro;
		// echo $id;
		//  echo "<pre>";
		//  print_r($post_data);
		// die();
   	  		if($this->admin_model->update_data($table_name='results',$post_data,$id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  		redirect('result_master/list_results');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('erorr','Some error occured.');
	   	  		redirect('result_master/update_result/'.$id);
	   	  	}   	
   	    }
   	    $data['test']=$this->admin_model->get_data('test');
   		$data['user']=$this->session->userdata('username');
   		$data['result']=$this->admin_model->get_data_by_id('results',$id);
   		$r=$this->session->userdata('role_id');
	    $data['role']=$this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
   		// echo "<pre>";
   		// print_r($data['result']);
   		// die();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/results/edit',$data);
	  	$this->load->view('admin/footer');
   	}
   	else
   	{
   		redirect('admin/index');
   	}
}

public function result_detail($id)
{
	if($this->session->userdata('username'))
	   	{
	   		$data['result']=$this->admin_model->get_result_detail($id);
	   		$test_id=$data['result']->test_id;

	   		$data['test']=$this->admin_model->get_data_by_id('test',$test_id);
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	        $data['role']=$this->main_model->get_data_id('manage_role',$r);
		    $data['menu'] = $this->main_model->get_menu();
		    $data['sub_menu'] = $this->main_model->get_sub_menu();
	   		// echo "<pre>";
	   		// print_r($data['test']);
	   		// echo "<pre>";
	   		// print_r($data['result']);
	   		// $this->load->view('admin/header',$data);
		  	$this->load->view('admin/results/detail',$data);
		  	// $this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}

public function filter_by_test($id='')
{
	$data['active_test']=$active_test=$this->admin_model->get_data_by_id('test',$id);

	$test_id=$active_test->id;
	$data['result']=$this->admin_model->get_results($test_id);
	// $data['result']=$this->admin_model->get_results($id);
	// echo "<pre>";
	// print_r($data['active_test']);
	// echo "<pre>";
	// print_r($data['result']->result());
	if ($data['result']->num_rows()==0) 
	{
		echo "<tr class=''>";
		echo "<div>Record not found !</div>";
		echo "</tr>";
	}
	else
	{
		$this->load->view('admin/results/filter_by_test',$data);	
	}
	
	

}




public function marks($id)
{
	echo $id;
	$data['stu']=$stu=$this->admin_model->get_data_by_id('admission',$id);

	// echo "<pre>"; print_r($stu);

	$d1=array('stu_reg_number' => $stu->registration_no);

	$data['result']=$this->admin_model->get_data_multi_column('results',$d1);

	$d2=array('test_date'=> $stu->admission_test_date);

	$data['test']= $test =$this->admin_model->get_data_multi_column('test',$d2)->row();

	$d3=array('class' => $stu->program_code,
			  'test_id' => $test->id);

	$data['test_marks']=$this->admin_model->get_data_multi_column('test_marks',$d3)->row();
	// echo "<pre>"; print_r($result->result());

	$this->load->view('admin/results/marks',$data);

}

// ********* Result *************


public function upload_file()
	{	

	        if(is_uploaded_file($_FILES['file']['tmp_name']))
	        {
	            //open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	           
	            // skip first line
	            // if your csv file have no heading, just comment the next line
	            fgetcsv($csvFile);
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE)
	            {
	                //check whether member already exists in database with same email
	                $result = $this->db->get_where("results", array("stu_reg_number"=>$line[0]))->result();

	                if(count($result) > 0)
	                {
	                    //update member data
	                    $this->db->update("results", 
	                    			array("student_name"=>$line[1],
	                    				"valid_upto"=>$line[2], 
	                    				"waiver_offered"=>$line[3], 
	                    				"program_offered"=>$line[4]),
	                    			array("stu_reg_number"=>$line[0]));
	                }
	                else
	                {
	                    //insert member data into database
	                    $this->db->insert("results", 
	                    			array("stu_reg_number"=>$line[0],
	                    				"student_name"=>$line[1],
	                    				"valid_upto"=>$line[2], 
	                    				"waiver_offered"=>$line[3], 
	                    				"program_offered"=>$line[4]
	                    				));
	                }
	            }
	            
	            // close opened csv file
	            fclose($csvFile);
	            $this->session->set_flashdata('success','Success.');
	            unset($_FILES['file']['tmp_name']);
	        }else{
	          
	            $this->session->set_flashdata('success','! Error');
	        }
	   redirect('result_master/list_results');
	}


public function generate_result($id)
	{
	if($this->session->userdata('username'))
   	{
		$student=$this->admin_model->get_data_by_id('admission',$id);
		$reg=array('stu_reg_number' => $student->registration_no);
        $result=$this->admin_model->get_data_multi_column('results',$reg)->row();
    	$res=count($result);
		?>

		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$student->student_name?></h4>
        </div>
        <div class="modal-body" >
        	<form action="<?=base_url()?>result_master/add_result/<?=$id?>" method="post" >
        		<div class="form-group">
                    <label>Mat Marks</label><span style="color:red">*</span>
                    <input class="form-control" name="marks_mat" required="" id="	marks_mat" style="width:25% " value="<?=$result->marks_mat?>" >
                    <p class="help-block"></p>
                </div>

				<h4>
				    Marks of Science<span style="color:red;">*</span>
				    <span id="errmsg" style="color: red;font-weight: bold"></span>
				</h4>
				    <table class="table table-striped table-bordered table-hover">
				        <thead>
				            <tr>
				                <th>Physics</th>
				                <th>Chemistry</th>
				                <th>Math</th>
				                <th>Total Marks of Science</th>
				            </tr>
				        </thead>
				        <tbody>
				            <tr>
				                <td>
				                    <input type="text" id="marks_sat_physics" class="form-control" name="marks_sat_physics" required onkeyup="count_total()" value="<?=$result->marks_sat_physics?>">
				                </td>
				                <td>
				                    <input type="text" id="marks_sat_chemistry" class="form-control" name="marks_sat_chemistry" required onkeyup="count_total()" value="<?=$result->marks_sat_chemistry?>">
				                </td>
				                <td>
				                    <input type="text" id="marks_sat_math" class="form-control" name="marks_sat_math" required onkeyup="count_total()" value="<?=$result->marks_sat_math?>">
				                </td>
				                <td>
				                    <input readonly type="text" id="marks_sat" class="form-control" name="marks_sat" value="<?=$result->marks_sat?>" >
				                </td>
				            </tr>
				        </tbody>
				    </table>

				<div class="form-group" style="float: left;">
                    <label>Valid Upto</label><span style="color:red">*</span>
                    <input type="date" class="form-control" name="valid_upto" required="" id="valid_upto" style="width:100% " value="<?=$result->valid_upto?>" >
                    <p class="help-block"></p>
                </div>

                <div class="form-group" style="float: left;">
                    <label>Waiver Offered</label><span style="color:red">*</span>
                    <input type="text" class="form-control" name="waiver_offered" required="" id="waiver_offered" style="width:100% " value="<?=$result->waiver_offered?>" >
                    <p class="help-block"></p>
                </div>

                <div class="form-group" style="float: left;">
                    <label>program_offered</label><span style="color:red">*</span>
                    <input type="text" class="form-control" name="program_offered" required="" id="program_offered" style="width:100% " value="<?=$result->program_offered?>" >
                    <p class="help-block"></p>
                </div>
        		 <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr>
                    <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
                  <?php if ($res>0){ ?>
                    <button type="submit" class="btn btn-default">Update</button>
                    <?php } else { ?>
                    	<button type="submit" class="btn btn-default">Save</button>
                    <?php } ?>
                </div>
        	</form>
        </div>
        <button type="button" class="btn btn-default"  data-dismiss="modal" hidden="">  </button>
        <button type="button" class="btn btn-default"  data-dismiss="modal" hidden="">  </button>
        
            <!--  <a href="<?=base_url()?>index.php/admin/edit_achievement/<?=$row->id?>" class="btn btn-warning" title="EDIT">
                                                        <i class="fa fa-edit"></i>
                                                    </a> -->
            
            <script type="text/javascript">
            	
				function count_total() 
				    {
				        // alert(clas);
				        let phy = $("#marks_sat_physics").val();
				        let che = $("#marks_sat_chemistry").val();
				        let math = $("#marks_sat_math").val();
				        var total = Number(phy)+Number(che)+Number(math);
				       
				        $("#marks_sat").val(total);
				    } 

				    $(document).ready(function () {

				  $("#marks_sat_physics,#marks_sat_chemistry,#marks_sat_math,#marks_mat").keypress(function (e) {
				    
				     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				      
				        $("#errmsg").html(" <i class='fa fa-times' aria-hidden='true'></i> Digits Only").show().fadeOut(1500);
				               return false;
				    }
				   });
				});

            </script>
       
<?php	
	}
   	else
   	{
   		redirect('admin/index');
   	}
	} 


	public function add_result($id)
	{
	  if($this->session->userdata('username'))
   	  {
		$student=$this->admin_model->get_data_by_id('admission',$id);
		// check result exists
		$reg=array('stu_reg_number' => $student->registration_no);
		$result=$this->admin_model->get_data_multi_column('results',$reg)->row();
		$res=count($result);
		// if result exists then update result
		if ($res>0)
		{
			$post_data = $this->input->post();
			if($this->admin_model->update_data($table_name='results',$post_data,$result->id))
		   	  	{
		   	  		$this->session->set_flashdata('success','Result Updated Successfully.');
		   	  		redirect('admin/registration_list');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect('admin/registration_list');
		   	  	} 
		}
		// if result not exists then insert result
		else
		{
			$d2=array('test_date'=> $student->admission_test_date);
			$test =$this->admin_model->get_data_multi_column('test',$d2)->row();
			$post_data = $this->input->post();

			$result['test_id']=$test->id;
			$result['stu_reg_number']= $student->registration_no;
			$result['student_name']= $student->student_name;
			$result['father_name']= $student->father_name;
			$result['mother_name']= $student->mother_name;
			$result['present_class']= $student->present_class;
			$result['dob']= $student->dob;
			$result['stu_class']= $student->program_code;
			$result['marks_mat']= $post_data['marks_mat'];
			$result['marks_sat_physics']= $post_data['marks_sat_physics'];
			$result['marks_sat_chemistry']= $post_data['marks_sat_chemistry'];
			$result['marks_sat_math']= $post_data['marks_sat_math'];
			$result['marks_sat']= $post_data['marks_sat'];
			$result['valid_upto']= $post_data['valid_upto'];
			$result['waiver_offered']= $post_data['waiver_offered'];
			$result['program_offered']= $post_data['program_offered'];

			if($this->admin_model->add_data($table_name='results',$result))
		  	{
		  		$this->session->set_flashdata('success','Result Generated Successfully.');
		  		redirect('admin/registration_list');
		  	}
		  	else
		  	{
		  		$this->session->set_flashdata('erorr','Some error occured.');
		  		redirect('admin/registration_list');
		  	}  
		}   
	 }
   	 else
   	 {
   		redirect('admin/index');
   	 }
	}


	function delete_reg_res($id)
	{
	if($this->session->userdata('username'))
	   	{

	   	$student=$this->admin_model->get_data_by_id('admission',$id);
		// check result exists
		$reg=array('stu_reg_number' => $student->registration_no);
		$result=$this->admin_model->get_data_multi_column('results',$reg)->row();
		$res=count($result);
		echo "<div class='text-center' style='height:200px;' >";
		echo "<form action='".base_url()."result_master/delete' method='post'>";
		if ($res>0)
		{ 
			echo "<br>";
			echo'<input type="checkbox" name="del_res" value="'.$result->id.'"> Result';
		 }
		 echo "<br>";
		 echo'<input type="checkbox" name="del_reg" value="'.$id.'"> Registration';
		 echo "<br><br>";
		 echo'<input type="submit" class="btn btn-danger" value="Delete">';

		 echo "</form>";
		 echo "</div>";
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
	}

	function delete()
	{
	if($this->session->userdata('username'))
	   	{
	   		$d=0;
	   		$post_data=$this->input->post();
	   		
	   		if ($post_data['del_reg']) 
	   		{
	   			$reg_id= $post_data['del_reg'];
	   			$data = array('deleted' => 1,'mobile_no'=>'' );
	   			if($this->admin_model->update_data('admission',$data,$reg_id))
				   	{ $d=1;	}
	   		}
	   		else{ }
	   		if ($post_data['del_res']) 
	   		{
	   			$res_id= $post_data['del_res'];
	   			if($this->admin_model->dalete_data($table_name='results',$res_id))
				   	{ $d=1; }
	   		}
	   		else{ }
	  		if($d==1)
		   	{
		   	  	$this->session->set_flashdata('success','Deleted Successfully.');
		   	  	redirect('admin/registration_list');
		   	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('erorr','Some error occured.');
	   	  		redirect('admin/registration_list');
	   	  	}
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
	}
	// ********* Result pdf *************
	function result_pdf_list()
	{
		$this->check_session();
		$data['result_pdf']=$this->main_model->get_data('results_pdf');
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/results_pdf/list',$data);
	  	$this->load->view('admin/footer');
	}

	function result_pdf_add()
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$post_data['batch_name'] = str_replace(" ", "-", $post_data['batch_name']);
			$target_dir = "uploads/";
			$file = explode(".",$_FILES['file']["name"]);
			$extension = end($file);
			$file_name_full = 'result'.$post_data['class'].time().'.'.$extension;
			$target_file = $target_dir . basename($file_name_full);
			move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
			$post_data['link']=$target_dir.$file_name_full;

			$q = $this->main_model->add_data('results_pdf',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('result_master/result_pdf_add');
		}
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/results_pdf/add',$data);
	  	$this->load->view('admin/footer');
	}

	function result_pdf_update($id)
	{
		$this->check_session();
		// $this->check_developer();
		$result_pdf=$this->main_model->get_data_id('results_pdf',$id);
		$data['result_pdf']=$result_pdf;
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();

			$post_data['batch_name'] = str_replace(" ", "-", $post_data['batch_name']);
			if(@$_FILES['file']['name']!="")
	   	  	{
	   	  		unlink($result_pdf->link);
				$target_dir = "uploads/";
				$file = explode(".",$_FILES['file']["name"]);
				$extension = end($file);
				$file_name_full = 'result'.$post_data['class'].time().'.'.$extension;
				$target_file = $target_dir . basename($file_name_full);
				move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
				$post_data['link']=$target_dir.$file_name_full;
			}

			$q = $this->main_model->update_data('results_pdf',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updated Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('result_master/result_pdf_update/'.$id);
		}
		$data['result_pdf']=$this->main_model->get_data_id('results_pdf',$id);
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/results_pdf/edit',$data);
	  	$this->load->view('admin/footer');
	}

	function result_pdf_delete($id)
	{
		$this->check_session();
		$result_pdf=$this->main_model->get_data_id('results_pdf',$id);
		$q = $this->main_model->dalete_data('results_pdf',$id);
		if($q!=0)
		{
			unlink($result_pdf->link);
			$this->session->set_flashdata('success','Deleted Successfully.');
		}
		else
		{
			$this->session->set_flashdata('error','Some error occured.');
		}
		redirect('result_master/result_pdf_list');
		
	}
	// ********* Result pdf *************


	// ********* Answer key *************
	function answer_key_list()
	{
		$this->check_session();
		$data['result_pdf']=$this->main_model->get_data('answer_key');
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/answer_key/list',$data);
	  	$this->load->view('admin/footer');
	}

	function answer_key_add()
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$post_data['batch_name'] = str_replace(" ", "-", $post_data['batch_name']);
			$target_dir = "uploads/";
			$file = explode(".",$_FILES['file']["name"]);
			$extension = end($file);
			$file_name_full = 'Hints-Solutions-'.$post_data['class'].time().'.'.$extension;
			$target_file = $target_dir . basename($file_name_full);
			move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
			$post_data['link']=$target_dir.$file_name_full;

			$q = $this->main_model->add_data('answer_key',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('result_master/answer_key_add');
		}
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/answer_key/add',$data);
	  	$this->load->view('admin/footer');
	}

	function answer_key_update($id)
	{
		$this->check_session();
		// $this->check_developer();
		$answer_key=$this->main_model->get_data_id('answer_key',$id);
		$data['answer_key']=$answer_key;
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();

			$post_data['batch_name'] = str_replace(" ", "-", $post_data['batch_name']);
			if(@$_FILES['file']['name']!="")
	   	  	{
	   	  		unlink($result_pdf->link);
				$target_dir = "uploads/";
				$file = explode(".",$_FILES['file']["name"]);
				$extension = end($file);
				$file_name_full = 'Hints-Solutions-'.$post_data['class'].time().'.'.$extension;
				$target_file = $target_dir . basename($file_name_full);
				move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
				$post_data['link']=$target_dir.$file_name_full;
			}

			$q = $this->main_model->update_data('answer_key',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updated Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('result_master/answer_key_update/'.$id);
		}
		$data['result_pdf']=$this->main_model->get_data_id('answer_key',$id);
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/answer_key/edit',$data);
	  	$this->load->view('admin/footer');
	}

	function answer_key_delete($id)
	{
		$this->check_session();
		$result_pdf=$this->main_model->get_data_id('answer_key',$id);
		$q = $this->main_model->dalete_data('answer_key',$id);
		if($q!=0)
		{
			unlink($result_pdf->link);
			$this->session->set_flashdata('success','Deleted Successfully.');
		}
		else
		{
			$this->session->set_flashdata('error','Some error occured.');
		}
		redirect('result_master/answer_key_list');
		
	}
	// ********* Answer key *************

		// ********* PRACTICE-TEST *************
	function practice_test_list()
	{
		$this->check_session();
		$data['result_pdf']=$this->main_model->get_data('practice_test');
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/practice_test/list',$data);
	  	$this->load->view('admin/footer');
	}

	function practice_test_add()
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$post_data['batch_name'] = str_replace(" ", "-", $post_data['batch_name']);
			$target_dir = "uploads/Practice_test/";
			$file = explode(".",$_FILES['file']["name"]);
			$extension = end($file);
			$file_name_full = $post_data['batch_name'].'-'.$post_data['class'].time().'.'.$extension;
			$target_file = $target_dir . basename($file_name_full);
			move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
			$post_data['link']=$target_dir.$file_name_full;

			$q = $this->main_model->add_data('practice_test',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			// die();
			redirect('result_master/practice_test_add');
		}
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/practice_test/add',$data);
	  	$this->load->view('admin/footer');
	}

	function practice_test_update($id)
	{
		$this->check_session();
		// $this->check_developer();
		$answer_key=$this->main_model->get_data_id('practice_test',$id);
		$data['answer_key']=$answer_key;
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();

			$post_data['batch_name'] = str_replace(" ", "-", $post_data['batch_name']);
			if(@$_FILES['file']['name']!="")
	   	  	{
	   	  		unlink($result_pdf->link);
				$target_dir = "uploads/Practice_test/";
				$file = explode(".",$_FILES['file']["name"]);
				$extension = end($file);
				$file_name_full = $post_data['batch_name'].'-'.$post_data['class'].time().'.'.$extension;
				$target_file = $target_dir . basename($file_name_full);
				move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
				$post_data['link']=$target_dir.$file_name_full;
			}

			$q = $this->main_model->update_data('practice_test',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updated Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('result_master/practice_test_update/'.$id);
		}
		$data['result_pdf']=$this->main_model->get_data_id('practice_test',$id);
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/practice_test/edit',$data);
	  	$this->load->view('admin/footer');
	}

	function practice_test_delete($id)
	{
		$this->check_session();
		$result_pdf=$this->main_model->get_data_id('practice_test',$id);
		$q = $this->main_model->dalete_data('practice_test',$id);
		if($q!=0)
		{
			unlink($result_pdf->link);
			$this->session->set_flashdata('success','Deleted Successfully.');
		}
		else
		{
			$this->session->set_flashdata('error','Some error occured.');
		}
		redirect('result_master/practice_test_list');
		
	}
	// ********* PRACTICE-TEST *************


	// ********* study_package *************
	function study_package_list()
	{
		$this->check_session();
		$data['study_package']=$this->main_model->get_data('study_package');
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/study_package/list',$data);
	  	$this->load->view('admin/footer');
	}

	function study_package_add()
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$batch = str_replace(" ", "-", $post_data['batch']);
			$sub = str_replace(" ", "-", $post_data['subject']);
			$chapter = str_replace(" ", "-", $post_data['chapter_name']);

			$target_dir = "uploads/study_package/";
			$file = explode(".",$_FILES['file']["name"]);
			$extension = end($file);
			$file_name_full = $chapter.'-'.$sub.'-'.$batch.time().'.'.$extension;
			$target_file = $target_dir . basename($file_name_full);
			move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
			$post_data['file']=$target_dir.$file_name_full;

			$q = $this->main_model->add_data('study_package',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			// die();
			redirect('result_master/study_package_add');
		}
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/study_package/add',$data);
	  	$this->load->view('admin/footer');
	}

	function study_package_update($id)
	{
		$this->check_session();
		// $this->check_developer();
		$study_package=$this->main_model->get_data_id('study_package',$id);
		$data['study_package']=$study_package;
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();

			$batch = str_replace(" ", "-", $post_data['batch']);
			$sub = str_replace(" ", "-", $post_data['subject']);
			$chapter = str_replace(" ", "-", $post_data['chapter_name']);
			if(@$_FILES['file']['name']!="")
	   	  	{
	   	  		unlink($study_package->file);
				$target_dir = "uploads/study_package/";
				$file = explode(".",$_FILES['file']["name"]);
				$extension = end($file);
				$file_name_full = $chapter.'-'.$sub.'-'.$batch.time().'.'.$extension;
				$target_file = $target_dir . basename($file_name_full);
				move_uploaded_file($_FILES['file']["tmp_name"], $target_file);
				$post_data['file']=$target_dir.$file_name_full;
			}

			$q = $this->main_model->update_data('study_package',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updated Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('result_master/study_package_update/'.$id);
		}
   		$data['user']=$this->session->userdata('username');
   		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
      	$this->load->view('admin/header',$data);
	  	$this->load->view('admin/study_package/edit',$data);
	  	$this->load->view('admin/footer');
	}

	function study_package_delete($id)
	{
		$this->check_session();
		$result_pdf=$this->main_model->get_data_id('practice_test',$id);
		$q = $this->main_model->dalete_data('practice_test',$id);
		if($q!=0)
		{
			unlink($result_pdf->link);
			$this->session->set_flashdata('success','Deleted Successfully.');
		}
		else
		{
			$this->session->set_flashdata('error','Some error occured.');
		}
		redirect('result_master/study_package_list');
		
	}
	// ********* study_package *************
}
?>