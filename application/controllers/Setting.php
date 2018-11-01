<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends MY_Controller
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
		if($this->admin_access('company_info') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		
		$data['title'] = 'Company Setting';
		$data['content'] = 'setting/setting_page';
		$data['logo'] = $this->Setting_model->get_company_info('logo');
		$data['cmp_name'] = $this->Setting_model->get_company_info('cmp_name');
		$data['cmp_adds'] = $this->Setting_model->get_company_info('cmp_adds');
		$data['cmp_phn'] = $this->Setting_model->get_company_info('cmp_phn');
		$data['cmp_eml'] = $this->Setting_model->get_company_info('cmp_eml');
		$this->load->view('admin/adminMaster', $data);
	}

	/*store or Update Company Info*/

	public function store_or_update_conpany_info()
	{	

		
		if($res = $this->Setting_model->data_store_or_update()){
			$data['success'] = 'Company All Infomation Update SuccessFullY';
			$this->session->set_flashdata($data);
			redirect('setting/insert');
		}else{
			$data['error'] = 'Company All Infomation Update UnSuccessFull';
			$this->session->set_flashdata($data);
			redirect('setting/insert');
		}
	}




	
}