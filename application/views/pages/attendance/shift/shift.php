<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Shift Management <small></small></h3>
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

      <?php if(!isset($shift_detail)){?>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>shift/add_shift">

                <div class="x_title">
                <h2>shift <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Shift Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" placeholder="" name="shift_name">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">On Duty Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="on_duty_time">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Off Duty Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" placeholder="" name="off_duty_time">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Late Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="late_time">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Early Leave Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="early_leave_time">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Week Day </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="weekday">
                        <option value="">Select Weekday</option>
                        <option value="6">Saturday</option>
                        <option value="0">Sunday</option>
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Working Hour (Per Day) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="working_hour_limit">
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
                <li><a class="collapse-link">Update <i class="fa fa-minus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>shift/update_shift">
                <input type="hidden" name="shift_id" value="<?php echo $shift_detail->shift_id; ?>">

                <div class="x_title">
                <h2>Shift <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Shift Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" placeholder="" name="shift_name" value="<?php echo $shift_detail->shift_name; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">On Duty Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="on_duty_time" value="<?php echo date('H:i:s', strtotime($shift_detail->on_duty_time)); ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Off Duty Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control timepicker" placeholder="" name="off_duty_time" value="<?php echo date('H:i:s', strtotime($shift_detail->off_duty_time)); ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Late Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="late_time" value="<?php echo $shift_detail->late_time; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Early Leave Time </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="early_leave_time" value="<?php echo $shift_detail->early_leave_time; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Week Day </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="weekday" required>
                        <option value="">Select Weekday</option>
                        <option value="6" <?php if($shift_detail->weekday==6){echo 'selected'; }?> >Saturday</option>
                        <option value="0" <?php if($shift_detail->weekday==0){echo 'selected'; }?> >Sunday</option>
                        <option value="1" <?php if($shift_detail->weekday==1){echo 'selected'; }?> >Monday</option>
                        <option value="2" <?php if($shift_detail->weekday==2){echo 'selected'; }?> >Tuesday</option>
                        <option value="3" <?php if($shift_detail->weekday==3){echo 'selected'; }?> >Wednesday</option>
                        <option value="4" <?php if($shift_detail->weekday==4){echo 'selected'; }?> >Thursday</option>
                        <option value="5" <?php if($shift_detail->weekday==5){echo 'selected'; }?> >Friday</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Working Hour (Per Day) </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" min="0" class="form-control" placeholder="" name="working_hour_limit" value="<?php echo $shift_detail->working_hour_limit; ?>" >
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

      <?php } ?>
        

      </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>shift Summary <small></small></h2>
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
                <th>Shift Name</th>
                <th>On Duty Time</th>
                <th>Off Duty Time </th>
                <th>Late Time</th>
                <th>Early Leave Time</th>
                <th>Weekday</th>
                <th>Working Hour</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i= 1; foreach($shift_list as $value){?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->shift_name; ?></td>
                <td><?php echo date('H:i:s', strtotime($value->on_duty_time)); ?></td>
                <td><?php echo date('H:i:s', strtotime($value->off_duty_time)); ?></td>
                <td><?php echo $value->late_time.' min'; ?></td>
                <td><?php echo $value->early_leave_time.' min'; ?></td>
                <td><?php switch ($value->weekday) {
                    case 0:
                    echo 'Sunday';
                    break;
                    case 1:
                    echo 'Monday';
                    break;
                    case 2:
                    echo 'Tuesday';
                    break;
                    case 3:
                    echo 'Wednesday';
                    break;
                    case 4:
                    echo 'Thursday';
                    break;
                    case 5:
                    echo 'Friday';
                    break;
                    case 6:
                    echo 'Saturday';
                    break;
                  
                  default:
                    break;
                }?></td>
                <td><?php echo $value->working_hour_limit.' hr'; ?></td>
                <td>
                  <form action="<?php echo base_url(); ?>shift" method="post">
                      <input type="hidden" value="<?php echo $value->shift_id; ?>" name="shift_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>shift/delete_shift" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->shift_id; ?>" name="shift_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> delete</a>
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
function()
    {
      
    };
</script>