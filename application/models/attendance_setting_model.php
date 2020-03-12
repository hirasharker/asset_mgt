<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Attendance_Setting_Model extends CI_Model {

    public function get_all_attendance_settings(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_attendance_setting.*,tbl_leave_type.leave_type_name');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->join('tbl_leave_type','tbl_leave_type.leave_type_id = tbl_attendance_setting.leave_type_id','inner');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_attendance_setting_by_key_and_leave_status($key, $leave_status){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_attendance_setting.*, tbl_leave_type.status');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->join('tbl_leave_type','tbl_leave_type.leave_type_id = tbl_attendance_setting.leave_type_id','inner');
        $ms_db->where('tbl_leave_type.status',$leave_status);
        $ms_db->where('setting_key',$key);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_attendance_setting_by_id($attendance_setting_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->where('attendance_setting_id',$attendance_setting_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    
    public function get_first_attendance_setting(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->limit(1);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_attendance_setting_summary_by_employee_id_and_month($employee_id,$attendance_setting_month){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance_setting_summary');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_setting_month',$attendance_setting_month);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    

    public function get_attendance_setting_by_employee_id_and_date($employee_id,$date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_setting_date',$date);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_workdays_by_employee_id_and_date($employee_id,$start_day, $end_day){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(employee_id) as workdays');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_setting_date >=',$start_day);
        $ms_db->where('attendance_setting_date <=',$end_day);
        $ms_db->where('check_in >','00:00');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_late_by_employee_id_and_date($employee_id,$start_day, $end_day,$late_time){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(employee_id) as late');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_setting_date >=',$start_day);
        $ms_db->where('attendance_setting_date <=',$end_day);
        $ms_db->where('check_in >',$late_time);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_early_by_employee_id_and_date($employee_id,$start_day, $end_day,$early_leave_time){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(employee_id) as early');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_setting_date >=',$start_day);
        $ms_db->where('attendance_setting_date <=',$end_day);
        $ms_db->where('check_out <',$early_leave_time);
        $ms_db->where('check_in !=','00:00');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_attendance_setting_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance_setting');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_attendance_setting($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_attendance_setting',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_attendance_setting($data,$attendance_setting_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('attendance_setting_id',$attendance_setting_id);
        $ms_db->update('tbl_attendance_setting',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
    public function  add_attendance_setting_summary($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_attendance_setting_summary',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
   
    public function update_attendance_setting_summary($data,$attendance_setting_summary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('attendance_setting_summary_id',$attendance_setting_summary_id);
        $ms_db->update('tbl_attendance_setting_summary',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_attendance_setting($attendance_setting_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('attendance_setting_id',$attendance_setting_id);
        $ms_db->delete('tbl_attendance_setting');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_attendance_setting_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('attendance_setting_id, attendance_setting_name, CONCAT(attendance_setting_id,("/"),attendance_setting_name) as attendance_setting_data');
        $ms_db->like('attendance_setting_id', $keyword);
        $ms_db->or_like('attendance_setting_name', $keyword);
        $query = $ms_db->get('tbl_attendance_setting');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['attendance_setting_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
