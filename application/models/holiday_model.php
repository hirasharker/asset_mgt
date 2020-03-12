<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Holiday_Model extends CI_Model {

    public function get_all_holidays(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_holiday');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function count_holidays_by_date($start_date, $end_date, $weekday){
        $sql_weekday    =   $weekday +1;
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(holiday_detail_id) as holidays');
        $ms_db->from('tbl_holiday_detail');
        $ms_db->where('holiday_date >=',$start_date);
        $ms_db->where('holiday_date <=',$end_date);
        $ms_db->where('DATEPART(dw,holiday_date)!=',$sql_weekday);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_holiday_by_id($holiday_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_holiday');
        $ms_db->where('holiday_id',$holiday_id);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }

    public function get_holidays_by_date($start_day, $end_day, $weekday){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('count(holiday_detail_id) as holidays');
        $ms_db->from('tbl_holiday_detail');
        $ms_db->where('holiday_date >=',$start_day);
        $ms_db->where('holiday_date <=',$end_day);
        $ms_db->where('DATEPART(dw,holiday_date)!=',$weekday);
        $result_query=$ms_db->get();
        $result=$result_query->row();
        return $result;
    }


    public function get_holiday_by_role($role){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_holiday');
        $ms_db->where('role',$role);
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }
    
    public function add_holiday($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_holiday',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
    
    public function add_holiday_detail($data){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->insert('tbl_holiday_detail',$data);
        $result=$ms_db->insert_id();
        return $result;
    }
   
    public function update_holiday($data,$holiday_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('holiday_id',$holiday_id);
        $ms_db->update('tbl_holiday',$data);
        $result     =   $ms_db->affected_rows();
        return $result;
    }
   
    public function delete_holiday($holiday_id){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->where('holiday_id',$holiday_id);
        $ms_db->delete('tbl_holiday');
    }
    // $ms_db->select("CONCAT((first_name),(' '),(middle_name),(' '),(last_name)) as candidate_full_name");
    public function get_holiday_like_name_and_id($keyword){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('holiday_id, holiday_name, CONCAT(holiday_id,("/"),holiday_name) as holiday_data');
        $ms_db->like('holiday_id', $keyword);
        $ms_db->or_like('holiday_name', $keyword);
        $query = $ms_db->get('tbl_holiday');
        if($query->num_rows() > 0){
          foreach ($query->result_array() as $row){
            $row_set[] = htmlentities(stripslashes($row['holiday_data'])); //build an array
          }
          echo json_encode($row_set); //format the array into json data
        }
    }
}
?>
