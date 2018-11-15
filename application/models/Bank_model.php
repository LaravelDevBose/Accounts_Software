<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 11/10/2018
 * Time: 2:38 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_model extends CI_Model
{
    public function bank_list(){
        $res = $this->db->where('status', 'a')->order_by('id', 'desc')->get('banks')->result();

        if($res){ return $res; } return FALSE;

    }


    public function storeBankData(){

//        echo '<pre>'; print_r($this->input->post()); die();
        $attr = array(
            'bank_name' => $this->input->post('bank_name'),
            'branch_name' => $this->input->post('branch_name'),
            'account_no' => $this->input->post('account_no'),
            'opening_date' => $this->input->post('opening_date'),
            'current_balance' => $this->input->post('current_balance'),
            'status' => 'a',
            'created_by' =>$this->session->userdata('name'),
			'updated_by'  =>$this->session->userdata('name'),
			'created_at' =>date('Y-m-d H:i:s'),
			'updated_at' =>date('Y-m-d H:i:s')
        );

        $result = $this->db->insert('banks', $attr);

        if($result): return TRUE; else: return FALSE; endif;

    }

    public function bank_info_by_id($id = Null){
        if(!is_null($id)){

            $result = $this->db->where('id', $id)->get('banks')->row();
            if($result){ return $result; }else{ return FALSE; }

        }else{
            return FALSE;
        }
    }

    public function updateBankData($id=Null){

        $attr = array(
            'bank_name' => $this->input->post('bank_name'),
            'branch_name' => $this->input->post('branch_name'),
            'account_no' => $this->input->post('account_no'),
            'opening_date' => $this->input->post('opening_date'),
            'current_balance' => $this->input->post('current_balance'),
            'updated_by'  =>$this->session->userdata('name'),
            'updated_at' =>date('Y-m-d H:i:s')
        );

        $this->db->where('id', $id);
        $qu = $this->db->update('banks', $attr);

        if ( $this->db->affected_rows()) {
            return TRUE;
        }else {
            return FALSE;
        }

    }

    public function bank_info_delete($id = Null){

        $attr = array('status'=>'d');
        $this->db->where('id', $id);
        $this->db->update('banks', $attr);

        if ( $this->db->affected_rows()) {
            return TRUE;
        }else {
            return FALSE;
        }
    }


    /*========== Bank Total Opening balance ===========*/
    public function bank_current_balance(){
        $res = $this->db->where('status','a')->select_sum('current_balance','amount')->get('banks')->row();

        if($res){
            return $res;
        }
        return FALSE;

    }
}