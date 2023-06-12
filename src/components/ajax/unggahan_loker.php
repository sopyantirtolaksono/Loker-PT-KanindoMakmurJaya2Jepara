<?php

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil semua data loker dari tabel loker
  $semuaLoker = "SELECT * FROM loker ORDER BY id_loker DESC";
  $ambilLoker = $conn->query($semuaLoker);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Semua Unggahan Loker</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Unggahan Loker</li>
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
            <h3 class="card-title">Semua Unggahan Loker</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Lowongan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>

                <?php 
                  $no = 1;
                  while($pecahLoker = $ambilLoker->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td width="30%">
                      <img src="src/dist/img/img_loker/<?=$pecahLoker['gambar']; ?>" class="img-thumbnail" alt="Gambar Loker">
                    </td>
                    <td width="50%"><?= $pecahLoker["lowongan"]; ?></td>
                    <td width="50%"><?= $pecahLoker["deskripsi"]; ?></td>
                    <td>
                      <a href="index.php?halaman=edit_loker&id=<?= $pecahLoker['id_loker']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="src/components/ajax/hapus_loker.php?id=<?= $pecahLoker['id_loker']; ?>" class="btn btn-danger btn-sm" id="btnHapusLoker"><i class="fas fa-trash"></i> Hapus</a>
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
                <th>Lowongan</th>
                <th>Deskripsi</th>
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
<script src="src/dist/js/ajax/unggahan_loker.js"></script>