<?php 

	require_once('functions.php');
	$data_total = query("SELECT * FROM data");
	$conn = mysqli_connect("localhost", "root", "root", "bazar6");

	$qty_total_1 = 0;
	$qty_total_2 = 0;
	$qty_total_3 = 0;
	$qty_total_4 = 0;
	$qty_total_5 = 0;
	$qty_total_6 = 0;


	$harga_menu_1 = 6000; 
	$harga_menu_2 = 10000;
	$harga_menu_3 = 6000;
	$harga_menu_4 = 8000;
	$harga_menu_5 = 5000;
	$harga_menu_6 = 10000;

	foreach($data_total as $data) {
		$qty_total_1 += (int)$data["qty_1"];
		$qty_total_2 += (int)$data["qty_2"];
		$qty_total_3 += (int)$data["qty_3"];
		$qty_total_4 += (int)$data["qty_4"];
		$qty_total_5 += (int)$data["qty_5"];
		$qty_total_6 += (int)$data["qty_6"];
	}

	$harga_total_1 = $qty_total_1 * $harga_menu_1;
	$harga_total_2 = $qty_total_2 * $harga_menu_2;
	$harga_total_3 = $qty_total_3 * $harga_menu_3;
	$harga_total_4 = $qty_total_4 * $harga_menu_4;
	$harga_total_5 = $qty_total_5 * $harga_menu_5;
	$harga_total_6 = $qty_total_6 * $harga_menu_6;

	$grand_total = $harga_total_1 + $harga_total_2 + $harga_total_3 + $harga_total_4 + $harga_total_5 + $harga_total_6;

?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hasil Penjualan</title>
	<link rel="icon" type="image/x-icon" href="MW.ico">
	<style type="text/css">
		@font-face {
			font-family: 'Signika';
			src: url('SignikaNegative-VariableFont_wght.ttf') format('truetype');
		}

		body {
			font-family: 'Signika';
			margin: 0;
		}

		table {
			margin-top: 50px;
			text-align: left;
			font-size: 40px;
			margin: 50px;
		}

		th, td {
			padding: 10px;
		}

		tr#head {
			text-align: center;
		}

		h1 {
			font-size: 50px;
			margin: 10px;
		}

		td {
			text-align: center;
		}

		.quantity {
			color: rgba(220,0,0,1);
		}

		button {
			font-family: 'Calibri';
			font-size: 15px;
			text-transform: uppercase;
			font-weight: bolder;
			cursor: pointer;
			padding: 5px 10px;
			color: white;
			background-color: #0092EA;
			border-radius: 20px;
			transition: 0.1s;
			border-color: transparent;
		}

		button:hover {
			background-color: rgba(0, 0, 0, 1.0);
		}

		button:active {
			border-color: white;
		}

		a {
			text-decoration: none;
			color: white;
		}
	</style>
</head>
<body>

	<h1>Hasil Penjualan</h1>
	<hr>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr id="head">
			<th></th>
			<th>NAMA MENU</th>
			<th>HARGA</th>
			<th>JUMLAH</th>
			<th>HARGA TOTAL</th>
		</tr>
		<tr>
			<th>1</th>
			<th>French Fries</th>
			<td>Rp6.000,00</td>
			<td class="quantity"><?= $qty_total_1; ?></td>
			<td>Rp<?= number_format(strval($harga_total_1), 2, ",", "."); ?></td>
		</tr>
		<tr>
			<th>2</th>
			<th>Spaghetti</th>
			<td>Rp10.000,00</td>
			<td class="quantity"><?= $qty_total_2; ?></td>
			<td>Rp<?= number_format(strval($harga_total_2), 2, ",", "."); ?></td>
		</tr>
		<tr>
			<th>3</th>
			<th>Banana Roll</th>
			<td>Rp6.000,00</td>
			<td class="quantity"><?= $qty_total_3; ?></td>
			<td>Rp<?= number_format(strval($harga_total_3), 2, ",", "."); ?></td>
		</tr>
		<tr>
			<th>4</th>
			<th>Bear Ocean</th>
			<td>Rp8.000,00</td>
			<td class="quantity"><?= $qty_total_4; ?></td>
			<td>Rp<?= number_format(strval($harga_total_4), 2, ",", "."); ?></td>
		</tr>
		<tr>
			<th>5</th>
			<th>Brownies</th>
			<td>Rp5.000,00</td>
			<td class="quantity"><?= $qty_total_5; ?></td>
			<td>Rp<?= number_format(strval($harga_total_5), 2, ",", "."); ?></td>
		</tr>
		<tr>
			<th>6</th>
			<th>Nasi Kuning</th>
			<td>Rp10.000,00</td>
			<td class="quantity"><?= $qty_total_6; ?></td>
			<td>Rp<?= number_format(strval($harga_total_6), 2, ",", "."); ?></td>
		</tr>


		<tr>
			<th colspan="4" style="text-align: right;">TOTAL</th>
			<td>Rp<?= number_format(strval($grand_total), 2, ",", "."); ?></td>
		</tr>
	</table>

	<hr>

	<button style="margin:10px;">
		<a href="index.php">halaman utama</a>
	</button>

</body>
</html>
