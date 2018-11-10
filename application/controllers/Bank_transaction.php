<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_transaction extends MY_Controller
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

	/*======== bank Trans Entry View Page ========*/
	public function bank_trans_page()
	{	
		if($this->admin_access('collection') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

        $trans_info = $this->db->order_by('id', 'desc')->limit(1)->get('bank_trans')->row();
        if(is_null($trans_info)|| !isset($trans_info)){
            $trans_id = 'BT-00001';
        }else{

            $num = substr($trans_info->trans_id, 3, strlen($trans_info->trans_id));

            if($num < 9):
                $num+=1;
                $trans_id = 'BT-0000'.$num;
            elseif($num < 99):
                $num+=1;
                $trans_id = 'BT-000'.$num;
            elseif($num < 999):
                $num+=1;
                $trans_id = 'BT-00'.$num;
            elseif($num<9999):
                $num+=1;
                $trans_id = 'BT-0'.$num;
            else:
                $num+=1;
                $trans_id = 'BT-'.$num;
            endif;
        }

        $data['trans_id'] = $trans_id;
		$data['title'] = 'Bank Transaction Entry';
		$data['content'] = 'accounts/bank_trans_entry';
		$data['banks'] = $this->Bank_model->bank_list();
		$data['trans'] = $this->BankTransaction_model->bank_trans_list();
		$this->load->view('admin/adminMaster', $data);
	}

	/*===== Store Collection Entry Data =======*/
	public function bank_trans_store()
	{

		$this->form_validation->set_rules('trans_id', 'Transaction Id ', 'required|trim');
		$this->form_validation->set_rules('bank_id', 'Bnak Name', 'required|trim');
		$this->form_validation->set_rules('trans_type', 'L/C Number ', 'required|trim');
		$this->form_validation->set_rules('trans_date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');

		if($this->form_validation->run() == FALSE){
            $trans_info = $this->db->order_by('id', 'desc')->limit(1)->get('bank_trans')->row();
            if(is_null($trans_info)|| !isset($trans_info)){
                $trans_id = 'BT-00001';
            }else{

                $num = substr($trans_info->trans_id, 3, strlen($trans_info->trans_id));

                if($num < 9):
                    $num+=1;
                    $trans_id = 'BT-0000'.$num;
                elseif($num < 99):
                    $num+=1;
                    $trans_id = 'BT-000'.$num;
                elseif($num < 999):
                    $num+=1;
                    $trans_id = 'BT-00'.$num;
                elseif($num<9999):
                    $num+=1;
                    $trans_id = 'BT-0'.$num;
                else:
                    $num+=1;
                    $trans_id = 'BT-'.$num;
                endif;
            }
            $data['trans_id'] = $trans_id;
            $data['title'] = 'Bank Transaction Entry';
            $data['content'] = 'accounts/bank_trans_entry';
            $data['banks'] = $this->Bank_model->bank_list();
            $data['trans'] = $this->BankTransaction_model->bank_trans_list();
            $this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->BankTransaction_model->store_bank_trans_data()){
                $data['success']="Store SuccessFully";
                $this->session->set_flashdata($data);
                redirect('bank_trans/page');
		 	}else{
                $data['error']="Store SuccessFully";
                $this->session->set_flashdata($data);
                redirect('bank_trans/page');
		 	}
		}
	}


	/*======= Edit Collection page =======*/
	public function bank_trans_edit($id=Null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}

		if($result = $this->BankTransaction_model->get_bank_trans_by_id($id)){
			$data['trans'] = $result;
            $data['banks'] = $this->Bank_model->bank_list();
			$this->load->view('admin/accounts/edit_bank_trans', $data);
		}else{
			$data['error']="No Data Found...!";
			$this->session->set_flashdata($data);
			redirect('collections');
		}
	}

	/*====== Update Collection Date =========*/
	public function bank_trans_update($id=Null)
	{
		$this->form_validation->set_rules('cus_id', 'Customer ', 'required|trim');
		$this->form_validation->set_rules('order_no', 'Chassis Number ', 'required|trim');
		$this->form_validation->set_rules('lc_no', 'L/C Number ', 'required|trim');
		$this->form_validation->set_rules('date', 'Date', 'required|trim');
		$this->form_validation->set_rules('amount', 'Amount', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'trim');

		if($this->form_validation->run() == FALSE){
		 	$data['title'] = 'Collection Entry';
			$data['content'] = 'accounts/collection_entry';
			$data['customers'] = $this->Customer_model->find_all_customer_info();
			$data['collections'] = $this->Collection_model->get_all_collection_data();
			$this->load->view('admin/adminMaster', $data);
		}else{

		 	if($this->Collection_model->update_collection_data($id)){
		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('collections');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('collections');
		 	}
		}
	}

	/*======== delete _data=====*/
	public function bank_trans_delete($id=Null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('account/dashboard');
		}
		
		if($this->Collection_model->delete_collection_data($id)){
			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('collections');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('account/collection');
		}
	}

}