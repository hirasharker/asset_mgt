<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pd extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		if($this->session->userdata('role')!=20){
			redirect('dashboard','refresh');
		}
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('promotion_and_demotion_model','pd_model',TRUE);
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

        $data['page_title']               				=   'PROMOTION AND DEMOTION';

        $content_data									=	array();

        $pd_id 		 									=	$this->input->post('pd_id','',TRUE);

        if($pd_id!=NULL){
        	$content_data['pd_detail']					=	$this->pd_model->get_pd_by_id($pd_id);
        }

        $content_data['employee_list']					=	$this->employee_model->get_all_active_employees(date('Y-m-d'));


        $content_data['designation_list']				=	$this->desg_model->get_all_designations();

        $content_data['pd_list']						=	$this->pd_model->get_all_pds();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/organization/pd/pd',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}


	public function add_pd()
	{
		$pd_data										=	array();
		$employee_data 									=	array();
		$session_data									=	array();

		$pd_data['employee_id']							=	$this->input->post('employee_id','',TRUE);
		$pd_data['current_designation_id']				=	$this->input->post('current_designation_id','',TRUE);
		$pd_data['updated_designation_id']				=	$this->input->post('updated_designation_id','',TRUE);
		$pd_data['effective_date']						=	$this->input->post('effective_date','',TRUE);

		$employee_detail 								=	$this->employee_model->get_employee_by_id($pd_data['employee_id']);
		$current_designation_detail 					=	$this->desg_model->get_designation_by_id($pd_data['current_designation_id']);
		$updated_designation_detail 					=	$this->desg_model->get_designation_by_id($pd_data['updated_designation_id']);

		if($updated_designation_detail->rank < $current_designation_detail->rank){ //for promotion.........
			$pd_data['status']							=	1;
		} elseif ($updated_designation_detail->rank > $current_designation_detail->rank) { // for demotion...........
			$pd_data['status']							=	0;
		}else {
			$session_data['error']						=	'Same designation detected!!!';
			$this->session->set_userdata($session_data);
			redirect('pd','refresh');
		}

		// print_r($pd_data); exit();

		$pd_data['user_id']								=	$this->session->userdata('employee_id');

		$result											=	$this->pd_model->add_pd($pd_data);

		if($result!=NULL){
			//-------UPDATE tbl_employee.........
			$employee_data['current_designation_id'] 	=	$pd_data['updated_designation_id'];
			$this->employee_model->update_employee($employee_data, $pd_data['employee_id']);

			if($pd_data['status'] == 1){
				$session_data['message']				=	'Congratulation! '.$employee_detail->employee_name.' is being promoted!!';
			}else {
				$session_data['message']				=	$employee_detail->employee_name.' is being demoted!!';
			}
			
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('pd','refresh');

	}
	public function update_pd()
	{
		$pd_data										=	array();
		$employee_data									=	array();
		$session_data									=	array();

		$pd_id 											=	$this->input->post('pd_id','',TRUE);

		$pd_data['employee_id']							=	$this->input->post('employee_id','',TRUE);
		$pd_data['current_designation_id']				=	$this->input->post('current_designation_id','',TRUE);
		$pd_data['updated_designation_id']				=	$this->input->post('updated_designation_id','',TRUE);
		$pd_data['effective_date']						=	$this->input->post('effective_date','',TRUE);

		$employee_detail 								=	$this->employee_model->get_employee_by_id($pd_data['employee_id']);
		$current_designation_detail 					=	$this->desg_model->get_designation_by_id($pd_data['current_designation_id']);
		$updated_designation_detail 					=	$this->desg_model->get_designation_by_id($pd_data['updated_designation_id']);

		if($updated_designation_detail->rank < $current_designation_detail->rank){ //for promotion.........
			$pd_data['status']							=	1;
		} elseif ($updated_designation_detail->rank > $current_designation_detail->rank) { // for demotion...........
			$pd_data['status']							=	0;
		}else {
			$session_data['error']						=	'Same designation detected!!!';
			$this->session->set_userdata($session_data);
			redirect('pd','refresh');
		}

		$pd_data['user_id']								=	$this->session->userdata('employee_id');

		$result											=	$this->pd_model->update_pd($pd_data, $pd_id);

		

		if($result!=NULL){

			//-------UPDATE tbl_employee.........
			$employee_data['current_designation_id'] 	=	$pd_data['updated_designation_id'];
			$this->employee_model->update_employee($employee_data, $pd_data['employee_id']);


			if($pd_data['status'] == 1){
				$session_data['message']				=	'Congratulation! '.$employee_detail->employee_name.' is being promoted!!';
			}else {
				$session_data['message']				=	$employee_detail->employee_name.' is being demoted!!';
			}
			
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('pd','refresh');

	}
}
