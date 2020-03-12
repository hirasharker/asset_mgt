<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Key Account Management <small></small></h3>
    </div>

    <!-- <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> -->
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">

          <?php if(!isset($kam_detail)){?>

          <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>kam/add_kam/" enctype='multipart/form-data'>
            <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>

            


            <div class="x_content" style="display:none">
            <br />
            

                <div class="x_title">
                <h2>Basic Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company / Organization / Institution <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="company_name" required >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="company_address" required></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Shop Address
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="workshop_address"></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Phone</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="company_phone">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="company_email_id">
                  </div>
                </div>


                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                <h2>Authorised Contact Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="decision_maker_name">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker Designation</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="dm_designation">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker Phone</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="dm_phone">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="dm_email_id">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="opinion_maker_name">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker Designation</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="om_designation">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker Phone</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="om_phone">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="om_email_id">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Company</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="parnet_company">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Operation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="business_type">
                        <option value="">Select</option>
                        <?php foreach ($application_list as $value) {?>
                        <option value="<?php echo $value->application_id; ?>"><?php echo $value->application_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Date of Visit by IAL Executive </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal5" name="last_date_of_visit_by_ial_executive" placeholder="" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>


                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Joining </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="joining_date" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div> -->
              
                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                  <h2>Vehicle Fleet Size <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-nalvf-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="nalvf-form">
                 
                </div>

                <div class="clearfix"></div>
                <br />





                <div class="x_title">
                  <h2>Ashok Leyland Vehicle Fleet Size <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-alvf-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="alvf-form">
                  <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="ASHOK LEYLAND" disabled="true">
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="alvf_model[]">
                            <option value="">Select Model</option>
                            <?php foreach ($model_list as $m_value) {?>
                              <option value="<?php echo $m_value->model_name; ?>"><?php echo $m_value->model_name; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" step="1" min="1" class="form-control" placeholder="Quantity" name="alvf_quantity[]">
                      </div>
                    </div>

                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" min="1985" max="2050" class="form-control" placeholder="Last YOP" name="alvf_last_year_of_purchase[]">
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="alvf_application_id[]">
                            <?php foreach ($application_list as $value) {?>
                            <option value="<?php echo $value->application_id; ?>"><?php echo $value->application_name; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="alvf_segment[]">
                            <option value="">Segment</option>
                            <option>MCV TRUCK</option>
                            <option>MCV TIPPER</option>
                            <option>LCV TRUCK</option>
                            <option>MCV BUS</option>
                            <option>ICV TRUCK</option>
                            <option>ICV TIPPER</option>
                            <option>SPECIAL</option>
                            <option>LCV</option>
                            <option>ICV BUS</option>
                            <option>MCV</option>
                            <option>BUS</option>
                            <option>ICV</option>
                            <option>HCV TRUCK</option>
                            <option>LCV PICKUP</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="alvf_feedback[]" placeholder="Issue/Feedback"></textarea>
                      </div>
                    </div>

                  </div> -->
                </div>

                <div class="clearfix"></div>
                <br />



                <div class="x_title">
                  <h2>Action Plans <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_title">
                  <h3>Sales Process Related Issue <small></small></h3>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-sales-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-sales-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="sales_process_related_issue[]" placeholder="Sales Process Related Issue"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="present_status_sales[]">
                            <option value="">Select Status</option>
                            <option value="p0">P0</option>
                            <option value="p1">P1</option>
                            <option value="p2">P2</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="future_action_plan_sales[]" placeholder="Future Action Plan"></textarea>
                      </div>
                    </div>
                    <!-- <a class="remove-action-plan-sales-row"><i class="fa fa-minus"></i></a> -->

                  </div>
                </div>

                

                <div class="clearfix"></div>
                <br />

                <div class="x_title">
                  <h3>Customer Service Related Issue <small></small></h3>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-customer-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-customer-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="customer_service_related_issue[]" placeholder="Customer Service Related Issue"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="present_status_customer[]">
                            <option value="">Select Status</option>
                            <option value="p0">P0</option>
                            <option value="p1">P1</option>
                            <option value="p2">P2</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="future_action_plan_customer[]" placeholder="Future Action Plan"></textarea>
                      </div>
                    </div>
                    <!-- <a class="remove-action-plan-customer-row"><i class="fa fa-minus"></i></a> -->

                  </div>
                </div>

                <div class="clearfix"></div>
                <br />



                <div class="x_title">
                  <h3>Vehicle Parts Related Issue <small></small></h3>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-vehicle-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-vehicle-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="vehicle_parts_related_issue[]" placeholder="Vehicle Parts Related Issue"></textarea>
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="present_status_vehicle[]">
                            <option value="">Select Status</option>
                            <option value="p0">P0</option>
                            <option value="p1">P1</option>
                            <option value="p2">P2</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="future_action_plan_vehicle[]" placeholder="Future Action Plan"></textarea>
                      </div>
                    </div>
                    <!-- <a class="remove-action-plan-vehicle-row"><i class="fa fa-minus"></i></a> -->
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                  <h2>Future Prospects of AL<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-future-prospect-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-future-prospect-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">

                   <!--  <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input class="form-control" name="future_prospect_make[]" placeholder="Manufacturer / Make">
                      </div>
                    </div> -->
                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="future_prospect_model_name[]">
                            <option value="">Select Model</option>
                            <?php foreach ($model_list as $m_value) {?>
                              <option value="<?php echo $m_value->model_name; ?>"><?php echo $m_value->model_name; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" step="1" min="1" class="form-control" placeholder="QTY" name="future_prospect_quantity[]">
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="future_prospect_application_id[]">
                            <option value="">Select Application</option>
                            <?php foreach ($application_list as $value) {?>
                            <option value="<?php echo $value->application_id; ?>"><?php echo $value->application_name; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" step="1" min="0"class="form-control" placeholder="Requested Price" name="requested_price[]" value="0">
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">When Likely </label>
                      <div class="form-group col-md-9 col-sm-9 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control datepicker" id="picker_0"  name="when_likely[]">
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <textarea class="form-control" name="future_prospect_action_plan[]" placeholder="Action Plan"></textarea>
                      </div>
                    </div>
                    <!-- <a class="remove-action-plan-vehicle-row"><i class="fa fa-minus"></i></a> -->
                  </div>


                </div>

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                  <h2>Lost Prospects<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-lost-prospect-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="lost-prospect-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="key_reason[]">
                            <option value="">Select Reason</option>
                            <option value="Price">Price</option>
                            <option value="Delivery Schedule">Delivery Schedule</option>
                            <option value="Specification">Specification</option>
                            <option value="Indent for Regular Model">Indent for Regular Model</option>
                            <option value="Third Country LC">Third Country LC</option>
                            <option value="Others">Others</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="lost_prospect_application_id[]">
                            <option value="">Select Application</option>
                            <?php foreach ($application_list as $value) {?>
                            <option value="<?php echo $value->application_id; ?>"><?php echo $value->application_name; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <select class="form-control" name="lost_prospect_segment[]">
                            <option value="">Segment</option>
                            <option>MCV TRUCK</option>
                            <option>MCV TIPPER</option>
                            <option>LCV TRUCK</option>
                            <option>MCV BUS</option>
                            <option>ICV TRUCK</option>
                            <option>ICV TIPPER</option>
                            <option>SPECIAL</option>
                            <option>LCV</option>
                            <option>ICV BUS</option>
                            <option>MCV</option>
                            <option>BUS</option>
                            <option>ICV</option>
                            <option>HCV TRUCK</option>
                            <option>LCV PICKUP</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" step="1" min="1" class="form-control" placeholder="QTY" name="lost_prospect_quantity[]">
                      </div>
                    </div>

                    <div class="form-group col-md-2 col-sm-12 col-xs-12">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                  <input type="text" class="form-control has-feedback-left" id="single_cal7" name="lost_prospect_date[]" placeholder="" aria-describedby="inputSuccess2Status4">
                                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                  <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                </div>
                              </div>
                            </div>
                          </fieldset>
                      </div>
                    </div>
                    <!-- <a class="remove-action-plan-vehicle-row"><i class="fa fa-minus"></i></a> -->
                  </div>


                </div>

                <div class="clearfix"></div>
                <br />



                 <div class="x_title">
                <h2>Account Manager Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Account Manager from IAL <span class="required" style="display: inline;">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <select class="form-control select-tag" name="account_manager_ial_id" required>
                        <option value="">Select Account Manager</option>
                        <?php foreach($employee_list as $value){ ?>
                          <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_id." - ".$value->employee_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Contact </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal6" name="contact_date" placeholder="" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Next Contact Date </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal7" name="next_contact_date" placeholder="" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />




                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" onclick="getLocation()" class="btn btn-success">Submit</button>
                </div>
              </div>
              <p id="demo"></p>

              <input type="hidden" value="0" id="count" />
              <input type="hidden" value="0" id="count-nominee" />

              <input type="hidden" value="0" id="count-nalvf" />
              <input type="hidden" value="0" id="count-alvf" />
              <input type="hidden" value="0" id="count-action-plan-sales" />
              <input type="hidden" value="0" id="count-action-plan-customer" />
              <input type="hidden" value="0" id="count-action-plan-vehicle" />
              <input type="hidden" value="0" id="count-future-prospects" />
              <input type="hidden" value="0" id="count-lost-prospects" />



            </form>








            <?php } else { ?>
























            
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>kam/update_kam/" enctype='multipart/form-data'>
            
            <input type="hidden" value="<?php echo $kam_detail->kam_id; ?>" name="kam_detail_id">
            
            <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Edit <i class="fa fa-plus"></i></a>
                </li>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>

            


            <div class="x_content" style="display:block">
            <br />
            

                <div class="x_title">
                <h2>Basic Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company / Organization / Institution <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="company_name" required value="<?php echo $kam_detail->company_name; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea <?php if($role != 20){ echo 'readonly';} ?> class="form-control" rows="3" placeholder='' name="company_address" required><?php echo $kam_detail->company_address; ?></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Shop Address</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea  <?php if($role != 20){ echo 'readonly';} ?>  class="form-control" rows="3" placeholder='' name="workshop_address"><?php echo $kam_detail->workshop_address; ?></textarea>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Phone</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="company_phone" value="<?php echo $kam_detail->company_phone; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?>  class="form-control" placeholder="" name="company_email_id" value="<?php echo $kam_detail->company_email_id; ?>">
                  </div>
                </div>


                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                <h2>Authorised Contact Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="decision_maker_name" value="<?php echo $kam_detail->decision_maker_name; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker Designation</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?>  class="form-control" placeholder="" name="dm_designation" value="<?php echo $kam_detail->dm_designation; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker Phone</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?>  class="form-control" placeholder="" name="dm_phone" value="<?php echo $kam_detail->dm_phone; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Decision Maker Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?>  class="form-control" placeholder="" name="dm_email_id" value="<?php echo $kam_detail->dm_email_id; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="opinion_maker_name" value="<?php echo $kam_detail->opinion_maker_name; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker Designation</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="om_designation" value="<?php echo $kam_detail->om_designation; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker Phone</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="om_phone" value="<?php echo $kam_detail->om_phone; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Opinion Maker Email</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="om_email_id" value="<?php echo $kam_detail->om_email_id; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Company</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  <?php if($role != 20){ echo 'readonly';} ?> class="form-control" placeholder="" name="parent_company" value="<?php echo $kam_detail->parent_company; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Business Operation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="business_type"  <?php if($role != 20){ echo 'readonly';} ?> >
                        <option value="">Select</option>
                        <?php foreach ($application_list as $value) {?>
                        <option value="<?php echo $value->application_id; ?>" <?php if($value->application_id == $kam_detail->business_type){ echo 'selected';}  ?> ><?php echo $value->application_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Date of Visit by IAL Executive </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input  <?php if($role != 20){ echo 'readonly';} ?>  type="text" class="form-control has-feedback-left" id="single_cal5" name="last_date_of_visit_by_ial_executive" placeholder="" aria-describedby="inputSuccess2Status4" value="<?php echo $kam_detail->last_date_of_visit_by_ial_executive; ?>" >
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>


                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Joining </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="joining_date" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div> -->
              
                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                  <h2>Vehicle Fleet Size <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-nalvf-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="nalvf-form">
                  <!-- insert code from javascript -->
                </div>

                <div class="clearfix"></div>
                <br />





                <div class="x_title">
                  <h2>Ashok Leyland Vehicle Fleet Size <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-alvf-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="alvf-form">
                  <!-- insert code from javascript -->
                </div>

                <div class="clearfix"></div>
                <br />



                <div class="x_title">
                  <h2>Action Plans <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_title">
                  <h3>Sales Process Related Issue <small></small></h3>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-sales-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-sales-form">
                  <!-- insert code from javascript -->
                </div>

                

                <div class="clearfix"></div>
                <br />

                <div class="x_title">
                  <h3>Customer Service Related Issue <small></small></h3>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-customer-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-customer-form">
                  <!-- insert code from javascript -->
                </div>

                <div class="clearfix"></div>
                <br />



                <div class="x_title">
                  <h3>Vehicle Parts Related Issue <small></small></h3>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-vehicle-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-vehicle-form">
                  <!-- insert code from javascript -->
                </div>

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                  <h2>Future Prospects of AL<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-action-plan-future-prospect-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="action-plan-future-prospect-form">
                  <!-- insert code from javascript -->
                </div>

                <div class="clearfix"></div>
                <br />



                <div class="x_title">
                  <h2>Lost Prospects<small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-lost-prospect-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="lost-prospect-form">
                  <!-- insert code from javascript -->
                </div>

                <div class="clearfix"></div>
                <br />





                 <div class="x_title">
                <h2>Account Manager Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Account Manager from IAL <span class="required" style="display: inline;">*</span>
                  </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <select class="form-control select-tag" name="account_manager_ial_id" required>
                        <option value="">Select Account Manager</option>
                        <?php foreach($employee_list as $value){ ?>
                          <option <?php if($kam_detail->account_manager_ial_id == $value->employee_id){ echo 'selected';} ?> value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_id." - ".$value->employee_name; ?></option>
                        <?php } ?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Date of Contact </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" value="<?php echo $kam_detail->contact_date; ?>" id="single_cal6" name="contact_date" placeholder="" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-4 col-sm-4 col-xs-12">Next Contact Date </label>
                  <div class="col-md-8 col-sm-8 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal7" value="<?php echo $kam_detail->next_contact_date; ?>" name="next_contact_date" placeholder="" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />




                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
              </div>

              <input type="hidden" value="0" id="count" />
              <input type="hidden" value="0" id="count-nominee" />

              <input type="hidden" value="0" id="count-nalvf" />
              <input type="hidden" value="0" id="count-alvf" />
              <input type="hidden" value="0" id="count-action-plan-sales" />
              <input type="hidden" value="0" id="count-action-plan-customer" />
              <input type="hidden" value="0" id="count-action-plan-vehicle" />
              <input type="hidden" value="0" id="count-future-prospects" />



            </form>

            <script>
                <?php foreach($nominee_list as $value){?>
                    
                    var code = '<div class="col-md-12 col-sm-12 col-xs-12">'
                          +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                            +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                +'<input type="text" class="form-control" placeholder="Name" name="nominee_name[]" value="'+<?php echo json_encode($value->nominee_name);?>+'">'
                            +'</div>'
                          +'</div>'
                          +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                            +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Relation </label>'
                            +'<div class="col-md-9 col-sm-9 col-xs-12">'
                                +'<input type="text" class="form-control" placeholder="Name" name="relation[]" value="'+<?php echo json_encode($value->relation);?>+'">'
                            +'</div>'
                          +'</div>'
                          +'<a class="remove-nominee-row"><i class="fa fa-minus"></i></a>'
                        +'</div>';
                      $( "#nominee-form" ).append(code);

                <?php } ?>  
                  
            </script>

            <script>
              <?php foreach($nalvf_list as $value){?>
                  var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<input type="text" class="form-control" placeholder="Manufacturer / Make" name="nalvf_make[]" value="'+<?php echo json_encode($value->nalvf_make);?>+'">'
                                    +'</div>'
                                  +'</div>'

                                  +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<input type="text" class="form-control" placeholder="model" name="nalvf_model[]" value="'+<?php echo json_encode($value->nalvf_model);?>+'">'
                                    +'</div>'
                                  +'</div>'

                                  +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<input type="number" step="1" min="1" class="form-control" placeholder="Quantity" name="nalvf_quantity[]" value="'+<?php echo json_encode($value->nalvf_quantity);?>+'">'
                                    +'</div>'
                                  +'</div>'
                                  +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<input type="number" min="1985" max="2050" class="form-control" placeholder="Last YOP" name="nalvf_last_year_of_purchase[]" value="'+<?php echo json_encode($value->nalvf_last_year_of_purchase);?>+'" required >'
                                    +'</div>'
                                  +'</div>'
                                  +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<select class="form-control" name="nalvf_application_id[]">'
                                          +'<option value="">Select Application</option>'
                                          +'<?php foreach ($application_list as $ap_value) {?>'
                                          +'<option value="'+<?php echo json_encode($ap_value->application_id);?>+'"  '+'<?php if($ap_value->application_id==$value->nalvf_application_id){ echo "selected"; }?>'+'  >'+<?php echo json_encode($ap_value->application_name);?>+'</option>'
                                          +'<?php }?>'
                                        +'</select>'
                                    +'</div>'
                                  +'</div>'
                                  +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<select class="form-control" name="nalvf_segment[]">'
                                          +'<option value="">Segment</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="MCV TRUCK"){ echo "selected"; }?>'+' >MCV TRUCK</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="MCV TIPPER"){ echo "selected"; }?>'+'  >MCV TIPPER</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="LCV TRUCK"){ echo "selected"; }?>'+'  >LCV TRUCK</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="MCV BUS"){ echo "selected"; }?>'+'  >MCV BUS</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="ICV TRUCK"){ echo "selected"; }?>'+'  >ICV TRUCK</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="ICV TIPPER"){ echo "selected"; }?>'+'  >ICV TIPPER</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="SPECIAL"){ echo "selected"; }?>'+'  >SPECIAL</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="LCV"){ echo "selected"; }?>'+'  >LCV</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="ICV BUS"){ echo "selected"; }?>'+'  >ICV BUS</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="MCV"){ echo "selected"; }?>'+'  >MCV</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="BUS"){ echo "selected"; }?>'+'  >BUS</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="ICV"){ echo "selected"; }?>'+'  >ICV</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="HCV TRUCK"){ echo "selected"; }?>'+'  >HCV TRUCK</option>'
                                          +'<option '+'<?php if($value->nalvf_segment=="LCV PICKUP"){ echo "selected"; }?>'+'  >LCV PICKUP</option>'
                                        +'</select>'
                                    +'</div>'
                                  +'</div>'
                                  +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                    +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                        +'<textarea class="form-control" name="nalvf_feedback[]" placeholder="Issue/Feedback">'+<?php echo json_encode($value->nalvf_feedback);?>+'</textarea>'
                                    +'</div>'
                                  +'</div>'
                                  +'<a class="remove-nalvf-row"><i class="fa fa-minus"></i></a>'
                                +'</div>';
                  $( "#nalvf-form" ).append(code);
              <?php } ?>
            </script>

            <script>
              <?php foreach($alvf_list as $value){?>
                var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                            +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<input type="text" class="form-control" placeholder="ASHOK LEYLAND" disabled="true">'
                              +'</div>'
                            +'</div>'
                            +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<select class="form-control" name="alvf_model[]">'
                                   +'<option value="">Select Model</option>'
                                  +'<?php foreach ($model_list as $m_value) {?>'
                                  +'<option value="'+'<?php echo $m_value->model_name; ?>'+'" '+'<?php if($m_value->model_name==$value->alvf_model){ echo "selected"; }?>'+'  >'+'<?php echo $m_value->model_name; ?>'+'</option>'
                                  +'<?php }?>'
                                  +'</select>'
                              +'</div>'
                            +'</div>'
                            +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<input type="number" step="1" min="1" class="form-control" placeholder="Quantity" name="alvf_quantity[]" value="'+<?php echo json_encode($value->alvf_quantity);?>+'" >'
                              +'</div>'
                            +'</div>'
                            +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<input type="number" min="1985" max="2050" class="form-control" placeholder="Last YOP" name="alvf_last_year_of_purchase[]" value="'+<?php echo json_encode($value->alvf_last_year_of_purchase);?>+'" >'
                              +'</div>'
                            +'</div>'
                            +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<select class="form-control" name="alvf_application_id[]">'
                                    +'<option value="">Select Application</option>'
                                    +'<?php foreach ($application_list as $ap_value) {?>'
                                    +'<option value="'+<?php echo json_encode($ap_value->application_id);?>+'"  '+'<?php if($ap_value->application_id==$value->alvf_application_id){ echo "selected"; }?>'+'  >'+<?php echo json_encode($ap_value->application_name);?>+'</option>'
                                    +'<?php }?>'
                                  +'</select>'
                              +'</div>'
                            +'</div>'
                            +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<select class="form-control" name="alvf_segment[]">'
                                    +'<option value="">Segment</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="MCV TRUCK"){ echo "selected"; }?>'+' >MCV TRUCK</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="MCV TIPPER"){ echo "selected"; }?>'+'  >MCV TIPPER</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="LCV TRUCK"){ echo "selected"; }?>'+'  >LCV TRUCK</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="MCV BUS"){ echo "selected"; }?>'+'  >MCV BUS</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="ICV TRUCK"){ echo "selected"; }?>'+'  >ICV TRUCK</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="ICV TIPPER"){ echo "selected"; }?>'+'  >ICV TIPPER</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="SPECIAL"){ echo "selected"; }?>'+'  >SPECIAL</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="LCV"){ echo "selected"; }?>'+'  >LCV</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="ICV BUS"){ echo "selected"; }?>'+'  >ICV BUS</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="MCV"){ echo "selected"; }?>'+'  >MCV</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="BUS"){ echo "selected"; }?>'+'  >BUS</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="ICV"){ echo "selected"; }?>'+'  >ICV</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="HCV TRUCK"){ echo "selected"; }?>'+'  >HCV TRUCK</option>'
                                    +'<option '+'<?php if($value->alvf_segment=="LCV PICKUP"){ echo "selected"; }?>'+'  >LCV PICKUP</option>'
                                  +'</select>'
                              +'</div>'
                            +'</div>'
                            +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<textarea class="form-control" name="alvf_feedback[]" placeholder="Issue/Feedback">'+<?php echo json_encode($value->alvf_feedback);?>+'</textarea>'
                              +'</div>'
                            +'</div>'
                            +'<a class="remove-alvf-row"><i class="fa fa-minus"></i></a>'
                          +'</div>';

              $( "#alvf-form" ).append(code);
              <?php } ?>
            </script>

            <script>
              <?php foreach($action_plan_sales_list as $value){?>
                var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="sales_process_related_issue[]" placeholder="Sales Process Related Issue">'+<?php echo json_encode($value->sales_process_related_issue);?>+'</textarea>'
                          +'</div>'  
                        +'</div>'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="present_status_sales[]">'
                                +'<option value="">Select Status</option>'
                                +'<option '+'<?php if($value->present_status=="p0"){ echo "selected"; }?>'+'  value="p0" >P0</option>'
                                +'<option '+'<?php if($value->present_status=="p1"){ echo "selected"; }?>'+'  value="p1">P1</option>'
                                +'<option '+'<?php if($value->present_status=="p2"){ echo "selected"; }?>'+'  value="p2">P2</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_action_plan_sales[]" placeholder="Future Action Plan">'+<?php echo json_encode($value->future_action_plan);?>+'</textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-sales-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

                $( "#action-plan-sales-form" ).append(code);
              <?php } ?>
            </script>


            <script>
              <?php foreach($action_plan_customer_list as $value){?>
                var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="customer_service_related_issue[]" placeholder="Customer Service Related Issue">'+<?php echo json_encode($value->customer_service_related_issue);?>+'</textarea>'
                          +'</div>'  
                        +'</div>'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="present_status_customer[]">'
                                +'<option value="">Select Status</option>'
                                +'<option '+'<?php if($value->present_status=="p0"){ echo "selected"; }?>'+'  value="p0" >P0</option>'
                                +'<option '+'<?php if($value->present_status=="p1"){ echo "selected"; }?>'+'  value="p1">P1</option>'
                                +'<option '+'<?php if($value->present_status=="p2"){ echo "selected"; }?>'+'  value="p2">P2</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_action_plan_customer[]" placeholder="Future Action Plan">'+<?php echo json_encode($value->future_action_plan);?>+'</textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-sales-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

                $( "#action-plan-customer-form" ).append(code);
              <?php } ?>
            </script>


            <script>
              <?php foreach($action_plan_vehicle_list as $value){?>
                var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="vehicle_parts_related_issue[]" placeholder="Vehicle Parts Related Issue">'+<?php echo json_encode($value->vehicle_parts_related_issue);?>+'</textarea>'
                          +'</div>'  
                        +'</div>'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="present_status_vehicle[]">'
                                +'<option value="">Select Status</option>'
                                +'<option '+'<?php if($value->present_status=="p0"){ echo "selected"; }?>'+'  value="p0" >P0</option>'
                                +'<option '+'<?php if($value->present_status=="p1"){ echo "selected"; }?>'+'  value="p1">P1</option>'
                                +'<option '+'<?php if($value->present_status=="p2"){ echo "selected"; }?>'+'  value="p2">P2</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_action_plan_vehicle[]" placeholder="Future Action Plan">'+<?php echo json_encode($value->future_action_plan);?>+'</textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-sales-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

                $( "#action-plan-vehicle-form" ).append(code);
              <?php } ?>
            </script>


            <script>
              <?php foreach($future_prospect_list as $value){?>
                      var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                              +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                  +'<select class="form-control" name="future_prospect_model_name[]">'
                                   +'<option value="">Select Model</option>'
                                  +'<?php foreach ($model_list as $m_value) {?>'
                                  +'<option value="'+'<?php echo $m_value->model_name; ?>'+'" '+'<?php if($m_value->model_name==$value->model_name){ echo "selected"; }?>'+'  >'+'<?php echo $m_value->model_name; ?>'+'</option>'
                                  +'<?php }?>'
                                  +'</select>'
                              +'</div>'
                            +'</div>'
                              +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                    +'<input type="number" step="1" min="1" class="form-control" placeholder="QTY" name="future_prospect_quantity[]" value="'+<?php echo json_encode($value->quantity);?>+'" >'
                                +'</div>'
                              +'</div>'
                              +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                    +'<select class="form-control" name="future_prospect_application_id[]">'
                                      +'<option value="">Select Application</option>'
                                      +'<?php foreach ($application_list as $ap_value) {?>'
                                      +'<option value="'+<?php echo json_encode($ap_value->application_id);?>+'"  '+'<?php if($ap_value->application_id==$value->future_prospect_application_id){ echo "selected"; }?>'+'  >'+<?php echo json_encode($ap_value->application_name);?>+'</option>'
                                      +'<?php }?>'
                                    +'</select>'
                                +'</div>'
                              +'</div>'
                              +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                    +'<input type="number" step="1" min="0" class="form-control" placeholder="Requested Price" name="requested_price[]" value="'+<?php echo json_encode($value->requested_price);?>+'" >'
                                +'</div>'
                              +'</div>'
                              +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                +'<label class="control-label col-md-3 col-sm-3 col-xs-12">When Likely </label>'
                                +'<div class="col-md-9 col-sm-9 col-xs-12">'
                                    +'<input type="text" class="form-control datepicker" id="picker_'+count+'" name="when_likely[]" value="'+<?php echo json_encode($value->when_likely);?>+'"  >'
                                +'</div>'
                              +'</div>'
                              +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                    +'<textarea class="form-control" name="future_prospect_action_plan[]" placeholder="Action Plan">'+<?php echo json_encode($value->action_plan);?>+'</textarea>'
                                +'</div>'
                              +'</div>'
                              +'<a class="remove-action-plan-future-prospect-row"><i class="fa fa-minus"></i></a>'
                            +'</div>';

                $( "#action-plan-future-prospect-form" ).append(code);
              <?php } ?>
            </script>


            <script>
              <?php foreach($lost_prospect_list as $value){?>
                      var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                                    +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                                      +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                          +'<select class="form-control" name="key_reason[]">'
                                            +'<option value="">Select Reason</option>'
                                            +'<option '+'<?php if($value->key_reason=="Price"){ echo "selected"; }?>'+' >Price</option>'
                                            +'<option '+'<?php if($value->key_reason=="Delivery Schedule"){ echo "selected"; }?>'+' >Delivery Schedule</option>'
                                            +'<option '+'<?php if($value->key_reason=="Specification"){ echo "selected"; }?>'+' >Specification</option>'
                                            +'<option '+'<?php if($value->key_reason=="Indent for Regular Model"){ echo "selected"; }?>'+' >Indent for Regular Model</option>'
                                            +'<option '+'<?php if($value->key_reason=="Third Country LC"){ echo "selected"; }?>'+' >Third Country LC</option>'
                                            +'<option '+'<?php if($value->key_reason=="Others"){ echo "selected"; }?>'+' >Others</option>'
                                          +'</select>'
                                      +'</div>'
                                    +'</div>'
                                    
                                    +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                                      +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                          +'<select class="form-control" name="lost_prospect_application_id[]">'
                                            +'<option value="">Select Application</option>'
                                            +'<?php foreach ($application_list as $ap_value) {?>'
                                            +'<option value="'+<?php echo json_encode($ap_value->application_id);?>+'"  '+'<?php if($ap_value->application_id==$value->lost_prospect_application_id){ echo "selected"; }?>'+'  >'+<?php echo json_encode($ap_value->application_name);?>+'</option>'
                                            +'<?php }?>'
                                          +'</select>'
                                      +'</div>'
                                    +'</div>'

                                     +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                      +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                          +'<select class="form-control" name="lost_prospect_segment[]">'
                                            +'<option value="">Segment</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="MCV TRUCK"){ echo "selected"; }?>'+' >MCV TRUCK</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="MCV TIPPER"){ echo "selected"; }?>'+'  >MCV TIPPER</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="LCV TRUCK"){ echo "selected"; }?>'+'  >LCV TRUCK</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="MCV BUS"){ echo "selected"; }?>'+'  >MCV BUS</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="ICV TRUCK"){ echo "selected"; }?>'+'  >ICV TRUCK</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="ICV TIPPER"){ echo "selected"; }?>'+'  >ICV TIPPER</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="SPECIAL"){ echo "selected"; }?>'+'  >SPECIAL</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="LCV"){ echo "selected"; }?>'+'  >LCV</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="ICV BUS"){ echo "selected"; }?>'+'  >ICV BUS</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="MCV"){ echo "selected"; }?>'+'  >MCV</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="BUS"){ echo "selected"; }?>'+'  >BUS</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="ICV"){ echo "selected"; }?>'+'  >ICV</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="HCV TRUCK"){ echo "selected"; }?>'+'  >HCV TRUCK</option>'
                                            +'<option '+'<?php if($value->lost_prospect_segment=="LCV PICKUP"){ echo "selected"; }?>'+'  >LCV PICKUP</option>'
                                          +'</select>'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                      +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                          +'<input type="number" step="1" min="1" class="form-control" placeholder="QTY" name="lost_prospect_quantity[]" value="'+<?php echo json_encode($value->lost_prospect_quantity);?>+'" >'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                                      +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>'
                                      +'<div class="col-md-9 col-sm-9 col-xs-12">'
                                          +'<input type="text" class="form-control datepicker" id="picker_'+count+'" name="lost_prospect_date[]" value="'+<?php echo json_encode($value->lost_prospect_date);?>+'"  >'
                                      +'</div>'
                                    +'</div>'
                                    +'<a class="remove-lost-prospect-row"><i class="fa fa-minus"></i></a>'
                                  +'</div>';

                $( "#lost-prospect-form" ).append(code);
              <?php } ?>
            </script>













































            <?php }?>



            </div>
        </div>
      </div>
  

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Key Account List <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php if($this->session->userdata('message')!=NULL){?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong><?php echo $this->session->userdata('message'); $this->session->unset_userdata('message');?></strong>
          </div>
          <?php }?>

          <?php if($this->session->userdata('error')!=NULL){?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong><?php echo $this->session->userdata('error'); $this->session->unset_userdata('error');?></strong>
          </div>
          <?php }?>
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Key Account Manager</th>
                <th>Company Name</th>
                <th>Parent Company</th>
                <th>TIV</th>
                <th>AL</th>
                <th>Market Share</th>
                <th>Contact Date</th>
                <th>Next Contact Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($kam_list as $value){?>
              <tr>
                <td><?php foreach($employee_list as $e_value){if($e_value->employee_id==$value->account_manager_ial_id){
                    echo $e_value->employee_name;
                  }}?></td>
                <td><?php echo $value->company_name; ?></td>
                <td><?php echo $value->parent_company; ?></td>
                <td><?php ?></td>
                <td></td>
                <td></td>
                <td><?php echo $value->contact_date; ?></td>
                <td><?php echo $value->next_contact_date; ?></td>
                <td>
                  <form action="<?php echo base_url(); ?>kam" method="post">
                      <input type="hidden" value="<?php echo $value->kam_id; ?>" name="kam_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>kam/delete_kam" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->kam_id; ?>" name="kam_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"  <?php if($this->session->userdata('role') != 20){ echo 'disabled';} ?> ><i class="fa fa-times"></i> delete</a>
                  </form>
                  <form action="<?php echo base_url(); ?>kam/detail" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->kam_id; ?>" name="kam_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> detail</a>
                  </form>
                </td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
  </div>
</div>


<script>
       $( "#add-nalvf-row" ).click(function() {
          count = document.getElementById('count-nalvf').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="text" class="form-control" placeholder="Manufacturer / Make" name="nalvf_make[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="text" class="form-control" placeholder="Model" name="nalvf_model[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" step="1" min="1" class="form-control" placeholder="Quantity" name="nalvf_quantity[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" min="1985" max="2050" class="form-control" placeholder="Last YOP" name="nalvf_last_year_of_purchase[]" required>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="nalvf_application_id[]">'
                                +'<option value="">Select Application</option>'
                                +'<?php foreach($application_list as $ap_value){ ?>'
                                +'<option value="'+'<?php echo $ap_value->application_id; ?>'+'">'+'<?php echo $ap_value->application_name; ?>'+'</option>'
                                +'<?php }?>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="nalvf_segment[]">'
                                +'<option value="">Segment</option>'
                                +'<option>MCV TRUCK</option>'
                                +'<option>MCV TIPPER</option>'
                                +'<option>LCV TRUCK</option>'
                                +'<option>MCV BUS</option>'
                                +'<option>ICV TRUCK</option>'
                                +'<option>ICV TIPPER</option>'
                                +'<option>SPECIAL</option>'
                                +'<option>LCV</option>'
                                +'<option>ICV BUS</option>'
                                +'<option>MCV</option>'
                                +'<option>BUS</option>'
                                +'<option>ICV</option>'
                                +'<option>HCV TRUCK</option>'
                                +'<option>LCV PICKUP</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="nalvf_feedback[]" placeholder="Issue/Feedback"></textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-nalvf-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';



          $( "#nalvf-form" ).append(code);
          document.getElementById('count-nalvf').value = count;
        });
        
        $(document).on('click', "a.remove-nalvf-row", function() {
          $(this).parent('div').remove();
        });
</script>



<script>
       $( "#add-alvf-row" ).click(function() {
          count = document.getElementById('count-alvf').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="text" class="form-control" placeholder="ASHOK LEYLAND" disabled="true">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="alvf_model[]">'
                                +'<option value="">Select Model</option>'
                                +'<?php foreach ($model_list as $m_value) {?>'
                                +'<option value="'+'<?php echo $m_value->model_name; ?>'+'">'+'<?php echo $m_value->model_name; ?>'+'</option>'
                                +'<?php }?>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" step="1" min="1" class="form-control" placeholder="Quantity" name="alvf_quantity[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" min="1985" max="2050" class="form-control" placeholder="Last YOP" name="alvf_last_year_of_purchase[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="alvf_application_id[]">'
                                +'<option value="">Select Application</option>'
                                +'<?php foreach($application_list as $ap_value){ ?>'
                                +'<option value="'+'<?php echo $ap_value->application_id; ?>'+'">'+'<?php echo $ap_value->application_name; ?>'+'</option>'
                                +'<?php }?>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="alvf_segment[]">'
                                +'<option value="">Segment</option>'
                                +'<option>MCV TRUCK</option>'
                                +'<option>MCV TIPPER</option>'
                                +'<option>LCV TRUCK</option>'
                                +'<option>MCV BUS</option>'
                                +'<option>ICV TRUCK</option>'
                                +'<option>ICV TIPPER</option>'
                                +'<option>SPECIAL</option>'
                                +'<option>LCV</option>'
                                +'<option>ICV BUS</option>'
                                +'<option>MCV</option>'
                                +'<option>BUS</option>'
                                +'<option>ICV</option>'
                                +'<option>HCV TRUCK</option>'
                                +'<option>LCV PICKUP</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="alvf_feedback[]" placeholder="Issue/Feedback"></textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-alvf-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';



          $( "#alvf-form" ).append(code);
          document.getElementById('count-alvf').value = count;
        });
        
        $(document).on('click', "a.remove-alvf-row", function() {
          $(this).parent('div').remove();
        });
</script>


<script>
       $( "#add-action-plan-sales-row" ).click(function() {
          count = document.getElementById('count-action-plan-sales').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="sales_process_related_issue[]" placeholder="Sales Process Related Issue"></textarea>'
                          +'</div>'  
                        +'</div>'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="present_status_sales[]">'
                                +'<option value="">Select Status</option>'
                                +'<option value="p0">P0</option>'
                                +'<option value="p1">P1</option>'
                                +'<option value="p2">P2</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_action_plan_sales[]" placeholder="Future Action Plan"></textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-sales-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

          $( "#action-plan-sales-form" ).append(code);
          document.getElementById('count-action-plan-sales').value = count;
        });
        
        $(document).on('click', "a.remove-action-plan-sales-row", function() {
          $(this).parent('div').remove();
        });
</script>


<script>
       $( "#add-action-plan-customer-row" ).click(function() {
          count = document.getElementById('count-action-plan-customer').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="customer_service_related_issue[]" placeholder="customer Service Related Issue"></textarea>'
                          +'</div>'  
                        +'</div>'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="present_status_customer[]">'
                                +'<option value="">Select Status</option>'
                                +'<option value="p0">P0</option>'
                                +'<option value="p1">P1</option>'
                                +'<option value="p2">P2</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_action_plan_customer[]" placeholder="Future Action Plan"></textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-customer-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

          $( "#action-plan-customer-form" ).append(code);
          document.getElementById('count-action-plan-customer').value = count;
        });
        
        $(document).on('click', "a.remove-action-plan-customer-row", function() {
          $(this).parent('div').remove();
        });
</script>



<script>
       $( "#add-action-plan-vehicle-row" ).click(function() {
          count = document.getElementById('count-action-plan-vehicle').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="vehicle_parts_related_issue[]" placeholder="vehicle Parts Related Issue"></textarea>'
                          +'</div>'  
                        +'</div>'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="present_status_vehicle[]">'
                                +'<option value="">Select Status</option>'
                                +'<option value="p0">P0</option>'
                                +'<option value="p1">P1</option>'
                                +'<option value="p2">P2</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_action_plan_vehicle[]" placeholder="Future Action Plan"></textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-vehicle-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

          $( "#action-plan-vehicle-form" ).append(code);
          document.getElementById('count-action-plan-vehicle').value = count;
        });
        
        $(document).on('click', "a.remove-action-plan-vehicle-row", function() {
          $(this).parent('div').remove();
        });
</script>


<script>
       $( "#add-action-plan-future-prospect-row" ).click(function() {
          count = document.getElementById('count-future-prospects').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="future_prospect_model_name[]">'
                                +'<option value="">Select Model</option>'
                                +'<?php foreach ($model_list as $m_value) {?>'
                                +'<option value="'+'<?php echo $m_value->model_name; ?>'+'">'+'<?php echo $m_value->model_name; ?>'+'</option>'
                                +'<?php }?>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" step="1" min="1" class="form-control" placeholder="QTY" name="future_prospect_quantity[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="future_prospect_application_id[]">'
                                +'<option value="">Select Application</option>'
                                +'<?php foreach($application_list as $ap_value){ ?>'
                                +'<option value="'+'<?php echo $ap_value->application_id; ?>'+'">'+'<?php echo $ap_value->application_name; ?>'+'</option>'
                                +'<?php }?>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" step="1" min="0" class="form-control" placeholder="Requested Price" name="requested_price[]" value="0">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<label class="control-label col-md-3 col-sm-3 col-xs-12">When Likely </label>'
                          +'<div class="col-md-9 col-sm-9 col-xs-12">'
                              +'<input type="text" class="form-control datepicker" id="picker_'+count+'" name="when_likely[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<textarea class="form-control" name="future_prospect_action_plan[]" placeholder="Action Plan"></textarea>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-action-plan-future-prospect-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

          $( "#action-plan-future-prospect-form" ).append(code);
          $('.datepicker').daterangepicker({
            locale: {
               format: 'YYYY/MM/DD'
              },
            singleDatePicker: true,
            singleClasses: "picker_4"
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });

          document.getElementById('count-future-prospects').value = count;
        });
        
        $(document).on('click', "a.remove-action-plan-future-prospect-row", function() {
          $(this).parent('div').remove();
        });
</script>


<script>
       $( "#add-lost-prospect-row" ).click(function() {
          count = document.getElementById('count-future-prospects').value;
          count++;

          var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="key_reason[]">'
                                +'<option value="">Select Reason</option>'
                                +'<option value="Price">Price</option>'
                                +'<option value="Delivery Schedule">Delivery Schedule</option>'
                                +'<option value="Specification">Specification</option>'
                                +'<option value="Indent for Regular Model">Indent for Regular Model</option>'
                                +'<option value="Third Country LC">Third Country LC</option>'
                                +'<option value="Others">Others</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="lost_prospect_application_id[]">'
                                +'<option value="">Select Application</option>'
                                +'<?php foreach($application_list as $ap_value){ ?>'
                                +'<option value="'+'<?php echo $ap_value->application_id; ?>'+'">'+'<?php echo $ap_value->application_name; ?>'+'</option>'
                                +'<?php }?>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<select class="form-control" name="lost_prospect_segment[]">'
                                +'<option value="">Segment</option>'
                                +'<option>MCV TRUCK</option>'
                                +'<option>MCV TIPPER</option>'
                                +'<option>LCV TRUCK</option>'
                                +'<option>MCV BUS</option>'
                                +'<option>ICV TRUCK</option>'
                                +'<option>ICV TIPPER</option>'
                                +'<option>SPECIAL</option>'
                                +'<option>LCV</option>'
                                +'<option>ICV BUS</option>'
                                +'<option>MCV</option>'
                                +'<option>BUS</option>'
                                +'<option>ICV</option>'
                                +'<option>HCV TRUCK</option>'
                                +'<option>LCV PICKUP</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="number" step="1" min="1" class="form-control" placeholder="QTY" name="lost_prospect_quantity[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-2 col-sm-12 col-xs-12">'
                          +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>'
                          +'<div class="col-md-9 col-sm-9 col-xs-12">'
                              +'<input type="text" class="form-control datepicker" id="picker_lost_prospect_'+count+'" name="lost_prospect_date[]">'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-lost-prospect-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';

          $( "#lost-prospect-form" ).append(code);
          $('.datepicker').daterangepicker({
            locale: {
               format: 'YYYY/MM/DD'
              },
            singleDatePicker: true,
            singleClasses: "picker_4"
          }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
          });

          document.getElementById('count-lost-prospects').value = count;
        });
        
        $(document).on('click', "a.remove-lost-prospect-row", function() {
          $(this).parent('div').remove();
        });
</script>





<script>
  $(function() { 

    $("#paymentMode").change(function(){ 
          if($("#paymentMode").val()=='1' || $("#paymentMode").val()=='2'){
            $("#bank").css("display", "block");
            $("#accountNo").css("display", "block");
          }else{
            $("#bank").css("display", "none");
            $("#accountNo").css("display", "none");
          }

      });

      $('.datepicker').daterangepicker({
        locale: {
           format: 'YYYY/MM/DD'
          },
        singleDatePicker: true,
        singleClasses: "picker_4"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
  });
</script>

<script>
var x = document.getElementById("demo");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }

  function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
  }
</script>








