<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Quotation_Model extends CI_Model {

    public function get_all_quotations(){
        $this->db->select('*');
        $this->db->from('tbl_quotation');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_quotation_by_id($quotation_id){
        $this->db->select('*');
        $this->db->from('tbl_quotation');
        $this->db->where('quotation_id',$quotation_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_quotation($data){
        $this->db->insert('tbl_quotation',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_quotation($data,$quotation_id){
        $this->db->where('quotation_id',$quotation_id);
        $this->db->update('tbl_quotation',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_quotation($quotation_id){
        $this->db->where('quotation_id',$quotation_id);
        $this->db->delete('tbl_quotation');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_quotation_like_name_and_id($keyword){
        $this->db->select('quotation_id, quotation_name, CONCAT(quotation_id,("/"),quotation_name) as quotation_data');
        $this->db->like('quotation_id', $keyword);
        $this->db->or_like('quotation_name', $keyword);
        $query = $this->db->get('tbl_quotation');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['quotation_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }





    public function get_all_quotation_details(){
        $this->db->select('*');
        $this->db->from('tbl_quotation_detail');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
}
?>
