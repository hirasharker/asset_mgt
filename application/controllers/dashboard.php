<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('branch_model','branch_model',TRUE);
		$this->load->model('department_model','dept_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('designation_model','desg_model',TRUE);
		$this->load->model('qualification_model','qf_model', TRUE);
		$this->load->model('nominee_model','nominee_model', TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
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
        $data               =   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title'] =   'DASHBOARD';

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/dashboard/dashboard','',TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
}
