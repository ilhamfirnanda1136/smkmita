<?php 
	include '../_header.php';
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-md-12">
 			<div class="tile">
 				<h3 class="tile-title"> Data Jurusan </h3>
	 				 <div style="margin-bottom: 20px; float: right;">
	            	<a href=""  class="btn btn-light btn-sm" style="margin-right: 5px;"><i class="glyphicon glyphicon-refresh" >Refresh</i></a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus">
         Tambah</i>
        </button>
            </div>
			 		<table class="table table-bordered">
		              <thead>
		                <tr>
		                  <th>Nomor</th>
		                  <th>Nama Jurusan</th>
		                  <th>Detail</th>
                      <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		           	<?php 
                	$datajurusan=mysqli_query($con,"select * from jurusan") or die(mysqli_error($con));
                	foreach ($datajurusan as $jurusan) {         		
                	 ?>
		                <tr>
		                  <td><?=$jurusan['idjurusan']?></td>
		                  <td><?=$jurusan['nama_jurusan']?></td>
		                  <td><button type="button" class="btn btn-primary btn-sm btn-detail" dataid="<?=$jurusan['idjurusan']?>" datanamajurusan="<?=$jurusan['nama_jurusan']?>" datadetail="<?=$jurusan['penjelasan'];?>">Detail</button></td>
                      <td><button type="button" class="btn btn-primary btn-sm btn-edit" dataid="<?=$jurusan['idjurusan']?>" datanamajurusan="<?=$jurusan['nama_jurusan']?>" datadetail="<?=$jurusan['penjelasan'];?>" >Edit</button>
                        <a href="hapus.php?id=<?=$jurusan['idjurusan']?>" class="btn-sm btn-danger btn" onclick="return confirm('yakin ingin menghapus file ini');">Hapus</a></td>
		                </tr>
		                <?php 
		                } ?>
	                </tbody>
		 			</table>		
 				</div>
 			</div>
 		</div>
 	</div>
<!-- Button trigger modal -->

 <div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penjelasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses.php" id="form" class="form-horizontal" method="post">
        <input type="hidden" name="idedit" id="id">
      <div class="modal-body">
             <p class="datanama"></p>
             <p class="datadetail"></p>
      		</div>
      	<div class="modal-footer">
	        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
      </div>
  	 </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah atau Edit Data Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses.php" id="form" class="form-horizontal" method="post">
        <input type="hidden" name="idedit" id="id-edit">
      <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Nama jurusan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" id="nama-edit" placeholder="Nama" required>
                        </div>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">penjelasan</label>
                        <div class="col-md-12">
                          <textarea name="penjelasan" id="penjelasan" required="" class="form-control"></textarea>
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
  $('.btn-detail').click(function(){
    let nama=$(this).attr('datanamajurusan');
    let detail=$(this).attr('datadetail');
    $('.datanama').html(nama);
    $('.datadetail').html(detail);
    $('#lihat').modal('show');
  });
  $('.btn-edit').click(function(){
    let id=$(this).attr('dataid');
    let nama=$(this).attr('datanamajurusan');
    let detail=$(this).attr('datadetail');
    $('#id-edit').val(id);
    $('#nama-edit').val(nama);
    $('#penjelasan').val(detail);
     $('#exampleModal').modal('show');
  });
});
</script>
 <?php 
	include_once '../_footer.php';
 ?>