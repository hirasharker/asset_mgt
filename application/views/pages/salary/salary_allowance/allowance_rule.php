<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Allowance Rules<small></small></h3>
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
    <div class="col-md-5 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <?php if(!isset($allowance_rule_detail)){?>
                <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a>
                </li>
                <?php } else {?>
                <li><a class="collapse-link">Edit <i class="fa fa-minus"></i></a>
                </li>
                <?php }?>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>



            <?php if(!isset($allowance_rule_detail)){?>
            <div class="x_content" style="display:none">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>salary/add_allowance_rule">
            <!-- <form class="form-horizontal form-label-left" method="get" action="#"> -->

                <div class="x_title">
                <h3>Set Rules for Salary Allowance <small></small></h3>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Allowance </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="salary_allowance_id" id="salaryAllowanceId">
                        <?php foreach($salary_allowance_list as $value){?>
                        <option value="<?php echo $value->salary_allowance_id; ?>"><?php echo $value->salary_allowance_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Calculation Mode </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="calc_mode" id="calcMode">
                          <option value="0">Percentage</option>
                          <option value="1">Fixed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" step=".000001" class="form-control" placeholder="%" min="0" name="allowance_percentage" id="allowancePercentage" required>
                      <input type="number" step=".000001" class="form-control" placeholder="$" min="0" name="allowance_amount" id="allowanceAmount" style="display:none">
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Salary </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="min_salary" required>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum Salary </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="max_salary" required>
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="minAllowance">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Allowance </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="min_allowance" id="minAllowanceInput" required>
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="maxAllowance">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum Allowance </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="max_allowance" id="maxAllowanceInput" required>
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

            <?php }else{?>

            <div class="x_content" style="display:block">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>salary/update_allowance_rule">
                <input type="hidden" name="allowance_rule_id" value="<?php echo $allowance_rule_detail->allowance_rule_id; ?>">
                <div class="x_title">
                <h2>Salary Allowance <small></small></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Allowance </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="salary_allowance_id" id="salaryAllowanceId">
                        <?php foreach($salary_allowance_list as $value){?>
                        <option value="<?php echo $value->salary_allowance_id; ?>" <?php if($allowance_rule_detail->salary_allowance_id==$value->salary_allowance_id){echo 'selected';}?> ><?php echo $value->salary_allowance_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Calculation Mode </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="calc_mode" id="calcMode">
                          <option value="0" <?php if($allowance_rule_detail->calc_mode==0){echo 'selected';}?> >Percentage</option>
                          <option value="1" <?php if($allowance_rule_detail->calc_mode==1){echo 'selected';}?> >Fixed</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" step=".000001" class="form-control" placeholder="%" min="0" name="allowance_percentage" id="allowancePercentage" required value="<?php echo $allowance_rule_detail->allowance_percentage; ?>" <?php if($allowance_rule_detail->calc_mode!=0){?> style="display:none" <?php }?> >
                      <input type="number" step=".000001" class="form-control" placeholder="$" min="0" name="allowance_amount" id="allowanceAmount" value="<?php echo $allowance_rule_detail->allowance_amount; ?>" <?php if($allowance_rule_detail->calc_mode!=1){?> style="display:none" <?php }?> >
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Salary </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="min_salary" required value="<?php echo $allowance_rule_detail->min_salary; ?>">
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum Salary </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="max_salary" required value="<?php echo $allowance_rule_detail->max_salary; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="minAllowance" <?php if($allowance_rule_detail->calc_mode!=0){?> style="display:none" <?php }?> >
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Minimum Allowance </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="min_allowance" id="minAllowanceInput" required value="<?php echo $allowance_rule_detail->min_allowance; ?>" >
                  </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12" id="maxAllowance" <?php if($allowance_rule_detail->calc_mode!=0){?> style="display:none" <?php }?>>
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Maximum Allowance </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="number" class="form-control" placeholder="" min="0" name="max_allowance" id="maxAllowanceInput" required value="<?php echo $allowance_rule_detail->max_allowance; ?>" >
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
            <?php }?>





        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-5 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Allowance List <small></small></h2>
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
                <th>Allowance</th>
                <th>Mode</th>
                <th>Amount</th>
                <th>Salary Range</th>
                <th>Allowance Range</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($allowance_rule_list as $value){?>
              <tr>
                <td>
                <?php
                   foreach($salary_allowance_list as $sa_value){if($sa_value->salary_allowance_id==$value->salary_allowance_id){
                    echo $sa_value->salary_allowance_name;
                  }}?>
                </td>
                <td><?php if($value->calc_mode==0){echo 'Percentage';}else{echo 'Fixed';}?></td>
                <td><?php if($value->calc_mode==0){echo $value->allowance_percentage.'%';}else {echo $value->allowance_amount.' $';} ?></td>
                <td><?php echo $value->min_salary.' - '.$value->max_salary; ?></td>
                <td><?php echo $value->min_allowance.' - '.$value->max_allowance; ?></td>
                <td>
                  <form action="<?php echo base_url();?>salary/allowance_rule/" method="post">
                      <input type="hidden" value="<?php echo $value->allowance_rule_id; ?>" name="allowance_rule_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url();?>salary/delete_allowance_rule/" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->allowance_rule_id; ?>" name="allowance_rule_id">
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

    $("#calcMode").change(function(){ 
          if($("#calcMode").val()=='0'){
            $("#allowancePercentage").css("display", "block");
            $("#allowancePercentage").prop('required',true);


            $("#minAllowance").css("display", "block");
            $("#maxAllowance").css("display", "block");
            $("#minAllowanceInput").prop('required',true);
            $("#maxAllowanceInput").prop('required',true);

            $("#allowanceAmount").val('');
            $("#allowanceAmount").prop('required',false);
            $("#allowanceAmount").css("display", "none");
          }else{
            $("#allowanceAmount").css("display", "block");
            $("#allowanceAmount").prop('required',true);

            $("#allowancePercentage").val('');
            $("#allowancePercentage").css("display", "none");
            $("#allowancePercentage").prop('required',false);

            $("#minAllowanceInput").val('');
            $("#minAllowance").css("display", "none");
            $("#maxAllowanceInput").val('');
            $("#maxAllowance").css("display", "none");
            $("#minAllowanceInput").prop('required',false);
            $("#maxAllowanceInput").prop('required',false);
          }

      });

  });
</script>