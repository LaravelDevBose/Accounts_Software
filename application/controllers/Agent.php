<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Agent extends MY_Controller
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

	/*============ show Agent Page ==============*/
	public function agent_page_view()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{

			// if($this->admin_access('agent') != 1){
			// 	$data['warning_msg']="You Are Not able to Access this Module...!";
			// 	$this->session->set_flashdata($data);
			// 	redirect('administration/dashboard');
			// }

			$data['title'] = 'Agent Information';  
			$data['content'] = 'agent/agent_page';


			$cus_id = $this->db->order_by('id', 'desc')->limit(1)->get('agents')->row();
			if(is_null($cus_id)|| !isset($cus_id)){
				$agent_code = 'A00001';
			}else{

				$num = substr($cus_id->agent_code, 1, strlen($cus_id->agent_code));

				// var_dump($num); die();
				if($num < 9):
					$num+=1;
					$agent_code = 'A0000'.$num;
				elseif($num < 99):
					$num+=1;
					$agent_code = 'A000'.$num;
				elseif($num < 999):
					$num+=1;
					$agent_code = 'A00'.$num;
				elseif($num<9999):
					$num+=1;
					$agent_code = 'A0'.$num;
				else:
					$num+=1;
					$agent_code = 'A'.$num;
				endif;
			}
			
			$data['agent_code'] = $agent_code;
			$data['agents'] = $this->Agent_model->find_all_agent_info();
			$this->load->view('admin/adminMaster', $data);
		}
	}


	/*=======================*/
	public function store_agent_info()
	{
		$this->form_validation->set_rules('agent_code', 'Agent Code ', 'required|trim');
		$this->form_validation->set_rules('agent_name', 'Agent Name ', 'required|trim');
		$this->form_validation->set_rules('agent_phone', 'Contact Number ', 'required|trim');


		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Agent Information';  
			$data['content'] = 'agent/agent_page';
			$data['agents'] = $this->Agent_model->find_all_agent_info();  
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Agent_model->store_agent_info()){
				$data['success']="Save Successfully!";
				$this->session->set_flashdata($data);
				redirect('agent/insert');

			}else{
				$data['error']="Save Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('agent/insert');
			}
		}
	}


	/*========  Edit Customer info page=============*/

	public function edit_agent_info($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			$data['title'] = 'Edit Agent Information';  
			$data['content'] = 'agent/edit_agent';
			$data['agent'] = $this->Agent_model->agent_by_id($id);
			$this->load->view('admin/agent/agent_edit', $data);
		}
	}

	/*========== Update Customer Info ============*/
	public function update_agent_info($id=Null)
	{
		$this->form_validation->set_rules('agent_code', 'Agent Code ', 'required|trim');
		$this->form_validation->set_rules('agent_name', 'Agent Name ', 'required|trim');
		$this->form_validation->set_rules('agent_phone', 'Contact Number ', 'required|trim');
		
		if($this->form_validation->run() == FALSE)
		{  
			$data['title'] = 'Agent Information';  
			$data['content'] = 'agent/agent_page';
			$data['agents'] = $this->Agent_model->find_all_agent_info();  
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if($this->Agent_model->update_agent_info($id)){
				
				$data['success']="Update Successfully!";
				$this->session->set_flashdata($data);
				redirect('agent/insert');

			}else{
				$data['error']="Update Unsuccessfully!";
				$this->session->set_flashdata($data);
				redirect('agent/insert');
			}
		}
	}

	/*========== Delete Customer Info ===========*/
	public function delete_agent_info($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}
		if($this->Agent_model->delete_agent_info($id)){
			$data['success']="Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('agent/insert');
		}else{
			$data['error']="Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('agent/insert');
		}
	}
}