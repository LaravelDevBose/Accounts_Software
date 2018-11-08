<?php 
class MY_Controller extends CI_Controller {

	public $access;

   function __construct() {
       parent::__construct();
       $data['access'] = $this->db->where('admin_id', $this->session->userdata('id'))->get('admin_access')->row();
      
        $this->load->vars($data);
   }

   	protected function admin_access($field_name = Null){
   	 	$access = $this->db->where('admin_id', $this->session->userdata('id'))->get('admin_access')->row();
   	 	return $access->$field_name;
   	}
}