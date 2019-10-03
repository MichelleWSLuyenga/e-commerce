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
<script language="javascript" type="text/javascript">
  function checkSend() {
    if (confirm('Are you sure want to place order?')==true) {
      return true;
    } else {
        return false;
    }
  }
</script>
<script language="javascript" type="text/javascript">
  function checkDelete() {
    if (confirm('Are you sure want to delete order?')==true) {
      return true;
    } else {
        return false;
    }
  }
</script>
<title>RESELLER ONLINE | Place Order</title>
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
  <h2 style="font-family: 'Adamina', serif; color:#FFFFFF; font-size:18px; letter-spacing:1px;"> Place Order </h2>
  <div class="right-wrapper pull-right"> </div>
</header>
<div class="row">
<div class="row show-grid">
<form name="frmMain" action="../../include/multiple/placeorder.php" method="post" OnSubmit="return checkSend()">
<table class="table table-bordered table-striped mb-none" id="datatable-default">
  <thead>
    <tr>
      <th> </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Date </div>
      </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Order No </div>
      </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Customer Name </div>
      </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Amount </div>
      </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> View </div>
      </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Edit </div>
      </th>
      <th> <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;" align="center"> Delete </div>
      </th>
    </tr>
  </thead>
  <tbody>
    <?
	$reseller_company = $row_user['reseller_company'];
    $strSQL = " SELECT * FROM customize_checkout WHERE checkout_company = '$reseller_company' AND checkout_status = 'T' AND checkout_status_save = 'save' AND checkout_status_send = '' ORDER BY id DESC "; 
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
    <? while($objResult = mysql_fetch_array($objQuery)) { ?>
    <tr class="gradeX">
      <td align="center"><input type="checkbox" name="chkSend[]" value="<?php echo $objResult['id'];?>"></td>
      <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
          <?
          $strDate = $objResult['checkout_date'];
		  echo DateEng($strDate);
		  ?>
        </div></td>
      <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
          <?=$objResult['checkout_order'];?>
        </div></td>
      <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
          <?=$objResult['checkout_customer'];?>
        </div></td>
      <td><div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">
          <?=$objResult['checkout_price'];?>
          <?=$currency?>
        </div></td>
      <td><a href="view.php?viewid=<?=$objResult['checkout_orderid'];?>">
        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">View</div>
        </a></td>
      <td><a href="../../cart/multiple/index.php?orderid=<?=$objResult['checkout_orderid'];?>">
        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">Edit</div>
        </a></td>
      <td><a href="delete.php?orderid=<?=$objResult['checkout_orderid'];?>" onClick="return checkDelete()">
        <div style="font-family: 'Roboto', sans-serif; color:#000000; font-size:10px; letter-spacing:1px;">Delete</div>
        </a></td>
    </tr>
    <? } ?>
  </tbody>
</table>
<div class="row show-grid">
  <div class="col-md-12" align="center">
    <button class="btn btn-primary" type="submit" style="font-family: 'Roboto', sans-serif; color:#FFFFFF; font-size:14px; letter-spacing:1px; width:150px; height:50px;"> Place Order </button>
  </div>
</div>
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