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

$style_include[] = '
<!-- DatePicker -->
<link rel="stylesheet" href="'.$url_situs.'/id-admin/themes/administrator/plugins/datepicker/css/datepicker.css">';
$script_include[] = '
<!-- DatePicker -->
<script src="'.$url_situs.'/id-admin/themes/administrator/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
$( "#datepicker" ).datepicker();
$( "#datepicker2" ).datepicker();
</script>';

$username = $_SESSION["UserName"];

if (isset ($_GET['pg'])) $pg = int_filter ($_GET['pg']); else $pg = 0;
if (isset ($_GET['stg'])) $stg = int_filter ($_GET['stg']); else $stg = 0;
if (isset ($_GET['offset'])) $offset = int_filter ($_GET['offset']); else $offset = 0;

$total = $koneksi_db->sql_query("SELECT * FROM hotel_coupon");
$jumlah = $koneksi_db->sql_numrows($total);

$admin ='<section class="content-header">
<h1>Reservations<small>untuk mengelola sistem kamar</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Reservations</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=reservation&amp;modul=yes"><i class="fa fa-fw fa-list"></i> All Promotions <span class="badge bg-green">'.$jumlah.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=reservation&amp;modul=yes&amp;status=Active">Active Promotions</a>
<a class="btn btn-default btn-flat" href="?opsi=reservation&amp;modul=yes&amp;status=Expired">Expired Promotions</a>
<a class="btn btn-default btn-flat" href="?opsi=reservation&amp;modul=yes&amp;aksi=add_coupon"><i class="fa fa-fw fa-plus"></i> Add New Promotion</a>
<a class="btn btn-default btn-flat" href="?opsi=reservation&amp;modul=yes&amp;aksi=rekening">Rekening Pembayaran</a>
</section>';

#############################################
# All Promotions
#############################################
if($_GET['aksi']==""){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">All Promotions</h3></div>
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
if ($pcheck) $sukses .= "Coupon with ID $pcheck deleted.<br />";
$koneksi_db->sql_query("DELETE FROM hotel_coupon WHERE cou_id in($pcheck)");
if ($sukses){
$admin.='<div class="alert alert-success">'.$sukses.'</div>';
}
}

$status	= $_GET['status'];

$limit = 20;

if($status) {
$total = $koneksi_db->sql_query("SELECT * FROM hotel_coupon WHERE cou_status='".$status."' ORDER BY cou_id DESC");
}else{
$total = $koneksi_db->sql_query("SELECT * FROM hotel_coupon ORDER BY cou_id DESC");
}
$jumlah = $koneksi_db->sql_numrows($total);

if (!isset ($_GET['offset'])) {
	$offset = 0;
}

$a = new paging ($limit);
if ($jumlah<1){
$admin.='<div class="alert alert-danger">No coupons</div>';
}else{
if($status) {
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_coupon WHERE cou_status='".$status."' ORDER BY cou_id DESC LIMIT $offset,$limit");
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_coupon ORDER BY cou_id DESC LIMIT $offset,$limit");
}
if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .="<form method='post' action=''>";
$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>Promotion Code</th>
<th>Value</th>
<th>Start Date</th>
<th>Expiry Date</th>
<th>Status</th>
<th>Actions</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$room_idtype	= $data['room_idtype'];

$t = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_id=$room_idtype");
$datat = $koneksi_db->sql_fetchrow($t);
$type_name = $datat['type_name'];

$published = ($data['post_publish'] == 1) ? '<a href="?opsi=payment&amp;modul=yes&amp;aksi=pub&amp;pub=tidak&amp;id='.$data['post_id'].'"><span class="text-success"><strong>Yes</strong></span></a>' : '<a href="?opsi=post&amp;modul=yes&amp;aksi=pub&amp;pub=ya&amp;id='.$data['post_id'].'"><span class="text-danger"><strong>No</strong></span></a>';

$admin .='<tr>
<td>'.$no.'</td>
<td><a href="?opsi=payment&amp;modul=yes&amp;aksi=edit_coupon&amp;id='.$data['cou_id'].'">'.$data['cou_code'].'</a></td>
<td>'.rupiah_format($data['cou_value']).'</td>
<td>'.$data['cou_start'].'</td>
<td>'.$data['cou_expiry'].'</td>
<td>'.$data['cou_status'].'</td>
<td>
<a class="text-info" href="?opsi=payment&amp;modul=yes&amp;aksi=edit_coupon&amp;id='.$data['cou_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=payment&amp;modul=yes&amp;aksi=del_coupon&amp;id='.$data['cou_id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>
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
# Add Promotions
#############################################
if($_GET['aksi'] =='add_coupon'){

$admin .= '<section class="content">';

if(isset($_POST['submit'])){

$cou_code	= text_filter($_POST['cou_code']);
$cou_value	= int_filter($_POST['cou_value']);
$cou_start	= $_POST['cou_start'];
$cou_expiry	= $_POST['cou_expiry'];
$cou_desc	= $_POST['cou_desc'];

$error = '';
if (!$cou_code)		$error .= "Please enter code coupon!<br />";
if (!$cou_value)	$error .= "Please enter value discount!<br />";
if (!$cou_start)	$error .= "Please enter start date!<br />";
if (!$cou_expiry)	$error .= "Please enter expired date!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_coupon (cou_code,cou_value,cou_desc,cou_start,cou_expiry) VALUES ('$cou_code','$cou_value','$cou_desc','$cou_start','$cou_expiry')");
if($hasil){
$admin .= '<div class="alert alert-success">Coupon published.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=payment&modul=yes">';

unset($cou_code);
unset($cou_value);
unset($cou_desc);
unset($cou_start);
unset($cou_expiry);

}else{
$admin .= '<div class="alert alert-danger">Failed publish.</div>';
}
}
}

$cou_code		= !isset($cou_code)		? '' : $cou_code;
$cou_value		= !isset($cou_value)	? '' : $cou_value;
$cou_desc		= !isset($cou_desc)		? '' : $cou_desc;
$cou_start		= !isset($cou_start)	? '' : $cou_start;
$cou_expiry		= !isset($cou_expiry)	? '' : $cou_expiry;

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New Promotion</h3></div>';
$admin .= '<form action="" method="post" enctype ="multipart/form-data">
<div class="box-body">
<div class="form-group">
	<label>Promotion Code</label>
	<input type="text" name="cou_code" value="'.$cou_code.'" class="form-control" placeholder="Promotion Code">
</div>
<div class="form-group">
	<label>Value</label>
	<div class="input-group">
		<span class="input-group-addon">Rp</span>
		<input type="text" name="cou_value" value="'.$cou_value.'" class="form-control" placeholder="Value">
	</div>
</div>
<div class="form-group">
	<label>Start Date</label>
	<div class="input-group">
		<input type="text" name="cou_start" value="'.$cou_start.'" id="datepicker" data-date-format="yyyy-mm-dd" class="form-control" placeholder="Start Date">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	</div>
</div>
<div class="form-group">
	<label>Expiry Date</label>
	<div class="input-group">
		<input type="text" name="cou_expiry" value="'.$cou_expiry.'" id="datepicker2" data-date-format="yyyy-mm-dd" class="form-control" placeholder="Expiry Date">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	</div>
</div>
<div class="form-group">
    <label>Description</label>
	<textarea name="cou_desc" rows="3" class="form-control">'.$data['cou_desc'].'</textarea>
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
# Edit Promotions
#############################################
if($_GET['aksi']=="edit_coupon"){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Coupon</h3></div>
<div class="box-body">';

$id	= int_filter($_GET['id']);

if(isset($_POST['submit'])){

$cou_code	= text_filter($_POST['cou_code']);
$cou_value	= int_filter($_POST['cou_value']);
$cou_start	= $_POST['cou_start'];
$cou_expiry	= $_POST['cou_expiry'];
$cou_desc	= $_POST['cou_desc'];

$error = '';
if (!$cou_code)		$error .= "Please enter code coupon!<br />";
if (!$cou_value)	$error .= "Please enter value discount!<br />";
if (!$cou_start)	$error .= "Please enter start date!<br />";
if (!$cou_expiry)	$error .= "Please enter expired date!<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("UPDATE hotel_coupon SET cou_code='$cou_code',cou_value='$cou_value',cou_desc='$cou_desc',cou_start='$cou_start',cou_expiry='$cou_expiry' WHERE cou_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">Coupon updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=payment&modul=yes">';
}else{
$admin .= '<div class="alert alert-danger">Coupon failed update.</div>';
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$a = $koneksi_db->sql_query("SELECT * FROM hotel_coupon WHERE cou_id=$id");
$data = $koneksi_db->sql_fetchrow($a);	
$cou_code	= $data['cou_code'];
$cou_value	= $data['cou_value'];
$cou_start	= $data['cou_start'];
$cou_expiry	= $data['cou_expiry'];
$cou_desc	= $data['cou_desc'];

$admin .='<form method="post" action="" enctype ="multipart/form-data">
<div class="form-group">
	<label>Promotion Code</label>
	<input type="text" name="cou_code" value="'.$cou_code.'" class="form-control" placeholder="Promotion Code">
</div>
<div class="form-group">
	<label>Value</label>
	<div class="input-group">
		<span class="input-group-addon">Rp</span>
		<input type="text" name="cou_value" value="'.$cou_value.'" class="form-control" placeholder="Value">
	</div>
</div>
<div class="form-group">
	<label>Start Date</label>
	<div class="input-group">
		<input type="text" name="cou_start" value="'.$cou_start.'" id="datepicker" data-date-format="yyyy-mm-dd" class="form-control" placeholder="Start Date">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	</div>
</div>
<div class="form-group">
	<label>Expiry Date</label>
	<div class="input-group">
		<input type="text" name="cou_expiry" value="'.$cou_expiry.'" id="datepicker2" data-date-format="yyyy-mm-dd" class="form-control" placeholder="Expiry Date">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	</div>
</div>
<div class="form-group">
    <label>Description</label>
	<textarea name="cou_desc" rows="3" class="form-control">'.$data['cou_desc'].'</textarea>
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
# Hapus Promotions
#############################################
if($_GET['aksi']=="del_coupon"){
$id = int_filter($_GET['id']);
$koneksi_db->sql_query("DELETE FROM hotel_coupon WHERE cou_id='$id'");
$admin .= '<section class="content">';
$admin.='<div class="alert alert-success">Coupon deleted.</div>';
$admin .= '</section>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=payment&modul=yes">';
}

#############################################
# Rekening Hotel
#############################################
if($_GET['aksi']=="rekening"){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Tambah Rekening Pembayaran Baru</h3></div>
<div class="box-body">';

$admin .= '<div class="row">';
$admin .= '<div class="col-md-4">';
if (isset($_POST['submit'])) {

$rek_bank	= $_POST['rek_bank'];
$rek_number	= $_POST['rek_number'];
$rek_name	= addslashes($_POST['rek_name']);
$rek_cabang	= $_POST['rek_cabang'];

$total = $koneksi_db->sql_query("SELECT * FROM hotel_rekening WHERE rek_number='".$_POST['rek_number']."'");
$jumlah = $koneksi_db->sql_numrows($total);
$error = '';
if ($jumlah) 		$error .= "Nomor rekening sudah ada di dalam database.<br />";
if (!$rek_bank)		$error .= "Nama bank harus diisi.<br />";
if (!$rek_number)	$error .= "Nomor rekening harus diisi.<br />";
if (!$rek_name)		$error .= "Nama pemilik rekening harus diisi.<br />";

if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$hasil = $koneksi_db->sql_query("INSERT INTO hotel_rekening (rek_bank,rek_number,rek_name,rek_cabang) VALUES ('$rek_bank','$rek_number','$rek_name','$rek_cabang')");
if ($hasil) {
$admin .='<div class="alert alert-success">Rekening pembayaran berhasil di tambahkan.</div>';
$admin .='<meta http-equiv="refresh" content="1; url=?opsi=room&amp;modul=yes&amp;aksi=rekening">';
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$rek_bank	= !isset($rek_bank) 	? '' : $rek_bank;
$rek_number	= !isset($rek_number)	? '' : $rek_number;
$rek_name	= !isset($rek_name)		? '' : $rek_name;
$rek_cabang	= !isset($rek_cabang)	? '' : $rek_cabang;

$admin .='<form method="post" action="">
<div class="form-group">
	<label>Nama Bank</label>
	<input type="text" name="rek_bank" value="'.$rek_bank.'" class="form-control" placeholder="Nama Bank">
</div>
<div class="form-group">
	<label>Nomor Rekening</label>
	<input type="text" name="rek_number" value="'.$rek_number.'" class="form-control" placeholder="Nomor Rekening">
</div>
<div class="form-group">
	<label>Atas Nama</label>
	<input type="text" name="rek_name" value="'.$rek_name.'" class="form-control" placeholder="Atas Nama">
</div>
<div class="form-group">
	<label>Cabang, Kota</label>
	<input type="text" name="rek_cabang" value="'.$rek_cabang.'" class="form-control" placeholder="Cabang, Kota">
</div>
<div class="form-group">
	<label></label>
	<input type="submit" name="submit" value="Tambah Rekening Baru" class="btn btn-primary">
</div>
</form>';
$admin .= '</div>';

$admin .= '<div class="col-md-8">';
$total = $koneksi_db->sql_query("SELECT * FROM hotel_rekening");
$jumlah = $koneksi_db->sql_numrows( $total );
$limit = 5;

if (!isset ($_GET['offset'])) {
	$offset = 0;
}

$ada = new paging ($limit);
if ($jumlah<1){
$admin.='<div class="alert alert-danger">Tidak ada rekening pembayaran.</div>';
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_rekening ORDER BY rek_id ASC LIMIT $offset,$limit");

if($offset){
$no = $offset+1;
}else{
$no = 1;
}

$admin .= '<div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>Bank</th>
<th>Atas Nama</th>
<th>Actions</th>
</tr></thead><tbody>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {

$tot_ber = $koneksi_db->sql_query("SELECT * FROM post WHERE post_cat = $cat_id");
$jum_ber = $koneksi_db->sql_numrows($tot_ber);

$admin .='<tr>
<td>'.$no.'</td>
<td><a class="text-info" href="?opsi=room&amp;modul=yes&amp;id='.$data['rek_id'].'"><strong>'.$data['rek_bank'].'</strong></a><br>
No. Rek. '.$data['rek_number'].'<br>
'.$data['rek_cabang'].'</td>
<td>'.$data['rek_name'].'</td>
<td><a class="text-info" href="?opsi=room&amp;modul=yes&amp;aksi=edit_rekening&amp;id='.$data['rek_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=room&amp;modul=yes&amp;aksi=del_rekening&amp;kid='.$cat_id.'" onclick="return confirm(\'Are you sure?\')">Delete</a></td>
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
# Edit Rekening
#############################################
if($_GET['aksi']=="edit_rekening"){

$id = int_filter($_GET['id']);

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit Rekening</h3></div>
<div class="box-body">';

if (isset($_POST['submit'])) {

$rek_bank	= $_POST['rek_bank'];
$rek_number	= $_POST['rek_number'];
$rek_name	= addslashes($_POST['rek_name']);
$rek_cabang	= $_POST['rek_cabang'];

$total = $koneksi_db->sql_query("SELECT * FROM hotel_rekening WHERE rek_bank = '".$_POST['rek_bank']."' and rek_id != '".$id."'");
$jumlah = $koneksi_db->sql_numrows($total);
$error = '';
if ($jumlah) 		$error .= "Nomor rekening sudah ada di dalam database.<br />";
if (!$rek_bank)		$error .= "Nama bank harus diisi.<br />";
if (!$rek_number)	$error .= "Nomor rekening harus diisi.<br />";
if (!$rek_name)		$error .= "Nama pemilik rekening harus diisi.<br />";

if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$hasil = $koneksi_db->sql_query("UPDATE hotel_rekening SET rek_bank='$rek_bank',rek_number='$rek_number',rek_name='$rek_name',rek_cabang='$rek_cabang' WHERE rek_id='$id'");
if($hasil){
$admin .='<div class="alert alert-success">Rekening pembayaran berhasil diupdate.</div>';
$admin .='<meta http-equiv="refresh" content="1; url=?opsi=room&amp;modul=yes&amp;aksi=rekening">';
}else{
$admin .= '<div class="alert alert-danger">'.mysql_error().'</div>';
}
}
}

$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_rekening WHERE rek_id=$id");
$data = $koneksi_db->sql_fetchrow($hasil);

$admin .='<form method="post" action="">
<div class="form-group">
    <label>Nama Bank</label>
	<input type="text" name="rek_bank" value="'.$data['rek_bank'].'" class="form-control" placeholder="Nama Bank">
</div>
<div class="form-group">
	<label>Nomor Rekening</label>
	<input type="text" name="rek_number" value="'.$data['rek_number'].'" class="form-control" placeholder="Nomor Rekening">
</div>
<div class="form-group">
	<label>Atas Nama</label>
	<input type="text" name="rek_name" value="'.$data['rek_name'].'" class="form-control" placeholder="Atas Nama">
</div>
<div class="form-group">
	<label>Cabang, Kota</label>
	<input type="text" name="rek_cabang" value="'.$data['rek_cabang'].'" class="form-control" placeholder="Cabang, Kota">
</div>
<div class="box-footer">
	<input type="submit" name="submit" value="Update" class="btn btn-primary">
</div>
</form>';
$admin .= '</section>';
}

echo $admin;

?>