<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_POST["lowongan"])) {
		// ambil semua data dari form
		$idLoker 				= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lowongan"]));
		$idUser 				= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nama"]));
		$statusHasilTes 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["status_hasil_tes"]));
		$hasilTes 				= mysqli_real_escape_string($conn, htmlspecialchars($_POST["hasil_tes"]));

		// Cek apakah id loker & id user sudah ada di tabel hasil tes
		$cekIdLokerIdUser 	= "SELECT * FROM hasil_tes WHERE id_loker = '$idLoker' AND id_user = '$idUser' ";
		$ambilHasilCekId	= $conn->query($cekIdLokerIdUser);
		$hasilCekId 		= $ambilHasilCekId->num_rows;
		if($hasilCekId > 0) {
			echo "data sudah ada";
			exit();
		}
		else {
			// masukkan data baru pada tabel hasil tes
			$unggahHasilTes = "INSERT INTO hasil_tes (id_loker, id_user, status_hasil_tes, hasil_tes) VALUES ('$idLoker', '$idUser', '$statusHasilTes', '$hasilTes')";
			$status = $conn->query($unggahHasilTes);
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
	}
	else {
		echo "data kosong, gagal menambahkan";
		exit();
	}

?>