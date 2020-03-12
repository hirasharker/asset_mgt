<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('company_model','company_model',TRUE);
		$this->load->model('branch_model','branch_model',TRUE);
		$this->load->model('shift_model','shift_model',TRUE);
		$this->load->model('bank_model','bank_model',TRUE);
		$this->load->model('department_model','dept_model',TRUE);
		$this->load->model('designation_model','desg_model',TRUE);
		$this->load->model('qualification_model','qf_model', TRUE);
		$this->load->model('nominee_model','nominee_model', TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
		$this->load->model('module_model','module_model',TRUE);
		
		$this->load->library('leave_summary');
		$this->load->library('datelib');
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

        $data['page_title']               					=   'EMPLOYEE';

        $employee_id 										=	$this->input->post('employee_id','',TRUE);

        $content_data										=	array();

        if($employee_id!=NULL){
        	$content_data['employee_detail']				=	$this->employee_model->get_employee_by_id($employee_id);
        	$content_data['qualification_list'] 			=	$this->qf_model->get_qualification_by_employee_id($employee_id);
        	$content_data['nominee_list']					=	$this->nominee_model->get_nominee_by_employee_id($employee_id);
        }

        $content_data['employee_list']						=	$this->employee_model->get_all_employees();
        $content_data['company_list'] 						=	$this->company_model->get_all_companies();
        $content_data['branch_list']						=	$this->branch_model->get_all_branches();
        $content_data['shift_list']							=	$this->shift_model->get_all_shifts();
        $content_data['bank_list'] 							=	$this->bank_model->get_all_banks();
        $content_data['department_list']					=	$this->dept_model->get_all_departments();
        $content_data['employee_list']						=	$this->employee_model->get_all_employees();
        $content_data['designation_list']					=	$this->desg_model->get_all_designations();

        $data['navigation'] =   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/organization/employee/employee',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	

	public function add_employee()
	{
		$employee_data										=	array();
		$session_data 										=	array();

		$employee_data['employee_id']						=	$this->input->post('employee_id',0,TRUE);
		$employee_data['employee_name']						=	$this->input->post('employee_name','',TRUE);
		$employee_data['gender']							=	$this->input->post('gender','',TRUE);
		$employee_data['email_id']							=	$this->input->post('email_id','',TRUE);
		$employee_data['nid']								=	$this->input->post('nid',0,TRUE);
		$employee_data['father_name']						=	$this->input->post('father_name','',TRUE);
		$employee_data['mother_name']						=	$this->input->post('mother_name','',TRUE);
		$employee_data['spouse_name']						=	$this->input->post('spouse_name','',TRUE);
		$employee_data['department_id']						=	$this->input->post('department_id',0,TRUE);
		$employee_data['reporting_employee_id']				=	$this->input->post('reporting_employee_id',0,TRUE);
		$employee_data['reference_id']						=	$this->input->post('reference_id',0,TRUE);
		$employee_data['company_id']						=	$this->input->post('company_id',0,TRUE);
		$employee_data['branch_id']							=	$this->input->post('branch_id',0,TRUE);
		$employee_data['designation_id']					=	$this->input->post('designation_id',0,TRUE);
		$employee_data['current_designation_id']			=	$employee_data['designation_id'];
		$employee_data['shift_id']							=	$this->input->post('shift_id',0,TRUE);
		$employee_data['joining_date']						=	$this->input->post('joining_date','',TRUE);
		$employee_data['employee_status']					=	$this->input->post('employee_status',0,TRUE);
		$employee_data['employee_type']						=	$this->input->post('employee_type',0,TRUE);
		$employee_data['pf_elligiblity']					=	$this->input->post('pf_elligiblity',0,TRUE);
		$employee_data['basic_salary']						=	$this->input->post('basic_salary',0,TRUE);
		$employee_data['payment_mode']						=	$this->input->post('payment_mode',0,TRUE);
		$employee_data['bank_id']							=	$this->input->post('bank_id',0,TRUE);
		$employee_data['bank_account_no']					=	$this->input->post('bank_account_no',0,TRUE);
		$employee_data['work_phone']						=	$this->input->post('work_phone','',TRUE);
		$employee_data['extension']							=	$this->input->post('extension',0,TRUE);
		$employee_data['role']								=	$this->input->post('role',0,TRUE);
		$employee_data['personal_phone']					=	$this->input->post('personal_phone',0,TRUE);
		$employee_data['personal_email_id']					=	$this->input->post('personal_email_id','',TRUE);
		$employee_data['marital_status']					=	$this->input->post('marital_status',0,TRUE);
		$employee_data['birth_date']						=	$this->input->post('birth_date','',TRUE);
		$employee_data['present_address']					=	$this->input->post('present_address','',TRUE);
		$employee_data['permanent_address']					=	$this->input->post('permanent_address','',TRUE);

		$employee_data['user_id']							=	$this->session->userdata('employee_id');

		$image_upload										=	$this->upload_model->upload_file('employee_image','employee_img'); //after upload
		if(isset($image_upload['file_name'])){
			$employee_data['employee_image'] 				=	$image_upload['file_name'];
		}else{
			$session_data['error'] 							=	$image_upload['error'];
			$this->session->set_userdata($session_data);
			// redirect('employee','refresh');
		}

		$result												=	$this->employee_model->add_employee($employee_data);

		if($result!=NULL){
			$session_data['message']						=	'New employee inserted successfully!!';
			$this->session->set_userdata($session_data);
		}else{

			$session_data['error']							=	'Insertion Failed!!!!';
			$this->session->set_userdata($session_data);
			// redirect('employee','refresh');
		}

		

		$qualification_name									=	$this->input->post('qualification_name','',TRUE);
		$institution_name									=	$this->input->post('institution_name','',TRUE);
		$qualification_department							=	$this->input->post('qualification_department','',TRUE);
		$grade												=	$this->input->post('grade',0,TRUE);
		$passing_year										=	$this->input->post('passing_year','',TRUE);
		$board_name											=	$this->input->post('board_name','',TRUE);

		$count 												=	count($qualification_name);
		
		$qualification_data 								=	array();
		for ($i=0; $i < $count ; $i++) {
			// $qualification_data['employee_id']					=	$result;
			$qualification_data['employee_id']					=	$employee_data['employee_id'];
			$qualification_data['qualification_name']			=	$qualification_name[$i];
			$qualification_data['institution_name']				=	$institution_name[$i];
			$qualification_data['qualification_department']		=	$qualification_department[$i];
			$qualification_data['grade']						=	$grade[$i];
			$qualification_data['passing_year']					=	$passing_year[$i];
			$qualification_data['board_name']					=	$board_name[$i];
			$qualification_data['user_id']						=	$this->session->userdata('employee_id');
			
			$qf_result											=	$this->qf_model->add_qualification($qualification_data);

			if($qf_result!=NULL){
			$session_data['message']							=	'New employee inserted successfully!!';
			$this->session->set_userdata($session_data);
			}else{
				$session_data['error']							=	'Qualification Not Added!!!!';
				$this->session->set_userdata($session_data);
				// redirect('employee','refresh');
			}
		}

		$nominee_name										=	$this->input->post('nominee_name','',TRUE);
		$relation											=	$this->input->post('relation','',TRUE);

		$nominee_data 										=	array();

		$count 												=	count($nominee_name);

		for ($i=0; $i < $count ; $i++) {
			// $nominee_data['employee_id']					=	$result;
			$nominee_data['employee_id']					=	$employee_data['employee_id'];
			$nominee_data['nominee_name']					=	$nominee_name[$i];
			$nominee_data['relation']						=	$relation[$i];
			$nominee_data['user_id']						=	$this->session->userdata('employee_id');

			$nominee_result									=	$this->nominee_model->add_nominee($nominee_data);

			if($nominee_result!=NULL){
			$session_data['message']						=	'New employee inserted successfully!!';
			$this->session->set_userdata($session_data);
			}else{
				$session_data['error']							=	'Nominee Not Added!!!!';
				$this->session->set_userdata($session_data);
				// redirect('employee','refresh');
			}
		}

		// redirect('employee','refresh');

	}


	public function update_employee()
	{
		$employee_data										=	array();
		$session_data 										=	array();

		$employee_id 										=	$this->input->post('employee_id',0,TRUE);

		$employee_data['employee_name']						=	$this->input->post('employee_name','',TRUE);
		$employee_data['gender']							=	$this->input->post('gender','',TRUE);
		$employee_data['email_id']							=	$this->input->post('email_id','',TRUE);
		$employee_data['nid']								=	$this->input->post('nid','',TRUE);
		$employee_data['father_name']						=	$this->input->post('father_name','',TRUE);
		$employee_data['mother_name']						=	$this->input->post('mother_name','',TRUE);
		$employee_data['spouse_name']						=	$this->input->post('spouse_name','',TRUE);
		$employee_data['department_id']						=	$this->input->post('department_id',0,TRUE);
		$employee_data['reporting_employee_id']				=	$this->input->post('reporting_employee_id',0,TRUE);
		$employee_data['reference_id']						=	$this->input->post('reference_id',0,TRUE);
		$employee_data['company_id']						=	$this->input->post('company_id',0,TRUE);
		$employee_data['branch_id']							=	$this->input->post('branch_id',0,TRUE);
		$employee_data['designation_id']					=	$this->input->post('designation_id',0,TRUE);
		$employee_data['shift_id']							=	$this->input->post('shift_id',0,TRUE);
		$employee_data['joining_date']						=	$this->input->post('joining_date','',TRUE);
		$employee_data['employee_status']					=	$this->input->post('employee_status',0,TRUE);
		$employee_data['employee_type']						=	$this->input->post('employee_type',0,TRUE);
		$employee_data['pf_elligiblity']					=	$this->input->post('pf_elligiblity',0,TRUE);
		$employee_data['basic_salary']						=	$this->input->post('basic_salary',0,TRUE);
		$employee_data['payment_mode']						=	$this->input->post('payment_mode',0,TRUE);
		$employee_data['bank_id']							=	$this->input->post('bank_id',0,TRUE);
		$employee_data['bank_account_no']					=	$this->input->post('bank_account_no',0,TRUE);
		$employee_data['work_phone']						=	$this->input->post('work_phone',0,TRUE);
		$employee_data['extension']							=	$this->input->post('extension',0,TRUE);
		$employee_data['role']								=	$this->input->post('role',0,TRUE);
		$employee_data['personal_phone']					=	$this->input->post('personal_phone',0,TRUE);
		$employee_data['personal_email_id']					=	$this->input->post('personal_email_id','',TRUE);
		$employee_data['marital_status']					=	$this->input->post('marital_status','',TRUE);
		$employee_data['birth_date']						=	$this->input->post('birth_date','',TRUE);
		$employee_data['present_address']					=	$this->input->post('present_address','',TRUE);
		$employee_data['permanent_address']					=	$this->input->post('permanent_address','',TRUE);

		// $image_upload										=	$this->upload_model->upload_file('employee_image','employee_img'); //after upload
		// if(isset($image_upload['file_name'])){
		// 	$employee_data['employee_image'] 				=	$image_upload['file_name'];
		// }else{
		// 	$session_data['error'] 							=	$image_upload['error'];
		// 	$this->session->set_userdata($sdata);
		// 	redirect('employee','refresh');
		// }

		$result												=	$this->employee_model->update_employee($employee_data,$employee_id);

		if($result!=NULL){
			$session_data['message']						=	'Employee updated successfully!!';
			$this->leave_summary->init_leave_summary($employee_id,date('Y-m-d'));
			$this->session->set_userdata($session_data);
		}else{

			$session_data['error']							=	'Update Failed!!!!';
			$this->session->set_userdata($session_data);
			redirect('employee','refresh');
		}

		
		$qualification_name									=	$this->input->post('qualification_name','',TRUE);
		$institution_name									=	$this->input->post('institution_name','',TRUE);
		$qualification_department							=	$this->input->post('qualification_department','',TRUE);
		$grade												=	$this->input->post('grade',0,TRUE);
		$passing_year										=	$this->input->post('passing_year','',TRUE);
		$board_name											=	$this->input->post('board_name','',TRUE);

		$count 												=	count($qualification_name);
		
		$qualification_data 								=	array();

		$delete_result 										=	$this->qf_model->delete_qualification_by_employee_id($employee_id);

		for ($i=0; $i < $count ; $i++) {
			$qualification_data['employee_id']					=	$employee_id;
			$qualification_data['qualification_name']			=	$qualification_name[$i];
			$qualification_data['institution_name']				=	$institution_name[$i];
			$qualification_data['qualification_department']		=	$qualification_department[$i];
			$qualification_data['grade']						=	$grade[$i];
			$qualification_data['passing_year']					=	$passing_year[$i];
			$qualification_data['board_name']					=	$board_name[$i];
			$qualification_data['user_id']						=	$this->session->userdata('employee_id');
			
			$qf_result											=	$this->qf_model->add_qualification($qualification_data);

			if($qf_result!=NULL){
			$session_data['message']							=	'Employee updated successfully!!';
			$this->session->set_userdata($session_data);
			}else{
				$session_data['error']							=	'Qualification Not Updated!!!!';
				$this->session->set_userdata($session_data);
				redirect('employee','refresh');
			}
		}
		$nominee_name										=	$this->input->post('nominee_name','',TRUE);
		$relation											=	$this->input->post('relation','',TRUE);

		$nominee_data 										=	array();

		$count 												=	count($nominee_name);

		$delete_result 										=	$this->nominee_model->delete_nominee_by_employee_id($employee_id);

		for ($i=0; $i < $count ; $i++) {
			$nominee_data['employee_id']					=	$employee_id;
			$nominee_data['nominee_name']					=	$nominee_name[$i];
			$nominee_data['relation']						=	$relation[$i];
			$nominee_data['user_id']						=	$this->session->userdata('employee_id');

			$nominee_result									=	$this->nominee_model->add_nominee($nominee_data);

			if($nominee_result!=NULL){
			$session_data['message']						=	'Employee updated successfully!!';
			$this->session->set_userdata($session_data);
			}else{
				$session_data['error']						=	'Nominee Not Updated!!!!';
				$this->session->set_userdata($session_data);
				redirect('employee','refresh');
			}
		}

		redirect('employee','refresh');

	}


	public function  delete_employee(){
		$delete_nominee 									=	NULL;

		$delete_qf 											=	NULL;

		$employee_id 										=	$this->input->post('employee_id','',TRUE);

		$result 											=	$this->employee_model->delete_employee($employee_id);

		if($result){
			$delete_qf 										=	$this->qf_model->delete_qualification_by_employee_id($employee_id);
		}

		
		if($result) {
			$delete_nominee 								=	$this->nominee_model->delete_nominee_by_employee_id($employee_id);
		}

		redirect('employee','refresh');
	}

	

	public function test(){
		$this->leave_summary->update_leave_summary(4343,date('Y-m-d'));

	}

	
}
