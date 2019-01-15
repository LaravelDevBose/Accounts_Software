<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/6/2018
 * Time: 10:53 AM
 */

class Registration_model extends CI_Model
{
    public function get_car_reg_info($pus_id = Null){

        $res = $this->db->where('pus_id', $pus_id)->where('status', 'a')->get('car_registration')->row();
        if($res){
            return $res;
        }
        return false;
    }

    public function get_reg_documents($reg_id = Null){
        $res = $this->db->where('reg_id', $reg_id)->where('status', 'a')->get('reg_document')->result();

        if($res){
            return $res;
        }
        return false;
    }

    public function insert_car_reg_info(){ 
        $attr = array(
            'pus_id' => $this->input->post('pus_id'),
            'reg_no' => $this->input->post('reg_no'),
            'reg_date' => $this->input->post('reg_date'),
            'reg_area' => $this->input->post('reg_area'),
            'owner_name' => $this->input->post('owner_name'),
            'status'	=>'a',
            'created_by' =>$this->session->userdata('name'),
            'updated_by'  =>$this->session->userdata('name'),
            'created_at' =>date('Y-m-d H:i:s'),
            'updated_at' =>date('Y-m-d H:i:s')
        );

        $result = $this->db->insert('car_registration', $attr);
        $reg_id = $this->db->insert_id();
        if($result): return $reg_id; else: return FALSE; endif;
    }

    public function update_car_reg_info($id = Null){
        $attr = array(
            'pus_id' => $this->input->post('pus_id'),
            'reg_no' => $this->input->post('reg_no'),
            'reg_date' => $this->input->post('reg_date'),
            'reg_area' => $this->input->post('reg_area'),
            'owner_name' => $this->input->post('owner_name'),
            'updated_by'  =>$this->session->userdata('name'),
            'updated_at' =>date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        $qu = $this->db->update('car_registration', $attr);

        if ( $this->db->affected_rows()) {
            return TRUE;
        }else {
            return FALSE;
        }
    }


    public function delete_reg_doc($id = Null){
        $attr = array('status'=>'d');

        $this->db->where('id', $id);
        $qu = $this->db->update('reg_document', $attr);

        if ( $this->db->affected_rows()) {
            return TRUE;
        }else {
            return FALSE;
        }
    }

    public function store_reg_image_doc($reg_id = Null){
        $type = 'I';

        $filesCount = count($_FILES['images']['name']);
        if(isset($_FILES['images']) || $_FILES['images']['error'] == UPLOAD_ERR_NO_FILE){

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['image']['name']     = $_FILES['images']['name'][$i];
                $_FILES['image']['type']     = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['error']     = $_FILES['images']['error'][$i];
                $_FILES['image']['size']     = $_FILES['images']['size'][$i];
                $file_name = $this->image_upload($_FILES['image']['name'], $_FILES['image']['tmp_name']);


                if($file_name == ''){
                    return false;
                }else{
                    $this->image_resize($file_name);
                    $this->insert_image_in_database($file_name, $reg_id, $type);
                }

            }
            return TRUE;
        }else{
            return TRUE;
        }
    }

    public function store_reg_pdf_documents($reg_id = Null){
        $type = 'P';

        $filesCount = count($_FILES['pdfs']['name']);
        if(isset($_FILES['pdfs']) || $_FILES['images']['error'] == UPLOAD_ERR_NO_FILE){

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['image']['name']     = $_FILES['pdfs']['name'][$i];
                $_FILES['image']['type']     = $_FILES['pdfs']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['pdfs']['tmp_name'][$i];
                $_FILES['image']['error']     = $_FILES['pdfs']['error'][$i];
                $_FILES['image']['size']     = $_FILES['pdfs']['size'][$i];
                $file_name = $this->pdf_upload($_FILES['image']['name'], $_FILES['image']['tmp_name']);
                // print_r($file_name); die();

                if($file_name == ''){
                    return false;
                }else{

                    $this->insert_image_in_database($file_name, $reg_id, $type);
                }
            }
            return TRUE;
        }else{
            return TRUE;
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
        $configSize1['new_image'] 		 = 'libs/upload_pic/reg_doc/';

        $this->image_lib->initialize($configSize1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    /*==========Insert Image Info in Database===========*/
    public function insert_image_in_database($image_path=null, $reg_id = null,$type=Null)
    {
        $attr=array(
            'reg_id'  =>$reg_id,
            'path' => $image_path,
            'type' => $type,
            'status' => 'a'
        );

        $insert = $this->db->insert('reg_document', $attr);

        if($insert){
            return TRUE;
        }else{
            return FALSE;
        }
    }


    /*==========Image Upload In Folder===========*/
    public function pdf_upload($imageName = null, $temp_name){
        $file_exp = explode('.', $imageName);
        $type = $file_exp[count($file_exp)-1];
        $file_name= $file_exp[0].rand(1,2).'.'.$type;

        if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF','pdf','PDF' )) ){

            if( is_uploaded_file( $temp_name ) ){

                move_uploaded_file( $temp_name, 'libs/upload_pic/reg_doc/'.$file_name );
                return 'libs/upload_pic/reg_doc/'.$file_name;

            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    public function image_upload($imageName = null, $temp_name){
        $type = explode('.', $imageName);
        $type = $type[count($type)-1];
        $file_name= uniqid(rand()).'.'.$type;

        if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF','pdf','PDF' )) ){

            if( is_uploaded_file( $temp_name ) ){

                move_uploaded_file( $temp_name, 'libs/upload_pic/reg_doc/'.$file_name );
                return 'libs/upload_pic/reg_doc/'.$file_name;

            }else{
                return '';
            }
        }else{
            return '';
        }
    }
}