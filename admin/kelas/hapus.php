<?php 
	require_once '../_config/config.php'; 
	$id=@$_GET['id'];
	mysqli_query($con,"delete from kelas where id_kelas='$id'") or die(mysqli_error($con));
	header("location:data.php");
 ?>