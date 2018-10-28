<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Check_model extends CI_Model
{
	/*======== get all data info =========*/
	public function get_all_check_info()
	{	
		$this->db->select('checks.*, customers.cus_name');
		$this->db->from('checks');
		$this->db->join('customers', 'checks.cus_id = customers.id' );
		$this->db->where('checks.status', 'a')->order_by('id', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}


		$result= $this->db->where('status', 'a')->order_by('id', 'desc')->get('checks')->result();
		if($result){ return $result; }else{ return FALSE;  }
	}


	/*========= Store Function ==========*/
	public function store_check_info()
	{
		$attr = array(
			'cus_id' =>$this->input->post('cus_id'),
			'bank_name' =>$this->input->post('bank_name'),
			'branch_name' =>$this->input->post('branch_name'),
			'check_no' =>$this->input->post('check_no'),
			'check_amount' =>$this->input->post('check_amount'),
			'date' =>$this->input->post('date'),
			'check_date' =>$this->input->post('check_date'),
			'remid_date' =>$this->input->post('remid_date'),
			'sub_date' =>$this->input->post('sub_date'),
			'note' =>$this->input->post('note'),
			'status'=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('checks', $attr);
		if($result){ return TRUE;}else{return FALSE; }
	}

	/*=======  find data by id =========*/
	public function lc_data_by_id($id=Null)
	{
		if(!is_null($id)){
			$result = $this->db->where('id', $id)->get('tbl_lcs')->row();

			if($result){ return $result; }else{ return FALSE; }
		}else{
			return FALSE;
		}
	}

	/*====================Update Lc Data ============================*/	
	public function update_lc_data($id= null)
	{
		$attr = array(
			'lc_no' 		=> 	$this->input->post('lc_no'),
			'bank_name' =>$this->input->post('bank_name'),
			'lc_date' =>$this->input->post('lc_date'),
			'branch_name' =>$this->input->post('branch_name'),
			'lc_amount' =>$this->input->post('lc_amount'),
			'car_qty' =>$this->input->post('car_qty'),
			'lc_note' =>$this->input->post('lc_note'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_lcs', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*====================Delete Lc Data ============================*/	
	public function delete_lc_data($id= null)
	{
		$attr = array(
			'status' => 'd'
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_lcs', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}