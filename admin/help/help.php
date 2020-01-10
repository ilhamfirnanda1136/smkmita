<?php include '../_header.php'; ?>
<script type="text/javascript">
  $(document).ready(function() {
    function toggleIcon(e) {
      $(e.target)
        .prev('.card-header').find(".fa").toggleClass('fa-caret-right fa-caret-down');
    }
    $('.accordion').on('hidden.bs.collapse', toggleIcon);
    $('.accordion').on('shown.bs.collapse', toggleIcon);
  });
</script>
<style type="text/css">
	.btn-link{
		color: #009688;
	}
</style>

<header class="content-header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <h1 class="omni-title">Help</h1>
        <h3 class="omni-sub">Bantuan Untuk Program ini</h3>
      </div>
    </div>
  </div>
</header>
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-10 mx-auto">
        <div class="accordion" id="faqExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btx btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none;">
                  <h4>
                    <span>
                      <i class="fa fa-caret-right"></i>
                    </span>
                   Apa yang ada di website ini? </h4>
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="fade collapse" aria-labelledby="headingOne" data-parent="#faqExample">
              <div class="card-body">
               
               <ul>
                 <li> di page guru ada list nama guru-guru dan bisa menambah edit dan merubah status guru tersebut yang dapat berfungsi untuk login halaman guru</li>
                 <li> di page siswa ada list nama siswa-siswa dan bisa menambah edit dan merubah status siswa tersebut yang dapat berfungsi untuk login halaman siswa</li>
                 <li>dipage jurusan terdapat nama-nama jurusan yang bisa ditamabah,diedit dan dihapus</li>
                 <li>dipage Kelas terdapat nama-nama kelas yang bisa ditamabah,diedit dan dihapus</li>
                 <li>dipage laporan terdapat daftar total keseluruhan dari guru,siswa,jurusan dan kelas dan juga bisa dibuat laporan dalam bentuk pdf</li>
               </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btx btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-decoration: none;">
                  <h4> <span>
                      <i class="fa fa-caret-right"></i>
                    </span>

                     Apakah admin bisa ditambah</h4>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
              <div class="card-body">
              Tidak Karena admin hanya ada satu namun apabila ingin menambah harus ada pihak dari dalam 
               
              </div>
            </div>
          </div>
         
       
        </div>
      </div>
    </div>
  </div>
</section>
<?php include '../_footer.php'; ?>