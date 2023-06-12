<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_POST["id_hasil_tes"])) {
		// ambil id hasil tes
		$idHasilTes = mysqli_real_escape_string($conn, htmlspecialchars($_POST["id_hasil_tes"]));

        // ambil semua data dari form
        $statusHasilTes	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["status_hasil_tes"]));
		$hasilTes 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["hasil_tes"]));

		// masukkan data baru pada tabel hasil tes
		$editHasilTes = "UPDATE hasil_tes SET status_hasil_tes = '$statusHasilTes', hasil_tes = '$hasilTes' WHERE id_hasil_tes = '$idHasilTes' ";
		$status = $conn->query($editHasilTes);
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