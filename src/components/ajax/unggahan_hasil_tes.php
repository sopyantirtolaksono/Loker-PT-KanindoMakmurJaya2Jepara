<?php

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil semua data hasil tes dari tabel hasil tes
  $semuaHasilTes = "SELECT * FROM hasil_tes JOIN loker ON hasil_tes.id_loker = loker.id_loker JOIN user ON hasil_tes.id_user = user.id_user ORDER BY id_hasil_tes DESC";
  $ambilHasilTes = $conn->query($semuaHasilTes);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Semua Hasil Tes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Informasi</li>
          <li class="breadcrumb-item active">Semua Hasil Tes</li>
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
            <h3 class="card-title">Semua Hasil Tes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Lowongan</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Hasil Tes</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>

                <?php 
                  $no = 1;
                  while($pecahHasilTes = $ambilHasilTes->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $pecahHasilTes["lowongan"]; ?></td>
                    <td><?= $pecahHasilTes["nama"]; ?></td>
                    <td>
                      <?php if($pecahHasilTes["status_hasil_tes"] === "Lulus") { ?>
                      <span class="badge badge-success">
                        <?= $pecahHasilTes["status_hasil_tes"]; ?>
                      </span>
                      <?php } else { ?>
                      <span class="badge badge-danger">
                        <?= $pecahHasilTes["status_hasil_tes"]; ?>
                      </span>
                      <?php } ?>
                    </td>
                    <td><?= $pecahHasilTes["hasil_tes"]; ?></td>
                    <td>
                      <a href="index.php?halaman=edit_hasil_tes&id=<?= $pecahHasilTes['id_hasil_tes']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="src/components/ajax/hapus_hasil_tes.php?id=<?= $pecahHasilTes['id_hasil_tes']; ?>" class="btn btn-danger btn-sm" id="btnHapusHasilTes"><i class="fas fa-trash"></i> Hapus</a>
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
                <th>Nama</th>
                <th>Status</th>
                <th>Hasil Tes</th>
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
<!-- Berkas Pelamar -->
<script src="src/dist/js/ajax/unggahan_hasil_tes.js"></script>