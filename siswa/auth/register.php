<?php 
 require_once '../_config/config.php';
 ?>
<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Siswa</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img class="align-content" src="https://i.ytimg.com/vi/E6l8JP8CoUg/maxresdefault.jpg" width="549px;" height="176px;" alt="">
                    </a>
                </div>

                <div class="login-form">
                	<?php if (isset($_POST['set'])) 
                {
                  $nis=trim(mysqli_real_escape_string($con,$_POST['nis']));
                  $password=trim(mysqli_real_escape_string($con,$_POST['password']));
                  $cpassword=trim(mysqli_real_escape_string($con,$_POST['cpassword']));
                  $sql_register=mysqli_query($con,"select * from siswa where NIS='$nis'");
                  $datasql=mysqli_fetch_array($sql_register);
                if ($datasql['status_pass']==1) {?>
                    <div class="alert alert-danger alert-dismissable " role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                        <strong>Maaf Anda Sudah Menganti Password Anda </strong>  
                    </div>
                  <?php

                }
                else{
                  if (mysqli_num_rows($sql_register)==0) {
                    ?>
                     <div class="alert alert-danger alert-dismissable " role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                        <strong>register gagal </strong> NIS Salah  
                      </div>
                    <?php
                  }
                  else
                  {
                    if ($password==$cpassword) 
                    {
                      mysqli_query($con,"update siswa set password='$password',status_pass=1 where NIS='$nis'");
                      ?>
                       <div class="alert alert-success alert-dismissable " role="alert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                          <strong>register berhasil </strong> silahkan Login
                        </div>
                      <?php
                    }
                    else{ ?>
                     <div class="alert alert-danger alert-dismissable " role="alert">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                          <strong>register gagal </strong> password dan repeat password tidak sama
                        </div>
                  <?php
                    }
                  }
                }
              }
                 ?>
                    <form method="post" action="">
                        	<div class="form-group">
                            <label>Nomor NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="Masukkan Nis">
                        	</div>
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control" placeholder="Password">
                        	</div>
                          <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                        	</div>
                              <button type="submit" name="set" class="btn btn-primary btn-flat m-b-30 m-t-30">Set Password</button>
                          <div class="register-link m-t-15 text-center">
                              <p>Sudah Update password <a href="login.php"> Login Disini</a></p>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
