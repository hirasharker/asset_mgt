<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Company_Model extends CI_Model {

    public function get_all_companies(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_company');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_company_by_id($company_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_company');
        $ms_db->where('company_id',$company_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_company_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_company');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_company($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_company',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_company($data,$company_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('company_id',$company_id);
        $ms_db->update('tbl_company',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_company($company_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('company_id',$company_id);
        $ms_db->delete('tbl_company');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_company_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('company_id, company_name, CONCAT(company_id,("/"),company_name) as company_data');
        $ms_db->like('company_id', $keyword);
        $ms_db->or_like('company_name', $keyword);
        $query = $ms_db->get('tbl_company');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['company_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
