<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller
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
			
			if($this->admin_access('customer_list') == 0){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}

			$data['title'] = 'Customer Information List';  
			$data['content'] = 'customer_info/customer_list';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*==========Insert Customer Info==========*/
	public function insert_customer()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{

			if($this->admin_access('customer_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}

			$data['title'] = 'Customer Entry Information';  
			$data['content'] = 'customer_info/create_customer';


			$cus_id = $this->db->order_by('id', 'desc')->limit(1)->get('customers')->row();
			if(is_null($cus_id)|| !isset($cus_id)){
				$cus_code = 'C00001';
			}else{

				$num = substr($cus_id->cus_code, 1, strlen($cus_id->cus_code));

				if($num < 9):
					$num+=1;
					$cus_code = 'C0000'.$num;
				elseif($num < 99):
					$num+=1;
					$cus_code = 'C000'.$num;
				elseif($num < 999):
					$num+=1;
					$cus_code = 'C00'.$num;
				elseif($num<9999):
					$num+=1;
					$cus_code = 'C0'.$num;
				else:
					$num+=1;
					$cus_code = 'C'.$num;
				endif;
			}
			$data['customers'] = $this->Customer_model->find_limit_customer_info();
			$data['cus_code'] = $cus_code;
			$this->load->view('admin/adminMaster', $data);
		}	
	}



	/*=======================*/
	public function store_customer_info()
	{
		$this->form_validation->set_rules('cus_code', 'Customer Code ', 'required|trim');
		$this->form_validation->set_rules('cus_name', 'Customer Name ', 'required|trim');
		$this->form_validation->set_rules('cus_contact_no', 'Contact Number ', 'required|trim');
		$this->form_validation->set_rules('cus_entry_date', 'Entry Date', 'required|trim');
		$this->form_validation->set_rules('cus_address', 'Customer Address', 'required|trim');

		if($this->form_validation->run() == FALSE) 
		{  
			$data['title'] = 'Customer Insert Information'; 
			$data['content'] = 'customer_info/create_customer';   
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($cus_id = $this->Customer_model->store_customer_info()){
				
				$data['warning']="Customer Info Store Successfully!";
				$this->session->set_flashdata($data);
				redirect('customer/insert');

			}else{
				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('customer/insert');
			}
		}
	}



	/*==========Insert Customer And Order Info==========*/
	public function customer_order_insert_page()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('customer_order') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}

			$data['title'] = 'Customer & Order Information';  
			$data['content'] = 'customer_info/cus_order_entry';


			$cus_id = $this->db->order_by('id', 'desc')->limit(1)->get('customers')->row();
			if(is_null($cus_id)|| !isset($cus_id)){
				$cus_code = 'C00001';
			}else{

				$num = substr($cus_id->cus_code, 1, strlen($cus_id->cus_code));

				if($num < 9):
					$num+=1;
					$cus_code = 'C0000'.$num;
				elseif($num < 99):
					$num+=1;
					$cus_code = 'C000'.$num;
				elseif($num < 999):
					$num+=1;
					$cus_code = 'C00'.$num;
				elseif($num<9999):
					$num+=1;
					$cus_code = 'C0'.$num;
				else:
					$num+=1;
					$cus_code = 'C'.$num;
				endif;
			}
			
			$data['cus_code'] = $cus_code;
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$data['cars'] = $this->Purchase_model->unOrder_car_list();
			$this->load->view('admin/adminMaster', $data);
		}	
	}



	/*=======================*/
	public function customer_order_store()
	{
		$this->form_validation->set_rules('cus_code', 'Customer Code ', 'required|trim');
		$this->form_validation->set_rules('cus_name', 'Customer Name ', 'required|trim');
		$this->form_validation->set_rules('cus_contact_no', 'Contact Number ', 'required|trim');
		$this->form_validation->set_rules('cus_entry_date', 'Entry Date', 'required|trim');
		$this->form_validation->set_rules('cus_address', 'Customer Address', 'required|trim');
		// $this->form_validation->set_rules('ord_lc_no', 'L/C No', 'required|trim');
		// $this->form_validation->set_rules('ord_car_model', 'Car Model', 'required|trim');
		$this->form_validation->set_rules('ord_budget_range', 'Budget Range', 'required|trim');
		$this->form_validation->set_rules('ord_advance', 'Advance', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Order No ', 'required|trim');


		if($this->form_validation->run() == FALSE) 
		{  
			$data['title'] = 'Customer & Order Information'; 
			$data['content'] = 'customer_info/create_customer';   
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($cus_id = $this->Customer_model->store_customer_info()){
				if($order_id = $this->Order_model->store_order_info($cus_id)){

					$pus_id = $this->input->post('pus_id');
					if($pus_id != 0){
						$this->Purchase_model->update_order_info_in_purchase($pus_id,$order_id,$cus_id,0);
					}
					

					$data['success']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('customer/insert');
				}

				$data['warning']="Customer Info Store But Order Not Store Successfully!";
				$this->session->set_flashdata($data);
				redirect('customer/insert');

			}else{
				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('customer/insert');
			}
		}
	}



	/*======== find customer info in ajax request ============*/
	public function find_customer_info($id = null)
	{
		if($result = $this->Customer_model->customer_by_id($id)){
			echo json_encode($result);
		}else{
			echo '0';
		}
	}

	/*========  Edit Customer info page=============*/

	public function edit_customer_info($id=Null)
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('edit_access') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}

			$data['title'] = 'Edit Customer Information';  
			$data['content'] = 'customer_info/edit_customer';
			$data['customer'] = $this->Customer_model->customer_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*========== Update Customer Info ============*/
	public function update_customer_info($id=Null)
	{
		$this->form_validation->set_rules('cus_code', 'Customer Code ', 'required|trim');
		$this->form_validation->set_rules('cus_name', 'Customer Name ', 'required|trim');
		$this->form_validation->set_rules('cus_contact_no', 'Contact Number ', 'required|trim');
		$this->form_validation->set_rules('cus_entry_date', 'Entry Date', 'required|trim');
		$this->form_validation->set_rules('cus_address', 'Customer Address', 'required|trim');
		


		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Edit Customer Information';  
			$data['content'] = 'customer_info/edit_customer';
			$data['customer'] = $this->Customer_model->customer_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Customer_model->update_customer_info($id)){
				
				$data['success']="Customer info Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('customer');

			}else{
				$data['error']="Customer  info Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('customer');
			}
		}
	}

	/*========== Delete Customer Info ===========*/
	public function delete_customer_info($id=Null)
	{	if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('order/dashboard');
		}

		if($this->Customer_model->delete_customer_info($id)){
			$data['success']="Customer info Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('customer');
		}else{
			$data['error']="Customer info Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('customer');
		}
	}


}
