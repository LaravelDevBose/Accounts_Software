<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Purchase_model extends CI_Model
{
	/*======== get all order info =========*/
	public function get_purchase_info()
	{	
		$this->db->select('purchase.*, suppliers.sup_name');
		$this->db->from('purchase');
		$this->db->join('suppliers', 'purchase.supplier_id = suppliers.id' );
		$this->db->where('purchase.status', 'a')->order_by('id', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*=========== Un Order Car List ===============*/
	public function unOrder_car_list()
	{
		$this->db->select('id,puc_chassis_no,order_id')->where('order_id','0')->where('car_status','0');
		$result = $this->db->where('purchase.status', 'a')->order_by('id', 'desc')->get('purchase')->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== store order data ======*/
	public function store_purchase_info()
	{	

		$attr = array(
			'customer_id'	=>$this->input->post('customer_id'),
			'supplier_id'	=>$this->input->post('supplier_id'),
			'order_id'		=>$this->input->post('order_id'),
			'puc_lc_id'		=>0,
			'puc_car_model'	=>$this->input->post('puc_car_model'),
			'puc_color'		=>$this->input->post('puc_color'),
			'puc_engine_no'	=>$this->input->post('puc_engine_no'),
			'puc_chassis_no'=>$this->input->post('puc_chassis_no'),
			'puc_make'		=>$this->input->post('puc_make'),
			'puc_grade'		=>$this->input->post('puc_grade'),
			'puc_type'		=>$this->input->post('puc_type'),
			'puc_year'		=>$this->input->post('puc_year'),
			'puc_mileage'	=>$this->input->post('puc_mileage'),
			'puc_other_tirm'=>$this->input->post('puc_other_tirm'),
			'total_price'	=>'0',
			'car_status'	=>'0',
			'status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('purchase', $attr);
		$purchase_id = $this->db->insert_id();

		if($result): return $purchase_id; else: return FALSE; endif;

		
	}

	


	/*=========== Update Total Pice =======*/
	public function total_price_update($puc_id=Null, $total = 0)
	{
		$attr = array('total_price'=>$total);

		$this->db->where('id', $puc_id);
		$this->db->update('purchase', $attr);
		return TRUE;
	}

	/*========= find purchase Data By id ========*/
	public function purchase_info_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->where('status', 'a')->get('purchase')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*======== Update purchase Info =========*/
	public function Update_purchase_info($id=Null)
	{	
		$attr = array(
			'supplier_id'	=>$this->input->post('supplier_id'),
			'puc_lc_id'		=>$this->input->post('puc_lc_id'),
			'puc_car_model'	=>$this->input->post('puc_car_model'),
			'puc_color'		=>$this->input->post('puc_color'),
			'puc_engine_no'	=>$this->input->post('puc_engine_no'),
			'puc_chassis_no'=>$this->input->post('puc_chassis_no'),
			'puc_make'		=>$this->input->post('puc_make'),
			'puc_grade'		=>$this->input->post('puc_grade'),
			'puc_type'		=>$this->input->post('puc_type'),
			'puc_year'		=>$this->input->post('puc_year'),
			'puc_mileage'	=>$this->input->post('puc_mileage'),
			'puc_other_tirm'=>$this->input->post('puc_other_tirm'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*======= delete purchase Info =========*/
	public function delete_purchase_info($id=Null)
	{	
		$attr= array('status'=>'d');
		
		$this->db->where('id', $id);
		$qu = $this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function order_id_remove($order_id = Null)
	{
		$attr= array('order_id'=>'0');
		
		$this->db->where('order_id', $order_id);
		$qu = $this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function undelivery_purchase_car()
	{
		$this->db->select('purchase.*, suppliers.sup_name');
		$this->db->from('purchase');
		$this->db->join('suppliers', 'purchase.supplier_id = suppliers.id' );
		$this->db->where('purchase.status !=', 'd')->where('car_status', '0');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	public function car_purchase_pricing()
	{
		$this->db->select('purchase.*, suppliers.sup_name');
		$this->db->from('purchase');
		$this->db->join('suppliers', 'purchase.supplier_id = suppliers.id' );
		$this->db->where('purchase.status !=', 'd')->where('purchase.total_price', '0')->where('car_status', '0');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	public function purchase_car_full_deatils($id = Null)
	{
		$this->db->select('purchase.*, suppliers.sup_name, suppliers.sup_phone, customers.cus_name, customers.cus_contact_no');
		$this->db->from('purchase');
		$this->db->join('customers', 'purchase.customer_id = customers.id','left');
		$this->db->join('suppliers', 'purchase.supplier_id = suppliers.id' );
		$this->db->where('purchase.id', $id)->where('car_status', '0');
		$result = $this->db->where('purchase.status !=', 'd')->get()->row();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	public function car_transport_change($pus_id = Null, $trans_id=Null)
	{
		$attr = array('transport_id'=>$trans_id);

		$this->db->where('id', $pus_id);
		$qu = $this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
	

	/*============= car delivery order change ===========*/
	public function update_car_dliv_status($order_id=Null)
	{
		$attr = array('car_status'=>'1');

		$this->db->where('order_id', $order_id);
		$this->db->update('purchase', $attr);
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*========== Update Order And Customer Info in Purchase ==========*/
	public function update_order_info_in_purchase($pus_id = Null, $order_id=Null, $cus_id = Null ,$lc_no = Null, $status= Null)
	{
		$attr = array(
			'customer_id'=>$cus_id,
			'order_id'=>$order_id,
			'puc_lc_id'=>$lc_no,
			'car_status'=>$status
		);

		$this->db->where('id', $pus_id);
		$this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*========== Update Order And Customer Info in Purchase when Order Edit ==========*/
	public function update_order_edit_info_in_purchase($order_id=Null, $cus_id = Null )
	{
		$attr = array(
			'customer_id'=>0,
			'order_id'=>0,
			'puc_lc_id'=>0,
			'car_status'=>0
		);

		$this->db->where('order_id', $order_id)->where('customer_id', $cus_id);
		$this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*========== Report ===========*/
	/*========== Report ===========*/
	/*========== Report ===========*/
	/*========== Report ===========*/

	/*========== Car Stock Report ==============*/
	public function car_stock_report()
	{
		$this->db->select('purchase.*, suppliers.sup_name,customers.cus_name, orders.order_no, trans_heads.head_name');
		$this->db->from('purchase');
		$this->db->join('suppliers', 'purchase.supplier_id = suppliers.id' );
		$this->db->join('customers', 'purchase.customer_id = customers.id','left');
		$this->db->join('orders', 'purchase.order_id = orders.id','left');
		$this->db->join('transports', 'purchase.transport_id = transports.id','left');
		$this->db->join('trans_heads', 'transports.trans_head_id = trans_heads.id','left');
		$this->db->where('purchase.car_status','0')->where('purchase.status', 'a')->order_by('id', 'desc');
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*========== Customer Wise Total Estimate Price =======*/
	public function cus_wise_total_est_price($cus_id=Null)
	{
		$result = $this->db->select_sum('total_price')->where('customer_id', $cus_id)->where('status', 'a')->get('purchase')->row();
		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*=========== Order Wise Car Estimate Price ============*/
	public function order_wise_estimate_price($pus_id = Null)
	{
		$this->db->select('purchase_pricing.*, ie_heads.head_title');
		$this->db->from('purchase_pricing');
		$this->db->join('ie_heads', 'purchase_pricing.head_id = ie_heads.id' );
		$this->db->where('purchase_pricing.purchase_id',$pus_id);
		$result = $this->db->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== find order and Chassis number by customer id ======*/
	public function find_purchase_by_chassis_no()
	{
		$res = $this->db->select('id, puc_chassis_no')->where('puc_lc_id', 0)->where('car_status', 0)->where('status','a')->order_by('id', 'desc')->get('purchase')->result(); 

		if($res){ return $res; }else{ return FALSE;}
	}

	
	/*====== find order and Chassis number by customer id ======*/
	public function find_purchase_info($id=Null)
	{
		$this->db->select('customers.id, purchase.order_id, purchase.puc_chassis_no, purchase.puc_car_model, purchase.puc_color, purchase.puc_engine_no,purchase.puc_year, customers.cus_code, customers.cus_name');
		$this->db->from('purchase');
		$this->db->join('customers', 'purchase.customer_id = customers.id', 'left');
		$res = $this->db->where('purchase.id', $id)->where('purchase.car_status', 0)->where('purchase.status','a')->get()->row(); 

		if($res){ return $res; }else{ return FALSE;}
	}

	/*====== Update Lc Number in Purchase ==============*/
	public function update_lc_in_purchase($id=Null, $lc_id= Null)
	{
		$attr = array(
			'puc_lc_id'=>$lc_id,
		);

		$this->db->where('id', $id);
		$this->db->update('purchase', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}
}