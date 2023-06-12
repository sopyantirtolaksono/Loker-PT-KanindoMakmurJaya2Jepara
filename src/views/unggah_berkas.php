<?php

  // Ambil semua data loker pada tabel loker
  $dataLoker = "SELECT * FROM loker";
  $ambilLoker = $conn->query($dataLoker);

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Unggah Berkas Lamaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Unggahan Berkas</li>
          <li class="breadcrumb-item active">Unggah Berkas</li>
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
            <h3 class="card-title">Form Unggah Berkas Lamaran</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="src/components/ajax/unggah_berkas.php" method="post" id="formUnggahBerkas" enctype="multipart/form-data">
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Lowongan <span class="text-danger">*</span></label>
                    <select class="form-control select2 select2bs4" style="width: 100%;" name="lowongan" required>
                      <?php while($pecahLoker = $ambilLoker->fetch_assoc()) { ?>
                        <option value="<?= $pecahLoker['id_loker']; ?>">
                          <?= $pecahLoker["lowongan"]; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Berkas 1 (CV) <span class="text-danger">*</span></label>
                    <input type="file" name="berkas_1" class="form-control" id="" placeholder="Berkas 1" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Berkas 2 (KTP,KK,Ijazah) <span class="text-danger">*</span></label>
                    <input type="file" name="berkas_2" class="form-control" id="" placeholder="Berkas 2" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Berkas 3 (SKCK) <span class="text-danger">*</span></label>
                    <input type="file" name="berkas_3" class="form-control" id="" placeholder="Berkas 3" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Berkas 4 (Foto Diri) <span class="text-danger">*</span></label>
                    <input type="file" name="berkas_4" class="form-control" id="" placeholder="Berkas 4" required >
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    Note: <span class="text-danger"><em>(*) Wajib diisi | Semua format file harus PDF</em></span>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" name="btn_simpan" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
              </button>
              <a href="index.php?halaman=unggahan_berkas" class="btn btn-secondary">
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
<script src="src/dist/js/ajax/unggah_berkas.js"></script>