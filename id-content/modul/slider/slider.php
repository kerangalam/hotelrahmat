<?php

#############################################
# Sumber Hosting Content Management System
# http://www.sumberhosting.co.id
# 23 Februari 2014
# Author: admin@sumberhosting.co.id
#############################################


global $koneksi_db,$url_situs;

$hasil = $koneksi_db->sql_query("SELECT * FROM slider WHERE slider_publish = 1 ORDER BY slider_order ASC");
echo '<div id="slider">';
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
echo '<div><img src="'.$url_situs.'/id-content/modul/slider/images/normal/'.$data['slider_image'].'" class="img-responsive" alt="'.$data['slider_image'].'"></div>';
}
echo '</div>';

?>

