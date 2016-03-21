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

if (!cek_login ()){
	Header("Location: index.php");
	exit;
}else{

$admin ='<section class="content-header">
<h1>Libraries<small>to manage media libraries</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Libraries</li>
</ol></section>';

$admin .='<section class="content-header">
<a class="btn btn-default btn-flat" href="?opsi=adm_libraries"><i class="fa fa-fw fa-list"></i> Libraries</a>
</section>';

if ($_SESSION['LevelAkses'] &&  $_SESSION['LevelAkses']=="Administrator"){
#############################################
# List Files
#############################################
if($_GET['aksi'] == ''){

$admin .= '<section class="content">';
$admin .='<div class="callout callout-info">
<h4>Catatan:</h4>
<p>Gunakan url seperti dibawah ini untuk menyisipkan image di artikel atau halaman web : <br />
<b>"files/nama_file.extension"</b><br /><b>contoh :</b> &lt;img src="id-content/upload/files/teamworks.jpg" alt="" border="0"&gt;</p></div>';

$admin .= '<div class="table-responsive">';
$admin .= '<iframe src="id-content/kcfinder/browse.php?type=files" width="100%" height="400px" style="border:solid 0px #ccc; -moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px; padding:3px 0px; background:#e9e9e9 ;margin: 10px 0;"></iframe>';
$admin .= '</div>';
$admin .= '</section>';
}

#############################################
# Upload Files
#############################################
if ($_GET['aksi']=='upload_files'){

$admin .='<h4 class="page-header">Upload Files</h4>';

global $max_size,$allowed_exts,$allowed_mime;

if (isset($_POST['submit'])) {
    $image_name1=$_FILES['image1']['name'];
    $image_size1=$_FILES['image1']['size'];
    $image_name2=$_FILES['image2']['name'];
    $image_size2=$_FILES['image2']['size'];
    $image_name3=$_FILES['image3']['name'];
    $image_size3=$_FILES['image3']['size'];
    $image_name4=$_FILES['image4']['name'];
    $image_size4=$_FILES['image4']['size'];
    $image_name5=$_FILES['image5']['name'];
    $image_size5=$_FILES['image5']['size'];
	$error = '';
    if ($image_name1){
		@copy($_FILES['image1']['tmp_name'], "id-content/files/".$image_name1);
        //unlink($image);
        $admin.='<div class="alert alert-success">Upload file '.$image_name1.' berhasil!</div>';  
	}
	if ($image_name2){
		@copy($_FILES['image2']['tmp_name'], "id-content/files/".$image_name2);
        //unlink($image);
        $admin.='<div class="alert alert-success">Upload file '.$image_name2.' berhasil!</div>';  
	}
	if ($image_name3){
		@copy($_FILES['image3']['tmp_name'], "id-content/files/".$image_name3);
        //unlink($image);
        $admin.='<div class="alert alert-success">Upload file '.$image_name3.' berhasil!</div>';  
	}
	if ($image_name4){
		@copy($_FILES['image4']['tmp_name'], "id-content/files/".$image_name4);
        //unlink($image);
        $admin.='<div class="alert alert-success">Upload file '.$image_name4.' berhasil!</div>';  
	}
	if ($image_name5){
		@copy($_FILES['image5']['tmp_name'], "id-content/files/".$image_name5);
        //unlink($image);
        $admin.='<div class="alert alert-success">Upload file '.$image_name5.' berhasil!</div>';  
	}
	 $style_include[] ='<meta http-equiv="refresh" content="3; url=?opsi=files">';

}
$admin .='<form class="form-horizontal" method="post" enctype="multipart/form-data" action="">
<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<div class="form-group">
	<label class="col-sm-2 control-label">File 1</label>
	<div class="col-sm-10"><input type="file" name="image1"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">File 2</label>
	<div class="col-sm-10"><input type="file" name="image2"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">File 3</label>
	<div class="col-sm-10"><input type="file" name="image3"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">File 4</label>
	<div class="col-sm-10"><input type="file" name="image4"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">File 5</label>
	<div class="col-sm-10"><input type="file" name="image5"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label"></label>
	<div class="col-sm-10"><input type="submit" name="submit" value="Upload" class="btn btn-success"></div>
</div>
</form>';
}

#############################################
# Hapus Halaman
#############################################
if ($_GET['aksi']=='hapus'){
    $nama = $_GET['nama'];
	if ($nama){
	unlink ("id-content/files/".$nama);
    }
    $admin.='<div class="alert alert-success">File <b>'.$nama.'</b> telah dihapus</div>';
    $style_include[] ='<meta http-equiv="refresh" content="3; url=?opsi=files">';
}

}else{
	Header("Location: index.php");
	exit;
}

echo $admin;

}

?>