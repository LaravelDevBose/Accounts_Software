<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/25/2018
 * Time: 5:17 PM
 */

class Voucher_model extends CI_Model
{
    public function vouchar_code(){
        $last_coll = $this->db->order_by('v_id', 'desc')->limit(1)->get('vouchers')->row();
        if(is_null($last_coll)|| !isset($last_coll)){
            $coll_sl = 'V-00001';
        }else{

            $num = substr($last_coll->v_code, 3, strlen($last_coll->v_code));

            if($num < 9):
                $num+=1;
                $coll_sl = 'V-0000'.$num;
            elseif($num < 99):
                $num+=1;
                $coll_sl = 'V-000'.$num;
            elseif($num < 999):
                $num+=1;
                $coll_sl = 'V-00'.$num;
            elseif($num<9999):
                $num+=1;
                $coll_sl = 'V-0'.$num;
            else:
                $num+=1;
                $coll_sl = 'V-'.$num;
            endif;
        }

        return $coll_sl; 
    }

    public function get_all_voucher_list(){
        $res = $this->db->where('v_status', 'A')->order_by('v_id', 'desc')->get('vouchers')->result();

        if($res){
            return $res;
        }

        return FALSE;
    }

    public function get_all_pending_list(){
        $res = $this->db->where('v_status', 'A')->where('approve_status','P')->order_by('v_id', 'desc')->get('vouchers')->result();

        if($res){
            return $res;
        }

        return FALSE;
    }

    public function get_all_active_list(){
        $res = $this->db->where('v_status', 'A')->where('approve_status','A')->order_by('v_id', 'desc')->get('vouchers')->result();

        if($res){
            return $res;
        }

        return FALSE;
    }

    public function store_voucher_data(){

        $attr = array(
            'v_code' =>$this->vouchar_code(),
            'value_date'=>$this->input->post('value_date'),
            'dr_ah_id'=>$this->input->post('dr_ah_id'),
            'dr_amount'=>$this->input->post('dr_amount'),
            'dr_note'=>$this->input->post('dr_note'),
            'cr_ah_id'=>$this->input->post('cr_ah_id'),
            'cr_amount'=>$this->input->post('cr_amount'),
            'cr_note'=>$this->input->post('cr_note'),
            'approve_status'=>'P',
            'v_status'=>'A',
            'created_by'=>$this->session->userData('name'),
            'created_at'=>date('Y-m-d H:i:s'),
        );

        $res = $this->db->insert('vouchers', $attr);
        $id = $this->db->insert_id();

        if($res){
            return $id;
        }

        return FALSE;
    }

    public function get_voucher_data_by_id($id = Null){

        $res = $this->db->where('v_status', 'A')->where('v_id', $id)->get('vouchers')->row();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function approve_voucher($id = Null){

        $attr = array(
            'approve_status'=>'A',
            'approved_by'=>$this->session->userData('name'),
            'updated_by'=>$this->session->userData('name'),
            'updated_at'=>date('Y-m-d H:i:s'));
        $this->db->where('v_id', $id);
        $this->db->update('vouchers', $attr);

        if($this->db->affected_rows()){return TRUE;}return FALSE;
    }

    public function delete_voucher($id = Null){

        $attr = array('v_status'=>'D','updated_by'=>$this->session->userData('name'), 'updated_at'=>date('Y-m-d H:i:s'));
        $this->db->where('v_id', $id);
        $this->db->update('vouchers', $attr);

        if($this->db->affected_rows()){return TRUE;}return FALSE;
    }

    public function account_head_wise_dr_sum($acc_id = Null){
        $form = $this->session->userdata('date_from');
        $to = $this->session->userdata('date_to');

        $res = $this->db->select_sum('dr_amount')->where('dr_ah_id', $acc_id)->where('v_status', 'A')
            ->where('approve_status','A')->where("DATE_FORMAT(value_date,'%Y-%m-%d') >=",$form)->where("DATE_FORMAT(value_date,'%Y-%m-%d') <=",$to)
            ->get('vouchers')->row();

        if($res->dr_amount == ''){
            return 0;
        }else{
            return $res->dr_amount;
        }
    }

    public function account_head_wise_cr_sum($acc_id = Null){
        $form = $this->session->userdata('date_from');
        $to = $this->session->userdata('date_to');

        $res = $this->db->select_sum('cr_amount')->where('cr_ah_id', $acc_id)->where('v_status', 'A')
            ->where('approve_status','A')->where("DATE_FORMAT(value_date,'%Y-%m-%d') >=",$form)->where("DATE_FORMAT(value_date,'%Y-%m-%d') <=",$to)
            ->get('vouchers')->row();


        if($res->cr_amount == ''){
            return 0;
        }else{
            return $res->cr_amount;
        }
    }

    public function account_wise_voucher()
    {
        $form = $this->input->post('date_from');
        $to = $this->input->post('date_to');
        $ah_id = $this->input->post('ah_id');

        $res = $this->db->where('cr_ah_id', $ah_id)->or_where('dr_ah_id', $ah_id)->where('v_status', 'A')
            ->where('approve_status','A')->where("DATE_FORMAT(value_date,'%Y-%m-%d') >=",$form)->where("DATE_FORMAT(value_date,'%Y-%m-%d') <=",$to)
            ->get('vouchers')->result();

        if($res){
            return $res;
        }
        return false;
    }

}