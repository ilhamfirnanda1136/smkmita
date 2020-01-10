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
$datasiswa1=mysqli_query($con,"select * from siswa join kelas on siswa.kelas=kelas.id_kelas order by siswa.kelas asc "); 
$jumlah=mysqli_query($con,"select COUNT(NIS) as jumlah from siswa");
$hi=mysqli_fetch_array($jumlah);


$html='<!DOCTYPE html>
 <html>
 <head>
 	<title>Report data Siswa</title>
 </head>
 <body>
 <h1 style="text-align:center;">Data Siswa</h1>
 <hr>
  <table border="1" align="center" cellspacing="0">
 <thead>
	<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>Kelas  </th>
    <th>Password</th>
    <th>Status</th>
  </tr>
</thead>
<tbody>';
foreach ($datasiswa1 as $siswa) {
	//$kelamin=$siswa['jenis_kelamin'] ==1 ? 'laki-laki':'Perempuan';
	$status=$siswa['status'] ==1 ? 'aktif':'tidak aktif';
$html.='
	<tr>
		<td>'.$siswa['NIS'].'</td>
		<td>'.$siswa['nama_siswa'].'</td>
		<td>'.$siswa['alamat'].'</td>
		<td>'.$siswa['jenis_kelamin'].'</td>
		<td>'.$siswa['nama_kelas'].'</td>
		<td>'.$siswa['password'].'</td>
		<td>'.$status.'</td>
	</tr>';
}
$html.='	
</tbody>
 </table>
  <h3>Total Siswa= '.$hi['jumlah'].' </h3>
 </body>
 </html>';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
 ?>