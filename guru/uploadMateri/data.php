<?php 
	include_once '../header.php';
 ?>
   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upload Materi</h6>
              <div style="margin-bottom: 20px; float: right;">
	            	<a href=""  class="btn btn-light btn-sm" style="margin-right: 5px;"><i class="glyphicon glyphicon-refresh" >Refresh</i></a>
                <button data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fas fa-plus">Tambah data</i></button> 
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id upload</th>
                      <th>judul</th>
                      <th>kelas</th>
                      <th>tgl_upload</th>
                      <th>Action</th>
                      <th>check</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>id upload</th>
                      <th>judul</th>
                      <th>kelas</th>
                      <th>tgl_upload</th>
                      <th>Action</th>
                        <th>check</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $idguru=$_SESSION['guru'];
                    $dataupload=mysqli_query($con,"select * from upload_materi join kelas on upload_materi.kelas=kelas.id_kelas where id_guru='$idguru' ");
                    foreach ($dataupload as $upload ){ ?>
                    <tr>
                      <td><?=$upload['id_upload']?></td>
                      <td><?=$upload['judul']?></td>
                      <td><?=$upload['nama_kelas']?></td>
                      <td><?=tgl($upload['tgl_upload'])?></td>
                      <td> <a href="hapus.php?id=<?php echo $upload['id_upload'] ?>" class="btn-sm btn-danger btn" onclick="return confirm('yakin ingin menghapus file ini');">Hapus</a></td>
                      <td><a href="checkdownload.php?id=<?php echo $upload['id_upload']?>" class="btn-sm btn-primary btn">Check Download</a></td>
                    </tr>
                     <?php } ?>
 					</tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah file</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses.php" id="form" class="form-horizontal" method="post" enctype="multipart/form-data">
      <div class="modal-body">
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-12">Judul</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="masukkan judul" required>
                        </div>
                    </div>
                </div>
           
                <div class="form-body">
                    <div class="form-group">
                      <div align="center">
                           <label class="control-label col-md-12">Pilih file link atau upload (recommended link)</label>
                     <div class="col-md-12">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input"  id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1" id="llink">Link</label>
                            <label class="custom-control-label" for="customSwitch1" id="lupload" style="display: none;">Upload</label>
                        </div> 
                      </div>
                  </div>
                        <label class="control-label col-md-12" id="linki">Link</label>
                        <label class="control-label col-md-12" id="uploadi" style="display: none;">upload</label>
                        <div class="col-md-12">
                       <input type="text" class="form-control" name="link" id="link" placeholder="masukkan link redirect" >
                      
                            <input type="file" class="form-control-file form-control" name="upload" accept=".pdf,.docs,.xlsx,.exe" id="customFilxe" style="display: none;" >
                       
                        </div>                          
                    </div>
                </div>
              <div class="form-body">
                <div class="form-group">        
                  <label class="control-label col-md-12">Gambar</label>
                    <div class="col-md-12">
                       <input type="file" id="file-input" name="gambar" accept=".jpeg,.png,.jpg" class="form-control-file form-control">
                </div>
            </div>
            <div class="form-body">
                <div class="form-group">        
                  <label class="control-label col-md-12">Kelas</label>
                    <div class="col-md-12">
                      <select name="kelas" class="form-control">
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
            <div class="form-body">
                <div class="form-group">        
                  <label class="control-label col-md-12">keterangan</label>
                    <div class="col-md-12">
                      <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                </div>
            </div>

        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary">Reset</button>
          <button type="submit" class="btn btn-primary" name="add">Save changes</button>
      </div>
      </div>
    </form>
    </div>
  </div>
<script type="text/javascript">
   $(document).ready(function()
   {
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true)
            {
                $('#linki').hide();
                $('#link').hide();
                $('#llink').hide();
                $('#uploadi').show();
                $('#customFilxe').show();
                $('#lupload').show();
            }
            else if($(this).prop("checked") == false){
              $('#linki').show();
                $('#link').show();
                $('#llink').show();
                $('#uploadi').hide();
                $('#customFilxe').hide();
                $('#lupload').hide();
            }
        });
    });
</script>
 <?php  
 	include_once '../footer.php';
 ?>