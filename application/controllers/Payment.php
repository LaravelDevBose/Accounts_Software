<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller
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
	public function payment_entry_page()
	{
		$data['title'] = 'Collection Entry';
		$data['content'] = 'accounts/payment_entry';
		$payment = $this->db->order_by('id', 'desc')->limit(1)->get('payments')->row();
			if(is_null($payment)|| !isset($payment)){
				$pay_code = 'CP-00001';
			}else{

				$num = substr($payment->payment_code, 3, strlen($payment->payment_code));

				// var_dump($num); die();
				if($num < 9):
					$num+=1;
					$pay_code = 'CP-0000'.$num;
				elseif($num < 99):
					$num+=1;
					$pay_code = 'CP-000'.$num;
				elseif($num < 999):
					$num+=1;
					$pay_code = 'CP-00'.$num;
				elseif($num<9999):
					$num+=1;
					$pay_code = 'CP-0'.$num;
				else:
					$num+=1;
					$pay_code = 'CP-'.$num;
				endif;
			}

		$data['payment_code'] = $pay_code;
		$data['suppliers'] = $this->Supplier_model->find_all_supplier_info();
		$data['orders'] = $this->Order_model->get_active_order_info();
		$data['payments'] = $this->Payment_model->get_all_car_payment_data();
		$data['heads'] = $this->IE_head_model->get_all_head_info('C');
		$this->load->view('admin/adminMaster', $data); 
	}

	/*===== Store Collection Entry Data =======*/
	public function payment_entry_store()
	{	
		$this->form_validation->set_rules('supplier_id', 'Supplier ', 'required|trim');
		$this->form_validation->set_rules('order_id', 'Chassis Number ', 'required|trim');
		$this->form_validation->set_rules('lc_no', 'L/C Number ', 'required|trim');
		$this->form_validation->set_rules('payment_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('payment_amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('head_id', 'Expense Head', 'trim');

		if($this->form_validation->run() == FALSE){
		 	echo 2;
		}else{

		 	if($this->Payment_model->store_payment_data()){
		 		$data['payments'] = $this->Payment_model->get_all_car_payment_data();
		 		$this->load->view('admin/accounts/payment_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Collection page =======*/
	public function collection_entry_edit($id=Null)
	{
		if($result = $this->Collection_model->get_collection_by_id($id)){
			$data['collection'] = $result;
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['orders'] = $this->Order_model->get_all_order_for_collection($result->cus_id);
			$data['due_amount'] = $this->Order_model->find_due_amount($result->order_no);
			$this->load->view('admin/accounts/edit_collection', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('collections');
		}
	}

	/*====== Update Collection Date =========*/
	public function collection_entry_update($id=Null)
	{
		$this->form_validation->set_rules('cus_id', 'Customer ', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Chassis Number ', 'required|trim');
		$this->form_validation->set_rules('lc_no', 'L/C Number ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Collection Entry';
			$data['content'] = 'accounts/collection_entry';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['collections'] = $this->Collection_model->get_all_collection_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Collection_model->update_collection_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('collections');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('collections');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function delete_collection_data($id=Null)
	{
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
	public function find_payment_lc($order_id=Null)
	{
		if($lc_no = $this->Order_model->find_lc_number($order_id)){
			$data['lc_id'] = $lc_no->id;
			$data['lc_no'] = $lc_no->lc_no;
			echo json_encode($data);
		}else{
			echo 0;
		}
	}

	
}