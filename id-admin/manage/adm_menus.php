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
	
$admin .='<p class="judul">Access Denied !!!!!!</p>';
}else{
	
$admin ='<section class="content-header">
<h1>Menus<small>to manage menus</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Menus</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=adm_menus">Menu</a>
<a class="btn btn-default btn-flat" href="?opsi=adm_menus&amp;aksi=add_menu"><i class="fa fa-fw fa-plus"></i> Menu</a>
</section>';

#############################################
# List Menu
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

if (isset($_POST['submit'])) {
if (is_array($_POST['order'])) {
foreach($_POST['order'] as $key=>$val) {
$update = $koneksi_db->sql_query("UPDATE menus SET menu_ordering='$val' WHERE menu_id='$key'");
}
$admin .= '<div class="alert alert-success">Menu order updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_menus">';
}
}

$hasil = $koneksi_db->sql_query("SELECT * FROM menus WHERE menu_parent=0 ORDER BY menu_ordering");

$querymax = $koneksi_db->sql_query("SELECT MAX(menu_ordering) FROM menus");
$alhasil = mysql_fetch_row($querymax);	
$numbers_parent = $alhasil[0];

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Menu Structure</h3></div>';
$admin .= '<form class="form-inline" method="post" action=""><div class="box-body">';
$admin .='<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>Menu Name</th>
<th>URL</th>
<th class="text-center">Ordering</th>
<th class="text-center">Publish</th>
<th>Actions</th>
</tr></thead><tbody>';
$no = 1;
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$parent	= $data['menu_id'];
$publikasi = ($data['menu_publish'] == 1) ? '<a class="text-success" href="?opsi=adm_menus&amp;aksi=pub&amp;pub=tidak&amp;id='.$parent.'"><span class="glyphicon glyphicon-ok"></span></a>' : '<a class="text-danger" href="?opsi=adm_menus&amp;aksi=pub&amp;pub=ya&amp;id='.$parent.'"><span class="glyphicon glyphicon-remove"></span></a>';
	
$orderd = '<a class="text-danger" href="'.$adminfile.'.php?opsi=adm_menus&amp;aksi=mdown&amp;id='.$data['menu_ordering'].'"><span class="glyphicon glyphicon-circle-arrow-down"></span></a>';    
$orderu = '<a class="text-info" href="'.$adminfile.'.php?opsi=adm_menus&amp;aksi=mup&amp;id='.$data['menu_ordering'].'"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>'; 

$ordering_down = $orderd;    
$ordering_up = $orderu;        

if ($data['menu_ordering'] == 1) $ordering_up = '&nbsp;&nbsp;&nbsp;&nbsp;';
if ($data['menu_ordering'] == $numbers_parent) $ordering_down = '&nbsp;';		

$admin .='<tr>
<td>'.$no.'</td>
<td><strong>'.$data['menu_name'].'</strong></td>
<td>'.$data['menu_link'].'</td>
<td class="text-center">'.$ordering_up.' '.$ordering_down.'</td>
<td class="text-center">'.$publikasi.'</td>
<td><a class="text-info" href="?opsi=adm_menus&amp;aksi=edit_menu&amp;id='.$data['menu_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=adm_menus&amp;aksi=del_menu&amp;id='.$data['menu_id'].'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus menu ini ?\')">Delete</a></td>
</tr>';

$subhasil = $koneksi_db->sql_query("SELECT * FROM menus WHERE menu_parent='$parent' ORDER BY menu_ordering");		
$jmlsub = $koneksi_db->sql_numrows($subhasil);
	
$querymax = $koneksi_db->sql_query("SELECT MAX(menu_ordering) FROM menus WHERE menu_parent=$parent");
$alhasil = $koneksi_db->sql_numrows($querymax);	
$numbers = $alhasil['menu_id'];

$i = 1;
while ($subdata = $koneksi_db->sql_fetchrow($subhasil)) {            
$spublikasi = ($subdata['menu_publish'] == 1) ? '<a class="text-success" href="?opsi=admi_menus&amp;aksi=pub&amp;pub=tidak&amp;id='.$subdata['id'].'"><span class="glyphicon glyphicon-ok"></span></a>' : '<a class="text-danger" href="?opsi=adm_menus&amp;aksi=pub&amp;pub=ya&amp;id='.$subdata['id'].'"><span class="glyphicon glyphicon-remove"></span></a>';
$admin .='<tr>
<td></td>
<td>'.$subdata['menu_name'].'</td>
<td>'.$subdata['menu_link'].'</td>
<td class="text-center"><input type="text" name="order['.$subdata['menu_id'].']" value="'.$subdata['menu_ordering'].'" size="1" class="text-center"></td>
<td class="text-center">'.$spublikasi.'</td>
<td><a class="text-info" href="?opsi=adm_menus&amp;aksi=edit_menu&amp;id='.$subdata['menu_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=adm_menus&amp;aksi=del_menu&amp;id='.$subdata['menu_id'].'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus menu ini ?\')">Delete</a></td>
</tr>';
$i++;		
}
$no++;
}
$admin .= '</tbody></table></div>';
$admin .= '</div>';
$admin .= '<div class="box-footer"><input type="submit" name="submit" value="Save Changes" class="btn btn-primary"></div></form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Tambah Menu
#############################################
if($_GET['aksi']=="add_menu"){

$admin .= '<section class="content">';

if (isset($_POST['submit'])) {
$menu_parent	= $_POST['menu_parent'];
$menu_name		= $_POST['menu_name'];
$menu_link		= $_POST['menu_link'];

$error = '';
if (!$menu_name)	$error .= "<strong>Gagal!</strong> Nama menu belum diisi!<br />";
if (!$menu_link) 	$error .= "<strong>Gagal!</strong> URL menu belum diisi!<br />";

if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}else {
$menu_link = str_replace('&amp;','&',$menu_link);
$menu_link = str_replace('&','&amp;',$menu_link);

if($menu_parent==0){
$query = $koneksi_db->sql_query("SELECT max(menu_ordering) as maxOR FROM menus");
$data  = $koneksi_db->sql_fetchrow($query);
$maxOR = $data['maxOR']+1;
}else{
$query = $koneksi_db->sql_query("SELECT max(menu_ordering) as maxOR FROM menus WHERE menu_parent=$menu_parent");
$data  = $koneksi_db->sql_fetchrow($query);
$maxOR = $data['maxOR']+1;
}

$hasil = $koneksi_db->sql_query("INSERT INTO menu (menu_parent,menu_name,menu_link,menu_ordering) VALUES ('$menu_parent','$menu_name','$menu_link','$maxOR')");
if($hasil){
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Menu baru berhasil disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_menus">';
}		
}
}

//$url = isset($_POST['submit']) ? $_POST['url'] : @$_GET['url'];
//$menu = isset($_POST['submit']) ? $_POST['menu'] : @$_GET['menu'];

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Menu</h3></div>
<div class="box-body">';
$admin .='<form class="form-horizontal" method="post" action="">    
<div class="form-group">          
	<label class="col-sm-2 control-label">Menu Name</label>
	<div class="col-sm-10"><input type="text" name="menu_name" value="'.$menu_name.'" class="form-control" placeholder="Enter title here"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Parent</label>
	<div class="col-sm-10"><select name="menu_parent" class="form-control">';
$s = $koneksi_db->sql_query("SELECT * FROM menus WHERE menu_parent=0 ORDER BY menu_id ASC");
$admin .= '<option value="0">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$admin .= '<option value="'.$data['menu_id'].'">'.$data['menu_name'].'</option>';
}
$admin .= '</select></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Link</label>        
	<div class="col-sm-10"><input type="text" name="menu_link" value="'.$menu_link.'" class="form-control" placeholder="Enter Link menu">
	<span class="help-block">Example : <i>http://www.teamworks.co.id</i></span></div>
</div>
</div>
<div class="box-footer">
	<div class="col-sm-10"><input type="submit" name="submit" value="Add New Menu" class="btn btn-primary"></div>
</div></form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Edit Menu
#############################################
if($_GET['aksi']=="edit_menu"){

$admin .= '<section class="content">';

$id = int_filter($_GET['id']);
	
if (isset($_POST['submit'])) {
$menu_name		= $_POST['menu_name'];
$menu_parent	= $_POST['menu_parent'];
$menu_link		= $_POST['menu_link'];
	
if (!$menu_name)	$error .= "Error: Silahkan Masukkan Nama Menunya!<br />";
if (!$menu_link) 	$error .= "Error: Silahkan Masukkan Url Menunya!<br />";
	
if ($error){
$admin.='<div class="error>'.$error.'</div>';
}else{

$menu_link = str_replace('&amp;','&',$menu_link);
$menu_link = str_replace('&','&amp;',$menu_link);

if($kid==0){
$query = $koneksi_db->sql_query("SELECT max(ordering) as maxOR FROM menus");
$data  = $koneksi_db->sql_fetchrow($query);
$maxOR = $data['maxOR']+1;
}else{
$query = $koneksi_db->sql_query("SELECT max(ordering) as maxOR FROM menus WHERE menu_parent=$menu_parent");
$data  = $koneksi_db->sql_fetchrow($query);
$maxOR = $data['maxOR']+1;
}

$hasil = $koneksi_db->sql_query("UPDATE menus SET menu_name='$menu_name',menu_parent='$menu_parent',menu_link='$menu_link' WHERE menu_id='$id'");
if($hasil){
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Menu telah disimpan</div>';
$style_include[] ='<meta http-equiv="refresh" content="3; url=?opsi=adm_menus">';
}
}
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM menus WHERE menu_id=$id");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {    
$menu_parent	= $data['menu_parent'];    
$menu_name		= $data['menu_name'];    
$menu_link		= $data['menu_link'];    
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Menu</h3></div>
<div class="box-body">';
$admin .='<form class="form-horizontal" method="post" action="">    
<div class="form-group">
	<label class="col-sm-2 control-label">Menu Name</label>            
	<div class="col-sm-10"><input type="text" name="menu_name" value="'.$menu_name.'" class="form-control"></div>        
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Parent</label>
	<div class="col-sm-10"><select name="menu_parent" class="form-control">';
$hasil = $koneksi_db->sql_query("SELECT * FROM menus WHERE menu_parent=0 ORDER BY menu_id ASC");
$admin .= '<option value="0">None</option>';
while ($datas =  $koneksi_db->sql_fetchrow ($hasil)){
$pilihan = ($datas['menu_id']==$menu_parent)? "selected":'';
$admin .='<option value="'.$datas['menu_id'].'" '.$pilihan.'>'.$datas['menu_name'].'</option>';
}
$admin .='</select></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Link</label>            
	<div class="col-sm-10"><input type="text" name="menu_link" value="'.$menu_link.'" class="form-control"></div>        
</div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Update" class="btn btn-primary">
</div>
</form>';
}
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Menu Up
#############################################
if($_GET['aksi']=="mup"){

$ID = int_filter ($_GET['id']);
$select = $koneksi_db->sql_query ("SELECT MAX(menu_ordering) as sc FROM menus");
$data = $koneksi_db->sql_fetchrow ($select);

if ($data['sc'] <= 0){
$qquery = mysql_query ("SELECT menu_id FROM menus");
$integer = 1;
while ($getsql = mysql_fetch_assoc($qquery)){
mysql_query ("UPDATE menus SET menu_ordering = $integer WHERE menu_id='".$getsql['menu_id']."'");
$integer++;	
}	
	
header ("location:".$adminfile.".php?opsi=adm_menus");
exit;	
}

$total = $data['sc'] + 1;
$update = $koneksi_db->sql_query ("UPDATE menus SET menu_ordering='$total' WHERE menu_ordering='".($ID-1)."'"); 
$update = $koneksi_db->sql_query ("UPDATE menus SET menu_ordering=menu_ordering-1 WHERE menu_ordering='$ID'");
$update = $koneksi_db->sql_query ("UPDATE menus SET menu_ordering='$ID' WHERE menu_ordering='$total'");   
header ("location:".$adminfile.".php?opsi=adm_menus");
}

#############################################
# Menu Down
#############################################
if($_GET['aksi']=="mdown"){
$ID = int_filter ($_GET['id']);
$select = $koneksi_db->sql_query ("SELECT MAX(menu_ordering) as sc FROM menus");
$data = $koneksi_db->sql_fetchrow ($select);

if ($data['sc'] <= 0){
$qquery = mysql_query ("SELECT menu_id FROM menus");
$integer = 1;
while ($getsql = mysql_fetch_assoc($qquery)){
mysql_query ("UPDATE menus SET menu_ordering = $integer WHERE menu_id = '".$getsql['menu_id']."'");
$integer++;	
}	
	
header ("location:".$adminfile.".php?opsi=adm_menus");
exit;	
}

$total = $data['sc'] + 1;
$update = $koneksi_db->sql_query ("UPDATE menus SET menu_ordering = '$total' WHERE menu_ordering='".($ID+1)."'"); 
$update = $koneksi_db->sql_query ("UPDATE menus SET menu_ordering = menu_ordering+1 WHERE menu_ordering='$ID'");
$update = $koneksi_db->sql_query ("UPDATE menus SET menu_ordering = '$ID' WHERE menu_ordering='$total'");

header ("location:".$adminfile.".php?opsi=adm_menus");
}

#############################################
# Publikasi
#############################################
if ($_GET['aksi'] == 'pub'){
if ($_GET['pub'] == 'tidak'){
	$id = int_filter($_GET['id']);
	$koneksi_db->sql_query ("UPDATE menus SET menu_publish=0 WHERE menu_id='$id'");
}

if ($_GET['pub'] == 'ya'){
	$id = int_filter($_GET['id']);
	$koneksi_db->sql_query ("UPDATE menus SET menu_publish=1 WHERE menu_id='$id'");
}
	header ("location:?opsi=adm_menus");
}

#############################################
# Hapus Menu
#############################################
if($_GET['aksi']=="del_menu"){    

$id = int_filter($_GET['id']);
$admin .= '<section class="content">';
$hasil = $koneksi_db->sql_query("DELETE FROM menu WHERE id='$id'");    
if($hasil){    
$admin.='<div class="alert alert-success">Menu deleted.</div>';    
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_menus">';    
}
}
$admin .= '</section>';
}

echo $admin;

?>