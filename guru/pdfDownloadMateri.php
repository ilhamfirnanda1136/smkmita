<?php 
	date_default_timezone_set('Asia/Jakarta');
	//session_start();
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
	$idguru=$_SESSION['guru'];
    $idupload=@$_GET['id'];
	require_once __DIR__ . '../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();
 //	$idguru=$_SESSION['guru'];
 
      $dataDownload=mysqli_query($con,
                    	"select * from download_materi 
                    	inner join upload_materi on download_materi.id_upload=upload_materi.id_upload 
                    	INNER JOIN siswa ON download_materi.id_siswa=siswa.NIS
                    	where download_materi.id_upload='$idupload'
                     ") or die(mysqli_error($con));
      $downloade=mysqli_fetch_array($datadownload);
      $carikelas=mysqli_query($con,"select * from upload_materi INNER join kelas on upload_materi.kelas=kelas.id_kelas where id_upload='$idupload'");
      $cari=mysqli_fetch_array($carikelas);
$html='<!DOCTYPE html>
 <html>
 <head>
 	<title>Report data materi</title>
 </head>
 <body>
 <h1 style="text-align:center;">Data Download Materi</h1>
 <hr>
 <h4  style="text-align:center;">Kelas'.$cari['nama_kelas'].'</h4>
   <h1  style="text-align:center;">Judul: '.$cari['judul'].'</h1>
 <table border="1" align="center" cellpadding="10" cellspacing="0">
 <thead>
	<tr>
      <th>id download</th>
	  <th>id siswa</th>
	 
	  <th>nama siswa</th>
	  <th>kelas</th>
	  <th>total download</th>
  </tr>
</thead>
<tbody>';
foreach ($dataDownload as $download) {
$html.='
	<tr>
		 <td>'.$download['id_download'].'</td>
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