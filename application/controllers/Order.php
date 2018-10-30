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
			$data['title'] = 'Order Information List';  
			$data['content'] = 'order_info/order_list';
			$data['orders']	= $this->Order_model->get_order_info();
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	/*========= Order Pending List==========*/
	public function order_pending_list()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Order Pending Information List';  
			$data['content'] = 'order_info/order_pending_list';
			$data['orders']	= $this->Order_model->get_order_pending_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*========= Order On Process List==========*/
	public function order_onprocess_list()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Order On Procces List';  
			$data['content'] = 'order_info/order_onprocess_list';
			$data['orders']	= $this->Order_model->get_order_onprocess_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*==========Order insert Page show ==========*/
	public function insert_order_info()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Order Information';  
			$data['content'] = 'order_info/create_order';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$data['cars'] = $this->Purchase_model->unOrder_car_list();
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	/*========= Order Data Store =======*/
	public function store_order_info()
	{
		$this->form_validation->set_rules('cus_id', 'Select Customer', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Order No', 'required|trim');

		if($this->form_validation->run() == FALSE){

			$data['title'] = 'Order Information';  
			$data['content'] = 'order_info/create_order';
			$data['customers'] = $this->Customer_model->find_all_customer_info();

			$this->load->view('admin/adminMaster', $data);
		}else{
			$cus_id = $this->input->post('cus_id');
			
			if($order_id = $this->Order_model->store_order_info($cus_id)){

				$pus_id = $this->input->post('pus_id');
				$lc_no = $this->input->post('ord_lc_no');
				$this->Purchase_model->update_order_info_in_purchase($pus_id,$order_id,$cus_id,$lc_no,0);
					
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

	/*========== Edit Order Details ============*/
	public function edit_order_info($id=Null)
	{	
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{

			if($result = $this->Order_model->order_info_by_id($id)){

				$data['title'] = 'Order Information';  
				$data['content'] = 'order_info/edit_order';
				$data['customers'] = $this->Customer_model->find_all_customer_info();
				$data['lc_data'] = $this->LC_model->get_all_lc_info();
				$data['customer_info'] = $this->Customer_model->customer_by_id($result->cus_id);
				$data['order'] = $result;
				$data['cars'] = $this->Purchase_model->unOrder_car_list();
				$this->load->view('admin/adminMaster', $data);
			}else{
				$data['warning'] ='No data Found!';
			    $this->session->set_flashdata($data);
			    redirect('order/list');
			}
		}
	}

	/*======== view Order Information =======*/
	public function view_order_info($id=Null)
	{
		if($res = $this->Order_model->order_info_by_id($id)){
			$data['title']	= 'View Order Details';
			$data['content'] = 'order_info/view_order';
			$data['customer'] = $this->Customer_model->customer_by_id($res->cus_id);
			$data['paid_amount'] = $this->Order_model->find_paid_amount($id);
			$data['order'] = $res;

			$this->load->view('admin/adminMaster', $data);
		}else{
			$data['error']="No Data Find..!";
			$this->session->set_flashdata($data);
			redirect('order/list');
		}
	}
	/*========= Order Data Update =======*/
	public function update_order_info($id = Null)
	{	
		

		$this->form_validation->set_rules('cus_id', 'Select Customer', 'required|trim');
		$this->form_validation->set_rules('ord_car_model', 'Model Number ', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Order No', 'required|trim');

		if($this->form_validation->run() == FALSE){

			$data['title'] = 'Order Information';  
			$data['content'] = 'order_info/edit_order';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$data['customer_info'] = $this->Customer_model->customer_by_id($result->cus_id);
			$data['order'] = $this->Order_model->order_info_by_id($id);
			$this->load->view('admin/adminMaster', $data);

		}else{
			
			if($this->Order_model->update_order_info($id)){

				$pus_id = $this->input->post('pus_id');
				$cus_id = $this->input->post('cus_id');
				if($pus_id != 0){
					$this->Purchase_model->update_order_info_in_purchase($pus_id,$id,$cus_id,0);
				}else{
					$this->Purchase_model->update_order_edit_info_in_purchase($id,$cus_id);
				}
				$data['success']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('order/list');

			}else{

				$data['error']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('order/list');
			}
		}
	}

	/*======== Delete Order Info Data ========*/
	public function delete_order_info($id=Null)
	{
		if($result = $this->Order_model->delete_order_info($id)){

			$data['success']="Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('order/list');
		}else{

			$data['error']="Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('order/list');
		}
	}

	/*======== order delivery status change =======*/
	public function order_delivery($id=Null)
	{	
		$res = $this->Order_model->order_info_by_id($id);
		if($res->ord_lc_no == '' || $res->ord_chassis_no == ''){

			$data['error']="Order Lc Number and Chassis Number not added add First..!";
			$this->session->set_flashdata($data);
			redirect('order/list');
		}

		if($this->Order_model->delivery_order($id)){

			$this->Purchase_model->update_car_dliv_status($id);
			$data['success']="Deliver Successfully!";
			$this->session->set_flashdata($data);
			redirect('order/list');

		}else{

			$data['error']="Deliver Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('order/list');
		}
	}

	/*==== Delivery Time order info Show ======*/
	public function show_order_deliery_info($id=Null)
	{
		if($res = $this->Order_model->order_info_by_id($id)){
			$data['customer'] = $this->Customer_model->customer_by_id($res->cus_id);
			$data['paid_amount'] = $this->Order_model->find_paid_amount($id);
			$data['order'] = $res;

			$this->load->view('admin/order_info/delivery_order', $data);
		}else{
			$data['error']="No Data Find..!";
			$this->session->set_flashdata($data);
			redirect('order/list');
		}
	}

}