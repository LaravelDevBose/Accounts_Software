<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends MY_Controller
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

	/*==========Insert Customer Info==========*/
	public function insert_supplier()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{

			if($this->admin_access('supplier') != 1){
				$data['warning_msg']="You Are Not able to Access this Module...!";
				$this->session->set_flashdata($data);
				redirect('hr_payroll/dashboard');
			}

			$data['title'] = 'Supplier Information';  
			$data['content'] = 'supplier/supplier_page';


			$cus_id = $this->db->order_by('id', 'desc')->limit(1)->get('suppliers')->row();
			if(is_null($cus_id)|| !isset($cus_id)){
				$cus_code = 'S00001';
			}else{

				$num = substr($cus_id->sup_code, 1, strlen($cus_id->sup_code));

				// var_dump($num); die();
				if($num < 9):
					$num+=1;
					$cus_code = 'S0000'.$num;
				elseif($num < 99):
					$num+=1;
					$cus_code = 'S000'.$num;
				elseif($num < 999):
					$num+=1;
					$cus_code = 'S00'.$num;
				elseif($num<9999):
					$num+=1;
					$cus_code = 'S0'.$num;
				else:
					$num+=1;
					$cus_code = 'S'.$num;
				endif;
			}
			
			$data['sup_code'] = $cus_code;
			$data['suppliers'] = $this->Supplier_model->find_all_supplier_info();
			$this->load->view('admin/adminMaster', $data);
		}	
	}



	/*=======================*/
	public function store_supplier_info()
	{
		$this->form_validation->set_rules('sup_code', 'Supplier Code ', 'required|trim');
		$this->form_validation->set_rules('sup_name', 'Supplier Name ', 'required|trim');
		$this->form_validation->set_rules('sup_phone', 'Contact Number ', 'required|trim');
		$this->form_validation->set_rules('sup_ent_date', 'Entry Date', 'required|trim');


		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Supplier Information';  
			$data['content'] = 'supplier/supplier_page';  
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Supplier_model->store_supplier_info()){
				$data['success']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('supplier/insert');

			}else{
				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('supplier/insert');
			}
		}
	}


	/*========  Edit Customer info page=============*/

	public function edit_supplier_info($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('hr_payroll/dashboard');
		}
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Edit Supplier Information';  
			$data['content'] = 'supplier/edit_supplier';
			$data['supplier'] = $this->Supplier_model->supplier_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}
	}

	/*========== Update Customer Info ============*/
	public function update_supplier_info($id=Null)
	{
		$this->form_validation->set_rules('sup_code', 'Supplier Code ', 'required|trim');
		$this->form_validation->set_rules('sup_name', 'Supplier Name ', 'required|trim');
		$this->form_validation->set_rules('sup_phone', 'Contact Number ', 'required|trim');
		$this->form_validation->set_rules('sup_ent_date', 'Entry Date', 'required|trim');
		


		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Edit Supplier Information';  
			$data['content'] = 'supplier/edit_supplier';
			$data['supplier'] = $this->Supplier_model->supplier_by_id($id);
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Supplier_model->update_supplier_info($id)){
				
				$data['success']="Supplier info Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('supplier/insert');

			}else{
				$data['error']="Supplier  info Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('supplier/insert');
			}
		}
	}

	/*========== Delete Customer Info ===========*/
	public function delete_supplier_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('hr_payroll/dashboard');
		}
		if($this->Supplier_model->delete_supplier_info($id)){
			$data['success']="Supplier info Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('supplier/insert');
		}else{
			$data['error']="Supplier info Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('supplier/insert');
		}
	}


	/*========== find Supplier Information ==========*/
	public function find_supplier_info($sup_id=Null)
	{
		if($data = $this->Supplier_model->supplier_by_id($sup_id)){
			echo json_encode($data);
		}else{
			echo 0;
		}
	}

}
