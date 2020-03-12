
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>user <small></small></h3>
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
          <h2>user List <small></small></h2>
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
                <th>Name</th>
                <th>User Name / Email ID</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($user_list as $value){?>
              <tr>
                <td><?php echo $value->employee_name;?></td>

                <td><?php echo $value->email_id;?></td>
                
                <td><a href="<?php echo base_url();?>user/edit_user/<?php echo $value->employee_id; ?>" style="color:#005102"><i class="fa fa-check" aria-hidden="true" ></i>edit</a> | <a href="<?php echo base_url();?>user/delete_user/<?php echo $value->employee_id; ?>"style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i>delete</a></td>
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



<form role="form" method="post" action="<?php echo base_url();?>user/add_user">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" placeholder = "User Name" name="user_name" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder = "Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" class="form-control" placeholder = "Email Address" name="email_address">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" placeholder = "Phone no" name="phone_no">
                            </div>
                            <div class="form-group">
                                <label>Select Type</label>
                                <select class="form-control" name="user_type">
                                    <option value="1">Administrator</option>
                                    <option value="2">Standard</option>
                                    <option value="3">Guest</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>