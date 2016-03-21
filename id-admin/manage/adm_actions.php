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

function form_select($name,$value = array()) {
	$t = '<select name="'.$name.'" class="form-control">';
	if (is_array($value)) {
		foreach($value as $key=>$val) {
				if (@$_POST[$name] == $key) {
				$t .= '<option value="'.$key.'" selected="selected">'.$val.'</option>';	
				}else {
				$t .= '<option value="'.$key.'">'.$val.'</option>';
				}
			}
	}
	$t .= '</select>';
	return $t;
}

$admin ='<section class="content-header">
<h1>Modul Actions<small>to manage modul actions</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Modul Actions</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=adm_actions">Modul Actions</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_actions&amp;aksi=add_actions"><i class="fa fa-fw fa-plus"></i> Modul Action</a>
</section>';

#############################################
# Data Actions
#############################################
if($_GET['aksi']==""){
$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Modul Actions</h3></div>
<div class="box-body">';
$admin .= '<table class="table table-striped table-hover">
<thead><tr>
<th>Modul</th>
<th>Actions</th>
</tr></thead>';
$query = mysql_query("SELECT * FROM actions GROUP BY act_modul");
while($data = mysql_fetch_assoc($query)) {
$admin .= '<tr>
<td>'.$data['act_modul'].'</td>
<td><a class="text-info" href="?opsi=adm_actions&amp;aksi=detail&amp;mod='.$data['act_modul'].'">Detail</a> - 
<a class="text-danger" href="?opsi=adm_actions&amp;aksi=del_action&amp;mod='.$data['act_modul'].'" onclick="return confirm(\'Are you sure ?\')">Delete</a></td>
</tr>';
}
$admin .= '</tbody></table>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Tambah Actions
#############################################
if($_GET['aksi']=="add_actions"){

$admin .= '<section class="content">';

if (isset($_POST['submit'])) {

$act_modid 	= intval($_POST['act_modid']);
$act_modul 	= mysql_real_escape_string(strip_tags($_POST['act_modul']));
$act_pos 	= intval($_POST['act_pos']);

if (empty($_POST['act_modul'])) {
	$error .= '- Nama modul tidak boleh kosong<br/>';
}
if (!file_exists('id-content/modul/'.$_POST['act_modul'])) {
	$error .= '- path id-content/modul/'.$_POST['act_modul'].' tidak ada<br/>';
}

$cek1 = mysql_num_rows(mysql_query("SELECT act_id FROM actions WHERE act_modid = '$act_modid' AND act_modul = '$act_modul'"));
if ($cek1) {
	$error .= '- id id-content/modul/blok sudah ada<br/>';
}

if ($error != '') {
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$cek2 = mysql_query("SELECT (MAX(act_order) + 1) AS act_order FROM actions WHERE act_pos = '$act_pos' AND act_modul = '$act_modul'");
$data = mysql_fetch_assoc($cek2);
$act_order = $data['act_order'];
$inserts = mysql_query("INSERT INTO actions (act_modul,act_pos,act_order,act_modid) VALUES ('$act_modul','$act_pos','$act_order','$act_modid')");
if ($inserts) {
$admin .= '<div class="alert alert-success">Action modul added.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_actions">';
}else {
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$handler = array();
$query = mysql_query("SELECT * FROM modul ORDER BY ordering");
while($data = mysql_fetch_assoc($query)) {
$publish = $data['published'] ? 'Publish' : 'UnPublish';
$handler[$data['id']] = $data['modul'] . ' - ' . $publish;	
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Modul Action</h3></div>
<div class="box-body">';
$admin .= '<form class="form-horizontal" method="post" action="">
<div class="form-group">
	<label class="col-sm-2">Modul Type</label>
	<div class="col-sm-10"><input type="text" name="act_modul" value="'.htmlentities(stripslashes($_POST['act_modul'])).'" class="form-control" placeholder="Enter title here">
	<p class="help-block">Example : post</p></div>
</div>
<div class="form-group">
	<label class="col-sm-2">Select Blok / Modul</label>
	<div class="col-sm-10">'.form_select('act_modid',$handler).'</div>
</div>
<div class="form-group">
	<label class="col-sm-2">Position</label>
	<div class="col-sm-10">'.form_select('act_pos',array('0'=>'Leftbar','1'=>'Rightbar')).'</div>
</div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Add New Modul Action" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Hapus Actions
#############################################
if($_GET['aksi']=="del_action"){
$admin .= '<section class="content">';
$mod = mysql_real_escape_string(strip_tags($_GET['mod']));
$query = $koneksi_db->sql_query("DELETE FROM actions WHERE act_modul = '$mod'");
if ($query) {
$admin .= '<div class="alert alert-success">Action modul group deleted.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_actions">';
}else {
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
$admin .= '</section>';
}
	
#############################################
# Lihat Actions
#############################################
if($_GET['aksi']=="detail"){

$mod = mysql_real_escape_string(strip_tags($_GET['mod']));

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">'.$mod.'</h3></div>
<div class="box-body">';

if (isset($_GET['delete'])) {
$id = intval($_GET['id']);
$del = $koneksi_db->sql_query("DELETE FROM actions WHERE act_id = '$id'");
if($del){
$admin .= '<div class="alert alert-success">Action modul deleted.</div>';
}
}

if (isset($_POST['submit'])) {
if (is_array($_POST['order'])) {
foreach($_POST['order'] as $key=>$val) {
$posisi = $_POST['posisi'][$key];
$order = $_POST['order'][$key];
$update = $koneksi_db->sql_query("UPDATE actions SET act_pos = '$posisi',act_order = '$order' WHERE act_id = '$key'");
}
$admin .= '<div class="alert alert-success">Changes saved.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_actions&amp;aksi=detail&amp;mod='.$mod.'">';
}
}

$admin .= '<h4>Leftside</h4>';
$admin .= '<form method="post" action="">
<table class="table table-striped table-hover">
<thead><tr>
<th>Widget</th>
<th>Position</th>
<th>Ordering</th>
<th>Actions</th>
</tr></thead><tbody>';
$query = $koneksi_db->sql_query("SELECT actions.*,modul.modul FROM actions LEFT JOIN modul ON (modul.id = actions.act_modid) WHERE actions.act_modul = '$mod' AND actions.act_pos = 0 ORDER BY actions.act_order");
while($data = $koneksi_db->sql_fetchrow($query)) {
$select1 = '<select name="posisi['.$data['act_id'].']">';
if ($data['act_pos'] == 0) {
$select1 .= '<option value="0" selected="selected">Left</option>';
$select1 .= '<option value="1">Right</option>';
}else {
$select1 .= '<option value="0">Left</option>';
$select1 .= '<option value="1" selected="selected">Right</option>';
}
$select1 .= '</select>';

$admin .= '<tr>
<td>'.$data['modul'].'</td>
<td>'.$select1.'</td>
<td><input type="text" name="order['.$data['act_id'].']" value="'.$data['act_order'].'" size="1" class="text-center"></td>
<td><a class="text-danger" href="?opsi=adm_actions&amp;aksi=detail&amp;mod='.$mod.'&amp;id='.$data['act_id'].'&amp;delete=1" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
</tr>';
}
$admin .= '</tbody></table>';

$admin .= '<h4>Rightside</h4>';
$admin .= '<table class="table table-striped table-hover">
<thead><tr>
<th>Widget</th>
<th>Position</th>
<th>Ordering</th>
<th>Actions</th>
</tr></thead><tbody>';
$query = $koneksi_db->sql_query("SELECT actions.*,modul.modul FROM actions LEFT JOIN modul ON (modul.id = actions.act_modid) WHERE actions.act_modul = '$mod' AND actions.act_pos = 1 ORDER BY actions.act_order");
while($data = $koneksi_db->sql_fetchrow($query)) {
$select1 = '<select name="posisi['.$data['act_id'].']">';
if ($data['act_pos'] == 0) {
$select1 .= '<option value="0" selected="selected">Left</option>';
$select1 .= '<option value="1">Right</option>';
}else {
$select1 .= '<option value="0">Left</option>';
$select1 .= '<option value="1" selected="selected">Right</option>';
}
$select1 .= '</select>';
	
$admin .= '<tr>
<td>'.$data['modul'].'</td>
<td>'.$select1.'</td>
<td><input type="text" name="order['.$data['act_id'].']" value="'.$data['act_order'].'" size="1" class="text-center"></td>
<td><a class="text-danger" href="?opsi=adm_actions&amp;aksi=detail&amp;mod='.$mod.'&amp;id='.$data['act_id'].'&amp;delete=1" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
</tr>';
}
$admin .= '</tbody></table><br/><input type="submit" name="submit" value="Save Changes" class="btn btn-primary"></form>';
$admin .= '</div></div>';
$admin .= '</section>';
}
	
echo $admin;

?>