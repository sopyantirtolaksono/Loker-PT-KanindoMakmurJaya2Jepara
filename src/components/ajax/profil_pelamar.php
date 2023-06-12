<?php

  // mulai session
  require "../session_start.php";

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil data user(pelamar) di session user
  $userLogin = $_SESSION["user"];

  // ambil data pelamar pada tabel user
  $dataPelamar  = "SELECT * FROM user WHERE id_user = '$userLogin[id_user]' ";
  $ambilPelamar = $conn->query($dataPelamar);
  $pecahPelamar = $ambilPelamar->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
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
            <h3 class="card-title">Profil</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                    <td width="10%">
                      <img src="src/dist/img/img_pelamar/<?= $pecahPelamar['gambar']; ?>" class="img-thumbnail" alt="Gambar Pelamar">
                    </td>
                    <td><?= $pecahPelamar["nama"]; ?></td>
                    <td><?= $pecahPelamar["nik"]; ?></td>
                    <td><?= $pecahPelamar["username"]; ?></td>
                    <td><?= $pecahPelamar["alamat"]; ?></td>
                    <td><?= $pecahPelamar["email"]; ?></td>
                    <td><?= $pecahPelamar["gender"]; ?></td>
                    <td><?= $pecahPelamar["status"]; ?></td>
                    <td>
                      <span class="badge badge-info">
                        <?= $pecahPelamar["level"]; ?>
                      </span>
                    </td>
                    <td>
                      <a href="index.php?halaman=edit_profil_pelamar&id=<?= $pecahPelamar['id_user']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
    </div>
  </div>
</section>