<?php include '../_config/config.php';
if (!isset($_SESSION['adminis'])) {
       echo   "<script>window.location='".base_url('auth/login.php')."';</script>;";
    }
    $admin=$_SESSION['adminis'];
    $dataadmin=mysqli_query($con,"select * from admin where NIA='$admin'");
    $admindata=mysqli_fetch_array($dataadmin);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>FILE ADMIN</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://smkmita.sch.id/wp-content/uploads/2017/10/favicon.png" sizes="32x32" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url('_asset/css/main.css');?>">
    <!-- Font-icon css-->
        <!-- Scripts -->
   
    <!-- Styles -->
  
    <link href="<?=base_url('_asset/css/app.css');?>" rel="stylesheet">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
   <script src="<?=base_url('_asset/js/jquery-3.2.1.min.js')?>"></script>
     <script type="text/javascript" src="<?=base_url('_asset/js/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('_asset/js/dataTables.bootstrap.min.js')?>"></script> 
    
  </head>
  
 
   <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">Admin</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <!--
            <li><a class="dropdown-item" href="#"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-user fa-lg"></i> Profile</a></li>-->
            <li><a class="dropdown-item" href="<?=base_url('auth/Logout.php')?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
       <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://apollo-singapore.akamaized.net/v1/files/qobj9yi5y9tr3-ID/image;s=966x691;olx-st/_1_.jpg" alt="User Image" width="50px" height="50px;">
        <div>
          <p class="app-sidebar__user-name"><?php echo $admindata['nama']; ?></p>
          <p class="app-sidebar__user-designation">Admin Websites</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item" href="<?=base_url('dashboard/dashboard.php')?>"><span class="app-menu__label">Dashboard</span></a>
        </li>
        <li>
          <a class="app-menu__item" href="<?=base_url('guru/data.php');?>"><span class="app-menu__label">Guru</span></a>
        </li>
         <li>
          <a class="app-menu__item" href="<?=base_url('siswa/data.php');?>"><span class="app-menu__label">Siswa</span></a>
        </li>
         <li>
          <a class="app-menu__item" href="<?=base_url('jurusan/data.php');?>"><span class="app-menu__label">Jurusan</span></a>
        </li>
         <li>
          <a class="app-menu__item" href="<?=base_url('kelas/data.php');?>"><span class="app-menu__label">Kelas</span></a>
        </li>
         <li>
          <a class="app-menu__item" href="<?=base_url('report/data.php');?>"><span class="app-menu__label">Laporan</span></a>
        </li>
         <li>
          <a class="app-menu__item" href="<?=base_url('help/help.php');?>"><span class="app-menu__label">Help</span></a>
        </li>
      </ul>
    </aside>
        <main class="app-content">
          

