<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Admin_model extends CI_Model
{
	/*===========Admin Login Name & Pass Check============*/
	/*===========Admin Login Name & Pass Check============*/
	public function admin_login_data_check()
	{
		$name 	= $this->input->post('username');
		$pass 	= md5($this->input->post('password'));

		 $this->db->select('*');
		 $this->db->from("create_admin");
		 $this->db->where("admin_username like binary",$name);
		 $this->db->where("admin_password like binary",$pass);
		 $res = $this->db->get()->row();


		// $attr = array(
		// 	'admin_username' => $name, 
		// 	'admin_password' => $pass, 
		// );

		// $res = $this->db->get_where('create_admin', $attr)->row();
		// echo "<pre>";
		// var_dump($res); return;

		if($res)
		{
			$attr = array(
				'id' => $res->admin_id, 
				'name' => $name,
				'image' => $res->admin_image
			);
			$this->session->set_userdata($attr);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}




	/*===================Admin Login Check======================*/
	/*===================Admin Login Check======================*/
	public function is_admin_loged_in()
	{
		return $this->session->userdata('id') != FALSE;
	}




	/*================Create Admin Data Insert========================*/
	/*================Create Admin Data Insert========================*/
	public function add_admin_data_insert($filename)
	{
		$pass = md5($this->input->post('password'));
		$attr = array(
			'admin_username' 	=> $this->input->post('user_name'), 
			'admin_email' 		=> $this->input->post('email'), 
			'admin_phone' 		=> $this->input->post('phone_no'), 
			'admin_address' 	=> $this->input->post('address'), 
			'admin_image' 		=> $filename,
			'admin_password' 	=> $pass, 
			'admin_type' 		=> 'a',
		);
		$insert = $this->db->insert('create_admin', $attr);
		$adminID = $this->db->insert_id();

		// $attr2 = array(
		// 	'ac_admin_id' 	=> $adminID
		// );
		// $insert2 = $this->db->insert('tbl_access', $attr2);

		if($insert)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}





	/*=============View Admin List==================*/
	/*=============View Admin List==================*/
	public function fatch_all_data()
	{
		$qu = $this->db->order_by('admin_id','desc')->where('admin_type', 'a')->or_where('admin_type', 's')->get('create_admin');
		$res = $qu->result();
		return $res;
	}



	/*=============== Admin EDIT======================*/
	/*=============== Admin EDIT======================*/
	public function edit_admin($id = null)
	{
		$attr = array('admin_id' =>  $id);
		
		$qu = $this->db->get_where('create_admin', $attr);
		
		if ( $qu->num_rows() == 1) {
			return $qu->row();
		}else {
			return FALSE;
		}
	}




	/*================= Admin UPDATE ============================*/
	/*================= Admin UPDATE ============================*/
	public function edit_admin_data_update($id = null)
	{
		$attr = array(
			'admin_username' 	=> $this->input->post('user_name'), 
			'admin_email' 		=> $this->input->post('email'), 
			'admin_phone' 		=> $this->input->post('phone_no'), 
			'admin_address' 	=> $this->input->post('address'),
		);
		
		$this->db->where('admin_id', $id);
		$qu = $this->db->update('create_admin', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}



	/*=================== Admin UPDATE WITH IMAGE================*/
	/*=================== Admin UPDATE WITH IMAGE================*/
	public function edit_admin_data_update_with_image($filename, $id = null)
	{
		$attr = array(
			'admin_username' 	=> $this->input->post('user_name'), 
			'admin_email' 		=> $this->input->post('email'), 
			'admin_phone' 		=> $this->input->post('phone_no'), 
			'admin_address' 	=> $this->input->post('address'), 
			'admin_image' 		=> $filename,
		);
		
		$this->db->where('admin_id', $id);
		$qu = $this->db->update('create_admin', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}



	/*================== Admin DELETE=====================*/
	/*================== Admin DELETE=====================*/
	public function admin_delete($id = null)
	{
		$attr = array(
			'admin_type' 	=> 	'd', 
		);
		
		$this->db->where('admin_id', $id);
		$qu = $this->db->update('create_admin', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}


	/*================= change_password  ====================*/
	/*================= change_password  ======================*/
	public function change_password($id = null)
	{
		$pass = md5($this->input->post('password'));
		$attr = array(
			'admin_password' 	=> 		$pass
		);
		
		$this->db->where('admin_id', $id);
		$qu = $this->db->update('create_admin', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	
}