<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

$id = $_GET['id'];

$isi = query("SELECT * FROM arsip_dokumen JOIN kategori ON arsip_dokumen.id_kategori = kategori.id_kategori WHERE id_arsip_dokumen = $id")[0];

if (isset($_POST['submit'])) {

	// cek apakah data berhasil diubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'ubah.php';
			</script>
		";
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="vendor/bootstrap.min.css">
	<!-- CSS -->
	<link rel="stylesheet" href="vendor/style.css">
	<link rel="shortcut icon" type="text/css" href="img/Logo_BPPT.png">
	<title>Ubah Data</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>
	<section id="ubah_data" class="ubah_data">
		<div class="container">
			<div class="row mb-2">
				<div class="col text-white p-1 rounded bg-supergraphicss text-center">
					<h2>Ubah Data</h2>
				</div>
			</div>
			<div class="row">
				<div class="col bg-white rounded p-5 mb-2 shadow-box">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col">
								<input type="hidden" name="id_arsip_dokumen" value="<?= $isi['id_arsip_dokumen']; ?>">
								<div class="form-group">
									<label for="judul_buku">Judul Buku : </label>
									<input type="text" name="judul_buku" class="form-control" required value="<?= $isi['judul_buku']; ?>">
								</div>
								<div class="form-group">
									<label for="Kategori">Kategori </label>
									<?php $kategori = query("SELECT * FROM kategori"); ?>
									<select class="custom-select" id="id_kategori" name="id_kategori" required>
										<option selected value="<?= $isi['id_kategori']; ?>"><?= $isi['nama_kategori'] ?></option>
										<?php foreach ($kategori as $row) : ?>
											<option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="tahun">Tahun : </label>
									<input type="number" min="2000" max="9999" id="tahun" name="tahun" class="form-control" required value="<?= $isi['tahun']; ?>">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="keterangan">Keterangan : </label>
									<!-- <input type="textarea" name="keterangan" class="form-control" value=> -->
									<textarea class="form-control" name="keterangan" id="keterangan"><?= $isi['keterangan']; ?></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="file" class="form-label">Upload Dokumen</label>
									<div class="custom-file ">
										<input type="file" class="custom-file-input" name="file" id="customFile">
										<label class="custom-file-label" for="customFile"><?= $isi['tahun']; ?></label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary mt-3" name="submit">Ubah Data
								<img src="img/baseline_send_white_18dp.png"></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div class="footer">
		<p>COPYRIGHT &copy; <?= date('Y'); ?> PDAM></a></a></p>

	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="vendor/jquery-3.3.1.min.js"></script>
	<script src="vendor/jquery.autocomplete.min.js"></script>
	<script src="vendor/popper.min.js"></script>
	<script src="vendor/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			// Selector input yang akan menampilkan autocomplete.
			$("#kode_arsip").autocomplete({
				serviceUrl: "suggestion.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#kode_arsip").val("" + suggestion.kode_arsip);
				}
			});

			// Selector input yang akan menampilkan autocomplete.
			$("#bidang").autocomplete({
				serviceUrl: "suggestion1.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#bidang").val("" + suggestion.bidang);
				}
			});
			// Selector input yang akan menampilkan autocomplete.
			$("#sub_bidang").autocomplete({
				serviceUrl: "suggestion2.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#sub_bidang").val("" + suggestion.sub_bidang);
				}
			});
		});
	</script>
</body>

</html>