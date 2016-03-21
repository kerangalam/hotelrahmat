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
   exit;
}

global $koneksi_db,$style_include,$script_include,$url_situs;

$admin ='<section class="content-header">
<h1>Pages<small>to manage pages</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Pages</li>
</ol></section>';

$tot_pages = $koneksi_db->sql_query("SELECT * FROM page");
$jum_pages = $koneksi_db->sql_numrows($tot_pages);

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=page&amp;modul=yes"><i class="fa fa-fw fa-list"></i> Pages <span class="badge bg-green">'.$jum_pages.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=page&amp;modul=yes&amp;aksi=add_page"><i class="fa fa-fw fa-plus"></i> Page</a>
</section>';

#############################################
# List Halaman
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

$hasil = $koneksi_db->sql_query("SELECT * FROM page ORDER BY page_id");

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Pages</h3></div>
<div class="box-body">';
$admin .= '<table class="table table-striped table-hover">
<thead><tr>
<th class="text-center">No</th>
<th>Title</th>
<th>Actions</th>
</tr></thead><tbody>';
$no =1;
while ($data = $koneksi_db->sql_fetchrow($query)) {
$deleted = '<a class="text-danger" href="?opsi=page&amp;modul=yes&amp;aksi=del_page&amp;id='.$data['page_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>';		

$admin .= '<tr>
<td class="text-center">'.$no.'</td>
<td><a href="'.$url_situs.'/'.get_link($data['page_id'],$data['page_slug'],"page").'" title="'.$data['page_title'].'" target="_blank">'.$data['page_title'].'</a></td>
<td>
<a class="text-info" href="?opsi=page&amp;modul=yes&amp;aksi=edit_page&amp;id='.$data['page_id'].'">Edit</a> - 
<a class="text-info" href="?opsi=adm_menus&amp;aksi=add_menu&amp;menu='.$data['page_title'].'&amp;url='.$url_situs.'/page/'.$data['page_id'].'/'.$data['page_slug'].'.html">Add to Menu</a> - '.$deleted.'</td>
</tr>';
$no++;		
}
$admin .= '</tbody></table>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Tambah Halaman
#############################################
if($_GET['aksi']=="add_page"){

$admin .= '<section class="content">';

if (isset($_POST['submit'])) {

$page_title			= addslashes($_POST['page_title']);
$page_content		= addslashes($_POST['page_content']);
$page_slug			= SEO($_POST['page_title']);
$meta_description	= text_filter($_POST['meta_description']);
$meta_keywords		= text_filter($_POST['meta_keywords']);
$meta_author		= text_filter($_POST['meta_author']);

$error = '';
if (!$page_title)	$error .= "Please enter title!<br/>";
if (!$page_content)	$error .= "Please enter content!<br/>";

if ($error != '') {
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else{

$query = $koneksi_db->sql_query("INSERT INTO page (page_title,page_content,page_slug,meta_description,meta_keywords,meta_author) VALUES ('$page_title','$page_content','$page_slug','$meta_description','$meta_keywords','$meta_author')");	
if ($query) {
$admin .= '<div class="alert alert-success">Page published.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=page&amp;modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Page</h3></div>
<div class="box-body">';
$admin .= '<form method="post" action="#">
<div class="row">
<div class="col-md-8">
<div class="form-group">
	<label>Title</label>
	<input type="text" name="page_title" value="'.$page_title.'" class="form-control" placeholder="Enter title here">
</div>
<div class="form-group">
	<label>Content</label>
	<textarea name="page_content" id="CKEditor" rows="5" class="form-control">'.$page_content.'</textarea>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
	<label>Meta Description</label>
	<textarea name="meta_description" rows="3" class="form-control" placeholder="Enter meta description here">'.$data['meta_description'].'</textarea>
</div>
<div class="form-group">
	<label>Meta Keywords</label>
	<textarea name="meta_keywords" rows="3" class="form-control" placeholder="Enter meta keywords here">'.$data['meta_keywords'].'</textarea>
</div>
<div class="form-group">
	<label>Meta Author</label>
	<input type="text" name="meta_author" value="'.$data['meta_author'].'" class="form-control" placeholder="Enter author here">
</div>
</div>
</div>
</div>
<div class="box-footer">
	<button type="submit" name="submit" class="btn btn-primary">Publish</button>
</div>
</form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Edit Halaman
#############################################
if($_GET['aksi']=="edit_page"){

$admin .= '<section class="content">';

$id = int_filter($_GET['id']);	

if (isset($_POST['submit'])) {

$page_title			= addslashes($_POST['page_title']);
$page_content		= addslashes($_POST['page_content']);
$page_slug			= SEO($_POST['page_title']);
$meta_description	= text_filter($_POST['meta_description']);
$meta_keywords		= text_filter($_POST['meta_keywords']);
$meta_author		= text_filter($_POST['meta_author']);

$hasil = $koneksi_db->sql_query("UPDATE page SET page_title='$page_title',page_content='$page_content',page_slug='$page_slug',	meta_description='$meta_description',meta_keywords='$meta_keywords',meta_author='$meta_author' WHERE page_id='$id'");	
if ($hasil) {
$admin .= '<div class="alert alert-success">Page updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=page&amp;modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}

$hasil = $koneksi_db->sql_query("SELECT * FROM page WHERE page_id=$id");
$data = $koneksi_db->sql_fetchrow($hasil);

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Page</h3></div>
<div class="box-body">';
$admin .= '<form method="post" action="#">';
$admin .= '<div class="row">
<div class="col-md-8">
<div class="form-group">
	<label>Title</label>
	<input type="text" name="page_title" value="'.htmlspecialchars($data['page_title']).'" class="form-control" placeholder="Enter title here">
</div>
<div class="form-group">
	<label>Content</label>
	<textarea name="page_content" id="CKEditor" rows="5" class="form-control">'.$data['page_content'].'</textarea>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
	<label>Meta Description</label>
	<textarea name="meta_description" rows="3" class="form-control" placeholder="Enter meta description here">'.$data['meta_description'].'</textarea>
</div>
<div class="form-group">
	<label>Meta Keywords</label>
	<textarea name="meta_keywords" rows="3" class="form-control" placeholder="Enter meta keywords here">'.$data['meta_keywords'].'</textarea>
</div>
<div class="form-group">
	<label>Meta Author</label>
	<input type="text" name="meta_author" value="'.$data['meta_author'].'" class="form-control" placeholder="Enter author here">
</div>
</div>
</div>
</div>
<div class="box-footer">
	<button type="submit" name="submit" class="btn btn-primary">Update</button>
</div>';
$admin .= '</form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Hapus Halaman
#############################################
if($_GET['aksi']=="del_page"){
$id = int_filter($_GET['id']);	
$query = $koneksi_db->sql_query("DELETE FROM page WHERE page_id='$id'");
$admin .= '<section class="content">';
$admin .= '<div class="alert alert-success">Pages deleted.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=page&amp;modul=yes">';
$admin .= '</section>';
}

echo $admin;

?>