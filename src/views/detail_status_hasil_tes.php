<?php 

  // Ambil id hasil tes diURL
  $idHasilTes = $_GET["id"];

  // Ambil data hasil tes sesuai id hasil tes diURL.
  $dataHasilTes   = "SELECT * FROM hasil_tes JOIN loker ON hasil_tes.id_loker = loker.id_loker JOIN user ON hasil_tes.id_user = user.id_user WHERE hasil_tes.id_hasil_tes = '$idHasilTes'";
  $ambilHasilTes  = $conn->query($dataHasilTes);
  $pecahHasilTes  = $ambilHasilTes->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Status Hasil Tes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Unggahan Berkas</li>
          <li class="breadcrumb-item">Semua Unggahan</li>
          <li class="breadcrumb-item active">Detail Status Hasil Tes</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">

    <?php if($pecahHasilTes["status_hasil_tes"] === "Tidak Lulus") { ?>
    <div class="row">
      <div class="col-12">
        <div class="alert alert-danger alert-dismissible">
          <h5><i class="icon fas fa-ban"></i> Tetap Semangat!</h5>
          Maaf kami ucapkan sebelumnya, bersamaan dengan pemberitahuan ini. Setelah kami lakukan penilaian terhadap tes yang sudah anda kerjakan, kami pihak PT. Kanindo Makmur Jaya 2 Jepara menyatakan bahwa anda <strong><u>"TIDAK LULUS"</u></strong> pada proses penilaian ini. Terimakasih sebelumnya telah mencoba mengerjakan tes ini, tetap semangat dan teruslah mencoba. Semoga beruntung dilain kesempatan. Terimakasih.
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Hasil Tes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Lowongan</th>
                  <th>Pelamar</th>
                  <th>Nilai</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $pecahHasilTes["lowongan"]; ?></td>
                  <td><?= $pecahHasilTes["nama"]; ?></td>
                  <td><?= $pecahHasilTes["hasil_tes"]; ?></td>
                  <td>
                    <span class="badge badge-danger">
                      <?= $pecahHasilTes["status_hasil_tes"]; ?>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
    <?php } ?>

    <?php if($pecahHasilTes["status_hasil_tes"] === "Lulus") { ?>
    <div class="row">
      <div class="col-12">
        <div class="alert alert-success alert-dismissible">
          <h5><i class="icon fas fa-check"></i> Selamat!</h5>
          Bersamaan dengan pemberitahuan ini kami menyampaikan bahwa dari hasil tes yang sudah anda kerjakan, kami nyatakan anda <strong><u>"LULUS"</u></strong>. Untuk itu sekali lagi kami dari PT. Kanindo Makmur Jaya 2 Jepara mengucapkan selamat kepada anda. Terimakasih.
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Hasil Tes</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Lowongan</th>
                  <th>Pelamar</th>
                  <th>Nilai</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $pecahHasilTes["lowongan"]; ?></td>
                  <td><?= $pecahHasilTes["nama"]; ?></td>
                  <td><?= $pecahHasilTes["hasil_tes"]; ?></td>
                  <td>
                    <span class="badge badge-success">
                      <?= $pecahHasilTes["status_hasil_tes"]; ?>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <?php } ?>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->