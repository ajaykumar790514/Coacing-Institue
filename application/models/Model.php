<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	
	 public function __construct()
	 {
	    parent::__construct();
	    $this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
	 }
	  public function get_categories($id=8)
	 {
	 	$this->db->where('status',1);
	 	$this->db->where('parent',$id);
	 	return $this->db->get('product_categories');
	 }

	  public function get_slides()
	 {
	 	$this->db->order_by('slide_order');
	 	$this->db->where('status',1);
	 	return $this->db->get('slider');
	 }
	 
	 public function get_steps()
	 {
	 	$this->db->where('status',1);
	 	return $this->db->get('step_master');
	 }

	 public function heads_by_step($step_id)
	 {
	 	$this->db->where('step_id',$step_id);
	 	$this->db->where('status',1);
	 	return $this->db->get('head_master');
	 }

	 public function schools_by_heads($hv)
	 {
	 	$this->db->distinct();
		$this->db->select('school_id');
	 	$this->db->where_in('head_value_id',$hv);
	 	return $this->db->get('school_heads');
	 }

	 public function school_detail($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('list_schools')->row();
	 }

	 public function check_school_exists($name)
	 {
	 	$this->db->where('school_name',$name);
	 	return $this->db->get('list_schools');
	 }

	 public function insert_school($data)
	 {
	 	if($this->db->insert('list_schools',$data))
	 	{
	 		return $this->db->insert_id();
	 	}
	 	return 0;
	 }

	 public function get_news()
	 {
	 	$this->db->limit(4);
	 	$this->db->order_by('id','desc');
	 	$this->db->where('status',1);
	 	return $this->db->get('news');
	 }
	 public function news_count() 
	{
		return $this->db->count_all('news');
	}

	 public function get_all_news($limit,$offset)
	 {
	 	
	 	$this->db->order_by('id','desc');
	 	$this->db->limit( $limit, $offset );
	 	$this->db->where('status',1);
	 	return $this->db->get('news');
	 }

	 public function get_all_news1()
	 {
	 	$this->db->order_by('id','desc');
	 	// $this->db->limit(20);
	 	$this->db->where('status',1);
	 	return $this->db->get('news');
	 }

	 public function get_news_detail($id)
	 {
	 	$this->db->where('status',1);
	 	$this->db->where('id',$id);
	 	return $this->db->get('news');
	 }

	 public function save_enquiry($data)
	 {
	 	//echo "<pre>"; print_r($data); die();
	 	if($this->db->insert('enquiry_table',$data))
	 	{
	 		return true;
	 	}
	 	return false;
	 }

	 public function school_profile($id)
	 {
	 	 $this->db->where('id',$id);
	 	return $this->db->get('list_schools');
	 }

	 public function event_gallery()
	 {
		$this->db->order_by('events.id','desc');
	 	$rows = $this->db->get('events')->result();

	 	foreach ($rows as $key => $value) {
	 		$value->images = $this->db->get_where('event_images',['event_id'=>$value->id])->result();
	 	}
	 	return $rows;
	 }

	 public function get_adds()
	 {
	 	$this->db->where('status',1);
	 	$this->db->limit('2');
	 	$this->db->order_by('id','desc');
	 	return $this->db->get('advertisement')->result_array();
	 }

	 function school_image($id)
	 {
	 	$this->db->where('school_id',$id);
	 	$this->db->order_by('id','desc');
	 	$this->db->limit(20);
	 	return $this->db->get('school_image');
	 }
// //////////////////////////////////////////////
	function get_country()
	{
		return $this->db->get('countries');
	}

	function enquiry_step_1($post_data)
	{
		
		$this->db->insert('enquiry_table',$post_data);
		return $this->db->insert_id();
	}

	function enquiry_step_2($post_data,$id)
	{
		$data = array('heads_id' => $post_data);
		$this->db->where('id',$id);
		if($this->db->update('enquiry_table',$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function get_pro_img()
	{
		$this->db->order_by('id','RANDOM');
		$this->db->limit(8);
		$this->db->join('product_images','product_images.product_id = products.id');
	 	$this->db->where( array('products.status' => 1 ));
	 	//$this->db->group_by('product_images.product_id');
	 	return $this->db->get('products');
	}
	function product_details($id)
	{
		return $this->db->get_where('products',array('id' => $id,
													 'status' => 1 ))->row();
	}

	function products($id)
	{
		$this->db->join('products','products.id = product_category_master.product_id');
	 	$this->db->where(array('category_id' => $id,
					'status' => 1));
		$this->db->order_by('products.order','asc');
	 	return $this->db->get('product_category_master');
	}
	
	function get_cat_contant($id)
	{
		$data = array('id' => $id );
		return $this->db->get_where('product_categories',$data)->row();
	}
	
	 public function product_attributes($product_id)
	 {
	 	$this->db->select('product_attributes_group.name as group_name,product_attributes.name as att_name,attributes_on_product.*,product_attributes.group_id');
	 	$this->db->join('product_attributes','product_attributes.id = attributes_on_product.attribute_id');
	 	$this->db->join('product_attributes_group','product_attributes_group.id = product_attributes.group_id');
	 	$this->db->where('attributes_on_product.product_id',$product_id);
	 	return $this->db->get('attributes_on_product');
	 }

	  function single_product_image($id)
	 {
	 	$this->db->where('product_id',$id);
	 	return $this->db->get('product_images')->row();
	 }
	 function product_images($id)
	  {
	  	$this->db->limit(3);
	  	$this->db->order_by('id','desc');
	   return	$this->db->get_where('product_images',array('product_id' => $id ));
	  } 

	 public function get_homepage()
	 {
	 	return $this->db->get('homepage')->row();
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
	  public function get_heading($id)
	 {
	 	$i= $this->db->get_where('product_categories',array('id' => $id,
	 														'status' => 1 ))->row();
	 	return $this->db->get_where('product_categories',array('id' => $i->parent ))->row();
	 }

	 public function get_updates()
	 {
		$data = array('language' => 'en',
					  'status' => 1);
	 	$this->db->limit(4);
	 	$this->db->order_by('id','desc');
	 	return $this->db->get_where('updates',$data);
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
	 
	 public function get_recent_updates()
	 {
	 	$data = array('language' => 'en',
					  'status' => 1);
	 	// $this->db->limit(10);
	 	$this->db->order_by('id','desc');
	 	return $this->db->get_where('updates',$data);
	 }
 	public function get_social_media()
	 {
	 	$data = array('status' => 1);
	 	return $this->db->order_by('order','asc')->get_where('social_media',$data);
	 
	 }
	 
	  public function get_info_page($id='')
	 {
	 	if ($id==null) 
	 	{
	 		$data = array('status' => 1 );
	 		$this->db->order_by('id','desc');
	 		return $this->db->get_where('pages',$data);
	 	}
	 	else
	 	{
	 		$data = array('status' => 1,
	 					  'id' => $id);
	 		return $this->db->order_by('id','desc')->get_where('pages',$data)->row();
	 	}
	 }
	 public function list_flash_news()
	 {
	 	$this->db->order_by('id','desc');
	 	return $this->db->get_where('flash_news',array('status' => 1 ));			
	 }

	 function get_contact()
	 {
	 	$this->db->limit(1);
	 	$this->db->order_by('id','asc');
	 	return $this->db->get('contact')->row();
	 }

	 function get_about_us()
	 {
	 	return $this->db->get('about_us');
	 }
	 function get_about_us_page($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('about_us')->row();
	 }
	 
	  function get_programs()
	 {
	 	$this->db->where('status',1);
	 	return $this->db->get('programs');
	 }
	 

	  function get_program($id)
	 {
	 	$this->db->where('id',$id);
	 	return $this->db->get('programs')->row();
	 }

	 public function get_data($table_name)
	{
		$this->db->order_by('id','desc');
	 	return	$this->db->get($table_name);
	}
	function get_data_by_status($table_name)
	{
		// $this->db->order_by('id','desc');
		$this->db->where('status',1);
	 	return	$this->db->get($table_name);
	}


	public function get_data_by_id($table_name,$id)
	{
	 	return	$this->db->get_where($table_name , array('id'=>$id))->row();
	}

	public function get_data_by_column_name($table_name,$column_name,$data)
	{
	  return $this ->db-> get_where($table_name,array($column_name =>$data));
		
	}

	public function get_data_by_column_name_status($table_name,$column_name,$data)
	{
	  return $this ->db-> get_where($table_name,array($column_name =>$data,
	  												 'status' => 1));
		
	}

	public function add_data_get_id($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->insert_id();
	}

	public function update_data($table_name,$column_name,$file_name_full,$id)
	{
		$data = array($column_name => $file_name_full);
		$this->db->where('id',$id);
		$this->db->update($table_name,$data);
		// echo "<pre>";
		// print_r($data);
		// echo"<br>";
		// echo $id;
		// echo"<br>";
		// echo $column_name;
		// echo"<br>";
		// echo"<br>";
	}

public function get_results($reg_no,$test_id)
{
	// $this->db->select('a.*,r.*,a.id as s_id, r.id as r_id');
	// $this->db->join('admission as a','a.registration_no = r.stu_reg_number');
	// // $this->db->join('test as t','t.id = r.test_id');
	// $data = array('r.stu_reg_number' => $reg_no,
	// 			  'r.test_id' => $test_id );
	// $this->db->where($data);
	// return $this->db->get('results as r')->row();
	$data = array('stu_reg_number' => $reg_no,
				  'test_id' => $test_id );
	$this->db->where($data);
	return $this->db->get('results')->row();

}
function get_time_table($order)
{
	$this->db->where('order',$order);
	// $this->db->where('status',1);
	return $this->db->get('time_table')->row();
}

function get_result_pdf()
{
	$this->db->order_by('pdf_order','asc');
	$this->db->where('status',1);
	return $this->db->get('results_pdf')->result();
}

function get_answer_key()
{
	$this->db->order_by('pdf_order','asc');
	$this->db->where('status',1);
	return $this->db->get('answer_key')->result();
}


// amit
 public function add_user($path,$path2)
	 {    
	 	$f_name=$this->input->post("f_name");
	 	$l_name=$this->input->post("l_name");
		// $name=$f_name.' '.$f_name;
		$name=$f_name.' '.$l_name;
	 	$marital=$this->input->post("marital");
	 	$sex=$this->input->post("sex");
	 	$father=$this->input->post("father");
	 	$mother=$this->input->post("mother");
	 	$dob=$this->input->post("dob");
	 	$address=$this->input->post("address");
	 	$state=$this->input->post("state");
	 	$city=$this->input->post("city");
	 	$pin=$this->input->post("pin");
	 	$email=$this->input->post("email");
	 	$mob=$this->input->post("mob");
	 	$wpno=$this->input->post("wpno");
	 	$faculty=$this->input->post("faculty");
	 	$position=$this->input->post("position");
	 	$decl=$this->input->post("decl");
	 	$photo=$this->input->post("photo");
	 	$sign=$this->input->post("sign");
 	    
		$data=array(
		"name"=>$name, 
		"marital"=>$marital, 
		"sex"=>$sex, 
		"father"=>$father, 
		"mother"=>$mother, 
		"dob"=>$dob, 
		"address"=>$address, 
		"state"=>$state, 
		"city"=>$city, 
		"pin"=>$pin, 
		"email"=>$email, 
		"mob"=>$mob, 
		"wpno"=>$wpno, 
		"faculty"=>$faculty, 
		"position"=>$position, 
		"decl"=>$decl,
		"photo"=>$path,
		"sign"=>$path2
		);
		 $this->db->where('mob',$mob);
		$check_mob=$this->db->get('personal_information');
		  $check_mob->num_rows() ;
		if($check_mob->num_rows() >0){
			  return 80;
		}else{   
	 	 	$q=$this->db->insert("personal_information",$data);
			  $insert_id = $this->db->insert_id();
		
		
		// insert education===================
         $std=$this->input->post("hs_name");
	 	$s_name=$this->input->post("hs_clg_name");
	 	$s_board=$this->input->post("hs_board");
	 	$other=$this->input->post("hs_other");
	 	$percentage=$this->input->post("hs_per");
	 	$year=$this->input->post("hs_year");
	 	   
		   $data1=array(
		'p_id'=>$insert_id,
		'std'=>$std,
		's_name'=>$s_name,
		's_board'=>$s_board,
		'other'=>$other,
		'percentage'=>$percentage,
		'year'=>$year
		);
		$this->db->insert("education",$data1);
		
       $std=$this->input->post("i_name");
	 	$s_name=$this->input->post("i_clg_name");
	 	$s_board=$this->input->post("i_board");
	 	$other=$this->input->post("i_other");
	 	$percentage=$this->input->post("i_per");
	 	$year=$this->input->post("i_year");
	 	   
		   $data2=array(
		'p_id'=>$insert_id,
		'std'=>$std,
		's_name'=>$s_name,
		's_board'=>$s_board,
		'other'=>$other,
		'percentage'=>$percentage,
		'year'=>$year
		);
		$this->db->insert("education",$data2);
		
        $std=$this->input->post("g_name");
	 	$s_name=$this->input->post("g_clg_name");
	 	$s_board=$this->input->post("g_board");
	 	$other=$this->input->post("g_other");
	 	$percentage=$this->input->post("g_per");
	 	$year=$this->input->post("g_year");
	 	   
		   $data3=array(
		'p_id'=>$insert_id,
		'std'=>$std,
		's_name'=>$s_name,
		's_board'=>$s_board,
		'other'=>$other,
		'percentage'=>$percentage,
		'year'=>$year
		);
		$this->db->insert("education",$data3);
		
        $std=$this->input->post("p_name");
	 	$s_name=$this->input->post("p_clg_name");
	 	$s_board=$this->input->post("p_board");
	 	$other=$this->input->post("p_other");
	 	$percentage=$this->input->post("p_per");
	 	$year=$this->input->post("p_year");
	 	   
		   $data4=array(
						'p_id'=>$insert_id,
						'std'=>$std,
						's_name'=>$s_name,
						's_board'=>$s_board,
						'other'=>$other,
						'percentage'=>$percentage,
						'year'=>$year
						);
		$this->db->insert("education",$data4);

// insert education===================


// insert Employer===================

		$emp_name=$this->input->post("emp_name1");
		$title=$this->input->post("job_title1");
		$other=$this->input->post("t_other1");
		$location=$this->input->post("loc1");
		$s_salary=$this->input->post("s_sal1");
		$e_salary=$this->input->post("e_sal1");
		$from_date=$this->input->post("fdate1");
		$to_date=$this->input->post("edate1");
	 	 
	   $data5=array("p_id"=>$insert_id,	"emp_name"=>$emp_name,	"title"=>$title,  
	"other"=>$other, "location"=>$location, "s_salary"=>$s_salary,
	"e_salary"=>$e_salary,"from_date"=>$from_date,"to_date"=>$to_date
		); 
		
 	$this->db->insert("employment",$data5);
	
	$emp_name=$this->input->post("emp_name2");
		$title=$this->input->post("job_title2");
		$other=$this->input->post("t_other2");
		$location=$this->input->post("loc2");
		$s_salary=$this->input->post("s_sal2");
		$e_salary=$this->input->post("e_sal2");
		$from_date=$this->input->post("fdate2");
		$to_date=$this->input->post("edate2");
	 	 
	   $data6=array("p_id"=>$insert_id,	"emp_name"=>$emp_name,	"title"=>$title,  
	"other"=>$other, "location"=>$location, "s_salary"=>$s_salary,
	"e_salary"=>$e_salary,"from_date"=>$from_date,"to_date"=>$to_date
		); 
		
 	$this->db->insert("employment",$data6);
	
	$emp_name=$this->input->post("emp_name3");
		$title=$this->input->post("job_title3");
		$other=$this->input->post("t_other3");
		$location=$this->input->post("loc3");
		$s_salary=$this->input->post("s_sal3");
		$e_salary=$this->input->post("e_sal3");
		$from_date=$this->input->post("fdate3");
		$to_date=$this->input->post("edate3");
	 	 
	   $data7=array("p_id"=>$insert_id,	"emp_name"=>$emp_name,	"title"=>$title,  
	"other"=>$other, "location"=>$location, "s_salary"=>$s_salary,
	"e_salary"=>$e_salary,"from_date"=>$from_date,"to_date"=>$to_date
		); 
		
 	$this->db->insert("employment",$data7);
	
	$emp_name=$this->input->post("emp_name4");
		$title=$this->input->post("job_title4");
		$other=$this->input->post("t_other4");
		$location=$this->input->post("loc4");
		$s_salary=$this->input->post("s_sal4");
		$e_salary=$this->input->post("e_sal4");
		$from_date=$this->input->post("fdate4");
		$to_date=$this->input->post("edate4");
	 	 
	   $data8=array("p_id"=>$insert_id,	"emp_name"=>$emp_name,	"title"=>$title,  
	"other"=>$other, "location"=>$location, "s_salary"=>$s_salary,
	"e_salary"=>$e_salary,"from_date"=>$from_date,"to_date"=>$to_date
		); 
		
 	$this->db->insert("employment",$data8);
	
	$emp_name=$this->input->post("emp_name5");
		$title=$this->input->post("job_title5");
		$other=$this->input->post("t_other5");
		$location=$this->input->post("loc5");
		$s_salary=$this->input->post("s_sal5");
		$e_salary=$this->input->post("e_sal5");
		$from_date=$this->input->post("fdate5");
		$to_date=$this->input->post("edate5");
	 	 
	   $data9=array("p_id"=>$insert_id,	"emp_name"=>$emp_name,	"title"=>$title,  
	"other"=>$other, "location"=>$location, "s_salary"=>$s_salary,
	"e_salary"=>$e_salary,"from_date"=>$from_date,"to_date"=>$to_date
		);  
 	$this->db->insert("employment",$data9); 
	
// insert Employer=================== 
			 
	 	if($q)
	 	{
			return true;
	 	}else return false ;
	   } 
	 }

// amit
	


	 
}