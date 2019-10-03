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
	
	$sqlcheck =	" SELECT checkout_status_send FROM customize_checkout WHERE checkout_orderid = '$orderid' ";
	$querycheck = mysql_db_query($dbname, $sqlcheck) or die("Can't Querycheck");
	$rowcheck = mysql_fetch_array($querycheck);
	
	$checkorder = $rowcheck['checkout_status_send'];
	
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
<title>RESELLER ONLINE | History</title>
</head>
<body>
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
        <li> <a href="../../placeorder/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
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
        <li> <a href="../../placeorder/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/">
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
        <li> <a href="../../placeorder/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
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
        <li> <a href="../../placeorder/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> PLACE ORDER </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../history/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HISTORY </div>
          </a> </li>
        <li> <a href="../../cart/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> <i class="fa fa-shopping-cart"></i> CART </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
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
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> History </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <div class="row">
        <div class="row show-grid">
          <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
              <tr>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Invoice Number </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Order No </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Date </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Jacket </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Jeans </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Overcoat </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Pants </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Shirt </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Suits </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Suits with Vest </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Tuxedo Jacket </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Tuxedo Suits </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Tuxedo with Vest </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Vest </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Ties </div>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Invoice </div>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Place Order </div> </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Status </div>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Payment </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?
			  $reseller_company = $row_user['reseller_company'];
              $strSQL = " SELECT * FROM customize_checkout WHERE checkout_company = '$reseller_company' AND checkout_status = 'T' AND checkout_status_send = 'send' ORDER BY id DESC "; 
			  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			  ?>
              <? while($objResult = mysql_fetch_array($objQuery)) { ?>
              <tr class="gradeX">
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_invoice'];?>
                    -
                    <?=$objResult['checkout_number'];?>
                  </div></td>
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_order'];?>
                  </div></td>
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?
          			$strDate = $objResult['checkout_date'];
		  			echo DateEng($strDate);
		  			?>
                  </div></td>
                <td align="center"><?
                $strSQL1 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'jacket' ORDER BY rand() LIMIT 1 ";	
				$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
				$objResult1 = mysql_fetch_array($objQuery1);
				?>
                  <? if ($objResult1['order_id'] != '' && $objResult['checkout_jacket'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_jacket'];?>
                  </div>
                  <a href="../../pdf/order_jacket.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult1['order_id'] == '' || $objResult['checkout_jacket'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL2 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'jeans' ORDER BY rand() LIMIT 1 ";	
				$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$objResult2 = mysql_fetch_array($objQuery2);
				?>
                  <? if ($objResult2['order_id'] != '' && $objResult['checkout_jeans'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_jeans'];?>
                  </div>
                  <a href="../../pdf/order_jeans.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult2['order_id'] == '' || $objResult['checkout_jeans'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL3 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'overcoat' ORDER BY rand() LIMIT 1 ";	
				$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
				$objResult3 = mysql_fetch_array($objQuery3);
				?>
                  <? if ($objResult3['order_id'] != '' && $objResult['checkout_overcoat'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_overcoat'];?>
                  </div>
                  <a href="../../pdf/order_overcoat.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult3['order_id'] == '' || $objResult['checkout_overcoat'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL4 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'pants' ORDER BY rand() LIMIT 1 ";	
				$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
				$objResult4 = mysql_fetch_array($objQuery4);
				?>
                  <? if ($objResult4['order_id'] != '' && $objResult['checkout_pants'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_pants'];?>
                  </div>
                  <a href="../../pdf/order_pants.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult4['order_id'] == '' || $objResult['checkout_pants'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL5 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'shirt' ORDER BY rand() LIMIT 1 ";	
				$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
				$objResult5 = mysql_fetch_array($objQuery5);
				?>
                  <? if ($objResult5['order_id'] != '' && $objResult['checkout_shirt'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_shirt'];?>
                  </div>
                  <a href="../../pdf/order_shirt.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult5['order_id'] == '' || $objResult['checkout_shirt'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL6 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'suits' ORDER BY rand() LIMIT 1 ";	
				$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
				$objResult6 = mysql_fetch_array($objQuery6);
				?>
                  <? if ($objResult6['order_id'] != '' && $objResult['checkout_suits'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_suits'];?>
                  </div>
                  <a href="../../pdf/order_suits.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult6['order_id'] == '' || $objResult['checkout_suits'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL7 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'suits_with_vest' ORDER BY rand() LIMIT 1 ";	
				$objQuery7 = mysql_query($strSQL7) or die ("Error Query [".$strSQL7."]");
				$objResult7 = mysql_fetch_array($objQuery7);
				?>
                  <? if ($objResult7['order_id'] != '' && $objResult['checkout_suits_with_vest'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_suits_with_vest'];?>
                  </div>
                  <a href="../../pdf/order_suits_with_vest.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult7['order_id'] == '' || $objResult['checkout_suits_with_vest'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL8 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'tuxedo_jacket' ORDER BY rand() LIMIT 1 ";	
				$objQuery8 = mysql_query($strSQL8) or die ("Error Query [".$strSQL8."]");
				$objResult8 = mysql_fetch_array($objQuery8);
				?>
                  <? if ($objResult8['order_id'] != '' && $objResult['checkout_tuxedo_jacket'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_tuxedo_jacket'];?>
                  </div>
                  <a href="../../pdf/order_tuxedo_jacket.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult8['order_id'] == '' || $objResult['checkout_tuxedo_jacket'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL9 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'tuxedo_suits' ORDER BY rand() LIMIT 1 ";	
				$objQuery9 = mysql_query($strSQL9) or die ("Error Query [".$strSQL9."]");
				$objResult9 = mysql_fetch_array($objQuery9);
				?>
                  <? if ($objResult9['order_id'] != '' && $objResult['checkout_tuxedo_suits'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_tuxedo_suits'];?>
                  </div>
                  <a href="../../pdf/order_tuxedo_suits.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult9['order_id'] == '' || $objResult['checkout_tuxedo_suits'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL10 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'tuxedo_with_vest' ORDER BY rand() LIMIT 1 ";	
				$objQuery10 = mysql_query($strSQL10) or die ("Error Query [".$strSQL10."]");
				$objResult10 = mysql_fetch_array($objQuery10);
				?>
                  <? if ($objResult10['order_id'] != '' && $objResult['checkout_tuxedo_with_vest'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_tuxedo_with_vest'];?>
                  </div>
                  <a href="../../pdf/order_tuxedo_with_vest.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult10['order_id'] == '' || $objResult['checkout_ties'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL11 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'vest' ORDER BY rand() LIMIT 1 ";	
				$objQuery11 = mysql_query($strSQL11) or die ("Error Query [".$strSQL11."]");
				$objResult11 = mysql_fetch_array($objQuery11);
				?>
                  <? if ($objResult11['order_id'] != '' && $objResult['checkout_vest'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_vest'];?>
                  </div>
                  <a href="../../pdf/order_vest.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult11['order_id'] == '' || $objResult['checkout_vest'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><?
                $strSQL14 = " SELECT DISTINCT(order_id) FROM customize_order WHERE order_id = ".$objResult['checkout_orderid']." AND order_product = 'ties' ORDER BY rand() LIMIT 1 ";	
				$objQuery14 = mysql_query($strSQL14) or die ("Error Query [".$strSQL14."]");
				$objResult14 = mysql_fetch_array($objQuery14);
				?>
                  <? if ($objResult14['order_id'] != '' && $objResult['checkout_ties'] != '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_ties'];?>
                  </div>
                  <a href="../../pdf/order_ties.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a>
                  <? } else if ($objResult14['order_id'] == '' || $objResult['checkout_ties'] == '0') { ?>
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> - </div>
                  <? } ?></td>
                <td align="center"><a href="../../pdf/order_invoice.php?order_id=<?=$objResult['checkout_orderid'];?>" target="_blank">
                  <div style="font-family: 'Roboto', sans-serif; color:#FF0000; font-size:10px; letter-spacing:1px;"> Download </div>
                  </a></td>
                <? $checkout_date = $objResult['checkout_date'];?>
                <?
				$checkout_date = $objResult['checkout_date'];
				$sqldate1 =	" SELECT COUNT(id) FROM customize_checkout WHERE checkout_company = '$reseller' AND checkout_date = '$checkout_date' AND checkout_status = 'T' ";
				$querydate1 = mysql_db_query($dbname, $sqldate1) or die("Can't Querydate1");
				$rowdate1 = mysql_fetch_array($querydate1);
				$checkdate1 = $rowdate1['COUNT(id)'];
				?>
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?
          			$strDate = $objResult['checkout_status_send_date'];
		  			echo DateEng($strDate);
		  			?>
                  </div></td>
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_status_process'];?>
                  </div></td>
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
                    <?=$objResult['checkout_status_payment'];?>
                  </div></td>
              </tr>
              <? } ?>
            </tbody>
          </table>
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