<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

//error_reporting(0);
error_reporting(E_ALL^E_NOTICE);

#############################################
# Konfigurasi Database
#############################################
define('CMS_FUNC', true);

$mysql_user 	= 'hotelrah_rahmat';
$mysql_password = 'Merdeka1945!';
$mysql_database = 'hotelrah_rahmat';
$mysql_host 	= 'localhost';

#############################################
# Konfigurasi Situs dan Admin
#############################################
$adminfile = 'main'; //silahkan di ganti dan jangan lupa merename file admin.php  sesuai dg yang anda ganti
$editor ='1';  //Jika menggunakan WYSIWYG isi 1 jika tidak 0
$name_blocker = '';
$mail_blocker = '';

$translateKal = array( 
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu',
	'Sun' => 'Minggu',
	'Jan' => 'Januari',
	'Feb' => 'Februari',
	'Mar' => 'Maret',
	'Apr' => 'April',
	'May' => 'Mei',
	'Jun' => 'Juni',
	'Jul' => 'Juli',
	'Aug' => 'Agustus',
	'Sep' => 'September',
	'Oct' => 'Oktober',
	'Nov' => 'Nopember',
	'Dec' => 'Desember');

if (file_exists('id-includes/fungsi.php')){
include 'id-includes/fungsi.php';
}

if (substr(phpversion(),0,3) >= 5.4) {
date_default_timezone_set('Asia/Jakarta');

$_basedir = $_SERVER["DOCUMENT_ROOT"].'/';
set_include_path(get_include_path() .
PATH_SEPARATOR . $_basedir.'id-content/modul/phpids' .
PATH_SEPARATOR . $_basedir.'id-content/modul/phpids/lib'
);

}
?>