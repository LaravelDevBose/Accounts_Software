<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car extends MY_Controller
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

    /*========== View ar image upload page =========*/
    public function car_images_insert_page(){
        $data['title'] = 'Cars Images Upload';
        $data['content'] = 'car_details/image_upload_page';
        $data['cars'] = $this->Purchase_model->get_purchase_info();
        $this->load->view('admin/adminMaster', $data);
    }

    public function find_car_purchase_info_for_image($id){

        $data = $this->Purchase_model->purchase_info_by_id($id);
        echo json_encode($data);
    }

    /*=========== Car Images Store In database ========*/
    public function car_images_store(){

        $filesCount = count($_FILES['images']['name']);
        if($filesCount >0){
            if($this->Car_model->store_images()){

                $data['success']="Images Store Successfully!";
                $this->session->set_flashdata($data);
                redirect('car/images_insert/page');
            }else{
                $data['error']="Images Not Store Successfully!";
                $this->session->set_flashdata($data);
                redirect('car/images_insert/page');
            }
        }else{
            $data['error']="No Images Found Select Images First!";
            $this->session->set_flashdata($data);
            redirect('car/images_insert/page');
        }
    }

    public function car_images_view_page($id = null){

        $data['title'] = 'Car Images View';
        $data['content'] = 'car_details/car_images_view';
        if(!$image = $this->Car_model->get_car_image_by_purchase_id($id)){
            $data['info']="No Images Found !";
            $this->session->set_flashdata($data);
            redirect('car/images_insert/page');
        }
        $data['images'] = $image ;
        $this->load->view('admin/adminMaster', $data);
    }

    public function car_images_edit_page($pus_id = Null){

        if($this->admin_access('edit_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('purchase/dashboard');
        }

        $data['title'] = 'Car Images Edit';
        $data['content'] = 'car_details/car_images_edit';
        $data['purchase'] = $this->Purchase_model->purchase_info_by_id($pus_id);
        $data['images'] = $this->Car_model->get_car_image_by_purchase_id($pus_id);
        $this->load->view('admin/adminMaster', $data);

    }

    public function car_image_delete($id = Null){
        if($this->admin_access('edit_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('purchase/dashboard');
        }

        if($this->Car_model->delete_car_image($id)){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function car_images_delete($pus_id = Null){
        if($this->admin_access('edit_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('purchase/dashboard');
        }
        if($images = $this->Car_model->get_car_image_by_purchase_id($pus_id)){

            foreach($images as $image){
                $this->Car_model->delete_car_image($image->id);
            }

            $data['success']="Car Images Delete Successfully!";
            $this->session->set_flashdata($data);
            redirect('car/images_insert/page');

        }else{
            $data['error']="Car Images Delete Un-Successfully!";
            $this->session->set_flashdata($data);
            redirect('car/images_insert/page');
        }

    }

}