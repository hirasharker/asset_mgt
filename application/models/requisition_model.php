<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Requisition_Model extends CI_Model {

    public function get_all_requisitions(){
        $this->db->select("tbl_requisition.*, string_agg(tbl_item.item_name, ', ') as item_name, tbl_employee.employee_name");
        $this->db->from('tbl_requisition');
        $this->db->join('tbl_requisition_detail','tbl_requisition_detail.requisition_id = tbl_requisition.requisition_id','inner');
        $this->db->join('tbl_item','tbl_item.item_id = tbl_requisition_detail.item_id','left');
        $this->db->join('tbl_employee','tbl_employee.employee_id = tbl_requisition.employee_id','left');
        $this->db->group_by('tbl_employee.employee_name');
        $this->db->group_by('tbl_requisition.requisition_id');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    // , string_agg(tbl.item_name, ', ') as item_name,

    public function get_requisition_by_id($requisition_id){
        $this->db->select('*');
        $this->db->from('tbl_requisition');
        $this->db->where('requisition_id',$requisition_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }
    

    public function get_requisition_by_employee_id($employee_id){
        $this->db->select('*');
        $this->db->from('tbl_requisition');
        $this->db->where('employee_id',$employee_id);
        $this->db->where();
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_requisition_by_role($role){
        $this->db->select('*');
        $this->db->from('tbl_requisition');
        $this->db->where('role',$role);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_requisition($data){
        $this->db->insert('tbl_requisition',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_requisition($data,$requisition_id){
        $this->db->where('requisition_id',$requisition_id);
        $this->db->update('tbl_requisition',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_requisition($requisition_id){
        $this->db->where('requisition_id',$requisition_id);
        $this->db->delete('tbl_requisition');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_requisition_like_name_and_id($keyword){
        $this->db->select('requisition_id, requisition_name, CONCAT(requisition_id,("/"),requisition_name) as requisition_data');
        $this->db->like('requisition_id', $keyword);
        $this->db->or_like('requisition_name', $keyword);
        $query = $this->db->get('tbl_requisition');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['requisition_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }


    // ---------------REQUISITION DETAIL---------------


    public function add_requisition_detail($data){
        $this->db->insert('tbl_requisition_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }

    public function get_requisition_detail_by_requisition_id($requisition_id){
        $this->db->select('tbl_requisition_detail.*,tbl_item.item_id, tbl_item.item_name, tbl_requisition.employee_id');
        $this->db->from('tbl_requisition_detail');
        $this->db->join('tbl_requisition','tbl_requisition.requisition_id = tbl_requisition_detail.requisition_id', 'left');
        $this->db->join('tbl_item','tbl_item.item_id = tbl_requisition_detail.item_id','left');
        $this->db->where('tbl_requisition_detail.requisition_id',$requisition_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    
}
?>
