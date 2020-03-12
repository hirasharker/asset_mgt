<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Leave_Summary_Model extends CI_Model {

    public function get_all_leave_summaries(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_summary');
        $ms_db->order_by('leave_summary_id','asc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leave_summary_by_id($leave_summary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_summary');
        $ms_db->where('leave_summary_id',$leave_summary_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_leave_summary_by_employee_id_leave_type_and_year($employee_id, $leave_type_id, $date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_summary');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('leave_type_id',$leave_type_id);
        $ms_db->where('leave_year',$date);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_leave_summary_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_summary');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_leave_summary($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_leave_summary',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_leave_summary($data,$leave_summary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_summary_id',$leave_summary_id);
        $ms_db->update('tbl_leave_summary',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_leave_summary($leave_summary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_summary_id',$leave_summary_id);
        $ms_db->delete('tbl_leave_summary');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_leave_summary_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('leave_summary_id, leave_summary_name, CONCAT(leave_summary_id,("/"),leave_summary_name) as leave_summary_data');
        $ms_db->like('leave_summary_id', $keyword);
        $ms_db->or_like('leave_summary_name', $keyword);
        $query = $ms_db->get('tbl_leave_summary');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['leave_summary_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
