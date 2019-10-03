<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	include('../../connect.php');
	
	session_start();
	
	$user = $_COOKIE['user'];

	$sql_user =	" SELECT * FROM admin_reseller WHERE reseller_username = '$user' ";
	$query_user = mysql_query($sql_user) or die("Can't Query");
	$row_user = mysql_fetch_array($query_user);
	$name = $row_user['reseller_username'];
	$reseller = $row_user['reseller_company'];

	if($user == ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
	else if($user != $name){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
	
	$orderid = $_GET["orderid"];
	
	$sqllogo = " SELECT * FROM admin_uploadlogo WHERE uploadlogo_reseller = '$reseller' ";
	$querylogo = mysql_db_query($dbname, $sqllogo) or die("Can't Querylogo");
	$rowlogo = mysql_fetch_array($querylogo);
	
	$sql2 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'jacket' AND order_status = 'T' ";
	$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
	$row2 = mysql_fetch_array($query2);
	
	$sql3 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'jeans' AND order_status = 'T' ";
	$query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
	$row3 = mysql_fetch_array($query3);
	
	$sql4 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'overcoat' AND order_status = 'T' ";
	$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
	$row4 = mysql_fetch_array($query4);
	
	$sql5 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'pants' AND order_status = 'T' ";
	$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
	$row5 = mysql_fetch_array($query5);
	
	$sql6 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'shirt' AND order_status = 'T' ";
	$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
	$row6 = mysql_fetch_array($query6);
	
	$sql7 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'suits' AND order_status = 'T' ";
	$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
	$row7 = mysql_fetch_array($query7);
	
	$sql8 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'suits_with_vest' AND order_status = 'T' ";
	$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
	$row8 = mysql_fetch_array($query8);
	
	$sql9 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'tuxedo_jacket' AND order_status = 'T' ";
	$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
	$row9 = mysql_fetch_array($query9);
	
	$sql10 = " SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'tuxedo_suits' AND order_status = 'T' ";
	$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
	$row10 = mysql_fetch_array($query10);
	
	$sql11 = " SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'tuxedo_with_vest' AND order_status = 'T' ";
	$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
	$row11 = mysql_fetch_array($query11);
	
	$sql12 = " SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'vest' AND order_status = 'T' ";
	$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
	$row12 = mysql_fetch_array($query12);
	
	$sql13 = " SELECT DISTINCT order_order_no FROM customize_order WHERE order_id = '$orderid' ORDER BY order_order_no DESC ";
	$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
	$row13 = mysql_fetch_array($query13);
	
	$sql14 = " SELECT DISTINCT order_name_customize FROM customize_order WHERE order_id = '$orderid' ORDER BY order_name_customize DESC ";
	$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
	$row14 = mysql_fetch_array($query14);
	
	$sqlcheck =	" SELECT checkout_status_send FROM customize_checkout WHERE checkout_orderid = '$orderid' ";
	$querycheck = mysql_db_query($dbname, $sqlcheck) or die("Can't Querycheck");
	$rowcheck = mysql_fetch_array($querycheck);
	
	$checkorder = $rowcheck['checkout_status_send'];
	
	if($checkorder != ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
	
	$sqlmeasurements1 = " SELECT * FROM customize_jacket_measurements WHERE order_id = '$orderid' ";
	$querymeasurements1 = mysql_db_query($dbname, $sqlmeasurements1) or die("Can't Querymeasurements1");
	$rowmeasurements1 = mysql_fetch_array($querymeasurements1);
	
	$sqlmeasurements2 = " SELECT * FROM customize_pants_measurements WHERE order_id = '$orderid' ";
	$querymeasurements2 = mysql_db_query($dbname, $sqlmeasurements2) or die("Can't Querymeasurements2");
	$rowmeasurements2 = mysql_fetch_array($querymeasurements2);
	
	$sqlmeasurements3 = " SELECT * FROM customize_vest_measurements WHERE order_id = '$orderid' ";
	$querymeasurements3 = mysql_db_query($dbname, $sqlmeasurements3) or die("Can't Querymeasurements3");
	$rowmeasurements3 = mysql_fetch_array($querymeasurements3);
	
	$sqlmeasurements4 = " SELECT * FROM customize_shirt_measurements WHERE order_id = '$orderid' ";
	$querymeasurements4 = mysql_db_query($dbname, $sqlmeasurements4) or die("Can't Querymeasurements4");
	$rowmeasurements4 = mysql_fetch_array($querymeasurements4);
	
	$sqlmeasurements5 = " SELECT * FROM customize_overcoat_measurements WHERE order_id = '$orderid' ";
	$querymeasurements5 = mysql_db_query($dbname, $sqlmeasurements5) or die("Can't Querymeasurements5");
	$rowmeasurements5 = mysql_fetch_array($querymeasurements5);
	
	$sqlmeasurements6 = " SELECT * FROM customize_jeans_measurements WHERE order_id = '$orderid' ";
	$querymeasurements6 = mysql_db_query($dbname, $sqlmeasurements6) or die("Can't Querymeasurements6");
	$rowmeasurements6 = mysql_fetch_array($querymeasurements6);
	
	$sqlmeasurements7 = " SELECT * FROM customize_suits_measurements WHERE order_id = '$orderid' ";
	$querymeasurements7 = mysql_db_query($dbname, $sqlmeasurements7) or die("Can't Querymeasurements7");
	$rowmeasurements7 = mysql_fetch_array($querymeasurements7);
	
	$sqlmeasurements8 = " SELECT * FROM customize_suits_with_vest_measurements WHERE order_id = '$orderid' ";
	$querymeasurements8 = mysql_db_query($dbname, $sqlmeasurements8) or die("Can't Querymeasurements8");
	$rowmeasurements8 = mysql_fetch_array($querymeasurements8);
	
	$sqlmeasurements9 = " SELECT * FROM customize_tuxedo_jacket_measurements WHERE order_id = '$orderid' ";
	$querymeasurements9 = mysql_db_query($dbname, $sqlmeasurements9) or die("Can't Querymeasurements9");
	$rowmeasurements9 = mysql_fetch_array($querymeasurements9);
	
	$sqlmeasurements10 = " SELECT * FROM customize_tuxedo_suits_measurements WHERE order_id = '$orderid' ";
	$querymeasurements10 = mysql_db_query($dbname, $sqlmeasurements10) or die("Can't Querymeasurements10");
	$rowmeasurements10 = mysql_fetch_array($querymeasurements10);
	
	$sqlmeasurements11 = " SELECT * FROM customize_tuxedo_with_vest_measurements WHERE order_id = '$orderid' ";
	$querymeasurements11 = mysql_db_query($dbname, $sqlmeasurements11) or die("Can't Querymeasurements11");
	$rowmeasurements11 = mysql_fetch_array($querymeasurements11);
?>
<!doctype html>
<html dir="ltr" lang="en-US">
<head>
<? header('Content-Type: text/html; charset=utf-8'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="../../images/main/favicon.ico">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0 maximum-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Adamina|Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../css/bootstrap.css">
<link rel="stylesheet" href="../../css/font-awesome.css">
<link rel="stylesheet" href="../../css/theme.css">
<link rel="stylesheet" href="../../css/default.css">
<link rel="stylesheet" href="../../css/pnotify.custom.css">
<link rel="stylesheet" href="../../css/magnific-popup.css">
<link rel="stylesheet" media="all" type="text/css" href="../../css/datepicker/jquery-ui.css">
<link rel="stylesheet" media="all" type="text/css" href="../../css/datepicker/jquery-ui-timepicker-addon.css">
<script src="../../js/datepicker/jquery-1.10.2.min.js"></script>
<script src="../../js/datepicker/jquery-ui.min.js"></script>
<script src="../../js/datepicker/jquery-ui-timepicker-addon.js"></script>
<script src="../../js/datepicker/jquery-ui-sliderAccess.js"></script>
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
<style type="text/css" style="display: none">
label > input {
	visibility: hidden;
	position: absolute;
}
label > input + img {
	cursor: pointer;
	border: 4px solid transparent;
}
label > input:checked + img {
	border: 4px solid #FF0000;
}
</style>
<style>
.accordion {
	color: #444;
	cursor: pointer;
	padding: 0px;
	width: 100%;
	border: none;
	text-align: left;
	outline: none;
	font-size: 15px;
	transition: 0.4s;
}
.active, .accordion:hover {
}
.panel {
	padding: 0 0px;
	display: none;
	background-color: white;
	overflow: hidden;
}
</style>
<script type="text/javascript">
$(function(){
	var minD = $("#startDate").html();
	var maxD = $("#endDate").html();
	$("#dateInput").datepicker({
		dateFormat: "mm/dd/yy",
		minDate: new Date(minD),
		maxDate: new Date(maxD)
	});
});
</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.') && (vchar != '+')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<style type="text/css">
.mobileShow {
	display: none;
}

/* Smartphone Portrait and Landscape */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
.mobileShow {
	display: inline;
}
}
</style>
<style type="text/css">
.mobileHide {
	display: inline;
}

/* Smartphone Portrait and Landscape */
@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
.mobileHide {
	display: none;
}
}
</style>
<title>RESELLER ONLINE | Measurements</title>
</head>
<body>
<section class="body" style="background-color:#FFFFFF;">
  <? if($orderid == '') { ?>
  <div class="mobileShow row">
    <div class="row show-grid">
      <div class="col-md-12" align="center"> <a href="../../category/multiple/"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a> </div>
    </div>
    <div>
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li> <a href="../../placeorder/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
    </div>
  </div>
  <header class="mobileHide header"> &nbsp;&nbsp;<a href="../../category/multiple/"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li> <a href="../../placeorder/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
      <span class="separator"></span>
      <div id="userbox" class="userbox mobileHide"> <a href="#" data-toggle="dropdown">
        <div class="profile-info"> <span class="name" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;">
          <?=$row_user['reseller_firstname'];?>
          <?=$row_user['reseller_lastname'];?>
          </span> <span class="role" style="font-family: 'Roboto', sans-serif; color:#777777; font-size:10px; letter-spacing:1px;">
          <?=$row_user['reseller_company'];?>
          </span> </div>
        <i class="fa custom-caret"></i> </a>
        <div class="dropdown-menu">
          <ul class="list-unstyled">
            <li> <a role="menuitem" href="../../logout/">
              <div style="font-family: 'Roboto', sans-serif; color:#777777; font-size:14px; letter-spacing:1px;"> <i class="fa fa-power-off"></i> Logout </a> </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <? } else if($orderid != '') { ?>
  <div class="mobileShow row">
    <div class="row show-grid">
      <div class="col-md-12" align="center"> <a href="../../category/multiple/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a> </div>
    </div>
    <div>
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li> <a href="../../placeorder/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
    </div>
  </div>
  <header class="mobileHide header"> &nbsp;&nbsp;<a href="../../category/multiple/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../placeorder/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
      <span class="separator"></span>
      <div id="userbox" class="userbox mobileHide"> <a href="#" data-toggle="dropdown">
        <div class="profile-info"> <span class="name" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;">
          <?=$row_user['reseller_firstname'];?>
          <?=$row_user['reseller_lastname'];?>
          </span> <span class="role" style="font-family: 'Roboto', sans-serif; color:#777777; font-size:10px; letter-spacing:1px;">
          <?=$row_user['reseller_company'];?>
          </span> </div>
        <i class="fa custom-caret"></i> </a>
        <div class="dropdown-menu">
          <ul class="list-unstyled">
            <li> <a role="menuitem" href="../../logout/">
              <div style="font-family: 'Roboto', sans-serif; color:#777777; font-size:14px; letter-spacing:1px;"> <i class="fa fa-power-off"></i> Logout </a> </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <? } ?>
  <div class="inner-wrapper" style="background-color:#FFFFFF;">
    <section role="main" class="content-body">
      <header class="page-header">
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Measurements </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <div class="row">
        <div class="row show-grid">
          <form class="form-horizontal form-bordered" action="../../include/multiple/customize_measurements.php" method="post" enctype="multipart/form-data" name="frmMain">
            <input type="hidden" id="item_orderid" name="item_orderid" value="<?=$orderid?>">
            <input type="hidden" id="user_id" name="user_id" value="<?=$row_user['id'];?>">
            <input type="hidden" id="user_name" name="user_name" value="<?=$row_user['reseller_company'];?>">
            <div class="col-md-12">
              <div class="col-md-3">
                <div class="form-group">
                  <? if($orderid == '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="hidden" name="item_customer_name" id="item_customer_name" required>
                  <? } else if($orderid != '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="hidden" name="item_customer_name" id="item_customer_name" value="<?=$row14['order_name_customize'];?>" readonly>
                  <? } ?>
                  <br class="mobileShow">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <? if($orderid == '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="hidden" name="item_order_no" id="item_order_no" required>
                  <? } else if($orderid != '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="hidden" name="item_order_no" id="item_order_no" value="<?=$row13['order_order_no'];?>" readonly>
                  <? } ?>
                  <br class="mobileShow">
                </div>
              </div>
              <div class="col-md-3"> </div>
              <div class="col-md-3"> </div>
            </div>
            
            <!--JACKET MEASUREMENTS-->
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="col-md-12"> <br>
                </div>
                <? if($row2['order_product'] == "jacket" || $row7['order_product'] == "suits" || $row8['order_product'] == "suits_with_vest" || $row9['order_product'] == "tuxedo_jacket" || $row10['order_product'] == "tuxedo_suits" || $row11['order_product'] == "tuxedo_with_vest") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> JACKET MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-12" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="jacket_jacket_measurement_fit" id="jacket_jacket_measurement_fit">
                      <? if($rowmeasurements1['jacket_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements1['jacket_jacket_measurement_fit']?>">
                      <?=$rowmeasurements1['jacket_jacket_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements7['suits_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements7['suits_jacket_measurement_fit']?>">
                      <?=$rowmeasurements7['suits_jacket_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_fit']?>">
                      <?=$rowmeasurements8['suits_with_vest_jacket_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_fit']?>">
                      <?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_fit']?>">
                      <?=$rowmeasurements10['tuxedo_suits_jacket_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_fit']?>">
                      <?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_fit']?>
                      </option>
                      <? } else { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Front Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_jacket_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_jacket_length']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_jacket_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_jacket_length']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_jacket_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_jacket_length']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_jacket_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_jacket_length']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_jacket_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_jacket_length']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_jacket_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_jacket_length']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Back Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_back_lenght']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Chest<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_chest']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_chest']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_chest']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_chest']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_chest']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_chest']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Waist<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_waist_only']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_waist_only']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_waist_only']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_waist_only']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_waist_only']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_waist_only']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_waist_only" id="jacket_jacket_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Hips<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_hips']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_hips']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_hips']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_hips']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_hips']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_hips']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulders<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_shoulders'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_shoulders']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_shoulders'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_shoulders']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_shoulders'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_shoulders']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_shoulders'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_shoulders']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_shoulders'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_shoulders']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_shoulders'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_shoulders']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves Right<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_sleeves_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_sleeves_right']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_sleeves_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_sleeves_right']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_sleeves_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_sleeves_right']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_sleeves_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_sleeves_right']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_sleeves_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_sleeves_right']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_sleeves_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_sleeves_right']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves Left<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_sleeves_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_sleeves_left']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_sleeves_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_sleeves_left']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_sleeves_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_sleeves_left']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_sleeves_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_sleeves_left']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_sleeves_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_sleeves_left']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_sleeves_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_sleeves_left']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> PTP Front<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_ptp_front']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_ptp_front']?>">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> PTP Back<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_ptp_back']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Biceps<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_biceps'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_biceps']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_biceps'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_biceps']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_biceps'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_biceps']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_biceps'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_biceps']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_biceps'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_biceps']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_biceps'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_biceps']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Arm Hole<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_arm_hole']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Neck<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_neck']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_neck']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_neck']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_neck']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_neck']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_neck']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> First Button / Lapel Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_first_button'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_first_button']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_first_button'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_first_button']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_first_button'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_first_button']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_first_button'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_first_button']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_first_button'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_first_button']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_first_button'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_first_button']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Wrist Right<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_wrist_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_wrist_right']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_wrist_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_wrist_right']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_wrist_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_wrist_right']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_wrist_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_wrist_right']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_wrist_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_wrist_right']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_wrist_right'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_wrist_right']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Wrist Left<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_wrist_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_wrist_left']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_wrist_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_wrist_left']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_wrist_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_wrist_left']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_wrist_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_wrist_left']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_wrist_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_wrist_left']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_wrist_left'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_wrist_left']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulder to Upper Waist </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_shoulder_upper_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_shoulder_upper_wrist']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_shoulder_upper_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_shoulder_upper_wrist']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_shoulder_upper_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_shoulder_upper_wrist']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_shoulder_upper_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_shoulder_upper_wrist']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_shoulder_upper_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_shoulder_upper_wrist']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_shoulder_upper_wrist']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulder to Lower Waist </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements1['jacket_jacket_measurement_shoulder_lower_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_shoulder_lower_wrist']?>">
                      <? } else if($rowmeasurements7['suits_jacket_measurement_shoulder_lower_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_jacket_measurement_shoulder_lower_wrist']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_jacket_measurement_shoulder_lower_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_jacket_measurement_shoulder_lower_wrist']?>">
                      <? } else if($rowmeasurements9['tuxedo_jacket_jacket_measurement_shoulder_lower_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements9['tuxedo_jacket_jacket_measurement_shoulder_lower_wrist']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_jacket_measurement_shoulder_lower_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_jacket_measurement_shoulder_lower_wrist']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_jacket_measurement_shoulder_lower_wrist']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <? } else if($row3['order_product'] == "jeans" || $row4['order_product'] == "overcoat" || $row5['order_product'] == "pants" || $row6['order_product'] == "shirt" || $row12['order_product'] == "vest") { } ?>
                <? if($row5['order_product'] == "pants" || $row7['order_product'] == "suits" || $row8['order_product'] == "suits_with_vest" || $row10['order_product'] == "tuxedo_suits" || $row11['order_product'] == "tuxedo_with_vest") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> PANTS MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Length </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="pants_pants_measurement_length" id="pants_pants_measurement_length">
                      <? if($rowmeasurements2['pants_pants_measurement_length'] != "") { ?>
                      <option value="<?=$rowmeasurements2['pants_pants_measurement_length']?>">
                      <?=$rowmeasurements2['pants_pants_measurement_length']?>
                      </option>
                      <? } else if($rowmeasurements7['suits_pants_measurement_length'] != "") { ?>
                      <option value="<?=$rowmeasurements7['suits_pants_measurement_length']?>">
                      <?=$rowmeasurements7['suits_pants_measurement_length']?>
                      </option>
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_length'] != "") { ?>
                      <option value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_length']?>">
                      <?=$rowmeasurements8['suits_with_vest_pants_measurement_length']?>
                      </option>
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_length'] != "") { ?>
                      <option value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_length']?>">
                      <?=$rowmeasurements10['tuxedo_suits_pants_measurement_length']?>
                      </option>
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_length'] != "") { ?>
                      <option value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_length']?>">
                      <?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_length']?>
                      </option>
                      <? } else { } ?>
                      <option value="LONG">LONG</option>
                      <option value="SHORT">SHORT</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="pants_pants_measurement_fit" id="pants_pants_measurement_fit">
                      <? if($rowmeasurements2['pants_pants_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements2['pants_pants_measurement_fit']?>">
                      <?=$rowmeasurements2['pants_pants_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements7['suits_pants_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements7['suits_pants_measurement_fit']?>">
                      <?=$rowmeasurements7['suits_pants_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_fit']?>">
                      <?=$rowmeasurements8['suits_with_vest_pants_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_fit']?>">
                      <?=$rowmeasurements10['tuxedo_suits_pants_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_fit']?>">
                      <?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_fit']?>
                      </option>
                      <? } else { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Waist<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_waist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_waist']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_waist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_waist']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_waist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_waist']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_waist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_waist']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_waist'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_waist']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Hips<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_hips']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_hips']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_hips']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_hips']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_hips']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Full Crotch<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_crotch_full'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_crotch_full']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_crotch_full'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_crotch_full']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_crotch_full'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_crotch_full']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_crotch_full'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_crotch_full']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_crotch_full'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_crotch_full']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Thighs<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_thighs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_thighs']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_thighs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_thighs']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_thighs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_thighs']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_thighs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_thighs']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_thighs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_thighs']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Knees<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_knees'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_knees']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_knees'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_knees']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_knees'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_knees']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_knees'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_knees']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_knees'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_knees']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Cuffs<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_cuffs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_cuffs']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_cuffs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_cuffs']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_cuffs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_cuffs']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_cuffs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_cuffs']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_cuffs'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_cuffs']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Length Outleg<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_length_outleg'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_length_outleg']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_length_outleg'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_length_outleg']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_length_outleg'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_length_outleg']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_length_outleg'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_length_outleg']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_length_outleg'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_length_outleg']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Front Rise<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_front_rise'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_front_rise']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_front_rise'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_front_rise']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_front_rise'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_front_rise']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_front_rise'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_front_rise']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_front_rise'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_front_rise']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Front Crotch<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_crotch_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_crotch_front']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_crotch_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_crotch_front']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_crotch_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_crotch_front']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_crotch_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_crotch_front']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_crotch_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_crotch_front']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Back Crotch<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_crotch_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_crotch_back']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_crotch_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_crotch_back']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_crotch_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_crotch_back']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_crotch_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_crotch_back']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_crotch_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_crotch_back']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Inseam Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements2['pants_pants_measurement_inseam_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_inseam_length']?>">
                      <? } else if($rowmeasurements7['suits_pants_measurement_inseam_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements7['suits_pants_measurement_inseam_length']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_pants_measurement_inseam_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_pants_measurement_inseam_length']?>">
                      <? } else if($rowmeasurements10['tuxedo_suits_pants_measurement_inseam_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements10['tuxedo_suits_pants_measurement_inseam_length']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_pants_measurement_inseam_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_pants_measurement_inseam_length']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <? } else if($row2['order_product'] == "jacket" || $row3['order_product'] == "jeans" || $row4['order_product'] == "overcoat" || $row6['order_product'] == "shirt" || $row9['order_product'] == "tuxedo_jacket" || $row12['order_product'] == "vest") { } ?>
                <? if($row8['order_product'] == "suits_with_vest" || $row11['order_product'] == "tuxedo_with_vest" || $row12['order_product'] == "vest") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> VEST MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-12" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="vest_vest_measurement_fit" id="vest_vest_measurement_fit">
                      <? if($rowmeasurements3['vest_vest_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements3['vest_vest_measurement_fit']?>">
                      <?=$rowmeasurements3['vest_vest_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_fit']?>">
                      <?=$rowmeasurements8['suits_with_vest_vest_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_fit']?>">
                      <?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_fit']?>
                      </option>
                      <? } else { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Front Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_vest_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_vest_length" id="vest_vest_measurement_vest_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_vest_length']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_vest_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_vest_length" id="vest_vest_measurement_vest_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_vest_length']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_vest_length'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_vest_length" id="vest_vest_measurement_vest_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_vest_length']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_vest_length" id="vest_vest_measurement_vest_length" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Back Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_back_lenght" id="vest_vest_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_back_lenght" id="vest_vest_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_back_lenght']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_back_lenght'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_back_lenght" id="vest_vest_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_back_lenght']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_back_lenght" id="vest_vest_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Chest<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_chest" id="vest_vest_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_chest']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_chest" id="vest_vest_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_chest']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_chest'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_chest" id="vest_vest_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_chest']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_chest" id="vest_vest_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Waist<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_waist_only" id="vest_vest_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_waist_only']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_waist_only" id="vest_vest_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_waist_only']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_waist_only'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_waist_only" id="vest_vest_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_waist_only']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_waist_only" id="vest_vest_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Hips<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_hips" id="vest_vest_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_hips']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_hips" id="vest_vest_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_hips']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_hips'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_hips" id="vest_vest_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_hips']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_hips" id="vest_vest_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> PTP Front<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_front" id="vest_vest_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_front" id="vest_vest_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_ptp_front']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_ptp_front'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_front" id="vest_vest_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['tuxedo_with_vest_vest_measurement_ptp_front']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_front" id="vest_vest_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> PTP Back<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_back" id="vest_vest_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_back" id="vest_vest_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_ptp_back']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_ptp_back'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_back" id="vest_vest_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_ptp_back']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_ptp_back" id="vest_vest_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Neck<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['tuxedo_with_vest_vest_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_neck" id="vest_vest_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['tuxedo_with_vest_vest_measurement_neck']?>">
                      <? } else if($rowmeasurements8['tuxedo_with_vest_vest_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_neck" id="vest_vest_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['tuxedo_with_vest_vest_measurement_neck']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_neck'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_neck" id="vest_vest_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_neck']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_neck" id="vest_vest_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Arm Hole<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <? if($rowmeasurements3['vest_vest_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_arm_hole" id="vest_vest_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements8['suits_with_vest_vest_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_arm_hole" id="vest_vest_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements8['suits_with_vest_vest_measurement_arm_hole']?>">
                      <? } else if($rowmeasurements11['tuxedo_with_vest_vest_measurement_arm_hole'] != "") { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_arm_hole" id="vest_vest_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements11['tuxedo_with_vest_vest_measurement_arm_hole']?>">
                      <? } else { ?>
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="vest_vest_measurement_arm_hole" id="vest_vest_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)">
                      <? } ?>
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <? } else if($row2['order_product'] == "jacket" || $row3['order_product'] == "jeans" || $row4['order_product'] == "overcoat" || $row5['order_product'] == "pants" || $row6['order_product'] == "shirt" || $row7['order_product'] == "suits" || $row9['order_product'] == "tuxedo_jacket" || $row10['order_product'] == "tuxedo_suits") { } ?>
                <? if($row6['order_product'] == "shirt") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> SHIRT MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="shirt_measurement_sleeves" id="shirt_measurement_sleeves">
                      <? if($rowmeasurements4['shirt_measurement_sleeves'] != "") { ?>
                      <option value="<?=$rowmeasurements4['shirt_measurement_sleeves']?>">
                      <?=$rowmeasurements4['shirt_measurement_sleeves']?>
                      </option>
                      <? } else if($rowmeasurements4['shirt_measurement_sleeves'] != "") { } ?>
                      <option style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;" value="LONG">LONG</option>
                      <option style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;" value="SHORT">SHORT</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="shirt_measurement_fit" id="shirt_measurement_fit">
                      <? if($rowmeasurements4['shirt_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements4['shirt_measurement_fit']?>">
                      <?=$rowmeasurements4['shirt_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements4['shirt_measurement_fit'] != "") { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Front Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_shirt_length" id="shirt_measurement_shirt_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_shirt_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Back Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_back_length" id="shirt_measurement_back_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_back_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Chest<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_chest" id="shirt_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_chest']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Waist<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_waist_only" id="shirt_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_waist_only']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Hips<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_hips" id="shirt_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulders<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_shoulders" id="shirt_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_shoulders']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves Right<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_sleeves_right" id="shirt_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_sleeves_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves Left<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_sleeves_left" id="shirt_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_sleeves_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Neck<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_neck" id="shirt_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_neck']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Biceps<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_biceps" id="shirt_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_biceps']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Forearm<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_forearm" id="shirt_measurement_forearm" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_forearm']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Cuff Right<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_cuff_right" id="shirt_measurement_cuff_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_cuff_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Cuff Left<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_cuff_left" id="shirt_measurement_cuff_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_cuff_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Arm Hole<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="shirt_measurement_arm_hole" id="shirt_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_arm_hole']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <? } else if($row6['order_product'] != "shirt") { } ?>
                <? if($row4['order_product'] == "overcoat") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> OVERCOAT MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-12" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="overcoat_overcoat_measurement_fit" id="overcoat_overcoat_measurement_fit">
                      <? if($rowmeasurements5['overcoat_overcoat_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements5['overcoat_overcoat_measurement_fit']?>">
                      <?=$rowmeasurements5['overcoat_overcoat_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements5['overcoat_overcoat_measurement_fit'] != "") { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Front Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_overcoat_length" id="overcoat_overcoat_measurement_overcoat_length" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_overcoat_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Back Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_back_lenght" id="overcoat_overcoat_measurement_back_lenght" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_back_lenght']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Chest<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_chest" id="overcoat_overcoat_measurement_chest" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_chest']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Waist<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_waist_only" id="overcoat_overcoat_measurement_waist_only" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_waist_only']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Hips<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_hips" id="overcoat_overcoat_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulders<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_shoulders" id="overcoat_overcoat_measurement_shoulders" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_shoulders']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves Right<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_sleeves_right" id="overcoat_overcoat_measurement_sleeves_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_sleeves_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sleeves Left<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_sleeves_left" id="overcoat_overcoat_measurement_sleeves_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_sleeves_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> PTP Front<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_ptp_front" id="overcoat_overcoat_measurement_ptp_front" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_ptp_front']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> PTP Back<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_ptp_back" id="overcoat_overcoat_measurement_ptp_back" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_ptp_back']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Biceps<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_biceps" id="overcoat_overcoat_measurement_biceps" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_biceps']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Arm Hole<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_arm_hole" id="overcoat_overcoat_measurement_arm_hole" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_arm_hole']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Neck<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_neck" id="overcoat_overcoat_measurement_neck" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_neck']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> First Button / Lapel Length<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_first_button" id="overcoat_overcoat_measurement_first_button" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_first_button']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Wrist Right<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_wrist_right" id="overcoat_overcoat_measurement_wrist_right" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_wrist_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Wrist Left<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_wrist_left" id="overcoat_overcoat_measurement_wrist_left" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_wrist_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulder to Upper Waist </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_shoulder_upper_wrist" id="overcoat_overcoat_measurement_shoulder_upper_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_shoulder_upper_wrist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Shoulder to Lower Waist </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="overcoat_overcoat_measurement_shoulder_lower_wrist" id="overcoat_overcoat_measurement_shoulder_lower_wrist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_shoulder_lower_wrist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <? } else if($row4['order_product'] != "overcoat") { } ?>
                <? if($row3['order_product'] == "jeans") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> JEANS MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Waist<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_waist" id="jeans_measurement_waist" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_waist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Hips<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_hips" id="jeans_measurement_hips" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Crotch<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_crotch" id="jeans_measurement_crotch" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_crotch']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Thighs<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_thighs" id="jeans_measurement_thighs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_thighs']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Knees<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_knees" id="jeans_measurement_knees" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_knees']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Cuffs<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_cuffs" id="jeans_measurement_cuffs" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_cuffs']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Length Outleg<font style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:14px; letter-spacing:1px;">*</font> </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" type="text" name="jeans_measurement_length_outleg" id="jeans_measurement_length_outleg" maxlength="10" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_length_outleg']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <? } else if($row3['order_product'] != "jeans") { } ?>
              </div>
              <div class="col-md-6">
                <div class="col-md-12"> <br>
                </div>
                <div class="accordion"> <br>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Sex </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="item_measurement_sex" id="item_measurement_sex">
                      <? if($rowmeasurements1['jacket_jacket_measurement_sex'] != "") { ?>
                      <option value="<?=$rowmeasurements1['jacket_jacket_measurement_sex']?>">
                      <?=$rowmeasurements1['jacket_jacket_measurement_sex']?>
                      </option>
                      <? } else if($rowmeasurements1['jacket_jacket_measurement_sex'] != "") { } ?>
                      <option style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;" value="MALE">MALE</option>
                      <option style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;" value="FEMALE">FEMALE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Measurement </div>
                    <select class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px; width:200px;" name="item_measurement" id="item_measurement">
                      <? if($rowmeasurements1['jacket_jacket_measurement'] != "") { ?>
                      <option value="<?=$rowmeasurements1['jacket_jacket_measurement']?>">
                      <?=$rowmeasurements1['jacket_jacket_measurement']?>
                      </option>
                      <? } else if($rowmeasurements1['jacket_jacket_measurement'] != "") { } ?>
                      <option value="TAILOR ALLOWANCE">TAILOR ALLOWANCE</option>
                      <option value="FINAL SIZE">FINAL SIZE</option>
                    </select>
                    <br>
                  </div>
                </div>
                <? if($row2['order_product'] == "jacket" || $row4['order_product'] == "overcoat" || $row6['order_product'] == "shirt" || $row7['order_product'] == "suits" || $row8['order_product'] == "suits_with_vest" || $row9['order_product'] == "tuxedo_jacket" || $row10['order_product'] == "tuxedo_suits" || $row11['order_product'] == "tuxedo_with_vest" || $row12['order_product'] == "vest") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> SHOULDER </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="2">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Square </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="3">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/4.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Slop Left </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="4">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/5.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Slop Right </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="5">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Sloping Left+Right </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> WAIST </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Flat </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="2">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="3">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Large </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="4">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/4.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Stout </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> CHEST </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Straight </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="2">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="3">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Hollow </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="4">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/4.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Hunched </div>
                    </label>
                  </div>
                </div>
                <? } else if($row3['order_product'] == "jeans" || $row5['order_product'] == "pants") { } ?>
                <? if($row3['order_product'] == "jeans" || $row5['order_product'] == "pants" || $row7['order_product'] == "suits" || $row8['order_product'] == "suits_with_vest" || $row10['order_product'] == "tuxedo_suits" || $row11['order_product'] == "tuxedo_with_vest") { ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> WAIST </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_waist" id="item_measurement_pants_waist" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/pants/waist/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> High Waist </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_waist" id="item_measurement_pants_waist" value="2">
                    <img class="img-responsive" src="../../../images/customize/pants/waist/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Medium Lower Waist </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_waist" id="item_measurement_pants_waist" value="3">
                    <img class="img-responsive" src="../../../images/customize/pants/waist/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Very Lower Waist </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> BOTTOM </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_bottom" id="item_measurement_pants_bottom" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/pants/bottom/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_bottom" id="item_measurement_pants_bottom" value="2">
                    <img class="img-responsive" src="../../../images/customize/pants/bottom/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Flat </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_bottom" id="item_measurement_pants_bottom" value="3">
                    <img class="img-responsive" src="../../../images/customize/pants/bottom/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Prominent </div>
                    </label>
                  </div>
                </div>
                <? } else if($row2['order_product'] == "jacket" || $row4['order_product'] == "overcoat" || $row6['order_product'] == "shirt" || $row9['order_product'] == "tuxedo_jacket" || $row12['order_product'] == "vest") { } ?>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> REMARK & OTHER DETAILS (MEASUREMENTS) </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-12" align="center">
                    <textarea class="form-control" style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;" name="item_measurement_remark" id="item_measurement_remark" rows="10" cols="150"><?=$rowmeasurements1['jacket_measurement_remark']?>
</textarea>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> CLIENT BODY POSTURE - PICTURES </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Front </div>
                    </label>
                    <input type="file" name="item_body_front" id="item_body_front">
                  </div>
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Left </div>
                    </label>
                    <input type="file" name="item_body_left" id="item_body_left">
                  </div>
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Right </div>
                    </label>
                    <input type="file" name="item_body_right" id="item_body_right">
                  </div>
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:12px; letter-spacing:1px;"> Back </div>
                    </label>
                    <input type="file" name="item_body_back" id="item_body_back">
                  </div>
                </div>
                <div align="right">
                  <button class="btn btn-primary" type="submit" style="font-family: 'Roboto', sans-serif; color:#FFFFFF; font-size:14px; letter-spacing:1px; background-color:#000000;" onClick="JavaScript:return validate();"> SAVE MEASUREMENTS </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</section>
<script src="../../js/modernizr.js"></script> 
<script src="../../js/bootstrap.js"></script> 
<script src="../../js/nanoscroller.js"></script> 
<script src="../../js/theme.js"></script> 
<script src="../../js/theme.init.js"></script> 
<script src="../../js/magnific-popup.js"></script> 
<script src="../../js/examples.modals.js"></script> 
<script> function scrollmanu(){window.scrollTo(0,550)} </script> 
<script language="JavaScript"> function MM_openBrWindow(theURL,winName,features) { window.open(theURL,winName,features).focus(); } </script> 
<script type="text/javascript"> function tab_one(){ document.getElementById("design_jacket_measurement").style.display="block",document.getElementById("design_pants_measurement").style.display="none",document.getElementById("design_vest_measurement").style.display="none",document.getElementById("design_shirt_measurement").style.display="none",document.getElementById("design_overcoat_measurement").style.display="none",document.getElementById("design_jeans_measurement").style.display="none"}</script> 
<script type="text/javascript"> function tab_two(){ document.getElementById("design_jacket_measurement").style.display="none",document.getElementById("design_pants_measurement").style.display="block",document.getElementById("design_vest_measurement").style.display="none",document.getElementById("design_shirt_measurement").style.display="none",document.getElementById("design_overcoat_measurement").style.display="none",document.getElementById("design_jeans_measurement").style.display="none"}</script> 
<script type="text/javascript"> function tab_three(){ document.getElementById("design_jacket_measurement").style.display="none",document.getElementById("design_pants_measurement").style.display="none",document.getElementById("design_vest_measurement").style.display="block",document.getElementById("design_shirt_measurement").style.display="none",document.getElementById("design_overcoat_measurement").style.display="none",document.getElementById("design_jeans_measurement").style.display="none"}</script> 
<script type="text/javascript"> function tab_four(){ document.getElementById("design_jacket_measurement").style.display="none",document.getElementById("design_pants_measurement").style.display="none",document.getElementById("design_vest_measurement").style.display="none",document.getElementById("design_shirt_measurement").style.display="block",document.getElementById("design_overcoat_measurement").style.display="none",
document.getElementById("design_jeans_measurement").style.display="none"}</script> 
<script type="text/javascript"> function tab_five(){ document.getElementById("design_jacket_measurement").style.display="none",document.getElementById("design_pants_measurement").style.display="none",document.getElementById("design_vest_measurement").style.display="none",document.getElementById("design_shirt_measurement").style.display="none",document.getElementById("design_overcoat_measurement").style.display="block",document.getElementById("design_jeans_measurement").style.display="none"}</script> 
<script type="text/javascript"> function tab_six(){ document.getElementById("design_jacket_measurement").style.display="none",document.getElementById("design_pants_measurement").style.display="none",document.getElementById("design_vest_measurement").style.display="none",document.getElementById("design_shirt_measurement").style.display="none",document.getElementById("design_overcoat_measurement").style.display="none",document.getElementById("design_jeans_measurement").style.display="block"}</script> 
<script language="javaScript" type="text/javascript">
function validate()
{
	<? if($row2['order_product'] == "jacket" || $row7['order_product'] == "suits" || $row8['order_product'] == "suits_with_vest" || $row9['order_product'] == "tuxedo_jacket" || $row10['order_product'] == "tuxedo_suits" || $row11['order_product'] == "tuxedo_with_vest") { ?>
	if(document.frmMain.jacket_jacket_measurement_jacket_length.value == "")
	{
		alert('Please enter your Front Length (Jacket)');
		document.frmMain.jacket_jacket_measurement_jacket_length.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_back_lenght.value == "")
	{
		alert('Please enter your Back Length (Jacket)');
		document.frmMain.jacket_jacket_measurement_back_lenght.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_chest.value == "")
	{
		alert('Please enter your Chest (Jacket)');
		document.frmMain.jacket_jacket_measurement_chest.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_waist_only.value == "")
	{
		alert('Please enter your Waist (Jacket)');
		document.frmMain.jacket_jacket_measurement_waist_only.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_hips.value == "")
	{
		alert('Please enter your Hips (Jacket)');
		document.frmMain.jacket_jacket_measurement_hips.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_shoulders.value == "")
	{
		alert('Please enter your Shoulders (Jacket)');
		document.frmMain.jacket_jacket_measurement_shoulders.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_sleeves_right.value == "")
	{
		alert('Please enter your Sleeves Right (Jacket)');
		document.frmMain.jacket_jacket_measurement_sleeves_right.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_sleeves_left.value == "")
	{
		alert('Please enter your Sleeves Left (Jacket)');
		document.frmMain.jacket_jacket_measurement_sleeves_left.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_ptp_front.value == "")
	{
		alert('Please enter your PTP Front (Jacket)');
		document.frmMain.jacket_jacket_measurement_ptp_front.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_ptp_back.value == "")
	{
		alert('Please enter your PTP Back (Jacket)');
		document.frmMain.jacket_jacket_measurement_ptp_back.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_biceps.value == "")
	{
		alert('Please enter your Biceps (Jacket)');
		document.frmMain.jacket_jacket_measurement_biceps.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_arm_hole.value == "")
	{
		alert('Please enter your Arm Hole (Jacket)');
		document.frmMain.jacket_jacket_measurement_arm_hole.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_neck.value == "")
	{
		alert('Please enter your Neck (Jacket)');
		document.frmMain.jacket_jacket_measurement_neck.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_first_button.value == "")
	{
		alert('Please enter your First Button / Lapel Length (Jacket)');
		document.frmMain.jacket_jacket_measurement_first_button.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_wrist_right.value == "")
	{
		alert('Please enter your Wrist Right (Jacket)');
		document.frmMain.jacket_jacket_measurement_wrist_right.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_wrist_left.value == "")
	{
		alert('Please enter your Wrist Left (Jacket)');
		document.frmMain.jacket_jacket_measurement_wrist_left.focus();
		return false;
	}
	<? } else if($row3['order_product'] == "jeans" || $row4['order_product'] == "overcoat" || $row5['order_product'] == "pants" || $row6['order_product'] == "shirt" || $row12['order_product'] == "vest") { } ?>
	<? if($row5['order_product'] == "pants" || $row7['order_product'] == "suits" || $row8['order_product'] == "suits_with_vest" || $row10['order_product'] == "tuxedo_suits" || $row11['order_product'] == "tuxedo_with_vest") { ?>
	if(document.frmMain.pants_pants_measurement_waist.value == "")
	{
		alert('Please enter your Waist (Pants)');
		document.frmMain.pants_pants_measurement_waist.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_hips.value == "")
	{
		alert('Please enter your Hips (Pants)');
		document.frmMain.pants_pants_measurement_hips.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_crotch_full.value == "")
	{
		alert('Please enter your Full Crotch (Pants)');
		document.frmMain.pants_pants_measurement_crotch_full.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_thighs.value == "")
	{
		alert('Please enter your Thighs (Pants)');
		document.frmMain.pants_pants_measurement_thighs.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_knees.value == "")
	{
		alert('Please enter your Knees (Pants)');
		document.frmMain.pants_pants_measurement_knees.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_cuffs.value == "")
	{
		alert('Please enter your Cuffs (Pants)');
		document.frmMain.pants_pants_measurement_cuffs.focus();
		return false;
	}
	if(document.frmMain.jacket_jacket_measurement_sleeves_right.value == "")
	{
		alert('Please enter your Sleeves Right (Pants)');
		document.frmMain.jacket_jacket_measurement_sleeves_right.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_length_outleg.value == "")
	{
		alert('Please enter your Length Outleg (Pants)');
		document.frmMain.pants_pants_measurement_length_outleg.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_front_rise.value == "")
	{
		alert('Please enter your PTP Front Rise (Pants)');
		document.frmMain.pants_pants_measurement_front_rise.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_crotch_front.value == "")
	{
		alert('Please enter your PTP Front Crotch (Pants)');
		document.frmMain.pants_pants_measurement_crotch_front.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_crotch_back.value == "")
	{
		alert('Please enter your Back Crotch (Pants)');
		document.frmMain.pants_pants_measurement_crotch_back.focus();
		return false;
	}
	if(document.frmMain.pants_pants_measurement_inseam_length.value == "")
	{
		alert('Please enter your Inseam Length (Pants)');
		document.frmMain.pants_pants_measurement_inseam_length.focus();
		return false;
	}
	<? } else if($row2['order_product'] == "jacket" || $row3['order_product'] == "jeans" || $row4['order_product'] == "overcoat" || $row6['order_product'] == "shirt" || $row9['order_product'] == "tuxedo_jacket" || $row12['order_product'] == "vest") { } ?>
	<? if($row8['order_product'] == "suits_with_vest" || $row11['order_product'] == "tuxedo_with_vest" || $row12['order_product'] == "vest") { ?>
	if(document.frmMain.vest_vest_measurement_vest_length.value == "")
	{
		alert('Please enter your Front Length (Vest)');
		document.frmMain.vest_vest_measurement_vest_length.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_back_lenght.value == "")
	{
		alert('Please enter your Back Length (Vest)');
		document.frmMain.vest_vest_measurement_back_lenght.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_chest.value == "")
	{
		alert('Please enter your Chest (Vest)');
		document.frmMain.vest_vest_measurement_chest.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_waist_only.value == "")
	{
		alert('Please enter your Waist (Vest)');
		document.frmMain.vest_vest_measurement_waist_only.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_hips.value == "")
	{
		alert('Please enter your Hips (Vest)');
		document.frmMain.vest_vest_measurement_hips.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_ptp_front.value == "")
	{
		alert('Please enter your PTP Front (Vest)');
		document.frmMain.vest_vest_measurement_ptp_front.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_ptp_back.value == "")
	{
		alert('Please enter your PTP Back (Vest)');
		document.frmMain.vest_vest_measurement_ptp_back.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_neck.value == "")
	{
		alert('Please enter your Neck (Vest)');
		document.frmMain.vest_vest_measurement_neck.focus();
		return false;
	}
	if(document.frmMain.vest_vest_measurement_arm_hole.value == "")
	{
		alert('Please enter your Arm Hole (Vest)');
		document.frmMain.vest_vest_measurement_arm_hole.focus();
		return false;
	}
	<? } else if($row2['order_product'] == "jacket" || $row3['order_product'] == "jeans" || $row4['order_product'] == "overcoat" || $row5['order_product'] == "pants" || $row6['order_product'] == "shirt" || $row7['order_product'] == "suits" || $row9['order_product'] == "tuxedo_jacket" || $row10['order_product'] == "tuxedo_suits") { } ?>
	<? if($row6['order_product'] == "shirt") { ?>
	if(document.frmMain.shirt_measurement_shirt_length.value == "")
	{
		alert('Please enter your Front Length (Shirt)');
		document.frmMain.shirt_measurement_shirt_length.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_back_length.value == "")
	{
		alert('Please enter your Back Length (Shirt)');
		document.frmMain.shirt_measurement_back_length.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_chest.value == "")
	{
		alert('Please enter your Chest (Shirt)');
		document.frmMain.shirt_measurement_chest.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_waist_only.value == "")
	{
		alert('Please enter your Waist (Shirt)');
		document.frmMain.shirt_measurement_waist_only.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_hips.value == "")
	{
		alert('Please enter your Hips (Shirt)');
		document.frmMain.shirt_measurement_hips.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_shoulders.value == "")
	{
		alert('Please enter your Shoulders (Shirt)');
		document.frmMain.shirt_measurement_shoulders.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_sleeves_right.value == "")
	{
		alert('Please enter your Sleeves Right (Shirt)');
		document.frmMain.shirt_measurement_sleeves_right.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_sleeves_left.value == "")
	{
		alert('Please enter your Sleeves Left (Shirt)');
		document.frmMain.shirt_measurement_sleeves_left.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_neck.value == "")
	{
		alert('Please enter your Neck (Shirt)');
		document.frmMain.shirt_measurement_neck.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_biceps.value == "")
	{
		alert('Please enter your Biceps (Shirt)');
		document.frmMain.shirt_measurement_biceps.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_forearm.value == "")
	{
		alert('Please enter your Forearm (Shirt)');
		document.frmMain.shirt_measurement_forearm.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_cuff_right.value == "")
	{
		alert('Please enter your Cuff Right (Shirt)');
		document.frmMain.shirt_measurement_cuff_right.focus();
		return false;
	}
	
	if(document.frmMain.shirt_measurement_cuff_left.value == "")
	{
		alert('Please enter your Cuff Left (Shirt)');
		document.frmMain.shirt_measurement_cuff_left.focus();
		return false;
	}
	if(document.frmMain.shirt_measurement_arm_hole.value == "")
	{
		alert('Please enter your Arm Hole (Shirt)');
		document.frmMain.shirt_measurement_arm_hole.focus();
		return false;
	}
	<? } else if($row6['order_product'] != "shirt") { } ?>
	<? if($row4['order_product'] == "overcoat") { ?>
	if(document.frmMain.overcoat_overcoat_measurement_overcoat_length.value == "")
	{
		alert('Please enter your Front Length (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_overcoat_length.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_back_lenght.value == "")
	{
		alert('Please enter your Back Length (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_back_lenght.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_chest.value == "")
	{
		alert('Please enter your Chest (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_chest.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_waist_only.value == "")
	{
		alert('Please enter your Waist (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_waist_only.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_hips.value == "")
	{
		alert('Please enter your Hips (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_hips.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_shoulders.value == "")
	{
		alert('Please enter your Shoulders (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_shoulders.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_sleeves_right.value == "")
	{
		alert('Please enter your Sleeves Right (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_sleeves_right.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_sleeves_left.value == "")
	{
		alert('Please enter your Sleeves Left (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_sleeves_left.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_ptp_front.value == "")
	{
		alert('Please enter your PTP Front (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_ptp_front.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_ptp_back.value == "")
	{
		alert('Please enter your PTP Back (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_ptp_back.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_biceps.value == "")
	{
		alert('Please enter your Biceps (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_biceps.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_arm_hole.value == "")
	{
		alert('Please enter your Arm Hole (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_arm_hole.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_neck.value == "")
	{
		alert('Please enter your Neck (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_neck.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_first_button.value == "")
	{
		alert('Please enter your First Button / Lapel Length (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_first_button.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_wrist_right.value == "")
	{
		alert('Please enter your Wrist Right (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_wrist_right.focus();
		return false;
	}
	if(document.frmMain.overcoat_overcoat_measurement_wrist_left.value == "")
	{
		alert('Please enter your Wrist Left (Overcoat)');
		document.frmMain.overcoat_overcoat_measurement_wrist_left.focus();
		return false;
	}
	<? } else if($row4['order_product'] != "overcoat") { } ?>
	<? if($row3['order_product'] == "jeans") { ?>
	if(document.frmMain.jeans_measurement_waist.value == "")
	{
		alert('Please enter your Waist (Jeans)');
		document.frmMain.jeans_measurement_waist.focus();
		return false;
	}
	if(document.frmMain.jeans_measurement_hips.value == "")
	{
		alert('Please enter your Hips (Jeans)');
		document.frmMain.jeans_measurement_hips.focus();
		return false;
	}
	if(document.frmMain.jeans_measurement_crotch.value == "")
	{
		alert('Please enter your Crotch (Jeans)');
		document.frmMain.jeans_measurement_crotch.focus();
		return false;
	}
	if(document.frmMain.jeans_measurement_thighs.value == "")
	{
		alert('Please enter your Thighs (Jeans)');
		document.frmMain.jeans_measurement_thighs.focus();
		return false;
	}
	if(document.frmMain.jeans_measurement_knees.value == "")
	{
		alert('Please enter your Knees (Jeans)');
		document.frmMain.jeans_measurement_knees.focus();
		return false;
	}
	if(document.frmMain.jeans_measurement_cuffs.value == "")
	{
		alert('Please enter your Cuffs (Jeans)');
		document.frmMain.jeans_measurement_cuffs.focus();
		return false;
	}
	if(document.frmMain.jeans_measurement_length_outleg.value == "")
	{
		alert('Please enter your Length Outleg (Jeans)');
		document.frmMain.jeans_measurement_length_outleg.focus();
		return false;
	}
	<? } else if($row3['order_product'] != "jeans") { } ?>
	document.frmMain.submit();
}
</script> 
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</body>
</html>