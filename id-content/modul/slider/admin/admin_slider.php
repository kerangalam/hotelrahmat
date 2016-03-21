<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_MODULE')) {
    Header("Location: ../index.php");
    exit;
}

global $koneksi_db,$url_situs;

if (!cek_login ()){
   $admin .='<p class="judul">Access Denied !!!!!!</p>';
   exit;
}

$username = $_SESSION["UserName"];

$temp 	= 'id-content/modul/slider/images/temp/';
$thumb	= 'id-content/modul/slider/images/thumb/';
$normal	= 'id-content/modul/slider/images/normal/';

$admin ='<section class="content-header">
<h1>Posting<small>to manage posting</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Posts</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=slider&amp;modul=yes"><i class="fa fa-fw fa-list"></i> Sliders <span class="badge bg-green">'.$jum_pub.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=slider&amp;modul=yes&amp;aksi=add_slider"><i class="fa fa-fw fa-plus"></i> Slider</a>
</section>';

#############################################
# List Slider
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">All Sliders</h3></div>
<div class="box-body">';

if (isset($_POST['submit'])){
$tot     .= $_POST['tot'];
$pcheck ='';
for($i=1;$i<=$tot;$i++){
$check = $_POST['check'.$i] ;
if($check <> ""){
$pcheck .= $check . ",";
}
}
$pcheck = substr_replace($pcheck, "", -1, 1);
$error = '';
if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}
if ($pcheck)  $sukses .= "Posts with ID $pcheck deleted.<br />";
$hasil = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_id in($pcheck)");
while($data = mysql_fetch_array($hasil)){
    $tempnews 	= 'id-content/modul/slider/images/normal/';
    $namagambar =  $data['gambar'];
    $uploaddir = $tempnews . $namagambar; 
	unlink($uploaddir);
}
$koneksi_db->sql_query("DELETE FROM slider WHERE slider_id in($pcheck)");
if ($sukses){
$admin.='<div class="alert alert-success">'.$sukses.'</div>';
}
}

$cari	= $_GET['cari'];

$limit = 20;

if($cari){
$total = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_publish = 1 and slider_title like '%$cari%' ORDER BY slider_order ASC");
}else{
$total = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_publish = 1 ORDER BY slider_order ASC");
}
$jumlah = $koneksi_db->sql_numrows($total);

if (!isset ($_GET['offset'])) {
	$offset = 0;
}

$a = new paging ($limit);
if ($jumlah<1){
$admin.='<div class="alert alert-danger">No posts</div>';
}else{
if($cari){
$hasil = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_publish = 1 and slider_title like '%$cari%' ORDER BY slider_order ASC LIMIT $offset,$limit");
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_publish = 1 ORDER BY slider_order ASC LIMIT $offset,$limit");
}
if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .= '<form method="get" action="main.php"><div class="input-group">
<input type="text" name="cari" class="form-control" placeholder="Search Title / Author Posts">
<span class="input-group-btn">
	<input type="hidden" name="opsi" value="catalog">
	<input type="hidden" name="modul" value="yes">
	<button class="btn btn-default" type="submit" name="submit" value="Search">Search</button>
</span>
</div></form>';

$admin .="<form method='catalog' action=''>";
$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>#</th>
<th></th>
<th>Title</th>
<th>Author</th>
<th>Date</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$slider_date	= datetimes($data['slider_date'],false);
if($data['slider_image']==''){
$slider_image ='<img class="img-thumbnail" src="id-content/modul/slider/images/default-thumb.jpg" width="100">';
}else{
$slider_image ='<img class="img-thumbnail" src="id-content/modul/slider/images/thumb/'.$data['slider_image'].'" width="100">';
}

$published = ($data['slider_publish'] == 1) ? '<a href="?opsi=slider&amp;modul=yes&amp;aksi=pub&amp;pub=tidak&amp;id='.$data['slider_id'].'"><span class="text-success"><strong>Yes</strong></span></a>' : '<a href="?opsi=slider&amp;modul=yes&amp;aksi=pub&amp;pub=ya&amp;id='.$data['slider_id'].'"><span class="text-danger"><strong>No</strong></span></a>';

$admin .='<tr>
<td>'.$no.'</td>
<td><input type=checkbox name=check'.$no.' value="'.$data['slider_id'].'"></td>
<td>'.$slider_image.'</td>
<td><a href="?opsi=slider&amp;modul=yes&amp;aksi=edit_slider&amp;id='.$data['slider_id'].'">'.$data['slider_title'].'</a><br>
<small>
<a class="text-info" href="?opsi=slider&amp;modul=yes&amp;aksi=edit_slider&amp;id='.$data['slider_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=slider&amp;modul=yes&amp;aksi=del_slider&amp;id='.$data['slider_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>
</small></td>
<td>'.$data['slider_author'].'</td>
<td><small><abbr title="'.datetimes($data['slider_date']).'">'.$slider_date.'</abbr><br>Publish '.$published.'</small></td>
</tr>';		
$no++;
}
$admin .='<tr><td colspan="7"><input type="hidden" name="tot" value="'.$jumlah.'">
<input type="submit" value="Delete" name="submit" class="btn btn-danger"></td></tr>';

$admin .='</tbody></table></div>';
$admin .='</form>';
}

if($jumlah>$limit){
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}
if (empty($_GET['pg']) and !isset ($_GET['pg'])) {
$pg = 1;
}
if (empty($_GET['stg']) and !isset ($_GET['stg'])) {
$stg = 1;
}
$admin .= '<center>';
$admin .= $a-> getPaging($jumlah, $pg, $stg);
$admin .= '</center>';
}

$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Tambah Slider
#############################################
if($_GET['aksi'] =='add_slider'){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Slider</h3></div>';

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$slider_title		= text_filter($_POST['slider_title']);
$slider_link		= $_POST['slider_link'];
$slider_publish		= '1';
$gambar				= $_FILES['gambar']['name'];
$namagambar			= date('Ymd-His');

$error = '';
if (!$slider_title)	$error .= "Please enter title!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($gambar)){
$files     = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$simpan    = $namagambar.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;

create_thumbnail ($uploaddir, $small, $thumb_width = 300, $thumb_height = 89, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1680, $normal_height = 500, $kualitas = 90);
}else{
$simpan = '';
}

$slider_author	= $_SESSION['UserName'];
$slider_date	= date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("INSERT INTO slider (slider_date,slider_author,slider_title,slider_publish,slider_image) VALUES ('$slider_date','$slider_author','$slider_title','$slider_publish','$simpan')");
if($hasil){
$admin .= '<div class="alert alert-success">Slider published.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=slider&modul=yes">';
if (!empty ($gambar)){
unlink($uploaddir);
}
unset($slider_title);
unset($slider_link);

}else{
$admin .= '<div class="alert alert-danger">Failed publish.</div>';
if (!empty ($gambar)){
unlink($small);
unlink($large);
}
}
}
}

$slider_title	= !isset($slider_title)	? '' : $slider_title;
$slider_link	= !isset($slider_link)	? '' : $slider_link;

$admin .= '<form action="" method="post" enctype ="multipart/form-data">
<div class="box-body">
<div class="form-group">
	<label>Title</label>
	<input type="text" name="slider_title" value="'.$slider_title.'" class="form-control" placeholder="Enter title here">
</div>
<div class="form-group">
	<label>Links</label>
	<input type="text" name="slider_link" value="'.$slider_link.'" class="form-control" placeholder="Links">
</div>
<div class="form-group">
	<label>Image</label>
	<input type="file" name="gambar"><p class="help-block">Extensi file *.JPG, *.JPEG</p>
</div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Publish" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Edit Slider
#############################################
if($_GET['aksi']=="edit_slider"){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Slider</h3></div>
<div class="box-body">';

$id	= int_filter($_GET['id']);

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$slider_title	= text_filter($_POST['slider_title']);
$slider_link	= $_POST['slider_link'];
$gambar			= $_FILES['gambar']['name'];
$gambar_lama	= $_POST['gambar_lama'];
$namagambar		= date('Ymd-His');

$error = '';
if (!$slider_title)	$error .= "Error: Enter title slider!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($gambar)){
$files     = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$simpan = $namagambar.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);

if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;

create_thumbnail ($uploaddir, $small, $thumb_width = 300, $thumb_height = 89, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1680, $normal_height = 500, $kualitas = 90);

$username = $_SESSION['UserName'];
$slider_date	= date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("UPDATE slider SET slider_date='$slider_date',slider_author='$username',slider_title='$slider_title',slider_image='$simpan',slider_link='$slider_link' WHERE slider_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Slider updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=slider&modul=yes">';
unlink($uploaddir);
$nimg = $normal . $gambar_lama;
$timg = $thumb . $gambar_lama;
if(!empty ($gambar_lama)){
unlink($nimg);
unlink($timg);
}
unset($slider_title);
unset($slider_link);

}else{
$admin .= '<div class="alert alert-danger">Slider failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
unlink($small);
unlink($large);
}
}else{
$slider_author	= $_SESSION['UserName'];
$slider_date	= date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("UPDATE slider SET slider_date='$slider_date',slider_author='$slider_author',slider_title='$slider_title',slider_link='$slider_link' WHERE slider_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Slider updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=slider&modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">Slider failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_id=$id");
$data = $koneksi_db->sql_fetchrow($a);	
$slider_title	= $data['slider_title'];
$slider_link	= $data['slider_link'];
$gambar_lama	= $data['slider_image'];

$admin .='<form method="post" action="" enctype ="multipart/form-data">
<div class="form-group">
	<label>Title</label>
	<input type="text" name="slider_title" value="'.$slider_title.'" class="form-control" placeholder="Enter title here">
</div>
<div class="form-group">
	<label>Link</label>
	<input type="text" name="slider_link" value="'.$slider_link.'" class="form-control" placeholder="Enter link here">
</div>';
if(!$gambar_lama){
$gambar = '<img class="img-thumbnail" src="id-content/modul/slider/images/thumb_default.jpg" width="120">';
}else{
$gambar = '<img class="img-thumbnail" src="id-content/modul/slider/images/normal/'.$gambar_lama.'" width="120">';
}
$admin .='<div class="form-group">
	<label></label>
	'.$gambar.'
</div>
<div class="form-group">
	<label>Image</label>
	<input type="file" name="gambar">
	<input type="hidden" name="gambar_lama" value="'.$gambar_lama.'">
	<p class="help-block">Extensi file *.JPG, *.JPEG</p>
</div>
</div>
<div class="box-footer">
	<input type="submit" value="Update" name="submit" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Hapus Slider
#############################################
if($_GET['aksi']=="del_slider"){

$id = int_filter($_GET['id']);

$hasil = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_id=$id");
while($data = mysql_fetch_array($hasil)){
$namagambar =  $data['slider_image'];
$uploaddirt = $thumb . $namagambar; 
$uploaddirn = $normal . $namagambar; 
unlink($uploaddirt);
unlink($uploaddirn);
}

$koneksi_db->sql_query("DELETE FROM slider WHERE slider_id='$id'");
$admin .= '<section class="content">';
$admin.='<div class="alert alert-success">Slideshow berhasil dihapus</div>';
$admin .= '</section>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=slider&modul=yes">';
}

#############################################
# Publikasi Slider
#############################################
if ($_GET['aksi'] == 'pub'){
if ($_GET['pub'] == 'tidak'){
	$id = int_filter($_GET['id']);
	$koneksi_db->sql_query ("UPDATE slider SET slider_publish = 0 WHERE slider_id='$id'");
	header ("location:?opsi=slider&modul=yes");
}	
	
if ($_GET['pub'] == 'ya'){
	$id = int_filter ($_GET['id']);
	$koneksi_db->sql_query ("UPDATE slider SET slider_publish = 1 WHERE slider_id='$id'");
	header ("location:?opsi=slider&modul=yes");
}	
}

echo $admin;

?>