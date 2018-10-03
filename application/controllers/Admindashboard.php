<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admindashboard extends CI_Controller
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
}