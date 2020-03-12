<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('transfer_model','desg_model',TRUE);
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

        $data['page_title']               				=   'TRANSFER';

        $content_data									=	array();

        $content_data['transfer_list']					=	$this->desg_model->get_all_transfers();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/organization/transfer/transfer',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function edit_transfer($transfer_id)
	{
        $data               							=   array();

        $data['page_title']               				=   'transfer';

        $content_data									=	array();

        $content_data['transfer_list']					=	$this->desg_model->get_all_transfers();

        $content_data['transfer_detail']				=	$this->desg_model->get_transfer_by_id($transfer_id);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/organization/transfer/transfer',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_transfer()
	{
		$desg_data										=	array();
		$desg_data['transfer_name']						=	$this->input->post('transfer_name','',TRUE);
		$desg_data['superior_transfer_id']				=	$this->input->post('superior_transfer_id','',TRUE);
		$desg_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->desg_model->add_transfer($desg_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New transfer inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('transfer','refresh');

	}
	public function update_transfer()
	{
		$desg_data										=	array();

		$transfer_id									=	$this->input->post('transfer_id','',TRUE);
		$desg_data['transfer_name']					=	$this->input->post('transfer_name','',TRUE);
		$desg_data['superior_transfer_id']			=	$this->input->post('superior_transfer_id','',TRUE);
		$desg_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->desg_model->update_transfer($desg_data, $transfer_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('transfer','refresh');

	}
}
