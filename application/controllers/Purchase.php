<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase extends MY_Controller
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

	/*==========purchase Page show ==========*/
	public function index()
	{ 
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('purchase_list') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('purchase/dashboard');
			}
			$data['title'] = 'Purchase Information List';  
			$data['content'] = 'purchase/purchase_list';
			$data['purchases']	= $this->Purchase_model->get_purchase_info();
			$this->load->view('admin/adminMaster', $data);
		}	
	}



	/*==========purchase insert Page show ==========*/
	public function insert_purchase_info($order_id = NUll)
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			if($this->admin_access('purchase_entry') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('purchase/dashboard');
			}

			$data['title'] = 'New Purchase Information';  
			$data['content'] = 'purchase/create_purchase';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['lc_data'] = $this->LC_model->get_all_lc_info();
			$data['supplires'] = $this->Supplier_model->find_all_supplier_info();
			$data['heads'] = $this->IE_head_model->get_all_head_info('C');
			if(!is_null($order_id)){
				$data['order'] = $this->Order_model->order_info_by_id($order_id);
			}
			$data['pus_sl'] = $this->Purchase_model->purchase_sl_create();
            $data['purchases']	= $this->Purchase_model->get_purchase_info();
			$this->load->view('admin/adminMaster', $data);
		}	
	}

	/*========= Order Data Store =======*/
    /**
     *
     */
    public function store_purchase_info()
	{

		$this->form_validation->set_rules('supplier_id', 'Select Supplier', 'required|trim');

		if($this->form_validation->run() == FALSE){
            $data['title'] = 'New Purchase Information';
            $data['content'] = 'purchase/create_purchase';
            $data['customers'] = $this->Customer_model->find_all_customer_info();
            $data['lc_data'] = $this->LC_model->get_all_lc_info();
            $data['supplires'] = $this->Supplier_model->find_all_supplier_info();
            $data['heads'] = $this->IE_head_model->get_all_head_info('C');
            $order_id = $this->input->post('order_id');
            if(!is_null($order_id)){
                $data['order'] = $this->Order_model->order_info_by_id($order_id);
            }
            $data['pus_sl'] = $this->Purchase_model->purchase_sl_create();
			$this->load->view('admin/adminMaster', $data);
		}else{
			
			if($purchase_id = $this->Purchase_model->store_purchase_info()){
				if($this->input->post('order_id')){

					if($this->Order_model->order_purchase_info_update($purchase_id)){
						$data['success']=" Store Successfully!";
					}
				}

                $imagesCount = count($_FILES['images']['name']);
                $documentsCount = count($_FILES['documents']['name']);

                // print_r(); die();
                if($imagesCount >0 && $_FILES['images']['name'][0] != ''){
                    $this->Car_model->store_images($purchase_id);
                }

                if($documentsCount > 0 && $_FILES['documents']['name'][0] != ''){
                    $this->Car_model->store_documents($purchase_id);

                }

				$data['success']="Car Info Store Successfully!";
				$this->session->set_flashdata($data);
				redirect($this->input->post('redirect_url'));
			}else{

				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('purchase/insert');
			}
		}
	}

	/*========== Edit Purchase Details ============*/
	public function edit_purchase_info($id=Null)
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
			if($result = $this->Purchase_model->purchase_info_by_id($id)){

				$data['title'] = 'Edit Purchase Information';  
				$data['content'] = 'purchase/edit_purchase';
				$data['supplires'] = $this->Supplier_model->find_all_supplier_info();

				$data['supplier'] = $this->Supplier_model->supplier_by_id($result->supplier_id);
				$data['purchase'] = $result;
				$this->load->view('admin/adminMaster', $data);
			}else{
				$data['warning'] ='No data Found!';
			    $this->session->set_flashdata($data); 
			    redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	/*======== view Order Information =======*/
	public function view_purchase_info($id=Null)
	{
		if($res = $this->Purchase_model->purchase_info_by_id($id)){
			$data['title']	= 'View Purchase Car Details';
			$data['content'] = 'purchase/view_purchase';
			$data['supplier'] = $this->Supplier_model->supplier_by_id($res->supplier_id);
			$data['purchase'] = $res;

			$this->load->view('admin/adminMaster', $data);
		}else{
			$data['error']="No Data Find..!";
			$this->session->set_flashdata($data);
			redirect('purchase/list');
		}
	}
	/*========= Order Data Update =======*/
	public function update_purchase_info($id = Null)
	{	
		
		$this->form_validation->set_rules('supplier_id', 'Select Supplier', 'required|trim');

		if($this->form_validation->run() == FALSE){
            $result = $this->Purchase_model->purchase_info_by_id($id);
			$data['title'] = 'Edit Purchase Information';  
			$data['content'] = 'purchase/edit_purchase';
			$data['supplires'] = $this->Supplier_model->find_all_supplier_info();
			$data['supplier'] = $this->Supplier_model->supplier_by_id($result->supplier_id);
			$data['purchase'] = $result;
			$this->load->view('admin/adminMaster', $data);

		}else{
			
			if($this->Purchase_model->Update_purchase_info($id)){

                if($this->input->post('order_id')){

                    if($this->Order_model->order_purchase_info_update($id)){
                        $data['success']=" Store Successfully!";
                        $this->session->set_flashdata($data);
                       redirect($this->input->post('redirect_url'));
                    }
                    $data['success']=" Store Successfully!";
                    $this->session->set_flashdata($data);
                    redirect($this->input->post('redirect_url'));
                }
                $data['warning']="Car Info Store Successfully! But Order Info Not Updated.";
                $this->session->set_flashdata($data);
                redirect($this->input->post('redirect_url'));
			}else{

				$data['error']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect($this->input->post('redirect_url'));
			}
		}
	}

	/*======== Delete Order Info Data ========*/
	public function delete_purchase_info($id=Null)
	{	if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}
		if($result = $this->Purchase_model->delete_purchase_info($id)){

			$this->Order_model->remove_purchase_info($id);

			$data['success']="Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('purchase/list');
		}else{

			$data['error']="Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('purchase/list');
		}
	}

	/*========== Find Car Info ========*/
	public function find_car_info($pus_id=Null)
	{
		if($res = $this->Purchase_model->purchase_info_by_id($pus_id)){
			
			echo json_encode($res);
		}else{
			echo 0;
		}
	}
	

	/*========== find purchase car ful deatils ================*/
	public function find_purchase_car_info($pus_id=Null)
	{
		if($res= $this->Purchase_model->purchase_car_full_deatils($pus_id)){
			echo json_encode($res);
		}else{
			echo 0;
		}
	}

}