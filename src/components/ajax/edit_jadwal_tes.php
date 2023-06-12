<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_POST["id_jadwal_tes"])) {
		// ambil id jadwal tes
		$idJadwalTes = mysqli_real_escape_string($conn, htmlspecialchars($_POST["id_jadwal_tes"]));

        // ambil semua data dari form
        $idLoker 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lowongan"]));
		$tanggal 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["tanggal"]));
		$waktu 			= mysqli_real_escape_string($conn, htmlspecialchars($_POST["waktu"]));
		$lokasi 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lokasi"]));
		$perlengkapan 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["perlengkapan"]));
		$pakaian 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["pakaian"]));
		$keterangan 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["keterangan"]));

		// masukkan data baru pada tabel jadwal tes
		$editJadwalTes = "UPDATE jadwal_tes SET id_loker = '$idLoker', tanggal = '$tanggal', waktu = '$waktu', lokasi = '$lokasi', perlengkapan = '$perlengkapan', pakaian = '$pakaian', keterangan = '$keterangan' WHERE id_jadwal_tes = '$idJadwalTes' ";
		$status = $conn->query($editJadwalTes);
		// cek status
		if($status == 1) {
			echo "sukses mengedit data";
			exit();
		}
		else {
			echo "gagal mengedit data";
			exit();
		}
	}
	else {
		echo "data kosong, gagal menambahkan";
		exit();
	}

?>