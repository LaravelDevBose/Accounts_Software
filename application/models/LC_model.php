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
		$this->db->select('tbl_lcs.*, companies.comp_name, suppliers.sup_name')->from('tbl_lcs');
		$this->db->join('companies','tbl_lcs.comp_id = companies.id');
		$this->db->join('suppliers','tbl_lcs.supplier_id = suppliers.id');
		$result = $this->db->where('tbl_lcs.status','a')->get()->result();

		if($result){ return $result; }else{ return FALSE;  }
	}


	/*========= Store Function ==========*/
	public function store_lc_info()
	{
		$attr = array(
			'lc_no' =>$this->input->post('lc_no'),
			'lc_date' =>$this->input->post('lc_date'),
			'lc_amount' =>$this->input->post('lc_amount'),
			'car_qty' =>$this->input->post('car_qty'),
			'bank_name' =>$this->input->post('bank_name'),
			'branch_name' =>$this->input->post('branch_name'),
			'lc_insur' =>$this->input->post('lc_insur'),
			'comp_id' =>$this->input->post('comp_id'),
			'supplier_id' =>$this->input->post('supplier_id'),
			'agent_id' =>$this->input->post('agent_id'),
			'ship_name' =>$this->input->post('ship_name'),
			'arriv_date' =>$this->input->post('arriv_date'),
			'port_name' =>$this->input->post('port_name'),
			'note' =>$this->input->post('note'),
			'status'=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('tbl_lcs', $attr);
		$lc_id = $this->db->insert_id();
		if($result){ return $lc_id;}else{return FALSE; }
	}

	/*=========== Store Lc Details Informaion*/
	public function store_lc_details_info($lc_id=Null, $cart = Null)
	{
		$attr = array(
			'lc_id' =>$lc_id,
			'pus_id' =>$cart['id'],
			'cus_id' =>$cart['cus_id'],
			'order_id' =>$cart['order_id'],
			'car_value' =>$cart['car_value'],
			'fright_value' =>$cart['fright_value'],
			'total' =>$cart['price']
		);

		$result = $this->db->insert('lc_details', $attr);
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

	/*===== find lc details by id =========*/
	public function lc_deatils_by_id($id=Null)
	{
		if(!is_null($id)){
			$result = $this->db->where('id', $id)->get('lc_details')->row();

			if($result){ return $result; }else{ return FALSE; }
		}else{
			return FALSE;
		}
	}

	/**====== Find Lc Details_ info ===================**/
	public function find_lc_details_info($lc_id=Null)
	{
		$this->db->select('purchase.puc_chassis_no, purchase.puc_engine_no, purchase.puc_car_model, purchase.puc_color, purchase.puc_year, lc_details.*')->from('lc_details');
		$this->db->join('purchase', 'lc_details.pus_id = purchase.id');
		$result = $this->db->where('lc_details.lc_id', $lc_id)->where('lc_details.status','a')->get()->result();
		if($result){ return $result; }else{ return FALSE; }
	}


	/*====================Update Lc Data ============================*/	
	public function update_lc_data($id= null)
	{
		$attr = array(
			'lc_no' =>$this->input->post('lc_no'),
			'lc_date' =>$this->input->post('lc_date'),
			'lc_amount' =>$this->input->post('lc_amount'),
			'car_qty' =>$this->input->post('car_qty'),
			'bank_name' =>$this->input->post('bank_name'),
			'branch_name' =>$this->input->post('branch_name'),
			'lc_insur' =>$this->input->post('lc_insur'),
			'comp_id' =>$this->input->post('comp_id'),
			'supplier_id' =>$this->input->post('supplier_id'),
			'agent_id' =>$this->input->post('agent_id'),
			'ship_name' =>$this->input->post('ship_name'),
			'arriv_date' =>$this->input->post('arriv_date'),
			'port_name' =>$this->input->post('port_name'),
			'note' =>$this->input->post('note'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s'),
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

	/*========== Delete lc details from table=========*/
	public function lc_datails_destroy($id=Null)
	{	

		$attr = array(
			'status' => 'd'
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('lc_details', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}