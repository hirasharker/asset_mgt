<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>attendance <small></small></h3>
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

      <?php if(!isset($attendance_detail)){?>
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add <i class="fa fa-plus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>attendance/add_attendance">

                <div class="x_title">
                <h2>attendance <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="employee_id">
                        <option value="">Select Employee</option>
                        <?php foreach($employee_list as $value){?>
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Check IN </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" id="timepicker1" placeholder="" name="check_in">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Check Out </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" placeholder="" name="check_out">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="" aria-describedby="inputSuccess2Status4" name="attendance_date">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
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
                <li><a class="collapse-link">Update <i class="fa fa-plus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>attendance/update_attendance">
                <input type="hidden" name="attendance_id" value="<?php echo $attendance_detail->attendance_id; ?>">
                <div class="x_title">
                <h2>attendance <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="employee_id">
                        <option value="">Select Employee</option>
                        <?php foreach($employee_list as $value){?>
                        <option value="<?php echo $value->employee_id; ?>" <?php if($attendance_detail->employee_id==$value->employee_id){ echo 'selected'; }?>><?php echo $value->employee_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Check IN </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" id="timepicker1" placeholder="" name="check_in" value="<?php echo date('H:i:s', strtotime($attendance_detail->check_in));?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Check Out </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" placeholder="" name="check_out" value="<?php echo date('H:i:s', strtotime($attendance_detail->check_out));?>">
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="" aria-describedby="inputSuccess2Status4" name="attendance_date" value="<?php echo $attendance_detail->attendance_date;?>">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
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


        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Upload <i class="fa fa-plus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>attendance/upload_attendance" enctype='multipart/form-data'>

                <div class="x_title">
                <h2>attendance <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Attendance File (CSV) </label>
                  <div class="col-md-4 col-sm-4 col-xs-12">
                      <input type="file" class="form-control" placeholder="" name="attendance_file">
                  </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
            </form>
            </div>
        </div>



      </div>
  </div>

  <!-- <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>attendance Summary <small></small></h2>
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
                <th>Date </th>
                <th>Check IN</th>
                <th>Check Out</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i= 1; foreach($attendance_list as $value){if($value->check_in == '00:00:00.0000000'){?>
              <tr style="background-color: #f00;color: #fff; font-weight: bold">
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php foreach($employee_list as $e_value){if($value->employee_id==$e_value->employee_id){ 
                    echo $e_value->employee_name;
                  }}?></td>
                <td><?php echo $value->attendance_date; ?></td>
                <td><?php echo $value->check_in; ?></td>
                <td><?php echo $value->check_out; ?></td>
                <td>A</td>
                <td>
                  <form action="<?php echo base_url(); ?>attendance" method="post">
                      <input type="hidden" value="<?php echo $value->attendance_id; ?>" name="attendance_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#fff"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>attendance/delete_attendance" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->attendance_id; ?>" name="attendance_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#fff"><i class="fa fa-times"></i> delete</a>
                  </form>
                </td>
              </tr>
            <?php }else { ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php foreach($employee_list as $e_value){if($value->employee_id==$e_value->employee_id){ 
                    echo $e_value->employee_name;
                  }}?></td>
                <td><?php echo $value->attendance_date; ?></td>
                <td><?php echo $value->check_in; ?></td>
                <td><?php echo $value->check_out; ?></td>
                <td></td>
                <td>
                  <form action="<?php echo base_url(); ?>attendance" method="post">
                      <input type="hidden" value="<?php echo $value->attendance_id; ?>" name="attendance_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>attendance/delete_attendance" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->attendance_id; ?>" name="attendance_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> delete</a>
                  </form>
                </td>
              </tr>
            <?php } $i++; }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
 -->


  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Attendance Summary <small></small></h2>
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
                <th>Month </th>
                <th>Workdays</th>
                <th>Late</th>
                <th>Early</th>
                <th>Absent</th>
                <th>Leave</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i= 1; foreach($attendance_summary_list as $value){ ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php echo $value->attendance_month; ?></td>
                <td><?php echo $value->workdays; ?></td>
                <td><?php echo $value->late; ?></td>
                <td><?php echo $value->early; ?></td>
                <td><?php echo $value->absent - $value->leave; ?></td>
                <td><?php echo $value->leave; ?></td>
                <td>
                  <form action="<?php echo base_url(); ?>attendance/attendance_detail" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->employee_id; ?>" name="employee_id">
                      <input type="hidden" value="<?php echo $value->attendance_month; ?>" name="attendance_month">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#000"><i class="fa fa-times"></i> detail</a>
                  </form>
                </td>
              </tr>
            <?php $i++; }?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('input.timepicker').timepicker({
      timeFormat: 'HH:mm',
    interval: 1,
    dynamic: true,
    dropdown: false,
    scrollbar: false
    });
});
</script>