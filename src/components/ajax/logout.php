<?php

	// mulai session
	require "../session_start.php";

	// hapus semua session yang ada
	session_destroy();

	// alihkan ke halaman login
	header("Location: ../../../login.php");
	exit();

?>