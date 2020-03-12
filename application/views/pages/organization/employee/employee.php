<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Employees <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">

          <?php if(!isset($employee_detail)){?>

          <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>employee/add_employee/" enctype='multipart/form-data'>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="employee_id">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="employee_name">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender *:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>
                      M:
                      <input type="radio" class="flat" name="gender" id="genderM" value="Male" checked="" required /> F:
                      <input type="radio" class="flat" name="gender" id="genderF" value="Female" />
                    </p>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="email_id">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">National ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="nid">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="father_name">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mother's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="mother_name">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Spouse's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="spouse_name">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image (Passport Size) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" placeholder="" name="employee_image">
                  </div>
                </div>
            
                
                
                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                <h2>Work Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Department </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="department_id">
                      <?php foreach($department_list as $d_value){?>
                      <option value="<?php echo $d_value->department_id; ?>"><?php echo $d_value->department_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reporting To </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="reporting_employee_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>"><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="reference_id">
                      <option value="88888">BD Jobs</option>
                      <option value="88889">Newspaper</option>
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id?>"><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Seating Location </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="">
                  </div>
                </div> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="branch_id">
                      <?php foreach($branch_list as $b_value){?>
                      <option value="<?php echo $b_value->branch_id?>"><?php echo $b_value->branch_name;?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="company_id">
                      <?php foreach($company_list as $c_value){?>
                      <option value="<?php echo $c_value->company_id?>"><?php echo $c_value->company_name;?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="designation_id">
                      <?php foreach($designation_list as $d_value){?>
                      <option value="<?php echo $d_value->designation_id?>"><?php echo $d_value->designation_name; ?></option>
                      <?php }?>
                      
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Shift </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="shift_id">
                      <?php foreach($shift_list as $s_value){?>
                      <option value="<?php echo $s_value->shift_id?>"><?php echo $s_value->shift_name; ?></option>
                      <?php }?>
                      
                      </select>
                  </div>
                </div>

                <!-- <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4"> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
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
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="employee_status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Employee</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="employee_type">
                      <option value="1">Temporary</option>
                      <option value="2">Casual</option>
                      <option value="3">Permanent</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Elligible for PF</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="pf_elligiblity">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary (Basic) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="basic_salary">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Mode </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="payment_mode" id="paymentMode">
                        <option value="0">Cash</option>
                        <option value="1">Bank</option>
                        <option value="2">Cheque</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="bank" style="display:none">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="bank_id">
                      <option value="0">Select Bank</option>
                      <?php foreach($bank_list as $b_value){?>
                      <option value="<?php echo $b_value->bank_id;?>"><?php echo $b_value->bank_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="accountNo" style="display: none">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Account No (Bank) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="bank_account_no" value="0">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Phone </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="work_phone">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Extension </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="1" max="999" class="form-control" placeholder="" name="extension">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Role </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="role">
                      <option value="20">Admin</option>
                      <option value="1">User</option>
                      </select>
                  </div>
                </div>
                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                <h2>Personal Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal Contact No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="personal_phone">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal Email </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="personal_email_id">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status *:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>
                      Married:
                      <input type="radio" class="flat" name="marital_status" id="genderM" value="Married" checked="" required /> Unmarried:
                      <input type="radio" class="flat" name="marital_status" id="genderF" value="Unmarried" />
                    </p>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthday </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal5" name="birth_date" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Present Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="present_address"></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="permanent_address"></textarea>
                  </div>
                </div>


                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                  <h2>Educational Info <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-education-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="education-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Degree" name="qualification_name[]">
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Institution" name="institution_name[]">
                      </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Department" name="qualification_department[]">
                      </div>
                    </div>
                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Grade" name="grade[]">
                      </div>
                    </div>
                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Year" name="passing_year[]">
                      </div>
                    </div>
                    <div class="form-group col-md-1 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Board" name="board_name[]">
                      </div>
                    </div>
                    <!-- <a id="remove"><i class="fa fa-minus"></i></a> -->
                  </div>
                </div>

                
                


                <div class="x_title">
                  <h2>Nominee Info <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-nominee-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="nominee-form">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" class="form-control" placeholder="Name" name="nominee_name[]">
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xs-12">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Relation </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="relation[]">
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="wife">Wife</option>
                            <option value="daughter">Daughter</option>
                            <option value="son">Son</option>
                            <option value="brother">Brother</option>
                            <option value="sister">Sister</option>
                          </select>
                      </div>
                    </div>
                    <!-- <a id="remove"><i class="fa fa-minus"></i></a> -->
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

              <input type="hidden" value="0" id="count" />
              <input type="hidden" value="0" id="count-nominee" />



            </form>








            <?php } else { ?>


            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>employee/update_employee/" enctype='multipart/form-data'>

            <input type="hidden" value="<?php echo $employee_detail->employee_id; ?>" name="employee_id"/>
            <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Edit Employee <i class="fa fa-plus"></i></a>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" disabled="true" class="form-control" placeholder="" name="employee_id" value="<?php echo $employee_detail->employee_id; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="employee_name" value="<?php echo $employee_detail->employee_name; ?>" />
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender *:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>
                      M:
                      <input type="radio" class="flat" name="gender" id="genderM" value="Male" <?php if($employee_detail->gender=='Male'){echo 'checked';} ?> /> F:
                      <input type="radio" class="flat" name="gender" id="genderF" value="Female" <?php if($employee_detail->gender=='Female'){echo 'checked';} ?> />
                    </p>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="email_id" value="<?php echo $employee_detail->email_id; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">National ID </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="nid" value="<?php echo $employee_detail->nid; ?>" >
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Father's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="father_name" value="<?php echo $employee_detail->father_name; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Mother's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="mother_name" value="<?php echo $employee_detail->mother_name; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Spouse's Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="spouse_name" value="<?php echo $employee_detail->spouse_name; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Image (Passport Size) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="file" class="form-control" placeholder="" name="employee_image">
                  </div>
                </div>
            
                
                
                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                <h2>Work Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Department </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="department_id">
                      <?php foreach($department_list as $d_value){?>
                      <option value="<?php echo $d_value->department_id; ?>" <?php if($d_value->department_id==$employee_detail->department_id){ echo 'selected';}?> ><?php echo $d_value->department_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reporting To </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="reporting_employee_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>" <?php if($e_value->employee_id==$employee_detail->reporting_employee_id){ echo 'selected';}?> ><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reference </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="reference_id">
                      <option value="88888">BD Jobs</option>
                      <option value="88889">Newspaper</option>
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id?>" <?php if($e_value->employee_id==$employee_detail->reference_id){ echo 'selected';}?> ><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <!-- <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Seating Location </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="">
                  </div>
                </div> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Branch </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="branch_id">
                      <?php foreach($branch_list as $b_value){?>
                      <option value="<?php echo $b_value->branch_id?>" <?php if($b_value->branch_id==$employee_detail->branch_id){ echo 'selected';}?> ><?php echo $b_value->branch_name;?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Company </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="company_id">
                      <?php foreach($company_list as $c_value){?>
                      <option value="<?php echo $c_value->company_id?>" <?php if($c_value->company_id==$employee_detail->company_id){ echo 'selected';}?> ><?php echo $c_value->company_name;?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="designation_id">
                      <?php foreach($designation_list as $d_value){?>
                      <option value="<?php echo $d_value->designation_id?>" <?php if($d_value->designation_id==$employee_detail->designation_id){ echo 'selected';}?> ><?php echo $d_value->designation_name; ?></option>
                      <?php }?>
                      
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Shift </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="shift_id">
                      <?php foreach($shift_list as $s_value){?>
                      <option value="<?php echo $s_value->shift_id?>" <?php if($employee_detail->shift_id==$s_value->shift_id){ echo 'selected'; }?> ><?php echo $s_value->shift_name; ?></option>
                      <?php }?>
                      
                      </select>
                  </div>
                </div>

                <!-- <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4"> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Joining </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="joining_date" placeholder="First Name" aria-describedby="inputSuccess2Status4" value="<?php echo $employee_detail->joining_date; ?>">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="employee_status">
                      <option value="1" <?php if($employee_detail->employee_status==1){ echo 'selected';}?> >Active</option>
                      <option value="0" <?php if($employee_detail->employee_status==0){ echo 'selected';}?> >Inactive</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Employee</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="employee_type">
                      <option value="1" <?php if($employee_detail->employee_type==1){ echo 'selected';}?> >Temporary</option>
                      <option value="2" <?php if($employee_detail->employee_type==2){ echo 'selected';}?> >Casual</option>
                      <option value="3" <?php if($employee_detail->employee_type==3){ echo 'selected';}?> >Permanent</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Elligible for PF</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="pf_elligiblity">
                      <option value="0" <?php if($employee_detail->pf_elligiblity==0){ echo 'selected';}?> >No</option>
                      <option value="1" <?php if($employee_detail->pf_elligiblity==1){ echo 'selected';}?> >Yes</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary (Basic) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="basic_salary" value="<?php echo $employee_detail->basic_salary; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Mode </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="payment_mode" id="paymentMode">
                        <option value="0" <?php if($employee_detail->payment_mode==0){echo 'selected'; }?> >Cash</option>
                        <option value="1" <?php if($employee_detail->payment_mode==1){echo 'selected'; }?> >Bank</option>
                        <option value="2" <?php if($employee_detail->payment_mode==2){echo 'selected'; }?> >Cheque</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="bank" <?php if($employee_detail->payment_mode==0){?>style="display:none" <?php }?> >
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="bank_id">
                      <option value="0">Select Bank</option>
                      <?php foreach($bank_list as $b_value){?>
                      <option value="<?php echo $b_value->bank_id;?>" <?php if($employee_detail->bank_id==$b_value->bank_id){echo 'selected'; }?>><?php echo $b_value->bank_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12" id="accountNo" <?php if($employee_detail->payment_mode==0){?>style="display:none" <?php }?>>
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Account No (Bank) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="bank_account_no" value="<?php echo $employee_detail->bank_account_no; ?>">
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Work Phone </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="work_phone" value="<?php echo $employee_detail->work_phone; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Extension </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="1" max="999" class="form-control" placeholder="" name="extension" value="<?php echo $employee_detail->extension; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Role </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="role">
                      <option value="20" <?php if($employee_detail->role==20){ echo 'selected';}?> >Admin</option>
                      <option value="1" <?php if($employee_detail->role==1){ echo 'selected';}?> >User</option>
                      </select>
                  </div>
                </div>
                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                <h2>Personal Info <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal Contact No </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="personal_phone" value="<?php echo $employee_detail->personal_phone; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Personal Email </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="personal_email_id" value="<?php echo $employee_detail->personal_email_id; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status *:</label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>
                      Married:
                      <input type="radio" class="flat" name="marital_status" id="genderM" value="Married" <?php if($employee_detail->marital_status=='Married'){echo 'checked';} ?> /> Unmarried:
                      <input type="radio" class="flat" name="marital_status" id="genderF" value="Unmarried" <?php if($employee_detail->marital_status=='Unmarried'){echo 'checked';} ?>/>
                    </p>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Birthday </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal5" name="birth_date" placeholder="First Name" aria-describedby="inputSuccess2Status4" value="<?php echo $employee_detail->birth_date; ?>">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Present Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="present_address"><?php echo $employee_detail->present_address; ?></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="permanent_address"><?php echo $employee_detail->permanent_address; ?></textarea>
                  </div>
                </div>


                <div class="clearfix"></div>
                <br />
                <div class="x_title">
                  <h2>Educational Info <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-education-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="education-form">
                  
                </div>

                
                


                <div class="x_title">
                  <h2>Nominee Info <small></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a  id="add-nominee-row" style="padding-top:.5em; text-style:bold;">Add Row </a> </li>
                      <li><a ><i class="fa fa-plus"></i></a>
                      </li>
                      
                  </ul> 
                  <div class="clearfix"></div>
                </div>

                <div class="row" id="nominee-form">
                  
                </div>
                 <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
                  </div>
              </div>

              <input type="hidden" value="0" id="count" />
              <input type="hidden" value="0" id="count-nominee" />



            </form>

            <script>
              <?php foreach($qualification_list as $value){?>
                  // alert(<?php echo json_encode($value->qualification_name);?>);
                  // alert( "Handler for .change() called."+this.value);
                  var code =  '<div class="col-md-12 col-sm-12 col-xs-12">'
                                +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                                  +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                      +'<input type="text" class="form-control" placeholder="Degree" name="qualification_name[]" value="'+<?php echo json_encode($value->qualification_name);?>+'">'
                                  +'</div>'
                                +'</div>'
                                +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                                  +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                    +'<input type="text" class="form-control" placeholder="Institution" name="institution_name[]" value="'+<?php echo json_encode($value->institution_name);?>+'">'
                                  +'</div>'
                                +'</div>'
                                +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                                  +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                      +'<input type="text" class="form-control" placeholder="Department" name="qualification_department[]" value="'+<?php echo json_encode($value->qualification_department);?>+'">'
                                  +'</div>'
                                +'</div>'
                                +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                  +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                      +'<input type="text" class="form-control" placeholder="Grade" name="grade[]" value="'+<?php echo json_encode($value->grade);?>+'">'
                                  +'</div>'
                                +'</div>'
                                +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                  +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                      +'<input type="text" class="form-control" placeholder="Year" name="passing_year[]" value="'+<?php echo json_encode($value->passing_year);?>+'">'
                                  +'</div>'
                                +'</div>'
                                +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                  +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                      +'<input type="text" class="form-control" placeholder="Board" name="board_name[]" value="'+<?php echo json_encode($value->board_name);?>+'">'
                                  +'</div>'
                                +'</div>'
                                // +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                                //   +'<div class="col-md-12 col-sm-12 col-xs-12">'
                                //       +'<a class="remove">Remove</a>'
                                //   +'</div>'
                                // +'</div>'
                                // +'<a class="remove-row"><i class="fa fa-minus"></i></a> '
                              +'</div>';

                  $('#education-form').append(code);

              <?php } ?>  
                
          </script>
          <script>
              <?php foreach($nominee_list as $value){?>
                  // alert(<?php echo json_encode($value->nominee_name);?>);
                  // alert( "Handler for .change() called."+this.value);
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

            <?php }?>



            </div>
        </div>
      </div>
  

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Employee List <small></small></h2>
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
                <th>Name</th>
                <th>Position</th>
                <th>Department</th>
                <th>Branch</th>
                <th>Joining date</th>
                <th>Status</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($employee_list as $value){?>
              <tr>
                <td><?php echo $value->employee_name; ?></td>
                <td>
                  <?php foreach($designation_list as $d_value){if($d_value->designation_id==$value->designation_id){
                    echo $d_value->designation_name;
                  }}?>
                </td>
                <td>
                  <?php foreach($department_list as $d_value){if($d_value->department_id==$value->department_id){
                    echo $d_value->department_name;
                  }}?>
                </td>
                <td>
                  <?php foreach($branch_list as $b_value){if($b_value->branch_id==$value->branch_id){
                    echo $b_value->branch_name;
                  }}?>
                </td>
                <td><?php echo $value->joining_date; ?></td>
                <td><?php switch ($value->employee_status) {
                  case 1:
                    echo 'Active';
                    break;
                  case 0:
                    echo 'Inactive';
                    break;
                  default:
                    break;
                } ?></td>
                <td><?php switch ($value->employee_type) {
                  case 1:
                    echo 'Temporary';
                    break;
                  case 2:
                    echo 'Casual';
                    break;
                  case 3:
                    echo 'Permanent';
                    break;
                  default:
                    break;
                } ?></td>
                <td>
                  <form action="<?php echo base_url(); ?>employee" method="post">
                      <input type="hidden" value="<?php echo $value->employee_id; ?>" name="employee_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>employee/delete_employee" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->employee_id; ?>" name="employee_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> delete</a>
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
       $( "#add-education-row" ).click(function() {
          count = document.getElementById('count').value;
          count++;
          var code = '<div class="col-md-12 col-sm-12 col-xs-12">'
                      +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                        +'<div class="col-md-12 col-sm-12 col-xs-12">'
                            +'<input type="text" class="form-control" placeholder="Degree" name="qualification_name[]">'
                        +'</div>'
                      +'</div>'
                      +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                        +'<div class="col-md-12 col-sm-12 col-xs-12">'
                          +'<input type="text" class="form-control" placeholder="Institution" name="institution_name[]">'
                        +'</div>'
                      +'</div>'
                      +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                        +'<div class="col-md-12 col-sm-12 col-xs-12">'
                            +'<input type="text" class="form-control" placeholder="Department" name="qualification_department[]">'
                        +'</div>'
                      +'</div>'
                      +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                        +'<div class="col-md-12 col-sm-12 col-xs-12">'
                            +'<input type="text" class="form-control" placeholder="Grade" name="grade[]">'
                        +'</div>'
                      +'</div>'
                      +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                        +'<div class="col-md-12 col-sm-12 col-xs-12">'
                            +'<input type="text" class="form-control" placeholder="Year" name="passing_year[]">'
                        +'</div>'
                      +'</div>'
                      +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                        +'<div class="col-md-12 col-sm-12 col-xs-12">'
                            +'<input type="text" class="form-control" placeholder="Board" name="board_name[]">'
                        +'</div>'
                      +'</div>'
                      // +'<div class="form-group col-md-1 col-sm-12 col-xs-12">'
                      //   +'<div class="col-md-12 col-sm-12 col-xs-12">'
                      //       +'<a class="remove">Remove</a>'
                      //   +'</div>'
                      // +'</div>'
                      +'<a class="remove-row"><i class="fa fa-minus"></i></a> '
                    +'</div>';
          $( "#education-form" ).append(code);
          document.getElementById('count').value = count;
        });
        
        $(document).on('click', "a.remove-row", function() {
          $(this).parent('div').remove();
        });
</script>


<script>
       $( "#add-nominee-row" ).click(function() {
          count = document.getElementById('count-nominee').value;
          count++;
          var code = '<div class="col-md-12 col-sm-12 col-xs-12">'
                        +'<div class="form-group col-md-3 col-sm-12 col-xs-12">'
                          +'<div class="col-md-12 col-sm-12 col-xs-12">'
                              +'<input type="text" class="form-control" placeholder="Name" name="nominee_name[]">'
                          +'</div>'
                        +'</div>'
                        +'<div class="form-group col-md-4 col-sm-12 col-xs-12">'
                          +'<label class="control-label col-md-3 col-sm-3 col-xs-12">Relation </label>'
                          +'<div class="col-md-9 col-sm-9 col-xs-12">'
                              +'<select class="form-control" name="relation[]">'
                               +'<option>Father</option>'
                               +'<option>Mother</option>'
                                +'<option>Wife</option>'
                                +'<option>Daughter</option>'
                                +'<option>Son</option>'
                                +'<option>Brother</option>'
                                +'<option>Sister</option>'
                              +'</select>'
                          +'</div>'
                        +'</div>'
                        +'<a class="remove-nominee-row"><i class="fa fa-minus"></i></a>'
                      +'</div>';
          $( "#nominee-form" ).append(code);
          document.getElementById('count-nominee').value = count;
        });
        
        $(document).on('click', "a.remove-nominee-row", function() {
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


  });
</script>








