<?php

	if(!empty($_GET["berkas"]) && !empty($_GET["file"])) {
		$berkas   = basename($_GET["berkas"]);

		if($berkas == "1") {
			$filename = basename($_GET["file"]);
			$filepath = "../../dist/berkas_lamaran/berkas_1/" . $filename;
		} 
		else if($berkas == "2") {
			$filename = basename($_GET["file"]);
			$filepath = "../../dist/berkas_lamaran/berkas_2/" . $filename;
		} 
		else if($berkas == "3") {
			$filename = basename($_GET["file"]);
			$filepath = "../../dist/berkas_lamaran/berkas_3/" . $filename;
		}
		else if($berkas == "4") {
			$filename = basename($_GET["file"]);
			$filepath = "../../dist/berkas_lamaran/berkas_4/" . $filename;
		}

		if(!empty($filename) && file_exists($filepath)) {
			header("Cache-Control: public");
			header("Content-Description: file transfer");
			header("Content-Disposition: attachment; filename = $filename");
			header("Content-Type: application/pdf");
			header("Content-Transfer-Encoding: binary");

			readfile($filepath);
			exit();
		}
		else {
			echo "File does not exists.";
			exit();
		}
	}
	else {
		echo "Your URL is empty.";
		exit();
	}

?>