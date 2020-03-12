<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Attendance_Model extends CI_Model {

    public function get_all_attendances(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance');
        $ms_db->order_by('attendance_date','DESC');
        $ms_db->limit('2000');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_attendances_by_employee_id($employee_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_attendance.*,tbl_employee.employee_name, tbl_leave_detail.leave_id, tbl_leave_detail.leave_status, tbl_leave_detail.paid_status');
        $ms_db->from('tbl_attendance');
        $ms_db->where('tbl_attendance.employee_id',$employee_id);
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_attendance.employee_id', 'inner');
        $ms_db->join('tbl_leave_detail','tbl_leave_detail.employee_id = tbl_attendance.employee_id and tbl_leave_detail.leave_date = tbl_attendance.attendance_date', 'left');
        $ms_db->order_by('attendance_date','DESC');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_attendance_summary(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_attendance_summary.*,tbl_employee.employee_name');
        $ms_db->from('tbl_attendance_summary');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_attendance_summary.employee_id', 'inner');
        $ms_db->order_by('attendance_month','DESC');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_attendance_by_id($attendance_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance');
        $ms_db->where('attendance_id',$attendance_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_working_hour_by_employee_id_and_date($employee_id, $start_date, $end_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('employee_id, sum(working_hour) as total_working_hour');
        $ms_db->from('tbl_attendance');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_date >=',$start_date);
        $ms_db->where('attendance_date <=',$end_date);
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_attendance_summary_by_employee_id_and_month($employee_id,$attendance_month){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance_summary');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_month',$attendance_month);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    

    public function get_attendance_by_employee_id_and_date($employee_id,$date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_date',$date);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_workdays_by_employee_id_and_date($employee_id,$start_day, $end_day){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(employee_id) as workdays');
        $ms_db->from('tbl_attendance');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_date >=',$start_day);
        $ms_db->where('attendance_date <=',$end_day);
        $ms_db->where('check_in >','00:00');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_late_by_employee_id_and_date($employee_id,$start_day, $end_day,$late_time){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(employee_id) as late');
        $ms_db->from('tbl_attendance');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_date >=',$start_day);
        $ms_db->where('attendance_date <=',$end_day);
        $ms_db->where('check_in >',$late_time);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_early_by_employee_id_and_date($employee_id,$start_day, $end_day,$early_leave_time){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(employee_id) as early');
        $ms_db->from('tbl_attendance');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('attendance_date >=',$start_day);
        $ms_db->where('attendance_date <=',$end_day);
        $ms_db->where('check_out <',$early_leave_time);
        $ms_db->where('check_in !=','00:00');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_attendance_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_attendance');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_attendance($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_attendance',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_attendance($data,$attendance_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('attendance_id',$attendance_id);
        $ms_db->update('tbl_attendance',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
    public function  add_attendance_summary($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_attendance_summary',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
   
    public function update_attendance_summary($data,$attendance_summary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('attendance_summary_id',$attendance_summary_id);
        $ms_db->update('tbl_attendance_summary',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_attendance($attendance_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('attendance_id',$attendance_id);
        $ms_db->delete('tbl_attendance');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_attendance_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('attendance_id, attendance_name, CONCAT(attendance_id,("/"),attendance_name) as attendance_data');
        $ms_db->like('attendance_id', $keyword);
        $ms_db->or_like('attendance_name', $keyword);
        $query = $ms_db->get('tbl_attendance');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['attendance_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
