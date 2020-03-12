<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Nominee_Model extends CI_Model {

    public function get_all_nominees(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_nominee');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_nominee_by_id($nominee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_nominee');
        $ms_db->where('nominee_id',$nominee_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_nominee_by_employee_id($employee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_nominee');
        $ms_db->where('employee_id',$employee_id);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_nominee($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_nominee',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_nominee($data,$nominee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('nominee_id',$nominee_id);
        $ms_db->update('tbl_nominee',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_nominee($nominee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('nominee_id',$nominee_id);
        $ms_db->delete('tbl_nominee');
    }
    public function delete_nominee_by_employee_id($employee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('employee_id',$employee_id);
        $ms_db->delete('tbl_nominee');
        $result     =   $ms_db->affected_rows();
        return $result;
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_nominee_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('nominee_id, nominee_name, CONCAT(nominee_id,("/"),nominee_name) as nominee_data');
        $ms_db->like('nominee_id', $keyword);
        $ms_db->or_like('nominee_name', $keyword);
        $query = $ms_db->get('tbl_nominee');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['nominee_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
