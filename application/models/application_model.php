<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model extends CI_Model {

    public function get_all_applications(){
        $this->db->select('*');
        $this->db->from('tbl_application');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_application_by_id($application_id){
        $this->db->select('*');
        $this->db->from('tbl_application');
        $this->db->where('application_id',$application_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }


    
    public function add_application($data){
        $this->db->insert('tbl_application',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_application($data,$application_id){
        $this->db->where('application_id',$application_id);
        $this->db->update('tbl_application',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_application($application_id){
        
        $this->db->where('application_id',$application_id);
        $this->db->delete('tbl_application');
    }
}
?>
