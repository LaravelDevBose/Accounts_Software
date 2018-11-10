<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Payment_model extends CI_Model
{
	
	/*======= Get All car Payment data ==========*/
	public function get_all_car_payment_data()
	{
		$this->db->select('payments.*, suppliers.sup_name, tbl_lcs.lc_no, orders.ord_chassis_no, ie_heads.head_title');
		$this->db->from('payments');
		$this->db->join('suppliers','payments.supplier_id = suppliers.id');
		$this->db->join('tbl_lcs','payments.lc_id = tbl_lcs.id','left');
		$this->db->join('orders','payments.order_id = orders.id','left');
		$this->db->join('ie_heads','payments.head_id = ie_heads.id','left');
		$this->db->where('payments.status', 'a')->where('payment_type', 'CP');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}



	/*====== Store Account Entry Data =======*/
	public function store_payment_data()
	{
		$attr = array(
			'payment_code'	=>$this->input->post('payment_code'),
			'payment_type'	=>$this->input->post('payment_type'),
			'supplier_id'	=>$this->input->post('supplier_id'),
			'order_id'		=>$this->input->post('order_id'),
			'lc_id'			=>$this->input->post('lc_id'),
			'head_id'		=>$this->input->post('head_id'),
			'payment_date'	=>$this->input->post('payment_date'),
			'payment_amount'=>$this->input->post('payment_amount'),
			'note'			=>$this->input->post('note'),
			'status'		=>'a',
			'created_by' 	=>$this->session->userdata('name'),
			'updated_by'  	=>$this->session->userdata('name'),
			'created_at' 	=>date('Y-m-d H:i:s'),
			'updated_at' 	=>date('Y-m-d H:i:s')
		);

		$res = $this->db->insert('payments', $attr);
		if($res){return TRUE; }else{ return FALSE; }
	}

	

	/*====== Store Collection Entry Data =======*/
	public function update_payment_data($id = Null)
	{
		$attr = array(
			'supplier_id'	=>$this->input->post('supplier_id'),
			'order_id'		=>$this->input->post('order_id'),
			'lc_id'			=>$this->input->post('lc_id'),
			'head_id'		=>$this->input->post('head_id'),
			'payment_date'	=>$this->input->post('payment_date'),
			'payment_amount'=>$this->input->post('payment_amount'),
			'note'			=>$this->input->post('note'),
			'updated_by'  	=>$this->session->userdata('name'),
			'updated_at' 	=>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$res = $this->db->update('payments', $attr);
		if($this->db->affected_rows()){return TRUE; }else{ return FALSE; }
	}


	/*======= get Acounts data by id ======*/
	public function get_payment_by_id($id=Null)
	{	
		$result = $this->db->where('id' , $id)->where('status', 'a')->get('payments')->row();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== Delete payment table Data =======*/
	public function delete_payment_data($id=Null)
	{
		$attr= array('status'=> 'd');

		$this->db->where('id', $id);
		$this->db->update('payments', $attr);

		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}



	/*======== find collection data=========*/
	public function find_collection_date_wise()
	{
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');

		$this->db->select('collections.*,customers.cus_name, tbl_lcs.lc_no,orders.ord_chassis_no');
		$this->db->from('collections');
		$this->db->join('customers','collections.cus_id = customers.id');
		$this->db->join('tbl_lcs','collections.lc_id = tbl_lcs.id');
		$this->db->join('orders','collections.order_no = orders.id');
		$this->db->where('collections.date >=', $date_from)->where('collections.date <=', $date_to);
		$result = $this->db->where('collections.status', 'a')->order_by('date', 'asc')->get()->result();


		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}



	/*========= order wise collection report Data  ==========*/
	public function order_wise_payment($ord_id=Null)
	{
		$this->db->select('payments.*, suppliers.sup_name, tbl_lcs.lc_no, orders.ord_chassis_no, ie_heads.head_title');
		$this->db->from('payments');
		$this->db->join('suppliers','payments.supplier_id = suppliers.id');
		$this->db->join('tbl_lcs','payments.lc_id = tbl_lcs.id');
		$this->db->join('orders','payments.order_id = orders.id');
		$this->db->join('ie_heads','payments.head_id = ie_heads.id');
		$this->db->where('payments.status', 'a')->where('payment_type', 'CP')->where('payments.order_id',$ord_id);
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}



	/*======= Get All Office Payment data ==========*/
	public function get_all_office_payment_data()
	{
		$this->db->select('payments.*,ie_heads.head_title');
		$this->db->from('payments');
		$this->db->join('ie_heads','payments.head_id = ie_heads.id');
		$this->db->where('payments.status', 'a')->where('payment_type', 'OP');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}



	/**********************************/
	/**********************************/
	/**********************************/
	/*************** Report *******************/

	/*======= Get All car Payment data ==========*/
	public function payment_date_to_date($date_from = Null, $date_to= Null)
	{
		$this->db->select('payments.*, suppliers.sup_name, tbl_lcs.lc_no, orders.ord_chassis_no, ie_heads.head_title');
		$this->db->from('payments');
		$this->db->join('suppliers','payments.supplier_id = suppliers.id');
		$this->db->join('tbl_lcs','payments.lc_id = tbl_lcs.id');
		$this->db->join('orders','payments.order_id = orders.id');
		$this->db->join('ie_heads','payments.head_id = ie_heads.id');
		$this->db->where('payments.payment_date >=', $date_from)->where('payments.payment_date <=', $date_to);
		$this->db->where('payments.status', 'a')->where('payment_type', 'CP');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*=========== Supplier payment Report search ==========*/
	public function supplier_payment_report($sup_id=Null)
	{
		$this->db->select('payments.*, suppliers.sup_name, tbl_lcs.lc_no, orders.ord_chassis_no, ie_heads.head_title');
		$this->db->from('payments');
		$this->db->join('suppliers','payments.supplier_id = suppliers.id');
		$this->db->join('tbl_lcs','payments.lc_id = tbl_lcs.id');
		$this->db->join('orders','payments.order_id = orders.id');
		$this->db->join('ie_heads','payments.head_id = ie_heads.id');
		$this->db->where('payments.supplier_id ', $sup_id);
		$this->db->where('payments.status', 'a')->where('payment_type', 'CP');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*=========== office Payment Report ========*/

	public function office_payment_date_to_date($date_from=Null, $date_to=Null)
	{
		$this->db->select('payments.*,ie_heads.head_title');
		$this->db->from('payments');
		$this->db->join('ie_heads','payments.head_id = ie_heads.id');
		$this->db->where('payments.payment_date >=', $date_from)->where('payments.payment_date <=', $date_to);
		$this->db->where('payments.status', 'a')->where('payment_type', 'OP');
		$result = $this->db->order_by('id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*========= Total Payment Count =========*/
	public function total_payment(){
        $res = $this->db->where('status', 'a')->select_sum('payment_amount', 'amount')->get('payments')->row();

        if($res){ return $res; }else{ return false;}
    }
}