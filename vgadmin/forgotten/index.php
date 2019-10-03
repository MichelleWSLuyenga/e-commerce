<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	include('../../connect.php');
	$admin_email = $_GET["admin_email"];
	$sql = " SELECT * FROM admin WHERE admin_email = '".$admin_email."' ";
	$query = mysql_db_query($dbname, $sql) or die("Can't Query");
	$row = mysql_fetch_array($query);
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
<!--end::Base Styles -->
<link rel="shortcut icon" href="images/favicon.ico">
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
      <div class="m-login__container">
        <div class="m-login__signin">
          <div class="m-login__head">
            <h3 class="m-login__title" style="font-family: 'Roboto', sans-serif;"> Change Password </h3>
          </div>
          <form class="m-login__form m-form" action="../include/password_code.php" method="post">
            <div class="form-group m-form__group" style="font-family: 'Roboto', sans-serif;"> Username :
              <?=$row['admin_username']?>
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="hidden" name="forget_username" id="forget_username" placeholder="Username" value="<?=$row['admin_username']?>" required>
              <input class="form-control m-input" type="password" name="forget_password" id="forget_password" placeholder="Password" required>
            </div>
            <div class="m-login__form-action">
              <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr" style="font-family: 'Roboto', sans-serif;"> Change </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end:: Page --> 
<!--begin::Base Scripts --> 
<script src="js/vendors.bundle.js" type="text/javascript"></script> 
<script src="js/scripts.bundle.js" type="text/javascript"></script> 
<!--end::Base Scripts --> 
<!--begin::Page Snippets --> 
<script src="js/login.js" type="text/javascript"></script> 
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
