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
		$this->db->where('status',1);
		$q=$this->db->get('admin');
		return $q->row();
	 }

	 function get_uesr_role($id)
	 {
	 	// echo $id;
	 	$this->db->where('id',$id);
	 	return $this->db->get('manage_role')->row();
	 	

	 }
	 
	 public function get_all_categories()
	 {
	 	return $this->db->get('product_categories');
	 }
	 
	 public function get_only_categories()
	 {
	 	$this->db->where('status',1);
	 	$this->db->where('parent',0);
	 	return $this->db->get('product_categories');
	 }

	 public function get_subcategories($cat_id)
	 {
	 	$this->db->where('parent',$cat_id);
	 	return $this->db->get('product_categories');
	 }

	 public function add_category($data)
	 {
	 	if($this->db->insert('product_categories',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 public function add_category_image($data)
	 {
	 	$data123 = array('img'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('product_categories',$data123);
	 }

	 public function get_category_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('product_categories')->row();
	 }

	 public function update_category($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('product_categories',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function delete_category($id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->delete('product_categories'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_attribute_groups()
	 {
	 	return $this->db->get('product_attributes_group');
	 }

	 public function get_active_attribute_groups()
	 {
	 	$this->db->where('status',1);
	 	return $this->db->get('product_attributes_group');
	 }

	 public function add_attribute_group($data)
	 {
	 	if($this->db->insert('product_attributes_group',$data))
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }

	 public function get_attribute_group_detail($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('product_attributes_group')->row();
	 }

	 public function update_attribute_group($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('product_attributes_group',$data))
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }

	 public function add_attribute($data)
	 {
	 	if($this->db->insert('product_attributes',$data))
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }

	 public function get_attributes()
	 {
	 	$this->db->select('product_attributes_group.name as group_name,product_attributes.*');
	 	$this->db->join('product_attributes_group','product_attributes_group.id = product_attributes.group_id');
	 	return $this->db->get('product_attributes');
	 }

	 public function get_attribute_detail($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('product_attributes')->row();
	 }

	 public function update_attribute($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('product_attributes',$data))
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }

	 public function get_products()
	 {
	 	// $this->db->select('products.*,product_categories.name as cat_name');
	 	// $this->db->join('product_categories','product_categories.id = products.cat_id');
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('products');
	 }
	
	 public function get_assigned_category_id($id)
	 {
	 	return $this->db->get_where('product_category_master',array('product_id' => $id));
	 	

	 }

	 public function get_assigned_category_name($id)
	 {
	 	return $this->db->get_where('product_categories',array('id' => $id));
	 	

	 }

	 public function get_categories()
	 {
	 	$this->db->where('status',1);
	 	$this->db->where('parent ',0);
	 	return $this->db->get('product_categories');
	 }

	 public function get_sub_categories()
	 {
	 	$this->db->where('active',1);
	 	$this->db->where('parent !=',0);
	 	return $this->db->get('manage_category');
	 }

	 public function add_product($data)
	 {
	 	if($this->db->insert('products',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 public function add_categories($categories,$q)
	 {
	 	foreach($categories as $cat)
	 	{
	 		$data = array('product_id'=>$q, 'category_id'=>$cat);
	 		$this->db->insert('product_category_master',$data);
	 	}
	 }

	 public function add_attributes($attributes,$att_desc,$q,$group_id)
	 {
	 	$i=0;
	 	foreach($attributes as $att)
	 	{
	 		if($att_desc[$i]!="")
	 		{
	 			$status = 1;
	 		}
	 		else
	 		{
	 			$status = 0;
	 		}
	 		$data = array('attribute_id'=>$att,
	 					'product_id'=>$q,
	 					'description'=>$att_desc[$i],
	 					'status'=>$status,
	 					'group_id'=>$group_id
	 					);
	 		$this->db->insert('attributes_on_product',$data);
	 		$i++;
	 	}
	 }

	 public function update_attributes($attributes,$att_desc,$product_id)
	 {
	 	$i=0;
	 	foreach($attributes as $att)
	 	{
	 		if($att_desc[$i]!="")
	 		{
	 			$status = 1;
	 		}
	 		else
	 		{
	 			$status = 0;
	 		}
	 		$data = array(
	 					'description'=>$att_desc[$i],
	 					'status'=>$status
	 					);
	 		//echo "<pre>"; print_r($data);
	 		$this->db->where('attribute_id',$att);
	 		$this->db->where('product_id',$product_id);
	 		$this->db->update('attributes_on_product',$data);

	 		$i++;
	 	}
	 	
	 }

	 public function delete_attributes($id)
	 {
	 	$this->db->where('product_id',$id);
	 	if($this->db->delete('attributes_on_product'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_product_attributes($id)
	 {
	 	$this->db->select('attributes_on_product.*,product_attributes.name,product_attributes_group.name as group_name');
	 	$this->db->join('product_attributes','product_attributes.id = attributes_on_product.attribute_id');
	 	$this->db->join('product_attributes_group','product_attributes_group.id = attributes_on_product.group_id');
	 	
	 	$this->db->where('product_id',$id);
	 	return $this->db->get('attributes_on_product');
	 }

	 public function get_product_attributes_active($id)
	 {
	 	$this->db->select('attributes_on_product.*,product_attributes.name,product_attributes_group.name as group_name');
	 	$this->db->join('product_attributes','product_attributes.id = attributes_on_product.attribute_id');
	 	$this->db->join('product_attributes_group','product_attributes_group.id = attributes_on_product.group_id');
	 	$this->db->where('attributes_on_product.status',1);
	 	$this->db->where('product_id',$id);
	 	return $this->db->get('attributes_on_product');
	 }

	 public function attribute_groups()
	 {
	 	$this->db->where('status',1);
	 	return $this->db->get('product_attributes_group');
	 }

	 public function load_attributes($id)
	 {
	 	$this->db->where('group_id',$id);
	 	return $this->db->get('product_attributes');
	 }

	 public function update_product($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('products',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function delete_product($id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->delete('products'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_product_detail($id)
	 {
	 	// $this->db->select('products.*,product_categories.name as cat_name');
	 	// $this->db->join('product_categories','product_categories.id = products.cat_id');
	 	$this->db->where('products.id',$id);
	 	return $this->db->get('products')->row();
	 }

	 public function product_attributes()
	 {
	 	$this->db->select('oc_product_attribute.*,manage_product.title,oc_attribute_description.name');
	 	$this->db->join('oc_attribute_description','oc_attribute_description.attribute_id = oc_product_attribute.attribute_id');
	 	$this->db->join('manage_product','manage_product.id = oc_product_attribute.product_id');
	 	return $this->db->get('oc_product_attribute');
	 }

	 public function get_product_images($product_id)
	 {
	 	$this->db->where('product_id',$product_id);
	 	return $this->db->get('product_images');
	 }


	 /******************************IMAGE*************************************/
	 public function add_product_image($data)
	 {
	 	$img_data = array('name'=>$data['name'],'product_id'=>$data['id']);
	 	if($this->db->insert('product_images',$img_data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }
	
	public function delete_product_image($id)
	 {
	 	$img=$this->db->get_where('product_images',array('id' =>$id))->row();
	 	$path='images/product/'.$img->name;
		unlink($path);
	 	$this->db->where('id',$id);
	 	if($this->db->delete('product_images'))
	 	{
	 		return true;
	 	}
	 	else
	 	{
	 		return false;
	 	}
	 }
	 public function add_event_image($data)
	 {
	 	$img_data = array('name'=>$data['name'],'title'=>$data['title'],'event_id'=>$data['id']);
	 	if($this->db->insert('event_images',$img_data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function add_event_cover($data)
	 {
	 	$img_data = array('cover_image'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	if($this->db->update('events',$img_data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }
	 /******************************IMAGE*************************************/

	 public function get_orders()
	 {
	 	$this->db->select('orderno');
	 	$this->db->distinct();
	 	return $this->db->get('manage_orders');
	 }

	 public function get_order_by_orderno($orderno)
	 {
	 	$this->db->select('manage_orders.*,manage_users.name,manage_users.emailid,manage_users.contact');
	 	$this->db->join('manage_users','manage_users.id = manage_orders.user_id');
	 	$this->db->where('orderno',$orderno);
	 	return $this->db->get('manage_orders')->row();
	 }

	 public function get_order_by_orderno_all($orderno)
	 {
	 	$this->db->select('manage_orders.*,manage_users.name,manage_users.emailid,manage_users.contact,manage_product.title');
	 	$this->db->join('manage_users','manage_users.id = manage_orders.user_id');
	 	$this->db->join('manage_product','manage_product.id = manage_orders.product_id');
	 	$this->db->where('orderno',$orderno);
	 	return $this->db->get('manage_orders');
	 }

	 public function get_order_detail($id)
	 {
	 	$this->db->where('oid',$id);
	 	return $this->db->get('manage_orders')->row();
	 }

	 public function get_events()
	 {
	 	return $this->db->get('events');
	 }

	 public function add_event($data)
	 {
	 	if($this->db->insert('events',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 public function get_event_images($product_id)
	 {
	 	$this->db->where('event_id',$product_id);
	 	return $this->db->get('event_images');
	 }

	 public function update_event($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('events',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_event_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('events')->row();
	 }

	 public function add_update($data)
	 {
	 	if($this->db->insert('updates',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 function add_updates_image($data)
	 {
	 	$data123 = array('img'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('updates',$data123);
	 }

	 public function update_update($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('updates',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function update_update_id($id)
	 {
	 	$data = array('update_id',$id);
	 	$this->db->where('id',$id);
	 	$this->db->update('updates',$data);
	 }

	 public function get_updates()
	 {
	 	$this->db->where('language','en');
	 	return $this->db->get('updates');
	 }

	 public function get_update_detail($id,$lang='')
	 {
	 	//echo $lang; die();
	 	if($lang=='')
	 	{
	 		$this->db->where('language','en');
	 	}
	 	else
	 	{
	 		$this->db->where('language',$lang);
	 	}
	 	$this->db->where('update_id',$id);
	 	return $this->db->get('updates')->row();
	 	//echo $this->db->last_query();
	 	//die();
	 }

	 public function add_testimonial($data)
	 {
	 	if($this->db->insert('testimonials',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 function add_testimonial_image($data)
	 {
	 	$data123 = array('img'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('testimonials',$data123);
	 	//echo $this->db->last_query(); die();
	 }

	 public function update_testimonial($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('testimonials',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_testimonials()
	 {
	 	return $this->db->get('testimonials');
	 }

	 public function get_testimonial_detail($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('testimonials')->row();
	 }

	 // public function get_contact()
	 // {
	 // 	$this->db->order_by('id','desc');
	 // 	return $this->db->get('contact')->row();
	 // }

	 // public function update_contact($data)
	 // {
	 // 	if($this->db->update('contact',$data))
	 // 	{
	 // 		return true;
	 // 	}
	 	
	 // 	return false;
	 // }

	 public function get_contacts()
	 {
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('contact');
	 }

	  public function get_contact($id)
	 {
	 
	 	return $this->db->get_where('contact',array('id' => $id ))->row();
	 }

	 public function update_contact($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('contact',$data))
	 	{
	 		return true;
	 	}
	 	
	 	return false;
	 }

	  public function delete_contact($id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->delete('contact'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_faqs()
	 {
	 	return $this->db->get('faq');
	 }

	 public function add_faq($data)
	 {
	 	if($this->db->insert('faq',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function update_faq($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('faq',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_faq_detail($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('faq')->row();
	 }

	 public function delete_faq($id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->delete('faq'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_pages()
	 {
	 	return $this->db->get('pages');
	 }

	 public function get_parent_pages()
	 {
	 	$this->db->where('parent',0);
	 	return $this->db->get('pages');
	 }

	 public function add_page($data)
	 {
	 	if($this->db->insert('pages',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function update_page($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('pages',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_page_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('pages')->row();
	 }

	 public function get_slides()
	 {
	 	return $this->db->get('slider');
	 }

	 public function add_slide($data)
	 {
	 	if($this->db->insert('slider',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 public function update_slide($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('slider',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function add_slide_image($data)
	 {
	 	$data1 = array('img'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('slider',$data1);
	 }

	 public function get_slide_detail($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('slider')->row();
	 }

	 public function delete_slide($id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->delete('slider'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function get_homepage()
	 {
	 	return $this->db->get('homepage')->row();
	 }

	public function logos()
	{
	 	return $this->db->get('logos')->row();
	}

	public function update_logos($update)
	{
	 	$this->db->where('id',1);
	 	if($this->db->update('logos',$update)){
	 		return true;
	 	}
	 	return false;
	}

	 public function add_content_image($data,$file_name)
	 {
	 	$img_data = array($file_name=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('homepage',$img_data);
	 }

	 public function update_home_page($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('homepage',$data))
	 	{
	 		return true;
	 	}
	 	return false;

	 }

	 public function get_logo()
	 {
	 	return $this->db->get('logo')->row();
	 }

	 public function delete_logo()
	 {
	 	$this->db->where('id',1);
	 	if($this->db->delete('logo'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function upload_logo($data)
	 {
	 	$img_data = array('logo_img'=>$data['name']);
	 	$this->db->insert('logo',$img_data);
	 }

	 public function get_enquiries()
	 {
	 	return $this->db->get('enquiry');
	 }

	 public function list_get_call()
	 {
	 	return $this->db->get('get_call');
	 }

	 public function get_product_category($id)
	 {
	 	$this->db->select('product_categories.name,product_category_master.*');
	 	$this->db->join('product_categories','product_categories.id = product_category_master.category_id');
	 	$this->db->where('product_id',$id);
	 	return $this->db->get('product_category_master');
	 }

	 public function delete_product_master_categories($id)
	 {
	 	$this->db->where('product_id',$id);
	 	if($this->db->delete('product_category_master'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	  public function list_enquiry()
	 {
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('enquiry_table');
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

	  public function list_heads()
	 {
	 	$this->db->select('step_master.step_name,head_master.*');
	 	$this->db->join('step_master','step_master.id = head_master.step_id');
	 	$this->db->order_by('id');
	 	return $this->db->get('head_master');
	 }

	  public function get_head_value_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('head_values')->row();
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

	  function get_heads($id)
	 {
	 	return $this->db->get_where('head_master',array('id' => $id))->row();
	 }
	 
	  // ======= social media  =======
	 public function get_social_media($id='')
	 {
	 	if ($id=='') 
	 	{
	 		$this->db->order_by('id','desc');
	 		return $this->db->get('social_media');
	 	}
	 	else
	 	{
	 		$data = array('id' => $id );
	 		return $this->db->get_where('social_media',$data)->row();
	 	}
	 }
	 public function add_social_media($post_data)
	 {
	 	if($this->db->insert('social_media',$post_data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }
	  public function update_social_media($post_data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('social_media',$post_data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function delete_social_media($id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->delete('social_media'))
	 	{
	 		return true;
	 	}
	 	return false;
	 }
	 // ======= social media  =======

	 
// ************** flash news**********
	  public function list_flash_news()
	 {
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('flash_news');
	 }

	 public function add_flash_news($data)
	 {
	 	//print_r($data); die();
	 	if($this->db->insert('flash_news',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function edit_flash_news($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('flash_news',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }
	 public function delete_flash_news($id,$image)
	 {
 		$this->db->where('id', $id);
		$del=$this->db->delete('flash_news');
		if($del)
		{
			return ture;
		}
		else
		{
			return false;
		}
	 	
	 }

	 public function get_flash_news_data($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('flash_news')->row();
	 }
// ********** flash news ************
// ********** about page************
function get_about_page()
{
	return $this->db->get('about_us');
}

public function about_page_detail($id)
{
	// $this->db->select('products.*,product_categories.name as cat_name');
	// $this->db->join('product_categories','product_categories.id = products.cat_id');
	$this->db->where('id',$id);
	return $this->db->get('about_us')->row();
}


	 public function add_about_page($data)
	 {
	 	if($this->db->insert('about_us',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 function add_about_page_image($data)
	 {
	 	$data123 = array('image'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('about_us',$data123);
	 }

	 public function update_about_page($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('about_us',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }


// ********** about page************


// ********** program************
function get_programs()
{
	return $this->db->get('programs');
}

public function program_detail($id)
{
	// $this->db->select('products.*,product_categories.name as cat_name');
	// $this->db->join('product_categories','product_categories.id = products.cat_id');
	$this->db->where('id',$id);
	return $this->db->get('programs')->row();
}


	 public function add_program($data)
	 {
	 	if($this->db->insert('programs',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 function add_program_image($data)
	 {
	 	$data123 = array('image'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('programs',$data123);
	 }

	 public function update_program($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('programs',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }


// ********** program************

// ********** Key achievements************
function get_achievements()
{
	$this->db->order_by('title','asc');
	return $this->db->get('achievements');
}

public function achievement_detail($id)
{
	// $this->db->select('products.*,product_categories.name as cat_name');
	// $this->db->join('product_categories','product_categories.id = products.cat_id');
	$this->db->where('id',$id);
	return $this->db->get('achievements')->row();
}

	function get_states()
	{
		$country_id='101';
		$this->db->where('country_id',$country_id);
		return $this->db->get('states');
	}

	function get_cities($state_id)
	{
		$this->db->where('state_id',$state_id);
		return $this->db->get('cities');
	}

	function get_all_cities()
	{
		return $this->db->get('cities');
	}
	 public function add_achievement($data)
	 {
	 	if($this->db->insert('achievements',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }



	 function add_achievement_image($data)
	 {
	 	$data123 = array('image'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('achievements',$data123);
	 }

	  function add_testimonial_file($data)
	 {
	 	$data123 = array('testimonial_file'=>$data['name']);
	 	$this->db->where('id',$data['id']);
	 	$this->db->update('achievements',$data123);
	 }

	 public function update_achievement($data,$id)
	 {
	 	$this->db->where('id',$id);
	 	if($this->db->update('achievements',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }


// **********Key achievements************
public function get_data($table_name)
{
	$this->db->order_by('id','desc');
 	return	$this->db->get($table_name);
}


public function get_data_by_id($table_name,$id)
{

 	return	$this->db->get_where($table_name , array('id'=>$id))->row();
}

public function get_data_by_status($table_name)
{

 	return	$this->db->get_where($table_name , array('status'=>1));
}

public function get_data_by_column($table_name,$column,$data)
 {
 	return $this->db->get_where($table_name,array($column => $data));
 }

 public function get_data_multi_column($table_name,$data)
 {
 	return $this->db->get_where($table_name,$data);
 }

public function add_data($table_name,$data)
{
	if($this->db->insert($table_name,$data))
	{
		return true;
	}
	return false; 
}

public function add_data_get_id($table_name,$data)
{
	if($this->db->insert($table_name,$data))
	{
		return $this->db->insert_id();
	}
	return false;
}


public function check_availability($table_name,$column_name,$data)
{
  $query = $this ->db-> get_where($table_name,array($column_name =>$data));
	if($query->num_rows()>0)
	{
		return true;
	}
	return false;
}

public function update_data($table_name,$data,$id)
{
	$this->db->where('id',$id);
	if($this->db->update($table_name,$data))
	{
		return true;
	}
	return false; 
}
public function update_stu($data,$id)
{
	$this->db->where('stu_id',$id);
	if($this->db->update('stu_info',$data))
	{
		return true;
	}
	return false; 
}




public function dalete_data($table_name,$id)
{
	$this->db->where('id',$id);
	if($this->db->delete($table_name))
	{
		return true;
	}
	return false; 
}

//  ########### RESULTS ########
function get_results($test_id)
{
	$this->db->select('a.*,t.*,t.id as t_id , a.id as s_id');
	$this->db->join('admission as a','a.admission_test_date = t.test_date');
	$this->db->where('t.id',$test_id);
	return $this->db->get('test as t');
}

function get_result_detail($id)
{
	$this->db->select('a.*,r.*,a.id as s_id, r.id as r_id');
	$this->db->join('admission as a','a.registration_no = r.stu_reg_number');
	// $this->db->join('test as t','t.id = r.test_id');
	$this->db->where('r.id',$id);
	return $this->db->get('results as r')->row();
}


//  ########### RESULTS ########

//  ########### CAREER ########

function career_data()
{
	$this->db->order_by('id','desc');
    $this->db->from ( 'personal_information' );
    $query = $this->db->get ();
    return $query->result ();
}




//  ########### CAREER ########






/*************************SITEMAP***************************/
	function sitemap_data()
	{
	
	
		// $this->db->where('status',1);
		// $product = $this->db->get('products');
		
		$this->db->where('status',1);
		$wallpost = $this->db->get('updates');

		$this->db->where('status',1);
		$about_us = $this->db->get('about_us');

		$this->db->where('status',1);
		$programs = $this->db->get('programs');
		
		$data1 = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
      http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>http://jeeexpert.com/</loc>
  <changefreq>always</changefreq>
</url>';
$data2 = "";
foreach ($about_us->result() as $about) 
{
	$data2 = $data2.'<url>
  <loc>http://jeeexpert.com/About/'.$about->url.'/'.$about->id.'</loc>
  <changefreq>always</changefreq>
</url>';
}
$data3 = '<url>
  <loc>http://jeeexpert.com/Updates</loc>
  <changefreq>always</changefreq>
</url><url>
  <loc>http://jeeexpert.com/Events</loc>
  <changefreq>always</changefreq>
</url><url>
  <loc>http://jeeexpert.com/Contact</loc>
  <changefreq>always</changefreq>
</url><url>
  <loc>http://jeeexpert.com/Admission</loc>
  <changefreq>always</changefreq>
</url><url>
  <loc>http://jeeexpert.com/Admission_form</loc>
  <changefreq>always</changefreq>
</url><url>
  <loc>http://jeeexpert.com/Enrollment</loc>
  <changefreq>always</changefreq>
</url>';
$data4 = "";
// foreach ($product->result() as $pr) 
// {
// $data4 = $data4.'<url>
//   <loc>http://www.jeeexpert.com/index.php/welcome/product_details/'.$pr->url.'/'.$pr->id.'</loc>
//   <changefreq>always</changefreq>
// </url>';
// }

$data5 = "";
foreach ($wallpost->result() as $wall) 
{
$data5 = $data5.'<url>
  <loc>http://jeeexpert.com/update/'.$wall->url.'/'.$wall->id.'</loc>
  <changefreq>always</changefreq>
</url>';
}

$data6 = "";
foreach ($programs->result() as $program) 
{
$data6 = $data6.'<url>
  <loc>http://jeeexpert.com/Programs/'.$program->url.'/'.$program->id.'</loc>
  <changefreq>always</changefreq>
</url>';
}

$data7 = '</urlset>';

 return $data=$data1.$data2.$data3.$data4.$data5.$data6.$data7;

// return $data = $data1;


	}
	/*************************SITEMAP***************************/



function get_time_table($id=0)
{
	if ($id!=0) 
	{
		return $this->db->get_where('time_table',array('id'=>$id))->row();
	}
	$this->db->order_by('id','asc');
	return $this->db->get('time_table')->result();
}


public function email_exist($email)
	{
		$this->db->select("*")
		->from('admin')
		->where(['email'=>$email, 'active'=>'1']);
		return $this->db->get()->num_rows();
		
	}
    function updateRow($email,$data ){
		if($this->db->insert('admin_otp',$data)){
			return $this->db->insert_id();
		}
		return false; 
	}

    
	public function otp_exist($otp)
	{
		$this->db->select("*")
		->from('admin_otp')
		->where(['otp'=>$otp]);
	
		return $this->db->get()->num_rows();
		
	}

}
	