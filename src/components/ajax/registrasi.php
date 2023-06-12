<?php

	// koneksi ke database
  	require "../../connection/koneksi_database.php";

  	// jika sudah menggirimkan data
	if(isset($_POST["nama_lengkap"])) {
		
		// ambil semua data di form
		$namaLengkap 	= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nama_lengkap"]));
		$nik 			= mysqli_real_escape_string($conn, htmlspecialchars($_POST["nik"]));
		$alamat 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["alamat"]));
		$email 			= mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
		$gender 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["gender"]));
		$status 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["status"]));
		$username 		= mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
		$password 		= $_POST["password"];
		$level 			= "Pelamar";
		// $tglSekarang 	= date("Y/m/d");

		// cek username
		// hilangkan karakter spasi pada username
		$username 		= str_replace(" ", "", $username);
		// jadikan semua karakter huruf besar menjadi huruf kecil
		$username 		= strtolower($username);
		// jadikan nilai variabel username menjadi array & ambil karakter pertamanya
		$usernameSplit 	= str_split($username);
		// cek karakter pertama dari nilai username
		if($usernameSplit[0] != "@") {

			echo "karakter pertama harus @";
			exit();

		}
		else {

			// cek username sudah ada belum
			$sqlUser 		= "SELECT * FROM user WHERE username = '$username' ";
			$ambilUser 		= $conn->query($sqlUser);
			$statusUsername = $ambilUser->num_rows;

			if($statusUsername != 0) {

				echo "username sudah ada";
				exit();

			}
			else {

				// cek password
				// hilangkan karakter spasi pada password
				$password 		= str_replace(" ", "", $password);
				// hitung panjang/jml karakter dlm password
				$passwordLength = strlen($password);

				// cek jika karakter kurang dari 8
				if($passwordLength < 8) {

					echo "minimal harus 8 karakter";
					exit();

				}
				else {

					// enkripsi password
					// $password = password_hash($password, PASSWORD_DEFAULT);

					// masukkan data user baru pada tabel user
					$sqlRegistrasi = "INSERT INTO user (nama, nik, username, password, alamat, email, gender, status, level) VALUES ('$namaLengkap', '$nik', '$username', '$password', '$alamat', '$email', '$gender', '$status', '$level')";
					$status = $conn->query($sqlRegistrasi);

					// cek statusnya
					if($status == 1) {
						echo "registrasi berhasil";
						exit();
					}
					else {
						echo "registrasi gagal";
						exit();
					}

				}

			}

		}

	}

?>