<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Leave_Model extends CI_Model {

    public function get_all_leaves(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave');
        $ms_db->order_by('creation_time','DESC');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leave_by_employee_id_leave_type_and_date_and_status($employee_id, $leave_type_id, $start_date, $end_date, $weekday, $status){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(leave_detail_id) as leave_days, employee_id');
        $ms_db->from('tbl_leave_detail');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('leave_type_id',$leave_type_id);
        if($status == 3){
            $ms_db->where('leave_status',$status);
        }
        $ms_db->where('leave_date >=',$start_date);
        $ms_db->where('leave_date <=',$end_date);
        // $ms_db->where('DATEPART(dw,leave_date)!=',$weekday);
        $ms_db->group_by('employee_id');
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_leaves_by_reporting_id_and_status($employee_id,$status){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_leave.*,tbl_employee.employee_id,tbl_employee.employee_name,tbl_employee.reporting_employee_id,tbl_employee.designation_id');
        $ms_db->from('tbl_leave');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_leave.employee_id','inner');
        $ms_db->where('leave_status',$status);
        $ms_db->where('tbl_employee.reporting_employee_id',$employee_id);
        $ms_db->order_by('creation_time','DESC');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leaves_by_hod_id_and_status($employee_id,$status){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_leave.*,tbl_employee.employee_id,tbl_employee.employee_name,tbl_employee.designation_id, tbl_employee.department_id, tbl_department.department_name, tbl_department.department_head_id');
        $ms_db->from('tbl_leave');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_leave.employee_id','inner');
        $ms_db->join('tbl_department','tbl_employee.department_id = tbl_department.department_id','inner');
        $ms_db->where('leave_status',$status);
        $ms_db->where('tbl_department.department_head_id',$employee_id);
        $ms_db->order_by('creation_time','DESC');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_leaves_by_status($status){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_leave.*,tbl_employee.employee_id,tbl_employee.employee_name, tbl_employee.designation_id');
        $ms_db->from('tbl_leave');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_leave.employee_id','inner');
        $ms_db->where('leave_status',$status);
        $ms_db->order_by('creation_time','DESC');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_leave_by_id($leave_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave');
        $ms_db->where('leave_id',$leave_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_leave_detail_by_employee_id_and_date($employee_id,$leave_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_detail');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('leave_date',$leave_date);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }
    public function get_leave_detail_by_employee_id_start_date_and_end_date($employee_id,$start_date, $end_date){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave_detail');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('leave_date >=',$start_date);
        $ms_db->where('leave_date <=',$end_date);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }


    

    public function get_leave_detail_by_employee_id_and_date_and_weekday($employee_id,$start_day, $end_day, $weekday){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(leave_detail_id) as leave');
        $ms_db->from('tbl_leave_detail');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('leave_date >=',$start_day);
        $ms_db->where('leave_date <=',$end_day);
        $ms_db->where('DATEPART(dw,leave_date)!=',$weekday);
        $ms_db->where('leave_status',3);
        $ms_db->where('paid_status >',0);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_leave_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_leave');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_leave($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_leave',$data);
        $result=$ms_db->insert_id();
        return $result;
    }

    public function add_leave_detail($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_leave_detail',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
    
   
    public function update_leave($data,$leave_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_id',$leave_id);
        $ms_db->update('tbl_leave',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
    
    public function update_leave_detail($data,$leave_detail_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_detail_id',$leave_detail_id);
        $ms_db->update('tbl_leave_detail',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_leave($leave_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('leave_id',$leave_id);
        $ms_db->delete('tbl_leave');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_leave_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('leave_id, leave_name, CONCAT(leave_id,("/"),leave_name) as leave_data');
        $ms_db->like('leave_id', $keyword);
        $ms_db->or_like('leave_name', $keyword);
        $query = $ms_db->get('tbl_leave');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['leave_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
