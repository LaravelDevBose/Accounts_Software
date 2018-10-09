<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Order_model extends CI_Model
{
	/*======== get all order info =========*/
	public function get_order_info()
	{	
		$this->db->select('orders.*, customers.cus_name');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.id' );
		$this->db->where('orders.status !=', 'd')->order_by('id', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== find order by lc_no ======*/
	public function lc_wise_order($lc_no=Null)
	{
		$this->db->select('orders.*, customers.cus_name, tbl_lcs.lc_no');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.id' );
		$this->db->join('tbl_lcs', 'orders.ord_lc_no = tbl_lcs.id' );
		$this->db->where('orders.ord_lc_no', $lc_no)->where('orders.status', 'a');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== store order data ======*/
	public function store_order_info($cus_id = Null)
	{	
		$status = $this->check_order_status();

		if(!is_null($cus_id)){
			$attr = array(
				'cus_id'	=>$cus_id,
				'ord_lc_no'	=>$this->input->post('ord_lc_no'),
				'ord_car_model'	=>$this->input->post('ord_car_model'),
				'ord_color'	=>$this->input->post('ord_color'),
				'ord_engine_no'	=>$this->input->post('ord_engine_no'),
				'ord_chassis_no'	=>$this->input->post('ord_chassis_no'),
				'order_no'	=>$this->input->post('order_no'),
				'ord_other_tirm'	=>$this->input->post('ord_other_tirm'),
				'ord_make_model'	=>$this->input->post('ord_make_model'),
				'ord_grade'	=>$this->input->post('ord_grade'),
				'ord_type'	=>$this->input->post('ord_type'),
				'ord_year'	=>$this->input->post('ord_year'),
				'ord_mileage'	=>$this->input->post('ord_mileage'),
				'ord_budget_range'	=>$this->input->post('ord_budget_range'),
				'order_status'	=>$status,
				'status'	=>'a',
				'created_by' =>$this->session->userdata('name'),
				'updated_by'  =>$this->session->userdata('name'),
				'created_at' =>date('Y-m-d'),
				'updated_at' =>date('Y-m-d')
			);

			$result = $this->db->insert('orders', $attr);
			
			if($result): return True; else: return FALSE; endif;

		}else{
			return FALSE; 
		}
	}
	/*========= find order Data By id ========*/
	public function order_info_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->where('status', 'a')->get('orders')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*======== Update Order Info =========*/
	public function update_order_info($id=Null)
	{	
		$status = $this->check_order_status();
		$attr = array(
			'cus_id'	=>$this->input->post('cus_id'),
			'ord_lc_no'	=>$this->input->post('ord_lc_no'),
			'ord_car_model'	=>$this->input->post('ord_car_model'),
			'ord_color'	=>$this->input->post('ord_color'),
			'ord_engine_no'	=>$this->input->post('ord_engine_no'),
			'ord_chassis_no'	=>$this->input->post('ord_chassis_no'),
			'order_no'	=>$this->input->post('order_no'),
			'ord_other_tirm'	=>$this->input->post('ord_other_tirm'),
			'ord_make_model'	=>$this->input->post('ord_make_model'),
			'ord_grade'	=>$this->input->post('ord_grade'),
			'ord_type'	=>$this->input->post('ord_type'),
			'ord_year'	=>$this->input->post('ord_year'),
			'ord_mileage'	=>$this->input->post('ord_mileage'),
			'ord_budget_range'	=>$this->input->post('ord_budget_range'),
			'order_status'	=> $status,
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('orders', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Check order Status =======*/
	public function check_order_status()
	{	
		$order_status = $this->input->post('order_status');
		$lc_no = $this->input->post('ord_lc_no');
		$chassis_no = $this->input->post('ord_chassis_no');


		if($order_status && isset($order_status)){ //check is request for store or Update
			if($order_status == 'c'){ //check order already complete or not
				return 'c';
			}else{
				if($lc_no && $chassis_no){  //check lc and chase has or not
					return 'a';
				}else{
					return 'p';
				}
			}
		}else{
			if($lc_no && $chassis_no){ //check lc and chase has or not
				return 'a';
			}else{
				return 'p';
			}
		}

		
		
	}

	/*======= delete order Info =========*/
	public function delete_order_info($id=Null)
	{	
		$attr= array('status'=>'d');
		
		$this->db->where('id', $id);
		$qu = $this->db->update('orders', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

}