<?php
 require_once '../_config/config.php'; 

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>
  
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
    .loginimage{
    background: url(http://foto2.data.kemdikbud.go.id/getImage/20501697/5.jpg);
    background-position: center;
    background-size: cover;
    }
  </style>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block loginimage"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <?php if (isset($_POST['daftar'])) 
                {
                  $nomor=trim(mysqli_real_escape_string($con,$_POST['nomor']));
                  $password=trim(mysqli_real_escape_string($con,$_POST['password']));
                  $cpassword=trim(mysqli_real_escape_string($con,$_POST['cpassword']));
                  $sql_register=mysqli_query($con,"select * from guru where NIG='$nomor'");
                  $datasql=mysqli_fetch_array($sql_register);
                  if ($datasql['status_pass']==1) {
                    ?>
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
                        <strong>register gagal </strong> NIG Salah
                      </div>
                    <?php
                  }
                  else
                  {
                    if ($password==$cpassword) 
                    {
                      mysqli_query($con,"update guru set password='$password',status_pass=1 where NIG='$nomor'");
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
                <h1 class="h4 text-gray-900 mb-4">Daftar Password</h1>
              </div>

              <form class="user" action="" method="post">
                <div class="form-group">
                  <input type="text" name="nomor" class="form-control form-control-user" id="exampleInputEmail" placeholder="masukkan NIG ">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user vpa" id="exampleInputPassword" placeholder="Password"> 
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="cpassword" class="form-control form-control-user vpa1" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                    
                </div>
                <input type="checkbox" id="show-hide" name="show-hide" value="" />
                    <label for="show-hide">Show password</label>
                <button name="daftar" type="submit" class="btn btn-block btn-user btn-primary">Daftar Password</button>
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Sudah Punya akun masuk disini?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script type="text/javascript">
(function() {
   
  var PasswordToggler = function(element, field){
    this.element = element;
    this.field = field;
    this.toggle();  
  };
  PasswordToggler.prototype = {
    toggle: function() {
      var self = this;
      self.element.addEventListener( "change", function() {
        if( self.element.checked ) {
          self.field.setAttribute( "type", "text" );
        } else {
          self.field.setAttribute( "type", "password" );  
        }
            }, false);
    }
  };
  
  
  document.addEventListener( "DOMContentLoaded", function() {
    var checkbox = document.querySelector( "#show-hide" ),
      pwd = document.querySelector( ".vpa1" ),
       pwdq = document.querySelector( ".vpa" ),
      form = document.querySelector( "#login" );
      
      // form.addEventListener( "submit", function( e ) {
      //   e.preventDefault();
      // }, false);
      
      var toggler = new PasswordToggler( checkbox, pwd );
       var toggler1 = new PasswordToggler( checkbox, pwdq );
    
  });
  
})();

 
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="../asset/vendor/jquery/jquery.js"></script>
  <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../asset/js/sb-admin-2.min.js"></script>

</body>

</html>
