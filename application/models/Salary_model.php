<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Salary_model extends CI_Model
{

	/*======== get all sallary information ===========*/
	public function get_all_salary()
	{
		$this->db->select('salaries.*,sallay_months.year, months.month_name,employees.emp_name');
		$this->db->from('salaries');
		$this->db->join('employees', 'salaries.emp_id = employees.id');
		$this->db->join('sallay_months', 'salaries.month_id = sallay_months.id');
		$this->db->join('months', 'sallay_months.month_id = months.id');
		$res = $this->db->where('salaries.status', 'a')->order_by('salaries.id', 'desc')->get()->result();

		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*====== Salary Payment Store =====*/
	public function store_salary_payment()
	{
		$attr = array(
			'emp_id' => $this->input->post('emp_id'),
			'month_id' => $this->input->post('month_id'),
			'date' => $this->input->post('date'),
			'payment_amount' => $this->input->post('payment_amount'),
			'due_amount' => $this->input->post('due_amount'),
			'status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$res = $this->db->insert('salaries', $attr);
		if($res){ return TRUE;}else{return FALSE; }
	}

	/*======= salary info by id ========*/
	public function salary_info_by_id($id=Null)
	{
		$this->db->select('salaries.*,sallay_months.year, months.month_name,employees.emp_name, employees.emp_sallary');
		$this->db->from('salaries');
		$this->db->join('employees', 'salaries.emp_id = employees.id');
		$this->db->join('sallay_months', 'salaries.month_id = sallay_months.id');
		$this->db->join('months', 'sallay_months.month_id = months.id');
		$res = $this->db->where('salaries.id', $id)->get()->row();

		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*======== Update Salary payment Info =======*/
	public function update_salary_payment($id=Null)
	{	
		// print_r($this->input->post()); die();
		$attr = array(
			'emp_id' => $this->input->post('emp_id'),
			'month_id' => $this->input->post('month_id'),
			'date' => $this->input->post('date'),
			'payment_amount' => $this->input->post('payment_amount'),
			'due_amount' => $this->input->post('due_amount'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('salaries', $attr);
		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}


	/*====== Delete Salary Payment Info =======*/
	public function delete_salary_payment($id=Null)
	{
		$attr = array('status'=>'d');
		$this->db->where('id', $id);
		$this->db->update('salaries', $attr);
		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}

	/*====== sum paid salary amount by id ========*/
	public function paid_salary_amount($emp_id=Null, $month_id = Null)
	{
		$res = $this->db->select_sum('payment_amount')->where('emp_id', $emp_id)->where('month_id',$month_id)->where('status', 'a')->get('salaries')->row();
		if($res){ return $res;}else{return FALSE;}
	}

	/*===== date to date salary report =========*/
	public function salary_date_to_date($date_from = Null, $date_to = Null)
	{
		$this->db->select('salaries.*,sallay_months.year, months.month_name,employees.emp_name');
		$this->db->from('salaries');
		$this->db->join('employees', 'salaries.emp_id = employees.id');
		$this->db->join('sallay_months', 'salaries.month_id = sallay_months.id');
		$this->db->join('months', 'sallay_months.month_id = months.id');
		$this->db->where('salaries.date >=', $date_from)->where('salaries.date <=', $date_to);
		$res = $this->db->where('salaries.status', 'a')->order_by('salaries.date', 'desc')->get()->result();

		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*======= find employee salary Info =========*/
	public function find_employee_salary($emp_id=Null)
	{
		$this->db->select('salaries.*,sallay_months.year, months.month_name,employees.emp_name');
		$this->db->from('salaries');
		$this->db->join('employees', 'salaries.emp_id = employees.id');
		$this->db->join('sallay_months', 'salaries.month_id = sallay_months.id');
		$this->db->join('months', 'sallay_months.month_id = months.id');
		$this->db->where('salaries.emp_id', $emp_id);
		$res = $this->db->where('salaries.status', 'a')->order_by('salaries.date', 'desc')->get()->result();

		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*========== Total Salary count ===========*/
    public function total_sallary(){
        $res = $this->db->where('status', 'a')->select_sum('payment_amount	','amount')->get('salaries')->row();

        if($res){ return $res; }else{ return false;}
    }
}