<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class LC_model extends CI_Model
{
	/*======== get all data info =========*/
	public function get_all_lc_info()
	{
		$result= $this->db->where('status', 'a')->order_by('id', 'desc')->get('tbl_lcs')->result();
		if($result){ return $result; }else{ return FALSE;  }
	}


	/*========= Store Function ==========*/
	public function store_lc_info()
	{
		$attr = array(
			'lc_no' =>$this->input->post('lc_no'),
			'status'=>'a'
		);

		$result = $this->db->insert('tbl_lcs', $attr);
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
			'lc_no' 		=> 	$this->input->post('lc_no')
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