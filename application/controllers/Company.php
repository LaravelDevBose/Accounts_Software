<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Company extends MY_Controller
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

	/*============ show Agent Page ==============*/
	public function company_page_view()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{

			// if($this->admin_access('agent') != 1){
			// 	$data['warning_msg']="You Are Not able to Access this Module...!";
			// 	$this->session->set_flashdata($data);
			// 	redirect('administration/dashboard');
			// }

			$data['title'] = 'Company Information';  
			$data['content'] = 'company/company_page';
			$data['companies'] = $this->Company_model->find_all_company_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*=======================*/
	public function store_company_info()
	{
		$this->form_validation->set_rules('comp_name', 'Company Name ', 'required|trim');
		$this->form_validation->set_rules('comp_phone', 'Contact Number ', 'required|trim');


		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Company Information';  
			$data['content'] = 'company/company_page';
			$data['companies'] = $this->Company_model->find_all_company_info();
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Company_model->store_company_info()){
				$data['success']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('company/insert');

			}else{
				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('company/insert');
			}
		}
	}


	/*========  Edit Customer info page=============*/

	public function edit_company_info($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			
			$data['company'] = $this->Company_model->company_by_id($id);
			$this->load->view('admin/company/company_edit', $data);
		}
	}

	/*========== Update Customer Info ============*/
	public function update_company_info($id=Null)
	{
		$this->form_validation->set_rules('comp_name', 'Company Name ', 'required|trim');
		$this->form_validation->set_rules('comp_phone', 'Contact Number ', 'required|trim');
		
		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Company Information';  
			$data['content'] = 'company/company_page';
			$data['companies'] = $this->Company_model->find_all_company_info();
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Company_model->update_company_info($id)){
				
				$data['success']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('company/insert');

			}else{
				$data['error']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('company/insert');
			}
		}
	}

	/*========== Delete Customer Info ===========*/
	public function delete_company_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		if($this->Company_model->delete_company_info($id)){
			$data['success']="Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('company/insert');
		}else{
			$data['error']="Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('company/insert');
		}
	}
}