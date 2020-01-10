<?php 
	include '../_config/config.php';
	if (isset($_POST['add'])) {
		$id=trim(mysqli_real_escape_string($con,$_POST['id']));
		$kelas=trim(mysqli_real_escape_string($con,$_POST['kelas']));
		$jurusan=trim(mysqli_real_escape_string($con,$_POST['jurusan']));
		if ($id=='') {
			mysqli_query($con,"insert into kelas (id_kelas,nama_kelas,jurusan) values('','$kelas','$jurusan')");	
		}
		else{
			mysqli_query($con,"update kelas set nama_kelas='$kelas' , jurusan='$jurusan' where id_kelas='$id'");
		}
		
		header("location:data.php");
	}
 ?>