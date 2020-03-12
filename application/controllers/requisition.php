<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisition extends CI_Controller {
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
		$this->load->model('item_model','item_model',TRUE);
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

        $data['page_title']    							=   'requisition';

        $content_data									=	array();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['item_list']						=	$this->item_model->get_all_items();

        $content_data['requisition_list']				=	$this->requisition_model->get_all_requisitions();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/requisition',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	public function edit_requisition($requisition_id)
	{
        $data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'EDIT requisition';

        $content_data									=	array();

        $content_data['requisition_list']				=	$this->requisition_model->get_all_requisitiones();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['requisition_detail']				=	$this->requisition_model->get_requisition_by_id($requisition_id);

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/organization/requisition/requisition',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function add_requisition()
	{
		$requisition_data								=	array();
		$requisition_data['employee_id']				=	$this->input->post('employee_id','',TRUE);
		$requisition_data['requisition_date']			=	$this->input->post('requisition_date','',TRUE);
		$requisition_data['comment']					=	$this->input->post('comment','',TRUE);
		$requisition_data['user_id']					=	$this->session->userdata('employee_id');

		$result											=	$this->requisition_model->add_requisition($requisition_data);

		// data for requistion_detail___________
		$requisition_detail_data 						=	array();

		$item_id										=	$this->input->post('item_id');


		$quantity										=	$this->input->post('quantity');


		if($result){

			$requisition_detail_data['requisition_id']	=	$result;
			
			$count 										=	count($item_id);

			for ($i=0; $i < $count; $i++) {

				$requisition_detail_data['item_id']		=	trim($item_id[$i]);

				$requisition_detail_data['quantity']	=	trim($quantity[$i]);

				$detail_result 							=	$this->requisition_model->add_requisition_detail($requisition_detail_data);
			}
		}


		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New requisition inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('requisition','refresh');

	}
	public function update_requisition()
	{
		$requisition_data								=	array();

		$requisition_id									=	$this->input->post('requisition_id','',TRUE);
		$requisition_data['requisition_name']			=	$this->input->post('requisition_name','',TRUE);
		$requisition_data['requisition_head_id']		=	$this->input->post('requisition_head_id','',TRUE);
		$requisition_data['requisition_address']		=	$this->input->post('requisition_address','',TRUE);
		$requisition_data['user_id']					=	$this->session->userdata('employee_id');

		$result											=	$this->requisition_model->update_requisition($requisition_data, $requisition_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('requisition','refresh');

	}
}
