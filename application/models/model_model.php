<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_Model extends CI_Model {

    public function get_all_models(){
        $this->db->select('*');
        $this->db->from('tbl_model');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_model_by_id($model_id){
        $this->db->select('*');
        $this->db->from('tbl_model');
        $this->db->where('model_id',$model_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function add_model($data){
        $this->db->insert('tbl_model',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_model($data,$model_id){
        $this->db->where('model_id',$model_id);
        $this->db->update('tbl_model',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_model($model_id){
        $this->db->where('model_id',$model_id);
        $this->db->delete('tbl_model');
    }
}
?>
