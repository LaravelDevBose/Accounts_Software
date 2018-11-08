<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends MY_Controller
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

	/*======== Payment Entry View Page ========*/
	public function payment_entry_page()
	{	
		if($this->admin_access('payment') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		$data['title'] = 'Payment Entry';
		$data['content'] = 'accounts/payment_entry';
		$payment = $this->db->order_by('id', 'desc')->where('payment_type', 'CP')->limit(1)->get('payments')->row();
			if(is_null($payment)|| !isset($payment)){
				$pay_code = 'CP-00001';
			}else{

				$num = substr($payment->payment_code, 3, strlen($payment->payment_code));

				// var_dump($num); die();
				if($num < 9):
					$num+=1;
					$pay_code = 'CP-0000'.$num;
				elseif($num < 99):
					$num+=1;
					$pay_code = 'CP-000'.$num;
				elseif($num < 999):
					$num+=1;
					$pay_code = 'CP-00'.$num;
				elseif($num<9999):
					$num+=1;
					$pay_code = 'CP-0'.$num;
				else:
					$num+=1;
					$pay_code = 'CP-'.$num;
				endif;
			}

		$data['payment_code'] = $pay_code;
		$data['suppliers'] = $this->Supplier_model->find_all_supplier_info();
		$data['orders'] = $this->Order_model->get_active_order_info();
		$data['payments'] = $this->Payment_model->get_all_car_payment_data();
		$data['heads'] = $this->IE_head_model->get_all_head_info('C');
		$this->load->view('admin/adminMaster', $data); 
	}

	/*===== Store Collection Entry Data =======*/
	public function payment_entry_store()
	{	
		$this->form_validation->set_rules('supplier_id', 'Supplier ', 'required|trim');
		$this->form_validation->set_rules('order_id', 'Chassis Number ', 'required|trim');
		$this->form_validation->set_rules('lc_no', 'L/C Number ', 'required|trim');
		$this->form_validation->set_rules('payment_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('payment_amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('head_id', 'Expense Head', 'trim');

		if($this->form_validation->run() == FALSE){
		 	echo 2;
		}else{

		 	if($this->Payment_model->store_payment_data()){
		 		$data['payments'] = $this->Payment_model->get_all_car_payment_data();
		 		$this->load->view('admin/accounts/payment_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Payment page =======*/
	public function payment_entry_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		if($result = $this->Payment_model->get_payment_by_id($id)){
			$data['payment'] = $result;
			$data['suppliers'] = $this->Supplier_model->find_all_supplier_info();
			$data['orders'] = $this->Order_model->get_active_order_info();
			$data['heads'] = $this->IE_head_model->get_all_head_info('O');
			$this->load->view('admin/accounts/edit_payment', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('office_payment');
		}
	}

	/*====== Update payment Data =========*/
	public function payment_entry_update($id=Null)
	{
		$this->form_validation->set_rules('supplier_id', 'Supplier ', 'required|trim');
		$this->form_validation->set_rules('order_id', 'Chassis Number ', 'required|trim');
		$this->form_validation->set_rules('lc_no', 'L/C Number ', 'required|trim');
		$this->form_validation->set_rules('payment_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('payment_amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('head_id', 'Expense Head', 'trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Payment Entry';
			$data['content'] = 'accounts/edit_payment';
			$data['suppliers'] = $this->Supplier_model->find_all_supplier_info();
			$data['orders'] = $this->Order_model->get_active_order_info();
			$data['payments'] = $this->Payment_model->get_all_car_payment_data();
			$data['heads'] = $this->IE_head_model->get_all_head_info('C');
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Payment_model->update_payment_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('payment');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('payment');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function delete_payment_data($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		if($this->Payment_model->delete_payment_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('payment');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('payment');
		}
	}



	/*========== find order info and chassis info =======*/
	public function find_order_info($cus_id=Null)
	{
		if($result = $this->Order_model->find_order_by_customer($cus_id)){
			echo json_encode($result); 
		}else{
			echo 0;
		}
	}

	/*====== find lc Number and due amount=============*/
	public function find_payment_lc($order_id=Null)
	{
		if($lc_no = $this->Order_model->find_lc_number($order_id)){
			$data['lc_id'] = $lc_no->id;
			$data['lc_no'] = $lc_no->lc_no;
			echo json_encode($data);
		}else{
			echo 0;
		}
	}

	

	/*======== Office Payment Entry View Page ========*/
	public function office_payment_entry_page()
	{	
		if($this->admin_access('ofice_payment') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		$data['title'] = 'Office Payment Entry';
		$data['content'] = 'accounts/office_payment_entry';
		$payment = $this->db->order_by('id', 'desc')->where('payment_type', 'OP')->limit(1)->get('payments')->row();
			if(is_null($payment)|| !isset($payment)){
				$pay_code = 'OP-00001';
			}else{

				$num = substr($payment->payment_code, 3, strlen($payment->payment_code));

				// var_dump($num); die();
				if($num < 9):
					$num+=1;
					$pay_code = 'OP-0000'.$num;
				elseif($num < 99):
					$num+=1;
					$pay_code = 'OP-000'.$num;
				elseif($num < 999):
					$num+=1;
					$pay_code = 'OP-00'.$num;
				elseif($num<9999):
					$num+=1;
					$pay_code = 'OP-0'.$num;
				else:
					$num+=1;
					$pay_code = 'OP-'.$num;
				endif;
			}

		$data['code'] = $pay_code;
		$data['payments'] = $this->Payment_model->get_all_office_payment_data();
		$data['heads'] = $this->IE_head_model->get_all_head_info('O');
		$this->load->view('admin/adminMaster', $data); 
	}

	/*===== Store Office Payment Entry Data =======*/
	public function office_payment_store()
	{	
		$this->form_validation->set_rules('payment_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('payment_amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('head_id', 'Expense Head', 'trim');

		if($this->form_validation->run() == FALSE){
		 	echo 2;
		}else{

		 	if($this->Payment_model->store_payment_data()){
		 		$data['payments'] = $this->Payment_model->get_all_office_payment_data();
		 		$this->load->view('admin/accounts/office_payment_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Office Payment page =======*/
	public function office_payment_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		if($result = $this->Payment_model->get_payment_by_id($id)){
			$data['payment'] = $result;
			$data['heads'] = $this->IE_head_model->get_all_head_info('O');
			$this->load->view('admin/accounts/edit_office_payment', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('office_payment');
		}
	}

	/*====== Update Office Payment Date =========*/
	public function office_payment_update($id=Null)
	{
		$this->form_validation->set_rules('payment_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('payment_amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('head_id', 'Expense Head', 'trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Office Payment Entry';
			$data['content'] = 'accounts/office_payment_entry';
			$data['payments'] = $this->Payment_model->get_all_office_payment_data();
			$data['heads'] = $this->IE_head_model->get_all_head_info('O');
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Payment_model->update_payment_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('office_payment');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('office_payment');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function office_payment_delete($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		if($this->Payment_model->delete_payment_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('office_payment');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('office_payment');
		}
	}

}