<?php
	 include '../_config/config.php'; 
	 $id=$_GET['id'];
	 $carikode=mysqli_query($con,"select  max(id_download) from download_materi") or die (mysqli_error($con));
	 $tagl=date('Ymd');
	 $datakode=mysqli_fetch_array($carikode);
	 if ($datakode) {
            $nilaikode=substr($datakode[0],11);
            $kode=(int) $nilaikode;
            $kode+=1;
            $hasilkode="DM".$tagl."M".str_pad($kode,4,"0" ,STR_PAD_LEFT);
        }   
        else{
            $hasilkode="DM".$tagl."M0001";
        }
   	$idsiswa=$_SESSION['siswa'];
   	$dataupload=mysqli_query($con,"select * from upload_materi where id_upload='$id'") or die (mysqli_error($con));
   	$upload=mysqli_fetch_array($dataupload);
   	$siswa=mysqli_query($con,"select * from siswa where NIS='$idsiswa'") or die (mysqli_error($con));
   	$dsiswa=mysqli_fetch_array($siswa);
   	$caritotal=mysqli_query($con,"select max(total_download) as total from download_materi where id_upload='$id' and id_siswa='$idsiswa'") or die (mysqli_error($con));
   	$ctotal=mysqli_fetch_array($caritotal);
   	$kelas=$dsiswa['kelas'];
   	$total=$ctotal['total'];
   	$total+=1;
   	if ($total>1) {
   		mysqli_query($con,"update download_materi set total_download='$total' where id_upload='$id' and id_siswa='$idsiswa' ")or die (mysqli_error($con));
   		   	}
   	else
   	{
   		mysqli_query($con,"insert into download_materi (id_download,id_upload,id_siswa,kelas,total_download) values ('$hasilkode','$id','$idsiswa','$kelas','$total')") or die (mysqli_error($con));
   	}	
?>
<script type="text/javascript">
	<?php
	if ($upload['link']==null) {
      header("location:../../guru/file/filepdf/".$upload['file']."");
	}
	else{
	 ?>
	 window.location.href='<?php echo $upload['link']?>';
	 <?php
	}
	?>
</script>