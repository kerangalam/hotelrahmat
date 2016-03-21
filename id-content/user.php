<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_CONTENT')) {
	Header("Location: ../index.php");
	exit;
}

global $koneksi_db,$error,$email_master;

#############################################
# Register
#############################################
if($_GET['aksi']=="register"){

$tengah .='<h4 class="bg">Register</h4>';
//title 
$judul_situs = 'Register | '.$judul_situs.'';

if(isset($_POST['submit'])){
$user_name		= $_POST['user_name'];
$user_email		= $_POST['user_email'];
if(!isset($_POST['cekperaturan'])){
$cekperaturan = '0';
}else{
$cekperaturan = $_POST['cekperaturan'];
}
$user_password	= sha1(md5($_POST['user_password']));
$ruser_password	= sha1(md5($_POST['ruser_password']));
$confirm_code 	= sha1(md5(uniqid(rand())));
$mail_blocker 	= explode(",", $mail_blocker);
foreach ($mail_blocker as $key => $val) {
if ($val == strtolower($user_email) && $val != "") $error .= "Given E-Mail the address is forbidden to use!<br />";
}
$name_blocker = explode(",", $name_blocker);
foreach ($name_blocker as $key => $val) {
if ($val == strtolower($user_name) && $val != "") $error .= "Named it is forbidden to use!<br />";
}

if (!$user_name || preg_match("/[^a-zA-Z0-9_-]/", $user_name)) $error .= "Error: Karakter Username tidak diizinkan kecuali a-z,A-Z,0-9,-, dan _<br />";
if (strlen($user_name) > 10) $error .= "Username terlalu panjang maksimal 10 karakter<br />";
if (strrpos($user_name, " ") > 0) $error .= "Username Tidak Boleh Menggunakan Spasi";
if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_name FROM users WHERE user_name='$user_name'")) > 0) $error .= "Error: Username ".$user_name." sudah terdaftar, silahkan ulangi.<br />";
if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_email FROM users WHERE user_email='$user_email'")) > 0) $error .= "Error: Email ".$user_email." sudah terdaftar, silahkan ulangi.<br />";
if (!$user_name)  $error .= "Error: Formulir username belum diisi, silahkan ulangi.<br />";
if ($cekperaturan != '1') $error .= "Syarat dan ketentuan dalam website ini belum disetujui!<br />";
if (empty($_POST['user_password']))  $error .= "Error: Formulir password belum diisi, silahkan ulangi!<br />";
if ($_POST['user_password'] != $_POST['ruser_password'])  $error .= "Password pertama dan kedua tidak cocok!<br />";
if (!is_valid_email($user_email)) $error .= "Error: E-Mail address invalid!<br />";
if ($_POST['gfx_check'] != $_SESSION['Var_session'] or !isset($_SESSION['Var_session'])) {$error .= "Security Code Invalid <br />";}
if ($error){
$tengah.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$hasil1 = $koneksi_db->sql_query("INSERT INTO users (user_name,user_email,user_password,user_level) VALUES ('$user_name','$user_email','$user_password','User')");

if($hasil1){
$subject  =''.select_option(from_name).' - Account Activation';
$message  ='<h4>Untuk mengaktifkan akun baru Anda, silakan memverifikasi alamat email Anda dengan mengklik link di bawah:</h4>
<p>Please click this link to <a href="'.$url_situs.'/activate/'.$user_password.'/'.$user_email.'" target="_blank">Activate Your Account</a>.</p>';

if(select_option(mail_type)=='SMTP'){
//smtp_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message);
smtp_mail($user_email, $user_email, select_option(smtp_username), select_option(from_name), $email_master, select_option(from_name), $subject, $message);
}else{
//php_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message);
php_mail($user_email, $user_email, $email_master, select_option(from_name), $email_master, select_option(from_name), $subject, $message);
}

$tengah.='<div class="alert alert-success">Silahkan login dengan Username dan Password Anda</div>';
unset($_POST);
}
}
}

$user_name		= !isset($user_name) ? '' : $user_name;
$user_email		= !isset($user_email) ? '' : $user_email;
$user_password	= !isset($user_password) ? '' : $user_password;
$ruser_password	= !isset($ruser_password) ? '' : $ruser_password;
$checkperaturan	= isset($_POST['cekperaturan']) ? ' checked="checked"' : '';

$tengah .='<p>Nikmati aneka fasilitas yang tersedia dalam portal ini dengan menjadi member.
Untuk menjadi member, Anda hanya perlu melakukan pendaftaran dengan mengisi formulir singkat berikut ini.</p>';

$tengah .='<form class="form-horizontal" method="post" action="">
<div class="form-group">
	<label class="col-sm-3 control-label">Username</label>
	<div class="col-sm-9"><input type="text" name="user_name" value="'.cleantext(stripslashes($_POST['user_name'])).'" class="form-control" required="" placeholder="Enter username"></div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">E-mail</label>
	<div class="col-sm-9"><input type="email" name="user_email" value="'.cleantext(stripslashes($_POST['user_email'])).'" class="form-control" required="" placeholder="Enter email"></div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Password</label>
	<div class="col-sm-9"><input type="password" name="user_password" class="form-control" required="" placeholder="Enter password"></div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Retype Password</label>
	<div class="col-sm-9"><input type="password" name="ruser_password" class="form-control" required="" placeholder="Retype password"></div>
</div>';
if (extension_loaded("gd")) {
$tengah .= '<div class="form-group">
	<label class="col-sm-3 control-label">Scurity Code</label>
	<div class="col-sm-9"><img src="id-includes/code_image.php" border="1" alt="Kode Keamanan"></div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label">Enter Code</label>
	<div class="col-sm-9"><input name="gfx_check" type="text" size="10" maxlength="6" class="form-control" required="" placeholder="Tulus kode"></div>
</div>';
}
$tengah .= '
<div class="form-group">
	<label class="col-sm-3 control-label"></label>
	<div class="col-sm-9"><label><input type="checkbox" name="cekperaturan" value="1" id="setuju'.$checkperaturan.'"> Saya setuju dengan persyaratan yang ditetapkan dalam website ini.</label></div>
</div>
<div class="form-group">
	<label class="col-sm-3 control-label"></label>
	<div class="col-sm-9"><input type="submit" name="submit" value="Daftar" class="btn btn-success"> 
	<input type="reset" name="Reset" value="Batal" class="btn btn-default"></div>
</div>
</form>';
}

#############################################
# Activate Account
#############################################
if($_GET['aksi']=="activate"){

//$id = int_filter($_GET['id']);
$id = $_GET['id'];
$verifyemail = $_GET['verifyemail'];

$tengah .='<h4 class="bg">Activate Account</h4>';

//title 
$judul_situs = 'Activate Account | '.$judul_situs.'';

$s = $koneksi_db->sql_query( "SELECT * FROM users WHERE user_email='$verifyemail'");
$datas = $koneksi_db->sql_fetchrow($s);
$user_password = $datas['user_password'];
$user_email = $datas['user_email'];
$user_type = $datas['user_type'];

if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_email FROM users WHERE user_email='$verifyemail'")) < 1) $error .= "Email ".$verifyemail." belum terdaftar.<br />";
if ($user_type == 'Active') $error .= "Email ".$verifyemail." sudah aktif dan teraktivasi.<br />";
if ($user_password != ''.$id.'') $error .= "Aktivasi email ".$verifyemail." gagal.<br />";
if ($error){
$tengah.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$tanggal = date('Y-m-d H:i:s');
$update = $koneksi_db->sql_query("UPDATE users SET user_type='Active' WHERE user_email='$verifyemail'");
$update = $koneksi_db->sql_query("UPDATE users SET user_start='$tanggal' WHERE user_email='$verifyemail'");
$tengah.='<div class="alert alert-success">Thank you, your account has been activated.</div>';	
}
/*
$subject = 'Reset Password - '.$judul_situs.'';
$msg  ='Anda telah melakukan permintaan reset password akun di <a href="'.$url_situs.'">'.$url_situs.'</a><br>
Berikut ini informasi akun Anda :<br><br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding:3px 0px 3px 0px;">Username</td>
    <td style="padding:3px 10px 3px 10px;">:</td>
    <td style="padding:3px 0px 3px 0px;">'.$user.'</td>
  </tr>
  <tr>
    <td style="padding:3px 0px 3px 0px;">Password</td>
    <td style="padding:3px 10px 3px 10px;">:</td>
    <td style="padding:3px 0px 3px 0px;">'.$newpass.'</td>
  </tr>
</table><br>
Semoga informasi ini bermanfaat bagi Anda.<br>
Terima kasih.<br><br><br>
 
Hormat Kami,<br><br><br>
 
'.$nama_email.'<br>
---------------------------------------------------------------------------------------------------<br>
Mohon tidak membalas email ini, karena email ini dikirim otomatis.';
mail_send($emailuser,$nama_email,$email_master,$subject,$msg,1,3);*/
}

#############################################
# Forgot Password
#############################################
if($_GET['aksi']=="forgot_password"){

$tengah .='<h4 class="bg">Forgot Password</h4>';

//title 
$judul_situs = 'Forgot Password | '.$judul_situs.'';

if(isset($_POST['submit'])){
$user_email = $_POST['user_email'];
if (!$user_email)  $error .= "Error: Formulir Email belum diisi, silahkan ulangi.<br />";
if ($error){
$tengah.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$jumlah = $koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT * FROM users WHERE user_email='$user_email' AND user_type='Active'"));
if($jumlah<1) { 
$tengah.='<div class="alert alert-danger">Maaf, email Anda belum terdaftar</div>';
} else {             
$newpass 		= genpass();
$userdata		= "SELECT * FROM users WHERE user_email = '$user_email'";
$userdata 		= $koneksi_db->sql_query( $userdata );
$datauser 		= $koneksi_db->sql_fetchrow($userdata);
$user_name		= $datauser['user_name'];	
$user_email		= $datauser['user_email'];	
$newpassword	= sha1(md5($newpass));
$update			= "UPDATE users SET user_password='$newpassword' WHERE user_email='$user_email'";
$updatedata 	= $koneksi_db->sql_query($update);

$s = $koneksi_db->sql_query( "SELECT * FROM setting WHERE id=1");
$datas = $koneksi_db->sql_fetchrow($s);
$nama_email = $datas['nama_email'];

$subject = 'Reset Password - '.$judul_situs.'';
$msg  ='Anda telah melakukan permintaan reset password akun di <a href="'.$url_situs.'">'.$url_situs.'</a><br>
Berikut ini informasi akun Anda :<br><br>
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding:3px 0px 3px 0px;">Username</td>
    <td style="padding:3px 10px 3px 10px;">:</td>
    <td style="padding:3px 0px 3px 0px;">'.$user_name.'</td>
  </tr>
  <tr>
    <td style="padding:3px 0px 3px 0px;">Password</td>
    <td style="padding:3px 10px 3px 10px;">:</td>
    <td style="padding:3px 0px 3px 0px;">'.$newpass.'</td>
  </tr>
</table><br>
Semoga informasi ini bermanfaat bagi Anda.<br>
Terima kasih.<br><br><br>
 
Hormat Kami,<br><br><br>
 
'.$nama_email.'<br>
---------------------------------------------------------------------------------------------------<br>
Mohon tidak membalas email ini, karena email ini dikirim otomatis.';
mail_send($user_email,$nama_email,$email_master,$subject,$msg,1,3);
Posted('contact');
$tengah.='<div class="alert alert-success">Password has been sent to email <strong>'.$user_email.'</strong></div>';	
}
}
}	

$tengah .='<p>Please enter your email address. You will receive a new password via email.</p>';

$tengah .='<form class="form-horizontal" action="" method="post">
<div class="form-group">
	<label class="col-sm-2 control-label">Email</label>
	<div class="col-sm-10"><input type="email" name="user_email" class="form-control" placeholder="Enter email"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10"><input type="submit" name="submit" value="Submit" class="btn btn-warning"></div>
</div>
</form>';
}

echo $tengah;

?>