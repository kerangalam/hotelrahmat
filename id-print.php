<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

include 'id-includes/config.php';
include 'id-includes/mysql.php';

$_GET['id'] = !isset($_GET['id']) ? null : $_GET['id'];
$id = int_filter($_GET['id']);

global $koneksi_db;

$j =  $koneksi_db->sql_query("SELECT * FROM setting WHERE id=1");
$dataj = $koneksi_db->sql_fetchrow($j);
$url_situs 		= $dataj['url_situs'];
$judul_situs	= $dataj['judul_situs'];

$hasil =  $koneksi_db->sql_query("SELECT * FROM berita WHERE id='$id'");
$data = $koneksi_db->sql_fetchrow($hasil);
$kid		= $data['kid'];
$tanggal 	= datetimes($data['tanggal']);
$judul 		= $data['judul'];

$hasik =  $koneksi_db->sql_query("SELECT * FROM berita_kat WHERE kid='$kid'");
$datak = $koneksi_db->sql_fetchrow($hasik);
$kategori = $datak['kategori'];

echo '<html><head><title>'.$judul_situs.' : '.$judul.'</title></head><body>';
echo '<table width="850" align="center" cellpadding="1" cellspacing="1" bgcolor="#cccccc" style="font-family:arial; font-size:13px; line-height:20px;">
<tr>
	<td style="background:#FFEBD8; padding:10px;"><strong>'.$judul_situs.'</strong></td>
</tr>
<tr>
	<td style="background:#f2f2f2; padding:10px;"><strong>'.$judul.'</strong><br>'.$tanggal.' - Oleh : <strong>'.$data['user'].'</strong> - Kategori : <strong>'.$kategori.'</strong></td>
</tr>
<tr>
	<td style="background:#ffffff; padding:10px;">'.$data['konten'].'</td>
</tr>
<tr>
	<td style="background:#FFEBD8; padding:10px;"><strong>Versi Online :</strong> '.$url_situs.'/lihat/'.$id.'/'.SEO($data['judul']).'.html</td>
</tr></table>';
echo '</body</html>';

if (isset($_GET['id'])){
echo "<script language=javascript>
function printWindow() {
bV = parseInt(navigator.appVersion);
if (bV >= 4) window.print();}
printWindow();
</script>";
}

?>