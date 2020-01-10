<?php include_once '../header.php' ?>
<div class="row">
		<?php
	$idsiswa=$_SESSION['siswa'];
	//$umum=mysqli_query($con,"select khusukan from upload_materi where kelas='$kelas' ");
	$batas=3;
 	$hal=@$_GET['hal'];
 	if (empty($hal)) {
 		$posisi=0;
		$hal=1;
 	}
 	else{
 	$posisi=($hal-1)*$batas;
 	}
	$datasiswa=mysqli_query($con,"select * from siswa where NIS='$idsiswa' ");
	$siswa=mysqli_fetch_array($datasiswa); 
	$kelas=$siswa['kelas'];
	$downloadsoal=mysqli_query($con,"select * from upload_soal where kelas='$kelas'  order by id_uploadsoal desc LIMIT $posisi,$batas  ");
	foreach ($downloadsoal as $soal) {
	 ?>
 <div class="col-md-4">
	    <div class="card">
	        <div class="card-body">
	            <div class="mx-auto d-block">
	            	<?php 
	            		if (is_null($soal['gambar']) or empty($soal['gambar'])) {
	            			?>
	            			 <img class=" mx-auto d-block" src="../images/noimage.png" alt="Card image cap" height="200px">
	            			<?php
	            		}
	            		else{
	            		?>
	            		    <img class=" mx-auto d-block" src="../../guru/file/gambar/<?php echo $soal['gambar']?>" alt="Card image cap" height="200px">
	            		<?php
	            	}
	            	 ?>
	             
	                <h5 class="text-sm-center mt-2 mb-1"><?php echo $soal['judul_soal']; ?></h5>
	                <div class="location text-sm-center">
	                <hr>
	                <p><?php echo $soal['tgl_upload']; ?><br><?php echo $soal['keterangan']; ?></p>	
	            </div>
	            <hr>
	            <div class="card-text text-sm-center">
	               <a href="unduh.php?id=<?=$soal['id_uploadsoal']?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Unduh OR View</a></div>
	            </div>
	        </div>
	        
	    </div>
	</div>

<?php 
}
	  ?>
</div>
  <div style="float: left;">
 					<?php 
 						$jml=mysqli_num_rows(mysqli_query($con,"select * from upload_soal where kelas='$kelas' "));
 					echo "Jumlah Data : <b>$jml</b>";
 					 ?>
 				</div>
 					<nav aria-label="Page navigation example">
 					<ul class="pagination" style="float: right;">
 						<?php 
 						$jmlal=ceil($jml/$batas);
 						for ($i=1;$i<=$jmlal;$i++) { 
 							if ($i != $hal) {
 							echo " <li class=\"page-item\"><a class=\"page-link\" href=\"?hal=$i\">$i</a></li>";	
 							}
 							else{
 								echo "<li class=\"active page-item\"><a class=\"page-link\"> $i</a></li>";
 							}
 						}
 						 ?>
 					</ul>
 				</nav>
<?php include_once '../footer.php' ?>