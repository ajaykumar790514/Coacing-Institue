<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Main_controller.php');
class Admin extends Main_controller 
{ 
	public function __construct() {
        parent::__construct();
        $this->load->library('session');
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
    $user = $this->admin_model->check_login();
    
    if ($user) {
        $role = $this->admin_model->get_uesr_role($user->user_type);

        if ($role) {
            $data = array(
                'username' => $user->username,
                'user_id' => $user->id,
                'role' => $role->title,
                'role_id' => $role->id
            );

            $this->session->set_userdata($data);
            redirect('admin/dashboard');
        } else {
            // Handle role not found
            $data['msg'] = "User role not found.";
            $this->load->view('admin/login', $data);
        }
    } else {
        // Handle invalid login
        $data['msg'] = "Invalid login name or password.";
        $this->load->view('admin/login', $data);
    }
}

	
	public function dashboard()
	{  
	    
	   if($this->session->userdata('username'))
	   {
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		 
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/dashboard',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	
	

	/********************************EVENT MASTER****************************************/

	public function list_event()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['events'] = $this->admin_model->get_events();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/event/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_event()
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 1;
	   	  	$q = $this->admin_model->add_event($post_data);
	   	  	if($q!=0)
	   	  	{
	   	  		$this->do_upload($q,'event_cover');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/add_event');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role'] = $this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/event/add',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	public function edit_event($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->update_event($post_data,$id))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{

	   	  			unlink('images/event_cover/'.$update->img);

	   	  			$this->do_upload($id,'event_cover');
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/list_event');
	   	  }
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
			  $data['menu'] = $this->main_model->get_menu();
			  $data['sub_menu'] = $this->main_model->get_sub_menu();
			  $data['event'] = $this->admin_model->get_event_data($id);
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/event/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	function upload_event_image($id)
	{
		$path = './images/event/';
		if (@$_FILES['userfile']['name']!="") {

 			if ($img_name = $this->uploadFiles($path,'userfile')) {
 					$insertArray['name'] = $img_name;
 					$insertArray['title'] = $_POST['title'];
					$insertArray['id'] = $id;
					$this->admin_model->add_event_image($insertArray);
 			}  
 		}

		$images = $this->admin_model->get_event_images($id);
		foreach($images->result() as $image)
		{ ?>
			<div class="event-img col-md-3">
				<figure>
					<i class="delete-btn fa fa-trash text-danger" id="<?=$image->id?>"></i>
					<a href="<?=base_url()?>images/event/<?=$image->name?>" download>
						<i class="fa fa-download text-primary"></i>
					</a>
					<img src="<?=base_url()?>images/event/<?=$image->name?>">
					<p><?=$image->title?></p>
				</figure>
			</div>
			
		<?php }
	}

	function event_images($event_id)
	{
		//echo $product_id; die();
		$event = $this->admin_model->get_event_data($event_id);
		$images = $this->admin_model->get_event_images($event_id); ?>
			<form id="upload_form" method="post" enctype="multipart/form-data">
				<div class="row">
				  <div class="col-md-4">
				    <div class="input-group">
				      <span class="input-group-addon">
				        <i class="fa fa-image"></i>
				      </span>
				      <input type="file" class="form-control" name="userfile" id="userfile" aria-label="Image">
				    </div><!-- /input-group -->
				  </div><!-- /.col-lg-4 -->
				  <div class="col-md-6">
				    <div class="input-group">
				      <span class="input-group-addon">
				        Title
				      </span>
				      <input type="text" class="form-control" name="title" aria-label="Title" placeholder="Title" value="<?=$event->name?>">
				    </div><!-- /input-group -->
				  </div><!-- /.col-lg-4 -->
				  <div class="col-md-2">
				  	<input class="btn btn-success" type="submit" name="" value="Upload">
				  </div><!-- /.col-lg-4 -->
				</div><!-- /.row -->
			</form>
		<div id="msg" class="row" >
		
		<?php 
		foreach($images->result() as $image)
		{ ?>
			<div class="event-img col-md-3">
				<figure>
					<i class="delete-btn fa fa-trash text-danger" id="<?=$image->id?>"></i>
					<a href="<?=base_url()?>images/event/<?=$image->name?>" download>
						<i class="fa fa-download text-primary"></i>
					</a>
					<img src="<?=base_url()?>images/event/<?=$image->name?>">
					<p><?=$image->title?></p>
				</figure>
			</div>
			
		<?php } ?>
		</div>
		<br><br><hr>
			<style type="text/css">
				.event-img{
					/*height: 120px;*/

				}
				.event-img>figure{
					margin: 5px;
					border: 1px solid gray;
					border-radius: 5px;
					height: 180px;
					width: 100%!important;
					display: flex;
					position: relative;
					justify-content: center!important;
				}
				.event-img>figure>img{
					/*border-radius: 5px;*/
					width: auto!important;
				  max-width: 100%!important;
				  height: auto!important;
				  max-height: 118px!important;
				  transition: all 0.3s;
				  margin: auto!important;
				}
				.event-img>figure>a{
					position: absolute;
				  left: 20px;
				  top: 10px;
				  font-size: 18px;
				  cursor: pointer;
				}
				.event-img>figure>.delete-btn{
					position: absolute;
				  right: 20px;
				  top: 10px;
				  font-size: 18px;
				  cursor: pointer;
				}
				.event-img>figure>p{
					position: absolute;
					bottom: 0;
					margin: 5px;
				}
			</style>
		
		
		

		<script>
  $(document).ready(function (e){
         
$("#upload_form").on('submit',(function(e){
$("#msg").html('<h1 class="text-center" style="color:red;font-size:25px">LOADING....</h1>');
e.preventDefault();
$.ajax({
url: "<?=base_url()?>index.php/admin/upload_event_image/<?=$event_id?>",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$("#msg").html(data);
$("#upload_form")[0].reset();
},
error: function(){}             
});
}));
});

$('.delete-btn').on('click',function(event) {

    if (confirm('Are you sure??')) {                    
        var id = $(this).attr('id');
				$.ajax({
						url: "<?=base_url()?>admin/delete_event_image/"+id,
				})
				$(this).parent().parent().remove();
    }  
});
  </script>

		<?php 
	}


	public function delete_event_image($id)
	{
		if($imgData = $this->admin_model->get_data_by_id('event_images',$id)){
				if($this->admin_model->dalete_data('event_images',$id)){
						unlink('images/event/'.$imgData->name);
			}
		}
	}

	/********************************EVENT MASTER****************************************/


	/********************************UPDATES************************************/

	public function list_updates()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['updates'] = $this->admin_model->get_updates();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/update/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_update()
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 0;
	   	  	$q = $this->admin_model->add_update($post_data);
	   	  	//echo $q; die();
	   	  	if($q!=0)
	   	  	{
	   	  		$edit_data = array('update_id'=>$q);
	   	  		$this->admin_model->update_update($edit_data,$q);
	   	  		//echo $this->db->last_query(); die();
	   	  		$this->do_upload($q,'updates');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/add_update');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/update/add',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	public function edit_update($id,$lang='')
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['update'] = $update = $this->admin_model->get_update_detail($id,$lang);
	   		//echo "<prE>"; print_r($data['update']); die();
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	//echo "<pre>"; print_r($post_data); die();
	   	  	//$language = $post_data['language'];
	   	  	//unset($post_data['language']);
	   	  	$post_data['update_id'] = $id;


	   	  	
	   	  	if($this->admin_model->update_update($post_data,$id,$lang))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{

	   	  			unlink('images/updates/'.$update->img);

	   	  			$this->do_upload($id,'updates');
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
		
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/list_updates');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  //echo "<pre>"; print_r($data['update']); die();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/update/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	  public function nishant()
	  {
	  	echo '<pre>'; print_r($_POST);
	  }

	  public function active_inactive_updates($id,$status)
	{
		$this->check_session();
		$data = array('status'=>$status);
		$this->admin_model->update_update($data,$id);
		$product_status = $this->admin_model->get_update_detail($id)->status;
		if($product_status ==1)
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

	public function delete_update($id)
	{
		$this->check_session();
		if($img=$this->admin_model->get_data_by_id($table_name='updates',$id)->img)
		{
			$path='images/updates/'.$img;
			unlink($path);
		}
		$del=$this->admin_model->dalete_data($table_name='updates',$id);
		if ($del) 
		{
			$this->session->set_flashdata('success','Deleted Successfully.');
			redirect('admin/list_updates');
		}
		else
		{
		   	$this->session->set_flashdata('erorr','Some error occured.');
			redirect('admin/list_updates');
		}
	}

	function manage_update_category($id=0)
	{	
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();
				$check_data['title']=$post_data['title'];
				$data=$this->main_model->get('updates_categories',$check_data);
				if (count($data)==0){
					if($this->main_model->add_data('updates_categories',$post_data)){
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
				$data=$this->main_model->get('updates_categories',array('title'=>$post_data['title'],'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('updates_categories',$post_data,$id)){
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
		  $this->db->order_by('order','asc');
	    $data['classes'] = $this->main_model->get('updates_categories');
	    // print_r($data['classes']);die();
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/update/category_list',$data);
	    $this->load->view('admin/footer');
	}

	function reload_category_table()
	{
		$this->check_session();
		$this->db->order_by('order','asc');
	    $data['classes'] = $this->main_model->get('updates_categories');
	    $this->load->view('admin/update/category_table_reload',$data);
	}

	/********************************UPDATES************************************/



	/********************************TESTIMONIALS************************************/

	public function list_testimonials()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['updates'] = $this->admin_model->get_testimonials();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/testimonial/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_testimonial()
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 1;
	   	  	$q = $this->admin_model->add_testimonial($post_data);
	   	  	if($q!=0)
	   	  	{

	   	  		$this->do_upload($q,'testimonial');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/add_testimonial');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/testimonial/add',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	public function edit_testimonial($id)
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['update'] = $update = $this->admin_model->get_testimonial_detail($id);
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->update_testimonial($post_data,$id))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{

	   	  			unlink('images/testimonial/'.$update->img);

	   	  			$this->do_upload($id,'testimonial');
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/list_testimonials');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  //echo "<pre>"; print_r($data['update']); die();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/testimonial/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	  public function active_inactive_testimonial($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_testimonial($data,$id);
		$product_status = $this->admin_model->get_testimonial_detail($id)->status;
		if($product_status ==1)
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

	/********************************TESTIMONIALS************************************/


	/********************************ABOUTUS***********************************/

	public function about_us()
	{
		//$data[''] = $this->admin_model->about_us();
	}

	public function list_contact()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['contacts'] = $this->admin_model->get_contacts();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/contact/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_contact()
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	
	   	  	if($this->admin_model->add_contact($post_data))
	   	  	{
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  		redirect('admin/list_contact');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  		redirect('admin/add_contact');
	   	  	}
	   	  	
	   	  }
	   		$data['user']=$this->session->userdata('username');
			$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/contact/add');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function edit_contact($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	//echo "<pre>"; print_r($post_data); die();
	   	  	if($this->admin_model->update_contact($post_data,$id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  		redirect('admin/list_contact');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  		redirect('admin/edit_contact/'.$id);
	   	  	}
	   	  	
	   	  }
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['contact'] = $this->admin_model->get_contact($id);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/contact/edit');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function delete_contact($id)
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      if($this->admin_model->delete_contact($id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Deleted Successfully.');
	   	  		redirect('admin/list_contact');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  		redirect('admin/list_contact');
	   	  	}
	   	  	redirect('admin/list_contact');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}


	/********************************ABOUTUS***********************************/

	/********************************FAQ***************************************/

	public function add_faq()
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->add_faq($post_data))
	   	  	{
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/add_faq');
	   	  }
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['contact'] = $this->admin_model->get_contact();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/faq/add');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function edit_faq($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->update_faq($post_data,$id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/faq_list');
	   	  }
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['faq'] = $this->admin_model->get_faq_detail($id);
			$this->load->view('admin/header',$data);
			$this->load->view('admin/faq/edit');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function faq_list()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['faqs'] = $this->admin_model->get_faqs();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/faq/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function delete_faq($id)
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      if($this->admin_model->delete_faq($id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/faq_list');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function active_inactive_faq($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_faq($data,$id);
		$product_status = $this->admin_model->get_faq_detail($id)->status;
		if($product_status ==1)
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

	/********************************FAQ***************************************/

	/********************************ADDITIONAL PAGES**************************/

	public function pages_list()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user'] = $this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $pages = $this->admin_model->get_pages();
	      $temp_array = array();
	      foreach($pages->result() as $page)
	      {
	      	$parent = "";
	      	$parent = @$this->admin_model->get_page_data($page->parent)->name;
	      	$page->parent_name = $parent;
	      	$temp_array[] = $page;
	      }
	      $data['pages'] = $temp_array;
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/pages/list',$data);
	      $this->load->view('admin/footer');
	    }
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_page()
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] =1;
	   	  	//echo "<prE>"; print_r($post_data); die();
	   	  	if($this->admin_model->add_page($post_data))
	   	  	{
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/add_page');
	   	  }
	   	  	$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  	$data['pages'] = $this->admin_model->get_parent_pages();
	   		$data['user'] = $this->session->userdata('username');
			$this->load->view('admin/header',$data);
			$this->load->view('admin/pages/add');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function edit_page($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->update_page($post_data,$id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/edit_page/'.$id);
	   	  }
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['page'] = $this->admin_model->get_page_data($id);
			$data['pages'] = $this->admin_model->get_parent_pages();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/pages/edit');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	/********************************ADDITIONAL PAGES**************************/

	/********************************SLIDER************************************/
	public function list_slides()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user'] = $this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['slides'] = $this->admin_model->get_slides();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/slider/list',$data);
	      $this->load->view('admin/footer');
	    }
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_slide()
	{
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] =1;
	   	  	$id = $this->admin_model->add_slide($post_data);
	   	  	if($id!=0)
	   	  	{
	   	  		//echo $id; die();
	   	  		$this->do_upload($id,'slider');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	
	   	  	redirect('admin/add_slide');
	   	  }
	   		$data['user'] = $this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/slider/add');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function edit_slide($id)
	{
		$data['slide'] = $slide = $this->admin_model->get_slide_detail($id);
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	
	   	  	if($this->admin_model->update_slide($post_data,$id))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{

	   	  			unlink('images/slider/'.$slide->img);

	   	  			$this->do_upload($id,'slider');
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	
	   	  	redirect('admin/list_slides');
	   	  }
	   	  	
	   		$data['user'] = $this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/slider/edit');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function delete_slide($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	  $data['slide'] = $slide = $this->admin_model->get_slide_detail($id);
	      if($this->admin_model->delete_slide($id))
	      {
	      	unlink('images/slider/'.$slide->img);
	      	$this->session->set_flashdata('success','Deleted Successfully.');
	      }
	      else
	      {
	      	$this->session->set_flashdata('error','Some error occured.');
	      }
	      redirect('admin/list_slides');
	    }
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function active_inactive_slide($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_slide($data,$id);
		$product_status = $this->admin_model->get_slide_detail($id)->status;
		if($product_status ==1)
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

	/********************************SLIDER************************************/

	public function list_orders()
	{
		if($this->session->userdata('username'))
	   	{
	      	$data['user']=$this->session->userdata('username');
			$orders = $this->admin_model->get_orders();
			$temp_array = array();
			$i=0;
			foreach($orders->result() as $order)
			{
				$order_data = $this->admin_model->get_order_by_orderno($order->orderno);
				$temp_array[$i]['name'] = $order_data->name;
				$temp_array[$i]['contact'] = $order_data->contact;
				$temp_array[$i]['emailid'] = $order_data->emailid;
				$temp_array[$i]['order_id'] = $order_data->oid;
				$temp_array[$i]['orderno'] = $order_data->orderno;
				$temp_array[$i]['datetime'] = $order_data->odate;
				$temp_array[$i]['status'] = $order_data->status;
				$i++;
			}
			$data['orders'] = $temp_array;
			$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$this->load->view('admin/header',$data);
		  	$this->load->view('admin/order_list',$data);
		  	$this->load->view('admin/footer');
		}
		else
		{
			redirect('admin/index');
		}	
	}

	public function change_order_status($order_id,$status)
	{
		$orderno = $this->admin_model->get_order_detail($order_id)->orderno;
		$data = array('status'=>$status);
		$this->db->where('orderno',$orderno);
		$this->db->update('manage_orders',$data);

		$order_status = $this->admin_model->get_order_detail($order_id)->status;
		if($order_status==0){echo '<strong>Cancelled</strong>';}
        elseif($order_status==1){echo '<strong>Confirmed</strong>';}
        elseif($order_status==2){echo '<strong>Processed</strong>';}
        elseif($order_status==3){echo '<strong>Shipped</strong>';}
        elseif($order_status==4){echo '<strong>Delievered</strong>';}
	}

	public function order_detail($order_id)
	{
		if($this->session->userdata('username'))
	   	{
	   		$orderno = $this->admin_model->get_order_detail($order_id)->orderno;
	      	$data['user']=$this->session->userdata('username');
			$data['orders'] = $this->admin_model->get_order_by_orderno_all($orderno);
			$r=$this->session->userdata('role_id');
	      	$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  	$data['menu'] = $this->main_model->get_menu();
		  	$data['sub_menu'] = $this->main_model->get_sub_menu();
			$this->load->view('admin/header',$data);
		  	$this->load->view('admin/order_detail',$data);
		  	$this->load->view('admin/footer');
		}
		else
		{
			redirect('admin/index');
		}
	}

	public function edit_home_page()
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['home'] = $this->admin_model->get_homepage();
	   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	  	{
		   		$post_data = $this->input->post();
		   		if($this->admin_model->update_home_page($post_data,$id=1))
		   		{
		   			if(@$_FILES['img1']['name']!="")
		   	  		{
		   	  			unlink('images/content/'.$data['home']->img1);
		   	  			$this->do_upload('1','content','img1');
		   	  		}
		   	  		if(@$_FILES['img2']['name']!="")
		   	  		{

		   	  			unlink('images/content/'.$data['home']->img2);

		   	  			$this->do_upload('1','content','img2');
		   	  		}
		   	  		$this->session->set_flashdata('success','Updated Successfully.');
		   		}
		   		else
		   		{
		   			$this->session->set_flashdata('error','Some error occured.');
		   		}
	   	  		
	   	  		redirect('admin/edit_home_page');
			}

			
				
		   		//echo "<pre>"; print_r($data['home']); die();
				$r=$this->session->userdata('role_id');
	    		$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  		$data['menu'] = $this->main_model->get_menu();
		  		$data['sub_menu'] = $this->main_model->get_sub_menu();
		      	$data['user']=$this->session->userdata('username');
				$this->load->view('admin/header',$data);
			  	$this->load->view('admin/home_page',$data);
			  	$this->load->view('admin/footer');
			
		}
		else
		{
			redirect('admin/index');
		}
	}


	public function upload_logos()
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['logos'] = $logos = $this->admin_model->logos();
	   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	  	{
	   	  		$path = './images/logo/';

		   		if (@$_FILES['website_logo']['name']!="") {
		   			if ($website_logo = $this->uploadFiles($path,'website_logo')) {
		   					unlink('images/logo/'.$logos->website_logo);
		   					$update['website_logo'] = $website_logo;
		   			}  
		   		}

		   		if (@$_FILES['admission_form']['name']!="") {
		   			if ($admission_form = $this->uploadFiles($path,'admission_form')) {
		   					unlink('images/logo/'.$logos->admission_form);
		   					$update['admission_form'] = $admission_form;
		   			}  
		   		}

		   		if (@$_FILES['hall_ticket']['name']!="") {
		   			if ($hall_ticket = $this->uploadFiles($path,'hall_ticket')) {
		   					unlink('images/logo/'.$logos->hall_ticket);
		   					$update['hall_ticket'] = $hall_ticket;
		   			}  
		   		}

		   		if (@$update) {
		   			if ($this->admin_model->update_logos($update)) {
		   				$saved = 1;
		   			}
		   		}

		   		if (@$saved==1) {
		   			$this->session->set_flashdata('success','Updated Successfully.');
		   		}
		   		else{
		   			$this->session->set_flashdata('error','Some error occured.');
		   		}
		   		
	   	  	redirect('admin/upload_logos');
			}
			else{
				//echo "<pre>"; print_r($data['home']); die();
				$r=$this->session->userdata('role_id');
    		$data['role']=$this->main_model->get_data_id('manage_role',$r);
	  		$data['menu'] = $this->main_model->get_menu();
	  		$data['sub_menu'] = $this->main_model->get_sub_menu();
		    $data['user']=$this->session->userdata('username');
				$this->load->view('admin/header',$data);
		  	$this->load->view('admin/upload_logos',$data);
		  	$this->load->view('admin/footer');
			}
		}
		else
		{
			redirect('admin/index');
		}
	}


	function logo_image()
	{
		//echo $product_id; die();
		$image = $this->admin_model->get_logo(); ?>
		<div id="logo_msg">
			<img style="width:200px" src="<?=base_url()?>images/logo/<?=$image->logo_img?>">
		</div>
		<br><br><hr>
		
			<form id="logo_form" method="post" enctype="multipart/form-data">
				<input type="file" name="userfile" id="userfile"><br>
				<input class="btn btn-success" type="submit" name="" value="Upload">
			</form>
		
		

		<script>
  $(document).ready(function (e){
         
$("#logo_form").on('submit',(function(e){
$("#logo_msg").html('<h1 class="text-center" style="color:red;font-size:25px">LOADING....</h1>');
e.preventDefault();
$.ajax({
url: "<?=base_url()?>index.php/admin/upload_logo",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$("#logo_msg").html(data);
//$("#enquiry_form")[0].reset();
},
error: function(){}             
});
}));
});
  </script>

		<?php 
	}

	public function upload_logo()
	{
		$logo = $this->admin_model->get_logo();
		if($this->admin_model->delete_logo())
		{
			unlink('images/logo/'.$logo->logo_img);
			$this->do_upload('1','logo');
			$logo = $this->admin_model->get_logo();
			echo '<h3 style="color:green">Uploaded Successfully.</h3>';
			echo '<img style="width:200px" src="'.base_url().'images/logo/'.$logo->logo_img.'">';
		}
		else
		{
			echo '<h3 style="color:red">Some error occured2.</h3>';
			echo '<img style="width:200px" src="'.base_url().'images/logo/'.$logo->logo_img.'">';
		}
		
	}

	public function list_enquiries()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  $data['enquiries'] = $this->admin_model->get_enquiries();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/enquiries/list',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function list_get_call()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  $data['enquiries'] = $this->admin_model->list_get_call();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/get_call/list',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function log_out()
	{
	   $this->session->unset_userdata('username');
	   $this->session->unset_userdata('user_id');
	   redirect('admin/index');
	}

	public function list_head_values()
	{
		if($this->session->userdata('username'))
	   {
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['head_values'] = $this->admin_model->list_head_values();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/head_values/list',$data);
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
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['heads'] = $this->admin_model->list_heads();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/head_values/add',$data);
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
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['head_value'] = $this->admin_model->get_head_value_data($id);
	   	  $data['heads'] = $this->admin_model->list_heads();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/head_values/edit',$data);
		  $this->load->view('admin/footer');
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



	public function list_heads()
	{
		if($this->session->userdata('username'))
	   {  
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['heads'] = $this->admin_model->list_heads();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/heads/list',$data);
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
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['steps'] = $this->admin_model->list_steps();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/heads/add',$data);
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
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['head'] = $this->admin_model->get_head_data($id);
	   	  $data['steps'] = $this->admin_model->list_steps();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/heads/edit',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	

	public function list_enquiry()
	{
		if($this->session->userdata('username'))
	   {  
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['enquiry'] = $this->admin_model->list_enquiry();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/enquiries/list',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function list_steps()
	{
		if($this->session->userdata('username'))
	   {
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['steps'] = $this->admin_model->list_steps();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/step/list',$data);
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
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/step/add',$data);
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
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	   	  $data['step'] = $this->admin_model->get_step_data($id);

	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/step/edit',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	
	/********************************PRODUCT MASTER**************************************/
	public function list_social_media()
	{
		if($this->session->userdata('username'))
	   	{
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
		  $data['social_media'] = $this->admin_model->get_social_media();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/social_media/list',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function add_social_media()
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->add_social_media($post_data))
	   	  	{
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  		redirect('admin/list_social_media/');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Sorry Some Error Occured.');
	   	  		redirect('admin/add_social_media/');
	   	  	}
	   	  }
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/social_media/add');
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function edit_social_media($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	
	   	  	if($this->admin_model->update_social_media($post_data,$id))
	   	  	{
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  		redirect('admin/list_social_media/');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some Error Occured.');
	   	  		redirect('admin/edit_social_media/'.$id);
	   	  	}
	   	  	redirect('admin/list_social_media');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $data['social_media'] = $this->admin_model->get_social_media($id);
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  $this->load->view('admin/header',$data);
		  $this->load->view('admin/social_media/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	}

	public function activate_inactive_social_m($id,$status)
	{
		$post_data = array('status'=>$status);
		$this->admin_model->update_social_media($post_data,$id);
		$status = $this->admin_model->get_social_media($id)->status;
		if($status ==1)
		{ ?>
			<button class="btn btn-success" onclick="activate_inactive_social_m(<?=$id?>,0)">Activated</button>
		<?php 
		}
		else
		{ ?>
			<button class="btn btn-danger" onclick="activate_inactive_social_m(<?=$id?>,1)">Not Activated</button>
		<?php
		}
	}


	public function delete_social_media($id)
	{
		if($this->session->userdata('username'))
	   	{
	   	  if($this->admin_model->delete_social_media($id))
	   	  {
	   	  	$this->session->set_flashdata('success','Deleted Successfully.');
	   	  	redirect('admin/list_social_media/');
	   	  }
	   	  else
	   	  {
	   	  	$this->session->set_flashdata('error','Some Error Occured.');
	   	  	redirect('admin/list_social_media/');
	   	  }

	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	}
	
	
	// ***********flash news***************

	public function list_flash_news()
	{
		if($this->session->userdata('username'))
		   {
		   	  $r=$this->session->userdata('role_id');
	      	  $data['role']=$this->main_model->get_data_id('manage_role',$r);
		      $data['menu'] = $this->main_model->get_menu();
		      $data['sub_menu'] = $this->main_model->get_sub_menu();
		   	  $data['f_news'] = $this->admin_model->list_flash_news();
		      $data['user']=$this->session->userdata('username');
		      $this->load->view('admin/header',$data);
			  $this->load->view('admin/flash_news/list',$data);
			  $this->load->view('admin/footer');
		   }
	   else
		  {
		     redirect('admin/index');
		  }
	}
	public function add_flash_news()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 0;
	   	  		if($this->admin_model->add_flash_news($post_data))
		   	  	{
		   	  		$this->session->set_flashdata('success','Added Successfully.');
		   	  		redirect('admin/list_flash_news');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect('admin/add_flash_news');
		   	  	}
			   	
	   	  }
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/flash_news/add',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}
	public function edit_flash_news($id)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->edit_flash_news($post_data,$id))
		   	  	{
		   	  		$this->session->set_flashdata('success','Updated Successfully.');
		   	  		redirect('admin/list_flash_news');
		   	  	}
	   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect(base_url()."admin/edit_news/".$id);
		   	  	}
	   	  	 
	   	  }
	   	  $data['f_news'] = $this->admin_model->get_flash_news_data($id);
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/flash_news/edit',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function delete_flash_news($id)
	{
		$del=$this->admin_model->delete_flash_news($id);
		if ($del) 
		{
			$this->session->set_flashdata('success','Deleted Successfully.');
			redirect('admin/list_flash_news');
		}
		else
		{
		   	$this->session->set_flashdata('erorr','Some error occured.');
			redirect('admin/list_flash_news');
		}
	}

	public function active_inactive_flash_news($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->edit_flash_news($data,$id);
		$news_status = $this->admin_model->get_flash_news_data($id)->status;
		if($news_status == 1)
		{ ?>
			<button class="btn btn-success" onclick="active_inactive_flash_news(<?=$id?>,0)">Activated</button>
		<?php 
		}
		else
		{ ?>
			<button class="btn btn-danger" onclick="active_inactive_flash_news(<?=$id?>,1)">Deactivated</button>
		<?php
		}
	}
	

// ***********flash news***************

/********************************ABOUT PAGE************************************/

	public function list_about_page()
	{
		if($this->session->userdata('username'))
	   	{ 
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $data['about'] = $this->admin_model->get_about_page();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/about/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_about_page()
	{
		if($this->session->userdata('username'))
	   	{

	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 0;
	   	  	$q = $this->admin_model->add_about_page($post_data);
	   	  	//echo $q; die();
	   	  	if($q!=0)
	   	  	{
	   	  		$edit_data = array('about_page_id'=>$q);
	   	  		$this->admin_model->update_about_page($edit_data,$q);
	   	  		//echo $this->db->last_query(); die();
	   	  		$this->do_upload($q,'about');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('index.php/admin/add_about_page');
	   	  }
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();

	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/about/add',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }


	public function edit_about_page($id)
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['about'] = $update = $this->admin_model->about_page_detail($id);
	   		// echo "<prE>"; print_r($data['about']); die();
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	//echo "<pre>"; print_r($post_data); die();
	   	  	//$language = $post_data['language'];
	   	  	//unset($post_data['language']);
	   	  	$post_data['about_page_id'] = $id;


	   	  	
	   	  	if($this->admin_model->update_about_page($post_data,$id))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{
	   	  			unlink('images/about/'.$about->image);
	   	  			$this->do_upload($id,'about');
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');

	   	  	$description = str_replace("&"," and ",$post_data['description']);
	   	  	$description = str_replace("'","`",$description);

	   	  	$title = str_replace("&"," and ",$post_data['title']);
	   	  	$title = str_replace("'","`",$title);

	   	  	$meta_title = str_replace("&"," and ",$post_data['meta_title']);
	   	  	$meta_title = str_replace("'","`",$meta_title);

	   	  	$meta_description = str_replace("&"," and ",$post_data['meta_description']);
	   	  	$meta_description = str_replace("'","`",$meta_description);

	   	  	$meta_keywords = str_replace("&"," and ",$post_data['meta_keywords']);
	   	  	$meta_keywords = str_replace("'","`",$meta_keywords);

	   	  	//echo sizeof($language); die();?>
	   	  	<?php 
	   	  	// }}
	   	  	 // die();
	   	  	
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/list_about_page');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  //echo "<pre>"; print_r($data['update']); die();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/about/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	  public function about_page_detail($id)
	{
		$data['about'] = $this->admin_model->about_page_detail($id);
		$this->load->view('admin/about/detail',$data);
	}

	  // public function nishant()
	  // {
	  // 	echo '<pre>'; print_r($_POST);
	  // }

	  public function active_inactive_about_pages($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_update($data,$id);
		$product_status = $this->admin_model->get_update_detail($id)->status;
		if($product_status ==1)
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

	/********************************ABOUT PAGE************************************/






/********************************programs************************************/

	public function list_programs()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['programs'] = $this->admin_model->get_programs();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/program/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_program()
	{
		if($this->session->userdata('username'))
	   	{

	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 0;
	   	  	$q = $this->admin_model->add_program($post_data);
	   	  	//echo $q; die();
	   	  	if($q!=0)
	   	  	{
	   	  		$edit_data = array('about_page_id'=>$q);
	   	  		$this->admin_model->update_program($edit_data,$q);
	   	  		//echo $this->db->last_query(); die();
	   	  		$this->do_upload($q,'program');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('index.php/admin/add_program');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/program/add',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }


	public function edit_program($id)
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['about'] = $update = $this->admin_model->program_detail($id);
	   		// echo "<prE>"; print_r($data['about']); die();
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	//echo "<pre>"; print_r($post_data); die();
	   	  	//$language = $post_data['language'];
	   	  	//unset($post_data['language']);
	   	  	$post_data['about_page_id'] = $id;


	   	  	
	   	  	if($this->admin_model->update_program($post_data,$id))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{
	   	  			unlink('images/program/'.$about->image);
	   	  			$this->do_upload($id,'program');
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');

	   	  	$description = str_replace("&"," and ",$post_data['description']);
	   	  	$description = str_replace("'","`",$description);

	   	  	$title = str_replace("&"," and ",$post_data['title']);
	   	  	$title = str_replace("'","`",$title);

	   	  	$meta_title = str_replace("&"," and ",$post_data['meta_title']);
	   	  	$meta_title = str_replace("'","`",$meta_title);

	   	  	$meta_description = str_replace("&"," and ",$post_data['meta_description']);
	   	  	$meta_description = str_replace("'","`",$meta_description);

	   	  	$meta_keywords = str_replace("&"," and ",$post_data['meta_keywords']);
	   	  	$meta_keywords = str_replace("'","`",$meta_keywords);

	   	  	//echo sizeof($language); die();?>
	   	  	<?php 
	   	  	// }}
	   	  	 // die();
	   	  	
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/list_programs');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  //echo "<pre>"; print_r($data['update']); die();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/program/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	  public function program_detail($id)
	{
		$data['program'] = $this->admin_model->program_detail($id);
		$this->load->view('admin/program/detail',$data);
	}

	  // public function nishant()
	  // {
	  // 	echo '<pre>'; print_r($_POST);
	  // }

	  public function active_inactive_program($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_program($data,$id);
		$product_status = $this->admin_model->program_detail($id)->status;
		if($product_status ==1)
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

	/********************************programs************************************/



/********************************key achievements************************************/

	public function list_achievements()
	{
		if($this->session->userdata('username'))
	   	{
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['achievements'] = $this->admin_model->get_achievements();
	      $this->load->view('admin/header',$data);
	      $this->load->view('admin/achievement/list',$data);
	      $this->load->view('admin/footer');
	  	}
	  	else
	  	{
	  		redirect('admin/index');
	  	}
	}

	public function add_achievement()
	{
		if($this->session->userdata('username'))
	   	{

	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 0;
	   	  	$q = $this->admin_model->add_achievement($post_data);
	   	  	//echo $q; die();
	   	  	if($q!=0)
	   	  	{
	   	  		// $edit_data = array('id'=>$q);
	   	  		// $this->admin_model->update_achievement($edit_data,$q);
	   	  		//echo $this->db->last_query(); die();
	   	  		$this->do_upload($q,'achievements');
	   	  		$this->do_upload($q,'testimonial_file','testimonial_file');
	   	  		$this->session->set_flashdata('success','Added Successfully.');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('index.php/admin/add_achievement');
	   	  }
	      $data['user']=$this->session->userdata('username');
		  $data['states']=$this->admin_model->get_states();
		  $data['achievement_type']=$this->admin_model->get_data_by_status($table_name='achivement_type');
		  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  // echo "<pre>";
		  // print_r($data['achievement_type']->result());
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/achievement/add',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	  function get_cities()
	{
		$state_id=$this->uri->segment(3);
		$cities=$this->admin_model->get_cities($state_id);
		echo "<label>City</label>";
		echo'<select class="form-control" name="city">';
		echo "<option value=''>---Select City---</option>";
			foreach ($cities->result() as $city) 
			{ 
				echo'<option value="'.$city->id.'">';
				echo $city->name;
				echo'</option>';
			}  
		echo'</select>';
	}


	public function edit_achievement($id)
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['achievement'] = $update = $this->admin_model->achievement_detail($id);
	   		// echo "<prE>"; print_r($data['about']); die();
	   	  if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	//echo "<pre>"; print_r($post_data); die();
	   	  	//$language = $post_data['language'];
	   	  	//unset($post_data['language']);
	   	  	// $post_data['about_page_id'] = $id;


	   	  	
	   	  	if($this->admin_model->update_achievement($post_data,$id))
	   	  	{
	   	  		if(@$_FILES['userfile']['name']!="")
	   	  		{
	   	  			unlink('images/achievements/'.$achievement->image);
	   	  			$this->do_upload($id,'achievements');

	   	  		}
	   	  		if(@$_FILES['testimonial_file']['name']!="")
	   	  		{
	   	  			unlink('images/testimonial_file/'.$achievement->testimonial_file);
		   	  		$this->do_upload($id,'testimonial_file','testimonial_file');
	   	  			
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');

	   	  	$description = str_replace("&"," and ",$post_data['description']);
	   	  	$description = str_replace("'","`",$description);

	   	  	$title = str_replace("&"," and ",$post_data['title']);
	   	  	$title = str_replace("'","`",$title);

	   	  	$meta_title = str_replace("&"," and ",$post_data['meta_title']);
	   	  	$meta_title = str_replace("'","`",$meta_title);

	   	  	$meta_description = str_replace("&"," and ",$post_data['meta_description']);
	   	  	$meta_description = str_replace("'","`",$meta_description);

	   	  	$meta_keywords = str_replace("&"," and ",$post_data['meta_keywords']);
	   	  	$meta_keywords = str_replace("'","`",$meta_keywords);

	   	  	//echo sizeof($language); die();?>
	   	  	<?php 
	   	  	// }}
	   	  	 // die();
	   	  	
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Some error occured.');
	   	  	}
	   	  	redirect('admin/list_achievements');
	   	  }
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();

		  $data['states']=$this->admin_model->get_states();
		  $data['cities']=$this->admin_model->get_all_cities();
		  //echo "<pre>"; print_r($data['update']); die();
		   $data['achievement_type']=$this->admin_model->get_data_by_status($table_name='achivement_type');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/achievement/edit',$data);
		  $this->load->view('admin/footer');
	   	}
	   	else
	  	{
	     redirect('admin/index');
	  	}
	  }

	  public function achievement_detail($id)
	{
		$data['achievement'] = $this->admin_model->achievement_detail($id);
		$state_id=$data['achievement']->state;
		$city_id=$data['achievement']->city;
		$type_id=$data['achievement']->type;
		$data['type']=$this->admin_model->get_data_by_id($table_name='achivement_type',$type_id)->title;
		$data['state'] = $this->admin_model->get_data_by_id($table_name='states',$state_id)->name;
		$data['city']=$this->admin_model->get_data_by_id($table_name='cities',$city_id)->name;
		$this->load->view('admin/achievement/detail',$data);

	}

	  // public function nishant()
	  // {
	  // 	echo '<pre>'; print_r($_POST);
	  // }

	  public function active_inactive_achievement($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_achievement($data,$id);
		$product_status = $this->admin_model->get_data_by_id($table_name='achievements',$id)->status;
		if($product_status ==1)
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

	/********************************key achievements************************************/
	
	// ***********Achievement types***************

	public function list_achievement_types()
	{
		if($this->session->userdata('username'))
		   {
		   	  $data['achiev_type'] = $this->admin_model->get_data($table_name='achivement_type');
		      $data['user']=$this->session->userdata('username');
		      $r=$this->session->userdata('role_id');
	      	  $data['role']=$this->main_model->get_data_id('manage_role',$r);
		      $data['menu'] = $this->main_model->get_menu();
		      $data['sub_menu'] = $this->main_model->get_sub_menu();
		      $this->load->view('admin/header',$data);
			  $this->load->view('admin/achievement_type/list',$data);
			  $this->load->view('admin/footer');
		   }
	   else
		  {
		     redirect('admin/index');
		  }
	}
	public function add_achievement_type()
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	$post_data['status'] = 1;
	   	  		if($this->admin_model->add_data($table_name='achivement_type',$post_data))
		   	  	{
		   	  		$this->session->set_flashdata('success','Added Successfully.');
		   	  		redirect('admin/list_achievement_types');
		   	  	}
		   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect('admin/list_achievement_types');
		   	  	}
			   	
	   	  }
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/achievement_type/add',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function check_achiev_type()
	{

		if (!$this->session->userdata('lf_username')) 
		{
	   	  	$data= $this->input->post('title');
	   	  	$table_name='achivement_type';
	   	  	$column_name='title';
	   	  	$ad=$this->admin_model->check_availability($table_name,$column_name,$data);
			if($ad) 
	   	  	{
	   	  		echo "1";
	   	  	}
	   	  	else
	   	  	{
	   	  		echo "2";
	   	  	}
	   }
	  
		else
		{
			redirect('welcome');
		}

	}
	public function edit_achievement_type($id)
	{
		if($this->session->userdata('username'))
	   {
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	  	if($this->admin_model->update_data($table_name='achivement_type',$post_data,$id))
		   	  	{
		   	  		$this->session->set_flashdata('success','Updated Successfully.');
		   	  		redirect('admin/list_achievement_types');
		   	  	}
	   	  	else
		   	  	{
		   	  		$this->session->set_flashdata('erorr','Some error occured.');
		   	  		redirect(base_url()."admin/edit_achievement_type/".$id);
		   	  	}
	   	  	 
	   	  }
	   	  $data['achiv_type'] = $this->admin_model->get_data_by_id($table_name='achivement_type',$id);
	   	  $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $data['user']=$this->session->userdata('username');
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/achievement_type/edit',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function delete_achievement_type($id)
	{
		$del=$this->admin_model->dalete_data($table_name='achivement_type',$id);
		if ($del) 
		{
			$this->session->set_flashdata('success','Deleted Successfully.');
			redirect('admin/list_achievement_types');
		}
		else
		{
		   	$this->session->set_flashdata('erorr','Some error occured.');
			redirect('admin/list_achievement_types');
		}
	}

	public function active_inactive_achievement_types($id,$status)
	{
		$data = array('status'=>$status);
		$this->admin_model->update_data($table_name='achivement_type',$data,$id);
		$status = $this->admin_model->get_data_by_id($table_name='achivement_type',$id)->status;
		if($status == 1)
		{ ?>
			<button class="btn btn-success" onclick="active_inactive_achiev_type(<?=$id?>,0)">Activated</button>
		<?php 
		}
		else
		{ ?>
			<button class="btn btn-danger" onclick="active_inactive_achiev_type(<?=$id?>,1)">Deactivated</button>
		<?php
		}
	}
	

// ***********Achievement types***************


public function edit_registration_page()
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['reg_page'] = $this->admin_model->get_data('registration_page');
	   		if($this->input->server('REQUEST_METHOD')=='POST')
	   	  	{
		   		$post_data = $this->input->post();
		   // 		echo $_FILES['test_syllabus']['name'];
		   // echo $_FILES['registration_info']['name'];
		   // die();
		   		// if($this->admin_model->update_data('registration_page',$post_data,$id=1))
		   		// {
		   			$data = array('admission_test_date' => $post_data['admission_test_date'] );
		   			$this->admin_model->update_data('registration_page',$data,$id=1);
		   			if(@$_FILES['test_syllabus']['name']!="")
		   	  		{
		   	  			unlink('images/registration_page/test_syllabus/'.$data['reg_page']->test_syllabus);
		   	  			$this->do_upload('1','registration_page/test_syllabus','test_syllabus');
		   	  		}
		   	  		if(@$_FILES['registration_info']['name']!="")
		   	  		{

		   	  			unlink('images/registration_page/registration_info/'.$data['reg_page']->registration_info);

		   	  			$this->do_upload('1','registration_page/registration_info','registration_info');
		   	  		}
		   	  		$this->session->set_flashdata('success','Updated Successfully.');
		   		// }
		   		// else
		   		// {
		   		// 	$this->session->set_flashdata('error','Some error occured.');
		   		// }
	   	  		
	   	  		redirect('admin/edit_registration_page');
			}

			
				$r=$this->session->userdata('role_id');
	      		$data['role']=$this->main_model->get_data_id('manage_role',$r);
		  		$data['menu'] = $this->main_model->get_menu();
		  		$data['sub_menu'] = $this->main_model->get_sub_menu();
		   		//echo "<pre>"; print_r($data['home']); die();
		      	$data['user']=$this->session->userdata('username');
				$this->load->view('admin/header',$data);
			  	$this->load->view('admin/registration_page',$data);
			  	$this->load->view('admin/footer');
			
		}
		else
		{
			redirect('admin/index');
		}
	}

// ****** Registration list ******
	public function registration_list($test_date=1)
	{
		if($this->session->userdata('username'))
	   	{
	   		$r=$this->session->userdata('role_id');
	        $data['role']=$this->main_model->get_data_id('manage_role',$r);
		    $data['menu'] = $this->main_model->get_menu();
		    $data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['test'] = $this->main_model->get_data('test');
			if ($test_date==1) 
			{
				$data['reg'] = '';
			}
			else if ($test_date!=0) 
			{
				$data['reg'] = $this->main_model->get_data('admission',
												   array('admission_test_date'=>$test_date,'deleted' => 0));
			}
			// else if($test_date =='')
			// {
				$data['reg'] = $this->main_model->get_data('admission',array('deleted' => 0 ));
			//}
			//print_r($data['reg']);die();
			$data['test_date']=$test_date;
			$data['user']=$this->session->userdata('username');
			$this->load->view('admin/header',$data);
		  	$this->load->view('admin/registration/list',$data);
		  	$this->load->view('admin/footer');
	  	}
		else
		{
			redirect('admin/index');
		}
	}

	public function download_xlsx($test_date)
	{
		$test_date;	
		if ($test_date==1 or $test_date==0) {
			$students=$this->main_model->get_data('admission',array('deleted' => 0 ));
			$test_date="All";
		}
		else
		{
			$students=$this->main_model->get_data('admission',array('deleted' => 0 ,'admission_test_date'=>$test_date));
		}
		



		$columnHeader = '';  
		$columnHeader = "Reg. No." . "\t";  
		$columnHeader = $columnHeader."Student Name" . "\t";  
		$columnHeader = $columnHeader."Father Name" . "\t";  
		$columnHeader = $columnHeader."Mother Name" . "\t";  
		$columnHeader = $columnHeader."DOB" . "\t";  
		$columnHeader = $columnHeader."Gender" . "\t";  
		$columnHeader = $columnHeader."School" . "\t";  
		$columnHeader = $columnHeader."Board" . "\t";  
		$columnHeader = $columnHeader."Mobile No." . "\t";  
		$columnHeader = $columnHeader."Father Mobile No." . "\t";  
		$columnHeader = $columnHeader."Mother Mobile No." . "\t";  
		$columnHeader = $columnHeader."Father Email" . "\t";  
		$columnHeader = $columnHeader."Mother Email" . "\t";  
		$columnHeader = $columnHeader."present Class" . "\t";  
		$columnHeader = $columnHeader."Going Class" . "\t";  
		$columnHeader = $columnHeader."Reg. Date" . "\t";  
		$columnHeader = $columnHeader."Reg. Fee" . "\t";  
		$columnHeader = $columnHeader."Reg. By " . "\t";  
		$columnHeader = $columnHeader."Payment Mode" . "\t";  
		$columnHeader = $columnHeader."Student Address" . "\t"; 
		$setData = '';  
		$n=0;
		foreach ($students as $stu) { $n++;
			$rowData = '"' . $n .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->registration_no .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->student_name .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->father_name .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->mother_name .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->dob .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->gender .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->school . '"' . "\t"; 
			$rowData = $rowData.'"' . $stu->board. '"' . "\t"; 
			$rowData = $rowData.'"' . $stu->mobile_no .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->father_contact_no .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->mother_contact_no .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->father_email .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->mother_email .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->present_class .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->program_code .'"' . "\t"; 
			$rowData = $rowData.'"' . date("d-M-Y", strtotime($stu->submitted_date)) .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->registration_fee .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->reg_by_admin .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->transaction_mode .'"' . "\t"; 
			$rowData = $rowData.'"' . $stu->address .'"' . "\t"; 
			
			$setData .= trim($rowData) . "\n";
		}


		//   while ($rec = mysqli_fetch_row($students)) {  
		//     $rowData = '';  
		//     foreach ($rec as $value) {  
		//         $value = '"' . $value . '"' . "\t";  
		//         $rowData .= $value;  
		//     }  
		//     $setData .= trim($rowData) . "\n";  
		// }  
		  
		header("Content-type: application/octet-stream");  
		header("Content-Disposition: attachment; filename=students-".$test_date.".xls");  
		header("Pragma: no-cache");  
		header("Expires: 0");  

		// echo $columnHeader . "\n" . $setData . "\n";  
		echo ucwords($columnHeader) . "\n" . $setData . "\n";  
	}

	function collect_fee($stu_id)
	{
		$post_data=$this->input->post();
		$post_data['fee_pay_status']=1;
		$post_data['collected_by']=$this->session->userdata('username');
		// print_r($post_data); die();

		$this->check_session();
		// $post_data= $this->input->post();
		
		$this->db->where('id',$stu_id);
		if($this->db->update('admission',$post_data))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function registration_detail($id)
	{
		if($this->session->userdata('username'))
	   	{
			$data['reg'] = $this->admin_model->get_data_by_id('admission',$id);
			$data['user']=$this->session->userdata('username');
			// $this->load->view('admin/header',$data);
		  	$this->load->view('admin/registration/details',$data);
		  	// $this->load->view('admin/footer');
	  	}
		else
		{
			redirect('admin/index');
		}
	}

	function update_reg($stu_id)
	{
		$this->check_session();
		$post_data=$this->input->post();

		// echo "<pre>";
		// print_r($post_data);
		// echo "</pre>";

		// die();
		
		$this->db->where('id',$stu_id);
		if($this->db->update('admission',$post_data))
		{
			echo '<div class="alert alert-success fade in">
					Updated Successfully.
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  	  </div>';
		}
		else
		{
			echo '<div class="alert alert-danger fade in">
					Some error occured.
			      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  	  </div>';
		}
	}


	
	

// ****** Registration list ******

// ***** career ******
	function career_list()
	{
		if($this->session->userdata('username'))
	   	{
			$data['career'] = $this->admin_model->career_data();

			// echo count($data['career']);
			// echo "<pre>";
			// print_r($data['career']);
			// echo "</pre>";
			// die();
			$r=$this->session->userdata('role_id');
	        $data['role']=$this->main_model->get_data_id('manage_role',$r);
		    $data['menu'] = $this->main_model->get_menu();
		    $data['sub_menu'] = $this->main_model->get_sub_menu();
			$data['user']=$this->session->userdata('username');
			$this->load->view('admin/header',$data);
		  	$this->load->view('admin/career/list');
		  	$this->load->view('admin/footer');
	  	}
		else
		{
			redirect('admin/index');
		}
	}

	public function full_details($id)
	{  
		if($this->session->userdata('username'))
	   	{   
  			$data['p_info']=$this->admin_model->get_data_by_id('personal_information',$id);
  			$data['emp']=$emp=$this->admin_model->get_data_multi_column('employment',array('p_id'=>$id))->result();
  			// echo "<pre>";
  			// print_r($data['employment']);
  			// echo "</pre>";
  			// echo $emp[0]->emp_name;
  			$data['education']=$this->admin_model->get_data_multi_column('education',array('p_id'=>$id))->result();
  			// echo "<pre>";
  			// print_r($data['education']);
  			// echo "</pre>";


  			// die();
			$this->load->view('admin/career/career_form',$data);
		}
		else
		{
			redirect('admin/index');
		}
	}


// ***** career ******




function delete($table_name,$id)
{
	if($this->session->userdata('username'))
	   	{
	   		if($this->admin_model->dalete_data($table_name='results',$id))
		   	{
		   	  	$this->session->set_flashdata('success','Deleted Successfully.');
		   	  	redirect('admin/list_results');
		   	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('erorr','Some error occured.');
	   	  		redirect('admin/list_results');
	   	  	}
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
}




// ******************* Active or Inactive  **********************
	public function active_inactive($table_name,$id,$status)
	{
		// echo $table_name.$id.$status;
		// die();
		$data = array('status'=>$status);
		$this->admin_model->update_data($table_name,$data,$id);
		$active = $this->admin_model->get_data_by_id($table_name,$id)->status;
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
// ******************* Active or Inactive  **********************
// ************* Hall Ticket *****************8
	public function hall_ticket($id)
	{
		// if($this->session->userdata('username'))
	 //   	{
			$data['student']=$student =$this->admin_model->get_data_by_id('admission',$id);
			if ($student->deleted==0) {
				
			if($student->fee_pay_status==1){
				$d1=array('test_date'=>$student->admission_test_date);
				$data['time']=$time=$this->admin_model->get_data_multi_column('test',$d1)->row();

				$data['time1']= $time->paper_1_time;
				$data['time2']= $time->paper_2_time;

				if ($student->registration_fee) 
				{
					$data['registration_fee']=$student->registration_fee;
					// echo "string";
				}
				else
				{
					
				}

				// echo "<pre>"; print_r($data['registration_fee']); echo "</pre>"; 
				// echo "<pre>"; print_r($data['time']); echo "</pre>"; die();

				$this->load->view('admin/registration/hall_ticket',$data);
			// }
			// else
			// {
			// 	echo "Admission Test Fee Not Paid.";
			// }
			
		}
		else
	   	{
	   		// $this->load->view('admin/access_denied_page');
	   		echo "Admission Test Fee Not Paid.";
	   	}

	   }
	   else
	   {
	   		echo "Application Cancelled By Jee Expert.";
	   }
	}


// ************* Hall Ticket *****************8

// **************sitemaps************//

	function sitemap()
	{
		if($this->session->userdata('username'))
	   	{
	   		$data['user']=$this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	        $data['role']=$this->main_model->get_data_id('manage_role',$r);
		    $data['menu'] = $this->main_model->get_menu();
		    $data['sub_menu'] = $this->main_model->get_sub_menu();
	      	$this->load->view('admin/header',$data);
		  	$this->load->view('admin/sitemap',$data);
		  	$this->load->view('admin/footer');
	   	}
	   	else
	   	{
	   		redirect('admin/index');
	   	}
	}

	function create_sitemap()
	{ 
		//$dir = "/var/www/html/global_seo/sitemaps";
		
		/***************************SITEMAP XML CODE****************************************/
		
		$xmlString = $this->admin_model->sitemap_data();
		// echo "<pre>";
		// print_r($xmlString);
		// die();
		$dom = new DOMDocument;
		$dom->preserveWhiteSpace = FALSE;
		$dom->loadXML($xmlString);
		// $dom->save('C:/xampp/htdocs/jee_expert/sitemaps/sitemap.xml');
		$dom->save('/var/www/html/jee_expert/sitemaps/sitemap.xml');

		/***************************SITEMAP XML CODE****************************************/

		
		$this->session->set_flashdata('success','Successfully Created Sitemap File');
		redirect('admin/sitemap');	
	}

	function update_sitemap()
	{ 
		//$dir = "/var/www/html/global_seo/sitemaps";
		
		/***************************SITEMAP XML CODE****************************************/
		
		$xmlString = $this->admin_model->sitemap_data();
		// echo "<pre>";
		// print_r($xmlString);
		// die();
		$dom = new DOMDocument;
		$dom->preserveWhiteSpace = FALSE;
		$dom->loadXML($xmlString);
		// $dom->save('C:/xampp/htdocs/jee_expert/sitemaps/sitemap.xml');
		$dom->save('/var/www/html/jee_expert/sitemaps/sitemap.xml');
		/***************************SITEMAP XML CODE****************************************/
		
	}


// **************sitemaps************//

	/**********************************UPDATE URL***********************************/

	// public function update_all_products_url()
	// {
	// 	$products = $this->db->get('products');
	// 	$total = count($products->result_array());
	// 	$count = 0;
	// 	echo 'TOTAL : '.$total;
	// 	echo '<br>';
	// 	foreach($products->result() as $pr)
	// 	{
	// 		$p_name = $pr->name;
	// 		// $product_name1 = trim($p_name);
	// 		// $product_name = preg_replace("/[^a-zA-Z 0-9]+/", "", $product_name1);
	// 		// $output =  str_replace(' ', '-', $product_name);

	// 		$url=	preg_replace('/[^A-Za-z0-9\-]/', ' ',$p_name );
	// 		$url=  preg_replace("/\s+/", " ", $url);
	// 		$url = trim($url);
	// 		$url = str_replace(' ', '-', $url);

	// 		$data = array('url'=>$url);

	// 		$this->db->where('id',$pr->id);
	// 		$this->db->update('products',$data);
	// 		$count++;
	// 	}

	// 	echo 'UPDATED : '.$count;
	// }

	// public function update_all_categories_url()
	// {
	// 	$products = $this->db->get('product_categories');
	// 	$total = count($products->result_array());
	// 	$count = 0;
	// 	echo 'TOTAL : '.$total;
	// 	echo '<br>';
	// 	foreach($products->result() as $pr)
	// 	{
	// 		$p_name = $pr->name;
	// 		// $product_name1 = trim($p_name);
	// 		// $product_name = preg_replace("/[^a-zA-Z 0-9]+/", "", $product_name1);
	// 		// $output =  str_replace(' ', '-', $product_name);

	// 		$url=	preg_replace('/[^A-Za-z0-9\-]/', ' ',$p_name );
	// 		$url=  preg_replace("/\s+/", " ", $url);
	// 		$url = trim($url);
	// 		$url = str_replace(' ', '-', $url);

	// 		$data = array('url'=>$url);

	// 		$this->db->where('id',$pr->id);
	// 		$this->db->update('product_categories',$data);
	// 		$count++;
	// 	}

	// 	echo 'UPDATED : '.$count;
	// }

	// public function update_all_pages_url()
	// {
	// 	$products = $this->db->get('pages');
	// 	$total = count($products->result_array());
	// 	$count = 0;
	// 	echo 'TOTAL : '.$total;
	// 	echo '<br>';
	// 	foreach($products->result() as $pr)
	// 	{
	// 		$p_name = $pr->name;
	// 		// $product_name1 = trim($p_name);
	// 		// $product_name = preg_replace("/[^a-zA-Z 0-9]+/", "", $product_name1);
	// 		// $output =  str_replace(' ', '-', $product_name);

	// 		$url=	preg_replace('/[^A-Za-z0-9\-]/', ' ',$p_name );
	// 		$url=  preg_replace("/\s+/", " ", $url);
	// 		$url = trim($url);
	// 		$url = str_replace(' ', '-', $url);

	// 		$data = array('url'=>$url);

	// 		$this->db->where('id',$pr->id);
	// 		$this->db->update('pages',$data);
	// 		$count++;
	// 	}

	// 	echo 'UPDATED : '.$count;
	// }

	// public function update_all_wallpost_url()
	// {
	// 	$products = $this->db->get('updates');
	// 	$total = count($products->result_array());
	// 	$count = 0;
	// 	echo 'TOTAL : '.$total;
	// 	echo '<br>';
	// 	foreach($products->result() as $pr)
	// 	{
	// 		$p_name = $pr->title;
	// // 		$product_name1 = trim($p_name);
	// // 		$product_name = preg_replace("/[^a-zA-Z 0-9]+/", "", $product_name1);
	// // 		$output =  str_replace(' ', '-', $product_name);

	// 		$url=	preg_replace('/[^A-Za-z0-9\-]/', ' ',$p_name );
	// 		$url=  preg_replace("/\s+/", " ", $url);
	// 		$url = trim($url);
	// 		$url = str_replace(' ', '-', $url);
	// 		$data = array('url'=>$url);
	// 		$this->db->where('id',$pr->id);
	// 		$this->db->update('updates',$data);
	// 		$count++;
	// 	}

	// 	echo 'UPDATED : '.$count;
	// }


	/**********************************UPDATE URL***********************************/






	function test()
	{
		$test_date='06-01-2019';
		$dd=date();
		echo $mydate = date("d-m-Y",$dd);  
		// echo $d=$test_date-$mydate;
		// if ($d>=4) 
		// {
		// 	echo '1';
		// }
		// elseif ($d>=2) 
		// {
		// 	echo '2';
		// }
		// else
		// {
		// 	echo '3';
		// }
	}

	public function export()
	{
		echo "string";

    	$this->load->dbutil();
    	$this->load->helper('download');
    	$query = $this->admin_model->get_data('admission');
    	$data = $this->dbutil->csv_from_result($query, '/t');
    	force_download('CSV_Report.csv', $data);
		
	}

	public function time_table()
	{
		$data['time_table'] = $this->admin_model->get_time_table();
		$t_table1=$this->db->get_where('time_table',array('id'=>1))->row();
		$t_table2=$this->db->get_where('time_table',array('id'=>2))->row();
		if($this->session->userdata('username'))
	   	{
	   	if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {
	   	  	$post_data = $this->input->post();
	   	
	   	  
	   	  		if(@$_FILES['file1']['name']!="")
	   	  		{
	   	  			
	   	  			$target_dir = "uploads/";
					$file = explode(".",$_FILES['file1']["name"]);
					$extension = end($file);
					$file_name_full = time().'time_table.'.$extension;
					$target_file = $target_dir . basename($file_name_full);
					move_uploaded_file($_FILES['file1']["tmp_name"], $target_file);
					if($this->admin_model->update_data('time_table',array('file_url'=>$file_name_full),1))
					{
						 unlink('uploads/'.$t_table1->file_url);

					}
	   	  		}
	   	  		if(@$_FILES['file2']['name']!="")
	   	  		{
	   	  			$target_dir2 = "uploads/";
					$file2 = explode(".",$_FILES['file2']["name"]);
					$extension2 = end($file2);
					$file_name_full2 = time().'TimeTable.'.$extension2;
					$target_file2 = $target_dir2 . basename($file_name_full2);
					move_uploaded_file($_FILES['file2']["tmp_name"], $target_file2);
					if($this->admin_model->update_data('time_table',array('file_url'=>$file_name_full2),2))
					{
						unlink('uploads/'.$t_table2->file_url);
					}
	   	  		}
	   	  		$this->session->set_flashdata('success','Updated Successfully.');
	   	  
	   	  	// else
	   	  	// {
	   	  	// 	$this->session->set_flashdata('error','Some error occured.');
	   	  	// }
	   	  	
	   	  	redirect('admin/time_table');
	   	  }
	   	  	
	   		$data['user'] = $this->session->userdata('username');
	   		$r=$this->session->userdata('role_id');
	        $data['role']=$this->main_model->get_data_id('manage_role',$r);
		    $data['menu'] = $this->main_model->get_menu();
		    $data['sub_menu'] = $this->main_model->get_sub_menu();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/time_table/edit');
			$this->load->view('admin/footer');
		}
		else
	  	{
	     redirect('admin/index');
	  	}
	}

	function time_table_order($id,$value)
	{
		if ($value==1) 
		{
			$this->db->where('id',$id);
			$this->db->update('time_table',array('order'=>1));

			$this->db->where('id!=',$id);
			$this->db->update('time_table',array('order'=>2));
		}
		else
		{
			$this->db->where('id',$id);
			$this->db->update('time_table',array('order'=>2));

			$this->db->where('id!=',$id);
			$this->db->update('time_table',array('order'=>1));
		}
	}

	
	public function change_pass()
	{  
	    
	   if($this->session->userdata('username'))
	   {
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/change_pass',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function change_password() {
		//$this->load->library('form_validation');
		$old_pass = $this->input->post('old_pass');
		$new_pass = $this->input->post('pass');
		$confirm_pass = $this->input->post('con_pass');
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->get_where('admin', array('id' => $user_id));
        $row = $query->row(); 
		$current_password = $row->password;
		$this->form_validation->set_rules('pass', 'New Password', 'required|max_length[8]');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|max_length[8]');
		if ($this->form_validation->run() == FALSE) {
			$response = array('status' => 'error', 'message' => validation_errors());
			echo json_encode($response);
			return;
		}
		if ($current_password !== $old_pass) {
			$response = array('status' => 'error', 'message' => 'Old password is incorrect');
			echo json_encode($response);
			return;
		}

		if ($new_pass !== $confirm_pass) {
			$response = array('status' => 'error', 'message' => 'Passwords do not match');
			echo json_encode($response);
			return;
		}
		if ($new_pass !== $confirm_pass) {
			$response = array('status' => 'error', 'message' => 'Passwords do not match');
			echo json_encode($response);
			return;
		}

		$data = array(
			'password' => $new_pass,
		);
		$this->db->where('id', $user_id);
		$this->db->update('admin', $data);
		$updated_id = $this->db->affected_rows() > 0 ? $user_id : null;
		
		if ($updated_id !== null) {
			$this->session->sess_destroy();
			$response = array('status' => 'success', 'message' => 'Password changed successfully');
			echo json_encode($response);
			return;
		} else {
			$response = array('status' => 'error', 'message' => 'Failed to change password');
			echo json_encode($response);
			return;
		}
		
	}

	public function profile()
	{  
	    
	   if($this->session->userdata('username'))
	   {
	      $data['user']=$this->session->userdata('username');
	      $r=$this->session->userdata('role_id');
	      $data['role']=$this->main_model->get_data_id('manage_role',$r);
		  $data['menu'] = $this->main_model->get_menu();
		  $data['sub_menu'] = $this->main_model->get_sub_menu();
		  $user_id = $this->session->userdata('user_id');
		  $query = $this->db->get_where('admin', array('id' => $user_id));
          $data['row'] = $query->row(); 
	      $this->load->view('admin/header',$data);
		  $this->load->view('admin/profile',$data);
		  $this->load->view('admin/footer');
	   }
	   else
	  {
	     redirect('admin/index');
	  }
	}

	public function update_profile() {
		$response = array(
			'status' => 'error',
			'message' => 'Profile not updated'
		);
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->get_where('admin', array('id' => $user_id));
		$row = $query->row(); 

		$config['file_name'] = rand(10000, 10000000000);
		$config['upload_path'] = UPLOAD_PATH.'admin/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|webp';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!empty($_FILES['photo']['name'])) {
			$_FILES['photos']['name'] = $_FILES['photo']['name'];
			$_FILES['photos']['type'] = $_FILES['photo']['type'];
			$_FILES['photos']['tmp_name'] = $_FILES['photo']['tmp_name'];
			$_FILES['photos']['size'] = $_FILES['photo']['size'];
			$_FILES['photos']['error'] = $_FILES['photo']['error'];
			if ($this->upload->do_upload('photos')) {
				$image_data = $this->upload->data();
				$fileName = "admin/" . $image_data['file_name'];
			}
		  $photo=  $data['photo'] = $fileName;
		} else {
			$photo= $row->image;
		}

		 $name = $this->input->post('name');
		 $email = $this->input->post('email');
		 $this->db->where('id', $user_id);
		 $this->db->update('admin', ['image'=>$photo,'name' => $name, 'email' => $email]);
		 $updated_id = $this->db->affected_rows() > 0 ? $user_id : null;
		 if ($updated_id !== null) {
		 $response = array(
			'status' => 'success',
			'message' => 'Profile updated successfully'
		);
     	}else{
			$response = array(
				'status' => 'error',
				'message' => 'Profile not updated'
			);
		}
		echo json_encode($response);
	}
	

	
    public function email_otp()
	{  
		$email=$_POST['email'];
		$this->db->delete('admin_otp', array('email' => $email));
		if(isset($_POST['email']) && $_POST['email']!==''){
			$check_existing_record = $this->admin_model->email_exist($_POST['email']);
			if($check_existing_record){
				$otp=mt_rand(100000, 999999);
				$_SESSION['otp']  = $otp;
				$data =array(
				      'otp'=>$otp,
					  'email'=>$_POST['email'],
				);

				if($this->admin_model->updateRow($email,$data))
				{
					//code to send the otp to the mobile number will be placed here
					if(TRUE)
					{
						$return['res'] = 'success';
						$return['msg'] = 'Otp Send Your Mobile Number';
                            $message = "Password forgot otp.".$otp;
							$email = $_POST['email'];
							$subject = "Password forgot otp.";
							sendMail($message,$email,$subject);
					}
					else
					{
						$return['res'] = 'error';
						$return['msg'] = "Message could not be sent.";	
					}
				}
				else
				{
					$return['res'] = 'error';
						$return['msg'] = "Otp could not be generated.";	
				}
               
			}
			else
			{
				$return['res'] = 'error';
			    $return['msg'] =  "Email  address does not exist.";
			}
		}
		else
		{
			$return['res'] = 'error';
	    	$return['msg'] =  "email address not received.";
		}
		echo json_encode($return);
		return TRUE;
	}
    public function check_otp()
	{
		$otp=$_POST['otp'];
		if(isset($_POST['otp']) && $_POST['otp']!==''){
			
			  $check_existing_otp = $this->admin_model->otp_exist($_POST['otp']); 
			  if($check_existing_otp)
			  {
				$return= 1;
			  }else{
				$return= 0;
			  }

		}else
		{
			$return['res'] = 'error';
	    	$return['msg'] =  "otp not received.";
		}
		echo json_encode($return);
		return TRUE;
		
}


public function FinalForgot()
{
    $return['res'] = 'error';
    $return['msg'] = 'Not Saved!';
    $saved = 0;

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        // Check if password and confirm password match
        if ($_POST['password'] == $_POST['cpassword']) {
            $data = array(
                'password' => $_POST['password']
            );
            $email = $this->input->post('email');
            $this->db->where('email', $email);
            $this->db->update('admin', $data);
            $this->db->delete('admin_otp', array('email' => $email));
            
            $saved = 1;
        } else {
            $return['res'] = 'error';
            $return['msg'] = 'Password and Confirm Password do not match.';
        }
    }
    
    if ($saved == 1) {
        $return['res'] = 'success';
        $return['msg'] = 'Your password has been reset successfully.';
    }
    echo json_encode($return);
    return TRUE;
}

public function add_discount()
{  
	
   if($this->session->userdata('username'))
   {
	  $data['user']=$this->session->userdata('username');
	  $r=$this->session->userdata('role_id');
	  $data['role']=$this->main_model->get_data_id('manage_role',$r);
	  $data['menu'] = $this->main_model->get_menu();
	  $data['sub_menu'] = $this->main_model->get_sub_menu();
	  $user_id = $this->session->userdata('user_id');
	  $data['Discount']=$this->db->get('discount_master')->result();
	  $this->load->view('admin/header',$data);
	  $this->load->view('admin/discount_master/add_discount',$data);
	  $this->load->view('admin/footer');
   }
   else
  {
	 redirect('admin/index');
  }
}



function manage_Discount($id=0)
	{	
		$this->check_session();
		if ($this->input->server('REQUEST_METHOD')=='POST') {

			if($id==0){
				$post_data=$this->input->post();

				$data=$this->main_model->get('discount_master',$post_data);
				if (count($data)==0){
					if($this->main_model->add_data('discount_master',$post_data)){
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
				$data=$this->main_model->get('discount_master',array('title'=>$post_data['title'],'id!='=>$id));
				if (count($data)==0){
					if($this->main_model->update_data('discount_master',$post_data,$id)){
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
	    $data['Discount'] = $this->main_model->get('discount_master');
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/discount_master/add_discount',$data);
	    $this->load->view('admin/footer');
	}
	
	function reload_discount_table()
	{
		$this->check_session();
		$this->db->order_by('title','asc');
	    $data['Discount'] = $this->main_model->get('discount_master');
	    $this->load->view('admin/discount_master/discount_table_reload',$data);
	}

	function todays_admissions()
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['students'] = $this->main_model->get_students_between_dates();
		$data['class'] = $this->get('class_master', array('status' => 1));
		$data['cities'] = $this->get('cities');
		$data['states'] = $this->get('states');
		$data['programs'] = $this->get('program_master');
		$data['batch'] = $this->get('batch_master');
		$data['states'] = $this->get('states');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/reports/todays_admissions',$data);
		$this->load->view('admin/footer');
}

public function load_admission_table_data() {
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d');
	$batch_id = $this->input->post('batch');
	$search = $this->input->post('search');
	$class = $this->input->post('class');
	$program = $this->input->post('program');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	$data['students'] =$table_data = $this->main_model->get_table_data_admission($batch_id, $search, $class ,$program,$start_date,$end_date);
	$data['cities'] = $this->get('cities');
	$data['states'] = $this->get('states');
	$data['programs'] = $this->get('program_master');
	$data['batch'] = $this->get('batch_master');
	$data['states'] = $this->get('states');
	$this->load->view('admin/reports/reload_admission_table',$data);
	//echo json_encode($table_data);
}

function fee_collection_report()
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['students'] = $this->main_model->get_students_between_dates_colletion();
		$data['class'] = $this->get('class_master', array('status' => 1));
		$data['cities'] = $this->get('cities');
		$data['states'] = $this->get('states');
		$data['programs'] = $this->get('program_master');
		$data['batch'] = $this->get('batch_master');
		$data['states'] = $this->get('states');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/reports/fee_collection_report',$data);
		$this->load->view('admin/footer');
}

public function load_fee_collection_table_data() {
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d');
	$batch_id = $this->input->post('batch');
	$search = $this->input->post('search');
	$class = $this->input->post('class');
	$program = $this->input->post('program');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	$payment_mode = $this->input->post('payment_mode');
	$data['students'] =$table_data = $this->main_model->get_table_data_fee_colletion($batch_id, $search, $class ,$program,$start_date,$end_date,$payment_mode);
	$data['cities'] = $this->get('cities');
	$data['states'] = $this->get('states');
	$data['programs'] = $this->get('program_master');
	$data['batch'] = $this->get('batch_master');
	$data['states'] = $this->get('states');
	$this->load->view('admin/reports/reload_fee_colletion_table',$data);
	//echo json_encode($table_data);
}

function due_amount_report()
	{
		$this->check_session();
		$data['user']=$this->session->userdata('username');
		$r=$this->session->userdata('role_id');
		$data['role'] = $this->main_model->get_data_id('manage_role',$r);
		$data['menu'] = $this->main_model->get_menu();
		$data['sub_menu'] = $this->main_model->get_sub_menu();
		$data['students'] = $this->main_model->get_students_between_dates_due();
		$data['class'] = $this->get('class_master', array('status' => 1));
		$data['cities'] = $this->get('cities');
		$data['states'] = $this->get('states');
		$data['programs'] = $this->get('program_master');
		$data['batch'] = $this->get('batch_master');
		$data['states'] = $this->get('states');
		$this->load->view('admin/header',$data);
		$this->load->view('admin/reports/due_amount_report',$data);
		$this->load->view('admin/footer');
}


public function load_dueamount_table_data() {
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d');
	$batch_id = $this->input->post('batch');
	$search = $this->input->post('search');
	$class = $this->input->post('class');
	$program = $this->input->post('program');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	$duedays = $this->input->post('duedays');
	$data['students'] =$table_data = $this->main_model->get_table_data_dueamount($batch_id, $search, $class ,$program,$start_date,$end_date,$duedays);
	$data['cities'] = $this->get('cities');
	$data['states'] = $this->get('states');
	$data['programs'] = $this->get('program_master');
	$data['batch'] = $this->get('batch_master');
	$data['states'] = $this->get('states');
	$this->load->view('admin/reports/reload_dueamount_table',$data);
	//echo json_encode($table_data);
}


	
	// function question_copy()
	// {
	// 	$questions=	$this->db->get('question_master')->result();

	// 	foreach ($questions as $row) {
	// 		$row->test_date="2019-12-01";
	// 		$row->question_paper=3;
	// 		unset($row->id);
	// 		$post_data[]=$row;
	// 	}

	// 	foreach ($post_data as $row) {
	// 		echo "<pre>";
	// 		print_r($row);
	// 		echo "</pre>";
	// 		$this->db->insert('question_master',$row);
	// 	}
		
	// }

} 
