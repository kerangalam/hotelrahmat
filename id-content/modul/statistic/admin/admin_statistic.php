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

$admin ='<section class="content-header">
<h1>Statistics<small>to manage web statistics</small></h1>
<ol class="breadcrumb">
	<li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Statistics</li>
</ol></section>';

$admin .= '<section class="content">';

$hasil = mysql_query("SELECT * FROM stat_browse");
$a =1;
while ($data = mysql_fetch_array($hasil)){
$PJUDUL = $data["pjudul"];
$PPILIHAN = explode("#", $data["ppilihan"]);
$PJAWABAN = explode("#", $data["pjawaban"]);
$jmlpil = count($PPILIHAN);
$JMLVOTE = array();
for($i=0;$i<$jmlpil;$i++){
$JMLVOTE[$a] = $JMLVOTE[$a] + $PJAWABAN[$i];
}
// Jika tidak ada vote, tetapkan jumlah vote = 1 untuk menghindari pembagian dengan nol
if($JMLVOTE[$a] == 0){
$JMLVOTE[$a] = 1;
}
$admin .= '<div class="box box-warning">
<div class="box-header with-border"><h3 class="box-title">'.$PJUDUL.'</h3></div>
<div class="box-body">';
for($i=0;$i<$jmlpil;$i++){
$persentase = round($PJAWABAN[$i] / $JMLVOTE[$a] * 100, 2);
$loop = floor($persentase)* 2;
$admin .= '
<div class="progress-group">
	<span class="progress-text">'.$PPILIHAN[$i].'</span>
	<span class="progress-number"><b>'.$PJAWABAN[$i].'</b>/'.$persentase.'%</span>
<div class="progress sm">
	<div class="progress-bar progress-bar-green" style="width: '.$loop.'%"></div>
</div>
</div>';
}
$admin .= '</div>';
$admin .= '<div class="box-footer">Total '.$JMLVOTE[$a].'</div>';
$a++;
$admin .= '</div>';
}
$admin .= '</section>';

echo $admin;

?>