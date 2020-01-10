<?php   
    require_once '../_config/config.php'; 
     
     if (isset($_POST['add'])){
        $carikode= mysqli_query($con,"select max(NIS) from siswa") or die(mysql_error($con));
        $datakode=mysqli_fetch_array($carikode);
        if ($datakode) {
            $nilaikode=substr($datakode[0], 1);
            $kode=(int) $nilaikode;
            $kode+=1;
            $hasilkode="S".str_pad($kode,4,"0" ,STR_PAD_LEFT);
        }   
        else{
            $hasilkode="S0001";
        }

        $id=trim(mysqli_real_escape_string($con,$_POST['idedit']));
        $nama=trim(mysqli_real_escape_string($con,$_POST['nama']));
        $alamat=trim(mysqli_real_escape_string($con,$_POST['alamat']));
        $jkel=trim(mysqli_real_escape_string($con,$_POST['jenis_kelamin']));
                $telpon=trim(mysqli_real_escape_string($con,$_POST['telpon']));
        $kelas=trim(mysqli_real_escape_string($con,$_POST['kelas']));
        if($id==''){
        mysqli_query($con,"insert into siswa (NIS,nama_siswa,alamat,nomor_telp,kelas,jenis_kelamin,password,status) values('$hasilkode','$nama','$alamat','$telpon','$kelas','$jkel','hkajweh98qh3384juhakuw',1)") or die(mysqli_error($con));    
        }
        else{
         mysqli_query($con,"update siswa set nama_siswa='$nama',alamat='$alamat',jenis_kelamin='$jkel',nomor_telp='$telpon',
            kelas='$kelas'
         where NIS='$id'") or die(mysqli_error($con));
        }
        echo "<script>window.location='data.php';</script>" ;
    }
    elseif (isset($_POST['aktif'])) {
        $id=trim(mysqli_real_escape_string($con,$_POST['id']));
      mysqli_query($con,"update siswa set status='1' where NIS='$id'") or die(mysqli_error($con));
       echo "<script>window.location='data.php';</script>" ;
    }
    elseif (isset($_POST['tidakaktif'])) {

        $id=trim(mysqli_real_escape_string($con,$_POST['id']));
      mysqli_query($con,"update siswa set status='0' where NIS='$id'") or die(mysqli_error($con));
   
         echo "<script>window.location='data.php';</script>" ;
    }
    ?>
