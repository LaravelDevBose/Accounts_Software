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

    public function voucher_entry_page(){
        $data['title'] = 'Voucher Entry';
        $data['content'] = 'titu/voucher_page';
        $this->load->view('admin/adminMaster', $data);
    }
}