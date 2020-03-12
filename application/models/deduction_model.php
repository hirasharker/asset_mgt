<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Deduction_Model extends CI_Model {

    public function get_all_deductions(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_deduction');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_deduction_by_id($deduction_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_deduction');
        $ms_db->where('deduction_id',$deduction_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function get_deduction_by_employee_id_and_date($employee_id,$start_date,$end_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('employee_id,sum(deduction_amount) as total_deduction');
        $ms_db->from('tbl_deduction');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('deduction_date >=',$start_date);
        $ms_db->where('deduction_date <=',$end_date);
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_deduction_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_deduction');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_deduction($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_deduction',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_deduction($data,$deduction_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('deduction_id',$deduction_id);
        $ms_db->update('tbl_deduction',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_deduction($deduction_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('deduction_id',$deduction_id);
        $ms_db->delete('tbl_deduction');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_deduction_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('deduction_id, deduction_name, CONCAT(deduction_id,("/"),deduction_name) as deduction_data');
        $ms_db->like('deduction_id', $keyword);
        $ms_db->or_like('deduction_name', $keyword);
        $query = $ms_db->get('tbl_deduction');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['deduction_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
