<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('designation_model','desg_model',TRUE);
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

        $data['page_title']               				=   'DESIGNATION';

        $content_data									=	array();

        $content_data['designation_list']				=	$this->desg_model->get_all_designations();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/organization/designation/designation',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function edit_designation($designation_id)
	{
        $data               							=   array();

        $data['page_title']               				=   'DESIGNATION';

        $content_data									=	array();

        $content_data['designation_list']				=	$this->desg_model->get_all_designations();

        $content_data['designation_detail']				=	$this->desg_model->get_designation_by_id($designation_id);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/organization/designation/designation',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_designation()
	{
		$desg_data										=	array();
		$desg_data['designation_name']					=	$this->input->post('designation_name','',TRUE);
		$desg_data['superior_designation_id']			=	$this->input->post('superior_designation_id','',TRUE);

		if($desg_data['superior_designation_id']!=NULL){

			$designation_detail 						=	$this->desg_model->get_designation_by_id($desg_data['superior_designation_id']);

			$desg_data['rank']							=	$designation_detail->rank + 1;			
		}else {
			$desg_data['rank']							=	0;			
		}
		$desg_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->desg_model->add_designation($desg_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New Designation inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('designation','refresh');

	}
	public function update_designation()
	{
		$desg_data										=	array();

		$designation_id									=	$this->input->post('designation_id','',TRUE);
		$desg_data['designation_name']					=	$this->input->post('designation_name','',TRUE);
		$desg_data['superior_designation_id']			=	$this->input->post('superior_designation_id','',TRUE);

		if($desg_data['superior_designation_id']!=NULL){

			$designation_detail 						=	$this->desg_model->get_designation_by_id($desg_data['superior_designation_id']);
			
			$desg_data['rank']							=	$designation_detail->rank + 1;			
		}else {
			$desg_data['rank']							=	0;			
		}
		
		$desg_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->desg_model->update_designation($desg_data, $designation_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('designation','refresh');

	}
}
