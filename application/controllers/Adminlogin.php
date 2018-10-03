<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adminlogin extends CI_Controller
{
	/*================View Login Page======================*/	
	/*================View Login Page======================*/	
	public function index()
	{
		$this->load->model('Admin_model');
		if ($this->Admin_model->is_admin_loged_in()) 
		{
			$data['content'] = 'dashboard/home';  
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			$this->load->view('login_page');
		}
	}

	/*====================Error Page=====================*/
	public function error()
	{	
		$this->load->view('errors/404', TRUE);	
	}



	/*================Admin Login Data Check=================*/
	/*================Admin Login Data Check=================*/
	public function admin_login_data_check()
	{
		$this->form_validation->set_rules('username', 'User Name', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_page');
		}
		else{
			$this->load->model('Admin_model');

			$res =  $this->Admin_model->admin_login_data_check();
			if($res)
			{
				redirect('admindashboard');
			}
			else{
				$data['error_login'] = 'Invalid User Name or Password';
				$this->load->view('login_page', $data);
			}
		}
	}




	/*================Admin Logout=================*/
	/*================Admin Logout=================*/
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->sess_destroy();
		$data['logout'] = 'Logout Successfully';
		$this->load->view('login_page', $data); 
	}
}