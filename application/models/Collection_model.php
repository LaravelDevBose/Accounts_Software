<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Collection_model extends CI_Model
{

    public function collection_sl_create(){
        $last_coll = $this->db->where('type', 'receive')->order_by('id', 'desc')->limit(1)->get('collections')->row();
        if(is_null($last_coll)|| !isset($last_coll)){
            $coll_sl = 'MC-00001';
        }else{

            $num = substr($last_coll->coll_sl, 3, strlen($last_coll->coll_sl));

            if($num < 9):
                $num+=1;
                $coll_sl = 'MC-0000'.$num;
            elseif($num < 99):
                $num+=1;
                $coll_sl = 'MC-000'.$num;
            elseif($num < 999):
                $num+=1;
                $coll_sl = 'MC-00'.$num;
            elseif($num<9999):
                $num+=1;
                $coll_sl = 'MC-0'.$num;
            else:
                $num+=1;
                $coll_sl = 'MC-'.$num;
            endif;
        }

        return $coll_sl;
    }

    /*======= get All Collection Entry Data =========*/
	public function get_all_collection_data() 
	{
		$this->db->select('collections.*, customers.cus_name, orders.order_no');
		$this->db->from('collections');
		$this->db->join('customers','collections.cus_id = customers.id', 'left');
        $this->db->join('orders','collections.order_no = orders.id', 'left');
        $this->db->where('collections.status', 'a')->where('collections.type', 'receive');
		$result = $this->db->order_by('collections.id', 'desc')->get()->result();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*====== Store Account Entry Data =======*/
	public function store_collection_data($sl_no)
	{
		$attr = array(
			'coll_sl'		=>$sl_no,
			'cus_id'		=>$this->input->post('cus_id'),
			'order_no'	    =>$this->input->post('order_no'),
			'collection_type'	    =>$this->input->post('collection_type'),
			'cheque_no'	    =>$this->input->post('cheque_no'),
			'bank_name'	    =>$this->input->post('bank_name'),
			'date'			=>$this->input->post('date'),
			'amount'		=>$this->input->post('amount'),
			'description'	=>$this->input->post('description'),
			'status'		=>'a',
			'type'			=>'receive',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d H:i:s'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$res = $this->db->insert('collections', $attr);
        $coll_id = $this->db->insert_id();
		if($res){return $coll_id; }else{ return FALSE; }
	}

	

	/*====== Store Collection Entry Data =======*/
	public function update_collection_data($id = Null)
	{
		$attr = array(
            'coll_sl'		=>$this->input->post('coll_sl'),
            'cus_id'		=>$this->input->post('cus_id'),
            'order_no'	    =>$this->input->post('order_no'),
            'collection_type'	    =>$this->input->post('collection_type'),
            'cheque_no'	    =>$this->input->post('cheque_no'),
            'bank_name'	    =>$this->input->post('bank_name'),
            'date'			=>$this->input->post('date'),
            'amount'		=>$this->input->post('amount'),
            'description'	=>$this->input->post('description'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$res = $this->db->update('collections', $attr);
		if($this->db->affected_rows()){return TRUE; }else{ return FALSE; }
	}


	/*======= get Acounts data by id ======*/
	public function get_collection_by_id($id=Null)
	{	
		$this->db->select('collections.*, collections.order_no as order_id,  customers.cus_name, customers.cus_contact_no,orders.order_no, customers.cus_address, orders.ord_engine_no, orders.ord_chassis_no')->from('collections');
		$this->db->join('customers', 'collections.cus_id = customers.id','left');
		$this->db->join('orders', 'collections.order_no = orders.id','left');
		$res = $this->db->where('collections.id', $id)->get()->row();

		if($res){ return $res; }else{ return FALSE; }
	}

	/*====== Delete collections table Data =======*/
	public function delete_collection_data($id=Null)
	{
		$attr= array('status'=> 'd');

		$this->db->where('id', $id);
		$this->db->update('collections', $attr);

		if($this->db->affected_rows()){ return TRUE;}else{return FALSE; }
	}



	/*======== find collection by cunstomer =======*/

	public function collection_by_customer($cus_id)
	{
        $this->db->select('collections.*,customers.cus_name,orders.ord_chassis_no,orders.order_no,orders.ord_engine_no');
		$this->db->from('collections');
		$this->db->join('customers','collections.cus_id = customers.id');
		$this->db->join('orders','collections.order_no = orders.id');
		$this->db->where('collections.cus_id', $cus_id)->where('collections.status', 'a');
		$result = $this->db->order_by('collections.id', 'desc')->get()->result();


		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	/*========= order wise collection report Data  ==========*/
	public function order_wise_collection($ord_id=Null)
	{
		$this->db->select('collections.*,customers.cus_name,orders.ord_chassis_no,orders.order_no,orders.ord_engine_no, orders.ord_advance');
		$this->db->from('collections');
		$this->db->join('customers','collections.cus_id = customers.id','left');
		$this->db->join('orders','collections.order_no = orders.id','left');
		$this->db->where('collections.order_no', $ord_id)->where('collections.status', 'a')->where('collections.type', 'receive');
		$result = $this->db->order_by('collections.id', 'desc')->get()->result();

//        print_r($ord_id);die();
		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

    /*======== find collection data=========*/
    public function find_collection_date_wise()
    {
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');

        $this->db->select('collections.*,customers.cus_name,orders.ord_chassis_no,orders.order_no,orders.ord_engine_no');
        $this->db->from('collections');
        $this->db->join('customers','collections.cus_id = customers.id');
        $this->db->join('orders','collections.order_no = orders.id');
        $this->db->where('collections.date >=', $date_from)->where('collections.date <=', $date_to);
        $result = $this->db->where('collections.status', 'a')->order_by('collections.id', 'desc')->get()->result();


        if($result){
            return $result;
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

	/*======== Customer Wise Total Collection =======*/
	public function cus_wise_total_collection($cus_id=Null)
	{
		$res = $this->db->select_sum('amount')->where('cus_id', $cus_id)->where('status', 'a')->get('collections')->row();
		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*========= Total Collection Amount Count ===========*/
    public function total_collection(){
        $res = $this->db->where('status', 'a')->select_sum('amount')->get('collections')->row();

        if($res){ return $res; }else{ return false;}
    }
}