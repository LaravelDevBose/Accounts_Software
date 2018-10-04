<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Order_model extends CI_Model
{

	public function store_order_info($cus_id = Null)
	{
		if(!is_null($cus_id)){
			$attr = array(
				'cus_id'	=>$cus_id,
				'ord_lc_no'	=>$this->input->post('ord_lc_no'),
				'ord_car_model'	=>$this->input->post('ord_car_model'),
				'ord_color'	=>$this->input->post('ord_color'),
				'ord_engine_no'	=>$this->input->post('ord_engine_no'),
				'ord_chassis_no'	=>$this->input->post('ord_chassis_no'),
				'order_no'	=>$this->input->post('order_no'),
				'ord_other_tirm'	=>$this->input->post('ord_other_tirm'),
				'ord_make_model'	=>$this->input->post('ord_make_model'),
				'ord_grade'	=>$this->input->post('ord_grade'),
				'ord_type'	=>$this->input->post('ord_type'),
				'ord_year'	=>$this->input->post('ord_year'),
				'ord_mileage'	=>$this->input->post('ord_mileage'),
				'ord_budget_range'	=>$this->input->post('ord_budget_range'),
				'status'	=>'a'
			);

			$result = $this->db->insert('orders', $attr);
			$cus_id = $this->db->insert_id();
			
			if($result): return True; else: return FALSE; endif;
		}else{
			return FALSE; 
		}
	}
}