<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_Summary {

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

	public function update_attendance_summary($employee_id,$date){
		$CI =& get_instance();
	    $CI->load->model('employee_model','employee_model',TRUE);
	    $CI->load->model('leave_model','leave_model',TRUE);
	    $CI->load->model('leave_type_model','lt_model',TRUE);
	    $CI->load->model('leave_model','leave_model',TRUE);
	    $CI->load->model('shift_model','shift_model',TRUE);
	    $CI->load->model('holiday_model','holiday_model',TRUE);
	    $CI->load->model('attendance_model','attn_model',TRUE);
	    $CI->load->model('attendance_setting_model','attn_sett_model',TRUE);
	    $CI->load->model('leave_summary_model','ls_model',TRUE);
	    $CI->load->library('datelib');

		$employee_detail 									=	$CI->employee_model->get_employee_by_id($employee_id);

		$start_day											=	$CI->datelib->first_day_of_the_month($date);

		$end_day											=	$CI->datelib->last_day_of_the_month($date);

		$shift_data 										=	$CI->shift_model->get_shift_by_id($employee_detail->shift_id);

		$attn_summary_data 									=	array();

		$weekday 											=	0;

		if(strtotime($employee_detail->joining_date) > strtotime($start_day)){
			$start_day 										=	$employee_detail->joining_date;
			$weekday 										=	$shift_data->weekday;
			$attn_summary_data['weekdays']					=	$CI->datelib->count_week_days_in_range($start_day,$end_day,$weekday);
			$weekday 										=	$shift_data->weekday+1;
		} else {
			$weekday 										=	$shift_data->weekday+1;
			$ignore[0] 										=	$shift_data->weekday;
			$attn_summary_data['weekdays'] 					=	$CI->datelib->count_week_days_in_month($CI->datelib->get_year_from_date($date),$CI->datelib->get_month_from_date($date), $ignore);				
		}

		//--------calculate early and late-----------
		$on_duty_time										=	$shift_data->on_duty_time;
		$late_minutes 										=	$shift_data->late_time;

		$late_time 											=	$CI->datelib->add_minutes_to_time($on_duty_time, $late_minutes);

		$off_duty_time										=	$shift_data->off_duty_time;
		$early_minutes 										=	$shift_data->early_leave_time;

		$early_leave_time									=	$CI->datelib->subtract_minutes_to_time($off_duty_time, $early_minutes);

		$attn_summary_data['late']							=	$CI->attendance_model->get_late_by_employee_id_and_date($employee_id,$start_day, $end_day, $late_time)->late;
		$attn_summary_data['early']							=	$CI->attendance_model->get_early_by_employee_id_and_date($employee_id,$start_day, $end_day,$early_leave_time)->early;

		$late_setting 										=	$CI->attn_sett_model->get_attendance_setting_by_key_and_leave_status('Late',0);
		$early_setting 										=	$CI->attn_sett_model->get_attendance_setting_by_key_and_leave_status('Early',0);

		if($late_setting != NULL){
			$attn_summary_data['late_for_fine']				=	(int) floor($attn_summary_data['late'] / $late_setting->occurred_amount * $late_setting->penalty_amount);
		}

		if($early_setting != NULL){
			$attn_summary_data['early_for_fine']			=	(int) floor($attn_summary_data['early'] / $early_setting->occurred_amount * $early_setting->penalty_amount);
		}

		//----------end early and late-------

		$attn_summary_data['attendance_month'] 				=	$CI->datelib->first_day_of_the_month($date);
		$attn_summary_data['workdays']						=	$CI->attendance_model->get_workdays_by_employee_id_and_date($employee_id,$start_day, $end_day)->workdays;
		
		$attn_summary_data['leave']							=	$CI->leave_model->get_leave_detail_by_employee_id_and_date_and_weekday($employee_id,$start_day, $end_day, $weekday)->leave;

		$attn_summary_data['holidays'] 						=	$CI->holiday_model->get_holidays_by_date($start_day, $end_day, $weekday)->holidays;

		$attn_summary_data['days_of_month']					=	$CI->datelib->get_days_between_range($start_day,$end_day);

		$today 												=	date('Y-m-d');

		if(strtotime($end_day) > strtotime($today)){
			echo $attn_summary_data['absent'] 				=	$this->calculate_absent($employee_id, $start_day, $today,$attn_summary_data['workdays'], $weekday);
			
		}else {
			$attn_summary_data['absent']					=	($attn_summary_data['days_of_month']-$attn_summary_data['holidays']-$attn_summary_data['weekdays']) - $attn_summary_data['workdays'];			
		}

		$found 												=	$CI->attendance_model->get_attendance_summary_by_employee_id_and_month($employee_id,$attn_summary_data['attendance_month']);
		if($found!=null){
			$result_attn_summary_update 					=	$CI->attendance_model->update_attendance_summary($attn_summary_data,$found->attendance_summary_id);
			return $result_attn_summary_update;
		}else {
			$attn_summary_data['employee_id'] 				=	$employee_id;
			$result_attn_summary_add 						=	$CI->attendance_model->add_attendance_summary($attn_summary_data);
			return $result_attn_summary_add;
		}
	}

	private function calculate_absent($employee_id, $start_day, $end_day, $workdays, $weekday){
		$CI =& get_instance();
	    $CI->load->model('employee_model','employee_model',TRUE);
	    $CI->load->model('holiday_model','holiday_model',TRUE);
	    $CI->load->library('datelib');
		$employee_detail 									=	$CI->employee_model->get_employee_by_id($employee_id);

		$weekday 											=	$weekday - 1;
		$weekdays 											=	$CI->datelib->count_week_days_in_range($start_day,$end_day,$weekday);

		$weekday 											=	$weekday+1;

		$days_of_month										=	$CI->datelib->get_days_between_range($start_day,$end_day);
		$holidays 											=	$CI->holiday_model->get_holidays_by_date($start_day, $end_day, $weekday)->holidays;

		$absent 											=	($days_of_month - $holidays - $weekdays) - $workdays;

		return $absent;
	}


}

?>