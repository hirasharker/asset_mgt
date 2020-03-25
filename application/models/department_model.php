<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Department_Model extends CI_Model {

    public function get_all_departments(){
        $this->db->select('*');
        $this->db->from('tbl_department');
        $this->db->order_by('creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
        
    }

    public function get_department_by_id($department_id){
        $this->db->select('*');
        $this->db->from('tbl_department');
        $this->db->where('department_id',$department_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_department_by_role($role){
        $this->db->select('*');
        $this->db->from('tbl_department');
        $this->db->where('role',$role);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_department($data){
        $this->db->insert('tbl_department',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_department($data,$department_id){
        $this->db->where('department_id',$department_id);
        $this->db->update('tbl_department',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_department($department_id){
        $this->db->where('department_id',$department_id);
        $this->db->delete('tbl_department');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_department_like_name_and_id($keyword){
        $this->db->select('department_id, department_name, CONCAT(department_id,("/"),department_name) as department_data');
        $this->db->like('department_id', $keyword);
        $this->db->or_like('department_name', $keyword);
        $query = $this->db->get('tbl_department');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['department_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
