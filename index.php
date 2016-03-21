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

include 'id-includes/session.php';
@header("Content-type: text/html; charset=utf-8;");
ob_start("ob_gzhandler");
//session_register ('mod_ajax');
$_SESSION['mod_ajax'] = true;

$timer = new microTimer;
$timer->start();

define('CMS_MODULE', true);
define('CMS_CONTENT', true);
include "id-includes/config.php";
include "id-includes/mysql.php";
include "id-includes/option.php";
include "id-includes/template.php";
//include "includes/excelreader2.php";
global $judul_situs,$theme;
cek_situs();
$_GET['aksi'] 	= !isset($_GET['aksi']) ? null : $_GET['aksi'];
$_GET['modul'] 	= !isset($_GET['modul']) ? null : $_GET['modul'];
$_GET['opsi'] 	= !isset($_GET['opsi']) ? null : $_GET['opsi'];
$_GET['act'] 	= !isset($_GET['act']) ? null : $_GET['act'];

if (isset($stats) != 'okdech'){
include 'id-includes/statistik.inc.php';
stats();
setcookie('stats', 'okdech', time()+ 3600);	
}

$old_modules = !isset($old_modules) ? null : $old_modules;

ob_start();

$script_include[] = '';

switch($_GET['modul']) {
	
case 'yes':
if (file_exists('id-content/modul/'.$_GET['opsi'].'/'.$_GET['opsi'].'.php') 
&& !isset($_GET['act']) 
&& !preg_match('/\.\./',$_GET['opsi'])) {
include 'id-content/modul/'.$_GET['opsi'].'/'.$_GET['opsi'].'.php';
} 	else if (file_exists('id-content/modul/'.$_GET['opsi'].'/act_'.$_GET['act'].'.php') 
&& !preg_match('/\.\./',$_GET['opsi'])
&& !preg_match('/\.\./',$_GET['act'])
) 
{
include 'id-content/modul/'.$_GET['opsi'].'/act_'.$_GET['act'].'.php';
} else {
header("location:index.php");
exit;
} 
break;	
	
default:
if (!isset($_GET['opsi'])) {
//include 'content/normal.php';
include 'id-content/themes/'.$theme.'/normal.php';
} else if (file_exists('id-content/'.$_GET['opsi'].'.php') && !preg_match("/\.\./",$_GET['opsi'])){
include 'id-content/'.$_GET['opsi'].'.php';	
} else {
header("location:index.php");
exit;		
}
break;	
}

$content = ob_get_contents();
ob_end_clean();

#############################################
# Left Side
#############################################
ob_start();
# Modul Kiri
modul(0);
# Blok Kiri
//blok(0);
$leftside = ob_get_contents();
ob_end_clean(); 

#############################################
# Right Menu
#############################################
if (!isset($index_hal)){
ob_start();
# Modul Kanan
modul(1);
# Blok Kanan
//blok(1);
$rightside = ob_get_contents();
ob_end_clean(); 
} else {
$style_include[] = '
<style type="text/css">
/*<![CDATA[*/
#main {
float: right;
margin-right: 10px;
padding: 0;
width: 750px;
}
/*]]>*/
</style>
';	
}

if ($_GET['aksi'] == 'logout') {
logout ();
}

#############################################
# Main Menu
#############################################
ob_start();
include "id-content/mainmenu.php";
$mainmenu = ob_get_contents();
ob_end_clean(); 

#############################################
# Slider
#############################################
if (!isset($index_hal)){
ob_start();
include "id-content/modul/slider/slider.php";
$slider = ob_get_contents();
ob_end_clean(); 
}

#############################################
# Booking
#############################################
if (!isset($index_hal)){
ob_start();
include "id-content/book.php";
$book = ob_get_contents();
ob_end_clean(); 
}

#############################################
# Cek Login
#############################################
ob_start();
include "id-content/ceklogin.php";
$ceklogin = ob_get_contents();
ob_end_clean(); 

#############################################
# Gallery
#############################################
if (!isset($index_hal)){
ob_start();
include "id-content/our-gallery.php";
$gallery = ob_get_contents();
ob_end_clean(); 
}

$style_include_out 	= !isset($style_include) 	? '' : implode("",$style_include);
$script_include_out = !isset($script_include) 	? '' : implode("",$script_include);
$rightside 			= !isset($rightside) 		? '' : $rightside;
$leftside 			= !isset($leftside) 		? '' : $leftside;
$ceklogin 			= !isset($ceklogin) 		? '' : $ceklogin;
$mainmenu 			= !isset($mainmenu) 		? '' : $mainmenu;
$slider 			= !isset($slider) 			? '' : $slider;
$book 				= !isset($book) 			? '' : $book;
$gallery			= !isset($gallery) 			? '' : $gallery;

$define = array (
	'gallery'			=> $gallery,
	'book'    			=> $book,
	'slider'    		=> $slider,
	'mainmenu'    		=> $mainmenu,
	'ceklogin'    		=> $ceklogin,
	'leftside'    		=> $leftside,
	'url'     			=> $url_situs,
	'content'     		=> $content,
	'rightside'  		=> $rightside,
	'judul_situs' 		=> $judul_situs,
	'slogan' 			=> $slogan,
	'style_include'		=> $style_include_out,
	'script_include' 	=> $script_include_out,
	'description' 		=> $description,
	'keywords' 			=> $keywords,
	'author' 			=> $author,
	'timer' 			=> $timer->stop()
);

$tpl = new template ('id-content/themes/'.$theme.'/'.$theme.'.html');
$tpl-> define_tag($define);

$tpl-> cetak();
//xxxxxxxxxxxxxxxx
?>