<?php

  // ambil id hasil tes diURL
  $idHasilTes = $_GET["id"];

  // Ambil data hasil tes pada tabel hasil tes sesuai id hasil tes diURL
  $dataHasilTes  = "SELECT * FROM hasil_tes JOIN loker ON hasil_tes.id_loker = loker.id_loker JOIN user ON hasil_tes.id_user = user.id_user WHERE id_hasil_tes = '$idHasilTes'";
  $ambilHasilTes = $conn->query($dataHasilTes);
  $pecahHasilTes = $ambilHasilTes->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Hasil Tes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Informasi</li>
          <li class="breadcrumb-item">Semua Hasil Tes</li>
          <li class="breadcrumb-item active">Edit Hasil Tes</li>
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
            <h3 class="card-title">Form Edit Hasil Tes</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="src/components/ajax/edit_hasil_tes.php" method="post" id="formEditHasilTes">
            <div class="card-body">

              <div class="row">
                <input type="hidden" name="id_hasil_tes" value="<?= $pecahHasilTes['id_hasil_tes']; ?>" required>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Lowongan <span class="text-danger">*</span></label>
                    <input type="text" name="lowongan" class="form-control" id="" placeholder="Lowongan" value="<?= $pecahHasilTes['lowongan']; ?>" required disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="" placeholder="Nama Pelamar" value="<?= $pecahHasilTes['nama']; ?>" required disabled>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select class="form-control select2 select2bs4" style="width: 100%;" name="status_hasil_tes" required>
                      <option value="<?= $pecahHasilTes['status_hasil_tes']; ?>" style="font-weight: bold;">
                        <?= $pecahHasilTes["status_hasil_tes"]; ?>
                      </option>
                      <option value="Lulus">Lulus</option>
                      <option value="Tidak Lulus">Tidak Lulus</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Hasil Tes <span class="text-danger">*</span></label>
                    <input type="number" name="hasil_tes" class="form-control" id="" placeholder="Hasil Tes" value="<?= $pecahHasilTes['hasil_tes']; ?>" required>
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
              <a href="index.php?halaman=unggahan_hasil_tes" class="btn btn-secondary">
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
<script src="src/dist/js/ajax/edit_hasil_tes.js"></script>