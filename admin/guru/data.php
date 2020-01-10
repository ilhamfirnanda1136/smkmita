<?php 
	//include_once '../../_config/config.php';
	include_once '../_header.php';
?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Table Guru</h3>
            <div style="margin-bottom: 20px; float: right;">
            	<a href=""  class="btn btn-light" style="margin-right: 5px;"><i class="glyphicon glyphicon-refresh" >Refresh</i></a>
 				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus">
 				 Tambah</i>
				</button>
            </div>
            <div class="table-responsive ">
              <table class="table table-hover table-bordered" id="tableguru">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama-Guru</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Password</th>
                    <th>Total_upload</th>
                    <th>Status</th>
                    <th>Pilih Status</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                	<?php 
                	$dataguru=mysqli_query($con,"select * from guru ") or die(mysqli_error($con));
                	foreach ($dataguru as $guru) {         		
                	 ?>
                  <tr>
                    <td><?=$guru['NIG']; ?></td>
                    <td><?=$guru['nama_guru']; ?></td>
                    <td><?=$guru['alamat']; ?></td>
                    <td><?=$guru['jenis_kelamin']==1 ? 'laki-laki':'Perempuan'; ?></td>
                    <td><?=$guru['password']=='oier343enjaioewrkl9038234' ? 'Password Belum diset' :$guru['password'] ; ?></td>
                    <td><?=$guru['total_upload'];?> kali</td>
                    <td><?php
                    if($guru['status']==1){
                      echo "aktif";
                    }
                    else{
                      echo "tidak aktif";
                    }?></td>
                    <td>
                    	<form action="proses.php" method="post">
                    		<input type="hidden" name="id" value="<?=$guru['NIG'];?>">
                    		<button type="submit" id="aktif" name="aktif" class="btn btn-warning btn-sm">Aktif</button>
                    	</form>
                    	<form action="proses.php" method="post">
                    		<input type="hidden" name="id" value="<?=$guru['NIG'];?>">
						<button type="submit" id="tidakaktif" name="tidakaktif" class="btn btn-danger btn-sm">Tidak aktif</button></form></td>
            <td><button type="button" class="btn btn-sm btn-primary btn-editguru" dataid="<?=$guru['NIG'];?>"
              datanama="<?=$guru['nama_guru'];?>" dataalamat="<?=$guru['alamat'];?>" datajkel="<?=$guru['jenis_kelamin'];?>" databidang="<?=$guru['bidang'];?>"><i class="fas fa-edit">Edit</i></button></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah atau Edit Data Guru</h5>
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
                          <textarea name="alamat" id="alamat" required="" class="form-control"></textarea>
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
    let spesialis=$(this).attr('databidang');
    $('#id').val(id);
    $('#nama').val(nama);
    $('#alamat').val(alamat);
    $('#jenis_kelamin').val(jkel);
    $('#spesialis').val(spesialis);
    $('#exampleModal').modal('show');
  });
  $('#tableguru').DataTable({
     fixedHeader: true,          
             "columnDefs": [
    { "width": "20%", "targets": 0 }
  ]
  });
});
  
</script>
<noscript>you need to enable javascript</noscript>
<?php 
	include_once '../_footer.php';
 ?>