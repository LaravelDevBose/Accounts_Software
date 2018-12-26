<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/26/2018
 * Time: 11:27 AM
 */

class AccountHeader extends MY_Controller
{
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

    public function account_head_page(){

        $data['title'] = 'Account Head info';
        $data['content'] = 'account_head/account_head_page';
        $data['head_id'] = $this->AccountHead_model->account_head_code();
        $data['heads'] = $this->AccountHead_model->all_account_head_list();
        $this->load->view('admin/adminMaster', $data);
    }

    public function account_head_store(){

        if($this->AccountHead_model->account_head_insert()){
            $data['heads'] = $this->AccountHead_model->all_account_head_list();
            $this->load->view('admin/account_head/account_head_tbl', $data);
        }else{
            echo '0';
        }
    }

}