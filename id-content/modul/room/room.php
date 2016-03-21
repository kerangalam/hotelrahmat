<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_MODULE')) {
    Header("Location: ../index.php");
    exit;
}

global $koneksi_db;

$index_hal=1;

#############################################
# List Kamar
#############################################
if($_GET['aksi']==""){

$tengah .= '<div class="reservation_banner">
	<div class="main_title">Rooms & Pricing</div>
	<div class="divider"></div>
</div>';
$tengah .='<div class="main"> 
         <div class="reservation_top">
          <div class="container">';

//title 
$judul_situs = 'Kamar & Harga | '.$judul_situs.'';
$no =0;
$hasil = $koneksi_db->sql_query("SELECT * FROM hotel_room_type ORDER BY type_price ASC");
$tengah .= '<div class="row room_grids text-center">';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$type_id		= $data['type_id'];
$type_name		= $data['type_name'];
$type_max		= $data['type_max'];
$type_bed		= $data['type_bed'];
$type_facility	= $data['type_facility'];
$type_price		= rupiah_format($data['type_price']);
$type_slug		= $data['type_slug'];
$urutan = $no + 1;

$g = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_idtype=$type_id and gal_default=1");
$datag = $koneksi_db->sql_fetchrow($g);
//$gal_image ='<img class="img-responsive" src="'.$url_situs.'/id-content/modul/room/images/thumb/'.$datag['gal_image'].'">';
$gal_image = ($datag['gal_image'] == '') ? 
'<img class="img-responsive" src="'.$url_situs.'/id-content/modul/room/images/room-default.jpg">' : 
'<img class="img-responsive" src="'.$url_situs.'/id-content/modul/room/images/thumb/'.$datag['gal_image'].'">';

$tengah .= '<div class="col-md-4">
<div class="view view-tenth">
<a href="'.$url_situs.'/room/'.$type_slug.'.html">
	<div class="inner_content clearfix">
		<div class="product_image">
			'.$gal_image.'

	<div class="label-product">
		<span class="new">'.$type_price.'</span>
	</div>
		<div class="mask">
			<h2>'.$type_name.'</h2>
			<h3>Hotel Rahmat, Bersih, Nyaman dan Murah</h3>
		<div class="info"><i class="fa fa-search-plus"></i></div>
		</div>
	</div>
</div>
</a>
</div>

<div class="product_container">
	<h3><a href="#">'.$type_name.'</a></h3>
		<div class="underheader-line"></div>
			<ul class="person">
				<h4>Kapasitas <strong>'.$type_max.'</strong> Orang</h4>
			</ul>
	<p><strong>'.$type_bed.'</strong> Tempat Tidur</p>
	<p class="para">'.$type_facility.'</p>
</div>
</div> <!-- col-md-4 -->';
if ($urutan  % 3 == 0) {
$tengah .= '</div><div class="row room_grids text-center">';
}
$no++;
}
$tengah .= '</div>';
}

$tengah .='</div></div></div>';

#############################################
# Detail Tipe
#############################################
if($_GET['aksi']=="detail"){

$slug = $_GET['slug'];

$hasil  = $koneksi_db->sql_query("SELECT * FROM hotel_room_type WHERE type_slug='$slug'");
$data = $koneksi_db->sql_fetchrow($hasil);
$type_id		= $data['type_id'];
$type_name		= $data['type_name'];
$type_bed		= $data['type_bed'];
$type_max		= $data['type_max'];
$type_facility	= $data['type_facility'];
$type_price		= $data['type_price'];

$tengah .= '<div class="reservation_banner">
	<div class="main_title">Kamar '.$type_name.'</div>
	<div class="divider"></div>
</div>';

$tengah .='<div class="main"> 
         <div class="reservation_top">
          <div class="container"><div class="row">';

// Title Website
$judul_situs = 'Kamar '.$type_name.' | '.$judul_situs.'';
$_META['description'] = limittxt(htmlentities(strip_tags($data['konten'])),500);
$_META['keywords'] = empty($data['tags']) ? implode(',',explode(' ',htmlentities(strip_tags($data['judul'])))) : $data['tags'];

$post_hit = $post_hit +1;
$updatehits = $koneksi_db->sql_query("UPDATE post SET post_hit='$post_hit' WHERE post_id='$id'");

$tengah .='<div class="col-md-8">';

$tengah .='<div class="post1">
<h3><a>'.$type_name.'</a></h3>
</div>';

$tengah .= '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
$no = 1;
$s = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_idtype=".$type_id." ORDER BY gal_id ASC");
$tengah .= '<ol class="carousel-indicators">';
while ($datas = $koneksi_db->sql_fetchrow($s)) {
if($no==1){
$tengah .= '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
}else{
$tengah .= '<li data-target="#carousel-example-generic" data-slide-to="0"></li>';
}
$no++;
}
$tengah .= '</ol>';

$no = 1;
$ss = $koneksi_db->sql_query("SELECT * FROM hotel_room_gallery WHERE gal_idtype=".$type_id." ORDER BY gal_id ASC");
$tengah .= '<div class="carousel-inner" role="listbox">';
while ($datass = $koneksi_db->sql_fetchrow($ss)) {
if($no==1){
$tengah .= '<div class="item active"><img src="'.$url_situs.'/id-content/modul/room/images/normal/'.$datass['gal_image'].'" alt="'.$type_name.'"></div>';
}else{
$tengah .= '<div class="item"><img src="'.$url_situs.'/id-content/modul/room/images/normal/'.$datass['gal_image'].'" alt="'.$type_name.'"></div>';
}
$no++;
}
$tengah .= '</div>';

$tengah .= ' <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>';
$tengah .= '</div>';
$tengah .= '</div>';

$tengah .='<div class="col-md-4">
<div class="category_widget">
	<h3>Descriptions</h3>
	<ul class="list-unstyled arrow">
		<li><a>Kapasitas <strong>'.$type_max.'</strong> Orang</a></li>
		<li><a><strong>'.$type_bed.'</strong> Tempat Tidur</a></li>
	</ul>
</div>
<a href="#" class="btn btn-primary btn2 btn-normal btn-inline">Book</a>
</div>';

$tengah .='</div></div></div>';
}

echo $tengah;

?>