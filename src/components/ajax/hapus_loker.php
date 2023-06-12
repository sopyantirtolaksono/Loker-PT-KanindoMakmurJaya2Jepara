<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// ambil id loker diURL
	$idLoker = $_GET["id"];

	// hapus data loker ditabel loker sesuai dengan id yang dikirim
	$hapusLoker = "DELETE FROM loker WHERE id_loker = '$idLoker' ";
	$status = $conn->query($hapusLoker);

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