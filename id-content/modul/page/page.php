<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_CONTENT')) {
	Header("Location: ../index.php");
	exit;
}

$index_hal=1;

global $koneksi_db, $url_situs;

#############################################
# View Pages
#############################################
if($_GET['aksi']=="detail"){
//$id = int_filter($_GET['id']);
$slug = $_GET['slug'];
$hasil = $koneksi_db->sql_query("SELECT * FROM page WHERE page_slug='$slug'");
$data = $koneksi_db->sql_fetchrow($hasil) ;
$page_title = $data['page_title'];
if (empty ($page_title)){
$tengah .='<div class="alert alert-danger">
<center>Access Denied<br /><br />Regard<br /><br />Teamworks Indonesia<br />webmaster@teamworks.co.id</center></div>';
}else {
//title 
$judul_situs = ''.$page_title.' | '.$judul_situs.'';

$tengah .='<div class="reservation_banner">
		<div class="main_title">'.$page_title.'</div>
		<div class="divider"></div>
	 </div>';
$tengah .= '<div class="main"> 
<div class="reservation_top">
	<div class="container">          	 
		<div class="about">
			<h2>'.$page_title.'</h2>
			<p>'.$data['page_content'].'</p>
		</div>
	</div>
</div>';
}
}

echo $tengah;

?>