<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

// pagination
// konfigurasi
$isi = query("SELECT * FROM kategori");

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
	<title>Halaman Kategori</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>
	<section>
		<div class="container-fluid">
			<div class="row h3">
				<div class="col">
					<h3 class="bg-supergraphicss p-2 text-white text-center rounded">Info Kategori</h3>
				</div>
			</div>
			<div class="row justify-content-center menu">
				<div class="col-md-6 mt-3 mb-2">
					<form class="form-inline" method="post">
						<input for="colFormLabel" class="form-control mr-sm-2" type="text" autocomplete="off" placeholder="Cari" aria-label="Search" name="keyword">
					</form>
				</div>
				<div class="col-md-6 mt-3 mb-2">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="rounded table bg-white table-bordered table-hover table-primary shadow-box">
						<thead>
							<tr class="bg-primary text-white text-center">
								<th width="5%">No.</th>
								<th>Kategori</th>
								<th class="aksi">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($isi as $row) : ?>
								<tr class="text-center">
									<td><?= $i; ?></td>
									<td><?= $row["nama_kategori"]; ?></td>
									<td class="aksi">
										<a href="ubah_kategori.php?id=<?= $row['id_kategori']; ?>" onclick="return confirm('Apakah Anda Ingin Mengubah Data ?');" class="btn btn-warning text-center text-white">
											<img src="img/baseline_edit_white_18dp.png">
										</a>
										<a href="hapus_kategori.php?id=<?= $row['id_kategori']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="btn btn-danger text-center">
											<img src="img/baseline_delete_white_18dp.png">
										</a>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row aksi">
				<a class="nav-link btn btn-primary text-white m-1" href="tambah_kategori.php">Tambah Kategori</a>
			</div>
		</div>
	</section>
	<div class="footer">
		<p>COPYRIGHT &copy; <?= date('Y'); ?> PDAM></a></a></p>Z
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="vendor/jquery-3.3.1.slim.min.js"></script>
	<script src="vendor/popper.min.js"></script>
	<script src="vendor/bootstrap.min.js"></script>
</body>

</html>