<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
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

	/*========= View L/C Report Data ======*/
	public function view_lc_report()
	{
		$data['title'] = 'L/C Report';  
		$data['content'] = 'report/lc_report_view'; 
		$data['lc_data'] = $this->LC_model->get_all_lc_info();  
		$this->load->view('admin/adminMaster', $data);
	}

	/*=======  View Customer Report Data ========== */
	public function view_customer_report()
	{
		$data['title'] = 'Customer Report';  
		$data['content'] = 'report/customer_report_view';
		$data['customers'] = $this->Customer_model->find_all_customer_info();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======= View Lc Wise Order Report ========*/
	public function view_lc_wise_order_report()
	{
		$data['title'] = 'Lc Wise Order Report';  
		$data['content'] = 'report/lc_order_report_view';
		$data['lc_data'] = $this->LC_model->get_all_lc_info();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======= find order by L/C Number ========*/
	public function find_order_by_lc($lc_num=Null)
	{
		if($result = $this->Order_model->lc_wise_order($lc_num)){

			$data['orders'] = $result;
			$this->load->view('admin/report/order_table',$data);
		}else{
			echo 0;
		}
	}

	/*======== View Collection Report Page ========*/
	public function view_collection_report()
	{	

		$data['title'] = 'Collection Report';  
		$data['content'] = 'report/collection_report_view';
		$this->load->view('admin/adminMaster', $data);
	}

	public function find_date_wise_collection()
	{
		if($res = $this->Collection_model->find_collection_date_wise()){
			$data['collections'] = $res;
			$this->load->view('admin/report/collection_report_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*======== Customer wise Colletion Report ========*/
	public function customer_wise_collection()
	{
		$data['title'] = 'Customer Collection Report';  
		$data['content'] = 'report/cus_wise_collection';
		$data['customers'] = $this->Customer_model->find_all_customer_info();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======= find collection by customer ========*/
	public function find_collection_by_cus($cus_id=Null)
	{
		if($res = $this->Collection_model->collection_by_customer($cus_id)){
			$data['collections'] = $res;
			$this->load->view('admin/report/collection_report_tbl', $data);
		}else{
			echo 0;
		}
	}


	/*======= car Chassis Number wise Collection REport Page =======*/
	public function car_wise_collection_view()
	{
		$data['title'] = 'Car Wise Collection Report';  
		$data['content'] = 'report/car_wise_collection';
		$data['orders'] = $this->Order_model->get_order_chassis_number();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======= find colection order Wise ==========*/
	public function find_collection_order_wise($order_id=Null)
	{
		if($res = $this->Collection_model->order_wise_collection($order_id)){
			$data['collections'] = $res;
			$this->load->view('admin/report/collection_report_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*====== Customer Order Report Page =======*/
	public function view_customer_order_report()
	{
		$data['title'] = 'Customer Order Report';  
		$data['content'] = 'report/customer_order_report';
		$data['customers'] = $this->Customer_model->find_all_customer_info();
		$this->load->view('admin/adminMaster', $data);
	}

	/*====== Find Customer Order Details =========*/
	public function customer_wise_order_report($cus_id=Null)
	{
		if($res = $this->Order_model->order_report_by_customer($cus_id)){
			$data['orders'] = $res;
			$this->load->view('admin/report/order_table', $data);
		}else{
			echo 0;
		}
	}

	/*======= delivery order report page ========*/
	public function delivery_order_view()
	{
		$data['title'] = 'Customer Order Report';  
		$data['content'] = 'report/delivery_order_report';
		$this->load->view('admin/adminMaster', $data);
	}

	/*======== date wise delivery order ========*/
	public function date_wise_delivery_order()
	{
		if($res = $this->Order_model->order_report_date_wise()){
			$data['orders'] = $res;
			$this->load->view('admin/report/delivery_order_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*====== date to date Salary View ==========*/
	public function salary_date_to_date_report()
	{
		$data['title'] = 'Salary Report';
		$data['content'] = 'report/date_to_date_salary';
		$this->load->view('admin/adminMaster', $data);
	}

	/*======== find Salary in Date To date ==============*/
	public function find_salary_date_to_date()
	{
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');

		if($res = $this->Salary_model->salary_date_to_date($date_from, $date_to)){
			$data['salaries'] = $res;
			$this->load->view('admin/report/salary_report_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*======= employee wise salary report ========*/
	public function employee_wise_salary()
	{
		$data['title'] = 'Salary Report';
		$data['content'] = 'report/employee_salary';
		$data['employees'] = $this->Employee_model->find_all_employee_info();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======== find employee wise Salary =========*/
	public function find_employee_wise_salary($emp_id=Null)
	{
		if($res = $this->Salary_model->find_employee_salary($emp_id)){
			$data['salaries'] = $res;
			$this->load->view('admin/report/salary_report_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*====== Final report View ======*/
	public function car_full_report()
	{
		$data['title'] = 'Car Full Report';
		$data['content'] = 'report/full_report';
		$data['orders'] = $this->Order_model->get_active_order_info();
		$this->load->view('admin/adminMaster', $data);
	}

	/*======= Order Wise Report View ========*/
	public function find_full_deatils_report($order_id=Null)
	{
		if($order_info = $this->Order_model->order_info_by_id($order_id)){
			$data['customer'] = $this->Customer_model->customer_by_id($order_info->cus_id);
			$data['collections'] = $this->Collection_model->order_wise_collection($order_id);
			$data['payments'] = $this->Payment_model->order_wise_payment($order_id);
			$data['order'] = $order_info;
			$this->load->view('admin/report/report_view', $data);
		}else{
			echo 0;
		}
	}


	/*======= Date wise payment report page ==========*/
	public function payment_report_page()
	{
		$data['title'] = 'Date Wise Payment Report';
		$data['content'] = 'report/payment_report';
		$this->load->view('admin/adminMaster', $data);
	}

	public function find_date_to_date_payment()
	{
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');

		if($res = $this->Payment_model->payment_date_to_date($date_from, $date_to)){
			$data['payments'] = $res;
			$this->load->view('admin/report/payment_report_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*=========== supplier payment report page ===========*/
	public function supplier_payment_report_page()
	{
		$data['title'] = 'Supplier Payment Report';
		$data['content'] = 'report/supplier_payment_report';
		$data['suppliers'] = $this->Supplier_model->find_all_supplier_info();
		$this->load->view('admin/adminMaster', $data);
	}

	public function find_supplier_payment($sup_id = Null)
	{
		if($res = $this->Payment_model->supplier_payment_report($sup_id)){
			$data['payments'] = $res;
			$this->load->view('admin/report/payment_report_tbl', $data);
		}else{
			echo 0;
		}
	}

	/*=========== Office Payment Report Page ===========*/
	public function office_payment_report_page()
	{
		$data['title'] = 'Office Payment Report';
		$data['content'] = 'report/office_payment_report';
		$this->load->view('admin/adminMaster', $data);
	}

	public function find_office_payment()
	{
		$date_from = $this->input->post('date_from');
		$date_to = $this->input->post('date_to');

		if($res = $this->Payment_model->office_payment_date_to_date($date_from, $date_to)){
			$data['payments'] = $res;
			$this->load->view('admin/report/office_payment_report_tbl', $data);
		}else{
			echo 0;
		}
	}
}