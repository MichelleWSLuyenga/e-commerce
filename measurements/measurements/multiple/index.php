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
	
	$sql1 =	" SELECT * FROM admin_uploadlogo WHERE uploadlogo_reseller = '$reseller' ";
	$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
	$row1 = mysql_fetch_array($query1);
	
	$sql2 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'jacket' ";
	$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
	$row2 = mysql_fetch_array($query2);
	
	$sql3 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'jeans' ";
	$query3 = mysql_db_query($dbname, $sql3) or die("Can't Query3");
	$row3 = mysql_fetch_array($query3);
	
	$sql4 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'overcoat' ";
	$query4 = mysql_db_query($dbname, $sql4) or die("Can't Query4");
	$row4 = mysql_fetch_array($query4);
	
	$sql5 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'pants' ";
	$query5 = mysql_db_query($dbname, $sql5) or die("Can't Query5");
	$row5 = mysql_fetch_array($query5);
	
	$sql6 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'shirt' ";
	$query6 = mysql_db_query($dbname, $sql6) or die("Can't Query6");
	$row6 = mysql_fetch_array($query6);
	
	$sql7 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'suits' ";
	$query7 = mysql_db_query($dbname, $sql7) or die("Can't Query7");
	$row7 = mysql_fetch_array($query7);
	
	$sql8 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'suits_with_vest' ";
	$query8 = mysql_db_query($dbname, $sql8) or die("Can't Query8");
	$row8 = mysql_fetch_array($query8);
	
	$sql9 =	" SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'tuxedo_jacket' ";
	$query9 = mysql_db_query($dbname, $sql9) or die("Can't Query9");
	$row9 = mysql_fetch_array($query9);
	
	$sql10 = " SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'tuxedo_suits' ";
	$query10 = mysql_db_query($dbname, $sql10) or die("Can't Query10");
	$row10 = mysql_fetch_array($query10);
	
	$sql11 = " SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'tuxedo_with_vest' ";
	$query11 = mysql_db_query($dbname, $sql11) or die("Can't Query11");
	$row11 = mysql_fetch_array($query11);
	
	$sql12 = " SELECT DISTINCT(order_product) FROM customize_order WHERE order_id = '$orderid' AND order_product = 'vest' ";
	$query12 = mysql_db_query($dbname, $sql12) or die("Can't Query12");
	$row12 = mysql_fetch_array($query12);
	
	$sql13 = " SELECT DISTINCT order_order_no FROM customize_order WHERE order_id = '$orderid' ";
	$query13 = mysql_db_query($dbname, $sql13) or die("Can't Query13");
	$row13 = mysql_fetch_array($query13);
	
	$sql14 = " SELECT DISTINCT order_name_customize FROM customize_order WHERE order_id = '$orderid' ";
	$query14 = mysql_db_query($dbname, $sql14) or die("Can't Query14");
	$row14 = mysql_fetch_array($query14);
	
	$sqlcheck =	" SELECT checkout_status_process FROM customize_checkout WHERE checkout_orderid = '$orderid' ";
	$querycheck = mysql_db_query($dbname, $sqlcheck) or die("Can't Querycheck");
	$rowcheck = mysql_fetch_array($querycheck);
	
	$checkorder = $rowcheck['checkout_status_process'];
	
	if($checkorder != ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
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
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
	}
</script>
<script>
function JacketFrontLength()
{
  var m1 = document.getElementById('jacket_jacket_measurement_jacket_length');
  var m2 = document.getElementById('vest_vest_measurement_vest_length');
  var m3 = document.getElementById('shirt_measurement_shirt_length');
  var m4 = document.getElementById('overcoat_overcoat_measurement_overcoat_length');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketBackLength()
{
  var m1 = document.getElementById('jacket_jacket_measurement_back_lenght');
  var m2 = document.getElementById('vest_vest_measurement_back_lenght');
  var m3 = document.getElementById('shirt_measurement_back_length');
  var m4 = document.getElementById('overcoat_overcoat_measurement_back_lenght');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketChest()
{
  var m1 = document.getElementById('jacket_jacket_measurement_chest');
  var m2 = document.getElementById('vest_vest_measurement_chest');
  var m3 = document.getElementById('shirt_measurement_chest');
  var m4 = document.getElementById('overcoat_overcoat_measurement_chest');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketShoulders()
{
  var m1 = document.getElementById('jacket_jacket_measurement_shoulders');
  var m2 = document.getElementById('vest_vest_measurement_shoulders');
  var m3 = document.getElementById('shirt_measurement_shoulders');
  var m4 = document.getElementById('overcoat_overcoat_measurement_shoulders');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketWaistUpper()
{
  var m1 = document.getElementById('jacket_jacket_measurement_waist_upper');
  var m2 = document.getElementById('vest_vest_measurement_waist_upper');
  var m3 = document.getElementById('shirt_measurement_waist_upper');
  var m4 = document.getElementById('overcoat_overcoat_measurement_waist_upper');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketWaistLower()
{
  var m1 = document.getElementById('jacket_jacket_measurement_waist_lower');
  var m2 = document.getElementById('vest_vest_measurement_waist_lower');
  var m3 = document.getElementById('shirt_measurement_waist_lower');
  var m4 = document.getElementById('overcoat_overcoat_measurement_waist_lower');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketHips()
{
  var m1 = document.getElementById('jacket_jacket_measurement_hips');
  var m2 = document.getElementById('vest_vest_measurement_hips');
  var m3 = document.getElementById('shirt_measurement_hips');
  var m4 = document.getElementById('overcoat_overcoat_measurement_hips');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketNeck()
{
  var m1 = document.getElementById('jacket_jacket_measurement_neck');
  var m2 = document.getElementById('vest_vest_measurement_neck');
  var m3 = document.getElementById('shirt_measurement_neck');
  var m4 = document.getElementById('overcoat_overcoat_measurement_neck');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketPTPFront()
{
  var m1 = document.getElementById('jacket_jacket_measurement_ptp_front');
  var m2 = document.getElementById('vest_vest_measurement_ptp_front');
  var m3 = document.getElementById('overcoat_overcoat_measurement_ptp_front');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function JacketPTPBack()
{
  var m1 = document.getElementById('jacket_jacket_measurement_ptp_back');
  var m2 = document.getElementById('vest_vest_measurement_ptp_back');
  var m3 = document.getElementById('overcoat_overcoat_measurement_ptp_back');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function JacketArmHole()
{
  var m1 = document.getElementById('jacket_jacket_measurement_arm_hole');
  var m2 = document.getElementById('vest_vest_measurement_arm_hole');
  var m3 = document.getElementById('overcoat_overcoat_measurement_arm_hole');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function JacketBiceps()
{
  var m1 = document.getElementById('jacket_jacket_measurement_biceps');
  var m2 = document.getElementById('vest_vest_measurement_biceps');
  var m3 = document.getElementById('shirt_measurement_biceps');
  var m4 = document.getElementById('overcoat_overcoat_measurement_biceps');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketSleevesRight()
{
  var m1 = document.getElementById('jacket_jacket_measurement_sleeves_right');
  var m2 = document.getElementById('vest_vest_measurement_sleeves_right');
  var m3 = document.getElementById('shirt_measurement_sleeves_right');
  var m4 = document.getElementById('overcoat_overcoat_measurement_sleeves_right');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketSleevesLeft()
{
  var m1 = document.getElementById('jacket_jacket_measurement_sleeves_left');
  var m2 = document.getElementById('vest_vest_measurement_sleeves_left');
  var m3 = document.getElementById('shirt_measurement_sleeves_left');
  var m4 = document.getElementById('overcoat_overcoat_measurement_sleeves_left');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function JacketWristRight()
{
  var m1 = document.getElementById('jacket_jacket_measurement_wrist_right');
  var m2 = document.getElementById('shirt_measurement_wrist_right');
  var m3 = document.getElementById('overcoat_overcoat_measurement_wrist_right');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function JacketWristLeft()
{
  var m1 = document.getElementById('jacket_jacket_measurement_wrist_left');
  var m2 = document.getElementById('vest_vest_measurement_wrist_left');
  var m3 = document.getElementById('shirt_measurement_wrist_left');
  var m4 = document.getElementById('overcoat_overcoat_measurement_wrist_left');
  m2.value = m1.value;
  m3.value = m1.value;
  m4.value = m1.value;
}
</script>
<script>
function PantsWaist()
{
  var m1 = document.getElementById('pants_pants_measurement_waist');
  var m2 = document.getElementById('jeans_measurement_waist');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function PantsHips()
{
  var m1 = document.getElementById('pants_pants_measurement_hips');
  var m2 = document.getElementById('jeans_measurement_hips');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function PantsThighs()
{
  var m1 = document.getElementById('pants_pants_measurement_thighs');
  var m2 = document.getElementById('jeans_measurement_thighs');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function PantsKnees()
{
  var m1 = document.getElementById('pants_pants_measurement_knees');
  var m2 = document.getElementById('jeans_measurement_knees');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function PantsCuffsAnkle()
{
  var m1 = document.getElementById('pants_pants_measurement_cuffs_ankle');
  var m2 = document.getElementById('jeans_measurement_cuffs_ankle');
  m2.value = m1.value;
  m3.value = m1.value;
}
</script>
<script>
function PantsLengthOutleg()
{
  var m1 = document.getElementById('pants_pants_measurement_length_outleg');
  var m2 = document.getElementById('jeans_measurement_length_outleg');
  m2.value = m1.value;
  m3.value = m1.value;
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
<section class="body" style="background-color:#FFF;">
  <? if($orderid == '') { ?>
  <div class="mobileShow row">
    <div class="row show-grid">
      <div class="col-md-12" align="center"> <a href="../../category/multiple/"><img src="../../images/logo/<?=$row1['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a> </div>
    </div>
    <div>
      <ul class="notifications">
        <li> <a href="../../category/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../history/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
    </div>
  </div>
  <header class="mobileHide header"> &nbsp;&nbsp;<a href="../../category/multiple/"><img src="../../images/logo/<?=$row1['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li> <a href="../../category/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../history/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
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
      <div class="col-md-12" align="center"> <a href="../../category/multiple/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$row1['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a> </div>
    </div>
    <div>
      <ul class="notifications">
        <li> <a href="../../category/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../history/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
    </div>
  </div>
  <header class="mobileHide header"> &nbsp;&nbsp;<a href="../../category/multiple/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$row1['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li> <a href="../../category/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/multiple/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../history/multiple/index.php?orderid=<?=$orderid?>">
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
  <div class="inner-wrapper" style="background-color:#FFF;">
    <section role="main" class="content-body">
      <header class="page-header">
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Measurements </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <div class="row">
        <div class="row show-grid">
          <form class="form-horizontal form-bordered" action="../../include/single/customize_measurements.php" method="post" enctype="multipart/form-data" name="frmMain">
            <input type="hidden" id="item_orderid" name="item_orderid" value="<?=$orderid?>">
            <input type="hidden" id="user_id" name="user_id" value="<?=$row_user['id'];?>">
            <input type="hidden" id="user_name" name="user_name" value="<?=$row_user['reseller_company'];?>">
            <div class="col-md-12">
              <div class="col-md-3">
                <div class="form-group">
                  <label>
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Customer Name </div>
                  </label>
                  <? if($orderid == '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:180px;" type="text" name="item_customer_name" id="item_customer_name" required>
                  <? } else if($orderid != '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:180px;" type="text" name="item_customer_name" id="item_customer_name" value="<?=$row14['order_name_customize'];?>" readonly>
                  <? } ?>
                  <br class="mobileShow">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Your Order No </div>
                  </label>
                  <? if($orderid == '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:180px;" type="text" name="item_order_no" id="item_order_no" required>
                  <? } else if($orderid != '') { ?>
                  <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:180px;" type="text" name="item_order_no" id="item_order_no" value="<?=$row13['order_order_no'];?>" readonly>
                  <? } ?>
                  <br class="mobileShow">
                </div>
              </div>
              <div class="col-md-3"> </div>
              <div class="col-md-3"> </div>
            </div>
            <div class="col-md-12"> <br>
            </div>
            <div class="col-md-12">
              <button class="btn btn-primary" type="submit" style="font-family: 'Roboto', sans-serif; color:#FFFFFF; font-size:14px; letter-spacing:1px; background-color:#C00;" onClick="JavaScript:return validate();"> SAVE MEASUREMENTS </button>
            </div>
            
            <!--JACKET MEASUREMENTS-->
            <div class="col-md-12">
              <div class="col-md-6">
                <div class="col-md-12"> <br>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> JACKET MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" name="jacket_jacket_measurement_fit" id="jacket_jacket_measurement_fit">
                      <? if($rowmeasurements1['jacket_jacket_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements1['jacket_jacket_measurement_fit']?>">
                      <?=$rowmeasurements1['jacket_jacket_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements1['jacket_jacket_measurement_fit'] != "") { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Front Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_jacket_length" id="jacket_jacket_measurement_jacket_length" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketFrontLength()" value="<?=$rowmeasurements1['jacket_jacket_measurement_jacket_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Back Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_back_lenght" id="jacket_jacket_measurement_back_lenght" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketBackLength()" value="<?=$rowmeasurements1['jacket_jacket_measurement_back_lenght']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Chest </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_chest" id="jacket_jacket_measurement_chest" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketChest()" value="<?=$rowmeasurements1['jacket_jacket_measurement_chest']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Shoulders </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_shoulders" id="jacket_jacket_measurement_shoulders" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketShoulders()" value="<?=$rowmeasurements1['jacket_jacket_measurement_shoulders']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Shoulder to Upper Waist </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_shoulder_upper_wrist" id="jacket_jacket_measurement_shoulder_upper_wrist" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_shoulder_upper_wrist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Shoulder to Lower Waist </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_shoulder_lower_wrist" id="jacket_jacket_measurement_shoulder_lower_wrist" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_shoulder_lower_wrist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Upper </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_waist_upper" id="jacket_jacket_measurement_waist_upper" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketWaistUpper()" value="<?=$rowmeasurements1['jacket_jacket_measurement_waist_upper']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Lower </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_waist_lower" id="jacket_jacket_measurement_waist_lower" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketWaistLower()" value="<?=$rowmeasurements1['jacket_jacket_measurement_waist_lower']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Hips </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_hips" id="jacket_jacket_measurement_hips" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketHips()" value="<?=$rowmeasurements1['jacket_jacket_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Neck </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_neck" id="jacket_jacket_measurement_neck" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketNeck()" value="<?=$rowmeasurements1['jacket_jacket_measurement_neck']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> PTP Front </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_ptp_front" id="jacket_jacket_measurement_ptp_front" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketPTPFront()" value="<?=$rowmeasurements1['jacket_jacket_measurement_ptp_front']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> PTP Back </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_ptp_back" id="jacket_jacket_measurement_ptp_back" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketPTPBack()" value="<?=$rowmeasurements1['jacket_jacket_measurement_ptp_back']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Arm Hole </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_arm_hole" id="jacket_jacket_measurement_arm_hole" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketArmHole()" value="<?=$rowmeasurements1['jacket_jacket_measurement_arm_hole']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Biceps </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_biceps" id="jacket_jacket_measurement_biceps" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketBiceps()" value="<?=$rowmeasurements1['jacket_jacket_measurement_biceps']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_sleeves_right" id="jacket_jacket_measurement_sleeves_right" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketSleevesRight()" value="<?=$rowmeasurements1['jacket_jacket_measurement_sleeves_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_sleeves_left" id="jacket_jacket_measurement_sleeves_left" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketSleevesLeft()" value="<?=$rowmeasurements1['jacket_jacket_measurement_sleeves_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Wrist Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_wrist_right" id="jacket_jacket_measurement_wrist_right" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketWristRight()" value="<?=$rowmeasurements1['jacket_jacket_measurement_wrist_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Wrist Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_wrist_left" id="jacket_jacket_measurement_wrist_left" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="JacketWristLeft()" value="<?=$rowmeasurements1['jacket_jacket_measurement_wrist_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> First Button / Lapel Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jacket_jacket_measurement_first_button" id="jacket_jacket_measurement_first_button" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements1['jacket_jacket_measurement_first_button']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> PANTS MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Length </div>
                    <select class="form-control" name="pants_pants_measurement_length" id="pants_pants_measurement_length">
                      <? if($rowmeasurements2['pants_pants_measurement_length'] != "") { ?>
                      <option value="<?=$rowmeasurements2['pants_pants_measurement_length']?>">
                      <?=$rowmeasurements2['pants_pants_measurement_length']?>
                      </option>
                      <? } else if($rowmeasurements2['pants_pants_measurement_length'] != "") { } ?>
                      <option value="LONG">LONG</option>
                      <option value="SHORT">SHORT</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" name="pants_pants_measurement_fit" id="pants_pants_measurement_fit">
                      <? if($rowmeasurements2['pants_pants_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements2['pants_pants_measurement_fit']?>">
                      <?=$rowmeasurements2['pants_pants_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements2['pants_pants_measurement_fit'] != "") { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_waist" id="pants_pants_measurement_waist" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="PantsWaist()" value="<?=$rowmeasurements2['pants_pants_measurement_waist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Hips </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_hips" id="pants_pants_measurement_hips" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="PantsHips()" value="<?=$rowmeasurements2['pants_pants_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Front Rise </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_front_rise" id="pants_pants_measurement_front_rise" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_front_rise']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Full Crotch </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_crotch_full" id="pants_pants_measurement_crotch_full" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_crotch_full']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Front Crotch </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_crotch_front" id="pants_pants_measurement_crotch_front" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_crotch_front']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Back Crotch </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_crotch_back" id="pants_pants_measurement_crotch_back" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_crotch_back']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Inseam Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_inseam_length" id="pants_pants_measurement_inseam_length" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_inseam_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Thighs </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_thighs" id="pants_pants_measurement_thighs" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="PantsThighs()" value="<?=$rowmeasurements2['pants_pants_measurement_thighs']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Knees </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_knees" id="pants_pants_measurement_knees" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="PantsKnees()" value="<?=$rowmeasurements2['pants_pants_measurement_knees']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Cuffs Ankle </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_cuffs_ankle" id="pants_pants_measurement_cuffs_ankle" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="PantsCuffsAnkle()" value="<?=$rowmeasurements2['pants_pants_measurement_cuffs_ankle']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Length Outleg </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_length_outleg" id="pants_pants_measurement_length_outleg" maxlength="6" OnKeyPress="return chkNumber(this)" onkeyup="PantsLengthOutleg()" value="<?=$rowmeasurements2['pants_pants_measurement_length_outleg']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Only Crotch </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_only_crotch" id="pants_pants_measurement_only_crotch" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_only_crotch']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Cuffs </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="pants_pants_measurement_cuffs" id="pants_pants_measurement_cuffs" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements2['pants_pants_measurement_cuffs']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> VEST MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" name="vest_vest_measurement_fit" id="vest_vest_measurement_fit">
                      <? if($rowmeasurements3['vest_vest_measurement_fit'] != "") { ?>
                      <option value="<?=$rowmeasurements3['vest_vest_measurement_fit']?>">
                      <?=$rowmeasurements3['vest_vest_measurement_fit']?>
                      </option>
                      <? } else if($rowmeasurements3['vest_vest_measurement_fit'] != "") { } ?>
                      <option value="SLIM">SLIM</option>
                      <option value="REGULAR">REGULAR</option>
                      <option value="VERY SLIM">VERY SLIM</option>
                      <option value="LOOSE">LOOSE</option>
                    </select>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Front Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_vest_length" id="vest_vest_measurement_vest_length" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_vest_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Back Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_back_lenght" id="vest_vest_measurement_back_lenght" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_back_lenght']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Chest </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_chest" id="vest_vest_measurement_chest" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_chest']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Upper </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_waist_upper" id="vest_vest_measurement_waist_upper" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_waist_upper']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Lower </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_waist_lower" id="vest_vest_measurement_waist_lower" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_waist_lower']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Hips </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_hips" id="vest_vest_measurement_hips" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Shoulders </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_shoulders" id="vest_vest_measurement_shoulders" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_shoulders']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_sleeves_right" id="vest_vest_measurement_sleeves_right" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_sleeves_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_sleeves_left" id="vest_vest_measurement_sleeves_left" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_sleeves_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Neck </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_neck" id="vest_vest_measurement_neck" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_neck']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> PTP Front </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_ptp_front" id="vest_vest_measurement_ptp_front" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_ptp_front']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> PTP Back </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_ptp_back" id="vest_vest_measurement_ptp_back" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_ptp_back']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Arm Hole </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_arm_hole" id="vest_vest_measurement_arm_hole" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_arm_hole']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Biceps </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="vest_vest_measurement_biceps" id="vest_vest_measurement_biceps" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements3['vest_vest_measurement_biceps']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> SHIRT MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves </div>
                    <select class="form-control" name="shirt_measurement_sleeves" id="shirt_measurement_sleeves">
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
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" name="shirt_measurement_fit" id="shirt_measurement_fit">
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
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Front Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_shirt_length" id="shirt_measurement_shirt_length" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_shirt_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Back Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_back_length" id="shirt_measurement_back_length" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_back_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Chest </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_chest" id="shirt_measurement_chest" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_chest']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Upper </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_waist_upper" id="shirt_measurement_waist_upper" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_waist_upper']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Lower </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_waist_lower" id="shirt_measurement_waist_lower" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_waist_lower']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Hips </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_hips" id="shirt_measurement_hips" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Shoulders </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_shoulders" id="shirt_measurement_shoulders" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_shoulders']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_sleeves_right" id="shirt_measurement_sleeves_right" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_sleeves_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_sleeves_left" id="shirt_measurement_sleeves_left" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_sleeves_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Neck </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_neck" id="shirt_measurement_neck" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_neck']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Biceps </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_biceps" id="shirt_measurement_biceps" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_biceps']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Wrist Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_wrist_right" id="shirt_measurement_wrist_right" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_wrist_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Wrist Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_wrist_left" id="shirt_measurement_wrist_left" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_wrist_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Forearm </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="shirt_measurement_forearm" id="shirt_measurement_forearm" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements4['shirt_measurement_forearm']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> OVERCOAT MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Fit </div>
                    <select class="form-control" name="overcoat_overcoat_measurement_fit" id="overcoat_overcoat_measurement_fit">
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
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Front Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_overcoat_length" id="overcoat_overcoat_measurement_overcoat_length" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_overcoat_length']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Back Length </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_back_lenght" id="overcoat_overcoat_measurement_back_lenght" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_back_lenght']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Chest </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_chest" id="overcoat_overcoat_measurement_chest" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_chest']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Upper </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_waist_upper" id="overcoat_overcoat_measurement_waist_upper" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_waist_upper']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist Lower </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_waist_lower" id="overcoat_overcoat_measurement_waist_lower" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_waist_lower']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Hips </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_hips" id="overcoat_overcoat_measurement_hips" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Shoulders </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_shoulders" id="overcoat_overcoat_measurement_shoulders" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_shoulders']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Neck </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_neck" id="overcoat_overcoat_measurement_neck" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_neck']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> PTP Front </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_ptp_front" id="overcoat_overcoat_measurement_ptp_front" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_ptp_front']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> PTP Back </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_ptp_back" id="overcoat_overcoat_measurement_ptp_back" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_ptp_back']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Arm Hole </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_arm_hole" id="overcoat_overcoat_measurement_arm_hole" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_arm_hole']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Biceps </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_biceps" id="overcoat_overcoat_measurement_biceps" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_biceps']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_sleeves_right" id="overcoat_overcoat_measurement_sleeves_right" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_sleeves_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sleeves Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_sleeves_left" id="overcoat_overcoat_measurement_sleeves_left" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_sleeves_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Wrist Right </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_wrist_right" id="overcoat_overcoat_measurement_wrist_right" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_wrist_right']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Wrist Left </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="overcoat_overcoat_measurement_wrist_left" id="overcoat_overcoat_measurement_wrist_left" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements5['overcoat_overcoat_measurement_wrist_left']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> JEANS MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Waist </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_waist" id="jeans_measurement_waist" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_waist']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Hips </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_hips" id="jeans_measurement_hips" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_hips']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Crotch </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_crotch" id="jeans_measurement_crotch" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_crotch']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Thighs </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_thighs" id="jeans_measurement_thighs" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_thighs']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Knees </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_knees" id="jeans_measurement_knees" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_knees']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Cuffs Ankle </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_cuffs_ankle" id="jeans_measurement_cuffs_ankle" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_cuffs_ankle']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Length Outleg </div>
                    <div class="input-group input-group-icon">
                      <input class="form-control" style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px; width:150px;" type="text" name="jeans_measurement_length_outleg" id="jeans_measurement_length_outleg" maxlength="6" OnKeyPress="return chkNumber(this)" value="<?=$rowmeasurements6['jeans_measurement_length_outleg']?>">
                      <span class="input-group-addon"> <span class="icon">inch</span> </span> </div>
                    <br>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-12"> <br>
                </div>
                <div class="accordion"> <br>
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> MEASUREMENTS </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="left">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Sex </div>
                    <select class="form-control" name="item_measurement_sex" id="item_measurement_sex">
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
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> Measurement </div>
                    <select class="form-control" name="item_measurement" id="item_measurement">
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
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> SHOULDER </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="2">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Square </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="3">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/4.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Slop Left </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="4">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/5.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Slop Right </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_shoulder" id="item_measurement_jacket_shoulder" value="5">
                    <img class="img-responsive" src="../../../images/customize/jacket/shoulders/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Sloping Left+Right </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> WAIST </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Flat </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="2">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="3">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Large </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_waist" id="item_measurement_jacket_waist" value="4">
                    <img class="img-responsive" src="../../../images/customize/jacket/waist/4.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Stout </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> CHEST </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Straight </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="2">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="3">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Hollow </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_jacket_chest" id="item_measurement_jacket_chest" value="4">
                    <img class="img-responsive" src="../../../images/customize/jacket/chest/4.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Hunched </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> WAIST </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_waist" id="item_measurement_pants_waist" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/pants/waist/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> High Waist </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_waist" id="item_measurement_pants_waist" value="2">
                    <img class="img-responsive" src="../../../images/customize/pants/waist/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Medium Lower Waist </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_waist" id="item_measurement_pants_waist" value="3">
                    <img class="img-responsive" src="../../../images/customize/pants/waist/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Very Lower Waist </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> BOTTOM </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_bottom" id="item_measurement_pants_bottom" value="1" checked="checked">
                    <img class="img-responsive" src="../../../images/customize/pants/bottom/1.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Normal </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_bottom" id="item_measurement_pants_bottom" value="2">
                    <img class="img-responsive" src="../../../images/customize/pants/bottom/2.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Flat </div>
                    </label>
                  </div>
                  <div class="col-md-3" align="center">
                    <label>
                    <input type="radio" name="item_measurement_pants_bottom" id="item_measurement_pants_bottom" value="3">
                    <img class="img-responsive" src="../../../images/customize/pants/bottom/3.jpg?v=1001">
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Prominent </div>
                    </label>
                  </div>
                </div>
                <div class="accordion">
                  <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:14px; letter-spacing:1px;"> <i class="fa fa-caret-right"></i> <strong> CLIENT BODY POSTURE - PICTURES </strong> </div>
                  <hr>
                </div>
                <div class="panel">
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Front </div>
                    </label>
                    <input type="file" name="item_body_front" id="item_body_front">
                  </div>
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Left </div>
                    </label>
                    <input type="file" name="item_body_left" id="item_body_left">
                  </div>
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Right </div>
                    </label>
                    <input type="file" name="item_body_right" id="item_body_right">
                  </div>
                  <div class="col-md-6" align="center">
                    <label>
                    <div style="font-family: 'Roboto', sans-serif; color:#000; font-size:12px; letter-spacing:1px;"> Back </div>
                    </label>
                    <input type="file" name="item_body_back" id="item_body_back">
                  </div>
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
<script language="javascript">
function validate()
{
	if(document.frmMain.item_customer_name.value == "")
	{
		alert('Please enter your Customer Name');
		document.frmMain.item_customer_name.focus();
		return false;
	}
	if(document.frmMain.item_order_no.value == "")
	{
		alert('Please enter your Order No');
		document.frmMain.item_order_no.focus();
		return false;
	}
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