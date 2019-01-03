<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 1/3/2019
 * Time: 9:57 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insurance extends MY_Controller
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

    /*==========Admin Login Check==========*/
    public function index()
    {
        if (!$this->Admin_model->is_admin_loged_in())
        {
            redirect('Adminlogin/?logged_in_first');
        }else{
            redirect('Admindashboard');
        }
    }

    public function insurance_entry_page(){
        $data['title'] = 'Insurance Company';
        $data['content'] = 'insurance/insurs_company_entry';
        $data['companies'] = $this->Insurance_model->get_all_company_info();
        $this->load->view('admin/adminMaster', $data);
    }

    /**
     *
     */
    public function insurance_store(){
        $this->form_validation->set_rules('in_comp_name', 'Company Name ', 'required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Insurance Company';
            $data['content'] = 'insurance/insurs_company_entry';
            $data['companies'] = $this->Insurance_model->get_all_company_info();
            $this->load->view('admin/adminMaster', $data);
        }
        else{
            if($this->Insurance_model->insurance_company_insert()){
                $data['success']="Save Successfully!";
                $this->session->set_flashdata($data);
                redirect('insurance_entry');

            }else{
                $data['error']="Save Unsuccessfully!";
                $this->session->set_flashdata($data);
                redirect('insurance_entry');
            }
        }
    }

    public function insurance_edit_page($id = Null){

        if($company = $this->Insurance_model->get_insurance_data_by_id($id)){
            $data['company'] = $company;
            $this->load->view('admin/insurance/insurs_company_edit', $data);
        }else{
            $data['warning']="No Data Found!";
            $this->session->set_flashdata($data);
            redirect('insurance_entry');
        }

    }

    /**
     * @param null $id
     */
    public function insurance_update($id=Null){
        $this->form_validation->set_rules('in_comp_name', 'Company Name ', 'required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'Insurance Company';
            $data['content'] = 'insurance/insurs_company_entry';
            $data['companies'] = $this->Insurance_model->get_all_company_info();
            $this->load->view('admin/adminMaster', $data);
        }
        else{
            if($this->Insurance_model->insurance_company_update($id)){
                $data['success']="Update Successfully!";
                $this->session->set_flashdata($data);
                redirect('insurance_entry');

            }else{
                $data['error']="Update Unsuccessfully!";
                $this->session->set_flashdata($data);
                redirect('insurance_entry');
            }
        }
    }

    /**
     * @param null $id
     */
    public function insurance_delete($id = Null){

        if($this->Insurance_model->insurance_company_delete($id)){
            $data['success']="Delete Successfully!";
            $this->session->set_flashdata($data);
            redirect('insurance_entry');

        }else{
            $data['error']="Delete Unsuccessfully!";
            $this->session->set_flashdata($data);
            redirect('insurance_entry');
        }
    }

    public function insurance_bill_entry(){

        $data['title'] = 'Insurance Bill Entry';
        $data['content'] = 'insurance/insurance_bill_page';
        $data['bill_code'] = $this->InsuranceBill_model->insurance_bill_code();
        $data['companies'] = $this->Insurance_model->get_all_company_info();
        $data['customers'] = $this->Customer_model->find_all_customer_info();
        $data['bills'] = $this->InsuranceBill_model->get_all_insurance_bill_data();
        $this->load->view('admin/adminMaster', $data);
    }

    public function insurance_payment_entry(){
        $data['title'] = 'Insurance Bill Entry';
        $data['content'] = 'insurance/insurance_payment_page';
        $data['bill_code'] = $this->InsuranceBill_model->insurance_payment_code();
        $data['companies'] = $this->Insurance_model->get_all_company_info();
        $data['customers'] = $this->Customer_model->find_all_customer_info();
        $data['bills'] = $this->InsuranceBill_model->get_all_insurance_payment_data();
        $this->load->view('admin/adminMaster', $data);
    }

    public function insurance_bill_payment_insert(){

    }

    public function insurance_bill_payment_edit($id = Null){

        if($bill = $this->InsuranceBill_model->get_insurance_bill_data_by_id($id)){

            $data['bill'] = $bill;
            $data['companies'] = $this->Insurance_model->get_all_company_info();
            $data['customers'] = $this->Customer_model->find_all_customer_info();
            $this->load->view('admin/insurance/insurance_bill_edit', $data);
        }
    }

    public function insurance_bill_payment_update($id = Null){

    }

    public function insurance_bill_payment_delete($id=Null){

        if($this->InsuranceBill_model->delete_insurance_data($id)){
            $data['success']="Delete Successfully!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $data['error']="Delete Unsuccessfully!";
            $this->session->set_flashdata($data);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}