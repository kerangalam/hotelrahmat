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

$index_hal=1;

global $koneksi_db,$email_master,$judul_situs,$alamatkantor;

//title 
$judul_situs = 'Hubungi Kami | '.$judul_situs.'';

$tengah .='<div class="reservation_banner">
	<div class="main_title">Contact</div>
	<div class="divider"></div>
</div>';

$tengah .='<div class="main"> 
<div class="reservation_top">
<div class="container">
<div class="row">';

if (isset($_POST['submit'])) {
$nama 		= addslashes($_POST['nama']);
$email 		= text_filter($_POST['email']);
$subject	= text_filter($_POST['subject']);
$pesan 		= nl2br(text_filter($_POST['pesan'], 2));
/* untuk menampung variabel post dari captcha google adalah g-recaptcha-reponse */
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';

$error = '';
if (!is_valid_email($email)) $error .= "<strong>Gagal!</strong> Penulisan format E-Mail salah!<br />";
if (!$nama) $error .= "<strong>Gagal!</strong> Mohon isi nama lengkap Anda!<br />";
if (!$subject) $error .= "<strong>Gagal!</strong> Mohon isi subject Anda!<br />";
if (!$pesan) $error .= "<strong>Gagal!</strong> Mohon isi pesan Anda!<br />";

/* untuk menampung variabel post dari captcha google adalah g-recaptcha-reponse */
$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
$secret_key = '6LcnpRoTAAAAACsgeR34SMqCKE-QWG6l_jKNHr-L'; //masukkan secret key-nya berdasarkan secret key masig-masing saat create api key nya
//$error = 'Mohon periksa captcha nya';
if ($captcha != '') {
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secret_key).'&response='.$captcha;   
$recaptcha = file_get_contents($url);
$recaptcha = json_decode($recaptcha, true);
} else {
$error.= '<strong>Gagal!</strong> Mohon periksa captcha Anda!';
}

if ($error) {
$tengah.='<div class="alert alert-danger">'.$error.'</div>';
}else{
$subject = "Contact Form - $subject";
$message = ''.$pesan.'';

if(select_option(mail_type)=='SMTP'){
//smtp_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message);
smtp_mail($email_master, select_option(from_name), select_option(smtp_username), $nama, $email, $nama, $subject, $message);
}else{
//php_mail($email_to, $name_to, $email_from, $name_from, $reply_email, $reply_name, $subject, $message);
php_mail($email_master, select_option(from_name), $email, $nama, $email, $nama, $subject, $message);
}

//$tengah.='<div class="alert alert-success">Terima kasih, pesan Anda telah terkirim!</div>';
unset($nama);
unset($email);
unset($subject);
unset($pesan);
}
}

$nama 		= !isset($nama) ? '' : $nama;
$email 		= !isset($email) ? '' : $email;
$subject	= !isset($subject) ? '' : $subject;
$pesan 		= !isset($pesan) ? '' : $pesan;

$site_key = '6LcnpRoTAAAAAExa-kGy0Fxs3qtLNHGV2HkVNc2N';

$tengah .= '
<div class="col-md-5">
	<div class="contact_left">
		<h3>Contact Info</h3>
		<iframe class="map" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.303244572786!2d113.24960831425761!3d-7.206203672744629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd786e4c96e00eb%3A0x37d695a6ecf1bf9c!2sHotel+Rahmat!5e0!3m2!1sen!2sid!4v1457788896296"></iframe>
		<address class="address">'.$contact_info.'</address>
	</div>
</div>';

$tengah .= '<div class="col-md-7 contact_right">
<h3>Contact Form</h3>
<div class="contact-form">
<form method="post" action="#">
    <input type="text" name="nama" value="'.$nama.'" class="textbox" placeholder="Enter full name">
    <input type="email" name="email" value="'.$email.'" class="textbox" placeholder="Enter email">
    <input type="text" name="subject" value="'.$subject.'" class="textbox" placeholder="Enter subject">
	<textarea name="pesan" rows="3" placeholder="Enter messages">'.$pesan.'</textarea>
	<div class="g-recaptcha" data-sitekey="'.$site_key.'"></div>
	<input type="submit" name="submit" value="Kirim Pesan">
</form>
</div>
</div>';
$tengah .='</div></div></div></div>';

echo $tengah;

?>
