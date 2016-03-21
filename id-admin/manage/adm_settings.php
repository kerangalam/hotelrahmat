<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_admin')) {
	Header("Location: ../index.php");
	exit;
}

if (!cek_login ()){
$admin .='<h4 class="bg">Access Denied !!!!!!</h4>';
}else{

global $koneksi_db,$url_situs;

$admin ='<section class="content-header">
<h1>Settings<small>to manage website</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Settings</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=adm_settings">General</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_settings&amp;aksi=account">Account</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_settings&amp;aksi=profile">Profile</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_settings&amp;aksi=mail">Mail</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_settings&amp;aksi=favicon">Favicon</a>
</section>';

#############################################
# Setting Website
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

if (isset($_POST["submit"])) {

if (is_array($_POST['option'])) {
foreach($_POST['option'] as $key=>$val) {
$update = $koneksi_db->sql_query("UPDATE option SET option_value='$val' WHERE option_name='$key'");
}
$admin .= '<div class="alert alert-success">Settings saved.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_settings">';
}
}

$skin = '<select name="option[skin_style]" class="form-control">';
$arr = array ('skin-blue','skin-yellow','skin-green','skin-purple','skin-red');
foreach ($arr as $kk=>$vv){
if (select_option(skin_style) == ''.$vv.''){
$skin .= '<option value="'.$vv.'" selected="selected">'.$vv.'</option>';
}else {
$skin .= '<option value="'.$vv.'">'.$vv.'</option>';	
}
}
$skin .= '</select>';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">General Settings</h3></div>';
$admin .='
<form class="form-horizontal" method="post" action="">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Site Title</label>
	<div class="col-sm-10"><input type="text" name="option[site_title]" value="'.select_option(site_title).'" class="form-control" placeholder="Judul Website"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Tagline</label>
	<div class="col-sm-10"><input type="text" name="option[site_tagline]" value="'.select_option(site_tagline).'" class="form-control" placeholder="Slogan Website"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Site Address (URL)</label>
	<div class="col-sm-10"><input type="text" name="option[site_url]" value="'.select_option(site_url).'" class="form-control" placeholder="URL Website"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Site Publish</label>
	<div class="col-sm-10">';
if(select_option(site_publish)==1){
$admin .= '
<label><input name="option[site_publish]" type="radio" value="1" checked="checked"> Yes</label>&nbsp;
<label><input name="option[site_publish]" type="radio" value="0"> No</label>';
}else{
$admin .= '
<label><input name="option[site_publish]" type="radio" value="1"> Yes</label>&nbsp;
<label><input name="option[site_publish]" type="radio" value="0" checked="checked"> No</label>';
}
$admin .='</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Email Master</label>
	<div class="col-sm-10"><input type="email" name="option[site_email]" value="'.select_option(site_email).'" class="form-control" placeholder="Email Master"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Skin Style</label>
	<div class="col-sm-10">'.$skin.'</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Description [META]</label>
	<div class="col-sm-10"><textarea name="option[site_desc]" rows="5" class="form-control">'.select_option(site_desc).'</textarea></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Keywords [META]</label>
	<div class="col-sm-10"><textarea name="option[site_key]" rows="3" class="form-control">'.select_option(site_key).'</textarea></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Alamat Kontak</label>
	<div class="col-sm-10"><textarea name="option[contact_info]" rows="3" id="CKEditor" class="form-control">'.select_option(contact_info).'</textarea></div>
</div>		
</div><!-- /.box-body -->
<div class="box-footer">
	<input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
</div></form>
</div><!-- /.box -->';
$admin .= '</section>';
}

#############################################
# Pengaturan Password
#############################################
if($_GET['aksi']=="account"){

$username = $_SESSION['UserName'];

$admin .= '<section class="content">';

if (isset($_POST["submit"])) {

$user_name	= text_filter($_POST['user_name']);
$user_email	= text_filter($_POST['user_email']);
$password0	= sha1(md5($_POST["password0"]));
$password1	= $_POST["password1"];
$password2	= $_POST["password2"];

$hasil = $koneksi_db->sql_query("SELECT user_password,user_email FROM users WHERE user_name='$username'");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$password	= $data['user_password'];
$email0		= $data['user_email'];
}
$error = '';
if (!$password0)  $error .= "<strong>Gagal!</strong> Masukkan password baru Anda<br />";
if (!$password1)  $error .= "<strong>Gagal!</strong> Masukkan password baru Anda<br />";
if (!$password2)  $error .= "<strong>Gagal!</strong> Ulangi password baru Anda<br />";
//checkemail($user_email);
if ($password0 != $password)	$error .= "Password lama Anda tidak cocok, silahkan ulangi lagi<br />";
if ($password1 != $password2)   $error .= "Password baru dan ulangan password berbeda, silahkan ulangi<br />";
if ($koneksi_db->sql_numrows(	$koneksi_db->sql_query("SELECT user_email FROM users WHERE user_email='$user_email' and user_name!='$username'")) > 0) 
$error .= "<strong>Gagal!</strong> Email <strong>".$user_email."</strong> sudah terdaftar, silahkan ulangi.<br />";

if ($error) {
$admin .='<div class="alert alert-danger">'.$error.'</div>';
}else{
$password3 = sha1(md5($password1));
$hasil = $koneksi_db->sql_query("UPDATE users SET user_email='$user_email',user_password='$password3' WHERE user_name='$username'");
$admin.='<div class="alert alert-success">Account updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_settings&amp;aksi=account">';
}
}

$hasil =  $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$user_id	= $data['user_id'];
$user_name	= $data['user_name'];
$user_email	= $data['user_email'];
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Account Management</h3></div>';
$admin .='<form class="form-horizontal" method="post" action="">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Username</label>
	<div class="col-sm-5"><input type="text" name="user_name" value="'.$user_name.'" class="form-control" disabled></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Email</label>
	<div class="col-sm-5"><input type="email" name="user_email" value="'.$user_email.'" class="form-control" required></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Password Lama</label>
	<div class="col-sm-5"><input type="password" name="password0" class="form-control" placeholder="Old Password"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">New Password</label>
	<div class="col-sm-5"><input type="password" name="password1" class="form-control" placeholder="New Password"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Retype New Password</label>
	<div class="col-sm-5"><input type="password" name="password2" class="form-control" placeholder="Retype New Password"></div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
	<input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
</div>
</form>
</div><!-- /.box -->';
$admin .= '</section>';
}

#############################################
# Pengaturan Profil
#############################################
if($_GET['aksi']=="profile"){

$username = $_SESSION['UserName'];

$admin .= '<section class="content">';

if (isset($_POST["submit"])) {

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$user_fullname	= $_POST['user_fullname'];
$user_bio		= $_POST['user_bio'];
$user_hp		= $_POST['user_hp'];
$user_web		= $_POST['user_web'];
$namafile_name 	= $_FILES['gambar']['name'];
$error = '';
if (!$user_fullname)  $error .= "<strong>Gagal!</strong> Nama lengkap harus diisi<br />";

if ($error) {
$admin .='<div class="alert alert-danger">'.$error.'</div>';
} else {
if (!empty ($namafile_name)){
$files = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
//$namagambar = md5 (rand(1,100).$files) .'.jpg';
$namagambar = $username.'.jpg';
$tempnews 	= 'id-content/modul/profile/images/temp/';
$uploaddir = $tempnews . $namagambar; 
$uploads = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
	
$tnews 		= 'id-content/modul/profile/images/';
$small 	= $tnews . $namagambar;
create_thumbnail ($uploaddir, $small, $new_width = 200, $new_height = 200, $quality = 90);
unlink($uploaddir);

$hasil = $koneksi_db->sql_query("UPDATE users SET user_fullname='$user_fullname',user_bio='$user_bio',user_hp='$user_hp',user_web='$user_web',user_avatar='$namagambar' WHERE user_name='$username'");
$admin.='<div class="alert alert-success">Profile updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_settings&amp;aksi=profile">';
}else{
$hasil = $koneksi_db->sql_query("UPDATE users SET user_fullname='$user_fullname',user_bio='$user_bio',user_hp='$user_hp',user_web='$user_web' WHERE user_name='$username'");
$admin.='<div class="alert alert-success">Profile updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_settings&amp;aksi=profile">';
}
}
}

$hasil = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$user_name		= $data['user_name'];
$user_fullname	= $data['user_fullname'];
$user_bio		= $data['user_bio'];
$user_hp		= $data['user_hp'];
$user_web		= $data['user_web'];
if(!$data['user_avatar']){
$gambarlama = 'profile-default.jpg';
}else{
$gambarlama	= $data['user_avatar'];
}
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border">
	<h3 class="box-title">Profile</h3>
</div>';

$admin .='<form class="form-horizontal" method="post" action="" enctype ="multipart/form-data">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Full Name</label>
	<div class="col-sm-10"><input type="text" name="user_fullname" value="'.$user_fullname.'" class="form-control" placeholder="Full Name"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Handphone</label>
	<div class="col-sm-10"><input type="text" name="user_hp" value="'.$user_hp.'" class="form-control" placeholder="Contoh : 6282166000063"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Website</label>
	<div class="col-sm-10"><input type="text" name="user_web" value="'.$user_web.'" class="form-control" placeholder="Contoh : http://www.teamworks.co.id"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Biographical Info</label>
	<div class="col-sm-10"><textarea name="user_bio" rows="3" id="CKEditor" class="form-control">'.$user_bio.'</textarea></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Avatar</label>
	<div class="col-sm-10"><input type="file" name="gambar"><input type="hidden" name="gambarlama" value="'.$gambarlama.'">
	<p class="help-block">Extensi file *.JPG, *.JPEG</p></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10"><img src="id-content/modul/profile/images/'.$gambarlama.'"></div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
	<input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
</div>
</form>
</div><!-- /.box -->';
$admin .= '</section>';
}
}

#############################################
# Mail Setting
#############################################
if($_GET['aksi']=="mail"){

$admin .= '<section class="content">';

if (isset($_POST["submit"])) {

if (is_array($_POST['order'])) {
foreach($_POST['order'] as $key=>$val) {
$update = mysql_query("UPDATE option SET option_value='$val' WHERE option_name='$key'");
}
$admin .= '<div class="alert alert-success">SMTP setting updated</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_settings&aksi=mail">';
}
}

$mail_type = '<select name="order[mail_type]" class="form-control">';
$arr = array ('PHP Mail()','SMTP');
foreach ($arr as $kk=>$vv){
if (select_option(mail_type) == ''.$vv.''){
$mail_type .= '<option value="'.$vv.'" selected="selected">'.$vv.'</option>';
}else {
$mail_type .= '<option value="'.$vv.'">'.$vv.'</option>';	
}
}
$mail_type .= '</select>';

$admin .= '<div class="box box-warning">
<div class="box-header with-border">
	<h3 class="box-title">Mail Settings</h3>
</div>';

$admin .='<form class="form-horizontal" method="post" action="" enctype ="multipart/form-data">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Mail Type</label>
	<div class="col-sm-10">'.$mail_type.'</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">SMTP Port</label>
	<div class="col-sm-10"><input type="text" name="order[smtp_port]" value="'.int_filter(select_option(smtp_port)).'" class="form-control" placeholder="SMTP Port"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">SMTP Host</label>
	<div class="col-sm-10"><input type="text" name="order[smtp_host]" value="'.select_option(smtp_host).'" class="form-control" placeholder="SMTP Host"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">SMTP Username</label>
	<div class="col-sm-10"><input type="text" name="order[smtp_username]" value="'.select_option(smtp_username).'" class="form-control" placeholder="SMTP Username"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">SMTP Password</label>
	<div class="col-sm-10"><input type="password" name="order[smtp_password]" value="'.select_option(smtp_password).'" class="form-control" placeholder="SMTP Password"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">System Emails From Name</label>
	<div class="col-sm-10"><input type="text" name="order[from_name]" value="'.select_option(from_name).'" class="form-control" placeholder="System Emails From Name"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Global Email Signature</label>
	<div class="col-sm-10"><textarea name="order[mail_signature]" rows="1" id="CKEditor" class="form-control" placeholder="Global Email Signature">'.select_option(mail_signature).'</textarea></div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
	<input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
	<a href="?opsi=adm_settings&amp;aksi=mail"><button type="button" class="btn btn-default">Cancel Changes</button></a>
</div>
</form>
</div><!-- /.box -->';
$admin .= '</section>';
}

#############################################
# Favicon
#############################################
if($_GET['aksi']=="favicon"){

$admin .= '<section class="content">';

if (isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$namafile_name 	= $_FILES['gambar']['name'];
if (!empty ($namafile_name)){
$files 		= $_FILES['gambar']['name'];
$tmp_files 	= $_FILES['gambar']['tmp_name'];
$tempnews 	= ''.$_SERVER['DOCUMENT_ROOT'].'/';
$namagambar = 'favicon.png';
$uploaddir 	= $tempnews . $namagambar; 
$uploads 	= move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$gnews 		= '';
$nsmall = $gnews . $namagambar;
//create_thumbnail ($uploaddir, $nsmall, $new_width = 64, $new_height = 64, $quality = 100);
	
$admin.='<div class="alert alert-success">Favicon updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_settings&amp;aksi=favicon">';
}
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Favicon</h3></div>
<div class="box-body">';
$admin .= '<form class="form-horizontal" method="post" action="" enctype ="multipart/form-data" id="posts">
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10"><img src="'.$url_situs.'/favicon.png" width="64" alt="Favicon" class="img-thumbnail"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Favicon</label>
	<div class="col-sm-10"><input type="file" name="gambar" size="53"><p class="help-block">Extensi file *.PNG Ukuran Max. 64x64 px</p></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10"><input type="submit" value="Upload" name="submit" class="btn btn-primary"></div>
</div>
</form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

echo $admin;

?>