<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class stock_Model extends CI_Model {

    public function get_all_stocks(){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_stock_by_id($stock_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('stock_id',$stock_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_stock_by_item_id($item_id){
        $this->db->select('*');
        $this->db->from('tbl_stock');
        $this->db->where('item_id',$item_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    

    
    public function add_stock($data){
        $this->db->insert('tbl_stock',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_stock($data,$stock_id){
        $this->db->where('stock_id',$stock_id);
        $this->db->update('tbl_stock',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_stock($stock_id){
        $this->db->where('stock_id',$stock_id);
        $this->db->delete('tbl_stock');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_stock_like_name_and_id($keyword){
        $this->db->select('stock_id, stock_name, CONCAT(stock_id,("/"),stock_name) as stock_data');
        $this->db->like('stock_id', $keyword);
        $this->db->or_like('stock_name', $keyword);
        $query = $this->db->get('tbl_stock');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['stock_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
