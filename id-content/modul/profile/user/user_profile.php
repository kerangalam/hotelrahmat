<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_admin')) {
	Header("Location: ../../../index.php");
	exit;
}

if (!cek_login ()){
   $admin .='<p class="judul">Access Denied !!!!!!</p>';
   exit;
}

$username = $_SESSION["UserName"];

#############################################
# Edit Profil
#############################################
if($_GET['aksi']==""){

$admin .='<section class="content-header">
<h1>Profile<small>to manage profile</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Profile</li>
</ol></section>';
$admin .= '<section class="content">';

if (isset($_POST["submit"])) {

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$user_fullname	= addslashes($_POST['user_fullname']);
$user_hp		= $_POST['user_hp'];
$user_web		= $_POST['user_web'];
$user_bio		= addslashes($_POST['user_bio']);
$namafile_name 	= $_FILES['gambar']['name'];

$error = '';
//if (!$hintjawab)  $error .= "Error: Formulir Hint Jawab belum diisi , silahkan ulangi.<br />";
//if (!$email)  $error .= "Error: email tidak boleh kosong!<br />";

if ($error) {
$admin .='<div class="error">'.$error.'</div>';
} else {
if (!empty ($namafile_name)){
$files 		= $_FILES['gambar']['name'];
$tmp_files 	= $_FILES['gambar']['tmp_name'];
$namagambar = $username.'.jpg';
$tempnews 	= 'id-content/modul/profile/images/temp/';
$uploaddir 	= $tempnews . $namagambar; 
$uploads 	= move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
	
$tnews 		= 'id-content/modul/profile/images/';
$small 	= $tnews . $namagambar;
create_thumbnail ($uploaddir, $small, $new_width = 100, $new_height = 'auto', $quality = 85);
unlink($uploaddir);
$hasil = $koneksi_db->sql_query("UPDATE users SET user_fullname='$user_fullname',user_hp='$user_hp',user_web='$user_web',user_bio='$user_bio',user_avatar='$namagambar' WHERE user_name='$username'");
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Profil telah disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=profile&modul=yes">';
}else{
$hasil = $koneksi_db->sql_query("UPDATE users SET user_fullname='$user_fullname',user_hp='$user_hp',user_web='$user_web',user_bio='$user_bio' WHERE user_name='$username'");
$admin.= '<div class="alert alert-success"><strong>Berhasil!</strong> Profil telah disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=profile&modul=yes">';
}
}
}

$hasil =  $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$user_fullname	= $data['user_fullname'];
$user_hp		= $data['user_hp'];
$user_email		= $data['user_email'];
$user_web		= $data['user_web'];
$user_bio		= $data['user_bio'];
if($data['user_avatar']==''){
$gambarlama	= 'profile-default.jpg';
}else{
$gambarlama	= $data['user_avatar'];
}
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border">
	<h3 class="box-title">Profile</h3>
</div>';

$admin .='<form class="form-horizontal" method="post" action=""enctype ="multipart/form-data">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Fullname</label>
	<div class="col-sm-10"><input type="text" name="user_fullname" value="'.$user_fullname.'" class="form-control" placeholder="Fullname"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Email</label>
	<div class="col-sm-10"><input type="text" class="form-control" placeholder="'.$user_email.'" disabled></div>
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
	<div class="col-sm-10"><input type="file" name="gambar"><input type="hidden" name="gambarlama" value="'.$gambarlama.'"></div>
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

echo $admin;

?>