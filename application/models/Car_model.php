<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Car_model extends CI_Model
{

    /*====== Store Cars Images ==========*/
    public function store_images(){

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
                $this->insert_image_in_database($file_name, $pus_id);
            }
            return TRUE;
        }else{
            return TRUE;
        }


    }

    /*========== count Purchase Image  =============*/
    public function get_car_image_by_purchase_id($id= Null){
        return $this->db->where('pus_id', $id)->get('car_images')->result();
    }


    public function delete_car_image($id = Null){

        $image = $this->db->where('id', $id)->get('car_images')->row();

        if(file_exists($image->image_path)){
            unlink($image->image_path);
        }
        $this->db->where('id', $id);
        $this->db->delete('car_images');

        if ( $this->db->affected_rows()) {
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
        $configSize1['width']           = 200;
        $config['quality']   			 = '100';
        $configSize1['height']          = 200;
        $configSize1['new_image'] 		 = 'libs/upload_pic/car_image/';

        $this->image_lib->initialize($configSize1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    /*==========Insert Image Info in Database===========*/
    public function insert_image_in_database($image_path=null, $pus_id = null)
    {
        $attr=array(
            'pus_id'  =>$pus_id,
            'image_path' => $image_path,
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