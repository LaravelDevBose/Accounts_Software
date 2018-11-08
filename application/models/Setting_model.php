<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Setting_model extends CI_Model
{

	public function get_company_info($field_name = Null)
	{
		$res = $this->db->where('field_name', $field_name)->get('setting')->row();

		if($res){
			return $res->value;
		}
		return FALSE;
	}
	public function data_store_or_update()
	{
		$logoName = $_FILES['logo']['name'];
		$logo = TRUE;

		if(!empty($logoName) && $logoName){
			$logo = $this->logo_store_or_update($logoName);
		}

		$cmp_name = $this->cmp_name_store_or_update();
		$cmp_adds = $this->cmp_adds_store_or_update();
		$cmp_phn = $this->cmp_phn_store_or_update();
		$cmp_eml = $this->cmp_eml_store_or_update();

		if($logo && $cmp_name && $cmp_adds && $cmp_phn && $cmp_eml){
			return TRUE;
		}

		return FALSE;
	}

	private function cmp_name_store_or_update()
	{
		$check = $this->db->where('field_name','cmp_name')->get('setting')->row();

		if($check){
			$attr = array(
				'field_name'=>'cmp_name',
				'value'=>$this->input->post('cmp_name'),
				'updated_by'  	=>$this->session->userdata('name'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);
			$this->db->where('field_name', 'cmp_name');
			$res = $this->db->update('setting', $attr);

			if($this->db->affected_rows()){
				return TRUE; 
			}else{
			 	return FALSE; 
			}

		}else{
			$attr = array(
				'field_name'=>'cmp_name',
				'value'=>$this->input->post('cmp_name'),
				'created_by' 	=>$this->session->userdata('name'),
				'updated_by'  	=>$this->session->userdata('name'),
				'created_at' 	=>date('Y-m-d H:i:s'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);

			$res = $this->db->insert('setting', $attr);
			if($res){return TRUE; }else{ return FALSE; }
		}
	}

	private function cmp_adds_store_or_update()
	{
		$check = $this->db->where('field_name','cmp_adds')->get('setting')->row();

		if($check){
			$attr = array(
				'field_name'=>'cmp_adds',
				'value'=>$this->input->post('cmp_adds'),
				'updated_by'  	=>$this->session->userdata('name'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);
			$this->db->where('field_name', 'cmp_adds');
			$res = $this->db->update('setting', $attr);

			if($this->db->affected_rows()){
				return TRUE; 
			}else{
			 	return FALSE; 
			}

		}else{
			$attr = array(
				'field_name'=>'cmp_adds',
				'value'=>$this->input->post('cmp_adds'),
				'created_by' 	=>$this->session->userdata('name'),
				'updated_by'  	=>$this->session->userdata('name'),
				'created_at' 	=>date('Y-m-d H:i:s'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);

			$res = $this->db->insert('setting', $attr);
			if($res){return TRUE; }else{ return FALSE; }
		}
	}
	private function cmp_phn_store_or_update()
	{
		$check = $this->db->where('field_name','cmp_phn')->get('setting')->row();

		if($check){
			$attr = array(
				'field_name'=>'cmp_phn',
				'value'=>$this->input->post('cmp_phn'),
				'updated_by'  	=>$this->session->userdata('name'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);
			$this->db->where('field_name', 'cmp_phn');
			$res = $this->db->update('setting', $attr);

			if($this->db->affected_rows()){
				return TRUE; 
			}else{
			 	return FALSE; 
			}

		}else{
			$attr = array(
				'field_name'=>'cmp_phn',
				'value'=>$this->input->post('cmp_phn'),
				'created_by' 	=>$this->session->userdata('name'),
				'updated_by'  	=>$this->session->userdata('name'),
				'created_at' 	=>date('Y-m-d H:i:s'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);

			$res = $this->db->insert('setting', $attr);
			if($res){return TRUE; }else{ return FALSE; }
		}
	}
	private function cmp_eml_store_or_update()
	{
		$check = $this->db->where('field_name','cmp_eml')->get('setting')->row();

		if($check){
			$attr = array(
				'field_name'=>'cmp_eml',
				'value'=>$this->input->post('cmp_eml'),
				'updated_by'  	=>$this->session->userdata('name'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);
			$this->db->where('field_name', 'cmp_eml');
			$res = $this->db->update('setting', $attr);

			if($this->db->affected_rows()){
				return TRUE; 
			}else{
			 	return FALSE; 
			}

		}else{
			$attr = array(
				'field_name'=>'cmp_eml',
				'value'=>$this->input->post('cmp_eml'),
				'created_by' 	=>$this->session->userdata('name'),
				'updated_by'  	=>$this->session->userdata('name'),
				'created_at' 	=>date('Y-m-d H:i:s'),
				'updated_at' 	=>date('Y-m-d H:i:s')
			);

			$res = $this->db->insert('setting', $attr);
			if($res){return TRUE; }else{ return FALSE; }
		}
	}

	private function logo_store_or_update($logoName = NUll)
	{
		$tmp_name = $_FILES['logo']['tmp_name'];	

		$file_path = $this->image_upload($logoName, $tmp_name);
		$this->image_resize($file_path);
		if($file_path){
			
			$check = $this->db->where('field_name', 'logo')->get('setting')->row();

			if($check){
				$attr = array(
					'field_name'=>'logo',
					'value'=>$file_path,
					'updated_by'  	=>$this->session->userdata('name'),
					'updated_at' 	=>date('Y-m-d H:i:s')
				);
				$this->db->where('field_name', 'logo');
				$res = $this->db->update('setting', $attr);

				if($this->db->affected_rows()){
					$old_logo = $this->input->post('old_logo');

					if(file_exists($old_logo)){
						unlink($old_logo);
					}
					return TRUE; 
				}else{
				 return FALSE; 
				}

			}else{
				$attr = array(
					'field_name'=>'logo',
					'value'=>$file_path,
					'created_by' 	=>$this->session->userdata('name'),
					'updated_by'  	=>$this->session->userdata('name'),
					'created_at' 	=>date('Y-m-d H:i:s'),
					'updated_at' 	=>date('Y-m-d H:i:s')
				);

				$res = $this->db->insert('setting', $attr);
				if($res){return TRUE; }else{ return FALSE; }
			}
			

		}
		return FALSE;
	}

	/*==========Image Upload In Folder===========*/
	public function image_upload($imageName = null, $tmp_name){
		$type = explode('.', $imageName);
		$type = $type[count($type)-1];
		$file_name= uniqid(rand()).'.'.$type;

		if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'PNG', 'JPEG', 'GIF' )) ){

				if( is_uploaded_file( $tmp_name ) ){
					$dist_path = 'libs/upload_pic/comp_image/'.$file_name ;
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
		 $configSize1['new_image'] 		 = 'libs/upload_pic/comp_image/';

		 $this->image_lib->initialize($configSize1);
		 $this->image_lib->resize();
		 $this->image_lib->clear();		 
	}
}
