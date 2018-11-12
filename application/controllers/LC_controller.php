<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LC_controller extends MY_Controller
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

	/*==========Admin Login Check==========*/
	public function index()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			redirect('Admindashboard');
		}
	}

	public function lc_list_view()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('lc_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('administration/dashboard');
			}
			$this->cart->destroy();
			$data['title'] = 'L/C Information List';  
			$data['content'] = 'lc_info/lc_list'; 
			$data['lc_data'] = $this->LC_model->get_all_lc_info();  
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	public function lc_insert_page()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('lc_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('administration/dashboard');
			}

			$this->cart->destroy();

			$data['title'] = 'L/C Information';  
			$data['content'] = 'lc_info/create_lc'; 
			$data['companies'] = $this->Company_model->find_all_company_info(); 
			$data['suppliers'] = $this->Supplier_model->find_all_supplier_info(); 
			$data['agents'] = $this->Agent_model->find_all_agent_info(); 
			$data['purchases'] = $this->Purchase_model->find_purchase_by_chassis_no(); 
			$this->load->view('admin/adminMaster', $data);
		}	
	}



	/*====== L/C Number Store Via Ajax Request==========*/
	public function store_lc_info()
	{	
		if(!$this->input->is_ajax_request()) exit("Invalid Request");


		$this->form_validation->set_rules('lc_no', 'L/C Number', 'required|trim');
		$this->form_validation->set_rules('lc_date', 'L/C Date', 'required|trim');
		$this->form_validation->set_rules('lc_amount', 'L/C Amount', 'required|trim');
		$this->form_validation->set_rules('car_qty', 'Car Quantity', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		$this->form_validation->set_rules('comp_id', 'Company Name', 'required|trim');
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'required|trim');

		if($this->form_validation->run() == FALSE){
			$data['title'] = 'L/C Information';  
			$data['content'] = 'lc_info/create_lc'; 
			$data['companies'] = $this->Company_model->find_all_company_info(); 
			$data['suppliers'] = $this->Supplier_model->find_all_supplier_info(); 
			$data['agents'] = $this->Agent_model->find_all_agent_info(); 
			$data['customers'] = $this->Customer_model->find_all_customer_info(); 
			$this->load->view('admin/adminMaster', $data);
		}else{

			if($lc_id = $this->LC_model->store_lc_info()){

				if($this->cart->contents() && count($this->cart->contents()) > 0){

					foreach ($this->cart->contents() as $cart) {
						
						if($this->LC_model->store_lc_details_info($lc_id, $cart)){

							$this->Purchase_model->update_lc_in_purchase($cart['id'], $lc_id);
							$this->Order_model->update_lc_in_order($cart['order_id'], $lc_id);
						}
					}
				}
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	/*====== lc edit page view======*/
	public function edit_lc_info($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		if($result = $this->LC_model->lc_data_by_id($id)){

			$data['title'] = 'Edit L/C Information';  
			$data['content'] = 'lc_info/lc_edit_page'; 
			$data['lc'] = $result;
			$data['companies'] = $this->Company_model->find_all_company_info(); 
			$data['suppliers'] = $this->Supplier_model->find_all_supplier_info(); 
			$data['agents'] = $this->Agent_model->find_all_agent_info(); 
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['lc_details'] = $this->LC_model->find_lc_details_info($id);
            $data['purchases'] = $this->Purchase_model->find_purchase_by_chassis_no();
            $this->load->view('admin/adminMaster', $data);
		}
	}

	/*======== update lc information ========*/
	public function update_lc_info($id=Null)
	{	
		if(!$this->input->is_ajax_request()) exit("Invalid Request");

		$this->form_validation->set_rules('lc_no', 'L/C Number', 'required|trim');
		$this->form_validation->set_rules('lc_date', 'L/C Date', 'required|trim');
		$this->form_validation->set_rules('lc_amount', 'L/C Amount', 'required|trim');
		$this->form_validation->set_rules('car_qty', 'Car Quantity', 'required|trim');
		$this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
		$this->form_validation->set_rules('comp_id', 'Company Name', 'required|trim');
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'required|trim');

		if($this->form_validation->run() == FALSE){
			echo 0;
		}else{
			if($this->LC_model->update_lc_data($id)){

				if($this->cart->contents() && count($this->cart->contents()) > 0){

					foreach ($this->cart->contents() as $cart) {
						
						if($this->LC_model->store_lc_details_info($id, $cart)){

							$this->Purchase_model->update_lc_in_purchase($cart['id'], $id);
							$this->Order_model->update_lc_in_order($cart['order_id'], $id);
						}
					}
				}
				$this->cart->destroy();
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	/*========== Delete Lc Number info =======*/
	public function delete_lc_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		if($this->LC_model->delete_lc_data($id)){
			$data['success']="L/C Number Delete Succesfully";
			$this->session->set_flashdata($data);
			redirect('lc/insert');
		}else{
			$data['error']="L/C Number Not Deleted";
			$this->session->set_flashdata($data);
			redirect('lc/insert');
		}
	}

	

	public function find_purchase_info($pus_id=Null)
	{
		$order_info = $this->Purchase_model->find_purchase_info($pus_id);

		if($order_info){
			echo json_encode($order_info);
		}else{
			echo 0;
		}
	}

	/*============= Store Car info in session for L/C=============*/
	public function store_car_info_in_cart()
	{
		$data = array(
			'id' => $this->input->post('pus_id'), //purchase id will id hear
			'cus_id' => $this->input->post('customer_id'),
			'order_id' => $this->input->post('order_id'),
			'chassis_no' => $this->input->post('chassis_no'),
			'engine_no' => $this->input->post('engine_no'),
			'name' => $this->input->post('car_model'), //purchase Car Model will name
			'car_color' => $this->input->post('car_color'),
			'car_year' => $this->input->post('car_year'),
			'car_value' => $this->input->post('car_value'),
			'fright_value' => $this->input->post('fright_value'),
			'price' => $this->input->post('car_value')+$this->input->post('fright_value'),
			'qty' => '1',
		);

		$cart_data = $this->cart->insert($data);

		// echo json_encode($data);
		// exit();

		if(isset($cart_data) && !is_null($cart_data)){
			$this->load->view('admin/lc_info/lc_table');
		}else{
			echo 0;
		}
		
	}


	/*=========== Destroy Cart Info =========*/
	public function destroy_cart()
	{	
		$rowid = $this->input->post('rowid');
		if($rowid == 'All'){

			$this->cart->destroy();
			
			echo 1;

		}else{

			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
				);
			$cart_data = $this->cart->update($data);

			if(isset($cart_data) && !is_null($cart_data)){
				$this->load->view('admin/lc_info/lc_table');
			}else{
				echo 0;
			}

		}
	}

	/*========== delete lc details from table==========*/
	public function delete_lc_details($id=Null)
	{	
		$lc_deatils = $this->LC_model->lc_deatils_by_id($id);

		if($lc_deatils){
			if($this->LC_model->lc_datails_destroy($id)){

				$this->Purchase_model->update_lc_in_purchase($lc_deatils->pus_id, '0');
				$this->Order_model->update_lc_in_order($lc_deatils->order_id, '0');

				$data['lc_details'] = $this->LC_model->find_lc_details_info($lc_deatils->lc_id);
				$this->load->view('admin/lc_info/lc_table', $data);
				
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
		
	}
}