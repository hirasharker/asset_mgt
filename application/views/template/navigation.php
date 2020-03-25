<?php
    $group_permission               =   array();
    $item_permission                =   array();
    $inventory_report_permission    =   array();
    $vendor_permission              =   array();
    $purchase_invoice_permission    =   array();
    $payment_permission             =   array(); 
    $payable_permission             =   array();
    $customer_permission            =   array();
    $dealer_permission              =   array();
    $do_permission                  =   array();
    $sales_invoice_permission       =   array();
    $money_receipt_permission       =   array();
    $receivable_permission          =   array();
    $sales_report_permission        =   array();
    $backup_permission              =   array(); 
    $warehouse_slot_permission      =   array();
    $bank_permission                =   array();
    $warranty_claim_approval_1      =   array();
    $vat_tax_permission             =   array();
    foreach ($user_permission as $value) {
        if($value->module_id==16){
            $warehouse_permission = $value;
        }
        if($value->module_id==18){
            $warehouse_slot_permission = $value;
        }

        if($value->module_id==19){
            $dealer_permission = $value;
        }

        if($value->module_id==1){
            $group_permission = $value;
        }
        if($value->module_id==2){
            $item_permission = $value;
        }
        if($value->module_id==3){
            $inventory_report_permission = $value;
        }
        if($value->module_id==4){
            $vendor_permission = $value;
        }
        if($value->module_id==5){
            $purchase_invoice_permission = $value;
        }
        if($value->module_id==6){
            $payment_permission = $value;
        }
        if($value->module_id==7){
            $payable_permission = $value;
        }
        if($value->module_id==8){
            $customer_permission = $value;
        }
        if($value->module_id==9){
            $sales_invoice_permission = $value;
        }
        if($value->module_id==17){
            $warranty_claim_permission = $value;
        }

        if($value->module_id==10){
            $money_receipt_permission = $value;
        }

        if($value->module_id==20){
            $bank_permission = $value;
        }

        if($value->module_id==11){
            $receivable_permission = $value;
        }
        if($value->module_id==12){
            $sales_report_permission = $value;
        }
        if($value->module_id==15){
            $stock_transfer_permission = $value;
        }
        if($value->module_id==13){
            $backup_permission = $value;
        }

        if($value->module_id==21){
            $do_permission = $value;
        }
        if($value->module_id==22){
            $warranty_claim_approval_1 = $value;
        }
        if($value->module_id==23){
            $warranty_claim_approval_2 = $value;
        }
        if($value->module_id==24){
            $warranty_claim_approval_3 = $value;
        }
        if($value->module_id==25){
            $vat_tax_permission = $value;
        }

    }

?>




<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <li><a><i class="fa fa-calendar"></i> Asset Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>requisition">Requisition</a></li>
            <li><a href="<?php echo base_url();?>quotation">Quotation</a></li>
            <li><a href="<?php echo base_url();?>inventory/receive">Receive</a></li>
            <li><a href="<?php echo base_url();?>inventory/issue">Issue</a></li>
            <li><a>Approval Requisition<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="<?php echo base_url();?>approval_requisition/approval_requisition_head">Reporting Head</a>
                </li>
                <li><a href="<?php echo base_url();?>requisition/approval_it">It Department</a>
                </li>
                <li><a href="<?php echo base_url();?>requisition/approval_hr">HR Department</a>
                </li>
                <li><a href="<?php echo base_url();?>requisition/approval_accounts">Accounts Department</a>
                </li>
              </ul>
            </li>
            <li><a>Approval Quotation<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo base_url();?>quotation/approval_it">It Department</a>
                </li>
                <li><a href="<?php echo base_url();?>quotation/approval_accounts">Accounts Department</a>
                </li>
              </ul>
            </li>
        </ul>
        </li>

        <li><a><i class="fa fa-calendar"></i> Settings <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a>Asset Master <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="<?php echo base_url();?>vendor">Vendor</a>
                </li>
                <li><a href="<?php echo base_url();?>item_group">Product Group</a>
                </li>
                <li><a href="<?php echo base_url();?>item">Item</a>
                </li>
              </ul>
            </li>
        </ul>
        </li>
        
        
        <li><a><i class="fa fa-building-o"></i> Organization <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url();?>announcement/">Announcements</a></li>
            <li><a href="<?php echo base_url();?>organization">Organization Tree</a></li>
            <!-- <li><a href="<?php echo base_url();?>group">Groups</a></li> -->
            <li><a href="<?php echo base_url();?>employee">Employee</a></li>
            <li><a href="<?php echo base_url();?>branch">Branch</a></li>
            <li><a href="<?php echo base_url();?>department">Department</a></li>
            <li><a href="<?php echo base_url();?>designation">Designation</a></li>
            <li><a href="<?php echo base_url();?>company">Company</a></li>
            <li><a href="<?php echo base_url();?>transfer">Transfer</a></li>
            <li><a href="<?php echo base_url();?>company_policy">Company Policy</a></li>
        </ul>
        </li>
        
    </ul>
    </div>
</div>