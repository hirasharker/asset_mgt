<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Branch_Model extends CI_Model {

    public function get_all_branches(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_branch');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_branch_by_id($branch_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_branch');
        $ms_db->where('branch_id',$branch_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_branch_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_branch');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_branch($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_branch',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_branch($data,$branch_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('branch_id',$branch_id);
        $ms_db->update('tbl_branch',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_branch($branch_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('branch_id',$branch_id);
        $ms_db->delete('tbl_branch');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_branch_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('branch_id, branch_name, CONCAT(branch_id,("/"),branch_name) as branch_data');
        $ms_db->like('branch_id', $keyword);
        $ms_db->or_like('branch_name', $keyword);
        $query = $ms_db->get('tbl_branch');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['branch_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
