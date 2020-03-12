<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Database_Forge_Model extends CI_Model {

    public function get_all_companies(){
        $ms_db      =   $this->load->database('ms_db', TRUE);
        $ms_db->select('*');
        $ms_db->from('tbl_company');
        $ms_db->order_by('creation_time','desc');
        $result_query=$ms_db->get();
        $result=$result_query->result();
        return $result;
    }

    public function add_column_to_table($table_name, $column_name, $data_type){
        $ms_db                      =   $this->load->database('ms_db', TRUE);
        $myforge                    =   $this->load->dbforge($ms_db, TRUE);

        $fields = array(
                $column_name => array(
                        'type' => $data_type,
                        'default' => 0
                        // 'constraint' => '100'
                        // 'after' => 'gross_salary'
                ),
        );
        $myforge->add_column($table_name, $fields);
    }

    public function update_column_to_table($table_name, $old_name, $new_name ){
        $ms_db                      =   $this->load->database('ms_db', TRUE);
        try {
            $query = $ms_db->query("SP_RENAME 'tbl_salary.".$old_name."', '".$new_name."';");
            // print_r($ms_db->error());
        } catch (Exception $e) {
            
        }
        
    }
   
}
?>
