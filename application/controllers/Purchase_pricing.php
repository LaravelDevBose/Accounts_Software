<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_pricing extends MY_Controller
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

	public function pricing_list_view()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{

			if($this->admin_access('employee_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('purchase/dashboard');
			}
			$data['title'] = 'Pricing Information List';  
			$data['content'] = 'pricing/pricing_list';
			$data['prices'] = $this->Pricing_model->find_all_pricing_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*====== show Employee insert page ===========*/
	public function insert_pricing_info()
	{	
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('employee_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('purchase/dashboard');
			}

			$data['title'] = 'Add Pricing Information';  
			$data['content'] = 'pricing/pricing_entry';
			$data['purchases'] = $this->Purchase_model->undelivery_purchase_car();
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*======= Store Employee information ==========*/
	public function store_pricing_info()
	{
		$this->form_validation->set_rules('pus_id', 'Chassis Number', 'required|trim');

		if($this->form_validation->run() == FAlSE){
			$data['title'] = 'Add Pricing Information';  
			$data['content'] = 'pricing/pricing_entry';
			$data['purchases'] = $this->Purchase_model->undelivery_purchase_car();
			$this->load->view('admin/adminMaster', $data);
		}else{
			
			if($this->Pricing_model->store_pricing_data()){

				$this->Purchase_model->total_price_update($this->input->post('pus_id'), $this->input->post('total_price'));

				$data['success'] = 'Store Successfully!';
				$this->session->set_flashdata($data);
				redirect('pricing/entry');
			}else{
				$data['error'] = 'Store UnSuccessfully!';
				$this->session->set_flashdata($data);
				redirect('pricing/entry');
			}
		}
	}

	/*======== Edit Employee page ========*/
	public function edit_pricing_info($id=Null)
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('edit_access') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('purchase/dashboard');
			}
			$data['title'] = 'Edit Employee Information';  
			$data['content'] = 'pricing/edit_pricing';
			$data['employee'] = $this->Employee_model->employee_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*======= Store Employee information ==========*/
	public function update_pricing_info($id = Null)
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
			$data['content'] = 'pricing/edit_pricing';
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
	public function delete_pricing_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
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