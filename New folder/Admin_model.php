<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	
	 public function __construct()
	 {
	    parent::__construct();
	    $this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
	 }
	 
	 public function check_login()
	 {
	    $username=$_POST['username'];
	    $password=$_POST['password'];
		
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$q=$this->db->get('admin');
		return $q->row();
	 }
	 
	 public function add_step($data)
	 {
	 	if($this->db->insert('step_master',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function edit_step($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('step_master',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_step_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('step_master')->row();
	 }

	 public function list_steps($active=0)
	 {
	 	if($active==1)
	 	{
	 		$this->db->where('status',1);
	 	}
	 	$this->db->order_by('id');
	 	return $this->db->get('step_master');
	 }

	 public function list_heads()
	 {
	 	$this->db->select('step_master.step_name,head_master.*');
	 	$this->db->join('step_master','step_master.id = head_master.step_id');
	 	$this->db->order_by('id');
	 	return $this->db->get('head_master');
	 }

	 public function add_head($data)
	 {
	 	if($this->db->insert('head_master',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function edit_head($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('head_master',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_head_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('head_master')->row();
	 }




	 public function list_head_values()
	 {
	 	$this->db->select('head_master.head_name,head_values.*');
	 	$this->db->join('head_master','head_master.id = head_values.head_id');
	 	$this->db->order_by('id');
	 	return $this->db->get('head_values');
	 }

	 public function add_head_value($data)
	 {
	 	if($this->db->insert('head_values',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function edit_head_value($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('head_values',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_head_value_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('head_values')->row();
	 }



	 public function list_schools()
	 {
	 	
	 	$this->db->order_by('id');
	 	return $this->db->get('list_schools');
	 }

	 public function add_school($data)
	 {
	 	if($this->db->insert('list_schools',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function edit_school($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('list_schools',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_school_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('list_schools')->row();
	 }


	 /************************************************************************************/

	 public function heads_by_step($step_id)
	 {
	 	$this->db->where('step_id',$step_id);
	 	$this->db->where('status',1);
	 	return $this->db->get('head_master');
	 }

	 public function head_values_by_head($head_id)
	 {
	 	$this->db->where('head_id',$head_id);
	 	$this->db->where('status',1);
	 	return $this->db->get('head_values');
	 }

	 public function delete_school_heads($school_id)
	 {
	 	$this->db->where('school_id',$school_id);
	 	$this->db->delete('school_heads');
	 }

	 public function apply_heads($school_id,$hv)
	 {
	 	$data = array('school_id'=>$school_id,'head_value_id'=>$hv);
	 	$this->db->insert('school_heads',$data);
	 }

	 public function school_head_values($school_id)
	 {
	 	$this->db->where('school_id',$school_id);
	 	return $this->db->get('school_heads');
	 }

	  public function list_news()
	 {
	 	
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('news');
	 }

	 public function add_news($data)
	 {
	 	//print_r($data); die();
	 	if($this->db->insert('news',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function edit_news($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('news',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }
	 public function delete_news($id,$image)
	 {
	 	$path='./uploads/news_image/';
	 	$unlik=unlink($path.$image); 
	 	
	 		$this->db->where('id', $id);
			$del=$this->db->delete('news');
			if($del)
			{
				return ture;
			}
			else
			{
				return false;
			}
	 	
	 }

	 public function get_news_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('news')->row();
	 }

	 public function list_enquiry()
	 {
	 	return $this->db->get('enquiry_table');
	 }

	 public function get_current_password()
	 {
	 	$id =$this->session->userdata('admin_id');

	 	$this->db->select('*');
	 	$this->db->where('id',$id);
	 	return $this->db->get('admin')->row();
	 }

	 public function change_password($new_password)
	 {
	 	$id =$this->session->userdata('admin_id');
	 	$data = array('password' => $new_password );
	 	$this->db->where('id',$id);
	 	$up=$this->db->update('admin',$data);
	 	if($up)
			{
				return ture;
			}
			else
			{
				return false;
			}
	 }

	 public function load_countries()
	 {
	 	return $this->db->get('countries');
	 }

	 public function get_states_by_country($id)
	 {
	 	$this->db->where('country_id',$id);
	 	return $this->db->get('states');
	 }

	 public function get_cities_by_state($id)
	 {
	 	$this->db->where('state_id',$id);
	 	return $this->db->get('cities');
	 }

	 public function get_locations()
	 {
	 	$this->db->select('location.*,countries.name as c_name,states.name as s_name,cities.name as ci_name');
	 	$this->db->join('countries','countries.id = location.country');
	 	$this->db->join('states','states.id = location.state');
	 	$this->db->join('cities','cities.id = location.city');
	 	return $this->db->get('location');
	 }

	 public function add_location($data)
	 {
	 	if($this->db->insert('location',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function update_location($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('location',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function location_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('location')->row();
	 }	 


	 public function list_advertisement()
	 {
	 	
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('advertisement');
	 }

	 public function add_advertisement($data)
	 {
	 	if($this->db->insert('advertisement',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	  public function get_advertisement_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('advertisement')->row();
	 }

	  public function edit_advertisement($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('advertisement',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function delete_advertisement($id,$image)
	 {
	 	$path='./uploads/advertisement_image/';
	 	$unlik=unlink($path.$image); 
	 	
	 		$this->db->where('id', $id);
			$del=$this->db->delete('advertisement');
			if($del)
			{
				return ture;
			}
			else
			{
				return false;
			}
	 	
	 }

	 function school_image_gallery($id)
	{
		$this->db->order_by('id','desc');
		$this->db->where('school_id',$id);
		return $this->db->get('school_image');
	}

	function delete_school_image($id,$image)
	{
		$path='./uploads/school_image/';
	 	$unlik=unlink($path.$image); 
	 	
	 		$this->db->where('id', $id);
			$del=$this->db->delete('school_image');
			if($del)
			{
				return ture;
			}
			else
			{
				return false;
			}
	 	
	}
	 function upload_school_image($post_data)
	 {
	 	if ($this->db->insert('school_image',$post_data)) 
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}

	 }
}
	