<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Kam_Model extends CI_Model {

    public function get_all_kams($user_id, $role){
        $this->db->select('*');
        $this->db->from('tbl_kam');
        if($role != 20){
            $this->db->where('account_manager_ial_id',$user_id);
        }
        $this->db->order_by('next_contact_date','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_kam_by_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_kam');
        $this->db->where('kam_id',$kam_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    
    public function add_kam($data){
        $this->db->insert('tbl_kam',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_kam($data,$kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->update('tbl_kam',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_kam($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_kam');
        $result     =   $this->db->affected_rows();
        return $result;
    }




    // NON ASHOK LEYLAND FLEET


    public function get_all_nalvfs(){
        $this->db->select('*');
        $this->db->from('tbl_non_al_vehicle_fleet');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_nalvf_by_id($nalvf_id){
        $this->db->select('*');
        $this->db->from('tbl_non_al_vehicle_fleet');
        $this->db->where('nalvf_id',$nalvf_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_nalvf_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_non_al_vehicle_fleet');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_nalvf($data){
        $this->db->insert('tbl_non_al_vehicle_fleet',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_nalvf($data,$nalvf_id){
        $this->db->where('nalvf_id',$nalvf_id);
        $this->db->update('tbl_non_al_vehicle_fleet',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_nalvf($nalvf_id){
        $this->db->where('nalvf_id',$nalvf_id);
        $this->db->delete('tbl_non_al_vehicle_fleet');
        $result     =   $this->db->affected_rows();
        return $result;
    }




    // ASHOK LEYLAND FLEET


    public function get_all_alvfs(){
        $this->db->select('*');
        $this->db->from('tbl_al_vehicle_fleet');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_alvf_by_id($alvf_id){
        $this->db->select('*');
        $this->db->from('tbl_al_vehicle_fleet');
        $this->db->where('alvf_id',$alvf_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_alvf_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_al_vehicle_fleet');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_alvf($data){
        $this->db->insert('tbl_al_vehicle_fleet',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_alvf($data,$alvf_id){
        $this->db->where('alvf_id',$alvf_id);
        $this->db->update('tbl_al_vehicle_fleet',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_alvf($alvf_id){
        $this->db->where('alvf_id',$alvf_id);
        $this->db->delete('tbl_al_vehicle_fleet');
        $result     =   $this->db->affected_rows();
        return $result;
    }


    // ACTION PLAN SALES


    public function get_all_action_plan_sales(){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_sales');
        $this->db->order_by('timestamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_action_plan_sales_by_id($action_plan_sales_id){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_sales');
        $this->db->where('action_plan_sales_id',$action_plan_sales_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_action_plan_sales_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_sales');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_action_plan_sales($data){
        $this->db->insert('tbl_action_plan_sales',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_action_plan_sales($data,$action_plan_sales_id){
        $this->db->where('action_plan_sales_id',$action_plan_sales_id);
        $this->db->update('tbl_action_plan_sales',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_action_plan_sales($action_plan_sales_id){
        $this->db->where('action_plan_sales_id',$action_plan_sales_id);
        $this->db->delete('tbl_action_plan_sales');
        $result     =   $this->db->affected_rows();
        return $result;
    }


    // ACTION PLAN customer


    public function get_all_action_plan_customers(){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_customer');
        $this->db->order_by('timestamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_action_plan_customer_by_id($action_plan_customer_id){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_customer');
        $this->db->where('action_plan_customer_id',$action_plan_customer_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_action_plan_customer_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_customer');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_action_plan_customer($data){
        $this->db->insert('tbl_action_plan_customer',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_action_plan_customer($data,$action_plan_customer_id){
        $this->db->where('action_plan_customer_id',$action_plan_customer_id);
        $this->db->update('tbl_action_plan_customer',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_action_plan_customer($action_plan_customer_id){
        $this->db->where('action_plan_customer_id',$action_plan_customer_id);
        $this->db->delete('tbl_action_plan_customer');
        $result     =   $this->db->affected_rows();
        return $result;
    }



    // ACTION PLAN vehicle


    public function get_all_action_plan_vehicles(){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_vehicle');
        $this->db->order_by('timestamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_action_plan_vehicle_by_id($action_plan_vehicle_id){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_vehicle');
        $this->db->where('action_plan_vehicle_id',$action_plan_vehicle_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_action_plan_vehicle_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_action_plan_vehicle');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_action_plan_vehicle($data){
        $this->db->insert('tbl_action_plan_vehicle',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_action_plan_vehicle($data,$action_plan_vehicle_id){
        $this->db->where('action_plan_vehicle_id',$action_plan_vehicle_id);
        $this->db->update('tbl_action_plan_vehicle',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_action_plan_vehicle($action_plan_vehicle_id){
        $this->db->where('action_plan_vehicle_id',$action_plan_vehicle_id);
        $this->db->delete('tbl_action_plan_vehicle');
        $result     =   $this->db->affected_rows();
        return $result;
    }


    //----------Future Prospects----------


    public function get_all_future_prospects(){
        $this->db->select('*');
        $this->db->from('tbl_future_prospect');
        $this->db->order_by('timestamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_future_prospect_by_id($future_prospect_id){
        $this->db->select('*');
        $this->db->from('tbl_future_prospect');
        $this->db->where('future_prospect_id',$future_prospect_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_future_prospect_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_future_prospect');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_future_prospect($data){
        $this->db->insert('tbl_future_prospect',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_future_prospect($data,$future_prospect_id){
        $this->db->where('future_prospect_id',$future_prospect_id);
        $this->db->update('tbl_future_prospect',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_future_prospect($future_prospect_id){
        $this->db->where('future_prospect_id',$future_prospect_id);
        $this->db->delete('tbl_future_prospect');
        $result     =   $this->db->affected_rows();
        return $result;
    }


    //---------------DELETE ALL DATA BEFORE UPDATE------------------------

    public function delete_nalvf_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_non_al_vehicle_fleet');
        $result     =   $this->db->affected_rows();
        return $result;
    }

    public function delete_alvf_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_al_vehicle_fleet');
        $result     =   $this->db->affected_rows();
        return $result;
    }

    public function delete_action_plan_sales_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_action_plan_sales');
        $result     =   $this->db->affected_rows();
        return $result;
    }

    public function delete_action_plan_customer_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_action_plan_customer');
        $result     =   $this->db->affected_rows();
        return $result;
    }

    public function delete_action_plan_vehicle_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_action_plan_vehicle');
        $result     =   $this->db->affected_rows();
        return $result;
    }

    public function delete_future_prospect_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_future_prospect');
        $result     =   $this->db->affected_rows();
        return $result;
    }

    public function delete_lost_prospect_by_kam_id($kam_id){
        $this->db->where('kam_id',$kam_id);
        $this->db->delete('tbl_lost_prospect');
        $result     =   $this->db->affected_rows();
        return $result;
    }



    // LOST PROSPECT-------


    public function get_all_lost_prospects(){
        $this->db->select('*');
        $this->db->from('tbl_lost_prospect');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_lost_prospect_by_id($lost_prospect_id){
        $this->db->select('*');
        $this->db->from('tbl_lost_prospect');
        $this->db->where('lost_prospect_id',$lost_prospect_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_lost_prospect_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_lost_prospect');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_lost_prospect($data){
        $this->db->insert('tbl_lost_prospect',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_lost_prospect($data,$lost_prospect_id){
        $this->db->where('lost_prospect_id',$lost_prospect_id);
        $this->db->update('tbl_lost_prospect',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_lost_prospect($lost_prospect_id){
        $this->db->where('lost_prospect_id',$lost_prospect_id);
        $this->db->delete('tbl_lost_prospect');
        $result     =   $this->db->affected_rows();
        return $result;
    }


   
}
?>
