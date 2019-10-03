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
	
	$fabrics_number = $_POST["fabrics_number"];
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
<link href="../css/datatables.bundle.css" rel="stylesheet" type="text/css">
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
        <div class="row">
          <div class="col-md-12">
            <div class="m-portlet m-portlet--tab">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption" align="center">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text" style="text-transform:uppercase;" style="font-family: 'Roboto', sans-serif;">
                    <strong> Overcoat Fabrics </strong>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="m-portlet m-portlet--mobile">
              <div class="m-portlet__body">
                <div align="right">
                  <form class="m-form m-form--fit m-form--label-align-right" action="overcoat_search.php" method="post">
                    <label style="font-family: 'Roboto', sans-serif;">
                      <input type="text" class="form-control m-input" name="fabrics_number" id="fabrics_number" placeholder="Fabric Number" required>
                    </label>
                    <label style="font-family: 'Roboto', sans-serif;">
                      <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;"> search </button>
                    </label>
                  </form>
                </div>
                <br>
                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable">
                  <thead>
                    <tr>
                      <th style="font-family: 'Roboto', sans-serif;"> Type </th>
                      <th style="font-family: 'Roboto', sans-serif;"> Brand </th>
                      <th style="font-family: 'Roboto', sans-serif;"> Fabric No </th>
                      <th style="font-family: 'Roboto', sans-serif;"> Color </th>
                      <th style="font-family: 'Roboto', sans-serif;"> Pattern </th>
                      <th style="font-family: 'Roboto', sans-serif;"> Status </th>
                      <th style="font-family: 'Roboto', sans-serif;"> </th>
                      <th style="font-family: 'Roboto', sans-serif;"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <? 
	  				$strSQL = " SELECT * FROM admin_fabrics_overcoat WHERE fabricno LIKE '%$fabrics_number%' ";
	  				$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	  				$Num_Rows = mysql_num_rows($objQuery);
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
	  				$strSQL .=" ORDER BY ABS(id) ASC LIMIT $Page_Start , $Per_Page";
	  				$objQuery  = mysql_query($strSQL);
	  			?>
                    <? while($objResult = mysql_fetch_array($objQuery)) { ?>
                    <tr>
                      <td style="font-family: 'Roboto', sans-serif;"><?=$objResult["type"]?></td>
                      <td style="font-family: 'Roboto', sans-serif;"><?=$objResult["brand"]?></td>
                      <td style="font-family: 'Roboto', sans-serif;"><?=$objResult["fabricno"]?></td>
                      <td style="font-family: 'Roboto', sans-serif;"><?=$objResult["color"]?></td>
                      <td style="font-family: 'Roboto', sans-serif;"><?=$objResult["pattern"]?></td>
                      <td style="font-family: 'Roboto', sans-serif;"><? if($objResult["fabrics_status"] == 'T') { ?>
                        AVAILABLE
                        <? } else if($objResult["fabrics_status"] == 'F') { ?>
                        OUT OF STOCK
                        <? } ?></td>
                      <td style="font-family: 'Roboto', sans-serif;"><a href="edit.php?id=<?=$objResult["id"]?>&&fabrics_product=overcoat"> Edit </a></td>
                      <td style="font-family: 'Roboto', sans-serif;"><a href="update.php?id=<?=$objResult["id"]?>&&fabrics_product=overcoat&&fabrics_status=<?=$objResult["fabrics_status"]?>"> Change Stock </a></td>
                    </tr>
                    <? } ?>
                  </tbody>
                </table>
                <div align="right" style="font-size:14px; color:#000; letter-spacing:1px;">
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
