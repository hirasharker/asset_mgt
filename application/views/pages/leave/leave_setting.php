<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Leave Settings <small></small></h3>
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

    <?php if(!isset($leave_type_detail)){?>

        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Add Type of Leaves <i class="fa fa-plus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>leave/add_leave_type">

                <div class="x_title">
                <h2>Add Leave Type <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of leave </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="leave_type_name">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="status">
                      <option value="1" >Paid</option>
                      <option value="0" >Unpaid</option>
                      <option value="2" >Earned</option>
                      </select>
                  </div>
                </div>
                
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Range </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="limited" id="range">
                      <option value="0" >Limited</option>
                      <option value="1" >Unlimited</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Accumulative </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="accumulative" id="accumulative">
                      <option value="0" >No</option>
                      <option value="1" >Yes</option>
                      </select>
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Applicable For </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="employee_type" id="employeeType">
                      <option value="0" >Everyone</option>
                      <option value="1" >Temporary</option>
                      <option value="2" >Casual</option>
                      <option value="3" >Permanent</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Leave Quantity </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" name="leave_quantity" id="leaveQuantity" min="1">
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
                <li><a class="collapse-link">Edit leave type <i class="fa fa-minus"></i></a>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>leave/update_leave_type">

                <input type="hidden" name="leave_type_id" value="<?php echo $leave_type_detail->leave_type_id; ?>">
                <div class="x_title">
                <h2>Edit Leave Type <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type of leave </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="leave_type_name" value="<?php echo $leave_type_detail->leave_type_name; ?>">
                  </div>
                </div>
                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="status">
                      <option value="1" <?php if($leave_type_detail->status==1){echo 'selected';}?> >Paid</option>
                      <option value="0" <?php if($leave_type_detail->status==0){echo 'selected';}?> >Unpaid</option>
                      <option value="2" <?php if($leave_type_detail->status==2){echo 'selected';}?> >Earned</option>
                      </select>
                  </div>
                </div>
                

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Range </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="limited" id="range">
                      <option value="0" <?php if($leave_type_detail->limited==0){echo 'selected';}?> >Limited</option>
                      <option value="1" <?php if($leave_type_detail->limited==1){echo 'selected';}?> >Unlimited</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Accumulative </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="accumulative" id="accumulative" >
                      <option value="0" <?php if($leave_type_detail->accumulative==0){echo 'selected';}?> >No</option>
                      <option value="1" <?php if($leave_type_detail->accumulative==1){echo 'selected';}?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Applicable For </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" name="employee_type" id="employeeType">
                      <option value="0" <?php if($leave_type_detail->employee_type==0){echo 'selected';}?> >Everyone</option>
                      <option value="1" <?php if($leave_type_detail->employee_type==1){echo 'selected';}?> >Temporary</option>
                      <option value="2" <?php if($leave_type_detail->employee_type==2){echo 'selected';}?> >Casual</option>
                      <option value="3" <?php if($leave_type_detail->employee_type==3){echo 'selected';}?> >Permanent</option>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Leave Quantity </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" name="leave_quantity" value="<?php echo $leave_type_detail->leave_quantity; ?>" min="1" id="leaveQuantity">
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
          <h2>Type of Leaves <small></small></h2>
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
                <th>Type of Leaves</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Accumulative</th>
                <th>Eligible Type</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i=1; foreach($leave_type_list as $value){?>
              <tr>
                <td><?php echo $i; $i++?></td>
                <td><?php echo $value->leave_type_name; ?></td>
                <td><?php if($value->limited==0){echo $value->leave_quantity; } else { echo 'Unlimited';} ?></td>
                <td>
                  <?php
                    switch ($value->status) {
                      case '0':
                        echo 'Unpaid';
                        break;
                      case '1':
                        echo 'Paid';
                        break;
                      case '2':
                        echo 'Earned';
                        break;
                      default:
                        break;
                    }
                  ?>
                </td>
                <td>
                  <?php
                    switch ($value->accumulative) {
                      case '0':
                        echo 'No';
                        break;
                      case '1':
                        echo 'Yes';
                        break;
                      default:
                        break;
                    }
                  ?>
                </td>
                <td>
                  <?php
                    switch ($value->employee_type) {
                      case '0':
                        echo 'Everyone';
                        break;
                      case '1':
                        echo 'Temporary';
                        break;
                      case '2':
                        echo 'Casual';
                        break;
                      case '3':
                        echo 'Permanent';
                        break;
                      default:
                        break;
                    }
                  ?>
                </td>
                <td>
                  <form action="<?php echo base_url(); ?>leave/settings" method="post">
                      <input type="hidden" value="<?php echo $value->leave_type_id; ?>" name="leave_type_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>leave/delete_leave_type" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->leave_type_id; ?>" name="leave_type_id">
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
  $(function() { 

    $("#range").change(function(){ 
          if($("#range").val()==1){
            $("#accumulative").val("0").change();
            $("#accumulative").prop('disabled',true);
            $("#leaveQuantity").val("0").change();
            $("#leaveQuantity").val("0");
            $("#leaveQuantity").prop('disabled',true);

          }else{
            $("#accumulative").prop('disabled',false);
            $("#leaveQuantity").prop('disabled',false);
          }

      });
    if($("#range").val()==1){
        $("#accumulative").val("0").change();
        $("#accumulative").prop('disabled',true);
        $("#leaveQuantity").val("0").change();
        $("#leaveQuantity").html("&infin;").change();
        $("#leaveQuantity").val("0");
        $("#leaveQuantity").prop('disabled',true);

      }else{
        $("#accumulative").prop('disabled',false);
        $("#leaveQuantity").prop('disabled',false);
      }

  });
</script>