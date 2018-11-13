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

                $data['error']="Images Store Successfully!";
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


}