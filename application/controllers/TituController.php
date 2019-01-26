<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/25/2018
 * Time: 4:30 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TituController extends MY_Controller
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

    public function trial_balance_page(){
        $data['title'] = 'Trial Balance';
        $data['content'] = 'accounts/trial_balance_page';
        $this->load->view('admin/adminMaster', $data);
    }

    public function trial_balance_report(){
//        print_r($this->input->post('date_from')); die();
        $data['date_from'] = '2018-01-01';
        $data['date_to'] = date('Y-m-d');

        $this->session->set_userdata($data);

        $data['account_heads'] = $this->AccountHead_model->all_account_head_list();
        $this->load->view('admin/accounts/trial_balance_tbl', $data);

    }

    public function ledger_page(){
        $data['title'] = 'ledger Page';
        $data['content'] = 'accounts/ledger_page';
        $data['account_heads'] = $this->AccountHead_model->all_account_head_list();
        $this->load->view('admin/adminMaster', $data);
    }

    public function ledger_search_result()
    {   
        $data['head'] = $this->AccountHead_model->data_by_id($this->input->post('ah_id'));
        $data['ledgers'] = $ledgers = $this->Voucher_model->account_wise_voucher();
        // print_r($ledgers); die();
;        $this->load->view('admin/accounts/ledger_list', $data);
    }
}