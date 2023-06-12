<?php

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil semua data user(pelamar) dari tabel user
  $semuaPelamar = "SELECT * FROM user WHERE level = 'Pelamar' ORDER BY id_user DESC";
  $ambilPelamar = $conn->query($semuaPelamar);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Semua Pelamar</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Pelamar</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Semua Pelamar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>

                <?php 
                  $no = 1;
                  while($pecahPelamar = $ambilPelamar->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td width="10%">
                      <img src="src/dist/img/img_pelamar/<?=$pecahPelamar['gambar']; ?>" class="img-thumbnail" alt="Gambar Pelamar">
                    </td>
                    <td><?= $pecahPelamar["nama"]; ?></td>
                    <td><?= $pecahPelamar["nik"]; ?></td>
                    <td><?= $pecahPelamar["username"]; ?></td>
                    <td><?= $pecahPelamar["alamat"]; ?></td>
                    <td><?= $pecahPelamar["gender"]; ?></td>
                    <td><?= $pecahPelamar["status"]; ?></td>
                    <td>
                      <span class="badge badge-info"><?= $pecahPelamar["level"]; ?></span>
                    </td>
                    <td>
                      <a href="src/components/ajax/hapus_pelamar.php?id=<?= $pecahPelamar['id_user']; ?>" class="btn btn-danger btn-sm" id="btnHapusPelamar"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php 
                  $no++;
                  } 
                ?>

              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </div>
  </div>
</section>

<!-- JS File-->
<!-- Unggahan Loker -->
<script src="src/dist/js/ajax/semua_pelamar.js"></script>