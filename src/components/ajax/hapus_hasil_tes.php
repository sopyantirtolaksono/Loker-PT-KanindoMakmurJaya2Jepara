<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// ambil id hasil tes diURL
	$idHasilTes = $_GET["id"];

	// hapus data hasil tes ditabel hasil tes sesuai dengan id yang dikirim
	$hapusHasilTes = "DELETE FROM hasil_tes WHERE id_hasil_tes = '$idHasilTes' ";
	$status = $conn->query($hapusHasilTes);

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