<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_POST["lowongan"])) {

        // ambil semua data dari form
        $lowongan 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lowongan"]));
		$tanggal 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["tanggal"]));
		$waktu 			= mysqli_real_escape_string($conn, htmlspecialchars($_POST["waktu"]));
		$lokasi 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lokasi"]));
		$perlengkapan 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["perlengkapan"]));
		$pakaian 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["pakaian"]));
		$keterangan 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["keterangan"]));

		// masukkan data baru pada tabel jadwal tes
		$jadwalTes = "INSERT INTO jadwal_tes (id_loker, tanggal, waktu, lokasi, perlengkapan, pakaian, keterangan) VALUES ('$lowongan', '$tanggal', '$waktu', '$lokasi', '$perlengkapan', '$pakaian', '$keterangan')";
		$status = $conn->query($jadwalTes);
		// cek status
		if($status == 1) {
			echo "sukses menambah data baru";
			exit();
		}
		else {
			echo "gagal menambah data baru";
			exit();
		}

	}
	else {
		echo "data kosong, gagal menambahkan";
		exit();
	}

?>