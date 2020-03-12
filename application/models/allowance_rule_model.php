<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Allowance_Rule_Model extends CI_Model {

    public function get_all_allowance_rules(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_allowance_rule');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_allowance_rules_by_salary($basic_salary){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_allowance_rule.*,tbl_salary_allowance.allowance_key');
        $ms_db->from('tbl_allowance_rule');
        $ms_db->join('tbl_salary_allowance','tbl_salary_allowance.salary_allowance_id = tbl_allowance_rule.salary_allowance_id','inner');
        $ms_db->where('min_salary <=', $basic_salary);
        $ms_db->where('max_salary >=', $basic_salary);
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }


    public function get_allowance_rule_by_id($allowance_rule_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_allowance_rule');
        $ms_db->where('allowance_rule_id',$allowance_rule_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_allowance_rule_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_allowance_rule');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_allowance_rule($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_allowance_rule',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_allowance_rule($data,$allowance_rule_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('allowance_rule_id',$allowance_rule_id);
        $ms_db->update('tbl_allowance_rule',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_allowance_rule($allowance_rule_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('allowance_rule_id',$allowance_rule_id);
        $ms_db->delete('tbl_allowance_rule');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_allowance_rule_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('allowance_rule_id, allowance_rule_name, CONCAT(allowance_rule_id,("/"),allowance_rule_name) as allowance_rule_data');
        $ms_db->like('allowance_rule_id', $keyword);
        $ms_db->or_like('allowance_rule_name', $keyword);
        $query = $ms_db->get('tbl_allowance_rule');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['allowance_rule_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
