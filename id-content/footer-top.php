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

echo '<div class="footer_top">
			<div class="row">
				<div class="col-md-4 footer_grid">
					<h4>Receive our Newsletter</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

					<div class="search">
						<form>
							   <input type="text" value="">
							   <input type="submit" value="">
						</form>
					</div>
				</div>
				<div class="col-md-4 footer_grid">
					<h4>Twitter Feed</h4>
           	 			<div class="footer-list">
							<ul>
								<li class="list_top"><i class="fa fa-twitter twt"></i>
								<p>Lorem ipsum <span class="yellow"><a href="#">consectetuer</a></span>vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatu</li></p>
								<li><i class="fa fa-twitter twt"></i>
								<p>Lorem ipsum <span class="yellow"><a href="#">consectetuer</a></span>vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatu</li></p>
							</ul>
					    </div>
           	 		</div>
				<div class="col-md-4 footer_grid">
					<h4>Our Address</h4>
           	 			<div class="company_address">
						<p>Jl. KH. Agus Salim No. 31</p>
						<p>Sampang - Madura</p>
				   		<p>Telp. 0323 - 321 302</p>
				 	 	<p>Email: <span><a href="mailto:info@hotelrahmat.com">info(at)hotelrahmat.com</a></span></p>
				   		</div>
				      <ul class="socials">
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      </ul>
           	 		</div>
           	 		<div class="clearfix"></div>
           	     </div>
           	  </div>';

?>