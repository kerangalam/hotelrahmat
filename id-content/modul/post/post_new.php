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

$hasil 	= $koneksi_db->sql_query("SELECT * FROM post WHERE publikasi=1 ORDER BY id DESC LIMIT 10");
echo '<ul>';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$id = $data['id'];
$judul = $data['judul'];
echo '<li><a href="'.$url_situs.'/'.get_link($id,$judul,post).'" title="'.$judul.'">'.$judul.'</a></li>';
}
echo '</ul>';

$out = ob_get_contents();
ob_end_clean();

?>