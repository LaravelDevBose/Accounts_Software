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
		$data['content'] = 'setting/info_insert';
		$this->load->view('admin/adminMaster', $data);
	}
}