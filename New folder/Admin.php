<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/
<method_name>
* @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct()
	 {
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('file');
	    $this->load->helper('form');
	    $this->load->helper('html');
		$this->load->model('admin_model');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
	 }
	 
	public function index()
	{
		if($this->session->userdata('username'))
	   {
	   		redirect('admin/dashboard');
	   }
	   else
	   {
	   		$this->load->view('admin/login');
	   }
	}
	
	public function check_login()
	{
	   $q=$this->admin_model->check_login();
	   //echo "<pre>"; print_r($q); die();
	   if(count($q)>0)
	   {
	      $data = array('username'=>$q->username,
		                'email'=>$q->email,
		            	'admin_id'=>$q->id);
		  $this->session->set_userdata($data);
		  redirect('admin/dashboard');
	   }
	   else
	   {
	      $data['msg']= "Invalid login name or password..";
		  $this->load->view('admin/login',$data);
	   }
 	}
	
	public function dashboard()
	{
	   if($this->session->userdata('username'))
	   {
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/dashboard',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	/*************************************************************************************************/

	public function list_steps()
	{
		if($this->session->userdata('username'))
	   {
	   	  $data['steps'] = $this->admin_model->list_steps();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/list_steps',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	
	public function add_step()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->add_step($post_data))
	   	  	{
	   	  		$this->session->set_userdata('success','Added Successfully.');
	   	  		redirect('admin/list_steps');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/add_step');
	   	  	}
	   	  }
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_step',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function edit_step($id)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->edit_step($post_data,$id))
	   	  	{
	   	  		$this->session->set_userdata('success','Updated Successfully.');
	   	  		redirect('admin/list_steps');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/edit_step/'.$id);
	   	  	}
	   	  }
	   	  $data['step'] = $this->admin_model->get_step_data($id);

	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_step',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	/***************************************************************************************************************/

	public function list_heads()
	{
		if($this->session->userdata('username'))
	   {
	   	  $data['heads'] = $this->admin_model->list_heads();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/list_heads',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	
	public function add_head()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->add_head($post_data))
	   	  	{
	   	  		$this->session->set_userdata('success','Added Successfully.');
	   	  		redirect('admin/list_heads');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/add_head');
	   	  	}
	   	  }
	   	  $data['steps'] = $this->admin_model->list_steps();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_head',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function edit_head($id)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->edit_head($post_data,$id))
	   	  	{
	   	  		$this->session->set_userdata('success','Updated Successfully.');
	   	  		redirect('admin/list_heads');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/edit_head/'.$id);
	   	  	}
	   	  }
	   	  $data['head'] = $this->admin_model->get_head_data($id);
	   	  $data['steps'] = $this->admin_model->list_steps();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_head',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	
	/******************************************************************************************************/

	public function list_head_values()
	{
		if($this->session->userdata('username'))
	   {
	   	  $data['head_values'] = $this->admin_model->list_head_values();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/list_head_values',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	
	public function add_head_value()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->add_head_value($post_data))
	   	  	{
	   	  		$this->session->set_userdata('success','Added Successfully.');
	   	  		redirect('admin/list_head_values');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/add_head_value');
	   	  	}
	   	  }
	   	  $data['heads'] = $this->admin_model->list_heads();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_head_value',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function edit_head_value($id)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->edit_head_value($post_data,$id))
	   	  	{
	   	  		$this->session->set_userdata('success','Updated Successfully.');
	   	  		redirect('admin/list_head_values');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/edit_head_value/'.$id);
	   	  	}
	   	  }
	   	  $data['head_value'] = $this->admin_model->get_head_value_data($id);
	   	  $data['heads'] = $this->admin_model->list_heads();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_head_value',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	/**********************************************************************************************/

	public function list_schools()
	{
		if($this->session->userdata('username'))
	   {
	   	  $data['schools'] = $this->admin_model->list_schools();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/list_schools',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	
	public function add_school()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();

	   	  	$type_of_school = $post_data['type_of_school'];
		$tos = '';
		foreach($type_of_school as $typ)
		{
			$tos = $typ.','.$tos;
		}
		$tos = rtrim($tos, ',');
		$post_data['type_of_school'] = $tos;

		$activities = $post_data['activities'];
		$ac = '';
		foreach($activities as $act)
		{
			$ac = $act.','.$ac;
		}
		$ac = rtrim($ac, ',');
		$post_data['activities'] = $ac;

		$available = $post_data['available'];
		$av = '';
		foreach($available as $avl)
		{
			$av = $avl.','.$av;
		}
		$av = rtrim($av, ',');
		$post_data['available'] = $av;

		$facilities = $post_data['facilities'];
		$fac = '';
		foreach($facilities as $fa)
		{
			$fac = $fa.','.$fac;
		}
		$fac = rtrim($fac, ',');
		$post_data['facilities'] = $fac;

	   	  	$ext = explode('.',$_FILES['image']['name']);
			$image_ext = end($ext);            //cover school image extension
			$name= "school_image".time().".".$image_ext; //image name
		 	$post_data['image']=$name;
		 	$path='./uploads/school_image/';
			$p = $path.basename($name);
			move_uploaded_file($_FILES['image']['tmp_name'], $p);//upload school  image
				 
			   	  	if($this->admin_model->add_school($post_data))
			   	  	{
			   	  		$this->session->set_userdata('success','Added Successfully.');
			   	  		redirect('admin/list_schools');
			   	  	}
			   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect('admin/add_school');
			   	  	}
			   	
	   	  }
	   	  $data['countries'] = $this->admin_model->load_countries();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_school',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function school_detail($id)
	{
		if($this->session->userdata('username'))
	   {
	   	  $data['school'] = $this->admin_model->get_school_data($id);
	   	  $data['countries'] = $this->admin_model->load_countries();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/school_detail',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function edit_school($id)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
			//echo "<prE>"; print_r($post_data); die();
	   	  	 $image=$_FILES['image']['name'];
	   	  	 
	   	  	 	$ext = explode('.',$_FILES['image']['name']);
				$image_ext = end($ext);   //cover school image extension

				$name= "school_image".time().".".$image_ext; //image name
	   	  	 	$path='./uploads/school_image/';
				$p = $path.basename($name);
				if(move_uploaded_file($_FILES['image']['tmp_name'], $p)) //upload new image
				{
					unlink($path.$old_image);      //delete old image
					$post_data['image']=$name;		//image name
				}

				$type_of_school = $post_data['type_of_school'];
				$tos = '';
				foreach($type_of_school as $typ)
				{
					$tos = $typ.','.$tos;
				}
				$tos = rtrim($tos, ',');
				$post_data['type_of_school'] = $tos;

				$activities = $post_data['activities'];
				$ac = '';
				foreach($activities as $act)
				{
					$ac = $act.','.$ac;
				}
				$ac = rtrim($ac, ',');
				$post_data['activities'] = $ac;

				$available = $post_data['available'];
				$av = '';
				foreach($available as $avl)
				{
					$av = $avl.','.$av;
				}
				$av = rtrim($av, ',');
				$post_data['available'] = $av;

				$facilities = $post_data['facilities'];
				$fac = '';
				foreach($facilities as $fa)
				{
					$fac = $fa.','.$fac;
				}
				$fac = rtrim($fac, ',');
				$post_data['facilities'] = $fac;

				$update=$this->admin_model->edit_school($post_data,$id);
				if($update)
			   	  	{
			   	  		$this->session->set_userdata('success','Updated Successfully.');
			   	  		redirect('admin/list_schools');
			   	  	}
		   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect(base_url()."admin/edit_school/".$id);
			   	  	}
	   	  	 
	   	  }
	   	  $data['school'] = $this->admin_model->get_school_data($id);
	   	  
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_school',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}




	/*****************************************************************************************************/

	public function head_master_school($school_id)
	{
		if($this->session->userdata('username'))
	   	{
		   	$data['user']=$this->session->userdata('username');
			$data['school']= $school = $this->admin_model->get_school_data($school_id);
			$data['steps'] = $this->admin_model->list_steps(1);
			
			$sc_hv = $this->admin_model->school_head_values($school_id);
			$school_hv = array();
			foreach($sc_hv->result() as $a)
			{
				$school_hv[] = $a->head_value_id;
			}
			$data['school_head_values'] = $school_hv;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/head_master_school',$data);
			$this->load->view('admin/footer');
		}
		else
		{
			redirect('admin/index');
		}
	}

	public function apply_heads($school_id)
	{
		$head_values = $this->input->post('head_value');
		$this->admin_model->delete_school_heads($school_id);
		foreach($head_values as $hv)
		{
			$this->admin_model->apply_heads($school_id,$hv);
		}
		echo '<script>alert("Applied Successfully.");</script>';

		$data['school']= $school = $this->admin_model->get_school_data($school_id);
		$data['steps'] = $this->admin_model->list_steps(1);
		
		$sc_hv = $this->admin_model->school_head_values($school_id);
		$school_hv = array();
		foreach($sc_hv->result() as $a)
		{
			$school_hv[] = $a->head_value_id;
		}
		$data['school_head_values'] = $school_hv;
		$this->load->view('admin/head_master_school_ajax',$data);
	}


	public function list_news()
	{
		if($this->session->userdata('username'))
		   {
		   	  $data['news'] = $this->admin_model->list_news();
		      $data['user']=$this->session->userdata('username');
		      $this->load->view('admin/header',$data);
			  $this->load->view('admin/list_news',$data);
			  $this->load->view('admin/footer');
		   }
	   else
		  {
		     redirect('admin/index');
		  }
	}
	public function add_news()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	
	   	  	if($_FILES['image']['name']!="")
	   	  	{
	   	  		$ext = explode('.',$_FILES['image']['name']);
				$image_ext = end($ext);            //cover school image extension
				$name= "news".time().".".$image_ext; //image name
			 	$post_data['image']=$name;
			 	$path='./uploads/news_image/';
				$p = $path.basename($name);
				move_uploaded_file($_FILES['image']['tmp_name'], $p);//upload school  image
	   	  	}
	   	  	
			   	  	if($this->admin_model->add_news($post_data))
			   	  	{
			   	  		$this->session->set_userdata('success','Added Successfully.');
			   	  		redirect('admin/list_news');
			   	  	}
			   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect('admin/add_news');
			   	  	}
			   	
	   	  }
	   	  
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_news',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	public function edit_news($id,$old_image)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	 $image=$_FILES['image']['name'];
	   	  	 if ($image)					//new school-image select
	   	  	 {
	   	  	 	$ext = explode('.',$_FILES['image']['name']);
				$image_ext = end($ext);   //cover school image extension

				$name= "news".time().".".$image_ext; //image name
	   	  	 	$path='./uploads/news_image/';
				$p = $path.basename($name);
				if(move_uploaded_file($_FILES['image']['tmp_name'], $p)) //upload new image
				{
					unlink($path.$old_image);      //delete old image
					$post_data['image']=$name;		//image name
				}
				$update=$this->admin_model->edit_news($post_data,$id);
				if($update)
			   	  	{
			   	  		$this->session->set_userdata('success','Updated Successfully.');
			   	  		redirect('admin/list_news');
			   	  	}
		   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect(base_url()."admin/edit_news".$id.'/'.$old_image);
			   	  	}
	   	  	 }
	   	  	 else 					//image not select	
	   	  	{
	   	  	 	if($this->admin_model->edit_news($post_data,$id))
			   	  	{
			   	  		$this->session->set_userdata('success','Updated Successfully.');
			   	  		redirect('admin/list_news');
			   	  	}
		   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect(base_url()."admin/edit_news".$id.'/'.$old_image);
			   	  	}
	   	  	 }
	   	  }
	   	  $data['news'] = $this->admin_model->get_news_data($id);
	   	  
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_news',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function delete_news($id,$image)
	{
		$del=$this->admin_model->delete_news($id,$image);
		if ($del) 
		{
			redirect('admin/list_news');
		}
		else
		{
			redirect('admin/list_news');
		}
	}
	public function list_enquiry()
	{
		if($this->session->userdata('username'))
	   {
	   	  $data['enquiry'] = $this->admin_model->list_enquiry();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/list_enquiry',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function change_password()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$new_pass = $this->input->post('new_pass');
	   	  	if($this->admin_model->change_password($new_pass))
	   	  	{
	   	  		$this->session->set_userdata('success','Updated Successfully.');
	   	  		redirect('admin');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_userdata('erorr','Some error occured.');
	   	  		redirect('admin/change_password');
	   	  	}
	   	  }
	   	  
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/change_password',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function check_password()
	{
		if($this->session->userdata('username'))
	   {
	   	
	   	  	$current_pass = $this->input->post('pass');
	   	  	$ad=$this->admin_model->get_current_password();

	   	  	
	   	  	if ($current_pass===$ad->password) 
	   	  	{
	   	  		echo "match";
	   	  	}
	   	  	else
	   	  	{
	   	  		echo "not_match";
	   	  	}

	   	  	
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	
	}

	function load_states($state_id)
	{
		$states = $this->admin_model->get_states_by_country($state_id);
		?>
			<select style="height:50px" class="form-control col-md-7 col-xs-12" id="state" name="state" required="" onchange="load_cities()">
                <option value="">--Select--</option>
                <?php foreach($states->result() as $s){?>
                     <option value="<?=$s->id?>"><?=$s->name?></option>
                <?php } ?>
            </select>
		<?php 
	}

	function load_cities($id)
	{
		$cities = $this->admin_model->get_cities_by_state($id);
		?>
			<select style="height:50px" class="form-control col-md-7 col-xs-12" id="city" name="city" required="">
                <option value="">--Select--</option>
                <?php foreach($cities->result() as $city){?>
                     <option value="<?=$city->id?>"><?=$city->name?></option>
                <?php } ?>
            </select>
		<?php 
	}

	function load_cities123($id)
	{
		$cities = $this->admin_model->get_cities_by_state($id);
		?>
			<select style="height:50px" class="form-control col-md-7 col-xs-12" id="city" name="city" required="" onchange="load_locations()">
                <option value="">--Select--</option>
                <?php foreach($cities->result() as $city){?>
                     <option value="<?=$city->id?>"><?=$city->name?></option>
                <?php } ?>
            </select>
		<?php 
	}

	function load_locations($id)
	{
		$this->db->where('city',$id);
		$locations = $this->db->get('location');
		?>
			<select style="height:50px" class="form-control col-md-7 col-xs-12" id="" name="location" required="" >
                <option value="">--Select--</option>
                <?php foreach($locations->result() as $city){?>
                     <option value="<?=$city->id?>"><?=$city->location?></option>
                <?php } ?>
            </select>
		<?php 
	}

	function list_locations()
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['user']=$this->session->userdata('username');
			$data['locations'] = $this->admin_model->get_locations();
			$this->load->view('admin/header',$data);
		  	$this->load->view('admin/list_locations',$data);
		  	$this->load->view('admin/footer');
		}
		else
		{
			redirect('admin/index');
		}
	}

	function add_location()
	{
		if($this->session->userdata('username'))
	   	{
		   	if($this->input->server('REQUEST_METHOD')=='POST')
		   	  {
		   	  	$post_data = $this->input->post();
		   	  	if($this->admin_model->add_location($post_data))
		   	  	{
		   	  		$this->session->set_userdata('success','Added Successfully.');
		   	  		redirect('admin/list_locations');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_userdata('erorr','Some error occured.');
		   	  		redirect('admin/add_location');
		   	  	}
		   	  }
		  $data['countries'] = $this->admin_model->load_countries();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_location',$data);
		  $this->load->view('admin/footer');
	   }
	   else
		  {
		     redirect('admin/index');
		  }
	}

	function edit_location($id)
	{
		if($this->session->userdata('username'))
	   	{
		   	if($this->input->server('REQUEST_METHOD')=='POST')
		   	  {
		   	  	$post_data = $this->input->post();
		   	  	if($this->admin_model->update_location($post_data,$id))
		   	  	{
		   	  		$this->session->set_userdata('success','updated Successfully.');
		   	  		redirect('admin/list_locations');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_userdata('erorr','Some error occured.');
		   	  		redirect('admin/edit_location/'.$id);
		   	  	}
		   	  }
		  $data['location'] = $this->admin_model->location_data($id);
		  $data['countries'] = $this->admin_model->load_countries();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_location',$data);
		  $this->load->view('admin/footer');
	   }
	  else
	  {
	     redirect('admin/index');
	  }
	}

	// *********advertisement********

	public function list_advertisement()
	{
		if($this->session->userdata('username'))
		   {
		   	  $data['advertisement'] = $this->admin_model->list_advertisement();
		      $data['user']=$this->session->userdata('username');
		      $this->load->view('admin/header',$data);
			  $this->load->view('admin/list_advertisement',$data);
			  $this->load->view('admin/footer');
		   }
	   else
		  {
		     redirect('admin/index');
		  }
	}

	public function add_advertisement()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();

	   	  	$ext = explode('.',$_FILES['image']['name']);
			$image_ext = end($ext);            //cover school image extension
			$name= "advertisement".time().".".$image_ext; //image name
		 	$post_data['image']=$name;
		 	$path='./uploads/advertisement_image/';
			$p = $path.basename($name);

			
			move_uploaded_file($_FILES['image']['tmp_name'], $p);//upload school  image
				 
					if($this->admin_model->add_advertisement($post_data))
			   	  	{
			   	  		$this->session->set_userdata('success','Added Successfully.');
			   	  		redirect('admin/list_advertisement');
			   	  	}
			   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect('admin/add_advertisement');
			   	  	}
			   	
			   	
	   	  }
	   	  
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/add_advertisement');
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function edit_advertisement($id,$old_image)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	 $image=$_FILES['image']['name'];
	   	  	 if ($image)					//new school-image select
	   	  	 {
	   	  	 	$ext = explode('.',$_FILES['image']['name']);
				$image_ext = end($ext);   //cover school image extension

				$name= "advertisement".time().".".$image_ext; //image name
	   	  	 	$path='./uploads/advertisement_image/';
				$p = $path.basename($name);
				if(move_uploaded_file($_FILES['image']['tmp_name'], $p)) //upload new image
				{
					unlink($path.$old_image);      //delete old image
					$post_data['image']=$name;		//image name
				}
				$update=$this->admin_model->edit_advertisement($post_data,$id);
				if($update)
			   	  	{
			   	  		$this->session->set_userdata('success','Updated Successfully.');
			   	  		redirect('admin/list_advertisement');
			   	  	}
		   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect(base_url()."admin/edit_advertisement".$id.'/'.$old_image);
			   	  	}
	   	  	 }
	   	  	 else 					//image not select	
	   	  	{
	   	  	 	if($this->admin_model->edit_advertisement($post_data,$id))
			   	  	{
			   	  		$this->session->set_userdata('success','Updated Successfully.');
			   	  		redirect('admin/list_advertisement');
			   	  	}
		   	  	else
			   	  	{
			   	  		$this->session->set_userdata('erorr','Some error occured.');
			   	  		redirect(base_url()."admin/edit_advertisement".$id.'/'.$old_image);
			   	  	}
	   	  	 }
	   	  }
	   	  $data['advertisement'] = $this->admin_model->get_advertisement_data($id);
	   	  
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/edit_advertisement',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function delete_advertisement($id,$image)
	{
		if($this->session->userdata('username'))
	   {
			$del=$this->admin_model->delete_advertisement($id,$image);
			if ($del) 
			{
				redirect('admin/list_advertisement');
			}
			else
			{
				redirect('admin/list_advertisement');
			}
		}
		 else
		  {
		     redirect('admin/index');
		  }

	}
	// *********advertisement********


	public function delete_school($id)
	{
		if($this->session->userdata('username'))
	   {
	   		$this->db->where('id',$id);
			$del = $this->db->delete('list_schools');

			if ($del) 
			{
				$this->admin_model->delete_school_heads($id);
				redirect('admin/list_schools');
			}
			else
			{
				redirect('admin/list_schools');
			}
		}
		 else
		  {
		     redirect('admin/index');
		  }

	}

	public function delete_head_value($id)
	{
		if($this->session->userdata('username'))
	   {
	   		$this->db->where('id',$id);
			$del = $this->db->delete('head_values');
			if ($del) 
			{
				redirect('admin/list_head_values');
			}
			else
			{
				redirect('admin/list_head_values');
			}
		}
		 else
		  {
		     redirect('admin/index');
		  }

	}


	function upload_school_images($id=0)
{
	if($this->session->userdata('username'))
   	{
   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$ext = explode('.',$_FILES['image']['name']);
			$image_ext = end($ext);            //cover school image extension
			$name= time().".".$image_ext; //image name
		 	$post_data['image']=$name;
		 	$post_data['school_id']=$id;
		 	$path='./uploads/school_image/';
			$p = $path.basename($name);

			if (move_uploaded_file($_FILES['image']['tmp_name'], $p))//upload school  image
				{ 
			   	  	if($this->admin_model->upload_school_image($post_data))
			   	  	{
			   	  		$this->session->set_flashdata('message', '<h3 style="color:green;">upload Image Successfully</h3>');
			   	  		redirect('admin/school_image_gallery/'.$id);
			   	  	}
			   	}
			   	else
			   	{
			   		$this->session->set_flashdata('message', '<h3 style="color:red;">! error</h3>');
			   	  	redirect('admin/school_image_gallery/'.$id);
			   	}
	   	  }

   	}
	 else
	{
		redirect('admin/index');
	}

}

function school_image_gallery($id)
{
	if($this->session->userdata('username'))
	{
		$data['image']=$this->admin_model->school_image_gallery($id);
		$data['user']=$this->session->userdata('username');
		$data['s_id'] = $id;
		$data['school_name'] =$this->admin_model->get_school_data($id);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/school_image_gallery',$data);
		$this->load->view('admin/footer');
	}
	else
	{
	    redirect('admin/index');
	}
}

function delete_school_image($school_id,$img_id)
{
	$this->db->where('id',$img_id);
	$image = $this->db->get('school_image')->row()->image;
	
	
	$this->db->where('id',$img_id);
	if($this->db->delete('school_image'))
	{
		unlink('.uploads/school_image/'.$image);
		$this->session->set_flashdata('success','Deleted Successfully.');
	}
	else
	{
		$this->session->set_flashdata('error','Deleted Successfully.');
	}
	redirect('admin/school_image_gallery/'.$school_id);
}

	/******************************************LOGOUT START****************************************************/

	function log_out()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		redirect('admin/index');
	}

	/******************************************LOGOUT START****************************************************/
	
} 
