<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Collection_model extends CI_Model
{
	/*======= get All Collection Entry Data =========*/
	public function get_all_collection_data() 
	{
		$this->db->select('collections.*,customers.cus_name, tbl_lcs.lc_no,orders.ord_chassis_no');
		$this->db->from('collections');
		$this->db->join('customers','collections.cus_id = customers.id');
		$this->db->join('tbl_lcs','collections.lc_no = tbl_lcs.lc_no');
		$this->db->join('orders','collections.order_no = orders.id');
		$this->db->where('collections.status', 'a');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== Store Account Entry Data =======*/
	public function store_collection_data()
	{
		$attr = array(
			'cus_id'		=>$this->input->post('cus_id'),
			'order_no'	=>$this->input->post('order_no'),
			'lc_no'		=>$this->input->post('lc_no'),
			'date'			=>$this->input->post('date'),
			'amount'		=>$this->input->post('amount'),
			'description'	=>$this->input->post('description'),
			'status'		=>'a',
			'type'			=>'receive',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d H:i:s'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$res = $this->db->insert('collections', $attr);
		if($res){return TRUE; }else{ return FALSE; }
	}

	

	/*====== Store Collection Entry Data =======*/
	public function update_collection_data($id = Null)
	{
		$attr = array(
			'cus_id'		=>$this->input->post('cus_id'),
			'order_no'	=>$this->input->post('order_no'),
			'lc_no'		=>$this->input->post('lc_no'),
			'date'			=>$this->input->post('date'),
			'amount'		=>$this->input->post('amount'),
			'description'	=>$this->input->post('description'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d')
		);

		$this->db->where('id', $id);
		$res = $this->db->update('collections', $attr);
		if($this->db->affected_rows()){return TRUE; }else{ return FALSE; }
	}


	/*======= get Acounts data by id ======*/
	public function get_collection_by_id($id=Null)
	{	
		$this->db->select('collections.*, customers.cus_name')->from('collections');
		$this->db->join('customers', 'collections.cus_id = customers.id');
		$res = $this->db->where('collections.id', $id)->get()->row();
		if($res){ return $res; }else{ return FALSE; }
	}

	/*====== Delete collections table Data =======*/
	public function delete_collection_data($id=Null)
	{
		$attr= array('status'=> 'd');

		$this->db->where('id', $id);
		$this->db->update('collections', $attr);

		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}
}