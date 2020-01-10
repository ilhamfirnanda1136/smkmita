<?php 
	include '../_config/config.php';
	if (isset($_POST['add'])) 
	{
    $num=4;
    $generated_string=""; 
    $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";  
    $len = strlen($domain);  
    for ($i=0;$i<$num;$i++) 
    {  
        $index=rand(0,$len-1); 
        $generated_string=$generated_string.$domain[$index]; 
    } 
		$carikode=mysqli_query($con,"select  max(id_uploadsoal) from upload_soal") or die (mysqli_error($con));
		$tagl=date('Ymd');
		$datakode=mysqli_fetch_array($carikode);
		 if ($datakode) {
            $nilaikode=substr($datakode[0],12);
            $kode=(int) $nilaikode;
            $kode+=1;
            $hasilkode="UPS".$tagl."M".str_pad($kode,4,"0" ,STR_PAD_LEFT);
        }   
        else{
            $hasilkode="UPS".$tagl."M0001";
        }
    
        $idguru=$_SESSION['guru'];     
        $judul=trim(mysqli_real_escape_string($con,$_POST['judul']));
        $link=trim(mysqli_real_escape_string($con,$_POST['link']));
        $kelas=trim(mysqli_real_escape_string($con,$_POST['kelas']));
        $keterangan=trim(mysqli_real_escape_string($con,$_POST['keterangan']));
       	$uploadname = @$_FILES['upload']['name'];
		$sumber= @$_FILES['upload']['tmp_name'];
    $ekstensi=explode(".",$uploadname);

    $filekirim="file-".$tagl.round(microtime(true)).$generated_string.".".end($ekstensi);
		$dir="../file/filepdf/";
    move_uploaded_file($sumber,$dir.$filekirim); 

		$uploadgambar = @$_FILES['gambar']['name'];
		$sumbergambar=@$_FILES['gambar']['tmp_name'];
    $ekstensiGambar=explode(".",$uploadgambar);

    $gbr="gbr-".$tagl.round(microtime(true)).$generated_string.".".end($ekstensiGambar);
		$dirUploadgambar = "../file/gambar/";	
		move_uploaded_file($sumbergambar,$dirUploadgambar.$gbr);
			mysqli_query($con,"insert into upload_soal(id_uploadsoal,judul_soal,link,file,id_guru,kelas,gambar,keterangan,tgl_upload)values('$hasilkode','$judul','$link','$filekirim','$idguru','$kelas','$gbr','$keterangan','$tagl')")or die (mysqli_error($con));
      $cariguru=mysqli_query($con,"select max(total_upload) from guru  where NIG='$idguru'");
  $hasil=mysqli_fetch_array($cariguru);
//  echo "id akhir =".$hasil['max(id_kasir)'];
  $idtotal=$hasil['max(total_upload)']+1;
  mysqli_query($con,"update guru set total_upload='$idtotal' where NIG='$idguru'");
      header("location:data.php");
	}
?>