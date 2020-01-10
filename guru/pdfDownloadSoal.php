<?php 
	date_default_timezone_set('Asia/Jakarta');
	session_start();
	$sql_details = array(
		'user' => 'root',
		'pass' => '',
		'db'   => 'smkmita',
		'host' => 'localhost'
	);
	 $con=$sql_details;
	// include_once 'conn.php';
	$con=mysqli_connect($con['host'],$con['user'],'',$con['db']);
	if (mysqli_connect_errno()) {
		echo mysqli_connect_error();
	}
	require_once __DIR__ . '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
 	 $idguru=$_SESSION['guru'];
     $idupload=@$_GET['id'];
      $datadownload=mysqli_query($con,
                    	"
                    	select * from download_soal 
                    	inner join upload_soal on download_soal.id_uploadSoal=upload_soal.id_uploadSoal
                    	INNER JOIN siswa ON download_soal.id_siswa=siswa.NIS
                      	where download_soal.id_uploadSoal='$idupload'

                     ") or die(mysqli_error($con));
      $downloade=mysqli_fetch_array($datadownload);
      $carikelas=mysqli_query($con,"select * from upload_soal INNER join kelas on upload_soal.kelas=kelas.id_kelas where id_uploadSoal='$idupload'");
      $cari=mysqli_fetch_array($carikelas);
$html='<!DOCTYPE html>
 <html>
 <head>
 	<title>Report data Soal</title>
 </head>
 <body>
 <h1 style="text-align:center;">Data Download Soal</h1>
 <hr>
  <h4 style="text-align:center;" >Kelas  '.$cari['nama_kelas'].'</h4>
       <h1 style="text-align:center;">Judul: '.$cari['judul_soal'].'</h1>
 <table border="1" align="center" cellpadding="10" cellspacing="0">
 <thead>
	<tr>
      <th>id download</th>
	  <th>id Upload</th>
	  <th>judul</th>
	  <th>id siswa</th>
	  <th>nama siswa</th>
	  <th>kelas</th>
	  <th>total download</th>
  </tr>
</thead>
<tbody>';
foreach ($datadownload as $download) {
$html.='
	<tr>
		 <td>'.$download['id_downloadsoal'].'</td>
	      <td>'.$download['id_uploadSoal'].'</td>
	      <td>'.$download['judul_soal'].'</td>
	      <td>'.$download['id_siswa'].'</td>
	      <td>'.$download['nama_siswa'].'</td>
	      <td>'.$download['kelas'].'</td>
	      <td>'.$download['total_download'].' Kali</td>
	</tr>';
} 
$html.='	
</tbody>
 </table>
 </center>
 </body>
 </html>';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
 ?> 