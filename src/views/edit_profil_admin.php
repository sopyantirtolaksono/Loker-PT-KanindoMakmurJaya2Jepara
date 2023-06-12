<?php

	// ambil id user(admin) diURL
	$idAdmin = $_GET["id"];

	// ambil data user(admin) pada tabel user(admin) sesuai id user(admin) yang dikirim
	$dataAdmin  = "SELECT * FROM user WHERE id_user = '$idAdmin' ";
	$ambilAdmin = $conn->query($dataAdmin);
	$pecahAdmin = $ambilAdmin->fetch_assoc();

?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Profil Admin</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Edit Profil Admin</li>
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
            <h3 class="card-title">Form Edit Profil Admin</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="src/components/ajax/edit_profil_admin.php" method="post" id="formEditProfilAdmin" enctype="multipart/form-data">
            <div class="card-body">

              <div class="row">
              	<input type="hidden" name="id_user" value="<?= $pecahAdmin['id_user']; ?>" required>

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
                    <label for="">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" id="" placeholder="Nama" value="<?= $pecahAdmin['nama']; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control" id="" placeholder="Username" value="<?= $pecahAdmin['username']; ?>" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Gender <span class="text-danger">*</span></label>
                    <select class="form-control" name="gender" required>
                    	<option value="<?= $pecahAdmin['gender']; ?>" style="font-weight: bold;">
                    		<?= $pecahAdmin["gender"]; ?>
                    	</option>
                    	<option value="Pria">Pria</option>
                    	<option value="Wanita">Wanita</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="text" name="password" class="form-control" id="" placeholder="Password" value="<?= $pecahAdmin['password']; ?>" required>
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
              <a href="index.php?halaman=profil_admin" class="btn btn-secondary">
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
            <h3 class="card-title">Gambar</h3>
          </div>
          <!-- /.card-header -->

          <div class="card-body">

            <div class="row">
              <div class="col">
                <div class="form-group text-center">
                  <img src="src/dist/img/img_admin/<?= $pecahAdmin['gambar']; ?>" class="img-thumbnail" width="50%" alt="Gambar Admin">
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
<script src="src/dist/js/ajax/edit_profil_admin.js"></script>