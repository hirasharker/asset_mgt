<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('item_model','item_model',TRUE);
		$this->load->model('group_model','group_model',TRUE);
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

        $data['page_title']    							=   'item';

        $content_data									=	array();

        $content_data['item_list']						=	$this->item_model->get_all_items();

        $content_data['group_list']						=	$this->group_model->get_all_groups();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/item',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function edit_item($item_id)
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'EDIT item';

        $content_data									=	array();

        $content_data['item_list']						=	$this->item_model->get_all_items();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['item_detail']				=	$this->item_model->get_item_by_id($item_id);

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/organization/item/item',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_item()
	{
		$item_data										=	array();

		$nav_data 										=	array();

		$item_data['item_name']							=	$this->input->post('item_name','',TRUE);
		$item_data['group_id']							=	$this->input->post('group_id',0,TRUE);
		$item_data['item_description']					=	$this->input->post('item_description','',TRUE);
		$item_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->item_model->add_item($item_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New item inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('item','refresh');

	}
	public function update_item()
	{
		$item_data								=	array();

		$item_id									=	$this->input->post('item_id','',TRUE);
		$item_data['item_name']					=	$this->input->post('item_name','',TRUE);
		$item_data['item_head_id']				=	$this->input->post('item_head_id','',TRUE);
		$item_data['item_address']				=	$this->input->post('item_address','',TRUE);
		$item_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->item_model->update_item($item_data, $item_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('item','refresh');

	}
}
