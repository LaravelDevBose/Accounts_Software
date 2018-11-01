<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminAccess extends MY_Controller
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

	public function index()
	{
		if (!$this->Admin_model->is_admin_loged_in()) 
		{
			redirect('Adminlogin/?logged_in_first');
		}else{
			redirect('Admindashboard');
		}
	}


	public function show_access_page($admin_id = Null)
	{  
        if($this->admin_access('admin_access') != 1){
            $data['warning_msg']="You Are Not able to Access this Module...!";
            $this->session->set_flashdata($data);
            redirect('administration/dashboard');
        }

		$data['title'] = 'Admin Access';
		$data['content'] = 'createAdmin/adminAccess';
		$data['id'] = $admin_id;
		$data['access'] = $this->db->where('admin_id', $admin_id)->get('admin_access')->row();
		$this->load->view('admin/adminMaster', $data);
	}

	public function define_access()
    {	
    	// echo "<pre>"; print_r($this->input->post()); die();

        $admin_id = $this->input->post('admin_id', TRUE);

        $check=$this->db->from('admin_access')->where('admin_id',$admin_id)->count_all_results();

        $attr = array(
            'admin_id'                 	=> $admin_id,
            'sale_module'              	=> ($this->input->post('sale_module'))?1:0, 
            'customer_order'        	=> ( $this->input->post('customer_order'))?1:0, 
            'order_entry'          		=> ( $this->input->post('order_entry'))?1:0, 
            'all_order_list'            => ( $this->input->post('all_order_list'))?1:0, 
            'pending_order_list'        => ( $this->input->post('pending_order_list'))?1:0, 
            'process_order_list'        => ( $this->input->post('process_order_list'))?1:0, 
            'customer_entry'            => ( $this->input->post('customer_entry'))?1:0, 
            'customer_list'             => ( $this->input->post('customer_list'))?1:0, 
            
            'purchase_module'         	=> ( $this->input->post('purchase_module'))?1:0, 
            'purchase_entry'  			=> ( $this->input->post('purchase_entry'))?1:0, 
            'purchase_list'         	=> ( $this->input->post('purchase_list'))?1:0, 
            'transport_status'         	=> ( $this->input->post('transport_status'))?1:0, 
            'supplier'           		=> ( $this->input->post('supplier'))?1:0, 
            'transport_head'          	=> ( $this->input->post('transport_head'))?1:0,

            'account_module'          	=> ( $this->input->post('account_module'))?1:0, 
            'collection'           		=> ( $this->input->post('collection'))?1:0, 
            'payment'           		=> ( $this->input->post('payment'))?1:0, 
            'ofice_payment'           	=> ( $this->input->post('ofice_payment'))?1:0, 
            'other_income'           	=> ( $this->input->post('other_income'))?1:0, 
            'check_option'           	=> ( $this->input->post('check_option'))?1:0, 
            'check_entry'           	=> ( $this->input->post('check_entry'))?1:0, 
            'pending_check_list'        => ( $this->input->post('pending_check_list'))?1:0, 
            'reminder_check_list'       => ( $this->input->post('reminder_check_list'))?1:0, 
            'paid_check_list'           => ( $this->input->post('paid_check_list'))?1:0, 

            'hr_module'          		=> ( $this->input->post('hr_module'))?1:0, 
            'sallay_payment'            => ( $this->input->post('sallay_payment'))?1:0, 
            'employee_list'             => ( $this->input->post('employee_list'))?1:0, 
            'employee_entry'         	=> ( $this->input->post('employee_entry'))?1:0, 
            'monthe_entry'          	=> ( $this->input->post('monthe_entry'))?1:0,

            'report_module'             => ( $this->input->post('report_module'))?1:0, 
            'stock_report'             	=> ( $this->input->post('stock_report'))?1:0, 
            'car_full_report'           => ( $this->input->post('car_full_report'))?1:0, 
            'car_coll_report'           => ( $this->input->post('car_coll_report'))?1:0, 
            'cus_due_report'            => ( $this->input->post('cus_due_report'))?1:0,
            'cus_order_report'        	=> ( $this->input->post('cus_order_report'))?1:0,
            'deliv_order_report'        => ( $this->input->post('deliv_order_report'))?1:0,
            'lc_order_report'           => ( $this->input->post('lc_order_report'))?1:0,
            'collection_report'         => ( $this->input->post('collection_report'))?1:0,
            'cus_coll_report'           => ( $this->input->post('cus_coll_report'))?1:0,
            'date_payment_report'       => ( $this->input->post('date_payment_report'))?1:0,
            'supplier_payment_report'   => ( $this->input->post('supplier_payment_report'))?1:0,
            'office_payment_report'     => ( $this->input->post('office_payment_report'))?1:0,
            'sallary_report'            => ( $this->input->post('sallary_report'))?1:0,
            'emp_sallary_report'        => ( $this->input->post('emp_sallary_report'))?1:0,
            'lc_list_report'            => ( $this->input->post('lc_list_report'))?1:0,
            'cus_list_report'           => ( $this->input->post('cus_list_report'))?1:0,

            'administration'     		=> ( $this->input->post('administration'))?1:0,
            'lc_entry'            		=> ( $this->input->post('lc_entry'))?1:0,
            'expense_head_entry'        => ( $this->input->post('expense_head_entry'))?1:0,
            'company_info'             	=> ( $this->input->post('company_info'))?1:0,
            'admin'             		=> ( $this->input->post('admin'))?1:0,
            'admin_entry'             	=> ( $this->input->post('admin_entry'))?1:0,
            'admin_list'             	=> ( $this->input->post('admin_list'))?1:0,
            'admin_access'              => ( $this->input->post('admin_access'))?1:0,
            
            'edit_access'               => ( $this->input->post('edit_access'))?1:0,
            'delete_access'             => ( $this->input->post('delete_access'))?1:0,
        );

        // echo "<pre>"; print_r($attr); die();
        if($check == 0):

            $insert = $this->db->insert('admin_access', $attr);
       
            if ($insert) { 
            	$data['success'] = 'Admin Access Update Successfully.!';
            	$this->session->set_flashdata($data);
            	redirect("listAdmin"); 
            } 
            else { 
            	$data['error'] = 'Admin Access Update Un-Successfully.!';
            	$this->session->set_flashdata($data);
            	redirect("access_page/".$admin_id); 
            }

        else:
            $this->db->where('admin_id', $admin_id);
            $qu = $this->db->update('admin_access', $attr);
       
            if($this->db->affected_rows()){ 
            		$data['success'] = 'Admin Access Update Successfully.!';
	            	$this->session->set_flashdata($data);
	            	redirect("listAdmin"); 
            } 
            else{
            	$data['error'] = 'Admin Access Update Un-Successfully.!';
            	$this->session->set_flashdata($data);
            	redirect("access_page/".$admin_id);
            }
        endif;
        
    }

}