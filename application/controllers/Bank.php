<?php

/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends MY_Controller
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

    /*=========== Bank Entry Page ========== */
    public function bank_create_page(){

        if($this->admin_access('other_income') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('account/dashboard');
        }

        $data['title'] = 'Bank Page';
        $data['content'] = 'bank/bank_insert_page';
        $data['banks'] = $this->Bank_model->bank_list();
        $this->load->view('admin/adminMaster', $data);
    }

    /*========== Bank Info store =============*/
    public function store_bank_info(){



        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
        $this->form_validation->set_rules('account_no', 'Account No', 'required|trim');
        $this->form_validation->set_rules('opening_date', 'Opening Date', 'required|trim');
        $this->form_validation->set_rules('current_balance', 'Current Balance', 'required|trim');

        if($this->form_validation->run() == FALSE)
        {

            $data['title'] = 'Bank Page';
            $data['content'] = 'bank/bank_insert_page';
            $data['banks'] = $this->Bank_model->bank_list();
            $this->load->view('admin/adminMaster', $data);
        }
        else{
            $bank_name = $this->input->post('bank_name');
            $branch_name = $this->input->post('branch_name');
            $account_no = $this->input->post('account_no');
            $check = $this->db->where('bank_name', $bank_name)->where('branch_name',$branch_name)->where('account_no', $account_no)->where('status', 'a')->get('banks')->row();

//            echo '<pre>'; print_r($check); die();

            if($check){
                $data['error']="This Bank Information Already Inserted";
                $this->session->set_flashdata($data);
                redirect('bank/insert');
            }

            if($this->Bank_model->storeBankData()){
                $data['success']="Update SuccessFully";
                $this->session->set_flashdata($data);
                redirect('bank/insert');
            }else{
                $data['error']="Update UnSuccessfull";
                $this->session->set_flashdata($data);
                redirect('bank/insert');
            }
        }
    }

    /*========== Bank Info Edit Page =======*/
    public function bank_info_edit($id= Null){

        if($this->admin_access('edit_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('account/dashboard');
        }

        if($res = $this->Bank_model->bank_info_by_id($id)){

            $data['bank'] = $res;
            $this->load->view('admin/bank/bank_edit', $data);
        }else{
            $data['error']="No Data Found";
            $this->session->set_flashdata($data);
            redirect('bank/insert');
        }
    }

    public function find_bank_current_balance($bank_id = Null){
        if($res = $this->Bank_model->bank_info_by_id($bank_id)){

           echo json_encode($res->current_balance);
        }else{
            echo 0;
        }
    }
    /*========== Bank Info Update =============*/
    public function update_bank_info($id = NUll){
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|trim');
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'required|trim');
        $this->form_validation->set_rules('account_no', 'Account No', 'required|trim');
        $this->form_validation->set_rules('opening_date', 'Opening Date', 'required|trim');
        $this->form_validation->set_rules('current_balance', 'Current Balance', 'required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Bank Page';
            $data['content'] = 'bank/bank_insert_page';
            $data['banks'] = $this->Bank_model->bank_list();
            $this->load->view('admin/adminMaster', $data);
        }
        else{
            if($this->Bank_model->updateBankData($id)){
                $data['success']="Update SuccessFully";
                $this->session->set_flashdata($data);
                redirect('bank/insert');
            }else{
                $data['error']="Update UnSuccessfull";
                $this->session->set_flashdata($data);
                redirect('bank/insert');
            }
        }
    }

    /*========== Bank Info Delete =======*/
    public function bank_info_delete($id= Null){

        if($this->admin_access('delete_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('account/dashboard');
        }

        if($res = $this->Bank_model->bank_info_delete($id)){

            $data['success']="Delete SuccessFully";
            $this->session->set_flashdata($data);
            redirect('bank/insert');
        }else{
            $data['error']="No Data Found";
            $this->session->set_flashdata($data);
            redirect('bank/insert');
        }
    }
}