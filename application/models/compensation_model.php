<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Compensation_Model extends CI_Model {

    public function get_all_compensations(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_compensation');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_compensation_by_id($compensation_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_compensation');
        $ms_db->where('compensation_id',$compensation_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_compensation_by_employee_id_and_date($employee_id,$start_date,$end_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('employee_id, sum(compensation_amount) as total_comp_amount');
        $ms_db->from('tbl_compensation');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('compensation_date >=',$start_date);
        $ms_db->where('compensation_date <=',$end_date);
        $ms_db->where('reason !=','incentive');
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_incentive_by_employee_id_and_date($employee_id,$start_date,$end_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('employee_id, sum(compensation_amount) as total_incentive_amount');
        $ms_db->from('tbl_compensation');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('reason','incentive');
        $ms_db->where('compensation_date >=',$start_date);
        $ms_db->where('compensation_date <=',$end_date);
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_compensation_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_compensation');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_compensation($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_compensation',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_compensation($data,$compensation_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('compensation_id',$compensation_id);
        $ms_db->update('tbl_compensation',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_compensation($compensation_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('compensation_id',$compensation_id);
        $ms_db->delete('tbl_compensation');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_compensation_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('compensation_id, compensation_name, CONCAT(compensation_id,("/"),compensation_name) as compensation_data');
        $ms_db->like('compensation_id', $keyword);
        $ms_db->or_like('compensation_name', $keyword);
        $query = $ms_db->get('tbl_compensation');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['compensation_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
