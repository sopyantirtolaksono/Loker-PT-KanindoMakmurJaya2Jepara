<?php

	// mulai session
	require "../session_start.php";

	// koneksi ke database
  	require "../../connection/koneksi_database.php";

  	// jika data sudah dikirimkan
  	if(isset($_POST["username"])) {

  		// ambil datanya pada form login
  		$username = mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
  		$password = mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));

		// ambil data user yg login pada tabel user
		$userPass = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
		$ambilAkun = $conn->query($userPass);
		$status = $ambilAkun->num_rows;

		// cek statusnya
		if($status == 1) {
			// ambil datanya & jadikan array assosiatif
			$akunUser = $ambilAkun->fetch_assoc();
			
			// cek status user / level user
			if($akunUser["level"] === "Admin" || $akunUser["level"] === "Pelamar") {
				$_SESSION["user"] = $akunUser;

				echo "login sukses";
				exit();
			}
			else {
				echo "level user tidak diketahui";
				exit();
			}
		}
		else {
			echo "akun tidak ditemukan";
			exit();
		}

  	}

?>