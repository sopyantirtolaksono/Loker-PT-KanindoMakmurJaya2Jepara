<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_POST["id_berkas"])) {
		// ambil id berkas & status berkas
		$idBerkas 	  = mysqli_real_escape_string($conn, htmlspecialchars($_POST["id_berkas"]));
		$statusBerkas = mysqli_real_escape_string($conn, htmlspecialchars($_POST["status_berkas"]));

		// edit status berkas ditabel berkas sesuai dengan id berkas yang dikirim
		$editStatusBerkas = "UPDATE berkas SET status_berkas = '$statusBerkas' WHERE id_berkas = '$idBerkas' ";
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

	}
	else {
		echo "data kosong";
		exit();
	}

?>