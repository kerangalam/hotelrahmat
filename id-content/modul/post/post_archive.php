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

ob_start();

$hasil = $koneksi_db->sql_query("SELECT date_format(post_date, '%Y.%m' ) AS date FROM post WHERE post_publish = 1 GROUP BY date DESC LIMIT 10");
echo '<ul>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
list($tahun,$bulan) = explode('.',$data['date']);
$quer = $koneksi_db->sql_query("SELECT count(post_id) AS total FROM post WHERE month(post_date) = '$bulan' AND year(post_date) = '$tahun' AND post_publish = 1");
$tot = $koneksi_db->sql_fetchrow($quer);
$total = $tot['total'];
echo '<li><a href="'.$url_situs.'/archive/'.$data['date'].'.html">'.kebulan($bulan).' '.$tahun.' ('.$total.') </a></li>';
}
echo '</ul>';

$out = ob_get_contents();
ob_end_clean();

?>