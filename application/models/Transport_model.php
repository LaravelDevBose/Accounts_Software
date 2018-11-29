<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Transport_model extends CI_Model
{
	public function car_last_location($id=Null)
	{
		$this->db->select('transports.*, trans_heads.head_name');
		$this->db->from('transports');
		$this->db->join('trans_heads', 'transports.trans_head_id = trans_heads.id' );
		$this->db->where('transports.id', $id);
		$result = $this->db->get()->row();

		if($result){
			return $result;
		}else{
			return FALSE;
		}
	}

	public function car_transport_location_change()
	{
		$attr = array(
			'purchase_id' => $this->input->post('purchase_id'),
			'trans_head_id' => $this->input->post('trans_head_id'),
			'trans_date' => $this->input->post('trans_date'),
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d H:i:s')
		);
		$result = $this->db->insert('transports', $attr);
		$trans_id = $this->db->insert_id();

		if($result): return $trans_id; else: return FALSE; endif;
	}


	public function get_car_all_shipping_statement($pus_id = Null){

        $this->db->select('transports.*, trans_heads.head_name');
		$this->db->from('transports');
		$this->db->join('trans_heads', 'transports.trans_head_id = trans_heads.id' );
		$this->db->where('transports.purchase_id', $pus_id);
		$result = $this->db->order_by('transports.trans_date', 'desc')->get()->result();

		if($result){
            return $result;
        }else{
            return FALSE;
        }
    }
}