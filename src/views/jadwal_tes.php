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
        <h1 class="m-0 text-dark">Jadwal Tes Tertulis & Wawancara</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Informasi</li>
          <li class="breadcrumb-item active">Jadwal Tes</li>
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
            <h3 class="card-title">Form Input Jadwal Tes & Wawancara</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="src/components/ajax/jadwal_tes.php" method="post" id="formJadwalTes">
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
                      	<label for="">Tanggal <span class="text-danger">*</span></label>
                        <div class="input-group date" id="tanggal" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#tanggal" name="tanggal" required />
                            <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                  	</div>
                </div>
              </div>

              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label for="">Waktu <span class="text-danger">*</span></label>

                  <div class="input-group date" id="waktu" data-target-input="nearest">
                    <input type="text" name="waktu" class="form-control datetimepicker-input" data-target="#waktu" required />
                    <div class="input-group-append" data-target="#waktu" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control" id="" placeholder="Lokasi" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Perlengkapan <span class="text-danger">*</span></label>
                    <input type="text" name="perlengkapan" class="form-control" id="" placeholder="Perlengkapan" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Pakaian <span class="text-danger">*</span></label>
                    <input type="text" name="pakaian" class="form-control" id="" placeholder="Pakaian" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" class="form-control" rows="4" placeholder="Keterangan(Optional)"></textarea>
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
              <a href="index.php?halaman=unggahan_jadwal_tes" class="btn btn-secondary">
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
<script src="src/dist/js/ajax/jadwal_tes.js"></script>