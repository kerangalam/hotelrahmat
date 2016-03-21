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

$username = $_SESSION['UserName'];
$temp 	= 'id-content/modul/photo/images/temp/';
$thumb 	= 'id-content/modul/photo/images/thumb/';
$normal = 'id-content/modul/photo/images/normal/';

if (isset ($_GET['pg'])) $pg = int_filter ($_GET['pg']); else $pg = 0;
if (isset ($_GET['stg'])) $stg = int_filter ($_GET['stg']); else $stg = 0;
if (isset ($_GET['offset'])) $offset = int_filter ($_GET['offset']); else $offset = 0;

$total = $koneksi_db->sql_query("SELECT * FROM photo");	
$jumlah = $koneksi_db->sql_numrows($total);

$admin ='<section class="content-header">
<h1>Photos<small>to manage photos</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Photos</li>
</ol></section>';

$admin .= '<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=photo&amp;modul=yes"><i class="fa fa-fw fa-list"></i> Photos <span class="badge">'.$jumlah.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=photo&amp;modul=yes&amp;aksi=add_photo"><i class="fa fa-fw fa-plus"></i> Photo</a>
<a class="btn btn-default btn-flat" href="?opsi=photo&amp;modul=yes&amp;aksi=categories">Categories</a>
<a class="btn btn-default btn-flat" href="?opsi=photo&amp;modul=yes&amp;aksi=thumbnail">Thumbnail Default</a>
</section>';

#############################################
# List Foto
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">List Photos</h3></div>
<div class="box-body">';

if (isset($_POST['submit'])){
$tot .= $_POST['tot'];
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
if ($pcheck) $sukses .= "Photos with ID $pcheck deleted.<br />";
$hasil = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_id in($pcheck)");
while($data = $koneksi_db->sql_fetchrow($hasil)){
$namagambar =  $data['photo_image'];
$uploaddirt = $thumb . $namagambar;
$uploaddirn = $normal . $namagambar; 
unlink($uploaddirt);
unlink($uploaddirn);
}
$koneksi_db->sql_query("DELETE FROM photo WHERE photo_id in($pcheck)");
if ($sukses){
$admin.='<div class="alert alert-success">'.$sukses.'</div>';
}
}

$cari	= $_GET['cari'];
$kid	= $_GET['kid'];

$limit = 20;

if($cari){
$total = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_publish = 1 and photo_name like '%$cari%' or photo_desc like '%$cari%' ORDER BY photo_date DESC");
}elseif ($kid) {
$total = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_publish = 1 and photo_kid=".$kid." ORDER BY photo_date DESC");
}else{
$total = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_publish = 1 ORDER BY photo_date DESC");
}
$jumlah = $koneksi_db->sql_numrows( $total );

if (!isset ($_GET['offset'])) {
	$offset = 0;
}

$a = new paging ($limit);
if ($jumlah<1){
$admin.='<div class="alert alert-danger">Data not found</div>';
}else{
if($cari){
$hasil = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_publish = 1 and photo_name like '%$cari%' or photo_desc like '%$cari%' ORDER BY photo_date DESC LIMIT $offset,$limit");
}elseif ($kid) {
$hasil = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_publish = 1 and photo_kid=".$kid." ORDER BY photo_date DESC LIMIT $offset,$limit");
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_publish = 1 ORDER BY photo_date DESC LIMIT $offset,$limit");
}
if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .= '<form method="get" action="main.php"><div class="input-group">
<input type="text" name="cari" class="form-control" placeholder="Search Photos">
<span class="input-group-btn">
	<input type="hidden" name="opsi" value="photo">
	<input type="hidden" name="modul" value="yes">
	<button class="btn btn-default" type="submit" name="submit" value="Search">Search</button>
</span>
</div></form>';

$admin .= '<form method="post" action="">';
$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>#</th>
<th></th>
<th>Name</th>
<th>Author</th>
<th>Categories</th>
<th>Actions</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$photo_date		= datetimes($data['photo_date']);
$photo_kid		= $data['photo_kid'];
$photo_image	= '<img class="img-thumbnail" src="id-content/modul/photo/images/thumb/'.$data['photo_image'].'" width="50" height="50">';

$hasil2 = $koneksi_db->sql_query("SELECT * FROM photo_cat WHERE cat_kid=$photo_kid");
$data2 = $koneksi_db->sql_fetchrow($hasil2);
$cat_name = $data2['cat_name'];

$admin .='<tr>
<td>'.$no.'</td>
<td><input type=checkbox name=check'.$no.' value="'.$data['photo_id'].'"></td>
<td>'.$photo_image.'</td>
<td><a class="text-info" href="?opsi=photo&amp;modul=yes&amp;aksi=edit_photo&amp;id='.$data['photo_id'].'">'.$data['photo_name'].'</a>
<div class="text-muted"><small>'.$photo_date.'</small></div></td>
<td>'.$data['photo_author'].'</td>
<td><a class="text-info" href="?opsi=photo&amp;modul=yes&amp;kategori='.$photo_kid.'">'.$cat_name.'</a></td>
<td><a class="text-info" href="?opsi=photo&amp;modul=yes&amp;aksi=edit_photo&amp;id='.$data['photo_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=photo&amp;modul=yes&amp;aksi=del_photo&amp;id='.$data['photo_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
</tr>';		
$no++;
}
$admin .='<tr><td colspan="8"><input type="hidden" name="tot" value="'.$jumlah.'">
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
# Tambah Foto
#############################################
if($_GET['aksi'] =='add_photo'){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Photos</h3></div>
<div class="box-body">';

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

//include "id-includes/hft_image.php";

$photo_kid		= int_filter($_POST['photo_kid']);
$image_name1	= $_FILES['image1']['name'];
$image_name2	= $_FILES['image2']['name'];
$image_name3	= $_FILES['image3']['name'];
$image_name4	= $_FILES['image4']['name'];
$image_name5	= $_FILES['image5']['name'];

$error = '';
if (!$photo_kid) $error .= "Error: Kategori foto belum dipilih!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($image_name1)){
$files     = $_FILES['image1']['name'];
$tmp_files = $_FILES['image1']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(photo_id) AS last FROM photo");
$data  = $koneksi_db->sql_fetchrow($$query);
$newID = $data['last']+1;
$nm_tgl = date('Ymd-His');

$simpan    = ''.$newID.'-'.$nm_tgl.'.jpg';
$uploaddir = $temp . $simpan;
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;
create_thumbnail ($uploaddir, $small, $thumb_width = 360, $thumb_height = 225, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1000, $normal_height = 625, $kualitas = 90);

$photo_date = date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("INSERT INTO photo (photo_date,photo_author,photo_publish,photo_image,photo_kid) VALUES ('$photo_date','$username','1','$simpan','$photo_kid')");
$admin .= '<div class="alert alert-success">Photo 1 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
unlink($uploaddir);
}

if (!empty ($image_name2)){
$files     = $_FILES['image2']['name'];
$tmp_files = $_FILES['image2']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(photo_id) AS last FROM photo");
$data  = $koneksi_db->sql_fetchrow($$query);
$newID = $data['last']+1;
$nm_tgl = date('Ymd-His');

$simpan    = ''.$newID.'-'.$nm_tgl.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;
create_thumbnail ($uploaddir, $small, $thumb_width = 360, $thumb_height = 225, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1000, $normal_height = 625, $kualitas = 90);
$photo_date = date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("INSERT INTO photo (photo_date,photo_author,photo_publish,photo_image,photo_kid) VALUES ('$photo_date','$username','1','$simpan','$photo_kid')");
$admin .= '<div class="alert alert-success">Photo 2 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
unlink($uploaddir);
}

if (!empty ($image_name3)){
$files     = $_FILES['image3']['name'];
$tmp_files = $_FILES['image3']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(photo_id) AS last FROM photo");
$data  = $koneksi_db->sql_fetchrow($$query);
$newID = $data['last']+1;
$nm_tgl = date('Ymd-His');

$simpan    = ''.$newID.'-'.$nm_tgl.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;
create_thumbnail ($uploaddir, $small, $thumb_width = 360, $thumb_height = 225, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1000, $normal_height = 625, $kualitas = 90);
$photo_date = date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("INSERT INTO photo (photo_date,photo_author,photo_publish,photo_image,photo_kid) VALUES ('$photo_date','$username','1','$simpan','$photo_kid')");
$admin .= '<div class="alert alert-success">Photo 3 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
unlink($uploaddir);
}

if (!empty ($image_name4)){
$files     = $_FILES['image4']['name'];
$tmp_files = $_FILES['image4']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(photo_id) AS last FROM photo");
$data  = $koneksi_db->sql_fetchrow($$query);
$newID = $data['last']+1;
$nm_tgl = date('Ymd-His');

$simpan    = ''.$newID.'-'.$nm_tgl.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;
create_thumbnail ($uploaddir, $small, $thumb_width = 360, $thumb_height = 225, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1000, $normal_height = 625, $kualitas = 90);
$photo_date = date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("INSERT INTO photo (photo_date,photo_author,photo_publish,photo_image,photo_kid) VALUES ('$photo_date','$username','1','$simpan','$photo_kid')");
$admin .= '<div class="alert alert-success">Photo 4 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
unlink($uploaddir);
}

if (!empty ($image_name5)){
$files     = $_FILES['image5']['name'];
$tmp_files = $_FILES['image5']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(photo_id) AS last FROM photo");
$data  = $koneksi_db->sql_fetchrow($$query);
$newID = $data['last']+1;
$nm_tgl = date('Ymd-His');

$simpan    = ''.$newID.'-'.$nm_tgl.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;
create_thumbnail ($uploaddir, $small, $thumb_width = 360, $thumb_height = 225, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1000, $normal_height = 625, $kualitas = 90);
$photo_date = date('Y-m-d H:i:s');
$hasil = $koneksi_db->sql_query("INSERT INTO photo (photo_date,photo_author,photo_publish,photo_image,photo_kid) VALUES ('$photo_date','$username','1','$simpan','$photo_kid')");
$admin .= '<div class="alert alert-success">Photo 5 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
unlink($uploaddir);
}
}
}

$admin .= '<form action="" method="post" enctype ="multipart/form-data">
<div class="form-group">
	<label>Category</label>
	<select name="photo_kid" class="form-control">';
$s = $koneksi_db->sql_query("SELECT * FROM photo_cat ORDER BY cat_name ASC");
$admin .= '<option value="0">None</option>';
while($data = $koneksi_db->sql_fetchrow($s)){
$admin .= '<option value="'.$data['cat_kid'].'">'.$data['cat_name'].'</option>';
}
$admin .= '</select>
</div>
<div class="form-group">
	<label>Foto 1</label>
	<input type="file" name="image1">
</div>
<div class="form-group">
	<label>Foto 2</label>
	<input type="file" name="image2">
</div>
<div class="form-group">
	<label>Foto 3</label>
	<input type="file" name="image3">
</div>
<div class="form-group">
	<label>Foto 4</label>
	<input type="file" name="image4">
</div>
<div class="form-group">
	<label>Foto 5</label>
	<input type="file" name="image5">
</div>
<div class="form-group">
	<label></label>
	<input type="submit" name="submit" value="Upload" class="btn btn-primary">
</div>
</form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Edit Foto
#############################################
if($_GET['aksi'] =='edit_photo'){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Photo</h3></div>
<div class="box-body">';

$id	= int_filter($_GET['id']);

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$photo_name		= addslashes($_POST['photo_name']);
$photo_kid		= int_filter($_POST['photo_kid']);
$photo_desc		= addslashes($_POST['photo_desc']);
$photo_slug		= SEO($_POST['photo_name']);
$gambar			= $_FILES['gambar']['name'];
$gambar_lama	= $_POST['gambar_lama'];
$namagambar		= date('Ymd-His');

$error = '';
//if (!$photo_name)	$error .= "Error: Nama foto belum diisi!<br />";
if (!$photo_kid)	$error .= "Error: Kategori foto belum dipilih!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($gambar)){
$files     = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$simpan    = ''.$id.'-'.$namagambar.'.jpg';
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);

if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;

create_thumbnail ($uploaddir, $small, $thumb_width = 360, $thumb_height = 225, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 1000, $normal_height = 625, $kualitas = 90);

$hasil = $koneksi_db->sql_query("UPDATE photo SET photo_name='$photo_name',photo_kid='$photo_kid',photo_desc='$photo_desc',photo_slug='$photo_slug',photo_image='$simpan' WHERE photo_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Photo updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
unlink($uploaddir);
$nimg = $normal . $gambar_lama;
$timg = $thumb . $gambar_lama;
if(!empty ($gambar_lama)){
unlink($nimg);
unlink($timg);
}
unset($judul);
unset($konten);
unset($label);
unset($caption);
unset($sumber);

}else{
$admin .= '<div class="alert alert-danger">Photo failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
unlink($small);
unlink($large);
}
}else{
$hasil = $koneksi_db->sql_query("UPDATE photo SET photo_name='$photo_name',photo_kid='$photo_kid',photo_desc='$photo_desc',photo_slug='$photo_slug' WHERE photo_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Photo updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">Photo failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_id=$id");
$data = $koneksi_db->sql_fetchrow($a);	
$photo_name		= $data['photo_name'];
$photo_kid		= $data['photo_kid']; 
$photo_desc		= $data['photo_desc'];
$gambar_lama	= $data['photo_image'];

$admin .='<form class="form-horizontal" method="post" action="" enctype ="multipart/form-data">
<div class="form-group">
	<label class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10"><input type="text" name="photo_name" value="'.$photo_name.'" class="form-control"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Description</label>
	<div class="col-sm-10"><select name="photo_kid" class="form-control">';
$hasil = $koneksi_db->sql_query("SELECT * FROM photo_cat ORDER BY cat_name");
$admin .= '<option value="">None</option>';
while ($datas = $koneksi_db->sql_fetchrow ($hasil)){
$pilihan = ($datas['cat_kid']==$photo_kid)? "selected":'';
$admin .='<option value="'.$datas['cat_kid'].'" '.$pilihan.'>'.$datas['cat_name'].'</option>';
}
$admin .='</select></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Description</label>
	<div class="col-sm-10"><textarea name="photo_desc" rows="5" id="CKEditor" class="form-control">'.$photo_desc.'</textarea></div>
</div>';
if(!$gambar_lama){
$gambar = '<img class="img-thumbnail" src="id-content/modul/photo/images/default-thumb.jpg" width="120">';
}else{
$gambar = '<img class="img-thumbnail" src="id-content/modul/photo/images/thumb/'.$gambar_lama.'" width="120">';
}
$admin .='<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10">'.$gambar.'</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Gambar</label>
	<div class="col-sm-10"><input type="file" name="gambar"><input type="hidden" name="gambar_lama" size="53" value="'.$gambar_lama.'"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10"><input type="submit" value="Update" name="submit" class="btn btn-primary"></form></div>
</div>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# List Kategori
#############################################
if($_GET['aksi'] =='categories'){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">All Categories</h3></div>
<div class="box-body">';

$admin .= '<div class="row">';
$admin .= '<div class="col-md-4">';
if(isset($_POST['submit'])){
$cat_name	= text_filter($_POST['cat_name']);
$cat_desc 	= text_filter($_POST['cat_desc']);
$cat_slug	= SEO($_POST['cat_name']);

$total 	= $koneksi_db->sql_query("SELECT * FROM photo_cat WHERE cat_name='".$_POST['cat_name']."'");
$jumlah = $koneksi_db->sql_numrows($total);
$error = '';
if ($jumlah)	$error .= "The category name already exists in the database.<br />";
if (!$cat_name)	$error .= "Please enter name category.<br />";
if (!$cat_desc)	$error .= "Please enter description category.<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("INSERT INTO photo_cat (cat_name,cat_desc,cat_slug) VALUES ('$cat_name','$cat_desc','$cat_slug')");
if($hasil){
$admin .= '<div class="alert alert-success">Category published.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes&aksi=categories">';
}else{
$admin .= '<div class="alert alert-danger">Category failed publish.</div>';
}
}
}

$cat_name	= !isset($cat_name) ? '' : $cat_name;
$cat_desc 	= !isset($cat_desc) ? '' : $cat_desc;

$admin .= '<form action="" method="post">
<div class="form-group">
	<label>Name</label>
	<input type="text" name="cat_name" value="'.$cat_name.'" class="form-control" placeholder="Enter name here">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea name="cat_desc" rows="3" class="form-control" placeholder="Enter description here">'.htmlentities($cat_desc).'</textarea>
</div>
<div class="form-group">
	<input type="submit" name="submit" value="Update" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';

$admin .= '<div class="col-md-8">';
$admin .= '<table class="table table-striped">
<thead><tr>
<th>No</th>
<th>Name</th>
<th class="text-right">Count</th>
<th>Actions</th>
</tr></thead><tbody>';
$no = 1;
$s = $koneksi_db->sql_query("SELECT * FROM photo_cat ORDER BY cat_name ASC");	
while($data = $koneksi_db->sql_fetchrow($s)){
$cat_kid	= $data['cat_kid'];
$cat_name 	= $data['cat_name'];

$s2 = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_kid='$cat_kid'");	
$jumlah = $koneksi_db->sql_numrows($s2);

$admin .= '<tr>
<td>'.$no.'</td>
<td><a class="text-info" href="?opsi=photo&amp;modul=yes&amp;kid='.$cat_kid.'">'.$cat_name.'</a></td>
<td class="text-right"><span class="text-muted">'.$jumlah.'</span></td>
<td><a class="text-info" href="?opsi=photo&amp;modul=yes&amp;aksi=edit_category&amp;kid='.$cat_kid.'">Edit</a> - 
<a class="text-danger" href="?opsi=photo&amp;modul=yes&amp;aksi=del_category&amp;kid='.$cat_kid.'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
</tr>';
$no++;
}
$admin .='</tbody></table>';
$admin .= '</div>';
$admin .= '</div>';

$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Edit Kategori
#############################################
if($_GET['aksi'] =='edit_category'){

$admin .= '<section class="content">';

$kid	= int_filter($_GET['kid']);

if(isset($_POST['submit'])){
$cat_name   = text_filter($_POST['cat_name']);
$cat_desc	= text_filter($_POST['cat_desc']);
$cat_slug	= SEO($_POST['cat_name']);

$total = $koneksi_db->sql_query( "SELECT * FROM photo_cat WHERE cat_name='".$_POST['cat_name']."' and cat_kid!=$kid");
$jumlah = $koneksi_db->sql_numrows( $total );

$error = '';
if ($jumlah)	$error .= "<strong>Gagal!</strong> Nama kategori <strong>$kategori</strong> sudah ada di dalam database!<br />";
if (!$cat_name)	$error .= "<strong>Gagal!</strong> Kategori tidak boleh kosong!<br />";
if (!$cat_desc)	$error .= "<strong>Gagal!</strong> Keterangan tidak boleh kosong!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("UPDATE photo_cat SET cat_name='$cat_name', cat_desc='$cat_desc', cat_slug='$cat_slug' WHERE cat_kid='$kid'");
if($hasil){
$admin .= '<div class="alert alert-success">Category updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes&aksi=categories">';
}else{
$admin .= '<div class="alert alert-danger">Category failed update.</div>';
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM photo_cat WHERE cat_kid=$kid");
$data = $koneksi_db->sql_fetchrow($a);	
$cat_name	= $data['cat_name'];    
$cat_desc	= $data['cat_desc'];    

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Category</h3></div>
<div class="box-body">';
$admin .= '<form class="form-horizontal" action="" method="post">
<div class="form-group">
	<label class="col-sm-2">Name</label>
	<div class="col-sm-10"><input type="text" name="cat_name" value="'.$cat_name.'" class="form-control"></div>
</div>
<div class="form-group">
	<label class="col-sm-2">Description</label>
	<div class="col-sm-10"><textarea name="cat_desc" rows="3" class="form-control">'.htmlentities($cat_desc).'</textarea></div>
</div>
<div class="form-group">
	<label class="col-sm-2"></label>
	<div class="col-sm-10"><input type="submit" name="submit" value="Update" class="btn btn-primary"></div>
</div>
</form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Hapus Kategori
#############################################
if($_GET['aksi'] =='del_category'){
$admin .= '<section class="content">';
$kid = int_filter($_GET['kid']);
$hapusphoto = $koneksi_db->sql_query ("select * FROM photo WHERE photo_kid='$kid'");
while($data = $koneksi_db->sql_fetchrow($hapusphoto)){
$gambar=$data['gambar'];
$uploaddir = $normal . $gambar;
unlink($uploaddir);
}	
$hapusphoto2 = $koneksi_db->sql_query("delete FROM photo WHERE photo_kid='$kid'");
$hapus = $koneksi_db->sql_query("DELETE FROM photo_cat WHERE cat_kid='$kid'");	
if ($hapus){
$admin .= '<div class="alert alert-success">Category with ID '.$id.' successfully deleted.</div>';	
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes&aksi=categories">';
}else {
$admin .= '<div class="alert alert-danger">Category with ID '.$id.' failed deleted.</div>';	
}
$admin .= '</section>';
}

#############################################
# Hapus Foto
#############################################
if($_GET['aksi'] =='del_photo'){
$id = int_filter($_GET['id']);
$cek = $koneksi_db->sql_query("SELECT photo_image FROM photo WHERE photo_id=$id");
while($data = $data = $koneksi_db->sql_fetchrow($cek)){ 
$photo_image = $data['photo_image'];
$uploaddirt = $thumb . $photo_image;
$uploaddirn = $normal . $photo_image;
unlink($uploaddirt);
unlink($uploaddirn);
$cek = $koneksi_db->sql_query("update foto_kat set gambar = '' WHERE gambar = '$photo_image'");
}
$hapus = $koneksi_db->sql_query("DELETE FROM photo WHERE photo_id='$id'");
$admin .= '<section class="content">';
if ($hapus){
$admin .= '<div class="alert alert-success">Photo with ID '.$id.' deleted.</div>';	
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes">';
}else {
$admin .= '<div class="alert alert-danger">Photo with ID '.$id.' deleted.</div>';	
}
$admin .= '</section>';
}

#############################################
# Cover Foto
#############################################
if($_GET['aksi'] =='cover_photo'){
$id = int_filter ($_GET['id']);
$kid = int_filter ($_GET['kid']);
$s  = $koneksi_db->sql_query( "SELECT * FROM photo WHERE id=$id" );
$data = mysql_fetch_array($s);
$gambar = $data['gambar'];
$cek  = $koneksi_db->sql_query( "update photo_kat set gambar = '$gambar' WHERE kid = '$kid'" );
if ($cek){
$admin .= '<div class="alert alert-success">Photo Dengan ID = '.$id.' Berhasil Dibuat Cover = '.$kid.'</div>';	
$style_include[] ='<meta http-equiv="refresh" content="3; url=?opsi=photo&mod=yes">';
}
}

#############################################
# Thumbnail
#############################################
if($_GET['aksi']=="thumbnail"){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Thumbnail Default</h3></div>
<div class="box-body">';

if (isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$namafile_name = $_FILES['gambar']['name'];
if (!empty ($namafile_name)){

$files = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$nama_thumb = 'default-thumb.jpg';
$nama_normal = 'default-normal.jpg';
$uploaddir = $temp . $nama_normal;
$uploads = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}

$folder = 'id-content/modul/photo/images/';
$small = $folder . $nama_thumb;
$large = $folder . $nama_normal;

create_thumbnail ($uploaddir, $small, $thumb_width = 200, $thumb_height = 113, $kualitas = 90);
create_thumbnail ($uploaddir, $large, $normal_width = 800, $normal_height = 452, $kualitas = 90);

//unlink($uploaddir);
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Gambar default berhasil disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes&aksi=thumbnail">';
}
}

$admin .='<form method="post" action="" enctype ="multipart/form-data">';
$gambarlama = 'default-thumb.jpg';
$admin .='<div class="form-group">
	<label>Image Preview</label>
	<div><img class="img-thumbnail" src="id-content/modul/photo/images/'.$gambarlama.'" alt="Thumbnail Default"></div>
</div>
<div class="form-group">
	<label>Thumbnail Default</label>
	<input type="file" name="gambar"><p class="help-block">Extensi file *.JPG, *.JPEG</p>
</div>
</div>
<div class="box-footer">
	<input type="submit" value="Upload" name="submit" class="btn btn-primary">
</div></form>';
$admin .= '</div>';
$admin .= '</section>';
}

echo $admin;

?>