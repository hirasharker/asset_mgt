<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>pd <small></small></h3>
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
                <?php if(!isset($pd_detail)){?>
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



            <?php if(!isset($pd_detail)){?>
            
            <div class="x_content" style="display:none">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>pd/add_pd">

                <div class="x_title">
                <h2>Promotion & Demotion <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="employee_id" id="employee">
                      <option value="">Select</option>
                      <?php foreach($employee_list as $value){?>
                      <option value="<?php echo $value->employee_id; ?>" designationId = "<?php echo $value->current_designation_id; ?>" designationName = "<?php echo $value->designation_name; ?>"><?php echo $value->employee_id.'-'.$value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                
                <input type="hidden" id="current-designation-id" name="current_designation_id">


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input disabled type="text" class="form-control" placeholder="" name="current_designaiton_name" id="current-designation">
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Updated Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="updated_designation_id">
                      <?php foreach($designation_list as $d_value){?>
                      <option value="<?php echo $d_value->designation_id; ?>"><?php echo $d_value->designation_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Effective Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="effective_date" placeholder="Date" aria-describedby="inputSuccess2Status4">
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

            <?php }else{?>

            <div class="x_content" style="display:block">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>pd/update_pd">
                <input type="hidden" name="pd_id" value="<?php echo $pd_detail->pd_id; ?>">
                <div class="x_title">
                <h2>Promotion & Demotion <small></small></h2>
                  <div class="clearfix"></div>
                </div>


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="employee_id" id="employee">
                      <option value="">Select</option>
                      <?php foreach($employee_list as $value){?>
                      <option value="<?php echo $value->employee_id; ?>" designationId = "<?php echo $value->current_designation_id; ?>" designationName = "<?php echo $value->designation_name; ?>" 
                      <?php if($pd_detail->employee_id == $value->employee_id){ echo 'selected'; }?> ><?php echo $value->employee_id.'-'.$value->employee_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>

                
                <input type="hidden" id="current-designation-id" name="current_designation_id" value="<?php echo $pd_detail->current_designation_id; ?>" >


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input disabled type="text" class="form-control" placeholder="" name="current_designaiton_name" id="current-designation" value="<?php echo $pd_detail->designation_name; ?>" >
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Updated Designation </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" name="updated_designation_id">
                      <?php foreach($designation_list as $d_value){?>
                      <option value="<?php echo $d_value->designation_id; ?>" <?php if($d_value->designation_id == $pd_detail->updated_designation_id){ echo 'selected'; }?> ><?php echo $d_value->designation_name; ?></option>
                      <?php }?>
                      </select>
                  </div>
                </div>


                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Effective Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="effective_date" placeholder="Date" aria-describedby="inputSuccess2Status4" value="<?php echo $pd_detail->effective_date; ?>">
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

            <?php }?>





        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-5 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>pd List <small></small></h2>
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
                <th>Employee Name</th>
                <th>Previous Designation</th>
                <th>Updated Designation</th>
                <th>Status</th>
                <th>Effective From</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php $i=1; foreach($pd_list as $value){?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value->employee_name;?></td>
                <td>
                <?php foreach ($designation_list as $d_value) { if($d_value->designation_id == $value->current_designation_id){
                  echo $d_value->designation_name;
                }}
                ?>
                </td>
                <td>
                <?php foreach ($designation_list as $d_value) { if($d_value->designation_id == $value->updated_designation_id){
                  echo $d_value->designation_name;
                }}
                ?>
                </td>
                <td>
                <?php if($value->status == 1){
                  echo "Promoted!";
                  }else{
                  echo "Demoted!";
                    }?>
                </td>
                <td><?php echo $value->effective_date;?></td>
                <td>
                  <form action="<?php echo base_url(); ?>pd" method="post">
                      <input type="hidden" value="<?php echo $value->pd_id; ?>" name="pd_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>pd/delete_pd" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->pd_id; ?>" name="pd_id">
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
  $(function(){
    $("#employee").change(function(){ 
          var element = $(this).find('option:selected'); 
          var designationId = element.attr("designationId");
          var designationName = element.attr("designationName");
          
          $('#current-designation-id').val(designationId);
          $('#current-designation').val(designationName);

      });
  });
</script>