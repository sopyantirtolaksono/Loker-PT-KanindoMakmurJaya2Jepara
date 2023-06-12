<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// ambil id berkas diURL
	$idBerkas = $_GET["id"];

	// Soft Delete
	// edit status berkas ditabel berkas sesuai dengan id berkas yang dikirim
	$editStatusBerkas = "UPDATE berkas SET status_berkas = 'Kadaluwarsa' WHERE id_berkas = '$idBerkas' ";
	$status = $conn->query($editStatusBerkas);

	// cek status
	if($status == 1) {
		echo "sukses mengedit data";
		exit();
	}
	else {
		echo "gagal mengedit data";
		exit();
	}

?>