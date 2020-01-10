<?php 
	//include_once '../../_config/config.php';
	include_once '../_header.php';
?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Data Siswa</h3>
            <div align="center" class="">
              <form method="post" class="form-inline">
              <label class="control-label col-md-4">Cari Berdasarkan Kelas</label>
                <select name="pilih" class="col-md-4 form-control" >
                  <option value="lihat">--Lihat Semua--</option>
                  <?php $datasiswas=mysqli_query($con,"select * from kelas");
                  foreach ($datasiswas as $siswa) {
                    ?>
                    <option value="<?=$siswa['id_kelas']?>"
                      <?php if (isset($_POST['cari'])) {
                        $data=trim(mysqli_escape_string($con,$_POST['pilih']));
                        if ($siswa['id_kelas']==$data) {
                          echo "selected";
                        }
                      }
                      ?>
                      >Kelas <?=$siswa['nama_kelas']?></option>
                      }
                    <?php
                  } ?> 
                </select>
                <button type="submit" name="cari" class="btn btn-primary btn-md" style="margin-left: 5px;">Cari</button>
                </form>
              
          </div>
            <div style="margin-bottom: 20px; float: right;">
            	<a href=""  class="btn btn-light" style="margin-right: 5px;"><i class="glyphicon glyphicon-refresh" >Refresh</i></a>
 				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus">
 				 Tambah</i>
				</button>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped" id="table-siswa">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>kelas</th>
                    <th>Nomor Telpon</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Pilih Status</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                	<?php 
                  if (isset($_POST['cari'])) {
                    $cari=trim(mysqli_escape_string($con,$_POST['pilih']));
                    if ($cari=='lihat') {
                    $datasiswa=mysqli_query($con,"select * from siswa join kelas on siswa.kelas=kelas.id_kelas order by NIS desc") or die(mysqli_error($con));
                    }
                    else{
                      $datasiswa=mysqli_query($con,"select * from siswa join kelas on siswa.kelas=kelas.id_kelas  where kelas='$cari' order by NIS desc") or die(mysqli_error($con));  
                    }
                  }
                  else{
                    $datasiswa=mysqli_query($con,"select * from siswa join kelas on siswa.kelas=kelas.id_kelas  order by NIS desc") or die(mysqli_error($con));
                }
                	
                	foreach ($datasiswa as $siswa) {         		
                	 ?>
                  <tr>
                    <td><?=$siswa['NIS']; ?></td>
                    <td><?=$siswa['nama_siswa']; ?></td>
                    <td><?=$siswa['alamat']; ?></td>
                    <td><?=$siswa['jenis_kelamin']==1 ? 'laki-laki':'perempuan' ?></td>
                    <td><?=$siswa['nama_kelas'];?></td>
                    <td><?=$siswa['nomor_telp']?></td>
                    <td><?=$siswa['password']; ?></td>
                    <td><?php
                    if ($siswa['status']==1) {
                      echo "Aktif";
                    }
                    else{
                      echo "Tidak Aktif";
                    }
                    ?></td>
                    <td>
                    	<form action="proses.php" method="post">
                    		<input type="hidden" name="id" value="<?=$siswa['NIS'];?>">
                    		<button type="submit" id="aktif" name="aktif" class="btn btn-warning btn-sm">Aktif</button>
                    	</form>
                    	<form action="proses.php" method="post">
                    		<input type="hidden" name="id" value="<?=$siswa['NIS'];?>">
						<button type="submit" id="tidakaktif" name="tidakaktif" class="btn btn-danger btn-sm">Tidak aktif</button></form></td>
            <td><button type="button" class="btn btn-sm btn-primary btn-editguru" dataid="<?=$siswa['NIS'];?>" datanama="<?=$siswa['nama_siswa']?>" dataalamat="<?=$siswa['alamat'];?>" datajkel="<?=$siswa['jenis_kelamin']?>" datajurusan="<?=$siswa['jurusan'];?>" datakelas="<?=$siswa['kelas'];?>"><i class="fas fa-edit">Edit</i></button></td>
						
                  </tr>
                  <?php
              		}
              		?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
	</div>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah atau Edit Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses.php" id="form" class="form-horizontal" method="post">
        <input type="hidden" name="idedit" id="id">
      <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Alamat</label>
                        <div class="col-md-12">
                          <textarea class="form-control" name="alamat" id="alamat" required=""></textarea>
                            
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Nomor Telpon</label>
                        <div class="col-md-12">
                         <input type="text" maxlength="12" name="telpon" class="form-control">
                            
                        </div>
                    </div>
                </div>
                  <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Jenis Kelamin</label>
                        <div class="col-md-12">
                        	<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        	<option value="1">laki-laki</option>
                        	<option value="0">Perempuan</option>	
                        	</select>     
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Kelas</label>
                        <div class="col-md-12">
                          <select name="kelas" id="kelas" class="form-control">
                            <?php $datakelas=mysqli_query($con,"select * from kelas");
                                foreach ($datakelas as $kelas) {
                                  ?>
                                  <option value="<?=$kelas['id_kelas']?>"><?=$kelas['nama_kelas']?></option>
                                  <?php
                                }
                             ?>
                          </select>     
                        </div>
                    </div>
                </div>
      		</div>
      	<div class="modal-footer">
	        <button type="reset" class="btn btn-secondary">Reset</button>
	        <button type="submit" class="btn btn-primary" name="add">Save changes</button>
      </div>
  	 </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
  $('.btn-editguru').click(function(){
    let id=$(this).attr('dataid');
    let nama=$(this).attr('datanama');
    let alamat=$(this).attr('dataalamat');
    let jkel=$(this).attr('datajkel');
    let kelas=$(this).attr('datakelas');
    $('#id').val(id);
    $('#nama').val(nama);
    $('#alamat').val(alamat);
    $('#jenis_kelamin').val(jkel);
    $('#kelas').val(kelas);
    $('#exampleModal').modal('show');
  });
  $('#table-siswa').DataTable({
    scrollY:'250px',
  });
});
  
</script>
<?php 
	include_once '../_footer.php';
 ?>