<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_Requisition extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('requisition_model','requisition_model',TRUE);
		$this->load->model('module_model','module_model',TRUE);

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'approval_requisition';

        $content_data									=	array();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['approval_requisition_list']		=	$this->requisition_model->get_all_approval_requisitiones();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/organization/approval_requisition/approval_requisition',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}


	public function approval_requisition_head()
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'Req - Approval Department Head';

        $content_data									=	array();

        $content_data['approval_section']				=	'Head of Department';

		$content_data['key']							=	1;        

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['requisition_list']				=	$this->requisition_model->get_all_active_requisitions();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/approval_requisition',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function approval_requisition_it()
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'Req - Approval IT';

        $content_data									=	array();

        $content_data['approval_section']				=	'Department of IT';

        $content_data['key']							=	2;

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['requisition_list']				=	$this->requisition_model->get_all_active_requisitions();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/approval_requisition',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}


	public function approve_requisition($decision, $key, $requisition_id)
	{
		switch ($key) {
			case 1:
				# for approval of department head
				break;
			case 2:
				# for approval of it department
				break;
			default:
				# code...
				break;
		}

		$result											=	$this->requisition_model->add_approval_requisition($approval_requisition_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New approval_requisition inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('approval_requisition','refresh');

	}





	public function edit_approval_requisition($approval_requisition_id)
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'EDIT approval_requisition';

        $content_data									=	array();

        $content_data['approval_requisition_list']					=	$this->requisition_model->get_all_approval_requisitiones();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['approval_requisition_detail']				=	$this->requisition_model->get_approval_requisition_by_id($approval_requisition_id);

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/organization/approval_requisition/approval_requisition',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_approval_requisition()
	{
		$approval_requisition_data									=	array();
		$approval_requisition_data['approval_requisition_name']						=	$this->input->post('approval_requisition_name','',TRUE);
		$approval_requisition_data['approval_requisition_head_id']					=	$this->input->post('approval_requisition_head_id','',TRUE);
		$approval_requisition_data['approval_requisition_address']					=	$this->input->post('approval_requisition_address','',TRUE);
		$approval_requisition_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->requisition_model->add_approval_requisition($approval_requisition_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New approval_requisition inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('approval_requisition','refresh');

	}
	public function update_approval_requisition()
	{
		$approval_requisition_data								=	array();

		$approval_requisition_id									=	$this->input->post('approval_requisition_id','',TRUE);
		$approval_requisition_data['approval_requisition_name']					=	$this->input->post('approval_requisition_name','',TRUE);
		$approval_requisition_data['approval_requisition_head_id']				=	$this->input->post('approval_requisition_head_id','',TRUE);
		$approval_requisition_data['approval_requisition_address']				=	$this->input->post('approval_requisition_address','',TRUE);
		$approval_requisition_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->requisition_model->update_approval_requisition($approval_requisition_data, $approval_requisition_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('approval_requisition','refresh');

	}
}
