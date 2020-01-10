<?php include_once '../header.php';
$session=$_SESSION['siswa'] ;
$data=mysqli_query($con,"select * from siswa where NIS = '$session'") or die(mysqli_error($con));
$siswa=mysqli_fetch_array($data);
 ?>
<h1>halo Selamat Datang Diwebsite Kami <?=$siswa['nama_siswa']?></h1>
<?php include_once '../footer.php' ?>