<?php

	// mulai session
  	require "../session_start.php";

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// ambil data user yang login di session user
	$userLogin = $_SESSION["user"];

	// jika data sudah dikirim
	if(isset($_FILES["berkas_1"])) {
		// ambil berkas dari form(nama berkas dan lokasi berkas)
		$namaBerkas1	= $_FILES["berkas_1"]["name"];
		$lokasiBerkas1	= $_FILES["berkas_1"]["tmp_name"];

		$namaBerkas2	= $_FILES["berkas_2"]["name"];
		$lokasiBerkas2	= $_FILES["berkas_2"]["tmp_name"];

		$namaBerkas3	= $_FILES["berkas_3"]["name"];
		$lokasiBerkas3	= $_FILES["berkas_3"]["tmp_name"];

		$namaBerkas4	= $_FILES["berkas_4"]["name"];
		$lokasiBerkas4	= $_FILES["berkas_4"]["tmp_name"];

		// ambil nama ekstensinya(berkas)
        $ekstensiBerkas1 = pathinfo($namaBerkas1, PATHINFO_EXTENSION);
        $ekstensiBerkas2 = pathinfo($namaBerkas2, PATHINFO_EXTENSION);
        $ekstensiBerkas3 = pathinfo($namaBerkas3, PATHINFO_EXTENSION);
        $ekstensiBerkas4 = pathinfo($namaBerkas4, PATHINFO_EXTENSION);

        // cek apakah format berkas valid / invalid
        if($ekstensiBerkas1 == "pdf" && $ekstensiBerkas2 == "pdf" && $ekstensiBerkas3 == "pdf" && $ekstensiBerkas4 == "pdf") {

        	// aktifkan uniqid
            $uniqId = uniqid();
            // buat nama berkas baru
            $namaBerkasBaru1 = $uniqId."_".$namaBerkas1;
            $namaBerkasBaru2 = $uniqId."_".$namaBerkas2;
            $namaBerkasBaru3 = $uniqId."_".$namaBerkas3;
            $namaBerkasBaru4 = $uniqId."_".$namaBerkas4;
            // pindahkan berkas dari lokasi sementara ke folder
            move_uploaded_file($lokasiBerkas1, "../../dist/berkas_lamaran/berkas_1/" .$namaBerkasBaru1);
            move_uploaded_file($lokasiBerkas2, "../../dist/berkas_lamaran/berkas_2/" .$namaBerkasBaru2);
            move_uploaded_file($lokasiBerkas3, "../../dist/berkas_lamaran/berkas_3/" .$namaBerkasBaru3);
            move_uploaded_file($lokasiBerkas4, "../../dist/berkas_lamaran/berkas_4/" .$namaBerkasBaru4);

            // ambil semua data dari form
            $idUser 		= $userLogin["id_user"];
			$lowongan 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lowongan"]));
			$berkas1 		= $namaBerkasBaru1;
			$berkas2 		= $namaBerkasBaru2;
			$berkas3 		= $namaBerkasBaru3;
			$berkas4 		= $namaBerkasBaru4;
			$tanggal 		= date("Y-m-d");

			// masukkan data baru pada tabel berkas
			$unggahBerkas = "INSERT INTO berkas (id_user, id_loker, berkas_1, berkas_2, berkas_3, berkas_4, tanggal) VALUES ('$idUser', '$lowongan', '$berkas1', '$berkas2', '$berkas3', '$berkas4', '$tanggal')";
			$status = $conn->query($unggahBerkas);
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
        	echo "format file salah";
        	exit();
        }

	}
	else {
		echo "data kosong, gagal menambahkan";
		exit();
	}

?>