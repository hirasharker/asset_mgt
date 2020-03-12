<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kam extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		if($this->session->userdata('employee_id')==NULL){
			redirect('login','refresh');
		}
		
		$this->load->model('employee_model','employee_model',TRUE);
		$this->load->model('kam_model','kam_model',TRUE);
		$this->load->model('application_model','application_model',TRUE);
		$this->load->model('model_model','model_model',TRUE);
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

        $data['page_title']               					=   'Key Account Management';

        $kam_id 											=	$this->input->post('kam_id','',TRUE);

        $user_id 											=	$this->session->userdata('employee_id');

        $user_detail 										=	$this->employee_model->get_employee_by_id($user_id);

        $content_data										=	array();

        if($kam_id!=NULL){
        	$content_data['role']							=	$this->session->userdata('role');
        	$content_data['kam_detail']						=	$this->kam_model->get_kam_by_id($kam_id);
        	$content_data['nalvf_list'] 					=	$this->kam_model->get_nalvf_by_kam_id($kam_id);
        	$content_data['alvf_list']						=	$this->kam_model->get_alvf_by_kam_id($kam_id);
        	$content_data['action_plan_sales_list']			=	$this->kam_model->get_action_plan_sales_by_kam_id($kam_id);
        	$content_data['action_plan_customer_list']		=	$this->kam_model->get_action_plan_customer_by_kam_id($kam_id);
        	$content_data['action_plan_vehicle_list']		=	$this->kam_model->get_action_plan_vehicle_by_kam_id($kam_id);
        	$content_data['future_prospect_list']			=	$this->kam_model->get_future_prospect_by_kam_id($kam_id);
        	$content_data['lost_prospect_list']				=	$this->kam_model->get_lost_prospect_by_kam_id($kam_id);
        }

        $content_data['employee_list']						=	$this->employee_model->get_all_employees();
        $content_data['model_list']							=	$this->model_model->get_all_models();
        $content_data['company_list'] 						=	$this->company_model->get_all_companies();
        $content_data['branch_list']						=	$this->branch_model->get_all_branches();
        $content_data['shift_list']							=	$this->shift_model->get_all_shifts();
        $content_data['bank_list'] 							=	$this->bank_model->get_all_banks();
        $content_data['department_list']					=	$this->dept_model->get_all_departments();
        $content_data['designation_list']					=	$this->desg_model->get_all_designations();
        $content_data['application_list']					=	$this->application_model->get_all_applications();

        $content_data['kam_list']							=	$this->kam_model->get_all_kams($user_id, $user_detail->role);

        $data['navigation'] =   $this->load->view('template/navigation','',TRUE);
        $data['content']    =   $this->load->view('pages/kam/kam',$content_data,TRUE);
        $data['footer']     =   $this->load->view('template/footer','',TRUE);
		$this->load->view('template/main_template',$data);
	}
	

	public function add_kam()
	{
		$kam_data										=	array();
		$session_data 										=	array();

		$kam_data['company_name']							=	$this->input->post('company_name','',TRUE);
		$kam_data['company_address']						=	$this->input->post('company_address','',TRUE);
		$kam_data['company_phone']							=	$this->input->post('company_phone','',TRUE);
		$kam_data['company_email_id']						=	$this->input->post('company_email_id',0,TRUE);
		$kam_data['workshop_address']						=	$this->input->post('workshop_address','',TRUE);
		$kam_data['business_type']							=	$this->input->post('business_type',0,TRUE);
		$kam_data['parent_company']							=	$this->input->post('parent_company','',TRUE);
		$kam_data['decision_maker_name']					=	$this->input->post('decision_maker_name','',TRUE);
		$kam_data['dm_designation']							=	$this->input->post('dm_designation',0,TRUE);
		$kam_data['dm_phone']								=	$this->input->post('dm_phone',0,TRUE);
		$kam_data['dm_email_id']							=	$this->input->post('dm_email_id',0,TRUE);
		$kam_data['opinion_maker_name']						=	$this->input->post('opinion_maker_name',0,TRUE);
		$kam_data['om_designation']							=	$this->input->post('om_designation',0,TRUE);
		$kam_data['om_phone']								=	$this->input->post('om_phone',0,TRUE);
		$kam_data['om_email_id']							=	$this->input->post('om_email_id',0,TRUE);
		$kam_data['last_date_of_visit_by_ial_executive']	=	$this->input->post('last_date_of_visit_by_ial_executive',0,TRUE);
		$kam_data['account_manager_ial_id']					=	$this->input->post('account_manager_ial_id','',TRUE);
		$kam_data['contact_date']							=	$this->input->post('contact_date',0,TRUE);
		$kam_data['next_contact_date']						=	$this->input->post('next_contact_date',0,TRUE);

		$kam_data['user_id']								=	$this->session->userdata('employee_id');

		$result												=	$this->kam_model->add_kam($kam_data);

		if($result!=NULL){
			$session_data['message']						=	'New Key account was inserted successfully!!';
			$this->session->set_userdata($session_data);
		}else{

			$session_data['error']							=	'Insertion Failed!!!!';
			$this->session->set_userdata($session_data);
			// redirect('employee','refresh');
		}

		//-----------ADD NALVF DATA---------------------

		$nalvf_model									=	$this->input->post('nalvf_model','',TRUE);
		$nalvf_quantity									=	$this->input->post('nalvf_quantity','',TRUE);
		$nalvf_last_year_of_purchase					=	$this->input->post('nalvf_last_year_of_purchase',0,TRUE);
		$nalvf_segment									=	$this->input->post('nalvf_segment',0,TRUE);
		$nalvf_feedback									=	$this->input->post('nalvf_feedback','',TRUE);
		$nalvf_make										=	$this->input->post('nalvf_make','',TRUE);
		$nalvf_application_id								=	$this->input->post('nalvf_application_id',0,TRUE);

		$count 											=	count($nalvf_model);

		
		
		$nalvf_data 							=	array();
		for ($i=0; $i < $count ; $i++) {
			// $nalvf_data['employee_id']					=	$result;
			$nalvf_data['kam_id']							=	$result;
			$nalvf_data['nalvf_model']						=	$nalvf_model[$i];
			$nalvf_data['nalvf_quantity']					=	$nalvf_quantity[$i];
			$nalvf_data['nalvf_last_year_of_purchase']		=	$nalvf_last_year_of_purchase[$i];
			$nalvf_data['nalvf_segment']					=	$nalvf_segment[$i];
			$nalvf_data['nalvf_feedback']					=	$nalvf_feedback[$i];
			$nalvf_data['nalvf_make']						=	$nalvf_make[$i];
			$nalvf_data['nalvf_application_id']				=	$nalvf_application_id[$i];

			$nalvf_result									=	NULL;
				if($nalvf_quantity[0] != NULL){
				$nalvf_result											=	$this->kam_model->add_nalvf($nalvf_data);
			}

			if($nalvf_result!=NULL){
			$session_data['message']							=	'New Key account was inserted successfully!!';
			$this->session->set_userdata($session_data);
			}else{
				$session_data['error']							=	'NALVF Not Added!!!!';
				$this->session->set_userdata($session_data);
				// redirect('employee','refresh');
			}
		}


		//-----------ADD ALVF DATA---------------------

        $alvf_model                                    =   $this->input->post('alvf_model','',TRUE);
        $alvf_quantity                                 =   $this->input->post('alvf_quantity','',TRUE);
        $alvf_last_year_of_purchase                    =   $this->input->post('alvf_last_year_of_purchase',0,TRUE);
        $alvf_segment                                  =   $this->input->post('alvf_segment',0,TRUE);
        $alvf_feedback                                 =   $this->input->post('alvf_feedback','',TRUE);
        $alvf_application_id                              =   $this->input->post('alvf_application_id',0,TRUE);

        $count                                          =   count($alvf_model);
        
        $alvf_data                             			=   array();
        for ($i=0; $i < $count ; $i++) {
            // $alvf_data['employee_id']                   =   $result;
            $alvf_data['kam_id']                          =   $result;
            $alvf_data['alvf_make']                       =   "AL";
            $alvf_data['alvf_model']                      =   $alvf_model[$i];
            $alvf_data['alvf_quantity']                   =   $alvf_quantity[$i];
            $alvf_data['alvf_last_year_of_purchase']      =   $alvf_last_year_of_purchase[$i];
            $alvf_data['alvf_segment']                    =   $alvf_segment[$i];
            $alvf_data['alvf_feedback']                   =   $alvf_feedback[$i];
            
            $alvf_data['alvf_application_id']                =   $alvf_application_id[$i];

            $alvf_result									=	NULL;
			if($alvf_quantity[0] != NULL){
				$alvf_result                                           =   $this->kam_model->add_alvf($alvf_data);
			}

            if($alvf_result!=NULL){
            $session_data['message']                            =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                          =   'alvf Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }



        //-----------ADD action_plan_sales DATA---------------------

        $sales_process_related_issue                                    =   $this->input->post('sales_process_related_issue','',TRUE);
        $present_status_sales                                           =   $this->input->post('present_status_sales','',TRUE);
        $future_action_plan_sales                                       =   $this->input->post('future_action_plan_sales','',TRUE);

        $count                                                          =   count($present_status_sales);
        
        $action_plan_sales_data                                         =   array();
        for ($i=0; $i < $count ; $i++) {
            $action_plan_sales_data['kam_id']                           =   $result;
            $action_plan_sales_data['sales_process_related_issue']      =   $sales_process_related_issue[$i];
            $action_plan_sales_data['present_status']                   =   $present_status_sales[$i];
            $action_plan_sales_data['future_action_plan']               =   $future_action_plan_sales[$i];

            $action_plan_sales_result                                   =   $this->kam_model->add_action_plan_sales($action_plan_sales_data);

            if($action_plan_sales_result!=NULL){
            $session_data['message']                                    =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  =   'Action Plan Sales Process Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }

        //-----------ADD action_plan_customer DATA---------------------

        $customer_service_related_issue                                    	=   $this->input->post('customer_service_related_issue','',TRUE);
        $present_status_customer                                           	=   $this->input->post('present_status_customer','',TRUE);
        $future_action_plan_customer                                       	=   $this->input->post('future_action_plan_customer','',TRUE);

        $count                                                          	=   count($present_status_customer);
        
        $action_plan_customer_data                                         	=   array();
        for ($i=0; $i < $count ; $i++) {
            $action_plan_customer_data['kam_id']                          	=   $result;
            $action_plan_customer_data['customer_service_related_issue']    =   $customer_service_related_issue[$i];
            $action_plan_customer_data['present_status']                   	=   $present_status_customer[$i];
            $action_plan_customer_data['future_action_plan']               	=   $future_action_plan_customer[$i];

            $action_plan_customer_result                                   	=   $this->kam_model->add_action_plan_customer($action_plan_customer_data);

            if($action_plan_customer_result!=NULL){
            $session_data['message']                                    	=   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  	=   'Action Plan Customer Process Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }


        //-----------ADD action_plan_vehicle DATA---------------------

        $vehicle_parts_related_issue                                    =   $this->input->post('vehicle_parts_related_issue','',TRUE);
        $present_status_vehicle                                           =   $this->input->post('present_status_vehicle','',TRUE);
        $future_action_plan_vehicle                                       =   $this->input->post('future_action_plan_vehicle','',TRUE);

        $count                                                          =   count($present_status_vehicle);
        
        $action_plan_vehicle_data                                         =   array();
        for ($i=0; $i < $count ; $i++) {
            $action_plan_vehicle_data['kam_id']                           =   $result;
            $action_plan_vehicle_data['vehicle_parts_related_issue']      =   $vehicle_parts_related_issue[$i];
            $action_plan_vehicle_data['present_status']                   =   $present_status_vehicle[$i];
            $action_plan_vehicle_data['future_action_plan']               =   $future_action_plan_vehicle[$i];

            $action_plan_vehicle_result                                   =   $this->kam_model->add_action_plan_vehicle($action_plan_vehicle_data);

            if($action_plan_vehicle_result!=NULL){
            $session_data['message']                                    =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  =   'Action Plan vehicle Process Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }

        //-----------ADD future_prospect DATA---------------------

        $future_prospect_model_name                                     =   $this->input->post('future_prospect_model_name','',TRUE);
        $future_prospect_quantity                                       =   $this->input->post('future_prospect_quantity','',TRUE);
        $future_prospect_application_id                                    =   $this->input->post('future_prospect_application_id',0,TRUE);
        $requested_price                                                =   $this->input->post('requested_price','',TRUE);
        $when_likely                                                    =   $this->input->post('when_likely','',TRUE);
        $future_prospect_action_plan                                    =   $this->input->post('future_prospect_action_plan','',TRUE);

        $count                                                          =   count($future_prospect_model_name);
        
        $future_prospect_data                                           =   array();
        for ($i=0; $i < $count ; $i++) {
            $future_prospect_data['kam_id']                             =   $result;
            $future_prospect_data['make']                               =   "AL";
            $future_prospect_data['model_name']                         =   $future_prospect_model_name[$i];
            $future_prospect_data['quantity']                           =   $future_prospect_quantity[$i];
            $future_prospect_data['future_prospect_application_id']                        =   $future_prospect_application_id[$i];
            $future_prospect_data['requested_price']                    =   $requested_price[$i];
            $future_prospect_data['when_likely']                        =   $when_likely[$i];
            $future_prospect_data['action_plan']                        =   $future_prospect_action_plan[$i];

            $future_prospect_result										=	NULL;
			if($future_prospect_quantity[0] != NULL){
				$future_prospect_result                                 =   $this->kam_model->add_future_prospect($future_prospect_data);
			}

            if($future_prospect_result!=NULL){
            $session_data['message']                                    =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  =   'Future Prospects Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }

        //-----------ADD lost_prospect DATA---------------------

        $lost_prospect_quantity                                     =   $this->input->post('lost_prospect_quantity','',TRUE);
        $lost_prospect_application_id                                  =   $this->input->post('lost_prospect_application_id',0,TRUE);
        $key_reason                                    				=   $this->input->post('key_reason','',TRUE);
        $lost_prospect_date                                         =   $this->input->post('lost_prospect_date','',TRUE);
        $lost_prospect_segment                                      =   $this->input->post('lost_prospect_segment','',TRUE);

        $count                                                      =   count($lost_prospect_quantity);
        
        $lost_prospect_data                                         =   array();
        for ($i=0; $i < $count ; $i++) {
            $lost_prospect_data['kam_id']                           =   $result;
            $lost_prospect_data['lost_prospect_quantity']           =   $lost_prospect_quantity[$i];
            $lost_prospect_data['lost_prospect_application_id']        =   $lost_prospect_application_id[$i];
            $lost_prospect_data['key_reason']                    	=   $key_reason[$i];
            $lost_prospect_data['lost_prospect_date']               =   $lost_prospect_date[$i];
            $lost_prospect_data['lost_prospect_segment']            =   $lost_prospect_segment[$i];

            // print_r($lost_prospect_data);exit();

            $lost_prospect_result									=	NULL;
			if($lost_prospect_quantity[0] != NULL){
				$lost_prospect_result                               =   $this->kam_model->add_lost_prospect($lost_prospect_data);
			}

            if($lost_prospect_result!=NULL){
            $session_data['message']                                =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                              =   'Lost Prospects Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }


		redirect('kam','refresh');

	}


	public function update_kam()
	{
		$kam_data											=	array();
		$session_data 										=	array();

		$kam_id 											=	$this->input->post('kam_detail_id','',TRUE);	

		$kam_data['company_name']							=	$this->input->post('company_name','',TRUE);
		$kam_data['company_address']						=	$this->input->post('company_address','',TRUE);
		$kam_data['company_phone']							=	$this->input->post('company_phone','',TRUE);
		$kam_data['company_email_id']						=	$this->input->post('company_email_id',0,TRUE);
		$kam_data['workshop_address']						=	$this->input->post('workshop_address','',TRUE);
		$kam_data['business_type']							=	$this->input->post('business_type',0,TRUE);
		$kam_data['parent_company']								=	$this->input->post('parent_company','',TRUE);
		$kam_data['decision_maker_name']					=	$this->input->post('decision_maker_name','',TRUE);
		$kam_data['dm_designation']							=	$this->input->post('dm_designation',0,TRUE);
		$kam_data['dm_phone']								=	$this->input->post('dm_phone',0,TRUE);
		$kam_data['dm_email_id']							=	$this->input->post('dm_email_id',0,TRUE);
		$kam_data['opinion_maker_name']						=	$this->input->post('opinion_maker_name',0,TRUE);
		$kam_data['om_designation']							=	$this->input->post('om_designation',0,TRUE);
		$kam_data['om_phone']								=	$this->input->post('om_phone',0,TRUE);
		$kam_data['om_email_id']							=	$this->input->post('om_email_id',0,TRUE);
		$kam_data['last_date_of_visit_by_ial_executive']	=	$this->input->post('last_date_of_visit_by_ial_executive',0,TRUE);
		$kam_data['account_manager_ial_id']					=	$this->input->post('account_manager_ial_id','',TRUE);
		$kam_data['contact_date']							=	$this->input->post('contact_date',0,TRUE);
		$kam_data['next_contact_date']						=	$this->input->post('next_contact_date',0,TRUE);

		$kam_data['user_id']								=	$this->session->userdata('employee_id');

		$result												=	$this->kam_model->update_kam($kam_data, $kam_id);

		if($result!=NULL){
			$session_data['message']						=	'Key account was updated successfully!!';
			$this->session->set_userdata($session_data);
		}else{

			$session_data['error']							=	'Update Failed!!!!';
			$this->session->set_userdata($session_data);
			redirect('kam','refresh');
		}

		$result_delete_nalvf							=	$this->delete_nalvf_alvf_others_before_update_by_kam_id($kam_id, $result);

		//-----------add NALVF DATA---------------------

		$nalvf_model									=	$this->input->post('nalvf_model','',TRUE);
		$nalvf_quantity									=	$this->input->post('nalvf_quantity','',TRUE);
		$nalvf_last_year_of_purchase					=	$this->input->post('nalvf_last_year_of_purchase',0,TRUE);
		$nalvf_segment									=	$this->input->post('nalvf_segment',0,TRUE);
		$nalvf_feedback									=	$this->input->post('nalvf_feedback','',TRUE);
		$nalvf_make										=	$this->input->post('nalvf_make','',TRUE);
		$nalvf_application_id								=	$this->input->post('nalvf_application_id',0,TRUE);

		$count 											=	count($nalvf_model);

		$nalvf_data 							=	array();
		for ($i=0; $i < $count ; $i++) {
			// $nalvf_data['employee_id']					=	$result;
			$nalvf_data['kam_id']							=	$kam_id;
			$nalvf_data['nalvf_model']						=	$nalvf_model[$i];
			$nalvf_data['nalvf_quantity']					=	$nalvf_quantity[$i];
			$nalvf_data['nalvf_last_year_of_purchase']		=	$nalvf_last_year_of_purchase[$i];
			$nalvf_data['nalvf_segment']					=	$nalvf_segment[$i];
			$nalvf_data['nalvf_feedback']					=	$nalvf_feedback[$i];
			$nalvf_data['nalvf_make']						=	$nalvf_make[$i];
			$nalvf_data['nalvf_application_id']				=	$nalvf_application_id[$i];

			$nalvf_result									=	NULL;
				if($nalvf_quantity[0] != NULL){
				$nalvf_result											=	$this->kam_model->add_nalvf($nalvf_data);
			}

			if($nalvf_result!=NULL){
			$session_data['message']							=	'New Key account was inserted successfully!!';
			$this->session->set_userdata($session_data);
			}else{
				$session_data['error']							=	'NALVF Not Added!!!!';
				$this->session->set_userdata($session_data);
				redirect('kam','refresh');
			}
		}


		//-----------ADD ALVF DATA---------------------

        $alvf_model                                    =   $this->input->post('alvf_model','',TRUE);
        $alvf_quantity                                 =   $this->input->post('alvf_quantity','',TRUE);
        $alvf_last_year_of_purchase                    =   $this->input->post('alvf_last_year_of_purchase',0,TRUE);
        $alvf_segment                                  =   $this->input->post('alvf_segment',0,TRUE);
        $alvf_feedback                                 =   $this->input->post('alvf_feedback','',TRUE);
        $alvf_application_id                              =   $this->input->post('alvf_application_id',0,TRUE);

        $count                                          =   count($alvf_model);
        
        $alvf_data                             			=   array();
        for ($i=0; $i < $count ; $i++) {
            // $alvf_data['employee_id']                   =   $result;
            $alvf_data['kam_id']                          =   $kam_id;
            $alvf_data['alvf_make']                       =   "Ashok Leyland";
            $alvf_data['alvf_model']                      =   $alvf_model[$i];
            $alvf_data['alvf_quantity']                   =   $alvf_quantity[$i];
            $alvf_data['alvf_last_year_of_purchase']      =   $alvf_last_year_of_purchase[$i];
            $alvf_data['alvf_segment']                    =   $alvf_segment[$i];
            $alvf_data['alvf_feedback']                   =   $alvf_feedback[$i];
            
            $alvf_data['alvf_application_id']                =   $alvf_application_id[$i];

            $alvf_result									=	NULL;
			if($alvf_quantity[0] != NULL){
				$alvf_result                                           =   $this->kam_model->add_alvf($alvf_data);
			}

            if($alvf_result!=NULL){
            $session_data['message']                            =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                          =   'alvf Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }



        //-----------ADD action_plan_sales DATA---------------------

        $sales_process_related_issue                                    =   $this->input->post('sales_process_related_issue','',TRUE);
        $present_status_sales                                           =   $this->input->post('present_status_sales','',TRUE);
        $future_action_plan_sales                                       =   $this->input->post('future_action_plan_sales','',TRUE);

        $count                                                          =   count($present_status_sales);
        
        $action_plan_sales_data                                         =   array();
        for ($i=0; $i < $count ; $i++) {
            $action_plan_sales_data['kam_id']                           =   $kam_id;
            $action_plan_sales_data['sales_process_related_issue']      =   $sales_process_related_issue[$i];
            $action_plan_sales_data['present_status']                   =   $present_status_sales[$i];
            $action_plan_sales_data['future_action_plan']               =   $future_action_plan_sales[$i];

            $action_plan_sales_result                                   =   $this->kam_model->add_action_plan_sales($action_plan_sales_data);

            if($action_plan_sales_result!=NULL){
            $session_data['message']                                    =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  =   'Action Plan Sales Process Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }

        //-----------ADD action_plan_customer DATA---------------------

        $customer_service_related_issue                                    	=   $this->input->post('customer_service_related_issue','',TRUE);
        $present_status_customer                                           	=   $this->input->post('present_status_customer','',TRUE);
        $future_action_plan_customer                                       	=   $this->input->post('future_action_plan_customer','',TRUE);

        $count                                                          	=   count($present_status_customer);
        
        $action_plan_customer_data                                         	=   array();
        for ($i=0; $i < $count ; $i++) {
            $action_plan_customer_data['kam_id']                          	=   $kam_id;
            $action_plan_customer_data['customer_service_related_issue']    =   $customer_service_related_issue[$i];
            $action_plan_customer_data['present_status']                   	=   $present_status_customer[$i];
            $action_plan_customer_data['future_action_plan']               	=   $future_action_plan_customer[$i];

            $action_plan_customer_result                                   	=   $this->kam_model->add_action_plan_customer($action_plan_customer_data);

            if($action_plan_customer_result!=NULL){
            $session_data['message']                                    	=   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  	=   'Action Plan Customer Process Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }


        //-----------ADD action_plan_vehicle DATA---------------------

        $vehicle_parts_related_issue                                    =   $this->input->post('vehicle_parts_related_issue','',TRUE);
        $present_status_vehicle                                           =   $this->input->post('present_status_vehicle','',TRUE);
        $future_action_plan_vehicle                                       =   $this->input->post('future_action_plan_vehicle','',TRUE);

        $count                                                          =   count($present_status_vehicle);
        
        $action_plan_vehicle_data                                         =   array();
        for ($i=0; $i < $count ; $i++) {
            $action_plan_vehicle_data['kam_id']                           =   $kam_id;
            $action_plan_vehicle_data['vehicle_parts_related_issue']      =   $vehicle_parts_related_issue[$i];
            $action_plan_vehicle_data['present_status']                   =   $present_status_vehicle[$i];
            $action_plan_vehicle_data['future_action_plan']               =   $future_action_plan_vehicle[$i];

            $action_plan_vehicle_result                                   =   $this->kam_model->add_action_plan_vehicle($action_plan_vehicle_data);

            if($action_plan_vehicle_result!=NULL){
            $session_data['message']                                    =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  =   'Action Plan vehicle Process Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }

        //-----------ADD future_prospect DATA---------------------

        $future_prospect_model_name                                     =   $this->input->post('future_prospect_model_name','',TRUE);
        $future_prospect_quantity                                       =   $this->input->post('future_prospect_quantity','',TRUE);
        $future_prospect_application_id                                    =   $this->input->post('future_prospect_application_id',0,TRUE);
        $requested_price                                                =   $this->input->post('requested_price','',TRUE);
        $when_likely                                                    =   $this->input->post('when_likely','',TRUE);
        $future_prospect_action_plan                                    =   $this->input->post('future_prospect_action_plan','',TRUE);

        $count                                                          =   count($future_prospect_model_name);
        
        $future_prospect_data                                           =   array();
        for ($i=0; $i < $count ; $i++) {
            $future_prospect_data['kam_id']                             =   $kam_id;
            $future_prospect_data['make']                               =   "Ashok Leyland";
            $future_prospect_data['model_name']                         =   $future_prospect_model_name[$i];
            $future_prospect_data['quantity']                           =   $future_prospect_quantity[$i];
            $future_prospect_data['future_prospect_application_id']                        =   $future_prospect_application_id[$i];
            $future_prospect_data['requested_price']                    =   $requested_price[$i];
            $future_prospect_data['when_likely']                        =   $when_likely[$i];
            $future_prospect_data['action_plan']                        =   $future_prospect_action_plan[$i];

            $future_prospect_result										=	NULL;
			if($future_prospect_quantity[0] != NULL){
				$future_prospect_result                                 =   $this->kam_model->add_future_prospect($future_prospect_data);
			}

            if($future_prospect_result!=NULL){
            $session_data['message']                                    =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                                  =   'Future Prospects Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }


        //-----------ADD lost_prospect DATA---------------------

        $lost_prospect_quantity                                     =   $this->input->post('lost_prospect_quantity','',TRUE);
        $lost_prospect_application_id                                  =   $this->input->post('lost_prospect_application_id',0,TRUE);
        $key_reason                                    				=   $this->input->post('key_reason','',TRUE);
        $lost_prospect_date                                         =   $this->input->post('lost_prospect_date','',TRUE);
        $lost_prospect_segment                                      =   $this->input->post('lost_prospect_segment','',TRUE);

        $count                                                      =   count($lost_prospect_quantity);
        
        $lost_prospect_data                                         =   array();
        for ($i=0; $i < $count ; $i++) {
            $lost_prospect_data['kam_id']                           =   $kam_id;
            $lost_prospect_data['lost_prospect_quantity']           =   $lost_prospect_quantity[$i];
            $lost_prospect_data['lost_prospect_application_id']        =   $lost_prospect_application_id[$i];
            $lost_prospect_data['key_reason']                    	=   $key_reason[$i];
            $lost_prospect_data['lost_prospect_date']               =   $lost_prospect_date[$i];
            $lost_prospect_data['lost_prospect_segment']            =   $lost_prospect_segment[$i];

            // print_r($lost_prospect_data);exit();

            $lost_prospect_result									=	NULL;
			if($lost_prospect_quantity[0] != NULL){
				$lost_prospect_result                               =   $this->kam_model->add_lost_prospect($lost_prospect_data);
			}

            if($lost_prospect_result!=NULL){
            $session_data['message']                                =   'New Key account was inserted successfully!!';
            $this->session->set_userdata($session_data);
            }else{
                $session_data['error']                              =   'Lost Prospects Not Added!!!!';
                $this->session->set_userdata($session_data);
                // redirect('employee','refresh');
            }
        }


		redirect('kam','refresh');

	}


	public function  delete_nalvf_alvf_others_before_update_by_kam_id($kam_id, $result){
		$delete_nalvf 													=	NULL;

		$delete_alvf 													=	NULL;

		$delete_action_plan_sales										=	NULL;

		$delete_action_plan_customer 									=	NULL;

		$delete_action_plan_vehicle										=	NULL;

		$delete_future_prospect 										=	NULL;


		if($result){
			$delete_nalvf 												=	$this->kam_model->delete_nalvf_by_kam_id($kam_id);
		}

		
		if($result) {
			$delete_alvf 												=	$this->kam_model->delete_alvf_by_kam_id($kam_id);
		}

		if($result) {
			$delete_action_plan_sales 									=	$this->kam_model->delete_action_plan_sales_by_kam_id($kam_id);
		}

		if($result) {
			$delete_action_plan_customer 								=	$this->kam_model->delete_action_plan_customer_by_kam_id($kam_id);
		}

		if($result) {
			$delete_action_plan_vehicle 								=	$this->kam_model->delete_action_plan_vehicle_by_kam_id($kam_id);
		}

		if($result) {
			$delete_future_prospect 									=	$this->kam_model->delete_future_prospect_by_kam_id($kam_id);
		}

		if($result) {
			$delete_lost_prospect 										=	$this->kam_model->delete_lost_prospect_by_kam_id($kam_id);
		}

		return $result;
	}

	public function delete_kam(){
		$session_data 													=	array();

		$kam_id 														=	$this->input->post('kam_id','',TRUE);

		$delete_result 													=	$this->kam_model->delete_kam($kam_id);

		if($delete_result){
			$result 													=	$this->delete_nalvf_alvf_others_before_update_by_kam_id($kam_id, $delete_result);
			
			if($result){
				$session_data['error']                              	=   'Deleted!!!!';
            	$this->session->set_userdata($session_data);
			}else{
				$session_data['error']                              	=   'Deletion Failed!!!!';
            	$this->session->set_userdata($session_data);
			}

		}else {
			$session_data['error']                              		=   'Deletion Failed!!!!';
            $this->session->set_userdata($session_data);
		}

		redirect('kam','refresh');

	}

	public function test(){
		$this->leave_summary->update_leave_summary(4343,date('Y-m-d'));

	}

	
}
