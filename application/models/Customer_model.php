<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Customer_model extends CI_Model
{
	public function find_all_customer_info(){
		
		 $result = $this->db->where('cus_status', 'a')->get('customers')->result();
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
			'cus_status'	=>'a'
		);

		$result = $this->db->insert('customers', $attr);
		$cus_id = $this->db->insert_id();

		if($result): return $cus_id; else: return FALSE; endif;
	}

	public function customer_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->where('cus_status', 'a')->get('customers')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}
}