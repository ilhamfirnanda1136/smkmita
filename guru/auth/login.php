<?php   
require_once '../_config/config.php';
  if (isset($_SESSION['guru'])) {
        echo "<script>window.location='".base_url()."';</script>"; 
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>
<link rel="icon" href="https://smkmita.sch.id/wp-content/uploads/2017/10/favicon.png" sizes="32x32" />
  <!-- Custom fonts for this template-->
  <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <style type="text/css">
    .loginimage{
    background: url(http://foto2.data.kemdikbud.go.id/getImage/20501697/5.jpg);
    background-position: center;
    background-size: cover;
    }
  </style>
  <!-- Custom styles for this template-->
  <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block loginimage"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <?php 
                      if (isset($_POST['login'])) 
                      {
                        $idn=trim(mysqli_real_escape_string($con,$_POST['idname']));
                        $pass=trim(mysqli_real_escape_string($con,$_POST['password']));
                        $sql_login=mysqli_query($con,"select * from guru where NIG='$idn' and password='$pass'") or die(mysqli_error($con));
                        $datalog=mysqli_fetch_assoc($sql_login);
                 
                  if(mysqli_num_rows($sql_login)>0)
                  {
                      if ($datalog['status']==1) {
                          $_SESSION['guru']=$idn;
                       echo "<script>window.location='".base_url()."';</script>";   
                        }
                      else{?>
                      <div class="alert alert-danger alert-dismissable " role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                        <strong>maaf </strong> user anda sudah tidak aktif
                      </div>
                      <?php
                    }
                     }
                  else{ ?>  
                      <div class="alert alert-danger alert-dismissable " role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                        <strong>login gagal </strong> NIG/password salah
                      </div>
                  <?php       
                  }
              }
                     ?>
                    <h1 class="h4 text-gray-900 mb-4">Login Guru</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" name="idname" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="masukkan NIG...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Buat akun dengan id mu?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../asset/vendor/jquery/jquery.min.js"></script>
  <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../asset/js/sb-admin-2.min.js"></script>

</body>

</html>
