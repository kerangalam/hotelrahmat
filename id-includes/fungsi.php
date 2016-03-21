<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 09 Oktober 2015
# Author: webmaster@teamworks.co.id
#############################################

if (!defined('CMS_FUNC')) {
	Header("Location: ../index.php");
    exit;
}

ob_start();

function transcal(){
}

function kotakjudul($title, $content) {
    global  $theme;
    $thefile = addslashes(file_get_contents("id-content/themes/".$theme."/boxmenu.html"));
    $thefile = "\$r_file=\"".$thefile."\";";
    eval($thefile);
    echo $r_file;
}

function modul($posisi){
    global $koneksi_db,$STYLE_INCLUDE,$SCRIPT_INCLUDE;
    		$total = 0;
    		$numb = 0;
    	if (isset($_GET['opsi'])) {
	    	$pilih = mysql_real_escape_string(strip_tags($_GET['opsi']));
	    	$numb = mysql_num_rows(mysql_query("SELECT `act_id` FROM `actions` WHERE `act_modul` = '$pilih'"));
	    	$modulku = mysql_query("SELECT * FROM `actions` LEFT JOIN `modul` ON (`modul`.`id` = `actions`.`act_modid`) WHERE `actions`.`act_modul` = '$pilih' AND `actions`.`act_pos` = '$posisi' ORDER BY `actions`.`act_order`");
	    	$total = mysql_num_rows($modulku);
	    	while($viewmoduls = mysql_fetch_assoc($modulku)) {
		    	
		    		 if (file_exists($viewmoduls['isi']) && $viewmoduls['type'] == 'module'){
                    include $viewmoduls['isi'];
                    
                	 	kotakjudul($viewmoduls['modul'], @$out,'');
	                   	$out = '';
            	}
            	if ($viewmoduls['type'] == 'block') {
	            	kotakjudul($viewmoduls['modul'], $viewmoduls['isi'],'');
            	}
	    		}
	    
    	}
	
if ($total == 0 && $numb == 0) {
$modulku = $koneksi_db->sql_query( "SELECT * FROM modul WHERE published= 1 AND posisi= '$posisi' ORDER BY ordering" );
while ($viewmodul = $koneksi_db->sql_fetchrow($modulku)) {
	if (file_exists($viewmodul['isi']) && $viewmodul['type'] == 'module'){
	include $viewmodul['isi'];
	kotakjudul($viewmodul['modul'], @$out,'');
	$out = '';
}
	if ($viewmodul['type'] == 'block') {
	kotakjudul($viewmodul['modul'], $viewmodul['isi'],'');
	}
	}
	}  
}

function strip_ext($name){
	$ext = strrchr($name, '.');
	if($ext !== false) {
	$name = substr($name, 0, -strlen($ext));
}
	return $name;
}

##########################################
# Format Password
##########################################
function genpass( $length = 8 ) {
     $password = ""; // variabel password bernilai kosong untuk niai awal
     $possible = "0123456789bcdfghjkmnpqrstvwxyz"; //karakter yang mungkin muncul
     $i = 0; // inisialisasi pengulangan
     while ($i < $length) {
          $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
          if (!strstr($password, $char)) {
               $password .= $char;
               $i++;
          }
}
	return $password;
}

switch(isset($_REQUEST['code'])) {
    case "gfx":
    $code = substr(hexdec(md5("".date("F j")."".$_REQUEST["random_num"]."".$sitekey."")), 2, 6);
	$image = ImageCreateFromJpeg("images/code_bg.jpg");
	$text_color = ImageColorAllocate($image, 100, 100, 100);
	Header("Content-type: image/jpeg");
	ImageString($image, 5, 12, 2, $code, $text_color);
	ImageJpeg($image, "", 50);
	ImageDestroy($image);
	exit;
	break;
}

##########################################
# Tags Filter
##########################################
function tags_filter($string) {
	$string = stripslashes(htmlspecialchars($string));
	$string = str_replace(', ', ',',$string);
	$string = str_replace(' ,', ',',$string);
	$string = str_replace(' , ', ',',$string);
	$string = strtolower($string);
	return($string);
}

##########################################
# HTML and Word filter
##########################################
function text_filter($message, $type="") {
    if (intval($type) == 2) {
	$message = htmlspecialchars(trim($message), ENT_QUOTES);
    } else {
	$message = strip_tags(urldecode($message));
	$message = htmlspecialchars(trim($message), ENT_QUOTES);
    }
return $message;
}

##########################################
# Mail Send
##########################################
function mail_send($email_tujuan, $nama_pengirim, $email_pengirim, $subyek, $pesan, $id="", $pr="") {
    $email_tujuan 	= text_filter($email_tujuan);
    $email_pengirim = text_filter($email_pengirim);
	//$nama_pengirim 	= text_filter($nama_pengirim);
	$nama_pengirim	= (empty($nama_pengirim))? $email_pengirim : $nama_pengirim; // Bila nama kosong isi dengan email pengirim
    $subyek 		= text_filter($subyek);
    $id = intval($id);
    $pr = (!$pr) ? "3" : "".intval($pr)."";
    //$pesan = (!$id) ? "".$pesan."" : "".$pesan."<br /><br />IP: ".getenv("REMOTE_ADDR")."<br />User agent: ".getenv("HTTP_USER_AGENT")."";
    $mheader = "MIME-Version: 1.0\n" 
	."Content-type: text/html; charset=iso-8859-1\n"
    ."Reply-To: \"$nama_pengirim\" <$email_pengirim>\n"
    ."From: \"$nama_pengirim\" <$email_pengirim>\n"
    ."Return-Path: <$email_pengirim>\n"
    ."X-Priority: $pr\n"
    ."X-Mailer: Teamworks Indonesia\n";
    mail($email_tujuan, $subyek, $pesan, $mheader);
}

function php_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message) {
require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Set who the message is to be sent from
$mail->setFrom(''.$email_from.'', ''.$name_from.'');
//Set an alternative reply-to address
$mail->addReplyTo(''.$reply_email.'', ''.$reply_name.'');
//Set who the message is to be sent to
$mail->addAddress(''.$email_to.'', ''.$name_to.'');
//Set the subject line
$mail->Subject = ''.$subject.'';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$body = ''.$message.'';
$body .= ''.select_option(mail_signature).'';
$mail->msgHTML($body);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo '<div class="alert alert-danger">Mailer Error: '.$mail->ErrorInfo.'</div>';
} else {
    echo '<div class="alert alert-success">Message sent!</div>';
}
}

function smtp_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message) {
require 'phpmailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = ''.select_option(smtp_host).'';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = select_option(smtp_port);
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = ''.select_option(smtp_username).'';
//Password to use for SMTP authentication
$mail->Password = ''.select_option(smtp_password).'';
//Set who the message is to be sent from
$mail->setFrom(''.$email_from.'', ''.$name_from.'');
//Set an alternative reply-to address
$mail->addReplyTo(''.$reply_email.'', ''.$reply_name.'');
//Set who the message is to be sent to
$mail->addAddress(''.$email_to.'', ''.$name_to.'');
//Set the subject line
$mail->Subject = ''.$subject.'';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$body = ''.$message.'';
$body .= ''.select_option(mail_signature).'';
$mail->msgHTML($body);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo '<div class="alert alert-danger">Mailer Error: '.$mail->ErrorInfo.'</div>';
} else {
    echo '<div class="alert alert-success">Message sent!</div>';
}
}

class paging_a { 
    function paging_a ($limit, $file) { 
      $this->rowperpage = $limit; 
      $this->pageperstg = 5; 
      $this->files = $file;
} 
    
function getPaging($jumlah, $pg, $stg) { 
	if (!isset ($pg,$stg)){
	$pg = 1;
	$stg = 1;
	}
	$parse_url = array ();
	$parse_url = parse_url ($_SERVER['REQUEST_URI']);
	if (!isset($parse_url['query'])) $parse_url['query'] = '';
	$arr = explode("&", $parse_url['query']); 
	if (is_array($arr)) { 
	$qs = '';
	for ($i=0;$i<count($arr);$i++) { 
	if (!is_int(strpos($arr[$i],"pg=")) && !is_int(strpos($arr[$i],"stg=")) && !is_int(strpos($arr[$i],"offset="))&& trim($arr[$i]) != "") {
	$qs .= $arr[$i]."&"; 
}
} 
} 
      
if ($this->rowperpage<$jumlah) { 
	$allpage = ceil($jumlah/$this->rowperpage); 
	$allstg  = ceil($allpage/$this->pageperstg); 
	$minpage = (($stg-1)*$this->pageperstg)+1; 
	$maxpage = $stg*$this->pageperstg;
	if ($maxpage>$allpage) $maxpage = $allpage; 
	if ($allpage>1) {
	if (($pg-1) == 1){
	$newoffset = 0;
	} else {
	$newoffset = (($pg-2)*$this->rowperpage);
	} 
	$rtn  = "<table cellpadding=2 cellspacing=0><tr align=center valign=middle><td class=\"smallbody\">"; 
	if ($stg>1) $rtn .= "<a class=\"nextstage\" href=\"".$this->files."?".$qs."pg=".($minpage-1)."&stg=".($stg-1). "&offset=". $newoffset ."\">&laquo;&laquo;&laquo;</a> | "; 
	if ($pg>1) { 
	if ($pg==$minpage) {
	if (($pg-1) == 1){
	$newoffset = 0;
	} else {
	$newoffset = (($pg-2)*$this->rowperpage);
	}
	$rtn .= "<a class=\"nextpage\" href=\"".$this->files."?".$qs."pg=".($pg-1)."&stg=".($stg-1). "&offset=".$newoffset."\">&laquo; Previous</a> | "; 
	} else { 
	if (($pg-1) == 1){
	$newoffset = 0;
	} else {
	$newoffset = (($pg-2)*$this->rowperpage);
	}
	$rtn .= "<a class=\"nextpage\" href=\"".$this->files."?".$qs."pg=".($pg-1)."&stg=$stg&offset=".$newoffset."\">&laquo; Previous</a> | "; 
	} 
	} 
	for ($i=$minpage;$i<=$maxpage;$i++) {
	if ($i==$pg) { 
	$rtn .= "<b>$i</b> | "; 
	} else { 
	if  ($i==1) {
	$newoffset = 0;   
	}else {
	$newoffset = ($i-1)*$this->rowperpage;
	}
	$rtn .= "<a href=\"".$this->files."?".$qs."pg=$i&stg=$stg&offset=$newoffset\" title='Page $i'>$i</a> | "; 
	} 
	} 
          if ($pg<=$maxpage) { 
            if ($pg==$maxpage && $stg<$allstg) { 
              $rtn .= " <a class=\"nextpage\" href=\"".$this->files."?".$qs."pg=".($pg+1)."&stg=".($stg+1)."&offset=".(($pg)*$this->rowperpage)."\">Next &raquo;</a> | "; 
            } elseif ($pg<$maxpage) { 
              $rtn .= " <a class=\"nextpage\" href=\"".$this->files."?".$qs."pg=".($pg+1)."&stg=$stg&offset=" .(($pg)*$this->rowperpage). "\">Next &raquo;</a> | "; 
            } 
          } 
          if ($stg<$allstg) {
	          $rtn .= "<a class=\"nextstage\" href=\"".$this->files."?".$qs."pg=".($maxpage+1)."&stg=".($stg+1)."&offset=".(($maxpage)*$this->rowperpage)."\"> &raquo;&raquo;&raquo;</a> | ";
      		} 
          $rtn = substr($rtn,0,strlen($rtn)-3); 
          $rtn .= "</td></tr></table>"; 
          return $rtn; 
        } 
      } 
    } 
  }  

class paging {
    function paging ($limit) {
      $this->rowperpage = $limit;
      $this->pageperstg = 5;

    }


    function getPaging($jumlah, $pg, $stg) {
        if (!isset ($pg,$stg)){
              $pg = 1;
              $stg = 1;
          }
      $qs = '';
      $arr = explode("&",$_SERVER["QUERY_STRING"]);
      if (is_array($arr)) {
        for ($i=0;$i<count($arr);$i++) {
          if (!is_int(strpos($arr[$i],"pg=")) && !is_int(strpos($arr[$i],"stg=")) && !is_int(strpos($arr[$i],"offset="))&& trim($arr[$i]) != "") {
              $qs .= $arr[$i]."&amp;";
          }
        }
      }
      if ($this->rowperpage<$jumlah) {
        $allpage = ceil($jumlah/$this->rowperpage);
        $allstg  = ceil($allpage/$this->pageperstg);
        $minpage = (($stg-1)*$this->pageperstg)+1;
        $maxpage = $stg*$this->pageperstg;
        if ($maxpage>$allpage) $maxpage = $allpage;
        if ($allpage>1) {
             if (($pg-1) == 1){
                    $newoffset = 0;

                } else {
                   $newoffset = (($pg-2)*$this->rowperpage);
                }
          $rtn  = '<ul class="pagination">';
          if ($stg>1) $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=".($minpage-1)."&amp;stg=".($stg-1). "&amp;offset=". $newoffset ."\">&laquo;&laquo;&laquo;</a></li>";
          if ($pg>1) {
            if ($pg==$minpage) {
                if (($pg-1) == 1){
                    $newoffset = 0;

                } else {
                   $newoffset = (($pg-2)*$this->rowperpage);
                }
              $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=".($pg-1)."&amp;stg=".($stg-1). "&amp;offset=".$newoffset."\">&laquo; Previous</a></li>";
            } else {
                if (($pg-1) == 1){
                    $newoffset = 0;

                } else {
                   $newoffset = (($pg-2)*$this->rowperpage);
                }
              $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=".($pg-1)."&amp;stg=$stg&amp;offset=".$newoffset."\">&laquo; Previous</a></li>";
            }
          }
          for ($i=$minpage;$i<=$maxpage;$i++) {

            if ($i==$pg) {
              $rtn .= '<li class="active"><a href="#">'.$i.'</a></li>';
            } else {
                if  ($i==1) {
                 $newoffset = 0;
              }else {
                  $newoffset = ($i-1)*$this->rowperpage;
              }
              $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=$i&amp;stg=$stg&amp;offset=$newoffset\" title='Page $i'>$i</a></li>";
            }
          }
          if ($pg<=$maxpage) {
            if ($pg==$maxpage && $stg<$allstg) {
              $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=".($pg+1)."&amp;stg=".($stg+1)."&amp;offset=".(($pg)*$this->rowperpage)."\">Next &raquo;</a></li>";
            } elseif ($pg<$maxpage) {
              $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=".($pg+1)."&amp;stg=$stg&amp;offset=" .(($pg)*$this->rowperpage). "\">Next &raquo;</a></li>";
            }
          }
          if ($stg<$allstg) {
              $rtn .= "<li><a href=\"".$_SERVER["PHP_SELF"]."?".$qs."pg=".($maxpage+1)."&amp;stg=".($stg+1)."&amp;offset=".(($maxpage)*$this->rowperpage)."\"> &raquo;&raquo;&raquo;</a></li>";
              }
          $rtn = substr($rtn,0,strlen($rtn)-3);
          $rtn .= '</ul>';
          return $rtn;
        }
      }
    }
    
    
     function getPagingajax($jumlah, $pg, $stg) {
        if (!isset ($pg,$stg)){
              $pg = 1;
              $stg = 1;
          }
          $qs = '';
      $arr = explode("&",$_SERVER["QUERY_STRING"]);
      if (is_array($arr)) {
        for ($i=0;$i<count($arr);$i++) {
          if (!is_int(strpos($arr[$i],"pg=")) && !is_int(strpos($arr[$i],"stg=")) && !is_int(strpos($arr[$i],"offset=")) && !is_int(strpos($arr[$i],"math.rand=")) && trim($arr[$i]) != "") {
              $qs .= $arr[$i]."&";
          }
        }
      }
      if ($this->rowperpage<$jumlah) {
        $allpage = ceil($jumlah/$this->rowperpage);
        $allstg  = ceil($allpage/$this->pageperstg);
        $minpage = (($stg-1)*$this->pageperstg)+1;
        $maxpage = $stg*$this->pageperstg;
        if ($maxpage>$allpage) $maxpage = $allpage;
        if ($allpage>1) {
             if (($pg-1) == 1){
                    $newoffset = 0;

                } else {
                   $newoffset = (($pg-2)*$this->rowperpage);
                }
          $rtn  = array ();
          
          if ($stg>1) {
	          $rtn[] = array('link'=>"".$qs."pg=".($minpage-1)."&stg=".($stg-1). "&offset=". $newoffset,'title'=>'&laquo;&laquo;&laquo;');
      			}
          if ($pg>1) {
            if ($pg==$minpage) {
                if (($pg-1) == 1){
                    $newoffset = 0;

                } else {
                   $newoffset = (($pg-2)*$this->rowperpage);
                }
              $rtn[] = array ('link'=>"".$qs."pg=".($pg-1)."&stg=".($stg-1). "&offset=".$newoffset,'title'=>'&laquo; Previous');
            } else {
                if (($pg-1) == 1){
                    $newoffset = 0;

                } else {
                   $newoffset = (($pg-2)*$this->rowperpage);
                }
              $rtn[] = array('link'=>"".$qs."pg=".($pg-1)."&stg=$stg&offset=".$newoffset,'title'=>'&laquo; Previous');
            }
          }
          for ($i=$minpage;$i<=$maxpage;$i++) {

            if ($i==$pg) {
              $rtn[] = array('link'=>'','title'=>'<b>'.$i.'</b>');
            } else {
                if  ($i==1) {
                 $newoffset = 0;
              }else {
                  $newoffset = ($i-1)*$this->rowperpage;
              }
              $rtn[] = array('link'=>"".$qs."pg=$i&stg=$stg&offset=$newoffset",'title'=>$i);
            }
          }
          if ($pg<=$maxpage) {
            if ($pg==$maxpage && $stg<$allstg) {
              $rtn[] = array('link'=>"".$qs."pg=".($pg+1)."&stg=".($stg+1)."&offset=".(($pg)*$this->rowperpage),'title'=>'Next &raquo;');
            } elseif ($pg<$maxpage) {
              $rtn[] = array('link'=>"".$qs."pg=".($pg+1)."&stg=$stg&offset=" .(($pg)*$this->rowperpage),'title'=>'Next &raquo;');
            }
          }
          if ($stg<$allstg) {
              $rtn[] = array('link'=>"".$qs."pg=".($maxpage+1)."&stg=".($stg+1)."&offset=".(($maxpage)*$this->rowperpage),'title'=>'&raquo;&raquo;&raquo;');
              }
         // $rtn = substr($rtn,0,strlen($rtn)-3);
         
          return $rtn;
        }
      }
    }
}

##########################################
# Clean Text
##########################################
function cleanText ($text,$html=true) {
        $text = preg_replace( "'<script[^>]*>.*?</script>'si", '', $text );
        $text = preg_replace( '/<a\s+.*?href="([^"]+)"[^>]*>([^<]+)<\/a>/is', '\2 (\1)', $text );
        $text = preg_replace( '/<!--.+?-->/', '', $text );
        $text = preg_replace( '/{.+?}/', '', $text );
        $text = preg_replace( '/&nbsp;/', ' ', $text );
        $text = preg_replace( '/&amp;/', '&', $text );
        $text = preg_replace( '/&quot;/', '"', $text );
        $text = strip_tags( $text );
        $text = preg_replace("/\r\n\r\n\r\n+/", " ", $text);
        $text = $html ? htmlspecialchars( $text ) : $text;
        return $text;
}

function validate_url($url) {
   return preg_match("/(((ht|f)tps*:\/\/)*)((([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3}))|(([0-9]{1,3}\.){3}([0-9]{1,3})))((\/|\?)[a-z0-9~#%&'_\+=:\?\.-]*)*)$/", $url);
}

function int_filter ($nama){
//memfilter karakter alpa menjadi kosong
if (is_numeric ($nama)){
return (int)preg_replace ( '/\D/i', '', $nama);
}
else {
    $nama = ltrim($nama, ';');
    $nama = explode (';', $nama);
    return (int)preg_replace ( '/\D/i', '', $nama[0]);
}
}

##########################################
# CMS Login
##########################################
function cms_login (){
global $UserName,$Expire,$koneksi_db,$url_situs;
$user_name		= cleantext($_POST['user_name']);
$user_password	= sha1(md5($_POST['user_password']));
$query			= $koneksi_db->sql_query ("SELECT * FROM users WHERE user_name='$user_name' and user_password='$user_password' and user_type='Active'");
$total			= $koneksi_db->sql_numrows($query);
$data			= $koneksi_db->sql_fetchrow($query);

$koneksi_db->sql_freeresult ($query);
if ($total > 0 && $user_name == $data['user_name'] && $user_password == $data['user_password']){
$update = mysql_query("UPDATE users SET last_ping = NOW() WHERE user_name = '$user_name'");
$update = mysql_query("UPDATE users SET is_online = '1' WHERE user_name = '$user_name'");
$_SESSION['UserName'] ;
$_SESSION['UserName']= $data['user_name'];
$_SESSION['LevelAkses'] ;
$_SESSION['LevelAkses']= $data['user_level'];
$_SESSION['UserEmail'] ;
$_SESSION['UserEmail']= $data['user_email'];
if($_SESSION['LevelAkses']=="Administrator"){
header ("location:".$url_situs."/main.php");
exit;
}elseif($_SESSION['LevelAkses']=="User" or $_SESSION['LevelAkses']=="Editor"){
header ("location:".$url_situs."/main.php");
exit;
}

}else {
return '<div id="infoMessage" class="alert alert-danger"><p>Incorrect Login</p></div>';
}
}

##########################################
# Cek Lisensi
##########################################
function cek_license (){
	global $koneksi_db;
	$query	= $koneksi_db->sql_query ("SELECT * FROM setting WHERE id='1'");
	$data	= $koneksi_db->sql_fetchrow ($query);
	$license = $data['license'];
	if ($license != sha1(md5($_SERVER['HTTP_HOST']))){
	header ("location:id-admin/manage/licenseerror.php?licenseerror=expired");
	}
}

##########################################
# Log In
##########################################
function cek_login (){
    global $UserName,$Expire;
    if ($_SESSION['UserName'] && isset ($_SESSION['UserName']) && !empty ($_SESSION['UserName'])){
    return true;
    }else {
	return false;
    }
}

##########################################
# Log Out
##########################################
function logout (){
$user_name = $_SESSION['UserName'];
$update = mysql_query("UPDATE users SET `is_online` = '0' WHERE user_name = '$user_name'");
unset($_SESSION['UserName']);
unset($_SESSION['LevelAkses']);
unset($_SESSION['UserEmail']);
header ("location:./index.php");
exit;
}

##########################################
# Limit Text
##########################################
function limittxt ($nama, $limit){
    if (strlen ($nama) > $limit) {
    $nama = substr($nama, 0, $limit) .'...';
    }else {
        $nama = $nama;
    }
return $nama;
}

function inisialpage($pagenumber){
	$rowsPerPage = $pagenumber;
	$pageNum = 1;
	if(isset($_GET['page'])) {
		$pageNum = $_GET['page'];
	}
	$offset = ($pageNum - 1) * $rowsPerPage;
	if($offset<0) { $offset=0;}
	return $offset;
}

function showpage($fieldname,$tablename,$links,$pagenumber){
	$rowsPerPage = $pagenumber;
	$pageNum = 1;
	if($_GET['page']!=""){
		$pageNum = $_GET['page'];
	}
	$que=mysql_query("SELECT COUNT(".$fieldname.") as numrows FROM ".$tablename);
	$rs=mysql_fetch_array($que);
	$numrows = $rs['numrows'];
	$maxPage = ceil($numrows/$rowsPerPage);
	$self = $_SERVER['PHP_SELF'];
	if ($pageNum > 1){
		$page = $pageNum - 1;
		$prev = " <a href=\"$self?".$links."&page=$page\"><</a> ";

		$first = " <a href=\"$self?".$links."&page=1\"><<</a> ";
	}else{
		$prev  = ' < ';
		$first = ' << ';
	}
	if ($pageNum < $maxPage)
	{
		$page = $pageNum + 1;
		$next = " <a href=\"$self?".$links."&page=$page\">></a> ";

		$last = " <a href=\"$self?".$links."&page=$maxPage\">>></a> ";
	}
	else
	{
		$next = ' > ';
		$last = ' >> ';
	}
	return $first . $prev . " <strong>$pageNum</strong> : <strong>$maxPage</strong> " . $next . $last;
}

##########################################
# Sensor
##########################################
function sensor($str){
$cek = mysql_query ("SELECT `word` FROM `sensor`");
while ($data = mysql_fetch_assoc($cek)){
$badwords[]	= "/".$data['word']."/i";
}
return preg_replace($badwords, "auraCMSsensor", $str);
}

##########################################
# Tanggal
##########################################
function datetimes($tgl,$Jam=true){
/*Contoh Format : 2007-08-15 01:27:45*/
$tanggal = strtotime($tgl);
$bln_array = array (
	'01'=>'Januari',
	'02'=>'Februari',
	'03'=>'Maret',
	'04'=>'April',
	'05'=>'Mei',
	'06'=>'Juni',
	'07'=>'Juli',
	'08'=>'Agustus',
	'09'=>'September',
	'10'=>'Oktober',
	'11'=>'November',
	'12'=>'Desember'
);
$hari_arr = Array (
	'0'=>'Minggu',
	'1'=>'Senin',
	'2'=>'Selasa',
	'3'=>'Rabu',
	'4'=>'Kamis',
	'5'=>'Jum`at',
	'6'=>'Sabtu'
);
$hari = @$hari_arr[date('w',$tanggal)];
$tggl = date('j',$tanggal);
$bln = @$bln_array[date('m',$tanggal)];
$thn = date('Y',$tanggal);
$jam = $Jam ? date ('H:i:s',$tanggal) : '';
return "$hari, $tggl $bln $thn $jam";			
}

function converttgl ($date){
$bln_array = array (
	'01'=>'Januari',
	'02'=>'Februari',
	'03'=>'Maret',
	'04'=>'April',
	'05'=>'Mei',
	'06'=>'Juni',
	'07'=>'Juli',
	'08'=>'Agustus',
	'09'=>'September',
	'10'=>'Oktober',
	'11'=>'November',
	'12'=>'Desember'
);
$date = explode ('-',$date);

return $date[2] . ' ' . $bln_array[$date[1]] . ' ' . $date[0];
}

function referer_encode (){
return base64_encode(basename($_SERVER['PHP_SELF']) .'?'. $_SERVER['QUERY_STRING']);
}

function referer_decode ($url){
return base64_decode($url);	
}
function extension($file)
{
    $pos = strrpos($file,'.');
    if(!$pos)
        return 'Unknown';
    $str = substr($file, $pos, strlen($file));
    return strtolower ($str);
}

function bukafile($filename){
$fp = @fopen($filename, "r");
$sizeof = (@filesize($filename) == 0) ? 1 : filesize($filename);
return @fread($fp, $sizeof);
	fclose($fp);
} 
##------ End Fungsi
##------ Fungsi Tulis file
function tulisfile ($filename , $nilai){
$file = fopen ($filename, "w+");
return fwrite ($file,$nilai);
fclose($file);	
}

function alttxt ($html){
$data = str_replace ('"','&quot;',$html);
//$data = str_replace ("'","\'",$data);
$data = addslashes ($data);
$data = preg_replace ('/([\r\n])[\s]+/', '<br>',wordwrap($data,35,' ',1));
return $data;
}

function is_valid_email($mail) {
	// checks email address for correct pattern
	// simple: 	"/^[-_a-z0-9]+(\.[-_a-z0-9]+)*@[-a-z0-9]+(\.[-a-z0-9]+)*\.[a-z]{2,6}$/i"
	$r = 0;
	if($mail) {
		$p  =	"/^[-_a-z0-9]+(\.[-_a-z0-9]+)*@[-a-z0-9]+(\.[-a-z0-9]+)*\.(";
		// TLD  (01-30-2004)
		$p .=	"com|edu|gov|int|mil|net|org|aero|biz|coop|info|museum|name|pro|arpa";
		// ccTLD (01-30-2004)
		$p .=	"ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|az|ba|bb|bd|";
		$p .=	"be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|";
		$p .=	"cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|";
		$p .=	"ec|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|ga|gd|ge|gf|gg|gh|gi|";
		$p .=	"gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|";
		$p .=	"im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|";
		$p .=	"ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|";
		$p .=	"mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|";
		$p .=	"nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|";
		$p .=	"py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|";
		$p .=	"sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|";
		$p .=	"tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|";
		$p .=	"za|zm|zw";
		$p .=	")$/i";

		$r = preg_match($p, $mail) ? 1 : 0;
	}
	return $r;
}
function cek_ip ($check) {
$bytes = explode('.', $check);
		if (count($bytes) == 4 or count($bytes) == 6) {
			$returnValue = true;
			foreach ($bytes as $byte) {
				if (!(is_numeric($byte) && $byte >= 0 && $byte <= 255)) {
					$returnValue = false;
				}
			}
			return $returnValue;
		}
		return false;
}

function getIP(){
$banned = array ('127.0.0.1', '192.168', '10');
$ip_adr = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$bool = false;
foreach ($banned as $key=>$val){
if (preg_match("/^$val/",$ip_adr)){
$bool = true;
break;
}
}
if (empty($ip_adr) or $bool or !cek_ip($ip_adr)){
$ip_adr = @$_SERVER['REMOTE_ADDR'];	
}
return $ip_adr; 	
}

function posted($filename,$menit = 10){
//$file = basename($_SERVER['PHP_SELF']);
$file = $filename;
$IP = getIP();
$waktu = time() + 60 * $menit;
$in = mysql_query ("INSERT INTO `posted_ip` (`file`,`ip`,`time`) VALUES ('$file','$IP','$waktu')");
}
function cek_posted($filename){
$delete = mysql_query ("DELETE FROM `posted_ip` WHERE `time` < '".time()."'");
$cek = mysql_query ("SELECT COUNT(`ip`) AS IP FROM `posted_ip` WHERE `ip` = '".getIP()."' AND `file` = '".$filename."' AND `time` > '".time()."'");
$total = mysql_fetch_assoc($cek);
if ($total['IP'] >= 1){
return true;	
}else {
return false;	
}
}

function wraptext($konten,$panjang=30){
$data_konten = explode (' ',$konten);	
$TMPmsg = array ();
        for ($i=0; $i<count($data_konten); $i++){
                if (strlen($data_konten[$i]) >= $panjang) {
                    $TMPmsg[] = wordwrap($data_konten[$i], $panjang, " <br />", TRUE);
                }else {
                	$TMPmsg[] = $data_konten[$i];
            		}
        }	
return implode (" ",$TMPmsg);	
}

function stripWhitespace($str) {
		$r = preg_replace('/[\n\r\t]+/', '', $str);
		return preg_replace('/\s{2,}/', ' ', $r);
	}
function stripImages($str) {
		$str = preg_replace('/(<a[^>]*>)(<img[^>]+alt=")([^"]*)("[^>]*>)(<\/a>)/i', '$1$3$5<br />', $str);
		$str = preg_replace('/(<img[^>]+alt=")([^"]*)("[^>]*>)/i', '$2<br />', $str);
		$str = preg_replace('/<img[^>]*>/i', '', $str);
		return $str;
	}
function stripScripts($str) {
		return preg_replace('/(<link[^>]+rel="[^"]*stylesheet"[^>]*>|<img[^>]*>|style="[^"]*")|<script[^>]*>.*?<\/script>|<style[^>]*>.*?<\/style>|<!--.*?-->/i', '', $str);
	}

function cleartext($txt) {
	return preg_replace('/[!"\#\$%\'\(\)\?@\[\]\^`\{\}~\*\/]/', '', $txt);
}

##########################################
# SEO
##########################################
function SEO($string) {
	$string = str_replace(' ', '-', $string);
	$string = preg_replace('/[^0-9a-zA-Z-_]/', '', $string); 
	$string = str_replace('-', ' ', $string);
	$string = preg_replace('/^\s+|\s+$/', '', $string);
	$string = preg_replace('/\s+/', ' ', $string);
	$string = str_replace(' ', '-', $string);
	return strtolower(cleartext($string));
}

##########################################
# Get Link
##########################################
function get_link($id,$title,$folder) {
	$sharing = SEO($title);
    $buatrewrite = $folder.'/'.$id.'/'.$sharing.'.html';   
    return $buatrewrite;
}
/*
function get_link($id,$title,$slug,$folder) {
	if($slug==''){
    $sharing = SEO($title);
	}else{
	$sharing = SEO($slug);
	}
    $buatrewrite = $folder.'/'.$id.'/'.$sharing.'.html';   
    return $buatrewrite;
}
*/

##########################################
# Get Tags
##########################################
function get_tags($title,$folder) {
    $buatrewrite = $folder.'/'.$title.'.html';   
    return $buatrewrite;
}

##########################################
# Create Thumbnail
##########################################
function create_thumbnail ($source, $destination, $new_width, $new_height, $quality) {
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source);
    switch ($source_image_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source);
         
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = $new_width / $new_height;
    if ($source_image_width <= $new_width && $source_image_height <= $new_height) {
        $thumbnail_image_width = $source_image_width;
        $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_image_width = (int) ($new_height * $source_aspect_ratio);
        $thumbnail_image_height = $new_height;
    } else {
        $thumbnail_image_width = $new_width;
        $thumbnail_image_height = (int) ($new_width / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
    
    $img_disp = imagecreatetruecolor($new_width,$new_height); 
     
    $backcolor = imagecolorallocate($img_disp,242,242,242); //untuk ganti warna background putih ganti 255,255,255
     
    imagefill($img_disp,0,0,$backcolor);
 
        imagecopy($img_disp, $thumbnail_gd_image, (imagesx($img_disp)/2)-(imagesx($thumbnail_gd_image)/2), (imagesy($img_disp)/2)-(imagesy($thumbnail_gd_image)/2), 0, 0, imagesx($thumbnail_gd_image), imagesy($thumbnail_gd_image));
 
    imagejpeg($img_disp, $destination, $quality);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    imagedestroy($img_disp);
    return true;
}

##########################################
# Rupiah Format
##########################################
function rupiah_format($nilai, $pecahan = 0) {
    $rupiah = number_format($nilai, $pecahan, ',', '.');
	return  "Rp. ".$rupiah;
}

class paging_s { 
    function paging_s ($limit, $aksi='', $query='', $pageperstg=5) { 
      $this->rowperpage = $limit; 
      $this->pageperstg = $pageperstg; 
      // $this->sendiri = $GLOBALS['URLSITE'] . basename ($_SERVER['PHP_SELF'], '.php') . $aksi;
       $this->sendiri = $aksi;
       $this->query = $query;
    } 
    
    function getPaging($jumlah, $pg, $stg,$aksi=null, $query=null) { 
	    if (!isset ($pg,$stg)){
	  		$pg = 1;
	  		$stg = 1;
  		}
  		
  		if ($aksi) $this->sendiri = $aksi;
       if ($query) $this->query = $query;
  
     
      if ($this->rowperpage<$jumlah) { 
        $allpage = ceil($jumlah/$this->rowperpage); 
        $allstg  = ceil($allpage/$this->pageperstg); 
        $minpage = (($stg-1)*$this->pageperstg)+1; 
        $maxpage = $stg*$this->pageperstg;
        if ($maxpage>$allpage) $maxpage = $allpage; 
        if ($allpage>1) {
	         if (($pg-1) == 1){
		            $newoffset = 0;
		            
	            } else {
		           $newoffset = (($pg-2)*$this->rowperpage);
	            } 
          $rtn  = '<ul class="pagination">'; 
          if ($stg>1) $rtn .= "<li><a href=\"".$this->sendiri."-".($minpage-1)."-".($stg-1). "-". $newoffset ."$this->query.html\">&laquo;&laquo;&laquo;</a></li>"; 
          if ($pg>1) { 
            if ($pg==$minpage) {
	            if (($pg-1) == 1){
		            $newoffset = 0;
		            
	            } else {
		           $newoffset = (($pg-2)*$this->rowperpage);
	            }
              $rtn .= "<li><a href=\"".$this->sendiri."-".($pg-1)."-".($stg-1). "-".$newoffset."$this->query.html\">&laquo; Previous</a></li>"; 
            } else { 
	            if (($pg-1) == 1){
		            $newoffset = 0;
		            
	            } else {
		           $newoffset = (($pg-2)*$this->rowperpage);
	            }
              $rtn .= "<li><a href=\"".$this->sendiri."-".($pg-1)."-$stg-".$newoffset."$this->query.html\">&laquo; Previous</a></li>"; 
            } 
          } 
          for ($i=$minpage;$i<=$maxpage;$i++) {
	          
            if ($i==$pg) { 
              $rtn .= '<li class="active"><a href="#">'.$i.'</a></li>'; 
            } else { 
	            if  ($i==1) {
		         $newoffset = 0;   
	          }else {
		          $newoffset = ($i-1)*$this->rowperpage;
	          }
              $rtn .= "<li><a href=\"".$this->sendiri."-$i-$stg-$newoffset$this->query.html\" title='Page $i'>$i</a></li>"; 
            } 
          } 
          if ($pg<=$maxpage) { 
            if ($pg==$maxpage && $stg<$allstg) { 
              $rtn .= "<li><a href=\"".$this->sendiri."-".($pg+1)."-".($stg+1)."-".(($pg)*$this->rowperpage)."$this->query.html\">Next &raquo;</a></li>"; 
            } elseif ($pg<$maxpage) { 
              $rtn .= "<li><a href=\"".$this->sendiri."-".($pg+1)."-$stg-" .(($pg)*$this->rowperpage). "$this->query.html\">Next &raquo;</a></li>"; 
            } 
          } 
          if ($stg<$allstg) {
	          $rtn .= '<li><a href=\"'.$this->sendiri.'-'.($maxpage+1).'-'.($stg+1).'-'.(($maxpage)*$this->rowperpage).''.$this->query.'.html"> &raquo;&raquo;&raquo;</a></li>';
      		} 
          $rtn = substr($rtn,0,strlen($rtn)-3); 
          $rtn .= '</ul>'; 
          return $rtn; 
        } 
      } 
    } 
  }

//stoping xss,union and clike injection
if(!function_exists('stripos')) {
	function stripos_clone($haystack, $needle, $offset=0) {
		$return = strpos(strtoupper($haystack), strtoupper($needle), $offset);
		if ($return === false) {
			return false;
		} else {
			return true;
		}
	}
} else {
	// But when this is PHP5, we use the original function
	function stripos_clone($haystack, $needle, $offset=0) {
		$return = stripos($haystack, $needle, $offset=0);
		if ($return === false) {
			return false;
		} else {
			return true;
		}
	}
} 


// Additional security (Union, CLike, XSS)
if(isset($_SERVER['QUERY_STRING']) && (!stripos_clone($_SERVER['QUERY_STRING'], "ad_click"))) {
	$queryString = $_SERVER['QUERY_STRING'];
    if (stripos_clone($queryString,'%20union%20') OR stripos_clone($queryString,'/*') OR stripos_clone($queryString,'*/union/*') OR stripos_clone($queryString,'c2nyaxb0') OR stripos_clone($queryString,'+union+') OR (stripos_clone($queryString,'cmd=') AND !stripos_clone($queryString,'&cmd')) OR (stripos_clone($queryString,'exec') AND !stripos_clone($queryString,'execu')) OR stripos_clone($queryString,'concat')) {
    	die('Illegal Operation');
    }
}

##########################################
# Web Online / Offline
##########################################
function cek_situs (){
global $koneksi_db,$judul_situs;
if (select_option(site_publish) !='1'){
die(require 'id-admin/themes/administrator/pages/offline.html');
}
}

function forgot_login (){
global $UserName,$Expire,$koneksi_db;

$user_name	= cleantext($_POST['user_name']);
$user_email	= cleantext($_POST['user_email']);
$hint		= cleantext($_POST['hint']);
$hintjawab	= cleantext($_POST['hintjawab']);
$query		= $koneksi_db->sql_query ("SELECT * FROM users WHERE user_name='$user_name' and user_email='$user_email' and user_type='Active'");
$total		= $koneksi_db->sql_numrows($query);
$data		= $koneksi_db->sql_fetchrow ($query);

$koneksi_db->sql_freeresult ($query);
if ($total > 0 && $user == $data['user'] and $email == $data['email'] && $hint == $data['hint']&& $hintjawab == $data['hintjawab']){
$update = mysql_query("UPDATE users SET `last_ping` = NOW() WHERE `user` = '$user'");
$update = mysql_query("UPDATE users SET `is_online` = '1' WHERE `user` = '$user'");
$_SESSION['UserName'] ;
$_SESSION['UserName']= $data['user'];
$_SESSION['LevelAkses'] ;
$_SESSION['LevelAkses']= $data['level'];
$_SESSION['UserEmail'] ;
$_SESSION['UserEmail']= $data['email'];
if($_SESSION['LevelAkses']=="Administrator"){
header ("location:main.php");
exit;
}elseif($_SESSION['LevelAkses']=="User" or $_SESSION['LevelAkses']=="Editor"){
header ("location:main.php");
exit;
}
}
}

function str_to_time($date, $format) { 
    $masks = array( 
      '%d' => '(?P<d>[0-9]{2})', 
      '%m' => '(?P<m>[0-9]{2})', 
      '%Y' => '(?P<Y>[0-9]{4})', 
      '%H' => '(?P<H>[0-9]{2})', 
      '%i' => '(?P<i>[0-9]{2})', 
      '%s' => '(?P<s>[0-9]{2})', 
    ); 
    $rexep = "#".strtr(preg_quote($format), $masks)."#"; 
    if( !preg_match($rexep, $date, $out)) 
      return false; 

    $ret = array( 
      "s"  	=> (int) $out['s'], 
      "i"  	=> (int) $out['i'], 
      "H" 	=> (int) $out['H'], 
      "d" 	=> (int) $out['d'], 
      "m"  	=> (int) $out['m'], 
      "Y" 	=> (int) $out['Y'], 
    ); 
    return $ret; 
}

##########################################
# Singkat URL
##########################################
function singkatURL($url) {
   $curlHandle = curl_init();
   // melakukan request ke server Google API
   curl_setopt($curlHandle, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
   curl_setopt($curlHandle, CURLOPT_HEADER, 0);
   curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
   // menentukan tipe konten hasil request yg berupa JSON
   curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
   // parameter yang berisi URL yang akan disingkat
   curl_setopt($curlHandle, CURLOPT_POSTFIELDS, '{"longUrl":"'.$url.'"}');
   curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
   // lakukan request dengan POST method
   curl_setopt($curlHandle, CURLOPT_POST, 1);

   // baca data hasil request yg berupa JSON
   $content = curl_exec($curlHandle);
   curl_close($curlHandle);

   // ekstrak data JSON untuk mendapatkan hasil URL yg disingkat
   $data = json_decode($content);
   return $data->id;
}

##########################################
# Gravatar
##########################################
function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

##########################################
# Backup Database
##########################################
function backup_tables($host,$user,$pass,$name,$nama_file,$tables = '*') {
	//untuk koneksi database
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		//jika hanya table-table tertentu
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
//looping dulu ah
foreach($tables as $table) {
	$result = mysql_query('SELECT * FROM '.$table);
	$num_fields = mysql_num_fields($result);
		
//menyisipkan query drop table untuk nanti hapus table yang lama
	$return.= 'DROP TABLE '.$table.';';
	$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
	$return.= "\n\n".$row2[1].";\n\n";
		
	for ($i = 0; $i < $num_fields; $i++) {
	while($row = mysql_fetch_row($result)) {
//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat. so toy mode : ON
	$return.= 'INSERT INTO '.$table.' VALUES(';
	for($j=0; $j<$num_fields; $j++) {
//akan menelusuri setiap baris query didalam
	$row[$j] = addslashes($row[$j]);
	$row[$j] = str_replace("\n","\\n",$row[$j]);
	if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
	if ($j<($num_fields-1)) { $return.= ','; }
	}
	$return.= ");\n";
	}
	}
	$return.="\n\n\n";
	}
	
//simpan file di folder yang anda tentukan sendiri. kalo saya sech folder "DATA"
	$nama_file;
	
	$handle = fopen('./id-content/db-backup/'.$nama_file,'w+');
	fwrite($handle,$return);
	fclose($handle);
	//header ("location: $handle");
}

function format_size($folder,$file){
	$get_file_size = filesize("$folder/$file");
	$get_file_size = number_format($get_file_size / 1024,1);
	return "$get_file_size KB";
}

function kebulan($data)	{
		$bulan = array("0","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$hitung = count($bulan);
		
			for($x=1;$x<=$hitung;$x++)
			{
				if($data==$x)
				{
					$namabulan = $bulan[$x];
				}
			}
			return $namabulan;
	}

##########################################
# Enum Dropdown
##########################################
function enumDropdown($table_name, $column_name, $pilih, $echo = false) {
   $selectDropdown = '<select name="'.$column_name.'" class="form-control">';
   $result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
   or die (mysql_error());

    $row = mysql_fetch_array($result);
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));
	
	//$pilihan = ($value == $pilih) ? 'selected' : '';
    foreach($enumList as $value)
	if ($value == $pilih){
		$selectDropdown .= '<option value="'.$value.'" selected>'.$value.'</option>';
		}else{
		$selectDropdown .= '<option value="'.$value.'">'.$value.'</option>';
	}
    $selectDropdown .= '</select>';

    if ($echo)
        echo $selectDropdown;
    return $selectDropdown;
}

##########################################
# Active Menu
##########################################
function mainmenu (){
global $koneksi_db;
$query = $koneksi_db->sql_query ("SELECT * FROM menu_admin");
while ($datas = $koneksi_db->sql_fetchrow($query)) {
$ma_url = $datas['ma_url'];
}
if (isset($_GET['opsi']) == ''.$ma_url.''){
	$class .= ' active';
}else {
	$class .= '';
}
return $class;
}

function submenu (){
global $koneksi_db;
$query = $koneksi_db->sql_query ("SELECT * FROM menu_admin");
while ($datas = $koneksi_db->sql_fetchrow($query)) {
$ma_url = $datas['ma_url'];
}
if (isset($_GET['opsi']) == ''.$ma_url.''){
	$sclass .= ' class="active"';
}else {
	$sclass .= '';
}
return $sclass;
}

##########################################
# Youtube
##########################################
// Embed URL Youtube
function embed_youtube($url){
	$link=str_replace('http://www.youtube.com/watch?v=', '', $url);
	$link=str_replace('https://www.youtube.com/watch?v=', '', $link);
	$data='<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.$link.'?autoplay=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
	</div>';
	return $data;
}

// Thumb URL Youtube
function thumb_youtube($url){
if(!filter_var($url, FILTER_VALIDATE_URL)){
    return false;
}
$domain=parse_url($url,PHP_URL_HOST);
if($domain=='www.youtube.com' OR $domain=='youtube.com'){
    if($querystring=parse_url($url,PHP_URL_QUERY)){  
        parse_str($querystring);
        if(!empty($v)) return "http://img.youtube.com/vi/$v/0.jpg";
        else return false;
    }else return false;
 
}elseif($domain == 'youtu.be'){
    $v= str_replace('/','', parse_url($url, PHP_URL_PATH));
    return (empty($v)) ? false : "http://img.youtube.com/vi/$v/0.jpg" ;
}else
return false;
}

##########################################
# Select Option
##########################################
function select_option($option_name){
global $koneksi_db;
$query	= $koneksi_db->sql_query ("SELECT * FROM option WHERE option_name='$option_name'");
$data	= $koneksi_db->sql_fetchrow($query);
$option_value = $data['option_value'];
return $option_value;
}
	
?>