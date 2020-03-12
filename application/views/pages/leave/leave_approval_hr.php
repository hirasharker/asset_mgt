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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card"><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#waiting-for-approval" aria-controls="waiting-for-approval" role="tab" data-toggle="tab">Waiting for Approval</a></li>
                <li role="presentation"><a href="#denied" aria-controls="denied" role="tab" data-toggle="tab">Denied</a></li>
                <li role="presentation"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="waiting-for-approval">
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

                            <table id="datatable-buttons1" class="table table-striped table-bordered responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Leave Date</th>
                                        <th>Leave Days</th>
                                        <th>Reason</th>
                                        <th>Address During Leave</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($waiting_list as $value){?>
                                    <tr>
                                        <td><?php echo $value->employee_id; ?></td>
                                        <td><?php echo $value->employee_name; ?></td>
                                        <td><?php foreach($designation_list as $d_value){if($value->designation_id == $d_value->designation_id){echo $d_value->designation_name; }}?></td>
                                        <td><?php echo $value->start_date.' - '.$value->end_date; ?></td>
                                        <td><?php echo $value->leave_days; ?></td>
                                        <td><?php echo $value->reason_for_leave; ?></td>
                                        <td><?php echo $value->address_during_leave; ?></td>
                                        <td><?php foreach($leave_type_list as $lt_value){if($value->leave_type_id == $lt_value->leave_type_id){echo $lt_value->leave_type_name; }}?></td>

                                        <td>
                                            <form action="<?php echo base_url();?>leave/leave_approval_hr_with_key/approve/<?php echo $value->leave_id;?>" method="post">
                                                <input type="hidden" value="<?php echo $value->leave_id; ?>" name="leave_id">
                                                <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#009933"><i class="fa fa-check"></i> Approve</a>
                                            </form>
                                            <form action="<?php echo base_url();?>leave/leave_approval_hr_with_key/deny/<?php echo $value->leave_id;?>" method="post">
                                                <input type="hidden" value="<?php echo $value->leave_id; ?>" name="leave_id">
                                                <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> deny</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div role="tabpanel" class="tab-pane" id="denied">
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
                                <!-- <p class="text-muted font-13 m-b-30">
                                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                </p> -->
                                <table id="datatable-buttons2" class="table table-striped table-bordered responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee Name</th>
                                            <th>Designation</th>
                                            <th>Leave Date</th>
                                            <th>Leave Days</th>
                                            <th>Time of Denial</th>
                                            <th>Reason</th>
                                            <th>Address During Leave</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($denied_list as $value){?>
                                    <tr>
                                        <td><?php echo $value->employee_id; ?></td>
                                        <td><?php echo $value->employee_name; ?></td>
                                        <td><?php foreach($designation_list as $d_value){if($value->designation_id == $d_value->designation_id){echo $d_value->designation_name; }}?></td>
                                        <td><?php echo $value->start_date.' - '.$value->end_date; ?></td>
                                        <td><?php echo $value->leave_days; ?></td>
                                        <td><?php echo $value->hr_denial_timestamp; ?></td>
                                        <td><?php echo $value->reason_for_leave; ?></td>
                                        <td><?php echo $value->address_during_leave; ?></td>
                                        <td><?php foreach($leave_type_list as $lt_value){if($value->leave_type_id == $lt_value->leave_type_id){echo $lt_value->leave_type_name; }}?></td>

                                        <td>
                                            <form action="<?php echo base_url();?>leave/leave_approval_hr_with_key/approve/<?php echo $value->leave_id;?>" method="post">
                                                <input type="hidden" value="<?php echo $value->leave_id; ?>" name="leave_id">
                                                <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#009933"><i class="fa fa-check"></i> Approve</a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php }?>
                                </table>
                                </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
                
                <div role="tabpanel" class="tab-pane" id="approved">
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
                                <!-- <p class="text-muted font-13 m-b-30">
                                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                                </p> -->
                                <table id="datatable-buttons3" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Designation</th>
                                        <th>Leave Date</th>
                                        <th>Leave Days</th>
                                        <th>Time of Approval</th>
                                        <th>Reason</th>
                                        <th>Address During Leave</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <?php foreach($approved_list as $value){?>
                                    <tr>
                                        <td><?php echo $value->employee_id; ?></td>
                                        <td><?php echo $value->employee_name; ?></td>
                                        <td><?php foreach($designation_list as $d_value){if($value->designation_id == $d_value->designation_id){echo $d_value->designation_name; }}?></td>
                                        <td><?php echo $value->start_date.' - '.$value->end_date; ?></td>
                                        <td><?php echo $value->leave_days; ?></td>
                                        <td><?php echo $value->hr_approval_timestamp; ?></td>
                                        <td><?php echo $value->reason_for_leave; ?></td>
                                        <td><?php echo $value->address_during_leave; ?></td>
                                        <td><?php foreach($leave_type_list as $lt_value){if($value->leave_type_id == $lt_value->leave_type_id){echo $lt_value->leave_type_name; }}?></td>
                                    </tr>
                                <?php }?>
                                </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="clearfix"></div>
                <!-- </div> -->
            </div>
        </div>
    </div>
  </div>
</div>
</div>


