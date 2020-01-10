<?php require_once '../header.php';
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
 ?>
<section class="container">
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data download soal</h6>
              <div style="margin-bottom: 20px; float: right;">
	            	<a href=""  class="btn btn-light btn-sm" style="margin-right: 5px;"><i class="glyphicon glyphicon-refresh" >Refresh</i></a>
	            	<a href="data.php"  class="btn btn-warning btn-sm" style="margin-right: 5px;"><i class="fas fa-backward" > Kembali</i></a>
                <a href="../pdfDownloadSoal.php?id=<?php echo $idupload ?>" target="_blank" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="far fa-file-pdf"> Download data</i></a> 
                </div>

                <h4 class="text-center">Kelas <?php echo $cari['nama_kelas'];?></h4>
                <h1 class="text-center">Judul: <?=$cari['judul_soal']?></h1>
                
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id download</th>
                      <th>id siswa</th>
                      <th>nama siswa</th>
                      <th>total download</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>id download</th>
                      <th>id siswa</th>
                      <th>nama siswa</th>
                    <th>total download</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    foreach ($datadownload as $download ){ ?>
                    <tr>
                      <td><?=$download['id_downloadsoal']?></td>
                      <td><?=$download['id_siswa']?></td>
                      <td><?=$download['nama_siswa']?></td>
                      <td><?=$download['total_download']?> Kali</td>
                    </tr>
                     <?php } ?>
 					</tbody>
                </table>
              </div>
            </div>
          </div>
</section>
<?php require_once '../footer.php' ?>