<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Leave Views <small></small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
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
    <div class="col-md-12 col-sm-12 col-xs-12">

    <?php if(!isset($leave_detail)){?>

        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Apply for Leave <i class="fa fa-plus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>leave/add_leave">

                <div class="x_title">
                <h2>Add Leave <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="employee_id" required>
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>"><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Leave </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="leave_type_id" required>
                      <?php foreach($leave_type_list as $lt_value){?>
                      <option value="<?php echo $lt_value->leave_type_id?>"><?php echo $lt_value->leave_type_name; ?></option>
                      <?php } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Temporary Replacement </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="proxy_employee_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>"><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <fieldset>
                        <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input type="text" style="width: 200px" name="date" id="reservation" class="form-control" required />
                            </div>
                        </div>
                        </div>
                    </fieldset>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason for Leave </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="reason_for_leave" required>
                        <option value="Sickness">Sickness</option>
                        <option value="FamilyAffairs">Family Affairs</option>
                        <option value="Festival">Festival</option>
                        <option value="Accident">Accident</option>
                        <option value="Tour">Tour</option>
                        <option value="Other">Others</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address During Leave <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder="" name="address_during_leave"></textarea>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
            </form>
            </div>
        </div>
        <?php } else {?>
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Edit Leave <i class="fa fa-plus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>leave/update_leave">

                <input type="hidden" name="leave_id" value="<?php echo $leave_detail->leave_id; ?>">
                <div class="x_title">
                <h2>Edit Leave <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="employee_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>" <?php if($leave_detail->employee_id==$e_value->employee_id){ echo 'selected'; }?> ><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Leave </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="leave_type_id">
                      <?php foreach($leave_type_list as $lt_value){?>
                      <option value="<?php echo $lt_value->leave_type_id?>" <?php if($leave_detail->leave_type_id==$lt_value->leave_type_id){ echo 'selected'; }?> ><?php echo $lt_value->leave_type_name; ?></option>
                      <?php } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Temporary Replacement </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="proxy_employee_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>" <?php if($leave_detail->proxy_employee_id==$e_value->employee_id){ echo 'selected'; }?>><?php echo $e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <fieldset>
                        <div class="control-group">
                        <div class="controls">
                            <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input type="text" style="width: 200px" name="date" id="reservation" class="form-control" value="<?php echo $leave_detail->start_date.' - '.$leave_detail->end_date; ?>"/>
                            </div>
                        </div>
                        </div>
                    </fieldset>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason for Leave </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="reason_for_leave" required>
                        <option value="Sickness" <?php if($leave_detail->reason_for_leave=='Sickness'){echo 'selected';}?> >Sickness</option>
                        <option value="FamilyAffairs" <?php if($leave_detail->reason_for_leave=='FamilyAffairs'){echo 'selected';}?> >Family Affairs</option>
                        <option value="Festival" <?php if($leave_detail->reason_for_leave=='Festival'){echo 'selected';}?> >Festival</option>
                        <option value="Accident" <?php if($leave_detail->reason_for_leave=='Accident'){echo 'selected';}?> >Accident</option>
                        <option value="Tour" <?php if($leave_detail->reason_for_leave=='Tour'){echo 'selected';}?> >Tour</option>
                        <option value="Other" <?php if($leave_detail->reason_for_leave=='Other'){echo 'selected';}?> >Others</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address During Leave <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder="" name="address_during_leave"><?php echo $leave_detail->address_during_leave; ?></textarea>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>

                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
            </form>
            </div>
        </div>
        <?php }?>



        </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Leave Summary <small></small></h2>
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
                <th>SN</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Leave Days</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i=1; foreach($leave_list as $value){?>
              <tr>
                <td><?php echo $i; $i++?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php foreach($employee_list as $e_value){if($e_value->employee_id == $value->employee_id){
                  echo $e_value->employee_name;
                  }}?></td>
                <td><?php foreach($leave_type_list as $lt_value){if($lt_value->leave_type_id==$value->leave_type_id){
                  echo $lt_value->leave_type_name;
                  }}?></td>
                <td><?php echo $value->leave_days; ?></td>
                <td><?php echo $value->reason_for_leave; ?></td>
                <td><?php echo $value->start_date.' - '.$value->end_date; ?></td>
                <td>
                  <?php
                    switch ($value->leave_status) {
                      case '0':
                        echo 'Waiting for Approval of Reporting Head';
                        break;
                      case '1':
                        echo 'Waiting for Approval of Head of Department';
                        break;
                      case '2':
                        echo 'Waiting for Approval of HR';
                        break;
                      case '3':
                        echo '<p style="color:#009900">Approved!</p>';
                        break;
                      case '5':
                        echo '<p style="color:#f00">Denied by Reporting Head!</p>';
                        break;
                      case '6':
                        echo '<p style="color:#f00">Denied by Head of Department!</p>';
                        break;
                      case '7':
                        echo '<p style="color:#f00">Denied by HR!</p>';
                        break;
                      default:
                        # code...
                        break;
                    }
                  ?>
                </td>
                <td>
                  <form action="<?php echo base_url(); ?>leave" method="post">
                      <input type="hidden" value="<?php echo $value->leave_id; ?>" name="leave_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>leave/delete_leave" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->leave_id; ?>" name="leave_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> delete</a>
                  </form>
                  <form action="<?php echo base_url(); ?>leave/leave_form" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->leave_id; ?>" name="leave_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#000"><i class="fa fa-print"></i> print</a>
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