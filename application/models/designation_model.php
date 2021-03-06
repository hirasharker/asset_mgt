<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Designation_Model extends CI_Model {

    public function get_all_designations(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_designation');
        $ms_db->order_by('rank','asc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_designation_by_id($designation_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_designation');
        $ms_db->where('designation_id',$designation_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_designation_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_designation');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_designation($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_designation',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_designation($data,$designation_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('designation_id',$designation_id);
        $ms_db->update('tbl_designation',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_designation($designation_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('designation_id',$designation_id);
        $ms_db->delete('tbl_designation');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_designation_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('designation_id, designation_name, CONCAT(designation_id,("/"),designation_name) as designation_data');
        $ms_db->like('designation_id', $keyword);
        $ms_db->or_like('designation_name', $keyword);
        $query = $ms_db->get('tbl_designation');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['designation_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
