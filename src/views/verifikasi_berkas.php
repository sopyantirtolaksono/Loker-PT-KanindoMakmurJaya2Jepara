<?php

  // ambil id berkas diURL
  $idBerkas = $_GET["id"];

  // ambil data berkas pada tabel berkas sesuai id berkas yang dikirim
  $dataBerkas  = "SELECT * FROM berkas JOIN user ON berkas.id_user = user.id_user WHERE berkas.id_berkas = '$idBerkas' ";
  $ambilBerkas = $conn->query($dataBerkas);
  $pecahBerkas = $ambilBerkas->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Verifikasi Berkas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Berkas Pelamar</li>
          <li class="breadcrumb-item active">Verifikasi Berkas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Verifikasi Berkas</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="src/components/ajax/verifikasi_berkas.php" method="post" id="formVerifikasiBerkas">
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_berkas" value="<?= $pecahBerkas['id_berkas']; ?>" required>

                    <label for="">Nama Pelamar <span class="text-danger">*</span></label>
                    <input type="text" name="nama_pelamar" class="form-control" id="" placeholder="Nama Pelamar" value="<?= $pecahBerkas['nama']; ?>" required readonly>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">NIK <span class="text-danger">*</span></label>
                    <input type="text" name="nik" class="form-control" id="" placeholder="NIK" value="<?= $pecahBerkas['nik']; ?>" required readonly>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status Berkas <span class="text-danger">*</span></label>
                    <select class="form-control select2 select2bs4" style="width: 100%;" name="status_berkas" required>
                      <option value="Lulus">Lulus</option>
                      <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    Note: <span class="text-danger"><em>(*) Wajib diisi</em></span>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="btn_simpan" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
              </button>
              <a href="index.php?halaman=berkas_pelamar" class="btn btn-secondary">
                <i class="fas fa-ban"></i> Batal
              </a>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- JS File-->
<!-- Verifikasi Berkas -->
<script src="src/dist/js/ajax/verifikasi_berkas.js"></script>