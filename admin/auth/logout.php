<?php 
    require_once '../_config/config.php';
  	unset($_SESSION['adminis']);
    echo "<script>window.location='".base_url('auth/login.php')."';</script>";
 ?>