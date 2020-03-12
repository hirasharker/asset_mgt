<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Leave_Type_Model extends CI_Model {

    public function get_all_leave_types(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_type');
        $ms_db->order_by('leave_type_id','asc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leave_type_by_employee_type($employee_type){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_type');
        $ms_db->where('employee_type',$employee_type);
        $ms_db->or_where('employee_type',0);
        $ms_db->order_by('leave_type_id','asc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leave_type_by_id($leave_type_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_type');
        $ms_db->where('leave_type_id',$leave_type_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_leave_type_by_leave_status($status){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_type');
        $ms_db->where('status',$status);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leave_type_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_type');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_leave_type($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_leave_type',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_leave_type($data,$leave_type_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_type_id',$leave_type_id);
        $ms_db->update('tbl_leave_type',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_leave_type($leave_type_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_type_id',$leave_type_id);
        $ms_db->delete('tbl_leave_type');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_leave_type_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('leave_type_id, leave_type_name, CONCAT(leave_type_id,("/"),leave_type_name) as leave_type_data');
        $ms_db->like('leave_type_id', $keyword);
        $ms_db->or_like('leave_type_name', $keyword);
        $query = $ms_db->get('tbl_leave_type');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['leave_type_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
