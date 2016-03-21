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
   exit;
}
if ($_SESSION['LevelAkses']!="Administrator") {
	exit;
}

$admin ='<section class="content-header">
<h1>Widgets<small>to manage widgets</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Widgets</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=adm_widgets">All Widgets</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_widgets&amp;aksi=add_modul"><i class="fa fa-fw fa-plus"></i> Modul</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_widgets&amp;aksi=add_blok"><i class="fa fa-fw fa-plus"></i> Text or HTML Code</a>
</section>';

#############################################
# Data Modul
#############################################
if ($_GET['aksi'] == ""){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Widgets</h3></div>
<div class="box-body">';

if (isset($_POST['submit'])) {

if (is_array($_POST['order'])) {
foreach($_POST['order'] as $key=>$val) {
$update = mysql_query("UPDATE modul SET ordering='$val' WHERE id='$key'");
}
$admin .= '<div class="alert alert-success">Ordering modul berhasil disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_widgets">';
}
}

$admin .= '<h4 class="page-header">Left Sidebar</h4>';
$admin .= '<form class="form-inline" method="post" action="">
<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>Title</th>
<th>Publish</th>
<th>Position</th>
<th>Ordering</th>
<th>Type</th>
<th>Actions</th>
</tr></thead><tbody>';
$query = mysql_query("SELECT * FROM modul WHERE posisi=0 ORDER BY ordering");
while($data = mysql_fetch_assoc($query)) {
$publikasi = ($data['published'] == 1) ? '<a class="text-success" href="?opsi=adm_widgets&amp;aksi=pub&amp;pub=tidak&amp;id='.$data['id'].'">Active</a>' : '<a class="text-danger" href="?opsi=adm_widgets&amp;aksi=pub&amp;pub=ya&amp;id='.$data['id'].'">Inactive</a>';
$posisi = ($data['posisi'] == 1) ? '<a class="text-info" href="?opsi=adm_widgets&amp;aksi=posisi&amp;posisi=kiri&amp;id='.$data['id'].'">Right</a>' : '<a class="text-info" href="?opsi=adm_widgets&amp;aksi=posisi&amp;posisi=kanan&amp;id='.$data['id'].'">Left</a>';

$admin .= '<tr>
<td>'.$data['modul'].'</td>
<td>'.$publikasi.'</td>
<td>'.$posisi.'</td>
<td><input type="text" name="order['.$data['id'].']" value="'.$data['ordering'].'" size="1" class="text-center"></td>
<td>'.$data['type'].'</td>
<td><a class="text-info" href="?opsi=adm_widgets&amp;aksi=edit_modul&amp;id='.$data['id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=adm_widgets&amp;aksi=hapus_modul&amp;id='.$data['id'].'" onclick="return confirm(\'Apakah anda yakin ?\')">Delete</a></td></tr>';
}
$admin .= '<tr><td colspan="6"><input type="submit" name="submit" value="Save Changes" class="btn btn-primary"></td></tr></tbody></table></div>';

$admin .= '<h4 class="page-header">Right Sidebar</h4>';

$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>Title</th>
<th>Publish</th>
<th>Position</th>
<th>Ordering</th>
<th>Type</th>
<th>Actions</th>
</tr><thead><tbody>';
$query = mysql_query("SELECT * FROM modul WHERE posisi=1 ORDER BY ordering");
while($data = mysql_fetch_assoc($query)) {
$publikasi = ($data['published'] == 1) ? '<a class="text-success" href="?opsi=adm_widgets&amp;aksi=pub&amp;pub=tidak&amp;id='.$data['id'].'">Active</a>' : '<a class="text-danger" href="?opsi=adm_widgets&amp;aksi=pub&amp;pub=ya&amp;id='.$data['id'].'">Inactive</a>';
$posisi = ($data['posisi'] == 1) ? '<a class="text-info" href="?opsi=adm_widgets&amp;aksi=posisi&amp;posisi=kiri&amp;id='.$data['id'].'">Right</a>' : '<a class="text-info" href="?opsi=adm_widgets&amp;aksi=posisi&amp;posisi=kanan&amp;id='.$data['id'].'">Left</a>';
	
$admin .= '<tr>
<td>'.$data['modul'].'</td>
<td>'.$publikasi.'</td>
<td>'.$posisi.'</td>
<td><input type="text" name="order['.$data['id'].']" value="'.$data['ordering'].'" size="1" class="text-center"></td>
<td>'.$data['type'].'</td>
<td><a class="text-info" href="?opsi=adm_widgets&amp;aksi=edit_modul&amp;id='.$data['id'].'">Edit</a> -
<a class="text-danger" href="?opsi=adm_widgets&amp;aksi=hapus_modul&amp;id='.$data['id'].'" onclick="return confirm(\'Apakah anda yakin ?\')">Delete</a></td></tr>';
}
$admin .= '<tr><td colspan="6"><input type="submit" name="submit" value="Save Changes" class="btn btn-primary"></td></tr></tbody></table></div></form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Tambah Modul
#############################################
if ($_GET['aksi'] == 'add_modul'){

$admin .= '<section class="content">';

if (isset($_POST['submit'])) {
$error = null;
if (empty($_POST['title'])) $error .= '- Error Judul modul tidak boleh kosong<br/>';
if (empty($_POST['modul'])) $error .= '- Error File Modul tidak boleh kosong<br/>';
	
if ($error != '') {
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$title = trim(strip_tags($_POST['title']));
$modul = trim(strip_tags($_POST['modul']));
$posisi = trim(strip_tags($_POST['posisi']));
$cek = mysql_query("SELECT MAX(`ordering`) + 1 AS ordering FROM modul WHERE posisi='$posisi'");
$data = mysql_fetch_assoc($cek);
$ordering = $data['ordering'];
$insert = mysql_query("INSERT INTO modul (modul,isi,posisi,ordering,type) VALUES ('$title','$modul','$posisi','$ordering','module')");
if ($insert) {
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_widgets">';	
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';	
}
}
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Modul</h3></div>
<div class="box-body">';
$admin .= '<form class="form-horizontal" method="post" action="">
<div class="form-group">
	<label class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10"><input type="text" name="title" value="'.htmlentities(stripslashes(@$_POST['title'])).'" class="form-control" placeholder="Enter title here"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">File Modul (*.php)</label>
	<div class="col-sm-10"><input type="text" name="modul" value="'.htmlentities(stripslashes(@$_POST['modul'])).'" class="form-control" placeholder="Example : id-content/modul/post/categories.php"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Position</label>
	<div class="col-sm-10 form-inline"><select name="posisi" class="form-control">
  <option value="1">Rightbar</option>
  <option value="0">Leftbar</option>
</select></div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Add Widget" class="btn btn-primary">
</div>
</form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Tambah Blok
#############################################
if ($_GET['aksi'] == 'add_blok'){

$admin .= '<section class="content">';

if (isset($_POST['submit'])) {
$error = null;
if (empty($_POST['title'])) {
	$error .= '- Error Judul blok tidak boleh kosong<br/>';
}
if (empty($_POST['isi'])) {
	$error .= '- Error isi blok tidak boleh kosong<br/>';
}

if ($error != '') {
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$title = trim(strip_tags($_POST['title']));
$isi = $_POST['isi'];
$posisi = trim(strip_tags($_POST['posisi']));
$cek = mysql_query("SELECT MAX(`ordering`) + 1 AS `ordering` FROM `modul` WHERE `posisi` = '$posisi'");
$data = mysql_fetch_assoc($cek);
$ordering = $data['ordering'];
$insert = mysql_query("INSERT INTO `modul` (`modul`,`isi`,`posisi`,`ordering`,`type`) VALUES ('$title','$isi','$posisi','$ordering','block')");
if ($insert) {
header("location: ?opsi=adm_widgets");
exit;	
}else {
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';	
}
}
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Text or HTML Code</h3></div>
<div class="box-body">';
$admin .= '<form class="form-horizontal" method="post" action="">
<div class="form-group">
	<label class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10"><input type="text" name="title" value="'.htmlentities(stripslashes($_POST['title'])).'" class="form-control" placeholder="Enter title here"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Text or HTML Code</label>
	<div class="col-sm-10"><textarea name="isi" rows="5" class="form-control" placeholder="Enter text or HTML code here">'.htmlentities(stripslashes(@$data['modul'])).'</textarea></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Position</label>
	<div class="col-sm-10 form-inline"><select name="posisi" class="form-control">
		<option value="1">Rightbar</option>
		<option value="0">Leftbar</option>
</select></div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Add Widget" class="btn btn-primary">
</div>
</form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Edit Blok
#############################################
if ($_GET['aksi'] == "edit_modul"){

$admin .= '<section class="content">';

$id = int_filter($_GET['id']);

if (isset($_POST['submit'])) {
$modul = text_filter($_POST['modul']);
//$cek = $koneksi_db->sql_query("SELECT type FROM modul WHERE id = '$id' AND type = 'module'");
if ($_POST['modul']=='module') {
$isi = trim(strip_tags($_POST['isi']));
}else {
$isi = $_POST['isi'];	
}
$update = $koneksi_db->sql_query("UPDATE modul SET modul='$modul',isi='$isi' WHERE id='$id'");
if ($update) {
$admin .= '<div class="alert alert-success">Widget updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_widgets">';
}else {
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}

$query = $koneksi_db->sql_query("SELECT * FROM modul WHERE id = '$id'");
$data = $koneksi_db->sql_fetchrow($query);
if ($data['type'] == 'module') {
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Modul Widget</h3></div>';
$admin .= '<form class="form-horizontal" method="post" action="">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10"><input type="text" name="modul" value="'.htmlentities(stripslashes($data['modul'])).'" class="form-control"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">File Modul (*.php)</label>
	<div class="col-sm-10"><input type="text" name="isi" value="'.htmlentities(stripslashes($data['isi'])).'" class="form-control"></div>
</div>
</div>
<div class="box-footer">
	<input type="hidden" name="type" value="'.$data['type'].'">
	<input type="submit" name="submit" value="Update" class="btn btn-primary">
</div>
</form>
</div>';
}else {
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Text or HTML Code</h3></div>';
$admin .= '<form class="form-horizontal" method="post" action="">
<div class="box-body">
<div class="form-group">
	<label class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10"><input type="text" name="modul" value="'.htmlentities(stripslashes($data['modul'])).'" class="form-control" placeholder="Enter title here"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Text or HTML Code</label>
	<div class="col-sm-10"><textarea name="isi" rows="3" class="form-control">'.htmlentities(stripslashes($data['isi'])).'</textarea></div>
</div>
</div>
<div class="box-footer">
	<input type="hidden" name="type" value="'.$data['type'].'">
	<input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
</div>
</form></div>';
}
$admin .= '</section>';
}

#############################################
# Hapus Modul
#############################################
if ($_GET['aksi'] == 'hapus_modul'){
$admin .= '<section class="content">';
$id = int_filter($_GET['id']);
$hasil = $koneksi_db->sql_query("DELETE FROM modul WHERE id=$id");
if ($hasil) {
$admin .= '<div class="alert alert-success">Widget deleted.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_widgets">';
}else {
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';	
}
$admin .= '</section>';
}

#############################################
# Publikasi Modul
#############################################
if ($_GET['aksi'] == 'pub'){	
if ($_GET['pub'] == 'tidak'){	
$id = int_filter ($_GET['id']);	
$koneksi_db->sql_query ("UPDATE modul SET published=0 WHERE id='$id'");		
}	
	
if ($_GET['pub'] == 'ya'){	
$id = int_filter ($_GET['id']);	
$koneksi_db->sql_query ("UPDATE modul SET published=1 WHERE id='$id'");		
}	
header ("location:?opsi=adm_widgets");
exit;
}

#############################################
# Posisi Modul
#############################################
if ($_GET['aksi'] == 'posisi'){	
if ($_GET['posisi'] == 'kiri'){	
$id = int_filter ($_GET['id']);	
$koneksi_db->sql_query ("UPDATE modul SET posisi=0 WHERE id='$id'");		
}	
	
if ($_GET['posisi'] == 'kanan'){	
$id = int_filter ($_GET['id']);	
$koneksi_db->sql_query ("UPDATE modul SET posisi=1 WHERE id='$id'");		
}	
header ("location:?opsi=adm_widgets");
exit;
}

echo $admin;

?>