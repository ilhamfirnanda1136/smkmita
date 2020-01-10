<?php   
    require_once '../_config/config.php'; 
    // require_once '../_asset/libs/vendor/autoload.php';
    // use Ramsey\Uuid\Uuid;
    // use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
     
     if (isset($_POST['add'])){
        $carikode= mysqli_query($con,"select max(NIG) from guru") or die(mysql_error($con));
        $datakode=mysqli_fetch_array($carikode);
        if ($datakode) {
            $nilaikode=substr($datakode[0], 1);
            $kode=(int) $nilaikode;
            $kode+=1;
            $hasilkode="G".str_pad($kode,4,"0" ,STR_PAD_LEFT);
        }   
        else{
            $hasilkode="G0001";
        }
       // $uuid = Uuid::uuid4()->toString();
        $id=trim(mysqli_real_escape_string($con,$_POST['idedit']));
        $nama=trim(mysqli_real_escape_string($con,$_POST['nama']));
        $alamat=trim(mysqli_real_escape_string($con,$_POST['alamat']));
        $jkel=trim(mysqli_real_escape_string($con,$_POST['jenis_kelamin']));
       /// $spesialis=trim(mysqli_real_escape_string($con,$_POST['spesialis']));
        if($id=='')
        {
        mysqli_query($con,"insert into guru (NIG,nama_guru,alamat,jenis_kelamin,password,total_upload,status) values('$hasilkode','$nama','$alamat','$jkel','oier343enjaioewrkl9038234','0','1')")or die(mysqli_error($con));    
        }
        else
        {
         mysqli_query($con,"update guru set nama_guru='$nama',alamat='$alamat',jenis_kelamin='$jkel'
         where NIG='$id'") or die(mysqli_error($con));
        }
        
        echo "<script>window.location='data.php';</script>" ;
    }
    elseif (isset($_POST['aktif'])) {
        $id=trim(mysqli_real_escape_string($con,$_POST['id']));
      mysqli_query($con,"update guru set status='1' where NIG='$id'") or die(mysqli_error($con));
       echo "<script>window.location='data.php';</script>" ;
    }
    elseif (isset($_POST['tidakaktif'])) {

        $id=trim(mysqli_real_escape_string($con,$_POST['id']));
      mysqli_query($con,"update guru set status='0' where NIG='$id'") or die(mysqli_error($con));
        // echo $id;
         echo "<script>window.location='data.php';</script>" ;
    }
    ?>