<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_CONTENT')) {
	Header("Location: ../index.php");
	exit;
}

global $koneksi_db;

$tengah .='<section class="content-header">
          <h1>Dashboard<small>website informations</small>
          </h1><ol class="breadcrumb">
            <li><a href="main.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>';
$tengah .='<section class="content">';

if ($_SESSION['LevelAkses']){
$username = $_SESSION['UserName'];
$query = $koneksi_db->sql_query("SELECT * FROM users WHERE user_name='$username'");
$data = $koneksi_db->sql_fetchrow( $query );
$last_ping = datetimes($data['last_ping'],true);

#############################################
# Administrator
#############################################
if ($_SESSION['LevelAkses']=="Administrator"){

$tengah .='<div class="alert alert-info">Last Login : '.$last_ping.'</div>';

$tengah .='<div class="row">';
$total_pages = $koneksi_db->sql_query("SELECT * FROM page");
$jumlah_pages = $koneksi_db->sql_numrows($total);
$tengah .='<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-sticky-note"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pages</span>
                  <span class="info-box-number">'.$jumlah_pages.'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>';
$total_cats = $koneksi_db->sql_query("SELECT * FROM post_cat");
$jumlah_cats = $koneksi_db->sql_numrows($total_cats);
$tengah .='<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-fw fa-archive"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Categorys</span>
                  <span class="info-box-number">'.$jumlah_cats.'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>';
$total_posts = $koneksi_db->sql_query("SELECT * FROM post");
$jumlah_posts = $koneksi_db->sql_numrows($total_posts);
$tengah .='<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-fw fa-edit"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Posts</span>
                  <span class="info-box-number">'.$jumlah_posts.'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div>';
$total_users = $koneksi_db->sql_query("SELECT * FROM users");
$jumlah_users = $koneksi_db->sql_numrows( $total );
$tengah .='<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-fw fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">'.$jumlah_users.'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>';
}

#############################################
# User
#############################################
if ($_SESSION['LevelAkses']=="User"){

$tengah .='<div class="alert alert-info">Last Login : '.$last_ping.'</div>';

$total =  $koneksi_db->sql_query("SELECT * FROM posts WHERE post_author='$username'");
$jumlah = $koneksi_db->sql_numrows( $total );
$tengah .='<div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-fw fa-edit"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Posts</span>
                  <span class="info-box-number">'.$jumlah.'</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->';
}

}

$tengah .='</section>';

echo $tengah;

?>