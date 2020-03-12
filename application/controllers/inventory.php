<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		// if($this->session->userdata('role')!=15){
		// 	redirect('dashboard','refresh');
		// }
		$this->load->model('module_model','module_model',TRUE);
		$this->load->model('receive_model','receive_model',TRUE);
		$this->load->model('issue_model','issue_model',TRUE);
		$this->load->model('requisition_model','requisition_model',TRUE);
		$this->load->model('stock_model','stock_model',TRUE);
		$this->load->model('vendor_model','vendor_model',TRUE);
		$this->load->model('quotation_model','quotation_model',TRUE);
		$this->load->model('receive_model','receive_model',TRUE);
		$this->load->model('item_model','item_model',TRUE);
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('upload_model','upload_model',TRUE);
		
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
		$data               				=   array();
		$nav_data							=	array();
		$inventory_data 					=	array();

		$nav_data['user_permission'] 		=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));
		
		$inventory_data['zone_list']		=	$this->zone_model->get_all_zones();
		$inventory_data['inventory_list']	=	$this->inventory_model->get_all_cities();
		$inventory_data['employee_list']	=	$this->employee_model->get_all_employees();

		

        $data['navigation'] =   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    =   $this->load->view('pages/inventory/inventory',$inventory_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}

	public function receive()
	{
			
		$data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'Receive';

        $content_data									=	array();

        $content_data['vendor_list']					=	$this->vendor_model->get_all_vendors();

        $content_data['quotation_list']					=	$this->quotation_model->get_all_quotations();

        $content_data['item_list']						=	$this->item_model->get_all_items();

        $content_data['receive_list']					=	$this->receive_model->get_all_receives();

        // echo '<pre>'; print_r($content_data['receive_list']); echo '</pre>'; exit();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/receive',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);

	}

	public function add_receive() {

		$receive_data								=	array();
		$receive_data['receive_date']				=	$this->input->post('receive_date','',TRUE);
		$receive_data['user_id']					=	$this->session->userdata('employee_id');

		$result										=	$this->receive_model->add_receive($receive_data);

		// data for requistion_detail___________
		$receive_detail_data 						=	array();

		$item_id									=	$this->input->post('item_id');

		$vendor_id									=	$this->input->post('vendor_id');

		$serial_no									=	$this->input->post('serial_no');

		$quantity									=	$this->input->post('quantity');


		if($result){

			$receive_detail_data['receive_id']		=	$result;
			
			$count 									=	count($item_id);

			for ($i=0; $i < $count; $i++) {

				$receive_detail_data['item_id']		=	trim($item_id[$i]);

				$receive_detail_data['vendor_id']	=	trim($vendor_id[$i]);

				$receive_detail_data['serial_no']	=	trim($serial_no[$i]);

				$receive_detail_data['quantity']	=	trim($quantity[$i]);

				$detail_result 							=	$this->receive_model->add_receive_detail($receive_detail_data);

				if($detail_result){
					$stock_result 						=	$this->stock_model->add_stock($receive_detail_data);
				}
			}
		}


		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New receive inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('inventory/receive','refresh');
	}


	public function upload_Receive_list($Receive_data, $file_name){

		$this->load->library('csvreader');

		$result												=	$this->csvreader->parse_file($file_name);

		$count 												=	0;

		$receive_detail_data 								=	array();

		$stock_detail_data									=	array();

		$receive_detail_data['Receive_id']					=	$Receive_data['Receive_id'];

		$duplicate_chassis 									=	$this->check_duplicate_chassis($result);

		if($duplicate_chassis) {
			$session_data['error']							=	'insertion failed! following duplicate chassis found --- '. implode(', ', $duplicate_chassis);
			$this->session->set_userdata($session_data);
			$this->delete_Receive($receive_detail_data['Receive_id']);
			redirect('inventory/receive','refresh');
			// echo '<pre>';print_r($duplicate_chassis); echo '</pre>';exit();
		} else {
			for ($i=1; $i <= count($result) ; $i++) {
				$receive_detail_data['model_id'] 				=	$result[$i]['id'];
				$receive_detail_data['model_name'] 				=	$result[$i]['name'];
				$receive_detail_data['chassis_no'] 				=	$result[$i]['chassis_no'];
				$receive_detail_data['engine_no'] 				=	$result[$i]['engine_no'];

				$detail_result									=	$this->Receive_model->add_Receive_detail($receive_detail_data);

				$stock_detail_data 								=	$receive_detail_data;

				$stock_detail_data['yard_id']					=	$Receive_data['yard_id'];

				$stock_detail_data['stock_position']			=	1;

				$stock_result									=	$this->stock_model->add_stock($stock_detail_data);
			}
			$session_data['message']							=	'successfully added!';
			$this->session->set_userdata($session_data);
			redirect('inventory/receive','refresh');
		}
		// redirect('inventory/receive','refresh');
		return $duplicate_chassis;
	}

	public function check_duplicate_chassis($chassis_list){
		$duplicate_chassis 							=	array();
		for ($i=1; $i <= count($chassis_list) ; $i++) {
			$chassis_found 							=	$this->stock_model->get_stock_by_chassis_no($chassis_list[$i]['chassis_no']);
			if($chassis_found){
				$duplicate_chassis[] 				=	$chassis_found->chassis_no;
			}
		}
		return $duplicate_chassis;
	}

	public function check_duplicate_container($container_no){
		$result 							=	$this->Receive_model->get_Receive_by_container_no($container_no);
		return $result;
	}

	public function issue()
	{
		$data               							=   array();

        $nav_data 										=	array();

        $nav_data['user_permission'] 					=	$this->module_model->get_permission_by_user_id($this->session->userdata('user_id'));

        $data['page_title']    							=   'Receive';

        $content_data									=	array();

        $content_data['employee_list']					=	$this->employee_model->get_all_employees();

        $content_data['requisition_list']				=	$this->requisition_model->get_all_requisitions();

        $content_data['item_list']						=	$this->item_model->get_all_items();

        $content_data['issue_list']						=	$this->issue_model->get_all_issues();

        // echo '<pre>'; print_r($content_data['requisition_list']); echo '</pre>'; exit();

        $data['navigation'] 							=   $this->load->view('template/navigation',$nav_data,TRUE);
        $data['content']    							=   $this->load->view('pages/asset_mgt/issue',$content_data,TRUE);
        $data['footer']    								=   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
		
	}



	public function add_issue()
	{
		$issue_data									=	array();
		$issue_data['issue_date']					=	$this->input->post('issue_date','',TRUE);
		$issue_data['employee_id']					=	$this->input->post('employee_id','',TRUE);
		$issue_data['requisition_id']				=	$this->input->post('requisition_id','',TRUE);
		$issue_data['user_id']						=	$this->session->userdata('employee_id');

		$result										=	$this->issue_model->add_issue($issue_data);

		// data for requistion_detail___________
		$issue_detail_data 							=	array();

		$stock_data 								=	array();

		$item_id									=	$this->input->post('item_id');

		$stock_id									=	$this->input->post('stock_id');

		$quantity									=	$this->input->post('quantity');


		if($result){

			$stock_data['stock_status']				=	1;

			$stock_data['employee_id']				=	$issue_data['employee_id'];

			$stock_data['issue_id']					=	$result;

			$issue_detail_data['issue_id']			=	$result;

			$count 									=	count($item_id);

			for ($i=0; $i < $count; $i++) {

				$issue_detail_data['item_id']		=	trim($item_id[$i]);

				$issue_detail_data['stock_id']		=	trim($stock_id[$i]);

				$issue_detail_data['quantity']		=	trim($quantity[$i]);

				$detail_result 						=	$this->issue_model->add_issue_detail($issue_detail_data);

				if($detail_result){
					$stock_result 					=	$this->stock_model->update_stock($stock_data, trim($stock_id[$i]));
					
				}
			}
		}


		$session_data									=	array();

		if($result!=NULL){
			$session_data['message']					=	'New receive inserted successfully!!';
		}else{

			$session_data['error']						=	'Insertion Failed!!!!';
		}

		$this->session->set_userdata($session_data);

		redirect('inventory/issue','refresh');
	}


	public function check_duplicate_issue($chassis_list){
		$duplicate_issue 							=	array();

		for ($i=0; $i < count($chassis_list); $i++) {
			$issue_found 							=	$this->stock_model->check_stock_for_duplicate_issue($chassis_list[$i]);
			if($issue_found){
				$duplicate_issue[] 					=	$issue_found->chassis_no;
			}
		}
		return $duplicate_issue;
	}

	public function check_dealer_stock($dealer_id, $chassis_list){
		$dealer_detail 								=	$this->dealer_model->get_dealer_by_id($dealer_id);
		
		$current_dealer_stock 						=	$this->stock_model->get_current_dealer_stock_by_dealer_id($dealer_id);

		$is_limit_exceeded 							=	$dealer_detail->dealer_limit < (count($current_dealer_stock) + count($chassis_list)) ? 1 : 0;

		return $is_limit_exceeded;
	}



	public function status()
	{
		$inventory_data						=	array();

		$inventory_data['user_id']			=	$this->session->userdata('employee_id');
		$inventory_data['user_name']		=	$this->session->userdata('email_id');
		$inventory_data['rm_id']			=	$this->input->post('rm_id','',TRUE);
		$inventory_data['inventory_name']	=	$this->input->post('inventory_name','',TRUE);
		$inventory_data['inventory_code']	=	$this->input->post('inventory_code','',TRUE);
		$inventory_data['zone_id']			=	$this->input->post('zone_id','',TRUE);

		$result								=	$this->inventory_model->add_inventory($inventory_data);

		redirect('inventory/index','refresh');
	}

	

	public function ajax_generate_items(){
		$yard_id 				=	$this->input->post('yard_id');

		$result						=	$this->stock_model->get_stock_by_yard_id_for_issue($yard_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}

	public function ajax_generate_items_by_dealer_id(){
		$yard_id 					=	$this->input->post('yard_id');
		$dealer_id 					=	$this->input->post('dealer_id');

		$zone_id					=	$this->dealer_model->get_dealer_by_id($dealer_id)->zone_id;

		$result						=	$this->stock_model->get_stock_by_yard_id_and_zone_id_for_issue($yard_id,$zone_id);

		echo json_encode($result);
		// a die here helps ensure a clean ajax call
	}
	



	public function delete_Receive($Receive_id){
		$result 				=	$this->Receive_model->delete_receive($Receive_id);
	}

	public function delete_issue($issue_id){
		$result 				=	$this->issue_model->delete_issue($issue_id);
	}


	public function inventory_status () {
		$report_data										=	array();
		$sales_data										=	array();
		
		$sales_data['zone_list']							=	$this->zone_model->get_all_zones();
		$sales_data['item_list']							=	$this->item_model->get_all_items();
		$sales_data['yard_list']							=	$this->yard_model->get_all_delivery_yards();
		$sales_data['dealer_list']							=	$this->dealer_model->get_all_dealers();
		$sales_data['bank_list']							=	$this->bank_model->get_all_banks();	
		
		$report_data['navigation'] 							=   $this->load->view('template/navigation','',TRUE);
        $report_data['content']								=	$this->load->view('pages/inventory/inventory_status',$sales_data,TRUE);
        $report_data['footer']     							=   $this->load->view('template/footer','',TRUE);
		
		$this->load->view('template/main_template',$report_data);
	}


	public function ajax_get_stock_by_item_id(){

		$item_id 											=	$this->input->post('item_id');

		$result 											=	$this->stock_model->get_stock_by_item_id($item_id);

		echo json_encode($result);

	}

	public function ajax_get_requisition_by_id(){

		$requisition_id 									=	$this->input->post('requisition_id');

		$result 											=	$this->requisition_model->get_requisition_detail_by_requisition_id($requisition_id);

		// $result 											=	$this->stock_model->get_stock_by_item_id($item_id);

		echo json_encode($result);

	}


	public function ajax_get_requisition_by_employee_id(){

		$employee_id 										=	$this->input->post('employee_id');

		$result 											=	$this->requisition_model->get_requisition_by_employee_id($employee_id);

		// $result 											=	$this->stock_model->get_stock_by_item_id($item_id);

		echo json_encode($result);

	}

	

	
}
