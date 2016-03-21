<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

class microTimer {
function start() {
	global $starttime;
	$mtime = microtime ();
	$mtime = explode (' ', $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$starttime = $mtime;
}

function stop() {
	global $starttime;
	$mtime = microtime ();
	$mtime = explode (' ', $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime;
	$totaltime = round (($endtime - $starttime), 5);
	return $totaltime;
}
}

$timer = new microTimer;
$timer->start();

include 'id-includes/session.php';
@header("Content-type: text/html; charset=utf-8;");
ob_start("ob_gzhandler");

define('CMS_MODULE', true);
define('CMS_CONTENT', true);
define('CMS_admin', true);
include 'id-includes/config.php';
include 'id-includes/mysql.php';
include 'id-includes/option.php';
include 'id-includes/template.php';
global $judul_situs,$theme;

$_GET['aksi'] = !isset($_GET['aksi']) ? null : $_GET['aksi'];
$cek = '';
if (!cek_login ()){
$cek ='<div class="alert alert-danger"><strong>Akses ditolak!</strong> Anda tidak mempunyai hak untuk akses halaman ini</div>';
header ("location:index.php");
exit;
}else{
if ($_SESSION['LevelAkses'] &&  $_SESSION['LevelAkses']=="Administrator"){
include "id-includes/security.php";

ob_start();
if(!isset($_GET['opsi'])){
include 'id-content/dashboard.php';
} else if (@$_GET['modul'] == 'yes'
&& file_exists('id-content/modul/'.$_GET['opsi'].'/admin/admin_'.$_GET['opsi'].'.php') 
&& !preg_match("/[\.\/]/",$_GET['opsi'])) {
include 'id-content/modul/'.$_GET['opsi'].'/admin/admin_'.$_GET['opsi'].'.php';	
} else if (!isset($_GET['modul']) 
&& file_exists('id-admin/manage/'.$_GET['opsi'].'.php') 
&& !preg_match("/[\.\/]/",$_GET['opsi'])) {
include 'id-admin/manage/'.$_GET['opsi'].'.php';	
}
else {
include 'id-content/dashboard.php';	
}

$content = ob_get_contents();
ob_end_clean();

if ($_GET['aksi'] == 'logout') {
logout ();
}
}

else if ($_SESSION['LevelAkses'] &&  $_SESSION['LevelAkses']=="User"){
	
include "id-includes/security.php";	

ob_start();
if(!isset($_GET['opsi'])){
include 'id-content/dashboard.php';
}else if (@$_GET['modul'] == 'yes' 
&& file_exists('id-content/modul/'.$_GET['opsi'].'/user/user_'.$_GET['opsi'].'.php') 
&& !preg_match("/[\.\/]/",$_GET['opsi'])){
include 'id-content/modul/'.$_GET['opsi'].'/user/user_'.$_GET['opsi'].'.php';	
}else {
include 'id-content/dashboard.php';	
}
$content = ob_get_contents();
ob_end_clean();
}else{
$cek.='<div class="alert alert-danger"><strong>Akses ditolak!</strong> Anda tidak mempunyai hak untuk akses halaman ini</div>';
}
}

#############################################
# Left Side
#############################################
ob_start();
include "id-content/menuadmin.php";
echo "<!-- modul //-->";
//modul(0);
echo "<!-- blok kiri //-->";
//blok(0);
echo "<!-- akhir blok //-->";
$leftside = ob_get_contents();
ob_end_clean(); 

#############################################
# Right Side
#############################################
if (!isset($index_hal)){
ob_start();
echo "<!-- modul -->";
//modul(1);
echo "<!-- blok kanan -->";
//blok(1);
$rightside = ob_get_contents();
ob_end_clean(); 
} else {
$style_include[] = '
<style type="text/css">
/*<![CDATA[*/
#main {
float: left;
margin-left: 0;
padding: 0;
width:72%;
}
/*]]>*/
</style>';	
}

#############################################
# Cek Login
#############################################
ob_start();
include "id-admin/admin_status.php";
$admin_status = ob_get_contents();
ob_end_clean();

#############################################
# Menu Admin
#############################################
ob_start();
include "id-content/menuadmin.php";
$menuadmin = ob_get_contents();
ob_end_clean();

echo $cek;
$style_include_out 	= !isset($style_include) ? '' : implode("",$style_include);
$script_include_out = !isset($script_include) ? '' : implode("",$script_include);
$rightside 			= !isset($rightside) ? '' : $rightside;
$leftside 			= !isset($leftside) ? '' : $leftside;
$admin_status		= !isset($admin_status) ? '' : $admin_status;
$menuadmin 			= !isset($menuadmin) ? '' : $menuadmin;
$skin_style			= !isset($skin_style) ? '' : $skin_style;

$define = array (
	'skin_style'		=> $skin_style,
	'menuadmin'    		=> $menuadmin,
	'leftside'    		=> $leftside,
	'admin_status'		=> $admin_status,
	'url'     			=> $url_situs,
	'content'     		=> $content,
	'rightside'  		=> $rightside,
	'judul_situs' 		=> $judul_situs,
	'style_include' 	=> $style_include_out,
	'script_include' 	=> $script_include_out,
	'meta_description' 	=> $_META['description'],
	'meta_keywords' 	=> $_META['keywords'],
	'timer' 			=> $timer->stop()
);

$tpl = new template ('id-admin/themes/administrator/administrator.html');
$tpl-> define_tag($define);

$tpl-> cetak();
//cek_license ();
?>