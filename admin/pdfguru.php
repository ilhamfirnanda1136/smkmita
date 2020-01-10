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
$dataguru=mysqli_query($con,"select * from guru ");
$guru=mysqli_query($con,"select COUNT(NIG) as jumlah from guru ");
$if=mysqli_fetch_array($guru);
$html='<!DOCTYPE html>
 <html>
 <head>
 	<title>Report data Guru</title>
 </head>
 <body>
 <h1 style="text-align:center;">Data Guru</h1>
 <hr>
 <table border="1" align="center" cellpadding="10" cellspacing="0">
 <thead>
	<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    
    <th>Password</th>
    <th>total upload</th>
    <th>Status</th>
  </tr>
</thead>
<tbody>';
foreach ($dataguru as $guru) {
	$kelamin=$guru['jenis_kelamin'] ==1 ? 'laki-laki':'Perempuan';
	$status=$guru['status'] ==1 ? 'aktif':'tidak aktif';
$html.='
	<tr>
		<td>'.$guru['NIG'].'</td>
		<td>'.$guru['nama_guru'].'</td>
		<td>'.$guru['alamat'].'</td>
		<td>'.$kelamin.'</td>
		
		<td>'.$guru['password'].'</td>
		<td>'.$guru['total_upload'].' upload</td>
		<td>'.$status.'</td>
	</tr>';
} 
$html.='	
</tbody>
 </table>
 </center>
 <h3>Total Guru = '.$if['jumlah'].'</h3>
 </body>
 </html>';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
 ?>