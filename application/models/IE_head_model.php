<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class IE_head_model extends CI_Model
{
	/*======== get all data info =========*/
	public function get_all_ie_head_info()
	{
		$result= $this->db->where('status', 'a')->order_by('id', 'desc')->get('ie_heads')->result();
		if($result){ return $result; }else{ return FALSE;  }
	}

	public function get_all_head_info($type)
	{
		$result= $this->db->where('head_type',$type)->where('status', 'a')->order_by('id', 'desc')->get('ie_heads')->result();
		if($result){ return $result; }else{ return FALSE;  }
	}


	/*========= Store Function ==========*/
	public function store_ie_head_info()
	{
		$attr = array(
			'head_title' =>$this->input->post('head_title'),
			'head_type' =>$this->input->post('head_type'),
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d'),
			'status'=>'a'
		);

		$result = $this->db->insert('ie_heads', $attr);
		if($result){ return TRUE;}else{return FALSE; }
	}

	/*=======  find data by id =========*/
	public function ie_head_data_by_id($id=Null)
	{
		if(!is_null($id)){
			$result = $this->db->where('id', $id)->get('ie_heads')->row();

			if($result){ return $result; }else{ return FALSE; }
		}else{
			return FALSE;
		}
	}

	/*====================Update Lc Data ============================*/	
	public function update_ie_head_data($id= null)
	{
		$attr = array(
			'head_title' =>$this->input->post('head_title'),
			'head_type' =>$this->input->post('head_type'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('ie_heads', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*====================Delete Lc Data ============================*/	
	public function delete_ie_head_data($id= null)
	{
		$attr = array(
			'status' => 'd'
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('ie_heads', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}