<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_FILES["gambar"])) {
		// ambil gambar dari form(nama gambar dan lokasi gambar)
		$namaGambar		= $_FILES["gambar"]["name"];
		$lokasiGambar	= $_FILES["gambar"]["tmp_name"];
		// ambil nama ekstensinya(gambar loker)
        $namaEkstensi = pathinfo($namaGambar, PATHINFO_EXTENSION);
        // cek apakah format gambar valid / invalid
        if( $namaEkstensi == "jpg" || 
            $namaEkstensi == "JPG" || 
            $namaEkstensi == "png" || 
            $namaEkstensi == "PNG" ||
            $namaEkstensi == "jpeg" ||
            $namaEkstensi == "JPEG" ) {

        	// aktifkan uniqid
            $uniqId = uniqid();
            // buat nama gambar baru
            $namaGambarBaru = $uniqId."_".$namaGambar;
            // pindahkan gambar dari lokasi sementara ke folder
            move_uploaded_file($lokasiGambar, "../../dist/img/img_loker/" .$namaGambarBaru);

            // ambil semua data dari form
            $gambar 		= $namaGambarBaru;
			$lowongan 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["lowongan"]));
			$deskripsi 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["deskripsi"]));

			// masukkan data baru pada tabel loker
			$unggahLoker = "INSERT INTO loker (gambar, lowongan, deskripsi) VALUES ('$gambar', '$lowongan', '$deskripsi')";
			$status = $conn->query($unggahLoker);
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
        	echo "format gambar salah";
        	exit();
        }

	}
	else {
		echo "data kosong, gagal menambahkan";
		exit();
	}

?>