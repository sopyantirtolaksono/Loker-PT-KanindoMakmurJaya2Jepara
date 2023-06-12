<?php

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil semua data jadwal tes dari tabel jadwal tes
  $semuaJadwal = "SELECT * FROM jadwal_tes JOIN loker ON jadwal_tes.id_loker = loker.id_loker ORDER BY id_jadwal_tes DESC";
  $ambilJadwal = $conn->query($semuaJadwal);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Semua Jadwal Tes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Informasi</li>
          <li class="breadcrumb-item active">Semua Jadwal Tes</li>
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
            <h3 class="card-title">Semua Jadwal Tes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Lowongan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Perlengkapan</th>
                <th>Pakaian</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>

                <?php 
                  $no = 1;
                  while($pecahJadwal = $ambilJadwal->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $pecahJadwal["lowongan"]; ?></td>
                    <td><?= $pecahJadwal["tanggal"]; ?></td>
                    <td><?= $pecahJadwal["waktu"]; ?></td>
                    <td><?= $pecahJadwal["lokasi"]; ?></td>
                    <td><?= $pecahJadwal["perlengkapan"]; ?></td>
                    <td><?= $pecahJadwal["pakaian"]; ?></td>
                    <td><?= $pecahJadwal["keterangan"]; ?></td>
                    <td>
                      <a href="index.php?halaman=edit_jadwal_tes&id=<?= $pecahJadwal['id_jadwal_tes']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="src/components/ajax/hapus_jadwal_tes.php?id=<?= $pecahJadwal['id_jadwal_tes']; ?>" class="btn btn-danger btn-sm" id="btnHapusJadwalTes"><i class="fas fa-trash"></i> Hapus</a>
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
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Perlengkapan</th>
                <th>Pakaian</th>
                <th>Keterangan</th>
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
<script src="src/dist/js/ajax/unggahan_jadwal_tes.js"></script>