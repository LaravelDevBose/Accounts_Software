<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends MY_Controller
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

	public function car_reg_store(){

        $pus_id = $this->input->post('pus_id');

        $check = $this->Registration_model->get_car_reg_info($pus_id);
        if($check == ''){

            if($reg_id = $this->Registration_model->insert_car_reg_info()){

                if(isset($_FILES['images']) || $_FILES['images']['error'] == UPLOAD_ERR_NO_FILE)
                {
                    $this->Registration_model->store_reg_image_doc($reg_id);
                }

                if(isset($_FILES['pdfs']) || $_FILES['pdfs']['error'] == UPLOAD_ERR_NO_FILE)
                {
                    $this->Registration_model->store_reg_pdf_documents($reg_id);
                }

                $data['success']="Store Successfully!";
                $this->session->set_flashdata($data);
                redirect($_SERVER['HTTP_REFERER']);

            }else{
                $data['error']="Store Unsuccessfully!";
                $this->session->set_flashdata($data);
                redirect($_SERVER['HTTP_REFERER']);
            }


        }else{
            if($this->Registration_model->update_car_reg_info($check->id)){

                if(isset($_FILES['images']) || $_FILES['images']['error'] == UPLOAD_ERR_NO_FILE)
                {
                    $this->Registration_model->store_reg_image_doc($check->id);
                }

                if(isset($_FILES['pdfs']) || $_FILES['pdfs']['error'] == UPLOAD_ERR_NO_FILE)
                {
                    $this->Registration_model->store_reg_pdf_documents($check->id);
                }

                $data['success']="Update Successfully!";
                $this->session->set_flashdata($data);
                redirect($_SERVER['HTTP_REFERER']);

            }else{
                $data['error']="Update Unsuccessfully!";
                $this->session->set_flashdata($data);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function car_reg_doc_delete($id){

	    if($this->Registration_model->delete_reg_doc($id)){
            echo 1;
        }else{
	        echo 0;
        }
    }

}