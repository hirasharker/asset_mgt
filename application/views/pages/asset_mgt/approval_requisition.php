<?php echo $approval_section; ?>

<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Requisition Approval - <?php echo $approval_section; ?><small></small></h3>
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
          <h2>Requisition List <small></small></h2>
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
                <th>Requisition ID</th>
                <th>Employee</th>
                <th>Department Head</th>
				<th>Requisition Date</th>
				<th>Item List</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($requisition_list as $value){?>
              <tr>
                <td><?php echo $value->requisition_id.'-'.$value->employee_id;?></td>
                <td><?php echo $value->employee_name; ?></td>
                <td><?php $d_value = explode("," ,  substr($value->department_head, 1, -1)); echo str_replace('"', '',  $d_value[0])?></td>

                <td><?php echo $value->requisition_date; ?></td>
                <td><?php echo $value->item_name; ?></td>
                <td><a href="<?php echo base_url();?>approval_requisition/approve_requisition/1/<?php echo $key; ?>/<?php echo $value->requisition_id; ?>" style="color:#005102"><i class="fa fa-check" aria-hidden="true" ></i>Approve</a> | <a href="<?php echo base_url();?>approval_requisition/decision/2/<?php echo $value->requisition_id; ?>" style="color:#f00"><i class="fa fa-times" aria-hidden="true" ></i>deny</a></td>
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