<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
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

	/********** Payment Entry Method List ****************/
	/********** Payment Entry Method List ****************/
	/********** Payment Entry Method List ****************/

	public function payment_entry_page()
	{
		$data['title'] = 'Payment Entry';
		$data['content'] = 'accounts/payment_entry';
		$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
		$data['payments'] = $this->Account_model->get_all_payment_data();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Payment Entry Data =======*/
	public function payment_entry_store()
	{	
		// print_r($this->input->post()); die();

		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Payment Entry';
			$data['content'] = 'accounts/payment_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['payments'] = $this->Account_model->get_all_payment_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->store_account_data()){
		 		$data['payments'] = $this->Account_model->get_all_payment_data();
		 		$this->load->view('admin/accounts/payment_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Payment page =======*/
	public function payment_entry_edit($id=Null)
	{
		if($result = $this->Account_model->get_data_by_id($id)){
			$data['entry'] = $result;
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$this->load->view('admin/accounts/edit_payment', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('account/payment');
		}
	}

	/*====== Update Payment Date =========*/
	public function payment_entry_update($id=Null)
	{
		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Payment Entry';
			$data['content'] = 'accounts/payment_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['payments'] = $this->Account_model->get_all_payment_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->update_account_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('account/payment');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('account/payment');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function delete_payment_data($id=Null)
	{
		if($this->Account_model->delete_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('account/payment');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('account/payment');
		}
	}

	/********** Other Income Method List ****************/
	/********** Other Income Method List ****************/
	/********** Other Income Method List ****************/

	public function other_income_page()
	{
		$data['title'] = 'Other Income Entry';
		$data['content'] = 'accounts/other_income_entry';
		$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
		$data['incomes'] = $this->Account_model->get_all_income_data();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Other Income Data =======*/
	public function other_income_store()
	{	
		// print_r($this->input->post()); die();

		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Other Income Entry';
			$data['content'] = 'accounts/other_income_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['incomes'] = $this->Account_model->get_all_income_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->store_account_data()){
		 		$data['incomes'] = $this->Account_model->get_all_income_data();
		 		$this->load->view('admin/accounts/other_income_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Other Income page =======*/
	public function other_income_edit($id=Null)
	{
		if($result = $this->Account_model->get_data_by_id($id)){
			$data['entry'] = $result;
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$this->load->view('admin/accounts/edit_other_income', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('account/other_income');
		}
	}

	/*====== Update Other Income Date =========*/
	public function other_income_update($id=Null)
	{
		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Other Income Entry';
			$data['content'] = 'accounts/other_income_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['incomes'] = $this->Account_model->get_all_income_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->update_account_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('account/other_income');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('account/other_income');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function delete_other_income($id=Null)
	{
		if($this->Account_model->delete_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('account/other_income');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('account/payment');
		}
	}
}