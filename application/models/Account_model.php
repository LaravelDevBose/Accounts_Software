<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Account_model extends CI_Model
{

	/*======= get All Collection Entry Data =========*/
	public function get_all_collection_data()
	{
		$this->db->select('accounts.*, ie_heads.head_title');
		$this->db->from('accounts');
		$this->db->join('ie_heads','accounts.ie_head = ie_heads.id');
		$this->db->where('accounts.account_type','c_enty')->where('accounts.status', 'a');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== Store Collection Entry Data =======*/
	public function store_collection_data()
	{
		$attr = array(
			'enty_type'		=>$this->input->post('enty_type'),
			'account_type'	=>$this->input->post('account_type'),
			'ie_head'		=>$this->input->post('ie_head'),
			'date'			=>$this->input->post('date'),
			'amount'		=>$this->input->post('amount'),
			'description'	=>$this->input->post('description'),
			'status'		=>$this->input->post('status'),
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$res = $this->db->insert('accounts', $attr);
		if($res){return TRUE; }else{ return FALSE; }
	}

	/*======= get collention by id ======*/
	public function get_collection_by_id($id=Null)
	{
		$res = $this->db->where('id', $id)->get('accounts')->row();
		if($res){ return $res; }else{ return FALSE; }
	}

	/*====== Store Collection Entry Data =======*/
	public function update_collection_data($id = Null)
	{
		$attr = array(
			'ie_head'		=>$this->input->post('ie_head'),
			'date'			=>$this->input->post('date'),
			'amount'		=>$this->input->post('amount'),
			'description'	=>$this->input->post('description'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d')
		);

		$this->db->where('id', $id);
		$res = $this->db->update('accounts', $attr);
		if($this->db->affected_rows()){return TRUE; }else{ return FALSE; }
	}

	/*====== Delete Accounts table Data =======*/
	public function delete_data($id=Null)
	{
		$attr= array('status'=> 'd');

		$this->db->where('id', $id);
		$this->db->update('accounts', $attr);

		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}
}