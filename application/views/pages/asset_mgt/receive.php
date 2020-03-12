<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Receive <small></small></h3>
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
    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <!-- <h2>Add new Employees <small>click the plus icon to add new employee..</small></h2> -->
            <ul class="nav navbar-right panel_toolbox">
                <?php if(!isset($receive_detail)){?>
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



            <?php if(!isset($receive_detail)){?>
            <div class="x_content" style="display:block">
            <br />
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>inventory/add_receive">

                <div class="x_title">
                <h2>receive <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Receive Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="receive_date" placeholder="Date" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Item </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" id="item">
                          <option value="0">select</option>
                          <?php foreach($item_list as $value){ ?>
                          <option value="<?php echo $value->item_id;?>" itemId="<?php echo $value->item_id;?>" itemName="<?php echo $value->item_name ?>"><?php echo $value->item_name;?></option>
                          <?php } ?>
                      </select>
                    </div>
                </div>
                
                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12 col-md-offset-2">Item Name </label>
                    <input type="hidden" name="item_id">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <input type="number" class="form-control" placeholder="" name="quantity">
                    </div>
                    <a href="" class="col-lg-1 remove"><i class="fa fa-times fa-lg text-danger" aria-hidden="true"></i></a>
                  </div>
                </div> -->
                


                <div class="col-md-12 col-sm-12 col-xs-12" id="create">
                    <input type="hidden" id="count" value="0" name="count">
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12" id="item-summary">
                                
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
            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>receive/update_receive">

                <div class="x_title">
                <h2>receive <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Employee </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control select-tag" name="employee_id">
                        <option value="0">Select</option>
                        <?php foreach($employee_list as $value){?>
                        <option value="<?php echo $value->employee_id; ?>"><?php echo $value->employee_name; ?></option>
                        <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Date </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" class="form-control has-feedback-left" id="single_cal4" name="receive_date" placeholder="Date" aria-describedby="inputSuccess2Status4">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Item </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control select-tag" id="item">
                          <option value="0">select</option>
                          <?php foreach($item_list as $value){ ?>
                          <option itemName="<?php echo $value->item_name ?>"><?php echo $value->item_name ?></option>
                          <?php } ?>
                      </select>
                    </div>
                </div>
                
                <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-4 col-sm-4 col-xs-12 col-md-offset-2">Item Name </label>
                    <input type="hidden" name="item_id">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <input type="number" class="form-control" placeholder="" name="quantity">
                    </div>
                    <a href="" class="col-lg-1 remove"><i class="fa fa-times fa-lg text-danger" aria-hidden="true"></i></a>
                  </div>
                </div> -->
                


                <div class="col-md-12 col-sm-12 col-xs-12" id="create">
                    <input type="hidden" id="count" value="0" name="count">
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12" id="item-summary">
                                
                </div>




                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Comment <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea class="form-control" rows="3" placeholder='' name="comment"></textarea>
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
            <?php }?>





        </div>
        </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>receive List <small></small></h2>
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
                <th>Received ID</th>
                <th>Item</th>
                <th>receive Date</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach($receive_list as $value){?>
              <tr>
                <td><?php echo $value->receive_id;?></td>
                <td><?php echo $value->item_name;?></td>
                <td><?php echo $value->receive_date;?></td>
                <td>edit | delete</td>
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

<script type="text/javascript">
  $( "#item" ).change(function(){
    // alert( "Handler for .change() called."+this.value);
    // var itemName = $('#item option:selected').text();
    var element = $(this).find('option:selected');
    var itemName = element.attr("itemName");

    count = document.getElementById('count').value;


    var val = $('#item option:selected').val();
        if(val!=0){
          count++;
          var code = '<div class="form-group col-md-12 col-sm-12 col-xs-12">'
          +'<label class="control-label col-md-3 col-sm-3 col-xs-12">'+itemName+' </label>'
          +'<input type="hidden" name="item_id[]" value="'+val+'">'
          +'<div class="col-md-3 col-sm-3 col-xs-12">'
              +'<select class="form-control select-tag" name="vendor_id[]">'
              +'<option value="0">Select Vendor</option>'
              +'<?php foreach($vendor_list as $value){?>'
              +'<option value="<?php echo $value->vendor_id; ?>"><?php echo $value->vendor_name; ?></option>'
              +'<?php }?>'
              +'</select>'
          +'</div>'
          +'<div class="col-md-3 col-sm-3 col-xs-12">'
              +'<input type="text" class="form-control" placeholder="SN" name="serial_no[]">'
          +'</div>'
          +'<div class="col-md-2 col-sm-3 col-xs-12">'
              +'<input type="number" class="form-control" placeholder="quantity" name="quantity[]">'
          +'</div>'
          +'<a href="" class="col-lg-1 remove"><i class="fa fa-times fa-lg text-danger" aria-hidden="true"></i></a>'
          +'</div>';

          if(this.value != 0){
               $('#create').append(code);
                  document.getElementById('count').value = count;
          }

          $("#item option[value='"+this.value+"']").remove();
        }
    
  }); //item.change..............
</script>