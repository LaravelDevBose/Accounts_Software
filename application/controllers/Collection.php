<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection extends MY_Controller
{

	/*==========Admin Login Check=============*/
	public function __construct()
	{
		parent::__construct();
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}
	}

	public function index()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			redirect('Admindashboard');
		}
	}

	/*======== Collention Entry View Page ========*/
	public function collection_entry_page()
	{	
		if($this->admin_access('collection') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		$data['title'] = 'Collection Entry';
		$data['content'] = 'accounts/collection_entry';
		$data['coll_sl'] = $this->collection_sl_create();
		$data['customers'] = $this->Customer_model->find_all_customer_info();
		$data['collections'] = $this->Collection_model->get_all_collection_data();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Collection Entry Data =======*/
	public function collection_entry_store()
	{	
		$this->form_validation->set_rules('cus_id', 'Customer ', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Chassis Number ', 'required|trim');
		$this->form_validation->set_rules('collection_type', 'Collection Type ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Collection Entry';
			$data['content'] = 'accounts/collection_entry';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['collections'] = $this->Collection_model->get_all_collection_data();
            $data['coll_sl'] = $this->collection_sl_create();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Collection_model->store_collection_data()){
		 		$data['collections'] = $this->Collection_model->get_all_collection_data();
		 		$this->load->view('admin/accounts/collection_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}

    /*===== Store Collection Entry Data =======*/
    public function collection_entry_store_print()
    {
        $this->form_validation->set_rules('cus_id', 'Customer ', 'required|trim');
        $this->form_validation->set_rules('order_no', 'Chassis Number ', 'required|trim');
        $this->form_validation->set_rules('collection_type', 'Collection Type ', 'required|trim');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');

        if($this->form_validation->run() == FALSE){
            echo 1;
        }else{

            if($coll_id = $this->Collection_model->store_collection_data()){
                $data['collection'] = $this->Collection_model->get_collection_by_id($coll_id);
                $this->load->view('admin/accounts/collection_print', $data);
            }else{
                echo 0;
            }
        }
    }

	/*======= Edit Collection page =======*/
	public function collection_entry_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
            $data['title'] = 'Collection Entry';
            $data['content'] = 'accounts/edit_collection';
            $result = $this->Collection_model->get_collection_by_id($id);
			$data['collection'] = $result;
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['orders'] = $this->Order_model->get_all_order_for_collection($result->cus_id);

            $ord_advance = $this->db->where('id', $result->order_no)->get('orders')->row()->ord_advance;
            $coll_amount = $this->Order_model->find_total_colection_amount($result->order_no);


            $total_paid = $coll_amount->amount + $ord_advance;

            $perchas_price = $this->db->where('order_id', $result->order_no)->get('purchase')->row()->total_price;

            $data['due_amount'] = number_format($perchas_price- $total_paid,2);
			$this->load->view('admin/adminMaster', $data);

	}

	/*====== Update Collection Date =========*/
	public function collection_entry_update($id=Null)
	{
        $this->form_validation->set_rules('cus_id', 'Customer ', 'required|trim');
        $this->form_validation->set_rules('order_no', 'Chassis Number ', 'required|trim');
        $this->form_validation->set_rules('collection_type', 'Collection Type ', 'required|trim');
        $this->form_validation->set_rules('date', 'Date', 'required|trim');
        $this->form_validation->set_rules('amount', 'Amount', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');

		if($this->form_validation->run() == FALSE){
            $data['title'] = 'Collection Entry';
            $data['content'] = 'accounts/edit_collection';
            $result = $this->Collection_model->get_collection_by_id($id);
            $data['collection'] = $result;
            $data['customers'] = $this->Customer_model->find_all_customer_info();
            $data['orders'] = $this->Order_model->get_all_order_for_collection($result->cus_id);

            $ord_advance = $this->db->where('id', $result->order_no)->get('orders')->row()->ord_advance;
            $coll_amount = $this->Order_model->find_total_colection_amount($result->order_no);


            $total_paid = $coll_amount->amount + $ord_advance;

            $perchas_price = $this->db->where('order_id', $result->order_no)->get('purchase')->row()->total_price;

            $data['due_amount'] = number_format($perchas_price- $total_paid,2);
            $this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Collection_model->update_collection_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('collections');
		 	}else{	
		 		$data['error']="Update UnSuccessful";
				$this->session->set_flashdata($data);
				redirect('collections');
		 	}
		}
	}

	/*=========== collection_entry_view ===============*/
    public function collection_entry_view($id = Null){

        $data['collection'] = $this->Collection_model->get_collection_by_id($id);
        $this->load->view('admin/accounts/collection_view', $data);
    }

	/*======== delete _data=====*/
	public function delete_collection_data($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		
		if($this->Collection_model->delete_collection_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('collections');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('account/collection');
		}
	}

    private function collection_sl_create(){
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

	/*========== find order info and chassis info =======*/
	public function find_order_info($cus_id=Null)
	{
		if($result = $this->Order_model->find_order_by_customer($cus_id)){
			echo json_encode($result); 
		}else{
			echo 0;
		}
	}

	/*====== find lc Number and due amount=============*/
	public function find_order_due_amount($order_id=Null)
	{
        $order_info = $this->db->where('id', $order_id)->get('orders')->row();

        if($coll_amount = $this->Order_model->find_total_colection_amount($order_id)){

            $total_paid = $coll_amount->amount + $order_info->ord_advance;
            $perchas_price = 0;
            if($order_info->pus_id != 0){
                $perchas_price = $this->db->where('order_id', $order_id)->get('purchase')->row()->total_price;
            }

            $lc_no = $this->LC_model->lc_data_by_id($order_info->ord_lc_no);
            $data['lc_no'] = '';
            if($lc_no){
                $data['lc_id'] = $lc_no->id;
                $data['lc_no'] = $lc_no->lc_no;
            }
            $data['pus_id'] = $order_info->pus_id;

            $data['due_amount'] = number_format($perchas_price- $total_paid,2);

            echo json_encode($data);
        }else{
            echo 0;
        }

	}

	
}