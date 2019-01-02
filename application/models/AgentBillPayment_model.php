<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 1/2/2019
 * Time: 11:13 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AgentBillPayment_model extends CI_Model
{

    public function get_agent_all_bill_info(){


        $this->db->select('agent_bill_payments.*,agents.agent_name')->from('agent_bill_payments');
        $this->db->join('agents', 'agents.id = agent_bill_payments.agent_id', 'left');
        $this->db->where('agent_bill_payments.entry_type','Bill')->where('agent_bill_payments.bp_status', 'A');
        $res = $this->db->order_by('agent_bill_payments.bill_id', 'desc')->get()->result();
        if($res){
            return $res;
        }
        return FALSE;
    }

    public function get_agent_all_payment_info(){
        $this->db->select('agent_bill_payments.*,agents.agent_name')->from('agent_bill_payments');
        $this->db->join('agents', 'agents.id = agent_bill_payments.agent_id', 'left');
        $this->db->where('agent_bill_payments.entry_type','Pay')->where('agent_bill_payments.bp_status', 'A');
        $res = $this->db->order_by('agent_bill_payments.bill_id', 'desc')->get()->result();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function agent_bill_payment_store($entry_code = Null){

        $attr = array(
            'entry_code'=>$entry_code,
            'bp_date'=>$this->input->post('bp_date'),
            'bill_no'=>$this->input->post('bill_no'),
            'agent_id'=>$this->input->post('agent_id'),
            'particulars'=>$this->input->post('particulars'),
            'remarks'=>$this->input->post('remarks'),
            'bill_amount'=>$this->input->post('bill_amount'),
            'paid_amount'=>$this->input->post('paid_amount'),
            'entry_type'=>$this->input->post('entry_type'),
            'bp_status'=>'A',
            'created_by'=>$this->session->userData('name'),
            'created_at'=>date('Y-m-d H:i:s'),
        );

        $res = $this->db->insert('agent_bill_payments', $attr);

        if($res){
            return TRUE;
        }

        return FALSE;

    }

    public function get_data_by_id($id = Null){
        $res = $this->db->where('bill_id',$id)->get('agent_bill_payments')->row();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function agent_bill_payment_update($id = Null){
        $attr = array(
            'bp_date'=>$this->input->post('bp_date'),
            'bill_no'=>$this->input->post('bill_no'),
            'agent_id'=>$this->input->post('agent_id'),
            'particulars'=>$this->input->post('particulars'),
            'remarks'=>$this->input->post('remarks'),
            'bill_amount'=>$this->input->post('bill_amount'),
            'paid_amount'=>$this->input->post('paid_amount'),
            'updated_by'=>$this->session->userData('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );

        $this->db->where('bill_id', $id);
        $this->db->update('agent_bill_payments', $attr);

        if($this->db->affected_rows()){
            return TRUE;
        }

        return FALSE;
    }

    public function agent_bill_payment_delete($id = Null){

        $attr = array(
            'bp_status'=>'D',
            'updated_by'=>$this->session->userData('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
            );
        $this->db->where('bill_id', $id);
        $this->db->update('agent_bill_payments', $attr);

        if($this->db->affected_rows()){
            return TRUE;
        }

        return FALSE;
    }

    public function sum_agent_bill_amount($id = Null){

        $res = $this->db->select_sum('bill_amount')->where('agent_id', $id)->where('bp_status', 'A')
            ->where('entry_type', 'Bill')->get('agent_bill_payments')->row();


        if($res){
            if($res->bill_amount){
                return $res->bill_amount;
            }
            return 1;
        }
        return FALSE;
    }

    public function sum_agent_payment_amount($id = Null){

        $res = $this->db->select_sum('paid_amount')->where('agent_id', $id)->where('bp_status', 'A')
            ->where('entry_type', 'Pay')->get('agent_bill_payments')->row();

        if($res){
            return $res->paid_amount;
        }

        return FALSE;
    }
}