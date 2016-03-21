<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_admin')) {
	Header("Location: ../index.php");
	exit;
}

global $koneksi_db,$email_master,$judul_situs,$theme;

if (isset($_POST['submit'])) {
$theme  	= $_POST['theme'];
$hasil = $koneksi_db->sql_query( "UPDATE setting SET theme='$theme'WHERE id='1'" );
$admin.='<div class="border"><b>Theme telah di Ganti</b></div>';
}
// read isi readme 
$fileComment = "id-content/themes/$theme/$theme.txt"; 
$f = fopen($fileComment, "r"); 
$isi = fread($f, filesize($fileComment)); 
fclose($f); 
$readmetheme = $isi;
//-----------------

$admin ='<section class="content-header">
<h1>Themes<small>to manage themes</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Themes</li>
</ol></section>';

/*
$admin .='<div class="border">
<a href="?opsi=admin_themes"><b>Home</b></a> | 
<a href="?opsi=admin_themes&amp;aksi=add"><b>Upload Themes</b></a>
</div>';
*/
if ($_SESSION['LevelAkses'] &&  $_SESSION['LevelAkses']=="Administrator"){
#############################################
# List Themes
#############################################
if($_GET['aksi'] == ''){

$admin .= '<section class="content">';

$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">Current Theme</h3></div>
<div class="box-body">';

//$admin .= '<h4 class="bg">Current Theme</h4>';
$admin .='<div class="border">';
$admin .= '<img class="img-thumbnail pull-left" src="id-content/themes/'.$theme.'/'.$theme.'.jpg" width="180" style="margin-right:10px;">
<h4>'.$theme.'</h4>'.$readmetheme.'';
$admin .='</div>';
$admin .= '<h4 class="page-header">Available Themes</h4>';
$admin .= '<table  width="100%"><tr>';
$no =0;
$myDir = "id-content/themes/"; 
$dir = opendir($myDir);	
while($tmp = readdir($dir)){
	if($tmp != '..' && $tmp !='.' && $tmp !=''&& $tmp !='.htaccess'&& $tmp !='index.html'&& $tmp !='user'&& $tmp !='administrator'){
$urutan = $no + 1;
// read isi readme 
$fileComment = "id-content/themes/$tmp/$tmp.txt"; 
$f = fopen($fileComment, "r"); 
$isi = fread($f, filesize($fileComment)); 
fclose($f); 
$readmetmp = $isi;
//-----------------
$admin .= '<td valign="top">
<img class="img-thumbnail pull-left" src="id-content/themes/'.$tmp.'/'.$tmp.'.jpg" width="180" style="margin-right:10px;"><h4>'.$tmp.'</h4>'.$readmetmp.'';
$admin .='<form method="post" action="">
<input type="hidden" name="theme" value="'.$tmp.'">
<div class="box-footer">
<input type="submit" name="submit" value="Apply" class="btn btn-primary">
</div>
</form></td>';
if ($urutan  % 3 == 0) {
$admin .= '</tr></tr>';
}
$no++;
}
}
$admin .= '</table></div></div>';
$admin .= '</section>';
}

echo $admin;
}

?>