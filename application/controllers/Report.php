<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
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

	/*========= View L/C Report Data ======*/
	public function view_lc_report()
	{
		$data['title'] = 'L/C Report';  
		$data['content'] = 'report/lc_report_view'; 
		$data['lc_data'] = $this->LC_model->get_all_lc_info();  
		$this->load->view('admin/adminMaster', $data);
	}

	/*=======  View Customer Report Data ========== */
	public function view_customer_report()
	{
		$data['title'] = 'Customer Report';  
		$data['content'] = 'report/customer_report_view';
		$data['customers'] = $this->Customer_model->find_all_customer_info();
		$this->load->view('admin/adminMaster', $data);
	}
}