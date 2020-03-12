<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Promotion_And_Demotion_Model extends CI_Model {

    public function get_all_pds(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_promotion_and_demotion.*, tbl_employee.employee_name');
        $ms_db->from('tbl_promotion_and_demotion');
        $ms_db->join('tbl_employee','tbl_employee.employee_id = tbl_promotion_and_demotion.employee_id', 'inner');
        $ms_db->where('employee_status',1);
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_pd_by_id($pd_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('tbl_promotion_and_demotion.*,tbl_designation.designation_name');
        $ms_db->from('tbl_promotion_and_demotion');
        $ms_db->join('tbl_designation','tbl_designation.designation_id = tbl_promotion_and_demotion.current_designation_id','inner');
        $ms_db->where('pd_id',$pd_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_promotion_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_promotion');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_pd($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_promotion_and_demotion',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_pd($data,$pd_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('pd_id',$pd_id);
        $ms_db->update('tbl_promotion_and_demotion',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_pd($promotion_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('promotion_id',$promotion_id);
        $ms_db->delete('tbl_promotion');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_promotion_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('promotion_id, promotion_name, CONCAT(promotion_id,("/"),promotion_name) as promotion_data');
        $ms_db->like('promotion_id', $keyword);
        $ms_db->or_like('promotion_name', $keyword);
        $query = $ms_db->get('tbl_promotion');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['promotion_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
