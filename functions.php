<?php 

	$conn = mysqli_connect("localhost", "root", "", "bazar6");
	
	function query($tabel) {
		global $conn;

		$result = mysqli_query($conn, $tabel);

		$rows = [];

		while ( $row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows;
	}

	function waktuSekarang() {
		date_default_timezone_set("Etc/GMT-7");
		$waktu = date("H:i:s");
		
		return $waktu;
	}
?>
