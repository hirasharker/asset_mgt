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
      <div class="x_panel">
        <div class="x_title">
          <h2>Attendance Detail <small></small></h2>
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
              <tr style="background-color: #d85450;color: #fff; font-weight: bold">
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php echo $value->attendance_date; ?></td>
                <td><?php echo $value->check_in; ?></td>
                <td><?php echo $value->check_out; ?></td>
                <td>A 
                <?php if($value->paid_status !=0 || $value->paid_status != NULL){
                    echo '/&nbsp;';
                    switch ($value->leave_status) {
                      case 3:
                        echo "Leave (Approved)"; 
                        break;
                      
                      default:
                        echo "Leave (Applied)";
                        break;
                    }
                  }?>
                </td>
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
            <?php }elseif($value->check_out < $min_check_out && $value->check_in > $max_check_in) { ?>
              <tr style="background-color: #f0ac4f;color: #fff; font-weight: bold">
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php echo $value->attendance_date; ?></td>
                <td><?php echo $value->check_in; ?></td>
                <td><?php echo $value->check_out; ?></td>
                <td>L + E</td>
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

            <?php }elseif($value->check_out < $min_check_out) { ?>
              <tr style="background-color: #f0ac4f;color: #fff; font-weight: bold">
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php echo $value->attendance_date; ?></td>
                <td><?php echo $value->check_in; ?></td>
                <td><?php echo $value->check_out; ?></td>
                <td>E</td>
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
            <?php }elseif($value->check_in > $max_check_in){?>
              <tr style="background-color: #f0ac4f;color: #fff; font-weight: bold">
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php echo $value->attendance_date; ?></td>
                <td><?php echo $value->check_in; ?></td>
                <td><?php echo $value->check_out; ?></td>
                <td>L</td>
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
            <?php }else {?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
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









</div>



</div>

<script type="text/javascript">
function()
    {
      
    };
</script>