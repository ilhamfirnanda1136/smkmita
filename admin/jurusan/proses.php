<?php 
	 require_once '../_config/config.php'; 
 	if (isset($_POST['add'])) {
 		    $id=trim(mysqli_real_escape_string($con,$_POST['idedit']));
        $nama=trim(mysqli_real_escape_string($con,$_POST['nama']));
        $penjelasan=trim(mysqli_real_escape_string($con,$_POST['penjelasan']));
        if ($id=='') {
       		 mysqli_query($con,"insert into jurusan (idjurusan,nama_jurusan,penjelasan) values('','$nama','$penjelasan')")or die(mysqli_error($con));
       	 }
       	 else{
       	 	 mysqli_query($con,"update jurusan set nama_jurusan='$nama',penjelasan='$penjelasan' where idjurusan='$id'")or die(mysqli_error($con));	
       	 }
           
          echo "<script>window.location='data.php';</script>" ;
 	}
	
 ?>