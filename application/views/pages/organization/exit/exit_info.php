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

          <?php if(!isset($exit_detail)){?>

          <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>exit_info/add_exit_info/" enctype='multipart/form-data'>
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
                <h3>Discontinuation Info <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Employee </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="employee_id">
                      <?php foreach($employee_list as $e_value){ if($e_value->employee_id != 0){?>
                      <option value="<?php echo $e_value->employee_id; ?>"><?php echo $e_value->employee_id.' - '.$e_value->employee_name; ?></option>
                      <?php } }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Interviewer </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select Interviewer" name="interviewer_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>"><?php echo $e_value->employee_id.' - '.$e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Reason for discontinuation </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="reason">
                        <option value="1">Better Job Oppurtunity</option>
                        <option value="2">Termination</option>
                        <option value="3">Dessertion</option>
                        <option value="4">Death</option>
                        <option value="5">Retired</option>
                        <option value="6">Health</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Effective from </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="exit_date" placeholder="Exit Date" aria-describedby="inputSuccess2Status4">
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
                <div class="x_title">
                <h3>Questionare <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Working for this organization again? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="join_again">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Any comment for the welfare of this organization? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="comment"></textarea>
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                <h3>Checklist <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Handover Vehicle? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="vehicle_handover">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Handover Office Equipments? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="equipment_handover">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Maintain notice period? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="maintain_notice_period">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Resign letter submitted? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="resign_letter_submitted">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Exit Interview Taken? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="exit_interview">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Reporting Head Clearence? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="reporting_head_clearence">
                      <option value="0">No</option>
                      <option value="1">Yes</option>
                      </select>
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






            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>exit_info/update_exit_info/" enctype='multipart/form-data'>

            <input type="hidden" name="exit_id" value="<?php echo $exit_detail->exit_id; ?>" />

            <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link">Edit <i class="fa fa-minus"></i></a>
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
                <h3>Discontinuation Info <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Employee </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select an Employee" name="employee_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>" <?php if($exit_detail->employee_id==$e_value->employee_id){echo 'selected'; }?> ><?php echo $e_value->employee_id.' - '.$e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Interviewer </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control select-tag" placeholder="Select Interviewer" name="interviewer_id">
                      <?php foreach($employee_list as $e_value){?>
                      <option value="<?php echo $e_value->employee_id; ?>" <?php if($exit_detail->interviewer_id==$e_value->employee_id){echo 'selected'; }?> ><?php echo $e_value->employee_id.' - '.$e_value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Reason for discontinuation </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="reason">
                        <option value="1" <?php if($exit_detail->reason==1){echo 'selected'; }?> >Better Job Oppurtunity</option>
                        <option value="2" <?php if($exit_detail->reason==2){echo 'selected'; }?> >Termination</option>
                        <option value="3" <?php if($exit_detail->reason==3){echo 'selected'; }?> >Dessertion</option>
                        <option value="4" <?php if($exit_detail->reason==4){echo 'selected'; }?> >Death</option>
                        <option value="5" <?php if($exit_detail->reason==5){echo 'selected'; }?> >Retired</option>
                        <option value="6" <?php if($exit_detail->reason==6){echo 'selected'; }?> >Health</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Effective from </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="exit_date" placeholder="Exit Date" aria-describedby="inputSuccess2Status4" value="<?php echo $exit_detail->exit_date; ?>">
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
                <div class="x_title">
                <h3>Questionare <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Working for this organization again? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="join_again">
                      <option value="0" <?php if($exit_detail->join_again==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->join_again==1){echo 'selected'; }?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Any comment for the welfare of this organization? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="comment"><?php echo $exit_detail->comment; ?></textarea>
                  </div>
                </div>

                <div class="clearfix"></div>
                <br />


                <div class="x_title">
                <h3>Checklist <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Handover Vehicle? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="vehicle_handover">
                      <option value="0" <?php if($exit_detail->vehicle_handover==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->vehicle_handover==1){echo 'selected'; }?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Handover Office Equipments? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="equipment_handover">
                      <option value="0" <?php if($exit_detail->equipment_handover==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->equipment_handover==1){echo 'selected'; }?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Maintain notice period? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="maintain_notice_period">
                      <option value="0" <?php if($exit_detail->maintain_notice_period==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->maintain_notice_period==1){echo 'selected'; }?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Resign letter submitted? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="resign_letter_submitted">
                      <option value="0" <?php if($exit_detail->resign_letter_submitted==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->resign_letter_submitted==1){echo 'selected'; }?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Exit Interview Taken? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="exit_interview">
                      <option value="0" <?php if($exit_detail->exit_interview==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->exit_interview==1){echo 'selected'; }?> >Yes</option>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-6 col-sm-6 col-xs-12">Reporting Head Clearence? </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="reporting_head_clearence">
                      <option value="0" <?php if($exit_detail->reporting_head_clearence==0){echo 'selected'; }?> >No</option>
                      <option value="1" <?php if($exit_detail->reporting_head_clearence==1){echo 'selected'; }?> >Yes</option>
                      </select>
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



            

            <?php } ?>  
                

            </div>
        </div>
      </div>
  

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>List of Discontinued Employees <small></small></h2>
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
                <th>ID</th>
                <th>Name</th>
                <th>Reason</th>
                <th>Exit Interview</th>
                <th>Clearence of Reporting Head</th>
                <th>Maintain Notice Period</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach($exit_list as $value){?>
              <tr>
                <td><?php echo $i; $i++;?></td>
                <td><?php echo $value->employee_id; ?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php
                    switch ($value->reason) {
                      case '1':
                        echo 'Better Job Oppurtunity';
                        break;
                      
                      case '1':
                        echo 'Termination';
                        break;

                      case '3':
                        echo 'Dessertion';
                        break;

                      case '4':
                        echo 'Death';
                        break;

                      case '5':
                        echo 'Retired';
                        break;

                      case '6':
                        echo 'Health';
                        break;

                      default:
                        break;
                    }
                ?></td>
                <td><?php
                    switch ($value->exit_interview) {
                      case '1':
                        echo 'Yes';
                        break;
                      
                      case '0':
                        echo 'No';
                        break;

                      default:
                        break;
                    }
                ?></td>
                <td><?php
                    switch ($value->reporting_head_clearence) {
                      case '1':
                        echo 'Yes';
                        break;
                      
                      case '0':
                        echo 'No';
                        break;

                      default:
                        break;
                    }
                ?></td>
                <td><?php
                    switch ($value->maintain_notice_period) {
                      case '1':
                        echo 'Yes';
                        break;
                      
                      case '0':
                        echo 'No';
                        break;

                      default:
                        break;
                    }
                ?></td>
                <td>
                  <form action="<?php echo base_url(); ?>exit_info" method="post">
                      <input type="hidden" value="<?php echo $value->exit_id; ?>" name="exit_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>employee/delete_exit_info" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->exit_id; ?>" name="exit_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#" style="color:#f00"><i class="fa fa-times"></i> delete</a>
                  </form>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
  </div>
  </div>
</div>