<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Salary_Model extends CI_Model {

    public function get_all_salaries(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_salary_by_month($salary_month){
    	$ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_salary.*,tbl_employee.employee_name');
        $ms_db->from('tbl_salary');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_salary.employee_id','inner');
        $ms_db->where('salary_month',$salary_month);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function find_salary_by_month($salary_month){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary');
        $ms_db->where('salary_month',$salary_month);
        $ms_db->limit(1);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_salary_by_month_and_company_id($salary_month, $company_id){
    	$ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_salary.*,tbl_employee.employee_name');
        $ms_db->from('tbl_salary');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_salary.employee_id','inner');
        $ms_db->where('salary_month',$salary_month);
        $ms_db->where('tbl_employee.company_id',$company_id);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_salary_by_id($salary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary');
        $ms_db->where('salary_id',$salary_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_salary_by_employee_id_and_salary_month($employee_id, $salary_month){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary');
        $ms_db->where('employee_id',$employee_id);
        $ms_db->where('salary_month',$salary_month);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_salary_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_salary');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_salary($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_salary',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_salary($data,$salary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('salary_id',$salary_id);
        $ms_db->update('tbl_salary',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_salary($salary_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('salary_id',$salary_id);
        $ms_db->delete('tbl_salary');
    }

    public function delete_salary_by_month($salary_month){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('salary_month',$salary_month);
        $ms_db->delete('tbl_salary');
    }

    
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_salary_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('salary_id, salary_name, CONCAT(salary_id,("/"),salary_name) as salary_data');
        $ms_db->like('salary_id', $keyword);
        $ms_db->or_like('salary_name', $keyword);
        $query = $ms_db->get('tbl_salary');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['salary_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
