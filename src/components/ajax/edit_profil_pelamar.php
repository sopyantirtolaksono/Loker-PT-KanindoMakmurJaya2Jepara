<?php

	// koneksi ke database
	require "../../connection/koneksi_database.php";

	// jika data sudah dikirim
	if(isset($_POST["id_user"])) {
		// ambil id user
		$idUser = mysqli_real_escape_string($conn, htmlspecialchars($_POST["id_user"]));

		// ambil gambar dari form(nama gambar dan lokasi gambar)
		$namaGambar		= $_FILES["gambar"]["name"];
		$lokasiGambar	= $_FILES["gambar"]["tmp_name"];

		// cek ada gambar yang diupload tidak
		if(!empty($lokasiGambar)) {

			// ambil nama ekstensinya(gambar pelamar)
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
	            move_uploaded_file($lokasiGambar, "../../dist/img/img_pelamar/" .$namaGambarBaru);

	            // ambil semua data dari form
	            $gambar 	= $namaGambarBaru;
	            $nama 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nama"]));
	            $nik 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nik"]));
				$username 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
	            $alamat 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["alamat"]));
	            $email 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
				$gender 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));
				$status 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["status"]));
				$password 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));

				// masukkan data baru pada tabel user
				$editUser = "UPDATE user SET nama = '$nama', nik = '$nik', username = '$username', password = '$password', alamat = '$alamat', email = '$email', gender = '$gender', status = '$status', gambar = '$gambar' WHERE id_user = '$idUser' ";
				$status = $conn->query($editUser);
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
	        	echo "format gambar salah";
	        	exit();
	        }

		}
		else {

			// ambil semua data dari form
            $nama 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nama"]));
            $nik 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nik"]));
			$username 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
            $alamat 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["alamat"]));
            $email 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
			$gender 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));
			$status 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["status"]));
			$password 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));

			// masukkan data baru pada tabel user
			$editUser = "UPDATE user SET nama = '$nama', nik = '$nik', username = '$username', password = '$password', alamat = '$alamat', email = '$email', gender = '$gender', status = '$status' WHERE id_user = '$idUser' ";
			$status = $conn->query($editUser);
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

	}
	else {
		echo "data kosong, gagal menambahkan";
		exit();
	}

?>