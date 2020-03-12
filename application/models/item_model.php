<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Item_Model extends CI_Model {

    public function get_all_items(){
        $this->db->select('tbl_item.*, tbl_item_group.group_name');
        $this->db->from('tbl_item');
        $this->db->join('tbl_item_group','tbl_item_group.group_id = tbl_item.group_id','left');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_item_by_id($item_id){
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where('item_id',$item_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_item_by_role($role){
        $this->db->select('*');
        $this->db->from('tbl_item');
        $this->db->where('role',$role);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_item($data){
        $this->db->insert('tbl_item',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_item($data,$item_id){
        $this->db->where('item_id',$item_id);
        $this->db->update('tbl_item',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_item($item_id){
        $this->db->where('item_id',$item_id);
        $this->db->delete('tbl_item');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_item_like_name_and_id($keyword){
        $this->db->select('item_id, item_name, CONCAT(item_id,("/"),item_name) as item_data');
        $this->db->like('item_id', $keyword);
        $this->db->or_like('item_name', $keyword);
        $query = $this->db->get('tbl_item');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['item_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
