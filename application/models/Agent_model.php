<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Agent_model extends CI_Model
{

	/*============ find all agent information ============*/
	public function find_all_agent_info()
	{
		$result = $this->db->where('status', 'a')->order_by('id', 'desc')->get('agents')->result();
		if($result){
		 	return $result;
		}else{
		 	return FALSE; 
		}
	}

	public function store_agent_info()
	{
		$attr = array(
			'agent_code'	=>$this->input->post('agent_code'),
			'agent_name'	=>$this->input->post('agent_name'),
			'agent_phone'	=>$this->input->post('agent_phone'),
			'agent_email'	=>$this->input->post('agent_email'),
			'agent_address'	=>$this->input->post('agent_address'),
			'status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('agents', $attr);

		if($result): return TRUE; else: return FALSE; endif;
	}

	public function agent_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->get('agents')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*========== Update Customer Info ===========*/
	public function update_agent_info($id=Null)
	{
		$attr = array(
			'agent_code'	=>$this->input->post('agent_code'),
			'agent_name'	=>$this->input->post('agent_name'),
			'agent_phone'	=>$this->input->post('agent_phone'),
			'agent_email'	=>$this->input->post('agent_email'),
			'agent_address'	=>$this->input->post('agent_address'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('agents', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Delete customr info ========*/
	public function delete_agent_info($id=Null)
	{
		$attr = array('status'=>'d');
		$this->db->where('id', $id);
		$qu = $this->db->update('agents', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}