<?php

  // mulai session
  require "../session_start.php";

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil data user(admin) di session user
  $userLogin = $_SESSION["user"];

  // ambil data admin pada tabel admin
  $dataAdmin = "SELECT * FROM user WHERE id_user = '$userLogin[id_user]' ";
  $ambilAdmin = $conn->query($dataAdmin);
  $pecahAdmin = $ambilAdmin->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil Admin</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Admin</li>
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
            <h3 class="card-title">Profil Admin</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                    <td width="10%">
                      <img src="src/dist/img/img_admin/<?= $pecahAdmin['gambar']; ?>" class="img-thumbnail" alt="Gambar Admin">
                    </td>
                    <td><?= $pecahAdmin["nama"]; ?></td>
                    <td><?= $pecahAdmin["username"]; ?></td>
                    <td><?= $pecahAdmin["gender"]; ?></td>
                    <td>
                      <span class="badge badge-primary">
                        <?= $pecahAdmin["level"]; ?>
                      </span>
                    </td>
                    <td>
                      <a href="index.php?halaman=edit_profil_admin&id=<?= $pecahAdmin['id_user']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
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