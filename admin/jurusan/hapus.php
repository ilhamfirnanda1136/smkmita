<?php 
	require_once '../_config/config.php'; 
	$id=@$_GET['id'];
	mysqli_query($con,"delete from jurusan where idjurusan='$id'") or die(mysqli_error($con));
	header("location:data.php");
 ?>