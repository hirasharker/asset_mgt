<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Generate Salary <small></small></h3>
    </div>

    <div class="title_right">
      
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="clearfix"></div>
            </div>
            <div class="x_content" style="height:auto">
            <br />
           <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>salary/test/" enctype='multipart/form-data'>
            <!-- <form class="form-horizontal form-label-left" method="post"  enctype='multipart/form-data'> -->

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Company </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <select id="companyId" class="form-control select-tag" name="company_id">
                        <!-- <option value="">Any</option> -->
                        <?php foreach($company_list as $value){?> 
                        <option value="<?php echo $value->company_id; ?>"><?php echo $value->company_name;?></option>
                        <?php }?>
                      </select>
                  </div>
                </div>

                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Salary Month</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input id="date" type="text" class="form-control form-control-1 input-sm month" placeholder="Click here to select salary month" name="salary_month" >
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button class="btn btn-primary" type="reset" id="reset">Reset</button>
                    <button id="generate" class="btn btn-success">Generate</button>
                    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                </div>
              </form>
                
                
                <div class="clearfix"></div>
                <br />
            <!-- </form> -->
            </div>
        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Employee List <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content"  >
          <!-- <p class="text-muted font-13 m-b-30">
            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
          </p> -->
          <table id="datatable-buttons" class="table table-striped table-bordered" >
            <thead>
              <tr>
                <th>SN</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Basic</th>
                <th>House Rent</th>
                <th>Conveyance</th>
                <th>Medical</th>
                <th>Increment</th>
                <th>Compensation</th>
                <th>Incentive</th>
                <th>TDS</th>
                <!-- <th>Advance</th> -->
                <th>LWP</th>
                <th>Late</th>
                <th>Early</th>
                <th>Others</th>
                <th>PF</th>
                <th>Net Salary</th>
              </tr>
              </thead>
              <tbody id="report-view">
              <?php if(isset($monthly_salary_list)){ $i = 1; 
                      foreach($monthly_salary_list as $value){?>
                <tr>
                  <td><?php echo $i; $i++; ?></td>
                  <td><?php echo $value->employee_id; ?></td>     
                  <td><?php echo $value->employee_name; ?></td>
                  <td><?php echo round($value->basic_salary,2); ?></td>
                  <td><?php echo round($value->houserent, 2); ?></td>
                  <td><?php echo round($value->conveyance, 2); ?></td>
                  <td><?php echo round($value->medical, 2); ?></td>
                  <td><?php echo round($value->increment, 2); ?></td>
                  <td><?php echo round($value->compensation, 2); ?></td>
                  <td><?php echo round($value->incentive, 2); ?></td>
                  <td><?php echo round($value->tds, 2); ?></td>
                  <!-- <td><?php echo round($value->advance, 2); ?></td> -->
                  <td><?php echo round($value->leave_without_pay, 2); ?></td>
                  <td><?php echo round($value->late_fine, 2); ?></td>
                  <td><?php echo round($value->early_fine, 2); ?></td>
                  <td><?php echo round($value->deduction, 2); ?></td>
                  <td><?php echo round($value->pf, 2); ?></td>
                  <td><?php echo round($value->net_payment, 2); ?></td>
                </tr>
              <?php } } ?>
              </tbody>
          </table>
          
        </div>
      </div>
      </div>
  </div>
</div>
</div>

<script type="text/javascript">
   $(function() { 
      var startDate = new Date();
      var fechaFin = new Date();
      var FromEndDate = new Date();
      var ToEndDate = new Date();




      $('.month').datepicker({
          autoclose: true,
          minViewMode: 1,
          format: 'yyyy-mm-dd'
      }).on('changeDate', function(selected){
              startDate = new Date(selected.date.valueOf());
              startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
              $('.to').datepicker('setStartDate', startDate);
          }); 
    });
</script>