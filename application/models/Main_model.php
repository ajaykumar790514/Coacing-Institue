<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model 
{

	public function get_data($tb,$data=0)
	{
		if($data==0)
		{
			$this->db->order_by('id','desc');
			// $this->db->order_by('parent','acs');
	 		return	$this->db->get($tb)->result();
		}
		else
		{
			$this->db->order_by('id','desc');
			return $this->db->get_where($tb,$data)->result();
		}	
	}

	function get($tb,$data=0)
	{
		if ($data==0) {
			if($query=$this->db->get($tb)){
				return $query->result();
			}
			return false;
		}
		else{
			if ($query=$this->db->get_where($tb,$data)) {
				return $query->result();
			}
			return false;
		}
	}

	public function get_menus()
	{
		$this->db->order_by('id','desc');
		$this->db->order_by('parent','acs');
	 	return	$this->db->get('manage_menu')->result();	
	}

	function get_data_id($tb,$id)
	{
		return $this->db->get_where($tb,array('id'=>$id))->row();
	}
	function get_data_stu_id($tb,$id)
	{
		return $this->db->get_where($tb,array('stu_id'=>$id))->row();
	}
	public function add_data($tb,$data)
	{
		if($this->db->insert($tb,$data))
		{
			return true;
		}
		return false; 
	}

	public function add_data_get_id($tb,$data)
	{
		if($this->db->insert($tb,$data))
		{
			return $this->db->insert_id();
		}
		return false;
	}

	public function get_menu()
	{
		$this->db->order_by('title','asc');
		return $this->db->get_where('manage_menu',
						  array('parent' => '0', 'status' =>'1' ))->result();
	}

	public function get_sub_menu()
	{
		return $this->db->get_where('manage_menu',
						  array('parent !=' => '0', 'status' =>'1' ))->result();
	}

	public function update_data($tb,$data,$id)
	{
		$this->db->where('id',$id);
		if($this->db->update($tb,$data))
		{
			return true;
		}
		return false; 
	}
	public function update_data_stu($tb,$data,$id)
	{
		$this->db->where('stu_id',$id);
		if($this->db->update($tb,$data))
		{
			return true;
		}
		return false; 
	}
	public function dalete_data($tb,$id)
	{
		$this->db->where('id',$id);
		if($this->db->delete($tb))
		{
			return true;
		}
		return false; 
	}

	public function daleteData($tb,$data)
	{
		$this->db->where($data);
		if($this->db->delete($tb))
		{
			return true;
		}
		return false; 
	}


	public function get_programs_by_class($class_id) {
        $this->db->select('*');
        $this->db->from('program_master');
        $this->db->where('class', $class_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_batches_by_program($program_id,$class) {
        $this->db->select('*');
        $this->db->from('batch_master');
        $this->db->where(['program_id'=>$program_id,'class'=>$class]);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_table_data($batch_id, $search,$class ,$program) {
		  $conditions = array();
		  if (!empty($batch_id) && is_numeric($batch_id)) {
			  $conditions['stu_batch'] = $batch_id;
		  }
		  if (!empty($class) && is_numeric($class)) {
			  $conditions['stu_class'] = $class;
		  }
		  if (!empty($program) && is_numeric($program)) {
			  $conditions['stu_program'] = $program;
		  }
	     $conditions['del_status'] = '0';
        $this->db->select('*');
        $this->db->from('stu_info');
		$this->db->where($conditions);
        if (!empty($search)) {
            $this->db->like('mobile_no', $search);
			$this->db->or_like('enrollment_no', $search);
			$this->db->or_like('email', $search); 
			$this->db->or_like('name', $search); 
        }
        $query = $this->db->get();
        return $query->result();
    }


	public function get_table_data_admission($batch_id, $search, $class, $program, $start_date, $end_date) {
		$conditions = array();
		if (!empty($batch_id) && is_numeric($batch_id)) {
			$conditions['stu_batch'] = $batch_id;
		}
		if (!empty($class) && is_numeric($class)) {
			$conditions['stu_class'] = $class;
		}
		if (!empty($program) && is_numeric($program)) {
			$conditions['stu_program'] = $program;
		}
		$conditions['del_status'] = '0';
	
		if (!empty($start_date)) {
			$this->db->where('enrollment_date >=', $start_date);
		}
		if (!empty($end_date)) {
			$this->db->where('enrollment_date <=', $end_date);
		}
	
		$this->db->select('*');
		$this->db->from('stu_info');
		$this->db->where($conditions);
	
		if (!empty($search)) {
			$this->db->group_start();
			$this->db->like('mobile_no', $search);
			$this->db->or_like('enrollment_no', $search);
			$this->db->or_like('email', $search);
			$this->db->or_like('name', $search);
			$this->db->group_end();
		}
	
		$query = $this->db->get();
		if ($query === false) {
			return array();
		}
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}
	

	public function get_students_between_dates() {
		$today = date('Y-m-d');
		$end_date = date('Y-m-d', strtotime('+30 days'));
	
		$this->db->select('*');
		$this->db->from('stu_info');
		$this->db->where('enrollment_date >=', $today); 
		$this->db->where('enrollment_date <=', $end_date); 
		$this->db->where('del_status', 0);
		$query = $this->db->get();
	
		if ($query !== FALSE && $query->num_rows() > 0) {
			return $query->result();
		} else {
			return array(); 
		}
	}
	
	
	
	public function get_students_between_dates_colletion() {
		// Get today's date
		$today = date('Y-m-d');
		$end_date = date('Y-m-d', strtotime('+30 days'));
		$this->db->select('b.*,a.transaction_amount,a.payment_mode,a.tr_date,a.transaction_id,c.due,c.duedate,c.total_fee,a.due_amount');
		$this->db->from('transaction_success a');
		$this->db->join('stu_info b', 'b.enrollment_no=a.registration_no');
		$this->db->join('stu_fees c', 'c.stu_id=b.stu_id');
		$this->db->where('a.tr_date >=', $today); 
		$this->db->where('a.tr_date <=', $end_date); 
		$this->db->where('b.del_status', 0);
		$this->db->order_by('a.tr_date', 'DESC');
		$query = $this->db->get();
		
		if ($query !== FALSE && $query->num_rows() > 0) {
			return $query->result();
		} else {
			return array(); 
		}
	}
	
	

	public function get_table_data_fee_colletion($batch_id, $search, $class, $program, $start_date, $end_date,$payment_mode) {
		$conditions = array();
		if (!empty($batch_id) && is_numeric($batch_id)) {
			$conditions['b.stu_batch'] = $batch_id;
		}
		if (!empty($class) && is_numeric($class)) {
			$conditions['b.stu_class'] = $class;
		}
		if (!empty($program) && is_numeric($program)) {
			$conditions['b.stu_program'] = $program;
		}
		if (!empty($payment_mode)) {
			$conditions['a.payment_mode'] = $payment_mode;
		}
		$conditions['b.del_status'] = '0';
	
		if (!empty($start_date)) {
			$this->db->where('a.tr_date >=', $start_date);
		}
		if (!empty($end_date)) {
			$this->db->where('a.tr_date <=', $end_date);
		}
	
		$this->db->from('transaction_success a');
		$this->db->select('b.*,a.transaction_amount,a.payment_mode,a.tr_date,a.transaction_id,c.due,c.duedate');
		$this->db->join('stu_info b','b.enrollment_no=a.registration_no');
		$this->db->join('stu_fees c', 'c.stu_id=b.stu_id');
		$this->db->order_by('a.tr_date','DESC');
		$this->db->where($conditions);
	
		if (!empty($search)) {
			$this->db->group_start();
			$this->db->like('b.mobile_no', $search);
			$this->db->or_like('b.enrollment_no', $search);
			$this->db->or_like('b.email', $search);
			$this->db->or_like('b.name', $search);
			$this->db->group_end();
		}
	
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_students_between_dates_due() {
		// Get today's date
		$today = date('Y-m-d');
		$end_date = date('Y-m-d', strtotime('+30 days'));
		$this->db->select('a.*,b.due,b.duedate');
		$this->db->from('stu_info a');
		$this->db->join('stu_fees b','b.stu_id=a.stu_id');
		$this->db->where('b.duedate >=', $today); 
		$this->db->where('b.duedate <=', $end_date); 
		$this->db->where('a.del_status', 0);
		$this->db->order_by('b.duedate','DESC');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function get_table_data_dueamount($batch_id, $search, $class, $program, $start_date, $end_date,$duedays) {
		$conditions = array();
		if (!empty($batch_id) && is_numeric($batch_id)) {
			$conditions['a.stu_batch'] = $batch_id;
		}
		if (!empty($class) && is_numeric($class)) {
			$conditions['a.stu_class'] = $class;
		}
		if (!empty($program) && is_numeric($program)) {
			$conditions['a.stu_program'] = $program;
		}
		
	
		$conditions['a.del_status'] = '0';
	
		
	
		$this->db->from('stu_info a');
		$this->db->select('a.*,b.due,b.duedate');
		$this->db->join('stu_fees b','b.stu_id=a.stu_id');
		$this->db->where($conditions);
		$this->db->order_by('b.duedate','DESC');
		if (!empty($duedays)) {
			$this->db->where("DATEDIFF(b.duedate, NOW()) =", $duedays);
		}else{
			if (!empty($start_date)) {
				$this->db->where('b.duedate >=', $start_date);
			}
			if (!empty($end_date)) {
				$this->db->where('b.duedate <=', $end_date);
			}
		}
		if (!empty($search)) {
			$this->db->group_start();
			$this->db->like('a.mobile_no', $search);
			$this->db->or_like('a.enrollment_no', $search);
			$this->db->or_like('a.email', $search);
			$this->db->or_like('a.name', $search);
			$this->db->group_end();
		}
	
		$query = $this->db->get();
		return $query->result();
	}


}

?>