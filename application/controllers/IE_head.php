<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IE_head extends MY_Controller
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
			if($this->admin_access('expense_head_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('administration/dashboard');
			}
			$data['title'] = 'Incone & Expense Head Information';  
			$data['content'] = 'ie_head/create_ie_head'; 
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();  
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	/*====== IE head Store Via Ajax Request==========*/
	public function store_ie_head_info()
	{	
		if($this->IE_head_model->store_ie_head_info()){
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$this->load->view('admin/ie_head/ie_head_table', $data);
		}else{
			echo "0";
		}
	}

	/*====== Ie head edit page view======*/
	public function edit_ie_head_info($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}

		if($result = $this->IE_head_model->ie_head_data_by_id($id)){

			$data['ie_head'] = $result;
			$this->load->view('admin/ie_head/ie_head_edit_page', $data);
		}
	}

	/*======== update lc information ========*/
	public function update_ie_head_info($id=Null)
	{
		$this->form_validation->set_rules('head_title', 'IE Head Title', 'required|trim');
		
		if($this->form_validation->run() == FALSE){
			$data['title'] = 'Incone & Expense Head Information';  
			$data['content'] = 'ie_head/create_ie_head'; 
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();  
			$this->load->view('admin/adminMaster', $data);
		}else{
			if($this->IE_head_model->update_ie_head_data($id)){
				$data['success']="Update Succesfully";
				$this->session->set_flashdata($data);
				redirect('ie_head/insert');
			}else{
				$data['error']="Update UnSuccesfully";
				$this->session->set_flashdata($data);
				redirect('ie_head/insert');
			}
		}
	}

	/*========== Delete Lc Number info =======*/
	public function delete_ie_head_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}

		if($this->IE_head_model->delete_ie_head_data($id)){
			$data['success']="Delete Succesfully";
			$this->session->set_flashdata($data);
			redirect('ie_head/insert');
		}else{
			$data['error']="Delete UnSuccesfully";
			$this->session->set_flashdata($data);
			redirect('ie_head/insert');
		}
	}
}