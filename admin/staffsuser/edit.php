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
	
	$id = $_GET["id"];
	
	$sql1 =	" SELECT * FROM admin_reseller WHERE id = '$id' ";
	$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
	$row1 = mysql_fetch_array($query1);	
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
<link href="https://fonts.googleapis.com/css?family=Adamina|Roboto&display=swap" rel="stylesheet">
<link href="../css/vendors.bundle.css" rel="stylesheet" type="text/css">
<link href="../css/style.bundle.css" rel="stylesheet" type="text/css">
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
<link rel="shortcut icon" href="../images/favicon.ico">
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
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
              <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click"> <a href="#" class="m-nav__link m-dropdown__toggle"> <span class="m-topbar__userpic" style="font-family: 'Roboto', sans-serif;"> <img src="../images/icon.png" class="m--img-rounded m--marginless m--img-centered"> </span> <span class="m-topbar__username m--hide">
                <?=$row_user['admin_firstname'];?>
                </span> </a>
                <div class="m-dropdown__wrapper"> <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                  <div class="m-dropdown__inner">
                    <div class="m-dropdown__header m--align-center">
                      <div class="m-card-user m-card-user--skin-dark">
                        <div class="m-card-user__pic"> <img src="../images/icon.png" class="m--img-rounded m--marginless"> </div>
                        <div class="m-card-user__details"> <span class="m-card-user__name m--font-weight-500" style="font-family: 'Roboto', sans-serif;">
                          <?=$row_user['admin_firstname'];?>
                          <?=$row_user['admin_lastname'];?>
                          </span> <a href="" class="m-card-user__email m--font-weight-300 m-link" style="font-family: 'Roboto', sans-serif;">
                          <?=$row_user['admin_email'];?>
                          </a> </div>
                      </div>
                    </div>
                    <div class="m-dropdown__body">
                      <div class="m-dropdown__content">
                        <ul class="m-nav m-nav--skin-light">
                          <li class="m-nav__section m--hide"> <span class="m-nav__section-text"> Section </span> </li>
                          <li class="m-nav__item"> <a href="../profile/" class="m-nav__link"> <span class="m-nav__link-text" style="font-family: 'Roboto', sans-serif;"> My Profile </span> </a> </li>
                          <li class="m-nav__item"> <a href="../logout/" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" style="font-family: 'Roboto', sans-serif;"> Logout </a> </li>
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
      <!-- begin::Body -->
      <div class="m-content">
        <div class="row">
          <div class="col-md-12">
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption" align="center">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text" style="text-transform:uppercase;" style="font-family: 'Roboto', sans-serif;">
                    <strong> Create Staffs User </strong>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="m-portlet m-portlet--tab"> 
              <!--begin::Form-->
              <form class="m-form m-form--fit m-form--label-align-right" action="../include/staffsuser_edit_code.php" method="post">
                <div class="m-portlet__body">
                  <div class="form-group m-form__group">
                    <label style="font-family: 'Roboto', sans-serif;"> Username </label>
                    <input type="hidden" name="id" id="id" value="<?=$row1['id'];?>" required>
                    <input type="hidden" name="reseller_admin" id="reseller_admin" value="<?=$row_user['id'];?>" required>
                    <input type="hidden" name="reseller_type" id="reseller_type" value="Staffs" required>
                    <input type="hidden" name="reseller_company" id="reseller_company" value="<?=$row_user['reseller_company'];?>" required>
                    <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_username" id="reseller_username" value="<?=$row1['reseller_username'];?>" placeholder="Username" required>
                  </div>
                  <div class="form-group m-form__group">
                    <label style="font-family: 'Roboto', sans-serif;"> Password (8)</label>
                    <input type="password" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_password" id="reseller_password" value="<?=$row1['reseller_password'];?>" maxlength="8" placeholder="Password" required>
                  </div>
                  <div class="form-group m-form__group">
                    <label style="font-family: 'Roboto', sans-serif;"> First Name </label>
                    <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_firstname" id="reseller_firstname" value="<?=$row1['reseller_firstname'];?>" placeholder="First Name" required>
                  </div>
                  <div class="form-group m-form__group">
                    <label style="font-family: 'Roboto', sans-serif;"> Last Name </label>
                    <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_lastname" id="reseller_lastname" value="<?=$row1['reseller_lastname'];?>" placeholder="Last Name" required>
                  </div>
                  <div class="form-group m-form__group">
                    <label style="font-family: 'Roboto', sans-serif;"> Email </label>
                    <input type="email" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_email" id="reseller_email" value="<?=$row1['reseller_email'];?>" placeholder="Email" required>
                  </div>
                  <div class="m-form__group form-group">
                    <label style="font-family: 'Roboto', sans-serif;" for=""> Permissions </label>
                    <div class="m-checkbox-inline">
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_logo"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_logo" id="reseller_status_logo" value="T"checked>
                        <? } else if ($row1["reseller_status_logo"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_logo" id="reseller_status_logo" value="T">
                        <? } ?>
                        Upload Logo <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_category_picture"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_category_picture" id="reseller_status_category_picture" value="T"checked>
                        <? } else if ($row1["reseller_status_category_picture"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_category_picture" id="reseller_status_category_picture" value="T">
                        <? } ?>
                        Upload Category Picture <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_orders"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_orders" id="reseller_status_orders" value="T" checked>
                        <? } else if ($row1["reseller_status_orders"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_orders" id="reseller_status_orders" value="T">
                        <? } ?>
                        Orders <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report" id="reseller_status_report" value="T" checked>
                        <? } else if ($row1["reseller_status_report"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report" id="reseller_status_report" value="T">
                        <? } ?>
                        Report <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_categorywise_sale_report"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_categorywise_sale_report" id="reseller_status_categorywise_sale_report" value="T" checked>
                        <? } else if ($row1["reseller_status_categorywise_sale_report"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_categorywise_sale_report" id="reseller_status_categorywise_sale_report" value="T">
                        <? } ?>
                        Categorywise Sale Report <span></span> </label>
                    </div>
                    <span class="m-form__help" style="font-family: 'Roboto', sans-serif;"> Note: Show all option we have so admin can select for the user </span> </div>
                  <div class="m-form__group form-group">
                    <label style="font-family: 'Roboto', sans-serif;" for=""> Permissions For Report </label>
                    <div class="m-checkbox-inline">
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report_payment_received"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_payment_received" id="reseller_status_report_payment_received" value="T" checked>
                        <? } else if ($row1["reseller_status_report_payment_received"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_payment_received" id="reseller_status_report_payment_received" value="T">
                        <? } ?>
                        Payment Done <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report_payment_pending"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_payment_pending" id="reseller_status_report_payment_pending" value="T" checked>
                        <? } else if ($row1["reseller_status_report_payment_pending"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_payment_pending" id="reseller_status_report_payment_pending" value="T">
                        <? } ?>
                        Payment Pending <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report_total_sales"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_total_sales" id="reseller_status_report_total_sales" value="T" checked>
                        <? } else if ($row1["reseller_status_report_total_sales"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_total_sales" id="reseller_status_report_total_sales" value="T">
                        <? } ?>
                        Total Sales <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report_pending_orders"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_pending_orders" id="reseller_status_report_pending_orders" value="T" checked>
                        <? } else if ($row1["reseller_status_report_pending_orders"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_pending_orders" id="reseller_status_report_pending_orders" value="T">
                        <? } ?>
                        Pending Orders <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report_inprocess_orders"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_inprocess_orders" id="reseller_status_report_inprocess_orders" value="T" checked>
                        <? } else if ($row1["reseller_status_report_inprocess_orders"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_inprocess_orders" id="reseller_status_report_inprocess_orders" value="T">
                        <? } ?>
                        In-Process Orders <span></span> </label>
                      <label class="m-checkbox" style="font-family: 'Roboto', sans-serif;">
                        <? if ($row1["reseller_status_report_completed_orders"] == "T") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_completed_orders" id="reseller_status_report_completed_orders" value="T" checked>
                        <? } else if ($row1["reseller_status_report_completed_orders"] == "") { ?>
                        <input type="checkbox" style="font-family: 'Roboto', sans-serif;" name="reseller_status_report_completed_orders" id="reseller_status_report_completed_orders" value="T">
                        <? } ?>
                        Completed Orders <span></span> </label>
                    </div>
                    <span class="m-form__help" style="font-family: 'Roboto', sans-serif;"> Note: Show all option we have so admin can select for the user </span> </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                  <div class="m-form__actions">
                    <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;"> Submit </button>
                  </div>
                </div>
              </form>
              <!--end::Form--> 
            </div>
          </div>
        </div>
      </div>
      <!-- end::Body --> 
    </div>
  </div>
  <!-- end:: Body --> 
  <!-- begin::Footer -->
  <footer class="m-grid__item m-footer">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
      <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last"> <span class="m-footer__copyright"> 2019 &copy; Reseller Online </span> </div>
      </div>
    </div>
  </footer>
  <!-- end::Footer --> 
</div>
<!-- end:: Page --> 
<!--begin::Base Scripts --> 
<script src="../js/vendors.bundle.js" type="text/javascript"></script> 
<script src="../js/scripts.bundle.js" type="text/javascript"></script> 
<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>
