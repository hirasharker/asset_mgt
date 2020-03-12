<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Department <small></small></h3>
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
                <?php if(!isset($department_detail)){?>
                <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a>
                </li>
                <?php } else {?>
                <li><a class="collapse-link">Edit <?php echo $department_detail->department_name; ?> <i class="fa fa-minus"></i></a>
                </li>
                <?php }?>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>



            <?php if(!isset($department_detail)){?>
            <div class="x_content" style="display:none">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>department/add_department">

                <div class="x_title">
                <h2>Department <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="department_name">
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Head </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="department_head_id">
                        <option value="">Select Department Head</option>
                        <?php foreach($employee_list as $value){?>
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Department </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="parent_department_id">
                        <option value="">Select Parent Department</option>
                        <?php foreach($department_list as $value){?>
                        <option value="<?php echo $value->department_id; ?>"><?php echo $value->department_name; ?></option>
                        <?php }?>
                        </select>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>department/update_department">
                <input type="hidden" name="department_id" value="<?php echo $department_detail->department_id; ?>">
                <div class="x_title">
                <h2>Department <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="department_name" value="<?php echo $department_detail->department_name;?>">
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Department Head </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="department_head_id">
                        <option value="">Select Department Head</option>
                        <?php foreach($employee_list as $value){?>
                        <option value="<?php echo $value->employee_id; ?>" <?php if($value->employee_id==$department_detail->department_head_id){echo 'selected';}?> ><?php echo $value->employee_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Department </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="parent_department_id">
                        <option value="">Select Parent Department</option>
                        <?php foreach($department_list as $value){?>
                        <option value="<?php echo $value->department_id; ?>" <?php if($value->department_id==$department_detail->parent_department_id){echo 'selected';}?>><?php echo $value->department_name; ?></option>
                        <?php }?>
                        </select>
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
          <h2>Department List <small></small></h2>
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
                <th>Department Name</th>
                <th>Department Head</th>
                <th>Parent Department</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($department_list as $value){?>
              <tr>
                <td><?php echo $value->department_name;?></td>
                <td><?php 
                foreach($employee_list as $e_value){if($e_value->employee_id==$value->department_head_id){
                  echo $e_value->employee_name;
                }}
                ?></td>
                <td>
                <?php
                  foreach($department_list as $d_value){if($d_value->department_id==$value->parent_department_id){
                    echo $d_value->department_name;
                  }}
                ?>
                </td>
                <td><a href="<?php echo base_url();?>department/edit_department/<?php echo $value->department_id; ?>" style="color:#005102"><i class="fa fa-check" aria-hidden="true" ></i>edit</a> | <a href="<?php echo base_url();?>department/delete_department/<?php echo $value->department_id; ?>"style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i>delete</a></td>
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