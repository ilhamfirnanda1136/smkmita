<?php 
    require_once '_config/config.php';
    if (isset($_SESSION['siswa'])) {
       echo   "<script>window.location='".base_url('dashboard/dashboard.php')."';</script>;";
    }
    else{
    	 echo "<script>window.location='".base_url('auth/login.php')."';</script>";
    	}
 ?>