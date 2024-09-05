<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('html');
		$this->load->model('model');
		$this->load->model('admin_model');
		$this->load->model('main_model');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
		$this->load->library("pagination");
		$this->load->library('upload');
		$this->load->library('image_lib');
	 }
	 
	public function index()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		// $data['steps'] = $this->model->get_steps();
		$data['news'] = $this->model->get_news();
		$data['adds'] = $this->model->get_adds();
		$data['country'] =$this->model->get_country();
		$data['product_image']=$this->model->get_pro_img();
		$data['homepage'] = $this->model->get_homepage();
		$data['meta_title'] = $data['homepage']->meta_title;
		$data['meta_description'] = $data['homepage']->meta_description;
		$data['meta_keywords'] = $data['homepage']->meta_keywords;
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['testimonials'] = $this->model->get_testimonials();
		$data['updates'] = $this->model->get_updates();
		$data['social_media']=$this->model->get_social_media();
		$data['achievement_type']=$this->model->get_data_by_status('achivement_type');
		$this->load->view('school/header',$data);
		$this->load->view('school/slider',$data);
		//$this->load->view('school/enquiry_step_1',$data);
		$this->load->view('school/home_new',$data);
		
		$this->load->view('school/contact_new');
		$this->load->view('school/footer');
		
		// $this->load->view('header',$data);
	}

	public function results_pdf()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['homepage'] = $this->model->get_homepage();
		$data['meta_title'] = $data['homepage']->meta_title;
		$data['meta_description'] = $data['homepage']->meta_description;
		$data['meta_keywords'] = $data['homepage']->meta_keywords;
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		$data['result_pdf']=$this->model->get_result_pdf();
		$this->load->view('school/header',$data);
		$this->load->view('school/results_pdf');
		$this->load->view('school/footer');
		
		// $this->load->view('header',$data);
	}

	public function HINTS_SOLUTIONS()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['homepage'] = $this->model->get_homepage();
		$data['meta_title'] = $data['homepage']->meta_title;
		$data['meta_description'] = $data['homepage']->meta_description;
		$data['meta_keywords'] = $data['homepage']->meta_keywords;
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		$data['answer_key']=$this->model->get_answer_key();
		$this->load->view('school/header',$data);
		$this->load->view('school/HINTS_SOLUTIONS');
		$this->load->view('school/footer');
		
		// $this->load->view('header',$data);
	}

	public function Sample_Paper_For_Admission_Test()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['homepage'] = $this->model->get_homepage();
		$data['meta_title'] = $data['homepage']->meta_title;
		$data['meta_description'] = $data['homepage']->meta_description;
		$data['meta_keywords'] = $data['homepage']->meta_keywords;
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		$this->db->order_by('p_order','asc');
		$data['sample_paper']=$this->db->get_where('sample_paper',array('status'=>1))->result();
		$data['answer_key']=$this->model->get_answer_key();
		$this->load->view('school/header',$data);
		$this->load->view('school/Sample_Paper_For_Admission_Test');
		$this->load->view('school/footer');
		
		// $this->load->view('header',$data);
	}

	public function PRACTICE_TEST()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['homepage'] = $this->model->get_homepage();
		$data['meta_title'] = $data['homepage']->meta_title;
		$data['meta_description'] = $data['homepage']->meta_description;
		$data['meta_keywords'] = $data['homepage']->meta_keywords;
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		$this->db->order_by('pdf_order','asc');
		$data['practice_test']=$this->db->get_where('practice_test',array('status'=>1))->result();
		// $data['answer_key']=$this->model->get_answer_key();
		$this->load->view('school/header',$data);
		$this->load->view('school/PRACTICE_TEST');
		$this->load->view('school/footer');
		
		// $this->load->view('header',$data);
	}

	public function STUDY_PACKAGE()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['homepage'] = $this->model->get_homepage();
		$data['meta_title'] = $data['homepage']->meta_title;
		$data['meta_description'] = $data['homepage']->meta_description;
		$data['meta_keywords'] = $data['homepage']->meta_keywords;
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		$this->db->order_by('pdf_order','asc');
		$data['study_package']=$this->db->get_where('study_package',array('status'=>1))->result();
		$this->load->view('school/header',$data);
		$this->load->view('school/STUDY_PACKAGE');
		$this->load->view('school/footer');
		
		// $this->load->view('header',$data);
	}
	
	public function enquiry_step_1()
	{
		$post_data=$this->input->post();
		if($id=$this->model->enquiry_step_1($post_data))
		{
			$data['id']=$id;
			$this->load->view('school/enquiry_step_2',$data);
			 //redirect('welcome/enquiry_setp_2/'.$id);
		}
	}

	public function enquiry_step_2()
	{
		$id=$this->input->post('id');
		$hv = array();
		$single = $this->input->post('single');
		foreach($single as $s)
		{
			if($s!="")
			{
				$hv[] = $s;
			}
		}
		$multiple = $this->input->post('multiple');
		foreach($multiple as $m)
		{
			$hv[] = $m;
		}
		
		
			$post_data = implode(",",$hv);
			if($this->model->enquiry_step_2($post_data,$id))
			{
			echo '<h3 class="text-center" style="color:#0c2e8a">We will contact you within 24hrs.</h3><br>';
			echo '<a style="float:right" class="btn btn-info" href="'.base_url().'">SEARCH AGAIN</a>';
			}
	}

	public function product_details($url,$id)
	{
		$data['attributes'] = $this->model->product_attributes($id);
		$data['f_news'] = $this->model->list_flash_news();

		// echo "<pre>"; print_r($data['attributes']->result_array()); die();
		// foreach($data['attributes']->result() as $attributes)
		// {
		// 	$attribute_group[] = $attributes->group_id;
		// }
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['img'] = $this->model->product_images($id);
		$data['social_media']=$this->model->get_social_media();
		$data['product_details']= $this->model->product_details($id);
		
		$data['meta_title'] = $data['product_details']->meta_title;
		$data['meta_description'] = $data['product_details']->meta_description;
		$data['meta_keywords'] = $data['product_details']->meta_keywords;

		
		$data['menus'] = $this->model->get_categories();
		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/product_details',$data);
		$this->load->view('school/footer');
	}

	public function products($url)
	{
		$id = end($this->uri->segment_array());

		$data['social_media']=$this->model->get_social_media();
		$data['f_news'] = $this->model->list_flash_news();

		$data['page_heading']=$this->model->get_heading($id)->name;
		
		$cat_contant=$this->model->get_cat_contant($id);
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['meta_title'] = $cat_contant->meta_title;
		$data['meta_description'] = $cat_contant->meta_description;
		$data['meta_keywords'] = $cat_contant->meta_keywords;

		$data['products']=$this->model->products($id);
		$data['menus'] = $this->model->get_categories();
		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/products',$data);
		$this->load->view('school/footer');
	}

	public function schools_by_heads()
	{
		$hv = array();
		$single = $this->input->post('single');
		foreach($single as $s)
		{
			if($s!="")
			{
				$hv[] = $s;
			}
		}
		$multiple = $this->input->post('multiple');
		foreach($multiple as $m)
		{
			$hv[] = $m;
		}
		
		if(count($hv)>0)
		{
			$data['schools'] = $this->model->schools_by_heads($hv);
			echo "<pre>"; print_r($data['schools']->result_array()); die();
			$this->load->view('school/school_details',$data);
		}

		else
		{
			echo '<h3 class="text-center" style="color:red">* PLEASE SELECT AT LEAST ONE PARAMETER.</h3><br>';
			echo '<a style="float:right" class="btn btn-info" href="'.base_url().'">SEARCH AGAIN</a>';
		}
		
	}

	public function school_form()
	{
		$this->load->view('school/school_form');
	}

	public function add_school()
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

		//echo "<pre>"; print_r($post_data); die();

		$q = $this->model->check_school_exists($post_data['school_name']);
		if(count($q->result_array())>0)
		{
			echo '<input type="submit" class="btn btn-success" value="Submit" />';
			echo '<h4 class="text-center" style="color:red">* The School Name Already Exists!</h4>';
			echo '<h4 class="text-center" style="color:red">* For any query. Please contact to us.</h4>';
		}
		else
		{
			$a = $this->model->insert_school($post_data);
			if($a!='0')
			{
				//echo '<a class="btn btn-warning" onclick="load_next('.$a.')">NEXT</a>';
				echo'<h2 class="text-center" style="color:green">Added Successfully.</h2>';
			}
			else
			{
				echo '<input type="submit" class="btn btn-success" value="Submit" />';
				echo '<h4 class="text-center" style="color:red">* Sorry Some Error Occured!.</h4>';
			}
		}
	}

	public function school_head_form($school_id)
	{
		$data['school']= $school = $this->admin_model->get_school_data($school_id);
		//echo '<pre>'; print_r($data['school']); die();
		$data['steps'] = $this->admin_model->list_steps(1);
		
		$sc_hv = $this->admin_model->school_head_values($school_id);
		$school_hv = array();
		foreach($sc_hv->result() as $a)
		{
			$school_hv[] = $a->head_value_id;
		}
		$data['school_head_values'] = $school_hv;
		$this->load->view('school/school_head_form',$data);
	}

	public function apply_heads($school_id)
	{
		$head_values = $this->input->post('head_value');
		$this->admin_model->delete_school_heads($school_id);
		foreach($head_values as $hv)
		{
			$this->admin_model->apply_heads($school_id,$hv);
		}
		echo '<h2 class="text-center" style="color:green">You Have Registered Successfully.</h2>';
	}
	
	public function send_enquiry()
	{
		$post_data = $this->input->post();
		if($this->model->save_enquiry($post_data))
		{
			echo '<h4 style="color:green">Thanks for enquiry.<br> We will contact you within 24hrs.</h4>';
		}
		else
		{
			echo '<h4 style="color:red">Error! Enquiry not sent.</h4>';
		}
	}

	public function all_news()
	{
		$config = array();
		$config["base_url"] = site_url('welcome/all_news');
		$total_row = $this->model->news_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6 ;
		$config["full_tag_open"] = "<ul class='pagination'>";
		$config["full_tag_close"] = "</ul>";
		$config["next_tag_open"]="<li>";
		$config["next_tag_close"]="</li>";
		$config["prev_tag_open"]="<li>";
		$config["prev_tag_close"]="</li>";
		$config["num_tag_open"]="<li>";
		$config["num_tag_close"]="</li>";
		$config["cur_tag_open"]="<li class='active'><a>";
		$config["cur_tag_close"]="</a></li>";
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);		
		$n['news']=$this->model->get_all_news($config["per_page"],$this->uri->segment(3));
		$data['menus'] = $this->model->get_categories();
		$data['social_media']=$this->model->get_social_media();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();

		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/all_news',$n);
		$this->load->view('school/footer');
		
	}

	public function news_detail($id)
	{
		$data['social_media']=$this->model->get_social_media();
		$data['menus'] = $this->model->get_categories();
		$data['news_detail']=$this->model->get_news_detail($id);
		$data['all_news'] = $this->model->get_all_news1();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/news_detail',$data);
		$this->load->view('school/footer');
	}

	public function school_profile($id)
	{
		$data['profile']= $this->model->school_profile($id);
		$data['image'] = $this->model->school_image($id);
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		// $this->load->view('school/news_header');
		$this->load->view('school/header',$data);

		$this->load->view('school/school_profile',$data);
		$this->load->view('school/footer');
	}


	public function create_school()
	{
		// $this->load->view('school/news_header');
		$this->load->view('school/header',$data);

		$this->load->view('school/school_form',$data);
		$this->load->view('school/footer');
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
	}
	// public function update_details($lang='')
	public function update_details()
	{
		$url = $this->uri->segment(2);
		$id = end($this->uri->segment_array());
		
		$data['social_media']=$this->model->get_social_media();
		$data['f_news'] = $this->model->list_flash_news();
		// $data['update']=$this->model->get_update_detail($id,$lang);
		$data['update']=$this->model->get_update_detail($id);
		$data['meta_title'] = $data['update']->meta_title;
		$data['meta_description'] = $data['update']->meta_description;
		$data['meta_keywords'] = $data['update']->meta_keywords;
		$data['recent_updates']= $this->model->get_recent_updates();
		$data['menus'] = $this->model->get_categories();
		$data['all_news'] = $this->model->get_all_news1();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();

		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/update_details');
		$this->load->view('school/footer');

	}
	
	public function more($url,$id='')
	{
		// $url = $this->uri->segment(2);
		// $id = end($this->uri->segment_array());

		if ($id==null) 
		{
			$data['social_media']=$this->model->get_social_media();
			$data['f_news'] = $this->model->list_flash_news();
			$data['info_page']= $this->model->get_info_page();
			$data['menus'] = $this->model->get_categories();
			$data['all_news'] = $this->model->get_all_news1();

			// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

			$this->load->view('school/info_page');
			$this->load->view('school/footer');
		}
		else
		{
			$data['menus'] = $this->model->get_categories();
			$data['f_news'] = $this->model->list_flash_news();
			$data['slides'] = $this->model->get_slides();
			// $data['steps'] = $this->model->get_steps();
			$data['news'] = $this->model->get_news();
			$data['adds'] = $this->model->get_adds();
			$data['country'] =$this->model->get_country();
			$data['product_image']=$this->model->get_pro_img();
			$data['contact']=$this->model->get_contact();
			$data['about_us']=$this->model->get_about_us();
			$data['programs']=$this->model->get_programs();

			
			$data['info_page']= $this->model->get_info_page($id);
			$data['f_news'] = $this->model->list_flash_news();
			$data['meta_title'] = $data['info_page']->meta_title;
			$data['meta_description'] = $data['info_page']->meta_description;
			$data['meta_keywords'] = $data['info_page']->meta_keywords;
			$data['testimonials'] = $this->model->get_testimonials();
			$data['updates'] = $this->model->get_updates();
			$data['social_media']=$this->model->get_social_media();

			// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

			$this->load->view('school/info_page');
			$this->load->view('school/footer');
		}
	}



	public function about($id='')
	{
		$url = $this->uri->segment(2);
		$id = end($this->uri->segment_array());

		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		// $data['steps'] = $this->model->get_steps();
		$data['news'] = $this->model->get_news();
		$data['adds'] = $this->model->get_adds();
		$data['country'] =$this->model->get_country();
		$data['product_image']=$this->model->get_pro_img();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['about_page']=$this->model->get_about_us_page($id);
		$data['meta_title'] = $data['about_page']->meta_title;
		$data['meta_description'] = $data['about_page']->meta_description;
		$data['meta_keywords'] = $data['about_page']->meta_keywords;
		$data['testimonials'] = $this->model->get_testimonials();
		$data['updates'] = $this->model->get_updates();
		$data['social_media']=$this->model->get_social_media();

		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/about',$data);
		$this->load->view('school/footer');
	}

	public function program($id='')
	{
		$url = $this->uri->segment(2);
		$id = end($this->uri->segment_array());
			
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		// $data['steps'] = $this->model->get_steps();
		$data['news'] = $this->model->get_news();
		$data['adds'] = $this->model->get_adds();
		$data['country'] =$this->model->get_country();
		$data['product_image']=$this->model->get_pro_img();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['program']=$this->model->get_program($id);
		$data['meta_title'] = $data['program']->meta_title;
		$data['meta_description'] = $data['program']->meta_description;
		$data['meta_keywords'] = $data['program']->meta_keywords;
		$data['testimonials'] = $this->model->get_testimonials();
		$data['updates'] = $this->model->get_updates();
		$data['social_media']=$this->model->get_social_media();
		
		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);
		
		$this->load->view('school/program',$data);
		$this->load->view('school/footer');
	}

	public function gallery()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		$data['gallery']=$this->model->event_gallery();

		// echo "<pre>";
		// print_r($data['gallery']);
		// echo "</pre>";
		// die();

		$data['meta_title'] = '';
		$data['meta_description'] = '';
		$data['meta_keywords'] = '';

		// $this->load->view('school/news_header',$data);
		$this->load->view('school/header',$data);

		$this->load->view('school/gallery');
		$this->load->view('school/footer');

	}

	function admission()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		// $data['meta_title'] = $data['program']->meta_title;
		// $data['meta_description'] = $data['program']->meta_description;
		// $data['meta_keywords'] = $data['program']->meta_keywords;
		$data['admission']=$this->model->get_data_by_id('registration_page',1);

		$this->load->view('school/header',$data);
		$this->load->view('school/admission',$data);
		$this->load->view('school/footer');
		

	}

	function admission_form($admin='0')
	{
		if($this->input->server('REQUEST_METHOD')=='POST')
	   	  {

	   	  	$post_data=$this->input->post();
	   	  	unset($post_data['reg_by_admin']);
	   	 	if ($admin=="0") 
	   	  	{
	   	  		$post_data['reg_by_admin']='student';
	   	  	}
	   	  	else
	   	  	{
	   	  		$user_id=$this->session->userdata('user_id');
	   	  		$user=$this->main_model->get_data_id('admin',$user_id);
	               if ($user) 
	               {
	                 $post_data['reg_by_admin'] =  $user->name;
	               }
	               else
	               {
	                $post_data['reg_by_admin'] =  $user_id;
	               }
	   	  		
	   	  	}
	   	  	
	   	  	
	   	  	$class=$this->input->post('present_class');
	   	  	$p_c=$this->input->post('program_code');
	   	  	$student_name=$this->input->post('student_name');
	   	  	$mobile_no=$this->input->post('mobile_no');
	   	  	$test_date=$this->input->post('admission_test_date');
	   	  


	   	  		
	   	  	// registration_no

	   	  	

	   	  	$new_date = date("dm", strtotime($test_date));
	   	  	$this->db->where(array('program_code'=>$p_c,'admission_test_date'=>$test_date));
	   	  	$regg=$this->db->count_all_results('admission');
	   	  	// echo $regg;
	   	  	$num = $regg+1;
	   	  	$len= strlen($num);
		 	if ($len==1) 
		 	{
		 		 $num1='000'.$num;
		 	}
		 	elseif ($len==2) 
		 	{
		 		 $num1='00'.$num;
		 	}
		 	elseif($len==3)
		 	{
		 		 $num1='0'.$num;
		 	}
		 	elseif($len==4) 
		 	{
		 		 $num1=$num;
		 	}
		 	else
		 	{
		 		$num1=$num;
		 	}

		 	// #######
		 	
		 		$len_p_c= strlen($p_c);
			 	if ($len_p_c==1) 
			 	{
			 		$pro_c='0'.$p_c;
			 	}
			 	else
			 	{
			 		$pro_c=$p_c;
			 	}
		 	
		 	// ###############

		 	$reg_number="JE".$pro_c.$new_date.$num1;
	   	  	$post_data['registration_no']=$reg_number;
	   	  	// registration_no
	   	 	
	   	  // echo $post_data['registration_no']."<br>";
	   	  // 		echo $post_data['reg_by_admin'];
	   	  // 		// print_r($post_data);
	   	  // 		die();

	   	  	if($this->check_reg($student_name,$mobile_no,$p_c,$test_date))
	   	  	{

	   	  		if($id=$this->model->add_data_get_id('admission',$post_data))
		   	  	{
		   	  		$msg='Thank you for registration. Your Jee Expert registration number is '.$reg_number.'. '.base_url().'Registration-Fee-Payment goto this link for pay registration fee and complete your registration process.';

	   	  			$mail= "Student Name - ".$student_name.", Registration No. - ".$reg_number .", Application by - ".$post_data['reg_by_admin'];
	   	  			$this->send_mail($mail);
	   	  			$this->send_sms($msg,$mobile_no);
	   	  			
		   	  		
			   	  	if ($admin=="1") 
			   	  	{
			   	  		$this->session->set_flashdata('success','Registration Successful. Registration No. '.$reg_number);
			   	  		echo $reg_number ;
			   	  	}
			   	  	else
			   	  	{
			   	  		echo $reg_number ;
			   	  	}
			   	}

	   	  	}
	   	  	else
	   	  	{
	   	  		echo 1;
	   	  	}
	   	  	
	   	  	die();
	   	  	

	   	  	// die();
	   	  }
	   	$test=$this->model->get_data_by_status('test_date');

	   	$test_date=array();	
	   	foreach ($test->result() as $row) 
	   	{
	   		$t_date=$this->model->get_data_by_id('test',$row->test_id);
	   		$test_date[]=$t_date->test_date;
	   	}
	   	$data['test_date']=$test_date;
	   	// echo "<pre>";
	   	// print_r($test_date);
	   	// echo "</pre>";
	   	// die();

	   	// $data['admission_test_date']=$this->model->get_data_by_id('registration_page',1)->admission_test_date;
	   	// $test=$this->model->get_data_by_status('test')->row();
	   	// $data['admission_test_date']=$test->test_date;
	   	$this->db->order_by('class','asc');
	   	$data['c_master'] = $this->model->get_data_by_status('class_master')->result();


	   	// echo "<pre>";
	   	// print_r($data['c_master']);
	   	// echo "</pre>";
	   	// die();

		$this->load->view('school/admission_form',$data);
	}



	function check_reg($name,$mob,$p_c,$test_date)
	{

		$data = array('student_name'        => $name,
					  'mobile_no'           => $mob,
					  // 'program_code'        => $p_c);
					  'admission_test_date' => $test_date);
		$query=$this->db->get_where('admission',$data)->result();
		

		if(count($query)==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function upload_file($id,$filename)
	{
		$file = explode(".",$_FILES[$filename]["name"]);
		$file_name1 = $file[0].time();
		$extension = end($file);
		$file_name_full = time().".".$extension;
		
		$target_dir = "images/admission/".$filename."/";
		$target_file = $target_dir . basename($file_name_full);
		$uploadOk = '1';
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// echo $_FILES[$filename]["size"]."<br>";
		// echo $file_name_full."<br>";
		// echo $target_dir."<br>";
		if ($_FILES[$filename]["size"] > 100000) 
		{
		    echo "Sorry, your file is too large.";
		    $uploadOk = '0';
		}

		if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
			 ) 
		{
		    echo "Sorry, only JPG, JPEG & PNG  files are allowed.";
			$uploadOk = '0';
		}
		if ($uploadOk == '0') 
		{
		    echo "Sorry, your file was not uploaded.";
		}

		else 
		{
		    if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
		       
				$column_name=$filename;
				$table_name='admission';
				$this->model->update_data($table_name,$column_name,$file_name_full,$id);
		}
	}

	
}
public function thank_you($reg_no='')
	{
		$data['reg_no']=$reg_no;
		$this->load->view('school/thank_you',$data);
	}


	function key_achievements()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		// $data['meta_title'] = $data['program']->meta_title;
		// $data['meta_description'] = $data['program']->meta_description;
		// $data['meta_keywords'] = $data['program']->meta_keywords;
		// $data['testimonials'] = $this->model->get_testimonials();
		$data['achievement']=$this->model->get_data($table_name='achievements');
		$this->load->view('school/header',$data);
		$this->load->view('school/key_achievements',$data);
		$this->load->view('school/footer');
	}

	public function send_sms($msg,$mob)
	{
		// $msg='Thank you for registration. Your Jee Expert registration number is 111111\n 
		//    	  			'.base_url().'Registration-Fee-Payment 
		//    	  			goto this link for pay registration fee and complete your registration process.';
		// $mob="9628824087";

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

	function enrollment()
	{
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		// $data['meta_title'] = $data['program']->meta_title;
		// $data['meta_description'] = $data['program']->meta_description;
		// $data['meta_keywords'] = $data['program']->meta_keywords;
		

		$this->load->view('school/header',$data);
		$this->load->view('school/enrollment',$data);
		$this->load->view('school/footer');

	}

	public function achiev_detail($id)
	{
		$data['achievement'] =$this->model->get_data_by_id($table_name='achievements',$id);
		$state_id=$data['achievement']->state;
		$city_id=$data['achievement']->city;
		$type_id=$data['achievement']->type;
		$data['type']=$this->model->get_data_by_id($table_name='achivement_type',$type_id)->title;
		$data['state'] = $this->model->get_data_by_id($table_name='states',$state_id)->name;
		$data['city']=$this->model->get_data_by_id($table_name='cities',$city_id)->name;
		$this->load->view('school/achievement_detail',$data);
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
		// $this->email->to('ankitv4087@gmail.com');
		$this->email->to('sndpsingh166@gmail.com'); 
		$this->email->subject($subject);
		$this->email->message($message);  
		$this->email->send();

}


	// amit


public function employment()
	{ 
		$data['menus'] = $this->model->get_categories();
		$data['f_news'] = $this->model->list_flash_news();
		$data['slides'] = $this->model->get_slides();
		$data['contact']=$this->model->get_contact();
		$data['about_us']=$this->model->get_about_us();
		$data['programs']=$this->model->get_programs();
		$data['social_media']=$this->model->get_social_media();
		// $data['meta_title'] = $data['program']->meta_title;
		// $data['meta_description'] = $data['program']->meta_description;
		// $data['meta_keywords'] = $data['program']->meta_keywords;
		

		$this->load->view('school/header',$data);
		$this->load->view('school/employment',$data);
		$this->load->view('school/footer');		 
	}

public function register_career()
{     
  	if($this->input->server('REQUEST_METHOD')=='POST')
   	{
	  // checking the fields
	 	if($this->input->post('faculty')=='NA')
	    {
			$this->session->set_flashdata('error', "<h3 style='color:red'>Please Select the faculty in 'Position applying for' section.</h3>");
 			redirect('welcome/employment');
		}

		elseif($this->input->post('position')==NULL)
		{
			$this->session->set_flashdata('error', "<h3 style='color:red'>Please Select the Position in 'Position applying for' section .</h3>");
 			redirect('welcome/employment');
		}
		// checking the fields
		$pho=$_FILES['userfile']['name'] ;
		$sign=$_FILES['sign']['name'] ;
		if(isset($pho))
		{
		   // inser img and files 
	        $_FILES['file']['name']     = $_FILES['userfile']['name'];
            $_FILES['file']['type']     = $_FILES['userfile']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
            $_FILES['file']['error']    = $_FILES['userfile']['error'];
            $_FILES['file']['size']     = $_FILES['userfile']['size'];
			$new_name = time().'photo'.'.jpg';
			$config['file_name'] = $new_name;
          // File upload configuration
            $uploadPath = './assets/pic_sign';
            $config['upload_path'] = $uploadPath;
			$path=$config['upload_path'];
		  // resize image
			$config['overwrite'] = true;
			$config['remove_spaces'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG';			
		  // resize image
          // Load and initialize upload library
			$this->upload->initialize($config);               
          // Upload file to server
	        if($this->upload->do_upload('file'))
	        { 
                // Uploaded file data
                $fileData = $this->upload->data();
                $uploadData['file_name'] = $fileData['file_name'];
                $uploadD['uploaded_on'] = date("Y-m-d H:i:s");
			    $px=$path='assets/pic_sign/'.$config['file_name'];
				// image resize
				$config['image_library'] = 'gd2';
				$config['source_image'] = $path;
				$config['create_thumb'] = false;
				$config['maintain_ratio'] = false;
				$config['width']    = 420;
				$config['height']   = 420;
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				// image resize
			}
			else
			{ 
				$px=''; 
			} 
		  }

		  if(isset($sign))
		  {
			   // inser img and files 
		        $_FILES['file']['name']     = $_FILES['sign']['name'];
                $_FILES['file']['type']     = $_FILES['sign']['type'];
                $_FILES['file']['tmp_name'] = $_FILES['sign']['tmp_name'];
                $_FILES['file']['error']    = $_FILES['sign']['error'];
                $_FILES['file']['size']     = $_FILES['sign']['size'];	
				$new_name = time().'sign'.'.jpg';
				$config['file_name'] = $new_name;
                // File upload configuration
                $uploadPath = './assets/pic_sign';
                $config['upload_path'] = $uploadPath;
 				$path2=$config['upload_path'];
    			// resize image
				$config['overwrite'] = true;
				$config['remove_spaces'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG';			 
	    		// resize image
                // Load and initialize upload library
			    $this->upload->initialize($config);               
                // Upload file to server
                if($this->upload->do_upload('file'))
                { 
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData['file_name'] = $fileData['file_name'];
                    $uploadD['uploaded_on'] = date("Y-m-d H:i:s");
				    $path2='assets/pic_sign/'.$config['file_name'];
					// image resize
					$config['image_library'] = 'gd2';
					$config['source_image'] = $path2;
					$config['create_thumb'] = false;
					$config['maintain_ratio'] = false;
					$config['width']    = 300;
					$config['height']   = 300;
					$this->load->library('image_lib', $config);
					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					// image resize
				}
				else
				{ 
				  $path2=''; 
				} 
		  }  
		  // $px; 
	   	  // inser img and files 
	   	  $q = $this->model->add_user($px,$path2); 
		  if($q>=20)
		  {
				$this->session->set_flashdata('error','This Details already  exist. Try to Fill Application with Another Mobile number.');
			  	redirect('welcome/employment');
		   }
		   elseif($q==TRUE)
	   	   { 
     			$this->session->set_flashdata('success','Registration Done Successfully. We will get you soon.');
			  	redirect('welcome/employment');
	   	  	}
	   	  	else
	   	  	{
	   	  		$this->session->set_flashdata('error','Sorry Some Error Occured.
				Please Re-submit the application after some time.');
			    redirect('welcome/employment');
	   	  	} 
	   	  }
	   	  $this->load->view('school/career_form');

	}
	// amit


public function test()
{
	$num = 12;
 	$len= strlen($num);
 	if ($len==1) 
 	{
 		echo $num1='000'.$num;
 	}
 	elseif ($len==2) 
 	{
 		echo $num1='00'.$num;
 	}
 	elseif($len==3)
 	{
 		echo $num1='0'.$num;
 	}
 	elseif($len==4) 
 	{
 		echo $num1=$num;
 	}
 	else
 	{
 		echo $num1=$num;
 	}
}


function get($tb,$data=0)
{
	if ($data==0){
		if($query=$this->db->get($tb))
		{
			return $query->result();
		}
		return false;
	}
	else{
		if ($query=$this->db->get_where($tb,$data)) 
		{
			return $query->result();
		}
		return false;
	}
}


}
