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

	/*======== Collention Entry View Page ========*/
	public function collection_entry_page()
	{
		$data['title'] = 'Collection Entry';
		$data['content'] = 'accounts/collection_entry';
		$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
		$data['c_entys'] = $this->Account_model->get_all_collection_data();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Collection Entry Data =======*/
	public function collection_entry_store()
	{	
		// print_r($this->input->post()); die();

		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Collection Entry';
			$data['content'] = 'accounts/collection_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['c_entys'] = $this->Account_model->get_all_collection_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->store_collection_data()){
		 		$data['c_entys'] = $this->Account_model->get_all_collection_data();
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
			redirect('account/collection');
		}
	}

	/*====== Update Collection Date =========*/
	public function collection_entry_update($id=Null)
	{
		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Collection Entry';
			$data['content'] = 'accounts/collection_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['c_entys'] = $this->Account_model->get_all_collection_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->update_collection_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('account/collection');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('account/collection');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function delete_collection_data($id=Null)
	{
		if($this->Account_model->delete_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('account/collection');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('account/collection');
		}
	}
}