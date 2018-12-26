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
}