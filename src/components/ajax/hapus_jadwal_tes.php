<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// ambil id jadwal tes diURL
	$idJadwalTes = $_GET["id"];

	// hapus data jadwal tes ditabel jadwal tes sesuai dengan id yang dikirim
	$hapusJadwalTes = "DELETE FROM jadwal_tes WHERE id_jadwal_tes = '$idJadwalTes' ";
	$status = $conn->query($hapusJadwalTes);

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