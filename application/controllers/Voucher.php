<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/26/2018
 * Time: 10:49 AM
 */

class Voucher extends  MY_Controller
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

    public function voucher_list_page(){

        $data['title'] = 'Voucher List';
        $data['content'] = 'voucher/voucher_list';
        $data['vouchers'] = $this->Voucher_model->all_voucher_list();
        $this->load->view('admin/adminMaster', $data);
    }

    public function voucher_pending_list(){

        $data['title'] = 'Voucher Pending List';
        $data['content'] = 'voucher/voucher_pending_list';
        $data['vouchers'] = $this->Voucher_model->all_pending_voucher_list();
        $this->load->view('admin/adminMaster', $data);
    }

    public function voucher_entry_page(){
        $data['title'] = 'Voucher Entry';
        $data['content'] = 'voucher/voucher_entry';
        $data['voucher_id'] = $this->Voucher_model->vouchar_code();
        $data['heads'] = $this->AccountHead_model->all_account_head_list();
        $this->load->view('admin/adminMaster', $data);
    }

    public function voucher_store(){

        if($this->Voucher_model->store_voucher_data()){
            echo '1';
        }else{
            echo '0';
        }
    }

    public function voucher_store_print(){

        if($id = $this->Voucher_model->store_voucher_data()){

            $data['voucher'] = $this->Voucher_model->get_voucher_data_by_id($id);

            $this->load->view('admin/voucher/print_voucher', $data);
        }else{
            echo 0;
        }
    }
}