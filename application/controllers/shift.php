<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('shift_model','shift_model',TRUE);
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

        $data['page_title']								=	'SHIFT SETITNGS';

        $content_data									=	array();

        $shift_id 										=	$this->input->post('shift_id','',TRUE);

        if($shift_id!=NULL){
        	$content_data['shift_detail']				=	$this->shift_model->get_shift_by_id($shift_id);
        }

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['shift_list']						=	$this->shift_model->get_all_shifts();

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/attendance/shift/shift',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	
	public function add_shift()
	{
		$shift_data										=	array();

		$shift_data['shift_name']						=	$this->input->post('shift_name','',TRUE);
		$shift_data['on_duty_time']						=	$this->input->post('on_duty_time','',TRUE);
		$shift_data['off_duty_time']					=	$this->input->post('off_duty_time','',TRUE);
		$shift_data['late_time']						=	$this->input->post('late_time','',TRUE);
		$shift_data['early_leave_time']					=	$this->input->post('early_leave_time','',TRUE);
		$shift_data['weekday']							=	$this->input->post('weekday','',TRUE);
		$shift_data['working_hour_limit']				=	$this->input->post('working_hour_limit','',TRUE);
		$shift_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->shift_model->add_shift($shift_data);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New shift inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('shift','refresh');

	}
	public function update_shift()
	{
		$shift_data										=	array();

		$shift_id										=	$this->input->post('shift_id','',TRUE);
		$shift_data['shift_name']						=	$this->input->post('shift_name','',TRUE);
		$shift_data['on_duty_time']						=	$this->input->post('on_duty_time','',TRUE);
		$shift_data['off_duty_time']					=	$this->input->post('off_duty_time','',TRUE);
		$shift_data['late_time']						=	$this->input->post('late_time','',TRUE);
		$shift_data['early_leave_time']					=	$this->input->post('early_leave_time','',TRUE);
		$shift_data['weekday']							=	$this->input->post('weekday','',TRUE);
		$shift_data['working_hour_limit']				=	$this->input->post('working_hour_limit','',TRUE);
		$shift_data['user_id']							=	$this->session->userdata('employee_id');

		$result											=	$this->shift_model->update_shift($shift_data, $shift_id);

		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'Update Successfull!!';
		}else{

			$session_data['error']						=	'Update Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('shift','refresh');

	}
	public function count (){
		$ignore[0] = 5;
		// $ignore[1] = 1;
		echo $this->countDays(2018, 3, $ignore); // 23
	}
	private function countDays($year, $month, $ignore) {
	    $count = 0;
	    $counter = mktime(0, 0, 0, $month, 1, $year);
	    while (date("n", $counter) == $month) {
	        if (in_array(date("w", $counter), $ignore) == false) {
	            $count++;
	        }
	        $counter = strtotime("+1 day", $counter);
	    }
	    return $count;
	}
// echo countDays(2013, 1, array(0, 6)); // 23
}
