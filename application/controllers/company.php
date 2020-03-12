<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('company_model','company_model',TRUE);
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

        $data['page_title']    							=   'COMPANY';

        $content_data									=	array();

        $company_id 									=	$this->input->post('company_id','',TRUE);

        if($company_id!=NULL){
        	$content_data['company_detail']				=	$this->company_model->get_company_by_id($company_id);
        }

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['company_list']					=	$this->company_model->get_all_companies();

        $data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $data['content']    							=   $this->load->view('pages/organization/company/company',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_company()
	{
		$company_data									=	array();
		$company_data['company_name']					=	$this->input->post('company_name','',TRUE);
		$company_data['company_description']			=	$this->input->post('company_description','',TRUE);
		$company_data['user_id']						=	$this->session->userdata('employee_id');

		$result											=	$this->company_model->add_company($company_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New company inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('company','refresh');

	}
	public function update_company()
	{
		$company_data										=	array();

		$company_id										=	$this->input->post('company_id','',TRUE);
		$company_data['company_name']					=	$this->input->post('company_name','',TRUE);
		$company_data['company_description']			=	$this->input->post('company_description','',TRUE);
		$company_data['user_id']						=	$this->session->userdata('employee_id');

		$result											=	$this->company_model->update_company($company_data, $company_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('company','refresh');

	}
}
