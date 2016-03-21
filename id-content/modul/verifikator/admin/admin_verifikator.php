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

$style_include[] = '
<!-- Select2 -->
<link rel="stylesheet" href="'.$url_situs.'/id-admin/themes/administrator/plugins/select2/select2.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="'.$url_situs.'/id-admin/themes/administrator/plugins/iCheck/all.css">
<!-- DatePicker -->
<link rel="stylesheet" href="'.$url_situs.'/id-admin/themes/administrator/plugins/datepicker/css/datepicker.css">';
$script_include[] = '
<script src="'.$url_situs.'/id-admin/themes/administrator/js/jquery.chained.js"></script>
<!-- Select2 -->
<script src="'.$url_situs.'/id-admin/themes/administrator/plugins/select2/select2.full.min.js"></script>
<!-- DatePicker -->
<script src="'.$url_situs.'/id-admin/themes/administrator/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
$(function () {
//Initialize Select2 Elements
$(".select2").select2();
});
$( "#datepicker" ).datepicker();
$("#series").chained("#mark");
</script>';

$username = $_SESSION["UserName"];

$admin .='<section class="content-header">
<h1>Profil<small>untuk mengelola profil</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Profil</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="'.$url_situs.'/main.php?opsi=profile&modul=yes"><i class="fa fa-pencil-square-o"></i> Edit Profile</a>
<a class="btn btn-default btn-flat" href="'.$url_situs.'/main.php?opsi=profile&modul=yes&aksi=document"><i class="fa fa-file-image-o"></i> Upload KTP</a>
</section>';

#############################################
# Edit Profil
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

if (isset($_POST["submit"])) {

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$user_fullname	= addslashes($_POST['user_fullname']);
$user_address	= addslashes($_POST['user_address']);
$user_pos		= int_filter($_POST['user_pos']);
$user_prov		= int_filter($_POST['user_prov']);
$user_kota		= int_filter($_POST['user_kota']);
$user_hp		= $_POST['user_hp'];
$user_kelamin	= $_POST['user_kelamin'];
$verify_prov	= int_filter($_POST['verify_prov']);
$verify_kota	= int_filter($_POST['verify_kota']);
$user_lahir		= $_POST['user_lahir'];
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
create_thumbnail ($uploaddir, $small, $new_width = 200, $new_height = 200, $quality = 85);
unlink($uploaddir);
$hasil = $koneksi_db->sql_query("UPDATE users SET user_fullname='$user_fullname',user_address='$user_address',user_pos='$user_pos',user_prov='$user_prov',user_kota='$user_kota',user_hp='$user_hp',user_kelamin='$user_kelamin',user_lahir='$user_lahir',user_bio='$user_bio',verify_prov='$verify_prov',verify_kota='$verify_kota',user_avatar='$namagambar' WHERE user_name='$username'");
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Profil telah disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=profile&modul=yes">';
}else{
$hasil = $koneksi_db->sql_query("UPDATE users SET user_fullname='$user_fullname',user_address='$user_address',user_pos='$user_pos',user_prov='$user_prov',user_kota='$user_kota',user_hp='$user_hp',user_kelamin='$user_kelamin',user_lahir='$user_lahir',user_bio='$user_bio',verify_prov='$verify_prov',verify_kota='$verify_kota' WHERE user_name='$username'");
$admin.= '<div class="alert alert-success"><strong>Berhasil!</strong> Profil telah disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=profile&modul=yes">';
}
}
}

$hasil =  $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$user_fullname	= $data['user_fullname'];
$user_address	= $data['user_address'];
$user_pos		= $data['user_pos'];
$user_prov		= $data['user_prov'];
$user_kota		= $data['user_kota'];
$user_hp		= $data['user_hp'];
$user_kelamin	= $data['user_kelamin'];
$user_lahir		= $data['user_lahir'];
$user_bio		= $data['user_bio'];
$verify_prov	= $data['verify_prov'];
$verify_kota	= $data['verify_kota'];
if($data['user_avatar']==''){
$gambarlama	= 'profile-default.jpg';
}else{
$gambarlama	= $data['user_avatar'];
}
}

$admin .='<form method="post" action="" enctype ="multipart/form-data">
<div class="box box-warning">
<div class="box-header with-border">
	<h3 class="box-title">Informasi Profil</h3>
</div>
<div class="box-body">
<div class="form-group">
	<label>Nama Lengkap <span class="text-danger">*</span></label>
	<input type="text" name="user_fullname" value="'.$user_fullname.'" class="form-control" placeholder="Nama lengkap" required="">
	<p class="help-block">Isi nama lengkap kamu, agar terlihat lebih profesional di mata klien.</p>
</div>
<div class="form-group">
	<label>Alamat Lengkap <span class="text-danger">*</span></label>
	<input type="text" name="user_address" value="'.$user_address.'" class="form-control" placeholder="Alamat lengkap" required="">
	<p class="help-block">Jl. Dharmawangsa 60 Surabaya</p>
</div>
<div class="form-group">
	<label>Kode Pos</label>
	<input type="text" name="user_pos" value="'.$user_pos.'" class="form-control" placeholder="Kode Pos">
</div>
<div class="form-group">
	<label>Propinsi <span class="text-danger">*</span></label>
	<select id="mark" name="user_prov" class="form-control select2" required="">';
$s = $koneksi_db->sql_query("SELECT * FROM verify_provinsi ORDER BY provinsi ASC");
$admin .= '<option value="">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$pilihans = ($data['id']==$user_prov)?'selected':'';
$admin .= '<option value="'.$data['id'].'" '.$pilihans.'>'.$data['provinsi'].'</option>';
}
$admin .= '</select>
</div>
<div class="form-group">
	<label>Kota / Kabupaten <span class="text-danger">*</span></label>
	<select id="series" name="user_kota" class="form-control select2" required="">';
$s = $koneksi_db->sql_query("SELECT * FROM verify_kota ORDER BY kota ASC");
$admin .= '<option value="">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$pilihans = ($data['id']==$user_kota)?'selected':'';
$admin .= '<option value="'.$data['id'].'" '.$pilihans.' class="'.$data['id_prov'].'">'.$data['kota'].'</option>';
}
$admin .= '</select>
</div>
<div class="form-group">
	<label>Nomor Handphone <span class="text-danger">*</span></label>
	<div class="input-group"><span class="input-group-addon" id="basic-addon1">+62</span><input type="text" name="user_hp" value="'.$user_hp.'" class="form-control" placeholder="Contoh : 82166000063"></div>
</div>
<div class="form-group">
	<label>Jenis Kelamin <span class="text-danger">*</span></label>';
if($user_kelamin=='Laki-laki'){
$admin .= '
<div class="radio">
	<label>
		<input name="user_kelamin" type="radio" value="Laki-laki" class="flat-red" checked="checked"> Laki-laki
	</label>
</div>
<div class="radio">
	<label>
		<input name="user_kelamin" type="radio" value="Perempuan" class="flat-red"> Perempuan
	</label>
</div>';
}else{
$admin .= '
<div class="radio">
	<label>
		<input name="user_kelamin" type="radio" value="Laki-laki" class="flat-red"> Laki-laki
	</label>
</div>
<div class="radio">
	<label>
		<input name="user_kelamin" type="radio" value="Perempuan" class="flat-red" checked="checked"> Perempuan
	</label>
</div>';
}
$admin .='</div>
<div class="form-group">
	<label>Tanggal Lahir</label>
		<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
		<input type="text" name="user_lahir" value="'.$user_lahir.'" id="datepicker" class="form-control"></div>
</div>
<div class="form-group">
	<label>Biographical Info <span class="text-danger">*</span></label>
	<textarea name="user_bio" rows="5" class="form-control">'.$user_bio.'</textarea>
	<p class="help-block">Masukan Informasi yang dapat membantu untuk mempromosikan Anda dan bisnis Anda. Profil Anda akan langsung dikirimkan kepada klien kami ketika Anda melamar
ke sebuah job. Dari data kami 70% dari klien merekrut verifikator yang memiliki profil yang lengkap.</p>
</div>
<div class="form-group">
	<label></label>
	<img class="img-circle img-thumbnail" src="'.$url_situs.'/id-content/modul/profile/images/'.$gambarlama.'" width="150">
</div>
<div class="form-group">
	<label>Foto Profil</label>
	<input type="file" name="gambar"><input type="hidden" name="gambarlama" value="'.$gambarlama.'">
	<p class="help-block">Unggah foto profil Anda yang menarik dan membuat klien yakin untuk merekrut Anda.</p>
</div>
</div></div>

<div class="box box-warning">
<div class="box-header with-border">
	<h3 class="box-title">Area Verifikasi</h3>
</div>
<div class="box-body">
<div class="form-group">
	<label>Propinsi <span class="text-danger">*</span></label>
	<select name="verify_prov" class="form-control select2" required="">';
$s = $koneksi_db->sql_query("SELECT * FROM verify_provinsi ORDER BY provinsi ASC");
$admin .= '<option value="">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$pilihans = ($data['id']==$verify_prov)?'selected':'';
$admin .= '<option value="'.$data['id'].'" '.$pilihans.'>'.$data['provinsi'].'</option>';
}
$admin .= '</select>
</div>
<div class="form-group">
	<label>Kota / Kabupaten <span class="text-danger">*</span></label>
	<select name="verify_kota" class="form-control select2" required="">';
$s = $koneksi_db->sql_query("SELECT * FROM verify_kota ORDER BY kota ASC");
$admin .= '<option value="">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$pilihans = ($data['id']==$verify_kota)?'selected':'';
$admin .= '<option value="'.$data['id'].'" '.$pilihans.'>'.$data['kota'].'</option>';
}
$admin .= '</select>
</div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
</div>
</div><!-- /.box -->
</form>';
$admin .= '</section>';
}

#############################################
# Document
#############################################
if($_GET['aksi']=="document"){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Kartu Tanda Penduduk (KTP)</h3></div>
<div class="box-body">';

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$gambar			= $_FILES['gambar']['name'];
$gambar_lama	= $_POST['gambar_lama'];
$namagambar		= date('Ymd-His');

/*$error = '';
if (!$post_title)	$error .= "Error: Judul berita belum diisi!<br />";
if (!$post_cat)		$error .= "Error: Kategori berita belum dipilih!<br />";
if (!$post_content)	$error .= "Error: Konten berita belum diisi!<br />";*/

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($gambar)){
$files     = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$simpan = $namagambar.'.jpg';
$temp = 'id-content/modul/profile/images/temp/';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);

if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}

$folder = 'id-content/modul/profile/images/document/';
$large = $folder . $simpan;
create_thumbnail ($uploaddir, $large, $normal_width = 800, $normal_height = 500, $kualitas = 90);

$hasil = $koneksi_db->sql_query("UPDATE users SET user_ktp='$simpan' WHERE user_name='$username'");
#####################
if($hasil){
$admin .= '<div class="alert alert-success">KTP updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=profile&modul=yes&aksi=document">';
unlink($uploaddir);
$nimg = $normal . $gambar_lama;
if(!empty ($gambar_lama)){
unlink($nimg);
}

}else{
$admin .= '<div class="alert alert-danger">KTP failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
unlink($large);
}
#####################
}else{
$admin .= '<div class="alert alert-danger">Silahkan upload KTP Anda!</div>';
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
$data = $koneksi_db->sql_fetchrow($a);
$user_status = $data['user_status'];	
$gambar_lama = $data['user_ktp'];

$admin .='<form method="post" action="" enctype ="multipart/form-data">';
if(!$gambar_lama){
$gambar = '';
}else{
$gambar = '<img class="img-thumbnail" src="id-content/modul/profile/images/document/'.$gambar_lama.'" width="400">';
}
$admin .='<div class="form-group">'.$gambar.'</div>';
if($user_status=='Unverified'){
$admin .='<div class="form-group">
	<label>Upload</label>
	<input type="file" name="gambar">
	<input type="hidden" name="gambar_lama" value="'.$gambar_lama.'">
	<p class="help-block">Extensi file *.JPG, *.JPEG</p>
</div>
</div>
<div class="box-footer">
	<input type="submit" value="Update" name="submit" class="btn btn-primary">
</div>';
}else{
$admin .= '';	
}
$admin .= '</form>';
$admin .= '</div>';
$admin .= '</section>';
}

echo $admin;

?>