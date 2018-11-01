<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Check extends MY_Controller
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

	/*==========Admin Login Check==========*/
	public function index()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			redirect('Admindashboard');
		}	
	}

	/*========== Check Entry page ===========*/
	public function check_entry_page()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('check_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('account/dashboard');
			}
			$data['title'] = 'Check Information';  
			$data['content'] = 'check/check_entry'; 
			$data['checks'] = $this->Check_model->get_all_check_info();
			$data['customers'] = $this->Customer_model->find_all_customer_info(); 
			$this->load->view('admin/adminMaster', $data);
		}
	}

	public function check_pendaing_date_list()
	{	
		if($this->admin_access('pending_check_list') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		$data['title'] = 'Pending Check Information';  
		$data['content'] = 'check/pending_check_list'; 
		$data['checks'] = $this->Check_model->get_all_pending_check_info();  
		$this->load->view('admin/adminMaster', $data);
	}

	public function check_reminder_date_list()
	{	
		if($this->admin_access('reminder_check_list') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		$data['title'] = 'Reminder Check Information';  
		$data['content'] = 'check/check_reminder_list'; 
		$data['checks'] = $this->Check_model->get_all_remaind_check_info();  
		$this->load->view('admin/adminMaster', $data);
	}

	public function check_paid_date_list()
	{	
		if($this->admin_access('paid_check_list') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		$data['title'] = 'Paid Check Information';  
		$data['content'] = 'check/paid_check_list'; 
		$data['checks'] = $this->Check_model->get_all_paid_check_info();  
		$this->load->view('admin/adminMaster', $data);
	}


	/*====== Check Information Store ==========*/
	public function check_date_store()
	{	

		$this->form_validation->set_rules('cus_id', 'Customer', 'required|trim');
		$this->form_validation->set_rules('check_amount', 'Check Amount', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
		$this->form_validation->set_rules('check_no', 'Check No', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('check_date', 'Check Date', 'required|trim');
		$this->form_validation->set_rules('remid_date', 'Reminder Date', 'required|trim');
		$this->form_validation->set_rules('sub_date', 'Submit Date', 'required|trim');

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'Check Information';  
			$data['content'] = 'check/check_entry'; 
			$data['checks'] = $this->Check_model->get_all_check_info();
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['cars'] = $this->Purchase_model->get_purchase_info();  
			$this->load->view('admin/adminMaster', $data);
		}else{
			if($this->Check_model->store_check_info()){
				$data['success']="Store Succesfully";
				$this->session->set_flashdata($data);
				redirect('check/entry');
			}else{
				$data['success']="Store UnSuccesfully";
				$this->session->set_flashdata($data);
				redirect('check/entry');
			}
		}
	}

	/*======== Check View Page =========*/
	public function check_view_page($id=Null)
	{
		if($result = $this->Check_model->check_data_by_id($id)){ 
			$data['check'] = $result;
			$this->load->view('admin/check/check_view_page', $data);
		}else{
			$data['error']="No Data Found";
			$this->session->set_flashdata($data);
			redirect('check/entry');
		}
	}

	/*====== check edit page view======*/
	public function check_edit_page($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		if($result = $this->Check_model->check_data_by_id($id)){
			$data['title'] = 'Check Edit Information';  
			$data['content'] = 'check/edit_check'; 
			$data['check'] = $result;
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			 
			$this->load->view('admin/adminMaster', $data);
		}else{
			$data['error']="No Data Found";
			$this->session->set_flashdata($data);
			redirect('check/entry');
		}
	}

	/*======== update check information ========*/
	public function check_update_info($id=Null)
	{
		$this->form_validation->set_rules('cus_id', 'Customer', 'required|trim');
		$this->form_validation->set_rules('check_amount', 'Check Amount', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
		$this->form_validation->set_rules('check_no', 'Check No', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('check_date', 'Check Date', 'required|trim');
		$this->form_validation->set_rules('remid_date', 'Reminder Date', 'required|trim');
		$this->form_validation->set_rules('sub_date', 'Submit Date', 'required|trim');

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'Check Edit Information';  
			$data['content'] = 'check/edit_check'; 
			$data['check'] = $this->Check_model->check_data_by_id($id);
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			 
			$this->load->view('admin/adminMaster', $data);
		}else{
			if($this->Check_model->update_check_data($id)){
				$data['success']="Update Succesfully";
				$this->session->set_flashdata($data);
				redirect('check/entry');
			}else{
				$data['error']="Update UnSuccesfully";
				$this->session->set_flashdata($data);
				redirect('check/entry');
			}
		}
	}

	/*========== Delete Lc Number info =======*/
	public function check_delete_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		if($this->Check_model->delete_check_data($id)){
			$data['success']=" Delete Succesfully";
			$this->session->set_flashdata($data);
			redirect('lc/insert');
		}else{
			$data['error']="Delete UnSuccesfully";
			$this->session->set_flashdata($data);
			redirect('lc/insert');
		}
	}
}