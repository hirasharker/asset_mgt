<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Employee_Model extends CI_Model {

    public function get_all_employees(){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->order_by('creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_active_employees_by_company_id($company_id , $salary_month){
        $this->db->select('tbl_employee.*,tbl_exit_info.exit_date');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_exit_info','tbl_exit_info.employee_id = tbl_employee.employee_id','left');
        $where = "tbl_employee.company_id='".$company_id."' AND  (exit_date IS NULL OR exit_date > '".$salary_month."')";
        $this->db->where($where);
        $this->db->order_by('creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_active_employees($date){
        $this->db->select('tbl_employee.*,tbl_exit_info.exit_date, tbl_designation.*');
        $this->db->from('tbl_employee');
        $this->db->join('tbl_designation','tbl_designation.designation_id = tbl_employee.current_designation_id','inner');
        $this->db->join('tbl_exit_info','tbl_exit_info.employee_id = tbl_employee.employee_id','left');
        $where = "exit_date IS NULL OR exit_date > '".$date."'";
        $this->db->where($where);
        $this->db->order_by('tbl_employee.creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    public function get_all_employees_by_company_id($company_id){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        $this->db->order_by('creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_all_employees_by_status($status){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_status',$status);
        $this->db->or_where('employee_status',9);
        $this->db->order_by('creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }
    
    public function get_all_employees_by_company_id_and_status($company_id, $status){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('company_id',$company_id);
        $this->db->where('employee_status',$status);
        $this->db->order_by('creation_time','desc');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_employee_by_id($employee_id){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('employee_id',$employee_id);
        $result_query=$this->db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_employee_by_role($role){
        $this->db->select('*');
        $this->db->from('tbl_employee');
        $this->db->where('role',$role);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_employee($data){
        $this->db->insert('tbl_employee',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_employee($data,$employee_id){
        $this->db->where('employee_id',$employee_id);
        $this->db->update('tbl_employee',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_employee($employee_id){
        $this->db->where('employee_id',$employee_id);
        $this->db->delete('tbl_employee');
        $result     =   $this->db->affected_rows();
        return $result;
    }
    // $this->db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_employee_like_name_and_id($keyword){
        $this->db->select('employee_id, employee_name, CONCAT(employee_id,("/"),employee_name) as employee_data');
        $this->db->like('employee_id', $keyword);
        $this->db->or_like('employee_name', $keyword);
        $query = $this->db->get('tbl_employee');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['employee_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
