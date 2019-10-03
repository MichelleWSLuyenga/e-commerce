<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	include('../../connect.php');
	
	session_start();
	
	$user = $_COOKIE['user'];

	$sql_user =	" SELECT * FROM admin WHERE admin_username = '$user' ";
	$query_user = mysql_query($sql_user) or die("Can't Query");
	$row_user = mysql_fetch_array($query_user);
	$name = $row_user['admin_username'];

	if($user == ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../'); exit(); }
	else if($user != $name){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../'); exit(); }
	
	$id = $_GET["id"];
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
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
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
                          <li class="m-nav__item"> <a href="" class="m-nav__link"> <span class="m-nav__link-text" style="font-family: 'Roboto', sans-serif;"> My Profile </span> </a> </li>
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
    <button class="m-aside-left-close  m-aside-left-close--skin-dark" id="m_aside_left_close_btn"> <i class="la la-close"></i> </button>
    <div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark"> 
      <!-- BEGIN: Aside Menu -->
      <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark" m-menu-vertical="1" m-menu-scrollable="0"  m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow">
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../profile/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> CHANGE PROFILE </span> </a> </li>
          <? if($row_user['admin_status_country'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../country/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Country </span> </a> </li>
          <? } else if($row_user['admin_status_country'] == '') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../category/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Product Category </span> </a> </li>
          <? if($row_user['admin_status_fabrictype'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../fabrictype/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Fabric Type </span> </a> </li>
          <? } else if($row_user['admin_status_fabrictype'] == '') { } ?>
          <? if($row_user['admin_status_brandtype'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../fabricbrand/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Fabric Brand </span> </a> </li>
          <? } else if($row_user['admin_status_brandtype'] == '') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../parameter/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Other Pricing Parameter </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Fabrics </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Fabrics </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/shirt.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Shirt Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Fabrics </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../fabrics/jeans.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Jeans Fabrics </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Lining </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../lining/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Lining </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Tie </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Tie </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../tie/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Tie </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../tie/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Tie </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Buttons </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Buttons </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/suit.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Suit Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/shirt.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Shirt Buttons </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../buttons/overcoat.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Overcoat Buttons </span> </a> </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../orderform/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Update Order Form </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Reseller </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../reseller/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Reseller </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../reseller/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Reseller </span> </a> </li>
              </ul>
            </div>
          </li>
          <? if($row_user['admin_status_orders'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../orders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Orders </span> </a> </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../inprocessorders/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> In-Process Orders </span> </a> </li>
          <? } else if($row_user['admin_status_orders'] == '') { } ?>
          <? if($row_user['admin_status_reports'] == 'T') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Reports </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../report/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Report </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../categorywise/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Categorywise Sales Report </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_reports'] == '') { } ?>
          <? if($row_user['admin_status_subuser'] == '') { ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="javascript:;" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Sub User </span> </a>
            <div class="m-menu__submenu "> <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"> <span class="m-menu__link"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Create Lining </span> </span> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../subuser/" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> Add Sub User </span> </a> </li>
                <li class="m-menu__item " aria-haspopup="true"> <a  href="../subuser/view.php" class="m-menu__link "> <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif;"> View Sub User </span> </a> </li>
              </ul>
            </div>
          </li>
          <? } else if($row_user['admin_status_subuser'] == 'T') { } ?>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"> <a  href="../logout/" class="m-menu__link m-menu__toggle"> <span class="m-menu__link-text" style="font-family: 'Roboto', sans-serif; color:#F00;"> LOGOUT </span> </a> </li>
        </ul>
      </div>
      <!-- END: Aside Menu --> 
    </div>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper"> 
      <!-- begin::Body -->
      <div class="m-content">
        <div class="row">
          <div class="col-md-6">
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text" style="text-transform:uppercase;" style="font-family: 'Roboto', sans-serif;">
                    <strong> Update Price (Fabric Type) </strong>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      <form class="m-form m-form--fit m-form--label-align-right" action="../include/fabrictype_pricecopy_code.php" method="post">
                        <label style="font-family: 'Roboto', sans-serif;"> Copy Pricing </label>
                        <label style="font-family: 'Roboto', sans-serif;">
                          <?
                      $strSQL = " SELECT * FROM admin_reseller WHERE reseller_status = 'T' AND reseller_type = 'Admin' ORDER BY id ASC ";
					  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					  ?>
                          <input type="hidden" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_id" id="reseller_id" value="<?=$id?>" required>
                          <select class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_company" id="reseller_company" required>
                            <? while($objResult = mysql_fetch_array($objQuery)) { ?>
                            <option style="font-family: 'Roboto', sans-serif;" value="<?=$objResult["reseller_company"]?>">
                            <?=$objResult["reseller_company"]?>
                            </option>
                            <? } ?>
                          </select>
                        </label>
                        <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;"> Copy </button>
                      </form>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">
              <div class="m-portlet__body"> 
                <!--begin: Datatable -->
                <?
              $strSQL1 = " SELECT DISTINCT fabrictype_name FROM admin_fabrictype WHERE fabrictype_status = 'T' ORDER BY id ASC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			  ?>
                <table width="100%">
                  <thead>
                    <tr style="height:50px;">
                      <th width="55%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;"> <?
                      $strSQL3 = " SELECT * FROM admin_reseller WHERE reseller_status = 'T' AND reseller_type = 'Admin' AND id = '$id' ORDER BY id ASC ";
					  $objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
					  $objResult3 = mysql_fetch_array($objQuery3);
					  ?>
                        <?=$objResult3["reseller_company"]?>
                        (
                        <?=$objResult3["reseller_country"]?>
                        ) </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Jacket </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Jeans </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Overcoat </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Pants </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Shirt </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Suits </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Vest </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Ties </th>
                      <th width="5%" style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;" align="center"> Lining </th>
                    </tr>
                  </thead>
                  <tbody>
                  <form class="m-form m-form--fit m-form--label-align-right" action="../include/fabrictype_price_code.php" method="post">
                    <input type="hidden" class="form-control m-input" style="font-family: 'Roboto', sans-serif;" name="reseller_id" id="reseller_id" value="<?=$id?>" required>
                    <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
                    <tr>
                      <td style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;"><?=$objResult1["fabrictype_name"]?></td>
                      <?
					  $fabrictype_name_now = $objResult1["fabrictype_name"];
              $strSQL2 = " SELECT * FROM admin_fabrictype WHERE fabrictype_status = 'T' AND fabrictype_name = '$fabrictype_name_now' ORDER BY id ASC ";
			  $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
			  ?>
                      <? while($objResult2 = mysql_fetch_array($objQuery2)) { ?>
                      <td style="border: 1px solid #c5c5c5; font-family: 'Roboto', sans-serif;"><input type="hidden" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="id_<?=$objResult2["id"]?>" id="id_<?=$objResult2["id"]?>" value="<?=$objResult2["id"]?>" required>
                        <? if ($id == '1') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_1"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '2') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_2"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '3') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_3"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '4') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_4"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '5') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_5"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '6') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_6"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '7') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_7"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '8') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_8"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '9') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_9"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } if ($id == '10') { ?>
                        <input type="text" class="form-control m-input" style="font-family: 'Roboto', sans-serif; width:100px;" name="price_<?=$objResult2["id"]?>" id="price_<?=$objResult2["id"]?>" value="<?=$objResult2["fabrictype_10"]?>" placeholder="Price" OnKeyPress="return chkNumber(this)">
                        <? } ?></td>
                      <? } ?>
                    </tr>
                    <? } ?>
                    <tr>
                      <td colspan="10" style="font-family: 'Roboto', sans-serif;" align="right"><br>
                        <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;"> Update </button></td>
                    </tr>
                  </form>
                    </tbody>
                  
                </table>
              </div>
            </div>
          </div>
          
          <!-- end::Body --> 
        </div>
      </div>
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
<script src="../js/datatables.bundle.js" type="text/javascript"></script> 
<script src="../js/scrollable.js" type="text/javascript"></script> 
<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>
