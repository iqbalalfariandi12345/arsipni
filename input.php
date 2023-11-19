<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {

	// cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'input.php';
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

	<title>Tambah Data Arsip</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>

	<section id="tambah_data" class="tambah_data">
		<div class="container">
			<div class="row mb-2">
				<div class="col text-white p-1 rounded bg-supergraphicss text-center">
					<h2>Tambah Data Arsip</h2>
				</div>
			</div>
			<div class="row">
				<div class="col bg-white rounded p-5 mb-2 shadow-box">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="judul_buku">Judul Buku </label>
									<input type="text" name="judul_buku" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="tahun">Tahun </label>
									<input type="number" min="2000" max="9999" id="tahun" name="tahun" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="Kategori">Kategori </label>
									<?php $isi = query("SELECT * FROM kategori"); ?>
									<select class="custom-select" id="kategori" name="kategori" required>
										<option selected>Kategori</option>
										<?php foreach ($isi as $row) : ?>
											<option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="file" class="form-label">Upload Dokumen</label>
									<div class="custom-file ">
										<input type="file" class="custom-file-input" name="file" id="customFile" placeholder="file">
										<label class="custom-file-label" for="customFile">Choose file</label>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<button type="submit" class="btn btn-primary mt-3" name="submit">Tambah Data
										<img src="img/baseline_send_white_18dp.png"></button>
								</div>
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