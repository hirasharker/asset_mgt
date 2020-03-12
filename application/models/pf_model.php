<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pf_Model extends CI_Model {

    public function get_all_pfs(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_pf');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_pf(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_pf');
        $ms_db->limit(1);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_pf_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_pf');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_pf($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_pf',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_pf($data,$pf_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('pf_id',$pf_id);
        $ms_db->update('tbl_pf',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_pf($pf_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('pf_id',$pf_id);
        $ms_db->delete('tbl_pf');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_pf_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('pf_id, pf_name, CONCAT(pf_id,("/"),pf_name) as pf_data');
        $ms_db->like('pf_id', $keyword);
        $ms_db->or_like('pf_name', $keyword);
        $query = $ms_db->get('tbl_pf');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['pf_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
