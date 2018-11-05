<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Company_model extends CI_Model
{
	public function find_all_company_info(){
		
		 $result = $this->db->where('status', 'a')->order_by('id', 'desc')->get('companies')->result();
		 if($result){
		 	return $result;
		 }else{
		 	return FALSE; 
		 }
	}

	public function store_company_info()
	{
		$attr = array(
			'comp_name'	=>$this->input->post('comp_name'),
			'comp_phone'	=>$this->input->post('comp_phone'),
			'comp_email'	=>$this->input->post('comp_email'),
			'comp_address'	=>$this->input->post('comp_address'),
			'status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('companies', $attr);

		if($result): return TRUE; else: return FALSE; endif;
	}

	public function company_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->get('companies')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*========== Update Customer Info ===========*/
	public function update_company_info($id=Null)
	{
		$attr = array(
			'comp_name'	=>$this->input->post('comp_name'),
			'comp_phone'	=>$this->input->post('comp_phone'),
			'comp_email'	=>$this->input->post('comp_email'),
			'comp_address'	=>$this->input->post('comp_address'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('companies', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Delete customr info ========*/
	public function delete_company_info($id=Null)
	{
		$attr = array('status'=>'d');
		$this->db->where('id', $id);
		$qu = $this->db->update('companies', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}