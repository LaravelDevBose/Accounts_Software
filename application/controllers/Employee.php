<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller
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
			$data['title'] = 'Employee Information List';  
			$data['content'] = 'employee/employee_list';
			$data['employees'] = $this->Employee_model->find_all_employee_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*====== show Employee insert page ===========*/
	public function insert_employee_info()
	{	
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Add Employee Information';  
			$data['content'] = 'employee/insert_employee';
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*======= Store Employee information ==========*/
	public function store_employee_info()
	{
		$this->form_validation->set_rules('emp_name', 'Employee Name ', 'required|trim');
		$this->form_validation->set_rules('emp_dob', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('emp_nid', 'Employee NID', 'required|trim');
		$this->form_validation->set_rules('emp_phone', 'Contact No', 'required|trim');
		$this->form_validation->set_rules('emp_join_date', 'Joining Date', 'required|trim');
		$this->form_validation->set_rules('emp_sallary', 'Sallary', 'required|trim');
		$this->form_validation->set_rules('pre_address', 'Present Address', 'required|trim');

		if($this->form_validation->run() == FAlSE){
			$data['title'] = 'Add Employee Information';  
			$data['content'] = 'employee/insert_employee';
			$this->load->view('admin/adminMaster', $data);
		}else{
			
			if($this->Employee_model->store_employee_data()){

				$data['success'] = 'Store Successfully!';
				$this->session->set_flashdata($data);
				redirect('employee/insert');
			}else{
				$data['error'] = 'Store UnSuccessfully!';
				$this->session->set_flashdata($data);
				redirect('employee/insert');
			}
		}
	}

	/*======== Edit Employee page ========*/
	public function edit_employee_info($id=Null)
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Edit Employee Information';  
			$data['content'] = 'employee/edit_employee';
			$data['employee'] = $this->Employee_model->employee_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*======= Store Employee information ==========*/
	public function update_employee_info($id = Null)
	{
		$this->form_validation->set_rules('emp_name', 'Employee Name ', 'required|trim');
		$this->form_validation->set_rules('emp_dob', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('emp_nid', 'Employee NID', 'required|trim');
		$this->form_validation->set_rules('emp_phone', 'Contact No', 'required|trim');
		$this->form_validation->set_rules('emp_join_date', 'Joining Date', 'required|trim');
		$this->form_validation->set_rules('emp_sallary', 'Sallary', 'required|trim');
		$this->form_validation->set_rules('pre_address', 'Present Address', 'required|trim');

		if($this->form_validation->run() == FAlSE){
			$data['title'] = 'Edit Employee Information';  
			$data['content'] = 'employee/edit_employee';
			$data['employee'] = $this->Employee_model->employee_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}else{
			
			if($this->Employee_model->update_employee_data($id)){

				$data['success'] = 'Update Successfully!';
				$this->session->set_flashdata($data);
				redirect('employees');
			}else{
				$data['error'] = 'Update UnSuccessfully!';
				$this->session->set_flashdata($data);
				redirect('employees');
			}
		}
	}

	/*========= delete Employee Info =======*/
	public function delete_employee_info($id=Null)
	{
		if($this->Employee_model->delete_employee_data($id)){
			$data['success'] = 'Delete Successfully!';
			$this->session->set_flashdata($data);
			redirect('employees');
		}else{
			$data['error'] = 'Delete UnSuccessfully!';
			$this->session->set_flashdata($data);
			redirect('employees');
		}
	}

	/*======== view Employee info ==========*/
	public function view_employee_info($id=Null)
	{
		$data['employee'] = $this->Employee_model->employee_by_id($id);
		$this->load->view('admin/employee/view_employee', $data);
	}
}