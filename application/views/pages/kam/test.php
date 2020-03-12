public function get_all_lost_prospects(){
        $this->db->select('*');
        $this->db->from('tbl_lost_prospect');
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    public function get_lost_prospect_by_id($lost_prospect_id){
        $this->db->select('*');
        $this->db->from('tbl_lost_prospect');
        $this->db->where('lost_prospect_id',$lost_prospect_id);
        $result_query = $this->db->get();
        $result =   $result_query->row();
        return $result;
    }

    public function get_lost_prospect_by_kam_id($kam_id){
        $this->db->select('*');
        $this->db->from('tbl_lost_prospect');
        $this->db->where('kam_id',$kam_id);
        $result_query=$this->db->get();
        $result=$result_query->result();
        return $result;
    }

    
    public function add_lost_prospect($data){
        $this->db->insert('tbl_lost_prospect',$data);
        $result=$this->db->insert_id();
        return $result;
    }
   
    public function update_lost_prospect($data,$lost_prospect_id){
        $this->db->where('lost_prospect_id',$lost_prospect_id);
        $this->db->update('tbl_lost_prospect',$data);
        $result     =   $this->db->affected_rows();
        return $result;
    }
   
    public function delete_lost_prospect($lost_prospect_id){
        $this->db->where('lost_prospect_id',$lost_prospect_id);
        $this->db->delete('tbl_lost_prospect');
        $result     =   $this->db->affected_rows();
        return $result;
    }