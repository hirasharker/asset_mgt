<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('department_model','dept_model',TRUE);
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

        $data['page_title']               				=   'DEPARTMENT';

        $content_data									=	array();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['department_list']				=	$this->dept_model->get_all_departments();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/organization/department/department',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function edit_department($department_id)
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']               				=   'EDIT DEPARTMENT';

        $content_data									=	array();

        $content_data['department_list']				=	$this->dept_model->get_all_departments();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['department_detail']				=	$this->dept_model->get_department_by_id($department_id);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/organization/department/department',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_department()
	{
		$dept_data										=	array();
		$dept_data['department_name']					=	$this->input->post('department_name','',TRUE);
		$dept_data['department_head_id']				=	$this->input->post('department_head_id','',TRUE);
		$dept_data['parent_department_id']				=	$this->input->post('parent_department_id','',TRUE);
		$dept_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->dept_model->add_department($dept_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New department inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('department','refresh');

	}
	public function update_department()
	{
		$dept_data										=	array();

		$department_id									=	$this->input->post('department_id','',TRUE);
		$dept_data['department_name']					=	$this->input->post('department_name','',TRUE);
		$dept_data['department_head_id']				=	$this->input->post('department_head_id','',TRUE);
		$dept_data['parent_department_id']				=	$this->input->post('parent_department_id','',TRUE);
		$dept_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->dept_model->update_department($dept_data, $department_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('department','refresh');

	}
}
