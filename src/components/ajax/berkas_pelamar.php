<?php

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // ambil semua data berkas dari tabel berkas
  $semuaBerkas = "SELECT * FROM berkas JOIN user ON berkas.id_user = user.id_user JOIN loker ON berkas.id_loker = loker.id_loker ORDER BY berkas.id_berkas DESC";
  $ambilBerkas = $conn->query($semuaBerkas);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Berkas Pelamar</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item active">Berkas Pelamar</li>
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
            <h3 class="card-title">Berkas Pelamar</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelamar</th>
                <th>NIK</th>
                <th>Lowongan</th>
                <th>CV</th>
                <th>KTP,KK,Ijazah</th>
                <th>SKCK</th>
                <th>Foto Diri</th>
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
                    <td><?= $pecahBerkas["tanggal"]; ?></td>
                    <td><?= $pecahBerkas["nama"]; ?></td>
                    <td><?= $pecahBerkas["nik"]; ?></td>
                    <td><?= $pecahBerkas["lowongan"]; ?></td>
                    <td>
                      <a href="src/components/ajax/download_pdf.php?berkas=1&file=<?= $pecahBerkas['berkas_1']; ?>" target="_blank">
                        <i class="fas fa-file-pdf"></i> File PDF
                      </a>
                    </td>
                    <td>
                      <a href="src/components/ajax/download_pdf.php?berkas=2&file=<?= $pecahBerkas['berkas_2']; ?>" target="_blank">
                        <i class="fas fa-file-pdf"></i> File PDF
                      </a>
                    </td>
                    <td>
                      <a href="src/components/ajax/download_pdf.php?berkas=3&file=<?= $pecahBerkas['berkas_3']; ?>" target="_blank">
                        <i class="fas fa-file-pdf"></i> File PDF
                      </a>
                    </td>
                    <td>
                      <a href="src/components/ajax/download_pdf.php?berkas=4&file=<?= $pecahBerkas['berkas_4']; ?>" target="_blank">
                        <i class="fas fa-file-pdf"></i> File PDF
                      </a>
                    </td>
                    <td>
                      <?php if($pecahBerkas["status_berkas"] === "Lulus") { ?>
                      <span class="badge badge-success"><?= $pecahBerkas["status_berkas"]; ?></span>
                      <?php } else if($pecahBerkas["status_berkas"] === "Tidak Lulus") { ?>
                      <span class="badge badge-danger"><?= $pecahBerkas["status_berkas"]; ?></span>
                      <?php } else { ?>
                      <span class="badge badge-warning"><?= $pecahBerkas["status_berkas"]; ?></span>
                      <?php } ?>
                    </td>
                    <td>
                      <a href="index.php?halaman=verifikasi_berkas&id=<?= $pecahBerkas['id_berkas']; ?>" class="btn btn-default btn-sm"><i class="fas fa-check"></i> Verifikasi</a>
                      <a href="src/components/ajax/edit_status_berkas.php?id=<?= $pecahBerkas['id_berkas']; ?>" class="btn btn-danger btn-sm" id="btnHapusBerkas"><i class="fas fa-trash"></i> Hapus</a>
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
                <th>Tanggal</th>
                <th>Pelamar</th>
                <th>NIK</th>
                <th>Lowongan</th>
                <th>CV</th>
                <th>KTP,KK,Ijazah</th>
                <th>SKCK</th>
                <th>Foto Diri</th>
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
<!-- Berkas Pelamar -->
<script src="src/dist/js/ajax/berkas_pelamar.js"></script>