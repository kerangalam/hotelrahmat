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

global $koneksi_db,$url_situs;

//include 'mod/news/include/function.php';

$hasil = $koneksi_db->sql_query("SELECT post_tag FROM post WHERE post_tag <> '' AND post_publish = 1");
$TampungData = array();
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$post_tag = explode(',',strtolower(trim($data['post_tag'])));
foreach($post_tag as $val) {
	$TampungData[] = $val;
}
}

$totalTags = count($TampungData);
$jumlah_tag = array_count_values($TampungData);
ksort($jumlah_tag);
if ($totalTags > 0) {
$output = array();
$tag_mod = array();
$tag_mod['fontsize']['max'] = 20;
$tag_mod['fontsize']['min'] = 9;

$min_count = min($jumlah_tag);
$spread = max($jumlah_tag) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $tag_mod['fontsize']['max'] - $tag_mod['fontsize']['min'];
	if ( $font_spread <= 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

foreach($jumlah_tag as $key=>$val) {
$font_size = ( $tag_mod['fontsize']['min'] + ( ( $val - $min_count ) * $font_step ) );
	$output[] = '<a href="'.$url_situs.'/'.get_tags(urlencode($key),tag).'" style="font-size:'.$font_size.'px" title="'.$val.' artikel"><span>'.$key .'</span></a>';
}
echo implode(', ',$output);
}

$out = ob_get_contents();
ob_end_clean();

?>