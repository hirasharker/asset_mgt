<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Company <small></small></h3>
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
                <?php if(!isset($company_detail)){?>
                <li><a class="collapse-link">Add New <i class="fa fa-plus"></i></a>
                </li>
                <?php } else {?>
                <li><a class="collapse-link">Edit <?php echo $company_detail->company_name; ?> <i class="fa fa-minus"></i></a>
                </li>
                <?php }?>
                <li class="dropdown">
                </li>
                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
            </ul>
              <div class="clearfix"></div>
            </div>



            <?php if(!isset($company_detail)){?>
            <div class="x_content" style="display:none">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>company/add_company">

                <div class="x_title">
                <h2>company <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">company Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="company_name">
                  </div>
                </div>

                

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea name="company_description" class="form-control"></textarea>
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>company/update_company">
                <input type="hidden" value="<?php echo $company_detail->company_id?>" name="company_id"/>
                <div class="x_title">
                <h2>company <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">company Name </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" placeholder="" name="company_name" value="<?php echo $company_detail->company_name?>" >
                  </div>
                </div>
                

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea name="company_description" class="form-control"><?php echo $company_detail->company_description?></textarea>
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
          <h2>company List <small></small></h2>
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
                <th>Company Name</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($company_list as $value){?>
              <tr>
                <td><?php echo $value->company_name;?></td>
                <td><?php echo $value->company_description;?></td>
                <td>
                  <form action="<?php echo base_url(); ?>company" method="post">
                      <input type="hidden" value="<?php echo $value->company_id; ?>" name="company_id">
                      <a onclick='this.parentNode.submit(); return false;' href="#"><i class="fa fa-edit"></i> edit</a>
                  </form>
                  <form action="<?php echo base_url(); ?>company/delete_company" target="_blank" method="post">
                      <input type="hidden" value="<?php echo $value->company_id; ?>" name="company_id">
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