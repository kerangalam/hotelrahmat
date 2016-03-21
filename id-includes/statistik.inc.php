<?php

#############################################
# Teamworks Content Management System
# http://www.teamworks.co.id
# 23 Februari 2014
# Author: webmaster@teamworks.co.id
#############################################

$penambahan_waktu = 0;
$sjam = date('G' , time() + $penambahan_waktu);
$sbulan = date('m', time() + $penambahan_waktu);
$shari = date('w', time() + $penambahan_waktu);
$stanggal = date('d', time() + $penambahan_waktu);
function stats(){
/* Get the Browser data */
global $sbulan,$shari,$sjam;
    if((preg_match("/Nav/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Gold/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/X11/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Mozilla/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Netscape/i", getenv("HTTP_USER_AGENT"))) AND (!preg_match("/MSIE/i", getenv("HTTP_USER_AGENT"))) AND (!preg_match("/Konqueror/i", getenv("HTTP_USER_AGENT")))) $browser =0;   //"Netscape";
    // Opera needs to be above MSIE as it pretends to be an MSIE clone
    elseif(preg_match("/Opera/i", getenv("HTTP_USER_AGENT"))) $browser = 1;    // "Opera";
    elseif(preg_match("/MSIE 4.0/i", getenv("HTTP_USER_AGENT"))) $browser =2;   //"MSIE 4.0";
    elseif(preg_match("/MSIE 5.0/i", getenv("HTTP_USER_AGENT"))) $browser =3;  // "MSIE 5.0";
    elseif(preg_match("/MSIE 6.0/i", getenv("HTTP_USER_AGENT"))) $browser =4; //"MSIE 6.0";
    elseif(preg_match("/Lynx/i", getenv("HTTP_USER_AGENT"))) $browser =5;   // "Lynx";
    elseif(preg_match("/WebTV/i", getenv("HTTP_USER_AGENT"))) $browser = 6;       //"WebTV";
    elseif(preg_match("/Konqueror/i", getenv("HTTP_USER_AGENT"))) $browser =7;   //"Konqueror";
    elseif((preg_match("/bot/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Google/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Slurp/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Scooter/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Spider/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/Infoseek/i", getenv("HTTP_USER_AGENT")))) $browser =8;   //"Bot";
    else $browser =9;   // "Other";
    
/* Get the Operating System data */

    if(preg_match("/Win/i", getenv("HTTP_USER_AGENT"))) $os =0;// "Windows";
    elseif((preg_match("/Mac/i", getenv("HTTP_USER_AGENT"))) || (preg_match("/PPC/i", getenv("HTTP_USER_AGENT")))) $os =1;// "Mac";
    elseif(preg_match("/Linux/i", getenv("HTTP_USER_AGENT"))) $os =2;// "Linux";
    elseif(preg_match("/FreeBSD/i", getenv("HTTP_USER_AGENT"))) $os =3;// "FreeBSD";
    elseif(preg_match("/SunOS/i", getenv("HTTP_USER_AGENT"))) $os =4;// "SunOS";
    elseif(preg_match("/IRIX/i", getenv("HTTP_USER_AGENT"))) $os =5;// "IRIX";
    elseif(preg_match("/BeOS/i", getenv("HTTP_USER_AGENT"))) $os =6;// "BeOS";
    elseif(preg_match("/OS2/i", getenv("HTTP_USER_AGENT"))) $os =7;// "OS/2";
    elseif(preg_match("/AIX/i", getenv("HTTP_USER_AGENT"))) $os =8;// "AIX";
    else $os =9;// "Other";
    
//baca database    
//tampilkan data terbaru

$query1 = "SELECT * FROM stat_browse WHERE id='1'";
//---- baca data polling

$hasil = mysql_query($query1);
$data = mysql_fetch_array($hasil);
$PJAWABAN_TMP = explode("#", $data["pjawaban"]);
$jmljwb = count($PJAWABAN_TMP);
$PJAWABAN_TMP[$browser]++;
$PJAWABAN = '';
for($i=0;$i<$jmljwb;$i++){
	$PJAWABAN .= $PJAWABAN_TMP[$i] . "#";
}
$PJAWABAN = substr_replace($PJAWABAN, "", -1, 1);
//-----------------------------------------------
	
//---- simpan data terbaru
$query2 = "UPDATE stat_browse SET pjawaban='$PJAWABAN' WHERE id='1'";
mysql_query($query2);
// ----------------------------------------------------------------------	
		
		
//baca database    
//tampilkan data terbaru
$query2= "SELECT * FROM stat_browse WHERE id='2'";
//---- baca data polling

		$hasil2 = mysql_query($query2);
		$data = mysql_fetch_array($hasil2);
		$PJAWABAN_TMP2 = explode("#", $data["pjawaban"]);
		$jmljwb2 = count($PJAWABAN_TMP2);
		$PJAWABAN_TMP2[$os]++;
$PJAWABAN2 = '';
		for($i=0;$i<$jmljwb2;$i++)
		{
			$PJAWABAN2 .= $PJAWABAN_TMP2[$i] . "#";
		}
		$PJAWABAN2 = substr_replace($PJAWABAN2, "", -1, 1);
		//-----------------------------------------------
	
		//---- simpan data terbaru
		$query3 = "UPDATE stat_browse SET pjawaban='$PJAWABAN2' WHERE id='2'";
		mysql_query($query3);
		// ----------------------------------------------------------------------	

	
// edit hari
 /* Month-Counter */
    $bulans = $sbulan - 1;
    
     //baca database    
  //tampilkan data terbaru
$query4= "SELECT * FROM stat_browse WHERE id='4'";
//---- baca data polling

		$hasil4 = mysql_query($query4);
		$data = mysql_fetch_array($hasil4);
		$PJAWABAN_TMP4 = explode("#", $data["pjawaban"]);
		$jmljwb4 = count($PJAWABAN_TMP4);
		$PJAWABAN_TMP4[$bulans]++;
$PJAWABAN4 = '';
		for($i=0;$i<$jmljwb4;$i++)
		{
			$PJAWABAN4 .= $PJAWABAN_TMP4[$i] . "#";
		}
		$PJAWABAN4 = substr_replace($PJAWABAN4, "", -1, 1);
		//-----------------------------------------------
	
		//---- simpan data terbaru
		$query4 = "UPDATE stat_browse SET pjawaban='$PJAWABAN4' WHERE id='4'";
		mysql_query($query4);
		// ----------------------------------------------------------------------	
    
     /* Weekday-Counter */
    $haris = $shari;
$query3= "SELECT * FROM stat_browse WHERE id='3'";
//---- baca data polling

		$hasil3 = mysql_query($query3);
		$data = mysql_fetch_array($hasil3);
		$PJAWABAN_TMP3 = explode("#", $data["pjawaban"]);
		$jmljwb3 = count($PJAWABAN_TMP3);
		$PJAWABAN_TMP3[$haris]++;
$PJAWABAN3 = '';
		for($i=0;$i<$jmljwb3;$i++)
		{
			$PJAWABAN3 .= $PJAWABAN_TMP3[$i] . "#";
		}
		$PJAWABAN3 = substr_replace($PJAWABAN3, "", -1, 1);
		//-----------------------------------------------
	
		//---- simpan data terbaru
		$query3 = "UPDATE stat_browse SET pjawaban='$PJAWABAN3' WHERE id='3'";
		mysql_query($query3);
		// ----------------------------------------------------------------------	
    
 /* Per-Hour-Counter */
    $jams = $sjam;
   
     //baca database    
  //tampilkan data terbaru
$query5= "SELECT * FROM stat_browse WHERE id='5'";
//---- baca data polling

		$hasil5 = mysql_query($query5);
		$data = mysql_fetch_array($hasil5);
		$PJAWABAN_TMP5 = explode("#", $data["pjawaban"]);
		$jmljwb5 = count($PJAWABAN_TMP5);
		$PJAWABAN_TMP5[$jams]++;
$PJAWABAN5 = '';
		for($i=0;$i<$jmljwb5;$i++)
		{
			$PJAWABAN5 .= $PJAWABAN_TMP5[$i] . "#";
		}
		$PJAWABAN5 = substr_replace($PJAWABAN5, "", -1, 1);
		//-----------------------------------------------
	
		//---- simpan data terbaru
		$query5 = "UPDATE stat_browse SET pjawaban='$PJAWABAN5' WHERE id='5'";
		mysql_query($query5);
		// ----------------------------------------------------------------------	
    

}



?>