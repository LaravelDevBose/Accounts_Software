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
			$this->load->view('admin/adminMaster', $data);
		}	
	}
}