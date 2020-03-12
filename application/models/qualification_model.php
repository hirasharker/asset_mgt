<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Qualification_Model extends CI_Model {

    public function get_all_qualifications(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_qualification');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_qualification_by_id($qualification_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_qualification');
        $ms_db->where('qualification_id',$qualification_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_qualification_by_employee_id($employee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_qualification');
        $ms_db->where('employee_id',$employee_id);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_qualification_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_qualification');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    
    public function add_qualification($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_qualification',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_qualification($data,$qualification_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('qualification_id',$qualification_id);
        $ms_db->update('tbl_qualification',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_qualification($qualification_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('qualification_id',$qualification_id);
        $ms_db->delete('tbl_qualification');
    }
    public function delete_qualification_by_employee_id($employee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('employee_id',$employee_id);
        $ms_db->delete('tbl_qualification');
        $result     =   $ms_db->affected_rows();
        return $result;
    }
    
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_qualification_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('qualification_id, qualification_name, CONCAT(qualification_id,("/"),qualification_name) as qualification_data');
        $ms_db->like('qualification_id', $keyword);
        $ms_db->or_like('qualification_name', $keyword);
        $query = $ms_db->get('tbl_qualification');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['qualification_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
