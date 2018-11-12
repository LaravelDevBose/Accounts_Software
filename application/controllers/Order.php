<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller
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
			if($this->admin_access('all_order_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}
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
			if($this->admin_access('pending_order_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}
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
			if($this->admin_access('process_order_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}
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
			if($this->admin_access('order_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}


			$order_no = $this->order_no_create();

			$data['title'] = 'Order Information';  
			$data['content'] = 'order_info/create_order';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$data['cars'] = $this->Purchase_model->unOrder_car_list();
			$data['order_no'] = $order_no;

			$this->load->view('admin/adminMaster', $data);
		}	
	}

	private function order_no_create(){
        $last_order = $this->db->order_by('id', 'desc')->limit(1)->get('orders')->row();
        if(is_null($last_order)|| !isset($last_order)){
            $order_no = 'M-00001';
        }else{

            $num = substr($last_order->order_no, 2, strlen($last_order->order_no));

            if($num < 9):
                $num+=1;
                $order_no = 'M-0000'.$num;
            elseif($num < 99):
                $num+=1;
                $order_no = 'M-000'.$num;
            elseif($num < 999):
                $num+=1;
                $order_no = 'M-00'.$num;
            elseif($num<9999):
                $num+=1;
                $order_no = 'M-0'.$num;
            else:
                $num+=1;
                $order_no = 'M-'.$num;
            endif;
        }

        return $order_no;
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
				$this->Purchase_model->update_order_info_in_purchase($pus_id,$order_id,$cus_id,0);
					
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
			if($this->admin_access('edit_access') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}
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
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('order/dashboard');
		}
		
		if($result = $this->Order_model->delete_order_info($id)){

			$this->Purchase_model->order_id_remove($id);

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

	/*========== Ready Car sale page =========== */
	public function ready_car_sale_page()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('ready_car_sale') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('order/dashboard');
			}
			$data['title'] = 'Ready Car Sale';  
			$data['content'] = 'order_info/ready_car_sale';
            $data['customers'] = $this->Customer_model->unperchase_order_customer();
            $data['purchases'] = $this->Purchase_model->unsales_purchase_car_list();

			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*=========== marge order and sale info =========*/
    public function order_purchase_car_marge(){

        $res1 = $this->Order_model->order_purchase_info_update($this->input->post('pus_id'));
        if(!$res1){
            $data['error']="Purchase Information not Updated....!";
            $this->session->set_flashdata($data);
            redirect('ready/car/sale');
        }
        $pus_id = $this->input->post('pus_id');
        $order_id = $this->input->post('order_id');
        $cus_id = $this->input->post('cus_id');

        $res2 = $this->Purchase_model->update_order_info_in_purchase($pus_id, $order_id,$cus_id,0);

        if(!$res2){
            $data['error']="Order Information not Updated....!";
            $this->session->set_flashdata($data);
            redirect('ready/car/sale');
        }

        $lc_id = $this->input->post('puc_lc_id');

        if(isset($lc_id) && $lc_id){
            $res3 = $this->LC_model->update_lc_details_by_id($lc_id, $pus_id,$cus_id, $order_id);
            if(!$res3){
                $data['error']="L/C Information not Updated....!";
                $this->session->set_flashdata($data);
                redirect('ready/car/sale');
            }
        }

        $data['success']="SuccessFully Marge";
        $this->session->set_flashdata($data);
        redirect('ready/car/sale');

    }

	/*========== find un-purchase order list ==========*/
    public function find_unperchase_order($cus_id = Null){

        if($res = $this->Order_model->find_unperchase_order($cus_id)){
            echo json_encode($res);
        }else{
            echo 0;
        }
    }

    /*========= find order details ==========*/
    public function find_order_details($order_id = Null){
        if($res = $this->Order_model->order_info_by_id($order_id)){
            echo json_encode($res);
        }else{
            echo 0;
        }
    }

    /*========= find order details ==========*/
    public function find_purchase_details($pus_id = Null){
        if($res = $this->Purchase_model->purchase_info_by_id($pus_id)){
            echo json_encode($res);
        }else{
            echo 0;
        }
    }


}