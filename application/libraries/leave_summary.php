<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_Summary {

	/**
	 * Index Page for CI controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since CI controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function init_leave_summary($employee_id, $date){
		$CI =& get_instance();
	    $CI->load->model('employee_model','employee_model',TRUE);
	    $CI->load->model('leave_type_model','lt_model',TRUE);
	    $CI->load->model('leave_summary_model','ls_model',TRUE);
	    $CI->load->library('datelib');


		$leave_summary_data 								=	array();

		$leave_summary_data['employee_id']					=	$employee_id;
		$leave_summary_data['leave_year']					=	$CI->datelib->get_first_day_of_year_from_date($date);

		$employee_detail 									=	$CI->employee_model->get_employee_by_id($employee_id);

		$leave_type_data 									=	$CI->lt_model->get_leave_type_by_employee_type($employee_detail->employee_type);

		if($leave_type_data!=NULL){
			foreach($leave_type_data as $lt_value){
				$found_data 								=	$CI->ls_model->get_leave_summary_by_employee_id_leave_type_and_year($employee_id,$lt_value->leave_type_id,$leave_summary_data['leave_year']);		
				if($found_data==NULL){
					$leave_summary_data['leave_type_id']	=	$lt_value->leave_type_id;
					if($lt_value->status==2){
						$leave_summary_data['total_leave']	=	0;
						$leave_summary_data['leave_balance']=	0;
					}else{
						$leave_summary_data['total_leave']	=	$lt_value->leave_quantity;
						$leave_summary_data['leave_balance']=	$lt_value->leave_quantity;
						if($lt_value->leave_quantity==0){
							$leave_summary_data['unlimited']=	1;
						}
					}
					$result 								=	$CI->ls_model->add_leave_summary($leave_summary_data);
				} 
			}
		}
		
	}



	public function update_leave_summary($employee_id, $leave_type_id, $date){
		$CI =& get_instance();
	    $CI->load->model('employee_model','employee_model',TRUE);
	    $CI->load->model('leave_type_model','lt_model',TRUE);
	    $CI->load->model('leave_model','leave_model',TRUE);
	    $CI->load->model('shift_model','shift_model',TRUE);
	    $CI->load->model('leave_summary_model','ls_model',TRUE);
	    $CI->load->library('datelib');


		$leave_summary_data 								=	array();

		$leave_summary_data['employee_id']					=	$employee_id;
		$leave_summary_data['leave_year']					=	$CI->datelib->get_first_day_of_year_from_date($date);
		$start_day											=	$leave_summary_data['leave_year'];
		$end_day 											=	$CI->datelib->get_last_day_of_year_from_date($date);

		$leave_summary_data['leave_type_id']				=	$leave_type_id;

		$leave_summary_detail 								=	$CI->ls_model->get_leave_summary_by_employee_id_leave_type_and_year($employee_id,$leave_type_id, $start_day);

		$employee_detail 									=	$CI->employee_model->get_employee_by_id($employee_id);


		// NOT APPLICABLE FOR CURRENT SYSTEM
		$shift_data 										=	$CI->shift_model->get_shift_by_id($employee_detail->shift_id);

		$weekday 											=	$shift_data->weekday+1;

		// $leave_type_data 									=	$CI->lt_model->get_leave_type_by_employee_type($employee_detail->employee_type);

		$applied_leave_data 								=	$CI->leave_model->get_leave_by_employee_id_leave_type_and_date_and_status($employee_id, $leave_type_id, $start_day, $end_day, $weekday, 0);

		if($applied_leave_data != NULL){
			$leave_summary_data['applied_leave']			=	$applied_leave_data->leave_days;
		}else {
			$leave_summary_data['applied_leave'] 			=	0;
		}

		$approved_leave_data 								=	$CI->leave_model->get_leave_by_employee_id_leave_type_and_date_and_status($employee_id, $leave_type_id, $start_day, $end_day, $weekday, 3);

		if($approved_leave_data != NULL){
			$leave_summary_data['approved_leave']			=	$approved_leave_data->leave_days;
		}else {
			$leave_summary_data['approved_leave']			=	0;
		}

		$leave_summary_data['leave_balance']				=	$leave_summary_detail->total_leave - $leave_summary_data['approved_leave'];

		$result 											=	$CI->ls_model->update_leave_summary($leave_summary_data, $leave_summary_detail->leave_summary_id);

		return $result;
	}

	public function update_earned_leave($employee_id, $date){
		$CI =& get_instance();
	    $CI->load->model('employee_model','employee_model',TRUE);
	    $CI->load->model('leave_type_model','lt_model',TRUE);
	    $CI->load->model('leave_model','leave_model',TRUE);
	    $CI->load->model('shift_model','shift_model',TRUE);
	    $CI->load->model('holiday_model','holiday_model',TRUE);
	    $CI->load->model('attendance_model','attn_model',TRUE);
	    $CI->load->model('leave_summary_model','ls_model',TRUE);
	    $CI->load->library('datelib');

	    $employee_detail 									=	$CI->employee_model->get_employee_by_id($employee_id);

	    $shift_detail 										=	$CI->shift_model->get_shift_by_id($employee_detail->shift_id);

	   	$leave_summary_data 								=	array();

	    $start_date 										=	$CI->datelib->get_first_day_of_year_from_date($date);

	    $end_date 											=	$CI->datelib->get_last_day_of_year_from_date($date);

	    $earned_leave_type 									=	$CI->lt_model->get_leave_type_by_leave_status(2);

	    $working_hour 										=	0;

	   	if($earned_leave_type != NULL){
	   		foreach($earned_leave_type as $el_value){
	   			if($el_value->employee_type == $employee_detail->employee_type || $el_value->employee_type == 0){

	   				$leave_summary_detail 					=	$CI->ls_model->get_leave_summary_by_employee_id_leave_type_and_year($employee_id,$el_value->leave_type_id, $start_date);

	   				$working_hour							=	$CI->attn_model->get_working_hour_by_employee_id_and_date($employee_id, $start_date, $end_date)->total_working_hour;

	   				$weekdays 								=	$CI->datelib->count_week_days_in_range($start_date,$end_date,$shift_detail->weekday);

					$days 									=	$CI->datelib->get_days_between_range($start_date,$end_date);	   	

					$holidays								=	$CI->holiday_model->count_holidays_by_date($start_date, $end_date, $shift_detail->weekday)->holidays;

					$max_working_hour 						=	($days - $weekdays - $holidays) * $shift_detail->working_hour_limit;

					$max_el_hour 							=	$el_value->leave_quantity * $shift_detail->working_hour_limit ;

					$earned_leave 							=	(($max_el_hour / $max_working_hour) * $working_hour)/$shift_detail->working_hour_limit;

					$leave_summary_data['total_leave']		=	$earned_leave;

					$CI->ls_model->update_leave_summary($leave_summary_data, $leave_summary_detail->leave_summary_id);
	   			}
	   		}
	   	}
	}



}

?>