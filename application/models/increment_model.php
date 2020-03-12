<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Increment_Model extends CI_Model {

    public function get_all_increments(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_increment');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_increment_by_id($increment_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_increment');
        $ms_db->where('increment_id',$increment_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_pre_increment_by_employee_id_and_salary_month($employee_id,$salary_month){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('employee_id, sum(increment_amount) as previous_increment');
        $ms_db->from('tbl_increment');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('increment_date <',$salary_month);
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_cur_increment_by_employee_id_and_salary_month($employee_id,$salary_month,$last_day){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('employee_id, sum(increment_amount) as current_increment');
        $ms_db->from('tbl_increment');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('increment_date >=',$salary_month);
        $ms_db->where('increment_date <=',$last_day);
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_increment_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_increment');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_increment($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_increment',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_increment($data,$increment_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('increment_id',$increment_id);
        $ms_db->update('tbl_increment',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_increment($increment_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('increment_id',$increment_id);
        $ms_db->delete('tbl_increment');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_increment_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('increment_id, increment_name, CONCAT(increment_id,("/"),increment_name) as increment_data');
        $ms_db->like('increment_id', $keyword);
        $ms_db->or_like('increment_name', $keyword);
        $query = $ms_db->get('tbl_increment');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['increment_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
