<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Pricing_model extends CI_Model
{
	/*======== Get all Employee Information =======*/
	public function find_all_pricing_info()
	{
		$this->db->select('purchase_pricing.id, purchase_pricing.created_at, customers.cus_name, purchase.puc_chassis_no, purchase.puc_engine_no, purchase.puc_car_model, purchase.total_price')->from('purchase_pricing');
		$this->db->join('purchase', 'purchase_pricing.pus_id = purchase.id');
		$this->db->join('customers', 'purchase.customer_id = customers.id', 'left');
		$result = $this->db->where('purchase_pricing.status', 'a')->order_by('purchase_pricing.id', 'desc')->get()->result();

		if($result){return $result; }else{ return FALSE;}
	}

	/*====== store employee data ========*/
	public function store_pricing_data()
	{
		$attr = array(

			'pus_id'		=> $this->input->post('pus_id'),
			'lc_value'		=> $this->input->post('lc_value'),
			'obc_value'		=> $this->input->post('obc_value'),
			'insurance_charge'		=> $this->input->post('insurance_charge'),
			'final_dosis'		=> $this->input->post('final_dosis'),
			'custom_value'	=> $this->input->post('custom_value'),
			'cf_agent'	=> $this->input->post('cf_agent'),
			'cuharf_value'	=> $this->input->post('cuharf_value'),
			's_charge'	=> $this->input->post('s_charge'),
			'regi_charge'	=> $this->input->post('regi_charge'),
			'first_party_insu'	=> $this->input->post('first_party_insu'),
			'third_party_insu'	=> $this->input->post('third_party_insu'),
			'workshop_bill'	=> $this->input->post('workshop_bill'),
			'decuration_bill'	=> $this->input->post('decuration_bill'),
			'other_exp'	=> $this->input->post('other_exp'),
			'status'		=> 'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d H:i:s'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$insert = $this->db->insert('purchase_pricing', $attr);
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