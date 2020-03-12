<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Bank_Model extends CI_Model {

    public function get_all_banks(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_bank');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_bank_by_id($bank_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_bank');
        $ms_db->where('bank_id',$bank_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_bank_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_bank');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_bank($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_bank',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_bank($data,$bank_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('bank_id',$bank_id);
        $ms_db->update('tbl_bank',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_bank($bank_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('bank_id',$bank_id);
        $ms_db->delete('tbl_bank');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_bank_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('bank_id, bank_name, CONCAT(bank_id,("/"),bank_name) as bank_data');
        $ms_db->like('bank_id', $keyword);
        $ms_db->or_like('bank_name', $keyword);
        $query = $ms_db->get('tbl_bank');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['bank_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
