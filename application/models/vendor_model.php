<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Vendor_Model extends CI_Model {

    public function get_all_vendors(){
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_vendor_by_id($vendor_id){
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('vendor_id',$vendor_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_vendor($data){
        $this->db->insert('tbl_vendor',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_vendor($data,$vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        $this->db->update('tbl_vendor',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_vendor($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
        $this->db->delete('tbl_vendor');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_vendor_like_name_and_id($keyword){
        $this->db->select('vendor_id, vendor_name, CONCAT(vendor_id,("/"),vendor_name) as vendor_data');
        $this->db->like('vendor_id', $keyword);
        $this->db->or_like('vendor_name', $keyword);
        $query = $this->db->get('tbl_vendor');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['vendor_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
