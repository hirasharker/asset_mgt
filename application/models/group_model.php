<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Group_Model extends CI_Model {

    public function get_all_groups(){
        $this->db->select('tbl_item_group.*, tbl_parent_group.group_name as parent_group');
        $this->db->from('tbl_item_group');
        $this->db->join('tbl_item_group as tbl_parent_group','tbl_parent_group.group_id = tbl_item_group.parent_id', 'left');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_group_by_id($group_id){
        $this->db->select('*');
        $this->db->from('tbl_item_group');
        $this->db->where('group_id',$group_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_group_by_role($role){
        $this->db->select('*');
        $this->db->from('tbl_item_group');
        $this->db->where('role',$role);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_group($data){
        $this->db->insert('tbl_item_group',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_group($data,$group_id){
        $this->db->where('group_id',$group_id);
        $this->db->update('tbl_item_group',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_group($group_id){
        $this->db->where('group_id',$group_id);
        $this->db->delete('tbl_item_group');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_group_like_name_and_id($keyword){
        $this->db->select('group_id, group_name, CONCAT(group_id,("/"),group_name) as group_data');
        $this->db->like('group_id', $keyword);
        $this->db->or_like('group_name', $keyword);
        $query = $this->db->get('tbl_item_group');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['group_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
