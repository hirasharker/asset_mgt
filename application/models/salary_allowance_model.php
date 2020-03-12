<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Salary_Allowance_Model extends CI_Model {

    public function get_all_salary_allowances(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary_allowance');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_salary_allowance_by_id($salary_allowance_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary_allowance');
        $ms_db->where('salary_allowance_id',$salary_allowance_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_salary_allowance_by_key($allowance_key){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary_allowance');
        $ms_db->where('allowance_key',$allowance_key);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_salary_allowance_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary_allowance');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_salary_allowance($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_salary_allowance',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_salary_allowance($data,$salary_allowance_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('salary_allowance_id',$salary_allowance_id);
        $ms_db->update('tbl_salary_allowance',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_salary_allowance($salary_allowance_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('salary_allowance_id',$salary_allowance_id);
        $ms_db->delete('tbl_salary_allowance');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_salary_allowance_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('salary_allowance_id, salary_allowance_name, CONCAT(salary_allowance_id,("/"),salary_allowance_name) as salary_allowance_data');
        $ms_db->like('salary_allowance_id', $keyword);
        $ms_db->or_like('salary_allowance_name', $keyword);
        $query = $ms_db->get('tbl_salary_allowance');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['salary_allowance_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
