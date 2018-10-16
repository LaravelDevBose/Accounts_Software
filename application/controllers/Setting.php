<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
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

	/*======= Setting Page View ======*/
	public function view_setting_page()
	{
		$data['title'] = 'Company Setting';
		$data['content'] = 'setting/setting_page';
		$this->load->view('admin/adminMaster', $data);
	}

	/*store or Update Company Info*/

	public function store_or_update_conpany_info()
	{
		if($res = $this->Setting_model->data_store_and_update()){
			// $data['success'] = 'Company Infomation Update SuccessFullY';
			$data['success'] = 'This System is In Processing';

			$this->session->set_flashdata($data);
			redirect('setting/insert');
		}else{
			$data['error'] = 'Company Infomation Update UnSuccessFull';
			$this->session->set_flashdata($data);
			redirect('setting/insert');
		}
	}
}