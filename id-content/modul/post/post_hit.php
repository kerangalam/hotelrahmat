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

global $koneksi_db,$maxdata,$url_situs;

$hasil 	= $koneksi_db->sql_query("SELECT * FROM post WHERE post_publish=1 ORDER BY post_hit DESC LIMIT 10");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$post_id	= $data['post_id'];
$post_title = $data['post_title'];
echo '<div class="terpopuler_blok">
<a href="'.$url_situs.'/'.get_link($post_id,$post_title,post).'" title="'.$post_title.'">'.$post_title.'</a> 
<span class="text-muted">- '.$data['post_hit'].' views</span></div>';
}

$out = ob_get_contents();
ob_end_clean();

?>