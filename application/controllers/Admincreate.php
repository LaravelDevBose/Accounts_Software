<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 12:37 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admincreate extends MY_Controller
{
	/*=================Admin Login Check====================*/
	/*=================Admin Login Check====================*/
	public function __construct()
	{
		parent::__construct();
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}
	}

	/*====================Admin Login Check=====================*/
	/*====================Admin Login Check=====================*/
	public function index()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			redirect('createAdmin');
		}	
	}




	/*======================Add Admin Page======================*/
	/*======================Add Admin Page======================*/
	public function addAdminPage()
	{	
		if($this->admin_access('admin_entry') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}

		$data['title'] = 'Add Admin Information';
		$data['add_admin'] = 'active';

		$data['content'] = 'createAdmin/addAdmin';   
		$this->load->view('admin/adminMaster', $data);
	}




	/*===============Create Admin Insert Data Check=================*/
	/*===============Create Admin Insert Data Check=================*/
	public function add_admin_data_check()
	{
		$this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[3]|is_unique[create_admin.admin_username]');
		$this->form_validation->set_rules('phone_no', 'Phone', 'required|trim|min_length[11]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[10]|valid_email');	
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|trim|min_length[6]|matches[password]');


		// echo "hi"; exit();
		if($this->form_validation->run() == FALSE)
		{
			$data['content'] = 'createAdmin/addAdmin'; 
			$this->load->view('admin/adminMaster', $data);
		}
		else
		{
			/*=================image insert check=================*/
			if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) 
			{
				$filename = 0;
				if($admin_id = $this->Admin_model->add_admin_data_insert($filename)) :
					if($this->input->post('admin_type') == 's'){
						$fields = $this->db->list_fields('admin_access');
						// print_r($fields); die();
						$attr = array('admin_id'=>$admin_id);
						for ($i=2; $i <= 57; $i++) { 
							$attr[$fields[$i]] = '1';
						}

						// echo "<pre>"; print_r($attr); die();
						$res = $this->db->insert('admin_access', $attr);
						
						if($res){
							$data['success']="Save Successfully!";
							$this->session->set_flashdata($data);
							redirect('createAdmin');
						}else{
							$data['error']="Admin Access Not Insert for super Admin!";
							$this->session->set_flashdata($data);
							redirect('createAdmin');
						}
					}

					$data['success']="Save Successfully!";
					$this->session->set_flashdata($data);
					redirect('createAdmin');
				else :
					$data['errorMsg']="Save Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('createAdmin');
				endif;
			}
			else{
				if($file_name = $this->image_upload() ){
					$data=array("image" => $file_name);

					if($this->Admin_model->add_admin_data_insert($file_name)):
						$data['success']="Save Successfully!";
						$this->session->set_flashdata($data);
						redirect('createAdmin');
					else:
						$data['errorMsg']="Save Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('createAdmin');
					endif;
					
				}else{
					$data['errorMsg']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('createAdmin');
				}
			}
			
		}
	}




	/*====================Image Upload In Folder=====================*/
	/*====================Image Upload In Folder=====================*/
	public function image_upload(){
		if($this->Admin_model->is_admin_loged_in() ){
			$type = explode('.', $_FILES['image']['name']);
			$type = $type[count($type)-1];
			$file_name= uniqid(rand()).'.'.$type;

			if( in_array($type, array('jpg', 'png', 'jpeg', 'gif', 'JPEG', 'PNG', 'JPEG', 'GIF' )) ){

					if( is_uploaded_file( $_FILES['image']['tmp_name'] ) ){

					move_uploaded_file( $_FILES['image']['tmp_name'], './libs/upload_pic/admin_pic/'.$file_name );
					return $file_name;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}
	}




	/*======================List Admin Page======================*/
	/*======================List Admin Page======================*/
	public function listOfAdmin()
	{	
		if($this->admin_access('admin_list') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}

		$data['title'] = 'Admin Information List';
		$data['content'] = 'createAdmin/listAdmin'; 
		$data['admins'] = $this->Admin_model->fatch_all_data();
		$this->load->view('admin/adminMaster', $data);
	}





	/*==============View Admin Edit Page With Data==============*/
	/*==============View Admin Edit Page With Data==============*/
	public function edit_admin($id = null)
	{	
		if($this->admin_access('edit_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}

		$data['title'] = 'Edit Admin Information';
		if ($this->Admin_model->edit_admin($id)) {
			$data['admin'] = $this->Admin_model->edit_admin($id);
		}
		$data['content'] = 'createAdmin/editAdmin';
		$this->load->view('admin/adminMaster', $data);
	}





	/*======================Admin Edit Data Check======================*/
	/*======================Admin Edit Data Check======================*/
	public function edit_admin_data_check($id = null)
	{
		$this->form_validation->set_rules('user_name', 'User Name', 'required|trim|min_length[3]');
		$this->form_validation->set_rules('phone_no', 'Phone', 'required|trim|min_length[11]');


		if($this->form_validation->run() == FALSE)
		{	
			$data['title'] = 'Edit Admin Information';
			$data['admin'] = $this->Admin_model->edit_admin($id);
			$data['content'] = 'createAdmin/editAdmin'; 
			$this->load->view('admin/adminMaster', $data);
		}
		else{
			if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) 
			{				
				if($this->Admin_model->edit_admin_data_update($id)) :
						$data['success']="Update Successfully!";
						$this->session->set_flashdata($data);
						redirect('listAdmin');
				else :
					$data['errorMsg']="Update Unsuccessfully!";
					$this->session->set_flashdata($data);
					redirect('listAdmin');
				endif;
			}
			else{
				$old_image = $this->input->post('old_image');
        		unlink('libs/upload_pic/admin_pic/'.$old_image);

				if($file_name = $this->image_upload() )
				{
					$data=array("image" => $file_name);

					if($this->Admin_model->edit_admin_data_update_with_image($file_name, $id)) :
							$data['success']="Update Successfully!";
							$this->session->set_flashdata($data);
							redirect('listAdmin');
					else :
						$data['errorMsg']="Update Unsuccessfully!";
						$this->session->set_flashdata($data);
						redirect('listAdmin');
					endif;	
				}
				else{
					$data['errorMsg']="Image Upload Failed!";
					$this->session->set_flashdata($data);
					redirect('listAdmin');
				}
			}
		}
	}




	/*======================Admin Delete======================*/
	/*======================Admin Delete======================*/
	public function admin_delete($id = null)
	{	
		if($this->admin_access('delete_access') != 1){
			$data['warning_msg']="You Are Not able to Access this Module...!";
			$this->session->set_flashdata($data);
			redirect('administration/dashboard');
		}

		if($this->Admin_model->admin_delete($id))
		{
			$data['errorMsg']="Delete Successfully!";
			$this->session->set_flashdata($data);
			redirect('listAdmin');
		}
		else
		{
			$data['errorMsg']="Delete Unsuccessfully!";
			$this->session->set_flashdata($data);
			redirect('listAdmin');
		}
	}


	/*======================Admin Delete======================*/
	/*======================Admin Delete======================*/
	public function change_pass_page($id = null)
	{
		$data['id'] = $id;
		$this->load->view('admin/createAdmin/changePassword',$data);
	}

	/*================================*/
	public function change_password($id = null)
	{
		$data = $this->Admin_model->change_password($id);
		if($data):
			echo json_encode(TRUE);
		else:
			echo json_encode(FALSE);
		endif;
		
	}




}
