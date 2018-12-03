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

    /*========= Car List Details ==============*/
    public function car_list_info(){

        $data['title'] = 'Car List Details';
        $data['content']= 'car_details/car_list';
        $data['cars']	= $this->Car_model->all_car_order_and_purchase_list();
        $data['locations'] = $this->Transport_head_model->transport_head_list();
        $this->load->view('admin/adminMaster', $data);
    }

    public function order_car_profile_details($order_id = Null){
        $data['title'] = 'Order Profile Details';
        $data['content'] = 'car_details/car_profile';
        $data['order'] = $order = $this->Order_model->order_info_by_id($order_id);
        $data['collections'] =   $this->Collection_model->order_wise_collection($order_id);


        $data['coll_sl'] = $this->Collection_model->collection_sl_create();

        if($coll_amount = $this->Order_model->find_total_colection_amount($order_id)) {

            $total_paid = $coll_amount->amount + $order->ord_advance;
            $perchas_price = 0;
            if ($order->pus_id != 0) {
                $perchas_price = $this->db->where('order_id', $order_id)->get('purchase')->row()->total_price;
            }
            $data['due_amount'] = number_format($perchas_price- $total_paid,2);
        }else{
            $data['due_amount'] = '0.00';
        }
        $data['purchase'] =$purchase= $this->Purchase_model->purchase_info_by_id($order->pus_id);
        $data['price'] = $this->Pricing_model->car_pricing_list($order->pus_id);

        $data['images'] = $this->Car_model->get_car_image_by_purchase_id($order->pus_id);
        $data['cover_image'] = $this->Car_model->get_car_cover_image_by_purchase_id($order->pus_id);
        $data['documents']  = $this->Car_model->get_car_document_by_purchase_id($order->pus_id);

        $data['lc_info'] = $this->LC_model->lc_data_by_id($order->ord_lc_no);
        $data['lc_details'] = $this->LC_model->get_lc_details_by_lc_id($order->ord_lc_no);
        $data['lc_image_documents'] = $this->LC_model->get_lc_image_documents($order->ord_lc_no, $order->pus_id);
        $data['lc_pdf_documents'] = $this->LC_model->get_lc_pdf_documents($order->ord_lc_no, $order->pus_id);

        $data['shipping'] = $this->Transport_model->get_car_all_shipping_statement($order->pus_id);
        $data['trans_head'] = $this->Transport_head_model->transport_head_list();

        $this->load->view('admin/adminMaster', $data);
    }

    public function purchase_car_profile_details($pus_id = Null){
        $data['title'] = 'Order Profile Details';
        $data['content'] = 'car_details/car_profile';

        $data['purchase'] =$purchase= $this->Purchase_model->purchase_info_by_id($pus_id);
        $data['price'] = $this->Pricing_model->car_pricing_list($pus_id);

        $data['images'] = $this->Car_model->get_car_image_by_purchase_id($pus_id);
        $data['cover_image'] = $this->Car_model->get_car_cover_image_by_purchase_id($pus_id);
        $data['documents']  = $this->Car_model->get_car_document_by_purchase_id($pus_id);

        $data['lc_info'] = $this->LC_model->lc_data_by_id($purchase->puc_lc_id);
        $data['lc_details'] = $this->LC_model->get_lc_details_by_lc_id($purchase->puc_lc_id);
        $data['lc_documents'] = $this->LC_model->get_lc_documents($purchase->puc_lc_id, $pus_id);

        $data['shipping'] = $this->Transport_model->get_car_all_shipping_statement($pus_id);
        $data['trans_head'] = $this->Transport_head_model->transport_head_list();

        $this->load->view('admin/adminMaster', $data);
    }

    public function car_search_method(){

        $search_value = $this->input->post('search_value');
        $search_type = $this->input->post('search_type');
        if(empty($search_value) || $search_value == ''){
            if($res = $this->Car_model->all_car_order_and_purchase_list()){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else if($search_type == 'order_no'){
            if($res = $this->Car_model->order_wise_car_search($search_value)){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else if($search_type == 'purchase_no'){
            if($res = $this->Car_model->purchase_wise_car_search($search_value)){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else if($search_type == 'chassis_no'){
            if($res = $this->Car_model->chassis_no_wise_car_search($search_value)){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else if($search_type == 'order_date'){
            if($res = $this->Car_model->order_date_wise_car_search($search_value)){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else if($search_type == 'status'){
            if($res = $this->Car_model->status_wise_car_search($search_value)){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else if($search_type == 'location'){
            if($res = $this->Car_model->location_wise_car_search($search_value)){
                $data['cars'] = $res;
                $this->load->view('admin/car_details/car_list_table', $data);
            }else{
                echo 0;
            }
        }else{

            echo 0;
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

        $message2 =''; $message1 = '';

        $imagesCount = count($_FILES['images']['name']);
        $documentsCount = count($_FILES['documents']['name']);

        // print_r(); die();
        if($imagesCount >0 && $_FILES['images']['name'][0] != ''){
            
            if($this->Car_model->store_images()){
                $message1 = 'Image Store Successfully';
            }else{
                $message1 = 'Image Store Not Successfully';
            }
        }

       
        if($documentsCount > 0 && $_FILES['documents']['name'][0] != ''){
            if($this->Car_model->store_documents()){
                $message2 = 'Documents Store Successfully';
            }else{
                $message2 = 'Documents Store Not Successfully';
            }

        }

        $loc = $this->input->post('location');

        if(!empty($message1) || !empty($message2) ){

            $data['info']=$message1.' '.$message2;
            $this->session->set_flashdata($data);

            if(isset($loc) && $loc == 'profile'){
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect('car/images_insert/page');
        }
        else{
            $data['error']="No Images Or Documents Found Select Images First!";
            $this->session->set_flashdata($data);

            if(isset($loc) && $loc == 'profile'){
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect('car/images_insert/page');
        }
    }

    public function cover_image_upload(){

        if(isset($_FILES['cover_image']) || $_FILES['cover_image']['error'] == UPLOAD_ERR_NO_FILE)
        {

            if($this->Car_model->store_cover_images()){
                $data['success'] = 'Image Store Successfully';
                $this->session->set_flashdata($data);
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $data['error'] = 'Image Store Not Successfully';
                $this->session->set_flashdata($data);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $data['error'] = 'No Image Selected. Select A Image First';
        $this->session->set_flashdata($data);
        redirect($_SERVER['HTTP_REFERER']);
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