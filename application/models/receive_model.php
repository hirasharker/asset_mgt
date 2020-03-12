<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Receive_Model extends CI_Model {

    public function get_all_receives(){
        $this->db->select("tbl_receive.*, sum(tbl_receive_detail.quantity) as quantity, string_agg(tbl_item.item_name , ',') as item_name");
        $this->db->from('tbl_receive');
        $this->db->join('tbl_receive_detail','tbl_receive.receive_id = tbl_receive_detail.receive_id ');
        $this->db->join('tbl_item','tbl_item.item_id = tbl_receive_detail.item_id','left');
        $this->db->group_by('tbl_receive.receive_id');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_receive_by_id($receive_id){
        $this->db->select('*');
        $this->db->from('tbl_receive');
        $this->db->where('receive_id',$receive_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_receive($data){
        $this->db->insert('tbl_receive',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_receive($data,$receive_id){
        $this->db->where('receive_id',$receive_id);
        $this->db->update('tbl_receive',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_receive($receive_id){
        $this->db->where('receive_id',$receive_id);
        $this->db->delete('tbl_receive');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_receive_like_name_and_id($keyword){
        $this->db->select('receive_id, receive_name, CONCAT(receive_id,("/"),receive_name) as receive_data');
        $this->db->like('receive_id', $keyword);
        $this->db->or_like('receive_name', $keyword);
        $query = $this->db->get('tbl_receive');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['receive_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }





    public function get_all_receive_details(){
        $this->db->select('*');
        $this->db->from('tbl_receive_detail');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function add_receive_detail($data){
        $this->db->insert('tbl_receive_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_receive_detail($data,$receive_detail_id){
        $this->db->where('receive_detail_id',$receive_detail_id);
        $this->db->update('tbl_receive_detail',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_receive_detail($receive_detail_id){
        $this->db->where('receive_detail_id',$ireceive_detail_id);
        $this->db->delete('tbl_receive_detail');
    }
}
