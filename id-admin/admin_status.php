<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 08 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

global $koneksi_db, $url_situs;
/*
if (isset ($_POST['submit_login']) && $_POST['loguser'] == 1){
$login .= cms_login ();
}
*/
if (cek_login ()){

$username 	= $_SESSION['UserName'];
$levelakses = $_SESSION['LevelAkses'];

if ($levelakses=="Administrator"){
echo '<div class="navbar-custom-menu"><ul class="nav navbar-nav">';
$hasil = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
$data = $koneksi_db->sql_fetchrow($hasil);
$user_name = $data['user_name'];
$user_avatar = $data['user_avatar'];

echo '<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="'.$url_situs.'/id-content/modul/profile/images/'.$user_avatar.'" class="user-image" alt="'.$data['user_fullname'].'">
		<span class="hidden-xs">'.$data['user_fullname'].'</span>
	</a>
<ul class="dropdown-menu">
		<li class="user-header">
			<img src="'.$url_situs.'/id-content/modul/profile/images/'.$user_avatar.'" class="img-circle" alt="'.$data['user_fullname'].'">
				<p>'.$data['user_fullname'].'<small>Member since '.$data['user_start'].'</small></p>
		</li>
		<li class="user-footer">
			<div class="pull-left"><a href="?opsi=adm_settings&amp;aksi=profile" class="btn btn-default btn-flat">Profile</a></div>
			<div class="pull-right"><a href="?aksi=logout" class="btn btn-default btn-flat">Sign out</a></div>
		</li>
</ul>
	</li>';
}else{
echo '<div class="navbar-custom-menu"><ul class="nav navbar-nav">';
$hasil = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
$data = $koneksi_db->sql_fetchrow($hasil);
$nama = ($data['user_fullname'] == '') ? ''.$data['user_name'].'' : ''.$data['user_fullname'].'';
$avatara = ($data['user_avatar'] == '') ? '<img src="'.$url_situs.'/id-content/modul/profile/images/profile-default.jpg" class="user-image" alt="'.$nama.'">' : '<img src="'.$url_situs.'/id-content/modul/profile/images/'.$user_avatar.'" class="user-image" alt="'.$nama.'">';
$avatarb = ($data['user_avatar'] == '') ? '<img src="'.$url_situs.'/id-content/modul/profile/images/profile-default.jpg" class="img-circle" alt="'.$nama.'">' : '<img src="'.$url_situs.'/id-content/modul/profile/images/'.$user_avatar.'" class="img-circle" alt="'.$nama.'">';

echo '<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$avatara.'
		<span class="hidden-xs">'.$nama.'</span>
	</a>
<ul class="dropdown-menu">
		<li class="user-header">'.$avatarb.'
				<p>'.$data['user_fullname'].'<small>Member since '.$data['user_start'].'</small></p>
		</li>
		<li class="user-footer">
			<div class="pull-left"><a href="?opsi=profile&modul=yes" class="btn btn-default btn-flat">Profile</a></div>
			<div class="pull-right"><a href="index.php?aksi=logout" class="btn btn-default btn-flat">Sign out</a></div>
		</li>
</ul>
	</li>';
}
echo '</ul></div>';
}

?>