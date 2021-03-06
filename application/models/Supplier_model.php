<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Supplier_model extends CI_Model
{	

	public function create_sulliper_code(){
		$cus_id = $this->db->order_by('id', 'desc')->limit(1)->get('suppliers')->row();
			if(is_null($cus_id)|| !isset($cus_id)){
				$cus_code = 'S00001';
			}else{

				$num = substr($cus_id->sup_code, 1, strlen($cus_id->sup_code));

				// var_dump($num); die();
				if($num < 9):
					$num+=1;
					$cus_code = 'S0000'.$num;
				elseif($num < 99):
					$num+=1;
					$cus_code = 'S000'.$num;
				elseif($num < 999):
					$num+=1;
					$cus_code = 'S00'.$num;
				elseif($num<9999):
					$num+=1;
					$cus_code = 'S0'.$num;
				else:
					$num+=1;
					$cus_code = 'S'.$num;
				endif;
			}
			return $cus_code;
	}

	public function find_all_supplier_info(){
		
		 $result = $this->db->where('status', 'a')->order_by('id', 'desc')->get('suppliers')->result();
		 if($result){
		 	return $result;
		 }else{
		 	return FALSE; 
		 }
	}

	public function store_supplier_info()
	{
		$attr = array(
			'sup_code'	=>$this->create_sulliper_code(),
			'sup_name'	=>$this->input->post('sup_name'),
			'sup_phone'	=>$this->input->post('sup_phone'),
			'sup_email'	=>$this->input->post('sup_email'),
			'sup_ent_date'	=>$this->input->post('sup_ent_date'),
			'sup_ref'	=>$this->input->post('sup_ref'),
			'sup_address'	=>$this->input->post('sup_address'),
			'status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('suppliers', $attr);

		if($result): return TRUE; else: return FALSE; endif;
	}

	public function supplier_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->get('suppliers')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*========== Update Customer Info ===========*/
	public function update_supplier_info($id=Null)
	{
		$attr = array(
			'sup_code'	=>$this->input->post('sup_code'),
			'sup_name'	=>$this->input->post('sup_name'),
			'sup_phone'	=>$this->input->post('sup_phone'),
			'sup_email'	=>$this->input->post('sup_email'),
			'sup_ent_date'	=>$this->input->post('sup_ent_date'),
			'sup_ref'	=>$this->input->post('sup_ref'),
			'sup_address'	=>$this->input->post('sup_address'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('suppliers', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Delete customr info ========*/
	public function delete_supplier_info($id=Null)
	{
		$attr = array('status'=>'d');
		$this->db->where('id', $id);
		$qu = $this->db->update('suppliers', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}