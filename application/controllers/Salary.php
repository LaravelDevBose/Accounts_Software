<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salary extends MY_Controller
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

	/*======== view salary payment Page ========*/
	public function salary_payment_page()
	{	
		if($this->admin_access('sallay_payment') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		$data['title'] = 'Salary Payment';
		$data['content'] = 'salary/salary_payment';
		$data['months'] = $this->SallaryMonth_model->get_all_sallay_month();
		$data['employees'] = $this->Employee_model->find_all_employee_info();
		$data['salaries'] = $this->Salary_model->get_all_salary();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======= Sallary payment Store ========*/
	public function salary_payment_store()
	{
		$this->form_validation->set_rules('emp_id', 'Employee Name ', 'required|trim');
		$this->form_validation->set_rules('month_id', 'Month ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('payment_amount', 'payment Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
			echo 0;
		}else{
			if($this->Salary_model->store_salary_payment()){
				$data['salaries'] = $this->Salary_model->get_all_salary();
				$this->load->view('admin/salary/salary_tbl', $data);
			}else{
				echo 0;
			}
		}
	}

	/*======== edit salary Payment =========*/
	public function salary_payment_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		if($res = $this->Salary_model->salary_info_by_id($id)){
			$data['salary'] = $res;
			$data['months'] = $this->SallaryMonth_model->get_all_sallay_month();
			$data['employees'] = $this->Employee_model->find_all_employee_info();
			$this->load->view('admin/salary/edit_salary', $data);
		}else{
			$data['warning'] = 'No Data Found';
			$this->session->set_flashdata($data);
			redirect('employee/salary');
		}
	}

	/*========== Salary Payment Update ===========*/
	public function salary_payment_update($id=Null)
	{
		if($this->Salary_model->update_salary_payment($id)){
			$data['success'] = 'Update Successfully..!';
			$this->session->set_flashdata($data);
			redirect('employee/salary');
		}else{
			$data['error'] = 'Update Unsscessfull..!';
			$this->session->set_flashdata($data);
			redirect('employee/salary');
		}
	}

	/*========= delete Salary Payment ==========*/
	public function salary_payment_delete($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		if($this->Salary_model->delete_salary_payment($id)){
			$data['success'] = 'Delete Successfully..!';
			$this->session->set_flashdata($data);
			redirect('employee/salary');
		}else{
			$data['error'] = 'Delete Unsscessfull..!';
			$this->session->set_flashdata($data);
			redirect('employee/salary');
		}
	}


	/*========= check payable amount =======*/
	public function check_payable_amount()
	{	
		$emp_id = $this->input->post('emp_id');
		$month_id = $this->input->post('month_id');
		if ($res = $this->Salary_model->paid_salary_amount($emp_id, $month_id)) {

			$data = $res->payment_amount;
			if(is_null($res->payment_amount)){
				$data = 1;
			}
			echo json_encode($data);
		}else{
			echo 0;
		}
	}

	
}