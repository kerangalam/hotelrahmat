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

echo '<div class="container text-center"><br><br>
	
<div class="row">
  <div class="col-lg-4">
	<div class="input-group">
		<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
		<input type="text" id="datepicker" class="form-control" placeholder="Check in">
	</div>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
	<div class="input-group">
		<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-calendar"></i></span>
		<input type="text" class="form-control" placeholder="Check out">
	</div>
  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">
	<a class="btn btn-action" role="button">Book Now</a>
  </div><!-- /.col-lg-4 -->
</div><!-- /.row -->

</div>';

?>