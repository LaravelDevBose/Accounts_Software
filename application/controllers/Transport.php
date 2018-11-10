<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transport extends MY_Controller
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

	/*======= Transtion Process Page========*/
	public function transport_car_status_view()
	{	

		if($this->admin_access('transport_status') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}
		$data['title'] = 'Car Transport Location';
		$data['content'] = 'transport/transport_car_list';
		$data['purchases']	= $this->Purchase_model->undelivery_purchase_car();
		$this->load->view('admin/adminMaster', $data);
	}

	public function transport_car_status_change_page($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}

		$data['trans_heads'] = $this->Transport_head_model->transport_head_list();
		$data['id'] = $id;
		$this->load->view('admin/transport/trans_status_change_page', $data);
	}

	public function transport_car_status_update()
	{
		if($trans_id = $this->Transport_model->car_transport_location_change()){

			$pus_id = $this->input->post('purchase_id');
			
			if($this->Purchase_model->car_transport_change($pus_id, $trans_id)){
				$data['success']="Car Transport Status Change Successfuly";
				$this->session->set_flashdata($data);
				redirect('transport/status');
			}
			$data['warning']="Car Tranport Location Stor But Not Update Successfuly!";
			$this->session->set_flashdata($data);
			redirect('transport/status');
		}
	}


	/************************************************/
	/************************************************/
	/************************************************/
	/************************************************/
	/************** Transport Head Mothod ***********/

	public function transport_head_view()
	{	
		if($this->admin_access('transport_head') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}

		$data['title'] = 'Transport Head';
		$data['content'] = 'transport/trans_head_view';
		$data['heads'] = $this->Transport_head_model->transport_head_list();
		$this->load->view('admin/adminMaster', $data);
	}

	public function transport_head_store()
	{
		if($this->Transport_head_model->store_head_info()){

			$data['heads'] = $this->Transport_head_model->transport_head_list();
			$this->load->view('admin/transport/trans_head_list', $data);
		}
		echo 0;
	}

	public function transport_head_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}

		if($res = $this->Transport_head_model->get_data_by_id($id)){
			$data['head']= $res;
			$this->load->view('admin/transport/edit_head_page',$data);
		}
		else{
			$data['warning']="NO Data Found";
			$this->session->set_flashdata($data);
			redirect('transport/head');
		}
	}

	public function transport_head_update($id=Null)
	{
		if($this->Transport_head_model->update_header_data($id)){
			$data['success']="Update Successfuly";
			$this->session->set_flashdata($data);
			redirect('transport/head');
		}else{
			$data['warning']="Update UnsuccessFull";
			$this->session->set_flashdata($data);
			redirect('transport/head');
		}
	}

	public function transport_head_delete($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('purchase/dashboard');
		}
		
		if($this->Transport_head_model->delete_header_data($id)){
			$data['success']="Delete Successfuly";
			$this->session->set_flashdata($data);
			redirect('transport/head');
		}else{
			$data['warning']="Delete UnsuccessFull";
			$this->session->set_flashdata($data);
			redirect('transport/head');
		}
	}
}