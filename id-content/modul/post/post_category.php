<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_MODULE')) {
    Header("Location: ../index.php");
    exit;
}

ob_start();

global $koneksi_db,$maxdata,$url_situs;

$hasil = $koneksi_db->sql_query("SELECT * FROM post_cat WHERE cat_parent='0' ORDER BY cat_name ASC");
echo '<ul>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$cat_id		= $data['cat_id'];
$cat_name	= $data['cat_name'];

$total  = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish = 1 and post_cat='$cat_id'");
$jumlah = $koneksi_db->sql_numrows($total);

echo '<li><a href="'.$url_situs.'/'.get_link($cat_id,$cat_name,"category").'" title="'.$cat_name.'">'.$cat_name.' ('.$jumlah.')</a></li>';

$hasils = $koneksi_db->sql_query("SELECT * FROM cat_parent WHERE cat_parent='$cat_id' ORDER BY cat_name ASC");
echo '<ul class="submenu">';
while ($datas = $koneksi_db->sql_fetchrow($hasils)) {
$cat_ids	= $datas['cat_ids'];
$cat_names	= $datas['kategori'];

$totals  = $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish = 1 and post_cat='$cat_ids'");
$jumlahs = $koneksi_db->sql_numrows($totals);

echo '<li><a href="'.$url_situs.'/'.get_link($cat_ids,$cat_names,"category").'" title="'.$kategoris.'">'.$kategoris.' ('.$jumlahs.')</a></li>';
}
echo '</ul>';
}
echo '</ul>';

$out = ob_get_contents();
ob_end_clean();

?>