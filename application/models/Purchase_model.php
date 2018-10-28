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
	public function store_purchase_info($total_price = Null)
	{	

		$attr = array(
			'customer_id'	=>$this->input->post('customer_id'),
			'supplier_id'	=>$this->input->post('supplier_id'),
			'order_id'		=>$this->input->post('order_id'),
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
			'total_price'	=>$total_price,
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

	/*======== Car Estimating Price Store ========*/
	public function estimating_price_store($puc_id=Null)
	{
		if(!is_null($puc_id)){
			$head_ids = $this->input->post('head_id');
			$amounts = $this->input->post('amount');
			$total = 0;
			for ($i=1; $i < count($head_ids) ; $i++) { 
				
				if($head_ids[$i] != 0){

					$attr= array(
						'purchase_id'=>$puc_id,
						'head_id'=>$head_ids[$i],
						'amount'=>$amounts[$i]
					);

					$res = $this->db->insert('purchase_pricing', $attr);

					$total += $amounts[$i];
				}
			}

			return $total;
		}
		return FALSE;
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

	public function get_purchase_prices($pus_id=Null)
	{
		$result = $this->db->where('purchase_id', $pus_id)->get('purchase_pricing')->result();
		if($result): return $result; else: return FALSE; endif;
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

	/*=========== Estimate Price Update and Store and Delete ========*/
	public function estimating_price_store_update($pus_id=Null)
	{
		$all_price = $this->get_purchase_prices($pus_id);
		$head_ids = $this->input->post('head_id');
		$amounts = $this->input->post('amount');

		$total = 0;
		if($all_price){

			foreach ($all_price as $value) {
			 	if(!in_array($value->head_id, $head_ids)){

			 		$this->db->where('id',$value->id);
			 		$this->db->delete('purchase_pricing');
			 	}
			}
		}

		$head_id_array = array_column($all_price, 'head_id');
		

		for ($i=1; $i<= count($head_ids); $i++) { 
			
			if($head_ids[$i] != 0){

				if(in_array($head_ids[$i], $head_id_array)){

					
					$attr = array('amount'=>$amounts[$i]);
					$this->db->where('head_id',$head_ids[$i])->where('purchase_id',$pus_id);
					$this->db->update('purchase_pricing', $attr);
				}else{
					
					$attr1= array(
						'purchase_id'=>$pus_id,
						'head_id'=>$head_ids[$i],
						'amount'=>$amounts[$i]
					);

					$this->db->insert('purchase_pricing', $attr1);
				}
				$total += $amounts[$i];
			}
		}

		return $total ;
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
	public function update_order_info_in_purchase($pus_id = Null, $order_id=Null, $cus_id = Null , $status= Null)
	{
		$attr = array(
			'customer_id'=>$cus_id,
			'order_id'=>$order_id,
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
	public function update_order_edit_info_in_purchase($order_id=Null, $cus_id = Null)
	{
		$attr = array(
			'customer_id'=>0,
			'order_id'=>0,
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
}