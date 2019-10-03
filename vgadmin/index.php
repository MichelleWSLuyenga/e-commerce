<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?	
	$error = $_GET["error"];
	$forget = $_GET["forget"];
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
<link href="css/vendors.bundle.css" rel="stylesheet" type="text/css">
<link href="css/style.bundle.css" rel="stylesheet" type="text/css">
<!--end::Base Styles -->
<link rel="shortcut icon" href="images/favicon.ico">
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login">
    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
      <div class="m-login__container">
        <div class="m-login__signin">
          <div class="m-login__head">
            <? if($error == 'error') {?>
            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert" style="font-family: 'Roboto', sans-serif;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong> Error! </strong> Incorrect Username or Password. </div>
            <? } else if($error != 'error') { } ?>
            <? if($forget == 'forget') {?>
            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert" style="font-family: 'Roboto', sans-serif;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
              <strong> Error! </strong> No email in the system. </div>
            <? } else if($forget != 'forget') { } ?>
            <h3 class="m-login__title" style="font-family: 'Roboto', sans-serif;"> Sign In To Admin </h3>
          </div>
          <form class="m-login__form m-form" action="index_code.php" method="post">
            <div class="form-group m-form__group">
              <input class="form-control" type="text" name="admin_username" id="admin_username" placeholder="Username" required>
            </div>
            <div class="form-group m-form__group">
              <input class="form-control" type="password" name="admin_password" id="admin_password" placeholder="Password" required>
            </div>
            <div class="row m-login__form-sub">
              <div class="col m--align-left m-login__form-left"> </div>
              <div class="col m--align-right m-login__form-right"> <a href="javascript:;" id="m_login_forget_password" class="m-link" style="font-family: 'Roboto', sans-serif;"> Forget Password ? </a> </div>
            </div>
            <div class="m-login__form-action">
              <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" style="font-family: 'Roboto', sans-serif;"> Sign In </button>
            </div>
          </form>
        </div>
        <div class="m-login__forget-password">
          <div class="m-login__head">
            <h3 class="m-login__title" style="font-family: 'Roboto', sans-serif;"> Forgotten Password ? </h3>
            <div class="m-login__desc" style="font-family: 'Roboto', sans-serif;"> Enter your email to reset your password: </div>
          </div>
          <form class="m-login__form m-form" action="include/forget_code.php" method="post">
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="text" name="forget_email" id="forget_email" placeholder="Email" required>
            </div>
            <div class="m-login__form-action">
              <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr" style="font-family: 'Roboto', sans-serif;"> Request </button>
              &nbsp;&nbsp;
              <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn" style="font-family: 'Roboto', sans-serif;"> Cancel </button>
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
