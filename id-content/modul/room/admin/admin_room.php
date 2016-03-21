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

$temp 	= 'id-content/modul/room/images/temp/';
$thumb	= 'id-content/modul/room/images/thumb/';
$normal	= 'id-content/modul/room/images/normal/';

if (isset ($_GET['pg'])) $pg = int_filter ($_GET['pg']); else $pg = 0;
if (isset ($_GET['stg'])) $stg = int_filter ($_GET['stg']); else $stg = 0;
if (isset ($_GET['offset'])) $offset = int_filter ($_GET['offset']); else $offset = 0;

$tot_pub = $koneksi_db->sql_query("SELECT * FROM hotel_room");
$jum_pub = $koneksi_db->sql_numrows($tot_pub);

$admin ='<section class="content-header">
<h1>Rooms<small>untuk mengelola sistem kamar</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Rooms</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=room&amp;modul=yes"><i class="fa fa-fw fa-list"></i> Kamar <span class="badge bg-green">'.$jum_pub.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=room&amp;modul=yes&amp;aksi=add_room"><i class="fa fa-fw fa-plus"></i> Kamar</a>
<a class="btn btn-default btn-flat" href="?opsi=room&amp;modul=yes&amp;aksi=tipe">Tipe Kamar</a>
</section>';

#############################################
# List Kamar
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">All Rooms</h3></div>
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
if ($pcheck) $sukses .= "Posts with ID $pcheck deleted.<br />";
$koneksi_db->sql_query("DELETE FROM hotel_room WHERE room_id in($pcheck)");
if ($sukses){
$admin.='<div class="alert alert-success">'.$sukses.'</div>';
}
}

$cari	= $_GET['cari'];
$kid	= $_GET['kid'];

$limit = 20;

if($cari){
$total = $koneksi_db->sql_query("SELECT * FROM hotel_room WHERE post_title like '%$cari%' or post_author like '%$cari%' ORDER BY room_idtype,room_no ASC");
}elseif ($kid) {
$total = $koneksi_db->sql_query("SELECT * FROM hotel_room WHERE room_idtype=".$kid." ORDER BY room_idtype,room_no ASC");
}else{
$total = $koneksi_db->sql_query("SELECT * FROM hotel_room ORDER BY room_idtype,room_no ASC");
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
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room WHERE post_title like '%$cari%' or post_author like '%$cari%' ORDER BY room_idtype,room_no ASC LIMIT $offset,$limit");
}elseif ($kid) {
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room WHERE room_idtype = ".$kid." ORDER BY room_idtype,room_no ASC LIMIT $offset,$limit");
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room ORDER BY room_idtype,room_no ASC LIMIT $offset,$limit");
}
if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .= '<form method="get" action="main.php"><div class="input-group">
<input type="text" name="cari" class="form-control" placeholder="Search Title / Author Posts">
<span class="input-group-btn">
	<input type="hidden" name="opsi" value="post">
	<input type="hidden" name="modul" value="yes">
	<button class="btn btn-default" type="submit" name="submit" value="Search">Search</button>
</span>
</div></form>';

$admin .="<form method='post' action=''>";
$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>#</th>
<th>Nama</th>
<th>Nomor</th>
<th>Tipe</th>
<th>Actions</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$room_idtype	= $data['room_idtype'];

$t = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_id=$room_idtype");
$datat = $koneksi_db->sql_fetchrow($t);
$type_name = $datat['type_name'];

$published = ($data['post_publish'] == 1) ? '<a href="?opsi=room&amp;modul=yes&amp;aksi=pub&amp;pub=tidak&amp;id='.$data['post_id'].'"><span class="text-success"><strong>Yes</strong></span></a>' : '<a href="?opsi=post&amp;modul=yes&amp;aksi=pub&amp;pub=ya&amp;id='.$data['post_id'].'"><span class="text-danger"><strong>No</strong></span></a>';

$admin .='<tr>
<td>'.$no.'</td>
<td><input type=checkbox name=check'.$no.' value="'.$data['room_id'].'"></td>
<td><a href="?opsi=room&amp;modul=yes&amp;aksi=edit_room&amp;id='.$data['room_id'].'">'.$data['room_name'].'</a></td>
<td><span class="badge">'.$data['room_no'].'</span></td>
<td>'.$type_name.'</td>
<td>
<a class="text-info" href="?opsi=room&amp;modul=yes&amp;aksi=edit_room&amp;id='.$data['room_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=room&amp;modul=yes&amp;aksi=del_room&amp;id='.$data['room_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>
</td>
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
# Tambah Kamar
#############################################
if($_GET['aksi'] =='add_room'){

$admin .= '<section class="content">';

if(isset($_POST['submit'])){

$room_name		= text_filter($_POST['room_name']);
$room_no		= $_POST['room_no'];
$room_idtype	= int_filter($_POST['room_idtype']);
$room_slug		= SEO($_POST['room_name']);

$error = '';
//if (!$room_name)	$error .= "Please enter title!<br />";
if (!$room_no)		$error .= "Please enter room number!<br />";
if (!$room_idtype)	$error .= "Please choice type!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room (room_name,room_no,room_idtype,room_slug) VALUES ('$room_name','$room_no','$room_idtype','$room_slug')");
if($hasil){
$admin .= '<div class="alert alert-success">Room published.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes">';

unset($room_name);
unset($room_no);
unset($room_idtype);

}else{
$admin .= '<div class="alert alert-danger">Failed publish.</div>';
}
}
}

$room_name		= !isset($room_name)	? '' : $room_name;
$room_no		= !isset($room_no) 		? '' : $room_no;
$room_idtype	= !isset($room_idtype)	? '' : $room_idtype;

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Tambah Kamar Baru</h3></div>';
$admin .= '<form action="" method="post" enctype ="multipart/form-data">
<div class="box-body">
<div class="form-group">
	<label>Nama Kamar</label>
	<input type="text" name="room_name" value="'.$room_name.'" class="form-control" placeholder="Masukkan nama kamar">
</div>
<div class="form-group">
	<label>Nomor Kamar</label>
	<input type="text" name="room_no" value="'.$room_no.'" class="form-control" placeholder="Masukkan nomor kamar">
</div>
<div class="form-group">
	<label>Tipe Kamar</label>
	<select name="room_idtype" class="form-control">';
$s = $koneksi_db->sql_query("SELECT * FROM hotel_room_type ORDER BY type_id ASC");
$admin .= '<option value="">None</option>';
while ($data = $koneksi_db->sql_fetchrow($s)) {
$admin .= '<option value="'.$data['type_id'].'">'.$data['type_name'].'</option>';
}
$admin .= '</select>
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
# Edit Kamar
#############################################
if($_GET['aksi']=="edit_room"){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Kamar</h3></div>
<div class="box-body">';

$id	= int_filter($_GET['id']);

if(isset($_POST['submit'])){

$room_name		= text_filter($_POST['room_name']);
$room_no		= $_POST['room_no'];
$room_idtype	= int_filter($_POST['room_idtype']);
$room_slug		= SEO($_POST['room_name']);

$error = '';
//if (!$room_name)	$error .= "Please enter title!<br />";
if (!$room_no)		$error .= "Please enter room number!<br />";
if (!$room_idtype)	$error .= "Please choice type!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("UPDATE hotel_room SET room_name='$room_name',room_no='$room_no',room_idtype='$room_idtype',room_slug='$room_slug' WHERE room_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Room updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">Room failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM hotel_room WHERE room_id=$id");
$data = $koneksi_db->sql_fetchrow($a);	
$room_name		= $data['room_name'];
$room_no		= $data['room_no'];
$room_idtype	= $data['room_idtype']; 

$admin .='<form method="post" action="" enctype ="multipart/form-data">
<div class="form-group">
	<label>Nama Kamar</label>
	<input type="text" name="room_name" value="'.$room_name.'" class="form-control" placeholder="Masukkan nama kamar">
</div>
<div class="form-group">
	<label>Nomor Kamar</label>
	<input type="text" name="room_no" value="'.$room_no.'" class="form-control" placeholder="Masukkan nomor kamar">
</div>
<div class="form-group">
	<label>Tipe Kamar</label>
	<select name="room_idtype" class="form-control">';
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room_type ORDER BY type_name");
$admin .= '<option value="">None</option>';
while ($datas =  $koneksi_db->sql_fetchrow ($hasil)){
$pilihan = ($datas['type_id']==$room_idtype)? "selected":'';
$admin .='<option value="'.$datas['type_id'].'" '.$pilihan.'>'.$datas['type_name'].'</option>';
}
$admin .='</select>
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
# Hapus Kamar
#############################################
if($_GET['aksi']=="del_room"){
$id = int_filter($_GET['id']);
$koneksi_db->sql_query("DELETE FROM hotel_room WHERE room_id='$id'");
$admin .= '<section class="content">';
$admin.='<div class="alert alert-success">Kamar berhasil dihapus</div>';
$admin .= '</section>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes">';
}

#############################################
# List Tipe
#############################################
if($_GET['aksi']=="tipe"){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Tambah Tipe Kamar Baru</h3></div>
<div class="box-body">';

$admin .= '<div class="row">';
$admin .= '<div class="col-md-4">';
if (isset($_POST['submit'])) {

$type_name		= text_filter($_POST['type_name']);
$type_max		= int_filter($_POST['type_max']);
$type_bed		= int_filter($_POST['type_bed']);
$type_facility	= $_POST['type_facility'];
$type_price		= $_POST['type_price'];
$type_slug		= SEO($_POST['type_name']);

$total = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_name='".$_POST['type_name']."'");
$jumlah = $koneksi_db->sql_numrows($total);
$error = '';
if ($jumlah) 			$error .= "Tipe kamar sudah ada di dalam database.<br />";
if (!$type_name)		$error .= "Tipe kamar harus diisi.<br />";
if (!$type_max)			$error .= "Maksimal person harus diisi.<br />";
if (!$type_facility)	$error .= "Fasilitas kamar harus diisi.<br />";
if (!$type_price)		$error .= "Harga kamar per malam harus diisi.<br />";

if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room_type (type_name,type_max,type_bed,type_facility,type_price,type_slug) VALUES ('$type_name','$type_max','$type_bed','$type_facility','$type_price','$type_slug')");
if ($hasil) {
$admin .='<div class="alert alert-success">Tipe kamar berhasil disimpan.</div>';
$admin .='<meta http-equiv="refresh" content="1; url=?opsi=room&amp;modul=yes&amp;aksi=tipe">';
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$type_name		= !isset($type_name) 		? '' : $type_name;
$type_max		= !isset($type_max)			? '' : $type_max;
$type_bed		= !isset($type_bed)			? '' : $type_bed;
$type_facility	= !isset($type_facility)	? '' : $type_facility;
$type_price		= !isset($type_price)		? '' : $type_price;

$admin .='<form method="post" action="">
<div class="form-group">
	<label>Tipe</label>
	<input type="text" name="type_name" value="'.$type_name.'" class="form-control" placeholder="Masukkan tipe kamar">
</div>
<div class="form-group">
	<label>Max Person</label>
	<input type="text" name="type_max" value="'.$type_max.'" class="form-control" placeholder="Masukkan jumlah kasur">
</div>
<div class="form-group">
	<label>Jumlah Bed</label>
	<input type="text" name="type_bed" value="'.$type_bed.'" class="form-control" placeholder="Masukkan jumlah kasur">
</div>
<div class="form-group">
	<label>Fasilitas</label>
	<textarea name="type_facility" rows="3" class="form-control" placeholder="Masukkan fasilitas kamar">'.$type_facility.'</textarea>
</div>
<div class="form-group">
	<label>Harga Kamar per Malam</label>
	<div class="input-group">
	<span class="input-group-addon" id="sizing-addon2">Rp</span>
	<input type="text" name="type_price" value="'.$type_price.'" class="form-control" placeholder="300000">
	</div>
</div>
<div class="form-group">
	<label></label>
	<input type="submit" name="submit" value="Tambah Tipe Kamar" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';

$admin .= '<div class="col-md-8">';
$total = $koneksi_db->sql_query("SELECT * FROM hotel_room_type ORDER BY type_price ASC");
$jumlah = $koneksi_db->sql_numrows( $total );
$limit = 5;

if (!isset ($_GET['offset'])) {
	$offset = 0;
}

$ada = new paging ($limit);
if ($jumlah<1){
$admin.='<div class="alert alert-danger">Tidak ada tipe kamar.</div>';
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room_type ORDER BY type_price ASC LIMIT $offset,$limit");

if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>Tipe</th>
<th class="text-center">Kasur</th>
<th class="text-center">Kamar</th>
<th>Harga</th>
<th>Galeri</th>
<th>Aksi</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {

$tot_gal = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_idtype='".$data['type_id']."'");
$jum_gal = $koneksi_db->sql_numrows($tot_gal);

$tot_kam = $koneksi_db->sql_query("SELECT * FROM hotel_room WHERE room_idtype='".$data['type_id']."'");
$jum_kam = $koneksi_db->sql_numrows($tot_kam);

$admin .='<tr>
<td>'.$no.'</td>
<td><strong>'.$data['type_name'].'</strong><br>'.$data['type_facility'].'</td>
<td class="text-center"><span class="badge">'.$data['type_bed'].'</span></td>
<td class="text-center"><span class="badge">'.$jum_kam.'</span></td>
<td>'.rupiah_format($data['type_price']).'</td>
<td><a href="?opsi=room&amp;modul=yes&amp;aksi=list_galeri&amp;id='.$data['type_id'].'"><strong>'.$jum_gal.'</strong> Photo</a> - 
<a href="?opsi=room&amp;modul=yes&amp;aksi=tambah_galeri&amp;id='.$data['type_id'].'">Tambah</a></td>
<td><a class="text-info" href="?opsi=room&amp;modul=yes&amp;aksi=edit_tipe&amp;id='.$data['type_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=room&amp;modul=yes&amp;aksi=del_tipe&amp;kid='.$data['type_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
</tr>';
$no++;
}
$admin .='</tbody></table></div>';
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
$admin .= $ada-> getPaging($jumlah, $pg, $stg);
$admin .= '</center>';
}
$admin.='</div>';
$admin.='</div>';

$admin.='</div></div>';
}

#############################################
# Edit Tipe
#############################################
if($_GET['aksi']=="edit_tipe"){

$id = int_filter($_GET['id']);

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Tipe</h3></div>
<div class="box-body">';

if (isset($_POST['submit'])) {

$type_name		= text_filter($_POST['type_name']);
$type_max		= int_filter($_POST['type_max']);
$type_bed		= int_filter($_POST['type_bed']);
$type_facility	= $_POST['type_facility'];
$type_price		= $_POST['type_price'];
$type_slug		= SEO($_POST['type_name']);

$total = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_name = '".$_POST['type_name']."' and type_id != '".$id."'");
$jumlah = $koneksi_db->sql_numrows($total);
$error = '';
if ($jumlah) 			$error .= "Tipe kamar sudah ada di dalam database.<br />";
if (!$type_name)		$error .= "Tipe kamar harus diisi.<br />";
if (!$type_max)			$error .= "Maksimal person harus diisi.<br />";
if (!$type_facility)	$error .= "Fasilitas kamar harus diisi.<br />";
if (!$type_price)		$error .= "Harga kamar per malam harus diisi.<br />";

if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$hasil = $koneksi_db->sql_query("UPDATE hotel_room_type SET type_name='$type_name',type_max='$type_max',type_bed='$type_bed',type_facility='$type_facility',type_price='$type_price',type_slug='$type_slug' WHERE type_id='$id'");
if($hasil){
$admin .='<div class="alert alert-success">Tipe kamar berhasil diupdate.</div>';
$admin .='<meta http-equiv="refresh" content="1; url=?opsi=room&amp;modul=yes&amp;aksi=tipe">';
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_id=$id");
$data = $koneksi_db->sql_fetchrow($hasil);

$admin .='<form method="post" action="">
<div class="form-group">
    <label>Tipe</label>
	<input type="text" name="type_name" value="'.$data['type_name'].'" class="form-control">
</div>
<div class="form-group">
	<label>Max Person</label>
	<input type="text" name="type_max" value="'.$data['type_max'].'" class="form-control" placeholder="Max Person">
</div>
<div class="form-group">
	<label>Jumlah Bed</label>
	<input type="text" name="type_bed" value="'.$data['type_bed'].'" class="form-control" placeholder="Masukkan jumlah kasur">
</div>
<div class="form-group">
    <label>Fasilitas</label>
	<textarea name="type_facility" rows="2" class="form-control">'.$data['type_facility'].'</textarea>
</div>
<div class="form-group">
	<label>Harga Kamar per Malam</label>
	<div class="input-group">
	<span class="input-group-addon" id="sizing-addon2">Rp</span>
	<input type="text" name="type_price" value="'.$data['type_price'].'" class="form-control" placeholder="300000">
	</div>
</div>
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Update" class="btn btn-primary">
</div>
</form>';
$admin .= '</section>';
}

#############################################
# Hapus Tipe
#############################################
if($_GET['aksi']=="del_tipe"){

$admin .= '<section class="content">';

$kid = int_filter($_GET['kid']);

$admin .='<h5 class="page-header">Delete Category ID '.$kid.'</h5>';

$hasil = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_id=$kid");
$data = $koneksi_db->sql_fetchrow($hasil);
$cat_name 	= $data['cat_name'];
$cat_desc	= $data['cat_desc'];

if (empty ($cat_name)){
$admin.='<div class="alert alert-danger">Category with ID <strong>'.$kid.' empty</strong></div>';
$admin.='<meta http-equiv="refresh" content="3; url=?opsi=post&amp;modul=yes&amp;aksi=categories">';
}else {
$admin .= '<div class="alert alert-danger">The whole news in this category will be deleted! You are sure? 
<a class="text-info" href="?opsi=post&amp;modul=yes&amp;aksi=del_tipe&amp;kid='.$kid.'&amp;konfirm=yes">Yes</a> | <a class="text-info" href="?opsi=post&amp;mod=yes">No</a></div>';
}
}

if (isset($_GET['konfirm'])=="yes") {

$hasil = $koneksi_db->sql_query("SELECT * FROM post WHERE kid=$kid" );
while($data = $koneksi_db->sql_fetchrow($hasil)){
$thumb 		= 'id-content/modul/post/images/thumb/';
$normal 	= 'id-content/modul/post/images/normal/';
$namagambar = $data['gambar'];
$uploaddir 	= $thumb . $namagambar;
$uploaddir 	= $normal . $namagambar;
unlink($uploaddir);
}

$koneksi_db->sql_query("DELETE FROM post_cat WHERE cat_id='$kid'");
$koneksi_db->sql_query("DELETE FROM post WHERE post_cat='$kid'");
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> Kategori, berita dan komentar yang ada di kategori ini telah di hapus!</div>';
$admin.='<meta http-equiv="refresh" content="3; url=?opsi=post&amp;modul=yes&amp;aksi=categories">';
$admin .= '</section>';
}

#############################################
# Tambah Galeri
#############################################
if($_GET['aksi'] =='tambah_galeri'){

$id	= int_filter($_GET['id']);

$t = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_id=$id");
$datat = $koneksi_db->sql_fetchrow($t);
$type_name = $datat['type_name'];

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Tambah Galeri Kamar '.$type_name.'</h3></div>
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
//if (!$photo_kid) $error .= "Error: Kategori foto belum dipilih!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
if (!empty ($image_name1)){
$files     = $_FILES['image1']['name'];
$tmp_files = $_FILES['image1']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(gal_id) AS last FROM hotel_room_gallery");
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
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room_gallery (gal_image,gal_idtype) VALUES ('$simpan','$id')");
$admin .= '<div class="alert alert-success">Photo 1 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$id.'">';
unlink($uploaddir);
}

if (!empty ($image_name2)){
$files     = $_FILES['image2']['name'];
$tmp_files = $_FILES['image2']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(gal_id) AS last FROM hotel_room_gallery");
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
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room_gallery (gal_image,gal_idtype) VALUES ('$simpan','$id')");
$admin .= '<div class="alert alert-success">Photo 2 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$id.'">';
unlink($uploaddir);
}

if (!empty ($image_name3)){
$files     = $_FILES['image3']['name'];
$tmp_files = $_FILES['image3']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(gal_id) AS last FROM hotel_room_gallery");
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
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room_gallery (gal_image,gal_idtype) VALUES ('$simpan','$id')");
$admin .= '<div class="alert alert-success">Photo 3 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$id.'">';
unlink($uploaddir);
}

if (!empty ($image_name4)){
$files     = $_FILES['image4']['name'];
$tmp_files = $_FILES['image4']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(gal_id) AS last FROM hotel_room_gallery");
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
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room_gallery (gal_image,gal_idtype) VALUES ('$simpan','$id')");
$admin .= '<div class="alert alert-success">Photo 4 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$id.'">';
unlink($uploaddir);
}

if (!empty ($image_name5)){
$files     = $_FILES['image5']['name'];
$tmp_files = $_FILES['image5']['tmp_name'];
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $koneksi_db->sql_query("SELECT max(gal_id) AS last FROM hotel_room_gallery");
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
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_room_gallery (gal_image,gal_idtype) VALUES ('$simpan','$id')");
$admin .= '<div class="alert alert-success">Photo 5 telah diupload</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=photo&modul=yes&aksi=list_galeri&id='.$id.'">';
unlink($uploaddir);
}
}
}

$admin .= '<form action="" method="post" enctype ="multipart/form-data">
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
# List Galeri
#############################################
if($_GET['aksi']=="list_galeri"){

$id = $_GET['id'];

$admin .= '<section class="content">';

$k = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_id=$id");
$datak = $koneksi_db->sql_fetchrow($k);
$type_name = $datak['type_name'];

$no = 1;
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_idtype=$id ORDER BY gal_id ASC");
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">List Galeri Kamar '.$type_name.'</h3></div>
<div class="box-body">';

$admin .= '<div class="row">';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$gal_image ='<img class="img-thumbnail" src="id-content/modul/room/images/thumb/'.$data['gal_image'].'">';

$admin .='<div class="col-md-3">
'.$gal_image.'<br><p class="text-center">
<a class="text-info" href="?opsi=room&amp;modul=yes&amp;aksi=edit_galeri&amp;id='.$data['gal_id'].'&amp;tipe='.$data['gal_idtype'].'">Edit</a> - 
<a class="text-danger" href="?opsi=room&amp;modul=yes&amp;aksi=del_galeri&amp;id='.$data['gal_id'].'&amp;tipe='.$data['gal_idtype'].'">Hapus</a> - 
<a class="text-success" href="?opsi=room&amp;modul=yes&amp;aksi=default&amp;id='.$data['gal_id'].'&amp;tipe='.$data['gal_idtype'].'">Default</a></p>
</div>';		
$no++;
}
$admin .='</div>';

$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Edit Galeri
#############################################
if($_GET['aksi'] =='edit_galeri'){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Galeri</h3></div>
<div class="box-body">';

$id	= int_filter($_GET['id']);
$tipe = int_filter ($_GET['tipe']);

if(isset($_POST['submit'])){

define("GIS_GIF", 1);
define("GIS_JPG", 2);
define("GIS_PNG", 3);
define("GIS_SWF", 4);

include "id-includes/hft_image.php";

$gal_name		= addslashes($_POST['gal_name']);
$gambar			= $_FILES['gambar']['name'];
$gambar_lama	= $_POST['gambar_lama'];
$namagambar		= date('Ymd-His');

$error = '';
//if (!$photo_name)	$error .= "Error: Nama foto belum diisi!<br />";

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

$hasil = $koneksi_db->sql_query("UPDATE hotel_room_gallery SET gal_name='$gal_name',gal_image='$simpan' WHERE gal_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Galeri updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$tipe.'">';
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
$hasil = $koneksi_db->sql_query("UPDATE hotel_room_gallery SET gal_name='$gal_name' WHERE gal_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Galeri updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$tipe.'">';
}else{
$admin .= '<div class="alert alert-danger">Photo failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_id=$id");
$data = $koneksi_db->sql_fetchrow($a);	
$gal_name		= $data['gal_name'];
$gambar_lama	= $data['gal_image'];

$admin .='<form class="form-horizontal" method="post" action="" enctype ="multipart/form-data">
<div class="form-group">
	<label class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10"><input type="text" name="gal_name" value="'.$gal_name.'" class="form-control" placeholder="Title"></div>
</div>';
$gambar = '<img class="img-thumbnail" src="id-content/modul/room/images/thumb/'.$gambar_lama.'" width="120">';
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
# Set Default
#############################################
if ($_GET['aksi'] == 'default'){
$admin .= '<section class="content">';
$id = int_filter ($_GET['id']);
$tipe = int_filter ($_GET['tipe']);
$koneksi_db->sql_query ("UPDATE hotel_room_gallery SET gal_default=1 WHERE gal_id='$id'");
$koneksi_db->sql_query ("UPDATE hotel_room_gallery SET gal_default=0 WHERE gal_idtype='$tipe' and gal_id!='$id'");
$admin .= '<div class="alert alert-success">Set Gambar Default Berhasil</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$tipe.'">';
$admin .= '</section>';
}

#############################################
# Hapus Galeri
#############################################
if($_GET['aksi']=="del_galeri"){

$id = int_filter($_GET['id']);
$tipe = int_filter($_GET['tipe']);

$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_id=$id");
while($data = $koneksi_db->sql_fetchrow($hasil)){
$gambar_thumb = 'id-content/modul/room/images/thumb/';
$gambar_normal = 'id-content/modul/room/images/normal/';
$namagambar = $data['gal_image'];
$uploaddirt = $gambar_thumb . $namagambar; 
$uploaddirn = $gambar_normal . $namagambar; 
unlink($uploaddirt);
unlink($uploaddirn);
}

$koneksi_db->sql_query("DELETE FROM hotel_room_gallery WHERE gal_id='$id'");
$admin .= '<section class="content">';
$admin.='<div class="alert alert-success">Galeri kamar berhasil dihapus</div>';
$admin .= '</section>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=room&modul=yes&aksi=list_galeri&id='.$tipe.'">';
}

echo $admin;

?>