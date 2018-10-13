<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Customer_model extends CI_Model
{
	public function find_all_customer_info(){
		
		 $result = $this->db->where('cus_status', 'a')->order_by('id', 'desc')->get('customers')->result();
		 if($result){
		 	return $result;
		 }else{
		 	return FALSE; 
		 }
	}

	public function store_customer_info()
	{
		$attr = array(
			'cus_code'	=>$this->input->post('cus_code'),
			'cus_name'	=>$this->input->post('cus_name'),
			'cus_contact_no'	=>$this->input->post('cus_contact_no'),
			'alt_contact_no'	=>$this->input->post('alt_contact_no'),
			'cus_entry_date'	=>$this->input->post('cus_entry_date'),
			'cus_email'	=>$this->input->post('cus_email'),
			'cus_address'	=>$this->input->post('cus_address'),
			'cus_status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('customers', $attr);
		$cus_id = $this->db->insert_id();

		if($result): return $cus_id; else: return FALSE; endif;
	}

	public function customer_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->get('customers')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*========== Update Customer Info ===========*/
	public function update_customer_info($id=Null)
	{
		$attr = array(
			'cus_code'	=>$this->input->post('cus_code'),
			'cus_name'	=>$this->input->post('cus_name'),
			'cus_contact_no'	=>$this->input->post('cus_contact_no'),
			'alt_contact_no'	=>$this->input->post('alt_contact_no'),
			'cus_entry_date'	=>$this->input->post('cus_entry_date'),
			'cus_email'	=>$this->input->post('cus_email'),
			'cus_address'	=>$this->input->post('cus_address'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('customers', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Delete customr info ========*/
	public function delete_customer_info($id=Null)
	{
		$attr = array('cus_status'=>'d');
		$this->db->where('id', $id);
		$qu = $this->db->update('customers', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}