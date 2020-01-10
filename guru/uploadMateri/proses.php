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
		$carikode=mysqli_query($con,"select  max(id_upload) from upload_materi") or die (mysqli_error($con));
		$tagl=date('Ymd');
		$datakode=mysqli_fetch_array($carikode);
		 if ($datakode) {
            $nilaikode=substr($datakode[0],11);
            $kode=(int) $nilaikode;
            $kode+=1;
            $hasilkode="UP".$tagl."M".str_pad($kode,4,"0" ,STR_PAD_LEFT);
        }   
        else{
            $hasilkode="UP".$tagl."M0001";
        }
    
        $idguru=$_SESSION['guru'];      
        $judul=trim(mysqli_real_escape_string($con,$_POST['judul']));
        $link=trim(mysqli_real_escape_string($con,$_POST['link']));
        $kelas=trim(mysqli_real_escape_string($con,$_POST['kelas']));
        $keterangan=trim(mysqli_real_escape_string($con,$_POST['keterangan']));
       	$uploadname = @$_FILES['upload']['name'];
		$sumber= @$_FILES['upload']['tmp_name'];
    $ekstensi=explode(".",$uploadname);
    if (empty($uploadname)) {
      $filekirim=null;
    }
    else{
      $filekirim="file-".$tagl.round(microtime(true)).$generated_string.".".end($ekstensi);  
    }
    
		$dir="../file/filepdf/";
    move_uploaded_file($sumber,$dir.$filekirim); 

		$uploadgambar = @$_FILES['gambar']['name'];
		$sumbergambar=@$_FILES['gambar']['tmp_name'];
    $ekstensiGambar=explode(".",$uploadgambar);
    if (empty($uploadgambar)) {
      $gbr=null;
    }
    else{
      $gbr="gbr-".$tagl.round(microtime(true)).$generated_string.".".end($ekstensiGambar);  
    }
    
		$dirUploadgambar = "../file/gambar/";	
		move_uploaded_file($sumbergambar,$dirUploadgambar.$gbr);
			mysqli_query($con,"insert into upload_materi (id_upload,judul,link,file,id_guru,kelas,gambar,keterangan,tgl_upload)values('$hasilkode','$judul','$link','$filekirim','$idguru','$kelas','$gbr','$keterangan','$tagl')")or die (mysqli_error($con));
      $cariguru=mysqli_query($con,"select max(total_upload) as max from guru  where NIG='$idguru'")  or die(mysqli_error($con));
  $hasil=mysqli_fetch_array($cariguru);
  $idtotal=$hasil['max']+1;
  mysqli_query($con,"update guru set total_upload='$idtotal' where NIG='$idguru'") or die(mysqli_error($con));
     header("location:data.php");
	}
?>