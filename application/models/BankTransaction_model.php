<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class BankTransaction_model extends CI_Model
{
	/*======= get All Collection Entry Data =========*/
	public function bank_trans_list()
	{
		$this->db->select('bank_trans.*,banks.bank_name, banks.branch_name, banks.account_no');
		$this->db->from('bank_trans');
		$this->db->join('banks','bank_trans.bank_id = banks.id');
		$this->db->where('bank_trans.status', 'a');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== Store Account Entry Data =======*/
	public function store_bank_trans_data()
	{
		$attr = array(
			'trans_id'		=>$this->input->post('trans_id'),
			'trans_type'	=>$this->input->post('trans_type'),
			'bank_id'		=>$this->input->post('bank_id'),
			'trans_date'			=>$this->input->post('trans_date'),
			'amount'		=>$this->input->post('amount'),
			'note'	=>$this->input->post('note'),
			'status'		=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d H:i:s'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$res = $this->db->insert('bank_trans', $attr);
		if($res){return TRUE; }else{ return FALSE; }
	}

	

	/*====== Store Collection Entry Data =======*/
	public function update_collection_data($id = Null)
	{
		$attr = array(
			'cus_id'		=>$this->input->post('cus_id'),
			'order_no'	=>$this->input->post('order_no'),
			'lc_id'		=>$this->input->post('lc_id'),
			'date'			=>$this->input->post('date'),
			'amount'		=>$this->input->post('amount'),
			'description'	=>$this->input->post('description'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$res = $this->db->update('bank_trans', $attr);
		if($this->db->affected_rows()){return TRUE; }else{ return FALSE; }
	}


	/*======= get Acounts data by id ======*/
	public function get_bank_trans_by_id($id=Null)
	{
		$res = $this->db->where('id', $id)->get('bank_trans')->row();
		if($res){ return $res; }else{ return FALSE; }
	}

	/*====== Delete bank_trans table Data =======*/
	public function delete_collection_data($id=Null)
	{
		$attr= array('status'=> 'd');

		$this->db->where('id', $id);
		$this->db->update('bank_trans', $attr);

		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}

}