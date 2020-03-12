<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Issue_Model extends CI_Model {

    public function get_all_issues(){
        $this->db->select('*');
        $this->db->from('tbl_issue');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_issue_by_id($issue_id){
        $this->db->select('*');
        $this->db->from('tbl_issue');
        $this->db->where('issue_id',$issue_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    
    public function add_issue($data){
        $this->db->insert('tbl_issue',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_issue($data,$issue_id){
        $this->db->where('issue_id',$issue_id);
        $this->db->update('tbl_issue',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_issue($issue_id){
        $this->db->where('issue_id',$issue_id);
        $this->db->delete('tbl_issue');
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_issue_like_name_and_id($keyword){
        $this->db->select('issue_id, issue_name, CONCAT(issue_id,("/"),issue_name) as issue_data');
        $this->db->like('issue_id', $keyword);
        $this->db->or_like('issue_name', $keyword);
        $query = $this->db->get('tbl_issue');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['issue_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }





    public function get_all_issue_details(){
        $this->db->select('*');
        $this->db->from('tbl_issue_detail');
        $this->db->order_by('time_stamp','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function add_issue_detail($data){
        $this->db->insert('tbl_issue_detail',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_issue_detail($data,$issue_detail_id){
        $this->db->where('issue_detail_id',$issue_detail_id);
        $this->db->update('tbl_issue_detail',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_issue_detail($issue_detail_id){
        $this->db->where('issue_detail_id',$iissue_detail_id);
        $this->db->delete('tbl_issue_detail');
    }
}
