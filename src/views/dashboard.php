<?php

  // ambil data loker
  $dataLoker = "SELECT * FROM loker";
  $ambilLoker = $conn->query($dataLoker);
  $jmlLoker = $ambilLoker->num_rows;

  // ambil data user(pelamar)
  $dataPelamar = "SELECT * FROM user WHERE level = 'Pelamar' ";
  $ambilPelamar = $conn->query($dataPelamar);
  $jmlPelamar = $ambilPelamar->num_rows;

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-cloud"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Unggahan Loker</span>
            <span class="info-box-number">
              <?= $jmlLoker; ?>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Pelamar</span>
            <span class="info-box-number"><?= $jmlPelamar; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->

  </div><!--/. container-fluid -->
</section>
<!-- /.content -->