<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

define('links', true);
if (isset($_GET['id'])){
include 'id-includes/config.php';
include 'id-includes/mysql.php';

$id		= int_filter($_GET['id']);
$hasil	= $koneksi_db->sql_query("SELECT * FROM links WHERE id='$id'");
$data	= $koneksi_db->sql_fetchrow($hasil);
$url	= $data['url'];
$hit	= $data['hit'];
$Id	= $data['id'];
$hit	= $hit+1 ;
$hasil1 = $koneksi_db->sql_query("UPDATE links SET hit=hit+1 WHERE id='$id'");
header ("location: $url");	
}

?>