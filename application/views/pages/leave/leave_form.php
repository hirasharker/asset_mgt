<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application For Leave</title>
<link href="<?php echo base_url();?>build/css/leave_form.css" rel="stylesheet" media="print">
<!-- jQuery -->
<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
</head>


<body>
<script>
    $( document ).ready(function() {
        window.print();
        setTimeout(myFunction, 3000);
        function myFunction() {
            alert("Print Timeout!!!")
            window.close();
        }
    });
</script>

<div class="print-container" style="page-break-after: always;">
	<div class="header">
        <div class="banner">
            <div class="logo">
                <img src="<?php echo base_url()?>images/img.jpg">
            </div>
            <div class="title">
                <h1 class="compnay-name">IFAD AUTOS LIMITED</h1>
                <!-- <p class="address1">Registered Office : Vill: Narsingpur, PS: Ashulia, Upzilla: Savar, Dist: Dhaka. Vat Registration no: 017151004202</p> -->
                <p class="address2">Corporate Office : Sonartori Tower (13th - 18th floor), 12 Biponon C/A, Sonargaon Road, Dhaka. Tel # 9632753-7,</p>
                <p class="address3">Fax: 880-2-9632765, E-mail : contact@ifadgroup.com</p>
            </div>
        </div><!-- banner -->

        <h2 class="page-title"><ul>Application For Leave</ul></h2>
    </div>
    <div class="clearfix"></div>
    <div class="content">
        <div class="row">
            <div class="left-content">
                <label><strong>DATE</strong></label>
                <p><?php $s = strtotime($leave_detail->creation_time); $date = date('d/m/Y', $s); echo $date; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="left-content">
                <label><strong>EMPLOYEE ID:</strong></label>
                <p><?php echo $employee_detail->employee_id; ?></p>
            </div>
            <div class="right-content">
                <label><strong>NAME: </strong></label>
                <p><?php echo $employee_detail->employee_name; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="left-content">
                <label><strong>DESIGNATION:</strong></label>
                <p><?php foreach($designation_list as $dsg_value){if($dsg_value->designation_id==$employee_detail->designation_id){echo $dsg_value->designation_name; }} ?></p>
            </div>
            <div class="right-content">
                <label><strong>DEPARTMENT: </strong></label>
                <p><?php foreach($department_list as $dept_value){if($dept_value->department_id==$employee_detail->department_id){echo $dept_value->department_name; }} ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col4">
                <label class="col6"><strong>LEAVE DAYS:</strong></label>
                <p class="col2"><?php echo $leave_detail->leave_days; ?></p>
                <label class="col2"><strong>DAYS</strong></label>
            </div>
            <div class="col3">
                <label class="col4"><strong>From:</strong></label>
                <p class="col6"><?php echo $leave_detail->start_date; ?></p>
            </div>
            <div class="col3">
                <label class="col4"><strong>To:</strong></label>
                <p class="col6"><?php echo $leave_detail->end_date; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="left-content">
                <label><strong>TYPE OF LEAVE:</strong></label>
                <p><?php foreach($leave_type_list as $lt_value){if($lt_value->leave_type_id==$leave_detail->leave_type_id){echo $lt_value->leave_type_name; }} ?></p>
            </div>
            <div class="right-content">
                <label><strong>REASON: </strong></label>
                <p><?php echo $leave_detail->reason_for_leave; ?></p>
            </div>
        </div>
        <div class="row">
            <table border="1">
                <thead>
                    <tr>
                        <th align="left">Type of Leave</th>
                        <th>Yearly Leave</th>
                        <th>Applied Leave</th>
                        <th>Approved Leave</th>
                        <th>Balance</th>    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Casual Leave</td>
                        <td align="center">10</td>
                        <td align="center">6</td>
                        <td align="center">3</td>
                        <td align="center">7</td>
                    </tr>
                    <tr>
                        <td>Earned Leave</td>
                        <td align="center">3</td>
                        <td align="center">1</td>
                        <td align="center">1</td>
                        <td align="center">2</td>
                    </tr>
                    <tr>
                        <td>Maternity Leave</td>
                        <td align="center">60</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td>Special Leave</td>
                        <td align="center">10</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                        <td align="center">0</td>
                    </tr>
                    <tr>
                        <td><strong>Address During Leave</strong></td>
                        <td colspan="4">Tongi, Gazipur.</td>
                    </tr>    
                </tbody>
            </table>
        </div>
        <div class="row" style="margin-top: 1in;">
            <div class="col5">
                <div class="col6" style="border-top: 1px solid #000">
                    <p style="margin: 0; text-align: center">Signature of Applicant</p>
                </div>    
            </div>
            <div class="col5">
                <div class="col6" style="border-top: 1px solid #000;float:right !important;">
                    <p style="margin: 0; text-align: center">Date</p>
                </div>    
            </div>
        </div>
        <div class="row">
            <table>
                <tr>
                    <td colspan="2" style="border-bottom:  0 !important; padding-bottom:.5in;"><strong>RECOMMENDATION</strong></td>
                    <td colspan="2" style="border-bottom:  0 !important; padding-bottom:.5in;"><strong>APPROVAL</strong></td>
                </tr>
                <tr>
                    <td style="border-right:  0 !important; border-top:  0 !important;" align="center"><p style="border-top: 1px solid #000; width: 80% !important"><strong>Head of Department</strong></p></td>
                    <td style="border-left:  0 !important; border-top:  0 !important"><p style="border-top: 1px solid #000; width: 80% !important"><strong>Date</strong></p></td>
                    <td style="border-right:  0 !important; border-top:  0 !important"><p style="border-top: 1px solid #000; width: 80% !important">Authorized Person</p></td>
                    <td style="border-left:  0 !important; border-top:  0 !important"><p style="border-top: 1px solid #000; width: 80% !important">Date</p></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
    
</div>


</body>
</html>
