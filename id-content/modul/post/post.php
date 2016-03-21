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

//$index_hal=1;

if (isset ($_GET['pg'])) $pg = int_filter ($_GET['pg']); else $pg = 0;
if (isset ($_GET['stg'])) $stg = int_filter ($_GET['stg']); else $stg = 0;
if (isset ($_GET['offset'])) $offset = int_filter ($_GET['offset']); else $offset = 0;

#############################################
# List Berita
#############################################
if($_GET['aksi']==""){

$tengah .= '<h4 class="page-header">Posts</h4>';

//title 
$judul_situs = 'Posts | '.$judul_situs.'';
/*
$tengah .= '<div class="border" style="text-align:center;">
<form method="get" class="searchform" action="index.php">
<p><input type="text" name="query" class="textbox">
<input type="submit" name="submit" class="button" value="Search">
<input type="hidden" name="pilih" value="search"></p>
</form></div>';
*/
$hitungjumlah = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish = 1");
$jumlah = $koneksi_db->sql_numrows($hitungjumlah);
$limit	= 10;
//$ada = new paging ($limit);
$ada = new paging_s ($limit,'photo-page');
$tengah .= '<table class="table">';
$hasil = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish = 1 ORDER BY post_date DESC LIMIT $offset, $limit");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$post_id		= $data['post_id'];
$post_date		= datetimes($data['post_date']);
$post_title		= $data['post_title'];
$post_content	= $data['post_content'];
$user			= $data['user'];
$post_hit		= $data['post_hit'];
$post_image = ($data['post_image'] == '') ? 
'<img class="img-thumbnail img-responsive" src="'.$url_situs.'/id-content/modul/post/images/default-thumb.jpg" alt="'.$data['judul'].'">' : 
'<img class="img-thumbnail img-responsive" src="'.$url_situs.'/id-content/modul/post/images/thumb/'.$data['post_image'].'" alt="'.$data['judul'].'">';

$tengah .= '<tr><td>
<a href="'.$url_situs.'/'.get_link($post_id,$post_title,"post").'"><h4>'.$post_title.'</h4></a>
<div class="row">
<div class="col-sm-4 col-md-3">'.$post_image.'</div>
<div class="col-sm-8 col-md-9">
<span class="text-muted">'.$post_date.' - '.$post_hit.' views</span>
<p>'.limitTXT(strip_tags($post_content),300).'</p></div>
</div>
</td></tr>';
}
$tengah .= '</table>';
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
# Detail Berita
#############################################
if($_GET['aksi']=="detail"){

$id 	= $_GET['id'];
$judul 	= $_GET['judul'];

$hasil  = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish = 1 and post_id='$id'");
$data = $koneksi_db->sql_fetchrow($hasil);
$post_date		= datetimes($data['post_date']);
$post_title		= $data['post_title'];
$post_cat		= $data['post_cat'];
$post_content	= $data['post_content'];
$post_hit		= $data['post_hit'];
$post_image		= ($data['post_image'] == '') ? '' : '<div style="text-align:center; background:#f2f2f2;"><img style="max-height:400px;" src="'.$url_situs.'/id-content/modul/post/images/normal/'.$data['post_image'].'" class="img-responsive" alt="'.$data['judul'].'"></div>
<div style="font-size:11px; padding:10px 0 10px 0; color:#666666;">'.$data['caption'].'</div>';

// Title Website
$judul_situs = ''.$post_title.' | '.$judul_situs.'';
$_META['description'] = limittxt(htmlentities(strip_tags($data['konten'])),500);
$_META['keywords'] = empty($data['tags']) ? implode(',',explode(' ',htmlentities(strip_tags($data['judul'])))) : $data['tags'];

if (empty ($post_title)){
$tengah.='<div class="alert alert-danger">Halaman yang Anda cari tidak ditemukan</div>';
$tengah .='<meta http-equiv="refresh" content="5; url=index.php">';
}else {
$post_hit = $post_hit +1;
$updatehits = $koneksi_db->sql_query("UPDATE post SET post_hit='$post_hit' WHERE post_id='$id'");

# Kategori
$k = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_id='$post_cat'");
$datak = $koneksi_db->sql_fetchrow($k);
$kidk	= $datak['cat_id'];
$kat	= $datak['cat_name'];
# Kategori

# Author
$u = $koneksi_db->sql_query( "SELECT * FROM users WHERE user_name='".$data['post_author']."'" );
$datau = $koneksi_db->sql_fetchrow($u);
$UserId	= $datau['UserId'];
$user_fullname	= $datau['user_fullname'];
# Author

$tengah .='<ol class="breadcrumb">
<li><a href="'.$url_situs.'">Home</a></li>
<li><a href="'.$url_situs.'/'.get_link($kidk,$kat,"category").'">'.$kat.'</a></li>
<li class="active">'.$data['post_title'].'</li></ol>';
$tengah .= '<h4>'.$post_title.'</h4>';
$tengah .= '<div class="text-muted">'.$post_date.' - Posting by <a href="'.$url_situs.'/'.get_link($UserId,$user_fullname,"pesan").'" title="'.$user_fullname.'">'.$user_fullname.'</a> - '.$data['post_hit'].' views</div>';
$tengah .= ''.$post_image.''.$post_content.'';

# Tags
$hasit = $koneksi_db->sql_query("SELECT post_tag FROM post WHERE post_id='$id' AND post_publish = 1");
$TampungData = array();
while ($datat = $koneksi_db->sql_fetchrow($hasit)) {
$tags = explode(',',strtolower(trim($datat['post_tag'])));
foreach($tags as $val) {
$TampungData[] = $val;
}
}

$totalTags = count($TampungData);
$jumlah_tag = array_count_values($TampungData);
ksort($jumlah_tag);
if ($totalTags > 0) {
$output = array();

foreach($jumlah_tag as $key=>$val) {
$output[] = '<a href="'.$url_situs.'/'.get_tags(urlencode($key),tags).'" title="'.$key.'"><span class="label label-success">#'.$key.'</span></a>';
}
$tags = implode(' ',$output);
}
$tengah .= '<p class="text-info">Tags '.$tags.'</p>';
if($data['sumber']==''){
$tengah .= '';
}else{
$tengah .= '<p class="text-warning">Sumber : <a href="'.singkatURL($data['sumber']).'" target="_blank">'.singkatURL($data['sumber']).'</a></p>';
}
# Tags

# Berita Terkait
$query = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_id='$post_cat'");
while ($data1 = $koneksi_db->sql_fetchrow($query)) {
$rubrik=$data1[1];
}
$hitungjumlah = $koneksi_db->sql_query( "SELECT post_id FROM post WHERE post_id!='$id' AND post_publish=1 and post_cat='$topik'");
$jumlah = $koneksi_db->sql_numrows($hitungjumlah);

$tengah .='<div class="page-header">Baca "'.$kat.'" Lainnya</div>';
$hasill = $koneksi_db->sql_query("SELECT * FROM post WHERE post_id!='$id' and post_publish=1 and post_cat='$post_cat' ORDER BY post_date DESC LIMIT 5");
$tengah .= '<ul class="media-list">';
while ($datal = $koneksi_db->sql_fetchrow($hasill)) {
$id2	= $datal['post_id'];
$judul2	= $datal['post_title'];

$tengah .= '<li class="media"><a href="'.$url_situs.'/'.get_link($id2,$judul2,"post").'">'.$judul2.'</a></li>';
}
$tengah .= '</ul>';
}
} 

#############################################
# Kirim Pesan
#############################################
if($_GET['aksi']=="pesan"){

$UserId = int_filter($_GET['UserId']);

$hasil = $koneksi_db->sql_query("SELECT * FROM users WHERE UserId = $UserId");
$data = $koneksi_db->sql_fetchrow($hasil);
$email_author = $data['email'];
$nama_author = $data['user'];

$tengah .='<h4 class="bg">Kirim Pesan Ke : '.$nama_author.'</h4>';

if (isset($_POST['submit'])) {

$nama = text_filter($_POST['nama']);
$email = text_filter($_POST['email']);
$subyek = text_filter($_POST['subyek']);
$pesan = nl2br(text_filter($_POST['pesan'], 2));
checkemail($email);
$gfx_check = intval($_POST['gfx_check']);
if (!$nama)  $error .= "Error: Please enter your name!<br />";
if (!$pesan) $error .= "Error: Please enter a message!<br />";
if (!$subyek) $error .= "Error: Please enter a Subject!<br />";
if ($gfx_check != $_SESSION['Var_session'] or !isset($_SESSION['Var_session'])) {
$error .= "Error: Kode keamanan salah!<br />";
}

if ($error) {
$tengah.='<div class="alert alert-danger">'.$error.'</div>';
} else {
$subject = "$sitename - Contact Form";
$msg = "$sitename - Contact Form<br /><br />Nama Pengirim: $nama<br />Email Pengirim: $email<br /><br />Pesan: $pesan";
mail_send($kontributor, "From: $nama - $email", $subyek, $pesan, 1, 1);
$tengah.='<div class="sukses"><p>Pesan Anda telah dikirim ke teman Anda.<br>Terima kasih mau mendistribusikan artikel di situs ini.</p></div>';
$tengah .='<meta http-equiv="refresh" content="3; url=?pilih=news&amp;mod=yes&aksi=lihat&amp;id='.$id.'">';
}
}
$tengah .='<div class="bg-info">Anda ingin mengirim pesan kepada '.$nama_author.'<br />
Silahkan isi formulir dibawah ini:</div>';

$nama 	= !isset($nama) ? '' : $nama;
$email 	= !isset($email) ? '' : $email;
$subyek = !isset($subyek) ? '' : $subyek;
$pesan 	= !isset($pesan) ? '' : $pesan;
$op 	= !isset($_GET['op']) ? '' : $_GET['op'];

$tengah .= '<form class="form-horizontal" method="POST" action="">
<div class="form-group">
    <label class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10"><input type="text" name="nama" value="'.$nama.'" class="form-control" placeholder="Masukkan nama lengkap Anda"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10"><input type="text" name="email" value="'.$email.'" class="form-control" placeholder="Masukkan email Anda"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Subyek</label>
    <div class="col-sm-10"><input type="text" name="subyek" value="'.$subyek.'" class="form-control" placeholder="Masukkan judul pesan Anda"></div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Pesan</label>
    <div class="col-sm-10"><textarea name="pesan" rows="3" class="form-control">'.$pesan.'</textarea></div>
</div>';
if (extension_loaded("gd")) {
$tengah .= '
<div class="form-group">
    <label class="col-sm-2 control-label">Kode Keamanan</label>
    <div class="col-sm-10"><img style="border:1px dashed #cccccc;" src="'.$url_situs.'/id-includes/code_image.php" alt="Kode Keamanan"></div>
</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Tulis Kode</label>
    <div class="col-sm-10"><input type="text" name="gfx_check" maxlength="6" class="form-control" placeholder="Tulis kode di atas"></div>
</div>';
}
$tengah .= '
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10"><input type="submit" name="submit" value="Kirim Pesan" class="btn btn-success"></div>
</div></form>';
}

#############################################
# Kategori
#############################################
if($_GET['aksi']=="kategori"){

$kid = int_filter($_GET['kid']);

$hasil = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_id='$kid'");
$data = $koneksi_db->sql_fetchrow($hasil);
$cat_parent	= $data['cat_parent'];
$cat_name 	= $data['cat_name'];

$tengah .='<ol class="breadcrumb">
<li><a href="'.$url_situs.'">Home</a></li>
<li class="active">'.$cat_name.'</li>
</ol>';

$tengah .='<h4 class="page-header">Rubrik "'.$cat_name.'"</h4>';

// Title Website
$judul_situs = ''.$cat_name.' | '.$judul_situs.'';
$_META['description'] = htmlentities(strip_tags($data['ket']));
$_META['keywords'] = implode(',',explode(' ',htmlentities(strip_tags($data['cat_name']))));

if (empty ($cat_name)){
$tengah.='<div class="alert alert-danger">Akses Ditolak<br /><br />Salam<br /><br />Teamworks Indonesia<br />webmaster@teamworks.co.id</div>';
}else {

$limit = 10;
$offset = int_filter(@$_GET['offset']);
$pg		= int_filter(@$_GET['pg']);
$stg    = int_filter(@$_GET['stg']);
////////////////////

$hasilp = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_parent='$kid'");
while ($datap = $koneksi_db->sql_fetchrow($hasilp)) {
$topikp = $datap['cat_id'];
$topikp2 .=$topikp.',';
}
$topikp2 .=$kid.','.$topikp2;
$topikp2 = substr_replace($topikp2, "", -1, 1);
//$tengah.=$topikp2.'<br>';
///////////////////////////////////////
$totals = $koneksi_db->sql_query( "SELECT * FROM post WHERE post_publish=1 and post_cat in($topikp2)" );
$jumlah = $koneksi_db->sql_numrows( $totals );
//$a = new paging ($limit);
$a = new paging_s ($limit,''.$url_situs.'/kategori-hal-'.$kid.'-'.SEO($kategori).'');
if ($jumlah>0 ){

$hasil = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish=1 and post_cat in($topikp2) ORDER BY post_id DESC LIMIT $offset, $limit");
$tengah .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$post_id		= $data['post_id'];
$post_date		= datetimes($data['post_date']);
$post_title		= $data['post_title'];
$post_content	= $data['post_content'];
$user			= $data['user'];
$post_hit		= $data['post_hit'];
$post_image = ($data['post_image'] == '') ? 
'<img class="img-thumbnail" style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/default-thumb.jpg" alt="'.$data['judul'].'">' : 
'<img class="img-thumbnail" style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/thumb/'.$data['post_image'].'" alt="'.$data['judul'].'">';

$tengah .= '<tr><td style="border-bottom:1px dashed #dddddd; padding:5px 0px 10px 0px;">
<a href="'.$url_situs.'/'.get_link($post_id,$post_title,"post").'"><h4>'.$post_title.'</h4></a>
<span class="text-muted">'.$post_date.' - '.$post_hit.' views</span>
'.$post_image.'<p>'.limitTXT(strip_tags($post_content),400).'</p></td>
</tr>';
}
$tengah .= '</table>';

if($jumlah>$limit){
$tengah .='<div class="border">';
$tengah.="<center>";
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}

if (empty($_GET['pg']) and !isset ($_GET['pg'])) {
$pg = 1;
}

if (empty($_GET['stg']) and !isset ($_GET['stg'])) {
$stg = 1;
}

$tengah.= $a-> getPaging($jumlah, $pg, $stg);
$tengah.="</center>";
$tengah .='</div>';
}
}else{
//////////////////////////////////////////////
$hasilp = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_parent='$kid'");
while ($datap = $koneksi_db->sql_fetchrow($hasilp)) {
$topikp = $datap['cat_id'];
$topikp2 .=$topikp.',';
}
$topikp2 = substr_replace($topikp2, "", -1, 1);
//$tengah.=$topikp2.'<br>';
///////////////////////////////////////
$totals = $koneksi_db->sql_query( "SELECT * FROM post WHERE post_publish=1 and post_cat in($topikp2)" );
$jumlah = $koneksi_db->sql_numrows( $totals );
$a = new paging ($limit);
$hasil = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish=1 and post_cat in($topikp2) ORDER BY post_id DESC LIMIT $offset, $limit");
$tengah .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$post_id		= $data['post_id'];
$post_date		= datetimes($data['post_date']);
$post_title		= $data['post_title'];
$post_content	= $data['post_content'];
$user			= $data['user'];
$post_hit		= $data['post_hit'];
$post_image = ($data['post_image'] == '') ? 
'<img class="img-thumbnail" style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/default-thumb.jpg" alt="'.$data['judul'].'">' : 
'<img class="img-thumbnail" style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/thumb/'.$data['post_image'].'" alt="'.$data['judul'].'">';

$tengah .= '<tr><td style="border-bottom:1px dashed #dddddd; padding:5px 0px 10px 0px;">
<a href="'.$url_situs.'/'.get_link($post_id,$post_title,"post").'"><h4>'.$post_title.'</h4></a>
<span class="text-muted">'.$post_date.' - '.$post_hit.' views</span>
'.$post_image.'<p>'.limitTXT(strip_tags($post_content),400).'</p></td>
</tr>';
}
$tengah .= '</table>';

if($jumlah>$limit){
$tengah .='<div class="border">';
$tengah.="<center>";
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}

if (empty($_GET['pg']) and !isset ($_GET['pg'])) {
$pg = 1;
}

if (empty($_GET['stg']) and !isset ($_GET['stg'])) {
$stg = 1;
}
$tengah.= $a-> getPaging($jumlah, $pg, $stg);
$tengah.="</center>";
$tengah .='</div>';
}
if($jumlah<1){
$tengah .='<div class="alert alert-danger">Tidak ada berita dalam kategori ini</div>';
}
}
}
}

#############################################
# Tags
#############################################
if($_GET['aksi']=="tag"){

$tag = strip_tags($_GET['tag']);

$tengah .= '<h4 class="bg">Tags : '.stripslashes(strip_tags($_GET['tag'])).'</h4>';

//title 
$judul_situs = ''.stripslashes(strip_tags($_GET['tag'])).' | '.$judul_situs.'';

$limit = 5;
$offset = int_filter(@$_GET['offset']);
$pg		= int_filter(@$_GET['pg']);
$stg    = int_filter(@$_GET['stg']);

if (strlen($tag) == 3) {
$finder = "`post_tag` LIKE '%$tag%'";
}else {
$finder = "MATCH (post_tag) AGAINST ('$tag' IN BOOLEAN MODE)";
}

/*$totals = $koneksi_db->sql_query("SELECT count(post_id) AS `total` FROM `post` WHERE $finder and post_publish = 1");
$tot = $koneksi_db->sql_numrows ($totals);
$jumlah = $tot['total'];*/

$totals = $koneksi_db->sql_query("SELECT * FROM post WHERE $finder and post_publish=1");
$jumlah = $koneksi_db->sql_numrows($totals);

$a = new paging ($limit);
if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}

if (empty($_GET['pg']) and !isset ($_GET['pg'])) {
$pg = 1;
}

if (empty($_GET['stg']) and !isset ($_GET['stg'])) {
$stg = 1;
}

if ($jumlah > 0) {		
$query = $koneksi_db->sql_query("SELECT * FROM post WHERE $finder and post_publish = 1 ORDER BY post_date DESC LIMIT $offset,$limit");
$tengah .= '<table class="table">';
while ($data = $koneksi_db->sql_fetchrow($query)) {
$post_id	= $data['post_id'];
$post_title	= $data['post_title'];
$post_date 	= datetimes($data['post_date']);
$post_image = ($data['post_image'] == '') ? 
'<img style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/thumb_default.jpg" alt="'.$data['post_title'].'">' : 
'<img style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/thumb/'.$data['post_image'].'" alt="'.$data['post_title'].'">';

$tengah .= '<tr><td style="border-bottom:1px dashed #dddddd; padding:5px 0px 10px 0px;">
<a href="'.$url_situs.'/'.get_link($post_id,$post_title,"post").'"><h4>'.$data['post_title'].'</h4></a>
<span class="text-muted">'.$post_date.' - '.$data['post_hit'].' views</span>
'.$post_image.'<p>'.limitTXT(strip_tags($data['post_content']),250).'</p></td></tr>';
}
$tengah .= '</table>';
}else {
$tengah .= '<div class="alert alert-danger">Post not found.</div>';
}

if($jumlah>$limit){
$tengah .= '<center>';
$tengah .=  $a-> getPaging($jumlah, $pg, $stg);
$tengah .= '</center>';
}
}

#############################################
# Arsip
#############################################
if($_GET['aksi']=="archive"){

$bulan = text_filter(cleanText($_GET['bulan']));

//if (!empty($_GET['date'])){
if (preg_match('/\d{4}\.\d{2}/',$_GET['date'])) {
list($tahun,$bulan) = explode('.',$_GET['date']);
if (checkdate($bulan,1,$tahun)) {
//include 'mod/news/include/function.php';
$tengah .= '<h4 class="bg"><span class="judul">Arsip pada bulan : '.kebulan($bulan).' '.$tahun.'</span></h4>';

$limit 	= 10;
$offset = int_filter(@$_GET['offset']);
$pg		= int_filter(@$_GET['pg']);
$stg    = int_filter(@$_GET['stg']);

$totals =  $koneksi_db->sql_query( "SELECT * FROM post WHERE month(post_date) = '$bulan' AND year(post_date) = '$tahun' AND post_publish = 1" );
$jumlah = mysql_num_rows ( $totals );
//$a = new paging ($limit);
$a = new paging_s ($limit,''.$url_situs.'/archive-page-'.$tahun.'.'.$bulan.'');

if (empty($_GET['offset']) and !isset ($_GET['offset'])) {
$offset = 0;
}

if (empty($_GET['pg']) and !isset ($_GET['pg'])) {
$pg = 1;
}

if (empty($_GET['stg']) and !isset ($_GET['stg'])) {
$stg = 1;
}

if ($jumlah > 0) {		
$query = $koneksi_db->sql_query("SELECT * FROM post WHERE month(post_date) = '$bulan' AND year(post_date) = '$tahun' AND post_publish = 1 ORDER BY post_date DESC LIMIT $offset,$limit");
$tengah .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
while($data = $koneksi_db->sql_fetchrow($query)) {
$post_id	= $data['post_id'];
$post_title	= $data['post_title'];
$post_date	= datetimes($data['post_date']);
$post_image	= ($data['post_image'] == '') ? 
'<img class="img-thumbnail" style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/default-thumb.jpg" alt="'.$data['judul'].'">' : 
'<img class="img-thumbnail" style="float:left; margin:0 10px 0 0;" src="'.$url_situs.'/id-content/modul/post/images/thumb/'.$data['post_image'].'" alt="'.$data['judul'].'">';

$tengah .= '<tr><td style="border-bottom:1px dashed #dddddd; padding:5px 0px 10px 0px;">
<a href="'.$url_situs.'/'.get_link($post_id,$post_title,"post").'"><h4>'.$post_title.'</h4></a>
<span class="text-muted">'.$post_date.' - '.$data['post_hit'].' views</span>
'.$post_image.'<p>'.limitTXT(strip_tags($data['post_content']),250).'</p></td></tr>';
}
$tengah .= '</table>';
}else {
$tengah .= '<div class="alert alert-danger">Arsip berita kosong</div>';
}

if($jumlah>$limit){
$tengah .= '<div class="border">';
$tengah .= "<center>";

$tengah .=  $a-> getPaging($jumlah, $pg, $stg);
$tengah .= "</center>";
$tengah .= '</div>';
}
}else {
$tengah .= '<h4 class="bg"><span class="judul">Error ...</h4>';
$tengah .= '<div class="alert alert-danger">format date salah</div>';
}
}else {
$tengah .= '<h4 class="bg"><span class="judul">Error ...</h4>';
$tengah .= '<div class="alert alert-danger">Paramater date salah,<br/> contoh : 2008.01</div>';
}
}

echo $tengah;

?>