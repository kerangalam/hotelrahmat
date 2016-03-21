<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

// PHP Version
$phpver = phpversion();
if ($phpver < '5.4.0') {
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_COOKIE = $HTTP_COOKIE_VARS;
	$_REQUEST = array_merge($_GET, $_POST, $_COOKIE);
	$_FILES = $HTTP_POST_FILES;
	$_SERVER = $HTTP_SERVER_VARS;
}
$phpver = explode(".", $phpver);
$phpver = "$phpver[0]$phpver[1]";
if ($phpver >= 41) {
	$PHP_SELF = $_SERVER['PHP_SELF'];
}

?>