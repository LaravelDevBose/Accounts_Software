<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Customer_model extends CI_Model
{
	public function find_all_customer_info(){
		
		 $result = $this->db->where('cus_status', 'a')->order_by('id', 'desc')->get('customers')->result();
		 if($result){
		 	return $result;
		 }else{
		 	return FALSE; 
		 }
	}

	public function find_limit_customer_info(){
		
		 $result = $this->db->where('cus_status', 'a')->limit(5)->order_by('id', 'desc')->get('customers')->result();
		 if($result){
		 	return $result;
		 }else{
		 	return FALSE; 
		 }
	}

	public function store_customer_info()
	{	

		$cus_image = $_FILES['cus_image']['name'];
		if(!empty($cus_image) && $cus_image){
			$tmp_name = $_FILES['cus_image']['tmp_name'];	
			$file_path = $this->image_upload($cus_image, $tmp_name);
			$this->image_resize($file_path);
		}

		$cus_bus_card = $_FILES['cus_bus_card']['name'];
		if(!empty($cus_bus_card) && $cus_bus_card){
			$tmp_name = $_FILES['cus_bus_card']['tmp_name'];	
			$file_path1 = $this->image_upload($cus_bus_card, $tmp_name);
			$this->image_resize($file_path1);
		}

		$attr = array(
			'cus_code'	=>$this->input->post('cus_code'),
			'cus_name'	=>$this->input->post('cus_name'),
			'org_name'	=>$this->input->post('org_name'),
			'cus_contact_no'	=>$this->input->post('cus_contact_no'),
			'alt_contact_no'	=>$this->input->post('alt_contact_no'),
			'cus_entry_date'	=>$this->input->post('cus_entry_date'),
			'cus_email'	=>$this->input->post('cus_email'),
			'cus_address'	=>$this->input->post('cus_address'),
			'cus_fb'	=>$this->input->post('cus_fb'),
			'cus_image'	=>$file_path,
			'cus_bus_card'	=>$file_path1,
			'cus_status'	=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('customers', $attr);
		$cus_id = $this->db->insert_id();

		if($result): return $cus_id; else: return FALSE; endif;
	}

	public function customer_by_id($id = null)
	{
		if(!is_null($id)){

			$result = $this->db->where('id', $id)->get('customers')->row();
			if($result){ return $result; }else{ return FALSE; }

		}else{
			return FALSE;
		}
	}

	/*========== Update Customer Info ===========*/
	public function update_customer_info($id=Null)
	{	

		$file_path = $this->input->post('old_cus_img');
		
		$cus_image = $_FILES['cus_image']['name'];
		if(!empty($cus_image) && $cus_image){
			$tmp_name = $_FILES['cus_image']['tmp_name'];	
			$file_path = $this->image_upload($cus_image, $tmp_name);
			$this->image_resize($file_path);
			$old_file_path = $this->input->post('old_cus_img');

			if(file_exists($old_file_path)){
				unlink($old_file_path);
			};
		}

		$file_path1 = $this->input->post('old_bus_card');


		$cus_bus_card = $_FILES['cus_bus_card']['name'];
		if(!empty($cus_bus_card) && $cus_bus_card){
			$tmp_name = $_FILES['cus_bus_card']['tmp_name'];	
			$file_path1 = $this->image_upload($cus_bus_card, $tmp_name);
			$this->image_resize($file_path1);

			$old_file_path1 = $this->input->post('old_bus_card');
			
			if(file_exists($old_file_path1)){
				unlink($old_file_path1);
			};
		}


		$attr = array(
			'cus_code'	=>$this->input->post('cus_code'),
			'cus_name'	=>$this->input->post('cus_name'),
			'org_name'	=>$this->input->post('org_name'),
			'cus_contact_no'	=>$this->input->post('cus_contact_no'),
			'alt_contact_no'	=>$this->input->post('alt_contact_no'),
			'cus_entry_date'	=>$this->input->post('cus_entry_date'),
			'cus_email'	=>$this->input->post('cus_email'),
			'cus_address'	=>$this->input->post('cus_address'),
			'cus_fb'	=>$this->input->post('cus_fb'),
			'cus_image'	=>$file_path,
			'cus_bus_card'	=>$file_path1,
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('customers', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*======= Delete customr info ========*/
	public function delete_customer_info($id=Null)
	{
		$attr = array('cus_status'=>'d');
		$this->db->where('id', $id);
		$qu = $this->db->update('customers', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}




	/*==========Image Upload In Folder===========*/
	public function image_upload($imageName = null, $tmp_name){
		$type = explode('.', $imageName);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $tmp_name ) ){
					$dist_path = 'libs/upload_pic/cus_image/'.$file_name ;
				move_uploaded_file( $tmp_name, $dist_path);
				return $dist_path;
				
			}else{
				return false;
			}
		}else{
			return false;
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
		 $configSize1['new_image'] 		 = 'libs/upload_pic/cus_image/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();		 
	}
}