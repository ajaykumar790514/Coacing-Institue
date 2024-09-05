<?php


/**
 * 
 */
class Main_controller extends CI_Controller
{
	function check_session()
	{
		$sess = $this->session->userdata('username');
		if ($sess == "") {
			redirect(base_url()."admin");
			return false;
		} else {
			return true;
		}
	}
	

	function check_developer()
	{
		$data['sess']=$this->session->userdata('role');
		if ($data['sess']!="developer")
		{
			echo "You Are Not Authorized To Access This Page";
			die();
		}
		else
		{
			return true;
		}
		
	}

	public function uploadFiles($path,$filename)
	{
		
		$config['upload_path']          = $path;
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload($filename)){
        	return $this->upload->data('file_name');
        }
        return false;
	}

	public function do_upload($id,$path,$file_name='')
	{
		$target_dir = "images/".$path."/";
		if($file_name=="")
		{
			$file_name = "userfile";
		}

		$file = explode(".",$_FILES[$file_name]["name"]);
		$file_name1 = $file[0].time();
		$extension = end($file);
		$file_name_full = time().".".$extension;

		$target_file = $target_dir . basename($file_name_full);

		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES[$file_name]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		// if ($_FILES[$file_name]["size"] > 1000000) {
		    // echo "Sorry, your file is too large.";
		    // $uploadOk = 0;
		// }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
    		echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		}
		else 
		{
			if (move_uploaded_file($_FILES[$file_name]["tmp_name"], $target_file)) 
			{
	        	//echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
	        	$data['name'] = $file_name_full;
				$data['id'] = $id;

				if($path=="product")
				{
					$this->admin_model->add_product_image($data);
				}
				elseif($path=="event")
				{
					$this->admin_model->add_event_image($data);
				}
				elseif($path=="slider")
				{
					$this->admin_model->add_slide_image($data);
				}
				elseif($path=="category")
				{
					$this->admin_model->add_category_image($data);
				}
				elseif($path=="updates")
				{
					$this->admin_model->add_updates_image($data);
				}
				elseif($path=="testimonial")
				{
					$this->admin_model->add_testimonial_image($data);
				}
				elseif($path=="event_cover")
				{
					$this->admin_model->add_event_cover($data);
				}
				elseif($path=="content")
				{
					$this->admin_model->add_content_image($data,$file_name);
				}
				elseif($path=="about")
				{
					$this->admin_model->add_about_page_image($data,$file_name);
				}
				elseif($path=="program")
				{
					$this->admin_model->add_program_image($data,$file_name);
				}
				elseif($path=="achievements")
				{
					$this->admin_model->add_achievement_image($data,$file_name);
				}
				elseif($path=="testimonial_file")
				{
					$this->admin_model->add_testimonial_file($data,$file_name);
				}
				elseif($path=="registration_page/registration_info")
				{
					$p_data['registration_info']=$file_name_full;
					$this->admin_model->update_data('registration_page',$p_data,$id=1);
				}
				elseif($path=="registration_page/test_syllabus")
				{
					$p_data['test_syllabus']=$file_name_full;
					$this->admin_model->update_data('registration_page',$p_data,$id=1);
				}
				elseif($path=="logo")
				{
					$this->admin_model->upload_logo($data);
				}
	
    		} 
    		else 
    		{
        		echo "Sorry, there was an error uploading your file.";

    		}
		}
	}


	function send_mail($message)
	{

		$sender_email="jeeexpert4@gmail.com";
		$user_password="jeeexpert@#1234";
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
		// $this->email->to('talkwithniri@gmail.com,customercare@euroasiachemicals.ru');
		$this->email->to('sndpsingh166@gmail.com'); 
		$this->email->subject($subject);
		$this->email->message($message);  
		$this->email->send();
	}

	public function send_sms($msg,$mob)
	{
		$url = 'http://sms.cellthis24x7.com/API/WebSMS/Http/v1.0a/index.php';
        $params = array (
				        'username'=>'Bq9841107247',
				        'password'=>'Bq9841',
				        'sender'=>'TSFTSF',
					  //'username'=>'aitrooma',
					  //'password'=>'allen@123',
				      //'sender'=>'ALLENH',
					    'to'=>$mob,
					    'message'=>$msg,
					    'reqid'=>'1',
					    'format'=>'text',
					    'route_id'=>28
					     );
					
		$options = array(
			            CURLOPT_SSL_VERIFYHOST => 0,
			            CURLOPT_SSL_VERIFYPEER => 0
			       		 );
			 
		$defaults = array(
			            CURLOPT_URL => $url. (strpos($url, '?') 
			               === FALSE ? '?' : ''). http_build_query($params),
			            CURLOPT_HEADER => 0,
			            CURLOPT_RETURNTRANSFER => TRUE,
			            CURLOPT_TIMEOUT =>56
			       		 );
			 
		$ch = curl_init();
			  curl_setopt_array($ch, ($options + $defaults));
		$result = curl_exec($ch);
		if(!$result)
			{
			    trigger_error(curl_error($ch));
			    $flag=0;
			}
			else
			{                 
			    $flag=1;
			}
			curl_close($ch);
	}

	function list_menu()
	{
		$this->check_session();
		$this->check_developer();
		$data['user']=$this->session->userdata('username');
		$menu=$this->main_model->get_menus();
		$data['menus'] = $menu;
   		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu/list');
		$this->load->view('admin/footer');
	}

	public function add_menu()
	{
		$this->check_session();
		$this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$post_data['status'] = 1;
			$q = $this->main_model->add_data('manage_menu',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('Main_controller/add_menu');
		}
		$data['user']=$this->session->userdata('username');
		$data['parent_menu']=$this->main_model->get_data('manage_menu',array('parent'=>0));
		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu/add',$data);
		$this->load->view('admin/footer');  	
	}


	public function update_menu($id)
	{
		$this->check_session();
		$this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$q = $this->main_model->update_data('manage_menu',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updates Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('Main_controller/update_menu/'.$id);
		}
		$data['user']=$this->session->userdata('username');
		$data['parent_menu']=$this->main_model->get_data('manage_menu',array('parent'=>0));
		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
        $data['menu_data']=$this->main_model->get_data_id('manage_menu',$id);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu/edit',$data);
		$this->load->view('admin/footer');  	
	}

	function delete_menu($id)
	{
		$this->check_session();
		$this->check_developer();
   		if($this->main_model->dalete_data('manage_menu',$id))
	   	{
	   	  	$this->session->set_flashdata('success','Deleted Successfully.');
	   	  	redirect('admin/list_menu');
	   	}
   	  	else
   	  	{
   	  		$this->session->set_flashdata('erorr','Some error occured.');
   	  		redirect('admin/list_menu');
   	  	}  
	}

	public function list_role()
	{
		$this->check_session();
		// $this->check_developer();
		$data['user']=$this->session->userdata('username');
		$roles=$this->main_model->get_data('manage_role');
		$data['roles'] = $roles;
   		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/role/list');
		$this->load->view('admin/footer');
	}

	public function add_role()
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$fun=$this->input->post('fun');
			 $text = implode(",", $fun);
			 $post_data['fun']=$text;
			$post_data['status'] = 1;
			$q = $this->main_model->add_data('manage_role',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('main_controller/add_role');
		}
		$data['user']=$this->session->userdata('username');
		$data['parent_menu']=$this->main_model->get_data('manage_menu',array('parent'=>0));
		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/role/add',$data);
		$this->load->view('admin/footer');  	
	}

	public function update_role($id)
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			$fun=$this->input->post('fun');
			 $text = implode(",", $fun);
			 $post_data['fun']=$text;
			$q = $this->main_model->update_data('manage_role',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updates Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('main_controller/update_role/'.$id);
		}
		$data['user']=$this->session->userdata('username');
		$data['parent_menu']=$this->main_model->get_data('manage_menu',array('parent'=>0));
		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
        $data['role_data']=$this->main_model->get_data_id('manage_role',$id);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/role/edit',$data);
		$this->load->view('admin/footer');  	
	}

	function delete_role($id)
	{
		$this->check_session();
		$this->check_developer();
   		if($this->main_model->dalete_data('manage_role',$id))
	   	{
	   	  	$this->session->set_flashdata('success','Deleted Successfully.');
	   	  	redirect('admin/list_role');
	   	}
   	  	else
   	  	{
   	  		$this->session->set_flashdata('erorr','Some error occured.');
   	  		redirect('admin/list_role');
   	  	}  
	}

	public function ActiveInactive($tb,$id,$status)
	{
		// echo $tb;
		// die();
		$data = array('status'=>$status);
		$this->main_model->update_data($tb,$data,$id);
		$active = $this->main_model->get_data_id($tb,$id)->status;
		if($active ==1)
		{ ?>
			<button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$id?>,0)">Activated</button>
		<?php 
		}
		else
		{ ?>
			<button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$id?>,1)">Not Activated</button>
		<?php
		}
	}
	public function ActiveInactiveNew($tb,$id,$status)
	{
		// echo $tb;
		// die();
		$data = array('is_active'=>$status);
		$this->main_model->update_data_stu($tb,$data,$id);
		$active = $this->main_model->get_data_stu_id($tb,$id)->is_active;
		if($active ==1)
		{ ?>
			<button class="btn btn-success btn-xs" onclick="activate_inactive(<?=$id?>,0)">Activated</button>
		<?php 
		}
		else
		{ ?>
			<button class="btn btn-danger btn-xs" onclick="activate_inactive(<?=$id?>,1)">Not Activated</button>
		<?php
		}
	}
	

	function list_users()
	{
		$this->check_session();
		// $this->check_developer();
		$data['user']=$this->session->userdata('username');
		$users=$this->main_model->get_data('admin');
		$data['users'] = $users;
   		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/list');
		$this->load->view('admin/footer');
	}

	public function add_user()
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			// echo "<pre>";
			// print_r($post_data);
			// echo "</pre>";
			// die();
			$q = $this->main_model->add_data('admin',$post_data);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Added Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('main_controller/add_user');
		}
		$data['user']=$this->session->userdata('username');
		$data['roles']=$this->main_model->get_data('manage_role',array('status'=>1));
		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/add',$data);
		$this->load->view('admin/footer');  	
	}

	public function update_user($id)
	{
		$this->check_session();
		// $this->check_developer();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$post_data = $this->input->post();
			
			$q = $this->main_model->update_data('admin',$post_data,$id);
			if($q!=0)
			{
				$this->session->set_flashdata('success','Updates Successfully.');
			}
			else
			{
				$this->session->set_flashdata('error','Some error occured.');
			}
			redirect('main_controller/update_user/'.$id);
		}
		$data['user']=$this->session->userdata('username');
		$data['roles']=$this->main_model->get_data('manage_role',array('status'=>1));
        $data['user_data']=$this->main_model->get_data_id('admin',$id);
		$r=$this->session->userdata('role_id');
        $data['role']=$this->main_model->get_data_id('manage_role',$r);
        $data['role_data']=$this->main_model->get_data_id('manage_role',$id);
	    $data['menu'] = $this->main_model->get_menu();
	    $data['sub_menu'] = $this->main_model->get_sub_menu();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/edit',$data);
		$this->load->view('admin/footer');  	
	}

	function delete_user($id)
	{
		$this->check_session();
   		if($this->main_model->dalete_data('admin',$id))
	   	{
	   	  	$this->session->set_flashdata('success','Deleted Successfully.');
	   	  	redirect('admin/list_users');
	   	}
   	  	else
   	  	{
   	  		$this->session->set_flashdata('erorr','Some error occured.');
   	  		redirect('admin/list_users');
   	  	}  
	}

	public function check_email()
	{
		$email=$this->input->get('email');
		$this->db->where('email',$email);
		$count=$this->db->count_all_results('admin');
		if($count>0)
		{
			echo "false";
		}
		else
		{
			echo "true";
		}
	}

	public function user_password()
	{
		$post_data=$this->input->post();

		$user_id=$this->session->userdata('user_id');
		$user=$this->main_model->get_data_id('admin',$user_id);
		$pass=$this->main_model->get_data_id('admin',$post_data['id']);
		
		if ($user->password==$post_data['password']) 
		{
			echo $pass->password;
		}
		else
		{
			echo "Incorrect Password. Try Again";
		}
	}

	public function change_user_password()
	{
		$post_data=$this->input->post();
		
		$user_id=$this->session->userdata('user_id');
		$user=$this->main_model->get_data_id('admin',$user_id);
		
		if ($user->password==$post_data['password']) 
		{
			if($this->main_model->update_data('admin',array('password'=>$post_data['user_password']),$post_data['id']))
			{
				echo'Password Updated Successfully.';
			}
			else
			{
				echo'Some error occured.';
			}
		}
		else
		{
			echo "Incorrect Password. Try Again";
		}
	}



	
	function get($tb,$data=0)
	{
		if ($data==0) 
		{
			if($query=$this->db->get($tb))
			{
				return $query->result();
			}
			return false;
		}
		else
		{
			if ($query=$this->db->get_where($tb,$data)) 
			{
				return $query->result();
			}
			return false;
		}
	}

	function Insert($tb,$data)
	{
		if ($this->db->insert($tb,$data)) {
			return true;
		}
		return false;
	}

	function Update($tb,$data,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update($tb,$data)){
			return true;
		}
		return false;
	}

	function Delete_data($tb,$data)
	{
		$this->db->where($data);
		if($this->db->delete($tb)){
			return true;
		}
		return false;
	}




}