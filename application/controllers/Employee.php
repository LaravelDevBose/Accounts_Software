<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends MY_Controller
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
			if($this->admin_access('employee_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('hr_payroll/dashboard');
			}
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
			if($this->admin_access('employee_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('hr_payroll/dashboard');
			}
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
			if($this->admin_access('edit_access') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('hr_payroll/dashboard');
			}
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
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('hr_payroll/dashboard');
		}

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

	/*========== Sallary Month Insert Page==============*/
	public function month_insert_Page()
	{	
		if($this->admin_access('monthe_entry') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('hr_payroll/dashboard');
		}
		$data['title'] = "Add Sallary Month";
		$data['content'] = 'employee/month/month_insert_Page';
		$data['month_names'] = $this->SallaryMonth_model->all_month_name();
		$data['sallary_months'] = $this->SallaryMonth_model->get_all_sallay_month();

		$this->load->view('admin/adminMaster', $data);
	}

	/*======= sallary Month store ==========*/
	public function store_sallary_month()
	{
		$this->form_validation->set_rules('year', 'Year', 'required|trim');
		$this->form_validation->set_rules('month_id', 'Month Name', 'required|trim');

		if($this->form_validation->run() == FAlSE){
			echo 0;
		}else{
			if($this->SallaryMonth_model->sallary_month_store()){
				$data['sallary_months'] = $this->SallaryMonth_model->get_all_sallay_month();
				$this->load->view('admin/employee/month/sallary_month_tbl',$data);
			}else{
				echo 0;
			}
		}
	}

	/*====== Edit Sallary Month Data ========*/
	public function edit_sallary_month($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('hr_payroll/dashboard');
		}
		if($res = $this->SallaryMonth_model->sallary_month_by_id($id)){
			$data['sallary_month'] = $res;
			$data['month_names'] = $this->SallaryMonth_model->all_month_name();
			$this->load->view('admin/employee/month/edit_sallary_month', $data);
		}else{
			$data['error'] = 'No Data Found..!';
			$this->session->set_flashdata($data);
			redirect('employee/month');
		}
	}

	/*======== Update Sallary Informaion ======*/
	public function update_sallary_month($id=Null)
	{
		$this->form_validation->set_rules('year', 'Year', 'required|trim');
		$this->form_validation->set_rules('month_id', 'Month Name', 'required|trim');

		if($this->form_validation->run() == FAlSE){
			$data['title'] = "Add Sallary Month";
			$data['content'] = 'employee/month/month_insert_Page';
			$data['month_names'] = $this->SallaryMonth_model->all_month_name();
			$data['sallary_months'] = $this->SallaryMonth_model->get_all_sallay_month();

			$this->load->view('admin/adminMaster', $data);
		}else{
			if($this->SallaryMonth_model->sallary_month_update($id)){
				$data['success'] = 'Update Successfully..!';
				$this->session->set_flashdata($data);
				redirect('employee/month');
			}else{
				$data['error'] = 'Update UnSuccessfully..!';
				$this->session->set_flashdata($data);
				redirect('employee/month');
			}
		}
	}

	/*======== delete sallary month data ==========*/
	public function delete_sallary_month($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('hr_payroll/dashboard');
		}
		if( $this->SallaryMonth_model->sallary_month_delete($id)){
			$data['success'] = 'Delete Successfully';
			$this->session->set_flashdata($data);
			redirect('employee/month');
		}else{
			$data['error'] = 'Delete UnSuccessfully';
			$this->session->set_flashdata($data);
			redirect('employee/month');
		}
	}

	/*======== get employee salary details=======*/
	public function get_employee_salary($emp_id=Null)
	{
		if($res = $this->Employee_model->employee_by_id($emp_id)){
			echo json_encode($res->emp_sallary);
		}else{
			echo 0;
		}
	}
}