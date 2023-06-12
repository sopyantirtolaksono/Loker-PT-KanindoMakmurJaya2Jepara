<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// ambil id berkas diURL
	$idBerkas = $_GET["id"];

	// hapus data berkas ditabel berkas sesuai dengan id yang dikirim
	$hapusBerkas = "DELETE FROM berkas WHERE id_berkas = '$idBerkas' ";
	$status = $conn->query($hapusBerkas);

	// cek status
	if($status == 1) {
		echo "sukses menghapus data";
		exit();
	}
	else {
		echo "gagal menghapus data";
		exit();
	}

?>