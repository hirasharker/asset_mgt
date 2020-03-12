<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Tds_Model extends CI_Model {

    public function get_all_tds(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_tds');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_tds_by_id($tds_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_tds');
        $ms_db->where('tds_id',$tds_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function get_tds_by_employee_id_and_date($employee_id, $tds_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_tds');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('tds_date <= ',$tds_date);
        $ms_db->limit(1);
        $ms_db->order_by('tds_date','desc');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_tds_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_tds');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_tds($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_tds',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_tds($data,$tds_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('tds_id',$tds_id);
        $ms_db->update('tbl_tds',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_tds($tds_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('tds_id',$tds_id);
        $ms_db->delete('tbl_tds');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_tds_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tds_id, tds_name, CONCAT(tds_id,("/"),tds_name) as tds_data');
        $ms_db->like('tds_id', $keyword);
        $ms_db->or_like('tds_name', $keyword);
        $query = $ms_db->get('tbl_tds');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['tds_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
