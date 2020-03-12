<?php 

	//------------------------------------------- ALLOWANCE RULE ---------------------------------------------------------------------

	public function allowance_rule()
	{
        $data               							=   array();

        $content_data									=	array();

        $allowance_rule_id 							=	$this->input->post('allowance_rule_id','',TRUE);

        if($allowance_rule_id!=NULL){
        	$content_data['allowance_rule_detail']	=	$this->slr_model->get_allowance_rule_by_id($allowance_rule_id);
        }

        $content_data['allowance_rule_list']			=	$this->slr_model->get_all_allowance_rules();

        $data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $data['content']    							=   $this->load->view('pages/salary/allowance_rule/allowance_rule',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	
	public function add_allowance_rule()
	{
		$slr_data										=	array();
		$slr_data['allowance_rule_name']				=	$this->input->post('allowance_rule_name','',TRUE);
		$slr_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->slr_model->add_allowance_rule($slr_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New Salary Allowance inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('salary/allowance_rule','refresh');

	}
	public function update_allowance_rule()
	{
		$slr_data										=	array();

		$allowance_rule_id							=	$this->input->post('allowance_rule_id','',TRUE);
		$slr_data['allowance_rule_name']				=	$this->input->post('allowance_rule_name','',TRUE);
		$slr_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->slr_model->update_allowance_rule($slr_data, $allowance_rule_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('salary/allowance_rule','refresh');

	}

	//------------------------------------------ END ALLOWANCE RULE --------------------------------------

?>