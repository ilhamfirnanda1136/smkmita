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
$datajurusan=mysqli_query($con,"select * from jurusan ");
$jurusan=mysqli_query($con,"select COUNT(idjurusan) as jumlah from jurusan ");
$if=mysqli_fetch_array($jurusan);
$html='<!DOCTYPE html>
 <html>
 <head>
 	<title>Report data Jurusan</title>
 </head>
 <body>
 <h1 style="text-align:center;">Data Jurusan</h1>
 <hr>
 <table border="1" align="center" cellpadding="10" cellspacing="0">
 <thead>
	<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>penjelasan</th>
  </tr>
</thead>
<tbody>';
foreach ($datajurusan as $jurusans) {
$html.='
	<tr>
		<td>'.$jurusans['idjurusan'].'</td>
		<td>'.$jurusans['nama_jurusan'].'</td>
		<td>'.$jurusans['penjelasan'].'</td>
	</tr>';
} 
$html.='	
</tbody>
 </table>
 </center>
 <h3>Total Jurusan = '.$if['jumlah'].'</h3>
 </body>
 </html>';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
 ?>