<?php

#############################################
# Sumber Hosting Content Management System
# http://www.sumberhosting.co.id
# 23 Februari 2014
# Author: admin@sumberhosting.co.id
#############################################

if (!defined('CMS_CONTENT')) {
	Header("Location: ../index.php");
	exit;
}

echo '
<div class="company_logos wow bounceIn" data-wow-delay="0.4s">
	<h3>Our Gallery</h3>
		<div class="ocarousel_slider">  
			<div class="ocarousel example_photos" data-ocarousel-perscroll="3">
				<div class="ocarousel_window">';
$hasil = $koneksi_db->sql_query("SELECT * FROM photo ORDER BY photo_id DESC LIMIT 9");
while ($data = $koneksi_db->sql_fetchrow($hasil)) {
echo '<a href="#" title="Hp"> <img src="id-content/modul/photo/images/thumb/'.$data['photo_image'].'" class="img-responsive" alt="" /></a>';
}
echo '</div>
					<span>           
					<a href="#" data-ocarousel-link="left" class="prev"><i class="fa fa-angle-left"></i> </a>
					<a href="#" data-ocarousel-link="right" class="next"> <i class="fa fa-angle-right"></i></a>
					</span>
			</div>
		</div>      		
	</div>
</div>';

?>