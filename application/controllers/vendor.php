<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('vendor_model','vendor_model',TRUE);
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

        $data['page_title']    							=   'vendor';

        $content_data									=	array();

        $content_data['vendor_list']					=	$this->vendor_model->get_all_vendors();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/vendor',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function edit_vendor($vendor_id)
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'EDIT vendor';

        $content_data									=	array();

        $content_data['vendor_list']					=	$this->vendor_model->get_all_vendors();

        $content_data['vendor_detail']					=	$this->vendor_model->get_vendor_by_id($vendor_id);

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/asset_mgt/vendor',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_vendor()
	{
		$vendor_data									=	array();
		$vendor_data['vendor_name']						=	$this->input->post('vendor_name','',TRUE);
		$vendor_data['address']							=	$this->input->post('address','',TRUE);
		$vendor_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->vendor_model->add_vendor($vendor_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New vendor inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('vendor','refresh');

	}
	public function update_vendor()
	{
		$vendor_data								=	array();

		$vendor_id									=	$this->input->post('vendor_id','',TRUE);
		$vendor_data['vendor_name']					=	$this->input->post('vendor_name','',TRUE);
		$vendor_data['vendor_head_id']				=	$this->input->post('vendor_head_id','',TRUE);
		$vendor_data['vendor_address']				=	$this->input->post('vendor_address','',TRUE);
		$vendor_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->vendor_model->update_vendor($vendor_data, $vendor_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('vendor','refresh');

	}
}
