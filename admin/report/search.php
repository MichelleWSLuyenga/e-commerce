<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	include('../../connect.php');
	
	session_start();
	
	$user = $_COOKIE['user'];

	$sql_user =	" SELECT * FROM admin_reseller WHERE reseller_username = '$user' ";
	$query_user = mysql_query($sql_user) or die("Can't Query");
	$row_user = mysql_fetch_array($query_user);
	$id = $row_user['id'];
	$name = $row_user['reseller_username'];
	$company = $row_user['reseller_company'];

	if($user == ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../'); exit(); }
	else if($user != $name){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../'); exit(); }
	
	$report = $_POST["report"];
	$reseller = $row_user['reseller_company'];
	$start_date = $_POST["start_date"];
	$end_date = $_POST["end_date"];
?>
<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
<meta charset="utf-8">
<title>RESELLER ONLINE | Admin</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--begin::Base Styles -->
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script> WebFont.load({
	google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
	active: function() {
		 sessionStorage.fonts = true;
		 }
		 });
</script>
<link href="../css/vendors.bundle.css" rel="stylesheet" type="text/css">
<link href="../css/style.bundle.css" rel="stylesheet" type="text/css">
<link href="../css/datatables.bundle.css" rel="stylesheet" type="text/css">
<!--end::Base Styles -->
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<style type="text/css">
#printable {
	display: block;
}

@media print {
#non-printable {
	display: none;
}
#printable {
	display: block;
}
}
</style>
<link rel="shortcut icon" href="../images/favicon.ico">
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<?
	function DateEng($strDate)
	{
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		$strMonthEng=$strMonthCut[$strMonth];
		return "$strDay $strMonthEng $strYear";
	}
?>
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page"> 
  <!-- BEGIN: Header -->
  <header id="m_header" class="m-grid__item m-header" m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
      <div class="m-stack m-stack--ver m-stack--desktop"> 
        <!-- BEGIN: Brand -->
        <div class="m-stack__item m-brand m-brand--skin-dark">
          <div class="m-stack m-stack--ver m-stack--general">
            <div class="m-stack__item m-stack__item--middle m-brand__tools"> 
              <!-- BEGIN: Left Aside Minimize Toggle --> 
              <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block"> <span></span> </a> 
              <!-- END --> 
              <!-- BEGIN: Responsive Aside Left Menu Toggler --> 
              <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block"> <span></span> </a> 
              <!-- END --> 
              <!-- BEGIN: Responsive Header Menu Toggler --> 
              <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block"> <span></span> </a> 
              <!-- END --> 
              <!-- BEGIN: Topbar Toggler --> 
              <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block"> <i class="flaticon-more"></i> </a> 
              <!-- BEGIN: Topbar Toggler --> 
            </div>
          </div>
        </div>
        <!-- END: Brand --> 
        <!-- BEGIN: Topbar -->
        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
          <div class="m-stack__item m-topbar__nav-wrapper">
            <ul class="m-topbar__nav m-nav m-nav--inline">
              <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click"> <a href="#" class="m-nav__link m-dropdown__toggle"> <span class="m-topbar__userpic"> <img src="../images/icon.png" class="m--img-rounded m--marginless m--img-centered"> </span> <span class="m-topbar__username m--hide">
                <?=$row_user['admin_firstname'];?>
                </span> </a>
                <div class="m-dropdown__wrapper"> <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__header m--align-center">
                      <div class="m-card-user m-card-user--skin-dark">
                        <div class="m-card-user__pic"> <img src="../images/icon.png" class="m--img-rounded m--marginless"> </div>
                        <div class="m-card-user__details"> <span class="m-card-user__name m--font-weight-500">
                          <?=$row_user['admin_firstname'];?>
                          <?=$row_user['admin_lastname'];?>
                          </span> <a href="" class="m-card-user__email m--font-weight-300 m-link">
                          <?=$row_user['admin_email'];?>
                          </a> </div>
                      </div>
                    </div>
                    <div class="m-dropdown__body">
                      <div class="m-dropdown__content">
                        <ul class="m-nav m-nav--skin-light">
                          <li class="m-nav__section m--hide"> <span class="m-nav__section-text"> Section </span> </li>
                          <li class="m-nav__item"> <a href="" class="m-nav__link"> <span class="m-nav__link-text"> My Profile </span> </a> </li>
                          <li class="m-nav__item"> <a href="../logout/" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"> Logout </a> </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- END: Topbar --> 
        
      </div>
    </div>
  </header>
  <!-- END: Header --> 
  <!-- begin::Body -->
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body"> 
    <!-- BEGIN: Left Aside -->
    <? include('../header/index.php'); ?>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper"> 
      <!-- BEGIN: Subheader -->
      
      <div class="m-content">
        <div id="non-printable">
          <div class="col-md-12">
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption" align="center">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text" style="text-transform:uppercase;"><strong> Report </strong></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
              <div id="non-printable">
                <div align="left">
                  <form class="m-form m-form--fit m-form--label-align-right" action="search.php" method="post">
                    <div class="col-md-12"> <br>
                      <br>
                      <label> Report For &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label>
                        <select class="form-control m-input" name="report" id="report">
                          <? if ($report == 'Paid') { ?>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? } else if ($report == 'Unpaid') { ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? } else if ($report == 'Paid Unpaid') { ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? } else if ($report == 'Pending') { ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? } else if ($report == 'In-Process') { ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? } else if ($report == 'Completed') { ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? } else if ($report == '') { ?>
                          <option value="">--Select Report--</option>
                          <? if($row_user['reseller_status_report_payment_received'] == 'T') { ?>
                          <option value="Paid"> Payment Done </option>
                          <? } else if($row_user['reseller_status_report_payment_received'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_payment_pending'] == 'T') { ?>
                          <option value="Unpaid"> Payment Pending </option>
                          <? } else if($row_user['reseller_status_report_payment_pending'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_total_sales'] == 'T') { ?>
                          <option value="Paid Unpaid"> Total Sales </option>
                          <? } else if($row_user['reseller_status_report_total_sales'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_pending_orders'] == 'T') { ?>
                          <option value="Pending"> Pending Orders </option>
                          <? } else if($row_user['reseller_status_report_pending_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_inprocess_orders'] == 'T') { ?>
                          <option value="In-Process"> In-Process Orders </option>
                          <? } else if($row_user['reseller_status_report_inprocess_orders'] != 'T') { } ?>
                          <? if($row_user['reseller_status_report_completed_orders'] == 'T') { ?>
                          <option value="Completed"> Completed Orders </option>
                          <? } else if($row_user['reseller_status_report_completed_orders'] != 'T') { } ?>
                          <? } ?>
                          <option value=""> All </option>
                        </select>
                      </label>
                      <label> &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label> Search by Reseller &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label>
                        <select class="form-control m-input" name="reseller" id="reseller">
                          <?
                      $strSQL = " SELECT * FROM admin_reseller WHERE reseller_status = 'T' AND reseller_type = 'Admin' ORDER BY id ASC ";
					  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					  ?>
                          <option value="<?=$reseller?>">
                          <?=$reseller?>
                          </option>
                          <? while($objResult = mysql_fetch_array($objQuery)) { ?>
                          <option value="<?=$objResult["reseller_company"]?>">
                          <?=$objResult["reseller_company"]?>
                          </option>
                          <? } ?>
                          <option value=""> All </option>
                        </select>
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label> Search by Date &nbsp;&nbsp;&nbsp;&nbsp; </label>
                      <label>
                      <div class="input-daterange input-group" id="m_datepicker_5">
                        <div class="input-group-append"> <span class="input-group-text"> From </span> </div>
                        <input type="text" class="form-control m-input" name="start_date" id="start_date" value="<?=$start_date?>" readonly>
                        <div class="input-group-append"> <span class="input-group-text"> To </span> </div>
                        <input type="text" class="form-control" name="end_date" id="end_date" value="<?=$end_date?>" readonly>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;" onclick="clearlist();"> Delete Date </button>
                        &nbsp;&nbsp;&nbsp;&nbsp; </div>
                      </label>
                      <label> <span class="m-form__help"> month/day/year </span> </label>
                    </div>
                    <div class="col-md-12">
                      <label>
                        <button type="submit" class="btn btn-primary"> Search </button>
                      </label>
                    </div>
                  </form>
                </div>
              </div>
              <div id="non-printable" align="right">
                <label style="font-family: 'Roboto', sans-serif;">
                  <button type="button" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;" onClick="window.print();"> Print & Save PDF </button>
                </label>
              </div>
              <div id="printable"><br>
                <? if ($report == "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong> REPORT </strong></div>
                <? } else if ($report != "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <? if ($report == "Paid") { ?>
                  Payment Done
                  <? } else if ($report == "Unpaid") { ?>
                  Payment Pending
                  <? } else if ($report == "Paid Unpaid") { ?>
                  Total Sales
                  <? } else if ($report == "Pending") { ?>
                  Pending Orders
                  <? } else if ($report == "In-Process") { ?>
                  In-Process Orders
                  <? } else if ($report == "Completed") { ?>
                  Completed Orders
                  <? } ?>
                  <br>
                  <?=$reseller?>
                  <br>
                  <?
                  $strSQL01 = " SELECT * FROM admin_uploadlogo WHERE uploadlogo_status = 'T' AND uploadlogo_reseller = '$reseller' ";
				  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
				  $objResult01 = mysql_fetch_array($objQuery01);
				  ?>
                  <img src="../../../images/logo/<?=$objResult01['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../../images/logo/0.jpg?v=1001';"> </strong></div>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <?
        		  $strDate = $start_date;
				  echo DateEng($strDate);
				  ?>
                  -
                  <?
        		  $strDate = $end_date;
				  echo DateEng($strDate);
				  ?>
                  </strong></div>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong> REPORT </strong></div>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <?
        		  $strDate = $start_date;
				  echo DateEng($strDate);
				  ?>
                  -
                  <?
        		  $strDate = $end_date;
				  echo DateEng($strDate);
				  ?>
                  </strong></div>
                <? } else if ($report == "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <?=$reseller?>
                  <br>
                  <?
                  $strSQL01 = " SELECT * FROM admin_uploadlogo WHERE uploadlogo_status = 'T' AND uploadlogo_reseller = '$reseller' ";
				  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
				  $objResult01 = mysql_fetch_array($objQuery01);
				  ?>
                  <img src="../../../images/logo/<?=$objResult01['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../../images/logo/0.jpg?v=1001';"> </strong></div>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <?
        		  $strDate = $start_date;
				  echo DateEng($strDate);
				  ?>
                  -
                  <?
        		  $strDate = $end_date;
				  echo DateEng($strDate);
				  ?>
                  </strong></div>
                <? } else if ($report != "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <? if ($report == "Paid") { ?>
                  Payment Done
                  <? } else if ($report == "Unpaid") { ?>
                  Payment Pending
                  <? } else if ($report == "Paid Unpaid") { ?>
                  Total Sales
                  <? } else if ($report == "Pending") { ?>
                  Pending Orders
                  <? } else if ($report == "In-Process") { ?>
                  In-Process Orders
                  <? } else if ($report == "Completed") { ?>
                  Completed Orders
                  <? } ?>
                  </strong></div>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <?
        		  $strDate = $start_date;
				  echo DateEng($strDate);
				  ?>
                  -
                  <?
        		  $strDate = $end_date;
				  echo DateEng($strDate);
				  ?>
                  </strong></div>
                <? } else if ($report != "" && $reseller != "" && $start_date == "" && $end_date == "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <? if ($report == "Paid") { ?>
                  Payment Done
                  <? } else if ($report == "Unpaid") { ?>
                  Payment Pending
                  <? } else if ($report == "Paid Unpaid") { ?>
                  Total Sales
                  <? } else if ($report == "Pending") { ?>
                  Pending Orders
                  <? } else if ($report == "In-Process") { ?>
                  In-Process Orders
                  <? } else if ($report == "Completed") { ?>
                  Completed Orders
                  <? } ?>
                  <br>
                  <?=$reseller?>
                  <br>
                  <?
                  $strSQL01 = " SELECT * FROM admin_uploadlogo WHERE uploadlogo_status = 'T' AND uploadlogo_reseller = '$reseller' ";
				  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
				  $objResult01 = mysql_fetch_array($objQuery01);
				  ?>
                  <img src="../../../images/logo/<?=$objResult01['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../../images/logo/0.jpg?v=1001';"> </strong></div>
                <? } else if ($report != "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <? if ($report == "Paid") { ?>
                  Payment Done
                  <? } else if ($report == "Unpaid") { ?>
                  Payment Pending
                  <? } else if ($report == "Paid Unpaid") { ?>
                  Total Sales
                  <? } else if ($report == "Pending") { ?>
                  Pending Orders
                  <? } else if ($report == "In-Process") { ?>
                  In-Process Orders
                  <? } else if ($report == "Completed") { ?>
                  Completed Orders
                  <? } ?>
                  </strong></div>
                <? } else if ($report == "" && $reseller != "" && $start_date == "" && $end_date == "") { ?>
                <div style="font-family: 'Roboto', sans-serif; text-transform:uppercase; color:#000000; font-size:16px; letter-spacing:1px;" align="center"><strong>
                  <?=$reseller?>
                  <br>
                  <?
                  $strSQL01 = " SELECT * FROM admin_uploadlogo WHERE uploadlogo_status = 'T' AND uploadlogo_reseller = '$reseller' ";
				  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
				  $objResult01 = mysql_fetch_array($objQuery01);
				  ?>
                  <img src="../../../images/logo/<?=$objResult01['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../../images/logo/0.jpg?v=1001';"> </strong></div>
                <? } ?>
                <br>
                <!--begin: Datatable -->
                <? if ($report == 'Pending' || $report == 'In-Process' || $report == 'Completed') { ?>
                <? if ($report != "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller != "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } ?>
                <? } else if ($report == 'Paid' || $report == 'Unpaid') { ?>
                <? if ($report != "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller != "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } ?>
                <? } else if ($report == 'Paid Unpaid') { ?>
                <? if ($report != "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller != "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller != "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report == "" && $reseller == "" && $start_date != "" && $end_date != "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } else if ($report != "" && $reseller != "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_payment = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } ?>
                <? } else if ($report == '') { ?>
                <? if ($report == "" && $reseller == "" && $start_date == "" && $end_date == "") { ?>
                <?
              $strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_number != '0' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		      ?>
                <? } ?>
                <? } ?>
                <table width="100%">
                  <thead>
                    <tr style="height:50px;">
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Invoice No </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Order No </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Date </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Customer Name </strong></div></th>
                      <? if ($report == 'Paid' || $report == 'Unpaid' || $report == 'Pending') { ?>
                      <? } else if ($report == 'Paid Unpaid' || $report == 'In-Process' || $report == 'Completed' || $reseller != '') { ?>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Product Category </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> QTY </strong></div></th>
                      <? } ?>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Amount </strong></div></th>
                      <? if ($report == 'Paid' || $report == 'Unpaid' || $report == 'Paid Unpaid') { ?>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Order Status </strong></div></th>
                      <? } else if ($report == 'Pending' || $report == 'In-Process' || $report == 'Completed' || $reseller != '') { ?>
                      <? } ?>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Payment Status </strong></div></th>
                      <th width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Print PDF & Download Invoice PDF </strong></div></th>
                    </tr>
                  </thead>
                  <tbody>
                    <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
                    <tr style="height:50px;" align="center">
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_invoice"]?>
                          -
                          <?=$objResult1["checkout_number"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_order"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?
        				  $strDate = $objResult1['checkout_date'];
						  echo DateEng($strDate);
						  ?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_customer"]?>
                        </div></td>
                      <? if ($report == 'Paid' || $report == 'Unpaid' || $report == 'Pending') { ?>
                      <? } else if ($report == 'Paid Unpaid' || $report == 'In-Process' || $report == 'Completed' || $reseller != '') { ?>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;"><br>
                        <? if ($objResult1['checkout_jacket'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Jacket </div>
                        <br>
                        <? } else if ($objResult1['checkout_jacket'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_jeans'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Jeans </div>
                        <br>
                        <? } else if ($objResult1['checkout_jeans'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_overcoat'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Overcoat </div>
                        <br>
                        <? } else if ($objResult1['checkout_overcoat'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_pants'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Pants </div>
                        <br>
                        <? } else if ($objResult1['checkout_pants'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_shirt'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Shirt </div>
                        <br>
                        <? } else if ($objResult1['checkout_shirt'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_suits'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Suits </div>
                        <br>
                        <? } else if ($objResult1['checkout_suits'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_suits_with_vest'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Suits with Vest </div>
                        <br>
                        <? } else if ($objResult1['checkout_suits_with_vest'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_ties'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Ties </div>
                        <br>
                        <? } else if ($objResult1['checkout_ties'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_tuxedo_jacket'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Tuxedo Jacket </div>
                        <br>
                        <? } else if ($objResult1['checkout_tuxedo_jacket'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_tuxedo_suits'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Tuxedo Suits </div>
                        <br>
                        <? } else if ($objResult1['checkout_tuxedo_suits'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_tuxedo_with_vest'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Tuxedo with Vest </div>
                        <br>
                        <? } else if ($objResult1['checkout_tuxedo_with_vest'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_vest'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;"> Vest </div>
                        <br>
                        <? } else if ($objResult1['checkout_vest'] == "0" ) { } ?></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;"><br>
                        <? if ($objResult1['checkout_jacket'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_jacket']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_jacket'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_jeans'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_jeans']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_jeans'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_overcoat'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_overcoat']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_overcoat'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_pants'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_pants']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_pants'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_shirt'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_shirt']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_shirt'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_suits'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_suits']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_suits'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_suits_with_vest'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_suits_with_vest']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_suits_with_vest'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_ties'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_ties']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_ties'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_tuxedo_jacket'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_tuxedo_jacket']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_tuxedo_jacket'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_tuxedo_suits'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_tuxedo_suits']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_tuxedo_suits'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_tuxedo_with_vest'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_tuxedo_with_vest']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_tuxedo_with_vest'] == "0" ) { } ?>
                        <? if ($objResult1['checkout_vest'] != "0" ) { ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1['checkout_vest']?>
                        </div>
                        <br>
                        <? } else if ($objResult1['checkout_vest'] == "0" ) { } ?></td>
                      <? } ?>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
					$country = $objResult1['checkout_country'];
                    $sqlcountry1 =	" SELECT * FROM admin_country WHERE country_name = '$country' ";
					$querycountry1 = mysql_db_query($dbname, $sqlcountry1) or die("Can't QueryCountry1");
					$rowcountry1 = mysql_fetch_array($querycountry1);
					$currency = $rowcountry1['country_currency'];
					?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$currency?>
                          <?=$objResult1['checkout_price'];?>
                        </div></td>
                      <? if ($report == 'Paid' || $report == 'Unpaid' || $report == 'Paid Unpaid') { ?>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_status_process"]?>
                        </div></td>
                      <? } else if ($report == 'Pending' || $report == 'In-Process' || $report == 'Completed' || $reseller != '') { ?>
                      <? } ?>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                          <?=$objResult1["checkout_status_payment"]?>
                        </div></td>
                      <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><a href="../pdf/order_invoice.php?order_id=<?=$objResult1['checkout_orderid'];?>&&user=<?=$objResult1["checkout_company"]?>" target="_blank">
                        <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                        </a></td>
                    </tr>
                    <? } ?>
                    <? if ($report == 'Paid' || $report == 'Unpaid' || $report == 'Pending') { ?>
                    <? } else if ($report == 'Paid Unpaid' || $report == 'In-Process' || $report == 'Completed' || $reseller != '') { ?>
                    <tr style="height:50px;">
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Total </strong></div></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><? if ($report == 'Paid Unpaid') { ?>
                        <? if ($reseller == "" && $start_date == "" && $end_date == "") { ?>
                        <?
                      $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
                      $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
                      $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
                      $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
                      $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
                      $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
                      $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
                      $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
                      $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
				
                      $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
				
                      $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
				
                      $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);
					  
					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } else if ($reseller != "" && $start_date != "" && $end_date != "") { ?>
                        <?
					  $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
					  $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
					  $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
					  $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
					  $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
					  $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
					  $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
					  $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
					  $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
					
					  $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
					
					  $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
					
					  $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);

					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } else if ($reseller != "" && $start_date == "" && $end_date == "") { ?>
                        <?
                      $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
					  $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
					  $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
					  $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
					  $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
					  $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
					  $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
					  $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
					  $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
					
					  $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
					
					  $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
					
					  $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);
					  
					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } else if ($reseller == "" && $start_date != "" && $end_date != "") { ?>
                        <?
                      $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
					  $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
					  $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
					  $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
					  $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
					  $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
					  $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
					  $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
					  $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
					
					  $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
					
					  $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
					
					  $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);
					  
					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } ?>
                        <? } else if ($report == 'In-Process' || $report == 'Completed') { ?>
                        <? if ($reseller == "" && $start_date == "" && $end_date == "") { ?>
                        <?
                      $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
                      $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
                      $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
                      $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
                      $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
                      $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
                      $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
                      $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
                      $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
				
                      $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
				
                      $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
				
                      $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);
					  
					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } else if ($reseller != "" && $start_date != "" && $end_date != "") { ?>
                        <?
					  $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
					  $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
					  $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
					  $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
					  $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
					  $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
					  $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
					  $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
					  $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
					
					  $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
					
					  $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
					
					  $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);

					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } else if ($reseller != "" && $start_date == "" && $end_date == "") { ?>
                        <?
                      $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
					  $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
					  $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
					  $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
					  $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
					  $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
					  $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
					  $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
					  $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
					
					  $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
					
					  $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
					
					  $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_company = '$reseller' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);
					  
					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } else if ($reseller == "" && $start_date != "" && $end_date != "") { ?>
                        <?
                      $strSQL01 = " SELECT SUM(checkout_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery01 = mysql_query($strSQL01) or die ("Error Query [".$strSQL01."]");
					  $objResult01 = mysql_fetch_array($objQuery01);
					
					  $strSQL02 = " SELECT SUM(checkout_jeans) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery02 = mysql_query($strSQL02) or die ("Error Query [".$strSQL02."]");
					  $objResult02 = mysql_fetch_array($objQuery02);
					
					  $strSQL03 = " SELECT SUM(checkout_overcoat) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery03 = mysql_query($strSQL03) or die ("Error Query [".$strSQL03."]");
					  $objResult03 = mysql_fetch_array($objQuery03);
					
					  $strSQL04 = " SELECT SUM(checkout_pants) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]");
					  $objResult04 = mysql_fetch_array($objQuery04);
					
					  $strSQL05 = " SELECT SUM(checkout_shirt) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]");
					  $objResult05 = mysql_fetch_array($objQuery05);
					
					  $strSQL06 = " SELECT SUM(checkout_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery06 = mysql_query($strSQL06) or die ("Error Query [".$strSQL06."]");
					  $objResult06 = mysql_fetch_array($objQuery06);
					
					  $strSQL07 = " SELECT SUM(checkout_suits_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery07 = mysql_query($strSQL07) or die ("Error Query [".$strSQL07."]");
					  $objResult07 = mysql_fetch_array($objQuery07);
					
					  $strSQL08 = " SELECT SUM(checkout_tuxedo_jacket) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery08 = mysql_query($strSQL08) or die ("Error Query [".$strSQL08."]");
					  $objResult08 = mysql_fetch_array($objQuery08);
					
					  $strSQL09 = " SELECT SUM(checkout_tuxedo_suits) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery09 = mysql_query($strSQL09) or die ("Error Query [".$strSQL09."]");
					  $objResult09 = mysql_fetch_array($objQuery09);
					
					  $strSQL010 = " SELECT SUM(checkout_tuxedo_with_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery010 = mysql_query($strSQL010) or die ("Error Query [".$strSQL010."]");
					  $objResult010 = mysql_fetch_array($objQuery010);
					
					  $strSQL011 = " SELECT SUM(checkout_vest) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery011 = mysql_query($strSQL011) or die ("Error Query [".$strSQL011."]");
					  $objResult011 = mysql_fetch_array($objQuery011);
					
					  $strSQL012 = " SELECT SUM(checkout_ties) FROM customize_checkout WHERE checkout_price !='' AND checkout_status = 'T' AND checkout_status_send = 'send' AND checkout_status_process = '$report' AND checkout_date BETWEEN '$start_date' AND '$end_date' ORDER BY id DESC ";	
					  $objQuery012 = mysql_query($strSQL012) or die ("Error Query [".$strSQL012."]");
					  $objResult012 = mysql_fetch_array($objQuery012);
					  
					  $sumprice = $objResult01['SUM(checkout_jacket)'] + $objResult02['SUM(checkout_jeans)'] + $objResult03['SUM(checkout_overcoat)'] + $objResult04['SUM(checkout_pants)'] + $objResult05['SUM(checkout_shirt)'] + $objResult06['SUM(checkout_suits)'] + $objResult07['SUM(checkout_suits_with_vest)'] + $objResult08['SUM(checkout_tuxedo_jacket)'] + $objResult09['SUM(checkout_tuxedo_suits)'] + $objResult010['SUM(checkout_tuxedo_with_vest)'] + $objResult011['SUM(checkout_vest)'] + $objResult012['SUM(checkout_ties)'];
					  ?>
                        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center">
                          <?=$sumprice?>
                        </div>
                        <? } ?>
                        <? } ?></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                      <td width="10%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"></td>
                    </tr>
                    <? } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET--> 
        </div>
      </div>
      
      <!-- end::Body --> 
    </div>
  </div>
  <!-- end:: Body --> 
  <!-- begin::Footer -->
  <footer class="m-grid__item m-footer">
    <div id="non-printable">
      <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
          <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last"> <span class="m-footer__copyright"> 2019 &copy; Reseller Online </span> </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end::Footer --> 
</div>
<!-- end:: Page --> 
<!--begin::Base Scripts --> 
<script src="../js/vendors.bundle.js" type="text/javascript"></script> 
<script src="../js/scripts.bundle.js" type="text/javascript"></script> 
<script src="../js/datatables.bundle.js" type="text/javascript"></script> 
<script src="../js/bootstrap-datepicker.js" type="text/javascript"></script> 
<script> function changeLocation(menuObj) { var i = menuObj.selectedIndex; if(i > 0) { window.location = menuObj.options[i].value; } } </script> 
<!--end::Base Scripts --> 
<script> function clearlist() { document.getElementById('start_date').value=""; document.getElementById('end_date').value=""; } </script>
</body>
<!-- end::Body -->
</html>
