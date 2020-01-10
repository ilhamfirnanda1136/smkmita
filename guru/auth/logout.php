<?php 
	include '../_config/config.php';
	unset($_SESSION['guru']);
	echo "<script>window.location='".base_url('auth/login.php')."';</script>";
 ?>