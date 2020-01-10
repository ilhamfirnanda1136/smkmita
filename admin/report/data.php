<?php 
	include_once '../_header.php';
   $dataguru=mysqli_query($con,"select *,count(NIG)as total from guru ");
   $totalguru=mysqli_fetch_assoc($dataguru) or die(mysqli_error($con)); 
   $datasiswa=mysqli_query($con,"select *,count(NIS)as total from siswa ");
   $totalsiswa=mysqli_fetch_assoc($datasiswa) or die(mysqli_error($con));
   $datakelas=mysqli_query($con,"select *,count(id_kelas)as total from kelas ");
   $totalkelas=mysqli_fetch_assoc($datakelas) or die(mysqli_error($con));
    $datajurusan=mysqli_query($con,"select *,count(idjurusan)as total from jurusan ");
   $totaljurusan=mysqli_fetch_assoc($datajurusan) or die(mysqli_error($con));  
 ?>
   <div class="row" style="margin-left: 50px">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Total Guru</h4>
            
              <p><b><?php echo $totalguru['total'];?></b></p>
            </div>
          </div>
          <div align="center">
          	<a href="<?=base_url('pdfguru.php')?>" class="btn btn-success btn-md" target="_blank"><i class="fas fa-save"></i> Saved as Pdf</a>
          </div>
          
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon far fa-user fa-3x"></i>
            <div class="info">
              <h4>Total Murid</h4>
              <p><b><?php echo $totalsiswa['total'];?></b></p>
            </div>
          </div>
          <div align="center">
              <a href="<?=base_url('pdfsiswa.php')?>"  target="_blank" class="btn btn-success btn-md"><i class="fas fa-save"></i> Saved as Pdf</a>
            </div>
        </div>

         <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap fa-3x"></i>
            <div class="info">
              <h4>Total Jurusan</h4>
              <p><b><?php echo $totaljurusan['total'];?></b></p>
            </div>
          </div>
          <div align="center">
              <a href="<?=base_url('pdfjurusan.php')?>"  target="_blank" class="btn btn-success btn-md"><i class="fas fa-save"></i> Saved as Pdf</a>
            </div>
        </div>

         <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fas fa-school fa-3x"></i>
            <div class="info">
              <h4>Total Kelas</h4>
              <p><b><?php echo $totalkelas['total'];?></b></p>
            </div>
          </div>
          <div align="center">
              <a href="<?=base_url('pdfkelas.php')?>"  target="_blank" class="btn btn-success btn-md"><i class="fas fa-save"></i> Saved as Pdf</a>
            </div>
        </div>
    </div>
<?php 
	require_once '../_footer.php';
 ?>