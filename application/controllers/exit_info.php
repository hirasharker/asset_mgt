<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exit_Info extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('exit_info_model','exit_model',TRUE);
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

        $data['page_title']								=	'EXIT INFO';						

        $content_data									=	array();

        $exit_id 										=	$this->input->post('exit_id','',TRUE);

        if($exit_id!=NULL){
        	$content_data['exit_detail']				=	$this->exit_model->get_exit_info_by_id($exit_id);
        }

        $content_data['employee_list']					=	$this->employee_model->get_all_employees_by_status(1);

        $content_data['exit_list']						=	$this->exit_model->get_all_exit_info();

        $data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $data['content']    							=   $this->load->view('pages/organization/exit/exit_info',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_exit_info()
	{
		$exit_data												=	array();
		$exit_data['employee_id']								=	$this->input->post('employee_id','',TRUE);
		$exit_data['interviewer_id']							=	$this->input->post('interviewer_id','',TRUE);
		$exit_data['reason']									=	$this->input->post('reason','',TRUE);
		$exit_data['exit_date']									=	$this->input->post('exit_date','',TRUE);
		$exit_data['join_again']								=	$this->input->post('join_again','',TRUE);
		$exit_data['comment']									=	$this->input->post('comment','',TRUE);
		$exit_data['vehicle_handover']							=	$this->input->post('vehicle_handover','',TRUE);
		$exit_data['equipment_handover']						=	$this->input->post('equipment_handover','',TRUE);
		$exit_data['maintain_notice_period']					=	$this->input->post('maintain_notice_period','',TRUE);
		$exit_data['resign_letter_submitted']					=	$this->input->post('resign_letter_submitted','',TRUE);
		$exit_data['exit_interview']							=	$this->input->post('exit_interview','',TRUE);
		$exit_data['reporting_head_clearence']					=	$this->input->post('reporting_head_clearence','',TRUE);

		$exit_data['user_id']									=	$this->session->userdata('employee_id');

		$result													=	$this->exit_model->add_exit_info($exit_data);

		$session_data											=	array();

		if($result!=NULL){

			$session_data['message']							=	'New exit record inserted successfully!!';

			//------------- UPDATE EMPLOYEE STATUS IN EMPLOYEE SECTION-------------------------------------------------
			$employe_status_data								=	array();

			$employe_status_data['employee_status']				=	0;

			$update_result 										=	$this->employee_model->update_employee($employe_status_data,$exit_data['employee_id']);
			
		}else{

			$session_data['error']								=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('exit_info','refresh');

	}
	public function update_exit()
	{
		$exit_data												=	array();
		$exit_data['exit_id']									=	$this->input->post('exit_id','',TRUE);
		$exit_data['employee_id']								=	$this->input->post('employee_id','',TRUE);
		$exit_data['interviewer_id']							=	$this->input->post('interviewer_id','',TRUE);
		$exit_data['reason']									=	$this->input->post('reason','',TRUE);
		$exit_data['exit_date']									=	$this->input->post('exit_date','',TRUE);
		$exit_data['join_again']								=	$this->input->post('join_again','',TRUE);
		$exit_data['comment']									=	$this->input->post('comment','',TRUE);
		$exit_data['vehicle_handover']							=	$this->input->post('vehicle_handover','',TRUE);
		$exit_data['equipment_handover']						=	$this->input->post('equipment_handover','',TRUE);
		$exit_data['maintain_notice_period']					=	$this->input->post('maintain_notice_period','',TRUE);
		$exit_data['resign_letter_submitted']					=	$this->input->post('resign_letter_submitted','',TRUE);
		$exit_data['exit_interview']							=	$this->input->post('exit_interview','',TRUE);
		$exit_data['reporting_head_clearence']					=	$this->input->post('reporting_head_clearence','',TRUE);

		$exit_data['user_id']									=	$this->session->userdata('employee_id');

		$result													=	$this->exit_model->update_exit_info($exit_data,$exit_data['exit_id']);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('exit_info','refresh');

	}
}
