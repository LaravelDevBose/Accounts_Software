<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Transport_head_model extends CI_Model
{
	
	public function transport_head_list()
	{
		$res = $this->db->where('status', 'a')->get('trans_heads')->result();
		if($res){
			return $res;
		}else{
			return False;
		}
	}

	public function store_head_info()
	{
		$attr = array('head_name'=>$this->input->post('head_name'));

		$res = $this->db->insert('trans_heads', $attr);

		if($res){return TRUE;}else{return FALSE; }
	}

	public function get_data_by_id($id=Null)
	{
		$res = $this->db->where('id', $id)->get('trans_heads')->row();
		if($res){return $res;}else{return FALSE; }
	}

	public function update_header_data($id=Null)
	{
		$attr = array(
			'head_name' => $this->input->post('head_name')
		);

		$this->db->where('id', $id);
		$this->db->update('trans_heads', $attr);

		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function delete_header_data($id=Null)
	{
		$attr = array(
			'status' =>'d'
		);

		$this->db->where('id', $id);
		$this->db->update('trans_heads', $attr);

		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}