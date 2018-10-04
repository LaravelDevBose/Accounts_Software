<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LC_controller extends CI_Controller
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
			$data['title'] = 'L/C Information';  
			$data['content'] = 'lc_info/create_lc'; 
			$data['lc_data'] = $this->LC_model->get_all_lc_info();  
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	/*====== L/C Number Store Via Ajax Request==========*/
	public function store_lc_info()
	{	
		if($this->LC_model->store_lc_info()){
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$this->load->view('admin/lc_info/lc_table', $data);
		}else{
			echo "0";
		}
	}

	/*====== lc edit page view======*/
	public function edit_lc_info($id=Null)
	{
		if($result = $this->LC_model->lc_data_by_id($id)){

			$data['lc'] = $result;
			$this->load->view('admin/lc_info/lc_edit_page', $data);
		}
	}

	/*======== update lc information ========*/
	public function update_lc_info($id=Null)
	{
		$this->form_validation->set_rules('lc_no', 'L/C Number', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		$this->form_validation->set_rules('lc_date', 'L/C Date', 'required|trim');

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'L/C Information';  
			$data['content'] = 'lc_info/create_lc'; 
			$data['lc_data'] = $this->LC_model->get_all_lc_info();  
			$this->load->view('admin/adminMaster', $data);
		}else{
			if($this->LC_model->update_lc_data($id)){
				$data['success']="L/C Number Update Succesfully";
				$this->session->set_flashdata($data);
				redirect('lc/insert');
			}else{
				$data['error']="L/C Number Not Updated";
				$this->session->set_flashdata($data);
				redirect('lc/insert');
			}
		}
	}

	/*========== Delete Lc Number info =======*/
	public function delete_lc_info($id=Null)
	{
		if($this->LC_model->delete_lc_data($id)){
			$data['success']="L/C Number Delete Succesfully";
			$this->session->set_flashdata($data);
			redirect('lc/insert');
		}else{
			$data['error']="L/C Number Not Deleted";
			$this->session->set_flashdata($data);
			redirect('lc/insert');
		}
	}
}