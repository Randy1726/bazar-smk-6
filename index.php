<?php 

	require_once('functions.php');
	$data_total = query("SELECT * FROM data");
	$conn = mysqli_connect("localhost", "root", "root", "bazar6");

	if ((isset($_POST["buat-pesanan"])) && (isset($_POST["menu_1"]) || isset($_POST["menu_2"]) || isset($_POST["menu_3"]) || isset($_POST["menu_4"]) || isset($_POST["menu_5"]) || isset($_POST["menu_6"]))) {
		$nama = $_POST["nama"];
		$kelas = $_POST["kelas"];

		if (!($menu_1 = $_POST["menu_1"])) {
			$menu_1 = 0;
		} 
		if (!($menu_2 = $_POST["menu_2"])) {
			$menu_2 = 0;
		} 
		if (!($menu_3 = $_POST["menu_3"])) {
			$menu_3 = 0;
		} 
		if (!($menu_4 = $_POST["menu_4"])) {
			$menu_4 = 0;
		}
		if (!($menu_5 = $_POST["menu_5"])) {
			$menu_5 = 0;
		}
		if (!($menu_6 = $_POST["menu_6"])) {
			$menu_6 = 0;
		}



		if (!($qty_1 = $_POST["qty_1"])) {
			$qty_1 = 0;
		}
		if (!($qty_2 = $_POST["qty_2"])) {
			$qty_2 = 0;
		}
		if (!($qty_3 = $_POST["qty_3"])) {
			$qty_3 = 0;
		}
		if (!($qty_4 = $_POST["qty_4"])) {
			$qty_4 = 0;
		}
		if (!($qty_5 = $_POST["qty_5"])) {
			$qty_5 = 0;
		}
		if (!($qty_6 = $_POST["qty_6"])) {
			$qty_6 = 0;
		}
		
		$menus = [$menu_1, $menu_2, $menu_3, $menu_4, $menu_5, $menu_6];

		foreach ($menu as $menus) {
			parseInt($menu);
		}

		$total = ($menu_1 * $qty_1) + ($menu_2 * $qty_2) + ($menu_3 * $qty_3) + ($menu_4 * $qty_4) + ($menu_5 * $qty_5) + ($menu_6 * $qty_6);
		$bayar = "BELUM";
		$diterima = "BELUM";
		$waktu_pemesanan = waktuSekarang();
		$waktu_diterima = "";	

		$addCommand = "INSERT INTO data 
						VALUES
						('$nama', '$kelas', '$menu_1', '$menu_2',
						'$menu_3', '$menu_4', '$menu_5', '$menu_6', '$total', '$bayar',
						'$diterima', '$waktu_pemesanan', '$waktu_diterima',
						'',	'$qty_1', '$qty_2', '$qty_3', '$qty_4', '$qty_5', '$qty_6')
						";

		mysqli_query($conn, $addCommand);
		header("Refresh:0");
	} 

	if (isset($_GET["id-terima"])) {
		$waktu_sekarang = waktuSekarang();
		$id = $_GET["id-terima"];

		$updateCommand = "UPDATE data SET
						waktu_diterima = '$waktu_sekarang',
						diterima = 'DITERIMA'
						WHERE id = $id AND bayar = 'DIBAYAR';
						";

		mysqli_query($conn, $updateCommand);
		header('Location: index.php');
	}

	if (isset($_GET["id"])) {
		$waktu_sekarang = waktuSekarang();
		$id = $_GET["id"];

		$updateCommand = "UPDATE data SET
						bayar = 'DIBAYAR'
						WHERE id = $id;
						";
		
		mysqli_query($conn, $updateCommand);
		header('Location: index.php');
	}

?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>APP BAZAR SMA</title>
	<link rel="icon" type="image/x-icon" href="MW.ico">
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

	<h1 id="title"></h1>
	<hr>

	<div class="container">
		<form method="POST">
			<table border="0" cellspacing="0" id="form-table">
				<tr>
					<th style="font-size: 30px;">Tambah pesanan</th>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td><label for="inputnama">Nama: </label></td>
		    		<td><input type="text" id="inputnama" class="input-default" name="nama" placeholder="Masukan Nama.." required></td>
				</tr>
				<tr>
					<td><label>Kelas: </label></td>
					<td>
						<span>
							<input type="radio" name="kelas" value="X" id="10_x" required><label for="10_x">X</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="XI" id="11_ipa"><label for="11_ipa">XI</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="XII" id="11_ips"><label for="11_ips">XII</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="Guru" id="12_ipa"><label for="12_ipa">Guru</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="Publik" id="12_ips"><label for="12_ips">Publik</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="SMA" id="guru"><label for="guru">SMA</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="Sekolah lain" id="orang"><label for="orang">Sekolah lain</label>
						</span>
					</td>
				</tr>
				<tr>
					<td><label>Menu: </label></td>
					<td id="td-menu">
						<span>
							<input type="checkbox" name="menu_1" id="menu_1" value="6000">
							<label for="menu_1">
								<img src="img/menu2/french.png">
							</label>
						</span>
						<span>
							<input type="checkbox" name="menu_2" id="menu_2" value="10000">
							<label for="menu_2">
								<img src="img/menu2/spaghetti.png">
							</label>
						</span>
						<span>
							<input type="checkbox" name="menu_3" id="menu_3" value="6000">
							<label for="menu_3">
								<img src="img/menu2/banana.png">
							</label>
						</span>
						<span>
							<input type="checkbox" name="menu_4" id="menu_4" value="8000">
							<label for="menu_4">
								<img src="img/menu2/bear.png">
							</label>
						</span>
						<span>
							<input type="checkbox" name="menu_5" id="menu_5" value="5000">
							<label for="menu_5">
								<img src="img/menu2/brownies.png">
							</label>
						</span>
						<span>
							<input type="checkbox" name="menu_6" id="menu_6" value="10000">
							<label for="menu_6">
								<img src="img/menu2/nasi.png">
							</label>
						</span>
					</td>
				</tr>
				<tr>
					<td><label>QTY: </label></td>
					<td id="td-qty">
						<input type="number" name="qty_1" max="99" min="0" value="0" disabled>
						<input type="number" name="qty_2" max="99" min="0" value="0" disabled>
						<input type="number" name="qty_3" max="99" min="0" value="0" disabled>
						<input type="number" name="qty_4" max="99" min="0" value="0" disabled>
						<input type="number" name="qty_5" max="99" min="0" value="0" disabled>
						<input type="number" name="qty_6" max="99" min="0" value="0" disabled>
					</td>
				</tr>
				<tr>
					<td><label>Total: </label></td>
					<td style="font-weight: bold;" id="harga-total">
						Rp0,00
					</td>
				</tr>
				<tr>
					<td><p style="visibility: hidden;"></p></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" name="buat-pesanan" style="width: 20%;">buat pesanan</button>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<div class="order">

		<hr>

		<form action="" method="POST" style="display: inline-block;">
			<button type="submit" name="lihat-penjualan">
				<a href="hasil-penjualan.php" style="text-decoration: none; color: white;">VIEW</a>
			</button>
			<button type="button" onclick="lihat_harga();">harga</button>
		</form>

		<div class="find" style="display: inline;">
			<label for="find" style="margin: 0 10px 0 0;">Cari: </label>
			<input type="text" name="find" id="find" placeholder="Cari..." class="input-default input-find">
			<button id="tombol-find">CARI</button>
		</div>
		<hr>

		<table cellpadding="10" cellspacing="0" border="1" id="main-table">
			<tr>
				<th>No</th>
				<th>nama</th>
				<th>kelas</th>
				<th>daftar makanan</th>
				<th>total harga</th>
				<th>bayar</th>
				<th>diterima</th>
				<th>waktu pemesanan</th>
				<th>waktu diterima</th>
			</tr>
			<?php $index = 1; ?>
			<?php foreach($data_total as $data) : ?>
				<tr>
					<td><?= $index ?></td>
					<td><?= $data["nama"] ?></td>
					<td><?= $data["kelas"] ?></td>
					<td class="bold">
						<?php 
						if ($data["menu_1"] == "6000") {
							echo "Fries (" . $data["qty_1"] . ") ";
						}
						if ($data["menu_2"] == "10000") {
							echo "Spaghetti (" . $data["qty_2"] . ") ";
						}
						if ($data["menu_3"] == "6000") {
							echo "Banana Roll (" . $data["qty_3"] . ") ";
						}
						if ($data["menu_4"] == "8000") {
							echo "Bear Ocean (". $data["qty_4"] . ") ";
						}
						if ($data["menu_5"] == "5000") {
							echo "Brownies (". $data["qty_5"] . ") ";
						}
						if ($data["menu_6"] == "10000") {
							echo "Nasi Kuning (". $data["qty_6"] . ")";
						}
						?>
					</td>
					<td class="bold">Rp<?= number_format(strval($data["total"]), 2, ",", "."); ?></td>
					<td style="position: relative;">
						<?php 
							if ($data["bayar"] == "DIBAYAR") {
								echo "<span style='background-color: #77FF33; position: absolute; top:0; bottom:0; left:0; right:0; padding:0; margin:0; display:flex; align-items: center; justify-content: center'>LUNAS</span>";
							} else {
								$var3 = '<button type="button" class="bayar-pesanan" name="bayar-pesanan"><a href="index.php?id=';
								$var4 = '"style="text-decoration: none; color: white;">bayar pesanan</a></button>';

								echo "$var3" . $data["id"] . "$var4";
							}
						?>
					</td>
					<td style="position: relative;">
						<?php 
							if ($data["diterima"] == "DITERIMA") {
								echo "<span style='background-color: #77FF33; position: absolute; top:0; bottom:0; left:0; right:0; padding:0; margin:0; display:flex; align-items: center; justify-content: center'>DITERIMA</span>";
							} else {
								$var = '<button type="button" class="terima-pesanan" name="terima-pesanan"><a href="index.php?id-terima=';
								$var2 = '"style="text-decoration: none; color: white;">terima pesanan</a></button>';

								echo "$var" . $data["id"] . "$var2";
							}
						?>
					</td>
					<td><?= $data["waktu_pemesanan"] ?></td>
					<td class="waktu-diterima"><?= $data["waktu_diterima"] ?></td>
				</tr>
			<?php $index++; ?>
			<?php endforeach; ?>
		</table>
	</div>

	<footer id="main-footer">
		&copy; Dibuat Oleh XI IPA, 2022
	</footer>

<script><?php require_once("script.js");?></script>
</body>
</html>
