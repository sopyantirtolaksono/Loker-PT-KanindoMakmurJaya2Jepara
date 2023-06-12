<?php

  // ambil id loker diURL
  $idLoker = $_GET["id"];

  // ambil data loker pada tabel loker sesuai id loker yang dikirim
  $dataLoker  = "SELECT * FROM loker WHERE id_loker = '$idLoker' ";
  $ambilLoker = $conn->query($dataLoker);
  $pecahLoker = $ambilLoker->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Loker</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Unggahan Loker</li>
          <li class="breadcrumb-item">Semua Unggahan</li>
          <li class="breadcrumb-item active">Edit Loker</li>
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
            <h3 class="card-title">Form Edit Loker</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="src/components/ajax/edit_loker.php" method="post" id="formEditLoker" enctype="multipart/form-data">
            <div class="card-body">

              <div class="row">
                <input type="hidden" name="id_loker" value="<?= $pecahLoker['id_loker']; ?>" required>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="" placeholder="Gambar">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Lowongan <span class="text-danger">*</span></label>
                    <input type="text" name="lowongan" class="form-control" id="" placeholder="Lowongan" value="<?= $pecahLoker['lowongan']; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="" class="form-control" rows="4" placeholder="Optional"><?= $pecahLoker["deskripsi"]; ?></textarea>
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
              <a href="index.php?halaman=unggahan_loker" class="btn btn-secondary">
                <i class="fas fa-ban"></i> Batal
              </a>
            </div>
          </form>
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Gambar Loker</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <div class="row">
              <div class="col">
                <div class="form-group text-center">
                  <img src="src/dist/img/img_loker/<?= $pecahLoker['gambar']; ?>" class="img-thumbnail" width="50%" alt="Gambar Loker">
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- JS File-->
<!-- Unggah Loker -->
<script src="src/dist/js/ajax/edit_loker.js"></script>