<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/25/2018
 * Time: 5:23 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insurance_model extends CI_Model
{

    public function get_all_company_info(){
        $res = $this->db->where('in_comp_status', 'A')->order_by('in_comp_id', 'desc')->get('insurance_companies')->result();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function insurance_company_insert(){
        $attr = array(
            'in_comp_name'=>$this->input->post('in_comp_name'),
            'owner_name'=>$this->input->post('owner_name'),
            'in_comp_phone'=>$this->input->post('in_comp_phone'),
            'in_comp_email'=>$this->input->post('in_comp_email'),
            'in_comp_address'=>$this->input->post('in_comp_address'),
            'in_comp_status'=>'A',
            'created_by'=>$this->session->userdata('name'),
            'created_at'=>date('Y-m-d H:i:s'),
        );

        $res = $this->db->insert('insurance_companies', $attr);

        if($res){
            return TRUE;
        }

        return FALSE;
    }

    public function get_insurance_data_by_id($id = Null){

        $res = $this->db->where('in_comp_id', $id)->get('insurance_companies')->row();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function insurance_company_update($id = Null){
        $attr = array(
            'in_comp_name'=>$this->input->post('in_comp_name'),
            'owner_name'=>$this->input->post('owner_name'),
            'in_comp_phone'=>$this->input->post('in_comp_phone'),
            'in_comp_email'=>$this->input->post('in_comp_email'),
            'in_comp_address'=>$this->input->post('in_comp_address'),
            'updated_by'=>$this->session->userdata('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        $this->db->where('in_comp_id', $id);
        $this->db->update('insurance_companies', $attr);

        if($this->db->affected_rows()){
            return TRUE;
        }
        return FALSE;
    }

    public function insurance_company_delete($id = Null){
        $attr = array(
            'in_comp_status'=>'D',
            'updated_by'=>$this->session->userdata('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );

        $this->db->where('in_comp_id', $id);
        $this->db->update('insurance_companies', $attr);

        if($this->db->affected_rows()){
            return TRUE;
        }
        return FALSE;
    }
}