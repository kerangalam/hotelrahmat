<?php

#############################################
# Teamworks Content Management System v2.0
# http://www.teamworks.co.id
# 01 Maret 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_CONTENT')) {
	Header("Location: ../index.php");
	exit;
}

global $koneksi_db;

$username = $_SESSION["UserName"];
$u = $koneksi_db->sql_query( "SELECT * FROM setting WHERE id='1'");
$datau = $koneksi_db->sql_fetchrow($u);
$skin_class = $datau['skin_class'];

echo ''.$skin_class.'';

?>