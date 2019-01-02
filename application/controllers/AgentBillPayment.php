<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 1/2/2019
 * Time: 10:51 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AgentBillPayment extends MY_Controller
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

    /*======== C&F Agent bill Entry ==========*/
    public function agent_bill_entry_page(){

        $data['title'] = 'C&F Agent Bill Entry';
        $data['content'] = 'agent/agent_bill';
        $data['bill_code'] = $this->agent_bill_id_generate();
        $data['agents'] = $this->Agent_model->find_all_agent_info();
        $data['bills'] = $this->AgentBillPayment_model->get_agent_all_bill_info();

        $this->load->view('admin/adminMaster', $data);
    }

    private function agent_bill_id_generate(){
        $payment_info = $this->db->where('entry_type', 'Bill')->order_by('bill_id', 'desc')->limit(1)->get('agent_bill_payments')->row();
        if(is_null($payment_info)|| !isset($payment_info)){
            $pay_code = 'AB00001';
        }else{

            $num = substr($payment_info->entry_code, 2, strlen($payment_info->entry_code));

            if($num < 9):
                $num+=1;
                $pay_code = 'AB0000'.$num;
            elseif($num < 99):
                $num+=1;
                $pay_code = 'AB000'.$num;
            elseif($num < 999):
                $num+=1;
                $pay_code = 'AB00'.$num;
            elseif($num<9999):
                $num+=1;
                $pay_code = 'AB0'.$num;
            else:
                $num+=1;
                $pay_code = 'AB'.$num;
            endif;
        }
        return $pay_code;
    }

    /*======== C&F Agent bill Entry ==========*/
    public function agent_payment_entry_page(){

        $data['title'] = 'C&F Agent Payment Entry';
        $data['content'] = 'agent/agent_payment';
        $data['payment_id'] = $this->agent_payment_id_generate();
        $data['agents'] = $this->Agent_model->find_all_agent_info();
        $data['bills'] = $this->AgentBillPayment_model->get_agent_all_payment_info();

        $this->load->view('admin/adminMaster', $data);
    }

    private function agent_payment_id_generate(){
        $payment_info = $this->db->where('entry_type', 'Pay')->order_by('bill_id', 'desc')->limit(1)->get('agent_bill_payments')->row();
        if(is_null($payment_info)|| !isset($payment_info)){
            $pay_code = 'AP00001';
        }else{

            $num = substr($payment_info->entry_code, 2, strlen($payment_info->entry_code));

            if($num < 9):
                $num+=1;
                $pay_code = 'AP0000'.$num;
            elseif($num < 99):
                $num+=1;
                $pay_code = 'AP000'.$num;
            elseif($num < 999):
                $num+=1;
                $pay_code = 'AP00'.$num;
            elseif($num<9999):
                $num+=1;
                $pay_code = 'AP0'.$num;
            else:
                $num+=1;
                $pay_code = 'AP'.$num;
            endif;
        }
        return $pay_code;
    }

    public function agent_bill_payment_store(){

        if($this->input->post('entry_type') == 'Pay'){
            $code = $this->agent_payment_id_generate();
        }else{
            $code = $this->agent_bill_id_generate();
        }

        if($this->AgentBillPayment_model->agent_bill_payment_store($code)){
            if($this->input->post('entry_type') == 'Pay'){
                $data['bills'] = $this->AgentBillPayment_model->get_agent_all_payment_info();
            }else{
                $data['bills'] = $this->AgentBillPayment_model->get_agent_all_bill_info();
            }
            $this->load->view('admin/agent/bill_payments_tbl', $data);
        }else{
            echo 0;
        }

    }

    public function agent_bill_edit_page($id = Null){

        if($bill = $this->AgentBillPayment_model->get_data_by_id($id)){

            $data['bill'] = $bill;
            $data['agents'] = $this->Agent_model->find_all_agent_info();
            $this->load->view('admin/agent/agent_edit_page', $data);
        }else{
            $data['warning']="No Data Found!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function agent_bill_update($id=Null){

        if($this->AgentBillPayment_model->agent_bill_payment_update($id)){
            $data['success']="Update Successfully!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);

        }else{
            $data['error']="Update Unsuccessfully!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function agent_bill_delete($id=Null){
        if($this->AgentBillPayment_model->agent_bill_payment_delete($id)){
            $data['success']="Delete Successfully!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data['error']="Delete Un-Successfully!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function calculate_agent_due($id = Null){

        if($bill = $this->AgentBillPayment_model->sum_agent_bill_amount($id)){
            if($bill == 1){
                $bill = 0;
            }
            $pay = $this->AgentBillPayment_model->sum_agent_payment_amount($id);
            echo $due = $bill-$pay ;
        }else{
            echo 'F';
        }
    }
}