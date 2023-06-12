<?php 

  // Ambil id berkas diURL
  $idBerkas = $_GET["id"];

  // Ambil data berkas ditabel berkas sesuai id berkas diURL
  $dataBerkas = "SELECT * FROM berkas WHERE id_berkas = '$idBerkas' ";
  $ambilBerkas = $conn->query($dataBerkas);
  $pecahBerkas = $ambilBerkas->fetch_assoc();

  // Ambil data jadwal tes sesuai id lokernya.
  $dataJadwalTes  = "SELECT * FROM jadwal_tes WHERE id_loker = '$pecahBerkas[id_loker]' ";
  $ambilJadwalTes = $conn->query($dataJadwalTes);
  $pecahJadwalTes = $ambilJadwalTes->fetch_assoc();

  // Ambil data hasil tes sesuai id loker dan id usernya.
  $dataHasilTes   = "SELECT * FROM hasil_tes WHERE id_loker = '$pecahBerkas[id_loker]' AND id_user = '$userLogin[id_user]' ";
  $ambilHasilTes  = $conn->query($dataHasilTes);
  $pecahHasilTes  = $ambilHasilTes->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Detail Status Berkas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Unggahan Berkas</li>
          <li class="breadcrumb-item">Semua Unggahan</li>
          <li class="breadcrumb-item active">Detail Status Berkas</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">

    <?php if($pecahBerkas["status_berkas"] === "Tidak Lulus") { ?>
    <div class="row">
      <div class="col-12">
        <div class="alert alert-danger alert-dismissible">
          <h5><i class="icon fas fa-ban"></i> Tetap Semangat!</h5>
          Maaf kami ucapkan sebelumnya, bersamaan dengan pemberitahuan ini. Setelah kami lakukan proses verifikasi untuk berkas yang anda kirimkan, kami pihak PT. Kanindo Makmur Jaya 2 Jepara menyatakan bahwa berkas anda <strong><u>"TIDAK LULUS"</u></strong> pada proses verifikasi berkas. Terimakasih sebelumnya telah mencoba mengirimkan berkas lamaran anda, tetap semangat dan teruslah mencoba. Semoga beruntung dilain kesempatan. Terimakasih.
        </div>    
      </div><!-- /.col -->
    </div><!-- /.row -->
    <?php } ?>

    <?php if($pecahBerkas["status_berkas"] === "Lulus") { ?>
    <div class="row">
      <div class="col-12">
        <div class="alert alert-success alert-dismissible">
          <h5><i class="icon fas fa-check"></i> Selamat!</h5>
          Bersamaan dengan pemberitahuan ini kami menyampaikan bahwa berkas yang anda kirimkan telah kami lakukan proses verifikasi dan berkas anda kami nyatakan <strong><u>"LULUS"</u></strong>. Untuk itu kami undang anda untuk melakukan test tertulis dan wawancara, berikut untuk jadwal dan lokasi test tertulis dan wawancara. Terimakasih.
        </div>

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Jadwal Test Tertulis & Wawancara</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Lokasi</th>
                  <th>Perlengkapan</th>
                  <th>Pakaian</th>
                  <th>Keterangan</th>
                  <th>Status Hasil Tes</th>
                  <th style="width: 110px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?= $pecahJadwalTes["tanggal"]; ?></td>
                  <td><?= $pecahJadwalTes["waktu"]; ?></td>
                  <td><?= $pecahJadwalTes["lokasi"]; ?></td>
                  <td><?= $pecahJadwalTes["perlengkapan"]; ?></td>
                  <td><?= $pecahJadwalTes["pakaian"]; ?></td>
                  <td><?= $pecahJadwalTes["keterangan"]; ?></td>
                  <td>
                    <?php if($pecahHasilTes === null) { ?>
                    <span class="badge badge-warning">
                      Menunggu
                    </span>
                    <?php } else { ?>
                      <?php if($pecahHasilTes["status_hasil_tes"] === "Lulus") { ?>
                      <span class="badge badge-success">
                        <?= $pecahHasilTes["status_hasil_tes"]; ?>
                      </span>
                      <?php } else { ?>
                      <span class="badge badge-danger">
                        <?= $pecahHasilTes["status_hasil_tes"]; ?>
                      </span>
                      <?php } ?>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if($pecahHasilTes === null) { ?>
                    <a href="#" class="btn btn-default btn-sm disabled" id=""><i class="fas fa-clock"></i> Detail</a>
                    <?php } else { ?>
                    <a href="index.php?halaman=detail_status_hasil_tes&id=<?= $pecahHasilTes['id_hasil_tes']; ?>" class="btn btn-info btn-sm" id="btnDetailHasilTes"><i class="fas fa-eye"></i> Detail</a>
                    <?php } ?>
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