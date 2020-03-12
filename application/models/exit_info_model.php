<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Exit_Info_Model extends CI_Model {

    public function get_all_exit_info(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_exit_info.*, tbl_employee.employee_name');
        $ms_db->from('tbl_exit_info');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_exit_info.employee_id','inner');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_exit_info_by_id($exit_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_exit_info');
        $ms_db->where('exit_id',$exit_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_exit_info_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_exit_info');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_exit_info($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_exit_info',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_exit_info($data,$exit_info_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('exit_info_id',$exit_info_id);
        $ms_db->update('tbl_exit_info',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_exit_info($exit_info_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('exit_info_id',$exit_info_id);
        $ms_db->delete('tbl_exit_info');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_exit_info_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('exit_info_id, exit_info_name, CONCAT(exit_info_id,("/"),exit_info_name) as exit_info_data');
        $ms_db->like('exit_info_id', $keyword);
        $ms_db->or_like('exit_info_name', $keyword);
        $query = $ms_db->get('tbl_exit_info');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['exit_info_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
