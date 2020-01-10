<?php 
	require_once '../_config/config.php'; 
	$id=@$_GET['id'];
	$data=mysqli_query($con,"select * from upload_soal where id_uploadsoal='$id' ")or die(mysqli_error($con));
	$caridata=mysqli_fetch_array($data);
	$hapusfile="../file/filepdf/".$caridata['file'];
	$hapusgambar="../file/gambar/".$caridata['gambar'];
	unlink($hapusfile);
	unlink($hapusgambar);
	mysqli_query($con,"delete from upload_soal where id_uploadsoal='$id'") or die(mysqli_error($con));
	header("location:data.php");
 ?>