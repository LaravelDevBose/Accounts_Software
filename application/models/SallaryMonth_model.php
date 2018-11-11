<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class SallaryMonth_model extends CI_Model
{

	/*====== Get All Month Name ======*/
	public function all_month_name()
	{
		$res = $this->db->order_by('id', 'asc')->get('months')->result();
		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*======== Get All Sallay Month Info ========*/
	public function get_all_sallay_month()
	{
		$this->db->select('sallay_months.*, months.month_name');
		$this->db->from('sallay_months');
		$this->db->join('months', 'sallay_months.month_id = months.id');
		$res = $this->db->where('sallay_months.status', 'a')->order_by('sallay_months.id', 'desc')->get()->result();

		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*==== store data =======*/
	public function sallary_month_store()
	{
		$attr = array(
			'year'=>$this->input->post('year'),
			'month_id'=>$this->input->post('month_id'),
			'note'=>$this->input->post('note'),
			'status'=>'a',
			'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d'),
			'updated_at' =>date('Y-m-d')
		);

		$res = $this->db->insert('sallay_months', $attr);
		if($res){return TRUE;}else{return FALSE; }
	}

	/*====== Sallary month by id = ======*/
	public function sallary_month_by_id($id=Null)
	{
		$this->db->select('sallay_months.*, months.month_name');
		$this->db->from('sallay_months');
		$this->db->join('months', 'sallay_months.month_id = months.id');
		$res = $this->db->where('sallay_months.id', $id)->get()->row();

		if($res){
			return $res;
		}else{
			return FALSE;
		}
	}

	/*======== Sallary Month update ==========*/
	public function sallary_month_update($id=Null)
	{
		$attr = array(
			'year'=>$this->input->post('year'),
			'month_id'=>$this->input->post('month_id'),
			'note'=>$this->input->post('note'),
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d H:i:s')
		);

		$this->db->where('id', $id);
		$this->db->update('sallay_months', $attr);

		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/*======== Sallary_month_delete =======*/
	public function sallary_month_delete($id=Null)
	{
		$attr = array(
			'status' 	=> 'd',
			'updated_by'  =>$this->session->userdata('name'),
			'updated_at' =>date('Y-m-d')
		);

		$this->db->where('id', $id);
		$this->db->update('sallay_months', $attr);

		if($this->db->affected_rows()){
			return TRUE;
		}else{
			return FALSE;
		}
	}


	/*========= Insert Month name in months Table ====*/
    public function insert_sallary_month_data(){

        $month_name = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $k = 0;

        for($i = 0; $i<12; $i++){
            $attr = array(
                'month_name'=> $month_name[$i]
            );

            $res = $this->db->insert('months', $attr);
            if($res){
                $k++;
            }
        }

        if($k== 12){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}