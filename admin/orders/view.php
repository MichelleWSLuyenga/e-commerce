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
	
	$order_id = $_GET["order_id"];
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
    <? include('../header/index.php'); ?>
    <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper"> 
      <!-- BEGIN: Subheader -->
      
      <div class="m-content">
        <div class="col-md-12">
          <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
              <div class="m-portlet__head-caption" align="center">
                <div class="m-portlet__head-title">
                  <h3 class="m-portlet__head-text" style="text-transform:uppercase;" style="font-family: 'Roboto', sans-serif;">
                  <strong> Orders </strong>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">
              <div align="left">
                <div class="col-md-12">
                  <label style="font-family: 'Roboto', sans-serif;"> <a href="index.php"> All Reseller </a> </label>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
              <br>
              <!--begin: Datatable -->
              <? 
	  				$strSQL1 = " SELECT * FROM customize_checkout WHERE checkout_orderid = '$order_id' ";
	  				$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
	  				$Num_Rows = mysql_num_rows($objQuery1);
	  				$Per_Page = 120;
	  				$Page = $_GET["Page"];
	  				if(!$_GET["Page"])
	  				{
		  				$Page=1;
	  				}
	  				$Prev_Page = $Page-1;
	  				$Next_Page = $Page+1;
	  
	  				$Page_Start = (($Per_Page*$Page)-$Per_Page);
	  				if($Num_Rows<=$Per_Page)
	  				{
		  				$Num_Pages =1;
	  				}
	  				else if(($Num_Rows % $Per_Page)==0)
	  				{
		  				$Num_Pages =($Num_Rows/$Per_Page) ;
	  				}
	  				else
	  				{
		  				$Num_Pages =($Num_Rows/$Per_Page)+1;
		  				$Num_Pages = (int)$Num_Pages;
	  				}
	  				$strSQL1 .=" ORDER BY ABS(id) DESC LIMIT $Page_Start , $Per_Page";
	  				$objQuery1  = mysql_query($strSQL1);
	  			?>
              <table width="100%">
                <thead>
                  <tr style="height:50px;">
                    <th width="5%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Invoice No </strong></div></th>
                    <th width="5%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Order No </strong></div></th>
                    <th width="5%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Customer Name </strong></div></th>
                    <th width="6%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Date </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Jacket </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Jeans </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Overcoat </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Pants </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Shirt </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Suits </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Suits with Vest </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Tuxedo Jacket </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Tuxedo Suits </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Tuxedo with Vest </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Vest </strong></div></th>
                    <th width="4%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Ties </strong></div></th>
                    <th width="3%" style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"><strong> Amount </strong></div></th>
                  </tr>
                </thead>
                <tbody>
                  <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
                  <tr style="height:50px;">
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1["checkout_invoice"]?>
                        -
                        <?=$objResult1["checkout_number"]?>
                      </div></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1["checkout_order"]?>
                      </div></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1["checkout_customer"]?>
                      </div></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?
        				  $strDate = $objResult1['checkout_date'];
						  echo DateEng($strDate);
						  ?>
                      </div></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL2 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'jacket' ORDER BY rand() LIMIT 1 ";	
				$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <? if ($objResult2['order_id'] != '' && $objResult1['checkout_jacket'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_jacket'];?>
                      </div>
                      <a href="../pdf/order_jacket.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult2['order_id'] == '' || $objResult1['checkout_jacket'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL3 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'jeans' ORDER BY rand() LIMIT 1 ";	
				$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
				$objResult3 = mysql_fetch_array($objQuery3);
				?>
                      <? if ($objResult3['order_id'] != '' && $objResult1['checkout_jeans'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_jeans'];?>
                      </div>
                      <a href="../pdf/order_jeans.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult3['order_id'] == '' || $objResult1['checkout_jeans'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL4 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'overcoat' ORDER BY rand() LIMIT 1 ";	
				$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
				$objResult4 = mysql_fetch_array($objQuery4);
				?>
                      <? if ($objResult4['order_id'] != '' && $objResult1['checkout_overcoat'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_overcoat'];?>
                      </div>
                      <a href="../pdf/order_overcoat.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult4['order_id'] == '' || $objResult1['checkout_overcoat'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL5 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'pants' ORDER BY rand() LIMIT 1 ";	
				$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
				$objResult5 = mysql_fetch_array($objQuery5);
				?>
                      <? if ($objResult5['order_id'] != '' && $objResult1['checkout_pants'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_pants'];?>
                      </div>
                      <a href="../pdf/order_pants.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult5['order_id'] == '' || $objResult1['checkout_pants'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL6 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'shirt' ORDER BY rand() LIMIT 1 ";	
				$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
				$objResult6 = mysql_fetch_array($objQuery6);
				?>
                      <? if ($objResult6['order_id'] != '' && $objResult1['checkout_shirt'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_shirt'];?>
                      </div>
                      <a href="../pdf/order_shirt.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult6['order_id'] == '' || $objResult1['checkout_shirt'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL7 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'suits' ORDER BY rand() LIMIT 1 ";	
				$objQuery7 = mysql_query($strSQL7) or die ("Error Query [".$strSQL7."]");
				$objResult7 = mysql_fetch_array($objQuery7);
				?>
                      <? if ($objResult7['order_id'] != '' && $objResult1['checkout_suits'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_suits'];?>
                      </div>
                      <a href="../pdf/order_suits.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult7['order_id'] == '' || $objResult1['checkout_suits'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL8 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'suits_with_vest' ORDER BY rand() LIMIT 1 ";	
				$objQuery8 = mysql_query($strSQL8) or die ("Error Query [".$strSQL8."]");
				$objResult8 = mysql_fetch_array($objQuery8);
				?>
                      <? if ($objResult8['order_id'] != '' && $objResult1['checkout_suits_with_vest'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_suits_with_vest'];?>
                      </div>
                      <a href="../pdf/order_suits_with_vest.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult8['order_id'] == '' || $objResult1['checkout_suits_with_vest'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL9 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'tuxedo_jacket' ORDER BY rand() LIMIT 1 ";	
				$objQuery9 = mysql_query($strSQL9) or die ("Error Query [".$strSQL9."]");
				$objResult9 = mysql_fetch_array($objQuery9);
				?>
                      <? if ($objResult9['order_id'] != '' && $objResult1['checkout_tuxedo_jacket'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_tuxedo_jacket'];?>
                      </div>
                      <a href="../pdf/order_tuxedo_jacket.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult9['order_id'] == '' || $objResult1['checkout_tuxedo_jacket'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL10 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'tuxedo_suits' ORDER BY rand() LIMIT 1 ";	
				$objQuery10 = mysql_query($strSQL10) or die ("Error Query [".$strSQL10."]");
				$objResult10 = mysql_fetch_array($objQuery10);
				?>
                      <? if ($objResult10['order_id'] != '' && $objResult1['checkout_tuxedo_suits'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_tuxedo_suits'];?>
                      </div>
                      <a href="../pdf/order_tuxedo_suits.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult10['order_id'] == '' || $objResult1['checkout_tuxedo_suits'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL11 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'tuxedo_with_vest' ORDER BY rand() LIMIT 1 ";	
				$objQuery11 = mysql_query($strSQL11) or die ("Error Query [".$strSQL11."]");
				$objResult11 = mysql_fetch_array($objQuery11);
				?>
                      <? if ($objResult11['order_id'] != '' && $objResult1['checkout_tuxedo_with_vest'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_tuxedo_with_vest'];?>
                      </div>
                      <a href="../pdf/order_tuxedo_with_vest.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult11['order_id'] == '' || $objResult1['checkout_tuxedo_with_vest'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL12 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'vest' ORDER BY rand() LIMIT 1 ";	
				$objQuery12 = mysql_query($strSQL12) or die ("Error Query [".$strSQL12."]");
				$objResult12 = mysql_fetch_array($objQuery12);
				?>
                      <? if ($objResult12['order_id'] != '' && $objResult1['checkout_vest'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_vest'];?>
                      </div>
                      <a href="../pdf/order_vest.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult12['order_id'] == '' || $objResult1['checkout_vest'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
                $strSQL13 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult1['checkout_orderid']." AND order_product = 'ties' ORDER BY rand() LIMIT 1 ";	
				$objQuery13 = mysql_query($strSQL13) or die ("Error Query [".$strSQL13."]");
				$objResult13 = mysql_fetch_array($objQuery13);
				?>
                      <? if ($objResult13['order_id'] != '' && $objResult1['checkout_ties'] != '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$objResult1['checkout_ties'];?>
                      </div>
                      <a href="../pdf/order_ties.php?order_id=<?=$objResult1['checkout_orderid'];?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a>
                      <? } else if ($objResult13['order_id'] == '' || $objResult1['checkout_ties'] == '0') { ?>
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                      <? } ?></td>
                    <td style="border: 1px solid #c5c5c5; font-weight:100; vertical-align:middle;" align="center"><?
					$country = $objResult1['checkout_country'];
                    if ($country == 'Austria') {
		
					$currency = 'EURO';	
		
					} else if ($country == 'Australia') {
	
					$currency = '$';
		
					} else if ($country == 'Belgium') {
		
					$currency = 'EURO';	
		
					} else if ($country == 'Canada') {
		
					$currency = '$';	
		
					} else if ($country == 'Denmark') {
		
					$currency = 'DKK';	
		
					} else if ($country == 'Germany') {
		
					$currency = 'EURO';	
				
					} else if ($country == 'Italy') {
		
					$currency = 'EURO';	
		
					} else if ($country == 'Netherlands') {
		
					$currency = 'EURO';	
		
					} else if ($country == 'Norway') {
		
					$currency = 'NOK';	
		
					} else if ($country == 'Sweden') {
		
					$currency = 'SEK';	
		
					} else if ($country == 'Switzerland') {
		
					$currency = 'EURO';	
		
					} else if ($country == 'Thailand') {
		
					$currency = '฿';	
		
					} else if ($country == 'UK') {
		
					$currency = '£';	
		
					} else if ($country == 'US') {	
	
					$currency = '$';
		
					}
					?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                        <?=$currency?>
                        <?=$objResult1['checkout_price'];?>
                      </div>
                      <a href="../pdf/order_invoice.php?order_id=<?=$objResult1['checkout_orderid'];?>&&user=<?=$objResult1["checkout_company"]?>" target="_blank">
                      <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                      </a></td>
                  </tr>
                  <? } ?>
                </tbody>
              </table>
              <div align="right" style="font-size:14px; color:#000000; letter-spacing:1px;"> <br>
                <? if($Prev_Page) { echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'> < Previous </a> "; } ?>
                <?
        			for($i=1; $i<=$Num_Pages; $i++){
					$Page1 = $Page-2;
					$Page2 = $Page+2;
					if($i != $Page && $i >= $Page1 && $i <= $Page2)
					{
						echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
					}
					elseif($i==$Page)
					{
						echo "<b> $i </b>";
					}
					}


			  ?>
                <? if($Page!=$Num_Pages) {	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'> Next > </a> "; } ?>
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
<script src="../js/bootstrap-datepicker.js" type="text/javascript"></script> 
<script> function changeLocation(menuObj) { var i = menuObj.selectedIndex; if(i > 0) { window.location = menuObj.options[i].value; } } </script> 
<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>
