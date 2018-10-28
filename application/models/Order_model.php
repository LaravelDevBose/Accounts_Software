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

	public function get_order_pending_info()
	{	
		$this->db->select('orders.*, customers.cus_name');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.id' );
		$this->db->where('orders.order_status','p')->where('orders.status !=', 'd')->order_by('id', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	public function get_order_onprocess_info()
	{	
		$this->db->select('orders.*, customers.cus_name');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.id' );
		$this->db->where('orders.order_status','a')->where('orders.status !=', 'd')->order_by('id', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	public function get_active_order_info()
	{	
		$result = $this->db->where('orders.status !=', 'd')->where('orders.order_status !=', 'p')->order_by('id', 'desc')->get('orders')->result();

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
				'pus_id'	=>$this->input->post('pus_id'),
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
				'ord_advance'	=>$this->input->post('ord_advance'),
				'order_status'	=>$status,
				'status'	=>'a',
				'created_by' =>$this->session->userdata('name'),
				'updated_by'  =>$this->session->userdata('name'),
				'created_at' =>date('Y-m-d'),
				'updated_at' =>date('Y-m-d')
			);

			$result = $this->db->insert('orders', $attr);
			$order_id = $this->db->insert_id();
			if($result): return $order_id; else: return FALSE; endif;

		}else{
			return FALSE; 
		}
	}
	/*========= find order Data By id ========*/
	public function order_info_by_id($id = null)
	{
		if(!is_null($id)){
			$this->db->select('orders.*, customers.cus_code,customers.cus_name,customers.cus_contact_no, customers.cus_address');
			$this->db->from('orders');
			$this->db->join('customers', 'orders.cus_id = customers.id' );
			$this->db->where('orders.id', $id)->where('orders.status !=', 'd');
			$result = $this->db->get()->row();

			if($result){
				return $result;
			}else{
				return FALSE;
			}

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
			'pus_id'	=>$this->input->post('pus_id'),
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
			'updated_at' =>date('Y-m-d H:i:s')
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
		$chassis_no = $this->input->post('ord_chassis_no');
		$engine_no = $this->input->post('ord_engine_no');


		if($order_status && isset($order_status)){ //check is request for store or Update
			if($order_status == 'c' && $chassis_no && $engine_no){ //check order already complete or not
				return 'c';
			}else{
				if($engine_no && $chassis_no){  //check lc and chase has or not
					return 'a';
				}else{
					return 'p';
				}
			}
		}else{
			if($engine_no && $chassis_no){ //check lc and chase has or not
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

	/*========== Order Purchess Info Update =========*/
	public function order_purchase_info_update($pus_id=Null)
	{
		$attr = array(
			'pus_id' => $pus_id,
			'ord_lc_no'=>$this->input->post('puc_lc_id'),
			'ord_engine_no'=>$this->input->post('puc_engine_no'),
			'ord_chassis_no'=>$this->input->post('puc_chassis_no'),
			'order_status'=>'a',
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$id = $this->input->post('order_id');
		$this->db->where('id', $id);
		$qu = $this->db->update('orders', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Deliver order Car ========*/
	public function delivery_order($id=Null)
	{
		$attr = array(
			'order_status'=>'c',
			'delivery_date' =>$this->input->post('delivery_date')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('orders', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*====== find order and Chassis number by customer id ======*/
	public function find_order_by_customer($cus_id=Null)
	{
		$res = $this->db->select('id, ord_chassis_no')->where('cus_id', $cus_id)->where('order_status','a')->order_by('id', 'desc')->get('orders')->result(); 

		if($res){ return $res; }else{ return FALSE;}
	}

	/*====== find order L/C Number ========*/
	public function find_lc_number($order_id=Null)
	{	

		$this->db->select('tbl_lcs.id, tbl_lcs.lc_no')->from('orders');
		$this->db->join('tbl_lcs', 'orders.ord_lc_no = tbl_lcs.id');
		$res = $this->db->where('orders.id', $order_id)->where('orders.order_status', 'a')->get()->row();

		if($res){ return $res; }else{ return FALSE; }
	}

	/*======= find Due Amount ==========*/
	public function find_due_amount($order_id=Null)
	{
		$order_info = $this->db->where('id', $order_id)->get('orders')->row();

		if($order_info){
			$paid_amount = $this->db->select_sum('amount')->where('order_no', $order_id)->where('status', 'a')->get('collections')->row();
			
			$total_paid = $paid_amount->amount + $order_info->ord_advance;
			$due_amount = $order_info->ord_budget_range - $total_paid;
			return $due_amount;
		}else{
			return FALSE;
		}
	}

	/*======= find Due Amount ==========*/
	public function find_paid_amount($order_id=Null)
	{
		$order_info = $this->db->where('id', $order_id)->get('orders')->row();

		if($order_info){
			$paid_amount = $this->db->select_sum('amount')->where('order_no', $order_id)->where('status', 'a')->get('collections')->row();
			
			$total_paid = $paid_amount->amount + $order_info->ord_advance;
			
			return $total_paid;
		}else{
			return FALSE;
		}
	}


	/*======= collection page order id and chassis no ========*/
	public function get_all_order_for_collection($cus_id=Null)
	{
		$res = $this->db->select('id,ord_chassis_no')->where('cus_id', $cus_id)->get('orders')->result();

		if($res){return $res;}else{return FALSE; }
	}

	/*====== get all order number and chassis number =======*/
	public function get_order_chassis_number()
	{
		$res = $this->db->select('id,ord_chassis_no')->where('ord_chassis_no !=', Null)->order_by('id','desc')->get('orders')->result();

		if($res){return $res;}else{return FALSE; }
	}

	/*======== Order report by customer  =========*/
	public function order_report_by_customer($cus_id)
	{	
		$this->db->select('orders.*, customers.cus_name');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.id' );
		$this->db->where('orders.status !=', 'd')->where('orders.cus_id', $cus_id);
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}
	

	/*===== Date wise delivery order Report =========*/

	public function order_report_date_wise()
	{	
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');

		$this->db->select('orders.*, customers.cus_name');
		$this->db->from('orders');
		$this->db->join('customers', 'orders.cus_id = customers.id' );
		$this->db->where('orders.delivery_date >=', $date_from)->where('orders.delivery_date <=', $date_to);
		$this->db->where('orders.status !=', 'd')->order_by('orders.delivery_date', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}
}