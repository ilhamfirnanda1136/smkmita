<?php 
    require_once '../_config/config.php';
  if (isset($_SESSION['adminis'])) {
        echo "<script>window.location='".base_url()."';</script>"; 
    }
    else{
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="icon" href="https://smkmita.sch.id/wp-content/uploads/2017/10/favicon.png" sizes="32x32" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('_asset/css/main.css')?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Admin</h1>
      </div>
      <div class="login-box">
               <?php 
                if(isset($_POST['loginadmin']))
                {
                  $user=trim(mysqli_real_escape_string($con,$_POST['usernameadmin']));
                  $pass=trim(mysqli_real_escape_string($con,$_POST['passwordadmin']));
                  $sql_login=mysqli_query($con,"select * from admin where NIA='$user' and password='$pass'") or die(mysqli_error($con));
                  if(mysqli_num_rows($sql_login)>0)
                  {
                      $_SESSION['adminis']=$user;
                       echo "<script>window.location='".base_url()."';</script>";
                  }
                  else{ ?>  
                      <div class="alert alert-success alert-dismissable " role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span class="fa fa-lg fa-fw fa-user" aria-hidden="true"></span>
                        <strong>login gagal </strong> username/password salah
                      </div>
                  <?php       
                  }
                }
               ?>
                     
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">ID</label>
            <input class="form-control" type="text" placeholder="Masukkan ID" name="usernameadmin" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="passwordadmin">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="loginadmin" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?=base_url('_asset/js/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('_asset/js/popper.min.js')?>"></script>
    <script src="<?=base_url('_asset/js/bootstrap.min.js')?>"></script>
     <script src="<?=base_url('_asset/js/main.js')?>"></script>
     <script src="<?=base_url('_asset/jspace.min.js')?>"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>
<?php 
}
 ?>