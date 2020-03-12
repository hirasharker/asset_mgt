<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Attendance Settings <small></small></h3>
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

      <?php if(isset($setting_detail)){?>
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><?php echo $setting_detail->setting_key;?> settings <i class="fa fa-minus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>attendance/update_settings">
                <input type="hidden" name="attendance_setting_id" value="<?php echo $setting_detail->attendance_setting_id; ?>">

                <div class="x_title">
                <h2> <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Setting Key </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="setting_key" value="<?php echo $setting_detail->setting_key; ?>" disabled="true">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Number of Occurrence </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="occurred_amount" value="<?php echo $setting_detail->occurred_amount; ?>">
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of Penalty</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="leave_type_id">
                        <?php foreach($leave_type_list as $value){?>
                        <option value="<?php echo $value->leave_type_id?>" <?php if($value->leave_type_id==$setting_detail->leave_type_id){ echo 'selected';}?> ><?php echo $value->leave_type_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Number of Penalty </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="penalty_amount" value="<?php echo $setting_detail->penalty_amount; ?>">
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
          <h2>Settings Summary <small></small></h2>
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
                <th>Key</th>
                <th>Occured Day </th>
                <th>Penalty Type </th>
                <th>Penalty Amount</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i= 1; foreach($setting_list as $value){?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->setting_key; ?></td>
                <td><?php echo $value->occurred_amount; ?></td>
                <td><?php echo $value->leave_type_name; ?></td>
                <td><?php echo $value->penalty_amount; ?></td>
                <td>
                  <form action="<?php echo base_url(); ?>attendance/settings" method="post">
                      <input type="hidden" value="<?php echo $value->attendance_setting_id; ?>" name="attendance_setting_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <!-- <form action="<?php echo base_url(); ?>attendance_setting/delete_attendance_setting" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->attendance_setting_id; ?>" name="attendance_setting_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> delete</a>
                  </form> -->
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