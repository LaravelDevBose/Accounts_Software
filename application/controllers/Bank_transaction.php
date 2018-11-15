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
		if($this->admin_access('bank_trans') != 1){
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

		 	    $this->bank_trans_store_bank_current_balance_update();

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

	private function bank_trans_store_bank_current_balance_update(){
	    $bank_id = $this->input->post('bank_id');
        $trans_type = $this->input->post('trans_type');
        $amount = $this->input->post('amount');

        $bank = $this->Bank_model->bank_info_by_id($bank_id);

        if($trans_type == 'D'){
            $update_balance = $bank->current_balance + $amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $bank->id);
            $this->db->update('banks', $attr);

        }else{
            $update_balance = $bank->current_balance - $amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $bank->id);
            $this->db->update('banks', $attr);
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
			redirect('bank_trans/page');
		}
	}

	/*====== Update Collection Date =========*/
	public function bank_trans_update($id=Null)
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
            $result = $this->BankTransaction_model->get_bank_trans_by_id($id);

		 	if($this->BankTransaction_model->update_bank_trans_data($id)){

		 	    $this->bank_trans_update_bank_current_balance_update($result);

		 		$data['success']="Update SuccessFully";
				$this->session->set_flashdata($data);
				redirect('bank_trans/page');
		 	}else{	
		 		$data['error']="Update UnSuccessfull";
				$this->session->set_flashdata($data);
				redirect('bank_trans/page');
		 	}
		}
	}

    private function bank_trans_update_bank_current_balance_update($result){
        $bank_id = $this->input->post('bank_id');
        $trans_type = $this->input->post('trans_type');
        $amount = $this->input->post('amount');

        $old_bank = $this->Bank_model->bank_info_by_id($bank_id);


        if($result->trans_type == 'D'){
            $update_balance = $old_bank->current_balance - $result->amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $bank_id);
            $this->db->update('banks', $attr);

        }else{
            $update_balance = $old_bank->current_balance + $result->amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $bank_id);
            $this->db->update('banks', $attr);
        }

        $bank = $this->Bank_model->bank_info_by_id($bank_id);

        if($trans_type == 'D'){
            $update_balance = $bank->current_balance + $amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $bank->id);
            $this->db->update('banks', $attr);

        }else{
            $update_balance = $bank->current_balance - $amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $bank->id);
            $this->db->update('banks', $attr);
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
		
		if($this->BankTransaction_model->delete_trans_type_data($id)){

		    $this->bank_trans_delete_bank_current_balance_update($id);

			$data['success']="Delete SuccessFully";
			$this->session->set_flashdata($data);
			redirect('bank_trans/page');
		}else{
			$data['error']="Delete UnSuccessfull";
			$this->session->set_flashdata($data);
			redirect('bank_trans/page');
		}
	}


    private function bank_trans_delete_bank_current_balance_update($id){
        $result = $this->BankTransaction_model->get_bank_trans_by_id($id);

        $old_bank = $this->Bank_model->bank_info_by_id($result->bank_id);


        if($result->trans_type == 'D'){
            $update_balance = $old_bank->current_balance - $result->amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $result->bank_id);
            $this->db->update('banks', $attr);

        }else{
            $update_balance = $old_bank->current_balance + $result->amount;
            $attr = array( 'current_balance' =>$update_balance );
            $this->db->where('id', $result->bank_id);
            $this->db->update('banks', $attr);
        }
    }


}