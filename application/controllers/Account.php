<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller
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

	/********** Other Income Method List ****************/
	/********** Other Income Method List ****************/
	/********** Other Income Method List ****************/

	public function other_income_page()
	{	
		if($this->admin_access('other_income') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		$data['title'] = 'Other Income Entry';
		$data['content'] = 'accounts/other_income_entry';
		$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
		$data['incomes'] = $this->Account_model->get_all_income_data();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Other Income Data =======*/
	public function other_income_store()
	{	
		// print_r($this->input->post()); die();

		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Other Income Entry';
			$data['content'] = 'accounts/other_income_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['incomes'] = $this->Account_model->get_all_income_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->store_account_data()){
		 		$data['incomes'] = $this->Account_model->get_all_income_data();
		 		$this->load->view('admin/accounts/other_income_tbl', $data);
		 	}else{
		 		echo 0;
		 	}
		}
	}


	/*======= Edit Other Income page =======*/
	public function other_income_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		if($result = $this->Account_model->get_data_by_id($id)){
			$data['entry'] = $result;
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$this->load->view('admin/accounts/edit_other_income', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('account/other_income');
		}
	}

	/*====== Update Other Income Date =========*/
	public function other_income_update($id=Null)
	{
		$this->form_validation->set_rules('ie_head', 'IE Head ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Other Income Entry';
			$data['content'] = 'accounts/other_income_entry';
			$data['ie_heads'] = $this->IE_head_model->get_all_ie_head_info();
			$data['incomes'] = $this->Account_model->get_all_income_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Account_model->update_account_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('account/other_income');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('account/other_income');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function delete_other_income($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		if($this->Account_model->delete_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('account/other_income');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('account/payment');
		}
	}


	/*============= Balance Sheet ==============*/
    public function balance_sheet(){
        if($this->admin_access('delete_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('account/dashboard');
        }

        $data['title'] = 'Balance Sheet';
        $data['content'] = 'accounts/balance_sheet';

        #collection entry
        $data['total_coll'] = $this->total_collection_count();

        #total Payment Count
        $data['total_pymt'] = $this->total_payment_count();

        $this->load->view('admin/adminMaster', $data);

    }

    /**
     * @return mixed
     */
    private function total_collection_count(){

        $coll = $this->Collection_model->total_collection();

        #other Entry
        $other_inm = $this->Account_model->total_other_income();
        #order advance
        $advance = $this->Order_model->total_advance();
        #total_collection
        return $coll->amount + $other_inm->amount + $advance->ord_advance;
    }

    private function total_payment_count(){

        //payment entry & Office Payment
        $payment = $this->Payment_model->total_payment();

        //Employee Salary
        $sallary = $this->Salary_model->total_sallary();

        return $payment->amount + $sallary->amount;
    }
}