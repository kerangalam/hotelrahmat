<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

$kkode = isset ($_GET['action']) ? $_GET['action'] : 'img_post';

session_name("Login");
session_start();
if (!$_SESSION[$kkode]){
session_register ($kkode);
}

$rand = rand (1,50);
switch(isset($_REQUEST['code'])) {
    case "gfx":
    $code = substr(hexdec(md5("".date("F j")."".$rand."".$sitekey."")), 2, 6);
$_SESSION[$kkode] = $code;
        $image = ImageCreateFromJpeg("code_bg.jpg");
        $text_color = ImageColorAllocate($image, 100, 100, 100);
        Header("Content-type: image/jpeg");
        ImageString($image, 5, 12, 2, $code, $text_color);
        ImageJpeg($image, "", 50);
        ImageDestroy($image);
        exit;
        break;
}

?>