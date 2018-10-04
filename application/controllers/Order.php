<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller
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

	/*==========Order Page show ==========*/
	public function index()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Order Information';  
			$data['content'] = 'order_info/create_order';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	/*========= Order Data Store =======*/
	public function store_order_info()
	{
		$this->form_validation->set_rules('cus_id', 'Select Customer', 'required|trim');
		$this->form_validation->set_rules('ord_lc_no', 'L/c Number ', 'required|trim');
		$this->form_validation->set_rules('ord_car_model', 'Model Number ', 'required|trim');
		$this->form_validation->set_rules('ord_engine_no', 'Engine Number', 'required|trim');
		$this->form_validation->set_rules('ord_chassis_no', 'Chassis No', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Order No', 'required|trim');

		if($this->form_validation->run() == FALSE){

			$data['title'] = 'Order Information';  
			$data['content'] = 'order_info/create_order';
			$data['customers'] = $this->Customer_model->find_all_customer_info();

			$this->load->view('admin/adminMaster', $data);
		}else{
			$cus_id = $this->input->post('cus_id');
			
			if($this->Order_model->store_order_info($cus_id)){

				$data['success']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('order/insert');

			}else{

				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('order/insert');
			}
		}
	}

}