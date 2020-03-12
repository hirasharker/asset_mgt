<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Shift_Model extends CI_Model {

    public function get_all_shifts(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_shift');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_shift_by_id($shift_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_shift');
        $ms_db->where('shift_id',$shift_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_shift_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_shift');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_shift($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_shift',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_shift($data,$shift_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('shift_id',$shift_id);
        $ms_db->update('tbl_shift',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_shift($shift_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('shift_id',$shift_id);
        $ms_db->delete('tbl_shift');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_shift_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('shift_id, shift_name, CONCAT(shift_id,("/"),shift_name) as shift_data');
        $ms_db->like('shift_id', $keyword);
        $ms_db->or_like('shift_name', $keyword);
        $query = $ms_db->get('tbl_shift');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['shift_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
