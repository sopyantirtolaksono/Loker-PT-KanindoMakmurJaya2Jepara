<?php

	if(isset($_GET["halaman"])) {
		if($_GET["halaman"] == "dashboard") {
			require "src/views/dashboard.php";
		}
		else if($_GET["halaman"] == "unggahan_loker") {
			require "src/views/unggahan_loker.php";
		}
		else if($_GET["halaman"] == "unggah_loker") {
			require "src/views/unggah_loker.php";
		}
		else if($_GET["halaman"] == "edit_loker") {
			require "src/views/edit_loker.php";
		}
		else if($_GET["halaman"] == "berkas_pelamar") {
			require "src/views/berkas_pelamar.php";
		}
		else if($_GET["halaman"] == "verifikasi_berkas") {
			require "src/views/verifikasi_berkas.php";
		}
		else if($_GET["halaman"] == "unggahan_jadwal_tes") {
			require "src/views/unggahan_jadwal_tes.php";
		}
		else if($_GET["halaman"] == "jadwal_tes") {
			require "src/views/jadwal_tes.php";
		}
		else if($_GET["halaman"] == "edit_jadwal_tes") {
			require "src/views/edit_jadwal_tes.php";
		}
		else if($_GET["halaman"] == "unggahan_hasil_tes") {
			require "src/views/unggahan_hasil_tes.php";
		}
		else if($_GET["halaman"] == "hasil_tes") {
			require "src/views/hasil_tes.php";
		}
		else if($_GET["halaman"] == "edit_hasil_tes") {
			require "src/views/edit_hasil_tes.php";
		}
		else if($_GET["halaman"] == "profil_admin") {
			require "src/views/profil_admin.php";
		}
		else if($_GET["halaman"] == "edit_profil_admin") {
			require "src/views/edit_profil_admin.php";
		}
		else if($_GET["halaman"] == "semua_pelamar") {
			require "src/views/semua_pelamar.php";
		}
		else if($_GET["halaman"] == "unggahan_berkas") {
			require "src/views/unggahan_berkas.php";
		}
		else if($_GET["halaman"] == "unggah_berkas") {
			require "src/views/unggah_berkas.php";
		}
		else if($_GET["halaman"] == "detail_status_berkas") {
			require "src/views/detail_status_berkas.php";
		}
		else if($_GET["halaman"] == "detail_status_hasil_tes") {
			require "src/views/detail_status_hasil_tes.php";
		}
		else if($_GET["halaman"] == "profil_pelamar") {
			require "src/views/profil_pelamar.php";
		}
		else if($_GET["halaman"] == "edit_profil_pelamar") {
			require "src/views/edit_profil_pelamar.php";
		}
		else {
			require "src/views/404.php";
		}
	}
	else {
		echo "<script>location='index.php?halaman=dashboard';</script>";
	}
