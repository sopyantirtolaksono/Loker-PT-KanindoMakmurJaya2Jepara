<?php

  // mulai session
  require "../session_start.php";

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // id user yang login
  $idUser = $_SESSION["user"]["id_user"];

  // ambil semua data berkas pelamar yang login dari tabel berkas
  $semuaBerkas = "SELECT * FROM berkas JOIN loker ON berkas.id_loker = loker.id_loker WHERE berkas.id_user = '$idUser' ORDER BY id_berkas DESC";
  $ambilBerkas = $conn->query($semuaBerkas);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Semua Unggahan Berkas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Unggahan Berkas</li>
          <li class="breadcrumb-item active">Semua Unggahan</li>
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
            <h3 class="card-title">Semua Unggahan Berkas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Lowongan</th>
                <th>Tanggal Kirim Berkas</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>

                <?php 
                  $no = 1;
                  while($pecahBerkas = $ambilBerkas->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $pecahBerkas["lowongan"]; ?></td>
                    <td><?= $pecahBerkas["tanggal"]; ?></td>
                    
                    <td>
                    <?php if($pecahBerkas["status_berkas"] === "Lulus") { ?>
                      <span class="badge badge-success">
                        <?= $pecahBerkas["status_berkas"]; ?>
                      </span>
                    <?php } else if($pecahBerkas["status_berkas"] === "Tidak Lulus") { ?>
                      <span class="badge badge-danger">
                        <?= $pecahBerkas["status_berkas"]; ?>
                      </span>
                    <?php } else { ?>
                      <span class="badge badge-warning">
                        <?= $pecahBerkas["status_berkas"]; ?>
                      </span>
                    <?php } ?>
                    </td>

                    <td>
                      <?php 
                        if($pecahBerkas["status_berkas"] === "Lulus" || $pecahBerkas["status_berkas"] === "Tidak Lulus") { 
                      ?>
                      <a href="index.php?halaman=detail_status_berkas&id=<?= $pecahBerkas['id_berkas']; ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail</a>
                      <a href="src/components/ajax/hapus_berkas.php?id=<?= $pecahBerkas['id_berkas']; ?>" class="btn btn-danger btn-sm" id="btnHapusBerkas"><i class="fas fa-trash"></i> Hapus</a>
                      <?php } else { ?>
                      <a href="#" class="btn btn-default btn-sm disabled"><i class="fas fa-clock"></i> Detail</a>
                      <a href="src/components/ajax/hapus_berkas.php?id=<?= $pecahBerkas['id_berkas']; ?>" class="btn btn-secondary btn-sm" id="btnHapusBerkas"><i class="fas fa-ban"></i> Batal</a>
                      <?php } ?>
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
                <th>Lowongan</th>
                <th>Tanggal Kirim Berkas</th>
                <th>Status</th>
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
<!-- Unggahan berkas -->
<script src="src/dist/js/ajax/unggahan_berkas.js"></script>