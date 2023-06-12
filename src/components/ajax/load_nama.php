<?php

  // koneksi ke database
  require "../../connection/koneksi_database.php";

  // Ambil id loker di URL
  $idLoker      = $_GET["id"];
  $dataBerkas   = "SELECT * FROM berkas JOIN user ON berkas.id_user = user.id_user WHERE id_loker = '$idLoker' AND status_berkas = 'Lulus'";
  $ambilBerkas  = $conn->query($dataBerkas);

?>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>Nama <span class="text-danger">*</span></label>
      <select class="form-control select2 select2bs4" style="width: 100%;" name="nama" required>
        <?php while($pecahBerkas = $ambilBerkas->fetch_assoc()) { ?>
          <option value="<?= $pecahBerkas['id_user']; ?>">
            <?= $pecahBerkas["nama"]; ?>
          </option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>