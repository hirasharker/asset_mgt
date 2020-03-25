<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('branch_model','branch_model',TRUE);
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

        $data['page_title']    							=   'Approval Requisition';

        $content_data									=	array();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['branch_list']					=	$this->branch_model->get_all_branches();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/organization/branch/branch',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function edit_branch($branch_id)
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'EDIT BRANCH';

        $content_data									=	array();

        $content_data['branch_list']					=	$this->branch_model->get_all_branches();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['branch_detail']				=	$this->branch_model->get_branch_by_id($branch_id);

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/organization/branch/branch',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_branch()
	{
		$branch_data									=	array();
		$branch_data['branch_name']						=	$this->input->post('branch_name','',TRUE);
		$branch_data['branch_head_id']					=	$this->input->post('branch_head_id','',TRUE);
		$branch_data['branch_address']					=	$this->input->post('branch_address','',TRUE);
		$branch_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->branch_model->add_branch($branch_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New branch inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('branch','refresh');

	}
	public function update_branch()
	{
		$branch_data								=	array();

		$branch_id									=	$this->input->post('branch_id','',TRUE);
		$branch_data['branch_name']					=	$this->input->post('branch_name','',TRUE);
		$branch_data['branch_head_id']				=	$this->input->post('branch_head_id','',TRUE);
		$branch_data['branch_address']				=	$this->input->post('branch_address','',TRUE);
		$branch_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->branch_model->update_branch($branch_data, $branch_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('branch','refresh');

	}
}
