<?php
/**
 * Created by PhpStorm.
 * User: Arup
 * Date: 1/3/2019
 * Time: 1:11 PM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class InsuranceBill_model extends CI_Model
{

    public function insurance_bill_code(){
        $bill_info = $this->db->where('in_bill_type', 'Bill')->order_by('in_bill_id', 'desc')->limit(1)->get('insurance_bills')->row();
        if(is_null($bill_info)|| !isset($bill_info)){
            $bill_code = 'IB00001';
        }else{

            $num = substr($bill_info->in_bill_code, 2, strlen($bill_info->in_bill_code));

            if($num < 9):
                $num+=1;
                $bill_code = 'IB0000'.$num;
            elseif($num < 99):
                $num+=1;
                $bill_code = 'IB000'.$num;
            elseif($num < 999):
                $num+=1;
                $bill_code = 'IB00'.$num;
            elseif($num<9999):
                $num+=1;
                $bill_code = 'IB0'.$num;
            else:
                $num+=1;
                $bill_code = 'IB'.$num;
            endif;
        }

        return $bill_code;
    }

    public function insurance_payment_code(){
        $bill_info = $this->db->where('in_bill_type', 'Pay')->order_by('in_bill_id', 'desc')->limit(1)->get('insurance_bills')->row();
        if(is_null($bill_info)|| !isset($bill_info)){
            $bill_code = 'IP00001';
        }else{

            $num = substr($bill_info->in_bill_code, 2, strlen($bill_info->in_bill_code));

            if($num < 9):
                $num+=1;
                $bill_code = 'IP0000'.$num;
            elseif($num < 99):
                $num+=1;
                $bill_code = 'IP000'.$num;
            elseif($num < 999):
                $num+=1;
                $bill_code = 'IP00'.$num;
            elseif($num<9999):
                $num+=1;
                $bill_code = 'IP0'.$num;
            else:
                $num+=1;
                $bill_code = 'IP'.$num;
            endif;
        }

        return $bill_code;
    }

    public function get_all_insurance_bill_data(){

        $this->db->select('insurance_bills.*,insurance_companies.in_comp_name, customers.cus_name,orders.ord_chassis_no, orders.order_no,tbl_lcs.lc_no');
        $this->db->from('insurance_bills');
        $this->db->join('insurance_companies','insurance_companies.in_comp_id = insurance_bills.in_comp_id');
        $this->db->join('customers','customers.id = insurance_bills.cus_id','left');
        $this->db->join('orders','orders.id = insurance_bills.order_id','left');
        $this->db->join('tbl_lcs','tbl_lcs.id = insurance_bills.lc_id','left');
        $this->db->where('insurance_bills.in_bill_type','Bill')->where('insurance_bills.in_bill_status', 'A');
        $res = $this->db->order_by('insurance_bills.in_bill_id', 'desc')->get()->result();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function get_all_insurance_payment_data(){
        $this->db->select('insurance_bills.*,insurance_companies.in_comp_name');
        $this->db->from('insurance_bills');
        $this->db->join('insurance_companies','insurance_companies.in_comp_id = insurance_bills.in_comp_id');
        $this->db->where('insurance_bills.in_bill_type','Pay')->where('insurance_bills.in_bill_status', 'A');
        $res = $this->db->order_by('insurance_bills.in_bill_id', 'desc')->get()->result();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function insurance_bill_payment_store(){
        $data = array();

        if($this->input->post('in_bill_type') == 'Bill'){
            $code = $this->insurance_bill_code();

        }else{
            $code = $this->insurance_payment_code();
        }
        $data = $this->payable_calculation($this->input->post('net_premium'));
        $attr = array(
            'in_bill_code'=>$code,
            'in_bill_type'=>$this->input->post('in_bill_type'),
            'in_bill_date'=>$this->input->post('in_bill_date'),
            'mc_crt_no'=>$this->input->post('mc_crt_no'),
            'in_comp_id'=>$this->input->post('in_comp_id'),
            'cus_id'=>$this->input->post('cus_id'),
            'lc_id'=>$this->input->post('lc_id'),
            'order_id'=>$this->input->post('order_id'),
            'gross_premium'=>$data['gross'],
            'net_premium'=>$this->input->post('net_premium'),
            'in_bill_vat'=>$data['vat'],
            'in_bill_30'=>$data['pay_30'],
            'in_bill_70'=>$data['pay_70'],
            'stamp'=>$this->input->post('stamp'),
            'bill_amount'=>$data['payable']+(int)$this->input->post('stamp'),
            'payment_amount'=>$this->input->post('payment_amount'),
            'remarks'=>$this->input->post('remarks'),
            'in_bill_status'=>'A',
            'created_by'=>$this->session->userdata('name'),
            'created_at'=>date('Y-m-d H:i:s'),
        );

        $res = $this->db->insert('insurance_bills', $attr);
        if($res){
            return TRUE;
        }
        return FALSE;
    }

    public function get_insurance_bill_data_by_id($id=Null){
        $this->db->select('insurance_bills.*,insurance_companies.in_comp_name, customers.cus_name,orders.ord_chassis_no, orders.order_no,tbl_lcs.lc_no');
        $this->db->from('insurance_bills');
        $this->db->join('insurance_companies','insurance_companies.in_comp_id = insurance_bills.in_comp_id');
        $this->db->join('customers','customers.id = insurance_bills.cus_id','left');
        $this->db->join('orders','orders.id = insurance_bills.order_id','left');
        $this->db->join('tbl_lcs','tbl_lcs.id = insurance_bills.lc_id','left');
        $res = $this->db->where('insurance_bills.in_bill_id',$id)->get()->row();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function insurance_bill_payment_update($id=Null, $type=Null){
        $data = $this->payable_calculation($this->input->post('net_premium'));

        $attr = array(
            'in_bill_date'=>$this->input->post('in_bill_date'),
            'mc_crt_no'=>$this->input->post('mc_crt_no'),
            'in_comp_id'=>$this->input->post('in_comp_id'),
            'cus_id'=>$this->input->post('cus_id'),
            'lc_id'=>$this->input->post('lc_id'),
            'order_id'=>$this->input->post('order_id'),
            'gross_premium'=>$data['gross'],
            'net_premium'=>$this->input->post('net_premium'),
            'in_bill_vat'=>$data['vat'],
            'in_bill_30'=>$data['pay_30'],
            'in_bill_70'=>$data['pay_70'],
            'stamp'=>$this->input->post('stamp'),
            'bill_amount'=>$data['payable']+(int)$this->input->post('stamp'),
            'payment_amount'=>$this->input->post('payment_amount'),
            'remarks'=>$this->input->post('remarks'),

            'updated_by'=>$this->session->userdata('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );

        $this->db->where('in_bill_id', $id);
        $this->db->update('insurance_bills', $attr);

        if($this->db->affected_rows()){
            return TRUE;
        }
        return FALSE;
    }

    public function delete_insurance_data($id = Null){
        $attr = array(
            'in_bill_status'=>'D',
            'updated_by'=>$this->session->userdata('name'),
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        $this->db->where('in_bill_id', $id);
        $this->db->update('insurance_bills', $attr);

        if($this->db->affected_rows()){
            return TRUE;
        }
        return FALSE;
    }

    public function calculate_insurance_bill_amount($comp_id = Null){
        $res = $this->db->select_sum('bill_amount')->where('in_comp_id', $comp_id)->where('in_bill_status', 'A')
            ->where('in_bill_type', 'Bill')->get('insurance_bills')->row();

//        print_r($res);
//        die();

        if($res){
            if($res->bill_amount != ''){
                return $res->bill_amount;
            }
            return 1;
        }
        return FALSE;
    }

    public function calculate_insurance_payment_amount($comp_id = Null){
        $res = $this->db->select_sum('payment_amount')->where('in_comp_id', $comp_id)->where('in_bill_status', 'A')
            ->where('in_bill_type', 'Pay')->get('insurance_bills')->row();


        if($res){
            return $res->payment_amount;
        }
        return FALSE;
    }

    private function payable_calculation($net_premium = Null){
        $vat = ($net_premium*15)/100;
        $pay_30 = ($net_premium*30)/100;
        $pay_70 = ($net_premium*70)/100;

        $data['gross'] = $vat+$net_premium;
        $data['payable'] = $vat+$pay_30;
        $data['vat'] = $vat;
        $data['pay_30'] = $pay_30;
        $data['pay_70'] = $pay_70;

        return $data;
    }

    public function company_wise_search($comp_id = Null){
        $this->db->select('insurance_bills.*,insurance_companies.in_comp_name, customers.cus_name');
        $this->db->from('insurance_bills');
        $this->db->join('insurance_companies','insurance_companies.in_comp_id = insurance_bills.in_comp_id');
        $this->db->join('customers','customers.id = insurance_bills.cus_id','left');
        $this->db->where('insurance_bills.in_comp_id',$comp_id)->where('insurance_bills.in_bill_status', 'A');
        $res = $this->db->order_by('insurance_bills.in_bill_id', 'desc')->get()->result();

        if($res){
            return $res;
        }
        return FALSE;
    }

    public function date_to_date_search($date_from= Null, $date_to = Null){
        $this->db->select('insurance_bills.*,insurance_companies.in_comp_name, customers.cus_name');
        $this->db->from('insurance_bills');
        $this->db->join('insurance_companies','insurance_companies.in_comp_id = insurance_bills.in_comp_id');
        $this->db->join('customers','customers.id = insurance_bills.cus_id','left');
        $this->db->where('insurance_bills.in_bill_status', 'A');
        $this->db->where("DATE_FORMAT(insurance_bills.in_bill_date,'%Y-%m-%d') >=",$date_from);
        $this->db->where("DATE_FORMAT(insurance_bills.in_bill_date,'%Y-%m-%d') >=",$date_to);
        $res = $this->db->order_by('insurance_bills.in_bill_id', 'desc')->get()->result();

        if($res){
            return $res;
        }
        return FALSE;
    }
}