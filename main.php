<?php

  // mulai session
  require "src/components/session_start.php";
  
  // koneksi database
  require "src/connection/koneksi_database.php";

  // cek jika sudah ada yang login
  if(isset($_SESSION["user"])) {
    // ambil data user yg login dari session user
    $userLogin = $_SESSION["user"];

    // ambil data user yang login ditabel user
    $dataUser   = "SELECT * FROM user WHERE id_user = '$userLogin[id_user]' ";
    $ambilUser  = $conn->query($dataUser);
    $pecahUser  = $ambilUser->fetch_assoc(); 
  }

  // ambil semua data loker ditabel loker
  $dataLoker  = "SELECT * FROM loker ORDER BY id_loker DESC";
  $ambilLoker = $conn->query($dataLoker);
  
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loker | PT. Kanindo Makmur Jaya 2 Jepara</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="src/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white elevation-1">
    <div class="container">
      <a href="main.php" class="navbar-brand">
        <img src="src/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1">
        <span class="brand-text font-weight-light">LOKER</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="main.php" class="nav-link">Home</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <?php if(!isset($userLogin)) { ?>
        <li class="nav-item">
          <a href="login.php" class="btn btn-outline-success mr-4" target="_blank">
            <i class="fas fa-sign-out-alt"></i> Login
          </a>
        </li>
        <?php } ?>

        <?php if(isset($userLogin)) { ?>
        <?php if($pecahUser["level"] === "Pelamar") { ?>
        <li class="nav-item">
          <a class="navbar-brand">
            <img src="src/dist/img/img_pelamar/<?= $pecahUser['gambar']; ?>" alt="User Image" class="brand-image img-circle elevation-1">
          </a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="navbar-brand">
            <img src="src/dist/img/img_admin/<?= $pecahUser['gambar']; ?>" alt="User Image" class="brand-image img-circle elevation-1">
          </a>
        </li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Lowongan Kerja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <p class="m-0 lead"> PT. Kanindo Makmur Jaya 2 Jepara</p>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">

        <?php while($pecahLoker = $ambilLoker->fetch_assoc()) { ?>
        <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 text-center">
                    <img src="src/dist/img/img_loker/<?= $pecahLoker['gambar']; ?>" class="img-fluid pad mb-3">
                  </div>
                
                  <div class="col-12">
                    <h5 class="card-title mb-1">
                      <strong><?= $pecahLoker["lowongan"]; ?></strong>
                    </h5>
                  </div>

                  <div class="col-12">
                    <p class="card-text mb-3">
                      <?= $pecahLoker["deskripsi"]; ?>
                    </p>
                  </div>

                  <div class="col-12">
                    <a href="login.php" class="btn btn-primary float-right" target="_blank"><i class="far fa-envelope"></i> Kirim Lamaran</a>
                  </div>
                </div>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        <?php } ?>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Get the best future
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="#">Loker PT. Kanindo Makmur Jaya 2 Jepara</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="src/dist/js/adminlte.min.js"></script>
</body>
</html>
