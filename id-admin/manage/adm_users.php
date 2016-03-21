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
	
global $koneksi_db,$url_situs;
	
$admin ='<section class="content-header">
<h1>Users<small>to manage users</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Users</li>
</ol></section>';

$tot_users = $koneksi_db->sql_query("SELECT * FROM users");
$jum_users = $koneksi_db->sql_numrows($tot_users);

$admin .= '<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=adm_users"><i class="fa fa-fw fa-list"></i> Users <span class="badge bg-green">'.$jum_users.'</span></a>
<a class="btn btn-default btn-flat" href="?opsi=adm_users&amp;aksi=add_user"><i class="fa fa-fw fa-plus"></i> User</a>
</section>';

#############################################
# List Users
#############################################
if ($_GET['aksi'] == ''){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">All Users</h3></div>
<div class="box-body">';

$admin .= '<form method="get" action="main.php"><div class="input-group">
<input type="text" name="cari" class="form-control" placeholder="Search Username / Email">
<span class="input-group-btn">
	<input type="hidden" name="opsi" value="adm_users">
	<button class="btn btn-default" type="submit" name="submit" value="Search">Search</button>
</span>
</div></form>';

if (isset($_POST['submit'])){

$tot     .= $_POST['tot'];
$pcheck ='';
for($i=1;$i<=$tot;$i++){
$check = $_POST['check'.$i] ;
if($check <> "") {
$pcheck .= $check . ",";
}
}
$pcheck = substr_replace($pcheck, "", -1, 1);
$error = '';
if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}
if ($pcheck)  $sukses .= "<strong>Berhasil!</strong> User dengan UserId <strong>$pcheck</strong> telah dihapus !<br />";
$koneksi_db->sql_query("DELETE FROM users WHERE user_id in($pcheck)");
if ($sukses){
$admin.='<div class="alert alert-success">'.$sukses.'</div>';
}
}

$cari = $_GET['cari'];

$admin.='<form method="post" action=""><div class="table-responsive"><table class="table table-striped table-hover">
<thead><tr>
<th>No</th>
<th>#</th>
<th>Username</th>
<th>Full Name</th>
<th>Email</th>
<th>Role</th>
<th>Status</th>
<th>Actions</th>
</tr></thead><tbody>';

$offset = int_filter($_GET['offset']);
$pg		= int_filter($_GET['pg']);
$stg	= int_filter($_GET['stg']);
if($cari){
$hasil = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name like '%$cari%' or user_email like '%$cari%'");
}else{
$hasil = $koneksi_db->sql_query("SELECT * FROM users");
}
$jumlah = $koneksi_db->sql_numrows($hasil);

$limit = 25;
$a = new paging ($limit);
if ($jumlah > 0){
if($cari){
$query = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name like '%$cari%' or user_email like '%$cari%' LIMIT $offset,$limit");
}else{
$query = $koneksi_db->sql_query("SELECT * FROM users LIMIT $offset,$limit");
}
if($offset){
$no = $offset+1;
}else{
$no = 1;
}
while ($data = $koneksi_db->sql_fetchrow($query)){
if($data['user_type']=='Active'){
$status = '<a class="text-success" href="?opsi=adm_users&amp;aksi=status&amp;pub=inactive&amp;id='.$data['user_id'].'">'.$data['user_type'].'</a>';
}else{
$status = '<a class="text-danger" href="?opsi=adm_users&amp;aksi=status&amp;pub=active&amp;id='.$data['user_id'].'">'.$data['user_type'].'</a>';
}

$admin.='<tr>
<td>'.$no.'</td>
<td><input type=checkbox name=check'.$no.' value='.$data[0].'></td>
<td>'.$data['user_name'].'</td>
<td>'.$data['user_fullname'].'</td>
<td>'.$data['user_email'].'</td>
<td>'.$data['user_level'].'</td>
<td>'.$status.'</td>
<td><a class="text-info" href="?opsi=adm_users&amp;aksi=edit_user&amp;id='.$data['user_id'].'">Edit</a> - 
<a class="text-danger" href="?opsi=adm_users&amp;aksi=del_user&amp;id='.$data['user_id'].'" onclick="return confirm(\'Apakah Anda ingin menghapus User '.$data['user'].' ?\')">Delete</a> - 
<a class="text-warning" href="?opsi=adm_users&amp;aksi=reset_password&amp;id='.$data['user_id'].'">Reset Password</a></td>
</tr>';  
$no++;
}
$admin .='<tr><td colspan="8"></td></tr>';
}
$admin .= '</tbody></table></div>';
$admin .='</div>
<div class="box-footer">
<input type="hidden" name="tot" value="'.$jumlah.'"><input type="submit" value="Delete" name="submit" class="btn btn-danger">
</div></form>';

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
$admin .= '</section>';
}

#############################################
# Tambah Users
#############################################
if ($_GET['aksi'] == 'add_user'){

$admin .= '<section class="content">';

if (isset($_POST['submit'])){
	
$user_name 		= cleantext($_POST['user_name']);	
$user_level		= cleantext($_POST['user_level']);	
$user_type 		= cleantext($_POST['user_type']);
$user_password 	= cleantext($_POST['user_password']);
$user_email		= cleantext($_POST['user_email']);

if (!$user_name || preg_match("/[^a-zA-Z0-9_-]/", $user_name)) $error .= "Karakter Username tidak diizinkan kecuali a-z,A-Z,0-9,-, dan _<br />";
if (strlen($user_name) > 10) $error .= "Username terlalu panjang maks. 10 karakter<br />";
if (strrpos($user_name, " ") > 0) $error .= "Username tidak boleh menggunakan spasi";
if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_name FROM users WHERE user_name='$user_name'")) > 0) $error .= "Username ".$user_name." sudah terdaftar, silahkan ulangi.<br />";
if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_email FROM users WHERE user_email='$user_email'")) > 0) $error .= "Email ".$user_email." sudah terdaftar, silahkan ulangi.<br />";
if (!is_valid_email($user_email)) $error .= "Error: E-Mail address invalid!<br />";

if ($error){
$admin.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$hasil = $koneksi_db->sql_query ("INSERT INTO users (user_name,user_password,user_level,user_type,user_email) VALUES ('$user_name',sha1(md5('$user_password')),'$user_level','$user_type','$user_email')");	
$admin .= '<div class="alert alert-success"><strong>Berhasil!</strong> User berhasil ditambah</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_users">';
}
}	

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Add New User</h3></div>
<div class="box-body">';
$admin .= '<form class="form-horizontal" method="post" action="">
<div class="form-group">
    <label class="col-sm-2 control-label">Username <i>(required)</i></label>
    <div class="col-sm-10"><input type="text" name="user_name" class="form-control" placeholder="Enter username" required></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email <i>(required)</i></label>
    <div class="col-sm-10"><input type="user_email" name="user_email" class="form-control" placeholder="Enter email" required></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Password <i>(required)</i></label>
    <div class="col-sm-10"><input type="text" name="user_password" class="form-control" placeholder="Masukkan password" required></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Role</label>
    <div class="col-sm-10">'.enumDropdown(users, user_level, $echo = false).'</div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">'.enumDropdown(users, user_type, $echo = false).'</div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
    <div class="col-sm-10"><input type="submit" name="submit" value="Add New User" class="btn btn-primary"></div>
</div></form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Edit Users
#############################################
if ($_GET['aksi'] == 'edit_user'){

$admin .= '<section class="content">';
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Edit User</h3></div>
<div class="box-body">';

$id = int_filter($_GET['id']);

if(isset($_POST['submit'])){

$user_name		= cleantext($_POST['user_name']);	
$user_level		= cleantext($_POST['user_level']);	
$user_type		= cleantext($_POST['user_type']);
$user_email		= cleantext($_POST['user_email']);
$user_fullname	= addslashes($_POST['user_fullname']);
$user_hp		= $_POST['user_hp'];
$user_bio		= addslashes($_POST['user_bio']);

$error = '';
if (!$user_name || preg_match("/[^a-zA-Z0-9_-]/", $user_name)) $error .= "Karakter Username tidak diizinkan kecuali a-z,A-Z,0-9,-, dan _<br />";
if (strlen($user_name) > 10) $error .= "Username terlalu panjang maks. 10 karakter<br />";
if (strrpos($user_name, " ") > 0) 	$error .= "Username tidak boleh menggunakan spasi";
if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_name FROM users WHERE user_name='$user_name' and user_id!='$id'")) > 0) $error .= "Username <strong>".$user_name."</strong> already registered.<br />";
if ($koneksi_db->sql_numrows($koneksi_db->sql_query("SELECT user_email FROM users WHERE user_email='$user_email' and user_id!='$id'")) > 0) $error .= "Email <strong>".$user_email."</strong> already registered.<br />";

if ($error){
$admin .= '<div class="alert alert-danger">'.$error.'</div>';
}else {
$hasil = $koneksi_db->sql_query("UPDATE users SET user_name='$user_name',user_email='$user_email',user_level='$user_level',user_type='$user_type',user_fullname='$user_fullname',user_hp='$user_hp',user_bio='$user_bio' WHERE user_id='$id'");
if($hasil){
$admin .= '<div class="alert alert-success">User updated.</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_users">';
}
}
}

$s = $koneksi_db->sql_query("SELECT * FROM users WHERE user_id='$id'");	
$data = $koneksi_db->sql_fetchrow($s);
$user_name		= $data['user_name'];
$user_email		= $data['user_email'];	
$user_level		= $data['user_level'];	
$user_type		= $data['user_type'];
$user_fullname	= $data['user_fullname'];
$user_hp 		= $data['user_hp'];
$user_bio		= $data['user_bio'];

if (isset ($_GET['offset']) && isset ($_GET['pg']) && isset ($_GET['stg'])) {
$qss = "&amp;pg=$pg&amp;stg=$stg&amp;offset=$offset";
}	

$admin .= '<form class="form-horizontal" method="post" action="">
<div class="form-group">
    <label class="col-sm-2 control-label">Username <i>(required)</i></label>
    <div class="col-sm-10"><input type="text" name="user_name" value="'.$user_name.'" class="form-control" placeholder="Enter username" required></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email <i>(required)</i></label>
    <div class="col-sm-10"><input type="email" name="user_email" value="'.$user_email.'" class="form-control" placeholder="Enter email" required></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Role</label>
    <div class="col-sm-10">'.enumDropdown(users, user_level, $user_level, $echo = false).'</div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">'.enumDropdown(users, user_type, $user_type, $echo = false).'</div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10"><input type="text" name="user_fullname" value="'.$user_fullname.'" class="form-control" placeholder="Enter full name"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Handphone</label>
    <div class="col-sm-10"><input type="text" name="user_hp" value="'.$user_hp.'" class="form-control" placeholder="Enter handphone"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Biographical Info</label>
    <div class="col-sm-10"><textarea name="user_bio" id="CKEditor" rows="5" class="form-control">'.$data['user_bio'].'</textarea></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
    <div class="col-sm-10"><input type="submit" value="Update User" name="submit" class="btn btn-primary"></div>
</div>
</table></form>';
$admin .= '</div></div>';
$admin .= '</section>';
}

#############################################
# Hapus User
#############################################
if($_GET['aksi']=="del_user"){

$admin .= '<section class="content">';

$id = int_filter($_GET['id']);

$hasil = $koneksi_db->sql_query("SELECT * FROM users WHERE user_id=$id");
while($data = $koneksi_db->sql_fetchrow($hasil)){
$folder_gambar = 'id-content/modul/profile/images/';
$user_avatar =  $data['user_avatar'];
$uploaddir = $folder_gambar . $user_avatar;
if($user_avatar !==''){
unlink($uploaddir);
}
}

$koneksi_db->sql_query("DELETE FROM users WHERE user_id='$id'");
$admin.='<div class="alert alert-success"><strong>Berhasil!</strong> User telah dihapus</div>';
$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_users">';
$admin .= '</section>';
}

#############################################
# Reset Password
#############################################
if ($_GET['aksi'] == 'reset_password'){

$admin .= '<section class="content">';

$id 			= int_filter($_GET['id']);
$newpass 		= genpass();
$newpassword	= sha1(md5($newpass));

$hasil = $koneksi_db->sql_query("UPDATE users SET user_password='$newpassword' WHERE user_id='$id'");
if($hasil){
//$admin .= '<div class="alert alert-success">Password successfully reset.</div>';

# Kirim Email
$u = $koneksi_db->sql_query("SELECT * FROM users WHERE user_id='$id'");	
$datau = $koneksi_db->sql_fetchrow($u);
$user_email 	= $datau['user_email'];	
$user_fullname 	= $datau['user_fullname'];

$subject = 'Reset Password - '.$judul_situs.'';
$message ='Anda telah melakukan permintaan reset password akun di <a href="'.$url_situs.'">'.$url_situs.'</a><br>
Berikut ini informasi akun Anda :<br><br>
Username : '.$datau['user_name'].'<br>
Password : '.$newpass.'<br><br>
Semoga informasi ini bermanfaat bagi Anda.';

if(select_option(mail_type)=='SMTP'){
//smtp_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message);
smtp_mail($user_email, $user_fullname, select_option(smtp_username), select_option(from_name), $email_master, select_option(from_name), $subject, $message);
}else{
//php_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message);
php_mail($user_email, $user_fullname, $email_master, select_option(from_name), $email_master, select_option(from_name), $subject, $message);
}

$style_include[] ='<meta http-equiv="refresh" content="1; url=?opsi=adm_users">';
}
$admin .= '</section>';
}

##########################
# Status User
##########################
if ($_GET['aksi'] == 'status'){
if ($_GET['pub'] == 'inactive'){
	$id = int_filter ($_GET['id']);
	$koneksi_db->sql_query ("UPDATE users SET tipe='Inactive' WHERE UserId='$id'");
	header ("location:?opsi=adm_users");
}	
	
if ($_GET['pub'] == 'active'){
	$id = int_filter ($_GET['id']);
	$koneksi_db->sql_query ("UPDATE users SET tipe='Active' WHERE UserId='$id'");
	header ("location:?opsi=adm_users");
}
}

echo $admin;

?>
