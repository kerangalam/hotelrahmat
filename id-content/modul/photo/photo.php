<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_MODULE')) {
    Header("Location: ../../index.php");
    exit;
}

$index_hal=1;

global $maxdata,$maxgalleri,$maxgalleridata;

if (isset ($_GET['pg'])) $pg = int_filter ($_GET['pg']); else $pg = 0;
if (isset ($_GET['stg'])) $stg = int_filter ($_GET['stg']); else $stg = 0;
if (isset ($_GET['offset'])) $offset = int_filter ($_GET['offset']); else $offset = 0;

#############################################
# List Foto
#############################################
if($_GET['aksi'] ==''){

//title 
$judul_situs = 'Galeri Foto | '.$judul_situs.'';

$tengah .='<div class="reservation_banner">
	<div class="main_title">Galeri Foto</div>
	<div class="divider"></div>
</div>';

$tengah .='<div class="main"> 
<div class="reservation_top">
<div class="container">';

$hitungjumlah = $koneksi_db->sql_query("SELECT * FROM photo");
$jumlah = $koneksi_db->sql_numrows($hitungjumlah);
$limit	= 8;

$ada = new paging_s ($limit,'photo-page');
$no = 0;
$s = $koneksi_db->sql_query("SELECT * FROM photo ORDER BY photo_id DESC LIMIT $offset, $limit");
$tengah .='<div class="row room_grids text-center">';
while($data = $koneksi_db->sql_fetchrow($s)){
$urutan 	= $no + 1;
$photo_name	= $data['photo_name'];
$gambar = '<img class="img-responsive" src="'.$url_situs.'/id-content/modul/photo/images/thumb/'.$data['photo_image'].'" alt="'.$photo_name.'">';


$tengah .= '
<div class="col-md-3 col-xs-6">
	<div class="view view-tenth">
		<a href="single.html">
			<div class="inner_content clearfix">
				<div class="product_image">
					<img class="img-responsive" src="'.$url_situs.'/id-content/modul/photo/images/thumb/'.$data['photo_image'].'" alt="'.$photo_name.'">
					
					<div class="mask">
						<h2>'.$data['photo_name'].'</h2>
						<h3>'.$data['photo_desc'].'</h3>
						<div class="info"><i class="fa fa-search-plus"></i></div>
					</div>
					
				</div>
			</div>
		</a>
	</div>
	
</div>';

if ($urutan  % 4 == 0) {
$tengah .= '</div><div class="row">';
}
$no++;
}

$tengah .='</div>';
$tengah .='</div></div></div>';

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
$tengah .='<center>';
$tengah .= $ada-> getPaging($jumlah, $pg, $stg);
$tengah .='</center>';
}

}

#############################################
# Kategori Foto
#############################################
if($_GET['aksi'] =='kategori'){

$kid = int_filter($_GET['kid']);

$hasil = $koneksi_db->sql_query("SELECT * FROM photo_cat WHERE cat_kid='$kid'");
$data = $koneksi_db->sql_fetchrow($hasil);
$cat_name = $data['cat_name'];

//title 
$judul_situs = ''.$cat_name.' | '.$judul_situs.'';

$tengah .='<ol class="breadcrumb">
<li><a href="'.$url_situs.'">Home</a></li>
<li><a href="'.$url_situs.'/photo.html">Album</a></li>
<li class="active">'.$cat_name.'</li>
</ol>';

$tengah .= '<div class="row">';
$limit = 20;
$total = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_kid='$kid'");	
$jumlah = $koneksi_db->sql_numrows($total);
if (!isset ($_GET['offset'])) {
	$offset = 0;
}
$a = new paging ($limit);

$no = 0;
$s = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_kid='$kid' ORDER BY photo_id DESC LIMIT $offset,$limit");	
if($offset){
$no = $offset;
}else{
$no = 1;
}
$urutan = 1;
while($data = $koneksi_db->sql_fetchrow($s)){
$photo_id 		= $data['photo_id'];
$photo_date		= datetimes($data['photo_date'],false);
$photo_name 	= $data['photo_name'];
$photo_slug 	= $data['photo_slug'];
$photo_desc 	= $data['photo_desc'];
$photo_image	= $data['photo_image'];

$tengah .= '
<div class="col-xs-6 col-sm-4 col-lg-3">
<a href="'.$url_situs.'/'.get_link($photo_id,$photo_slug,"photo").'">
<img class="img-thumbnail img-responsive" src="'.$url_situs.'/id-content/modul/photo/images/thumb/'.$photo_image.'" alt="'.$photo_name.'"></a>
<h5><small>'.$photo_date.'</small></h5>
<h5><strong>'.$photo_name.'</strong></h5>
</div>';

if ($urutan  % 4 == 0) {
$tengah .= '
</div>
<div class="row">';
}
$no++;
$urutan++;
}
$tengah .= '</div>';

if ($jumlah<1){
$tengah .= '<div class="alert alert-danger" role="alert">Photos in this category not found</div>';
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
$tengah .= '<center>';
$tengah .= $a-> getPaging($jumlah, $pg, $stg);
$tengah .= '</center>';
}
}

#############################################
# Detail Foto
#############################################
if($_GET['aksi'] =='detail'){

$id = int_filter($_GET['id']);

$s = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_id=$id");	
$datas = $koneksi_db->sql_fetchrow($s);
$photo_kid 	= $datas['photo_kid'];
$photo_name = $datas['photo_name'];

//title 
$judul_situs = ''.$photo_name.' | '.$judul_situs.'';

$ss = $koneksi_db->sql_query("SELECT * FROM photo_cat WHERE cat_kid=$photo_kid");	
$datass = $koneksi_db->sql_fetchrow($ss);
$cat_kid 	= $datass['cat_kid'];
$cat_name 	= $datass['cat_name'];

$tengah .= '<ol class="breadcrumb">
<li><a href="'.$url_situs.'">Home</a></li>
<li><a href="'.$url_situs.'/'.get_link($cat_kid,$cat_name,"album").'">'.$cat_name.'</a></li>
<li class="active">'.$photo_name.'</li>
</ol>';

$no = 0;
$hasil = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_id='$id'");	
$data = $koneksi_db->sql_fetchrow($hasil);
$urutan 		= $no;
$photo_id 		= $data['photo_id'];
$photo_kid 		= $data['photo_kid'];
$photo_name 	= $data['photo_name'];
$photo_date 	= datetimes($data['photo_date'],true);
$photo_desc		= $data['photo_desc'];
$photo_image 	= $data['photo_image'];
if(!$photo_image){
$photo_image 	= 'photo-default.jpg';
}
$sp = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_id < '$id' ORDER by photo_id DESC");	
$datasp = $koneksi_db->sql_fetchrow($sp);
$idsp = $datasp['photo_id'];
$judulsp = $datasp['photo_name'];

$sn = $koneksi_db->sql_query("SELECT * FROM photo WHERE photo_id > '$id' ORDER by photo_id ASC");	
$datasn = $koneksi_db->sql_fetchrow($sn);
$idsn = $datasn['photo_id'];
$judulsn = $datasn['photo_name'];

if(!$idsp){
$prev ="";
}else{
$prev ='<li><a href="'.$url_situs.'/'.get_link($idsp,$judulsp,"photo").'">Previous</a></li>';
}

if(!$idsn){
$next ="";
}else{
$next ='<li><a href="'.$url_situs.'/'.get_link($idsn,$judulsn,"photo").'">Next</a></li>';
}

$tengah .= '<nav><ul class="pager">'.$prev.' '.$next.'</ul></nav>';
$tengah .= '<img class="img-responsive" src="'.$url_situs.'/id-content/modul/photo/images/normal/'.$photo_image.'" alt="'.$photo_name.'">
<h3>'.$photo_name.'</h3>
<span class="text-muted">'.$photo_date.'</span>
<p>'.$photo_desc.'</p>';
}

echo $tengah;

?>