<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admindashboard extends MY_Controller
{
	/*================View Admin Dashboard=================*/
	/*================View Admin Dashboard=================*/
	public function index()
	{
		$this->load->model('Admin_model');
		if ($this->Admin_model->is_admin_loged_in()) 
		{
			$data['title'] = 'Dashboard';  
			$data['content'] = 'dashboard/home';  
			$data['activeHome'] = 'active';  
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			
			$data['error_login'] = 'Logged in first';
			$this->load->view('login_page', $data);
		}
	}

	public function sale_dashboard()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Sales Home';  
			$data['content'] = 'dashboard/sales_home';
			$this->load->view('admin/adminMaster', $data);
		}
	}

	public function purchase_dashboard()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Purchase Home';  
			$data['content'] = 'dashboard/purchase_home';
			$this->load->view('admin/adminMaster', $data);
		}
	}

	public function accounts_dashboard()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Accounts Home';  
			$data['content'] = 'dashboard/accounts_home';
			$this->load->view('admin/adminMaster', $data);
		}
	}

	public function hr_payroll_dashboard()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'HR & Payroll Home';  
			$data['content'] = 'dashboard/hr_payroll_home';
			$this->load->view('admin/adminMaster', $data);
		}
	}

	public function reports_dashboard()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Reports Home';  
			$data['content'] = 'dashboard/reports_home';
			$this->load->view('admin/adminMaster', $data);
		}
	}

	public function administration_dashboard()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Administration Home';  
			$data['content'] = 'dashboard/administration_home';
			$this->load->view('admin/adminMaster', $data);
		}
	}	
}