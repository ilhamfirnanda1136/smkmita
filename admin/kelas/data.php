<?php 
	include '../_header.php';
 ?>
 <section class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="tile">
 				<h3 class="tile-title">Data Kelas</h3>
                        
 				 <div style="margin-bottom: 20px; float: right;">
            	<a href=""  class="btn btn-light" style="margin-right: 5px;"><i class="glyphicon glyphicon-refresh" >Refresh</i></a>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus">Tambah data</i></button>
            	</div>
            	<div class="table-responsive">
            		<table class="table table-bordered table-hover" id="table-kelas">
            			<thead>
            				<tr> 
            					<th>ID Kelas</th>
            					<th>Nama Kelas</th>
                      <th>jurusan</th>
                      <th>Action</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php 
                      $no=1;
            				$datakelas=mysqli_query($con,"select * from kelas join jurusan on kelas.jurusan=jurusan.idjurusan")or die(mysqli_error($con));
            				foreach ($datakelas as $kelas ) {
            				 ?>
            				<tr>
            					<td><?=$no++?></td>
            					<td><?=$kelas['nama_kelas']?></td>
                      <td><?=$kelas['nama_jurusan']?></td>
                      <td><button type="button" class="btn btn-primary btn-sm btn-edit" dataid="<?=$kelas['id_kelas']?>" datanamakelas="<?=$kelas['nama_kelas']?>" datajurusan="<?=$kelas['jurusan'];?>" >Edit</button>
                        <a href="hapus.php?id=<?=$kelas['id_kelas']?>" class="btn-sm btn-danger btn" onclick="return confirm('yakin ingin menghapus file ini');">Hapus</a></td>
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
 </section>
 <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses.php" id="form" class="form-horizontal" method="post">
      <div class="modal-body">
                <div class="form-body">
                  <input type="hidden" name="id" id="id-edit">
                    <div class="form-group">
                        <label class="control-label col-md-12">Nama kelas</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Tambah" required>
                        </div>
                    </div>
                </div> 
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">jurusan</label>
                        <div class="col-md-12">
                          <select name="jurusan" class="form-control" id="edit-jurusan">
                            <?php
                              $datajurusan=mysqli_query($con,"select * from jurusan ");
                              foreach ($datajurusan as $jurusan ) {
                                ?>
                                <option value="<?=$jurusan['idjurusan']?>"><?=$jurusan['nama_jurusan']?></option>
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
   $('.btn-edit').click(function(){
    let id=$(this).attr('dataid');
    let nama=$(this).attr('datanamakelas');
    let jurusan=$(this).attr('datajurusan');
    $('#id-edit').val(id);
    $('#kelas').val(nama);
    $('#edit-jurusan').val(jurusan);
     $('#exampleModal').modal('show');
  });
});
</script>
 <?php 
 	include '../_footer.php';
  ?>