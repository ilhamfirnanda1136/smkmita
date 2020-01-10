<?php include '../header.php' ?>
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

<link rel="stylesheet" href="../asset/css/about.css'">
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
                   Cara mengupload materi</h4>
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="fade collapse" aria-labelledby="headingOne" data-parent="#faqExample">
              <div class="card-body">
                ini adalah cara untuk mengupload Materi
               <ul>
                 <li>Masuk page Materi</li>
                 <li>klik tambah data</li>
                 <li>input data yang diminta</li>
                 <li>bisa pilih link atau upload link untuk memasukkan halaman dari website lain  sementara upload digunakan untuk mengupload file</li>
                 <li>tekan save data</li>
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

                     Cara mengupload materi</h4>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
              <div class="card-body">
              ini adalah cara untuk mengupload Soal
               <ul>
                 <li>Masuk page Soal</li>
                 <li>klik tambah data</li>
                 <li>input data yang diminta</li>
                 <li>bisa pilih link atau upload link untuk memasukkan halaman dari website lain  sementara upload digunakan untuk mengupload file</li>
                 <li>tekan save data</li>
               </ul>

              </div>
            </div>
          </div>
         
       
        </div>
      </div>
    </div>
  </div>
</section>
<!--container-->

<?php include '../footer.php'; ?>
