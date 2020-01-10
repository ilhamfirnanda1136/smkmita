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
	function base_url($url = null){
		$base_url="http://localhost/smkmita/guru";
		if ($url!=null) {
			return $base_url."/".$url;
		}
		else{
			return $base_url;
		}
	}
	function tgl($tgl){
		$tanggal=substr($tgl,8,2);
		$bulan=substr($tgl,5,2);
		$tahun=substr($tgl,0,4);
		switch ($bulan){
			case '01':
			$tulis="Januari";
			break;
			case '02':
			$tulis="february";
			break;
			case '03':
			$tulis="maret";
			break;
			case '04':
			$tulis="april";
			break;
			case '05':
			$tulis="mei";
			break;
			case '06':
			$tulis="Juni";
			break;
			case '07':
			$tulis="juli";
			break;
			case '08':
			$tulis="agustus";
			break;
			case '09':
			$tulis="september";
			break;
			case '10':
			$tulis="oktober";
			break;
			case '11':
			$tulis="november";
			break;
			case '12':
			$tulis="desember";
			break;
		}
		return $tulis.", ".$tanggal."/".$bulan."/".$tahun;
	}
 ?>