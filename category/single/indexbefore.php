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

	$sql1 =	" SELECT * FROM admin_uploadcategory WHERE uploadcategory_reseller = '$reseller' ";
	$query1 = mysql_db_query($dbname, $sql1) or die("Can't Query1");
	$row1 = mysql_fetch_array($query1);

	$sql2 =	" SELECT * FROM admin_uploadlogo WHERE uploadlogo_reseller = '$reseller' ";
	$query2 = mysql_db_query($dbname, $sql2) or die("Can't Query2");
	$row2 = mysql_fetch_array($query2);

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
<title>RESELLER ONLINE | Category</title>
</head>
<body>
<? if($orderid == '') { ?>
<section class="body">
  <header class="header"> &nbsp;&nbsp; <a href="../../category/single/"><img src="../../images/logo/<?=$row2['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li> <a href="../../category/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../history/single/">
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
  <div class="inner-wrapper">
    <section role="main" class="content-body">
      <header class="page-header">
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Category </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <br>
      <div class="row">
        <div class="row show-grid">
          <div class="col-md-2" align="center"> <a href="../../item/single/suits/"> <img class="img-responsive" src="../../images/category/suits/<?=$row1['uploadcategory_suits_image'];?>?v=1001" onerror="this.src='../../images/category/suits/suits.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Suits </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/suits_with_vest/"> <img class="img-responsive" src="../../images/category/suits_with_vest/<?=$row1['uploadcategory_suits_with_vest_image'];?>?v=1001" onerror="this.src='../../images/category/suits_with_vest/suits_with_vest.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Suits With Vest </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/jacket/"> <img class="img-responsive" src="../../images/category/jacket/<?=$row1['uploadcategory_jacket_image'];?>?v=1001" onerror="this.src='../../images/category/jacket/jacket.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Jacket </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/pants/"> <img class="img-responsive" src="../../images/category/pants/<?=$row1['uploadcategory_pants_image'];?>?v=1001" onerror="this.src='../../images/category/pants/pants.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Pants </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/vest/"> <img class="img-responsive" src="../../images/category/vest/<?=$row1['uploadcategory_vest_image'];?>?v=1001" onerror="this.src='../../images/category/vest/vest.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Vest </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/shirt/"> <img class="img-responsive" src="../../images/category/shirt/<?=$row1['uploadcategory_shirt_image'];?>?v=1001" onerror="this.src='../../images/category/shirt/shirt.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Shirt </strong></div>
            </a> <br class="mobileShow">
          </div>
        </div>
        <br>
        <div class="row show-grid">
          <div class="col-md-2" align="center"> <a href="../../item/single/tuxedo_suits/"> <img class="img-responsive" src="../../images/category/tuxedo_suits/<?=$row1['uploadcategory_tuxedo_suits_image'];?>?v=1001" onerror="this.src='../../images/category/tuxedo_suits/tuxedo_suits.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Tuxedo Suits </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/tuxedo_with_vest/"> <img class="img-responsive" src="../../images/category/tuxedo_with_vest/<?=$row1['uploadcategory_tuxedo_with_vest_image'];?>?v=1001" onerror="this.src='../../images/category/tuxedo_with_vest/tuxedo_with_vest.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Tuxedo With Vest </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/tuxedo_jacket/"> <img class="img-responsive" src="../../images/category/tuxedo_jacket/<?=$row1['uploadcategory_tuxedo_jacket_image'];?>?v=1001" onerror="this.src='../../images/category/tuxedo_jacket/tuxedo_jacket.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Tuxedo Jacket </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/overcoat/"> <img class="img-responsive" src="../../images/category/overcoat/<?=$row1['uploadcategory_overcoat_image'];?>?v=1001" onerror="this.src='../../images/category/overcoat/overcoat.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Overcoat </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/jeans/"> <img class="img-responsive" src="../../images/category/jeans/<?=$row1['uploadcategory_jeans_image'];?>?v=1001" onerror="this.src='../../images/category/jeans/jeans.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Jeans </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/ties/"> <img class="img-responsive" src="../../images/category/ties/<?=$row1['uploadcategory_ties_image'];?>?v=1001" onerror="this.src='../../images/category/ties/ties.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Ties </strong></div>
            </a> <br class="mobileShow">
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
<? } else if($orderid != '') { ?>
<section class="body">
  <header class="header"> &nbsp;&nbsp;<a href="../../category/single/index.php?orderid=<?=$orderid?>"><img src="../../images/logo/<?=$row2['uploadlogo_image'];?>?v=1001" width="250" height="55" onerror="this.src='../../images/logo/0.jpg?v=1001';"></a>
    <div class="header-right">
      <ul class="notifications">
        <li> <a href="../../category/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> HOME </div>
          </a> </li>
        <li class="mobileHide"> <a href="../../orderform/single/index.php?orderid=<?=$orderid?>">
          <div style="font-family: 'Adamina', serif; color:#000000; font-size:10px; letter-spacing:1px;"> ORDER FORM </div>
          </a> </li>
        <li> <a href="../../history/single/index.php?orderid=<?=$orderid?>">
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
  <div class="inner-wrapper">
    <section role="main" class="content-body">
      <header class="page-header">
        <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Category </h2>
        <div class="right-wrapper pull-right"> </div>
      </header>
      <br>
      <div class="row">
        <div class="row show-grid">
          <div class="col-md-2" align="center"> <a href="../../item/single/suits/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/suits/<?=$row1['uploadcategory_suits_image'];?>?v=1001" onerror="this.src='../../images/category/suits/suits.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Suits </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/suits_with_vest/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/suits_with_vest/<?=$row1['uploadcategory_suits_with_vest_image'];?>?v=1001" onerror="this.src='../../images/category/suits_with_vest/suits_with_vest.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Suits With Vest </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/jacket/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/jacket/<?=$row1['uploadcategory_jacket_image'];?>?v=1001" onerror="this.src='../../images/category/jacket/jacket.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Jacket </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/pants/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/pants/<?=$row1['uploadcategory_pants_image'];?>?v=1001" onerror="this.src='../../images/category/pants/pants.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Pants </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/vest/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/vest/<?=$row1['uploadcategory_vest_image'];?>?v=1001" onerror="this.src='../../images/category/vest/vest.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Vest </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/shirt/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/shirt/<?=$row1['uploadcategory_shirt_image'];?>?v=1001" onerror="this.src='../../images/category/shirt/shirt.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Shirt </strong></div>
            </a> <br class="mobileShow">
          </div>
        </div>
        <br>
        <div class="row show-grid">
          <div class="col-md-2" align="center"> <a href="../../item/single/tuxedo_suits/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/tuxedo_suits/<?=$row1['uploadcategory_tuxedo_suits_image'];?>?v=1001" onerror="this.src='../../images/category/tuxedo_suits/tuxedo_suits.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Tuxedo Suits </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/tuxedo_with_vest/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/tuxedo_with_vest/<?=$row1['uploadcategory_tuxedo_with_vest_image'];?>?v=1001" onerror="this.src='../../images/category/tuxedo_with_vest/tuxedo_with_vest.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Tuxedo With Vest </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/tuxedo_jacket/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/tuxedo_jacket/<?=$row1['uploadcategory_tuxedo_jacket_image'];?>?v=1001" onerror="this.src='../../images/category/tuxedo_jacket/tuxedo_jacket.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Tuxedo Jacket </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/overcoat/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/overcoat/<?=$row1['uploadcategory_overcoat_image'];?>?v=1001" onerror="this.src='../../images/category/overcoat/overcoat.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Overcoat </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/jeans/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/jeans/<?=$row1['uploadcategory_jeans_image'];?>?v=1001" onerror="this.src='../../images/category/jeans/jeans.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Jeans </strong></div>
            </a> <br class="mobileShow">
          </div>
          <div class="col-md-2" align="center"> <a href="../../item/single/ties/index.php?orderid=<?=$orderid?>"> <img class="img-responsive" src="../../images/category/ties/<?=$row1['uploadcategory_ties_image'];?>?v=1001" onerror="this.src='../../images/category/ties/ties.jpg?v=1001';"> <br>
            <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:16px; letter-spacing:1px; text-transform:uppercase;"><strong> Ties </strong></div>
            </a> <br class="mobileShow">
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
<? } ?>
<script src="../../js/modernizr.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/nanoscroller.js"></script>
<script src="../../js/theme.js"></script>
<script src="../../js/theme.init.js"></script>
<script src="../../js/magnific-popup.js"></script>
<script src="../../js/examples.modals.js"></script>
</body>
</html>
