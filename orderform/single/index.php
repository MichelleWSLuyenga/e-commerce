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
<title>RESELLER ONLINE | Order Form</title>
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
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Order Form </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <div class="row">
        <div class="row show-grid">
          <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
              <tr>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> Item </div>
                </th>
                <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;"> </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?
              $strSQL1 = " SELECT * FROM admin_orderform WHERE orderform_status = 'T' ORDER BY id ASC ";
			  $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			  ?>
              <? while($objResult1 = mysql_fetch_array($objQuery1)) { ?>
              <tr class="gradeX">
                <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:14px; letter-spacing:1px;">
                    <?=$objResult1["orderform_item"]?>
                  </div></td>
                <td><? if($orderid == '') { ?>
                  <a href="../../images/orderform/<?=$objResult1["orderform_file"]?>" target="_blank">
                  <button class="btn btn-primary" type="button" style="font-family: 'Roboto', sans-serif; color:#FFFFFF; font-size:14px; letter-spacing:1px;"> PDF Download </button>
                  </a>
                  <? } else if($orderid != '') { ?>
                  <a href="../../images/orderform/<?=$objResult1["orderform_file"]?>?orderid=<?=$orderid?>" target="_blank">
                  <button class="btn btn-primary" type="button" style="font-family: 'Roboto', sans-serif; color:#FFFFFF; font-size:14px; letter-spacing:1px;"> PDF Download </button>
                  </a>
                  <? } ?></td>
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