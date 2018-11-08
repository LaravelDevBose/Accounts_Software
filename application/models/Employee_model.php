<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Employee_model extends CI_Model
{
	/*======== Get all Employee Information =======*/
	public function find_all_employee_info()
	{
		$result = $this->db->where('status', 'a')->order_by('id', 'desc')->get('employees')->result();
		if($result){return $result; }else{ return FALSE;}
	}

	/*====== store employee data ========*/
	public function store_employee_data()
	{
		$attr = array(

			'emp_name'		=> $this->input->post('emp_name'),
			'emp_dob'		=> $this->input->post('emp_dob'),
			'emp_nid'		=> $this->input->post('emp_nid'),
			'emp_phone'		=> $this->input->post('emp_phone'),
			'emp_email'		=> $this->input->post('emp_email'),
			'emp_join_date'	=> $this->input->post('emp_join_date'),
			'emp_sallary'	=> $this->input->post('emp_sallary'),
			'pre_address'	=> $this->input->post('pre_address'),
			'par_address'	=> $this->input->post('par_address'),
			'status'		=> 'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$insert = $this->db->insert('employees', $attr);
		if($insert){return TRUE;}else{return FALSE;}
	}

	/*====== find Employee By id =======*/
	public function employee_by_id($id=Null)
	{
		$result = $this->db->where('id', $id)->where('status', 'a')->get('employees')->row();
		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*======= Update Employee data ==========*/
	public function update_employee_data($id=Null)
	{
		$attr = array(

			'emp_name'		=> $this->input->post('emp_name'),
			'emp_dob'		=> $this->input->post('emp_dob'),
			'emp_nid'		=> $this->input->post('emp_nid'),
			'emp_phone'		=> $this->input->post('emp_phone'),
			'emp_email'		=> $this->input->post('emp_email'),
			'emp_join_date'	=> $this->input->post('emp_join_date'),
			'emp_sallary'	=> $this->input->post('emp_sallary'),
			'pre_address'	=> $this->input->post('pre_address'),
			'par_address'	=> $this->input->post('par_address'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$insert = $this->db->update('employees', $attr);
		if($this->db->affected_rows()){return TRUE;}else{return FALSE;}
	}

	/*======= Delete Employee Data =========*/
	public function delete_employee_data($id=Null)
	{	
		$attr = array('status'=> 'd');

		$this->db->where('id', $id);
		$this->db->update('employees', $attr);
		if($this->db->affected_rows()){return TRUE;}else{return FALSE;}
	}
}