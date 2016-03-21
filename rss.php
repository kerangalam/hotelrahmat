<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

ob_start();
header("content-type: text/xml; charset=utf-8");

include 'id-includes/config.php';
include 'id-includes/mysql.php';
include 'id-includes/feedcreator.class.php'; 

global $koneksi_db,$url_situs,$judul_situs,$slogan;

$hasil =  $koneksi_db->sql_query("SELECT * FROM setting");
$data = $koneksi_db->sql_fetchrow($hasil);
$email_master	= $data['email_master'];
$judul_situs 	= $data['judul_situs'];
$url_situs 		= $data['url_situs'];
$slogan			= $data['slogan'];
$description	= $data['description'];
$keywords		= $data['keywords'];

$_GET['aksi'] = isset($_GET['aksi']) ? $_GET['aksi'] : 'rss20';
$rss = new UniversalFeedCreator(); 
$rss->useCached(); 
$rss->title 			= $judul_situs; 
$rss->description 		= $slogan; 
$rss->link 				= $url_situs; 
$rss->feedURL 			= $url_situs."/".$_SERVER['PHP_SELF'];
$rss->syndicationURL	= $url_situs; 
$rss->cssStyleSheet		= NULL; 

$image = new FeedImage(); 
$image->title 		= $slogan; 
$image->url 		= "$url_situs/images/browser-48x48.png"; 
$image->link 		= $url_situs; 
$image->description 	= "Feed provided by Teamworks Creative. Click to visit."; 

$rss->image = $image; 

// Ngambil dari database 
$hasil = $koneksi_db->sql_query( "SELECT * FROM berita WHERE publikasi=1 ORDER BY id DESC LIMIT 10" );
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
$id	  		= $data['id'];
$tanggal	= $data['tanggal'];		
$judul 		= $data['judul'];
$konten		= $data['konten'];
$author		= $data['user'];

$item = new FeedItem(); 
$item->title 		= $judul;
$item->link 		= $url_situs."/lihat/".$id."/".SEO($judul).".html";
$item->description 	= limitTXT(strip_tags($konten),250); 	
$item->date   		= strtotime($tanggal); 
$item->source 		= $url_situs;
$item->author 		= $author;
$rss->addItem($item); 
} 

$rss->outputFeed("RSS2.0");

?>