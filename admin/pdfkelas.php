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
$datakelas=mysqli_query($con,"select * from kelas join jurusan on kelas.jurusan=jurusan.idjurusan ");
$kelas=mysqli_query($con,"select COUNT(id_kelas) as jumlah from kelas ");
$if=mysqli_fetch_array($kelas);
$html='<!DOCTYPE html>
 <html>
 <head>
 	<title>Report data Kelas</title>
 </head>
 <body>
 <h1 style="text-align:center;">Data Kelas</h1>
 <hr>
 <table border="1" align="center" cellpadding="10" cellspacing="0">
 <thead>
	<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Jurusan</th>
  </tr>
</thead>
<tbody>';
foreach ($datakelas as $kelass) {
$html.='
	<tr>
		<td>'.$kelass['id_kelas'].'</td>
		<td>'.$kelass['nama_kelas'].'</td>
		<td>'.$kelass['nama_jurusan'].'</td>
	</tr>';
} 
$html.='	
</tbody>
 </table>
 </center>
 <h3>Total kelas = '.$if['jumlah'].'</h3>
 </body>
 </html>';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
 ?>