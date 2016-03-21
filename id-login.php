<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

include "id-includes/session.php";
include "id-includes/config.php";
include "id-includes/mysql.php";
include "id-includes/option.php";
ob_start();
//cek_license ();
global $koneksi_db;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Teamworks Indonesia &#8250; Log In</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="id-admin/themes/administrator/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="id-admin/themes/administrator/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="id-admin/themes/administrator/plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<?php
echo '<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="'.$url_situs.'"><b>Hotel</b>Rahmat</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>';
if (isset ($_POST['submit_login']) && @$_POST['loguser'] == 1){
echo cms_login ();
}

if (!cek_login ()){
}else{

if ($_SESSION['LevelAkses']){
header("location:main.php?opsi=main");
exit;
}
}
echo '<form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="user_name" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="user_password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <a href="'.$url_situs.'/forgot-password.html">I forgot my password</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
			  <input type="hidden" value="1" name="loguser">
              <button type="submit" name="submit_login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- TCMS -</p>
        </div><!-- /.social-auth-links -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->';
echo $login;
?>

<!-- jQuery 2.1.4 -->
<script src="id-admin/themes/administrator/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="id-admin/themes/administrator/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="id-admin/themes/administrator/plugins/iCheck/icheck.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
	});
</script>
</body>
</html>