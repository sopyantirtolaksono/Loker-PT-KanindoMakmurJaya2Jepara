<?php 

  // mulai session
  require "src/components/session_start.php";

  // koneksi ke database
  require "src/connection/koneksi_database.php";
  
  // cek jika sudah ada session user
  if(isset($_SESSION["user"])) {
    // alihkan agar tetap dihalaman index/dashboard
    header("Location: index.php");
    exit();
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loker | PT. Kanindo Makmur Jaya 2 Jepara</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="src/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="src/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- jQuery -->
  <script src="src/plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo mt-5">
    <a href=""><b>WEBSITE LOKER</b></a>
    <h4 style="font-weight: lighter;">PT. Kanindo Makmur Jaya 2 Jepara</h4>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Registrasi untuk akun baru
      <form action="src/components/ajax/registrasi.php" method="post" id="formRegistrasi">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="gender" required>
            <option disabled>Jenis Kelamin:</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="status" required>
            <option disabled>Status:</option>
            <option value="Menikah">Menikah</option>
            <option value="Belum Menikah">Belum Menikah</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="@username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="lihatPassword" onclick="showHide()">
              <label for="lihatPassword">
                Lihat Password
              </label>
            </div>
          </div>
          <!-- /.col -->
        </div>
        
        <div class="row">
          <!-- /.col -->
          <!-- <div class="col-7"></div> -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="btn_simpan">Registrasi</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <hr>
      <a href="login.php" class="text-center">Saya sudah punya akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- Bootstrap 4 -->
<script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="src/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="src/plugins/sweetalert2/sweetalert2.min.js"></script>


<!-- JS File -->
<!-- Registrasi -->
<script src="src/dist/js/ajax/registrasi.js"></script>

</body>
</html>
