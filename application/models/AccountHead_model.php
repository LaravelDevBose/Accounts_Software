<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 12/25/2018
 * Time: 5:19 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AccountHead_model extends CI_Model
{

    public function account_head_code(){
        $last_coll = $this->db->order_by('ah_id', 'desc')->limit(1)->get('account_heads')->row();
        if(is_null($last_coll)|| !isset($last_coll)){
            $coll_sl = 'AH-00001';
        }else{

            $num = substr($last_coll->ah_code, 3, strlen($last_coll->ah_code));

            if($num < 9):
                $num+=1;
                $coll_sl = 'AH-0000'.$num;
            elseif($num < 99):
                $num+=1;
                $coll_sl = 'AH-000'.$num;
            elseif($num < 999):
                $num+=1;
                $coll_sl = 'AH-00'.$num;
            elseif($num<9999):
                $num+=1;
                $coll_sl = 'AH-0'.$num;
            else:
                $num+=1;
                $coll_sl = 'AH-'.$num;
            endif;
        }

        return $coll_sl;
    }

    public function all_account_head_list(){

        $res = $this->db->where('ah_status', 'A')->order_by('ah_id', 'desc')->get('account_heads')->result();

        if($res){
            return $res;
        }
        return false;
    }

    public function account_head_insert(){

        $attr = array(
            'ah_code' =>$this->account_head_code(),
            'ah_name'=>$this->input->post('ah_name'),
            'ah_status'=>'A',
            'created_by'=> $this->session->userData('name'),
            'created_at'=>date('Y-m-d H:i:s'),
        );

        $res = $this->db->insert('account_heads', $attr);
        if($res){
            return $res;
        }
        return false;
    }

    public function account_head_update($id=Null){

        $attr = array(
            'ah_name'=>$this->input->post('ah_name'),
            'updated_by'=> $this->session->userData('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        $this->db->where('ah_id', $id);
        $this->db->update('account_heads', $attr);
        if($this->db->affected_rows()){return TRUE; }else{ return FALSE; }
    }

    public function data_by_id($id=Null){

        $res = $this->db->where('ah_id', $id)->get('account_heads')->row();
        if($res){return $res;} return false;
    }

    public function delete_account_head($id = Null){
        $attr = array('ah_status'=>'D');

        $this->db->where('ah_id', $id);
        $this->db->update('account_heads', $attr);

        if($this->db->affected_rows()){return TRUE;}return FALSE;
    }
}