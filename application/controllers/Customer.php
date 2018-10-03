<?php 
class Customer extends CI_Controller
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
			$data['title'] = 'Customer & Order Information';  
			$data['content'] = 'customer_info/create_customer';   
			$this->load->view('admin/adminMaster', $data);
		}	
	}



	/*=======================*/
	public function insert_customer_info()
	{
		$this->form_validation->set_rules('details', 'About Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{  
			$data['content'] = 'customer_info/create_customer';   
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->About_model->insert_about()){
				$data['success']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('CustomerEntry');
			}else{
				$data['errorMsg']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('CustomerEntry');
			}
		}
	}



	/*=======================*/
	public function update_about_data_check($id = null)
	{
		$this->form_validation->set_rules('details', 'About Us ', 'required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'customer_info/create_customer';   
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->About_model->edit_about_data_update($id)) :
					$data['message']="Update Successfully!";
					$this->session->set_flashdata($data);
					redirect('CustomerEntry');
			else:
				$data['message2']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('CustomerEntry');
			endif;	
		}
	}







}
