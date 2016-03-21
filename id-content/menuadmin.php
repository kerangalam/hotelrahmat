<?php

#############################################
# Teamworks Content Management System v2.0
# http://www.teamworks.co.id
# 01 Maret 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_CONTENT')) {
	Header("Location: ../index.php");
	exit;
}

global $koneksi_db;

$username = $_SESSION["UserName"];
$u = $koneksi_db->sql_query( "SELECT * FROM users WHERE user_name='$username'");
$datau = $koneksi_db->sql_fetchrow($u);
$nama = ($datau['user_fullname'] == '') ? ''.$datau['user_name'].'' : ''.$datau['user_fullname'].'';
$avatar = ($datau['user_avatar'] == '') ? 
'<img class="img-circle" src="id-content/modul/profile/images/profile-default.jpg" alt="'.$datau['user_fullname'].'">' : 
'<img class="img-circle" src="id-content/modul/profile/images/'.$datau['user_avatar'].'" alt="'.$datau['user_fullname'].'">';

if ($_SESSION['UserName'] && isset ($_SESSION['UserName']) && !empty ($_SESSION['UserName'])  ){

#############################################
# Administrator
#############################################
if ($_SESSION['LevelAkses'] &&  $_SESSION['LevelAkses']=="Administrator"){
echo '<div class="user-panel">
<div class="pull-left image">'.$avatar.'</div>
<div class="pull-left info">
	<p>'.$nama.'</p>
	<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>';
$m = $koneksi_db->sql_query("SELECT * FROM menu_admin WHERE ma_parent=0 ORDER BY ma_ordering ASC");
echo '<ul class="sidebar-menu">';
echo '<li class="header">MAIN NAVIGATION</li>';
while ($datam = $koneksi_db->sql_fetchrow($m)) {
$ma_id = $datam['ma_id'];

echo '<li class="treeview">
<a href="#">'.$datam['ma_icon'].' <span>'.$datam['ma_name'].'</span>
<i class="fa fa-angle-left pull-right"></i></a>';

$s = $koneksi_db->sql_query("SELECT * FROM menu_admin WHERE ma_parent=$ma_id ORDER BY ma_name ASC");
echo '<ul class="treeview-menu">';
while ($datas = $koneksi_db->sql_fetchrow($s)) {
$ma_modul = $datas['ma_modul'] == 1 ? '&amp;modul=yes' : '';
$ma_url = $datas['ma_modul'] == 1 ? $adminfile.".php?opsi=".$datas['ma_url'].$ma_modul : $adminfile.'.php?opsi='.basename($datas['ma_url'],'.php');

echo '<li><a href="'.$ma_url.'"><i class="fa fa-circle-o"></i> '.$datas['ma_name'].'</a></li>';	

}
echo '</ul>';
}
echo '</li></ul>';
}

#############################################
# User
#############################################
if ($_SESSION['LevelAkses'] &&  $_SESSION['LevelAkses']=="User"){

echo '<div class="user-panel">
<div class="pull-left image">'.$avatar.'</div>
<div class="pull-left info">
	<p>'.$nama.'</p>
	<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>';

$hasil = $koneksi_db->sql_query("SELECT * FROM menu_users ORDER BY mu_ordering ASC");
echo '<ul class="sidebar-menu">';
echo '<li class="header">MAIN NAVIGATION</li>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
echo '<li><a href="'.$data['mu_url'].'">'.$data['mu_name'].'</a></li>';
}
echo '</ul>';

}
}

?>