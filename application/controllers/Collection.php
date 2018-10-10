<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection extends CI_Controller
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
		$data['title'] = 'Collection Entry';
		$data['content'] = 'accounts/collection_entry';
		$data['customers'] = $this->Customer_model->find_all_customer_info();
		$data['collections'] = $this->Collection_model->get_all_collection_data();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Collection Entry Data =======*/
	public function collection_entry_store()
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

		 	if($this->Collection_model->store_collection_data()){
		 		$data['collections'] = $this->Collection_model->get_all_collection_data();
		 		$this->load->view('admin/accounts/collection_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Collection page =======*/
	public function collection_entry_edit($id=Null)
	{
		if($result = $this->Account_model->get_collection_by_id($id)){
			$data['entry'] = $result;
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
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

		 	if($this->Account_model->update_collection_data($id)){
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
		if($this->Account_model->delete_collection_data($id)){
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
	public function find_lc_due_amount($order_id=Null)
	{
		if($lc_no = $this->Order_model->find_lc_number($order_id)){

			if($amount = $this->Order_model->find_due_amount($order_id)){
				$data['lc_no'] = $lc_no->lc_no;
				$data['due_amount'] = number_format($amount,2);

				echo json_encode($data);
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}
}