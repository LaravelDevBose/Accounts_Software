<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

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
			$data['purchases'] = $this->Purchase_model->car_purchase_pricing();
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*========== Purchase Priching Insert =========*/
	public function purchase_pricing_insert($pus_id=Null)
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
			$purchase = $this->Purchase_model->purchase_car_full_deatils($pus_id);
			if($purchase->total_price >0 && !is_null($purchase->total_price)){

				$data['warning_msg']="This Car Purchase Estimating Price Already Counted...";
				$this->session->set_flashdata($data);
				redirect('purchase/list');
			}

			$data['title'] = 'Add Purchase Pricing Information';  
			$data['content'] = 'pricing/pricing_entry';
			$data['purchases'] = $this->Purchase_model->car_purchase_pricing();
			$data['purchase'] = $purchase;
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
			$data['purchases'] = $this->Purchase_model->car_purchase_pricing();
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

	/*========= Pricing Full Details view ============*/
	public function view_pricing_details($id=Null)
	{
		$data['title'] = 'View Pricing Information';  
		$data['content'] = 'pricing/view_pricing';
		$data['pricing'] = $this->Pricing_model->pricing_by_id($id);
		$this->load->view('admin/adminMaster', $data);
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
			$data['title'] = 'Edit Priching Information';  
			$data['content'] = 'pricing/edit_pricing';
			$data['pricing'] = $this->Pricing_model->pricing_by_id($id);
			$data['purchases'] = $this->Purchase_model->undelivery_purchase_car();
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*======= Store Employee information ==========*/
	public function update_pricing_info($id = Null)
	{
		$this->form_validation->set_rules('pus_id', 'Chassis Number', 'required|trim');

		if($this->form_validation->run() == FAlSE){
			$data['title'] = 'Edit Priching Information';  
			$data['content'] = 'pricing/edit_pricing';
			$data['pricing'] = $this->Pricing_model->pricing_by_id($id);
			$data['purchases'] = $this->Purchase_model->undelivery_purchase_car();
			$this->load->view('admin/adminMaster', $data);
		}else{
			
			if($this->Pricing_model->update_pricing_data($id)){
				$pus_id = $this->input->post('pus_id');
				$old_pus_id = $this->input->post('old_pus_id');
				$total_price = $this->input->post('total_price');

				if($pus_id == $old_pus_id){
					$this->Purchase_model->total_price_update($pus_id,$total_price);
				}else{
					$this->Purchase_model->total_price_update($pus_id,$total_price);
					$this->Purchase_model->total_price_update($old_pus_id,0);
				}
				
				$data['success'] = 'Update Successfully!';
				$this->session->set_flashdata($data);
				redirect('pricing/list');
			}else{
				$data['error'] = 'Update UnSuccessfully!';
				$this->session->set_flashdata($data);
				redirect('pricing/list');
			}
		}
	}

	/*========= delete Employee Info =======*/
	public function delete_pricing_info($id=Null, $pus_id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}

		if($this->Pricing_model->delete_pricing_data($id)){

			$this->Purchase_model->total_price_update($pus_id,0);

			$data['success'] = 'Delete Successfully!';
			$this->session->set_flashdata($data);
			redirect('pricing/list');
		}else{
			$data['error'] = 'Delete UnSuccessfully!';
			$this->session->set_flashdata($data);
			redirect('pricing/list');
		}
	}

	
}