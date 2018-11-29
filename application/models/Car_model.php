<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Car_model extends CI_Model
{


    /*====== Store Cars Images ==========*/
    public function store_images(){
        $type = 'I';
        $pus_id = $this->input->post('pus_id');
        $filesCount = count($_FILES['images']['name']);
        if($filesCount > 0){

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['image']['name']     = $_FILES['images']['name'][$i];
                $_FILES['image']['type']     = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['error']     = $_FILES['images']['error'][$i];
                $_FILES['image']['size']     = $_FILES['images']['size'][$i];
                $file_name = $this->image_upload($_FILES['image']['name'], $_FILES['image']['tmp_name']);

                $this->image_resize($file_name);
                $this->insert_image_in_database($file_name, $pus_id, $type);
            }
            return TRUE;
        }else{
            return TRUE;
        }


    }

    public function store_cover_images(){
        $type = 'C';
        $pus_id = $this->input->post('pus_id');
        if(isset($_FILES['cover_image']) || $_FILES['cover_image']['error'] == UPLOAD_ERR_NO_FILE)
        {
            $file_name = $this->image_upload($_FILES['cover_image']['name'], $_FILES['cover_image']['tmp_name']);

            $this->image_resize($file_name);
            $this->insert_image_in_database($file_name, $pus_id, $type);

            return TRUE;
        }else{
            return TRUE;
        }


    }

    /*=======  all order and purchase car list ================== */
    public function all_car_order_and_purchase_list(){

        $this->db->select('orders.id as o_id, orders.order_no, orders.ord_chassis_no, orders.created_at, orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id,
                           purchase.id as p_id,purchase.pus_sl, purchase.total_price, purchase.created_at as pus_date,customers.cus_name, trans_heads.head_name ')->from('orders');
        $this->db->join('purchase', 'purchase.order_id = orders.id');
        $this->db->join('customers', 'customers.id = orders.cus_id');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $this->db->where('orders.status', 'a')->order_by('orders.created_at', 'desc')->group_by('orders.id');
        $all = $this->db->get()->result();

        $this->db->select('orders.id as o_id,orders.order_no, orders.ord_chassis_no ,orders.created_at,orders.ord_car_model,orders.ord_color,orders.pus_id,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,customers.cus_name')->from('orders');
        $this->db->join('customers', 'customers.id = orders.cus_id');
        $un_pus_order = $this->db->where('orders.pus_id', '0')->where('orders.status', 'a')->order_by('orders.created_at', 'desc')->get()->result();


        $this->db->select('purchase.id as p_id, purchase.pus_sl, purchase.order_id ,purchase.created_at, purchase.puc_car_model,purchase.puc_color,
                           purchase.puc_year,purchase.puc_mileage,purchase.puc_chassis_no,purchase.total_price,trans_heads.head_name ')->from('purchase');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $un_order_pus = $this->db->where('purchase.order_id', '0')->where('purchase.status', 'a')->order_by('purchase.created_at', 'desc')->get()->result();

        $result = array_merge($all, $un_pus_order,$un_order_pus );

        array_multisort( array_column($result, "created_at"), SORT_DESC, $result );

        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function order_wise_car_search($search_value = Null){
        $this->db->select('orders.id as o_id, orders.order_no, orders.ord_chassis_no, orders.created_at, orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id,
                           purchase.id as p_id,purchase.pus_sl, purchase.total_price, purchase.created_at as pus_date,customers.cus_name, trans_heads.head_name ')->from('orders');
        $this->db->join('purchase', 'purchase.order_id = orders.id', 'left');
        $this->db->join('customers', 'customers.id = orders.cus_id','left');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $this->db->like('orders.order_no', $search_value)->where('orders.status', 'a')->order_by('orders.created_at', 'desc')->group_by('orders.id');
        $all = $this->db->get()->result();
        if($all){
            return $all;
        }else{
            return false;
        }
    }

    public function purchase_wise_car_search($search_value = Null){
        $this->db->select('orders.id as o_id, orders.order_no, orders.created_at, orders.ord_chassis_no,  orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id, purchase.id as p_id,
                            purchase.pus_sl, purchase.order_id ,purchase.created_at as pus_date, purchase.puc_car_model,purchase.puc_color,
                           purchase.puc_year,purchase.puc_mileage,purchase.puc_chassis_no,purchase.total_price, customers.cus_name, trans_heads.head_name ')->from('purchase');


        $this->db->join('orders', 'purchase.order_id = orders.id','left');
        $this->db->join('customers', 'customers.id = orders.cus_id', 'left');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $this->db->like('purchase.pus_sl', $search_value)->where('purchase.status', 'a')->order_by('purchase.created_at', 'desc')->group_by('purchase.id');
        $all = $this->db->get()->result();
        if($all){
            return $all;
        }else{
            return false;
        }
    }

    public function chassis_no_wise_car_search($search_value = Null){
        $this->db->select('orders.id as o_id, orders.order_no, orders.created_at, orders.ord_chassis_no,  orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id, purchase.id as p_id,
                            purchase.pus_sl, purchase.order_id ,purchase.created_at as pus_date, purchase.puc_car_model,purchase.puc_color,
                           purchase.puc_year,purchase.puc_mileage,purchase.puc_chassis_no,purchase.total_price, customers.cus_name, trans_heads.head_name ')->from('purchase');


        $this->db->join('orders', 'purchase.order_id = orders.id','left');
        $this->db->join('customers', 'customers.id = orders.cus_id', 'left');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $this->db->like('purchase.puc_chassis_no', $search_value)->where('purchase.status', 'a')->order_by('purchase.created_at', 'desc')->group_by('purchase.id');
        $all = $this->db->get()->result();
        if($all){
            return $all;
        }else{
            return false;
        }
    }

    public function order_date_wise_car_search($search_value = Null){
        $this->db->select('orders.id as o_id, orders.order_no, orders.ord_chassis_no, orders.created_at, orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id,
                           purchase.id as p_id,purchase.pus_sl, purchase.total_price, purchase.created_at as pus_date,customers.cus_name, trans_heads.head_name ')->from('orders');
        $this->db->join('purchase', 'purchase.order_id = orders.id', 'left');
        $this->db->join('customers', 'customers.id = orders.cus_id','left');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $this->db->like('orders.created_at', $search_value)->where('orders.status', 'a')->order_by('orders.created_at', 'desc')->group_by('orders.id');
        $all = $this->db->get()->result();
        if($all){
            return $all;
        }else{
            return false;
        }
    }

    public function status_wise_car_search($search_value = Null){

        if($search_value == 'u'){
            $this->db->select('orders.id as o_id, orders.order_no, orders.created_at, orders.ord_chassis_no,  orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id, purchase.id as p_id,
                            purchase.pus_sl, purchase.order_id ,purchase.created_at as pus_date, purchase.puc_car_model,purchase.puc_color,
                           purchase.puc_year,purchase.puc_mileage,purchase.puc_chassis_no,purchase.total_price, customers.cus_name, trans_heads.head_name ')->from('purchase');


            $this->db->join('orders', 'purchase.order_id = orders.id','left');
            $this->db->join('customers', 'customers.id = orders.cus_id', 'left');
            $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
            $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
            $this->db->where('purchase.order_id', '0')->where('purchase.status', 'a')->order_by('purchase.created_at', 'desc')->group_by('purchase.id');
            $all = $this->db->get()->result();
        }else{
            $this->db->select('orders.id as o_id, orders.order_no, orders.ord_chassis_no, orders.created_at, orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id,
                           purchase.id as p_id,purchase.pus_sl, purchase.total_price, purchase.created_at as pus_date,customers.cus_name, trans_heads.head_name ')->from('orders');
            $this->db->join('purchase', 'purchase.order_id = orders.id', 'left');
            $this->db->join('customers', 'customers.id = orders.cus_id','left');
            $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
            $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
            $this->db->where('orders.order_status', $search_value)->where('orders.status', 'a')->order_by('orders.created_at', 'desc')->group_by('orders.id');
            $all = $this->db->get()->result();
        }

        if($all){
            return $all;
        }else{
            return false;
        }
    }

    public function location_wise_car_search($search_value = Null){
        $this->db->select('orders.id as o_id, orders.order_no, orders.created_at, orders.ord_chassis_no,  orders.ord_car_model,orders.ord_color,
                           orders.ord_year,orders.ord_mileage,orders.ord_budget_range,orders.order_status,orders.pus_id, purchase.id as p_id,
                            purchase.pus_sl, purchase.order_id ,purchase.created_at as pus_date, purchase.puc_car_model,purchase.puc_color,
                           purchase.puc_year,purchase.puc_mileage,purchase.puc_chassis_no,purchase.total_price, customers.cus_name, trans_heads.head_name ')->from('purchase');


        $this->db->join('orders', 'purchase.order_id = orders.id','left');
        $this->db->join('customers', 'customers.id = orders.cus_id', 'left');
        $this->db->join('transports', 'transports.id = purchase.transport_id', 'left');
        $this->db->join('trans_heads', 'trans_heads.id = transports.trans_head_id', 'left');
        $this->db->where('trans_heads.id', $search_value)->where('purchase.status', 'a');
        $all = $this->db->get()->result();
        if($all){
            return $all;
        }else{
            return false;
        }
    }

    /*====== Store Cars Images ==========*/
    public function store_documents(){
        $type = 'D';
        $pus_id = $this->input->post('pus_id');
        $filesCount = count($_FILES['documents']['name']);
        if($filesCount > 0){

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['image']['name']     = $_FILES['documents']['name'][$i];
                $_FILES['image']['type']     = $_FILES['documents']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
                $_FILES['image']['error']     = $_FILES['documents']['error'][$i];
                $_FILES['image']['size']     = $_FILES['documents']['size'][$i];
                $file_name = $this->image_upload($_FILES['image']['name'], $_FILES['image']['tmp_name']);

                $this->image_resize($file_name);
                $this->insert_image_in_database($file_name, $pus_id,$type);
            }
            return TRUE;
        }else{
            return TRUE;
        }


    }

    /*========== count Purchase Image  =============*/
    public function get_car_image_by_purchase_id($id= Null){
        return $this->db->where('pus_id', $id)->where('type !=', 'D')->get('car_images')->result();
    }

    public function get_car_cover_image_by_purchase_id($id= Null){
        return $this->db->where('pus_id', $id)->where('type', 'C')->order_by('id', 'desc')->get('car_images')->row();
    }

    /*========== count Purchase Image  =============*/
    public function get_car_document_by_purchase_id($id= Null){
        return $this->db->where('pus_id', $id)->where('type', 'D')->get('car_images')->result();
    }


    public function delete_car_image($id = Null){

        $image = $this->db->where('id', $id)->get('car_images')->row();

        if(file_exists($image->image_path)){
            unlink($image->image_path);
        }
        $this->db->where('id', $id);
        $this->db->delete('car_images');

        if ($this->db->affected_rows()) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    // =============== Resize Uploded Image ==================
    public function image_resize($sourse){

        /* First size */
        $configSize1['image_library']   = 'gd2';
        $configSize1['source_image'] 	 = $sourse;
        $configSize1['create_thumb']    = FALSE;
        $configSize1['maintain_ratio']  = FALSE;
        $configSize1['width']           = 400;
        $config['quality']   			 = '100';
        $configSize1['height']          = 400;
        $configSize1['new_image'] 		 = 'libs/upload_pic/car_image/';

        $this->image_lib->initialize($configSize1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    /*==========Insert Image Info in Database===========*/
    public function insert_image_in_database($image_path=null, $pus_id = null, $type=Null)
    {
        $attr=array(
            'pus_id'  =>$pus_id,
            'image_path' => $image_path,
            'type' => $type,
            'status' => 'a'
        );

        $insert = $this->db->insert('car_images', $attr);

        if($insert){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    /*==========Image Upload In Folder===========*/
    public function image_upload($imageName = null, $temp_name){
        $type = explode('.', $imageName);
        $type = $type[count($type)-1];
        $file_name= uniqid(rand()).'.'.$type;

        if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF' )) ){

            if( is_uploaded_file( $temp_name ) ){

                move_uploaded_file( $temp_name, 'libs/upload_pic/car_image/'.$file_name );
                return 'libs/upload_pic/car_image/'.$file_name;

            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}