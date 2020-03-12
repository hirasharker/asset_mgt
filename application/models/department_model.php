<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Department_Model extends CI_Model {

    public function get_all_departments(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_department');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_department_by_id($department_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_department');
        $ms_db->where('department_id',$department_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_department_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_department');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_department($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_department',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_department($data,$department_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('department_id',$department_id);
        $ms_db->update('tbl_department',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_department($department_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('department_id',$department_id);
        $ms_db->delete('tbl_department');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_department_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('department_id, department_name, CONCAT(department_id,("/"),department_name) as department_data');
        $ms_db->like('department_id', $keyword);
        $ms_db->or_like('department_name', $keyword);
        $query = $ms_db->get('tbl_department');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['department_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
