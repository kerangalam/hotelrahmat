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

if (isset ($_GET['pg'])) $pg = int_filter ($_GET['pg']); else $pg = 0;
if (isset ($_GET['stg'])) $stg = int_filter ($_GET['stg']); else $stg = 0;
if (isset ($_GET['offset'])) $offset = int_filter ($_GET['offset']); else $offset = 0;

$admin ='<section class="content-header">
<h1>Posting<small>to manage posting</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Posts</li>
</ol></section>';

$admin .= '<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=posts&amp;modul=yes"><i class="fa fa-fw fa-list"></i> Posts <span class="badge bg-green">'.$jum_pub.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=posts&amp;modul=yes&aksi=add_post"><i class="fa fa-fw fa-plus"></i> Post</a>
</section>';

$username = $_SESSION["UserName"];

#############################################
# List Berita
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

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
$hasil = $koneksi_db->sql_query("SELECT * FROM posts WHERE post_id in($pcheck)");
while($data = mysql_fetch_array($hasil)){
    $tempnews 	= 'id-content/modul/posts/images/normal/';
    $namagambar =  $data['gambar'];
    $uploaddir = $tempnews . $namagambar; 
	unlink($uploaddir);
}
$koneksi_db->sql_query("DELETE FROM posts WHERE post_id in($pcheck)");
if ($sukses){
$admin.='<div class="alert alert-success">'.$sukses.'</div>';
}
}

$cari	= $_GET['cari'];

$limit = 20;

if($cari){
$total = $koneksi_db->sql_query("SELECT * FROM posts WHERE post_publish=1 and post_author='$username' and post_title like '%$cari%' or post_author like '%$cari%' ORDER BY post_date DESC");
}else{
$total = $koneksi_db->sql_query("SELECT * FROM posts WHERE post_publish=1 and post_author='$username' ORDER BY post_date DESC");
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
$hasil = $koneksi_db->sql_query("SELECT * FROM posts WHERE post_publish=1 and post_author='$username' and post_title like '%$cari%' or post_author like '%$cari%' ORDER BY post_date DESC LIMIT $offset,$limit");
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM posts WHERE post_publish=1 and post_author='$username' ORDER BY post_date DESC LIMIT $offset,$limit");
}
if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">All Posts</h3></div>
<div class="box-body">';

$admin .= '<form method="get" action="main.php"><div class="input-group">
<input type="text" name="cari" class="form-control" placeholder="Search Title / Author Posts">
<span class="input-group-btn">
	<input type="hidden" name="opsi" value="posts">
	<input type="hidden" name="modul" value="yes">
	<button class="btn btn-default" type="submit" name="submit" value="Search">Search</button>
</span>
</div></form>';

$admin .="<form method='post' action=''>";
$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>#</th>
<th></th>
<th>Title</th>
<th>Categories</th>
<th>Author</th>
<th>Date</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$post_date	= datetimes($data['post_date'],false);
$post_cat	= $data['post_cat'];
if($data['post_image']==''){
$post_image ='<img class="img-thumbnail" src="id-content/modul/posts/images/thumb_default.jpg" width="50" height="50">';
}else{
$post_image ='<img class="img-thumbnail" src="id-content/modul/posts/images/thumb/'.$data['post_image'].'" width="50" height="50">';
}

$hasil2 = $koneksi_db->sql_query("SELECT * FROM posts_cat WHERE cat_id=$post_cat");
$data2 = $koneksi_db->sql_fetchrow($hasil2);
$cat_name = $data2['cat_name'];

$remove_image = ($data['post_image'] == '') ? '' : '<a class="text-danger" href="?opsi=posts&amp;modul=yes&amp;aksi=remove_image&amp;id='.$data['post_id'].'" onclick="return confirm(\'Are you sure?\')">Remove Image</a> -';
$published = ($data['post_publish'] == 1) ? '<a href="?opsi=posts&amp;modul=yes&amp;aksi=pub&amp;pub=tidak&amp;id='.$data['post_id'].'"><span class="text-success"><strong>Yes</strong></span></a>' : '<a href="?opsi=posts&amp;modul=yes&amp;aksi=pub&amp;pub=ya&amp;id='.$data['post_id'].'"><span class="text-danger"><strong>No</strong></span></a>';

$admin .='<tr>
<td>'.$no.'</td>
<td><input type=checkbox name=check'.$no.' value="'.$data['post_id'].'"></td>
<td>'.$post_image.'</td>
<td><a href="?opsi=posts&amp;modul=yes&aksi=edit_post&id='.$data['post_id'].'">'.$data['post_title'].'</a><br>
<small>'.$remove_image.'
<a class="text-info" href="?opsi=posts&amp;modul=yes&amp;aksi=edit_post&amp;id='.$data['post_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=posts&amp;modul=yes&amp;aksi=del_post&amp;id='.$data['post_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>
</small></td>
<td><a class="text-info" href="?opsi=posts&amp;modul=yes&amp;kid='.$post_cat.'">'.$cat_name.'</a></td>
<td>'.$data['post_author'].'</td>
<td><small><abbr title="'.datetimes($data['post_date']).'">'.$post_date.'</abbr><br>Publish '.$published.'</small></td>
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
# Tambah Berita
#############################################
if($_GET['aksi'] =='add_post'){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Post</h3></div>';

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$post_title		= text_filter($_POST['post_title']);
$post_feature	= int_filter($_POST['post_feature']);
$post_cat		= int_filter($_POST['post_cat']);
$post_content	= addslashes($_POST['post_content']);
$post_tag		= tags_filter($_POST['post_tag']);
$post_slug		= SEO($_POST['post_slug']);
$post_caption	= text_filter($_POST['post_caption']);
$post_source	= text_filter($_POST['post_source']);
$post_publish	= '0';
$meta_description = text_filter($_POST['meta_description']);
$meta_keywords	= text_filter($_POST['meta_keywords']);
$post_image		= $_FILES['post_image']['name'];
$namagambar		= date('Ymd-His');

$error = '';
if (!$post_title)	$error .= "Please enter title!<br />";
if (!$post_cat)		$error .= "Please choice category!<br />";
if (!$post_content)	$error .= "Please enter title!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($post_image)){
$files     = $_FILES['post_image']['name'];
$tmp_files = $_FILES['post_image']['tmp_name'];
// $simpan    = $namagambar.'.jpg';
$simpan    = $namagambar.'.'.pathinfo($files, PATHINFO_EXTENSION);
$uploaddir = $temp . $simpan; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);
if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $simpan;
$large = $normal . $simpan;

create_thumbnail ($uploaddir, $small, $thumb_width = 200, $thumb_height = 'auto', $kualitas = 80);
create_thumbnail ($uploaddir, $large, $normal_width = 800, $normal_height = 'auto', $kualitas = 80);
}else{
$simpan = '';
}

$post_author = $_SESSION['UserName'];
//$tanggal	= date('Y-m-d H:i:s');
//$tanggal = ''.$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'].' '.$_POST['jm'].':'.$_POST['mnt'].':'.$_POST['dtk'].'';
$hasil = $koneksi_db->sql_query("INSERT INTO posts (post_date,post_author,post_title,post_cat,post_feature,post_content,post_tag,post_publish,post_image,post_slug,post_caption,post_source,meta_description,meta_keywords) VALUES ('$post_date','$post_author','$post_title','$post_cat','$post_feature','$post_content','$post_tag','$post_publish','$post_image','$post_slug','$post_caption','$post_source','$meta_description','$meta_keywords')");
if($hasil){
$admin .= '<div class="alert alert-success">Post published.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=posts&modul=yes">';
if (!empty ($post_image)){
unlink($uploaddir);
}
unset($post_date);
unset($post_title);
unset($post_content);
unset($post_tag);
unset($post_caption);
unset($post_source);
unset($meta_description);
unset($meta_keywords);

}else{
$admin .= '<div class="alert alert-danger">Failed publish.</div>';
if (!empty ($post_image)){
unlink($small);
unlink($large);
}
}
}
}

$post_date 			= !isset($post_date) 		? '' : $post_date;
$post_title			= !isset($post_title) 		? '' : $post_title;
$post_content 		= !isset($post_content)		? '' : $post_content;
$post_tag 			= !isset($post_tag) 		? '' : $post_tag;
$post_caption 		= !isset($post_caption)		? '' : $post_caption;
$post_source 		= !isset($post_source) 		? '' : $post_source;
$meta_description	= !isset($meta_description)	? '' : $meta_description;
$meta_keywords 		= !isset($meta_keywords) 	? '' : $meta_keywords;

$post_date = date('Y-m-d H:i:s');

$admin .= '<form action="" method="post" enctype ="multipart/form-data">
<div class="box-body">
<div class="row"><!-- row -->
<div class="col-md-8"><!-- col md 8 -->
<div class="form-group">
	<label>Title</label>
	<input type="text" name="post_title" value="'.$post_title.'" class="form-control" placeholder="Enter title here">
</div>
<div class="form-group">
	<label>Category</label>
	<select name="post_cat" class="form-control">';
$s = $koneksi_db->sql_query("SELECT * FROM posts_cat WHERE cat_parent = 0 ORDER BY cat_name ASC");
$admin .= '<option value="">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$admin .= '<option value="'.$data['cat_id'].'">'.$data['cat_name'].'</option>';

$ss = $koneksi_db->sql_query("SELECT * FROM posts_cat WHERE cat_parent=".$data['cat_id']." ORDER BY cat_name ASC");	
while ($datas = $koneksi_db->sql_fetchrow($ss)) {
$admin .= '<option value="'.$datas['cat_id'].'">- '.$datas['cat_name'].'</option>';
}
}
$admin .= '</select>
</div>
<div class="form-group">
	<label>Content</label>
	<textarea name="post_content" rows="10" id="CKEditor" class="form-control">'.$post_content.'</textarea>
</div>
<div class="form-group">
	<label>Image</label>
	<input type="file" name="post_image"><p class="help-block">Extensi file *.JPG, *.JPEG</p>
</div>
<div class="form-group">
	<label>Caption</label>
	<input type="text" name="post_caption" value="'.$post_caption.'" class="form-control" placeholder="Enter caption here">
</div>
<div class="form-group">
	<label>Link Source</label>
	<input type="text" name="post_source" value="'.$post_source.'" class="form-control" placeholder="Enter link source here">
</div>
</div><!-- col md 8 -->
<div class="col-md-4">
<div class="form-group">
	<label>Feature</label>
	<div class="radio">
		<label><input type="radio" name="post_feature" value="1"> Yes</label>
	</div>
	<div class="radio">
		<label><input type="radio" name="post_feature" value="0"> No</label>
	</div>
</div>
<div class="form-group">
	<label>Datetime</label>
	<input type="text" name="post_date" value="'.$post_date.'" class="form-control" placeholder="Datetime">
</div>
<div class="form-group">
	<label>Tags</label>
	<input type="text" name="post_tag" value="'.$post_tag.'" class="form-control" placeholder="Enter tags here">
	<span class="help-block">separate them with commas (,)</span>
</div>
<div class="form-group">
	<label>Meta Description</label>
	<textarea name="meta_description" rows="3" class="form-control" placeholder="Enter meta description here">'.$data['meta_description'].'</textarea>
</div>
<div class="form-group">
	<label>Meta Keywords</label>
	<textarea name="meta_keywords" rows="3" class="form-control" placeholder="Enter meta keywords here">'.$data['meta_keywords'].'</textarea>
</div>
</div><!-- col md 4 -->
</div><!-- row -->
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Publish" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Edit Berita
#############################################
if($_GET['aksi']=="edit_post"){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Post</h3></div>
<div class="box-body">';

$id	= int_filter($_GET['id']);

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$post_title		= text_filter($_POST['post_title']);
$post_feature	= int_filter($_POST['post_feature']);
$post_cat		= int_filter($_POST['post_cat']);
$post_content	= addslashes($_POST['post_content']);
$post_tag		= tags_filter($_POST['post_tag']);
$post_slug		= SEO($_POST['post_title']);
$post_caption	= text_filter($_POST['post_caption']);
$post_sumber	= text_filter($_POST['post_sumber']);
$meta_description = text_filter($_POST['meta_description']);
$meta_keywords	= text_filter($_POST['meta_keywords']);
$post_image		= $_FILES['post_image']['name'];
$gambar_lama	= text_filter($_POST['gambar_lama']);
$namagambar		= date('Ymd-His');

$error = '';
if (!$post_title)	$error .= "Error: Judul berita belum diisi!<br />";
if (!$post_cat)		$error .= "Error: Kategori berita belum dipilih!<br />";
if (!$post_content)	$error .= "Error: Konten berita belum diisi!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($gambar)){
$files     = $_FILES['gambar']['name'];
$tmp_files = $_FILES['gambar']['tmp_name'];
$post_image = $namagambar.'.jpg';
$uploaddir = $temp . $post_image; 
$uploads   = move_uploaded_file($tmp_files, $uploaddir);

if (file_exists($uploaddir)){
@chmod($uploaddir,0644);
}
$small = $thumb . $post_image;
$large = $normal . $post_image;

create_thumbnail ($uploaddir, $small, $thumb_width = 200, $thumb_height = 'auto', $kualitas = 80);
create_thumbnail ($uploaddir, $large, $normal_width = 800, $normal_height = 'auto', $kualitas = 80);

//$tanggal = ''.$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'].' '.$_POST['jm'].':'.$_POST['mnt'].':'.$_POST['dtk'].'';
$hasil = $koneksi_db->sql_query("UPDATE posts SET post_date='$post_date',post_title='$post_title',post_cat='$post_cat',post_feature='$post_feature',post_content='$post_content',post_tag='$post_tag',post_image='$post_image',post_caption='$post_caption',post_slug='$post_slug',post_source='$post_source',meta_description='$meta_description',meta_keywords='$meta_keywords' WHERE post_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Post updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=posts&modul=yes">';
unlink($uploaddir);
$nimg = $normal . $gambar_lama;
$timg = $thumb . $gambar_lama;
if(!empty ($gambar_lama)){
unlink($nimg);
unlink($timg);
}
unset($post_title);
unset($post_content);
unset($post_tag);
unset($post_caption);
unset($post_source);

}else{
$admin .= '<div class="alert alert-danger">Post failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
unlink($small);
unlink($large);
}
}else{
//$tanggal = ''.$_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'].' '.$_POST['jm'].':'.$_POST['mnt'].':'.$_POST['dtk'].'';
$hasil = $koneksi_db->sql_query("UPDATE posts SET post_date='$post_date',post_title='$post_title',post_cat='$post_cat',post_feature='$post_feature',post_content='$post_content',post_tag='$post_tag',post_caption='$post_caption',post_slug='$post_slug',post_source='$post_source',meta_description='$meta_description',meta_keywords='$meta_keywords' WHERE post_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Post updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=post&modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">Post failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM posts WHERE post_id=$id");
$data = $koneksi_db->sql_fetchrow($a);	
$post_title		= $data['post_title'];
$post_date		= $data['post_date'];
$post_feature	= $data['post_feature'];
$post_cat		= $data['post_cat']; 
$post_content	= $data['post_content'];
$post_tag		= $data['post_tag'];
$post_caption	= $data['post_caption'];
$post_source	= $data['post_source'];
$gambar_lama	= $data['post_image'];

$admin .='<form method="post" action="" enctype ="multipart/form-data">
<div class="row">
<div class="col-md-8">
<div class="form-group">
	<label>Title</label>
	<input type="text" name="post_title" value="'.$post_title.'" class="form-control" placeholder="Enter title here">
</div>
<div class="form-group">
	<label>Category</label>
	<select name="cat_id" class="form-control">';
$hasil = $koneksi_db->sql_query("SELECT * FROM posts_cat WHERE cat_parent = 0 ORDER BY cat_name");
$admin .= '<option value="">None</option>';
while ($datas =  $koneksi_db->sql_fetchrow ($hasil)){
$pilihan = ($datas['cat_id']==$post_cat)? "selected":'';
$admin .='<option value="'.$datas['cat_id'].'" '.$pilihan.'>'.$datas['cat_name'].'</option>';

$hasilss = $koneksi_db->sql_query("SELECT * FROM berita_kat WHERE id_parent=".$datas['cat_id']." ORDER BY cat_name");
while ($datass =  $koneksi_db->sql_fetchrow ($hasilss)){
$pilihans = ($datass['cat_id']==$post_cat)?'selected':'';
$admin .= '<option value="'.$datass['cat_id'].'" '.$pilihans.'>- '.$datass['cat_name'].'</option>';
}
}
$admin .='</select>
</div>
<div class="form-group">
	<label>Content</label>
	<textarea name="post_content" id="CKEditor" class="form-control" rows="10" placeholder="Enter content here">'.$post_content.'</textarea>
</div>';
if(!$gambar_lama){
$gambar = '<img class="img-thumbnail" src="id-content/modul/posts/images/thumb_default.jpg" width="120">';
}else{
$gambar = '<img class="img-thumbnail" src="id-content/modul/posts/images/normal/'.$gambar_lama.'" width="120">';
}
$admin .='<div class="form-group">
	<label></label>
	'.$gambar.'
</div>
<div class="form-group">
	<label>Image</label>
	<input type="file" name="post_image">
	<input type="hidden" name="gambar_lama" value="'.$gambar_lama.'">
	<p class="help-block">Extensi file *.JPG, *.JPEG</p>
</div>
<div class="form-group">
	<label>Caption</label>
	<input type="text" name="post_caption" value="'.$post_caption.'" class="form-control" placeholder="Enter caption here">
</div>
<div class="form-group">
	<label>Link Source</label>
	<input type="text" name="post_source" value="'.$post_source.'" class="form-control" placeholder="Enter link source here">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
	<label>Feature</label>';
if($post_feature==1){
$admin .= '
<div class="radio">
	<label><input type="radio" name="post_feature" value="1" checked> Yes</label> 
</div>
<div class="radio">
	<label><input type="radio" name="post_feature" value="0"> No</label>
</div>';
}else{
$admin .= '
<div class="radio">
	<label><input type="radio" name="post_feature" value="1"> Yes</label>
</div>
<div class="radio">
	<label><input type="radio" name="post_feature" value="0" checked> No</label>
</div>';
}
$admin .= '</div>
<div class="form-group">
	<label>Datetime</label>
	<input type="text" name="post_date" value="'.$post_date.'" class="form-control">
</div>
<div class="form-group">
	<label>Tags</label>
	<input type="text" name="post_tag" value="'.$post_tag.'" class="form-control" placeholder="Enter tags here">
	<span class="help-block">separate them with commas (,)</span>
</div>
<div class="form-group">
	<label>Meta Description</label>
	<textarea name="meta_description" class="form-control" rows="3" placeholder="Enter meta description here">'.$meta_description.'</textarea>
</div>
<div class="form-group">
	<label>Meta Keywords</label>
	<textarea name="meta_keywords" class="form-control" rows="3" placeholder="Enter meta keywords here">'.$meta_keywords.'</textarea>
</div>
</div>
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
# Hapus Berita
#############################################
if($_GET['aksi']=="del_post"){

$id     = int_filter($_GET['id']);

$hasil = $koneksi_db->sql_query( "SELECT * FROM berita WHERE id=$id" );
while($data = mysql_fetch_array($hasil)){
$gambar_thumb 	= 'id-content/modul/berita/images/thumb/';
$gambar_normal 	= 'id-content/modul/berita/images/normal/';
$namagambar =  $data['gambar'];
$uploaddir = $gambar_thumb . $namagambar; 
$uploaddir = $gambar_normal . $namagambar; 
unlink($uploaddir);
}

$koneksi_db->sql_query("DELETE FROM berita WHERE id='$id'");
$koneksi_db->sql_query("DELETE FROM berita_komentar WHERE berita='$id'");
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Berita berhasil dihapus</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=berita&modul=yes">';
}

echo $admin;

?>