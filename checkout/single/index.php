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
	$country = $row_user['reseller_country'];

	if($user == ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
	else if($user != $name){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
	
	$orderid = $_GET["orderid"];
	
	$sqllogo = " SELECT * FROM admin_uploadlogo WHERE uploadlogo_reseller = '$reseller' ";
	$querylogo = mysql_db_query($dbname, $sqllogo) or die("Can't Querylogo");
	$rowlogo = mysql_fetch_array($querylogo);
	
	$sqlcheck =	" SELECT checkout_status_send FROM customize_checkout WHERE checkout_orderid = '$orderid' ";
	$querycheck = mysql_db_query($dbname, $sqlcheck) or die("Can't Querycheck");
	$rowcheck = mysql_fetch_array($querycheck);
	
	$checkorder = $rowcheck['checkout_status_send'];
	
	if($checkorder != ""){ header("HTTP/1.1 301 Moved Permanently"); header('Location: ../../../'); exit(); }
	
	$sqlcountry1 =	" SELECT * FROM admin_country WHERE country_name = '$country' ";
	$querycountry1 = mysql_db_query($dbname, $sqlcountry1) or die("Can't QueryCountry1");
	$rowcountry1 = mysql_fetch_array($querycountry1);
	
	$currency = $rowcountry1['country_currency'];
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
<link rel="stylesheet" href="../../css/datatables.css">
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
<title>RESELLER ONLINE | Checkout</title>
</head>
<body>
<section class="body" style="background-color:#FFFFFF;">
  <? if($orderid == '') { ?>
  <div class="mobileShow row">
    <div class="row show-grid">
      <div class="col-md-12" align="center"> <a href="../../category/single/"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a> </div>
    </div>
    <div>
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../placeorder/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
    </div>
  </div>
  <header class="mobileHide header"> &nbsp;&nbsp;<a href="../../category/single/"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../placeorder/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/">
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
      <div class="col-md-12" align="center"> <a href="../../category/single/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a> </div>
    </div>
    <div>
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../placeorder/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileShow"> <a href="../../logout/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> LOGOUT </div>
          </a> </li>
      </ul>
    </div>
  </div>
  <header class="mobileHide header"> &nbsp;&nbsp;<a href="../../category/single/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$rowlogo['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li class="mobileHide"> <a href="../../home.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li> <a href="../../category/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> CATEGORY </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../placeorder/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/index.php?orderid=<?=$orderid?>">
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
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Checkout </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <div class="row">
        <div class="row show-grid">
          <form class="form-horizontal form-bordered" action="../../include/single/customize_checkout.php" method="post" enctype="multipart/form-data" name="frmMain">
            <input type="hidden" id="checkout_orderid" name="checkout_orderid" value="<?=$orderid?>" required>
            <input type="hidden" name="checkout_company" id="checkout_company" value="<?=$row_user['reseller_company'];?>" readonly>
            <input type="hidden" name="checkout_name" id="checkout_name" value="<?=$row_user['reseller_firstname'];?>" required>
            <input type="hidden" name="checkout_lastname" id="checkout_lastname" value="<?=$row_user['reseller_lastname'];?>" required>
            <input type="hidden" name="checkout_address" id="checkout_address" value="<?=$row_user['reseller_address'];?>" required>
            <input type="hidden" name="checkout_city" id="checkout_city" value="<?=$row_user['reseller_city'];?>" required>
            <input type="hidden" name="checkout_state" id="checkout_state" value="<?=$row_user['reseller_state'];?>" required>
            <input type="hidden" name="checkout_country" id="checkout_country" value="<?=$row_user['reseller_country'];?>" required>
            <input type="hidden" name="checkout_zipcode" id="checkout_zipcode" value="<?=$row_user['reseller_zipcode'];?>" required>
            <input type="hidden" name="checkout_email" id="checkout_email" value="<?=$row_user['reseller_email'];?>" required>
            <input type="hidden" name="checkout_phone" id="checkout_phone" value="<?=$row_user['reseller_phone'];?>" required>
            <div class="col-md-12">
              <div class="col-md-12">
                <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:28px; letter-spacing:1px;"> <strong> Your Orders </strong> </div>
                <br>
              </div>
              <table class="table table-striped mb-none">
                <tbody>
                  <?
              $strSQL1 = " SELECT * FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ORDER BY id ASC "; 
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			  ?>
                  <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
                  <tr class="gradeX">
                    <td align="center" valign="middle"><? $order_product = $objResult1["order_product"]; ?>
                      <? if ($order_product == "jacket") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_jacket WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "jeans") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_jeans WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "overcoat") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_overcoat WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "pants") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_pants WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "shirt") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_shirt WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "suits") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_suits WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "suits_with_vest") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_suits_with_vest WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "ties") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_ties WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/ties/<?=$fabrics_show?>?v=1001" width="70" height="50" onerror="this.src='../../images/ties/0.jpg?v=1001';">
                      <? } else if ($order_product == "tuxedo_jacket") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "tuxedo_suits") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "tuxedo_with_vest") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } else if ($order_product == "vest") { ?>
                      <?
				  $fabrics_picture = $objResult1["order_fabric_no"];
                  $sql1 =	" SELECT image FROM admin_fabrics_vest WHERE fabricno = '$fabrics_picture' ";
				  $query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
				  $row1 = mysql_fetch_array($query1);
				  $fabrics_show = $row1["image"];
				  ?>
                      <img src="../../images/fabrics/<?=$fabrics_show?>?v=1001" width="70" height="70" onerror="this.src='../../images/fabrics/0.jpg?v=1001';">
                      <? } ?></td>
                    <td align="left" valign="middle"><? 
				$fabric = $objResult1["order_fabric_no"]; 
				$order_product = $objResult1["order_product"];
				?>
                      <? if ($order_product == "jacket") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_jacket WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Jacket </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "jeans") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_jeans WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Jeans </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "overcoat") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_overcoat WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Overcoat </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "pants") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_pants WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Pants </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "shirt") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_shirt WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Shirt </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "suits") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_suits WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Suits </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "suits_with_vest") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_suits_with_vest WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Suits With Vest </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "ties") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_ties WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        <?=$objResult2["design"]?>
                        Ties </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Tie Number
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "tuxedo_jacket") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_jacket WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Tuxedo Jacket </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "tuxedo_suits") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_suits WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Tuxedo Suits </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "tuxedo_with_vest") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_tuxedo_with_vest WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Tuxedo With Vest </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } else if ($order_product == "vest") { ?>
                      <?
                $strSQL2 = " SELECT * FROM admin_fabrics_vest WHERE fabricno = '$fabric' "; 
			  	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$objResult2["color"]?>
                        <?=$objResult2["pattern"]?>
                        Vest </div>
                      <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Fabric Number :
                        <?=$objResult2["fabricno"]?>
                      </div>
                      <? } ?></td>
                    <td align="right" valign="middle"><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                        <?=$currency?>
                        <?=$objResult1["order_price"]?>
                      </div></td>
                  </tr>
                  <? } ?>
                <br>
                <tr class="gradeX">
                  <td valign="middle"></td>
                  <td valign="middle"></td>
                  <td valign="middle" align="right"><?
                  $strSQL3 = " SELECT SUM(order_price) FROM customize_order WHERE order_id = '$orderid' AND order_status = 'T' ";
				  $objQuery3 = mysql_query($strSQL3) or die("Can't Query3");
				  $objResult3 = mysql_fetch_array($objQuery3); 
				  ?>
                    <input type="hidden" id="checkout_price" name="checkout_price" value="<?=$objResult3["SUM(order_price)"]?>" required>
                    <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:18px; letter-spacing:1px;"> <strong> Total </strong> &nbsp;&nbsp;&nbsp;&nbsp;
                      <?=$currency?>
                      <?=$objResult3["SUM(order_price)"]?>
                    </div></td>
                </tr>
                  </tbody>
                
              </table>
              <div class="col-md-12" align="right"> <br>
                <button class="btn btn-primary" type="submit" style="font-family: 'Roboto', sans-serif; color:#FFFFFF; font-size:14px; letter-spacing:1px; background-color:#000000;"> SAVE ORDER </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</section>
<script src="../../js/modernizr.js"></script> 
<script src="../../js/jquery.js"></script> 
<script src="../../js/bootstrap.js"></script> 
<script src="../../js/nanoscroller.js"></script> 
<script src="../../js/jquery.dataTables.js"></script> 
<script src="../../js/datatables.js"></script> 
<script src="../../js/theme.js"></script> 
<script src="../../js/theme.custom.js"></script> 
<script src="../../js/theme.init.js"></script> 
<script src="../../js/examples.datatables.default.js"></script>
</body>
</html>