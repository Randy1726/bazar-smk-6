let allTombolBayar = document.querySelectorAll('.bayar-pesanan');
let allTombolTerima = document.querySelectorAll('.terima-pesanan');
let containerWaktuDiterima = document.querySelectorAll('.waktu-diterima');

allTombolBayar.forEach((tombolBayar, index) => {
	tombolBayar.addEventListener('click', () => {
		aksiHijau(tombolBayar);
		tombolBayar.parentNode.innerHTML = "LUNAS";
	});
});

allTombolTerima.forEach((tombolTerima, index) => {
	tombolTerima.addEventListener('click', () => {
		if (tombolTerima.parentNode.previousSibling['previousSibling'].style['background-color'] == 'rgb(119, 255, 51)') {
			aksiHijau(tombolTerima);
			tombolTerima.parentNode.innerHTML = 'DITERIMA';
			containerWaktuDiterima[index].innerHTML = waktuSekarang();
		}
	});
});

function aksiHijau(tombol) {
	tombol.parentNode.style['background-color'] = '#77FF33';
}

function waktuSekarang() {
	let waktu = new Date();
	let jam = waktu.getHours();
	let menit = waktu.getMinutes();
	let detik = waktu.getSeconds();

	if (jam < 10 || menit < 10 || detik < 10) {
		if (jam < 10) {
			var jam2 = '0' + jam;
		}
		if (menit < 10) {
			var menit2 = '0' + menit;
		} 
		if (detik < 10) {
			var detik2 = '0' + detik;
		}
		
		let formatWaktu2 = (jam2 ? jam2 : jam) + ':' + (menit2 ? menit2 : menit) + ':' + (detik2 ? detik2 : detik);
		return formatWaktu2;
	}

	let formatWaktu = jam.toString() + ':' + menit.toString() + ':' + detik.toString();

	return formatWaktu;
}

let checkbox = document.querySelectorAll('input[type=checkbox]');
let harga = document.querySelector('#harga-total');
let qty = document.querySelectorAll('#td-qty input[type=number]');
let qtyAwal = [0, 0, 0, 0];

checkbox.forEach((check, index) => {
	check.addEventListener('click', function() {
		let totalHargaFormatString = harga.innerText;
		let totalHargaSekarang = parseInt(totalHargaFormatString.slice(2, -3));

		if (check.nextSibling.nextSibling.firstChild.nextSibling.style.opacity != '0.5') {
			check.nextSibling.nextSibling.firstChild.nextSibling.style.opacity = '0.5';
			qty[index].removeAttribute('disabled');
			qty[index].value = 1;
			totalHargaSekarang += parseInt(check.value);
			harga.innerText = `Rp${totalHargaSekarang},00`;
			qtyAwal[index] = 1;
		} else {
			check.nextSibling.nextSibling.firstChild.nextSibling.style.opacity = '1';
			qty[index].setAttribute('disabled', '');
			let hargaMenu = parseInt(check.value);
			let quantity = qty[index].value;
			totalHargaSekarang -= hargaMenu * quantity;
			qty[index].value = 0;
			harga.innerText = `Rp${totalHargaSekarang},00`;
			qtyAwal[index] = 0;
		}
	});
});

qty.forEach((qtyMenu, index) => {
	qtyMenu.addEventListener('input', function() {
		if (qtyMenu.value == 0) {
			checkbox[index].nextSibling.nextSibling.firstChild.nextSibling.style.opacity = '1';
			qtyMenu.setAttribute('disabled', '');
		}
		let hargaMenu = checkbox[index].value;
		let quantity = qtyMenu.value - qtyAwal[index];
		let total = hargaMenu * quantity;
		let totalHargaFormatString = harga.innerText;
		let totalHargaSekarang = parseInt(totalHargaFormatString.slice(2, -3));

		totalHargaSekarang += parseInt(total);
		harga.innerText = `Rp${totalHargaSekarang},00`;
		qtyAwal[index] = qtyMenu.value;
	});
});

function formatCurrency(nilai) {
	let harga = nilai.toString();
	let hargaAkhir = harga.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

	return hargaAkhir;
}


let judulBesar = document.querySelector('#title');
let fungsiWaktu = new Date();
let bulan = [
				"Januari", "Februari", "Maret", "April", 
				"Mei", "Juni", "Juli", "Agustus", 
				"September", "Oktober", "November", "Desember"
			];
let hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

setInterval(function() {
	title.innerText = `${hari[fungsiWaktu.getDay()]}, ${fungsiWaktu.getDate()} ${bulan[fungsiWaktu.getMonth()]} ${fungsiWaktu.getFullYear()} - ${waktuSekarang()}`;
}, 1);

function lihat_harga() {
	alert("1. French Fries: Rp6.000\n2. Spaghetti: Rp10.000\n3. Banana Roll: Rp6.000\n4. Bear Ocean: Rp8.000\n5. Brownies: Rp5.000\n6. Nasi Kuning: Rp10.000");
}
