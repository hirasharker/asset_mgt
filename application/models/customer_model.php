<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Customer_Model extends CI_Model {

    public function get_all_customers_from_ms_db(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('Table00060');
        $ms_db->limit(100);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_customers_booking_data_by_search_criteria($zone_id='',$city_id='',$mkt_id='',$model_id='',$payment_mode='',$start_date='',$end_date='',$status){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        if($zone_id!=''){
            $this->db->where('zone_id',$zone_id);    
        }
        if($city_id!=''){
            $this->db->where('city_id',$city_id);    
        }
        if($mkt_id!=''){
            $this->db->where('mkt_id',$mkt_id);    
        }
        if($model_id!=''){
            $this->db->where('model_id',$model_id);    
        }
        if($payment_mode!=''){
            $this->db->where('payment_mode',$payment_mode);    
        }
        if($start_date!=''){
            $this->db->where('STR_TO_DATE(time_stamp, "%Y-%m-%d") >=',$start_date);
            $this->db->where('STR_TO_DATE(time_stamp, "%Y-%m-%d") <=',$end_date);
        }
        if($status!=''){
            $this->db->where('status',$status);    
        }
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_customers_sales_data_by_search_criteria($zone_id='',$city_id='',$mkt_id='',$model_id='',$yard_id='',$payment_mode='',$start_date='',$end_date='',$status){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        if($zone_id!=''){
            $this->db->where('zone_id',$zone_id);    
        }
        if($city_id!=''){
            $this->db->where('city_id',$city_id);    
        }
        if($mkt_id!=''){
            $this->db->where('mkt_id',$mkt_id);    
        }
        if($model_id!=''){
            $this->db->where('model_id',$model_id);    
        }
        if($yard_id!=''){
            $this->db->where('delivery_yard_id',$yard_id);    
        }
        if($payment_mode!=''){
            $this->db->where('payment_mode',$payment_mode);    
        }
        if($start_date!=''){
            $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") >=',$start_date);
            $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") <=',$end_date);
        }
        if($status!=''){
            $this->db->where('status',$status);
            if($status==8){
                $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") >=',$start_date);
                $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") <=',$end_date);  
            }else{
                $this->db->where('STR_TO_DATE(dc_update_time, "%Y-%m-%d") >=',$start_date);
                $this->db->where('STR_TO_DATE(dc_update_time, "%Y-%m-%d") <=',$end_date);  
            }  
        }else{
            $this->db->where('status >=',8);
            $this->db->where('status <=',9);
            $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") >=',$start_date);
            $this->db->where('STR_TO_DATE(do_update_time, "%Y-%m-%d") <=',$end_date);  
        }
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function count_all_customers_from_ms_db(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('COUNT(ComID) as count');
        $ms_db->from('Table00060');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function count_customers_booking_by_days($days){
        $formatted_days = 'P'.$days.'D';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $start_date = $date->format('Y-m-d');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('time_stamp >=',$start_date);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function count_customers_booking_by_months($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function count_sales_by_days($days){
        $formatted_days = 'P'.$days.'D';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $start_date = $date->format('Y-m-d');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('time_stamp >=',$start_date);
        $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function count_sales_by_months($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        
        $this->db->select('COUNT(customer_id) as count');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function sold_models_by_month($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        $this->db->select('COUNT(customer_id) as count, model_id, sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $this->db->group_by('model_id');
        $this->db->order_by('qty','desc');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function total_sold_quantity_by_month($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        $this->db->select('sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function sold_within_current_month_by_zone($months){
        $formatted_days = 'P'.$months.'M';
        $date = new DateTime(date('y-m-d'));
		$date->sub(new DateInterval($formatted_days));
        $month = $date->format('m');
        $this->db->select('COUNT(customer_id) as count, zone_id, sum(quantity) as qty');
        $this->db->from('tbl_customer');
        $this->db->where('MONTH(time_stamp) =',$month);
        $this->db->where('status',9);
        $this->db->group_by('zone_id');
        $this->db->order_by('qty','desc');
        $this->db->limit(5);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }



    public function get_customer_by_id($customer_id){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_customers_by_status($status){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('status',$status);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_customers_status_by_id($customer_id){
        $this->db->select('customer_id, status');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function get_all_customers_id_from_ms_db(){
        
        $date = strtotime(date('Y-m-d'));
		$new_date = date("Y-m-d", strtotime("-3 month", $date));
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('CustCode, CustName, FathersName, MothersName, Phone');
        // $ms_db->select('CustCode, CustName, PermanentAddress, PresentAddress');
        $ms_db->from('Table00060');
        $ms_db->where('TDate >=',$new_date);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_customer_by_id_from_ms_db($customer_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('Table00060');
        $ms_db->where('CustCode',$customer_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_all_customers(){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_customers_by_head_of_sales_id($head_of_sales_id){
        $this->db->select('tbl_customer.*,tbl_zone.head_of_sales_id,tbl_zone.zhead_id');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_zone','tbl_zone.zone_id = tbl_customer.zone_id','inner');
        $this->db->where('tbl_zone.head_of_sales_id',$head_of_sales_id);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_customers_by_rm_id($rm_id){
        $this->db->select('tbl_customer.*,tbl_city.rm_id');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_customer.city_id','inner');
        $this->db->where('tbl_city.rm_id',$rm_id);

        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function add_customer_to_msdb($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('Table00060',$data);
        $result     =   $ms_db->insert_id();
        return $result;
    }

    public function add_customer($data){
        $this->db->insert('tbl_customer',$data);
        $result     =   $this->db->insert_id();
        return $result;
    }
    public function update_customer($data,$customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    public function update_customer_engine_and_chassis_no($customer_data, $customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$customer_data);
    }
    public function update_customer_status($customer_status, $customer_id){
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$customer_status);
    }
    public function get_max_delivery_order_no(){
        $this->db->select_max('delivery_order_no');
        $this->db->from('tbl_customer');
        $result_query = $this->db->get();
        $result       = $result_query->row();
        return $result;
    }

    public function get_max_delivery_challan_no(){
        $this->db->select_max('delivery_challan_no');
        $this->db->from('tbl_customer');
        $result_query = $this->db->get();
        $result       = $result_query->row();
        return $result;
    }
    
    

    
    // public function get_company_by_id($company_id){
    //     $this->db->select('*');
    //     $this->db->from('tbl_company');
    //     $this->db->where('company_id',$company_id);
    //     $result_query=$this->db->get();
    //     $result=$result_query->row();
    //     return $result;
    // }
    
    // public function update_company($data,$company_id){
        
    //     $this->db->where('company_id',$company_id);
    //     $this->db->update('tbl_company',$data);
    // }

}
?>
