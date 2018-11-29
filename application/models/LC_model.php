<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class LC_model extends CI_Model
{
	/*======== get all data info =========*/
	public function get_all_lc_info()
	{
		$this->db->select('tbl_lcs.*, companies.comp_name, suppliers.sup_name')->from('tbl_lcs');
		$this->db->join('companies','tbl_lcs.comp_id = companies.id');
		$this->db->join('suppliers','tbl_lcs.supplier_id = suppliers.id');
		$result = $this->db->where('tbl_lcs.status','a')->get()->result();

		if($result){ return $result; }else{ return FALSE;  }
	}

	public function get_lc_details_by_lc_id($lc_id = Null){
        if(!is_null($lc_id)){
            $this->db->select('lc_details.*, customers.cus_name, orders.order_no, purchase.puc_chassis_no,purchase.pus_sl,
                        purchase.puc_engine_no, purchase.puc_car_model,purchase.puc_year, purchase.puc_color   ');
            $this->db->from('lc_details');
            $this->db->join('purchase', 'lc_details.pus_id=purchase.id');
            $this->db->join('orders', 'lc_details.order_id=orders.id', 'left');
            $this->db->join('customers', 'lc_details.cus_id=customers.id','left');
            $result = $this->db->where('lc_details.lc_id', $lc_id)->where('lc_details.status', 'a')->get()->result();

            if($result){ return $result; }else{ return FALSE; }
        }else{
            return FALSE;
        }
    }

	/*========= Store Function ==========*/
	public function store_lc_info()
	{
		$attr = array(
			'lc_no' =>$this->input->post('lc_no'),
			'lc_date' =>$this->input->post('lc_date'),
			'lc_amount' =>$this->input->post('lc_amount'),
			'car_qty' =>$this->input->post('car_qty'),
			'bank_name' =>$this->input->post('bank_name'),
			'branch_name' =>$this->input->post('branch_name'),
			'lc_insur' =>$this->input->post('lc_insur'),
			'comp_id' =>$this->input->post('comp_id'),
			'supplier_id' =>$this->input->post('supplier_id'),
			'agent_id' =>$this->input->post('agent_id'),
			'ship_name' =>$this->input->post('ship_name'),
			'arriv_date' =>$this->input->post('arriv_date'),
			'port_name' =>$this->input->post('port_name'),
			'note' =>$this->input->post('note'),
			'status'=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$result = $this->db->insert('tbl_lcs', $attr);
		$lc_id = $this->db->insert_id();
		if($result){ return $lc_id;}else{return FALSE; }
	}

	/*=========== Store Lc Details Informaion*/
	public function store_lc_details_info($lc_id=Null, $cart = Null)
	{
		$attr = array(
			'lc_id' =>$lc_id,
			'pus_id' =>$cart['id'],
			'cus_id' =>$cart['cus_id'],
			'order_id' =>$cart['order_id'],
			'car_value' =>$cart['car_value'],
			'fright_value' =>$cart['fright_value'],
			'total' =>$cart['price']
		);

		$result = $this->db->insert('lc_details', $attr);
		if($result){ return TRUE;}else{return FALSE; }
	}

	/*=======  find data by id =========*/
	public function lc_data_by_id($id=Null)
	{
		if(!is_null($id)){
			$this->db->select('tbl_lcs.*, companies.comp_name,suppliers.sup_code, suppliers.sup_name, agents.agent_code, agents.agent_name');
			$this->db->from('tbl_lcs');
			$this->db->join('companies', 'companies.id = tbl_lcs.comp_id', 'left');
			$this->db->join('suppliers', 'suppliers.id = tbl_lcs.supplier_id', 'left');
			$this->db->join('agents', 'agents.id = tbl_lcs.agent_id', 'left');
            $result = $this->db->where('tbl_lcs.id', $id)->where('tbl_lcs.status', 'a')->get()->row();

			if($result){ return $result; }else{ return FALSE; }
		}else{
			return FALSE;
		}
	}

	/*===== find lc details by id =========*/
	public function lc_deatils_by_id($id=Null)
	{
		if(!is_null($id)){
			$result = $this->db->where('id', $id)->get('lc_details')->row();

			if($result){ return $result; }else{ return FALSE; }
		}else{
			return FALSE;
		}
	}

	/**====== Find Lc Details_ info ===================**/
	public function find_lc_details_info($lc_id=Null)
	{
		$this->db->select('purchase.puc_chassis_no, purchase.puc_engine_no, purchase.puc_car_model, purchase.puc_color, purchase.puc_year, lc_details.*')->from('lc_details');
		$this->db->join('purchase', 'lc_details.pus_id = purchase.id');
		$result = $this->db->where('lc_details.lc_id', $lc_id)->where('lc_details.status','a')->get()->result();
		if($result){ return $result; }else{ return FALSE; }
	}


	/*====================Update Lc Data ============================*/	
	public function update_lc_data($id= null)
	{
		$attr = array(
			'lc_no' =>$this->input->post('lc_no'),
			'lc_date' =>$this->input->post('lc_date'),
			'lc_amount' =>$this->input->post('lc_amount'),
			'car_qty' =>$this->input->post('car_qty'),
			'bank_name' =>$this->input->post('bank_name'),
			'branch_name' =>$this->input->post('branch_name'),
			'lc_insur' =>$this->input->post('lc_insur'),
			'comp_id' =>$this->input->post('comp_id'),
			'supplier_id' =>$this->input->post('supplier_id'),
			'agent_id' =>$this->input->post('agent_id'),
			'ship_name' =>$this->input->post('ship_name'),
			'arriv_date' =>$this->input->post('arriv_date'),
			'port_name' =>$this->input->post('port_name'),
			'note' =>$this->input->post('note'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s'),
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_lcs', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*====================Delete Lc Data ============================*/	
	public function delete_lc_data($id= null)
	{
		$attr = array(
			'status' => 'd'
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('tbl_lcs', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*========== Delete lc details from table=========*/
	public function lc_datails_destroy($id=Null)
	{	

		$attr = array(
			'status' => 'd'
		);

		$this->db->where('id', $id);
		$qu = $this->db->update('lc_details', $attr);
		
		if ( $this->db->affected_rows()) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	/*========= get all lc_details ===========*/
    public function update_lc_details_by_id($lc_id= Null, $pus_id = Null, $cus_id = Null, $order_id=Null){

        $detail = $this->db->where('pus_id', $pus_id)->where('lc_id', $lc_id)->where('status', 'a')->get('lc_details')->row();

        $attr = array(
            'cus_id' => $cus_id,
            'order_id' => $order_id,
        );

        $this->db->where('id', $detail->id);
        $this->db->update('lc_details', $attr);

        if ( $this->db->affected_rows()) {
            return TRUE;
        }else {
            return FALSE;
        }

    }

    public  function  get_lc_documents($lc_id = Null, $pus_id = Null){

         $this->db->where('lc_id', $lc_id)->where('pus_id', $pus_id)->where('type', 'D')->where('status', 'a');
          $res =$this->db->order_by('id', 'desc')->get('lc_documents')->result();

        if ( $res) {
            return $res;
        }else {
            return FALSE;
        }
    }
    public function store_lc_documents(){
        $type = 'D';
        $pus_id = $this->input->post('pus_id');
        $lc_id = $this->input->post('lc_id');

        $filesCount = count($_FILES['document']['name']);
        if($filesCount > 0){

            for($i = 0; $i < $filesCount; $i++){
                $_FILES['image']['name']     = $_FILES['document']['name'][$i];
                $_FILES['image']['type']     = $_FILES['document']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['document']['tmp_name'][$i];
                $_FILES['image']['error']     = $_FILES['document']['error'][$i];
                $_FILES['image']['size']     = $_FILES['document']['size'][$i];
                $file_name = $this->image_upload($_FILES['image']['name'], $_FILES['image']['tmp_name']);

                $this->image_resize($file_name);
                $this->insert_image_in_database($file_name, $pus_id, $lc_id, $type);
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
        $configSize1['new_image'] 		 = 'libs/upload_pic/lc_document/';

        $this->image_lib->initialize($configSize1);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    /*==========Insert Image Info in Database===========*/
    public function insert_image_in_database($image_path=null, $pus_id = null, $lc_id = Null, $type=Null)
    {
        $attr=array(
            'lc_id'  =>$lc_id,
            'pus_id' =>$pus_id,
            'image_path' => $image_path,
            'type' => $type,
            'status' => 'a'
        );

        $insert = $this->db->insert('lc_documents', $attr);

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

                move_uploaded_file( $temp_name, 'libs/upload_pic/lc_document/'.$file_name );
                return 'libs/upload_pic/lc_document/'.$file_name;

            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}